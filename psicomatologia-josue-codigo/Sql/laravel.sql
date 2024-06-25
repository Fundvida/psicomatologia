-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2024 a las 17:37:03
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laravel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `espec_id` bigint(20) UNSIGNED NOT NULL,
  `psico_id` bigint(20) UNSIGNED DEFAULT NULL,
  `especialidad` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`espec_id`, `psico_id`, `especialidad`, `created_at`, `updated_at`) VALUES
(1, 1, 'Terapia Adultos', '2024-05-16 17:24:09', '2024-05-16 17:24:09'),
(2, 2, 'Terapia Pareja', '2024-05-19 20:45:43', '2024-05-19 20:45:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paciente_id` bigint(20) UNSIGNED NOT NULL,
  `sesion_id` bigint(20) UNSIGNED NOT NULL,
  `tipo_doc` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `psicologo_id` bigint(20) UNSIGNED NOT NULL,
  `hora_inicio_maniana` time DEFAULT NULL,
  `hora_fin_maniana` time DEFAULT NULL,
  `hora_inicio_tarde` time DEFAULT NULL,
  `hora_fin_tarde` time DEFAULT NULL,
  `dia` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isDisponibleManiana` tinyint(1) NOT NULL,
  `isDisponibleTarde` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id`, `psicologo_id`, `hora_inicio_maniana`, `hora_fin_maniana`, `hora_inicio_tarde`, `hora_fin_tarde`, `dia`, `created_at`, `updated_at`, `isDisponibleManiana`, `isDisponibleTarde`) VALUES
