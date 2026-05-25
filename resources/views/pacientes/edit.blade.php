@extends('layouts.app')

@section('modulo_titulo', 'Editar Paciente')

@section('contenido')

<div class="bg-white rounded-2xl shadow-lg p-8 max-w-4xl mx-auto">

    <h2 class="text-2xl font-bold text-slate-700 mb-8">
        Editar Paciente
    </h2>

    <form class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div>
            <label class="block mb-2">Nombre Completo</label>
            <input type="text"
                   value="Juan Pérez"
                   class="w-full border border-slate-300 rounded-xl px-4 py-3">
        </div>

        <div>
            <label class="block mb-2">CI</label>
            <input type="text"
                   value="1234567"
                   class="w-full border border-slate-300 rounded-xl px-4 py-3">
        </div>

        <div>
            <label class="block mb-2">Teléfono</label>
            <input type="text"
                   value="77777777"
                   class="w-full border border-slate-300 rounded-xl px-4 py-3">
        </div>

        <div>
            <label class="block mb-2">Edad</label>
            <input type="number"
                   value="25"
                   class="w-full border border-slate-300 rounded-xl px-4 py-3">
        </div>

        <div class="md:col-span-2 flex justify-end">

            <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-8 py-3 rounded-xl">
                Actualizar
            </button>

        </div>

    </form>

</div>

@endsection