<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function create(Request $request){


        $validator = Validator::make($request->all(), [

            "descripcion" => "required",
            "categoria_id" => "required",
            "abierta" => "required",
            "gravedad" => "required",
            "operario_id" => "required",
            "maquina_id" => "required",

        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 400);
        }else{

            $incidencia = Incidencia::create([
                "descripcion" => $request->get("descripcion"),
                "abierta" => $request->get("abierta"),
                "categoria_id" => $request->get("categoria_id"),
                "gravedad" => $request->get("gravedad"),
                "operario_id" => $request->get("operario_id"),
                "maquina_id" => $request->get("maquina_id"),
            ]);
            return response()->json(['message' => '', 'data' => $incidencia], 200);
        }
    }
}
