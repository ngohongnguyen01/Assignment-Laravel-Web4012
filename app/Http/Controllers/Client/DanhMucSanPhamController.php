<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;


class DanhMucSanPhamController extends Controller
{
    protected $product;
    protected $color;
    protected $size;

    public function __construct(Product $product, Color $color, Size $size)
    {
        $this->product = $product;
        $this->color = $color;
        $this->size = $size;
    }

    public function getProductOfCate($slug)
    {
        $category = Category::where('slug', '=', $slug)->first();
        if (!$category) {
            return redirect()->route('index');
        } else {
            $product = $category->products;
            $allColor = $this->color->getAllColor();
            $allSize = $this->size->getAllSize();
            return view('client.CategoryProduct', ['category' => $category,'allSize'=>$allSize,'allColor'=>$allColor]);
        }
    }

    public function filterOfProductCate(Request $request, $id)
    {
        $sapXep = $request->keyword;
        $product = '';
        switch ($sapXep) {
            case '0':
                $product = $this->product->where('status', '=', 1)->where('highlight', '=', 1)->where('cate_id','=',$id)->get();
                break;
            case '1':
                $product = $this->product->filterProductCateId($id,'price','asc');
                break;
            case '2':
                $product = $this->product->filterProductCateId($id,'price','desc');
                break;
            case '3':
                $product = $this->product->filterProductCateId($id,'name', 'asc');
                break;
            case '4':
                $product = $this->product->filterProductCateId($id,'name', 'desc');
                break;
            case '5' :
                $product = $this->product->filterProductCateId($id,'id', 'asc');
                break;
            case '6' :
                $product = $this->product->filterProductCateId($id,'id', 'desc');
                break;
            default:
                $product = Product::where('cate_id', '=', $id)->where('status','=',1)->get();
        }
        return response()->json($product);
    }

    public function getAllProduct()
    {
        $product = Product::where('status', '=', 1)->paginate(8);
        return view('client.layout-client.allProduct', ['products' => $product]);
    }

    public function filterAllProduct(Request $request)
    {
        $sapXep = $request->keyword;
        $product = '';
        switch ($sapXep) {
            case '0':
                $product = $this->product->where('status', '=', 1)->where('highlight', '=', 1)->get();
                break;
            case '1':
                $product = $this->product->filterAllProduct('price', 'asc');
                break;
            case '2':
                $product = $this->product->filterAllProduct('price', 'desc');
                break;
            case '3':
                $product = $this->product->filterAllProduct('name', 'asc');
                break;
            case '4':
                $product = $this->product->filterAllProduct('name', 'desc');
                break;
            case '5' :
                $product = $this->product->filterAllProduct('id', 'asc');
                break;
            case '6' :
                $product = $this->product->filterAllProduct('id', 'desc');
                break;
            case 'all':
                $product = Product::where('status', '=', 1)->get();
                break;
            default:
                $product = Product::where('status', '=', 1)->get();
        }
        return response()->json($product);
    }
}
