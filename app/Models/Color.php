<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'colors';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'slug', 'value', 'status', 'detail', 'date_add'];

    public function getColor(){
        return $this->belongsTo(ProductImage::class,'color_id','id');
    }

    public function getAllColor(){
        return Color::where('status','=',1)->get();
    }

    static function getOneColor($id){
        return Color::where('id','=',$id)->get();
    }
}
