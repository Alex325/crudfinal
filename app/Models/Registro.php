<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Registro extends Model
{
  use HasFactory;
  use HasUuids;

  protected $fillable = [
    'titulo',
    'texto',
    'frase_do_dia',
    'cor'
  ];

  public function usuario(): BelongsTo
  {
    return $this->belongsTo(Usuario::class, 'id_usuario');
  }
}
