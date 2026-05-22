@extends('layouts.app')

@section('modulo_titulo', 'Nueva Consulta - Historial Clínico')

@section('contenido')
<div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
    
    <div class="xl:col-span-2 bg-white p-6 rounded-xl shadow-xs border border-slate-200 space-y-6">
        <h3 class="text-lg font-bold text-slate-800 border-b border-slate-100 pb-3"><i class="fa-solid fa-notes-medical text-sky-600 mr-2"></i>Detalles de la Consulta</h3>
        
        <form action="#" method="POST" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Motivo de Consulta</label>
                    <input type="text" class="w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:outline-none focus:border-sky-500" >
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Diagnóstico Inicial</label>
                    <input type="text" class="w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:outline-none focus:border-sky-500" >
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Síntomas reportados</label>
                <textarea rows="3" class="w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:outline-none focus:border-sky-500" ></textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Tratamiento y Receta Médica</label>
                <textarea rows="3" class="w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:outline-none focus:border-sky-500" placeholder="Medicamentos, dosis y duración..."></textarea>
            </div>

            <div class="flex justify-end pt-4">
                <button type="submit" class="bg-sky-600 hover:bg-sky-700 text-white font-medium px-6 py-2.5 rounded-lg text-sm transition-colors shadow-xs">
                    Guardar Historial Clínico
                </button>
            </div>
        </form>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-xs border border-slate-200 h-fit space-y-4">
        <h3 class="text-lg font-bold text-slate-800 border-b border-slate-100 pb-3"><i class="fa-solid fa-heart-pulse text-rose-500 mr-2"></i>Signos Vitales</h3>
        
        <div class="space-y-3">
            <div>
                <label class="block text-xs font-bold text-slate-600 mb-1">Presión Arterial</label>
                <input type="text" class="w-full border border-slate-300 rounded-lg p-2 text-sm focus:border-sky-500 focus:outline-none" >
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-xs font-bold text-slate-600 mb-1">Peso (kg)</label>
                    <input type="text" class="w-full border border-slate-300 rounded-lg p-2 text-sm focus:border-sky-500 focus:outline-none" >
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-600 mb-1">Talla (cm)</label>
                    <input type="text" class="w-full border border-slate-300 rounded-lg p-2 text-sm focus:border-sky-500 focus:outline-none" >
                </div>
            </div>
        </div>
    </div>
</div>
@endsection