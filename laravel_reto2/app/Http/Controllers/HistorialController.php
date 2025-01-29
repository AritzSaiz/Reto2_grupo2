<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use App\Models\Incidencia;
use App\Models\Tecnico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HistorialController extends Controller
{
    public function anadir(Request $request)
    {
        // Validar los campos requeridos
        $validator = Validator::make($request->all(), [
            "incidencia_id" => "required|integer|exists:incidencias,id",
            "tecnico_id" => "required|integer|exists:tecnicos,id",
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 400);
        }

        // Crear el historial
        $historial = Historial::create([
            "incidencia_id" => $request->get("incidencia_id"),
            "tecnico_id" => $request->get("tecnico_id"),
            "entrada" => now(), // Registrar la entrada actual
            "salida" => null, // Campos adicionales, inicializados como null
            "detalles_trabajo" => $request->get("detalles_trabajo", null),
            "justificacion_salida" => $request->get("justificacion_salida", null),
        ]);

        return response()->json(['message' => 'Historial creado exitosamente', 'data' => $historial], 200);

        /*
        // Validar que la incidencia exista
        $validaIncidencia = Incidencia::find($request->get("incidencia_id"));
        if (!$validaIncidencia) {
            return response()->json(['message' => 'No existe esa incidencia en el sistema'], 400);
        }

        // Validar que el técnico exista
        $validaTecnico = Tecnico::find($request->get("tecnico_id"));
        if (!$validaTecnico) {
            return response()->json(['message' => 'No existe ese técnico en el sistema'], 400);
        }
        */
    }

    public function actualizar(Request $request)
    {
        // Validar los campos requeridos
        $validator = Validator::make($request->all(), [
            "id" => "required|integer|exists:historiales,id", // Usamos 'id' tanto para validar como para buscar
            "detalles_trabajo" => "nullable|string",
            "justificacion_salida" => "nullable|string",
            "salida" => "nullable|date" // Añadimos la validación de fecha para 'salida'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 400);
        }

        // Buscar el registro del historial por ID
        $historial = Historial::findOrFail($request->get('id')); // Usamos find y 'id'

        $historial->salida = $request->has('salida') ? $request->get('salida') : now();
        $historial->detalles_trabajo = $request->get('detalles_trabajo', $historial->detalles_trabajo);
        $historial->justificacion_salida = $request->get('justificacion_salida', $historial->justificacion_salida);

        $historial->save();

        return response()->json(['message' => 'Historial actualizado exitosamente', 'data' => $historial], 200);
        /*
        if (!$historial) {
            return response()->json(['message' => 'No se encontró un historial con ese ID'], 404);
        }

        // Actualizar los campos del historial
        if ($request->has('salida') && $request->get('salida') !== null) {
            $historial->salida = $request->get('salida');
        } else {
            $historial->salida = now();
        }

        if ($request->has('detalles_trabajo')) {
            $historial->detalles_trabajo = $request->get('detalles_trabajo');
        }

        if ($request->has('justificacion_salida')) {
            $historial->justificacion_salida = $request->get('justificacion_salida');
        }

        $historial->save();

        // Retornar el registro actualizado
        return response()->json(['message' => 'Historial actualizado correctamente', 'data' => $historial], 200);
        */
    }

    public function registrarEntrada(Request $request)
    {
        $datos = $request->header('datos');

        dump("registrarEntrada a");

        $request->validate([
            'incidencia_id' => 'required|exists:incidencias,id',
            'tecnico_id' => 'required|exists:tecnicos,id',
            'entrada' => 'required|date',

        ]);

        dump("registrarEntrada b");

        $historial = Historial::create([
            "incidencia_id" => $request->get("incidencia_id"),
            "tecnico_id" => $request->get("tecnico_id"),
            "entrada" => now(), // Registrar la entrada actual
            "salida" => null, // Campos adicionales, inicializados como null
            "detalles_trabajo" => $request->get("detalles_trabajo", null),
            "justificacion_salida" => $request->get("justificacion_salida", null),
        ]);

        dump("registrarEntrada c");
        /*
        $historial = new Historial();
        $historial->incidencia_id = $request->input('incidencia_id');
        $historial->tecnico_id = $request->input('tecnico_id');
        $historial->entrada = $request->input('entrada');
        $historial->detalles_trabajo = $request->input('detalles_trabajo', null); // Campo opcional
        $historial->justificacion_salida = $request->input('justificacion_salida', null); // Campo opcional
        $historial->salida = $request->input('salida', null); // Campo opcional

        $historial->save();
        */

        return response()->json([
            'message' => 'Entrada en el historial creada con éxito.',
            'data' => $historial,
        ], 201);
    }

    public function detalle(Historial $historial){

        if($historial){
            return response()->json(['message' => '', 'data' =>$historial], 200);

        }else{
            return response()->json(['message' => 'Se ha producido un error'], 404);
        }

    }


}
