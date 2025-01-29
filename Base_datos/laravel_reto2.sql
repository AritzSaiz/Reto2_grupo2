-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 29-01-2025 a las 16:50:35
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laravel_reto2`
--
CREATE DATABASE IF NOT EXISTS `laravel_reto2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `laravel_reto2`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--
-- Creación: 25-01-2025 a las 11:12:52
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `cache`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--
-- Creación: 25-01-2025 a las 11:12:52
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `cache_locks`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campus`
--
-- Creación: 25-01-2025 a las 11:12:52
-- Última actualización: 29-01-2025 a las 15:49:45
--

DROP TABLE IF EXISTS `campus`;
CREATE TABLE `campus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(3) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `codigo_postal` varchar(5) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `campus`:
--

--
-- Volcado de datos para la tabla `campus`
--

INSERT INTO `campus` (`id`, `codigo`, `nombre`, `direccion`, `codigo_postal`, `telefono`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '01', 'Arriaga', 'C/ Pozoa s/n', '01013', '945010110', 'arriaga@egibide.org', '2025-01-29 15:49:45', '2025-01-29 15:49:45', NULL),
(2, '02', 'Mendizorroza', 'Plaza Amadeo García Salazar, 2 (Frontones)', '01007', '945010140', 'mendizorrotza@egibide.org', '2025-01-29 15:49:45', '2025-01-29 15:49:45', NULL),
(3, '03', 'Molinuevo', 'C/ San Ignacio, 6', '01001', '945010120', 'molinuevo@egibide.org', '2025-01-29 15:49:45', '2025-01-29 15:49:45', NULL),
(4, '04', 'Nieves Cano', 'C/ Nieves Cano, 10', '01006', '945010130', 'nievescano@egibide.org', '2025-01-29 15:49:45', '2025-01-29 15:49:45', NULL),
(5, '05', 'Jesús Obrero', 'C/ Francia, 32', '01002', '945000333', 'jesusobrero@egibide.org', '2025-01-29 15:49:45', '2025-01-29 15:49:45', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--
-- Creación: 25-01-2025 a las 11:12:52
-- Última actualización: 29-01-2025 a las 15:49:49
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `categorias`:
--

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mecánica', '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(2, 'Eléctrica', '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(3, 'Neumática', '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(4, 'Hidráulica', '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(5, 'Informática', '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(6, 'Instalaciones generales', '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(7, 'Otra', '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--
-- Creación: 25-01-2025 a las 11:12:52
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `failed_jobs`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historiales`
--
-- Creación: 25-01-2025 a las 12:46:22
-- Última actualización: 29-01-2025 a las 15:49:49
--

DROP TABLE IF EXISTS `historiales`;
CREATE TABLE `historiales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `incidencia_id` bigint(20) UNSIGNED NOT NULL,
  `tecnico_id` bigint(20) UNSIGNED NOT NULL,
  `entrada` datetime NOT NULL,
  `salida` datetime DEFAULT NULL,
  `detalles_trabajo` varchar(300) DEFAULT NULL,
  `justificacion_salida` varchar(300) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `historiales`:
--   `incidencia_id`
--       `incidencias` -> `id`
--   `tecnico_id`
--       `tecnicos` -> `id`
--

--
-- Volcado de datos para la tabla `historiales`
--

INSERT INTO `historiales` (`id`, `incidencia_id`, `tecnico_id`, `entrada`, `salida`, `detalles_trabajo`, `justificacion_salida`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 5, 1, '2025-01-24 11:45:00', NULL, NULL, NULL, '2025-01-24 10:45:00', '2025-01-24 10:45:00', NULL),
(2, 5, 1, '2025-01-24 11:45:00', '2025-01-24 12:15:00', 'Hice la inspección inicial e intenté hacer la extracción manual.', 'Me tuve que ir por un asunto médico.', '2025-01-24 11:15:00', '2025-01-24 11:15:00', NULL),
(3, 5, 2, '2025-01-22 12:20:00', NULL, NULL, NULL, '2025-01-22 11:20:00', '2025-01-22 11:20:00', NULL),
(4, 5, 2, '2025-01-22 12:20:00', '2025-01-22 12:40:00', 'Realicé el desmontaje del portabrocas, la revisión, limpieza, reinstalación y prueba.', 'Incidencia resuelta con éxito.', '2025-01-22 11:40:00', '2025-01-22 11:40:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--
-- Creación: 25-01-2025 a las 12:46:22
-- Última actualización: 29-01-2025 a las 15:49:49
--

DROP TABLE IF EXISTS `incidencias`;
CREATE TABLE `incidencias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `abierta` tinyint(1) NOT NULL DEFAULT 1,
  `gravedad` varchar(255) NOT NULL,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `operario_id` bigint(20) UNSIGNED DEFAULT NULL,
  `maquina_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ;

--
-- RELACIONES PARA LA TABLA `incidencias`:
--   `categoria_id`
--       `categorias` -> `id`
--   `maquina_id`
--       `maquinas` -> `id`
--   `operario_id`
--       `operarios` -> `id`
--

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`id`, `titulo`, `descripcion`, `abierta`, `gravedad`, `categoria_id`, `operario_id`, `maquina_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Vibración excesiva en torno', 'El torno paralelo vibra mucho al girar, hace ruido inusual', 1, 'Sí funciona', 2, 2, 1, '2025-01-20 09:00:00', '2025-01-20 09:00:00', NULL),
(2, 'Parada por sobrecalentamiento', 'El torno se detuvo por sobrecalentamiento, necesita revisión', 1, 'No funciona', 1, 3, 1, '2025-01-21 13:30:00', '2025-01-21 13:30:00', NULL),
(3, 'Ruido inusual en la fresadora', 'La fresadora universal hace un ruido extraño al trabajar', 1, 'Aviso', 3, 4, 2, '2025-01-22 07:15:00', '2025-01-22 07:15:00', '2025-01-23 08:00:00'),
(4, 'Limpieza General', 'Limpieza rutinaria de la máquina', 1, 'Mantenimiento preventivo', 7, 5, 2, '2025-01-23 15:00:00', '2025-01-23 15:00:00', NULL),
(5, 'Broca atascada', 'La broca se atascó en el taladro de banco', 0, 'Sí funciona', 2, 1, 3, '2025-01-24 10:45:00', '2025-01-24 10:45:00', NULL),
(6, 'Ajuste de Componentes', 'Revisión y ajuste de tornillos y piezas', 0, 'Mantenimiento preventivo', 7, 2, 3, '2025-01-25 09:00:00', '2025-01-25 09:00:00', NULL),
(7, 'Desgaste en la muela', 'La muela de la rectificadora necesita ser reemplazada', 1, 'Aviso', 3, 3, 4, '2025-01-26 12:20:00', '2025-01-26 12:20:00', NULL),
(8, 'Problema con el refrigerante', 'El sistema de refrigeración de la rectificadora no funciona correctamente', 1, 'Sí funciona', 2, 4, 4, '2025-01-27 08:00:00', '2025-01-27 08:00:00', '2025-01-28 10:00:00'),
(9, 'Atasco en la sierra', 'La sierra de cinta se atascó al cortar un material', 1, 'No funciona', 1, 5, 5, '2025-01-28 14:40:00', '2025-01-28 14:40:00', NULL),
(10, 'Problema con la extrusión', 'La impresora 3D tiene problemas con la extrusión de filamento', 0, 'Sí funciona', 2, 2, 6, '2025-01-25 10:00:00', '2025-01-25 10:00:00', NULL),
(11, 'Actualización Software', 'Actualización del software de la máquina', 0, 'Mantenimiento preventivo', 7, 3, 6, '2025-01-25 10:30:00', '2025-01-25 10:30:00', NULL),
(12, 'Lente sucia', 'La cortadora láser tiene la lente sucia y no corta bien', 1, 'Aviso', 3, 4, 7, '2025-01-25 10:40:00', '2025-01-25 10:40:00', NULL),
(13, 'Alineación láser', 'El láser de la cortadora necesita ser realineado', 1, 'No funciona', 1, 5, 7, '2025-01-25 11:00:00', '2025-01-25 11:00:00', NULL),
(14, 'Problema de calibración', 'El escáner 3D no está calibrando correctamente', 1, 'Sí funciona', 2, 1, 8, '2025-01-25 11:00:00', '2025-01-25 11:00:00', NULL),
(15, 'Actualización Software', 'Actualización del software de la máquina', 0, 'Mantenimiento preventivo', 7, 2, 8, '2025-01-25 11:10:00', '2025-01-25 11:10:00', NULL),
(16, 'Punta de soldadura deteriorada', 'La punta de la estación de soldadura necesita ser reemplazada', 1, 'Aviso', 3, 3, 9, '2025-01-25 11:15:00', '2025-01-25 11:15:00', NULL),
(17, 'Fallo en el calentamiento', 'La estación de soldadura no calienta correctamente', 1, 'No funciona', 1, 4, 9, '2025-01-25 11:20:00', '2025-01-25 11:20:00', '2025-02-07 11:00:00'),
(18, 'Movimiento errático del brazo', 'El brazo robótico tiene movimientos erráticos y necesita revisión', 1, 'Sí funciona', 2, 5, 10, '2025-01-25 11:25:00', '2025-01-25 11:25:00', NULL),
(19, 'Revisión Eléctrica', 'Revisión de los cables y conexiones eléctricas', 1, 'Mantenimiento preventivo', 7, 1, 10, '2025-01-25 11:30:00', '2025-01-25 11:30:00', NULL),
(20, 'Error en el programa CNC', 'El torno CNC muestra un error al cargar el programa', 1, 'No funciona', 1, 2, 11, '2025-01-25 11:35:00', '2025-01-25 11:35:00', NULL),
(21, 'Vibración excesiva en fresado', 'La fresadora CNC vibra demasiado al hacer cortes', 0, 'Sí funciona', 2, 4, 12, '2025-01-25 11:40:00', '2025-01-25 11:40:00', NULL),
(22, 'Problema con el sistema de refrigeración', 'El sistema de refrigeración de la fresadora no funciona', 1, 'No funciona', 1, 5, 13, '2025-01-25 11:45:00', '2025-01-25 11:45:00', NULL),
(23, 'Ruido anormal en taladro', 'El taladro radial emite un ruido anormal durante el uso', 1, 'Aviso', 3, 1, 13, '2025-01-25 11:50:00', '2025-01-25 11:50:00', NULL),
(24, 'Ajuste de Componentes', 'Revisión y ajuste de tornillos y piezas', 1, 'Mantenimiento preventivo', 7, 2, 13, '2025-01-25 12:20:00', '2025-01-25 12:20:00', NULL),
(25, 'Electrodo desgastado', 'El electrodo de la máquina de electroerosión necesita ser cambiado', 0, 'Sí funciona', 2, 3, 14, '2025-01-25 12:20:00', '2025-01-25 12:20:00', NULL),
(26, 'Error en la configuración de la máquina', 'La máquina de electroerosión muestra un error de configuración', 1, 'No funciona', 1, 4, 14, '2025-01-25 12:30:00', '2025-01-25 12:30:00', NULL),
(27, 'Muela de afilado desgastada', 'La muela de la afiladora necesita ser reemplazada', 1, 'Aviso', 3, 5, 15, '2025-01-25 12:40:00', '2025-01-25 12:40:00', NULL),
(28, 'Error de comunicación CNC', 'El centro de mecanizado muestra un error de comunicación', 0, 'No funciona', 1, 2, 16, '2025-01-25 12:45:00', '2025-01-25 12:45:00', NULL),
(29, 'Calibración', 'Calibración de la máquina', 1, 'Mantenimiento preventivo', 7, 3, 16, '2025-01-25 12:48:00', '2025-01-25 12:48:00', NULL),
(30, 'Problema con el eje', 'El torno CNC de 5 ejes tiene problemas de movimiento en un eje', 1, 'Sí funciona', 2, 4, 17, '2025-01-25 12:50:00', '2025-01-25 12:50:00', NULL),
(31, 'Error en el sistema de lubricación', 'El sistema de lubricación del torno no funciona', 0, 'No funciona', 1, 5, 17, '2025-01-25 12:52:00', '2025-01-25 12:52:00', NULL),
(32, 'Motor del router lento', 'El motor del router CNC está funcionando más lento de lo normal', 1, 'Aviso', 3, 1, 18, '2025-01-25 12:54:00', '2025-01-25 12:54:00', NULL),
(33, 'Revisión Eléctrica', 'Revisión de los cables y conexiones eléctricas', 1, 'Mantenimiento preventivo', 7, 2, 18, '2025-01-25 12:56:00', '2025-01-25 12:56:00', NULL),
(34, 'Problema de licencia', 'El software de simulación CNC muestra un problema de licencia', 1, 'Sí funciona', 2, 3, 19, '2025-01-25 12:58:00', '2025-01-25 12:58:00', NULL),
(35, 'Fallo en la renderización', 'El software de simulación CNC no renderiza correctamente', 0, 'No funciona', 1, 4, 19, '2025-01-25 13:00:00', '2025-01-25 13:00:00', NULL),
(36, 'Fuga de aceite', 'La prensa hidráulica tiene una fuga de aceite', 0, 'Aviso', 3, 5, 20, '2025-01-26 08:00:00', '2025-01-26 08:00:00', NULL),
(37, 'Problemas con el gas', 'El equipo MIG/MAG tiene problemas con el flujo de gas', 1, 'Sí funciona', 2, 2, 21, '2025-01-26 08:10:00', '2025-01-26 08:10:00', NULL),
(38, 'Hilo de soldadura atascado', 'El hilo de soldadura se atasca en el equipo MIG/MAG', 1, 'No funciona', 1, 3, 21, '2025-01-26 08:29:00', '2025-01-26 08:29:00', NULL),
(39, 'Problema con el cebado', 'El equipo TIG tiene problemas con el cebado del arco', 1, 'Aviso', 3, 4, 22, '2025-01-26 08:54:00', '2025-01-26 08:54:00', NULL),
(40, 'Desgaste en muela', 'La muela de la esmeriladora de banco está desgastada', 1, 'Sí funciona', 2, 1, 23, '2025-01-26 09:00:00', '2025-01-26 09:00:00', NULL),
(41, 'Vibración excesiva en esmeriladora', 'La esmeriladora de banco vibra mucho al encender', 1, 'No funciona', 1, 2, 23, '2025-01-26 10:00:00', '2025-01-26 10:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--
-- Creación: 25-01-2025 a las 11:12:52
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `jobs`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--
-- Creación: 25-01-2025 a las 11:12:52
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `job_batches`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimientos_maquinas`
--
-- Creación: 25-01-2025 a las 11:12:52
-- Última actualización: 29-01-2025 a las 15:49:49
--

DROP TABLE IF EXISTS `mantenimientos_maquinas`;
CREATE TABLE `mantenimientos_maquinas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mantenimiento_id` bigint(20) UNSIGNED NOT NULL,
  `maquina_id` bigint(20) UNSIGNED NOT NULL,
  `ultima_revision` datetime NOT NULL,
  `siguiente_revision` datetime NOT NULL,
  `incidencia_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ;

--
-- RELACIONES PARA LA TABLA `mantenimientos_maquinas`:
--   `incidencia_id`
--       `incidencias` -> `id`
--   `mantenimiento_id`
--       `mantenimientos_preventivos` -> `id`
--   `maquina_id`
--       `maquinas` -> `id`
--

--
-- Volcado de datos para la tabla `mantenimientos_maquinas`
--

INSERT INTO `mantenimientos_maquinas` (`id`, `mantenimiento_id`, `maquina_id`, `ultima_revision`, `siguiente_revision`, `incidencia_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, '2025-01-23 16:00:01', '2025-02-23 16:00:01', 4, '2025-01-23 15:00:01', '2025-01-23 15:00:01', NULL),
(2, 3, 3, '2025-01-25 10:00:01', '2025-04-25 10:00:01', 6, '2025-01-25 09:00:01', '2025-01-25 09:00:01', NULL),
(3, 6, 6, '2025-01-25 11:30:01', '2025-07-24 11:30:01', 6, '2025-01-25 10:30:01', '2025-01-25 10:30:01', NULL),
(4, 6, 8, '2025-01-25 12:10:01', '2025-07-24 12:10:01', 10, '2025-01-25 11:10:01', '2025-01-25 11:10:01', NULL),
(5, 5, 10, '2025-01-25 12:30:01', '2025-05-25 12:30:01', 14, '2025-01-25 11:30:01', '2025-01-25 11:30:01', NULL),
(6, 3, 13, '2025-01-25 13:20:01', '2025-04-25 13:20:01', 19, '2025-01-25 12:20:01', '2025-01-25 12:20:01', NULL),
(7, 4, 16, '2025-01-25 13:48:01', '2025-05-25 13:48:01', 24, '2025-01-25 12:48:01', '2025-01-25 12:48:01', NULL),
(8, 5, 18, '2025-01-25 13:56:01', '2025-05-25 13:56:01', 28, '2025-01-25 12:56:01', '2025-01-25 12:56:01', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimientos_preventivos`
--
-- Creación: 25-01-2025 a las 11:12:52
-- Última actualización: 29-01-2025 a las 15:49:49
--

DROP TABLE IF EXISTS `mantenimientos_preventivos`;
CREATE TABLE `mantenimientos_preventivos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `dias` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `mantenimientos_preventivos`:
--

--
-- Volcado de datos para la tabla `mantenimientos_preventivos`
--

INSERT INTO `mantenimientos_preventivos` (`id`, `titulo`, `descripcion`, `dias`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Limpieza General', 'Limpieza rutinaria de la máquina', 30, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(2, 'Engrasado', 'Engrasado de las partes móviles', 60, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(3, 'Ajuste de Componentes', 'Revisión y ajuste de tornillos y piezas', 90, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(4, 'Calibración', 'Calibración de la máquina', 120, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(5, 'Revisión Eléctrica', 'Revisión de los cables y conexiones eléctricas', 120, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(6, 'Actualización Software', 'Actualización del software de la máquina', 180, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(7, 'Revisión Neumática', 'Revisión de los elementos neumáticos de la máquina', 180, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinas`
--
-- Creación: 25-01-2025 a las 11:12:52
-- Última actualización: 29-01-2025 a las 15:49:49
--

DROP TABLE IF EXISTS `maquinas`;
CREATE TABLE `maquinas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `modelo` varchar(60) NOT NULL,
  `prioridad` char(1) NOT NULL,
  `seccion_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ;

--
-- RELACIONES PARA LA TABLA `maquinas`:
--   `seccion_id`
--       `secciones` -> `id`
--

--
-- Volcado de datos para la tabla `maquinas`
--

INSERT INTO `maquinas` (`id`, `codigo`, `nombre`, `modelo`, `prioridad`, `seccion_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1001, 'Torno Paralelo', 'TP-1500', '2', 1, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(2, 1002, 'Fresadora Universal', 'FU-2000', '2', 1, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(3, 1003, 'Taladro de Banco', 'TB-500', '3', 1, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(4, 1004, 'Rectificadora de Superficies Planas', 'RSP-300', '3', 1, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(5, 1005, 'Sierra de Cinta', 'SC-400', '3', 1, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(6, 1006, 'Impresora 3D FDM', 'ID-300', '1', 2, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(7, 1007, 'Cortadora Láser CO2', 'CL-600', '1', 2, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(8, 1008, 'Scanner 3D', 'S3D-100', '2', 2, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(9, 1009, 'Estación de Soldadura SMD', 'ESS-400', '2', 2, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(10, 1010, 'Brazo Robotico Colaborativo', 'BRC-500', '1', 2, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(11, 1011, 'Torno CNC', 'TC-2500', '1', 3, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(12, 1012, 'Fresadora CNC', 'FC-3000', '1', 3, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(13, 1013, 'Taladro Radial', 'TR-1000', '2', 3, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(14, 1014, 'Máquina de Electroerosión', 'ME-200', '2', 3, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(15, 1015, 'Afiladora de Herramientas', 'AH-150', '3', 3, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(16, 1016, 'Centro de Mecanizado CNC', 'CM-4000', '1', 4, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(17, 1017, 'Torno CNC de 5 Ejes', 'T5E-100', '1', 4, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(18, 1018, 'Router CNC', 'RC-1500', '2', 4, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(19, 1019, 'Software de simulación CNC', 'SS-CNC', '2', 4, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(20, 1020, 'Prensa Hidráulica', 'PH-200', '3', 5, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(21, 1021, 'Equipo de Soldadura MIG/MAG', 'EMM-400', '2', 5, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(22, 1022, 'Equipo de Soldadura TIG', 'EST-200', '2', 5, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(23, 1023, 'Esmeriladora de Banco', 'EB-150', '3', 5, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(24, 1024, 'Fuente de Alimentación Regulable', 'FAR-500', '2', 6, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(25, 1025, 'Multímetro Digital', 'MD-100', '3', 6, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(26, 1026, 'Osciloscopio Digital', 'OD-200', '2', 6, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(27, 1027, 'Estación de Soldadura', 'ES-300', '2', 8, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(28, 1028, 'Analizador Lógico', 'AL-100', '2', 8, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(29, 1029, 'Generador de Funciones', 'GF-200', '3', 8, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(30, 1030, 'Protoboard', 'PB-100', '3', 8, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--
-- Creación: 25-01-2025 a las 11:12:52
-- Última actualización: 29-01-2025 a las 15:49:45
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `migrations`:
--

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_15_105500_create_campus_table', 1),
(5, '2025_01_15_105506_create_secciones_table', 1),
(6, '2025_01_15_105538_create_operarios_table', 1),
(7, '2025_01_15_105600_create_tecnicos_table', 1),
(8, '2025_01_15_105631_create_maquinas_table', 1),
(9, '2025_01_15_105640_create_categorias_table', 1),
(10, '2025_01_15_105645_create_mantenimientos_preventivos_table', 1),
(11, '2025_01_15_105648_create_incidencias_table', 1),
(12, '2025_01_15_105655_create_mantenimientos_maquinas_table', 1),
(13, '2025_01_15_105728_create_historiales_table', 1),
(14, '2025_01_20_192630_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operarios`
--
-- Creación: 25-01-2025 a las 11:12:52
-- Última actualización: 29-01-2025 a las 15:49:49
--

DROP TABLE IF EXISTS `operarios`;
CREATE TABLE `operarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `operarios`:
--

--
-- Volcado de datos para la tabla `operarios`
--

INSERT INTO `operarios` (`id`, `nombre`, `apellidos`, `email`, `usuario`, `contrasena`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Juan', 'Pérez López', 'juan.perez@egibide.org', 'jperez', '$2y$12$WJqT70JaL9bEx4o1BFF2IOfJZROMCZKUjELBa2zcXXrJDpmVyBiiK', '2025-01-29 15:49:46', '2025-01-29 15:49:46', NULL),
(2, 'María', 'González Díaz', 'maria.gonzalez@egibide.org', 'mgonzalez', '$2y$12$uoypBVMuLMbOhXBal51NkeLel4AXG/8rSResn5zr.TgfUtafMZgBS', '2025-01-29 15:49:46', '2025-01-29 15:49:46', NULL),
(3, 'Luis', 'Martínez Ruiz', 'luis.martinez@egibide.org', 'lmartinez', '$2y$12$LnoEX3YjWE1ArjslFrmME./zgQB7P/dt0NjHBoUtqYPAjqNI/Y58u', '2025-01-29 15:49:46', '2025-01-29 15:49:46', NULL),
(4, 'Ana', 'Hernández Gómez', 'ana.hernandez@ikasle.egibide.org', 'ahernandez', '$2y$12$ZcSCMJ9fO/uebwIYsTCj9.iriw3VCmbVQoUdv7xeHnTzoACd3HQB.', '2025-01-29 15:49:47', '2025-01-29 15:49:47', NULL),
(5, 'Paco', 'Sánchez Torres', 'paco.sanchez@ikasle.egibide.org', 'psanchez', '$2y$12$ViJ6XaTxO1n.BzCVFuI/9ejixNJP8nv80.Q3lAVvzE4pJUvoRf09u', '2025-01-29 15:49:47', '2025-01-29 15:49:47', NULL),
(6, 'Elena', 'Ruiz Martín', 'elena.ruiz@ikasle.egibide.org', 'eruiz', '$2y$12$eIQh5pAgmJMDk2LwHWzdfudXmZ6jgcJ/vc.HfAIYonkEe.YN8I66S', '2025-01-29 15:49:47', '2025-01-29 15:49:47', NULL),
(7, 'Carlos', 'García Pérez', 'carlos.garcia@egibide.org', 'cgarcia', '$2y$12$Rf9NkXmbFmDM0jN0oKA/netayYzSdzlrpZa1VRtS7WmaZEJegjX.m', '2025-01-29 15:49:48', '2025-01-29 15:49:48', NULL),
(8, 'Sofía', 'López Fernández', 'sofia.lopez@ikasle.egibide.org', 'slopez', '$2y$12$bllDEpscGYbOwb5Kz5Cp9eW.STKFibFb4NIxYJiufQq.H/LtPvl8C', '2025-01-29 15:49:48', '2025-01-29 15:49:48', NULL),
(9, 'David', 'Rodríguez Sánchez', 'david.rodriguez@egibide.org', 'drodriguez', '$2y$12$3Vfs0lcky6egSd/Xp6hQKOmxZ6XS7rymvTFWOrDW9HUICXufbcTpS', '2025-01-29 15:49:48', '2025-01-29 15:49:48', NULL),
(10, 'Isabel', 'Martín Gómez', 'isabel.martin@ikasle.egibide.org', 'imartin', '$2y$12$t3yVVXd8KP91f2GjRqB/uugNfOAnMEJdcVmgJfJdQAeWBxwrNailS', '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--
-- Creación: 25-01-2025 a las 11:12:52
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `password_reset_tokens`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--
-- Creación: 25-01-2025 a las 12:46:22
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `personal_access_tokens`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--
-- Creación: 25-01-2025 a las 11:12:52
-- Última actualización: 29-01-2025 a las 15:49:45
--

DROP TABLE IF EXISTS `secciones`;
CREATE TABLE `secciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `campus_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `secciones`:
--   `campus_id`
--       `campus` -> `id`
--

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id`, `codigo`, `nombre`, `campus_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '5010', 'Taller Mecánico 1  010', 1, '2025-01-29 15:49:45', '2025-01-29 15:49:45', NULL),
(2, '5011', 'Taller Aurrera XXI', 1, '2025-01-29 15:49:45', '2025-01-29 15:49:45', NULL),
(3, '5012', 'Taller Mecánico 2  012', 1, '2025-01-29 15:49:45', '2025-01-29 15:49:45', NULL),
(4, '5014', 'Taller Control Numérico 014', 2, '2025-01-29 15:49:45', '2025-01-29 15:49:45', NULL),
(5, '5017', 'Taller Mecánico 3  017', 2, '2025-01-29 15:49:45', '2025-01-29 15:49:45', NULL),
(6, '5018', 'Laboratorio de Electricidad 018', 2, '2025-01-29 15:49:45', '2025-01-29 15:49:45', NULL),
(7, '5019', 'Aula de Informática 019', 3, '2025-01-29 15:49:45', '2025-01-29 15:49:45', NULL),
(8, '5020', 'Taller de Electrónica 020', 3, '2025-01-29 15:49:45', '2025-01-29 15:49:45', NULL),
(9, '5021', 'Sala de Montaje 021', 3, '2025-01-29 15:49:45', '2025-01-29 15:49:45', NULL),
(10, '5022', 'Almacén de Herramientas 022', 5, '2025-01-29 15:49:45', '2025-01-29 15:49:45', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--
-- Creación: 25-01-2025 a las 11:12:52
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `sessions`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnicos`
--
-- Creación: 25-01-2025 a las 11:12:52
-- Última actualización: 29-01-2025 a las 15:49:49
--

DROP TABLE IF EXISTS `tecnicos`;
CREATE TABLE `tecnicos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `operario_id` bigint(20) UNSIGNED NOT NULL,
  `especialidad` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `tecnicos`:
--   `operario_id`
--       `operarios` -> `id`
--

--
-- Volcado de datos para la tabla `tecnicos`
--

INSERT INTO `tecnicos` (`id`, `operario_id`, `especialidad`, `admin`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Electricidad', 1, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(2, 2, 'Mecánica', 1, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(3, 5, 'Electrónica', 0, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(4, 6, 'Informática', 0, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL),
(5, 7, 'Mantenimiento', 0, '2025-01-29 15:49:49', '2025-01-29 15:49:49', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--
-- Creación: 25-01-2025 a las 11:12:52
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `users`:
--

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `historiales`
--
ALTER TABLE `historiales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historiales_incidencia_id_foreign` (`incidencia_id`),
  ADD KEY `historiales_tecnico_id_foreign` (`tecnico_id`);

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `incidencias_categoria_id_foreign` (`categoria_id`),
  ADD KEY `incidencias_operario_id_foreign` (`operario_id`),
  ADD KEY `incidencias_maquina_id_foreign` (`maquina_id`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mantenimientos_maquinas`
--
ALTER TABLE `mantenimientos_maquinas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mantenimientos_maquinas_mantenimiento_id_foreign` (`mantenimiento_id`),
  ADD KEY `mantenimientos_maquinas_maquina_id_foreign` (`maquina_id`),
  ADD KEY `mantenimientos_maquinas_incidencia_id_foreign` (`incidencia_id`);

--
-- Indices de la tabla `mantenimientos_preventivos`
--
ALTER TABLE `mantenimientos_preventivos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `maquinas_codigo_unique` (`codigo`),
  ADD KEY `maquinas_seccion_id_foreign` (`seccion_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `operarios`
--
ALTER TABLE `operarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `operarios_usuario_unique` (`usuario`),
  ADD KEY `index_login` (`usuario`,`contrasena`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `secciones_campus_id_foreign` (`campus_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tecnicos_operario_id_foreign` (`operario_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `campus`
--
ALTER TABLE `campus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historiales`
--
ALTER TABLE `historiales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mantenimientos_maquinas`
--
ALTER TABLE `mantenimientos_maquinas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mantenimientos_preventivos`
--
ALTER TABLE `mantenimientos_preventivos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `operarios`
--
ALTER TABLE `operarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historiales`
--
ALTER TABLE `historiales`
  ADD CONSTRAINT `historiales_incidencia_id_foreign` FOREIGN KEY (`incidencia_id`) REFERENCES `incidencias` (`id`),
  ADD CONSTRAINT `historiales_tecnico_id_foreign` FOREIGN KEY (`tecnico_id`) REFERENCES `tecnicos` (`id`);

--
-- Filtros para la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD CONSTRAINT `incidencias_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `incidencias_maquina_id_foreign` FOREIGN KEY (`maquina_id`) REFERENCES `maquinas` (`id`),
  ADD CONSTRAINT `incidencias_operario_id_foreign` FOREIGN KEY (`operario_id`) REFERENCES `operarios` (`id`);

--
-- Filtros para la tabla `mantenimientos_maquinas`
--
ALTER TABLE `mantenimientos_maquinas`
  ADD CONSTRAINT `mantenimientos_maquinas_incidencia_id_foreign` FOREIGN KEY (`incidencia_id`) REFERENCES `incidencias` (`id`),
  ADD CONSTRAINT `mantenimientos_maquinas_mantenimiento_id_foreign` FOREIGN KEY (`mantenimiento_id`) REFERENCES `mantenimientos_preventivos` (`id`),
  ADD CONSTRAINT `mantenimientos_maquinas_maquina_id_foreign` FOREIGN KEY (`maquina_id`) REFERENCES `maquinas` (`id`);

--
-- Filtros para la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD CONSTRAINT `maquinas_seccion_id_foreign` FOREIGN KEY (`seccion_id`) REFERENCES `secciones` (`id`);

--
-- Filtros para la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD CONSTRAINT `secciones_campus_id_foreign` FOREIGN KEY (`campus_id`) REFERENCES `campus` (`id`);

--
-- Filtros para la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
  ADD CONSTRAINT `tecnicos_operario_id_foreign` FOREIGN KEY (`operario_id`) REFERENCES `operarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
