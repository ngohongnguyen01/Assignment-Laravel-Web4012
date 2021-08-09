<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use DateTime;

class Product extends Model
{
    use SoftDeletes;

    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'products';
    protected $fillable = ['name', 'slug', 'descride', 'descride_detail', 'image', 'image_alt', 'price', 'status', 'view', 'like', 'highlight', 'date_add', 'cate_id'];

    public function addNewProduct($name, $descride, $descride_detail, $image, $image_alt, $price, $status, $highlight, $cate_id)
    {
        $data = new Product();
        $data->name = Str::title($name);
        $data->slug = Str::slug($name);
        $data->descride = $descride;
        $data->descride_detail = $descride_detail;
        $data->image = $image;
        $data->image_alt = $image_alt;
        $data->price = $price;
        $data->status = $status;
        $data->highlight = $highlight;
        $data->cate_id = $cate_id;
        $data->date_add = new DateTime();
        return $data->save();
    }

    public function updateNewProduct($name, $descride, $descride_detail, $image, $image_alt, $price, $status, $highlight, $cate_id, $id)
    {
        $data = Product::find($id);
        $data->name = Str::title($name);
        $data->slug = Str::slug($name);
        $data->descride = $descride;
        $data->descride_detail = $descride_detail;
        $data->image = $image;
        $data->image_alt = $image_alt;
        $data->price = $price;
        $data->status = $status;
        $data->highlight = $highlight;
        $data->cate_id = $cate_id;
        $data->date_add = new DateTime();
        return $data->save();
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'cate_id', 'id');
    }

    public function product_detail()
    {
        return $this->hasMany(ProductDetail::class, 'product_id', 'id');
    }

    public function product_image()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function manyProduct()
    {
        return $this->belongsToMany(ProductImage::class, ProductDetail::class, 'product_id', 'product_image_id');
    }

    public function manySize()
    {
        return $this->belongsToMany(Size::class, ProductDetail::class, 'product_id', 'size_id');
    }

    public function manyColor()
    {
        return $this->belongsToMany(Color::class, ProductImage::class, 'product_id', 'color_id');
    }

    public function filterProductCateId($cateId1, $orderName, $conditionSort)
    {
        return Product::where('status', '=', 1)
            ->where('cate_id', '=', $cateId1)
            ->orderBy($orderName, $conditionSort)
            ->get();
    }

    public function filterAllProduct($orderName,$conditionSort)
    {
            return Product::where('status', '=', 1)->orderBy($orderName, $conditionSort)->get();
    }

    public function filterHighlight(){
        return Product::where('status', '=', 1)->where('highlight','=','1')->get();
    }

    public function getComments(){
        return $this->hasMany(Comment::class,'product_id','id');
    }
}
