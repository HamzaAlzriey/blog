
<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CommentController::class, 'index'])->name('comment.index');
Route::get('/create', [CommentController::class, 'create'])->name('comment.create');
Route::post('/store', [CommentController::class, 'store'])->name('comment.store');
Route::delete('/{comment}/destroy', [CommentController::class, 'destroy'])->name('comment.destroy');
Route::get('/{comment}/edit', [CommentController::class, 'edit'])->name('comment.edit');
Route::put('/{comment}/update', [CommentController::class, 'update'])->name('comment.update');
Route::get('/{comment}/show', [CommentController::class, 'show'])->name('comment.show');


