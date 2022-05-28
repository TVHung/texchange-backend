<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

Route::group([], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']); 
    Route::post('/change-pass', [AuthController::class, 'changePassWord']);  
    Route::get('/profile-user', [ProfileController::class, 'getProfile']);
    Route::post('/set-block-user/{id}', [UserController::class, 'setBlockUser']);
    Route::post('/set-admin-user/{id}', [UserController::class, 'setAdminUser']);
});