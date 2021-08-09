<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Size;
use App\Models\ProductImage;
use App\Models\Color;
use DateTime;
use App\Models\ProductDetail;
use App\Models\Category;
use App\Http\Requests\ProductRequset\AddProductRequest;
use App\Http\Requests\ProductRequset\EditProductRequest;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $product;

    public function __construct(Product $product)
    {
        $this->authorizeResource(Product::class, 'product');
        $this->product = $product;
    }

    public function index()
    {
        $data = Product::paginate(5);
        return view('backend.Product.copy', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $size = Size::all()->where('status', '=', 1);
        $data = Category::all()->where('status', '=', 1);
        $color = Color::all()->where('status', '=', 1);
        return view('backend.product.add', ['data' => $data, 'size' => $size, 'color' => $color]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductRequest $request)
    {
        $dateCreate = new DateTime();
        $arr_product_detail = $request->product_detail;
        $dataProduct = request()->only('name', 'descride', 'descride_detail', 'image', 'image_alt', 'price', 'status', 'highlight', 'cate_id');
        $dataProduct['slug'] = Str::slug($request->name);
        $dataProduct['date_add'] = $dateCreate;
        $saveDataProduct = Product::create($dataProduct);
        $getIdProduct = $saveDataProduct->id;

        if ($arr_product_detail != null) {
            foreach ($request->product_detail as $key => $value) {
                $image = $value['product_image_detail'];
                $path = "";
                if ($image != "") {
                    $path = 'image-products/' . time() . '-' . $image->getClientOriginalName();
                    $file_name = time() . '-' . $image->getClientOriginalName();
                    $url_image = public_path('/image-products');
                    $image->move($url_image, $file_name);
                }

                $saveDataProductImage = ProductImage::create([
                    'image' => $path,
                    'product_id' => $getIdProduct,
                    'color_id' => $value['color'],
                    'status' => $value['status_product_image']
                ]);

                $getIdProductImage = $saveDataProductImage->id;
                if ($value['product_parameter'] != null) {
                    foreach ($value['product_parameter'] as $item) {
                        ProductDetail::create([
                            'product_id' => $getIdProduct,
                            'size_id' => $item['size'],
                            'product_image_id' => $getIdProductImage,
                            'so_luong' => $item['detail_product-so-luong'],
                            'gia_ban' => $item['detail_product-gia-ban'],
                            'gia_nhap' => $item['detail_product-gia-nhap'],
                            'status' => $item['stautus_product_detail'],
                            'date_added' => $dateCreate
                        ]);
                    }
                }
            }
        }
        return redirect()->route('product.index')->with('msg', 'Thêm sản phẩm thành công !');

    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $detail_image = $product->product_image;
        $pro_color_manys = $product->manyColor;
        return view('backend.Product.show', ['data' => $product, 'detail_image' => $detail_image]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $dataCate = Category::all();
        $size = Size::all();
        $color = Color::all();
        $dataImage = $product->product_image;
        return view('backend.Product.edit', ['data' => $product, 'dataCate' => $dataCate, 'size' => $size, 'color' => $color, 'dataImage' => $dataImage]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request, Product $product)
    {
        $url_path = "";

        $dateCreate = new DateTime();
        $arr_product_detail = $request->product_detail;
        $dataProduct = request()->only('name', 'descride', 'descride_detail', 'image', 'image_alt', 'price', 'status', 'highlight', 'cate_id');
        $dataProduct['slug'] = Str::slug($request->name);
        $product->update($dataProduct);

        $arrNew = array_splice($arr_product_detail, 1);
        if ($arrNew != "") {
            foreach ($arrNew as $key => $value) {
                // cập nhập dữ liệu vào trong database product_image
                if (isset($value['idDataImage'])) {
                    if (isset($value['product_image_detail'])) {
                        $url_path = 'image-products/' . time() . '-' . $value['product_image_detail']->getClientOriginalName();
                        $file_name = time() . '-' . $value['product_image_detail']->getClientOriginalName();
                        $url_image = public_path('/image-products');
                        $value['product_image_detail']->move($url_image, $file_name);
                    } else {
                        $addProductImageold = ProductImage::find($value['idDataImage']);
                        $url_path = $addProductImageold->image;
                    }
                    $updateProductImage = ProductImage::find($value['idDataImage']);
                    $updateProductImage->update([
                        'image' => $url_path,
                        'product_id' => $product->id,
                        'color_id' => $value['color'],
                        'status' => $value['status_product_image'][0]]);
                    foreach ($value['product_parameter'] as $item) {
                        if (isset($item['idDataDetail'])) {
                            $updateProductDetail = ProductDetail::find($item['idDataDetail']);
                            $updateProductDetail->update([
                                'product_id' => $product->id,
                                'size_id' => $item['size'],
                                'product_image_id' => $value['idDataImage'],
                                'so_luong' => $item['detail_product-so-luong'],
                                'gia_ban' => $item['detail_product-gia-ban'],
                                'gia_nhap' => $item['detail_product-gia-nhap'],
                                'status' => $item['stautus_product_detail'][0],
                            ]);
                        } else {
                            $addDataProductDetail = ProductDetail::create([
                                'product_id' => $product->id,
                                'size_id' => $item['size'],
                                'product_image_id' => $value['idDataImage'],
                                'so_luong' => $item['detail_product-so-luong'],
                                'gia_ban' => $item['detail_product-gia-ban'],
                                'gia_nhap' => $item['detail_product-gia-nhap'],
                                'status' => $item['stautus_product_detail'][0],
                                'date_added' => $dateCreate
                            ]);
                        }
                    }
                } else {
                    $url_pathadd = '';
                    if (isset($value['product_image_detail'])) {
                        $url_pathadd = 'image-products/' . time() . '-' . $value['product_image_detail']->getClientOriginalName();
                        $file_name = time() . '-' . $value['product_image_detail']->getClientOriginalName();
                        $url_image = public_path('/image-products');
                        $value['product_image_detail']->move($url_image, $file_name);
                    }
                    $saveDataProductImage = ProductImage::create([
                        'image' => $url_pathadd,
                        'product_id' => $product->id,
                        'color_id' => $value['color'],
                        'status' => $value['status_product_image'][0]
                    ]);
                    foreach ($value['product_parameter'] as $item) {
                        $getProductImageId = $saveDataProductImage->id;
                        ProductDetail::create([
                            'product_id' => $product->id,
                            'size_id' => $item['size'],
                            'product_image_id' => $getProductImageId,
                            'so_luong' => $item['detail_product-so-luong'],
                            'gia_ban' => $item['detail_product-gia-ban'],
                            'gia_nhap' => $item['detail_product-gia-nhap'],
                            'status' => $item['stautus_product_detail'],
                            'date_added' => $dateCreate
                        ]);
                    }
                }
            }
        } else {
            return redirect()->route(product . index, $product->id);
        }
        return redirect()->route('product.index')->with('msg', 'Cập nhập sản phẩm thành công !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->product_detail()->delete();
        $product->product_image()->delete();
        $product->delete();
        return response()->json(['message' => "Xóa sản phẩm thành công"]);
    }
}
