<?php

namespace App\Http\Controllers;

use App\Models\Operario;
use App\Models\Tecnico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OperarioController extends Controller
{

    public function show(){
        $operarios = Operario::whereNull('deleted_at')->get();
        return view('Operario.listOperario', compact('operarios'));
    }


    public function create(){
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
            $operario->contrasena = $input['contrasena'];
            $operario->save();


        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()])->withInput();
        }
        return redirect()->route('operario.show')->with('error', 'Datos incorrectos');
    }


    public function delete($id)
    {
        try {
            $operario = Operario::findOrFail($id);

            $tecnico = Tecnico::where('operario_id', $id)
                ->whereNull('deleted_at')
                ->first();

            if ($tecnico == null) {
                $operario->deleted_at = now();
                $operario->save();
                return redirect()->route('operario.show')->with('success', 'Operario eliminado correctamente.');
            } else {
                return redirect()->route('operario.show')->with('error', 'El operario está relacionado con un técnico');
            }
        } catch (\Exception $e) {
            return redirect()->route('operario.show')->with('error', 'No se pudo eliminar el operario.');
        }
    }

}
