<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableFuncionario extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('funcionario', function (Blueprint $table) {
      $table->id();
      $table->string('username');
      $table->bigInteger('escola_id')->unsigned();
      $table->foreign('escola_id')
        ->references('id')
        ->on('escola');
      $table->bigInteger('user_id')->unsigned();
      $table->foreign('user_id')
        ->references('id')
        ->on('users');
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
    Schema::dropIfExists('funcionario');
  }
}
