<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Muestra el formulario para crear un nuevo usuario.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Guarda el nuevo usuario en la base de datos.
     */
    public function store(Request $request)
    {
        // 1. Validamos que los datos que llegan del formulario estén correctos
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
            'rol' => ['required', 'in:administrador,medico,paciente'],
        ]);

        // 2. Creamos el registro en la base de datos MySQL
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Encriptamos la contraseña siempre
            'rol' => $request->rol,
            'estado' => 1, // 1 = Activo por defecto
        ]);

        // 3. Lo devolvemos al formulario con un mensaje de éxito
        return redirect()->route('usuarios.create')->with('success', '¡Usuario registrado exitosamente en el sistema!');
    }
    public function index()
    {
        // 1. Traemos todos los usuarios de la base de datos
        $usuarios = User::orderBy('id', 'desc')->get();
        
        // 2. Retornamos la vista y le pasamos la variable $usuarios
        return view('usuarios.index', compact('usuarios'));
    }


    public function show(string $id) { }
    public function edit(string $id) { }
    public function update(Request $request, string $id) { }
    public function destroy(string $id) { }
}