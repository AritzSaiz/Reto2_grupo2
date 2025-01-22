<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use Illuminate\Http\Request;

class IncidenciaController extends Controller
{

    // Función para obtener todas las incidencias.
    public function list(){
        return Incidencia::all();
    }

    public function show(){
        $incidencias = Incidencia::all();
        return view('listIncidencia', compact('incidencias'));
    }
}
