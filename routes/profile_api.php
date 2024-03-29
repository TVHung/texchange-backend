<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::apiResource('profiles', ProfileController::class);
Route::group(['middleware' => 'auth'], function() {
    Route::get('/profile-user', [ProfileController::class, 'getProfile']);  
    Route::post('/profile-user', [ProfileController::class, 'createProfile']);  
    Route::put('/profile-user', [ProfileController::class, 'updateProfileUser']);  
    Route::post('/change-avatar', [ProfileController::class, 'changeAvatar']);       
});

// Verb          Path                        Action  Route Name
// GET           /users                      index   users.index
// POST          /users                      store   users.store
// GET           /users/{user}               show    users.show
// PUT|PATCH     /users/{user}               update  users.update
// DELETE        /users/{user}               destroy users.destroy