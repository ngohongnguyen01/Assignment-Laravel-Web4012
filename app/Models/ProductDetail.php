<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DateTime;
class ProductDetail extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table ='product_detail';
 protected $fillable=['product_id','size_id','product_image_id','so_luong','status','date_added','gia_ban','gia_nhap'];

 public function addProductDetail($product_id,$size_id,$product_image_id,$so_luong,$gia_ban,$gia_nhap,$status){
     $addProductDetail = new ProductDetail();
     $addProductDetail->product_id = $product_id;
     $addProductDetail->size_id = $size_id;
     $addProductDetail->product_image_id = $product_image_id;
     $addProductDetail->so_luong = $so_luong;
     $addProductDetail->gia_nhap = $gia_nhap;
     $addProductDetail->gia_ban = $gia_ban;
     $addProductDetail->status = $status;
     $addProductDetail->date_added = new DateTime();
     return $addProductDetail->save();

 }

    public function updateProductDetail($product_id,$size_id,$product_image_id,$so_luong,$gia_ban,$gia_nhap,$status,$id){
        $addProductDetail =  ProductDetail::find($id);
        $addProductDetail->product_id = $product_id;
        $addProductDetail->size_id = $size_id;
        $addProductDetail->product_image_id = $product_image_id;
        $addProductDetail->so_luong = $so_luong;
        $addProductDetail->gia_nhap = $gia_nhap;
        $addProductDetail->gia_ban = $gia_ban;
        $addProductDetail->status = $status;
        $addProductDetail->date_added = new DateTime();
        return $addProductDetail->save();

    }
    public function products(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function size(){
        return $this->belongsTo(Size::class,'size_id','id');

    }
    public function productImage(){
        return $this->belongsTo(ProductImage::class,'product_image_id','id');
    }

    /*public function manyProduct()
    {
        return $this->belongsToMany(Color::class, ProductDetail::class, 'product_id', 'product_image_id');
    }*/
}
