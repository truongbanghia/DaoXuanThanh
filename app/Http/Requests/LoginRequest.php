<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email'=>'required|email',
            'password'=>'required|min:5',
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'email không duoc để trống',
            'email.email'=>'email không đúng định dạng',
            'password.required'=>'password không duoc để trống',
            'password.min'=>'password không duoc nhỏ hon 5 kí tụ',
        ];
    }
}
