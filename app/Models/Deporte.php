<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deporte extends Model
{
    protected $table = 'deportes';

    protected $fillable = [
        'nombre',
        'descripcion',
        'categoria',
        'pais_origen',
        'cantidad_jugadores',
        'estado'
    ];
}
