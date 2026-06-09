<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // 1. Muestra la pantalla visual del Login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // 2. Procesa los datos que el usuario escribió en el formulario
    public function login(Request $request)
    {
        // Validamos que los campos no estén vacíos
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Intentamos iniciar sesión con la base de datos
        if (Auth::attempt($credentials)) {
            // Regeneramos la sesión por seguridad (evita ataques de fijación de sesión)
            $request->session()->regenerate();
            
            // Si el login es correcto, lo mandamos al panel principal del sistema
            return redirect()->intended('/administracion'); 
        }

        // Si la contraseña o correo están mal, lo devolvemos con un mensaje de error
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }

    // 3. Destruye la sesión (Cerrar sesión)
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }

    public function index(){
        $usuarios = User::orderBy('id','desc')->get();

        return view('usuarios.index',compact('usuarios'));

    }
}