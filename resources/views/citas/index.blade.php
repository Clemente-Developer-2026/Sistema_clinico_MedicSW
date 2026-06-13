@extends('layouts.app')

@section('modulo_titulo', 'Citas Médicas')

@section('contenido')

{{-- Alertas --}}
@if(session('success'))
<div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl">
    {{ session('success') }}
</div>
@endif

{{-- Tarjetas resumen --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <div class="bg-sky-100 p-6 rounded-2xl shadow">
        <h3 class="text-sky-800 font-bold">Citas Hoy</h3>
        <p class="text-4xl font-bold mt-2">{{ $citas->count() }}</p>
    </div>
    <div class="bg-green-100 p-6 rounded-2xl shadow">
        <h3 class="text-green-800 font-bold">Atendidas</h3>
        <p class="text-4xl font-bold mt-2">{{ $citas->where('estado_cita', 'Atendido')->count() }}</p>
    </div>
    <div class="bg-yellow-100 p-6 rounded-2xl shadow">
        <h3 class="text-yellow-800 font-bold">Pendientes</h3>
        <p class="text-4xl font-bold mt-2">{{ $citas->where('estado_cita', 'Pendiente')->count() }}</p>
    </div>
</div>

{{-- Tabla de citas --}}
<div class="bg-white rounded-2xl shadow-lg p-6">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-slate-700">Lista de Citas del Día</h2>
        <button onclick="abrirModalCrear()"
            class="bg-sky-600 hover:bg-sky-700 text-white px-5 py-3 rounded-xl flex items-center gap-2">
            <i class="fa-solid fa-plus"></i> Nueva Cita
        </button>
    </div>

    <table class="w-full text-sm">
        <thead class="bg-slate-100">
            <tr>
                <th class="p-4 text-left">Ficha</th>
                <th class="p-4 text-left">Paciente</th>
                <th class="p-4 text-left">Médico</th>
                <th class="p-4 text-left">Especialidad</th>
                <th class="p-4 text-left">Hora</th>
                <th class="p-4 text-left">Estado</th>
                <th class="p-4 text-left">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($citas as $cita)
            <tr class="border-b hover:bg-slate-50">
                <td class="p-4 font-bold text-sky-600">#{{ $cita->numero_ficha }}</td>
                <td class="p-4">{{ $cita->paciente->nombres }} {{ $cita->paciente->apellidos }}</td>
                <td class="p-4">Dr. {{ $cita->medico->nombres }} {{ $cita->medico->apellidos }}</td>
                <td class="p-4">{{ $cita->especialidad->nombre }}</td>
                <td class="p-4">{{ \Carbon\Carbon::parse($cita->hora_cita)->format('h:i A') }}</td>
                <td class="p-4">
                    @if($cita->estado_cita === 'Atendido')
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">Atendido</span>
                    @elseif($cita->estado_cita === 'Pendiente')
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">Pendiente</span>
                    @else
                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">Cancelado</span>
                    @endif
                </td>
                <td class="p-4 flex gap-2">
                    {{-- Atender 
                    @if($cita->estado_cita === 'Pendiente')
                    <a href="{{ route('consulta.create', $cita->id_cita) }}"
                        class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-lg text-xs">
                        <i class="fa-solid fa-stethoscope"></i> Atender
                    </a>
                    @endif
                    --}}
                    {{-- Editar --}}
                    <button onclick="abrirModalEditar(
                            {{ $cita->id_cita }},
                            {{ $cita->id_medico }},
                            {{ $cita->id_especialidad }},
                            '{{ $cita->fecha_cita }}',
                            '{{ $cita->hora_cita }}'
                        )"
                        class="bg-sky-500 hover:bg-sky-600 text-white px-3 py-1 rounded-lg text-xs">
                        <i class="fa-solid fa-pen"></i>
                    </button>
                    {{-- Eliminar --}}
                    <button onclick="abrirModalEliminar({{ $cita->id_cita }}, '{{ $cita->paciente->nombres }}')"
                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-xs">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="p-8 text-center text-slate-400">
                    <i class="fa-solid fa-calendar-xmark text-3xl mb-2 block"></i>
                    No hay citas registradas para hoy
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- ============================================================ --}}
{{-- MODAL CREAR CITA                                             --}}
{{-- ============================================================ --}}
<div id="modalCrear" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg mx-4">
        <div class="flex justify-between items-center p-6 border-b">
            <h3 class="text-lg font-bold text-slate-700">Nueva Cita</h3>
            <button onclick="cerrarModal('modalCrear')" class="text-slate-400 hover:text-slate-600">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>
        </div>
        <div class="p-6 space-y-4">

            {{-- Buscar paciente por carnet --}}
            <div>
                <label class="block text-sm font-medium text-slate-600 mb-1">Carnet de Identidad</label>
                <div class="flex gap-2">
                    <input type="text" id="buscar_carnet" placeholder="Ej: 12345678"
                        class="flex-1 border border-slate-300 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-sky-400">
                    <button onclick="buscarPaciente()"
                        class="bg-sky-600 hover:bg-sky-700 text-white px-4 py-2 rounded-xl text-sm">
                        <i class="fa-solid fa-search"></i>
                    </button>
                </div>
            </div>

            {{-- Datos del paciente encontrado --}}
            <div id="datos_paciente" class="hidden bg-sky-50 border border-sky-200 rounded-xl p-3 text-sm text-sky-800">
                <i class="fa-solid fa-user-check mr-2"></i>
                <span id="nombre_paciente"></span>
            </div>

            <form id="formCrear" action="{{ route('citas.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="id_paciente" id="crear_id_paciente">

                {{-- Especialidad --}}
                <div>
                    <label class="block text-sm font-medium text-slate-600 mb-1">Especialidad</label>
                    <select name="id_especialidad" id="crear_especialidad" onchange="filtrarMedicos()"
                        class="w-full border border-slate-300 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-sky-400">
                        <option value="">Seleccione especialidad</option>
                        @foreach($especialidades as $esp)
                            <option value="{{ $esp->id_especialidad }}">{{ $esp->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Médico (filtrado por especialidad) --}}
                <div>
                    <label class="block text-sm font-medium text-slate-600 mb-1">Médico</label>
                    <select name="id_medico" id="crear_medico"
                        class="w-full border border-slate-300 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-sky-400">
                        <option value="">Seleccione especialidad primero</option>
                    </select>
                </div>

                {{-- Fecha y Hora --}}
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-1">Fecha</label>
                        <input type="date" name="fecha_cita" id="crear_fecha"
                            class="w-full border border-slate-300 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-sky-400">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-1">Hora</label>
                        <input type="time" name="hora_cita"
                            class="w-full border border-slate-300 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-sky-400">
                    </div>
                </div>

                <div class="flex justify-end gap-3 pt-2">
                    <button type="button" onclick="cerrarModal('modalCrear')"
                        class="px-5 py-2 rounded-xl border border-slate-300 text-slate-600 text-sm hover:bg-slate-50">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="px-5 py-2 rounded-xl bg-sky-600 hover:bg-sky-700 text-white text-sm">
                        Registrar Cita
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- ============================================================ --}}
{{-- MODAL EDITAR CITA                                            --}}
{{-- ============================================================ --}}
<div id="modalEditar" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg mx-4">
        <div class="flex justify-between items-center p-6 border-b">
            <h3 class="text-lg font-bold text-slate-700">Editar Cita</h3>
            <button onclick="cerrarModal('modalEditar')" class="text-slate-400 hover:text-slate-600">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>
        </div>
        <div class="p-6">
            <form id="formEditar" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <input type="hidden" name="id_cita" id="editar_id_cita">

                <div>
                    <label class="block text-sm font-medium text-slate-600 mb-1">Especialidad</label>
                    <select name="id_especialidad" id="editar_especialidad" onchange="filtrarMedicosEditar()"
                        class="w-full border border-slate-300 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-sky-400">
                        @foreach($especialidades as $esp)
                            <option value="{{ $esp->id_especialidad }}">{{ $esp->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-600 mb-1">Médico</label>
                    <select name="id_medico" id="editar_medico"
                        class="w-full border border-slate-300 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-sky-400">
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-1">Fecha</label>
                        <input type="date" name="fecha_cita" id="editar_fecha"
                            class="w-full border border-slate-300 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-sky-400">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-1">Hora</label>
                        <input type="time" name="hora_cita" id="editar_hora"
                            class="w-full border border-slate-300 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-sky-400">
                    </div>
                </div>

                <div class="flex justify-end gap-3 pt-2">
                    <button type="button" onclick="cerrarModal('modalEditar')"
                        class="px-5 py-2 rounded-xl border border-slate-300 text-slate-600 text-sm hover:bg-slate-50">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="px-5 py-2 rounded-xl bg-sky-600 hover:bg-sky-700 text-white text-sm">
                        Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- ============================================================ --}}
{{-- MODAL ELIMINAR CITA                                          --}}
{{-- ============================================================ --}}
<div id="modalEliminar" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-sm mx-4">
        <div class="p-6 text-center space-y-4">
            <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto">
                <i class="fa-solid fa-triangle-exclamation text-red-500 text-2xl"></i>
            </div>
            <h3 class="text-lg font-bold text-slate-700">¿Eliminar esta cita?</h3>
            <p class="text-sm text-slate-500">Se cancelará la cita de <strong id="eliminar_nombre"></strong>. Esta acción no se puede deshacer.</p>
            <form id="formEliminar" method="POST" class="flex justify-center gap-3">
                @csrf
                @method('DELETE')
                <button type="button" onclick="cerrarModal('modalEliminar')"
                    class="px-5 py-2 rounded-xl border border-slate-300 text-slate-600 text-sm hover:bg-slate-50">
                    Cancelar
                </button>
                <button type="submit"
                    class="px-5 py-2 rounded-xl bg-red-500 hover:bg-red-600 text-white text-sm">
                    Sí, eliminar
                </button>
            </form>
        </div>
    </div>
