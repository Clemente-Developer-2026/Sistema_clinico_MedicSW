@extends('layouts.app')

@section('modulo_titulo', 'Citas Médicas')

@section('contenido')

<div class="space-y-6">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="bg-sky-100 p-6 rounded-2xl shadow">
            <h3 class="text-sky-800 font-bold">Citas Hoy</h3>
            <p class="text-4xl font-bold mt-2">12</p>
        </div>

        <div class="bg-green-100 p-6 rounded-2xl shadow">
            <h3 class="text-green-800 font-bold">Confirmadas</h3>
            <p class="text-4xl font-bold mt-2">8</p>
        </div>

        <div class="bg-red-100 p-6 rounded-2xl shadow">
            <h3 class="text-red-800 font-bold">Canceladas</h3>
            <p class="text-4xl font-bold mt-2">2</p>
        </div>

    </div>

    <div class="bg-white rounded-2xl shadow-lg p-6">

        <div class="flex justify-between mb-6">

            <h2 class="text-2xl font-bold text-slate-700">
                Lista de Citas
            </h2>

            <a href="/citas/nueva"
               class="bg-sky-600 hover:bg-sky-700 text-white px-5 py-3 rounded-xl">
                Nueva Cita
            </a>

        </div>

        <table class="w-full">

            <thead class="bg-slate-100">

                <tr>
                    <th class="p-4">Paciente</th>
                    <th class="p-4">Médico</th>
                    <th class="p-4">Fecha</th>
                    <th class="p-4">Hora</th>
                    <th class="p-4">Estado</th>
                </tr>

            </thead>

            <tbody>

                <tr class="border-b">

                    <td class="p-4">María López</td>
                    <td class="p-4">Dr. Carlos</td>
                    <td class="p-4">25/05/2026</td>
                    <td class="p-4">10:00 AM</td>

                    <td class="p-4">
                        <span class="bg-green-500 text-white px-3 py-1 rounded-full text-xs">
                            Confirmada
                        </span>
                    </td>

                </tr>

            </tbody>

        </table>

    </div>

</div>

@endsection