<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $fillable = [
        'codigo',
        'nombre',
        'campus_id',
    ];

    protected $table = 'secciones';
}
