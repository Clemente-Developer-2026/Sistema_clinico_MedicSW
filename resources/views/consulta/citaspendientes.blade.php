@extends('layouts.app')

@section('modulo_titulo', 'Consultas del Día')

@section('contenido')

@if(session('success'))
<div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl">
    {{ session('error') }}
</div>
@endif

{{-- Resumen --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <div class="bg-sky-100 p-6 rounded-2xl shadow">
        <h3 class="text-sky-800 font-bold">Médicos con citas hoy</h3>
        <p class="text-4xl font-bold mt-2">{{ $medicos->count() }}</p>
    </div>
    <div class="bg-yellow-100 p-6 rounded-2xl shadow">
        <h3 class="text-yellow-800 font-bold">Citas pendientes</h3>
        <p class="text-4xl font-bold mt-2">{{ $totalPendientes }}</p>
    </div>
    <div class="bg-slate-100 p-6 rounded-2xl shadow">
        <h3 class="text-slate-600 font-bold">Fecha</h3>
        <p class="text-2xl font-bold mt-2">{{ \Carbon\Carbon::today()->format('d/m/Y') }}</p>
    </div>
</div>

{{-- Tarjetas por médico --}}
@forelse($medicos as $medico)
<div class="bg-white rounded-2xl shadow-lg p-6 mb-6">

    {{-- Encabezado del médico --}}
    <div class="flex items-center gap-4 mb-4 pb-4 border-b border-slate-100">
        <div class="w-12 h-12 rounded-full bg-sky-100 flex items-center justify-center">
            <i class="fa-solid fa-user-doctor text-sky-600 text-xl"></i>
        </div>
        <div>
            <h2 class="text-lg font-bold text-slate-700">
                Dr. {{ $medico->nombres }} {{ $medico->apellidos }}
            </h2>
            <p class="text-sm text-slate-400">
                {{ $medico->especialidades->pluck('nombre')->join(', ') }}
            </p>
        </div>
        <span class="ml-auto bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">
            {{ $medico->citas->count() }} pendiente(s)
        </span>
    </div>

    {{-- Tabla de citas del médico --}}
    <table class="w-full text-sm">
        <thead class="bg-slate-50">
            <tr>
                <th class="p-3 text-left text-slate-500">Ficha</th>
                <th class="p-3 text-left text-slate-500">Paciente</th>
                <th class="p-3 text-left text-slate-500">Especialidad</th>
                <th class="p-3 text-left text-slate-500">Hora</th>
                <th class="p-3 text-left text-slate-500">Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($medico->citas as $cita)
            <tr class="border-b border-slate-50 hover:bg-slate-50">
                <td class="p-3 font-bold text-sky-600">#{{ $cita->numero_ficha }}</td>
                <td class="p-3">
                    <p class="font-medium text-slate-700">
                        {{ $cita->paciente->nombres }} {{ $cita->paciente->apellidos }}
                    </p>
                    <p class="text-xs text-slate-400">CI: {{ $cita->paciente->carnet_identidad }}</p>
                </td>
                <td class="p-3 text-slate-600">{{ $cita->especialidad->nombre }}</td>
                <td class="p-3 text-slate-600">
                    {{ \Carbon\Carbon::parse($cita->hora_cita)->format('h:i A') }}
                </td>
                <td class="p-3">
                    <a href="{{ route('consulta.atender', $cita->id_cita) }}"
                        class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-xl text-xs flex items-center gap-2 w-fit">
                        <i class="fa-solid fa-stethoscope"></i> Atender
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@empty
<div class="bg-white rounded-2xl shadow-lg p-12 text-center">
    <i class="fa-solid fa-calendar-xmark text-5xl text-slate-300 mb-4 block"></i>
    <h3 class="text-lg font-bold text-slate-500">No hay citas pendientes para hoy</h3>
    <p class="text-sm text-slate-400 mt-1">Las citas aparecerán aquí una vez que sean registradas</p>
    <a href="{{ route('citas.index') }}"
        class="mt-4 inline-block bg-sky-600 hover:bg-sky-700 text-white px-5 py-2 rounded-xl text-sm">
        Ir a Citas Médicas
    </a>
</div>
@endforelse

@endsection