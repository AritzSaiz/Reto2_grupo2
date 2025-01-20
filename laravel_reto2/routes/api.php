<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('/index', [AdminController::class, 'index'])->name('list.index');


Route::get('/index', [MaquinaController::class, 'show'])->name('maquina.show');
Route::get('/createMaquina', [MaquinaController::class, 'create'])->name('maquina.create');
Route::post('/saveMaquina', [MaquinaController::class, 'save'])->name('maquina.save');

Route::get('/showOperario', [OperarioController::class, 'show'])->name('operario.show');
Route::get('/createOperario', [OperarioController::class, 'create'])->name('operario.create');
Route::post('/saveOperario', [OperarioController::class, 'save'])->name('operario.save');


Route::get('/showTecnico', [TecnicoController::class, 'show'])->name('tecnico.show');
Route::get('/createTecnico', [TecnicoController::class, 'create'])->name('tecnico.create');

Route::get('/showSeccion', [SeccionController::class, 'show'])->name('seccion.show');
Route::get('/createSeccion', [SeccionController::class, 'create'])->name('seccion.create');
Route::post('/saveSeccion', [SeccionController::class, 'save'])->name('seccion.save');


Route::get('/createCampus', [CampusController::class, 'create'])->name('campus.create');
Route::get('/showCampus', [CampusController::class, 'show'])->name('campus.show');
