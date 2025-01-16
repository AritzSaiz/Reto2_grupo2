<?php


namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Operario;
use App\Models\Tecnico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        return view('list');
    }


    public function create()
    {
        return view('create');
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
                'contrasenia' => 'required|min:6',
                'tipo' => 'required|in:Operario,Tecnico',
                'especialidad' => 'required_if:tipo,Tecnico|max:255',
                'admin' => 'required_if:tipo,Tecnico|in:si,no',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors("Error validando de la seccion")->withInput();
            }

            // Comprobar tipo de usuario y guardar
            if ($input['tipo'] === 'Tecnico') {
                $tecnico = new Tecnico();
                $tecnico->nombre = $input['nombre'];
                $tecnico->apellidos = $input['apellidos'];
                $tecnico->email = $input['email'];
                $tecnico->usuario = $input['usuario'];
                $tecnico->contrasena = $input['contrasenia'];
                $tecnico->especialidad = $input['especialidad'];
                $tecnico->admin = $input['admin'] === 'si';
                $tecnico->save();

                return redirect()->back()->with('success', 'Técnico guardado con éxito.');
            } else {
                $operario = new Operario();
                $operario->nombre = $input['nombre'];
                $operario->apellidos = $input['apellidos'];
                $operario->email = $input['email'];
                $operario->usuario = $input['usuario'];
                $operario->contrasena = $input['contrasena'];
                $operario->save();

                return redirect()->back()->with('success', 'Operario guardado con éxito.');
            }
        } catch (\Exception $exception) {
            return redirect()->back()->withError($exception->getMessage())->withInput();
        }
    }



}
