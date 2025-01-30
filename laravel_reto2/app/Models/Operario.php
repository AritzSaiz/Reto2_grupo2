<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Operario extends Model
{
    use SoftDeletes;

    protected $table = 'operarios';

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
