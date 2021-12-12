<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Compra;
use App\Models\Produto;
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

  public function verHistorico(Request $request, int $alunoId)
  {
    try {
      $historico = Compra::where('aluno_id', $alunoId)
        ->with('aluno')
        ->get()->map(function ($compra) {
          $produto = Produto::where('id', $compra->produto_id)->first();
          $collection = collect($compra);
          return $collection->merge([
            'produto' => $produto,
          ]);
        });

      return view('responsavel.verHistorico.index', ['historico' => $historico]);
    } catch (\Throwable $th) {
      return redirect()->route('responsavel.alunos')
        ->with('error', 'Falha ao visualizar o historico do aluno! ' . $th->getMessage());
    }
  }
}
