<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Funcionario;
use App\Models\Responsavel;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AuthController extends BaseController
{
  // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  public function login(Request $request)
  {
    $body = $request->validate([
      'login' => 'required',
      'password' => 'required',
    ]);
    $credentials = [
      'username' => $body['login'],
      'password' => $body['password'],
    ];

    if (Auth::guard('web')->attempt($credentials)) {
      $user = auth()->user();
      if ($user->username == 'tecnico.main') {
        return redirect()->route('tecnico.index');
      }

      if (Funcionario::where('user_id', $user->id)->exists()) {
        return redirect()->route('funcionario.index');
      }

      if (Aluno::where('user_id', $user->id)->exists()) {
        return redirect()->route('aluno.saldo.index');
      }

      if (Responsavel::where('user_id', $user->id)->exists()) {
        return redirect()->route('responsavel.alunos');
      }

      return redirect()->route('tecnico.index');
    }

    return redirect()->route('login.index')->with('error', 'Usuário ou senha estão invalidos.');
  }

  public function logout()
  {
    Auth::logout();

    return redirect()->route('login.index');
  }
}
