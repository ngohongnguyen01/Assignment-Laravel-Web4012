<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductAttr;
use App\Models\Product;
use App\Models\Color;
use App\Models\Attribute;
use Illuminate\Support\Str;
use DateTime;

class ProductAttrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = ProductAttr::where('product_id', $id)->paginate(5);
        return view('backend.ProductAttribute.index', ['data' => $data, 'id' => $id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)

    {
        $dataProduct = (Product::find($id));
        $data =  Attribute::all();
        return view('backend.ProductAttribute.add', ['dataProduct' => $dataProduct, 'id' => $id, 'attribute' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
        $data = ($request->all());
        $addColor = new Color();
        $addColor->name = $request->namecolor;
        $addColor->slug = Str::slug($request->namecolor);
        $addColor->ma_mau = $request->color;
        $addColor->image = $request->image;
        $addColor->product_id = $id;
        $addColor->status = 1;
        $addColor->save();
        foreach ($data['size'] as $key => $value) {
            $add = new ProductAttr();
            $add->product_id = $id;
            $add->size_id = $data['size'][$key];
            $add->price = $data['price'][$key];
            $add->color_id = $addColor->id;
            $add->so_luong = $data['so_luong'][$key];
            $add->date_add =  new DateTime();
            $add->status = 1;
            $add->save();
        }
       
        return redirect()->route('product_attr.index',['id'=>$id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductAttr::destroy($id);
        return response()->json(['message' => "Xóa thông tin thành công"]);
    }
}
