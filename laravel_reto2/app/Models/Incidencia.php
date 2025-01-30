<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Incidencia extends Model
{
    use SoftDeletes;

    protected $table = 'incidencias';

    protected $fillable = [
        "titulo",
        "descripcion",
        "abierta",
        "gravedad",
        "categoria_id",
        "operario_id",
        "maquina_id",
    ];

    // Relación: Una incidencia pertenece a una categoría
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    // Relación: Una incidencia tiene muchas filas en el historial
    public function historial(){
        return $this->hasMany(Historial::class);
    }

    // Relación: Una incidencia pertenece a un operario
    public function operario(){
        return $this->belongsTo(Operario::class);
    }

    // Relación: Una incidencia pertenece a una máquina
    public function maquina(){
        return $this->belongsTo(Maquina::class);
    }
}
