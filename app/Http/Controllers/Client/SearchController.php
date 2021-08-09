<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    function search(Request $request)
    {
        $keyWord = $request->keyword;
        $valueKeyWord = Product::where('status','=',1)->where('name','like','%'.$keyWord.'%')->get();
        foreach ($valueKeyWord as $valueKey){

        }
        return response()->json($valueKeyWord);
    }
}
