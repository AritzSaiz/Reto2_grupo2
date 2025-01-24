<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operario extends Model
{
    protected $fillable = [
        'nombre',
        'apellidos',
        'email',
        'usuario',
        'contrasena',
    ];

    public function tecnico()
    {
        return $this->hasOne(Tecnico::class);
    }
}
