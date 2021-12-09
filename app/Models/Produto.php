<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Produto extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'codigo',
    'nome',
    'foto',
    'preco',
    'is_block_aluno',
    'is_block_produto',
    'tipo',
    'ingredientes',
    'fornecedor',
  ];

  protected $hidden = [
    'created_at',
    'updated_at',
  ];

  protected $table = 'produto';
  protected $primaryKey = 'id';
  public $incrementing = true;
}
