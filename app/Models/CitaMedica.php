<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CitaMedica extends Model
{
    use HasFactory;

    protected $table = 'cita_medica';
    protected $primaryKey = 'id_cita';

    protected $fillable = [
        'id_paciente',
        'id_medico',
        'id_especialidad',
        'fecha_cita',
        'hora_cita',
        'numero_ficha',
        'estado_cita',
        'observaciones_consulta',
        'estado',
    ];

    // Relación con Paciente
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }

    // Relación con Medico
    public function medico()
    {
        return $this->belongsTo(Medico::class, 'id_medico');
    }

    // Relación con Especialidad
    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class, 'id_especialidad');
    }

    // Una cita tiene un historial (1:1)
    public function historial()
    {
        return $this->hasOne(HistorialClinico::class, 'id_cita');
    }
}