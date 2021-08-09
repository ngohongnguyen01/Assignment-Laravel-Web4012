<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $fillable = ['name', 'numberPhone', 'status', 'product_id', 'rating', 'content'];

    public function commentProduct()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    static function getAllCommentOfProduct($id)
    {
        return Comment::where('status', '=', 1)->where('product_id', '=', $id)->orderBy('id','desc')->get();
    }
}
