<?php

namespace App\Http\Controllers;

use App\Models\Operario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OperarioController extends Controller
{

    public function show(){
        $operarios = Operario::all();
        return view('listOperario', compact('operarios'));

    }
    public function save(Request $request)
    {
        $input = $request->all();

        try {
            // Validar campos requeridos
            $validator = Validator::make($input, [
                'nombre' => 'required|max:255',
                'apellidos' => 'required|max:255',
                'email' => 'required|email',
                'usuario' => 'required|max:255',
                'contrasena' => 'required|min:6',
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

            // Redirigir a la función `show` para recargar la vista con los operarios actualizados
            return redirect()->action([OperarioController::class, 'show'])
                ->with('success', 'Operario guardado con éxito.');

        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()])->withInput();
        }
    }

}
