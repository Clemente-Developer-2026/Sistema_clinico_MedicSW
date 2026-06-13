<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Especialidad;

class EspecialidadSeeder extends Seeder
{
    public function run(): void
    {
        $especialidades = [
            ['nombre' => 'Cardiología', 'descripcion' => 'Especialidad médica que trata las enfermedades del corazón y el sistema circulatorio'],
            ['nombre' => 'Pediatría', 'descripcion' => 'Rama de la medicina que se ocupa de la salud y enfermedades de los niños'],
            ['nombre' => 'Ginecología', 'descripcion' => 'Especialidad que se ocupa del aparato reproductor femenino'],
            ['nombre' => 'Traumatología', 'descripcion' => 'Especialidad quirúrgica que trata lesiones del sistema musculoesquelético'],
            ['nombre' => 'Medicina General', 'descripcion' => 'Atención primaria y diagnóstico de enfermedades comunes'],
            ['nombre' => 'Dermatología', 'descripcion' => 'Especialidad médica que trata la piel, cabello y uñas'],
            ['nombre' => 'Oftalmología', 'descripcion' => 'Especialidad que trata las enfermedades de los ojos'],
        ];

        foreach ($especialidades as $especialidad) {
            Especialidad::create($especialidad);
        }
    }
}