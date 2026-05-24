@extends('layouts.app')

@section('modulo_titulo', 'Administración y Auditoría del Sistema')

@section('contenido')
<div class="space-y-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-5 rounded-xl border border-slate-200 flex items-center gap-4">
            <div class="w-12 h-12 rounded-lg bg-sky-100 text-sky-600 flex items-center justify-center text-xl"><i class="fa-solid fa-users"></i></div>
            <div>
                <span class="block text-xs font-bold text-slate-400 uppercase">Usuarios Totales</span>
                <span class="text-2xl font-black text-slate-800">48</span>
            </div>
        </div>
        <div class="bg-white p-5 rounded-xl border border-slate-200 flex items-center gap-4">
            <div class="w-12 h-12 rounded-lg bg-amber-100 text-amber-600 flex items-center justify-center text-xl"><i class="fa-solid fa-shield-halved"></i></div>
            <div>
                <span class="block text-xs font-bold text-slate-400 uppercase">Roles Definidos</span>
                <span class="text-2xl font-black text-slate-800">4</span>
            </div>
        </div>
        <div class="bg-white p-5 rounded-xl border border-slate-200 flex items-center gap-4">
            <div class="w-12 h-12 rounded-lg bg-rose-100 text-rose-600 flex items-center justify-center text-xl"><i class="fa-solid fa-list-check"></i></div>
            <div>
                <span class="block text-xs font-bold text-slate-400 uppercase">Logs de Auditoría</span>
                <span class="text-2xl font-black text-slate-800">1</span>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-xs border border-slate-200">
        <div class="mb-4">
            <h3 class="text-lg font-bold text-slate-800">Historial de Auditoría</h3>
            <p class="text-xs text-slate-500">Registro de transacciones efectuadas en la base de datos.</p>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="bg-slate-100 text-slate-600 font-semibold border-b border-slate-200">
                        <th class="p-3">Fecha / Hora</th>
                        <th class="p-3">Usuario</th>
                        <th class="p-3">Tabla Afectada</th>
                        <th class="p-3">Operación</th>
                        <th class="p-3">Datos Anteriores</th>
                        <th class="p-3">Datos Nuevos</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700 font-mono text-xs">
                    <tr class="hover:bg-slate-50">
                        <td class="p-3 font-sans text-slate-500">20/05/2026 14:22</td>
                        <td class="p-3 font-sans font-medium text-slate-800">Ad</td>
                        <td class="p-3 text-sky-700">medico</td>
                        <td class="p-3"><span class="bg-amber-100 text-amber-800 px-2 py-0.5 rounded text-[10px] font-bold uppercase">UPDATE</span></td>
                        <td class="p-3 max-w-xs truncate text-slate-400">{"antes}</td>
                        <td class="p-3 max-w-xs truncate text-slate-600">{"ahora}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection