<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='banners';
    protected $primaryKey ='id';
    protected $fillable =['image','title','title_image','image_alt','status','date_add'];
}
