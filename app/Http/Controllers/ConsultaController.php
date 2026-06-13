<?php

namespace App\Http\Controllers;

use App\Models\CitaMedica;
use App\Models\HistorialClinico;
use App\Models\Medico;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ConsultaController extends Controller
{

    public function citasPendientes()
    {
        $hoy = Carbon::today();
        $medicos = Medico::with([
            'citas' => function ($query) use ($hoy) {
                $query->with(['paciente', 'especialidad'])
                    ->whereDate('fecha_cita', $hoy)
                    ->where('estado_cita', 'Pendiente')
                    ->where('estado', 1)
                    ->orderBy('hora_cita');
            },
            'especialidades'
        ])
        ->where('estado', 1)

        ->whereHas('citas', function ($query) use ($hoy) {
            $query->whereDate('fecha_cita', $hoy)
                ->where('estado_cita', 'Pendiente')
                ->where('estado', 1);
        })
        ->get();

        // =====================================================   JAH
        // Una vez implementado el login, filtrar solo
        // el médico autenticado:
        //
        // $medicoId = Auth::user()->medico->id_medico;
        // ->where('id_medico', $medicoId)
        // =====================================================

        $totalPendientes = $medicos->sum(fn($m) => $m->citas->count());

        return view('consulta.citaspendientes', compact('medicos', 'totalPendientes'));
    }


    public function atender($id)
    {
        $cita = CitaMedica::with(['paciente', 'medico', 'especialidad'])
            ->findOrFail($id);

        if ($cita->estado_cita !== 'Pendiente') {
            return redirect()->route('consulta.index')
                ->with('error', 'Esta cita ya fue atendida o cancelada.');
        }

        return view('consulta.atendercita', compact('cita'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'motivo_consulta'   => 'required|string',
            'sintomas'          => 'nullable|string',
            'diagnostico'       => 'required|string',
            'tratamiento_receta'=> 'nullable|string',
            'presion_arterial'  => 'nullable|string',
            'peso'              => 'nullable|string',
            'talla'             => 'nullable|string',
        ]);

        $cita = CitaMedica::findOrFail($id);

        HistorialClinico::create([
            'id_cita'            => $cita->id_cita,
            'motivo_consulta'    => $request->motivo_consulta,
            'sintomas'           => $request->sintomas,
            'diagnostico'        => $request->diagnostico,
            'tratamiento_receta' => $request->tratamiento_receta,
            'presion_arterial'   => $request->presion_arterial,
            'peso'               => $request->peso,
            'talla'              => $request->talla,
        ]);

        $cita->update([
            'estado_cita'            => 'Atendido',
            'observaciones_consulta' => $request->motivo_consulta,
        ]);

        return redirect()->route('consulta.index')
            ->with('success', 'Consulta registrada correctamente.');
    }
}