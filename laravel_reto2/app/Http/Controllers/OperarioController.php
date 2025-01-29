<?php

namespace App\Http\Controllers;

use App\Models\Operario;
use App\Models\Tecnico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class OperarioController extends Controller
{

    // Función para obtener todos los operarios.
    public function list()
    {
        return Operario::whereNull('deleted_at')->get();
    }

    public function inicioSesion(Request $request)
    {
        $usuario = $request->input('usuario');
        $contrasena = $request->input('contrasena');

        $operario = Operario::where('usuario', $usuario)->whereNull('deleted_at')->first();

        if (!$operario || !Hash::check($contrasena, $operario->contrasena)) {
            return response()->json(['message' => 'Usuario o contraseña incorrectos.'], 401);
        }


        $tecnico = Tecnico::where('operario_id', $operario->id)->whereNull('deleted_at')->first();

        if ($tecnico) {

            return response()->json([
                'message' => 'Inicio de sesión exitoso del operario técnico.',
                'operarioId' => $operario->id,
                'tecnicoId' => $tecnico->id,
                'data' => $operario
            ], 200);
        }

        return response()->json([
            'message' => 'Inicio de sesión exitoso del operario corriente.',
            'operarioId' => $operario->id,
            'data' => $operario,
        ], 200);
    }

    public function show()
    {
        $operarios = Operario::whereNull('deleted_at')->get();
        return view('Operario.listOperario', compact('operarios'));
    }

    public function create()
    {
        return view('Operario.createOperario');
    }

    public function save(Request $request)
    {
        $input = $request->all();

        try {
            // Validar campos requeridos
            $validator = Validator::make($input, [
                'nombre' => 'required|max:255|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
                'apellidos' => 'required|max:255|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
                'email' => 'required|email',
                'usuario' => 'required|max:255',
                'contrasena' => 'required|min:6',
            ], [
                'nombre.regex' => 'El nombre solo puede contener letras y espacios.',
                'apellidos.regex' => 'El apellido solo puede contener letras y espacios.',
                'email.email' => 'Debe ingresar un correo electrónico válido.',
                'contrasena.min' => 'La contraseña debe tener al menos 6 caracteres.',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Crear y guardar el operario
            $operario = new Operario();
            $operario->nombre = $input['nombre'];
            $operario->apellidos = $input['apellidos'];
            $operario->email = $input['email'];
            $operario->usuario = $input['usuario'];
            $operario->contrasena = Hash::make($input['contrasena']);
            $operario->save();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()])->withInput();
        }
        return redirect()->route('operario.show');
    }

    public function delete($id)
    {
        try {
            $operario = Operario::findOrFail($id);


            $tecnico = Tecnico::where('operario_id', $id)->whereNull('deleted_at')->first();

            if ($tecnico == null) {
                $operario->deleted_at = now();
                $operario->save();
                return redirect()->route('operario.show')->with('success', 'Operario eliminado correctamente.');
            } else {
                return redirect()->route('operario.show')->with('error', 'El operario está relacionado con un técnico.');
            }
        } catch (\Exception $e) {
            return redirect()->route('operario.show')->with('error', 'No se pudo eliminar el operario.');
        }
    }


    public function detalle($id)
    {
        $operario = Operario::find($id);
        return view('operario.detalle', compact('operario'));
    }


    public function edit(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'contrasena' => 'required|min:6'
        ], [
            'contrasena.min' => 'La contraseña debe tener al menos 6 caracteres.'
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $operario = Operario::findOrFail($id);

        $contrasena = Hash::make($request->input('contrasena'));

        $operario->update([
            'contrasena' => $contrasena,
        ]);

        return redirect()->route('operario.show')->with('success', 'Operario actualizado correctamente');
    }
}
