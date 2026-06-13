<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HorarioAtencion;

class HorarioAtencionSeeder extends Seeder
{
    public function run(): void
    {
        $horarios = [
            // Médico 1 (Cardiología)
            ['id_medico' => 1, 'dia_semana' => 'Lunes', 'hora_inicio' => '08:00:00', 'hora_fin' => '12:00:00', 'limite_pacientes' => 15, 'estado' => 1],
            ['id_medico' => 1, 'dia_semana' => 'Martes', 'hora_inicio' => '08:00:00', 'hora_fin' => '12:00:00', 'limite_pacientes' => 15, 'estado' => 1],
            ['id_medico' => 1, 'dia_semana' => 'Miércoles', 'hora_inicio' => '14:00:00', 'hora_fin' => '18:00:00', 'limite_pacientes' => 15, 'estado' => 1],
            ['id_medico' => 1, 'dia_semana' => 'Jueves', 'hora_inicio' => '08:00:00', 'hora_fin' => '12:00:00', 'limite_pacientes' => 15, 'estado' => 1],
            ['id_medico' => 1, 'dia_semana' => 'Viernes', 'hora_inicio' => '08:00:00', 'hora_fin' => '12:00:00', 'limite_pacientes' => 15, 'estado' => 1],
            
            // Médico 2 (Pediatría)
            ['id_medico' => 2, 'dia_semana' => 'Lunes', 'hora_inicio' => '14:00:00', 'hora_fin' => '18:00:00', 'limite_pacientes' => 20, 'estado' => 1],
            ['id_medico' => 2, 'dia_semana' => 'Martes', 'hora_inicio' => '08:00:00', 'hora_fin' => '12:00:00', 'limite_pacientes' => 20, 'estado' => 1],
            ['id_medico' => 2, 'dia_semana' => 'Miércoles', 'hora_inicio' => '08:00:00', 'hora_fin' => '12:00:00', 'limite_pacientes' => 20, 'estado' => 1],
            ['id_medico' => 2, 'dia_semana' => 'Jueves', 'hora_inicio' => '14:00:00', 'hora_fin' => '18:00:00', 'limite_pacientes' => 20, 'estado' => 1],
            ['id_medico' => 2, 'dia_semana' => 'Viernes', 'hora_inicio' => '08:00:00', 'hora_fin' => '12:00:00', 'limite_pacientes' => 20, 'estado' => 1],
            
            // Médico 3 (Traumatología)
            ['id_medico' => 3, 'dia_semana' => 'Lunes', 'hora_inicio' => '08:00:00', 'hora_fin' => '12:00:00', 'limite_pacientes' => 12, 'estado' => 1],
            ['id_medico' => 3, 'dia_semana' => 'Martes', 'hora_inicio' => '14:00:00', 'hora_fin' => '18:00:00', 'limite_pacientes' => 12, 'estado' => 1],
            ['id_medico' => 3, 'dia_semana' => 'Miércoles', 'hora_inicio' => '08:00:00', 'hora_fin' => '12:00:00', 'limite_pacientes' => 12, 'estado' => 1],
            ['id_medico' => 3, 'dia_semana' => 'Jueves', 'hora_inicio' => '14:00:00', 'hora_fin' => '18:00:00', 'limite_pacientes' => 12, 'estado' => 1],
            ['id_medico' => 3, 'dia_semana' => 'Viernes', 'hora_inicio' => '08:00:00', 'hora_fin' => '12:00:00', 'limite_pacientes' => 12, 'estado' => 1],
            
            // Médico 4 (Ginecología)
            ['id_medico' => 4, 'dia_semana' => 'Lunes', 'hora_inicio' => '08:00:00', 'hora_fin' => '12:00:00', 'limite_pacientes' => 18, 'estado' => 1],
            ['id_medico' => 4, 'dia_semana' => 'Martes', 'hora_inicio' => '08:00:00', 'hora_fin' => '12:00:00', 'limite_pacientes' => 18, 'estado' => 1],
            ['id_medico' => 4, 'dia_semana' => 'Miércoles', 'hora_inicio' => '08:00:00', 'hora_fin' => '12:00:00', 'limite_pacientes' => 18, 'estado' => 1],
            ['id_medico' => 4, 'dia_semana' => 'Jueves', 'hora_inicio' => '08:00:00', 'hora_fin' => '12:00:00', 'limite_pacientes' => 18, 'estado' => 1],
            ['id_medico' => 4, 'dia_semana' => 'Viernes', 'hora_inicio' => '08:00:00', 'hora_fin' => '12:00:00', 'limite_pacientes' => 18, 'estado' => 1],
            
            // Médico 5 (Medicina General)
            ['id_medico' => 5, 'dia_semana' => 'Lunes', 'hora_inicio' => '08:00:00', 'hora_fin' => '12:00:00', 'limite_pacientes' => 25, 'estado' => 1],
            ['id_medico' => 5, 'dia_semana' => 'Martes', 'hora_inicio' => '14:00:00', 'hora_fin' => '18:00:00', 'limite_pacientes' => 25, 'estado' => 1],
            ['id_medico' => 5, 'dia_semana' => 'Miércoles', 'hora_inicio' => '08:00:00', 'hora_fin' => '12:00:00', 'limite_pacientes' => 25, 'estado' => 1],
            ['id_medico' => 5, 'dia_semana' => 'Jueves', 'hora_inicio' => '14:00:00', 'hora_fin' => '18:00:00', 'limite_pacientes' => 25, 'estado' => 1],
            ['id_medico' => 5, 'dia_semana' => 'Viernes', 'hora_inicio' => '08:00:00', 'hora_fin' => '12:00:00', 'limite_pacientes' => 25, 'estado' => 1],
        ];

        foreach ($horarios as $horario) {
            HorarioAtencion::create($horario);
        }
    }
}