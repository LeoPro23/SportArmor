-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 06-11-2024 a las 20:15:40
-- Versión del servidor: 8.3.0
-- Versión de PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sportarmorbd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categorias_nombre_unique` (`nombre`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Categoria 1', NULL, '2024-10-27 13:45:04', '2024-10-27 14:07:35'),
(2, 'Categoria 2', NULL, '2024-10-27 13:47:11', '2024-10-27 13:47:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupones`
--

DROP TABLE IF EXISTS `cupones`;
CREATE TABLE IF NOT EXISTS `cupones` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `codigo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descuento` decimal(5,2) NOT NULL,
  `fecha_expiracion` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cupones_codigo_unique` (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cupones`
--

INSERT INTO `cupones` (`id`, `codigo`, `descuento`, `fecha_expiracion`, `created_at`, `updated_at`) VALUES
(1, 'SOSAN10', 50.00, '2025-04-23', '2024-10-27 14:00:22', '2024-10-27 14:05:49'),
(2, 'PELOTERO10', 70.00, '2025-04-30', '2024-10-28 11:24:52', '2024-10-28 11:25:02'),
(3, 'EXTORSIONADOR10', 100.00, '2025-06-23', '2024-10-28 18:08:43', '2024-10-28 18:08:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ventas`
--

DROP TABLE IF EXISTS `detalle_ventas`;
CREATE TABLE IF NOT EXISTS `detalle_ventas` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `venta_id` bigint UNSIGNED NOT NULL,
  `producto_id` bigint UNSIGNED NOT NULL,
  `talla_id` bigint UNSIGNED DEFAULT NULL,
  `cantidad` int NOT NULL,
  `precio_unitario` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detalle_ventas_venta_id_foreign` (`venta_id`),
  KEY `detalle_ventas_producto_id_foreign` (`producto_id`),
  KEY `detalle_ventas_talla_id_foreign` (`talla_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalle_ventas`
--

INSERT INTO `detalle_ventas` (`id`, `venta_id`, `producto_id`, `talla_id`, `cantidad`, `precio_unitario`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, 3, 100.00, '2024-10-28 06:43:01', '2024-10-28 06:43:01'),
(2, 2, 1, 5, 1, 100.00, '2024-10-28 14:21:37', '2024-10-28 14:21:37'),
(3, 3, 1, 4, 2, 100.00, '2024-11-06 21:03:17', '2024-11-06 21:03:17'),
(4, 3, 2, 6, 2, 200.00, '2024-11-06 21:03:17', '2024-11-06 21:03:17'),
(5, 3, 3, 7, 3, 300.00, '2024-11-06 21:03:17', '2024-11-06 21:03:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_10_27_073600_create_ventas_table', 2),
(5, '2024_10_27_073601_create_categorias_table', 2),
(6, '2024_10_27_073601_create_detalle_ventas_table', 2),
(7, '2024_10_27_073602_create_productos_table', 2),
(8, '2024_10_27_073602_create_subcategorias_table', 2),
(9, '2024_10_27_073603_create_cupones_table', 2),
(10, '2024_10_27_073603_create_tallas_table', 2),
(11, '2024_10_28_075044_add_role_to_users_table', 3),
(12, '2024_10_28_091722_add_user_id_to_ventas_table', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `subcategoria_id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `precio` decimal(8,2) NOT NULL,
  `stock` int NOT NULL,
  `imagen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `productos_subcategoria_id_foreign` (`subcategoria_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `subcategoria_id`, `nombre`, `descripcion`, `precio`, `stock`, `imagen`, `created_at`, `updated_at`) VALUES
