<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fotografia extends Model
{
  use HasFactory;

  protected $fillable = [
    'id',
    'titulo',
    'referencia',
    'legenda',
    'data_da_foto'
  ];

  public function usuario(): BelongsTo
  {
    return $this->belongsTo(Usuario::class, 'id_usuario');
  }
}
