<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Administrador Principal',
            'email' => 'admin@medicsw.com',
            'password' => Hash::make('password123'), // Contraseña encriptada
            'rol' => 'administrador', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}