</div>

{{-- ============================================================ --}}
{{-- MODAL PACIENTE NO ENCONTRADO                                 --}}
{{-- ============================================================ --}}
<div id="modalNoEncontrado" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-sm mx-4">
        <div class="p-6 text-center space-y-4">
            <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto">
                <i class="fa-solid fa-user-xmark text-yellow-500 text-2xl"></i>
            </div>
            <h3 class="text-lg font-bold text-slate-700">Paciente no encontrado</h3>
            <p class="text-sm text-slate-500">No existe un paciente registrado con ese carnet. ¿Desea registrarlo?</p>
            <div class="flex justify-center gap-3">
                <button onclick="cerrarModal('modalNoEncontrado')"
                    class="px-5 py-2 rounded-xl border border-slate-300 text-slate-600 text-sm hover:bg-slate-50">
                    Cancelar
                </button>
                <a href="/pacientes/nuevo"
                    class="px-5 py-2 rounded-xl bg-sky-600 hover:bg-sky-700 text-white text-sm">
                    Registrar Paciente
                </a>
            </div>
        </div>
    </div>
</div>

{{-- ============================================================ --}}
{{-- JAVASCRIPT                                                   --}}
{{-- ============================================================ --}}
<script>
    // Datos de médicos pasados desde el controlador
    const medicos = @json($medicos);

    // ── Modales ──────────────────────────────────────────────
    function abrirModalCrear() {
        // Setear fecha de hoy por defecto
        document.getElementById('crear_fecha').value = new Date().toISOString().split('T')[0];
        document.getElementById('modalCrear').classList.remove('hidden');
    }

    function abrirModalEditar(id, idMedico, idEspecialidad, fecha, hora) {
        document.getElementById('editar_id_cita').value = id;
        document.getElementById('editar_fecha').value = fecha;
        document.getElementById('editar_hora').value = hora;
        document.getElementById('formEditar').action = `/citas/${id}`;

        // Seleccionar especialidad y filtrar médicos
        document.getElementById('editar_especialidad').value = idEspecialidad;
        filtrarMedicosEditar(idMedico);

        document.getElementById('modalEditar').classList.remove('hidden');
    }

    function abrirModalEliminar(id, nombre) {
        document.getElementById('eliminar_nombre').textContent = nombre;
        document.getElementById('formEliminar').action = `/citas/${id}`;
        document.getElementById('modalEliminar').classList.remove('hidden');
    }

    function cerrarModal(id) {
        document.getElementById(id).classList.add('hidden');
    }

    // Cerrar modal clickeando el fondo
    ['modalCrear','modalEditar','modalEliminar','modalNoEncontrado'].forEach(id => {
        document.getElementById(id).addEventListener('click', function(e) {
            if (e.target === this) cerrarModal(id);
        });
    });

    // ── Buscar paciente por carnet (AJAX) ────────────────────
    function buscarPaciente() {
        const carnet = document.getElementById('buscar_carnet').value.trim();
        if (!carnet) return;

        fetch(`{{ route('citas.buscarPaciente') }}?carnet=${carnet}`)
            .then(res => res.json())
            .then(data => {
                if (data.encontrado) {
                    document.getElementById('crear_id_paciente').value = data.paciente.id;
                    document.getElementById('nombre_paciente').textContent =
                        `${data.paciente.nombres} — CI: ${data.paciente.carnet}`;
                    document.getElementById('datos_paciente').classList.remove('hidden');
                } else {
                    cerrarModal('modalCrear');
                    document.getElementById('modalNoEncontrado').classList.remove('hidden');
                }
            });
    }

    // Buscar también al presionar Enter en el input del carnet
    document.getElementById('buscar_carnet').addEventListener('keydown', function(e) {
        if (e.key === 'Enter') { e.preventDefault(); buscarPaciente(); }
    });

    // ── Filtrar médicos por especialidad ─────────────────────
    function filtrarMedicos(medicoSeleccionado = null) {
        const idEsp = document.getElementById('crear_especialidad').value;
        const select = document.getElementById('crear_medico');
        select.innerHTML = '<option value="">Seleccione médico</option>';

        medicos
            .filter(m => m.especialidades.some(e => e.id_especialidad == idEsp))
            .forEach(m => {
                const opt = document.createElement('option');
                opt.value = m.id_medico;
                opt.textContent = `Dr. ${m.nombres} ${m.apellidos}`;
                if (medicoSeleccionado && m.id_medico == medicoSeleccionado) opt.selected = true;
                select.appendChild(opt);
            });
    }

    function filtrarMedicosEditar(medicoSeleccionado = null) {
        const idEsp = document.getElementById('editar_especialidad').value;
        const select = document.getElementById('editar_medico');
        select.innerHTML = '<option value="">Seleccione médico</option>';

        medicos
            .filter(m => m.especialidades.some(e => e.id_especialidad == idEsp))
            .forEach(m => {
                const opt = document.createElement('option');
                opt.value = m.id_medico;
                opt.textContent = `Dr. ${m.nombres} ${m.apellidos}`;
                if (medicoSeleccionado && m.id_medico == medicoSeleccionado) opt.selected = true;
                select.appendChild(opt);
            });
    }
</script>

@endsection