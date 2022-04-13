<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::group([], function () {
    // Route::apiResource('profiles', ProfileController::class);
    Route::get('/profile-user', [ProfileController::class, 'getProfile']);  
    Route::post('/profile-user', [ProfileController::class, 'store']);  
    Route::put('/profile-user', [ProfileController::class, 'updateProfileUser']);  
});