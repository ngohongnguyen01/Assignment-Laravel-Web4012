<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name_cate' => 'bail|required|min:3|max:255|unique:categories,name_cate,'.request()->id,
            'image' => 'bail|required',
            'image_describe' => 'bail|required|min:3|max:255',
            'status'=>'bail|required|in:'.implode(',',config('common.categories')),

        ];
    }
    public function messages()
    {
        return [
            'name_cate.required' => "Xin mời nhập tên danh mục !",
            'name_cate.min' => "Tên danh mục có từ 3 ký tự trở lên !",
            'name_cate.max' => 'Tên danh mục có ít hơn 255 ký tự !',
            'name_cate.unique' => 'Tên danh mục đã tồn tại !',
            'image.required' => 'Xin mời nhập ảnh !',
            'image_describe.required' => 'Xin mời  bạn nhập môt tả ảnh !',
            'image_describe.min' => 'Xin mười bạn nhập mô tả ảnh trên 3 ký tự !',
            'image_describe.max' => 'Xin mười bạn nhập mô tả ảnh dưới 255 ký tự !',
            'status.required'=>"Xin mời bạn nhập trạng thái !",
            'status.in'=>"Xin mời bạn nhập đúng dữ liệu !",
        ];
    }
}
