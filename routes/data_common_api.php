<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommonController;

Route::get('/fixed-data', [CommonController::class, 'allDataCommon']);
