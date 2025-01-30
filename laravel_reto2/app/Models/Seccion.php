<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seccion extends Model
{
    use SoftDeletes;

    protected $table = 'secciones';

    protected $fillable = [
        'codigo',
        'nombre',
        'campus_id',
    ];

    public function maquinas(){
        return $this->hasMany(Maquina::class);
    }

    public function campus(){
        return $this->belongsTo(Campus::class, 'campus_id');
    }
}
