<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Size extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'sizes';
    protected $fillable = ['name', 'slug', 'detail', 'status'];

    public function product_detail()
    {
        return $this->belongsTo(ProductDetail::class, 'size_id', 'id');
    }

    public function getAllSize()
    {
        return Size::where('status', '=', 1)->get();
    }
}
