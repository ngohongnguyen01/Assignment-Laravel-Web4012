<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Comment;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductImage;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    protected $product;
    protected $color;
    protected $size;
    protected $comment;
    protected $productDetail;
    protected $productImage;

    public function __construct(Product $product, Color $color, Size $size, Comment $comments, ProductDetail $productDetail, ProductImage $productImage)
    {
        $this->product = $product;
        $this->size = $size;
        $this->color = $color;
        $this->comment = $comments;
        $this->productDetail = $productDetail;
        $this->productImage = $productImage;
    }

    public function show(Request $request)
    {
        $array_url = preg_split("/(-)/i", $request->segment(2));
        $idProduct = array_pop($array_url);
        $product = $this->product::where('id', '=', $idProduct)->where('status', '=', 1)->first();
        $getAllProductSize = $product->manySize->where('status', '=', 1)->unique();
        $getAllGProductInCate = $this->product::where('cate_id', '=', $product->cate_id)->where('status', '=', 1)->get();
        $getCommentOfProduct = $this->comment::getAllCommentOfProduct($product->id);
        return view('client.productDetail', ['product' => $product,
            'getAllProductSize' => $getAllProductSize,
            'getAllGProductInCate' => $getAllGProductInCate,
            'getCommentOfProduct' => $getCommentOfProduct,
            'color' => $this->color]);
    }

    public function getAttributeProduct(Request $request)
    {
        $printAllNameSize = [];
        $idColor = $request->idColor;
        $idProduct = $request->idProduct;
        $getNameColor = $this->color::where('id', '=', $idColor)->first();
        $getValueIdImage = $this->productImage::where('product_id', '=', $idProduct)->where('color_id', '=', $idColor)->where('status', '=', 1)->first();
        $getAllidSize = $this->productDetail::where('status', '=', 1)->where('product_image_id', '=', $getValueIdImage->id)->get();
        foreach ($getAllidSize as $value) {
            $getNameSize = $this->size::where('id', '=', $value->size_id)->get();
            array_push($printAllNameSize, $getNameSize);
        }
        return response()->json([$printAllNameSize, $getValueIdImage, $getNameColor]);
    }


    public function valueDetailOfProduct(Request $request)
    {
        $idColor = $request->idColor;
        $idProduct = $request->idProduct;
        $idSize = $request->idSize;
        $getValueIdImage = $this->productImage::where('product_id', '=', $idProduct)->where('color_id', '=', $idColor)->first();
        $getValueProductDetail = $this->productDetail::where('product_id', '=', $idProduct)
            ->where('size_id', '=', $idSize)
            ->where('status', '=', 1)
            ->where('product_image_id', '=', $getValueIdImage->id)->first();
        return response()->json($getValueProductDetail);
    }
}
