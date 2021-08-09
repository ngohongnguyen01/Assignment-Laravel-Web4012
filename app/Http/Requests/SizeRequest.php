<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SizeRequest extends FormRequest
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
            'name' => 'required|unique:sizes,name,' . request()->id,
            'detail' => 'required|min:3|max:255',
            'status' => 'required|in:'.implode(',', config('common.sizes')),
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Xin mời bạn nhập tên size !',
            'name.unique' => 'Size đã tồn tại !',
            'detail.required' => 'Xin mời bạn nhập mô tả size !',
            'detail.min' => 'Mô tả có  ít nhất 3 ký tự !',
            'detail.max' => 'Mô tả không quá 255 ký tự !',
            'status.required' => 'Xin mời bạn chọn trạng thái hoạt động !',
            'status.in' => 'Xin mười bạn nhập đúng giá trị !',
        ];
    }
}
