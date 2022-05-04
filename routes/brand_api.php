<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;

Route::apiResource('brands', BrandController::class); //api crud post
Route::get('/get-by-category/{category_id}', [BrandController::class, 'getByCategory']);       

// Verb          Path                        Action  Route Name
// GET           /users                      index   users.index
// POST          /users                      store   users.store
// GET           /users/{user}               show    users.show
// PUT|PATCH     /users/{user}               update  users.update
// DELETE        /users/{user}               destroy users.destroy