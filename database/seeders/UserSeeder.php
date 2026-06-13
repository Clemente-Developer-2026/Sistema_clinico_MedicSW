<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Pacientes (5)
        User::create([
            'name' => 'Juan Carlos Pérez Gómez',
            'email' => 'juan.perez@email.com',
            'password' => Hash::make('password'),
            'rol' => 'paciente',
            'estado' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'name' => 'María Elena Rodríguez López',
            'email' => 'maria.rodriguez@email.com',
            'password' => Hash::make('password'),
            'rol' => 'paciente',
            'estado' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'name' => 'Carlos Andrés Mendoza Ríos',
            'email' => 'carlos.mendoza@email.com',
            'password' => Hash::make('password'),
            'rol' => 'paciente',
            'estado' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'name' => 'Ana Sofía Quispe Mamani',
            'email' => 'ana.quispe@email.com',
            'password' => Hash::make('password'),
            'rol' => 'paciente',
            'estado' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'name' => 'Roberto Luis Fernández Torres',
            'email' => 'roberto.fernandez@email.com',
            'password' => Hash::make('password'),
            'rol' => 'paciente',
            'estado' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Médicos (5)
        User::create([
            'name' => 'Dr. Carlos Eduardo Ramírez Soto',
            'email' => 'carlos.ramirez@hospital.com',
            'password' => Hash::make('password'),
            'rol' => 'medico',
            'estado' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'name' => 'Dra. Ana María Fernández López',
            'email' => 'ana.fernandez@hospital.com',
            'password' => Hash::make('password'),
            'rol' => 'medico',
            'estado' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'name' => 'Dr. Roberto Carlos Mendoza Ríos',
            'email' => 'roberto.mendoza@hospital.com',
            'password' => Hash::make('password'),
            'rol' => 'medico',
            'estado' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'name' => 'Dra. Patricia Alejandra Quispe Mamani',
            'email' => 'patricia.quispe@hospital.com',
            'password' => Hash::make('password'),
            'rol' => 'medico',
            'estado' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'name' => 'Dr. Javier Enrique Torres Vargas',
            'email' => 'javier.torres@hospital.com',
            'password' => Hash::make('password'),
            'rol' => 'medico',
            'estado' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}