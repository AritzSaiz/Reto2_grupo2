<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\MaquinaController;
use App\Http\Controllers\OperarioController;
use App\Http\Controllers\SeccionController;

use App\Http\Controllers\TecnicoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});


Route::get('/index', [AdminController::class, 'index'])->name('list.index');


Route::get('/index', [MaquinaController::class, 'show'])->name('maquina.show');
Route::get('/createMaquina', [MaquinaController::class, 'create'])->name('maquina.create');
Route::post('/saveMaquina', [MaquinaController::class, 'save'])->name('maquina.save');
Route::delete('/deleteMaquina/{id}', [MaquinaController::class, 'delete'])->name('maquina.delete');

Route::get('/showOperario', [OperarioController::class, 'show'])->name('operario.show');
Route::get('/createOperario', [OperarioController::class, 'create'])->name('operario.create');
Route::post('/saveOperario', [OperarioController::class, 'save'])->name('operario.save');
Route::delete('/deleteOperario/{id}', [OperarioController::class, 'delete'])->name('operario.delete');


Route::get('/showTecnico', [TecnicoController::class, 'show'])->name('tecnico.show');
Route::get('/createTecnico', [TecnicoController::class, 'create'])->name('tecnico.create');
Route::post('/saveTecnico', [TecnicoController::class, 'save'])->name('tecnico.save');
Route::delete('/deleteTecnico/{id}', [TecnicoController::class, 'delete'])->name('tecnico.delete');


Route::get('/showSeccion', [SeccionController::class, 'show'])->name('seccion.show');
Route::get('/createSeccion', [SeccionController::class, 'create'])->name('seccion.create');
Route::post('/saveSeccion', [SeccionController::class, 'save'])->name('seccion.save');
Route::delete('/deleteSeccion/{id}', [SeccionController::class, 'delete'])->name('seccion.delete');


Route::get('/showMantenimiento', [MantenimientoController::class, 'show'])->name('mantenimiento.show');
Route::get('/createMantenimiento', [MantenimientoController::class, 'create'])->name('mantenimiento.create');
Route::post('/saveMantenimiento', [MantenimientoController::class, 'save'])->name('mantenimiento.save');
Route::delete('/deleteMantenimiento/{id}', [MantenimientoController::class, 'delete'])->name('mantenimiento.delete');


Route::get('/createCampus', [CampusController::class, 'create'])->name('campus.create');
Route::get('/showCampus', [CampusController::class, 'show'])->name('campus.show');
Route::post('/saveCampus', [CampusController::class, 'save'])->name('campus.save');
Route::delete('/deleteCampus/{id}', [CampusController::class, 'delete'])->name('campus.delete');



