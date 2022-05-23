<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::apiResource('posts', PostController::class); //api crud post
Route::get('/posts-recently', [PostController::class, 'getRecentlyPosts']);       
Route::get('/my-posts', [PostController::class, 'getMyPosts']);       
Route::get('/user-posts/{id}', [PostController::class, 'getUserPosts']);       
Route::get('/recommend-posts', [PostController::class, 'getRecommendPosts']);       
Route::get('/get-post-edit/{id}', [PostController::class, 'getPostEdit']);       
Route::get('/get-post-category/{id}', [PostController::class, 'getCategoryPosts']);       
Route::post('/set-block', [PostController::class, 'setBlockPost']);       