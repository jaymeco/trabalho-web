<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProduto extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('produto', function (Blueprint $table) {
      $table->id();
      $table->string('codigo');
      $table->string('nome');
      $table->string('foto');
      $table->string('preco');
      $table->boolean('is_block_aluno');
      $table->boolean('is_block_produto');
      $table->string('tipo');
      $table->string('ingredientes');
      $table->string('fornecedor');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('produto');
  }
}
