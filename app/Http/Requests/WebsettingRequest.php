<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebsettingRequest extends FormRequest
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
            'key'=> 'bail|required|min:3|max:255|unique:settings,key,'.request()->id,
            'value'=> 'bail|required|min:1|max:255',
            'status'=>'bail|required|in:'.implode(',',config('common.settings')),

        ];
    }

    public function messages()
    {
        return [
            'key.required'=>"Xin mời bạn nhập tên Key",
            'key.min'=>'Xin mời bạn nhập key trên 3 ký tự',
            'key.max'=>'Xin mời bạn nhập key dưới 255 ký tự',
            'key.unique'=>'Xin lỗi key đã tồn tại',
            'value.required'=>"Xin mời bạn nhập tên Value",
            'value.min'=>'Xin mời bạn nhập value trên 3 ký tự',
            'value.max'=>'Xin mời bạn nhập value dưới 255 ký tự',
            'status.required'=>"Xin mời bạn nhập trạng thái !",
            'status.in'=>"Xin mời bạn nhập đúng dữ liệu !",
        ];
    }
}
