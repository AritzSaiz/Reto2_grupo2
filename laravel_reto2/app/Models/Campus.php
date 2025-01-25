<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $table = 'campus';
    protected $fillable = [
        "codigo",
        "nombre",
        "direccion",
        "codigo_postal",
        "telefono",
        "email",
    ];

<<<<<<< Updated upstream
    public function secciones(){
        return $this->hasMany(Seccion::class);
    }

=======
    protected $table = 'campus';
>>>>>>> Stashed changes

}
