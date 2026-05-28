@extends('layouts.app')

@section('modulo_titulo', 'Historial Clínico')

@section('contenido')

{{-- Buscador --}}
<div class="bg-white rounded-2xl shadow-sm p-4 mb-6">
    <div class="flex gap-3">
        <input type="text" id="buscador" placeholder="Buscar paciente por nombre o carnet..."
            class="flex-1 border border-slate-300 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-sky-400">
        <button class="bg-sky-600 hover:bg-sky-700 text-white px-5 py-2 rounded-xl text-sm">
            <i class="fa-solid fa-search"></i>
        </button>
    </div>
</div>

{{-- Lista de pacientes --}}
<div class="bg-white rounded-2xl shadow-lg p-6">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-slate-700">Pacientes con Historial</h2>
        <span class="bg-sky-100 text-sky-700 px-3 py-1 rounded-full text-sm font-semibold">
            {{ $pacientes->count() }} paciente(s)
        </span>
    </div>

    <table class="w-full text-sm" id="tablaPacientes">
        <thead class="bg-slate-100">
            <tr>
                <th class="p-4 text-left">Paciente</th>
                <th class="p-4 text-left">Carnet</th>
                <th class="p-4 text-left">Teléfono</th>
                <th class="p-4 text-left">Consultas</th>
                <th class="p-4 text-left">Última consulta</th>
                <th class="p-4 text-left">Acción</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pacientes as $paciente)
            <tr class="border-b hover:bg-slate-50 fila-paciente">
                <td class="p-4">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-full bg-sky-100 flex items-center justify-center text-sky-600 font-bold text-sm">
                            {{ strtoupper(substr($paciente->nombres, 0, 1)) }}
                        </div>
                        <div>
                            <p class="font-medium text-slate-700 nombre-paciente">
                                {{ $paciente->nombres }} {{ $paciente->apellidos }}
                            </p>
                            <p class="text-xs text-slate-400">
                                {{ $paciente->sexo }} —
                                {{ \Carbon\Carbon::parse($paciente->fecha_nacimiento)->age }} años
                            </p>
                        </div>
                    </div>
                </td>
                <td class="p-4 text-slate-600 carnet-paciente">{{ $paciente->carnet_identidad }}</td>
                <td class="p-4 text-slate-600">{{ $paciente->telefono ?? '—' }}</td>
                <td class="p-4">
                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                        {{ $paciente->citas->count() }} consulta(s)
                    </span>
                </td>
                <td class="p-4 text-slate-500 text-xs">
                    {{ \Carbon\Carbon::parse($paciente->citas->max('fecha_cita'))->format('d/m/Y') }}
                </td>
                <td class="p-4">
                    <a href="{{ route('historial.show', $paciente->id_paciente) }}"
                        class="bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded-xl text-xs flex items-center gap-2 w-fit">
                        <i class="fa-solid fa-file-medical"></i> Ver Historial
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="p-12 text-center text-slate-400">
                    <i class="fa-solid fa-folder-open text-4xl mb-3 block"></i>
                    No hay pacientes con historial registrado
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
    // Filtro de búsqueda en tiempo real
    document.getElementById('buscador').addEventListener('input', function () {
        const texto = this.value.toLowerCase();
        document.querySelectorAll('.fila-paciente').forEach(fila => {
            const nombre = fila.querySelector('.nombre-paciente').textContent.toLowerCase();
            const carnet = fila.querySelector('.carnet-paciente').textContent.toLowerCase();
            fila.style.display = (nombre.includes(texto) || carnet.includes(texto)) ? '' : 'none';
        });
    });
</script>

@endsection