<?php

namespace App\Http\Controllers\backend;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\AddAttrRequest;
use App\Http\Requests\AddValueRequest;
use App\Http\Requests\EditAttrRequest;
use App\Http\Requests\EditValueRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\models\{product,attribute,values,category,variant};

class ProductController extends Controller
{
    public function ListProduct()
   {

      $data['products']=product::paginate(3);
      return view('backend.product.listproduct',$data);
   }

   public function AddProduct()
   {
      $data['category']=category::all();
      $data['attrs']=attribute::all();
    return view('backend.product.addproduct',$data);
   }

   public function PostProduct(AddProductRequest $request)
   {
   $product=new product;
   $product->product_code=$request->product_code;
   $product->name= $request->product_name;
   $product->price= $request->product_price;
   $product->featured=$request->featured;
   $product->quantity=$request->quantity;
   $product->state= $request->product_state;
   $product->info= $request->info;
   $product->describe= $request->description;
   if($request->hasFile('product_img'))
      {
      $file = $request->product_img;
      $filename= Str::random(9).'.'.$file->getClientOriginalExtension();
      $file->move('backend/img', $filename);
      $product->img= $filename;
      }
      else {
         $product->img='no-img.jpg';
      }

   $product->category_id= $request->category;
   $product->save();
   $mang=array();
   foreach($request->attr as $value)
   {
      foreach($value as $item)
      {
         $mang[]= $item;
      }
   }
   $product->values()->Attach($mang);
      $variant=get_combinations($request->attr);

      foreach($variant as $var)
      {
         $vari=new variant;
         $vari->product_id=$product->id;
         $vari->save();
         $vari->values()->Attach($var);
      }
   return redirect('admin/product/add-variant/'.$product->id);

   }
   public function EditProduct(request $request,$id)
   {
      $data['product']=product::find($id);
      $data['category']=category::all();
      $data['attrs']=attribute::all();
    return view('backend.product.editproduct',$data);
   }

   public function PostEditProduct(EditProductRequest $request,$id)
   {
     $product=product::find($id);
     $product->product_code=$request->product_code;
     $product->name= $request->product_name;
     $product->price= $request->product_price;
     $product->featured=$request->featured;
     $product->state= $request->product_state;
     $product->info= $request->info;
     $product->quantity= $request->quantity;
     $product->describe= $request->description;
     if($request->hasFile('product_img'))
        {
           if(file_exists($product->img!='no-img.jpg'))
           {
            unlink('backend/img/'.$product->img);
           }

        $file = $request->product_img;
        $filename= Str::random(9).'.'.$file->getClientOriginalExtension();
        $file->move('backend/img', $filename);
        $product->img= $filename;
        }

     $product->category_id= $request->category;
     $product->save();
     //add values
     $mang=array();
     foreach($request->attr as $value)
     {
        foreach($value as $item)
        {
           $mang[]= $item;
        }
     }
     $product->values()->Sync($mang);
     //add variant
     $variant=get_combinations($request->attr);

      foreach($variant as $var)
      {
         if(check_var($product,$var))
         {
            $vari=new variant;
            $vari->product_id=$product->id;
            $vari->save();
            $vari->values()->Attach($var);
         }

      }

     return redirect()->back()->with('thongbao','Đã sưả thành công!');

   }
   public function DelProduct($id)
   {
      product::destroy($id);
      return redirect()->back()->with('thongbao','Đã xóa thành công');

   }
   public function AddAttr(AddAttrRequest $request)
   {
    $attr= new attribute;
    $attr->name=$request->attr_name;
    $attr->save();

  return redirect()->back()->with('thongbao','Đã thêm thành công thuộc tính:'.$request->attr_name);
   }

   public function DelAttr($id)
   {
        attribute::destroy($id);

        return redirect('admin/product/detail-attr')-> with('thongbao','Đã xóa thành công!');

   }

   public function AddValue(AddValueRequest $request)
   {
    $value=new values;
    $value->attr_id=$request->attr_id;
    $value->value=$request->value_name;
    $value->save();
    return redirect()->back()->with('thongbao','Đã thêm giá trị:'.$request->value_name);
   }

   public function DetailAttr()
   {
      $data['attrs']=attribute::all();
        return view('backend.attr.attr',$data);
   }

   public function EditAttr($id)
   {
         $data['attr']=attribute::find($id);
         return view('backend.attr.editattr',$data);
   }

   public function PostAttr(EditAttrRequest $request,$id)
   {
    $attr=  attribute::find($id);
    $attr->name=$request->attr_name;
    $attr->save();

  return redirect()->back()->with('thongbao','Đã sưả thuộc tính:'.$request->attr_name);

   }

   public function EditValue($id)
   {
        $data['value']=values::find($id);
        return view('backend.attr.editvalue',$data);
   }

   public function PostEditValue(EditValueRequest $request,$id)
   {
      $value=values::find($id);
      $value->value=$request->value_name;
      $value->save();


      return redirect()->back()->with('thongbao','Đã sủa thành công ');


   }
   public function PostAddVariant(request $request,$id)
   {
      foreach($request->variant as $key=>$value)
     {
        $vari=variant::find($key);
        $vari->price=$value;
        $vari->save();
     }

     return redirect('admin/product')->with('thongbao','Đã thêm thành công!');
   }

   public function AddVariant($id)
   {
      $data['product']=product::find($id);
       return view('backend.variant.addvariant',$data);
   }

   public function DelVariant($id)
   {
      variant::destroy($id);
      return redirect()->back()->with('thongbao','Đã xoá biến thể thành công!');
   }
   public function DelValue($id)
   {
      values::destroy($id);

      return redirect()->back()->with('thongbao','Đã xóa thành công!');

   }
   public function EditVariant($id)
   {
      $data['product']=product::find($id);
        return view('backend.variant.editvariant',$data);
   }

   public function PostEditVariant(request $request,$id)
   {
      foreach($request->variant as $key=>$value)
     {
        $vari=variant::find($key);
        $vari->price=$value;
        $vari->save();
     }

     return redirect('admin/product')->with('thongbao','Đã sủa thành công!');
   }
}
