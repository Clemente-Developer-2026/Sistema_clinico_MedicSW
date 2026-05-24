@extends('layouts.app')

@section('modulo_titulo', 'Registrar Nuevo Médico')

@section('contenido')
<div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow-xs border border-slate-200">
    <div class="border-b border-slate-100 pb-4 mb-6">
        <h3 class="text-lg font-bold text-slate-800">Información del Profesional</h3>
        <p class="text-xs text-slate-500">Completa los campos para dar de alta al médico en el sistema clínico.</p>
    </div>

    <form action="#" method="POST" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-2">Nombre Completo</label>
                <input type="text" class="w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:outline-none focus:border-sky-500">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-2">Correo Electrónico (Usuario)</label>
                <input type="email" class="w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:outline-none focus:border-sky-500" placeholder="medico@gmail.com">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-2">Nro. de Colegiatura</label>
                <input type="text" class="w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:outline-none focus:border-sky-500" placeholder="XXXXX">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-2">Carnet de Identidad (CI)</label>
                <input type="text" class="w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:outline-none focus:border-sky-500" placeholder="1234">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-2">Fecha de Nacimiento</label>
                <input type="date" class="w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:outline-none focus:border-sky-500">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-2">Especialidad Principal</label>
                <select class="w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:outline-none focus:border-sky-500 bg-white">
                    <option value="">Seleccione una especialidad...</option>
                    <option value="1">Cardiología</option>
                    <option value="2">Pediatría</option>
                    <option value="3">Medicina General</option>
                </select>
            </div>
        </div>

        <div class="flex justify-end gap-3 border-t border-slate-100 pt-4">
            <a href="/medicos" class="px-5 py-2.5 border border-slate-300 text-slate-700 rounded-lg text-sm font-medium hover:bg-slate-50 transition-colors">Cancelar</a>
            <button type="submit" class="bg-sky-600 hover:bg-sky-700 text-white px-5 py-2.5 rounded-lg text-sm font-medium transition-colors shadow-xs">Guardar Médico</button>
        </div>
    </form>
</div>
@endsection