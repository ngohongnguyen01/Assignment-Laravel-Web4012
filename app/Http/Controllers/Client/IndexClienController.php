<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Banner;

class IndexClienController extends Controller
{
    public function index()
    {
        $banner = Banner::where('status', '=', 1)->limit(3)->get();
        $category = Category::where('status', '=', 1)->limit(3)->get();
        $productOfSpecil = Product::where('status', '=', 1)->where('highlight','=', 1)->get();
        $newProduct = Product::where('status', '=', 1)->orderBy('id', 'desc')->limit(8)->get();
        $likeProduct = Product::where('status', '=', 1)->orderBy('like', 'desc')->limit(8)->get();
        $post = Post::where('status', '=', 1)->orderBy('id', 'asc')->limit(3)->get();
        return view('client.index', ['banner' => $banner,
            'category' => $category,
            'productOfSpecil' => $productOfSpecil,
            'newProduct' => $newProduct,
            'likeProduct' => $likeProduct,
            'post' => $post
        ]);
    }
}
