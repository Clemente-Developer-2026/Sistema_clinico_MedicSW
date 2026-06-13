<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medico extends Model
{
    use HasFactory;

    protected $table = 'medico';
    protected $primaryKey = 'id_medico';

    protected $fillable = [
        'id_usuario',
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'colegiatura',
        'carnet_identidad',
        'estado',
    ];

    // Relación con User
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    // Atajo directo: medico → especialidades (muchos a muchos)
    public function especialidades()
    {
        return $this->belongsToMany(
            Especialidad::class,
            'medico_especialidad',
            'id_medico',
            'id_especialidad'
        )->wherePivot('estado', 1);
    }

    // Acceso al modelo pivot si alguien necesita cambiar estado
    public function medicoEspecialidades()
    {
        return $this->hasMany(MedicoEspecialidad::class, 'id_medico');
    }

    // Un médico tiene muchas citas
    public function citas()
    {
        return $this->hasMany(CitaMedica::class, 'id_medico');
    }

    // Un médico tiene horarios
    public function horarios()
    {
        return $this->hasMany(HorarioAtencion::class, 'id_medico');
    }
}