<?php

namespace App\Http\Requests\UserRequset;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Date;

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
            'full_name' => 'bail|required|min:3|max:255',
            'email' => 'bail|required|min:3|max:255|email|unique:users,email',
            'username' => 'bail|required|min:3|max:255|unique:users,username',
            'password' => 'bail|required|min:6|max:255',
            'phone' => 'bail|required|unique:users,phone',
            'address' => 'bail|required|min:3|max:255',
            'role' => 'bail|required',
            'status' => 'bail|required|in:' . implode(',', config('common.users.status')),
            'gender' => 'bail|required|in:' . implode(',', config('common.users.gender')),
            'image' => 'bail|required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attributes không được để trống !',
            'full_name.min' => "Họ tên không được dưới 3 ký tự !",
            'full_name.max' => 'Họ tên không quá 255 ký tự !',
            'email.min' => 'Email không được dưới 3 ký tự !',
            'email.max' => 'Email không được quá 255 ký tự !',
            'email.email' => 'Xin mời bạn nhập đúng định dạng email !',
            'email.unique' => 'Email này đã tồn tại !',
            'username.min' => 'Username không được nhập dưới 2 ký tự !',
            'username.max' => "Username không được quá 255 ký tự !",
            'username.unique' => 'Username này đã tồn tại !',
            'password.min' => 'Password không được nhập dưới 6 ký tự !',
            'password.max' => "Password không được nhập quá 255 ký tự !",
            'address.min' => "Address không được nhập dưới 3 ký tự !",
            'address.max' => 'Address không được nhập quá 255 ký tự !',
            'status.in' => 'Xin mời  bạn nhập đúng kiểu dữ liệu !',
            'gender.in' => 'Xin mời  bạn nhập đúng kiểu dữ liệu !',
            'phone.unique' => 'Số điện thoại đã tồn tại !'

        ];
    }

    public function attributes()
    {
        return [
            'full_name' => 'Họ tên',
            'email' => 'Email',
            'username' => 'Username',
            'password' => 'Password',
            'address' => 'Address',
            'status' => 'Trạng thái',
            'gender' => 'Giới tính',
            'phone' => 'Số điện thoại ',
            'role' => 'Quyền',
            'image' => 'Ảnh'
        ];
    }
}
