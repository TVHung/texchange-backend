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
            $table->bigInteger('post_trade_id');
            $table->string('title');
            $table->string('name');
            $table->string('description');
            $table->integer('ram');
            $table->integer('storage_id');
            $table->foreign('storage_id')->references('id')->on('storages');
            $table->integer('status_id');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->float('price');
            $table->integer('address_id');
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->smallInteger('public_status');
            $table->integer('guarantee');
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
