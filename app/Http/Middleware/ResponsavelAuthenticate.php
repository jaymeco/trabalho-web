<?php

namespace App\Http\Middleware;

use App\Models\Responsavel;
use Closure;

class ResponsavelAuthenticate
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

    $isResponsavel = Responsavel::whereUser($userId)->exists();

    if ($isResponsavel) {
      return $next($request);
    }

    return back()->with('error', 'Você não tem permissão de acessar esse recurso!');
  }
}
