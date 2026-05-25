@extends('layouts.app')

@section('modulo_titulo', 'Editar Cita Médica')

@section('contenido')

<div class="bg-white rounded-2xl shadow-lg p-8 max-w-5xl mx-auto">

    <div class="flex items-center justify-between mb-8">

        <div>
            <h2 class="text-3xl font-bold text-slate-700">
                Editar Cita Médica
            </h2>

            <p class="text-slate-500 mt-2">
                Actualice la información de la cita.
            </p>
        </div>

        <div class="bg-yellow-100 p-4 rounded-2xl">
            <i class="fa-solid fa-pen-to-square text-4xl text-yellow-500"></i>
        </div>

    </div>

    <form class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- Paciente -->
        <div>
            <label class="block mb-2 text-slate-600 font-medium">
                Paciente
            </label>

            <select class="w-full border border-slate-300 rounded-xl px-4 py-3">
                <option selected>Juan Pérez</option>
                <option>María López</option>
            </select>
        </div>

        <!-- Médico -->
        <div>
            <label class="block mb-2 text-slate-600 font-medium">
                Médico
            </label>

            <select class="w-full border border-slate-300 rounded-xl px-4 py-3">
                <option selected>Dr. Carlos</option>
                <option>Dra. Ana</option>
            </select>
        </div>

        <!-- Fecha -->
        <div>
            <label class="block mb-2 text-slate-600 font-medium">
                Fecha
            </label>

            <input type="date"
                   value="2026-05-25"
                   class="w-full border border-slate-300 rounded-xl px-4 py-3">
        </div>

        <!-- Hora -->
        <div>
            <label class="block mb-2 text-slate-600 font-medium">
                Hora
            </label>

            <input type="time"
                   value="10:00"
                   class="w-full border border-slate-300 rounded-xl px-4 py-3">
        </div>

        <!-- Estado -->
        <div>
            <label class="block mb-2 text-slate-600 font-medium">
                Estado
            </label>

            <select class="w-full border border-slate-300 rounded-xl px-4 py-3">
                <option>Confirmada</option>
                <option>Pendiente</option>
                <option>Cancelada</option>
            </select>
        </div>

        <!-- Consultorio -->
        <div>
            <label class="block mb-2 text-slate-600 font-medium">
                Consultorio
            </label>

            <input type="text"
                   value="Consultorio 1"
                   class="w-full border border-slate-300 rounded-xl px-4 py-3">
        </div>

        <!-- Observaciones -->
        <div class="md:col-span-2">

            <label class="block mb-2 text-slate-600 font-medium">
                Observaciones
            </label>

            <textarea rows="5"
                      class="w-full border border-slate-300 rounded-xl px-4 py-3">Paciente con control mensual.</textarea>

        </div>

        <!-- Botones -->
        <div class="md:col-span-2 flex justify-end gap-4 mt-4">

            <a href="/citas"
               class="bg-slate-300 hover:bg-slate-400 text-slate-700 px-6 py-3 rounded-xl transition">
                Cancelar
            </a>

            <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-8 py-3 rounded-xl transition shadow-lg">
                <i class="fa-solid fa-pen"></i>
                Actualizar Cita
            </button>

        </div>

    </form>

</div>

@endsection