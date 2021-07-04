
<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('post.index');
Route::get('/create', [PostController::class, 'create'])->name('post.create');
Route::post('/store', [PostController::class, 'store'])->name('post.store');
Route::delete('/{post}/destroy', [PostController::class, 'destroy'])->name('post.destroy');
Route::get('/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::put('/{post}/update', [PostController::class, 'update'])->name('post.update');
Route::get('/{post}/show', [PostController::class, 'show'])->name('post.show');
Route::get('/show_all', [PostController::class, 'show_all'])->name('post.show_all');

Route::get('/{post}/active', [PostController::class, 'active'])->name('post.active');


