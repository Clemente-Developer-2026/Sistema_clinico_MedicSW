@extends('layouts.app')

@section('modulo_titulo', 'Registrar Paciente')

@section('contenido')

<div class="bg-white rounded-2xl shadow-lg p-8 max-w-4xl mx-auto">

    <h2 class="text-2xl font-bold text-slate-700 mb-8">
        Nuevo Paciente
    </h2>

    <form class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div>
            <label class="block mb-2 text-slate-600">Nombre Completo</label>
            <input type="text"
                   class="w-full border border-slate-300 rounded-xl px-4 py-3">
        </div>

        <div>
            <label class="block mb-2 text-slate-600">CI</label>
            <input type="text"
                   class="w-full border border-slate-300 rounded-xl px-4 py-3">
        </div>

        <div>
            <label class="block mb-2 text-slate-600">Teléfono</label>
            <input type="text"
                   class="w-full border border-slate-300 rounded-xl px-4 py-3">
        </div>

        <div>
            <label class="block mb-2 text-slate-600">Edad</label>
            <input type="number"
                   class="w-full border border-slate-300 rounded-xl px-4 py-3">
        </div>

        <div class="md:col-span-2">
            <label class="block mb-2 text-slate-600">Dirección</label>
            <textarea rows="4"
                      class="w-full border border-slate-300 rounded-xl px-4 py-3"></textarea>
        </div>

        <div class="md:col-span-2 flex justify-end gap-4">

            <a href="/pacientes" class="bg-sky-600 hover:bg-sky-700 text-white px-8 py-3 rounded-xl">
                Cancelar
            </a>

            <button class="bg-sky-600 hover:bg-sky-700 text-white px-8 py-3 rounded-xl">
                Guardar Paciente
            </button>

        </div>

    </form>

</div>

@endsection