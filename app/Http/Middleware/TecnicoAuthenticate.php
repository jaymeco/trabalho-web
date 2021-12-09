<?php

namespace App\Http\Middleware;

use App\Models\Aluno;
use Closure;

class TecnicoAuthenticate
{
  /**
   * Get the path the user should be redirected to when they are not authenticated.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return string|null
   */
  public function handle($request, Closure $next)
  {
    $userName = auth()->user()->username;

    if ($userName == 'tecnico.main') {
      return $next($request);
    }

    return back()->with('error', 'Você não tem permissão de acessar esse recurso!');
  }
}
