@extends('layouts.app')

@section('modulo_titulo', 'Horarios de Atención')

@section('contenido')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="bg-white p-6 rounded-xl shadow-xs border border-slate-200 h-fit">
        <h3 class="text-base font-bold text-slate-800 mb-4 border-b border-slate-100 pb-2"><i class="fa-solid fa-clock text-sky-600 mr-2"></i>Asignar Turno</h3>
        <form class="space-y-4">
            <div>
                <label class="block text-xs font-bold text-slate-600 mb-1">Médico</label>
                <select class="w-full border border-slate-300 rounded-lg p-2 text-sm focus:border-sky-500 bg-white">
                    <option>Dr. M</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-600 mb-1">Día de la Semana</label>
                <select class="w-full border border-slate-300 rounded-lg p-2 text-sm focus:border-sky-500 bg-white">
                    <option value="Lunes">Lunes</option>
                    <option value="Martes">Martes</option>
                    <option value="Miércoles">Miércoles</option>
                    <option value="Jueves">Jueves</option>
                    <option value="Viernes">Viernes</option>
                </select>
            </div>
            <div class="grid grid-cols-2 gap-2">
                <div>
                    <label class="block text-xs font-bold text-slate-600 mb-1">Hora Inicio</label>
                    <input type="time" class="w-full border border-slate-300 rounded-lg p-2 text-sm focus:border-sky-500">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-600 mb-1">Hora Fin</label>
                    <input type="time" class="w-full border border-slate-300 rounded-lg p-2 text-sm focus:border-sky-500">
                </div>
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-600 mb-1">Límite de Pacientes</label>
                <input type="number" class="w-full border border-slate-300 rounded-lg p-2 text-sm focus:border-sky-500" placeholder="Ej. 15">
            </div>
            <button class="w-full bg-sky-600 hover:bg-sky-700 text-white font-medium py-2 rounded-lg text-sm transition-colors mt-2">Agregar a la Agenda</button>
        </form>
    </div>

    <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-xs border border-slate-200">
        <h3 class="text-base font-bold text-slate-800 mb-4 border-b border-slate-100 pb-2">Cronograma de Consultas Activo</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="bg-slate-50 text-slate-600 font-semibold border-b border-slate-200">
                        <th class="p-3">Médico</th>
                        <th class="p-3">Día</th>
                        <th class="p-3">Horario</th>
                        <th class="p-3 text-center">Cupos Max</th>
                        <th class="p-3 text-center">Acción</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    <tr>
                        <td class="p-3 font-medium text-slate-900">Dr. M</td>
                        <td class="p-3">Lunes</td>
                        <td class="p-3"><span class="bg-slate-100 px-2 py-1 rounded text-xs font-mono">08 a 12</span></td>
                        <td class="p-3 text-center">1 paciente</td>
                        <td class="p-3 text-center">
                            <button class="text-rose-600 hover:text-rose-800"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection