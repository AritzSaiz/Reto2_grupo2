<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
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

    // TODO : ¿Poner dos HasOne {de categorias e historiales}, un BelongsTo de operario...?
    public function categoria(){
        return $this->hasOne(Categoria::class);
    }

    public function historial(){
        return $this->hasMany(Historial::class);
    }

    public function operario(){
        return $this->belongsTo(Operario::class);
    }

    public function maquina(){
        return $this->belongsTo(Maquina::class);
    }
}
