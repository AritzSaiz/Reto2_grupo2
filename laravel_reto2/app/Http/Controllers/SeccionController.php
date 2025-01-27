<?php
namespace App\Http\Controllers;

use App\Models\Campus;
use App\Models\Seccion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SeccionController extends Controller{

    // Función para obtener todas las secciones.
    public function list(){
        return Seccion::whereNull('deleted_at')->get();
    }

    public function show()
    {
        $secciones = Seccion::whereNull('deleted_at')->get();

        return view('Seccion.listSeccion', compact('secciones'));
    }

    public function create(){

        $campuses = Campus::all();

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

            // Crear la nueva sección
            $seccion = new Seccion();
            $seccion->codigo = $input['codigo']; // Asignar el código
            $seccion->operario_id = $input['operario_id']; // Asignar el ID del operario (campus)
            $seccion->save();

        } catch (\Exception $exception) {
            return back()->withErrors(['error' => $exception->getMessage()])->withInput();
        }
        return redirect()->route('seccion.show');
    }


    public function delete($id)
    {
        try {
            $seccion = Seccion::findOrFail($id);

            $todasMaquinasEliminadas = $seccion->maquinas()->whereNull('deleted_at')->count() == 0;

            if (!$todasMaquinasEliminadas) {
                return back()->with('errors', 'No se puede eliminar ls seccion porque tiene secciones asignadas.');
            }else{
                $seccion->deleted_at = now();
                $seccion->save();
                return back()->with('success', 'Seccion eliminado correctamente.');

            }
        } catch (\Exception $e) {
            return back()->with('errors', 'No se puede eliminar el campus porque tiene secciones asignadas.');
        }
    }

}
