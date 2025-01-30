<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use SoftDeletes;

    protected $table = 'categorias';

    protected $fillable = [
        'nombre',
    ];

    // Relación: Una categoría tiene muchas incidencias
    public function incidencias(){
        return $this->hasMany(Incidencia::class);
    }
}
