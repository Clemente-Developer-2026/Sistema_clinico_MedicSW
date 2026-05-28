<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medico;

class MedicoSeeder extends Seeder
{
    public function run(): void
    {
        $medicos = [
            [
                'id_usuario' => 6,
                'nombres' => 'Carlos Eduardo',
                'apellidos' => 'Ramírez Soto',
                'fecha_nacimiento' => '1975-03-15',
                'colegiatura' => 'MED-12345',
                'carnet_identidad' => '12345678 LP',
                'estado' => 1,
            ],
            [
                'id_usuario' => 7,
                'nombres' => 'Ana María',
                'apellidos' => 'Fernández López',
                'fecha_nacimiento' => '1980-07-22',
                'colegiatura' => 'MED-23456',
                'carnet_identidad' => '87654321 CB',
                'estado' => 1,
            ],
            [
                'id_usuario' => 8,
                'nombres' => 'Roberto Carlos',
                'apellidos' => 'Mendoza Ríos',
                'fecha_nacimiento' => '1972-11-30',
                'colegiatura' => 'MED-34567',
                'carnet_identidad' => '45678912 SC',
                'estado' => 1,
            ],
            [
                'id_usuario' => 9,
                'nombres' => 'Patricia Alejandra',
                'apellidos' => 'Quispe Mamani',
                'fecha_nacimiento' => '1985-09-05',
                'colegiatura' => 'MED-45678',
                'carnet_identidad' => '98765432 OR',
                'estado' => 1,
            ],
            [
                'id_usuario' => 10,
                'nombres' => 'Javier Enrique',
                'apellidos' => 'Torres Vargas',
                'fecha_nacimiento' => '1978-12-18',
                'colegiatura' => 'MED-56789',
                'carnet_identidad' => '56789123 TJ',
                'estado' => 1,
            ],
        ];

        foreach ($medicos as $medico) {
            Medico::create($medico);
        }
    }
}