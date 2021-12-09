<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Aluno extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'nome',
    'turma',
    'email',
    'turno',
    'saldo',
    'user_id',
    'telefone',
    'escola_id',
    'responsavel_id',
    'matricula',
  ];

  protected $hidden = [
    'created_at',
    'updated_at',
  ];

  protected $table = 'aluno';
  protected $primaryKey = 'id';
  public $incrementing = true;

  public function scopeWhereUser($query, $id)
  {
    return $query->where('user_id', $id);
  }
}
