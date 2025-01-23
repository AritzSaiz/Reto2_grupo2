<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $fillable = ['incidencia_id', 'tecnico_id', 'entrada','salida',"detalles_trabajo","justificacion_salida"];


    protected $table = 'historiales';

}
