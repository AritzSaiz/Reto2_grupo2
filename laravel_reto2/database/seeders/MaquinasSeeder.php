<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaquinasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('maquinas')->insert([
            // Taller Mecánico 1 (5010)
            [ 'codigo' => 1001, 'nombre' => 'Torno Paralelo', 'modelo' => 'TP-1500', 'prioridad' => '2', 'seccion_id' => 1, 'created_at' => now(), 'updated_at' => now() ],
            [ 'codigo' => 1002, 'nombre' => 'Fresadora Universal', 'modelo' => 'FU-2000', 'prioridad' => '2', 'seccion_id' => 1, 'created_at' => now(), 'updated_at' => now() ],
            [ 'codigo' => 1003, 'nombre' => 'Taladro de Banco', 'modelo' => 'TB-500', 'prioridad' => '3', 'seccion_id' => 1, 'created_at' => now(), 'updated_at' => now() ],
            [ 'codigo' => 1004, 'nombre' => 'Rectificadora de Superficies Planas', 'modelo' => 'RSP-300', 'prioridad' => '3', 'seccion_id' => 1, 'created_at' => now(), 'updated_at' => now() ],
            [ 'codigo' => 1005, 'nombre' => 'Sierra de Cinta', 'modelo' => 'SC-400', 'prioridad' => '3', 'seccion_id' => 1, 'created_at' => now(), 'updated_at' => now() ],

            // Taller Aurrera XXI (5011)
            [ 'codigo' => 1006, 'nombre' => 'Impresora 3D FDM', 'modelo' => 'ID-300', 'prioridad' => '1', 'seccion_id' => 2, 'created_at' => now(), 'updated_at' => now() ],
            [ 'codigo' => 1007, 'nombre' => 'Cortadora Láser CO2', 'modelo' => 'CL-600', 'prioridad' => '1', 'seccion_id' => 2, 'created_at' => now(), 'updated_at' => now() ],
            [ 'codigo' => 1008, 'nombre' => 'Scanner 3D', 'modelo' => 'S3D-100', 'prioridad' => '2', 'seccion_id' => 2, 'created_at' => now(), 'updated_at' => now() ],
            [ 'codigo' => 1009, 'nombre' => 'Estación de Soldadura SMD', 'modelo' => 'ESS-400', 'prioridad' => '2', 'seccion_id' => 2, 'created_at' => now(), 'updated_at' => now() ],
            [ 'codigo' => 1010, 'nombre' => 'Brazo Robotico Colaborativo', 'modelo' => 'BRC-500', 'prioridad' => '1', 'seccion_id' => 2, 'created_at' => now(), 'updated_at' => now() ],

            // Taller Mecánico 2 (5012)
            [ 'codigo' => 1011, 'nombre' => 'Torno CNC', 'modelo' => 'TC-2500', 'prioridad' => '1', 'seccion_id' => 3, 'created_at' => now(), 'updated_at' => now() ],
            [ 'codigo' => 1012, 'nombre' => 'Fresadora CNC', 'modelo' => 'FC-3000', 'prioridad' => '1', 'seccion_id' => 3, 'created_at' => now(), 'updated_at' => now() ],
            [ 'codigo' => 1013, 'nombre' => 'Taladro Radial', 'modelo' => 'TR-1000', 'prioridad' => '2', 'seccion_id' => 3, 'created_at' => now(), 'updated_at' => now() ],
            [ 'codigo' => 1014, 'nombre' => 'Máquina de Electroerosión', 'modelo' => 'ME-200', 'prioridad' => '2', 'seccion_id' => 3, 'created_at' => now(), 'updated_at' => now() ],
            [ 'codigo' => 1015, 'nombre' => 'Afiladora de Herramientas', 'modelo' => 'AH-150', 'prioridad' => '3', 'seccion_id' => 3, 'created_at' => now(), 'updated_at' => now() ],

            // Taller Control Numérico (5014)
            [ 'codigo' => 1016, 'nombre' => 'Centro de Mecanizado CNC', 'modelo' => 'CM-4000', 'prioridad' => '1', 'seccion_id' => 4, 'created_at' => now(), 'updated_at' => now() ],
            [ 'codigo' => 1017, 'nombre' => 'Torno CNC de 5 Ejes', 'modelo' => 'T5E-100', 'prioridad' => '1', 'seccion_id' => 4, 'created_at' => now(), 'updated_at' => now() ],
            [ 'codigo' => 1018, 'nombre' => 'Router CNC', 'modelo' => 'RC-1500', 'prioridad' => '2', 'seccion_id' => 4, 'created_at' => now(), 'updated_at' => now() ],
            [ 'codigo' => 1019, 'nombre' => 'Software de simulación CNC', 'modelo' => 'SS-CNC', 'prioridad' => '2', 'seccion_id' => 4, 'created_at' => now(), 'updated_at' => now() ],

            // Taller Mecánico 3 (5017)
            [ 'codigo' => 1020, 'nombre' => 'Prensa Hidráulica', 'modelo' => 'PH-200', 'prioridad' => '3', 'seccion_id' => 5, 'created_at' => now(), 'updated_at' => now() ],
            [ 'codigo' => 1021, 'nombre' => 'Equipo de Soldadura MIG/MAG', 'modelo' => 'EMM-400', 'prioridad' => '2', 'seccion_id' => 5, 'created_at' => now(), 'updated_at' => now() ],
            [ 'codigo' => 1022, 'nombre' => 'Equipo de Soldadura TIG', 'modelo' => 'EST-200', 'prioridad' => '2', 'seccion_id' => 5, 'created_at' => now(), 'updated_at' => now() ],
            [ 'codigo' => 1023, 'nombre' => 'Esmeriladora de Banco', 'modelo' => 'EB-150', 'prioridad' => '3', 'seccion_id' => 5, 'created_at' => now(), 'updated_at' => now() ],

            // Laboratorio de Electricidad (5018)
            [ 'codigo' => 1024, 'nombre' => 'Fuente de Alimentación Regulable', 'modelo' => 'FAR-500', 'prioridad' => '2', 'seccion_id' => 6, 'created_at' => now(), 'updated_at' => now() ],
            [ 'codigo' => 1025, 'nombre' => 'Multímetro Digital', 'modelo' => 'MD-100', 'prioridad' => '3', 'seccion_id' => 6, 'created_at' => now(), 'updated_at' => now() ],
            [ 'codigo' => 1026, 'nombre' => 'Osciloscopio Digital', 'modelo' => 'OD-200', 'prioridad' => '2', 'seccion_id' => 6, 'created_at' => now(), 'updated_at' => now() ],

            // Taller de Electrónica (5020)
            [ 'codigo' => 1027, 'nombre' => 'Estación de Soldadura', 'modelo' => 'ES-300', 'prioridad' => '2', 'seccion_id' => 8, 'created_at' => now(), 'updated_at' => now() ],
            [ 'codigo' => 1028, 'nombre' => 'Analizador Lógico', 'modelo' => 'AL-100', 'prioridad' => '2', 'seccion_id' => 8, 'created_at' => now(), 'updated_at' => now() ],
            [ 'codigo' => 1029, 'nombre' => 'Generador de Funciones', 'modelo' => 'GF-200', 'prioridad' => '3', 'seccion_id' => 8, 'created_at' => now(), 'updated_at' => now() ],
            [ 'codigo' => 1030, 'nombre' => 'Protoboard', 'modelo' => 'PB-100', 'prioridad' => '3', 'seccion_id' => 8, 'created_at' => now(), 'updated_at' => now() ],
        ]);
    }
}
