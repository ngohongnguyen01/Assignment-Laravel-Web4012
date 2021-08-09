<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $category = Category::all();
        $arrCate = [];
        foreach ($category as $key => $value){
            array_push($arrCate, $value->id);
        }
        return [
            'name' => 'bail|required|min:3|max:255|unique:products,name,' . request()->id,
            'content' => 'bail|required|min:20',
            'short_description' => 'bail|required|min:20',
            'image' => 'bail|required',
            'image_alt' => 'bail|required|min:3|max:255',
            'price' => 'bail|required|integer|min:0',
            'name_cate' => 'bail|required|integer|in:'.implode(',',$arrCate),
            'status'=>'required|in:'.implode(',',config('common.products.status')),
            'highlight'=>'required|in:'.implode(',',config('common.products.highlight')),
//            'product_detail.*.ten_mau'=>'bail|required',
//            'product_detail.*.ma_mau'=>'bail|required',
//            'product_detail.*.product_image_detail' =>'bail|required',
//            'product_detail.*.product_parameter.*.size'=>'bail|required',
        ];
    }
    public function messages()
    {
        return [

            'name.required' => "Xin mời nhập Tên sản phẩm !",
            'name.min' => "Tên sản phẩm có từ 3 ký tự trở lên !",
            'name.max' => 'Tên sản phẩm có ít hơn 255 ký tự !',
            'name.unique' => 'Tên sản phẩm đã tồn tại !',
            'content.required' => "Xin mời nhập nội dung mô tả sản phẩm !",
            'content.min' => "Nội dung mô tả sản phẩm có ít nhất 20 ký tự trở lên !",
            'short_description.required' => "Xin mời nhập mô tả ngắn sản phẩm !",
            'short_description.min' => "Mô tả ngắn sản phẩm có từ 3 ký tự trở lên !",
            'short_description.max' => "Mô tả ngắn sản phẩm có dưới 255 ký tự  !",
            'image.required' => 'Xin mời bạn nhập ảnh',
            'image_alt.required' => 'Xin mời  bạn nhập môt tả ảnh !',
            'image_alt.min' => 'Xin mời bạn nhập mô tả ảnh trên 3 ký tự !',
            'image_alt.max' => 'Xin mời bạn nhập mô tả ảnh dưới 255 ký tự !',
            'price.required' => 'Xin mời bạn nhập giá sản phẩm !',
            'price.integer' => 'Xin mời nhập giá sản phẩm dưới dạng số !',
            'price.min' => 'Xin mời nhập giá sản phẩm trên 0 !',
            'name_cate.required' => 'Xin mời chọn danh mục sản phẩm !',
            'name_cate.integer' => 'Xin mời bạn chọn giá trị truyền vào là số !',
            'name_cate.in'=>'Xin mời bạn nhập đúng giá trị !',
            'status.required'=>'Xin mời bạn nhập trạng thái !',
            'status.in'=>'Xin mời bạn nhập đúng giá trị !',
            'highlight.required'=>'Xin mời bạn nhập trạng thái !',
            'highlight.in'=>'Xin mời bạn nhập đúng giá trị !',
//            'product_detail.*.product_image_detail.required' =>'Nhập ảnh !',
//            'product_detail.*.product_parameter.size.required'=>'Nhập size !',
//            'product_detail.*.ten_mau.required'=>'Nhập tên màu !',
//            'product_detail.*.ma_mau.required'=>'Nhập mã màu !',
        ];
    }
}
