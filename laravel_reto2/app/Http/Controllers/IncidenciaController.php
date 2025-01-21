<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use Illuminate\Http\Request;

class IncidenciaController extends Controller
{
    // Función para obtener todas las incidencias.
    public function show(){
        // TODO: En el futuro, se podría descomentar esta parte para devolver las incidencias a una vista en Blade.
        //$incidencias = Incidencia::all();
        //return view('listIncidencia', compact('incidencias'));

        // Por ahora, devuelve todas las incidencias en formato JSON para ser utilizadas en el frontend (Vue).
        return Incidencia::all();
    }
}
