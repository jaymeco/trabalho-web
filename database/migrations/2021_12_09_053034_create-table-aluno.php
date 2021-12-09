<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAluno extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('aluno', function (Blueprint $table) {
      $table->id();
      $table->string('nome');
      $table->string('email');
      $table->string('telefone');
      $table->string('turno');
      $table->string('turma');
      $table->float('saldo');
      $table->string('matricula')->unique();
      $table->bigInteger('escola_id')->unsigned();
      $table->foreign('escola_id')
        ->references('id')
        ->on('escola');
      $table->bigInteger('user_id')->unsigned();
      $table->foreign('user_id')
        ->references('id')
        ->on('users');
      $table->bigInteger('responsavel_id')->unsigned();
      $table->foreign('responsavel_id')
        ->references('id')
        ->on('responsavel');
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
    Schema::dropIfExists('aluno');
  }
}