(1, 1, NULL, NULL, NULL, NULL, 'lunes', '2024-05-16 17:24:09', '2024-05-16 17:24:09', 0, 0),
(2, 1, NULL, NULL, NULL, NULL, 'martes', '2024-05-16 17:24:09', '2024-05-16 17:24:09', 0, 0),
(3, 1, NULL, NULL, NULL, NULL, 'miercoles', '2024-05-16 17:24:09', '2024-05-16 17:24:09', 0, 0),
(4, 1, NULL, NULL, NULL, NULL, 'jueves', '2024-05-16 17:24:09', '2024-05-16 17:24:09', 0, 0),
(5, 1, NULL, NULL, NULL, NULL, 'viernes', '2024-05-16 17:24:09', '2024-05-16 17:24:09', 0, 0),
(6, 2, NULL, NULL, NULL, NULL, 'lunes', '2024-05-19 20:45:43', '2024-05-19 20:45:43', 0, 0),
(7, 2, NULL, NULL, NULL, NULL, 'martes', '2024-05-19 20:45:43', '2024-05-19 20:45:43', 0, 0),
(8, 2, NULL, NULL, NULL, NULL, 'miercoles', '2024-05-19 20:45:43', '2024-05-19 20:45:43', 0, 0),
(9, 2, NULL, NULL, NULL, NULL, 'jueves', '2024-05-19 20:45:43', '2024-05-19 20:45:43', 0, 0),
(10, 2, NULL, NULL, NULL, NULL, 'viernes', '2024-05-19 20:45:43', '2024-05-19 20:45:43', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_03_16_202632_create_permission_tables', 1),
(7, '2024_04_27_220916_campos_user', 1),
(8, '2024_04_27_223413_table_psicologo', 1),
(9, '2024_04_27_235432_table_paciente', 1),
(10, '2024_05_05_150927_table_files', 1),
(11, '2024_05_05_171948_table_horarios', 1),
(12, '2024_05_07_082242_table_especialidades', 1),
(13, '2024_05_07_082937_table_sesiones', 1),
(14, '2024_05_07_085453_table_pagos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 9),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 8),
(4, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `psicologo_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tipo_paciente` varchar(255) DEFAULT NULL,
  `ocupacion` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isAlta` tinyint(1) NOT NULL,
  `motivo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `user_id`, `psicologo_id`, `tipo_paciente`, `ocupacion`, `estado`, `created_at`, `updated_at`, `isAlta`, `motivo`) VALUES
(1, 3, 1, 'mayor', 'test', 'ACTIVO', '2024-05-16 17:28:51', '2024-05-19 19:11:30', 0, NULL),
(2, 4, 1, 'mayor', 'test', 'INACTIVO', '2024-05-17 10:42:12', '2024-05-19 19:11:37', 0, NULL),
(3, 5, 1, 'mayor', NULL, 'INACTIVO', '2024-05-18 11:28:50', '2024-05-19 18:58:20', 0, NULL),
(4, 6, 1, 'mayor', 'no especificado', 'INACTIVO', '2024-05-18 11:32:12', '2024-05-19 19:10:26', 0, NULL),
(5, 7, 1, 'mayor', 'trabajador', 'ACTIVO', '2024-05-19 19:09:26', '2024-05-19 19:09:26', 0, NULL),
(6, 8, NULL, 'mayor', 'trabajador', 'INACTIVO', '2024-05-19 20:11:51', '2024-05-20 11:37:08', 0, 'abandono');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `servicio` varchar(255) DEFAULT NULL,
  `institucion` varchar(255) DEFAULT NULL,
  `convenio` varchar(255) DEFAULT NULL,
  `sesion_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isTerminado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `servicio`, `institucion`, `convenio`, `sesion_id`, `created_at`, `updated_at`, `isTerminado`) VALUES
(1, 'Terapia Adultos', '', '', 1, '2024-05-16 17:28:51', '2024-05-16 17:28:51', 0),
(2, 'Terapia Adultos', '', '', 2, '2024-05-17 10:42:12', '2024-05-17 10:42:12', 0),
(3, 'Terapia Adultos', '', '', 3, '2024-05-18 11:28:50', '2024-05-18 11:28:50', 0),
(4, 'Terapia Adultos', '', '', 4, '2024-05-18 11:32:12', '2024-05-18 11:32:12', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'listadoAllSesiones', 'web', '2024-05-16 17:22:13', '2024-05-16 17:22:13'),
(2, 'listaPaciente', 'web', '2024-05-16 17:22:13', '2024-05-16 17:22:13'),
(3, 'listaPsicologo', 'web', '2024-05-16 17:22:13', '2024-05-16 17:22:13'),
(4, 'psicologo.store', 'web', '2024-05-16 17:22:13', '2024-05-16 17:22:13'),
(5, 'psicologo.edit', 'web', '2024-05-16 17:22:13', '2024-05-16 17:22:13'),
(6, 'psicologo.del', 'web', '2024-05-16 17:22:13', '2024-05-16 17:22:13'),
(7, 'paciente.listar', 'web', '2024-05-16 17:22:13', '2024-05-16 17:22:13'),
(8, 'homePsicologoHorario', 'web', '2024-05-16 17:22:13', '2024-05-16 17:22:13'),
(9, 'psicologo.editHorario_x_dia', 'web', '2024-05-16 17:22:13', '2024-05-16 17:22:13'),
(10, 'psicologo.inhabilitarHorario', 'web', '2024-05-16 17:22:13', '2024-05-16 17:22:13'),
(11, 'psicologo.addHorario', 'web', '2024-05-16 17:22:13', '2024-05-16 17:22:13'),
(12, 'psicologo.notificaciones', 'web', '2024-05-16 17:22:13', '2024-05-16 17:22:13'),
(13, 'homePacienteSesiones', 'web', '2024-05-16 17:22:13', '2024-05-16 17:22:13'),
(14, 'paciente.files', 'web', '2024-05-16 17:22:13', '2024-05-16 17:22:13'),
(15, 'cambiarContraseña', 'web', '2024-05-16 17:22:13', '2024-05-16 17:22:13'),
(16, 'paciente.store', 'web', '2024-05-16 17:22:13', '2024-05-16 17:22:13'),
(17, 'paciente.edit', 'web', '2024-05-16 17:22:13', '2024-05-16 17:22:13'),
(18, 'paciente.del', 'web', '2024-05-16 17:22:13', '2024-05-16 17:22:13'),
(19, 'paciente.delSesion', 'web', '2024-05-16 17:22:13', '2024-05-16 17:22:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `psicologos`
--

CREATE TABLE `psicologos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `estado` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fecha_funcion_titulo` date NOT NULL,
  `universidad` varchar(255) NOT NULL,
  `ciudad_residencia` varchar(255) NOT NULL,
  `pais_residencia` varchar(255) NOT NULL,
  `descripcion_cv` varchar(255) DEFAULT NULL,
  `motivo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `psicologos`
--

INSERT INTO `psicologos` (`id`, `user_id`, `estado`, `created_at`, `updated_at`, `fecha_funcion_titulo`, `universidad`, `ciudad_residencia`, `pais_residencia`, `descripcion_cv`, `motivo`) VALUES
(1, 2, 'ACTIVO', '2024-05-16 17:24:09', '2024-05-19 20:44:07', '2024-05-01', 'test', 'test', 'test', 'test', NULL),
(2, 9, 'ACTIVO', '2024-05-19 20:45:43', '2024-05-20 11:21:15', '2024-05-08', 'test', 'test', 'test', 'test', 'abandono');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Psicologo', 'web', '2024-05-16 17:22:13', '2024-05-16 17:22:13'),
(2, 'Paciente', 'web', '2024-05-16 17:22:13', '2024-05-16 17:22:13'),
(3, 'Tutor', 'web', '2024-05-16 17:22:13', '2024-05-16 17:22:13'),
(4, 'Administrador', 'web', '2024-05-16 17:22:13', '2024-05-16 17:22:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(6, 4),
(7, 1),
(7, 4),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 2),
(14, 2),
(15, 1),
(15, 2),
(15, 3),
(15, 4),
(16, 1),
(16, 4),
(17, 1),
(17, 4),
(18, 1),
(18, 4),
(19, 1),
(19, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesions`
--

CREATE TABLE `sesions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `estado` varchar(255) NOT NULL,
  `pago_confirmado` tinyint(1) NOT NULL,
  `fecha_hora_inicio` timestamp NULL DEFAULT NULL,
  `fecha_hora_fin` timestamp NULL DEFAULT NULL,
  `paciente_id` bigint(20) UNSIGNED NOT NULL,
  `psicologo_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `descripcion_sesion` varchar(255) DEFAULT NULL,
  `calificacion` smallint(6) DEFAULT NULL,
  `calificacion_descripcion` varchar(255) DEFAULT NULL,
  `contador_cancelaciones` smallint(6) DEFAULT NULL,
  `solicitante` varchar(255) NOT NULL,
  `cancelador` varchar(255) DEFAULT NULL,
  `justificacion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sesions`
--

INSERT INTO `sesions` (`id`, `estado`, `pago_confirmado`, `fecha_hora_inicio`, `fecha_hora_fin`, `paciente_id`, `psicologo_id`, `created_at`, `updated_at`, `descripcion_sesion`, `calificacion`, `calificacion_descripcion`, `contador_cancelaciones`, `solicitante`, `cancelador`, `justificacion`) VALUES
(1, 'activo', 0, '2024-05-23 08:29:15', '2024-05-23 09:29:15', 1, 1, '2024-05-16 17:28:51', '2024-05-20 10:50:28', 'test', NULL, NULL, NULL, '1', NULL, 'Falta de tiempo'),
(2, 'activo', 1, '2024-05-22 13:44:18', '2024-05-23 14:30:15', 2, 1, '2024-05-17 10:42:12', '2024-05-17 10:42:12', 'test', NULL, NULL, NULL, '2', NULL, NULL),
(3, 'activo', 0, '2024-05-24 07:00:05', '2024-05-24 08:30:05', 3, 1, '2024-05-18 11:28:50', '2024-05-18 11:28:50', 'test', NULL, NULL, NULL, '3', NULL, NULL),
(4, 'Cancelado', 0, '2024-05-22 14:45:18', '2024-05-22 15:59:18', 4, 1, '2024-05-18 11:32:12', '2024-05-20 10:46:32', 'test', NULL, NULL, NULL, '4', NULL, 'Falta de tiempo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `profile_photo_path` varchar(255) DEFAULT NULL,
  `activated` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `canal_comunicacion` varchar(255) DEFAULT NULL,
  `contador_bloqueos` smallint(6) DEFAULT NULL,
  `bloqueo_permanente` tinyint(1) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `ocupacion` varchar(255) DEFAULT NULL,
  `ci` varchar(255) DEFAULT NULL,
  `codigo_pais_telefono` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `pregunta_seguridad_a` varchar(255) DEFAULT NULL,
  `pregunta_seguridad_b` varchar(255) DEFAULT NULL,
  `respuesta_seguridad_a` varchar(255) DEFAULT NULL,
  `respuesta_seguridad_b` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `apellidos`, `email`, `email_verified_at`, `password`, `remember_token`, `profile_photo_path`, `activated`, `created_at`, `updated_at`, `canal_comunicacion`, `contador_bloqueos`, `bloqueo_permanente`, `fecha_nacimiento`, `ocupacion`, `ci`, `codigo_pais_telefono`, `telefono`, `pregunta_seguridad_a`, `pregunta_seguridad_b`, `respuesta_seguridad_a`, `respuesta_seguridad_b`) VALUES
(1, 'admin', NULL, 'admin@gmail.com', NULL, '$2y$12$JnzELnIp/6n1G/bH7p.u3eWuIrkSQ1ZBXXz9J6T2CdeFtF1jQYK.2', NULL, NULL, NULL, '2024-05-16 17:22:13', '2024-05-16 17:22:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Psicologo', 'Perez', 'psicologo@gmail.com', NULL, '$2y$12$IWUKgwROqpsIGlJz4ZOy0uAcvcqTXtl9VReoWNWKZpKsb78D473v2', NULL, NULL, NULL, '2024-05-16 17:24:09', '2024-05-19 20:43:32', NULL, 0, NULL, '2024-04-30', NULL, '7863242', NULL, '70203100', '1+1', NULL, '2', NULL),
(3, 'Eddy', 'test', 'paciente@gmail.com', NULL, '$2y$12$x04v9eM1Oqgbl9nTW3Q7suZhoWOzn.iYBhxttv1dFvGX9Uh.FMhnC', NULL, NULL, 1, '2024-05-16 17:28:51', '2024-05-19 19:11:30', NULL, 0, NULL, '2024-05-09', NULL, '7700000', NULL, '70102030', '1+1', NULL, '2', NULL),
(4, 'update', 'test', 'test@gmail.com', NULL, '$2y$12$NPvRDGVhSjhQ8Pn7adt1BuJj2GFMJwHiXTQhAvoxemkm8CUJ3DfMq', NULL, NULL, 1, '2024-05-17 10:42:12', '2024-05-19 18:42:42', NULL, 0, NULL, '2024-05-01', NULL, '7020300', NULL, '70203010', '1+1', NULL, '2', NULL),
(5, 'prueba', 'prueba', 'paciente2@gmail.com', NULL, '$2y$12$82BpetOotoLN8C0WFXYOou4H0x5lbWSIwTCpeY5anrm.ZtKbs2PDG', NULL, NULL, 1, '2024-05-18 11:28:50', '2024-05-18 11:28:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '70203010', NULL, NULL, NULL, NULL),
(6, 'paciente', 'test', 'paciente3@gmail.com', NULL, '$2y$12$y.Cm7TYAaYjYa1BceLRNDuM.Rlr9wgx9GNJDs3RoSC5tkkEbz/HJ.', NULL, NULL, 1, '2024-05-18 11:32:12', '2024-05-18 11:32:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '70203010', NULL, NULL, NULL, NULL),
(7, 'Jose', 'Velarde', 'jose@gmail.com', NULL, '$2y$12$0ENthUuuYjy8cYJguRXV/.nE0hSC5vHsCZ5P0jL.pHy/TIgTOwgdK', NULL, NULL, NULL, '2024-05-19 19:09:26', '2024-05-19 19:09:26', NULL, 0, NULL, '2024-05-01', NULL, '7020300', NULL, '70203010', '1+1', NULL, '2', NULL),
(8, 'Juan', 'Valle', 'juan@gmail.com', NULL, '$2y$12$54kG1242njyuJxVFBXkTvenDPJG4lEDKnC3Tb2z8/us14oiJfb7K2', NULL, NULL, NULL, '2024-05-19 20:11:51', '2024-05-19 20:11:51', NULL, 0, NULL, '2024-04-29', NULL, '7700000', NULL, '70203010', '1+1', NULL, '2', NULL),
(9, 'Psicologo 2', 'Garcia', 'psicologo2@gmail.com', NULL, '$2y$12$sQ/Klj1WYogAEJ15/DMhzeW1E/gN7zJerlZILUP4Ze316zv5bzffa', NULL, NULL, NULL, '2024-05-19 20:45:43', '2024-05-19 20:45:43', NULL, 0, NULL, '2024-04-29', NULL, '7863242', NULL, '70203010', '1+1', NULL, '2', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`espec_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `psicologos`
--
ALTER TABLE `psicologos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `sesions`
--
ALTER TABLE `sesions`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `espec_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `psicologos`
--
ALTER TABLE `psicologos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sesions`
--
ALTER TABLE `sesions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
