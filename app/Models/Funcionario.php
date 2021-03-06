<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Funcionario extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'username',
    'escola_id',
    'user_id',
  ];

  protected $table = 'funcionario';
  protected $primaryKey = 'id';
  public $incrementing = true;

  public function escola()
  {
    return $this->belongsTo(Escola::class, 'escola_id');
  }

  public function scopeWhereUser($query, $id)
  {
    return $query->where('user_id', $id);
  }
}
