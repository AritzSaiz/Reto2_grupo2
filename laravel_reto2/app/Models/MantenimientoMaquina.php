<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MantenimientoMaquina extends Model
{
    protected $table = 'mantenimientos_maquinas';

    protected $fillable = [
        "mantenimiento_id",
        "maquina_id",
        "ultima_revision",
        "siguiente_revision",
        "incidencia_id"

    ];

    // TODO : ¿Poner dos BelongsTo de mantenimientos_preventivos y de maquinas?
}
