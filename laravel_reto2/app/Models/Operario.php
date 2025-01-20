<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operario extends Model
{
    protected $fillable = [
        'nombre',
        'apellidos',
        'email',
        'usuario',
        'contraseña',
    ];
}
