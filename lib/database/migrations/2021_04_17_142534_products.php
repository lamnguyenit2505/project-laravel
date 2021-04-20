<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_products', function (Blueprint $table) {
            $table->id('pro_id');
            $table->string('pro_name');
            $table->string('pro_slug');
            $table->integer('pro_price');
            $table->string('pro_img');
            $table->string('pro_warranty');
            $table->string('pro_accessories');
            $table->string('pro_condition');
            $table->string('pro_promotion');
            $table->tinyInteger('pro_status');
            $table->text('pro_descri');
            $table->tinyInteger('pro_featured');
            $table->unsignedBigInteger('pro_cate');
            $table->foreign('pro_cate')
                  ->references('cate_id')
                  ->on('vp_categories')  
                  ->onDelete('cascade');
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
        Schema::dropIfExists('vp_products');
    }
}
