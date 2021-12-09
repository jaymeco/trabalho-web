<?php

namespace App\Http\Controllers;

use App\Models\Responsavel;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;

class ResponsavelController extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  public function createResponsavel(Request $request)
  {
    try {
      $body = $request->validate([
        'nome' => 'required',
        'cpf' => 'required',
        'telefone' => 'required',
        'email' => 'required',
        'login' => 'required',
        'senha' => 'required',
      ]);
      $user = User::create([
        'username' => $body['login'],
        'password' => Hash::make($body['senha'], [
          'rounds' => 10,
        ]),
      ]);
      Responsavel::create([
        'nome' => $body['nome'],
        'cpf' => $body['cpf'],
        'telefone' => $body['telefone'],
        'email' => $body['email'],
        'user_id' => $user->id,
        'escola_id' => 11,
      ]);

      return redirect()->route('funcionario.adicionarResponsavel')
        ->with('success', 'Responsável adicionado com sucesso!');
    } catch (\Throwable $th) {
      return redirect()->route('funcionario.adicionarResponsavel')
        ->with('error', 'Falha ao adicionar responsável!');
    }
  }

  public function getResponsaveis(Request $request)
  {
    try {
      $responsaveis = Responsavel::where('escola_id', 11)
        ->get();

      return view('funcionario.listarResponsaveis.index', [
        'responsaveis' => $responsaveis,
      ]);
    } catch (\Throwable $th) {
      return redirect()->route('funcionario.responsavel.index')
        ->with('error', 'Falha ao carregar responsáveis!');
    }
  }

  public function getResponsavel(Request $request, int $responsavelId)
  {
    try {
      $responsavel = Responsavel::where('id', $responsavelId)
        ->get()->first();

      return view('funcionario.editarResponsavel.index', [
        'responsavel' => $responsavel,
      ]);
    } catch (\Throwable $th) {
      return redirect()->route('funcionario.editarResponsavel')
        ->with('error', 'Falha ao carregar o responsável!');
    }
  }

  public function updateResponsavel(Request $request, int $responsavelId)
  {
    try {
      $body = $request->validate([
        'nome' => 'required',
        'email' => 'required',
        'cpf' => 'required',
        'telefone' => 'required',
      ]);
      $responsavel = Responsavel::where('id', $responsavelId)
        ->update($body);

      return redirect()->route('funcionario.responsavel.index')
        ->with('success', 'Responsavel editado com sucesso!');
    } catch (\Throwable $th) {
      return redirect()->route('funcionario.responsavel.index')
        ->with('error', 'Falha ao editar responsável!');
    }
  }
}
