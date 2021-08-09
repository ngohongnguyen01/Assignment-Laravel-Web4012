<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequets extends FormRequest
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
            'title' => 'bail|required|min:3|max:255|unique:posts,title,' . request()->id,
            'content' => 'bail|required|min:20',
            'image' => 'bail|required|min:20',
            'short_description' => 'bail|required|min:20',
            'image_alt' => 'bail|required|min:3|max:255',
            'status'=>'required|in:'.implode(',',config('common.posts.status')),
            'highlight'=>'required|in:'.implode(',',config('common.posts.highlight')),

        ];
    }
    public function messages()
    {
        return [
            'title.required' => "Xin mời nhập tên tiêu đề !",
            'title.min' => "Tên tiêu đề có từ 3 ký tự trở lên !",
            'title.max' => 'Tên tiêu đề có ít hơn 255 ký tự !',
            'title.unique' => 'Tên tiêu đề đã tồn tại !',
            'image.required' => 'Xin mời bạn nhập ảnh',
            'content.required' => "Xin mời nhập nội dung bài viết !",
            'content.min' => "nội dung bài viết có từ 20 ký tự trở lên !",
            'short_description.required' => "Xin mời nhập mô tả ngắn !",
            'short_description.min' => "Mô tả ngắn có từ 3 ký tự trở lên !",
            'image_alt.required' => 'Xin mời  bạn nhập môt tả ảnh !',
            'image_alt.min' => 'Xin mời bạn nhập mô tả ảnh trên 3 ký tự !',
            'image_alt.max' => 'Xin mời bạn nhập mô tả ảnh dưới 255 ký tự !',
            'status.required'=>'Xin mời bạn chọn trạng thái hoạt động !',
            'status.in'=>'Xin mời bạn nhập đúng giá trị !',
            'highlight.required'=>'Xin mời bạn chọn trạng thái hoạt động !',
            'highlight.in'=>'Xin mời bạn nhập đúng giá trị !',

        ];
    }
}
