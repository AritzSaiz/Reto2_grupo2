<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    protected $fillable = [
        'nombre',
        'apellidos',
        'email',
        'usuario',
        'contrasena',
        'disponibilidad',
        'especialidad',
        'admin',
        'operario_id'
    ];

    public function operario(){
        return $this->belongsTo(Operario::class);
    }
}
