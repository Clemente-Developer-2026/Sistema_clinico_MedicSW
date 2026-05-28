<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HorarioAtencion extends Model
{
    use HasFactory;

    protected $table = 'horario_atencion';
    protected $primaryKey = 'id_horario';

    protected $fillable = [
        'id_medico',
        'dia_semana',
        'hora_inicio',
        'hora_fin',
        'limite_pacientes',
        'estado',
    ];

    // Un horario pertenece a un médico
    public function medico()
    {
        return $this->belongsTo(Medico::class, 'id_medico');
    }
}