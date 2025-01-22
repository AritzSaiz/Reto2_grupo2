<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    protected $fillable = [
        "descripcion",
        "abierta",
        "categoria_id",
        "gravedad",
        "operario_id",
        "maquina_id",

    ];

}
