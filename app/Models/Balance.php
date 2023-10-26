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
        'gasto_premios',
        'gasto_tickets',
        'gasto_c_b',
        'gasto_disco',
        'year'
    ];
}
