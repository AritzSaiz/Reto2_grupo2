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
        // TODO : Corregir / Acabar seeders (poner más de 1 incidencia por máquina, fechas de creación diferentes y algunos deletes {con 'cerrado'} rellenos)

        DB::table('incidencias')->insert([
            // Incidencias para Taller Mecánico 1
            [ 'titulo' => 'Vibración excesiva en torno', 'descripcion' => 'El torno paralelo vibra mucho al girar, hace ruido inusual', 'abierta' => true, 'gravedad' => 'Sí funciona', 'categoria_id' => 2, 'operario_id' => 2, 'maquina_id' => 1001, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null ],
            [ 'titulo' => 'Avanzado de la fresadora atascado', 'descripcion' => 'El movimiento del eje X de la fresadora se ha quedado atascado.', 'abierta' => true, 'gravedad' => 'Aviso', 'categoria_id' => 3, 'operario_id' => 3, 'maquina_id' => 1002, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null ],
            [ 'titulo' => 'Broca del taladro descentrada', 'descripcion' => 'La broca del taladro de banco está descentrada y hace agujeros irregulares.', 'abierta' => true, 'gravedad' => 'Mantenimiento preventivo', 'categoria_id' => 7, 'operario_id' => 1, 'maquina_id' => 1003, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null ],
            [ 'titulo' => 'Poca precisión en rectificadora', 'descripcion' => 'La rectificadora no está produciendo acabados con la precisión requerida.', 'abierta' => true, 'gravedad' => 'Sí funciona', 'categoria_id' => 3, 'operario_id' => 4, 'maquina_id' => 1004, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null ],
            [ 'titulo' => 'La sierra no corta recto', 'descripcion' => 'La sierra de cinta se desvía al cortar y no genera cortes rectos.', 'abierta' => true, 'gravedad' => 'Aviso', 'categoria_id' => 2, 'operario_id' => 2, 'maquina_id' => 1005, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null ],

            // Incidencias para Taller Aurrera XXI
            [ 'titulo' => 'Extrusor de la impresora 3D obstruido', 'descripcion' => 'El extrusor de la impresora 3D está obstruido y no sale el filamento.', 'abierta' => true, 'gravedad' => 'Aviso', 'categoria_id' => 1, 'operario_id' => 3, 'maquina_id' => 1006, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null ],
            [ 'titulo' => 'Láser de la cortadora sin potencia', 'descripcion' => 'La cortadora láser no está cortando el material, el láser parece débil.', 'abierta' => true, 'gravedad' => 'No funciona', 'categoria_id' => 1, 'operario_id' => 4, 'maquina_id' => 1007, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null ],
            [ 'titulo' => 'Scanner 3D no se conecta', 'descripcion' => 'El scanner 3D no se conecta al ordenador, problemas de comunicación.', 'abierta' => true, 'gravedad' => 'Mantenimiento preventivo', 'categoria_id' => 7, 'operario_id' => 2, 'maquina_id' => 1008, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null ],
            [ 'titulo' => 'Estación de soldado no calienta', 'descripcion' => 'La estación de soldado SMD no está calentando adecuadamente.', 'abierta' => true, 'gravedad' => 'Aviso', 'categoria_id' => 1, 'operario_id' => 1, 'maquina_id' => 1009, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null ],
            [ 'titulo' => 'Brazo robotico no responde', 'descripcion' => 'El brazo robótico colaborativo no está respondiendo a los comandos.', 'abierta' => true, 'gravedad' => 'No funciona', 'categoria_id' => 4, 'operario_id' => 3, 'maquina_id' => 1010, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null ],

            // Incidencias para Taller Mecánico 2
            [ 'titulo' => 'Parada de emergencia del torno CNC', 'descripcion' => 'El torno CNC se ha parado de emergencia durante el mecanizado', 'abierta' => true, 'gravedad' => 'No funciona', 'categoria_id' => 1, 'operario_id' => 2, 'maquina_id' => 1011, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null ],
            [ 'titulo' => 'Error en el programa de la fresadora CNC', 'descripcion' => 'La fresadora CNC muestra un error en el programa y se detiene.', 'abierta' => true, 'gravedad' => 'Aviso', 'categoria_id' => 4, 'operario_id' => 4, 'maquina_id' => 1012, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null ],
            [ 'titulo' => 'Taladro radial no baja', 'descripcion' => 'El taladro radial no baja cuando se acciona la palanca', 'abierta' => true, 'gravedad' => 'Aviso', 'categoria_id' => 2, 'operario_id' => 1, 'maquina_id' => 1013, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null ],
            [ 'titulo' => 'Problema con la electroerosión', 'descripcion' => 'La máquina de electroerosión no está produciendo el acabado esperado.', 'abierta' => true, 'gravedad' => 'Mantenimiento preventivo', 'categoria_id' => 7, 'operario_id' => 3, 'maquina_id' => 1014, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null ],
            [ 'titulo' => 'Afiladora no arranca', 'descripcion' => 'La afiladora de herramientas no enciende.', 'abierta' => true, 'gravedad' => 'No funciona', 'categoria_id' => 1, 'operario_id' => 2, 'maquina_id' => 1015, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null ],

            // Incidencias para Taller Control Numérico (5014)
            [ 'titulo' => 'Error en el centro de mecanizado', 'descripcion' => 'El centro de mecanizado CNC muestra error de software', 'abierta' => true, 'gravedad' => 'Mantenimiento preventivo', 'categoria_id' => 7, 'operario_id' => 3, 'maquina_id' => 1016, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null ],
            [ 'titulo' => 'Torno de 5 ejes no calibra', 'descripcion' => 'El torno CNC de 5 ejes no realiza la calibración de manera correcta.', 'abierta' => true, 'gravedad' => 'No funciona', 'categoria_id' => 3, 'operario_id' => 4, 'maquina_id' => 1017, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null ],
            [ 'titulo' => 'El router CNC no sigue la trayectoria', 'descripcion' => 'El router CNC se desvía al realizar los cortes.', 'abierta' => true, 'gravedad' => 'Aviso', 'categoria_id' => 2, 'operario_id' => 1, 'maquina_id' => 1018, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null ],
            [ 'titulo' => 'Simulador CNC con licencia caducada', 'descripcion' => 'El software de simulación CNC indica que la licencia ha caducado', 'abierta' => true, 'gravedad' => 'Mantenimiento preventivo', 'categoria_id' => 7, 'operario_id' => 2, 'maquina_id' => 1019, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null ],

            // Incidencias para Taller Mecánico 3
            [ 'titulo' => 'Prensa hidráulica no genera presión', 'descripcion' => 'La prensa hidráulica no está generando la presión adecuada.', 'abierta' => true, 'gravedad' => 'Aviso', 'categoria_id' => 1, 'operario_id' => 3, 'maquina_id' => 1020, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null ],
            [ 'titulo' => 'Soldadora MIG/MAG irregular', 'descripcion' => 'La soldadora MIG/MAG tiene un arco irregular y no suelda bien.', 'abierta' => true, 'gravedad' => 'Aviso', 'categoria_id' => 2, 'operario_id' => 4, 'maquina_id' => 1021, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null ],
            [ 'titulo' => 'Soldadora TIG sin gas protector', 'descripcion' => 'La soldadora TIG parece no tener gas protector', 'abierta' => true, 'gravedad' => 'Mantenimiento preventivo', 'categoria_id' => 7, 'operario_id' => 1, 'maquina_id' => 1022, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null ],
            [ 'titulo' => 'Esmeriladora con ruido extraño', 'descripcion' => 'La esmeriladora de banco hace un ruido inusual.', 'abierta' => true, 'gravedad' => 'Sí funciona', 'categoria_id' => 2, 'operario_id' => 2, 'maquina_id' => 1023, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null ],

            // Incidencias para Laboratorio de Electricidad
            [ 'titulo' => 'Fuente regulable sin voltaje', 'descripcion' => 'La fuente de alimentación regulable no está dando voltaje de salida.', 'abierta' => true, 'gravedad' => 'No funciona', 'categoria_id' => 1, 'operario_id' => 4, 'maquina_id' => 1024, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null ],
            [ 'titulo' => 'Multímetro con lectura errática', 'descripcion' => 'El multímetro digital muestra lecturas erráticas.', 'abierta' => true, 'gravedad' => 'Aviso', 'categoria_id' => 3, 'operario_id' => 3, 'maquina_id' => 1025, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null ],
            [ 'titulo' => 'Osciloscopio no muestra señal', 'descripcion' => 'El osciloscopio digital no muestra la señal en la pantalla.', 'abierta' => true, 'gravedad' => 'Aviso', 'categoria_id' => 3, 'operario_id' => 1, 'maquina_id' => 1026, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null ],

            // Incidencias para Taller de Electrónica
            [ 'titulo' => 'Estación de soldadura sin control', 'descripcion' => 'La estación de soldadura no mantiene la temperatura establecida.', 'abierta' => true, 'gravedad' => 'Mantenimiento preventivo', 'categoria_id' => 7, 'operario_id' => 3, 'maquina_id' => 1027, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null ],
            [ 'titulo' => 'Analizador Lógico sin conexión', 'descripcion' => 'El analizador lógico no se conecta con el dispositivo a analizar.', 'abierta' => true, 'gravedad' => 'Aviso', 'categoria_id' => 4, 'operario_id' => 4, 'maquina_id' => 1028, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null ],
            [ 'titulo' => 'Generador de funciones sin señal', 'descripcion' => 'El generador de funciones no está emitiendo ninguna señal.', 'abierta' => true, 'gravedad' => 'Aviso', 'categoria_id' => 1, 'operario_id' => 1, 'maquina_id' => 1029, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null ],
            [ 'titulo' => 'Protoboard con conexión defectuosa', 'descripcion' => 'La protoboard tiene conexiones defectuosas y no cierra los circuitos.', 'abierta' => true, 'gravedad' => 'Sí funciona', 'categoria_id' => 2, 'operario_id' => 2, 'maquina_id' => 1030, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => null ],


            /*
            [
                'titulo' => 'Problema de arranque del torno',
                'descripcion' => 'El torno no arranca y aparece "Error" en la pantalla lateral informativa.',
                'abierta' => true,
                'gravedad' => 'No funciona',
                'categoria_id' => 1,
                'operario_id' => 1,
                'maquina_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'titulo' => 'Fallo en el eje Z de la fresadora',
                'descripcion' => 'El eje Z de la fresadora ha dado un fallo y no sé por qué.',
                'abierta' => true,
                'gravedad' => 'No funciona',
                'categoria_id' => 2,
                'operario_id' => 2,
                'maquina_id' => 2,
                'created_at' => Carbon::create('2025-01-25 9:00:00'),
                'updated_at' => Carbon::create('2025-01-25 9:00:00'),
                'deleted_at' => null,
            ],
            [
                'titulo' => 'Base de impresora 3D no calienta',
                'descripcion' => 'A la impresora 3D no se le calienta la base por motivo desconocido.',
                'abierta' => true,
                'gravedad' => 'Sí funciona',
                'categoria_id' => 1,
                'operario_id' => 3,
                'maquina_id' => 3,
                'created_at' => Carbon::create('2025-01-26 9:00:00'),
                'updated_at' => Carbon::create('2025-01-26 9:00:00'),
                'deleted_at' => null,
            ],
            [
                'titulo' => 'Cortador láser no enciende',
                'descripcion' => 'El cortador láser no enciende desde esta mañana.',
                'abierta' => true,
                'gravedad' => 'No funciona',
                'categoria_id' => 2,
                'operario_id' => 1,
                'maquina_id' => 4,
                'created_at' => Carbon::create('2025-01-27 9:00:00'),
                'updated_at' => Carbon::create('2025-01-27 9:00:00'),
                'deleted_at' => null,
            ],
            [
                'titulo' => 'PC se reinicia constantemente',
                'descripcion' => 'El PC se reinicia constantemente sin haber lanzado ningún comando.',
                'abierta' => true,
                'gravedad' => 'Aviso',
                'categoria_id' => 3,
                'operario_id' => 2,
                'maquina_id' => 1,
                'created_at' => Carbon::create('2025-01-27 12:00:00'),
                'updated_at' => Carbon::create('2025-01-27 12:00:00'),
                'deleted_at' => null,
            ],
            [
                'titulo' => 'Mal estado en estantería',
                'descripcion' => 'Estantería en mal estado, una balda se tambalea.',
                'abierta' => false,
                'gravedad' => 'Aviso',
                'categoria_id' => 3,
                'operario_id' => 3,
                'maquina_id' => 2,
                'created_at' => Carbon::create('2025-01-27 13:00:00'),
                'updated_at' => Carbon::create('2025-01-27 13:00:00'),
                'deleted_at' => null,
            ],
            [
                'titulo' => 'PC no enciende',
                'descripcion' => 'El PC no se enciende ni da señales de actividad.',
                'abierta' => false,
                'gravedad' => 'No funciona',
                'categoria_id' => 3,
                'operario_id' => 4,
                'maquina_id' => 3,
                'created_at' => Carbon::create('2025-01-20 10:00:00'),
                'updated_at' => Carbon::create('2025-01-20 10:00:00'),
                'deleted_at' => null,
            ],
            [
                'titulo' => 'Taladradora sin potencia',
                'descripcion' => 'La taladradora no tiene potencia y funciona despacio.',
                'abierta' => false,
                'gravedad' => 'Aviso',
                'categoria_id' => 4,
                'operario_id' => 4,
                'maquina_id' => 4,
                'created_at' => Carbon::create('2025-01-10 10:00:00'),
                'updated_at' => Carbon::create('2025-01-10 10:00:00'),
                'deleted_at' => null,
            ],
            [
                'titulo' => 'Sierra no corta recto',
                'descripcion' => 'La sierra no corta recto y se desvía en las placas finas de madera.',
                'abierta' => false,
                'gravedad' => 'Sí funciona',
                'categoria_id' => 7,
                'operario_id' => 4,
                'maquina_id' => 5,
                'created_at' => Carbon::create('2025-01-10 9:00:00'),
                'updated_at' => Carbon::create('2025-01-10 9:00:00'),
                'deleted_at' => null,
            ],
            [
                'titulo' => 'Router sin conexión a red',
                'descripcion' => 'Router no se conecta a la red',
                'abierta' => false,
                'gravedad' => 'Aviso',
                'categoria_id' => 5,
                'operario_id' => 4,
                'maquina_id' => 5,
                'created_at' => Carbon::create('2025-01-25 10:00:00'),
                'updated_at' => Carbon::create('2025-01-25 10:00:00'),
                'deleted_at' => Carbon::create('2025-01-25 19:00:00'),
            ],
            [
                'titulo' => 'Limpieza General',
                'descripcion' => 'Limpieza rutinaria de la máquina',
                'abierta' => true,
                'gravedad' => 'Mantenimiento preventivo',
                'categoria_id' => 7,
                'operario_id' => null,
                'maquina_id' => 1,
                'created_at' => Carbon::create('2025-01-15 9:00:00'),
                'updated_at' => Carbon::create('2025-01-15 9:00:00'),
                'deleted_at' => null,
            ]
            */

        ]);
    }
}
