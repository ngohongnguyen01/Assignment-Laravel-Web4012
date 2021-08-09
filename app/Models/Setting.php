<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use SoftDeletes;
    protected $table ='settings';

    use HasFactory;
    protected $primaryKey='id';
    protected $fillable=['key','value','status','date_add'];
}
