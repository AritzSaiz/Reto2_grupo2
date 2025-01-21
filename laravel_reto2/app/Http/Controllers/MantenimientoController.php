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
        $mantenimientos = Mantenimiento::whereNull('deleted_at')->get();
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
                'periodicidad' => 'required|max:255',
                'inicio_ultima_revision' => 'required|max:255',
                'fin_ultima_revision' => 'required|max:255',
                'dias' => 'required|regex:/^[0-9]+$/',
                'siguiente_revision' => 'required|max:255',
                'maquina_id' => 'required',
            ],[
                'dias.regex' => 'El campo dias solo puede tener numeros',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Crear y guardar el campus
            $mantenimiento = new Mantenimiento();
            $mantenimiento->periodicidad = $input['periodicidad'];
            $mantenimiento->inicio_ultima_revision = $input['inicio_ultima_revision'];
            $mantenimiento->fin_ultima_revision = $input['fin_ultima_revision'];
            $mantenimiento->dias = $input['dias'];
            $mantenimiento->siguiente_revision = $input['siguiente_revision'];
            $mantenimiento->maquina_id = $input['maquina_id'];
            $mantenimiento->save();


        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()])->withInput();
        }
        return redirect()->route('campus.show');
    }

    public function delete($id)
    {
        try {
            $mantenimiento = Mantenimiento::findOrFail($id);
            $mantenimiento->deleted_at = now();
            $mantenimiento->save();
            return redirect()->route('mantenimiento.show')->with('success', 'Mantenimiento eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('mantenimiento.show')->with('error', 'No se pudo eliminar el mantenimiento.');
        }
    }
}
