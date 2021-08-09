<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table ='posts';
    protected $primaryKey = 'id';
    protected $fillable =['title','short_description','content','image','image_alt','day_add','status','highlight','slug'];
}
