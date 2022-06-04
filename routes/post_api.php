<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::apiResource('posts', PostController::class); //api crud post
Route::post('/posts/{id}', [PostController::class, 'update']); //api crud post
Route::get('/post-manager', [PostController::class, 'all']);       
Route::get('/posts-recently', [PostController::class, 'getRecentlyPosts']);       
Route::get('/posts-has-trade', [PostController::class, 'getPostHasTrade']);       
Route::get('/my-posts', [PostController::class, 'getMyPosts']);       
Route::get('/user-posts/{id}', [PostController::class, 'getUserPosts']);       
Route::get('/recommend-posts', [PostController::class, 'getRecommendPosts']);       
Route::get('/get-post-edit/{id}', [PostController::class, 'getPostEdit']);       
Route::get('/get-post-category/{id}', [PostController::class, 'getCategoryPosts']);       
Route::post('/set-block-post/{id}', [PostController::class, 'setBlockPost']);       
Route::post('/search', [PostController::class, 'filter']);
