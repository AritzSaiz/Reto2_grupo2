<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MaquinaController;
use App\Http\Controllers\OperarioController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\SeccionController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\CampusController;
use Illuminate\Support\Facades\Route;

// Admin routes
Route::middleware('auth:sanctum')->group(function () {
    // Rutas protegidas (requieren autenticación)
    Route::controller(AdminController::class)->group(function() {
        Route::get('/admins', 'index')->name('admins.index');
    });
});

// Máquina routes
Route::middleware('auth:sanctum')->group(function () {
    Route::controller(MaquinaController::class)->group(function() {
        Route::get('/maquinas', 'show')->name('maquinas.show');
        Route::post('/maquinas', 'create')->name('maquinas.create');
        Route::put('/maquinas/{id}', 'save')->name('maquinas.save');
        Route::delete('/maquinas/{id}', 'delete')->name('maquinas.delete');
    });
});

// Operario routes
Route::controller(OperarioController::class)->group(function() {
    Route::get('/operarios', 'show')->name('operarios.show');
    Route::post('/operarios', 'create')->name('operarios.create');
    Route::put('/operarios/{id}', 'save')->name('operarios.save');
    Route::delete('/operarios/{id}', 'delete')->name('operarios.delete');
});

// Técnico routes
Route::controller(TecnicoController::class)->group(function() {
    Route::get('/tecnicos', 'show')->name('tecnicos.show');
    Route::post('/tecnicos', 'create')->name('tecnicos.create');
    Route::put('/tecnicos/{id}', 'save')->name('tecnicos.save');
    Route::delete('/tecnicos/{id}', 'delete')->name('tecnicos.delete');
});

// Sección routes
Route::controller(SeccionController::class)->group(function() {
    Route::get('/secciones', 'show')->name('secciones.show');
    Route::post('/secciones', 'create')->name('secciones.create');
    Route::put('/secciones/{id}', 'save')->name('secciones.save');
    Route::delete('/secciones/{id}', 'delete')->name('secciones.delete');
});

// Mantenimiento routes
Route::controller(MantenimientoController::class)->group(function() {
    Route::get('/mantenimientos', 'show')->name('mantenimientos.show');
    Route::post('/mantenimientos', 'create')->name('mantenimientos.create');
    Route::put('/mantenimientos/{id}', 'save')->name('mantenimientos.save');
    Route::delete('/mantenimientos/{id}', 'delete')->name('mantenimientos.delete');
});

// Campus routes
Route::controller(CampusController::class)->group(function() {
    Route::get('/campus', 'show')->name('campus.show');
    Route::post('/campus', 'create')->name('campus.create');
    Route::put('/campus/{id}', 'save')->name('campus.save');
    Route::delete('/campus/{id}', 'delete')->name('campus.delete');
});
