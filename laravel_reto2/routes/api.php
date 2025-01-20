<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\MaquinaController;
use App\Http\Controllers\OperarioController;
use App\Http\Controllers\SeccionController;
use App\Http\Controllers\TecnicoController;
use Illuminate\Support\Facades\Route;


Route::controller(AdminController::class)->group(function () {
    Route::get('admin/index', 'index');
});

Route::controller(MaquinaController::class)->group(function () {
    Route::get('maquina/index', 'show');
    Route::get('maquina/create', 'create');
    Route::post('maquina/save', 'save');
    Route::delete('maquina/delete/{id}', 'delete');
});

Route::controller(OperarioController::class)->group(function () {
    Route::get('operario/show', 'show');
    Route::get('operario/create', 'create');
    Route::post('operario/save', 'save');
    Route::delete('operario/delete/{id}', 'delete');
});

Route::controller(TecnicoController::class)->group(function () {
    Route::get('tecnico/show', 'show');
    Route::get('tecnico/create', 'create');
    Route::post('tecnico/save', 'save');
    Route::delete('tecnico/delete/{id}', 'delete');
});

Route::controller(SeccionController::class)->group(function () {
    Route::get('seccion/show', 'show');
    Route::get('seccion/create', 'create');
    Route::post('seccion/save', 'save');
    Route::delete('seccion/delete/{id}', 'delete');
});

Route::controller(CampusController::class)->group(function () {
    Route::get('campus/show', 'show');
    Route::get('campus/create', 'create');
    Route::post('campus/save', 'save');
    Route::delete('campus/delete', 'delete');
});
