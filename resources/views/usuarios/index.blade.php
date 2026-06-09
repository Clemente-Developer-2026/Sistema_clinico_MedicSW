@extends('layouts.app')

@section('modulo_titulo', 'Gestión de Usuarios')

@section('contenido')
<div class="max-w-6xl mx-auto space-y-6">
    
    @if (session('success'))
        <div class="bg-emerald-100 border border-emerald-400 text-emerald-800 px-4 py-3 rounded-xl shadow-sm flex items-center gap-2">
            <i class="fa-solid fa-circle-check text-lg"></i>
            <span class="text-sm font-medium">{{ session('success') }}</span>
        </div>
    @endif
    @if ($errors->any())
        <div class="bg-rose-100 border border-rose-400 text-rose-800 px-4 py-3 rounded-xl shadow-sm">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
        </div>
    @endif

    <div class="flex justify-between items-center bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
        <div>
            <h2 class="text-xl font-bold text-slate-800">Directorio de Accesos</h2>
            <p class="text-sm text-slate-500">Administre las credenciales del sistema clínico.</p>
        </div>
        <button onclick="toggleModal('modalNuevoUsuario')" class="bg-sky-600 hover:bg-sky-700 text-white font-semibold py-2.5 px-5 rounded-xl shadow-md transition duration-300 flex items-center gap-2">
            <i class="fa-solid fa-plus"></i> Nuevo Usuario
        </button>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wider">
                    <th class="px-6 py-4 font-semibold border-b border-slate-200">ID</th>
                    <th class="px-6 py-4 font-semibold border-b border-slate-200">Nombre</th>
                    <th class="px-6 py-4 font-semibold border-b border-slate-200">Correo</th>
                    <th class="px-6 py-4 font-semibold border-b border-slate-200">Rol</th>
                    <th class="px-6 py-4 font-semibold border-b border-slate-200 text-center">Estado</th>
                </tr>
            </thead>
            <tbody class="text-sm text-slate-700 divide-y divide-slate-100">
                @foreach($usuarios as $user)
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-6 py-4 text-slate-400 font-medium">#{{ $user->id }}</td>
                    <td class="px-6 py-4 font-bold text-slate-800">{{ $user->name }}</td>
                    <td class="px-6 py-4">{{ $user->email }}</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-xs font-bold 
                            {{ $user->rol == 'administrador' ? 'bg-purple-100 text-purple-700' : ($user->rol == 'medico' ? 'bg-blue-100 text-blue-700' : 'bg-emerald-100 text-emerald-700') }}">
                            {{ ucfirst($user->rol ?? 'Sin rol') }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if($user->estado == 1)
                            <span class="text-emerald-500"><i class="fa-solid fa-circle-check"></i> Activo</span>
                        @else
                            <span class="text-rose-500"><i class="fa-solid fa-circle-xmark"></i> Inactivo</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

<div id="modalNuevoUsuario" class="fixed inset-0 bg-slate-900/60 hidden items-center justify-center z-50 backdrop-blur-sm transition-opacity">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl transform scale-100 p-8 relative">
        
        <button onclick="toggleModal('modalNuevoUsuario')" class="absolute top-6 right-6 text-slate-400 hover:text-rose-500 text-xl transition-colors">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="flex items-center gap-3 mb-6 pb-4 border-b border-slate-100">
            <div class="w-10 h-10 rounded-lg bg-sky-100 text-sky-600 flex items-center justify-center text-lg">
                <i class="fa-solid fa-user-plus"></i>
            </div>
            <div>
                <h2 class="text-xl font-bold text-slate-800">Registrar Credenciales</h2>
            </div>
        </div>

        <form method="POST" action="{{ route('usuarios.store') }}" class="space-y-5">
            @csrf
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Nombre Completo</label>
                <input type="text" name="name" required class="w-full border border-slate-200 rounded-xl px-4 py-3 bg-slate-50 focus:bg-white outline-none focus:ring-2 focus:ring-sky-500">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Correo Electrónico</label>
                <input type="email" name="email" required class="w-full border border-slate-200 rounded-xl px-4 py-3 bg-slate-50 focus:bg-white outline-none focus:ring-2 focus:ring-sky-500">
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Contraseña</label>
                    <input type="password" name="password" required class="w-full border border-slate-200 rounded-xl px-4 py-3 bg-slate-50 focus:bg-white outline-none focus:ring-2 focus:ring-sky-500">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Rol Asignado</label>
                    <select name="rol" required class="w-full border border-slate-200 rounded-xl px-4 py-3 bg-slate-50 focus:bg-white outline-none focus:ring-2 focus:ring-sky-500">
                        <option value="paciente">Paciente</option>
                        <option value="medico">Médico / Especialista</option>
                        <option value="administrador">Administrador</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="w-full bg-sky-600 hover:bg-sky-700 text-white font-semibold py-3.5 rounded-xl shadow-lg mt-4 transition">
                <i class="fa-solid fa-floppy-disk mr-2"></i> Guardar Usuario
            </button>
        </form>
    </div>
</div>

<script>
    function toggleModal(modalID){
        const modal = document.getElementById(modalID);
        // Alternamos entre oculto y flexible para centrarlo
        if(modal.classList.contains('hidden')){
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        } else {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }
    }
</script>
@endsection