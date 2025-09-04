<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdController;

// Público: página de login
Route::get('/',        [AuthController::class, 'showLogin'])->name('login.form');
Route::get('/login',   [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login',  [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Privado
Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('ads', AdController::class);
});


