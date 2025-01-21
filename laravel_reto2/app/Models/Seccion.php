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

    public function maquinas(){
        return $this->hasMany(Maquina::class);
    }

    public function campus(){
        return $this->belongsTo(Campus::class);
    }
}
