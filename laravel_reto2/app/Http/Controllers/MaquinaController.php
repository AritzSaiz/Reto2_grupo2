<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Maquina;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MaquinaController extends Controller{


    public function save(Request $request){

        $validator = Validator::make($request->all(), [
            'codigo' => 'required|max:255',
            'nombre' => 'required',
            'modelo' => 'required',
            'prioridad' => 'required|Integer',
        ]);

        if ($validator->fails()) {
            return back()->withError("Error validando la maquina")->withInput();
        }
        $input = $request->all();

        try{
            $user= Auth::user();
            $maquina = new Maquina($input);
            $maquina->codigo = $input['codigo'];
            $maquina->nombre = $input['nombre'];
            $maquina->modelo = $input['modelo'];


            $user = Auth::user();
            $maquina = new Maquina($input);

            if (isset($input['prioridad']) && is_numeric($input['prioridad']) && $input['prioridad'] >= 1 && $input['prioridad'] <= 3) {
                $maquina->prioridad = $input['prioridad'];
            }else{
                throw new \Exception('El valor de prioridad debe ser un número entre 1 y 3.');

            }

            $maquina->codigo = $input['codigo'];
            $maquina->nombre = $input['nombre'];
            $maquina->modelo = $input['modelo'];

            // Guardar la máquina en la base de datos
            $maquina->save();
        }
        catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }

}
