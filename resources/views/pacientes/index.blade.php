@extends('layouts.app')

@section('modulo_titulo', 'Gestión de Pacientes')

@section('contenido')

<div class="bg-white rounded-2xl shadow-lg p-6">

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-2xl font-bold text-slate-700">
            Lista de Pacientes
        </h2>

        <a href="/pacientes/nuevo"
           class="bg-sky-600 hover:bg-sky-700 text-white px-5 py-3 rounded-xl transition">
            <i class="fa-solid fa-plus"></i>
            Nuevo Paciente
        </a>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full text-sm text-left">

            <thead class="bg-slate-100 text-slate-700 uppercase">

                <tr>
                    <th class="p-4">ID</th>
                    <th class="p-4">Nombre</th>
                    <th class="p-4">CI</th>
                    <th class="p-4">Teléfono</th>
                    <th class="p-4">Edad</th>
                    <th class="p-4">Acciones</th>
                </tr>

            </thead>

            <tbody>

                <tr class="border-b hover:bg-slate-50">

                    <td class="p-4">1</td>
                    <td class="p-4">Juan Pérez</td>
                    <td class="p-4">1234567</td>
                    <td class="p-4">77777777</td>
                    <td class="p-4">25</td>

                    <td class="p-4 flex gap-2">

                        <a href="/pacientes/ver"
                           class="bg-sky-500 hover:bg-sky-600 text-white px-3 py-1 rounded-lg">
                            Ver
                        </a>

                        <a href="/pacientes/editar"
                           class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded-lg">
                            Editar
                        </a>

                        <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg">
                            Eliminar
                        </button>

                    </td>

                </tr>

            </tbody>

        </table>

    </div>

</div>

@endsection