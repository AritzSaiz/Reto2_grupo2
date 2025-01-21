<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MaquinaController;
use App\Http\Controllers\OperarioController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\SeccionController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\CampusController;
use Illuminate\Support\Facades\Route;

Route::controller(AdminController::class)->group(function() {
    Route::get('/index', 'index')->name('list.index');
});

Route::controller(MaquinaController::class)->group(function() {
    Route::get('/index', 'show')->name('maquina.show');
    Route::get('/createMaquina', 'create')->name('maquina.create');
    Route::post('/saveMaquina', 'save')->name('maquina.save');
    Route::delete('/deleteMaquina/{id}', 'delete')->name('maquina.delete');
});

Route::controller(OperarioController::class)->group(function() {
    Route::get('/showOperario', 'show')->name('operario.show');
    Route::get('/createOperario', 'create')->name('operario.create');
    Route::post('/saveOperario', 'save')->name('operario.save');
    Route::delete('/deleteOperario/{id}', 'delete')->name('operario.delete');
});

Route::controller(TecnicoController::class)->group(function() {
    Route::get('/showTecnico', 'show')->name('tecnico.show');
    Route::get('/createTecnico', 'create')->name('tecnico.create');
    Route::post('/saveTecnico', 'save')->name('tecnico.save');
    Route::post('/login', 'login')->name('tecnico.login');
    Route::delete('/deleteTecnico/{id}', 'delete')->name('tecnico.delete');
});

Route::controller(SeccionController::class)->group(function() {
    Route::get('/showSeccion', 'show')->name('seccion.show');
    Route::get('/createSeccion', 'create')->name('seccion.create');
    Route::post('/saveSeccion', 'save')->name('seccion.save');
    Route::delete('/deleteSeccion/{id}', 'delete')->name('seccion.delete');
});

Route::controller(MantenimientoController::class)->group(function() {
    Route::get('/showMantenimiento', 'show')->name('mantenimiento.show');
    Route::get('/createMantenimiento', 'create')->name('mantenimiento.create');
    Route::post('/saveMantenimiento', 'save')->name('mantenimiento.save');
    Route::delete('/deleteMantenimiento/{id}', 'delete')->name('mantenimiento.delete');
});

Route::controller(CampusController::class)->group(function() {
    Route::get('/showCampus', 'show')->name('campus.show');
    Route::get('/createCampus', 'create')->name('campus.create');
    Route::post('/saveCampus', 'save')->name('campus.save');
    Route::delete('/deleteCampus/{id}', 'delete')->name('campus.delete');
});



// todo

// Definir una ruta HTTP GET para obtener las incidencias desde el controlador de Laravel y enviarlas al frontend en Vue.
Route::get('/incidencias', [\App\Http\Controllers\IncidenciaController::class, 'show']);
