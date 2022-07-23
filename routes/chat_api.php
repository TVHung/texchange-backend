<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

Route::group(['middleware' => 'auth'], function() {
    Route::post('/send-message', [ChatController::class, 'sendMessage']);
    Route::post('/all-message', [ChatController::class, 'getAllMessBoxChat']);
    Route::get('/my-conversations', [ChatController::class, 'getMyListConversation']);
    Route::delete('/messages/{id}', [ChatController::class, 'deleteMessage']);     
    Route::delete('/delete-conversation/{id}', [ChatController::class, 'deleteConversation']);     
});