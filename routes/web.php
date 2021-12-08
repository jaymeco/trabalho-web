<?php

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

Route::get('/', function () {
  return view('login.index');
});

Route::get('/escola/cadastrar', function () {
  return view('cadastrarEscola.index');
});

Route::prefix('Funcionario')->group(function () {
  Route::get('/', function () {
    return view('funcionario.listarProdutos.index');
  });
  Route::get('/produtos/adicionar', function () {
    return view('funcionario.adicionarProduto.index');
  });
  Route::prefix('responsaveis')->group(function () {
    Route::get('/', function () {
      return view('funcionario.listarResponsaveis.index');
    });
    Route::get('/adicionar', function () {
      return view('funcionario.adicionarResponsavel.index');
    });
    Route::get('/editar', function () {
      return view('funcionario.editarResponsavel.index');
    });
  });
  Route::get('/alunos', function () {
    return view('funcionario.alunos.index');
  });
});

Route::prefix('Responsavel')->group(function () {
  Route::get('/', function () {
    return view('responsavel.listagemAlunos.index');
  });
  Route::prefix('alunos')->group(function () {
    Route::get('/produtos/bloquear', function () {
      return view('responsavel.bloquearProdutos.index');
    });
    Route::get('/adicionar', function () {
      return view('responsavel.adicionarAluno.index');
    });
    Route::get('/historico', function () {
      return view('responsavel.verHistorico.index');
    });
    Route::get('/editar', function () {
      return view('responsavel.editarAluno.index');
    });
    Route::get('/depositos', function () {
      return view('responsavel.extratoDepositos.index');
    });
  });
});

Route::prefix('Aluno')->group(function () {
  Route::get('/', function () {
    return view('alunos.saldo.index');
  });
  Route::get('/produtos/comprar', function () {
    return view('alunos.comprarProdutos.index');
  });
  Route::get('/depositos', function () {
    return view('alunos.extratoDepositos.index');
  });
});
