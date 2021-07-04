
<?php

use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;


Route::get('/', [TagController::class, 'index'])->name('tag.index');
Route::get('/create', [TagController::class, 'create'])->name('tag.create');
Route::post('/store', [TagController::class, 'store'])->name('tag.store');
Route::get('/{tag}/destroy', [TagController::class, 'destroy'])->name('tag.destroy');
Route::get('/{tag}/edit', [TagController::class, 'edit'])->name('tag.edit');
Route::put('/{tag}/update', [TagController::class, 'update'])->name('tag.update');
Route::get('/{tag}/show', [TagController::class, 'show'])->name('tag.show');

Route::get('/tag/alltag', [TagController::class, 'show_all'])->name('tag.alltag');
