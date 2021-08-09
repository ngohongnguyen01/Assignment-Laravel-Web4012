<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductImage;
use App\Models\ProductDetail;

class ProductImageController extends Controller
{
    public function delete($id)
    {
        $deleteProductImage = ProductImage::find($id);
        $deleteProductImage->product_details()->delete();
        $deleteProductImage->delete();
        return response()->json(['message' => "Xóa thành công"]);
    }
}
