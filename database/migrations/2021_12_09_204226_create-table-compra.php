<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCompra extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('compra', function (Blueprint $table) {
      $table->id();
      $table->string('data');
      $table->string('valor');
      $table->bigInteger('aluno_id')->unsigned();
      $table->foreign('aluno_id')
        ->references('id')
        ->on('aluno');
      $table->bigInteger('produto_id')->unsigned();
      $table->foreign('produto_id')
        ->references('id')
        ->on('produto');
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
    Schema::dropIfExists('compra');
  }
}
