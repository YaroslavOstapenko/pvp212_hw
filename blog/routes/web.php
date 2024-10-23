<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::middleware(['auth'])->group(function () {
    Route::resource('posts', ApiController::class);
    Route::get('/posts/{id}/delete', [ApiController::class, 'confirmDelete'])->name('posts.confirmDelete');

    Route::post('/posts/{postId}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{commentId}/{postId}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
