<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\IncidenciaController;
use App\Http\Controllers\MaquinaController;
use App\Http\Controllers\OperarioController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\SeccionController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\CampusController;
use Illuminate\Support\Facades\Route;

// TODO

/*
 * Definir rutas HTTP GET para obtener los datos de la ventana de incidencias desde
 * el controlador de Laravel y enviarlas al frontend en Vue.
*/

Route::get('/campus', [CampusController::class, 'list']);
Route::get('/secciones', [SeccionController::class, 'list']);
Route::get('/categorias', [CategoriaController::class, 'list']);
Route::get('/incidencias', [IncidenciaController::class, 'list']);
Route::get('/maquinas', [MaquinaController::class, 'list']);



//Route::get('/incidencias', [IncidenciaController::class, 'show']);
Route::get('/incidencias/{incidencia}', [IncidenciaController::class, 'detalle']);
Route::post('/createIncidencia',[IncidenciaController::class, 'create']);

//Sacar solo las incidencias solucionadas del usuario que inicie sesion
Route::get('/misIncidenciasSolucionadas/{id}', [IncidenciaController::class, 'misIncidenciasSolucionadas']);
//Sacar solo las incidencias sin solucionar del usuario que inicie sesion
Route::get('/misIncidenciasAbiertas/{id}', [IncidenciaController::class, 'misIncidenciasAbiertas']);

//Sacar todas las incidencias sin resolver
Route::get('/incidenciasAbiertas', [IncidenciaController::class, 'incidenciasAbiertas']);


Route::post('/anadir',[HistorialController::class,'anadir']);


Route::post('/login', [OperarioController::class, 'inicioSesion']);






