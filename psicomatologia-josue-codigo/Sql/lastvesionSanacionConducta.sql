-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para sanaciondelaconducta
CREATE DATABASE IF NOT EXISTS `sanaciondelaconducta` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sanaciondelaconducta`;

-- Volcando estructura para tabla sanaciondelaconducta.archivos
CREATE TABLE IF NOT EXISTS `archivos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `archivo` blob NOT NULL,
  `tipo_archivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `psicologo_id` bigint unsigned DEFAULT NULL,
  `sesion_id` bigint unsigned DEFAULT NULL,
  `pago_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sanaciondelaconducta.archivos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sanaciondelaconducta.bloqueos
CREATE TABLE IF NOT EXISTS `bloqueos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `psicologo_id` bigint unsigned NOT NULL,
  `paciente_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isBloqueado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sanaciondelaconducta.bloqueos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sanaciondelaconducta.especialidades
CREATE TABLE IF NOT EXISTS `especialidades` (
  `espec_id` int NOT NULL AUTO_INCREMENT,
  `psico_id` bigint DEFAULT NULL,
  `especialidad` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`espec_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla sanaciondelaconducta.especialidades: ~1 rows (aproximadamente)
INSERT INTO `especialidades` (`espec_id`, `psico_id`, `especialidad`, `created_at`, `updated_at`) VALUES
	(1, 10, 'Psicología Infantil', '2024-04-23 00:25:45', '2024-04-23 00:25:46'),
	(2, 9, 'Psicología Infantil', '2024-04-27 16:08:24', '2024-04-27 16:08:25');

-- Volcando estructura para tabla sanaciondelaconducta.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sanaciondelaconducta.failed_jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sanaciondelaconducta.horarios
CREATE TABLE IF NOT EXISTS `horarios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `psicologo_id` bigint unsigned NOT NULL,
  `fecha_hora_inicio` timestamp NULL DEFAULT NULL,
  `fecha_hora_fin` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isDisponible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sanaciondelaconducta.horarios: ~14 rows (aproximadamente)
INSERT INTO `horarios` (`id`, `psicologo_id`, `fecha_hora_inicio`, `fecha_hora_fin`, `created_at`, `updated_at`, `isDisponible`) VALUES
	(16, 1, '2023-10-29 12:00:00', '2023-10-29 13:30:00', '2023-10-10 09:53:47', '2023-10-10 09:53:47', 1),
	(17, 1, '2023-10-30 14:00:00', '2023-10-30 14:15:00', '2023-10-10 09:54:07', '2023-10-10 09:54:07', 1),
	(18, 1, '2023-10-31 14:00:00', '2023-10-31 13:15:00', '2023-10-10 09:54:07', '2023-10-10 09:54:07', 1),
	(19, 1, '2023-10-29 14:00:00', '2023-10-29 14:15:00', '2023-10-10 09:54:07', '2023-10-10 09:54:07', 1),
	(20, 1, '2023-10-13 14:00:00', '2023-10-13 14:15:00', '2023-10-10 09:54:07', '2023-10-10 09:54:07', 1),
	(21, 1, '2023-10-14 14:00:00', '2023-10-14 14:15:00', '2023-10-10 09:54:07', '2023-10-10 09:54:07', 1),
	(25, 1, '2023-10-10 12:00:00', '2023-10-10 12:15:00', '2023-10-10 10:03:25', '2023-10-10 10:03:25', 1),
	(30, 3, '2023-10-11 16:15:00', '2023-10-11 19:15:00', '2023-10-11 17:36:18', '2023-10-11 17:36:18', 1),
	(31, 4, '2023-10-11 12:00:00', '2023-10-11 12:45:00', '2023-10-11 17:51:04', '2023-10-11 17:51:04', 1),
	(33, 7, '2023-11-24 12:00:00', '2023-11-24 12:45:00', '2023-11-24 19:39:07', '2023-11-24 19:39:07', 1),
	(34, 1, '2024-03-02 12:00:00', '2024-03-02 12:45:00', '2024-03-03 05:38:06', '2024-03-03 05:38:06', 1),
	(35, 1, '2024-03-03 12:00:00', '2024-03-03 12:45:00', '2024-03-03 05:38:06', '2024-03-03 05:38:06', 1),
	(36, 1, '2024-03-04 12:00:00', '2024-03-04 12:45:00', '2024-03-03 05:38:06', '2024-03-03 05:38:06', 1),
	(37, 1, '2024-03-05 12:00:00', '2024-03-05 12:45:00', '2024-03-03 05:38:06', '2024-03-03 05:38:06', 1);

-- Volcando estructura para tabla sanaciondelaconducta.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sanaciondelaconducta.migrations: ~0 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
	(4, '2019_08_19_000000_create_failed_jobs_table', 1),
	(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(6, '2023_08_28_184038_create_sessions_table', 1),
	(7, '2023_09_05_192841_create_permission_tables', 1),
	(8, '2023_09_15_300000_fundacion_educar', 1),
	(9, '2023_09_18_100000_fundacion_educar_b', 1),
	(10, '2023_09_18_200000_fundacion_educar_c', 1),
	(11, '2023_09_19_100000_fundacion_educar_d', 1),
	(12, '2023_09_21_100000_fundacion_educar_e', 1),
	(13, '2023_09_21_200000_fundacion_educar_f', 1),
	(14, '2023_09_21_300000_fundacion_educar_g', 1),
	(15, '2023_09_21_400000_fundacion_educar_h', 1),
	(16, '2023_09_22_100000_fundacion_educar_i', 1),
	(17, '2023_09_23_100000_fundacion_educar_j', 1),
	(18, '2023_10_15_140739_create_notifications_table', 2);

-- Volcando estructura para tabla sanaciondelaconducta.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sanaciondelaconducta.model_has_permissions: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sanaciondelaconducta.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sanaciondelaconducta.model_has_roles: ~8 rows (aproximadamente)
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1),
	(4, 'App\\Models\\User', 2),
	(4, 'App\\Models\\User', 3),
	(2, 'App\\Models\\User', 4),
	(2, 'App\\Models\\User', 5),
	(3, 'App\\Models\\User', 6),
	(3, 'App\\Models\\User', 7),
	(4, 'App\\Models\\User', 9);

-- Volcando estructura para tabla sanaciondelaconducta.notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sanaciondelaconducta.notifications: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sanaciondelaconducta.pacientes
CREATE TABLE IF NOT EXISTS `pacientes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `psicologo_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isAlta` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sanaciondelaconducta.pacientes: ~2 rows (aproximadamente)
INSERT INTO `pacientes` (`id`, `user_id`, `psicologo_id`, `created_at`, `updated_at`, `isAlta`) VALUES
	(1, 6, 1, '2023-10-09 21:30:27', '2024-03-03 05:38:52', 0),
	(2, 7, NULL, '2023-10-09 21:30:27', '2023-10-09 21:30:27', 0);

-- Volcando estructura para tabla sanaciondelaconducta.paciente_tutor
CREATE TABLE IF NOT EXISTS `paciente_tutor` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `paciente_id` bigint unsigned NOT NULL,
  `tutor_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sanaciondelaconducta.paciente_tutor: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sanaciondelaconducta.pagos
CREATE TABLE IF NOT EXISTS `pagos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `servicio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institucion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `convenio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sesion_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isTerminado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sanaciondelaconducta.pagos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sanaciondelaconducta.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sanaciondelaconducta.password_reset_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sanaciondelaconducta.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sanaciondelaconducta.permissions: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sanaciondelaconducta.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sanaciondelaconducta.personal_access_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sanaciondelaconducta.psicologos
CREATE TABLE IF NOT EXISTS `psicologos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fecha_funcion_titulo` date DEFAULT NULL,
  `universidad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad_residencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departamento_residencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pais_residencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion_cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sanaciondelaconducta.psicologos: ~3 rows (aproximadamente)
INSERT INTO `psicologos` (`id`, `user_id`, `estado`, `created_at`, `updated_at`, `fecha_funcion_titulo`, `universidad`, `ciudad_residencia`, `departamento_residencia`, `pais_residencia`, `descripcion_cv`, `foto`) VALUES
	(1, 2, 'activo', '2023-10-09 21:30:26', '2023-10-09 21:30:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(2, 3, 'activo', '2023-10-09 21:30:26', '2023-10-09 21:30:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 9, 'activo', '2023-10-11 17:24:00', '2023-10-11 17:24:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- Volcando estructura para tabla sanaciondelaconducta.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sanaciondelaconducta.roles: ~4 rows (aproximadamente)
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'administrador', 'web', '2023-10-09 21:30:26', '2023-10-09 21:30:26'),
	(2, 'tutor', 'web', '2023-10-09 21:30:26', '2023-10-09 21:30:26'),
	(3, 'paciente', 'web', '2023-10-09 21:30:26', '2023-10-09 21:30:26'),
	(4, 'psicologo', 'web', '2023-10-09 21:30:26', '2023-10-09 21:30:26');

-- Volcando estructura para tabla sanaciondelaconducta.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sanaciondelaconducta.role_has_permissions: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sanaciondelaconducta.sesions
CREATE TABLE IF NOT EXISTS `sesions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pago_confirmado` tinyint(1) NOT NULL,
  `fecha_hora_inicio` timestamp NULL DEFAULT NULL,
  `fecha_hora_fin` timestamp NULL DEFAULT NULL,
  `paciente_id` bigint unsigned NOT NULL,
  `psicologo_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `descripcion_sesion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calificacion` smallint DEFAULT NULL,
  `calificacion_descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contador_cancelaciones` smallint DEFAULT NULL,
  `solicitante` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cancelador` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sanaciondelaconducta.sesions: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sanaciondelaconducta.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sanaciondelaconducta.sessions: ~1 rows (aproximadamente)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('6VsYXfVRfsWFxixURaRg7m2nUBmuzWMHXchy4q53', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.5100.0 Iron Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNURuaHM4OE5TMmk2MlJyZ0NsZlJldWMzN0NZVjdiOWQ1U1B4VEEzaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1714341659);

-- Volcando estructura para tabla sanaciondelaconducta.solicitud_tutor
CREATE TABLE IF NOT EXISTS `solicitud_tutor` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `paciente_id` bigint unsigned NOT NULL,
  `tutor_actual` bigint unsigned NOT NULL,
  `tutor_solicitante` bigint unsigned NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ci` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `solicitud_tutor_tutor_actual_foreign` (`tutor_actual`),
  KEY `solicitud_tutor_tutor_solicitante_foreign` (`tutor_solicitante`),
  CONSTRAINT `solicitud_tutor_tutor_actual_foreign` FOREIGN KEY (`tutor_actual`) REFERENCES `tutors` (`id`),
  CONSTRAINT `solicitud_tutor_tutor_solicitante_foreign` FOREIGN KEY (`tutor_solicitante`) REFERENCES `tutors` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sanaciondelaconducta.solicitud_tutor: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sanaciondelaconducta.tutors
CREATE TABLE IF NOT EXISTS `tutors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sanaciondelaconducta.tutors: ~2 rows (aproximadamente)
INSERT INTO `tutors` (`id`, `created_at`, `updated_at`, `user_id`) VALUES
	(1, '2023-10-09 21:30:26', '2023-10-09 21:30:26', 4),
	(2, '2023-10-09 21:30:27', '2023-10-09 21:30:27', 5);

-- Volcando estructura para tabla sanaciondelaconducta.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `canal_comunicacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contador_bloqueos` smallint DEFAULT NULL,
  `bloqueo_permanente` tinyint(1) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `ocupacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ci` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_pais_telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pregunta_seguridad_a` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pregunta_seguridad_b` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `respuesta_seguridad_a` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `respuesta_seguridad_b` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activated` tinyint DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sanaciondelaconducta.users: ~9 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `apellidos`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `canal_comunicacion`, `contador_bloqueos`, `bloqueo_permanente`, `fecha_nacimiento`, `ocupacion`, `ci`, `codigo_pais_telefono`, `telefono`, `pregunta_seguridad_a`, `pregunta_seguridad_b`, `respuesta_seguridad_a`, `respuesta_seguridad_b`, `activated`) VALUES
	(1, 'administrador', 'apellido', 'administrador@gmail.com', '2023-10-09 21:30:26', '$2y$10$MdM1klyR2jabfoEDwG47AugZZwh/HjlslOzgu/SkZdzGEyqzxgcme', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-09 21:30:26', '2023-10-09 21:30:26', 'correo', 0, 0, '2023-02-02', 'ingeniero', '219301249asd', '+591', '7347272', 'pregunta a', 'pregunta b', 'respuesta a', 'respuesta b', 0),
	(2, 'psicologo', 'apellido', 'psicologo@gmail.com', '2023-10-09 21:30:26', '$2y$10$6suqBrQDmvf.bQFBCoZsr.GTmOoUUTnji0maVAHe4CPCL2vTLNUJO', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-09 21:30:26', '2023-10-09 21:30:26', 'correo', 0, 0, '2023-02-02', 'ingeniero', '219301249asd', '+591', '7347272', 'pregunta a', 'pregunta b', 'respuesta a', 'respuesta b', 1),
	(3, 'psicologo2', 'apellido2', 'psicologo2@gmail.com', '2023-10-09 21:30:26', '$2y$10$9P3ENq0zwTXrDlXeCI6l5.JrK/t5z5hneuIq7A1sHM2cwK.ker.eC', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-09 21:30:26', '2023-10-09 21:30:26', 'correo', 0, 0, '2023-02-02', 'ingeniero', '219301249asd', '+591', '7347272', 'pregunta a', 'pregunta b', 'respuesta a', 'respuesta b', 1),
	(4, 'tutor', 'apellido', 'tutor@gmail.com', '2023-10-09 21:30:26', '$2y$10$GY5Y7A6SwprH05.RpofSGuy3xwZCNRRQtgaX8/hzEO47eyVbHnRaO', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-09 21:30:26', '2023-10-09 21:30:26', 'correo', 0, 0, '2023-02-02', 'ingeniero', '219301249asd', '+591', '7347272', 'pregunta a', 'pregunta b', 'respuesta a', 'respuesta b', 0),
	(5, 'tutor2', 'apellido2', 'tutor2@gmail.com', '2023-10-09 21:30:27', '$2y$10$8Y8axS1yCdb97Ra6D7c9veKyFLHCQMFoXSX3dfx3XCf6wupIfQ3pa', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-09 21:30:27', '2023-10-09 21:30:27', 'correo', 0, 0, '2010-02-02', 'ingeniero', '54321', '+591', '7341342', 'pregunta a', 'pregunta b', 'respuesta a', 'respuesta b', 0),
	(6, 'paciente', 'apellido', 'paciente@gmail.com', '2023-10-09 21:30:27', '$2y$10$P0SQiW2BmWOtlUWE9ekoP.sUUi0KEVZAuthpyhu98LlSFKa16l8PO', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-09 21:30:27', '2023-10-09 21:30:27', 'correo', 0, 0, '2023-02-02', 'ingeniero', '219301249asd', '+591', '7347272', 'pregunta a', 'pregunta b', 'respuesta a', 'respuesta b', 0),
	(7, 'paciente2', 'apellido_paciente2', 'paciente2@gmail.com', '2023-10-09 21:30:27', '$2y$10$FA84qV86glENHsjVULmpfehvJJylsHAPt/Qxe5u6v/rXayVC7paFG', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-09 21:30:27', '2023-10-09 21:30:27', 'correo', 0, 0, '2023-02-02', 'médico', '219301249asd', '+591', '7347373', 'pregunta a', 'pregunta b', 'respuesta a', 'respuesta b', 0),
	(8, 'sinrol', 'apellido', 'sinrol@gmail.com', '2023-10-09 21:30:27', '$2y$10$b8UhAdVssYUAldzIO.31CeED7PA65s2pZR9qoFTBG7qB4HhGgPoda', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-09 21:30:27', '2023-10-09 21:30:27', 'correo', 0, 0, '2023-02-02', 'ingeniero', '219301249asd', '+591', '7347272', 'pregunta a', 'pregunta b', 'respuesta a', 'respuesta b', 0),
	(9, 'psicologo3', 'ss', 'psicologo3@gmail.com', NULL, '$2y$10$.fgfFwTOpzzDwRHhcs9i1u7jPcgcGV//mgcKIiquwhbpX.nv/UBQW', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-11 17:24:00', '2023-10-11 17:24:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
	(27, 'momo123', 'momo apellido', 'momo123@gmail.com', NULL, '$2y$12$89Mo1EHrELKn9NWO8kZjx.B3nyeSzjkZOxqLE1zA/oZxFXn1tHs/G', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-30 00:04:07', '2024-04-30 00:04:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '123469859', NULL, NULL, NULL, NULL, 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
