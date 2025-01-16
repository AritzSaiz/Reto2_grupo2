<?php


namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Operador;
use App\Models\Seccion;
use Illuminate\Http\Request;
use App\Models\Maquina;
use Illuminate\Support\Facades\Auth;
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
            // Comprobamos si el tipo seleccionado es 'Tecnico'
            if ($input['tipo'] === 'Tecnico') {

                // Primero validamos los campos requeridos
                $validator = Validator::make($request->all(), [
                    'nombre' => 'required|max:255',
                    'apellidos' => 'required',
                    'email' => 'required',
                    'usuario' => 'required',
                    'contrasenia' => 'required',

                ]);

                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                }else{


                    $user = Auth::user();
                    $tecnico = new Operador($input);
                    $tecnico->nombre = $input['nombre'];
                    $tecnico->apellidos = $input['apellidos'];
                    $tecnico->email = $input['email'];
                    $tecnico->usuario = $input['usuario'];
                    $tecnico->contrasenia = $input['contrasenia'];
                    $tecnico->dispinible = $input['disponible'];
                    $tecnico->especialidad = $input['especialidad'];
                    $tecnico->admin = $input['admin'];


                    return back()->with('success', 'Operario guardada con éxito.');


                }



                return back()->with('success', 'Tecnico guardada con éxito.');
            } else if ($input['tipo'] === 'Operador') {


                $user = Auth::user();
                $operario = new Seccion($input);
                $operario->nombre = $input['nombre'];
                $operario->apellidos = $input['apellidos'];
                $operario->email = $input['email'];
                $operario->usuario = $input['usuario'];
                $operario->contrasenia = $input['contrasenia'];


                // Guardar la sección en la base de datos
                $operario->save();


            }
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }


}
