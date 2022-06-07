<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostTradeController;

Route::group(['middleware' => 'auth'], function() {
    Route::apiResource('post-trades', PostTradeController::class); //api crud post
});     