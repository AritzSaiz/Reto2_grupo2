<?php

namespace App\Http\Controllers;



use App\Models\MaquinaMantenimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MaquinaMantenimientoController extends Controller{


    //Pasaremos el codigo de la maquina y el id y descripcion del mantenimiento
    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "mantenimiento_id" => "required|integer",
            "maquina_id"=> "required|integer",
            ""
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 400);
        }else{
            //dd($request->get("maquina_id"));
            $relacion = MaquinaMantenimiento::create([
                "mantenimiento_id" => $request->get("mantenimiento_id"),
                "maquina_id" => $request->get("maquina_id")
            ]);

            return response()->json(['message' => '', 'data' => $relacion], 200);

        }
    }



}
