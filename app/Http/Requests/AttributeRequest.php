<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttributeRequest extends FormRequest
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
            'name' => 'bail|required|max:255|unique:attribute,name,'.request()->id,
            'describe' => 'bail|required|min:3|max:255'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Xin mời bạn nhập tên thuộc tính !',
            'name.max' => 'Xin mời bạn nhập tên thuộc tính dưới 255 ký tự !',
            'name.unique' => 'Xin bạn nhập tên thuộc tính khác , tên thuộc tính này đã tồn tại !',
            'describe.required' => 'Xin mời bạn nhập mô tả thuộc tính',
            'describe.min' => 'Xin mời bạn nhập mô tả thuộc tính trên 3 ký tự !',
            'describe.max' => 'Xin mời bạn nhập mô tả thuộc tính dưới 255 ký tự !',
        ];
    }
}
