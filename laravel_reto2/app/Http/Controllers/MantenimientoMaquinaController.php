<?php

namespace App\Http\Controllers;



use App\Models\Incidencia;
use App\Models\Mantenimiento;
use App\Models\MantenimientoMaquina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MantenimientoMaquinaController extends Controller{


    //Pasaremos el codigo de la maquina y el id y descripcion del mantenimiento
    public function save(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "mantenimiento_id" => "required|integer",
            "maquina_id"=> "required|integer",

        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 400);
        }else{

            $mantenimiento = Mantenimiento::findOrFail($request->get("mantenimiento_id"));

            $incidencia = Incidencia::create([
                "titulo" => $mantenimiento->titulo,
                "descripcion" => $mantenimiento->descripcion,
                "abierta" => 1,
                "categoria_id" => 7,
                "gravedad" => "Mantenimiento preventivo",
                "operario_id" => null,
                "maquina_id" => $request->get("maquina_id"),
            ]);


            $incidenciaId = $incidencia->id;

            $diasMantenimiento = $mantenimiento->dias;

            $proximo = now()->addDays($diasMantenimiento);

            $relacion = MantenimientoMaquina::create([
                "mantenimiento_id" => $request->get("mantenimiento_id"),
                "maquina_id" => $request->get("maquina_id"),
                "ultima_revision" => now(),
                "siguiente_revision" => $proximo,
                "incidencia_id" => $incidenciaId,
            ]);

            return redirect()->route("maquinaMantenimiento.verLista")->with('success', 'Mantenimiento maquina eliminado correctamente.');

        }
    }


    public function verLista(){

        $maquinaMantenimientos =MantenimientoMaquina::whereNull('deleted_at')->get();


        return view("Mantenimiento.listaMantenimientoMaquina", compact('maquinaMantenimientos'));

    }


    public function delete($id)
    {
        try {
            $mantenimientoMaquina = MantenimientoMaquina::findOrFail($id);
            $mantenimientoMaquina->deleted_at = now();
            $mantenimientoMaquina->save();
            return redirect()->route("maquinaMantenimiento.verLista")->with('success', 'Mantenimiento maquina eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route("maquinaMantenimiento.verLista")->with('error', 'No se pudo eliminar el mantenimiento maquina.');
        }
    }




}
