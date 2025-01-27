<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    protected $table = 'tecnicos';

    protected $fillable = [
        'operario_id',
        'especialidad',
        'admin',
        'operario_id'
    ];

    public function operario(){
        return $this->belongsTo(Operario::class);
    }

    public function historial(){
        return $this->hasMany(Historial::class);
    }
}
