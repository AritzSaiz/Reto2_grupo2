<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $table = 'historiales';

    protected $fillable = [
        'incidencia_id',
        'tecnico_id',
        'entrada',
        'salida',
        'detalles_trabajo',
        'justificacion_salida'
    ];

    // TODO : ¿Poner dos BelongsTo de incidencias y de tecnicos?
}
