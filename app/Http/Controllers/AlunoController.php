<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Deposito;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;

class AlunoController extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  public function createAluno(Request $request)
  {
    try {
      $responsavel = auth()->user()->responsavel;

      $body = $request->validate([
        'nome' => 'required',
        'turma' => 'required',
        'email' => 'required',
        'turno' => 'required',
        'telefone' => 'required',
        'matricula' => 'required',
        'login' => 'required',
        'senha' => 'required',
      ]);
      $user = User::create([
        'username' => $body['login'],
        'password' => Hash::make($body['senha'], [
          'rounds' => 10,
        ]),
      ]);

      $aluno = Aluno::create([
        'nome' => $body['nome'],
        'turma' => $body['turma'],
        'email' => $body['email'],
        'turno' => $body['turno'],
        'saldo' => 0,
        'telefone' => $body['telefone'],
        'matricula' => $body['matricula'],
        'login' => $body['login'],
        'senha' => $body['senha'],
        'user_id' => $user->id,
        'escola_id' => $responsavel->escola_id,
        'responsavel_id' => $responsavel->id,
      ]);

      return redirect()->route('responsavel.adicionar.aluno.execute')
        ->with('success', 'Aluno adicionado com sucesso');
    } catch (\Throwable $th) {
      return redirect()->route('responsavel.adicionar.aluno.execute')
        ->with('error', 'Falha ao adicionar aluno!');
    }
  }

  public function getAlunos(Request $request)
  {
    try {
      $responsavelId = auth()->user()->responsavel->id;
      $alunos = Aluno::where('responsavel_id', $responsavelId)
        ->get();

      return view('responsavel.listagemAlunos.index', ['alunos' => $alunos]);
    } catch (\Throwable $th) {
      return redirect()->route('responsavel.alunos')
        ->with('error', 'Falha ao adicionar aluno');
    }
  }

  public function getAluno(Request $request, int $alunoId)
  {
    try {
      $aluno = Aluno::where('id', $alunoId)
        ->get()
        ->first();

      return view('responsavel.editarAluno.index', ['aluno' => $aluno]);
    } catch (\Throwable $th) {
      return redirect()->route('responsavel.editarAluno.execute')
        ->with('error', 'Falha ao adicionar aluno!');
    }
  }

  public function consultarSaldoToAluno(Request $request)
  {
    try {
      $userId = auth()->id();
      $aluno = Aluno::where('user_id', $userId)
        ->first();

      return view('alunos.saldo.index', ['aluno' => $aluno]);
    } catch (\Throwable $th) {
      //throw $th;
    }
  }

  public function consultarDepositoToAluno(Request $request)
  {
    try {
      $alunoId = auth()->user()->aluno->id;
      $depositos = Deposito::where('aluno_id', $alunoId)
        ->get();

      return view('alunos.extratoDepositos.index', ['depositos' => $depositos]);
    } catch (\Throwable $th) {
      //throw $th;
    }
  }

  public function consultarSaldoToFuncionario(Request $request)
  {
    try {
      $body = $request->validate([
        'alunoId' => 'required',
      ]);
      $aluno = Aluno::where('id', $body['alunoId'])
        ->get()->first();
      $escolaId = auth()->user()->funcionario->escola_id;
      $alunos = Aluno::where('escola_id', $escolaId)->get();
      return view('funcionario.alunos.index', ['aluno' => $aluno, 'alunos' => $alunos]);
    } catch (\Throwable $th) {
      //throw $th;
    }
  }

  public function getAlunoSaldoToFuncionario(Request $request)
  {
    try {
      $escolaId = auth()->user()->funcionario->escola_id;
      $aluno = Aluno::where('escola_id', $escolaId)->get();

      return view('funcionario.alunos.index', ['alunos' => $aluno]);
    } catch (\Throwable $th) {
      return redirect()->route('funcionario.alunos.index')
        ->with('error', 'Falha ao listar alunos!');
    }
  }

  public function getAlunoDeposito(Request $request)
  {
    try {
      $responsavelId = auth()->user()->responsavel->id;
      $aluno = Aluno::where('responsavel_id', $responsavelId)
        ->get();

      return view('responsavel.extratoDepositos.index', ['alunos' => $aluno, 'depositos' => []]);
    } catch (\Throwable $th) {
      return redirect()->route('responsavel.extratoDepositos.index')
        ->with('error', 'Falha ao listar alunos!');
    }
  }

  public function updateAluno(Request $request, int $alunoId)
  {
    try {
      $body = $request->validate([
        'nome' => 'required',
        'turma' => 'required',
        'email' => 'required',
        'turno' => 'required',
        'telefone' => 'required',
        'matricula' => 'required',
      ]);

      $aluno = Aluno::where('id', $alunoId)
        ->update($body);

      return redirect()->route('responsavel.editarAluno.execute', ['alunoId' => $alunoId])
        ->with('success', 'Sucesso ao editar aluno!');
    } catch (\Throwable $th) {
      return redirect()->route('responsavel.editarAluno.execute')
        ->with('error', 'Falha ao editar aluno!', ['alunoId' => $alunoId]);
    }
  }
}
