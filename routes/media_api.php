<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;

Route::group(['middleware' => ['auth']], function() {
    Route::post('/upload', [FileUploadController::class, 'storeUploads']);       
    Route::post('/upload-video', [FileUploadController::class, 'storeUploadVideos']);       
});
