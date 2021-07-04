<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('user.index');
Route::post('/store', [UserController::class, 'store'])->name('user.store');
Route::get('/{user}/edit', [UserController::class, 'edit'])->name('user.edit');

Route::get('/live_search/action',[UserController::class, 'action'])->name('live_search.action');
// Route::post('/user/search',[UserController::class, 'search'])->name('search');

// Route::post('/search', function () {
//         return "Oday";
// });
Route::post('/search', [UserController::class, 'search'])->name('user.search');

Route::get('/{user}/admin', [UserController::class, 'admin'])->name('user.admin');
