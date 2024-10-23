<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\CommentController;

Route::middleware('auth')->group(function () {
    Route::get('/posts', [ApiController::class, 'index']);
    Route::post('/posts', [ApiController::class, 'store']);
    Route::get('/posts/{id}', [ApiController::class, 'show']);
    Route::put('/posts/{id}', [ApiController::class, 'update']);
    Route::delete('/posts/{id}', [ApiController::class, 'destroy']);

    Route::post('/posts/{id}/comments', [CommentController::class, 'store']);
    Route::get('/posts/{id}/comments', [CommentController::class, 'index']);
    Route::put('/comments/{commentId}', [CommentController::class, 'update']);
    Route::delete('/comments/{commentId}', [CommentController::class, 'destroy']);
});
