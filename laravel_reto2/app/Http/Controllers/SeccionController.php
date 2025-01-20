<?php
namespace App\Http\Controllers;

use App\Models\Campus;
use App\Models\Seccion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SeccionController extends Controller{


    public function show()
    {
        $secciones = Seccion::all();

        return view('Seccion.listSeccion', compact('secciones'));
    }

    public function create(){
        $campuses = Campus::all();

        return view('Seccion.createSeccion',compact('campuses'));

    }
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'codigo' => 'required|max:255',
            'campus_id' => 'required|exists:campus,id' // Cambié a 'operario_id' y validé que exista en la tabla campus
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $input = $request->all();

        try {
            // Crear la nueva sección
            $seccion = new Seccion();
            $seccion->codigo = $input['codigo']; // Asignar el código
            $seccion->operario_id = $input['operario_id']; // Asignar el ID del operario (campus)
            $seccion->save();

            return back()->with('success', 'Sección guardada con éxito.');
        } catch (\Exception $exception) {
            return back()->withErrors(['error' => $exception->getMessage()])->withInput();
        }
    }


    public function delete($id)
    {
        try {
            $seccion = Seccion::findOrFail($id);
            $seccion->delete();
            return redirect()->route('seccion.show')->with('success', 'Operario eliminada correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('seccion.show')->with('error', 'No se pudo eliminar el operario.');
        }
    }

}
