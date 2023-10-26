<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory;
    protected $fillable = [
        'bebida_comida_beneficio',
        'aportacion_asociacion',
        'premios_gasto',
        'tickets_gasto',
        'bebida_comida_gasto',
        'discomovil_coste',
        'year'
    ];
}
