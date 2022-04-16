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
            $table->bigInteger('post_trade_id')->nullable();
            $table->string('title');
            $table->string('name');
            $table->string('description');
            $table->integer('ram')->nullable();
            $table->integer('storage')->nullable();
            $table->string('status');
            $table->float('price');
            $table->string('address');
            $table->string('video_url')->nullable();
            $table->smallInteger('public_status');
            $table->smallInteger('sold');
            $table->integer('guarantee');
            $table->string('cpu')->nullable();
            $table->string('gpu')->nullable();
            $table->string('storage_type')->nullable();
            $table->integer('brand_id')->nullable();
            $table->string('color')->nullable();
            $table->float('display_size')->nullable();
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
