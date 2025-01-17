<?php

namespace App\Http\Controllers;

use App\Models\Mantenimiento;
use Illuminate\Http\Request;

class MantenimientoController extends Controller
{
    public function show(){
        $mantenimientos = Mantenimiento::all();
        return view('listMantenimiento', compact('mantenimientos'));

    }
}
