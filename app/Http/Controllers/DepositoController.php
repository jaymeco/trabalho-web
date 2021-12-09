<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Deposito;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class DepositoController extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  public function realizarDeposito(Request $request, $alunoId)
  {
    try {
      $body = $request->validate([
        'valor' => 'required',
      ]);

      $alunoA = Aluno::where('id', $alunoId)
        ->get()
        ->first();

      $deposito = Deposito::create([
        'valor' => $body['valor'],
        'data' => Carbon::now()->toDateString(),
        'aluno_id' => $alunoId,
        'responsavel_id' => 2,
      ]);

      $alunoB = Aluno::where('id', $alunoId)->update([
        'saldo' => intval($alunoA->saldo) + $deposito->valor
      ]);

      return redirect()->route('responsavel.alunos')
        ->with('success', 'Deposito feito com sucesso!');
    } catch (\Throwable $th) {
      return redirect()->route('responsavel.alunos')
        ->with('error', 'Falha ao realizar deposito! ' . $th->getMessage());
    }
  }

  public function getDepositosByAluno(Request $request)
  {
    try {
      $body = $request->validate([
        'alunoId' => 'required',
      ]);
      $responsavelId = auth()->user()->responsavel->id;
      $alunos = Aluno::where('responsavel_id', $responsavelId)
        ->get();

      $depositos = Deposito::where('aluno_id', $body['alunoId'])->get();

      return view('responsavel.extratoDepositos.index', ['depositos' => $depositos, 'alunos' => $alunos]);
    } catch (\Throwable $th) {
      //throw $th;
    }
  }
}
