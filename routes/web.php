<?php

use App\Http\Controllers\AlunoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepositoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ResponsavelController;
use App\Http\Controllers\TecnicoController;
use App\Models\Responsavel;
use Illuminate\Support\Facades\Hash;

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
  // dd(Hash::check('password', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'));
  return view('login.index');
})->name('login.index');
Route::post('/', [AuthController::class, 'login'])->name('login.execute');

Route::post('/logout', [AuthController::class, 'logout'])
  ->middleware('auth')->name('logout.execute');

Route::get('/Tecnico/escola/cadastrar', function () {
  return view('cadastrarEscola.index');
})->middleware('auth')->name('tecnico.index');

Route::post('/Tecnico/escola/cadastrar', [TecnicoController::class, 'createEscola'])
  ->middleware('auth')->name('tecnico.cadastro');

Route::prefix('Funcionario')->group(function () {
  Route::get('/', [ProdutoController::class, 'getProdutos'])
    ->middleware('auth')->name('funcionario.index');

  Route::get('/produtos/adicionar', function () {
    return view('funcionario.adicionarProduto.index')->with('initialFlag', 'comida');
  })->middleware('auth')->name('funcionario.adicionar.produto');

  Route::post('/produtos/{produtoId}/desbloquear', [ProdutoController::class, 'desbloquearProduto'])
    ->middleware('auth')->name('funcionario.desbloquear.produto');

  Route::post('/produtos/{produtoId}/bloquear', [ProdutoController::class, 'bloquearProduto'])
    ->middleware('auth')->name('funcionario.bloquear.produto');

  Route::post('/produtos/adicionar', [ProdutoController::class, 'createProduto'])
    ->middleware('auth')->name('funcionario.adicionar.produto.execute');

  Route::put('/produtos/{produtoId}/editar', [ProdutoController::class, 'upadateProduto'])
    ->middleware('auth')->name('funcionario.editar.produto');

  Route::prefix('responsaveis')->group(function () {
    Route::get('/', [ResponsavelController::class, 'getResponsaveis'])
      ->middleware('auth')->name('funcionario.responsavel.index');

    Route::get('/adicionar', function () {
      return view('funcionario.adicionarResponsavel.index');
    })->middleware('auth')->name('funcionario.adicionarResponsavel');

    Route::post('/adicionar', [ResponsavelController::class, 'createResponsavel'])
      ->middleware('auth')->name('funcionario.adicionarResponsavel.execte');

    Route::get('/{responsavelId}/editar', [ResponsavelController::class, 'getResponsavel'])
      ->middleware('auth')->name('funcionario.editarResponsavel');

    Route::put('/{responsavelId}/editar', [ResponsavelController::class, 'updateResponsavel'])
      ->middleware('auth')->name('funcionario.editarResponsavel.execte');
  });

  Route::get('/alunos', function () {
    return view('funcionario.alunos.index');
  });
});

Route::prefix('Responsavel')->group(function () {
  Route::get('/', [AlunoController::class, 'getAlunos'])
    ->middleware('auth')->name('responsavel.alunos');

  Route::prefix('alunos')->group(function () {
    Route::get('/produtos/bloquear', function () {
      return view('responsavel.bloquearProdutos.index');
    })->middleware('auth');

    Route::get('/adicionar', function () {
      return view('responsavel.adicionarAluno.index');
    })->middleware('auth');
    Route::post('/adicionar', [AlunoController::class, 'createAluno'])
      ->middleware('auth')->name('responsavel.adicionar.aluno.execute');

    Route::get('/historico', function () {
      return view('responsavel.verHistorico.index');
    });
    Route::get('/{alunoId}/editar', [AlunoController::class, 'getAluno'])
      ->middleware('auth')->name('responsavel.editar.aluno');

    Route::put('/{alunoId}/editar', [AlunoController::class, 'updateAluno'])
      ->middleware('auth')->name('responsavel.editarAluno.execute');

    Route::post('/{alunoId}/depositar', [DepositoController::class, 'realizarDeposito'])
      ->middleware('auth')->name('responsavel.depositarAluno.execute');

    Route::get('/depositos', [AlunoController::class, 'getAlunoDeposito'])
      ->middleware('auth')->name('reponsavel.depostos.aluno');

    Route::get('/depositos/consultado', [DepositoController::class, 'getDepositosByAluno'])
      ->middleware('auth')->name('responsavel.consultar.deposito');
    Route::post('/depositos/consultado', [DepositoController::class, 'getDepositosByAluno'])
      ->middleware('auth')->name('responsavel.consultar.deposito');
  });
});

Route::prefix('Aluno')->group(function () {
  Route::get('/', [AlunoController::class, 'consultarSaldoToAluno'])
    ->middleware('auth')->name('aluno.saldo.index');
  Route::get('/produtos/comprar', function () {
    return view('alunos.comprarProdutos.index');
  });
  Route::get('/depositos', [AlunoController::class, 'consultarDepositoToAluno'])
    ->middleware('auth')->name('aluno.depositos.index');
});
