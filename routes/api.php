<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostMobileController;
use App\Http\Controllers\PostLaptopController;
use App\Http\Controllers\PostPcController;

Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']); 
    Route::post('/change-pass', [AuthController::class, 'changePassWord']);       
});

// Route::prefix('posts')->group(function () {
//     Route::get('/', [PostController::class, 'index']);
//     Route::post('/', [PostController::class, 'store']);
//     Route::get('/{id}', [ProductController::class, 'show']);
//     Route::post('/{id}/edit', [ProductController::class, 'update']);
//     Route::post('/{id}/delete', [ProductController::class, 'destroy']);
// });
Route::apiResource('posts', PostController::class); //api crud post
Route::apiResource('post-mobile', PostMobileController::class); //api crud post mobile
Route::apiResource('post-laptop', PostLaptopController::class); //api crud post laptop
Route::apiResource('post-pc', PostPcController::class); //api crud post pc

Route::prefix('admin')->group(function () {
    Route::get('/users', [UserController::class, 'index']);
});