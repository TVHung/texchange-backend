<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->smallInteger('is_trade');
            $table->string('title', 100);
            $table->string('name', 100);
            $table->string('description', 255);
            $table->integer('ram')->nullable();
            $table->integer('storage')->nullable();
            $table->smallInteger('status');
            $table->float('price');
            $table->string('address', 100);
            $table->string('video_url', 255)->nullable();
            $table->smallInteger('public_status');
            $table->smallInteger('sold');
            $table->integer('guarantee');
            $table->string('cpu', 50)->nullable();
            $table->string('gpu', 50)->nullable();
            $table->smallInteger('storage_type')->nullable();
            $table->integer('brand_id')->nullable();
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->string('color', 30)->nullable();
            $table->float('display_size')->nullable();
            $table->smallInteger('is_block');
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
        Schema::dropIfExists('posts');
    }
}
