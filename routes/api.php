<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostMobileController;
use App\Http\Controllers\PostLaptopController;
use App\Http\Controllers\PostPcController;
use App\Http\Controllers\PostImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\PostWishListController;

Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {
    require_once('user_api.php');    
});
Route::apiResource('users', UserController::class);
Route::apiResource('posts', PostController::class); //api crud post
Route::apiResource('post-mobile', PostMobileController::class); //api crud post mobile
Route::apiResource('post-laptop', PostLaptopController::class); //api crud post laptop
Route::apiResource('post-pc', PostPcController::class); //api crud post pc
Route::apiResource('post-image', PostImageController::class); //api crud post image
Route::apiResource('wish-list', PostWishListController::class); //api crud wish list
Route::post('/upload', [FileUploadController::class, 'storeUploads']);       

Route::post('/search', [PostController::class, 'filter']);

Route::prefix('admin')->group(function () {
    Route::get('/users', [UserController::class, 'index']);
});
require_once('profile_api.php');  

// Verb          Path                        Action  Route Name
// GET           /users                      index   users.index
// POST          /users                      store   users.store
// GET           /users/{user}               show    users.show
// PUT|PATCH     /users/{user}               update  users.update
// DELETE        /users/{user}               destroy users.destroy

