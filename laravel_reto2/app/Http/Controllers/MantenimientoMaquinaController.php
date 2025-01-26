<?php

namespace App\Http\Controllers;



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
            //dd($request->get("maquina_id"));
            $relacion = MantenimientoMaquina::create([
                "mantenimiento_id" => $request->get("mantenimiento_id"),
                "maquina_id" => $request->get("maquina_id"),
                "ultima_revision" => now(),
            ]);

            return response()->json(['message' => '', 'data' => $relacion], 200);

        }
    }


    public function verLista(){

        $maquinaMantenimientos = MaquinaMantenimiento::all();


        return view("Mantenimiento.listarMantenimientoMaquina", compact('maquinaMantenimientos'));

    }





}
