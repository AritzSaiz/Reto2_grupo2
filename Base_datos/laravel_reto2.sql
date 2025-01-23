-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 22-01-2025 a las 19:15:57
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
-- Creación: 21-01-2025 a las 18:06:05
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
-- Creación: 21-01-2025 a las 18:06:05
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
-- Creación: 21-01-2025 a las 18:06:05
-- Última actualización: 22-01-2025 a las 18:13:52
--

DROP TABLE IF EXISTS `campus`;
CREATE TABLE `campus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(2) NOT NULL,
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
(1, '01', 'Arriaga', 'C/ Pozoa s/n', '01013', '945010110', 'arriaga@egibide.org', '2025-01-22 18:13:52', '2025-01-22 18:13:52', NULL),
(2, '02', 'Mendizorroza', 'Plaza Amadeo García Salazar, 2 (Frontones)', '01007', '945010140', 'mendizorrotza@egibide.org', '2025-01-22 18:13:52', '2025-01-22 18:13:52', NULL),
(3, '03', 'Molinuevo', 'C/ San Ignacio, 6', '01001', '945010120', 'molinuevo@egibide.org', '2025-01-22 18:13:52', '2025-01-22 18:13:52', NULL),
(4, '04', 'Nieves Cano', 'C/ Nieves Cano, 10', '01006', '945010130', 'nievescano@egibide.org', '2025-01-22 18:13:52', '2025-01-22 18:13:52', NULL),
(5, '05', 'Jesús Obrero', 'C/ Francia, 32', '01002', '945000333', 'jesusobrero@egibide.org', '2025-01-22 18:13:52', '2025-01-22 18:13:52', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--
-- Creación: 21-01-2025 a las 18:06:05
-- Última actualización: 22-01-2025 a las 18:13:52
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
(1, 'Mecánica', '2025-01-22 18:13:52', '2025-01-22 18:13:52', NULL),
(2, 'Eléctrica', '2025-01-22 18:13:52', '2025-01-22 18:13:52', NULL),
(3, 'Neumática', '2025-01-22 18:13:52', '2025-01-22 18:13:52', NULL),
(4, 'Hidráulica', '2025-01-22 18:13:52', '2025-01-22 18:13:52', NULL),
(5, 'Informática', '2025-01-22 18:13:52', '2025-01-22 18:13:52', NULL),
(6, 'Instalaciones generales', '2025-01-22 18:13:52', '2025-01-22 18:13:52', NULL),
(7, 'Otra', '2025-01-22 18:13:52', '2025-01-22 18:13:52', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--
-- Creación: 21-01-2025 a las 18:06:05
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
-- Creación: 21-01-2025 a las 18:06:06
--

DROP TABLE IF EXISTS `historiales`;
CREATE TABLE `historiales` (
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
-- Creación: 21-01-2025 a las 18:06:06
-- Última actualización: 22-01-2025 a las 18:13:54
--

DROP TABLE IF EXISTS `incidencias`;
CREATE TABLE `incidencias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `abierta` tinyint(1) NOT NULL DEFAULT 1,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `gravedad` varchar(255) NOT NULL,
  `operario_id` bigint(20) UNSIGNED NOT NULL,
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

