<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::group(['middleware' => 'auth'], function() {
    Route::post('/products/{id}', [ProductController::class, 'update']); //api crud product
    Route::get('/my-products', [ProductController::class, 'getMyProducts']);       
    Route::get('/get-product-edit/{id}', [ProductController::class, 'getProductEdit']);       
});
Route::group(['middleware' => 'auth-admin'], function() {
    Route::get('/product-manager', [ProductController::class, 'all']);       
    Route::post('/set-block-product/{id}', [ProductController::class, 'setBlockProduct']);      
    Route::get('/most-view', [ProductController::class, 'getMostView']);       
    Route::get('/dashboard-recently-product', [ProductController::class, 'getRecentlyDashboard']);       
    Route::get('/view-static', [ProductController::class, 'getViewStatic']);       
});
Route::apiResource('products', ProductController::class); //api crud product
Route::get('/products-recently', [ProductController::class, 'getRecentlyProducts']);       
Route::get('/products-has-trade', [ProductController::class, 'getProductHasTrade']);       
Route::get('/user-products/{id}', [ProductController::class, 'getUserProducts']);       
Route::get('/recommend-products', [ProductController::class, 'getRecommendProducts']);       
Route::get('/get-product-category/{id}', [ProductController::class, 'getCategoryProducts']);       
Route::get('/up-view/{id}', [ProductController::class, 'upView']);       
Route::post('/search', [ProductController::class, 'filter']);
