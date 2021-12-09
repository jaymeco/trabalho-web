<?php

namespace App\Http\Controllers;

use App\Models\Escola;
use App\Models\Funcionario;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class TecnicoController extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  public function createEscola(Request $request)
  {
    $body = $request->validate([
      'nome' => 'required',
      'email' => 'required',
      'endereco' => 'required',
      'telefone' => 'required',
      'loginFuncionario' => 'required',
      'senhaFuncionario' => 'required',
    ]);
    try {
      $escola = Escola::create($body);
      $user = User::create([
        'username' => $body['loginFuncionario'],
        'password' => Hash::make($body['senhaFuncionario'], [
          'rounds' => 10,
        ]),
      ]);
      $funcionario = Funcionario::create([
        'username' => $body['loginFuncionario'],
        'escola_id' => $escola->id,
        'user_id' => $user->id,
      ]);

      return redirect()->route('tecnico.index')
        ->with('success', 'Escola e funcionario cadastrados com sucesso!');
    } catch (\Throwable $th) {
      return redirect()->route('tecnico.index')
        ->with('error', 'Falha ao cadastrar escola ou funcionario!');
    }
  }
}
