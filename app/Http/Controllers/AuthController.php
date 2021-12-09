<?php

namespace App\Http\Controllers;

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
      $user = User::where('username', $body['login'])->get()->first();
      if ($user->username == 'tecnico.main') {
        return redirect()->route('tecnico.index');
      }
    }

    return redirect()->route('login.index')->with('error', 'Usuário ou senha estão invalidos.');
  }

  public function logout()
  {
    Auth::logout();

    return redirect()->route('login.index');
  }
}
