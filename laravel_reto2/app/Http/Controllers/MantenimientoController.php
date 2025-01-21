<?php

namespace App\Http\Controllers;

use App\Models\Mantenimiento;
use App\Models\Maquina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MantenimientoController extends Controller
{
    public function show(){
        $mantenimientos = Mantenimiento::all();
        return view('Mantenimiento.listMantenimiento', compact('mantenimientos'));
    }

    public function create(){
        $maquinas = Maquina::all();
        return view('Mantenimiento.createMantenimiento', compact('maquinas'));
    }

    public function save(Request $request)
    {
        $input = $request->all();

        try {
            // Validar campos requeridos
            $validator = Validator::make($input, [
                'dias' => 'required|regex:/^[0-9]+$/',
                'ultima_revision' => 'required|max:255',
                'siguiente_revision' => 'required|max:255',
                'maquina_id' => 'required',
            ],[
                'dias.regex' => 'El campo dias solo puede tener numeros',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Crear y guardar el mantenimiento
            $mantenimiento = new Mantenimiento();
            $mantenimiento->dias = $input['dias'];
            $mantenimiento->ultima_revision = $input['ultima_revision'];
            $mantenimiento->siguiente_revision = $input['siguiente_revision'];
            $mantenimiento->maquina_id = $input['maquina_id'];
            $mantenimiento->save();


        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()])->withInput();
        }
        return redirect()->route('mantenimiento.show');
    }

    public function delete($id)
    {
        try {
            $mantenimiento = Mantenimiento::findOrFail($id);
            $mantenimiento->delete();
            return redirect()->route('mantenimiento.show')->with('success', 'Mantenimiento eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('mantenimiento.show')->with('error', 'No se pudo eliminar el mantenimiento.');
        }
    }
}
