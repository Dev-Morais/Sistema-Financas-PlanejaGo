<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {

    Route::controller(LoginController::class)->group(function() {
        Route::get('/auth/login', 'index')->name('login.index');
        Route::post('/login', 'store')->name('login.store');
    });

    Route::get('/auth/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    
});

Route::middleware('auth')->group(function () {
    Route::get('/home', [LoginController::class, 'index'])->name('user.home');

    Route::post('/logout', [LoginController::class, 'destroy'])->name('login.destroy');
});