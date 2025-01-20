<?php

namespace App\Http\Controllers;

use App\Models\Tecnico;
use Illuminate\Http\Request;

class TecnicoController extends Controller
{
    public function show(){
        $tecnicos = Tecnico::all();
        return view('Tecnico.listTecnico', compact('tecnicos'));

    }

    public function create(){
        return view('Tecnico.createTecnico');

    }
}
