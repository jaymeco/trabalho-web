<?php

namespace App\Http\Middleware;

use App\Models\Aluno;
use Closure;

class AlunoAuthenticate
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

    $isAluno = Aluno::whereUser($userId)->exists();

    if ($isAluno) {
      return $next($request);
    }

    return back()->with('error', 'Você não tem permissão de acessar esse recurso!');
  }
}
