<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maquina extends Model
{
    protected $table = 'maquinas';

    protected $fillable = [
        'codigo',
        'nombre',
        'modelo',
        'prioridad',
        'seccion_id',
    ];

    public function seccion(){
        return $this->belongsTo(Seccion::class);
    }

    // TODO : ¿Poner un HasMany de incidencias, un BelongsTo de secciones...?
}
