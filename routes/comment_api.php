<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;

Route::group(['middleware' => 'auth'], function() {
    // Route::apiResource('comments', CommentController::class);
    Route::post('/comments', [CommentController::class, 'store']); //api crud product
    Route::delete('/comments/{id}', [CommentController::class, 'destroy']);       
    Route::put('/comments/{id}', [CommentController::class, 'update']);       
});

Route::get('/comments/{id}', [CommentController::class, 'show']);       
Route::get('/comments/products/{id}', [CommentController::class, 'getCommentProduct']);     //comment of product  
// Verb          Path                        Action  Route Name
// GET           /comments                      index   comments.index
// POST          /comments                      store   comments.store
// GET           /comments/{comment_id}               show    comments.show
// PUT|PATCH     /comments/{comment_id}               update  comments.update
// DELETE        /comments/{comment_id}               destroy comments.destroy