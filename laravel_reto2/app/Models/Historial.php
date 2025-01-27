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
    public function incidencia(){
        return $this->belongsTo(Incidencia::class, 'incidencia_id');
    }

    public function tecnico(){
        return $this->belongsTo(Tecnico::class, 'tecnico_id');
    }
}
