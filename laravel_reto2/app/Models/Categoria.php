<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = [
        'nombre',
    ];

    // Relación: Una categoría tiene muchas incidencias
    public function incidencias(){
        return $this->hasMany(Incidencia::class);
    }
}
