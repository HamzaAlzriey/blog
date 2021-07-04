<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('login/google', [LoginController::class,'redirectToProvider'])->name('login.google');
Route::get('login/google/callback', [LoginController::class,'handleProviderCallback']);

Route::get('/',[HomeController::class,'index'])->name('home_');
Route::get('{post}/show', [HomeController::class, 'show'])->name('h_show');
Route::get('{post}/getpostcat', [HomeController::class, 'getpostcat'])->name('getpostcat');
Route::get('{post}/getposttag', [HomeController::class, 'getposttag'])->name('getposttag');


Auth::routes();

Route::prefix('comment')->group(function () {
Route::get('/', [CommentController::class, 'index'])->name('comment.index');
Route::get('/create', [CommentController::class, 'create'])->name('comment.create');
Route::post('/store', [CommentController::class, 'store'])->name('comment.store');
Route::delete('/{comment}/destroy', [CommentController::class, 'destroy'])->name('comment.destroy');
Route::get('/{comment}/edit', [CommentController::class, 'edit'])->name('comment.edit');
Route::put('/{comment}/update', [CommentController::class, 'update'])->name('comment.update');
Route::get('/{comment}/show', [CommentController::class, 'show'])->name('comment.show');
});

Route::prefix('post')->group(function () {
Route::get('/create', [PostController::class, 'create'])->name('post.create');
Route::post('/store', [PostController::class, 'store'])->name('post.store');
Route::delete('/{post}/destroy', [PostController::class, 'destroy'])->name('post.destroy');
Route::get('/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::put('/{post}/update', [PostController::class, 'update'])->name('post.update');
Route::get('/{post}/show', [PostController::class, 'show'])->name('post.show');

});