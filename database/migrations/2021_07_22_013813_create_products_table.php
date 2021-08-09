<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('slug');
                $table->text('descride');
                $table->string('descride_detail');
                $table->string('image');
                $table->string('image_alt');
                $table->integer('price');
                $table->integer('status')->default(1);
                $table->integer('view')->default(0);
                $table->integer('like')->default(0);
                $table->integer('highlight')->default(0);
                $table->date('date_add');
                $table->unsignedBigInteger('cate_id');
                $table->softDeletes();
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
