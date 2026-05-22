<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

// 1. Tela de apresentação / Landing Page (Pública)
Route::get('/', [HomeController::class, 'index'])->name('home');

// 2. Rotas para usuários NÃO logados (Visitantes)
Route::middleware('guest')->group(function () {

    Route::controller(LoginController::class)->group(function() {
        Route::get('/auth/login', 'index')->name('login.index');
        Route::post('/login', 'store')->name('login.store');
    });

    Route::get('/auth/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    
});

// 3. Rotas de autenticação (Com erro mitigado)
Route::middleware('auth')->group(function () {
    // Se o LoginController der erro, pelo menos não trava a calculadora
    if (class_exists(LoginController::class)) {
        Route::get('/home', [LoginController::class, 'index'])->name('user.home');
        Route::post('/logout', [LoginController::class, 'destroy'])->name('login.destroy');
    }
});

// 4. ROTA DA CALCULADORA ISOLADA (Totalmente segura contra erros de Controller)
Route::get('/calculadora', function () {
    return view('home.calculadora');
})->name('calculadora');