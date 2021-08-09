<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'name'=>'bail|required|unique:roles,name,'.request()->id,
            'display_name'=>'bail|required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Xin mời bạn nhập tên !',
            'name.unique'=>'Xin lỗi tên đã tồn tại !',
            'display_name.required'=>'Xin mời bạn nhập Display Name !',
        ];
    }
}
