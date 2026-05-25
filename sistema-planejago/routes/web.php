<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LancamentoController;
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

Route::get('/calculadora', function () {
    // Verifica se o usuário está logado
    if (!auth()->check()) {
        // Se não estiver, redireciona para a tela de login (ajuste o caminho se necessário)
        return redirect()->route('login.index');
    }
  
    return view('home.calculadora');
})->name('calculadora');


    Route::get('/lancamentos', [LancamentoController::class, 'index'])->name('user.lancamentos');

    Route::post('/lancamentos/despesa', [LancamentoController::class, 'criaDespesa'])->name('lancamentos.criaDespesa');

    Route::post('/lancamentos/atualizar-status/{id}', [LancamentoController::class, 'atualizarStatus'])->name('lancamentos.atualizarStatus');

    Route::post('/lancamentos/receita', [LancamentoController::class, 'criaReceita'])->name('lancamentos.criaReceita');
    
  

  
