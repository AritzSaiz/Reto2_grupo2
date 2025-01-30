<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tecnico extends Model
{
    use SoftDeletes;

    protected $table = 'tecnicos';

    protected $fillable = [
        'operario_id',
        'especialidad',
        'admin',
        'operario_id'
    ];

    public function operario(){
        return $this->belongsTo(Operario::class, 'operario_id');
    }

    public function historial(){
        return $this->hasMany(Historial::class);
    }
}
