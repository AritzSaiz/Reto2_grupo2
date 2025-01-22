<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    protected $table = 'mantenimientos_preventivos';

    protected $fillable = [
        "descripcion",
        "dias",
        "primera_revision",
        "maquina_id"
    ];
}
