<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDeposito extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('deposito', function (Blueprint $table) {
      $table->id();
      $table->string('data');
      $table->string('valor');
      $table->bigInteger('aluno_id')->unsigned();
      $table->foreign('aluno_id')
        ->references('id')
        ->on('aluno');
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
    Schema::dropIfExists('deposito');
  }
}
