<?php

use App\Http\Controllers\Controller;
use App\Models\Maquina;
use App\Models\Seccion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SeccionController extends Controller{

    public function save(Request $request){
        $validator = Validator::make($request->all(), [
            'codigo' => 'required|max:255',
            'nombre' => 'required',

        ]);

        if ($validator->fails()) {
            return back()->withError("Error validando de la seccion")->withInput();
        }
        $input = $request->all();

        try{
            $user= Auth::user();
            $seccion = new Maquina($input);
            $seccion->codigo = $input['codigo'];
            $seccion->nombre = $input['nombre'];


            // Guardar la máquina en la base de datos
            //$seccion->save();
            return back()->with('success', 'Seccion guardada con éxito.');

        }
        catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }

}
