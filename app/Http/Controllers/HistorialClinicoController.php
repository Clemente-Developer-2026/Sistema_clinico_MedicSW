<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\HistorialClinico;
use Illuminate\Http\Request;

class HistorialClinicoController extends Controller
{

    public function index()
    {
        $pacientes = Paciente::with([
            'citas' => function ($query) {
                $query->where('estado_cita', 'Atendido')
                    ->where('estado', 1);
            }
        ])
        ->where('estado', 1)
        ->whereHas('citas', function ($query) {
            $query->where('estado_cita', 'Atendido')
                ->where('estado', 1);
        })
        ->orderBy('apellidos')
        ->get();

        return view('historial.index', compact('pacientes'));
    }

    public function show($idPaciente)
    {
        $paciente = Paciente::where('estado', 1)->findOrFail($idPaciente);

        $historiales = HistorialClinico::with(['cita.medico', 'cita.especialidad'])
            ->whereHas('cita', function ($query) use ($idPaciente) {
                $query->where('id_paciente', $idPaciente)
                    ->where('estado', 1);
            })
            ->orderByDesc('created_at')
            ->get();

        return view('historial.show', compact('paciente', 'historiales'));
    }

    public function detalle($idPaciente, $idHistorial)
    {
        $paciente = Paciente::where('estado', 1)->findOrFail($idPaciente);

        $historial = HistorialClinico::with([
            'cita.medico',
            'cita.especialidad',
            'cita.paciente'
        ])->findOrFail($idHistorial);

        if ($historial->cita->id_paciente != $idPaciente) {
            return redirect()->route('historial.index')
                ->with('error', 'Historial no encontrado.');
        }

        return view('historial.detallehistorial', compact('paciente', 'historial'));
    }
}