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

        // Validar el parámetro operario_id
        $validatedData = $request->validate([
            'operario_id' => 'required|integer',
        ]);

        // Obtener el valor de 'operario_id' del request
        $operarioId = $validatedData['operario_id'];

        // Filtrar las incidencias por 'operario_id' y que no estén eliminadas.
        return Incidencia::where('operario_id', $operarioId)
            ->whereNull('deleted_at')
            ->get();
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

        // Validar los datos
        $request->validate([
            'titulo' => 'required|string|max:100',
            'descripcion' => 'required|string|max:300',
            'gravedad' => 'required|string|in:No funciona,Sí funciona,Aviso,Mantenimiento preventivo',
            'categoria_id' => 'required|integer',
            'operario_id' => 'required|integer',
            'maquina_id' => 'required|integer',
        ]);

        try {
            // Crear la incidencia (no hace falta tratar errores antes ya que el method 'validate' detendría la ejecución).
            $data = $request->only(['titulo', 'descripcion', 'gravedad', 'categoria_id', 'operario_id', 'maquina_id']);
            $data['abierta'] = 1; // Agregar este campo manualmente
            $incidencia = Incidencia::create($data);

            return response()->json([
                'message' => 'Incidencia registrada correctamente',
                'data' => $incidencia
            ], 200);
        }
        catch (\Exception $e) {
            return response()->json(['message' => 'Error al registrar la incidencia', 'error' => $e->getMessage()], 500);
        }

    }
}
