<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    protected $fillable = [
        'nombre',
        'apellidos',
        'email',
        'usuario',
        'contraseña',
        'disponibilidad',
        'especialidad',
        'admin',
    ];
}
