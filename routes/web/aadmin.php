
<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class, 'index'])->name('post.index');
Route::get('post/show_all', [PostController::class, 'show_all'])->name('post.show_all');

Route::prefix('tag')->group(function () {
    Route::get('/', [TagController::class, 'index'])->name('tag.index');
    Route::get('/create', [TagController::class, 'create'])->name('tag.create');
    Route::post('/store', [TagController::class, 'store'])->name('tag.store');
    Route::get('/{tag}/destroy', [TagController::class, 'destroy'])->name('tag.destroy');
    Route::get('/{tag}/edit', [TagController::class, 'edit'])->name('tag.edit');
    Route::get('/update', [TagController::class, 'update'])->name('tag.update');
    Route::get('/{tag}/show', [TagController::class, 'show'])->name('tag.show');
    Route::get('/alltag', [TagController::class, 'show_all'])->name('tag.alltag');
});

Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/{category}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::GET('/update', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/{category}/show', [CategoryController::class, 'show'])->name('category.show');
    Route::get('/allcategory', [CategoryController::class, 'show_all'])->name('category.allcategory');

});
Route::prefix('active')->group(function () {
    Route::get('/{post}/active', [PostController::class, 'active'])->name('post.active');
});

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('user.edit');

    Route::get('/live_search/action', [UserController::class, 'action'])->name('live_search.action');
    Route::post('/user/search', [UserController::class, 'search'])->name('search');

    Route::get('/{user}/admin', [UserController::class, 'admin'])->name('user.admin');
});
