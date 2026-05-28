@extends('layouts.app')

@section('modulo_titulo', 'Detalle de Consulta')

@section('contenido')

{{-- Navegación --}}
<div class="flex items-center gap-2 text-sm text-slate-400 mb-6">
    <a href="{{ route('historial.index') }}" class="hover:text-sky-600">Historial</a>
    <i class="fa-solid fa-chevron-right text-xs"></i>
    <a href="{{ route('historial.show', $paciente->id_paciente) }}" class="hover:text-sky-600">
        {{ $paciente->nombres }} {{ $paciente->apellidos }}
    </a>
    <i class="fa-solid fa-chevron-right text-xs"></i>
    <span class="text-slate-600">Consulta del
        {{ \Carbon\Carbon::parse($historial->cita->fecha_cita)->format('d/m/Y') }}
    </span>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    {{-- Columna izquierda: datos paciente --}}
    <div class="space-y-4">

        <div class="bg-white rounded-2xl shadow-sm p-5">
            <h3 class="font-bold text-slate-700 mb-4 border-b pb-2">
                <i class="fa-solid fa-user mr-2 text-sky-500"></i>Paciente
            </h3>
            <div class="space-y-2 text-sm">
                <p class="font-semibold text-slate-700 text-base">
                    {{ $paciente->nombres }} {{ $paciente->apellidos }}
                </p>
                <p class="text-slate-400">
                    <i class="fa-solid fa-id-card mr-2"></i>{{ $paciente->carnet_identidad }}
                </p>
                <p class="text-slate-400">
                    <i class="fa-solid fa-cake-candles mr-2"></i>
                    {{ \Carbon\Carbon::parse($paciente->fecha_nacimiento)->format('d/m/Y') }}
                    ({{ \Carbon\Carbon::parse($paciente->fecha_nacimiento)->age }} años)
                </p>
                @if($paciente->telefono)
                <p class="text-slate-400">
                    <i class="fa-solid fa-phone mr-2"></i>{{ $paciente->telefono }}
                </p>
                @endif
                @if($paciente->grupo_sanguineo)
                <p class="text-red-500 font-semibold">
                    <i class="fa-solid fa-droplet mr-2"></i>{{ $paciente->grupo_sanguineo }}
                </p>
                @endif
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-5">
            <h3 class="font-bold text-slate-700 mb-4 border-b pb-2">
                <i class="fa-solid fa-calendar-check mr-2 text-sky-500"></i>Datos de la cita
            </h3>
            <div class="space-y-2 text-sm text-slate-500">
                <p><span class="font-medium text-slate-600">Fecha:</span>
                    {{ \Carbon\Carbon::parse($historial->cita->fecha_cita)->format('d/m/Y') }}
                </p>
                <p><span class="font-medium text-slate-600">Hora:</span>
                    {{ \Carbon\Carbon::parse($historial->cita->hora_cita)->format('h:i A') }}
                </p>
                <p><span class="font-medium text-slate-600">Ficha:</span>
                    #{{ $historial->cita->numero_ficha }}
                </p>
                <p><span class="font-medium text-slate-600">Médico:</span>
                    Dr. {{ $historial->cita->medico->nombres }} {{ $historial->cita->medico->apellidos }}
                </p>
                <p><span class="font-medium text-slate-600">Especialidad:</span>
                    {{ $historial->cita->especialidad->nombre }}
                </p>
            </div>
        </div>

        {{-- Signos vitales --}}
        @if($historial->presion_arterial || $historial->peso || $historial->talla)
        <div class="bg-white rounded-2xl shadow-sm p-5">
            <h3 class="font-bold text-slate-700 mb-4 border-b pb-2">
                <i class="fa-solid fa-heart-pulse mr-2 text-sky-500"></i>Signos vitales
            </h3>
            <div class="space-y-2 text-sm text-slate-500">
                @if($historial->presion_arterial)
                <p><span class="font-medium text-slate-600">Presión arterial:</span>
                    {{ $historial->presion_arterial }}
                </p>
                @endif
                @if($historial->peso)
                <p><span class="font-medium text-slate-600">Peso:</span> {{ $historial->peso }}</p>
                @endif
                @if($historial->talla)
                <p><span class="font-medium text-slate-600">Talla:</span> {{ $historial->talla }}</p>
                @endif
            </div>
        </div>
        @endif

    </div>

    {{-- Columna derecha: detalle clínico --}}
    <div class="md:col-span-2 space-y-4">

        <div class="bg-white rounded-2xl shadow-sm p-6">
            <h3 class="font-bold text-slate-700 mb-4 border-b pb-2">
                <i class="fa-solid fa-notes-medical mr-2 text-sky-500"></i>Detalle clínico
            </h3>
            <div class="space-y-5">

                <div>
                    <p class="text-xs font-semibold text-sky-600 uppercase tracking-wider mb-1">
                        Motivo de consulta
                    </p>
                    <p class="text-slate-600 text-sm bg-slate-50 rounded-xl p-3">
                        {{ $historial->motivo_consulta ?? '—' }}
                    </p>
                </div>

                <div>
                    <p class="text-xs font-semibold text-sky-600 uppercase tracking-wider mb-1">
                        Síntomas
                    </p>
                    <p class="text-slate-600 text-sm bg-slate-50 rounded-xl p-3">
                        {{ $historial->sintomas ?? '—' }}
                    </p>
                </div>

                <div>
                    <p class="text-xs font-semibold text-sky-600 uppercase tracking-wider mb-1">
                        Diagnóstico
                    </p>
                    <p class="text-slate-600 text-sm bg-sky-50 border border-sky-100 rounded-xl p-3 font-medium">
                        {{ $historial->diagnostico ?? '—' }}
                    </p>
                </div>

                <div>
                    <p class="text-xs font-semibold text-sky-600 uppercase tracking-wider mb-1">
                        Tratamiento / Receta
                    </p>
                    <p class="text-slate-600 text-sm bg-green-50 border border-green-100 rounded-xl p-3">
                        {{ $historial->tratamiento_receta ?? '—' }}
                    </p>
                </div>

            </div>
        </div>

        {{-- Botones --}}
        <div class="flex justify-between">
            <a href="{{ route('historial.show', $paciente->id_paciente) }}"
                class="px-5 py-2 rounded-xl border border-slate-300 text-slate-600 text-sm hover:bg-slate-50 flex items-center gap-2">
                <i class="fa-solid fa-arrow-left"></i> Volver al historial
            </a>
        </div>

    </div>
</div>

@endsection