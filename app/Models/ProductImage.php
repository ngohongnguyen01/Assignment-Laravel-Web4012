<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImage extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'product_image';
    protected $fillable = ['image', 'product_id', 'color_id', 'status'];



    public function updateProductImage($image, $product_id, $color_id, $status, $id)
    {
        $addProductImage = ProductImage::find($id);
        $addProductImage->image = $image;
        $addProductImage->product_id = $product_id;
        $addProductImage->status = $status;
        $addProductImage->color_id = $color_id;
        return $addProductImage->save();
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }


    public function product_details()
    {
        return $this->hasMany(ProductDetail::class, 'product_image_id', 'id');
    }

}
