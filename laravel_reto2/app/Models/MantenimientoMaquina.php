<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MantenimientoMaquina extends Model
{
    use HasFactory;

    protected $table = 'mantenimientos_maquinas';

    protected $fillable = [
        "mantenimiento_id",
        "maquina_id",
        "ultima_revision",
        "siguiente_revision",
        "incidencia_id"
    ];


    public function mantenimiento(): BelongsTo
    {
        return $this->belongsTo(Mantenimiento::class, 'mantenimiento_id');
    }


    public function maquina(): BelongsTo
    {
        return $this->belongsTo(Maquina::class, 'maquina_id');
    }


    public function incidencia(): BelongsTo
    {
        return $this->belongsTo(Incidencia::class, 'incidencia_id');
    }
}
