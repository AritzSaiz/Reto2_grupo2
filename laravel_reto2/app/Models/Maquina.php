<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maquina extends Model
{
    protected $fillable = [
        'codigo',
        'nombre',
        'modelo',
        'prioridad',

    ];
}
