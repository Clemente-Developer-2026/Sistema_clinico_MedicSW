<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| RUTAS PÚBLICAS (No requieren sesión)
|--------------------------------------------------------------------------
*/
Route::get('/', function () { return redirect('/login'); });

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| RUTAS PROTEGIDAS (El candado del sistema)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    
    // Aquí tus compañeros pueden ir agregando libremente sus módulos
    Route::get('/administracion', function () { 
        return view('administracion.index'); 
    })->name('dashboard');
    
    // Ejemplos de rutas 
    // Route::get('/pacientes', [PacienteController::class, 'index']);
    // Route::get('/medicos', [MedicoController::class, 'index']);
    Route::resource('usuarios', UserController::class);
});



//Route::get('/', function () {
//    return view('administracion.index');
//});

// Médicos y Horarios
// Route::get('/medicos', function () { return view('medicos.index'); });
// Route::get('/medicos/registrar', function () { return view('medicos.create'); });
// Route::get('/horarios', function () { return view('medicos.horarios'); });

// // Administración
// Route::get('/administracion', function () { return view('administracion.index'); });

// // Historial Clínico
// Route::get('/historiales', function () { return view('historial.index'); });
// Route::get('/historiales/nuevo', function () { return view('historial.create'); });
// Route::get('/historiales/detalle/{id}', function ($id) { return view('historial.show'); });

// // Pacientes
// Route::get('/pacientes', function () {return view('pacientes.index');});
// Route::get('/pacientes/nuevo', function () {return view('pacientes.create');});
// Route::get('/pacientes/editar', function () {return view('pacientes.edit');});

// // Citas Médicas
// Route::get('/citas', function () {return view('citas.index');});
// Route::get('/citas/nueva', function () {return view('citas.create');});
// Route::get('/citas/editar', function () {return view('citas.edit');});

// // Login
// Route::get('/login', function () {return view('auth.login');});