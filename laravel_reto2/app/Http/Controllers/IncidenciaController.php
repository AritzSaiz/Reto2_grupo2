<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function detalle(Incidencia $incidencia = null){

        if($incidencia){
            return response()->json(['message' => '', 'data' =>$incidencia], 200);

        }else{
            return response()->json(['message' => 'Se ha producido un error'], 404);
        }

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
