<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campus extends Model
{
    use SoftDeletes;

    protected $table = 'campus';

    protected $fillable = [
        "codigo",
        "nombre",
        "direccion",
        "codigo_postal",
        "telefono",
        "email",
    ];

    public function secciones(){
        return $this->hasMany(Seccion::class);
    }
}