(1, 1, 'Producto 1', 'Producto 1 de prueba', 100.00, 47, '1730058479_671e98eff1ed7.webp', '2024-10-27 15:07:12', '2024-11-06 21:03:17'),
(2, 1, 'Producto 2', 'Producto 2 de prueba', 200.00, 198, '1730058521_671e9919192fa.jpg', '2024-10-28 00:38:01', '2024-11-06 21:03:17'),
(3, 1, 'Producto 3', 'Producto de prueba 3', 300.00, 247, '1730058571_671e994b9951f.png', '2024-10-28 00:49:31', '2024-11-06 21:03:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('zaFf77ZL5mPs7A29uUzYjTBbgcoiMnL7cdAr87oY', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoic1F0Y1YxcDNZQmhLN0liTldEeWFTaXM5MmxHV2hudHFvdk45R3FYdSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI4OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvdmVudGFzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1730909120),
('QaYJB8iP6NIjQgU2v3VqOBpGIsmZceSMlPla0fBr', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRjdEMmFsc05yZkJ2VTZ4RnFBang3VWhCQWR3NW1abWZrVG9JQVREOCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1730914012),
('kPUrvVLmv80ixTlg8jOa46gt4zdFrGOQl50ndvP3', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU1NPVUloYjBNSHhxWm1tMDNoNG5xTkpDUFhOakhaODAzbHpQRHNSSiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1730914178),
('iQVwiKTXfoTvVFZt1mHw6N9NyJhYtcxVZHbvcbR1', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUzA4eGxZTVE0b2xnMFVpZks5NEdHOXM0dFFjSE44WlpZbUFEUHhwNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c3VhcmlvcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1730924107);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

DROP TABLE IF EXISTS `subcategorias`;
CREATE TABLE IF NOT EXISTS `subcategorias` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `categoria_id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subcategorias_nombre_unique` (`nombre`),
  KEY `subcategorias_categoria_id_foreign` (`categoria_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`id`, `categoria_id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 1, 'Subcategoria 1', NULL, '2024-10-27 14:11:02', '2024-10-27 14:11:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallas`
--

DROP TABLE IF EXISTS `tallas`;
CREATE TABLE IF NOT EXISTS `tallas` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `subcategoria_id` bigint UNSIGNED NOT NULL,
  `talla` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tallas_subcategoria_id_foreign` (`subcategoria_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tallas`
--

INSERT INTO `tallas` (`id`, `subcategoria_id`, `talla`, `created_at`, `updated_at`) VALUES
(4, 1, 'L', '2024-10-27 14:56:11', '2024-10-27 14:56:11'),
(5, 1, 'S', '2024-10-27 14:56:16', '2024-10-27 14:56:16'),
(6, 1, 'M', '2024-10-27 14:56:19', '2024-10-27 14:56:19'),
(7, 1, 'XL', '2024-10-27 14:56:22', '2024-10-27 14:56:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cliente',
  `profile_image` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `profile_image`) VALUES
(1, 'Leonardo Guimaray', 'leonarditojavi@gmail.com', NULL, '$2y$12$t4aHfL5YOEuG9KA6cz8Dkud5g8aqjCIYU.Tfb1CtRQ6J0nH7iRz3W', 's1JbwCEotFQlnKxvC0ntCkh7EtLAOwZRfoaXyQysbYOn8LqTPol5Tg04TkYK', '2024-10-28 10:12:42', '2024-11-06 22:27:55', 'superadmin', '1730914075_1.png'),
(2, 'Ronald Lenner Molina Quiroz', 'molinita@lenner.com', NULL, '$2y$12$cOo0INs5KnauLIyyCJ8q2.oBYsgU.n1ysbJM0aINzBQqfSl2HCyYO', 'WtaZALJfWXvawQYUUUUFsIPMzXthOJf1fIGoAR8pTr10OjZSBvrUzbAo9tjb', '2024-10-28 14:08:53', '2024-11-06 22:29:09', 'cliente', '1730914149_2.png'),
(3, 'Juan Diego Molina Paz Alayo', 'juandiego@ronaldinho.com', NULL, '$2y$12$oD/lse12CIUgRCMjsZSjW.Apz0MOPeaKElPR1pT5AgEAxm.0pk4o2', NULL, '2024-11-06 02:35:44', '2024-11-06 02:37:35', 'admin', ''),
(4, 'Diego Vásquez Jaramillo', 'diegovasquez@gmail.com', NULL, '$2y$12$sTqyDPUibF7aDvDkNniyOOkzUKrPmSLZablvLkPcW2LEPNVRYGOu.', NULL, '2024-11-06 03:57:26', '2024-11-06 03:57:26', 'admin', ''),
(5, 'adminlg', 'adminlg@gmail.com', NULL, '$2y$12$pensao1Y3hXSe6myq0mlRO/mZwuStxcBj6EBacznIoGf1lZKTnD.6', NULL, '2024-11-06 03:59:05', '2024-11-06 03:59:05', 'superadmin', ''),
(6, 'Ronald Yoel De La Cruz Verastegui', 'ronaldyoel@gmail.com', NULL, '$2y$12$mLOR9TUV9LMBG8aG29.eqO2a2VWVkn2h/TECyqjDu/uWAvwttV8Va', NULL, '2024-11-06 04:01:50', '2024-11-06 04:01:50', 'cliente', ''),
(7, 'Lenner Solorzano Villacorta', 'lennersolorzano@gmail.com', NULL, '$2y$12$.dXDYRU2Ior2GQE02AF1hOYRCs.Gful7RR0RnmBv/c0SZqQzXqJ7u', NULL, '2024-11-06 09:55:51', '2024-11-06 09:55:51', 'cliente', ''),
(8, 'Ronald Verastegui Chavez de la Torres', 'ronaldvga@gmail.com', NULL, '$2y$12$mRR7ll0YoTiNLHvziWcnGunAmT35OohGeAkNWoLWzbdnJg7KInFlO', NULL, '2024-11-06 20:56:37', '2024-11-06 20:56:37', 'admin', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `fecha_venta` datetime NOT NULL,
  `cupon_id` bigint UNSIGNED DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ventas_cupon_id_foreign` (`cupon_id`),
  KEY `ventas_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `fecha_venta`, `cupon_id`, `total`, `created_at`, `updated_at`, `user_id`) VALUES
(1, '2024-10-28 01:43:01', 1, 150.00, '2024-10-28 06:43:01', '2024-10-28 06:43:01', NULL),
(2, '2024-10-28 09:21:37', NULL, 100.00, '2024-10-28 14:21:37', '2024-10-28 14:21:37', 2),
(3, '2024-11-06 16:03:17', 3, 0.00, '2024-11-06 21:03:17', '2024-11-06 21:03:17', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
