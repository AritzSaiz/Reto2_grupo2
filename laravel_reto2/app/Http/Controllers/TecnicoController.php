<?php

namespace App\Http\Controllers;

use App\Models\Operario;
use App\Models\Tecnico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class TecnicoController extends Controller
{
    public function login(Request $request){
        // Validar los datos del formulario
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Buscar al operario por usuario
        $operario = Operario::where('usuario', $request->username)->first();

        // Verificar si el operario existe y si la contraseña es válida
        if ($operario && Hash::check($request->password, $operario->contrasena)) {
            // Comprobar si tiene un técnico asociado
            $tecnico = $operario->tecnico;

            if ($tecnico) {
                if ($tecnico->administrador){
                    // Guardar información del técnico en la sesión
                    session([
                        'tecnico_id' => $tecnico->id,
                        'tecnico_nombre' => $tecnico->nombre,
                    ]);

                    return redirect()->route('maquina.show')->with('success', 'Inicio de sesión exitoso');
                } else {
                    return back()->withErrors(['message' => 'Usuario o contraseña incorrectos.']);
                }
            }

            return back()->withErrors(['message' => 'El operario no tiene un técnico asociado.']);
        }

        return back()->withErrors(['message' => 'Usuario o contraseña incorrectos.']);
    }

    public function show(){

        $tecnicos = Tecnico::whereNull('deleted_at')->get();

        return view('Tecnico.listTecnico', compact('tecnicos'));

    }

    public function create(){
        $operarios = Operario::whereNull('deleted_at')->get();
        return view('Tecnico.createTecnico',compact('operarios'));

    }

    public function save(Request $request)
    {

        // Validar los datos enviados desde el formulario
        $validatedData = $request->validate([
            'operario_id' => 'required|exists:operarios,id|unique:tecnicos,operario_id', // Asegura que el operario no esté ya en la tabla
            'especialidad' => 'required|string|max:255',
            'administrador' => 'required|in:0,1',
        ]);


        // Crear un nuevo técnico
        $tecnico = new Tecnico();
        $tecnico->operario_id = $validatedData['operario_id'];
        $tecnico->especialidad = $validatedData['especialidad'];
        $tecnico->administrador = ($validatedData['administrador'] === '0'); // Convertir a booleano (1 para sí, 0 para no)


        try {
            $tecnico->save();

            return redirect()->route('tecnico.show')->with('success', 'Técnico creado correctamente.');
        } catch (\Exception $e) {
            Log::error('Error al crear técnico: ' . $e->getMessage()); // Registrar el error en el log
            return redirect()->route('tecnico.show')->with('error', 'No se pudo crear el técnico.');
        }

    }


    public function delete($id)
    {
        try {
            $tecnico = Tecnico::findOrFail($id);
            $tecnico->deleted_at = now();
            $tecnico->save();
            return redirect()->route('tecnico.show')->with('success', 'Tecnico eliminada correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('tecnico.show')->with('error', 'No se pudo eliminar el tecnico.');
        }
    }

    public function verificarTecnico($operarioId)
    {
        // Buscar el operario por su ID
        $operario = Operario::find($operarioId);

        // Si el operario no se encuentra, devolver un error 404
        if (!$operario) {
            return response()->json([
                'existe' => false,
                'message' => 'Operario no encontrado.'
            ], 404); // 404 Not Found
        }

        // Buscar si el operario tiene un técnico asociado
        $tecnico = $operario->tecnico;

        // Si el operario tiene un técnico asociado
        if ($tecnico) {
            return response()->json([
                'existe' => true,
                'tecnico' => $tecnico
            ], 200); // 200 OK
        }

        // Si el operario no tiene técnico asociado, devolver un error 404
        return response()->json([
            'existe' => false,
            'message' => 'No se encontró un técnico asociado al operario.'
        ], 404); // 404 Not Found
    }


}
