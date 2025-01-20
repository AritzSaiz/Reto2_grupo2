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
        $campus = Campus::all();
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
                'codigo' => 'required|max:255',
                'nombre' => 'required|max:255',
                'direccion' => 'required|max:255',
                'codigo_postal' => 'required',
                'telefono' => 'required|max:255',
                'email' => 'required|email',
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
            $campus->delete();
            return redirect()->route('campus.show')->with('success', 'Campus eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('campus.show')->with('error', 'No se pudo eliminar el campus.');
        }
    }


}