INSERT INTO `incidencias` (`id`, `descripcion`, `abierta`, `categoria_id`, `gravedad`, `operario_id`, `maquina_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'El torno no se calibra correctamente.', 1, 1, 'No funciona', 1, 1, '2025-01-22 18:13:54', '2025-01-22 18:13:54', NULL),
(2, 'Vibraciones excesivas durante el uso del torno.', 1, 2, 'Sí funciona', 2, 2, '2025-01-22 18:13:54', '2025-01-22 18:13:54', NULL),
(3, 'Error en la lectura del panel de control del torno.', 1, 3, 'No funciona', 3, 3, '2025-01-22 18:13:54', '2025-01-22 18:13:54', NULL),
(4, 'El torno se detiene inesperadamente al programar giros.', 1, 4, 'No funciona', 4, 4, '2025-01-22 18:13:54', '2025-01-22 18:13:54', NULL),
(5, 'Fallas en el motor principal del torno.', 0, 5, 'Mantenimiento preventivo', 5, 5, '2025-01-22 18:13:54', '2025-01-22 18:13:54', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--
-- Creación: 21-01-2025 a las 18:06:05
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
-- Creación: 21-01-2025 a las 18:06:05
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
-- Creación: 21-01-2025 a las 18:06:06
--

DROP TABLE IF EXISTS `mantenimientos_maquinas`;
CREATE TABLE `mantenimientos_maquinas` (
  `mantenimiento_id` bigint(20) UNSIGNED NOT NULL,
  `maquina_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `mantenimientos_maquinas`:
--   `mantenimiento_id`
--       `mantenimientos_preventivos` -> `id`
--   `maquina_id`
--       `maquinas` -> `id`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimientos_preventivos`
--
-- Creación: 21-01-2025 a las 18:06:06
--

DROP TABLE IF EXISTS `mantenimientos_preventivos`;
CREATE TABLE `mantenimientos_preventivos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `dias` int(11) NOT NULL,
  `ultima_revision` datetime NOT NULL,
  `siguiente_revision` datetime NOT NULL,
  `maquina_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONES PARA LA TABLA `mantenimientos_preventivos`:
--   `maquina_id`
--       `maquinas` -> `id`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinas`
--
-- Creación: 21-01-2025 a las 18:06:05
-- Última actualización: 22-01-2025 a las 18:13:54
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
(1, 5000001, 'Torno Pinacho 0001', 'Serie SH', '1', 1, '2025-01-22 18:13:54', '2025-01-22 18:13:54', NULL),
(2, 5000002, 'Torno Pinacho 0002', 'Serie ST', '1', 1, '2025-01-22 18:13:54', '2025-01-22 18:13:54', NULL),
(3, 5000003, 'Torno Pinacho 0003', 'Serie SE', '1', 1, '2025-01-22 18:13:54', '2025-01-22 18:13:54', NULL),
(4, 5000004, 'Torno Pinacho 0004', 'Serie SL', '2', 2, '2025-01-22 18:13:54', '2025-01-22 18:13:54', NULL),
(5, 5000005, 'Torno Pinacho 0005', 'Serie ML', '3', 3, '2025-01-22 18:13:54', '2025-01-22 18:13:54', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--
-- Creación: 21-01-2025 a las 18:06:05
-- Última actualización: 22-01-2025 a las 18:13:52
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
(10, '2025_01_15_105648_create_incidencias_table', 1),
(11, '2025_01_15_105708_create_mantenimientos_preventivos_table', 1),
(12, '2025_01_15_105728_create_historiales_table', 1),
(13, '2025_01_20_082956_create_mantenimiento_maquinas_table', 1),
(14, '2025_01_20_192630_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operarios`
--
-- Creación: 21-01-2025 a las 18:06:05
-- Última actualización: 22-01-2025 a las 18:13:54
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
(1, 'Juan', 'Pérez López', 'juan.perez@egibide.org', 'jperez', '$2y$12$mDWpeKF4O.UMpF0znBTTmei44MTYOhUb//siVTFrCeDqPJ3mYx6pW', '2025-01-22 18:13:53', '2025-01-22 18:13:53', NULL),
(2, 'María', 'González Díaz', 'maria.gonzalez@egibide.org', 'mgonzalez', '$2y$12$iVl4Rc3BDCpwL3/4aNMyweX2rxsL4qK8nFCW1rXUMYDSz2qmiKP/a', '2025-01-22 18:13:53', '2025-01-22 18:13:53', NULL),
(3, 'Luis', 'Martínez Ruiz', 'luis.martinez@egibide.org', 'lmartinez', '$2y$12$6mYZxL0212.2zfGi.1zJ8Oe.8JCXNqyzAFEE/vjeozpiow8FEbR.C', '2025-01-22 18:13:54', '2025-01-22 18:13:54', NULL),
(4, 'Ana', 'Hernández Gómez', 'ana.hernandez@ikasle.egibide.org', 'ahernandez', '$2y$12$4iXbf4JJTAuKsrZ1GijGVe1VlAaLGhiGI.XIsXe4mueWjrowghWgG', '2025-01-22 18:13:54', '2025-01-22 18:13:54', NULL),
(5, 'Paco', 'Sánchez Torres', 'paco.sanchez@ikasle.egibide.org', 'psanchez', '$2y$12$aLXqESnIaAwkqxj2KphcyusDvtFdQjcF8f7lm9TnLx00Ia3XIPiZe', '2025-01-22 18:13:54', '2025-01-22 18:13:54', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--
-- Creación: 21-01-2025 a las 18:06:05
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
-- Creación: 21-01-2025 a las 18:06:05
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
-- Creación: 21-01-2025 a las 18:06:05
-- Última actualización: 22-01-2025 a las 18:13:52
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
(1, '5010', 'Taller Mecánico 1  010', 1, '2025-01-22 18:13:52', '2025-01-22 18:13:52', NULL),
(2, '5011', 'Taller Aurrera XXI', 2, '2025-01-22 18:13:52', '2025-01-22 18:13:52', NULL),
(3, '5012', 'Taller Mecánico 2  012', 3, '2025-01-22 18:13:52', '2025-01-22 18:13:52', NULL),
(4, '5014', 'Taller Control Numérico 014', 4, '2025-01-22 18:13:52', '2025-01-22 18:13:52', NULL),
(5, '5017', 'Taller Mecánico 3  017', 5, '2025-01-22 18:13:52', '2025-01-22 18:13:52', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--
-- Creación: 21-01-2025 a las 18:06:05
-- Última actualización: 22-01-2025 a las 18:15:13
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
('mfZbmcfZw0LCY4pbm4Ldr4uW4LV5LBQsytKoJlHb', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRkJGZTZKTGVZSklFb21vdEhCaFYwaFJYemFTSHpkblRlaTFPYVk5biI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1737569713);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnicos`
--
-- Creación: 21-01-2025 a las 18:06:05
-- Última actualización: 22-01-2025 a las 18:13:54
--

DROP TABLE IF EXISTS `tecnicos`;
CREATE TABLE `tecnicos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `operario_id` bigint(20) UNSIGNED NOT NULL,
  `especialidad` varchar(50) NOT NULL,
  `administrador` tinyint(1) NOT NULL,
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

INSERT INTO `tecnicos` (`id`, `operario_id`, `especialidad`, `administrador`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Electricidad', 1, '2025-01-22 18:13:54', '2025-01-22 18:13:54', NULL),
(2, 2, 'Mecánica', 0, '2025-01-22 18:13:54', '2025-01-22 18:13:54', NULL),
(3, 5, 'Electrónica', 0, '2025-01-22 18:13:54', '2025-01-22 18:13:54', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--
-- Creación: 21-01-2025 a las 18:06:05
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
  ADD PRIMARY KEY (`incidencia_id`,`tecnico_id`),
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
  ADD PRIMARY KEY (`mantenimiento_id`,`maquina_id`),
  ADD KEY `mantenimientos_maquinas_maquina_id_foreign` (`maquina_id`);

--
-- Indices de la tabla `mantenimientos_preventivos`
--
ALTER TABLE `mantenimientos_preventivos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mantenimientos_preventivos_maquina_id_foreign` (`maquina_id`);

--
-- Indices de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD PRIMARY KEY (`id`),
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
-- AUTO_INCREMENT de la tabla `mantenimientos_preventivos`
--
ALTER TABLE `mantenimientos_preventivos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `mantenimientos_maquinas_mantenimiento_id_foreign` FOREIGN KEY (`mantenimiento_id`) REFERENCES `mantenimientos_preventivos` (`id`),
  ADD CONSTRAINT `mantenimientos_maquinas_maquina_id_foreign` FOREIGN KEY (`maquina_id`) REFERENCES `maquinas` (`id`);

--
-- Filtros para la tabla `mantenimientos_preventivos`
--
ALTER TABLE `mantenimientos_preventivos`
  ADD CONSTRAINT `mantenimientos_preventivos_maquina_id_foreign` FOREIGN KEY (`maquina_id`) REFERENCES `maquinas` (`id`);

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
