<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProductImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_image',function (Blueprint $table){
            $table->dropColumn('ten_mau');
            $table->dropColumn('slug');
            $table->dropColumn('ma_mau');
            $table->unsignedBigInteger('color_id')->after('product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_image',function (Blueprint $table){
            $table->string('ten_mau');
            $table->string('ma_mau');
            $table->string('slug');
            $table->dropColumn('color_id');
        });
    }
}
