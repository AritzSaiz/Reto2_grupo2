<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MaquinaController;
use App\Http\Controllers\OperarioController;
use App\Http\Controllers\SeccionController;

use App\Http\Controllers\TecnicoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/index', [AdminController::class, 'index'])->name('list.index');

Route::get('/create', [AdminController::class, 'create'])->name('create');


Route::post('maquina/save', [MaquinaController::class, 'save'])->name('maquina.save');

Route::post('seccion/save', [SeccionController::class, 'save'])->name('seccion.save');

Route::post('operario/save', [OperarioController::class, 'save'])->name('operario.save');

Route::get('/index', [MaquinaController::class, 'show'])->name('maquina.show');

Route::get('/showOperario', [OperarioController::class, 'show'])->name('operario.show');

Route::get('/showTecnico', [TecnicoController::class, 'show'])->name('tecnico.show');

Route::get('/showSeccion', [SeccionController::class, 'show'])->name('seccion.show');
