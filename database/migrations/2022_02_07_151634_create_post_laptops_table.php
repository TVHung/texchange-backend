<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostLaptopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_laptops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cpu');
            $table->string('gpu');
            $table->string('storage_type');
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')->references('id')->on('posts')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->string('color');
            $table->float('display_size');
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
        Schema::dropIfExists('post_laptops');
    }
}
