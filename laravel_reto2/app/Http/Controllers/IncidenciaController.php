<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use Illuminate\Http\Request;

class IncidenciaController extends Controller
{
    public function show(){
        // todo
        //$incidencias = Incidencia::all();
        //return view('listIncidencia', compact('incidencias'));

        return Incidencia::all();
    }
}
