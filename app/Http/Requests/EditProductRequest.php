<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_code'=>'required|min:3',
            'product_name'=>'required|min:3',
            'product_price'=>'required|numeric:3',
            'product_img'=>'image',
        ];
    }
    public function messages()
    {
        return [
            'product_code.required'=>'Mã sản phẩm không đc để trống',
            'product_code.required'=>'Mã sản phẩm không đc nhỏ hon 3 kí tu',
            'product_name.required'=>'Tên sản phẩm không đc để trống',
            'product_name.required'=>'Ten sản phẩm không đc nhỏ hon 3 kí tu',
            'product_price.required'=>'giá sản phẩm không đc để trống',
            'product_price.required'=>'Giá sản phẩm không đúng dịnh dạng',
            'product_img.image'=>'File Ảnh không đúng định dạng!',
        ];
    }
}
