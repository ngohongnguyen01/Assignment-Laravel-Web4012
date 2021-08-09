<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            'title' => 'bail|required|min:3|max:255',
            'image' => 'bail|required',
            'title_image' => 'bail|required|min:3|max:255',
            'image_detail' => 'bail|required|min:3|max:255',
            'image_alt'=> 'required'
        ];
    }
    public function messages()
    {
        return [
            'image_alt.required'=>'Xin mời nhập ALT ảnh',
            'title.required' => "Xin mời nhập tên Tiêu để !",
            'title.min' => "Tên tiêu để có từ 3 ký tự trở lên !",
            'title.max' => 'Tên tiêu để  có ít hơn 255 ký tự !',
            'image.required' => 'Xin mời nhập ảnh !',
            'title_image.required' => "Xin mời nhập tên tiêu để ảnh !",
            'title_image.min' => "Tên tiêu ảnh để có từ 3 ký tự trở lên !",
            'title_image.max' => 'Tên tiêu ảnh để  có ít hơn 255 ký tự !',
            'image_detail.required' => 'Xin mời  bạn nhập môt tả ảnh !',
            'image_detail.min' => 'Xin mười bạn nhập mô tả ảnh trên 3 ký tự !',
            'image_detail.max' => 'Xin mười bạn nhập mô tả ảnh dưới 255 ký tự !',
        ];
    }
}
