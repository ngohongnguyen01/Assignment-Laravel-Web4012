<?php

namespace App\Http\Requests;

use App\Models\Color;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class ColorRequest extends FormRequest
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
        $value='';
        if(isset(request()->id)){
           $color=  Color::find(request()->id);
            $value = $color['value'];
        }
        return [
            'name'=>'required|min:3|max:255|unique:colors,name,'.request()->id,
            'value'=>[
                'required',
                'regex:/^#+[a-zA-Z0-9]{6}$/',
                'unique:colors,value,'.request()->id,
                ],
            'detail'=>'required|min:3|max:255',
            'status'=>'required|in:'.implode(',',config('common.colors')),
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Xin mời bạn nhập tên màu !',
            'name.min'=>'Tên màu có ít nhất 3 ký tự !',
            'name.max'=>'Tên màu có nhiều nhất 255 ký tự !',
            'name.unique'=>'Tên màu đã tồn tại !',
            'value.required'=>'Xin mời nhập giá trị màu !',
            'value.regex'=>'Xin mời bạn nhập đúng định dạng màu !',
            'value.unique'=>'Mã màu đã tồn tại !',
            'detail.required'=>'Xin mời bạn nhập thông tin mô tả màu !',
            'detail.min'=>'Xin  mời bạn nhập mô tả màu ít nhất 3 ký tự !',
            'detail.max'=>'Tên màu có nhiều nhất 255 ký tự !',
            'status.required'=>'Xin mời bạn chọn trạng thái hoạt động !',
            'status.in'=>'Xin mời bạn nhập đúng giá trị !',

        ];
    }
}
