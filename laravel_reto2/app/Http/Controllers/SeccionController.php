<?php
namespace App\Http\Controllers;

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
        $secciones = Campus::all();

        return view('Seccion.createSeccion');

    }
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'codigo' => 'required|max:255',
            'campus' => 'required|in:Arriaga,Jesús Obrero,Molinuevo,Nieves Cano,Mendizorroza'
        ]);


        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $input = $request->all();

        try {
            $user = Auth::user();
            $seccion = new Seccion();

            $seccion->codigo = $input['codigo'];
            $seccion->campus = $input['campus'];

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
