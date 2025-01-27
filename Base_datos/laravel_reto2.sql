-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 26-01-2025 a las 15:29:41
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
-- Última actualización: 26-01-2025 a las 12:35:40
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
(1, '01', 'Arriaga', 'C/ Pozoa s/n', '01013', '945010110', 'arriaga@egibide.org', '2025-01-26 12:35:40', '2025-01-26 12:35:40', NULL),
(2, '02', 'Mendizorroza', 'Plaza Amadeo García Salazar, 2 (Frontones)', '01007', '945010140', 'mendizorrotza@egibide.org', '2025-01-26 12:35:40', '2025-01-26 12:35:40', NULL),
(3, '03', 'Molinuevo', 'C/ San Ignacio, 6', '01001', '945010120', 'molinuevo@egibide.org', '2025-01-26 12:35:40', '2025-01-26 12:35:40', NULL),
(4, '04', 'Nieves Cano', 'C/ Nieves Cano, 10', '01006', '945010130', 'nievescano@egibide.org', '2025-01-26 12:35:40', '2025-01-26 12:35:40', NULL),
(5, '05', 'Jesús Obrero', 'C/ Francia, 32', '01002', '945000333', 'jesusobrero@egibide.org', '2025-01-26 12:35:40', '2025-01-26 12:35:40', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--
-- Creación: 25-01-2025 a las 11:12:52
-- Última actualización: 26-01-2025 a las 12:35:41
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
(1, 'Mecánica', '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(2, 'Eléctrica', '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(3, 'Neumática', '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(4, 'Hidráulica', '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(5, 'Informática', '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(6, 'Instalaciones generales', '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(7, 'Otra', '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL);

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
--

DROP TABLE IF EXISTS `historiales`;
CREATE TABLE `historiales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `incidencia_id` bigint(20) UNSIGNED NOT NULL,
  `tecnico_id` bigint(20) UNSIGNED NOT NULL,
  `entrada` datetime NOT NULL,
  `salida` datetime NOT NULL,
  `detalles_trabajo` varchar(300) NOT NULL,
  `justificacion_salida` varchar(300) NOT NULL,
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--
-- Creación: 25-01-2025 a las 12:46:22
-- Última actualización: 26-01-2025 a las 12:35:41
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
(1, 'Problema de arranque del torno', 'El torno no arranca y aparece \"Error\" en la pantalla lateral informativa.', 1, 'No funciona', 1, 1, 1, '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(2, 'Fallo en el eje Z de la fresadora', 'El eje Z de la fresadora ha dado un fallo y no sé por qué.', 1, 'No funciona', 2, 2, 2, '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(3, 'Base de impresora 3D no calienta', 'A la impresora 3D no se le calienta la base por motivo desconocido.', 1, 'Sí funciona', 1, 3, 3, '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(4, 'Cortador láser no enciende', 'El cortador láser no enciende desde esta mañana.', 1, 'No funciona', 2, 1, 4, '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(5, 'PC se reinicia constantemente', 'El PC se reinicia constantemente sin haber lanzado ningún comando.', 1, 'Aviso', 3, 2, 1, '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(6, 'Mal estado en estantería', 'Estantería en mal estado, una balda se tambalea.', 0, 'Aviso', 3, 3, 2, '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(7, 'PC no enciende', 'El PC no se enciende ni da señales de actividad.', 0, 'No funciona', 3, 4, 3, '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(8, 'Taladradora sin potencia', 'La taladradora no tiene potencia y funciona despacio.', 0, 'Aviso', 4, 4, 4, '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(9, 'Sierra no corta recto', 'La sierra no corta recto y se desvía en las placas finas de madera.', 0, 'Sí funciona', 7, 4, 5, '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(10, 'Router sin conexión a red', 'Router no se conecta a la red', 0, 'Aviso', 5, 4, 5, '2025-01-25 09:00:00', '2025-01-25 09:00:00', '2025-01-25 18:00:00'),
(11, 'Limpieza General', 'Limpieza rutinaria de la máquina', 1, 'Mantenimiento preventivo', 7, NULL, 1, '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL);

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
-- Última actualización: 26-01-2025 a las 12:35:41
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
(1, 1, 1, '2025-02-25 11:00:00', '2025-03-25 11:00:00', 11, '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimientos_preventivos`
--
-- Creación: 25-01-2025 a las 11:12:52
-- Última actualización: 26-01-2025 a las 12:35:41
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
(1, 'Limpieza General', 'Limpieza rutinaria de la máquina', 30, '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(2, 'Engrasado', 'Engrasado de las partes móviles', 60, '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(3, 'Ajuste de Componentes', 'Revisión y ajuste de tornillos y piezas', 90, '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(4, 'Calibración', 'Calibración de la máquina', 120, '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(5, 'Revisión Eléctrica', 'Revisión de los cables y conexiones eléctricas', 120, '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(6, 'Actualización Software', 'Actualización del software de la máquina', 180, '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(7, 'Revisión Neumática', 'Revisión de los elementos neumáticos de la máquina', 180, '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinas`
--
-- Creación: 25-01-2025 a las 11:12:52
-- Última actualización: 26-01-2025 a las 12:35:41
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
(1, 1001, 'Torno CNC', 'TM-2000', '1', 1, '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(2, 1002, 'Fresadora', 'FR-300', '1', 1, '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(3, 2001, 'Impresora 3D', 'PR-500', '1', 1, '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(4, 2002, 'Cortadora Láser', 'CL-100', '1', 2, '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(5, 3001, 'Ordenador Principal', 'HP-200', '2', 2, '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(6, 4001, 'Estantería de Almacén', 'E-230', '2', 2, '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(7, 5001, 'PC de Oficina', 'HP-100', '2', 2, '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(8, 1003, 'Taladradora', 'TA-330', '2', 3, '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(9, 1004, 'Sierra', 'SI-200', '3', 4, '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(10, 3002, 'Router', 'RT-10', '3', 4, '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(11, 4002, 'Carretilla', 'CA-100', '3', 4, '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(12, 5002, 'Impresora', 'PR-100', '3', 4, '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--
-- Creación: 25-01-2025 a las 11:12:52
-- Última actualización: 26-01-2025 a las 12:35:40
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
-- Última actualización: 26-01-2025 a las 12:35:41
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
(1, 'Juan', 'Pérez López', 'juan.perez@egibide.org', 'jperez', '$2y$12$4Ci1G3PsbfZVYSux7Ed5OeVFaby4bxg0kzUezuH8Yf8EROQnL5Vqm', '2025-01-26 12:35:40', '2025-01-26 12:35:40', NULL),
(2, 'María', 'González Díaz', 'maria.gonzalez@egibide.org', 'mgonzalez', '$2y$12$P6k7yTv1Ott8bPxkFt.REeD.qhfLmTWD0.4ciJlIQqNBeG5Wd5Kf.', '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(3, 'Luis', 'Martínez Ruiz', 'luis.martinez@egibide.org', 'lmartinez', '$2y$12$pHWFALghMaLQGZxnOhLyfeRyKft/sDu5zQe.RcFYtsEdF8amMg2Sq', '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(4, 'Ana', 'Hernández Gómez', 'ana.hernandez@ikasle.egibide.org', 'ahernandez', '$2y$12$syK.a33WsiidLtxerZO0EeFIQZAwFc9a.tI8/KOhJdjzRjHq/Gjwm', '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(5, 'Paco', 'Sánchez Torres', 'paco.sanchez@ikasle.egibide.org', 'psanchez', '$2y$12$eBIS.U0/2puswSCV95pKYeqKeNtdJ3GyW6PbFQN3prIeQn9KO6396', '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL);

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
-- Última actualización: 26-01-2025 a las 12:35:40
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
(1, '5010', 'Taller Mecánico 1  010', 1, '2025-01-26 12:35:40', '2025-01-26 12:35:40', NULL),
(2, '5011', 'Taller Aurrera XXI', 1, '2025-01-26 12:35:40', '2025-01-26 12:35:40', NULL),
(3, '5012', 'Taller Mecánico 2  012', 1, '2025-01-26 12:35:40', '2025-01-26 12:35:40', NULL),
(4, '5014', 'Taller Control Numérico 014', 2, '2025-01-26 12:35:40', '2025-01-26 12:35:40', NULL),
(5, '5017', 'Taller Mecánico 3  017', 3, '2025-01-26 12:35:40', '2025-01-26 12:35:40', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--
-- Creación: 25-01-2025 a las 11:12:52
-- Última actualización: 26-01-2025 a las 12:42:28
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

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ykbslxIlBn4IDQScg6Q2miBbaQXF9S0hP19FfXO2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMHdkNjdMc29HTnVuTnJrZXlHeUE1SlhFVXVJSHRHSThTZjRVeDA0QyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zaG93T3BlcmFyaW8iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1737895348);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnicos`
--
-- Creación: 25-01-2025 a las 11:12:52
-- Última actualización: 26-01-2025 a las 12:35:41
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
(1, 1, 'Electricidad', 1, '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(2, 2, 'Mecánica', 0, '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL),
(3, 5, 'Electrónica', 0, '2025-01-26 12:35:41', '2025-01-26 12:35:41', NULL);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
