<?php

namespace App\Http\Controllers;

use App\Models\Operario;
use App\Models\Tecnico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TecnicoController extends Controller
{
    public function show(){
        $tecnicos = Tecnico::all();
        return view('Tecnico.listTecnico', compact('tecnicos'));

    }

    public function create(){
        $operarios = Operario::all();
        return view('Tecnico.createTecnico',compact('operarios'));

    }

    public function save(Request $request)
    {

        // Validar los datos enviados desde el formulario
        $validatedData = $request->validate([
            'operario_id' => 'required|exists:operarios,id|unique:tecnicos,operario_id', // Asegura que el operario no esté ya en la tabla
            'especialidad' => 'required|string|max:255',
            'administrador' => 'required|in:si,no',
        ]);


        // Crear un nuevo técnico
        $tecnico = new Tecnico();
        $tecnico->operario_id = $validatedData['operario_id'];
        $tecnico->especialidad = $validatedData['especialidad'];
        $tecnico->administrador = ($validatedData['administrador'] === 'si'); // Convertir a booleano (1 para sí, 0 para no)


        try {
            $tecnico->save();

            return redirect()->route('tecnico.show')->with('success', 'Técnico creado correctamente.');
        } catch (\Exception $e) {
            Log::error('Error al crear técnico: ' . $e->getMessage()); // Registrar el error en el log
            return redirect()->route('tecnico.show')->with('error', 'No se pudo crear el técnico.');
        }

    }


    public function delete($id)
    {
        try {
            $tecnico = Tecnico::findOrFail($id);
            $tecnico->delete();
            return redirect()->route('tecnico.show')->with('success', 'Tecnico eliminada correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('tecnico.show')->with('error', 'No se pudo eliminar el tecnico.');
        }
    }

}
