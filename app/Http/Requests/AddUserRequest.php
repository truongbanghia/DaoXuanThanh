<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'email'=>'bail|required|email|unique:users,email',
            'password'=>'bail|required|min:5',
            'full'=>'bail|required|min:4',
            'address'=>'required',
            'phone'=>'required|min:7|unique:users,phone',
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'Email không được để trống!',
            'email.email'=>'Email không đúng định dạng!',
            'email.unique'=>'Email đã tồn tại!',
            'password.required'=>'Password không được trùng!',
            'password.min'=>'Password không nhỏ hơn 5 ký tự!',
            'full.required'=>'Họ tên không được để trống!',
            'full.min'=>'Họ tên không nhỏ hơn 5 ký tự',
            'address.required'=>'Địa chỉ không được để trống!',
            'phone.required'=>'Số điện thoại không được để trống!',
            'phone.min'=>'Số điện thoại không nhỏ hơn 7 ký tự!',
            'phone.unique'=>'Số điện thoại không được trùng!'
        ];
    }
}
