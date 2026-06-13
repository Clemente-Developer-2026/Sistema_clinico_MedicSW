@extends('layouts.app')

@section('modulo_titulo', 'Historial de ' . $paciente->nombres)

@section('contenido')

{{-- Datos del paciente --}}
<div class="bg-white rounded-2xl shadow-sm p-6 mb-6">
    <div class="flex items-center gap-5">
        <div class="w-16 h-16 rounded-full bg-sky-100 flex items-center justify-center text-sky-600 font-bold text-2xl">
            {{ strtoupper(substr($paciente->nombres, 0, 1)) }}
        </div>
        <div class="flex-1">
            <h2 class="text-xl font-bold text-slate-700">
                {{ $paciente->nombres }} {{ $paciente->apellidos }}
            </h2>
            <div class="flex gap-6 mt-1 text-sm text-slate-400 flex-wrap">
                <span><i class="fa-solid fa-id-card mr-1"></i>{{ $paciente->carnet_identidad }}</span>
                <span><i class="fa-solid fa-cake-candles mr-1"></i>
                    {{ \Carbon\Carbon::parse($paciente->fecha_nacimiento)->age }} años
                </span>
                @if($paciente->grupo_sanguineo)
                <span class="text-red-500 font-semibold">
                    <i class="fa-solid fa-droplet mr-1"></i>{{ $paciente->grupo_sanguineo }}
                </span>
                @endif
                @if($paciente->telefono)
                <span><i class="fa-solid fa-phone mr-1"></i>{{ $paciente->telefono }}</span>
                @endif
            </div>
        </div>
        <a href="{{ route('historial.index') }}"
            class="text-slate-400 hover:text-slate-600 text-sm flex items-center gap-2">
            <i class="fa-solid fa-arrow-left"></i> Volver
        </a>
    </div>

    {{-- Antecedentes --}}
    @if($paciente->alergias || $paciente->enfermedades_base)
    <div class="mt-4 pt-4 border-t border-slate-100 grid grid-cols-2 gap-4 text-sm">
        @if($paciente->alergias)
        <div class="bg-yellow-50 rounded-xl p-3">
            <p class="text-yellow-600 font-semibold mb-1">
                <i class="fa-solid fa-triangle-exclamation mr-1"></i>Alergias
            </p>
            <p class="text-slate-600">{{ $paciente->alergias }}</p>
        </div>
        @endif
        @if($paciente->enfermedades_base)
        <div class="bg-orange-50 rounded-xl p-3">
            <p class="text-orange-600 font-semibold mb-1">
                <i class="fa-solid fa-notes-medical mr-1"></i>Enfermedades base
            </p>
            <p class="text-slate-600">{{ $paciente->enfermedades_base }}</p>
        </div>
        @endif
    </div>
    @endif
</div>

{{-- Lista de consultas --}}
<div class="bg-white rounded-2xl shadow-lg p-6">

    <div class="flex justify-between items-center mb-6">
        <h3 class="text-lg font-bold text-slate-700">
            <i class="fa-solid fa-clock-rotate-left mr-2 text-sky-500"></i>
            Consultas registradas
        </h3>
        <span class="bg-sky-100 text-sky-700 px-3 py-1 rounded-full text-sm font-semibold">
            {{ $historiales->count() }} consulta(s)
        </span>
    </div>

    @forelse($historiales as $historial)
    <div class="border border-slate-100 rounded-2xl p-5 mb-4 hover:border-sky-200 hover:shadow-sm transition-all">
        <div class="flex justify-between items-start">
            <div class="flex gap-4">
                {{-- Fecha --}}
                <div class="text-center bg-sky-50 rounded-xl p-3 min-w-[60px]">
                    <p class="text-sky-600 font-bold text-lg leading-none">
                        {{ \Carbon\Carbon::parse($historial->cita->fecha_cita)->format('d') }}
                    </p>
                    <p class="text-sky-400 text-xs uppercase">
                        {{ \Carbon\Carbon::parse($historial->cita->fecha_cita)->translatedFormat('M') }}
                    </p>
                    <p class="text-sky-400 text-xs">
                        {{ \Carbon\Carbon::parse($historial->cita->fecha_cita)->format('Y') }}
                    </p>
                </div>
                {{-- Info consulta --}}
                <div>
                    <p class="font-semibold text-slate-700">{{ $historial->diagnostico }}</p>
                    <p class="text-sm text-slate-400 mt-1">
                        <i class="fa-solid fa-user-doctor mr-1"></i>
                        Dr. {{ $historial->cita->medico->nombres }} {{ $historial->cita->medico->apellidos }}
                        — {{ $historial->cita->especialidad->nombre }}
                    </p>
                    <p class="text-xs text-slate-400 mt-1">
                        <i class="fa-solid fa-clock mr-1"></i>
                        {{ \Carbon\Carbon::parse($historial->cita->hora_cita)->format('h:i A') }}
                        &nbsp;·&nbsp;
                        Ficha #{{ $historial->cita->numero_ficha }}
                    </p>
                </div>
            </div>
            {{-- Botón ver detalle --}}
            <a href="{{ route('historial.detalle', [$paciente->id_paciente, $historial->id_historial]) }}"
                class="bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded-xl text-xs flex items-center gap-2 shrink-0">
                <i class="fa-solid fa-eye"></i> Ver detalle
            </a>
        </div>

        {{-- Resumen motivo --}}
        @if($historial->motivo_consulta)
        <div class="mt-3 pt-3 border-t border-slate-100 text-sm text-slate-500">
            <span class="font-medium text-slate-600">Motivo: </span>
            {{ Str::limit($historial->motivo_consulta, 120) }}
        </div>
        @endif
    </div>
    @empty
    <div class="text-center py-10 text-slate-400">
        <i class="fa-solid fa-folder-open text-4xl mb-3 block"></i>
        No hay consultas registradas para este paciente
    </div>
    @endforelse
</div>

@endsection