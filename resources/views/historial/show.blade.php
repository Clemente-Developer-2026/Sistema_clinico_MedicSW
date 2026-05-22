@extends('layouts.app')

@section('modulo_titulo', 'Expediente Clínico del Paciente')

@section('contenido')
<div class="space-y-6">
    <div class="bg-white p-6 rounded-xl border border-slate-200 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <span class="text-xs font-bold text-sky-600 uppercase tracking-wider font-mono">Nro. Expediente: 1</span>
            <h2 class="text-2xl font-black text-slate-800">Jhon</h2>
            <p class="text-sm text-slate-500">CI: 1 &bull; Edad:  &bull; Sangre:  &bull; Alergias: </p>
        </div>
        <a href="/historiales" class="px-4 py-2 border border-slate-300 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-50 transition-colors">
            <i class="fa-solid fa-arrow-left mr-2"></i> Volver al Listado
        </a>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        <div class="xl:col-span-2 space-y-4">
            <h3 class="text-base font-bold text-slate-700 mb-2">Historial de Consultas</h3>
            
            <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-xs relative overflow-hidden">
                <div class="absolute top-0 left-0 h-full w-1.5 bg-sky-500"></div>
                <div class="flex justify-between items-start mb-3">
                    <div>
                        <span class="text-xs font-bold text-slate-400 block">20/05/2026</span>
                        <h4 class="font-bold text-slate-800 text-base">Consulta General</h4>
                    </div>
                    <span class="text-xs font-semibold text-slate-600 bg-slate-100 px-2.5 py-1 rounded">Dr. E</span>
                </div>
                <div class="space-y-2 text-sm text-slate-600">
                    <p><strong class="text-slate-800">Sintomatología:</strong> S</p>
                    <p><strong class="text-slate-800">Diagnóstico:</strong> S2</p>
                    <div class="bg-slate-50 p-3 rounded-lg border border-slate-100 mt-2">
                        <strong class="text-xs uppercase font-bold text-sky-700 block mb-1"><i class="fa-solid fa-prescription-bottle-medical mr-1"></i> Tratamiento Indicado</strong>
                        <p class="text-xs font-mono text-slate-700">Agua</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-4">
            <h3 class="text-base font-bold text-slate-700 mb-2">Condiciones de Base</h3>
            <div class="bg-white p-5 rounded-xl border border-slate-200 space-y-3 text-sm">
                <div>
                    <span class="block text-xs font-bold text-slate-400 uppercase">Enfermedades de Base</span>
                    <p class="font-medium text-slate-800">Ninguna</p>
                </div>
                <hr class="border-slate-100">
                <div>
                    <span class="block text-xs font-bold text-slate-400 uppercase">Contacto de Emergencia</span>
                    <p class="font-medium text-slate-800">S</p>
                    <p class="text-xs text-slate-500">Telf: 1122</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection