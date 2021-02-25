<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\product;
class HomeController extends Controller
{
    public function GetHome()
    {
         $data['product_fe']=product::where('featured',1)->where('img','<>','no-img.jpg')->take(4)->get();
         $data['product_new']=product::where('img','<>','no-img.jpg')->orderby('created_at','DESC')->take(8)->get();
       return view('frontend.index',$data );
    }

    public function GetContact()
    {
        return view('frontend.contact');
    }

    public function GetAbout()
    {
        return view('frontend.about');
    }
    public function Getsearch(Request $r){
        $data['search'] = product::where('name','like','%'.$r->search.'%')->get();
        return view('frontend\search',$data);
    }
}