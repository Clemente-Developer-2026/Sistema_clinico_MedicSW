@extends('layouts.app')

@section('modulo_titulo', 'Iniciar Sesión')

@section('contenido')

<div class="flex items-center justify-center min-h-[80vh]">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8">

        <div class="text-center mb-8">
            <i class="fa-solid fa-heart-pulse text-5xl text-sky-600 mb-4"></i>
            <h2 class="text-3xl font-bold text-slate-700">MedicSW</h2>
            <p class="text-slate-500 mt-2">Sistema Clínico</p>
        </div>

        <form>

            <div class="mb-5">
                <label class="block text-slate-600 mb-2">
                    Correo Electrónico
                </label>

                <input type="email"
                       placeholder="ejemplo@gmail.com"
                       class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-sky-500">
            </div>

            <div class="mb-6">
                <label class="block text-slate-600 mb-2">
                    Contraseña
                </label>

                <input type="password"
                       placeholder="********"
                       class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-sky-500">
            </div>

            <button class="w-full bg-sky-600 hover:bg-sky-700 text-white py-3 rounded-xl font-semibold transition duration-300">
                Ingresar
            </button>

        </form>

    </div>

</div>

@endsection