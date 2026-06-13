<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            EspecialidadSeeder::class,
            PacienteSeeder::class,
            MedicoSeeder::class,
            MedicoEspecialidadSeeder::class,
            HorarioAtencionSeeder::class,
        ]);
    }
}