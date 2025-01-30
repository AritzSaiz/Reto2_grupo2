<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mantenimiento extends Model
{
    use SoftDeletes;

    protected $table = 'mantenimientos_preventivos';

    protected $fillable = [
        "titulo",
        "descripcion",
        "dias",
    ];
}
