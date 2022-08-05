<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/profile-user', [ProfileController::class, 'getProfile']);

Route::group(['middleware' => 'auth'], function() {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']); 
    Route::post('/change-pass', [AuthController::class, 'changePassWord']);  
});

Route::group(['middleware' => 'auth-admin'], function() {
    Route::post('/set-admin-user/{id}', [UserController::class, 'setAdminUser']);
    Route::post('/set-block-user/{id}', [UserController::class, 'setBlockUser']);
    Route::get('/user-recently', [UserController::class, 'getRecentlyDashboard']);
    Route::get('/new-user-static', [UserController::class, 'newUserStatic']);
});