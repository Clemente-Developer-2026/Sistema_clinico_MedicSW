<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MedicoEspecialidad;

class MedicoEspecialidadSeeder extends Seeder
{
    public function run(): void
    {
        $asignaciones = [
            ['id_medico' => 1, 'id_especialidad' => 1, 'estado' => 1], // Ramírez - Cardiología
            ['id_medico' => 2, 'id_especialidad' => 2, 'estado' => 1], // Fernández - Pediatría
            ['id_medico' => 2, 'id_especialidad' => 5, 'estado' => 1], // Fernández - Medicina General
            ['id_medico' => 3, 'id_especialidad' => 4, 'estado' => 1], // Mendoza - Traumatología
            ['id_medico' => 4, 'id_especialidad' => 3, 'estado' => 1], // Quispe - Ginecología
            ['id_medico' => 5, 'id_especialidad' => 5, 'estado' => 1], // Torres - Medicina General
            ['id_medico' => 5, 'id_especialidad' => 6, 'estado' => 1], // Torres - Dermatología
        ];

        foreach ($asignaciones as $asignacion) {
            MedicoEspecialidad::create($asignacion);
        }
    }
}