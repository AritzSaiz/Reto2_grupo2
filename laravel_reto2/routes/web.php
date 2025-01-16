<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/index', [AdminController::class, 'index'])->name('list.index');

Route::get('/create', [AdminController::class, 'create'])->name('create');


//Route::post('/save', [\App\Http\Controllers\MaquinaController::class, 'save'])->name('maquina.save');

Route::post('/save', [SeccionController::class, 'save'])->name('seccion.save');
/*
 use App\Http\Controllers\MaquinaController;

Route::get('/listar', [AdminController::class, 'index'])->name('list.index');

Route::get('/listar/{tipo}', [MaquinaController::class, 'listar'])->name('list.listar');

Route::get('/crear', [AdminController::class, 'index'])->name('creAar.index');


Route::get('/crear/{tipo}', [MaquinaController::class, 'listar'])->name('list.listar');*/
