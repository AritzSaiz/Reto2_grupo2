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
            "incidencia_id" => "required|integer",
            "tecnico_id" => "required|integer",
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 400);
        }

        // Validar que la incidencia exista
        $validaIncidencia = Incidencia::where("id", $request->get("incidencia_id"));
        if ($validaIncidencia->doesntExist()) {
            return response()->json(['message' => 'No existe esa incidencia en el sistema'], 400);
        }

        // Validar que el técnico exista
        $validaTecnico = Tecnico::where("id", $request->get("tecnico_id"));
        if ($validaTecnico->doesntExist()) {
            return response()->json(['message' => 'No existe ese técnico en el sistema'], 400);
        }

        // Crear el historial
        $historial = Historial::create([
            "incidencia_id" => $request->get("incidencia_id"),
            "tecnico_id" => $request->get("tecnico_id"),
            "entrada" => now(), // Registrar la entrada actual
            "salida" => null, // Campos adicionales, inicializados como null
            "detalles_trabajo" => $request->get("detalle", null),
            "justificacion_salida" => $request->get("justificacion_salida", null),
        ]);

        return response()->json(['message' => 'Historial creado exitosamente', 'data' => $historial], 200);
    }



    public function actualizar(Request $request)
    {
        // Validar los campos requeridos
        $validator = Validator::make($request->all(), [
            "id" => "required|integer", // Usamos 'id' tanto para validar como para buscar
            "detalles_trabajo" => "nullable|string",
            "justificacion_salida" => "nullable|string",
            "salida" => "nullable|date" // Añadimos la validación de fecha para 'salida'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 400);
        }

        // Buscar el registro del historial por ID
        $historial = Historial::find($request->get('id')); // Usamos find y 'id'


        if (!$historial) {
            return response()->json(['message' => 'No se encontró un historial con ese ID'], 404);
        }

        // Actualizar los campos del historial
        if ($request->has('salida')) {
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
    }

}
