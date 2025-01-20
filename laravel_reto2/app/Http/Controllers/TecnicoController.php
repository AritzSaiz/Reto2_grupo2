<?php

namespace App\Http\Controllers;

use App\Models\Operario;
use App\Models\Tecnico;
use Illuminate\Http\Request;

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
            'operario_id' => 'required|exists:operarios,id',
            'especialidad' => 'required|string|max:255',
            'administrador' => 'required|in:si,no',
        ]);

        // Crear un nuevo técnico
        $tecnico = new Tecnico();
        $tecnico->operario_id = $validatedData['operario_id'];
        $tecnico->especialidad = $validatedData['especialidad'];
        $tecnico->administrador = ($validatedData['admin'] === 'si'); // Convertir a booleano (1 para sí, 0 para no)

        // Guardar el técnico en la base de datos
        $tecnico->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('tecnico.show')->with('success', 'Técnico añadido exitosamente.');
    }

}
