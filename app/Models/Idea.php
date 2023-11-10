<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'description',
        'tematica',
        'creador',
        'vista',
        'anonimo',
    ];}
