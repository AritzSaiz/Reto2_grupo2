<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\IncidenciaController;
use App\Http\Controllers\MaquinaController;
use App\Http\Controllers\MantenimientoMaquinaController;
use App\Http\Controllers\OperarioController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\SeccionController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\CampusController;
use Illuminate\Support\Facades\Route;
use Tymon\JWTAuth\Facades\JWTAuth;

// TODO : Agrupar por controlers como en ejs.

/*
 * Definir rutas HTTP GET para obtener los datos de la ventana de incidencias desde
 * el controlador de Laravel y enviarlas al frontend en Vue.
*/
Route::get('/campus', [CampusController::class, 'list']);
Route::get('/secciones', [SeccionController::class, 'list']);
Route::get('/categorias', [CategoriaController::class, 'list']);
Route::get('/incidencias', [IncidenciaController::class, 'listTodas']);
Route::get('/incidenciasPropias', [IncidenciaController::class, 'listPropias']);
Route::get('/maquinas', [MaquinaController::class, 'list']);
Route::get('/operarios', [OperarioController::class, 'list']);

// Obtener los datos para el detalle de una incidencia
Route::get('/incidencias/{incidencia}', [IncidenciaController::class, 'detalle']);

// Obtener solo las incidencias (abiertas / cerradas) del usuario que inicie sesión
Route::get('/misIncidenciasSolucionadas/{id}', [IncidenciaController::class, 'misIncidenciasSolucionadas']);
Route::get('/misIncidenciasAbiertas/{id}', [IncidenciaController::class, 'misIncidenciasAbiertas']);

// Sacar todas las incidencias sin resolver
Route::get('/incidenciasAbiertas', [IncidenciaController::class, 'incidenciasAbiertas']);


// Crear incidencia
Route::post('/createIncidencia',[IncidenciaController::class, 'create']);

// Rutas del historial
Route::post('/anadir',[HistorialController::class,'anadir']);
Route::post('/actualizar', [HistorialController::class, 'actualizar']);
Route::post('/historial/entrada', [HistorialController::class, 'registrarEntrada']);

// Rutas relacionadas con el login / tipo de usuario
Route::post('/login', [OperarioController::class, 'inicioSesion']);
Route::post('/operario', [OperarioController::class, 'inicioSesion']);



/*
Route::post('/login', [AuthController::class, 'login']);

Route::post('/createMantenimientoMaquina', [MaquinaMantenimientoController::class, 'create']);
*/

// TODO : Repasar lo de Auth / Middleware

Route::middleware('jwt.auth')->group(function () {
    Route::get('/operario', [OperarioController::class, 'index']);
    // Otras rutas protegidas...
});

Route::middleware(['auth.jwt'])->group(function () {
    Route::get('/user', [UserController::class, 'getUser']);
});

Route::post('/refresh', function () {
    $newToken = JWTAuth::parseToken()->refresh();
    return response()->json(['token' => $newToken]);
});

Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('jwt.refresh');
