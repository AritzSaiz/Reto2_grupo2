<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    protected $table = 'mantenimientos_preventivos';

    protected $fillable = [
        "periodicidad",
        "inicio_ultima_revision",
        "fin_ultima_revision",
        "dias",
        "siguiente_revision",
        "maquina_id"
    ];
}
