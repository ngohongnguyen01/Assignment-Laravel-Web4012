<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='invoice';
    protected $fillable=['name','phone','address','status','sumMoney','sumAmount','date_add'];


    public function detailInvoice(){

    }
}
