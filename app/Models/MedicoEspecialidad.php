<?php

namespace App\Models;

//==========================================================================
//este modelo es la relacion entre las tablas medico y especialidad by. JAH
//==========================================================================

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicoEspecialidad extends Model
{
    use HasFactory;

    protected $table = 'medico_especialidad';
    protected $primaryKey = 'id_medico_especialidad';

    protected $fillable = [
        'id_medico',
        'id_especialidad',
        'estado',
    ];

    public function medico()
    {
        return $this->belongsTo(Medico::class, 'id_medico');
    }

    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class, 'id_especialidad');
    }
}