<?php

namespace App\Http\Controllers;

use App\Models\Mantenimiento;
use App\Models\MantenimientoMaquina;
use App\Models\Maquina;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use function Laravel\Prompts\alert;
use Illuminate\Support\Facades\Artisan;

class MantenimientoController extends Controller
{
    public function show(){
        $this->actualizarRevisiones();
        $mantenimientos = Mantenimiento::whereNull('deleted_at')->get();
        return view('Mantenimiento.listMantenimiento', compact('mantenimientos'));
    }

    public function create(){
        $maquinas = Maquina::whereNull('deleted_at')->get();
        return view('Mantenimiento.createMantenimiento', compact('maquinas'));
    }

    public function save(Request $request)
    {
        $input = $request->all();

        try {
            // Validar campos requeridos
            $validator = Validator::make($input, [
                'descripcion' => 'required',
                'dias' => 'required|regex:/^[0-9]+$/',
                'primera_revision' => 'required|date',
            ],[
                'dias.regex' => 'El campo dias solo puede tener numeros',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            //Calcular las fechas
            $primeraRevision = Carbon::createFromFormat('Y-m-d\TH:i', $input['primera_revision']);
            $dias = (int)$input['dias'];
            $siguienteRevision = Carbon::parse($primeraRevision)->addDays($dias);

            // Crear y guardar el mantenimiento
            $mantenimiento = new Mantenimiento();
            $mantenimiento->descripcion = $input['descripcion'];
            $mantenimiento->dias = $dias;
            $mantenimiento->ultima_revision = $primeraRevision;
            $mantenimiento->siguiente_revision = $siguienteRevision;
            $mantenimiento->save();


        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()])->withInput();
        }
        return redirect()->route('mantenimiento.show');
    }

    public function actualizarRevisiones()
    {
        try {
            // Usar cursor para obtener los mantenimientos de manera eficiente sin cargar todos en memoria
            $mantenimientos = Mantenimiento::where('siguiente_revision', '<=', now())->cursor();

            foreach ($mantenimientos as $mantenimiento) {
                // Actualizar ultima_revision a la fecha de siguiente_revision actual
                $mantenimiento->ultima_revision = $mantenimiento->siguiente_revision;

                // Calcular nueva fecha de siguiente_revision
                $mantenimiento->siguiente_revision = \Carbon\Carbon::parse($mantenimiento->siguiente_revision)
                    ->addDays($mantenimiento->dias);

                // Guardar cambios
                $mantenimiento->save();
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return response()->json(['success' => 'Revisiones actualizadas correctamente'], 200);
    }

    public function delete($id)
    {
        try {
            $mantenimiento = Mantenimiento::findOrFail($id);


            $maquinaMantenimiento = MantenimientoMaquina::where("mantenimiento_id", $id)->get()->whereNull('deleted_at')->first();


            if ($maquinaMantenimiento == null) {

                $mantenimiento->deleted_at = now();
                $mantenimiento->save();
                return redirect()->route('mantenimiento.show')->with('success', 'Mantenimiento eliminado correctamente.');

            }else{
                return redirect()->route('mantenimiento.show')->with('error', 'No se pudo eliminar el mantenimiento borra la relacion.');

            }

        } catch (\Exception $e) {
            return redirect()->route('mantenimiento.show')->with('error', 'No se pudo eliminar el mantenimiento.');
        }
    }


    public function cargarDatos(){

        $maquinas = Maquina::all();
        $mantenimientos = Mantenimiento::all();


        return view("Mantenimiento.asociarMantenimiento", compact('maquinas', 'mantenimientos'));

    }



}
