<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class IncidenciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('incidencias')->insert([
            // Incidencias para Taller Mecánico 1
            [
                'titulo' => 'Vibración excesiva en torno',
                'descripcion' => 'El torno paralelo vibra mucho al girar, hace ruido inusual',
                'abierta' => true,
                'gravedad' => 'Sí funciona',
                'categoria_id' => 2,
                'operario_id' => 2,
                'maquina_id' => 1,
                'created_at' => Carbon::create('2025-01-20 10:00:00'),
                'updated_at' => Carbon::create('2025-01-20 10:00:00'),
                'deleted_at' => null
            ],
            [
                'titulo' => 'Parada por sobrecalentamiento',
                'descripcion' => 'El torno se detuvo por sobrecalentamiento, necesita revisión',
                'abierta' => true,
                'gravedad' => 'No funciona',
                'categoria_id' => 1,
                'operario_id' => 3,
                'maquina_id' => 1,
                'created_at' => Carbon::create('2025-01-21 14:30:00'),
                'updated_at' => Carbon::create('2025-01-21 14:30:00'),
                'deleted_at' => null
            ],
            [
                'titulo' => 'Ruido inusual en la fresadora',
                'descripcion' => 'La fresadora universal hace un ruido extraño al trabajar',
                'abierta' => true,
                'gravedad' => 'Aviso',
                'categoria_id' => 3,
                'operario_id' => 4,
                'maquina_id' => 2,
                'created_at' => Carbon::create('2025-01-22 08:15:00'),
                'updated_at' => Carbon::create('2025-01-22 08:15:00'),
                'deleted_at' => Carbon::create('2025-01-23 09:00:00')
            ],
            [
                'titulo' => 'Limpieza General',
                'descripcion' => 'Limpieza rutinaria de la máquina',
                'abierta' => true,
                'gravedad' => 'Mantenimiento preventivo',
                'categoria_id' => 7,
                'operario_id' => 5,
                'maquina_id' => 2,
                'created_at' => Carbon::create('2025-01-23 16:00:00'),
                'updated_at' => Carbon::create('2025-01-23 16:00:00'),
                'deleted_at' => null
            ],
            [
                'titulo' => 'Broca atascada',
                'descripcion' => 'La broca se atascó en el taladro de banco',
                'abierta' => false,
                'gravedad' => 'Sí funciona',
                'categoria_id' => 2,
                'operario_id' => 1,
                'maquina_id' => 3,
                'created_at' => Carbon::create('2025-01-24 11:45:00'),
                'updated_at' => Carbon::create('2025-01-24 11:45:00'),
                'deleted_at' => null
            ],
            [
                'titulo' => 'Ajuste de Componentes',
                'descripcion' => 'Revisión y ajuste de tornillos y piezas',
                'abierta' => false,
                'gravedad' => 'Mantenimiento preventivo',
                'categoria_id' => 7,
                'operario_id' => 2,
                'maquina_id' => 3,
                'created_at' => Carbon::create('2025-01-25 10:00:00'),
                'updated_at' => Carbon::create('2025-01-25 10:00:00'),
                'deleted_at' => null
            ],
            [
                'titulo' => 'Desgaste en la muela',
                'descripcion' => 'La muela de la rectificadora necesita ser reemplazada',
                'abierta' => true,
                'gravedad' => 'Aviso',
                'categoria_id' => 3,
                'operario_id' => 3,
                'maquina_id' => 4,
                'created_at' => Carbon::create('2025-01-26 13:20:00'),
                'updated_at' => Carbon::create('2025-01-26 13:20:00'),
                'deleted_at' => null
            ],
            [
                'titulo' => 'Problema con el refrigerante',
                'descripcion' => 'El sistema de refrigeración de la rectificadora no funciona correctamente',
                'abierta' => true,
                'gravedad' => 'Sí funciona',
                'categoria_id' => 2,
                'operario_id' => 4,
                'maquina_id' => 4,
                'created_at' => Carbon::create('2025-01-27 09:00:00'),
                'updated_at' => Carbon::create('2025-01-27 09:00:00'),
                'deleted_at' => Carbon::create('2025-01-28 11:00:00')
            ],
            [
                'titulo' => 'Atasco en la sierra',
                'descripcion' => 'La sierra de cinta se atascó al cortar un material',
                'abierta' => true,
                'gravedad' => 'No funciona',
                'categoria_id' => 1,
                'operario_id' => 5,
                'maquina_id' => 5,
                'created_at' => Carbon::create('2025-01-28 15:40:00'),
                'updated_at' => Carbon::create('2025-01-28 15:40:00'),
                'deleted_at' => null
            ],
            // Incidencias para Taller Aurrera XXI
            [
                'titulo' => 'Problema con la extrusión',
                'descripcion' => 'La impresora 3D tiene problemas con la extrusión de filamento',
                'abierta' => false,
                'gravedad' => 'Sí funciona',
                'categoria_id' => 2,
                'operario_id' => 2,
                'maquina_id' => 6,
                'created_at' => Carbon::create('2025-01-25 11:00:00'),
                'updated_at' => Carbon::create('2025-01-25 11:00:00'),
                'deleted_at' => null
            ],
            [
                'titulo' => 'Actualización Software',
                'descripcion' => 'Actualización del software de la máquina',
                'abierta' => false,
                'gravedad' => 'Mantenimiento preventivo',
                'categoria_id' => 7,
                'operario_id' => 3,
                'maquina_id' => 6,
                'created_at' => Carbon::create('2025-01-25 11:30:00'),
                'updated_at' => Carbon::create('2025-01-25 11:30:00'),
                'deleted_at' => null
            ],
            [
                'titulo' => 'Lente sucia',
                'descripcion' => 'La cortadora láser tiene la lente sucia y no corta bien',
                'abierta' => true,
                'gravedad' => 'Aviso',
                'categoria_id' => 3,
                'operario_id' => 4,
                'maquina_id' => 7,
                'created_at' => Carbon::create('2025-01-25 11:40:00'),
                'updated_at' => Carbon::create('2025-01-25 11:40:00'),
                'deleted_at' => null
            ],
            [
                'titulo' => 'Alineación láser',
                'descripcion' => 'El láser de la cortadora necesita ser realineado',
                'abierta' => true,
                'gravedad' => 'No funciona',
                'categoria_id' => 1,
                'operario_id' => 5,
                'maquina_id' => 7,
                'created_at' => Carbon::create('2025-01-25 12:00:00'),
                'updated_at' => Carbon::create('2025-01-25 12:00:00'),
                'deleted_at' => null
            ],
            [
                'titulo' => 'Problema de calibración',
                'descripcion' => 'El escáner 3D no está calibrando correctamente',
                'abierta' => true,
                'gravedad' => 'Sí funciona',
                'categoria_id' => 2,
                'operario_id' => 1,
                'maquina_id' => 8,
                'created_at' => Carbon::create('2025-01-25 12:00:00'),
                'updated_at' => Carbon::create('2025-01-25 12:00:00'),
                'deleted_at' => null
            ],
            [
                'titulo' => 'Actualización Software',
                'descripcion' => 'Actualización del software de la máquina',
                'abierta' => false,
                'gravedad' => 'Mantenimiento preventivo',
                'categoria_id' => 7,
                'operario_id' => 2,
                'maquina_id' => 8,
                'created_at' => Carbon::create('2025-01-25 12:10:00'),
                'updated_at' => Carbon::create('2025-01-25 12:10:00'),
                'deleted_at' => null
            ],
            [
                'titulo' => 'Punta de soldadura deteriorada',
                'descripcion' => 'La punta de la estación de soldadura necesita ser reemplazada',
                'abierta' => true,
                'gravedad' => 'Aviso',
                'categoria_id' => 3,
                'operario_id' => 3,
                'maquina_id' => 9,
                'created_at' => Carbon::create('2025-01-25 12:15:00'),
                'updated_at' => Carbon::create('2025-01-25 12:15:00'),
                'deleted_at' => null
            ],
            [
                'titulo' => 'Fallo en el calentamiento',
                'descripcion' => 'La estación de soldadura no calienta correctamente',
                'abierta' => true,
                'gravedad' => 'No funciona',
                'categoria_id' => 1,
                'operario_id' => 4,
                'maquina_id' => 9,
                'created_at' => Carbon::create('2025-01-25 12:20:00'),
                'updated_at' => Carbon::create('2025-01-25 12:20:00'),
                'deleted_at' => Carbon::create('2025-02-07 12:00:00')
            ],
            [
                'titulo' => 'Movimiento errático del brazo',
                'descripcion' => 'El brazo robótico tiene movimientos erráticos y necesita revisión',
                'abierta' => true,
                'gravedad' => 'Sí funciona',
                'categoria_id' => 2,
                'operario_id' => 5,
                'maquina_id' => 10,
                'created_at' => Carbon::create('2025-01-25 12:25:00'),
                'updated_at' => Carbon::create('2025-01-25 12:25:00'),
                'deleted_at' => null
            ],
            [
                'titulo' => 'Revisión Eléctrica',
                'descripcion' => 'Revisión de los cables y conexiones eléctricas',
                'abierta' => true,
                'gravedad' => 'Mantenimiento preventivo',
                'categoria_id' => 7,
                'operario_id' => 1,
                'maquina_id' => 10,
                'created_at' => Carbon::create('2025-01-25 12:30:00'),
                'updated_at' => Carbon::create('2025-01-25 12:30:00'),
                'deleted_at' => null
            ],
            // Incidencias para Taller Mecánico 2
            [
                'titulo' => 'Error en el programa CNC',
                'descripcion' => 'El torno CNC muestra un error al cargar el programa',
                'abierta' => true,
                'gravedad' => 'No funciona',
                'categoria_id' => 1,
                'operario_id' => 2,
                'maquina_id' => 11,
                'created_at' => Carbon::create('2025-01-25 12:35:00'),
                'updated_at' => Carbon::create('2025-01-25 12:35:00'),
                'deleted_at' => null
            ],
            [
                'titulo' => 'Vibración excesiva en fresado',
                'descripcion' => 'La fresadora CNC vibra demasiado al hacer cortes',
                'abierta' => false,
                'gravedad' => 'Sí funciona',
                'categoria_id' => 2,
                'operario_id' => 4,
                'maquina_id' => 12,
                'created_at' => Carbon::create('2025-01-25 12:40:00'),
                'updated_at' => Carbon::create('2025-01-25 12:40:00'),
                'deleted_at' => null
            ],
            [
                'titulo' => 'Problema con el sistema de refrigeración',
                'descripcion' => 'El sistema de refrigeración de la fresadora no funciona',
                'abierta' => true,
                'gravedad' => 'No funciona',
                'categoria_id' => 1,
                'operario_id' => 5,
                'maquina_id' => 13,
                'created_at' => Carbon::create('2025-01-25 12:45:00'),
                'updated_at' => Carbon::create('2025-01-25 12:45:00'),
                'deleted_at' => null
            ],
            [
                'titulo' => 'Ruido anormal en taladro',
                'descripcion' => 'El taladro radial emite un ruido anormal durante el uso',
                'abierta' => true,
                'gravedad' => 'Aviso',
                'categoria_id' => 3,
                'operario_id' => 1,
                'maquina_id' => 13,
                'created_at' => Carbon::create('2025-01-25 12:50:00'),
                'updated_at' => Carbon::create('2025-01-25 12:50:00'),
                'deleted_at' => null
            ],
            [
                'titulo' => 'Ajuste de Componentes',
                'descripcion' => 'Revisión y ajuste de tornillos y piezas',
                'abierta' => true,
                'gravedad' => 'Mantenimiento preventivo',
                'categoria_id' => 7,
                'operario_id' => 2,
                'maquina_id' => 13,
                'created_at' => Carbon::create('2025-01-25 13:20:00'),
                'updated_at' => Carbon::create('2025-01-25 13:20:00'),
                'deleted_at' => null
            ],
            [
                'titulo' => 'Electrodo desgastado',
                'descripcion' => 'El electrodo de la máquina de electroerosión necesita ser cambiado',
                'abierta' => false,
                'gravedad' => 'Sí funciona',
                'categoria_id' => 2,
                'operario_id' => 3,
                'maquina_id' => 14,
                'created_at' => Carbon::create('2025-01-25 13:20:00'),
                'updated_at' => Carbon::create('2025-01-25 13:20:00'),
                'deleted_at' => null
            ],
            [
                'titulo' => 'Error en la configuración de la máquina',
                'descripcion' => 'La máquina de electroerosión muestra un error de configuración',
                'abierta' => true,
                'gravedad' => 'No funciona',
                'categoria_id' => 1,
                'operario_id' => 4,
                'maquina_id' => 14,
                'created_at' => Carbon::create('2025-01-25 13:30:00'),
                'updated_at' => Carbon::create('2025-01-25 13:30:00'),
                'deleted_at' => null
            ],
            [
                'titulo' => 'Muela de afilado desgastada',
                'descripcion' => 'La muela de la afiladora necesita ser reemplazada',
                'abierta' => true,
                'gravedad' => 'Aviso',
                'categoria_id' => 3,
                'operario_id' => 5,
                'maquina_id' => 15,
                'created_at' => Carbon::create('2025-01-25 13:40:00'),
                'updated_at' => Carbon::create('2025-01-25 13:40:00'),
                'deleted_at' => null
            ],
            // Incidencias para Taller Control Numérico
            [
                'titulo' => 'Error de comunicación CNC',
                'descripcion' => 'El centro de mecanizado muestra un error de comunicación',
                'abierta' => false,
                'gravedad' => 'No funciona',
                'categoria_id' => 1,
                'operario_id' => 2,
                'maquina_id' => 16,
                'created_at' => Carbon::create('2025-01-25 13:45:00'),
                'updated_at' => Carbon::create('2025-01-25 13:45:00'),
                'deleted_at' => null
            ],
            [
                'titulo' => 'Calibración',
                'descripcion' => 'Calibración de la máquina',
                'abierta' => true,
                'gravedad' => 'Mantenimiento preventivo',
                'categoria_id' => 7,
                'operario_id' => 3,
                'maquina_id' => 16,
                'created_at' => Carbon::create('2025-01-25 13:48:00'),
                'updated_at' => Carbon::create('2025-01-25 13:48:00'),
                'deleted_at' => null
            ],
            [
                'titulo' => 'Problema con el eje',
                'descripcion' => 'El torno CNC de 5 ejes tiene problemas de movimiento en un eje',
                'abierta' => true,
                'gravedad' => 'Sí funciona',
                'categoria_id' => 2,
                'operario_id' => 4,
                'maquina_id' => 17,
                'created_at' => Carbon::create('2025-01-25 13:50:00'),
                'updated_at' => Carbon::create('2025-01-25 13:50:00'),
                'deleted_at' => null
            ],
            [
                'titulo' => 'Error en el sistema de lubricación',
                'descripcion' => 'El sistema de lubricación del torno no funciona',
                'abierta' => false,
                'gravedad' => 'No funciona',
                'categoria_id' => 1,
                'operario_id' => 5,
                'maquina_id' => 17,
                'created_at' => Carbon::create('2025-01-25 13:52:00'),
                'updated_at' => Carbon::create('2025-01-25 13:52:00'),
                'deleted_at' => null
            ],
            [
                'titulo' => 'Motor del router lento',
                'descripcion' => 'El motor del router CNC está funcionando más lento de lo normal',
                'abierta' => true,
                'gravedad' => 'Aviso',
                'categoria_id' => 3,
                'operario_id' => 1,
                'maquina_id' => 18,
                'created_at' => Carbon::create('2025-01-25 13:54:00'),
                'updated_at' => Carbon::create('2025-01-25 13:54:00'),
                'deleted_at' => null
            ],
            [
                'titulo' => 'Revisión Eléctrica',
                'descripcion' => 'Revisión de los cables y conexiones eléctricas',
                'abierta' => true,
                'gravedad' => 'Mantenimiento preventivo',
                'categoria_id' => 7,
                'operario_id' => 2,
                'maquina_id' => 18,
                'created_at' => Carbon::create('2025-01-25 13:56:00'),
                'updated_at' => Carbon::create('2025-01-25 13:56:00'),
                'deleted_at' => null
            ],
            [
                'titulo' => 'Problema de licencia',
                'descripcion' => 'El software de simulación CNC muestra un problema de licencia',
                'abierta' => true,
                'gravedad' => 'Sí funciona',
                'categoria_id' => 2,
                'operario_id' => 3,
                'maquina_id' => 19,
                'created_at' => Carbon::create('2025-01-25 13:58:00'),
                'updated_at' => Carbon::create('2025-01-25 13:58:00'),
                'deleted_at' => null
            ],
            [
                'titulo' => 'Fallo en la renderización',
                'descripcion' => 'El software de simulación CNC no renderiza correctamente',
                'abierta' => false,
                'gravedad' => 'No funciona',
                'categoria_id' => 1,
                'operario_id' => 4,
                'maquina_id' => 19,
                'created_at' => Carbon::create('2025-01-25 14:00:00'),
                'updated_at' => Carbon::create('2025-01-25 14:00:00'),
                'deleted_at' => null
            ],
            // Incidencias para Taller Mecánico 3
            [
                'titulo' => 'Fuga de aceite',
                'descripcion' => 'La prensa hidráulica tiene una fuga de aceite',
                'abierta' => false,
                'gravedad' => 'Aviso',
                'categoria_id' => 3,
                'operario_id' => 5,
                'maquina_id' => 20,
                'created_at' => Carbon::create('2025-01-26 09:00:00'),
                'updated_at' => Carbon::create('2025-01-26 09:00:00'),
                'deleted_at' => null
            ],
            [
                'titulo' => 'Problemas con el gas',
                'descripcion' => 'El equipo MIG/MAG tiene problemas con el flujo de gas',
                'abierta' => true,
                'gravedad' => 'Sí funciona',
                'categoria_id' => 2,
                'operario_id' => 2,
                'maquina_id' => 21,
                'created_at' => Carbon::create('2025-01-26 09:10:00'),
                'updated_at' => Carbon::create('2025-01-26 09:10:00'),
                'deleted_at' => null
            ],
            [
                'titulo' => 'Hilo de soldadura atascado',
                'descripcion' => 'El hilo de soldadura se atasca en el equipo MIG/MAG',
                'abierta' => true,
                'gravedad' => 'No funciona',
                'categoria_id' => 1,
                'operario_id' => 3,
                'maquina_id' => 21,
                'created_at' => Carbon::create('2025-01-26 09:29:00'),
                'updated_at' => Carbon::create('2025-01-26 09:29:00'),
                'deleted_at' => null
            ],
            [
                'titulo' => 'Problema con el cebado',
                'descripcion' => 'El equipo TIG tiene problemas con el cebado del arco',
                'abierta' => true,
                'gravedad' => 'Aviso',
                'categoria_id' => 3,
                'operario_id' => 4,
                'maquina_id' => 22,
                'created_at' => Carbon::create('2025-01-26 09:54:00'),
                'updated_at' => Carbon::create('2025-01-26 09:54:00'),
                'deleted_at' => null
            ],
            [
                'titulo' => 'Desgaste en muela',
                'descripcion' => 'La muela de la esmeriladora de banco está desgastada',
                'abierta' => true,
                'gravedad' => 'Sí funciona',
                'categoria_id' => 2,
                'operario_id' => 1,
                'maquina_id' => 23,
                'created_at' => Carbon::create('2025-01-26 10:00:00'),
                'updated_at' => Carbon::create('2025-01-26 10:00:00'),
                'deleted_at' => null
            ],
            [
                'titulo' => 'Vibración excesiva en esmeriladora',
                'descripcion' => 'La esmeriladora de banco vibra mucho al encender',
                'abierta' => true,
                'gravedad' => 'No funciona',
                'categoria_id' => 1,
                'operario_id' => 2,
                'maquina_id' => 23,
                'created_at' => Carbon::create('2025-01-26 11:00:00'),
                'updated_at' => Carbon::create('2025-01-26 11:00:00'),
                'deleted_at' => null
            ],
        ]);
    }
}
