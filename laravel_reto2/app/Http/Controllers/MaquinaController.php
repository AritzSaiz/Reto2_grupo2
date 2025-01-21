<?php

namespace App\Http\Controllers;

use App\Models\Operario;
use App\Models\Seccion;
use Illuminate\Http\Request;
use App\Models\Maquina;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MaquinaController extends Controller{

    public function show(){
        $maquinas = Maquina::all();
        return view('Maquina.listMaquina', compact('maquinas'));

    }

    public function create(){
        $secciones = Seccion::all();
        return view('Maquina.createMaquina',compact('secciones'));

    }
    public function save(Request $request)
    {
        // Validar los datos enviados
        $validator = Validator::make($request->all(), [
            'codigo' => 'required|max:255',
            'nombre' => 'required',
            'modelo' => 'required',
            'prioridad' => 'required|integer|min:1|max:3',
            'seccion_id' => 'required|integer', // Asegura que este campo sea obligatorio
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()
                ->with('error', 'Hay errores en los datos proporcionados.'); // Mensaje de error si la validación falla
        }

        try {
            // Crear instancia de Maquina
            $input = $request->all();
            $maquina = new Maquina($input);

            // Asignar manualmente campos
            $maquina->codigo = $input['codigo'];
            $maquina->nombre = $input['nombre'];
            $maquina->modelo = $input['modelo'];
            $maquina->prioridad = $input['prioridad'];
            $maquina->seccion_id = $input['seccion_id'];

            // Guardar en la base de datos
            $maquina->save();

            // Retornar con mensaje de éxito
            return back()->with('success', 'La máquina se ha creado correctamente.');

        } catch (\Exception $exception) {
            // Capturar errores y retornar con mensaje
            return back()->with('error', 'Ocurrió un error al intentar crear la máquina: ' . $exception->getMessage());
        }
    }
    public function delete($id)
    {
        try {
            $maquina = Maquina::findOrFail($id);
            $maquina->delete();
            return redirect()->route('maquina.show')->with('success', 'Operario eliminada correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('maquina.show')->with('error', 'No se pudo eliminar el operario.');
        }
    }

}
