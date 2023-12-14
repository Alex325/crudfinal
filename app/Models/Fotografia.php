<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fotografia extends Model
{
  use HasFactory;
  use HasUuids;

  protected $fillable = [
    'titulo',
    'referencia',
    'legenda',
    'data_da_foto'
  ];

}
