<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellidos',
        'numero',
        'email',
        'domicilio',
        'cuota'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->applyCustomConnection();
    }

    public function applyCustomConnection()
    {
        $this->connection = (auth()->check() && auth()->user()->id === 1) ? 'pgsql' : 'pgsql_low';
    }
}
