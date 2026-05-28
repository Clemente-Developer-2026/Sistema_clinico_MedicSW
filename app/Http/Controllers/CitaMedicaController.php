<?php

namespace App\Http\Controllers;

use App\Models\CitaMedica;
use App\Models\Paciente;
use App\Models\Medico;
use App\Models\Especialidad;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CitaMedicaController extends Controller
{
    public function index()
    {
        $hoy = Carbon::today();

        $citas = CitaMedica::with(['paciente', 'medico', 'especialidad'])
            ->whereDate('fecha_cita', $hoy)
            ->where('estado', 1)
            ->orderBy('hora_cita')
            ->get();

        $especialidades = Especialidad::where('estado', 1)->get();

        $medicos = Medico::with('especialidades')
            ->where('estado', 1)
            ->get();

        return view('citas.index', compact('citas', 'especialidades', 'medicos'));
    }

    // AJAX buscar paciente JAH
    public function buscarPaciente(Request $request)
    {
        $paciente = Paciente::where('carnet_identidad', $request->carnet)
            ->where('estado', 1)
            ->first();

        if (!$paciente) {
            return response()->json([
                'encontrado' => false,
                'mensaje'    => 'Paciente no encontrado'
            ]);
        }

        return response()->json([
            'encontrado' => true,
            'paciente'   => [
                'id'       => $paciente->id_paciente,
                'nombres'  => $paciente->nombres . ' ' . $paciente->apellidos,
                'carnet'   => $paciente->carnet_identidad,
                'telefono' => $paciente->telefono,
            ]
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_paciente'     => 'required|exists:paciente,id_paciente',
            'id_medico'       => 'required|exists:medico,id_medico',
            'id_especialidad' => 'required|exists:especialidad,id_especialidad',
            'fecha_cita'      => 'required|date',
            'hora_cita'       => 'required',
        ]);

        $fichasHoy = CitaMedica::whereDate('fecha_cita', $request->fecha_cita)
            ->count();

        CitaMedica::create([
            'id_paciente'     => $request->id_paciente,
            'id_medico'       => $request->id_medico,
            'id_especialidad' => $request->id_especialidad,
            'fecha_cita'      => $request->fecha_cita,
            'hora_cita'       => $request->hora_cita,
            'numero_ficha'    => $fichasHoy + 1,
            'estado_cita'     => 'Pendiente',
            'estado'          => 1,
        ]);

        return redirect()->route('citas.index')
            ->with('success', 'Cita registrada correctamente');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_medico'       => 'required|exists:medico,id_medico',
            'id_especialidad' => 'required|exists:especialidad,id_especialidad',
            'fecha_cita'      => 'required|date',
            'hora_cita'       => 'required',
        ]);

        $cita = CitaMedica::findOrFail($id);
        $cita->update([
            'id_medico'       => $request->id_medico,
            'id_especialidad' => $request->id_especialidad,
            'fecha_cita'      => $request->fecha_cita,
            'hora_cita'       => $request->hora_cita,
        ]);

        return redirect()->route('citas.index')
            ->with('success', 'Cita actualizada correctamente');
    }

    public function destroy($id)
    {
        $cita = CitaMedica::findOrFail($id);
        $cita->update(['estado' => 0]);

        return redirect()->route('citas.index')
            ->with('success', 'Cita eliminada correctamente');
    }
}