<?php

namespace App\Http\Requests\CommentRequest;

use Illuminate\Foundation\Http\FormRequest;

class addCommentRequest extends FormRequest
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
            'name'=>"bail|required|min:3|max:255",
            'numberPhone'=>[
                'bail',
                'required',
            ],
            'content'=>"bail|required|min:6",
            'rating'=>'bail|required|in:'.implode(',',config('common.Rating')),
        ];
    }

    public function messages()
    {
        return [
            'required'=>':attribute không được để trống',
            'name.min'=>'Họ tên ít nhất 3 ký tự !',
            'name.max'=>'Họ tên không quá 255 ký tự ',
            'numberPhone.regex'=>'Xin mời bạn nhập đúng định dạng số điện thoại !',
            'content.min'=>'Nội dung không ít hơn 6 ký tự !',
            'rating.in'=>'Xin mời bạn nhập đúng kiểu dữ kiệu !',
        ];
    }

    public function attributes()
    {
        return [
            'name'=>'Họ tên',
            'numberPhone'=>'Số điện thoại',
            'content'=>'Nội dung bình luận',
            'rating'=>'Đánh giá',
        ];
    }
}
