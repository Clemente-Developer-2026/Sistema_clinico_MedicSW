<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('administracion.index');
});

// Médicos y Horarios
Route::get('/medicos', function () { return view('medicos.index'); });
Route::get('/medicos/registrar', function () { return view('medicos.create'); });
Route::get('/horarios', function () { return view('medicos.horarios'); });

// Administración
Route::get('/administracion', function () { return view('administracion.index'); });

// Historial Clínico
Route::get('/historiales', function () { return view('historial.index'); });
Route::get('/historiales/nuevo', function () { return view('historial.create'); });
Route::get('/historiales/detalle/{id}', function ($id) { return view('historial.show'); });
