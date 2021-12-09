<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ProdutoController extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  public function createProduto(Request $request)
  {
    $body = $request->all();

    if ($body['flag'] == 'comida' && !isset($body['ingrediente_1'])) {
      return redirect()->route('funcionario.adicionar.produto')
        ->with('error', 'Você precisa adicionar pelo menos um ingrediente!');
    }

    if ($body['flag'] == 'bebida' && !isset($body['fornecedor'])) {
      return redirect()->route('funcionario.adicionar.produto')
        ->with('error', 'Você precisa adicionar pelo menos um ingrediente!');
    }
    $ingredientes = $body;
    $hiddenBody = ['preco', 'nome', 'codigo', 'foto', 'flag', '_token'];
    foreach ($hiddenBody as $value) {
      unset($ingredientes[$value]);
    }

    try {
      $ingredientes = implode(',', $ingredientes);

      if ($body['flag'] == 'comida') {
        Produto::create([
          'codigo' => $body['codigo'],
          'nome' => $body['nome'],
          'foto' => $body['foto'],
          'preco' => $body['preco'],
          'is_block_aluno' => false,
          'is_block_produto' => true,
          'tipo' => 'comida',
          'fornecedor' => '',
          'ingredientes' => $ingredientes,
        ]);
      }
      if ($body['flag'] == 'bebida') {
        Produto::create([
          'codigo' => $body['codigo'],
          'nome' => $body['nome'],
          'foto' => $body['foto'],
          'preco' => $body['preco'],
          'is_block_aluno' => false,
          'is_block_produto' => true,
          'tipo' => 'bebida',
          'fornecedor' => $body['fornecedor'],
          'ingredientes' => '',
        ]);
      }
      return redirect()->route('funcionario.adicionar.produto')
        ->with('success', 'O produto foi adicionado com sucesso!');
    } catch (\Throwable $th) {
      return redirect()->route('funcionario.adicionar.produto')
        ->with('error', 'Falha ao adicionar o produto');
    }
  }

  public function bloquearProduto(Request $request, int $produtoId)
  {
    $update = Produto::where('id', $produtoId)->update([
      'is_block_produto' => true
    ]);

    return redirect()->route('funcionario.index');
  }

  public function desbloquearProduto(Request $request, int $produtoId)
  {
    // dd($produtoId);
    $update = Produto::where('id', $produtoId)->update([
      'is_block_produto' => false
    ]);

    return redirect()->route('funcionario.index');
  }

  public function getProdutos(Request $request)
  {
    try {
      $produtos = Produto::all();

      return view('funcionario.listarProdutos.index', [
        'produtos' => $produtos,
      ]);
    } catch (\Throwable $th) {
      return redirect()->route('funcionario.index')
        ->with('error', 'Falha ao carregar os produtos');
    }
  }

  public function upadateProduto(Request $request, int $produtoId)
  {
    $body = $request->all();
    try {
      if (!isset($body['fornecedor'])) {
        $update = Produto::where('id', $produtoId)->update([
          'codigo' => $body['codigo'],
          'nome' => $body['nome'],
          'preco' => $body['preco'],
          'ingredientes' => $body['ingredientes'],
        ]);
      } else {
        $update = Produto::where('id', $produtoId)->update([
          'codigo' => $body['codigo'],
          'nome' => $body['nome'],
          'preco' => $body['preco'],
          'fornecedor' => $body['fornecedor'],
        ]);
      }

      return redirect()->route('funcionario.index')
        ->with('success', 'Produto editado com sucesso!');
    } catch (\Throwable $th) {
      return redirect()->route('funcionario.index')
        ->with('error', 'Falha ao editar o produto!');
    }
  }

  public function getProdutosOnlyActives(Request $request)
  {
    try {
      $produtos = Produto::where([
        'is_block_aluno' => false,
        'is_block_produto' => false
      ])
        ->get();

      return view('alunos.comprarProdutos.index', [
        'produtos' => $produtos,
      ]);
    } catch (\Throwable $th) {
      return redirect()->route('aluno.saldo.index')
        ->with('error', 'Falha ao carregar os produtos!');
    }
  }
}
