<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaMedicaController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\HistorialClinicoController;

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
//Route::get('/historiales', function () { return view('historial.index'); });
//Route::get('/historiales/nuevo', function () { return view('historial.create'); });
//Route::get('/historiales/detalle/{id}', function ($id) { return view('historial.show'); });

// Pacientes
Route::get('/pacientes', function () {return view('pacientes.index');});
Route::get('/pacientes/nuevo', function () {return view('pacientes.create');});
Route::get('/pacientes/editar', function () {return view('pacientes.edit');});

// Citas Médicas
//Route::get('/citas', function () {return view('citas.index');});
//Route::get('/citas/nueva', function () {return view('citas.create');});
//Route::get('/citas/editar', function () {return view('citas.edit');});

// Login
Route::get('/login', function () {return view('auth.login');});

//Modulo JAH
//==========================================================
//citas medicas e historial clinico
//==========================================================

Route::get('/citas/buscar-paciente', [CitaMedicaController::class, 'buscarPaciente'])->name('citas.buscarPaciente');
Route::get('/citas', [CitaMedicaController::class, 'index'])->name('citas.index');
Route::post('/citas', [CitaMedicaController::class, 'store'])->name('citas.store');
Route::put('/citas/{cita}', [CitaMedicaController::class, 'update'])->name('citas.update');
Route::delete('/citas/{cita}', [CitaMedicaController::class, 'destroy'])->name('citas.destroy');

Route::get('/consulta', [ConsultaController::class, 'citasPendientes'])->name('consulta.index');
Route::get('/consulta/{cita}/atender', [ConsultaController::class, 'atender'])->name('consulta.atender');
Route::post('/consulta/{cita}/atender', [ConsultaController::class, 'store'])->name('consulta.store');

Route::get('/historiales', [HistorialClinicoController::class, 'index'])->name('historial.index');
Route::get('/historiales/{paciente}', [HistorialClinicoController::class, 'show'])->name('historial.show');
Route::get('/historiales/{paciente}/{historial}', [HistorialClinicoController::class, 'detalle'])->name('historial.detalle');