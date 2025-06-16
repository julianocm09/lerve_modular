<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cartaoponto extends Model
{
      protected $table = 'cartaoponto';

    protected $fillable = [
        'data',
        'dia_da_semana',
        'hora_entrada',
        'hora_entrada_almoco',
        'hora_saida_almoco',
        'hora_saida',
        'hora_extra_entrada',
        'hora_extra_saida',
        'hora_trabalhadas',
    ];
}
