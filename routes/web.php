<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;

Route::get('/', function () {
    return redirect()->route('estudiantes.index');
});

Route::get('/estudiantes', [EstudianteController::class, 'index'])
    ->name('estudiantes.index');

Route::get('/estudiantes/crear', [EstudianteController::class, 'create'])
    ->name('estudiantes.create');

Route::post('/estudiantes', [EstudianteController::class, 'store'])
    ->name('estudiantes.store');

Route::get('/estudiantes/{id}/editar', [EstudianteController::class, 'edit'])
    ->name('estudiantes.edit');

Route::put('/estudiantes/{id}', [EstudianteController::class, 'update'])
    ->name('estudiantes.update');

Route::delete('/estudiantes/{id}', [EstudianteController::class, 'destroy'])
    ->name('estudiantes.destroy');


