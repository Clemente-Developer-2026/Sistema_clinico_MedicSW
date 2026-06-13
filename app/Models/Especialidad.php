<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Especialidad extends Model
{
    use HasFactory;

    protected $table = 'especialidad';
    protected $primaryKey = 'id_especialidad';

    protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
    ];

    // Atajo directo: especialidad → médicos (muchos a muchos)
    public function medicos()
    {
        return $this->belongsToMany(
            Medico::class,
            'medico_especialidad',
            'id_especialidad',
            'id_medico'
        )->wherePivot('estado', 1);
    }
}