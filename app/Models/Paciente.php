<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paciente extends Model
{
    use HasFactory;

    protected $table = 'paciente';
    protected $primaryKey = 'id_paciente';

    protected $fillable = [
        'id_usuario',
        'carnet_identidad',
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'telefono',
        'sexo',
        'direccion',
        'contacto_emergencia_nombre',
        'contacto_emergencia_telefono',
        'grupo_sanguineo',
        'alergias',
        'enfermedades_base',
        'estado',
    ];

    // Relación con User
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    // Un paciente tiene muchas citas
    public function citas()
    {
        return $this->hasMany(CitaMedica::class, 'id_paciente');
    }
}