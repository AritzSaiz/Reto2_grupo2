<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operario extends Model
{
    protected $table = 'operarios';

    protected $fillable = [
        'nombre',
        'apellidos',
        'email',
        'usuario',
        'contrasena',
    ];

    // TODO : ¿Poner un HasOne de tecnico?
}
