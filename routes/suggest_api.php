<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuggestController;

Route::group(['middleware' => 'auth'], function() {
    Route::get('/suggest-name/{category_id}', [SuggestController::class, 'suggestName']);  
    Route::get('/suggest-color/{category_id}', [SuggestController::class, 'suggestColor']);  
    Route::get('/suggest-cpu', [SuggestController::class, 'suggestCpu']);  
    Route::get('/suggest-gpu', [SuggestController::class, 'suggestGpu']);
    Route::get('/suggest-display-size/{category_id}', [SuggestController::class, 'suggestDisplaySize']);
});
