<?php
namespace App\Http\Controllers;

use App\Models\Seccion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SeccionController extends Controller{


    public function show()
    {
        // Obtén todas las secciones
        $secciones = Seccion::all();

        // Retorna la vista con las secciones
        return view('create', compact('secciones'));
    }
    public function save(Request $request)
    {
        // Validación
        $validator = Validator::make($request->all(), [
            'codigo' => 'required|max:255',
            'campus' => 'required|in:Arriaga,Jesús Obrero,Molinuevo,Nieves Cano,Mendizorroza'
        ]);


        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $input = $request->all();

        try {
            $user = Auth::user(); // Obtenemos el usuario autenticado (opcional si no se utiliza)
            $seccion = new Seccion();

            // Asignamos valores a la entidad Seccion
            $seccion->codigo = $input['codigo'];
            $seccion->campus = $input['campus'];

            // Guardar en la base de datos
            $seccion->save();

            return back()->with('success', 'Sección guardada con éxito.');
        } catch (\Exception $exception) {
            return back()->withErrors(['error' => $exception->getMessage()])->withInput();
        }
    }


}
