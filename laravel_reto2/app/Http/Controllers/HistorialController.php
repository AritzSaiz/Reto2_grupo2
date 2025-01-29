<?php

namespace App\Http\Controllers;

use App\Models\Historial;
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

    public function registrarEntrada(Request $request)
    {
        // Validar los datos
        $request->validate([
            'incidencia_id' => 'required|integer|exists:incidencias,id',
            'tecnico_id' => 'required|integer|exists:tecnicos,id',
            'entrada' => 'required|date',
        ]);

        try {
            // Crear la fila en el historial (no hace falta tratar errores antes ya que el method 'validate' detendría la ejecución).
            $data = $request->only(['incidencia_id', 'tecnico_id', 'entrada']);
            $historial = Historial::create($data);

            return response()->json([
                'message' => 'Fila en el historial registrada correctamente',
                'data' => $historial
            ], 200);
        }
        catch (\Exception $e) {
            return response()->json(['message' => 'Error al registrar la fila en el historial', 'error' => $e->getMessage()], 500);
        }
    }

    public function registrarSalida(Request $request)
    {
        // Validar los datos
        $request->validate([
            "incidencia_id" => "required|integer|exists:incidencias,id",
            "tecnico_id" => "required|integer|exists:tecnicos,id",
            "salida" => "required|date",
            "detalles_trabajo" => "required|string|max:300",
            "justificacion_salida" => "required|string|max:300",
        ]);

        try {
            // Buscar el último registro del usuario (la última fecha de entrada a la misma incidencia que resolver)
            $historialEntrada = Historial::where('incidencia_id', $request->incidencia_id)
                ->where('tecnico_id', $request->tecnico_id)->latest('entrada')->first();

            // Si no se encuentra ningún historial anterior, entonces se devolverá un error ya que algo ha ido mal en la creación de entrada.
            if (!$historialEntrada) {
                return response()->json([
                    'message' => 'No se encontró una entrada para actualizar.',
                ], 404);
            }

            // Crear la nueva fila en el historial, pero esta vez con más datos (los datos referentes a la salida).
            $data = $request->only(['incidencia_id', 'tecnico_id', 'salida', 'detalles_trabajo', 'justificacion_salida']);
            $data['entrada'] = $historialEntrada->entrada;
            $historial = Historial::create($data);

            return response()->json([
                'message' => 'Fila en el historial registrada correctamente',
                'data' => $historial
            ], 200);
        }
        catch (\Exception $e) {
            return response()->json(['message' => 'Error al registrar la fila en el historial', 'error' => $e->getMessage()], 500);
        }
    }

}
