<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IncidenciaController extends Controller
{
    // Función para obtener todas las incidencias.
    public function listTodas(){
        return Incidencia::whereNull('deleted_at')->get();
    }

    // Función para obtener las incidencias que han sido creadas por el usuario logueado.
    public function listPropias(Request $request) {
        // Obtener solo las que tengan la columna 'operario_id' con el parámetro/valor del localStorage llamado 'operarioId'.

        $operarioId = $request->header('Operario-Id');

        // Validar que el operarioId no sea nulo o vacío
        if (!$operarioId) {
            return response()->json([
                'error' => 'Operario ID es requerido.'
            ], 400);
        }

        // Filtrar las incidencias por operarioId y que no estén eliminadas.
        $incidencias = Incidencia::where('operario_id', $operarioId)
            ->whereNull('deleted_at')
            ->get();

        return response()->json($incidencias);
    }


    public function show(){
        $incidencias = Incidencia::all();
        return view('listIncidencia', compact('incidencias'));
    }

    public function detalle(Incidencia $incidencia){

        if($incidencia){
            return response()->json(['message' => '', 'data' =>$incidencia], 200);

        }else{
            return response()->json(['message' => 'Se ha producido un error'], 404);
        }

    }

    public function misIncidenciasSolucionadas($id = null)
    {
        if (is_null($id)) {
            return response()->json(['message' => 'ID no proporcionado'], 400);
        }

        $incidencias = Incidencia::where("operario_id", $id)
            ->where("abierta", 0)
            ->get();

        if ($incidencias->isEmpty()) {
            return response()->json(['message' => 'No se encontraron incidencias solucionadas'], 404);
        }

        return response()->json(['message' => '', 'data' => $incidencias], 200);
    }



    public function misIncidenciasAbiertas($id = null)
    {
        if (is_null($id)) {
            return response()->json(['message' => 'ID no proporcionado'], 400);
        }

        $incidencias = Incidencia::where("operario_id", $id)
            ->where("abierta", 1)
            ->get();

        if ($incidencias->isEmpty()) {
            return response()->json(['message' => 'No se encontraron incidencias abiertas'], 404);
        }

        return response()->json(['message' => '', 'data' => $incidencias], 200);
    }

    public function incidenciasAbiertas()
    {

        $incidencias = Incidencia::where("abierta", 1)->get();

        if ($incidencias->isEmpty()) {
            return response()->json(['message' => 'No se encontraron incidencias abiertas'], 404);
        }

        return response()->json(['message' => '', 'data' => $incidencias], 200);
    }

    public function create(Request $request) {

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
        }
        else{

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
