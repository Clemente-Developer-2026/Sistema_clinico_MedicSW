@extends('layouts.app')

@section('modulo_titulo', 'Atender Consulta')

@section('contenido')

{{-- Datos de la cita --}}
<div class="bg-sky-50 border border-sky-200 rounded-2xl p-6 mb-6">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 text-sm">
        <div>
            <p class="text-sky-600 font-semibold mb-1">Paciente</p>
            <p class="text-slate-700 font-bold text-base">
                {{ $cita->paciente->nombres }} {{ $cita->paciente->apellidos }}
            </p>
            <p class="text-slate-400 text-xs">CI: {{ $cita->paciente->carnet_identidad }}</p>
        </div>
        <div>
            <p class="text-sky-600 font-semibold mb-1">Médico</p>
            <p class="text-slate-700">Dr. {{ $cita->medico->nombres }} {{ $cita->medico->apellidos }}</p>
        </div>
        <div>
            <p class="text-sky-600 font-semibold mb-1">Especialidad</p>
            <p class="text-slate-700">{{ $cita->especialidad->nombre }}</p>
        </div>
        <div>
            <p class="text-sky-600 font-semibold mb-1">Ficha / Hora</p>
            <p class="text-slate-700">
                #{{ $cita->numero_ficha }} —
                {{ \Carbon\Carbon::parse($cita->hora_cita)->format('h:i A') }}
            </p>
        </div>
    </div>
</div>

{{-- Datos previos del paciente --}}
@if($cita->paciente->alergias || $cita->paciente->enfermedades_base)
<div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-4 mb-6 text-sm">
    <p class="font-semibold text-yellow-700 mb-2">
        <i class="fa-solid fa-triangle-exclamation mr-1"></i> Antecedentes del paciente
    </p>
    <div class="grid grid-cols-2 gap-4">
        @if($cita->paciente->alergias)
        <div>
            <p class="text-yellow-600 font-medium">Alergias</p>
            <p class="text-slate-600">{{ $cita->paciente->alergias }}</p>
        </div>
        @endif
        @if($cita->paciente->enfermedades_base)
        <div>
            <p class="text-yellow-600 font-medium">Enfermedades base</p>
            <p class="text-slate-600">{{ $cita->paciente->enfermedades_base }}</p>
        </div>
        @endif
    </div>
</div>
@endif

{{-- Formulario de consulta --}}
<form action="{{ route('consulta.store', $cita->id_cita) }}" method="POST">
    @csrf

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- Columna izquierda --}}
        <div class="space-y-4">

            <div class="bg-white rounded-2xl shadow-sm p-6 space-y-4">
                <h3 class="font-bold text-slate-700 border-b pb-2">
                    <i class="fa-solid fa-notes-medical mr-2 text-sky-500"></i>Consulta
                </h3>

                <div>
                    <label class="block text-sm font-medium text-slate-600 mb-1">
                        Motivo de consulta <span class="text-red-500">*</span>
                    </label>
                    <textarea name="motivo_consulta" rows="3" required
                        class="w-full border border-slate-300 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-sky-400"
                        placeholder="Describa el motivo de la consulta..."></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-600 mb-1">Síntomas</label>
                    <textarea name="sintomas" rows="3"
                        class="w-full border border-slate-300 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-sky-400"
                        placeholder="Síntomas reportados por el paciente..."></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-600 mb-1">
                        Diagnóstico <span class="text-red-500">*</span>
                    </label>
                    <textarea name="diagnostico" rows="3" required
                        class="w-full border border-slate-300 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-sky-400"
                        placeholder="Diagnóstico médico..."></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-600 mb-1">
                        Tratamiento / Receta
                    </label>
                    <textarea name="tratamiento_receta" rows="4"
                        class="w-full border border-slate-300 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-sky-400"
                        placeholder="Medicamentos, dosis, indicaciones..."></textarea>
                </div>

            </div>
        </div>

        {{-- Columna derecha --}}
        <div class="space-y-4">

            <div class="bg-white rounded-2xl shadow-sm p-6 space-y-4">
                <h3 class="font-bold text-slate-700 border-b pb-2">
                    <i class="fa-solid fa-heart-pulse mr-2 text-sky-500"></i>Signos Vitales
                </h3>

                <div>
                    <label class="block text-sm font-medium text-slate-600 mb-1">
                        Presión arterial
                    </label>
                    <input type="text" name="presion_arterial" placeholder="Ej: 120/80 mmHg"
                        class="w-full border border-slate-300 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-sky-400">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-1">Peso</label>
                        <input type="text" name="peso" placeholder="Ej: 70 kg"
                            class="w-full border border-slate-300 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-sky-400">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-1">Talla</label>
                        <input type="text" name="talla" placeholder="Ej: 1.70 m"
                            class="w-full border border-slate-300 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-sky-400">
                    </div>
                </div>

            </div>

            {{-- Grupo sanguíneo del paciente --}}
            @if($cita->paciente->grupo_sanguineo)
            <div class="bg-white rounded-2xl shadow-sm p-4 flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center">
                    <i class="fa-solid fa-droplet text-red-500 text-lg"></i>
                </div>
                <div>
                    <p class="text-xs text-slate-400">Grupo sanguíneo</p>
                    <p class="text-xl font-bold text-red-600">{{ $cita->paciente->grupo_sanguineo }}</p>
                </div>
            </div>
            @endif

        </div>
    </div>

    {{-- Botones --}}
    <div class="flex justify-end gap-3 mt-6">
        <a href="{{ route('consulta.index') }}"
            class="px-6 py-3 rounded-xl border border-slate-300 text-slate-600 text-sm hover:bg-slate-50">
            Cancelar
        </a>
        <button type="submit"
            class="px-6 py-3 rounded-xl bg-green-500 hover:bg-green-600 text-white text-sm font-semibold">
            <i class="fa-solid fa-check mr-2"></i>Finalizar Consulta
        </button>
    </div>

</form>

@endsection