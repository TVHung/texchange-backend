<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;

Route::post('/upload', [FileUploadController::class, 'storeUploads']);       
Route::post('/upload-video', [FileUploadController::class, 'storeUploadVideos']);       
