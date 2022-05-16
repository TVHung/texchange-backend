<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostTradeController;

Route::apiResource('post-trades', PostTradeController::class); //api crud post