<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LancamentoController;
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

    Route::get('/lancamentos', [LancamentoController::class, 'index'])->name('user.lancamentos');

    Route::post('/lancamentos/despesa', [LancamentoController::class, 'criaDespesa'])->name('lancamentos.criaDespesa');

    Route::post('/lancamentos/atualizar-status/{id}', [LancamentoController::class, 'atualizarStatus'])->name('lancamentos.atualizarStatus');

    Route::post('/lancamentos/receita', [LancamentoController::class, 'criaReceita'])->name('lancamentos.criaReceita');
    
    Route::post('/logout', [LoginController::class, 'destroy'])->name('login.destroy');
});