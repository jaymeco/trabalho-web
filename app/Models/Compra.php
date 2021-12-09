<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Compra extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'data',
    'valor',
    'produto_id',
    'aluno_id',
  ];

  protected $hidden = [
    'created_at',
    'updated_at',
  ];

  protected $table = 'compra';
  protected $primaryKey = 'id';
  public $incrementing = true;

  public function produto()
  {
    return $this->hasOne(Produto::class, 'id');
  }

  public function aluno()
  {
    return $this->belongsTo(Aluno::class, 'aluno_id');
  }
}
