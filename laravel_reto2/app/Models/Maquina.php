<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Maquina extends Model
{
    use SoftDeletes;

    protected $table = 'maquinas';

    protected $fillable = [
        'codigo',
        'nombre',
        'modelo',
        'prioridad',
        'seccion_id',
    ];

    // Relación: Una máquina tiene muchas incidencias
    public function incidencias(){
        return $this->hasMany(Incidencia::class);
    }

    // Relación: Una máquina pertenece a una sección
    public function seccion(){
        return $this->belongsTo(Seccion::class, 'seccion_id');
    }

    // Relación: Una máquina puede estar asociada con muchos mantenimientos preventivos
    public function mantenimientosPreventivos(){
        return $this->belongsToMany(Mantenimiento::class, 'mantenimientos_maquinas')
            ->withPivot('ultima_revision', 'siguiente_revision', 'incidencia_id')
            ->withTimestamps();
    }
}
