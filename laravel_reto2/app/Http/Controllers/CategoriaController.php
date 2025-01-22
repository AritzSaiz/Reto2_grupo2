<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    // Función para obtener todas las categorias.
    public function list(){
        return Categoria::all();
    }
}
