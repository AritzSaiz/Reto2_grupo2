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

}
