
<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


Route::get('/', [CategoryController::class, 'index'])->name('category.index');
Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/{category}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/{category}/update', [CategoryController::class, 'update'])->name('category.update');
Route::get('/{category}/show', [CategoryController::class, 'show'])->name('category.show');
Route::get('/{category}/cat/post', [CategoryController::class, 'getallpostcat'])->name('category.getallpostcat');
Route::get('/cat/allcategory', [CategoryController::class, 'show_all'])->name('category.allcategory');


