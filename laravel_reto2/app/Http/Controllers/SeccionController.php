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
        $secciones = Seccion::whereNull('deleted_at')->get();

        return view('Seccion.listSeccion', compact('secciones'));
    }

    public function create(){
        $campuses = Campus::whereNull('deleted_at')->get();

        return view('Seccion.createSeccion',compact('campuses'));

    }
    public function save(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'codigo' => 'required|max:255|regex:/^\d{4}$/',
            'campus_id' => 'required|exists:campus,id',
            'nombre'=>'required|max:255',
        ],[
            'codigo.size' => 'El código debe tener exactamente 4 numeros.',
            'codigo.regex' => 'El código debe tener exactamente 4 numeros.',

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $input = $request->all();

        try {
            $seccion = new Seccion();
            $seccion->codigo = $input['codigo'];
            $seccion->nombre = $input['nombre'];
            $seccion->campus_id = $input['campus_id'];
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
            $seccion->deleted_at = now();
            $seccion->save();
            return redirect()->route('seccion.show')->with('success', 'Operario eliminada correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('seccion.show')->with('error', 'No se pudo eliminar el operario.');
        }
    }

}
