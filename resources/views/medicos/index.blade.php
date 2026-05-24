@extends('layouts.app')

@section('modulo_titulo', 'Gestión de Médicos')

@section('contenido')
<div class="bg-white p-6 rounded-xl shadow-xs border border-slate-200">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <h3 class="text-lg font-bold text-slate-800">Cuerpo Médico Registrado</h3>
        
        <div class="flex items-center gap-2 w-full sm:w-auto">
            <button onclick="toggleModal('modal-especialidad')" class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-xl text-sm font-medium flex items-center gap-2 transition-colors shadow-xs active:scale-95 transform">
                <i class="fa-solid fa-stethoscope"></i> Nueva Especialidad
            </button>
            
            <a href="{{ url('/medicos/registrar') }}" class="bg-sky-600 hover:bg-sky-700 text-white px-4 py-2 rounded-xl text-sm font-medium flex items-center gap-2 transition-colors shadow-xs active:scale-95 transform">
                <i class="fa-solid fa-user-plus"></i> Registrar Médico
            </a>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-100 text-slate-600 text-sm uppercase font-semibold border-b border-slate-200">
                    <th class="p-4">Colegiatura / CI</th>
                    <th class="p-4">Médico</th>
                    <th class="p-4">Especialidad</th>
                    <th class="p-4">Estado</th>
                    <th class="p-4 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-slate-700 text-sm divide-y divide-slate-100">
                <tr class="hover:bg-sky-50/40 transition-colors duration-200 ease-in-out group">
                    <td class="p-4 font-mono">
                        <span class="block font-bold text-slate-800">123</span>
                        <span class="text-xs text-slate-400">CI: 11111</span>
                    </td>
                    <td class="p-4 font-medium text-slate-900 group-hover:text-sky-700 transition-colors duration-200">
                        Pruebas Dr
                    </td>
                    <td class="p-4">
                        <span class="bg-sky-50 text-sky-700 px-2.5 py-1 rounded-md text-xs font-semibold border border-sky-100 transition-all duration-200 group-hover:bg-sky-100">Cardiología</span>
                    </td>
                    <td class="p-4">
                        <span class="bg-emerald-100 text-emerald-800 px-2.5 py-0.5 rounded-full text-xs font-medium animate-fade-in">Activo</span>
                    </td>
                    <td class="p-4 text-center space-x-3">
                        <a href="{{ url('/medicos/registrar') }}" class="text-slate-400 hover:text-sky-600 inline-block transform hover:scale-120 transition-all duration-150" title="Editar">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a href="{{ url('/horarios') }}" class="text-slate-400 hover:text-amber-600 inline-block transform hover:scale-120 transition-all duration-150" title="Configurar Horarios">
                            <i class="fa-solid fa-clock"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div id="modal-especialidad" class="fixed inset-0 bg-slate-900/60 backdrop-blur-xs flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 ease-out">
    <div id="modal-container" class="bg-white rounded-2xl shadow-2xl border border-slate-200 w-full max-w-md overflow-hidden transform scale-95 opacity-0 transition-all duration-300 ease-out m-4">
        
        <div class="bg-slate-50 px-6 py-4 border-b border-slate-100 flex justify-between items-center">
            <h3 class="font-bold text-slate-800 flex items-center gap-2">
                <i class="fa-solid fa-stethoscope text-sky-600 animate-pulse"></i> Nueva Especialidad Médica
            </h3>
            <button onclick="toggleModal('modal-especialidad')" class="text-slate-400 hover:text-slate-600 transition-colors text-lg">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        
        <form action="#" method="POST" class="p-6 space-y-4">
            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1 tracking-wide">Nombre de la Especialidad</label>
                <input type="text" class="w-full border border-slate-300 rounded-xl p-2.5 text-sm transition-all duration-200 focus:outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-100" placeholder="Ej. Neurología">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1 tracking-wide">Breve Descripción</label>
                <textarea rows="3" class="w-full border border-slate-300 rounded-xl p-2.5 text-sm transition-all duration-200 focus:outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-100" placeholder="Descripción..."></textarea>
            </div>
            
            <div class="flex justify-end gap-2 pt-3 border-t border-slate-100">
                <button type="button" onclick="toggleModal('modal-especialidad')" class="px-4 py-2 border border-slate-300 text-slate-600 rounded-xl text-sm font-medium hover:bg-slate-50 transition-colors">Cancelar</button>
                <button type="submit" class="bg-sky-600 hover:bg-sky-700 active:scale-95 text-white px-5 py-2 rounded-xl text-sm font-medium shadow-md shadow-sky-100 transition-all">Guardar Especialidad</button>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleModal(modalId) {
        const modal = document.getElementById(modalId);
        const container = document.getElementById('modal-container');
        
        if (modal.classList.contains('pointer-events-none')) {
            modal.classList.remove('pointer-events-none');
            modal.classList.remove('opacity-0');
            modal.classList.add('opacity-100');
            
            container.classList.remove('scale-95', 'opacity-0');
            container.classList.add('scale-100', 'opacity-100');
        } else {
            modal.classList.remove('opacity-100');
            modal.classList.add('opacity-0');
            
            container.classList.remove('scale-100', 'opacity-100');
            container.classList.add('scale-95', 'opacity-0');
            
            setTimeout(() => {
                modal.classList.add('pointer-events-none');
            }, 300);
        }
    }
</script>
@endsection