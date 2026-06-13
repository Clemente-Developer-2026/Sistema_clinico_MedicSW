<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HistorialClinico extends Model
{
    use HasFactory;

    protected $table = 'historial_clinico';
    protected $primaryKey = 'id_historial';

    protected $fillable = [
        'id_cita',
        'motivo_consulta',
        'sintomas',
        'diagnostico',
        'tratamiento_receta',
        'presion_arterial',
        'peso',
        'talla',
    ];

    // Un historial pertenece a una cita (1:1)
    public function cita()
    {
        return $this->belongsTo(CitaMedica::class, 'id_cita');
    }

    // Acceso directo al paciente desde el historial
    public function paciente()
    {
        return $this->hasOneThrough(
            Paciente::class,
            CitaMedica::class,
            'id_cita',      // FK en cita_medica
            'id_paciente',  // FK en paciente
            'id_historial', // PK local
            'id_paciente'   // PK intermedia
        );
    }
}