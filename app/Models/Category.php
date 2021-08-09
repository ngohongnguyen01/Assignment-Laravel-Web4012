<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table ='categories';

    protected $primaryKey = 'id';
    protected $fillable = ['name_cate','slug','image','image_describe','status','date_add'];
    public function products()
    {
        return $this->hasMany(Product::class,'cate_id','id');
    }
}
