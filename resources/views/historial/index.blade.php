@extends('layouts.app')

@section('modulo_titulo', 'Historiales Clínicos')

@section('contenido')
<div class="bg-white p-6 rounded-xl shadow-xs border border-slate-200 space-y-6">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-slate-100 pb-4">
        <div>
            <h3 class="text-lg font-bold text-slate-800">Fichas de Historial Clínico</h3>
            <p class="text-xs text-slate-500">Busca pacientes por C.I. o Nombre para revisar sus consultas.</p>
        </div>
        <div class="w-full md:w-80 relative">
            <input type="text" class="w-full border border-slate-300 rounded-lg pl-10 pr-4 py-2 text-sm focus:outline-none focus:border-sky-500" placeholder="Buscar paciente...">
            <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3 text-slate-400 text-sm"></i>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-sm">
            <thead>
                <tr class="bg-slate-50 text-slate-600 font-semibold border-b border-slate-200">
                    <th class="p-4">Nro. Historial</th>
                    <th class="p-4">Paciente</th>
                    <th class="p-4">Última Visita</th>
                    <th class="p-4">Diagnóstico Reciente</th>
                    <th class="p-4 text-center">Ficha Clínica</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-slate-700">
                <tr class="hover:bg-slate-50/70 transition-colors">
                    <td class="p-4 font-mono font-bold text-slate-800">1</td>
                    <td class="p-4">
                        <span class="block font-medium text-slate-900">Jhonatan</span>
                        <span class="text-xs text-slate-400">CI: 1111</span>
                    </td>
                    <td class="p-4">18/05/2026</td>
                    <td class="p-4 truncate max-w-xs">Control </td>
                    <td class="p-4 text-center">
                        <td class="p-4 text-center space-x-2">
                            <a href="{{ url('/historiales/nuevo') }}" class="inline-flex items-center gap-1.5 bg-sky-50 text-sky-700 border border-sky-200 hover:bg-sky-600 hover:text-white px-3 py-1.5 rounded-lg text-xs font-semibold transition-all">
                                <i class="fa-solid fa-plus"></i> Atender
                            </a>
                            <a href="{{ url('/historiales/detalle/1') }}" class="inline-flex items-center gap-1.5 bg-slate-100 text-slate-700 border border-slate-200 hover:bg-slate-700 hover:text-white px-3 py-1.5 rounded-lg text-xs font-semibold transition-all">
                                <i class="fa-solid fa-folder-open"></i> Ver Expediente
                            </a>
                        </td>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection