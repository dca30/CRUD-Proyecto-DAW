<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory;
    protected $fillable = [
        'ingreso_c_b',
        'ingreso_aso',
        'ingreso_chapas',
        'ingreso_guinote',
        'ingreso_patrocinio',
        'gasto_premios',
        'gasto_tickets',
        'gasto_c_b',
        'gasto_disco',
        'gasto_juegos',
        'notas',
        'year',
        'fechas'
    ];
}
