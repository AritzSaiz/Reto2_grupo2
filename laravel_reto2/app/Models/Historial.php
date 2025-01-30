<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Historial extends Model
{
    use SoftDeletes;

    protected $table = 'historiales';

    protected $fillable = [
        'incidencia_id',
        'tecnico_id',
        'entrada',
        'salida',
        'detalles_trabajo',
        'justificacion_salida'
    ];

    // Relación: Un historial pertenece a una incidencia
    public function incidencia(){
        return $this->belongsTo(Incidencia::class, 'incidencia_id');
    }

    // Relación: Un historial pertenece a un técnico
    public function tecnico(){
        return $this->belongsTo(Tecnico::class, 'tecnico_id');
    }
}
