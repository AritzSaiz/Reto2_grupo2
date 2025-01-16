<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MaquinaController;
use App\Http\Controllers\OperarioController;
use App\Http\Controllers\SeccionController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/index', [AdminController::class, 'index'])->name('list.index');

Route::get('/create', [AdminController::class, 'create'])->name('create');


Route::post('maquina/save', [MaquinaController::class, 'save'])->name('maquina.save');

Route::post('seccion/save', [SeccionController::class, 'save'])->name('seccion.save');

Route::post('operario/save', [OperarioController::class, 'save'])->name('operario.save');

