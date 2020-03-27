<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'username' => 'required|unique:users|string|max:255',
            'email' => 'email|unique:users',
            'full_name' => 'required|unique:users|string|max:255',

        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Chưa nhập tên đăng nhập',
            'username.unique' => 'Tên đăng nhập đã tồn tại',
            'email.required' => 'Chưa nhập email',
            'email.unique' => 'Email đã được sử dụng',
            'full_name.required' =>'Chưa nhập họ tên',
            'full_name.unique' =>'Người này đã có tài khoản',
            'email' => 'Phải nhập email'
        ];
    }
}
