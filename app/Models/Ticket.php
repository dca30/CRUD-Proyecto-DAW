<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'tickets_totales_cubata',
        'tickets_comprados_cubata',
        'precio_ticket_cubata',
        'tickets_totales_cerveza',
        'tickets_comprados_cerveza',
        'precio_ticket_cerveza',
        'tickets_totales_agua_refresco',
        'tickets_comprados_agua_refresco',
        'precio_ticket_agua_refresco',
        'tickets_totales_bocadillo',
        'tickets_comprados_bocadillo',
        'precio_ticket_bocadillo',
        'tickets_totales_copa',
        'tickets_comprados_copa',
        'precio_ticket_copa',
        'tickets_totales_litro_cerveza',
        'tickets_comprados_litro_cerveza',
        'precio_ticket_litro_cerveza',
        'year'
    ];
}
