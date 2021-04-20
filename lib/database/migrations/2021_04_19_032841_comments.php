<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Comments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_comments', function (Blueprint $table) {
            $table->id('com_id');
            $table->string('com_email');
            $table->string('com_content');
            $table->unsignedBigInteger('com_product');
            $table->foreign('com_product')
                  ->references('pro_id')
                  ->on('vp_products')
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
        Schema::dropIfExists('vp_comments');
    }
}
