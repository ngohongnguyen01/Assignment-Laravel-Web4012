<?php

namespace App\Http\Requests\ProductRequset;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
        $listCategory = Category::all();
        $arr = [];
        foreach ($listCategory as $category) {
            array_push($arr, $category->id);
        }
        return [
            'name' => 'bail|required|min:3|max:255|unique:products,name',
            'cate_id'=>'bail|required|in:'.implode(',',$arr),
            'price'=>'bail|required|integer|min:1',
            'descride_detail'=>'bail|required|min:10',
            'descride'=>'bail|required|min:20',
            'status'=>'bail|required|in:' . implode(',',config('common.products.status')),
            'highlight'=>'bail|required|in:' . implode(',',config('common.products.highlight')),
            'image'=>'bail|required',
            'image_alt'=>'bail|required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống !',
            'name.min'=>'Tên sản phẩm không dưới 3 ký tự !',
            'name.max'=>'Tên sản phẩm không quá 255 ký tự !',
            'name.unique'=>'Tên sản phẩm đã tồn tại !',
            'cate_id.in'=>'Xin mời bạn nhập đúng dữ liệu !',
            'price.integer'=>'Giá sản phẩm gồm các số !',
            'price.min'=>'Giá sản phẩm không được nhỏ hơn 0 !',
            'descride_detail.min'=>'Mô tả ngắn sản phẩm không được ít hơn 10 ký tự !',
            'descride.min'=>'Mô tả sản phẩm không được dưới 20 ký tự !',
            'status.in'=>'Xin mời bạn nhập đúng dữ liệu !',
            'highlight.in'=>'Xin mời bạn nhập đúng dữ liệu !',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên sản phẩm',
            'cate_id' => 'Danh mục',
            'price' => 'Giá',
            'descride_detail' => 'Mô tả ngắn sản phẩm',
            'descride'=>'Mô tả sản phẩm',
            'status'=>'Trạng thái ',
            'highlight'=>'Trạng thái',
            'image'=>'Ảnh',
            'image_alt'=>'Mô tả ảnh',
        ];
    }
}
