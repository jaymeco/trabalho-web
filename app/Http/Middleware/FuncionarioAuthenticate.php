<?php

namespace App\Http\Middleware;

use App\Models\Funcionario;
use Closure;

class FuncionarioAuthenticate
{
  /**
   * Get the path the user should be redirected to when they are not authenticated.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return string|null
   */
  public function handle($request, Closure $next)
  {
    $userId = auth()->id();

    $isFuncionario = Funcionario::whereUser($userId)->exists();

    if ($isFuncionario) {
      return $next($request);
    }

    return back()->with('error', 'Você não tem permissão de acessar esse recurso!');
  }
}
