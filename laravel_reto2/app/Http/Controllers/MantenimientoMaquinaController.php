<?php

namespace App\Http\Controllers;



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


            $diasMantenimiento = Mantenimiento::where('id', "mantenimiento_id")->value('dias');

            $proximo = now()->addDays($diasMantenimiento);

            $relacion = MantenimientoMaquina::create([
                "mantenimiento_id" => $request->get("mantenimiento_id"),
                "maquina_id" => $request->get("maquina_id"),
                "ultima_revision" => now(),
                "siguiente_revision" => $proximo,
            ]);

            return response()->json(['message' => '', 'data' => $relacion], 200);

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
