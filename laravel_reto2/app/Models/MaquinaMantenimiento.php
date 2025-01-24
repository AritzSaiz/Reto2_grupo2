<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaquinaMantenimiento extends Model {




    protected $table = 'mantenimientos_maquinas';

    protected $fillable = [
        "mantenimiento_id",
        "maquina_id",
    ];



}
