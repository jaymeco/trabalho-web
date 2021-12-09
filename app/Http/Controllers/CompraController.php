<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Compra;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class CompraController extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  public function realizarCompra(Request $request, int $produtoId)
  {
    try {
      $alunoSaldo = auth()->user()->aluno->saldo;
      $alunoId = auth()->user()->aluno->id;

      $body = $request->validate([
        'valor' => 'required',
      ]);
      if ($alunoSaldo < intval($body['valor'])) {
        return redirect()->route('aluno.comprar.produtos')
          ->with('error', 'Você não possui saldo suficiente para realizar a compra!');
      }

      $compra = Compra::create([
        'data' => Carbon::now()->toDateString(),
        'valor' => $body['valor'],
        'produto_id' => $produtoId,
        'aluno_id' => $alunoId,
      ]);

      $aluno = Aluno::where('id', $alunoId)->update([
        'saldo' => ($alunoSaldo - intval($body['valor'])),
      ]);

      return redirect()->route('aluno.comprar.produtos')
        ->with('success', 'Produto comprado com sucess!');
    } catch (\Throwable $th) {
      return redirect()->route('aluno.comprar.produtos')
        ->with('error', 'Falha ao comprar produto!');
    }
  }
}