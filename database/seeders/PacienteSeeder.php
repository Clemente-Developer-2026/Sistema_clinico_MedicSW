<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Paciente;

class PacienteSeeder extends Seeder
{
    public function run(): void
    {
        $pacientes = [
            [
                'id_usuario' => 1,
                'carnet_identidad' => '12345678 LP',
                'nombres' => 'Juan Carlos',
                'apellidos' => 'Pérez Gómez',
                'fecha_nacimiento' => '1985-03-15',
                'telefono' => '76543210',
                'sexo' => 'Masculino',
                'direccion' => 'Av. 6 de Agosto #123, La Paz',
                'contacto_emergencia_nombre' => 'María Pérez',
                'contacto_emergencia_telefono' => '71234567',
                'grupo_sanguineo' => 'O+',
                'alergias' => 'Ninguna',
                'enfermedades_base' => 'Hipertensión controlada',
                'estado' => 1,
            ],
            [
                'id_usuario' => 2,
                'carnet_identidad' => '87654321 CB',
                'nombres' => 'María Elena',
                'apellidos' => 'Rodríguez López',
                'fecha_nacimiento' => '1990-07-22',
                'telefono' => '69876543',
                'sexo' => 'Femenino',
                'direccion' => 'Calle América #456, Cochabamba',
                'contacto_emergencia_nombre' => 'Carlos Rodríguez',
                'contacto_emergencia_telefono' => '72456789',
                'grupo_sanguineo' => 'A-',
                'alergias' => 'Penicilina',
                'enfermedades_base' => 'Asma bronquial',
                'estado' => 1,
            ],
            [
                'id_usuario' => 3,
                'carnet_identidad' => '45678912 SC',
                'nombres' => 'Carlos Andrés',
                'apellidos' => 'Mendoza Ríos',
                'fecha_nacimiento' => '1978-11-30',
                'telefono' => '73456789',
                'sexo' => 'Masculino',
                'direccion' => 'Av. San Martín #789, Santa Cruz',
                'contacto_emergencia_nombre' => 'Laura Mendoza',
                'contacto_emergencia_telefono' => '75678901',
                'grupo_sanguineo' => 'B+',
                'alergias' => 'Polen, ácaros',
                'enfermedades_base' => 'Diabetes tipo 2',
                'estado' => 1,
            ],
            [
                'id_usuario' => 4,
                'carnet_identidad' => '98765432 OR',
                'nombres' => 'Ana Sofía',
                'apellidos' => 'Quispe Mamani',
                'fecha_nacimiento' => '1995-09-05',
                'telefono' => '77890123',
                'sexo' => 'Femenino',
                'direccion' => 'Calle Bolívar #234, Oruro',
                'contacto_emergencia_nombre' => 'Miguel Quispe',
                'contacto_emergencia_telefono' => '73456789',
                'grupo_sanguineo' => 'AB+',
                'alergias' => 'Ninguna',
                'enfermedades_base' => 'Ninguna',
                'estado' => 1,
            ],
            [
                'id_usuario' => 5,
                'carnet_identidad' => '56789123 TJ',
                'nombres' => 'Roberto Luis',
                'apellidos' => 'Fernández Torres',
                'fecha_nacimiento' => '1982-12-18',
                'telefono' => '71234567',
                'sexo' => 'Masculino',
                'direccion' => 'Av. Panamericana #567, Tarija',
                'contacto_emergencia_nombre' => 'Sofía Fernández',
                'contacto_emergencia_telefono' => '77890123',
                'grupo_sanguineo' => 'A+',
                'alergias' => 'Mariscos, sulfas',
                'enfermedades_base' => 'Artritis reumatoide',
                'estado' => 1,
            ],
        ];

        foreach ($pacientes as $paciente) {
            Paciente::create($paciente);
        }
    }
}