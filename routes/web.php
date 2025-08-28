<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\MovimentacaoController;

// Página inicial redireciona para produtos
Route::get('/', function () {
    return redirect()->route('produtos.index');
});

// Rotas de CRUD
Route::resource('categorias', CategoriaController::class);
Route::resource('produtos', ProdutoController::class);
Route::resource('movimentacoes', MovimentacaoController::class)->only(['index','create','store']);
