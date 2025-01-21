<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use App\Models\Operario;
use Illuminate\Http\Request;
use App\Models\Maquina;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CampusController extends Controller{

    public function show(){
        $campus = Campus::whereNull('deleted_at')->get();
        return view('Campus.listCampus', compact('campus'));
    }

    public function create(){
        return view('Campus.createCampus');

    }

    public function save(Request $request)
    {
        $input = $request->all();

        try {
            // Validar campos requeridos
            $validator = Validator::make($input, [
                'codigo' => 'required|max:255|size:2',
                'nombre' => 'required|max:255',
                'direccion' => 'required|max:255',
                'codigo_postal' => 'required|size:5|regex:/^\d{5}$/',
                'telefono' => 'required|max:255',
                'email' => 'required|email',
            ],[
                'codigo.size' => 'El codigo tiene que tener 2 digitos',
                'codigo_postal.size' => 'El codigo postal tiene que tener 5 digitos',
                'codigo_postal.regex' => 'El codigo postal tiene que tener 5 digitos',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Crear y guardar el campus
            $campus = new Campus();
            $campus->codigo = $input['codigo'];
            $campus->nombre = $input['nombre'];
            $campus->direccion = $input['direccion'];
            $campus->codigo_postal = $input['codigo_postal'];
            $campus->telefono = $input['telefono'];
            $campus->email = $input['email'];
            $campus->save();


        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()])->withInput();
        }
        return redirect()->route('campus.show');
    }

    public function delete($id)
    {
        try {
            $campus = Campus::findOrFail($id);
            $campus->deleted_at = now();
            $campus->save();

            return redirect()->route('campus.show')->with('success', 'Campus eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('campus.show')->with('error', 'No se pudo eliminar el campus.');
        }
    }


}
