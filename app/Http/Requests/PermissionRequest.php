<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
            'name'=>'bail|required|unique:permissions,name,'.request()->id,
            'display_name'=>'bail|required',
            'key_code'=>'bail|unique:permissions,key_code,'.request()->id,
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Xin mời bạn nhập tên !',
            'name.unique'=>'Xin lỗi tên đã tồn tại !',
            'display_name.required'=>'Xin mời bạn nhập Display Name !',
            'key_code.unique'=>'Xin lỗi Key Code đã tồn tại !',
        ];
    }
}
