<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductWishListController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ResetPasswordController;

Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {
    require_once('user_api.php');    
});
Route::apiResource('users', UserController::class);
Route::apiResource('product-image', ProductImageController::class); //api crud product image
Route::apiResource('wish-list', ProductWishListController::class); //api crud wish list

Route::prefix('admin')->group(function () {
    Route::get('/users', [UserController::class, 'index']);
});
// Google Sign In
Route::post('/get-google-sign-in-url', [GoogleController::class, 'getGoogleSignInUrl']);
Route::get('/callback', [GoogleController::class, 'loginCallback']);

//reset password
Route::post('reset-password', [ResetPasswordController::class, 'sendMail']);
Route::put('reset-password/{token}', [ResetPasswordController::class, 'reset']);

require_once('profile_api.php');  
require_once('product_api.php');  
require_once('brand_api.php');  
require_once('media_api.php');
require_once('comment_api.php');

// Verb          Path                        Action  Route Name
// GET           /users                      index   users.index
// POST          /users                      store   users.store
// GET           /users/{user}               show    users.show
// PUT|PATCH     /users/{user}               update  users.update
// DELETE        /users/{user}               destroy users.destroy
