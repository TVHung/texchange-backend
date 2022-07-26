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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->smallInteger('is_trade');
            $table->string('title', 255);
            $table->string('name', 255);
            $table->string('description', 500);
            $table->integer('ram')->nullable();
            $table->integer('storage')->nullable();
            $table->smallInteger('status');
            $table->float('price');
            $table->string('address', 255);
            $table->string('video_url', 255)->nullable();
            $table->smallInteger('public_status');
            $table->smallInteger('sold');
            $table->integer('guarantee');
            $table->smallInteger('is_block');
            $table->integer('view');
            $table->integer('command');
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
