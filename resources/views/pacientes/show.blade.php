@extends('layouts.app')

@section('modulo_titulo', 'Detalle del Paciente')

@section('contenido')

<div class="bg-white rounded-2xl shadow-lg p-8">

    <h2 class="text-2xl font-bold text-slate-700 mb-8">
        Información del Paciente
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-slate-700">

        <div>
            <p class="font-bold">Nombre:</p>
            <p>Juan Pérez</p>
        </div>

        <div>
            <p class="font-bold">CI:</p>
            <p>1234567</p>
        </div>

        <div>
            <p class="font-bold">Teléfono:</p>
            <p>77777777</p>
        </div>

        <div>
            <p class="font-bold">Edad:</p>
            <p>25 años</p>
        </div>

    </div>

</div>

@endsection