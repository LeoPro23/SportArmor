-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 11-11-2024 a las 04:40:28
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

--
-- Volcado de datos para la tabla `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('categorias_completas', 'O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:2:{i:0;O:20:\"App\\Models\\Categoria\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categorias\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:5:{s:2:\"id\";i:1;s:6:\"nombre\";s:11:\"Categoria 1\";s:11:\"descripcion\";N;s:10:\"created_at\";s:19:\"2024-10-27 08:45:04\";s:10:\"updated_at\";s:19:\"2024-10-27 09:07:35\";}s:11:\"\0*\0original\";a:5:{s:2:\"id\";i:1;s:6:\"nombre\";s:11:\"Categoria 1\";s:11:\"descripcion\";N;s:10:\"created_at\";s:19:\"2024-10-27 08:45:04\";s:10:\"updated_at\";s:19:\"2024-10-27 09:07:35\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:13:\"subcategorias\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:2:{i:0;O:23:\"App\\Models\\Subcategoria\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:13:\"subcategorias\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:6:{s:2:\"id\";i:1;s:12:\"categoria_id\";i:1;s:6:\"nombre\";s:14:\"Subcategoria 1\";s:11:\"descripcion\";N;s:10:\"created_at\";s:19:\"2024-10-27 09:11:02\";s:10:\"updated_at\";s:19:\"2024-10-27 09:11:02\";}s:11:\"\0*\0original\";a:6:{s:2:\"id\";i:1;s:12:\"categoria_id\";i:1;s:6:\"nombre\";s:14:\"Subcategoria 1\";s:11:\"descripcion\";N;s:10:\"created_at\";s:19:\"2024-10-27 09:11:02\";s:10:\"updated_at\";s:19:\"2024-10-27 09:11:02\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:9:\"productos\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:4:{i:0;O:19:\"App\\Models\\Producto\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:9:\"productos\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:9:{s:2:\"id\";i:1;s:15:\"subcategoria_id\";i:1;s:6:\"nombre\";s:10:\"Producto 1\";s:11:\"descripcion\";s:20:\"Producto 1 de prueba\";s:6:\"precio\";s:6:\"100.00\";s:5:\"stock\";i:43;s:6:\"imagen\";s:29:\"1730058479_671e98eff1ed7.webp\";s:10:\"created_at\";s:19:\"2024-10-27 10:07:12\";s:10:\"updated_at\";s:19:\"2024-11-10 21:18:46\";}s:11:\"\0*\0original\";a:9:{s:2:\"id\";i:1;s:15:\"subcategoria_id\";i:1;s:6:\"nombre\";s:10:\"Producto 1\";s:11:\"descripcion\";s:20:\"Producto 1 de prueba\";s:6:\"precio\";s:6:\"100.00\";s:5:\"stock\";i:43;s:6:\"imagen\";s:29:\"1730058479_671e98eff1ed7.webp\";s:10:\"created_at\";s:19:\"2024-10-27 10:07:12\";s:10:\"updated_at\";s:19:\"2024-11-10 21:18:46\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:6:{i:0;s:6:\"nombre\";i:1;s:11:\"descripcion\";i:2;s:6:\"precio\";i:3;s:5:\"stock\";i:4;s:15:\"subcategoria_id\";i:5;s:6:\"imagen\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:19:\"App\\Models\\Producto\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:9:\"productos\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:9:{s:2:\"id\";i:2;s:15:\"subcategoria_id\";i:1;s:6:\"nombre\";s:10:\"Producto 2\";s:11:\"descripcion\";s:20:\"Producto 2 de prueba\";s:6:\"precio\";s:6:\"200.00\";s:5:\"stock\";i:196;s:6:\"imagen\";s:28:\"1730058521_671e9919192fa.jpg\";s:10:\"created_at\";s:19:\"2024-10-27 19:38:01\";s:10:\"updated_at\";s:19:\"2024-11-10 21:18:46\";}s:11:\"\0*\0original\";a:9:{s:2:\"id\";i:2;s:15:\"subcategoria_id\";i:1;s:6:\"nombre\";s:10:\"Producto 2\";s:11:\"descripcion\";s:20:\"Producto 2 de prueba\";s:6:\"precio\";s:6:\"200.00\";s:5:\"stock\";i:196;s:6:\"imagen\";s:28:\"1730058521_671e9919192fa.jpg\";s:10:\"created_at\";s:19:\"2024-10-27 19:38:01\";s:10:\"updated_at\";s:19:\"2024-11-10 21:18:46\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:6:{i:0;s:6:\"nombre\";i:1;s:11:\"descripcion\";i:2;s:6:\"precio\";i:3;s:5:\"stock\";i:4;s:15:\"subcategoria_id\";i:5;s:6:\"imagen\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:2;O:19:\"App\\Models\\Producto\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:9:\"productos\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:9:{s:2:\"id\";i:3;s:15:\"subcategoria_id\";i:1;s:6:\"nombre\";s:10:\"Producto 3\";s:11:\"descripcion\";s:20:\"Producto 3 de prueba\";s:6:\"precio\";s:6:\"300.00\";s:5:\"stock\";i:241;s:6:\"imagen\";s:28:\"1730058571_671e994b9951f.png\";s:10:\"created_at\";s:19:\"2024-10-27 19:49:31\";s:10:\"updated_at\";s:19:\"2024-11-10 21:18:23\";}s:11:\"\0*\0original\";a:9:{s:2:\"id\";i:3;s:15:\"subcategoria_id\";i:1;s:6:\"nombre\";s:10:\"Producto 3\";s:11:\"descripcion\";s:20:\"Producto 3 de prueba\";s:6:\"precio\";s:6:\"300.00\";s:5:\"stock\";i:241;s:6:\"imagen\";s:28:\"1730058571_671e994b9951f.png\";s:10:\"created_at\";s:19:\"2024-10-27 19:49:31\";s:10:\"updated_at\";s:19:\"2024-11-10 21:18:23\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:6:{i:0;s:6:\"nombre\";i:1;s:11:\"descripcion\";i:2;s:6:\"precio\";i:3;s:5:\"stock\";i:4;s:15:\"subcategoria_id\";i:5;s:6:\"imagen\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:3;O:19:\"App\\Models\\Producto\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:9:\"productos\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:9:{s:2:\"id\";i:4;s:15:\"subcategoria_id\";i:1;s:6:\"nombre\";s:10:\"Producto 4\";s:11:\"descripcion\";s:20:\"Producto 4 de prueba\";s:6:\"precio\";s:6:\"100.00\";s:5:\"stock\";i:96;s:6:\"imagen\";s:28:\"1730944543_672c1e1f4d374.jpg\";s:10:\"created_at\";s:19:\"2024-11-07 01:55:43\";s:10:\"updated_at\";s:19:\"2024-11-10 21:18:23\";}s:11:\"\0*\0original\";a:9:{s:2:\"id\";i:4;s:15:\"subcategoria_id\";i:1;s:6:\"nombre\";s:10:\"Producto 4\";s:11:\"descripcion\";s:20:\"Producto 4 de prueba\";s:6:\"precio\";s:6:\"100.00\";s:5:\"stock\";i:96;s:6:\"imagen\";s:28:\"1730944543_672c1e1f4d374.jpg\";s:10:\"created_at\";s:19:\"2024-11-07 01:55:43\";s:10:\"updated_at\";s:19:\"2024-11-10 21:18:23\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:6:{i:0;s:6:\"nombre\";i:1;s:11:\"descripcion\";i:2;s:6:\"precio\";i:3;s:5:\"stock\";i:4;s:15:\"subcategoria_id\";i:5;s:6:\"imagen\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:6:\"nombre\";i:1;s:12:\"categoria_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:23:\"App\\Models\\Subcategoria\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:13:\"subcategorias\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:6:{s:2:\"id\";i:2;s:12:\"categoria_id\";i:1;s:6:\"nombre\";s:14:\"Subcategoria 2\";s:11:\"descripcion\";N;s:10:\"created_at\";s:19:\"2024-11-06 21:28:59\";s:10:\"updated_at\";s:19:\"2024-11-06 21:28:59\";}s:11:\"\0*\0original\";a:6:{s:2:\"id\";i:2;s:12:\"categoria_id\";i:1;s:6:\"nombre\";s:14:\"Subcategoria 2\";s:11:\"descripcion\";N;s:10:\"created_at\";s:19:\"2024-11-06 21:28:59\";s:10:\"updated_at\";s:19:\"2024-11-06 21:28:59\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:9:\"productos\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:4:{i:0;O:19:\"App\\Models\\Producto\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:9:\"productos\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:9:{s:2:\"id\";i:5;s:15:\"subcategoria_id\";i:2;s:6:\"nombre\";s:10:\"Producto 5\";s:11:\"descripcion\";s:20:\"Producto 5 de prueba\";s:6:\"precio\";s:6:\"200.00\";s:5:\"stock\";i:200;s:6:\"imagen\";s:29:\"1730944589_672c1e4da1daf.jpeg\";s:10:\"created_at\";s:19:\"2024-11-07 01:56:29\";s:10:\"updated_at\";s:19:\"2024-11-07 01:56:29\";}s:11:\"\0*\0original\";a:9:{s:2:\"id\";i:5;s:15:\"subcategoria_id\";i:2;s:6:\"nombre\";s:10:\"Producto 5\";s:11:\"descripcion\";s:20:\"Producto 5 de prueba\";s:6:\"precio\";s:6:\"200.00\";s:5:\"stock\";i:200;s:6:\"imagen\";s:29:\"1730944589_672c1e4da1daf.jpeg\";s:10:\"created_at\";s:19:\"2024-11-07 01:56:29\";s:10:\"updated_at\";s:19:\"2024-11-07 01:56:29\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:6:{i:0;s:6:\"nombre\";i:1;s:11:\"descripcion\";i:2;s:6:\"precio\";i:3;s:5:\"stock\";i:4;s:15:\"subcategoria_id\";i:5;s:6:\"imagen\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:19:\"App\\Models\\Producto\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:9:\"productos\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:9:{s:2:\"id\";i:6;s:15:\"subcategoria_id\";i:2;s:6:\"nombre\";s:10:\"Producto 6\";s:11:\"descripcion\";s:20:\"Producto 6 de prueba\";s:6:\"precio\";s:6:\"350.00\";s:5:\"stock\";i:150;s:6:\"imagen\";N;s:10:\"created_at\";s:19:\"2024-11-07 02:10:48\";s:10:\"updated_at\";s:19:\"2024-11-07 02:10:48\";}s:11:\"\0*\0original\";a:9:{s:2:\"id\";i:6;s:15:\"subcategoria_id\";i:2;s:6:\"nombre\";s:10:\"Producto 6\";s:11:\"descripcion\";s:20:\"Producto 6 de prueba\";s:6:\"precio\";s:6:\"350.00\";s:5:\"stock\";i:150;s:6:\"imagen\";N;s:10:\"created_at\";s:19:\"2024-11-07 02:10:48\";s:10:\"updated_at\";s:19:\"2024-11-07 02:10:48\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:6:{i:0;s:6:\"nombre\";i:1;s:11:\"descripcion\";i:2;s:6:\"precio\";i:3;s:5:\"stock\";i:4;s:15:\"subcategoria_id\";i:5;s:6:\"imagen\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:2;O:19:\"App\\Models\\Producto\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:9:\"productos\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:9:{s:2:\"id\";i:7;s:15:\"subcategoria_id\";i:2;s:6:\"nombre\";s:10:\"Producto 7\";s:11:\"descripcion\";s:20:\"Producto 7 de prueba\";s:6:\"precio\";s:6:\"500.00\";s:5:\"stock\";i:50;s:6:\"imagen\";N;s:10:\"created_at\";s:19:\"2024-11-07 03:08:28\";s:10:\"updated_at\";s:19:\"2024-11-07 03:08:28\";}s:11:\"\0*\0original\";a:9:{s:2:\"id\";i:7;s:15:\"subcategoria_id\";i:2;s:6:\"nombre\";s:10:\"Producto 7\";s:11:\"descripcion\";s:20:\"Producto 7 de prueba\";s:6:\"precio\";s:6:\"500.00\";s:5:\"stock\";i:50;s:6:\"imagen\";N;s:10:\"created_at\";s:19:\"2024-11-07 03:08:28\";s:10:\"updated_at\";s:19:\"2024-11-07 03:08:28\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:6:{i:0;s:6:\"nombre\";i:1;s:11:\"descripcion\";i:2;s:6:\"precio\";i:3;s:5:\"stock\";i:4;s:15:\"subcategoria_id\";i:5;s:6:\"imagen\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:3;O:19:\"App\\Models\\Producto\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:9:\"productos\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:9:{s:2:\"id\";i:8;s:15:\"subcategoria_id\";i:2;s:6:\"nombre\";s:10:\"Producto 8\";s:11:\"descripcion\";s:20:\"Producto 8 de prueba\";s:6:\"precio\";s:6:\"450.00\";s:5:\"stock\";i:200;s:6:\"imagen\";N;s:10:\"created_at\";s:19:\"2024-11-07 03:09:03\";s:10:\"updated_at\";s:19:\"2024-11-07 03:09:03\";}s:11:\"\0*\0original\";a:9:{s:2:\"id\";i:8;s:15:\"subcategoria_id\";i:2;s:6:\"nombre\";s:10:\"Producto 8\";s:11:\"descripcion\";s:20:\"Producto 8 de prueba\";s:6:\"precio\";s:6:\"450.00\";s:5:\"stock\";i:200;s:6:\"imagen\";N;s:10:\"created_at\";s:19:\"2024-11-07 03:09:03\";s:10:\"updated_at\";s:19:\"2024-11-07 03:09:03\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:6:{i:0;s:6:\"nombre\";i:1;s:11:\"descripcion\";i:2;s:6:\"precio\";i:3;s:5:\"stock\";i:4;s:15:\"subcategoria_id\";i:5;s:6:\"imagen\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:6:\"nombre\";i:1;s:12:\"categoria_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:1:{i:0;s:6:\"nombre\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:20:\"App\\Models\\Categoria\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categorias\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:5:{s:2:\"id\";i:2;s:6:\"nombre\";s:11:\"Categoria 2\";s:11:\"descripcion\";N;s:10:\"created_at\";s:19:\"2024-10-27 08:47:11\";s:10:\"updated_at\";s:19:\"2024-10-27 08:47:11\";}s:11:\"\0*\0original\";a:5:{s:2:\"id\";i:2;s:6:\"nombre\";s:11:\"Categoria 2\";s:11:\"descripcion\";N;s:10:\"created_at\";s:19:\"2024-10-27 08:47:11\";s:10:\"updated_at\";s:19:\"2024-10-27 08:47:11\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:13:\"subcategorias\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:2:{i:0;O:23:\"App\\Models\\Subcategoria\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:13:\"subcategorias\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:6:{s:2:\"id\";i:3;s:12:\"categoria_id\";i:2;s:6:\"nombre\";s:14:\"Subcategoria 3\";s:11:\"descripcion\";N;s:10:\"created_at\";s:19:\"2024-11-07 01:37:06\";s:10:\"updated_at\";s:19:\"2024-11-07 01:37:06\";}s:11:\"\0*\0original\";a:6:{s:2:\"id\";i:3;s:12:\"categoria_id\";i:2;s:6:\"nombre\";s:14:\"Subcategoria 3\";s:11:\"descripcion\";N;s:10:\"created_at\";s:19:\"2024-11-07 01:37:06\";s:10:\"updated_at\";s:19:\"2024-11-07 01:37:06\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:9:\"productos\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:1:{i:0;O:19:\"App\\Models\\Producto\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:9:\"productos\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:9:{s:2:\"id\";i:9;s:15:\"subcategoria_id\";i:3;s:6:\"nombre\";s:10:\"Producto 9\";s:11:\"descripcion\";s:20:\"Producto 9 de prueba\";s:6:\"precio\";s:6:\"100.00\";s:5:\"stock\";i:100;s:6:\"imagen\";N;s:10:\"created_at\";s:19:\"2024-11-07 03:09:31\";s:10:\"updated_at\";s:19:\"2024-11-07 03:09:40\";}s:11:\"\0*\0original\";a:9:{s:2:\"id\";i:9;s:15:\"subcategoria_id\";i:3;s:6:\"nombre\";s:10:\"Producto 9\";s:11:\"descripcion\";s:20:\"Producto 9 de prueba\";s:6:\"precio\";s:6:\"100.00\";s:5:\"stock\";i:100;s:6:\"imagen\";N;s:10:\"created_at\";s:19:\"2024-11-07 03:09:31\";s:10:\"updated_at\";s:19:\"2024-11-07 03:09:40\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:6:{i:0;s:6:\"nombre\";i:1;s:11:\"descripcion\";i:2;s:6:\"precio\";i:3;s:5:\"stock\";i:4;s:15:\"subcategoria_id\";i:5;s:6:\"imagen\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:6:\"nombre\";i:1;s:12:\"categoria_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:23:\"App\\Models\\Subcategoria\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:13:\"subcategorias\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:6:{s:2:\"id\";i:4;s:12:\"categoria_id\";i:2;s:6:\"nombre\";s:14:\"Subcategoria 4\";s:11:\"descripcion\";N;s:10:\"created_at\";s:19:\"2024-11-07 01:37:14\";s:10:\"updated_at\";s:19:\"2024-11-07 01:37:14\";}s:11:\"\0*\0original\";a:6:{s:2:\"id\";i:4;s:12:\"categoria_id\";i:2;s:6:\"nombre\";s:14:\"Subcategoria 4\";s:11:\"descripcion\";N;s:10:\"created_at\";s:19:\"2024-11-07 01:37:14\";s:10:\"updated_at\";s:19:\"2024-11-07 01:37:14\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:9:\"productos\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:1:{i:0;O:19:\"App\\Models\\Producto\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:9:\"productos\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:9:{s:2:\"id\";i:10;s:15:\"subcategoria_id\";i:4;s:6:\"nombre\";s:11:\"Producto 10\";s:11:\"descripcion\";s:21:\"Producto 10 de prueba\";s:6:\"precio\";s:6:\"200.00\";s:5:\"stock\";i:70;s:6:\"imagen\";N;s:10:\"created_at\";s:19:\"2024-11-07 03:11:40\";s:10:\"updated_at\";s:19:\"2024-11-07 03:11:40\";}s:11:\"\0*\0original\";a:9:{s:2:\"id\";i:10;s:15:\"subcategoria_id\";i:4;s:6:\"nombre\";s:11:\"Producto 10\";s:11:\"descripcion\";s:21:\"Producto 10 de prueba\";s:6:\"precio\";s:6:\"200.00\";s:5:\"stock\";i:70;s:6:\"imagen\";N;s:10:\"created_at\";s:19:\"2024-11-07 03:11:40\";s:10:\"updated_at\";s:19:\"2024-11-07 03:11:40\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:6:{i:0;s:6:\"nombre\";i:1;s:11:\"descripcion\";i:2;s:6:\"precio\";i:3;s:5:\"stock\";i:4;s:15:\"subcategoria_id\";i:5;s:6:\"imagen\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:6:\"nombre\";i:1;s:12:\"categoria_id\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:1:{i:0;s:6:\"nombre\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 1731283236);

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
-- Estructura de tabla para la tabla `chats`
--

DROP TABLE IF EXISTS `chats`;
CREATE TABLE IF NOT EXISTS `chats` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `started_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ended_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chats_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `chats`
--

INSERT INTO `chats` (`id`, `user_id`, `started_at`, `ended_at`, `created_at`, `updated_at`) VALUES
(1, 6, '2024-11-11 01:07:02', '2024-11-11 01:08:54', '2024-11-11 01:07:02', '2024-11-11 01:08:54'),
(2, 1, '2024-11-11 01:19:15', '2024-11-11 01:21:18', '2024-11-11 01:19:15', '2024-11-11 01:21:18'),
(3, 1, '2024-11-11 01:21:18', '2024-11-11 01:23:38', '2024-11-11 01:21:18', '2024-11-11 01:23:38'),
(4, 3, '2024-11-11 04:58:08', '2024-11-11 04:59:15', '2024-11-11 04:58:08', '2024-11-11 04:59:15'),
(5, 3, '2024-11-11 04:59:15', '2024-11-11 05:00:09', '2024-11-11 04:59:15', '2024-11-11 05:00:09');

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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalle_ventas`
--

INSERT INTO `detalle_ventas` (`id`, `venta_id`, `producto_id`, `talla_id`, `cantidad`, `precio_unitario`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, 3, 100.00, '2024-10-28 06:43:01', '2024-10-28 06:43:01'),
(2, 2, 1, 5, 1, 100.00, '2024-10-28 14:21:37', '2024-10-28 14:21:37'),
(3, 3, 1, 4, 2, 100.00, '2024-11-06 21:03:17', '2024-11-06 21:03:17'),
(4, 3, 2, 6, 2, 200.00, '2024-11-06 21:03:17', '2024-11-06 21:03:17'),
(5, 3, 3, 7, 3, 300.00, '2024-11-06 21:03:17', '2024-11-06 21:03:17'),
(6, 4, 4, 5, 2, 100.00, '2024-11-07 08:30:15', '2024-11-07 08:30:15'),
(7, 4, 3, 7, 3, 300.00, '2024-11-07 08:30:15', '2024-11-07 08:30:15'),
(8, 5, 3, 5, 3, 300.00, '2024-11-11 02:18:23', '2024-11-11 02:18:23'),
(9, 5, 4, 5, 2, 100.00, '2024-11-11 02:18:23', '2024-11-11 02:18:23'),
(10, 6, 2, 5, 2, 200.00, '2024-11-11 02:18:46', '2024-11-11 02:18:46'),
(11, 6, 1, 5, 4, 100.00, '2024-11-11 02:18:46', '2024-11-11 02:18:46');

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
-- Estructura de tabla para la tabla `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `chat_id` bigint UNSIGNED NOT NULL,
  `sender` enum('user','bot') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `messages_chat_id_foreign` (`chat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`id`, `chat_id`, `sender`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 'user', 'hola', '2024-11-11 01:07:02', '2024-11-11 01:07:02'),
(2, 1, 'bot', 'Hola Ronald Yoel De La Cruz Verastegui. Bienvenido al servicio de atención al cliente de Sport Armor. ¿En qué puedo ayudarte hoy?\n', '2024-11-11 01:07:04', '2024-11-11 01:07:04'),
(3, 1, 'user', 'que productos de la categoria 1 hay disponibles?', '2024-11-11 01:07:40', '2024-11-11 01:07:40'),
(4, 1, 'bot', 'Hola Ronald Yoel De La Cruz Verastegui. En la Categoría 1 tenemos dos subcategorías: Subcategoría 1 y Subcategoría 2.\n\n**Subcategoría 1:**\n\n* **Producto 1:** Precio: $100.00, Stock: 47, Tallas: L, S, M, XL\n* **Producto 2:** Precio: $200.00, Stock: 198, Tallas: L, S, M, XL\n* **Producto 3:** Precio: $300.00, Stock: 244, Tallas: L, S, M, XL\n* **Producto 4:** Precio: $100.00, Stock: 98, Tallas: L, S, M, XL\n\n**Subcategoría 2:**\n\n* **Producto 5:** Precio: $200.00, Stock: 200\n* **Producto 6:** Precio: $350.00, Stock: 150\n* **Producto 7:** Precio: $500.00, Stock: 50\n* **Producto 8:** Precio: $450.00, Stock: 200\n\n¿Te interesa alguna subcategoría o producto en particular? Puedo darte más detalles.\n', '2024-11-11 01:07:47', '2024-11-11 01:07:47'),
(5, 1, 'user', 'producto 7', '2024-11-11 01:08:18', '2024-11-11 01:08:18'),
(6, 1, 'bot', 'Hola Ronald Yoel De La Cruz Verastegui. El Producto 7 pertenece a la Subcategoría 2 de la Categoría 1.  Tiene un precio de $500.00 y actualmente tenemos 50 unidades en stock.  Este producto no tiene tallas disponibles. ¿Te interesa realizar la compra o tienes alguna otra pregunta sobre este producto?\n', '2024-11-11 01:08:21', '2024-11-11 01:08:21'),
(7, 1, 'user', 'eso es todo', '2024-11-11 01:08:36', '2024-11-11 01:08:36'),
(8, 1, 'bot', 'Perfecto Ronald Yoel De La Cruz Verastegui. Gracias por contactarnos. Si tienes alguna otra consulta o decides que quieres comprar el Producto 7, no dudes en contactarnos de nuevo.  Puedes responder a este mensaje o escribirnos a nuestro correo de atención al cliente. Que tengas un buen día.\n', '2024-11-11 01:08:39', '2024-11-11 01:08:39'),
(9, 2, 'user', 'hola', '2024-11-11 01:19:16', '2024-11-11 01:19:16'),
(10, 2, 'bot', 'Hola Leonardo Guimaray. Bienvenido al servicio de atención al cliente de Sport Armor. ¿En qué puedo ayudarte hoy?\n', '2024-11-11 01:19:18', '2024-11-11 01:19:18'),
(11, 2, 'user', 'que categorias hay?', '2024-11-11 01:19:31', '2024-11-11 01:19:31'),
(12, 2, 'bot', 'Hola Leonardo Guimaray. Gracias por contactarte con Sport Armor.  Tenemos una amplia variedad de categorías para satisfacer tus necesidades deportivas.  Nuestras principales categorías incluyen:\n\n* **Ropa Deportiva:**  Aquí encontrarás camisetas, pantalones cortos, sudaderas, chaquetas, leggings y más, para hombres y mujeres,  diseñados para diferentes disciplinas como running, training, yoga, fútbol, baloncesto, etc.\n\n* **Calzado Deportivo:** Ofrecemos una gran selección de zapatillas para running, training, tenis, fútbol, baloncesto y otros deportes,  de marcas reconocidas por su calidad y tecnología.\n\n* **Accesorios:**  Complementa tu equipo con nuestra variedad de accesorios, incluyendo gorras, mochilas, calcetines,  muñequeras,  botellas de agua, guantes, y mucho más.\n\n* **Equipamiento:**  En esta categoría encontrarás equipamiento específico para diferentes deportes, como pelotas de fútbol, baloncesto, raquetas de tenis, pesas, bandas de resistencia, y otros artículos.\n\n* **Nutrición Deportiva:** Ofrecemos una selección de suplementos deportivos como proteínas, creatina, aminoácidos, y bebidas energéticas para ayudarte a alcanzar tus objetivos de rendimiento.\n\n* **Ofertas Especiales:**  Aquí encontrarás productos en oferta y promociones especiales.\n\n\n¿Te interesa alguna categoría en particular, Leonardo?  Dime qué deporte practicas o qué tipo de producto buscas, y te puedo ayudar a encontrar lo que necesitas.\n', '2024-11-11 01:19:38', '2024-11-11 01:19:38'),
(13, 2, 'user', 'que porductos tiene?', '2024-11-11 01:20:17', '2024-11-11 01:20:17'),
(14, 2, 'bot', 'Hola Leonardo Guimaray. Gracias por contactarnos nuevamente.  Como te mencioné antes, en Sport Armor tenemos una amplia gama de productos. Para ayudarte a encontrar lo que buscas de manera más eficiente, ¿podrías decirme qué tipo de producto te interesa?\n\nPor ejemplo, ¿estás buscando ropa, calzado, accesorios, equipamiento para un deporte específico o suplementos deportivos?\n\nMientras más detalles me puedas dar, mejor podré ayudarte.  \n\nTambién puedes explorar nuestras categorías principales:\n\n* **Ropa Deportiva:** Camisetas, pantalones cortos, sudaderas, chaquetas, leggings, etc. para hombres y mujeres.\n* **Calzado Deportivo:** Zapatillas para running, training, tenis, fútbol, baloncesto, etc.\n* **Accesorios:** Gorras, mochilas, calcetines, muñequeras, botellas de agua, guantes, etc.\n* **Equipamiento:** Pelotas, raquetas, pesas, bandas de resistencia, etc.\n* **Nutrición Deportiva:** Proteínas, creatina, aminoácidos, bebidas energéticas, etc.\n\nDime qué te interesa y con gusto te daré más información sobre los productos específicos que tenemos disponibles.\n', '2024-11-11 01:20:23', '2024-11-11 01:20:23'),
(15, 2, 'user', 'producto 1', '2024-11-11 01:20:34', '2024-11-11 01:20:34'),
(16, 2, 'bot', 'Hola Leonardo Guimaray, gracias por tu interés en el Producto 1.  Su precio es de $100.00 y actualmente tenemos 47 unidades en stock. Las tallas disponibles son L, S, M y XL.  ¿Te gustaría que te ayudara a realizar un pedido de este producto?  Si es así, por favor, dime qué talla te gustaría.\n', '2024-11-11 01:20:37', '2024-11-11 01:20:37'),
(17, 2, 'user', 'ahora si que categorias hay', '2024-11-11 01:21:02', '2024-11-11 01:21:02'),
(18, 2, 'bot', 'Hola Leonardo Guimaray, gracias por contactarnos nuevamente. En Sport Armor, te ofrecemos las siguientes categorías:\n\n* **Ropa Deportiva:**  Encontrarás camisetas, pantalones cortos, sudaderas, chaquetas, leggings, tops, y más, para hombres y mujeres. Diseñados para diferentes disciplinas como running, training, yoga, fútbol, baloncesto, etc.  También contamos con ropa de compresión y térmica.\n\n* **Calzado Deportivo:** Ofrecemos zapatillas para running, training, tenis, fútbol, baloncesto,  senderismo y otros deportes. Trabajamos con marcas reconocidas por su calidad y tecnología, con diferentes tipos de suela y amortiguación para adaptarse a tus necesidades.\n\n* **Accesorios:** Complementa tu equipo con gorras, mochilas, calcetines (deportivos, de compresión, etc.), muñequeras,  cinturones deportivos, botellas de agua, guantes, viseras, y mucho más.\n\n* **Equipamiento:**  Aquí encontrarás equipamiento específico para diferentes deportes, como pelotas de fútbol, baloncesto, voleibol, raquetas de tenis, bádminton,  pesas, bandas de resistencia, cuerdas de saltar,  y otros artículos.\n\n* **Nutrición Deportiva:** Ofrecemos suplementos como proteínas (whey protein, caseína, etc.), creatina, aminoácidos (BCAA, glutamina, etc.), bebidas energéticas, barras energéticas, y geles energéticos para ayudarte a alcanzar tus objetivos.\n\n* **Ofertas Especiales:**  Aquí encontrarás productos en oferta y promociones especiales que se actualizan periódicamente.\n\n\n¿Te interesa alguna categoría en particular? Si me dices qué deporte practicas o qué tipo de producto buscas, puedo ayudarte a encontrar lo que necesitas de forma más rápida.\n', '2024-11-11 01:21:11', '2024-11-11 01:21:11'),
(19, 3, 'user', 'necesito info de mi perfil', '2024-11-11 01:23:21', '2024-11-11 01:23:21'),
(20, 3, 'bot', 'Hola Leonardo Guimaray, gracias por contactarte con Sport Armor.\n\nPara brindarte información específica sobre tu perfil, necesito que me indiques qué tipo de información estás buscando.  Por ejemplo, podrías necesitar información sobre:\n\n* **Pedidos recientes:**  Puedo darte el estado de tus pedidos, fechas de envío estimadas y números de seguimiento.\n* **Información de envío:** Puedo confirmar tu dirección de envío y datos de contacto.\n* **Historial de compras:**  Puedo mostrarte un resumen de tus compras anteriores con Sport Armor.\n* **Métodos de pago guardados:** Puedo mostrarte los métodos de pago que tienes registrados en tu cuenta.\n* **Suscripciones:** Si estás suscrito a algún boletín o notificación, puedo informarte al respecto.\n* **Información de la cuenta:**  Puedo ayudarte a actualizar tu contraseña, correo electrónico u otros datos de tu perfil.\n\nPor favor, especifica qué información necesitas para que pueda ayudarte de la mejor manera posible.\n', '2024-11-11 01:23:26', '2024-11-11 01:23:26'),
(21, 4, 'user', 'hola', '2024-11-11 04:58:08', '2024-11-11 04:58:08'),
(22, 4, 'bot', 'Hola Juan Diego Molina Paz Alayo. Bienvenido al servicio de atención al cliente de Sport Armor. ¿En qué puedo ayudarte hoy?\n', '2024-11-11 04:58:10', '2024-11-11 04:58:10'),
(23, 4, 'user', 'que productos tienes?', '2024-11-11 04:58:17', '2024-11-11 04:58:17'),
(24, 4, 'bot', 'Hola Juan Diego Molina Paz Alayo. Actualmente, en Sport Armor ofrecemos las siguientes categorías y productos:\n\n**Categoría: Categoría 1**\n\n* **Subcategoría: Subcategoría 1**\n    * Producto 1: $100.00, Stock: 43 (Tallas: L, S, M, XL)\n    * Producto 2: $200.00, Stock: 196 (Tallas: L, S, M, XL)\n    * Producto 3: $300.00, Stock: 241 (Tallas: L, S, M, XL)\n    * Producto 4: $100.00, Stock: 96 (Tallas: L, S, M, XL)\n\n* **Subcategoría: Subcategoría 2**\n    * Producto 5: $200.00, Stock: 200\n    * Producto 6: $350.00, Stock: 150\n    * Producto 7: $500.00, Stock: 50\n    * Producto 8: $450.00, Stock: 200\n\n\n**Categoría: Categoría 2**\n\n* **Subcategoría: Subcategoría 3**\n    * Producto 9: $100.00, Stock: 100\n\n* **Subcategoría: Subcategoría 4**\n    * Producto 10: $200.00, Stock: 70\n\n\n¿Te interesa alguna categoría o producto en particular? Puedo darte más detalles si me dices qué te gustaría ver.\n', '2024-11-11 04:58:26', '2024-11-11 04:58:26'),
(25, 4, 'user', 'producto 9', '2024-11-11 04:58:37', '2024-11-11 04:58:37'),
(26, 4, 'bot', 'Hola Juan Diego Molina Paz Alayo. El Producto 9 pertenece a la Categoría 2, Subcategoría 3. Tiene un precio de $100.00 y actualmente tenemos 100 unidades en stock.  Este producto no tiene tallas disponibles. ¿Te gustaría añadirlo a tu carrito de compras o tienes alguna otra pregunta sobre este producto?\n', '2024-11-11 04:58:40', '2024-11-11 04:58:40'),
(27, 4, 'user', 'añadir a mi carrito de compraas', '2024-11-11 04:58:53', '2024-11-11 04:58:53'),
(28, 4, 'bot', 'Hola Juan Diego Molina Paz Alayo. He añadido el Producto 9 a tu carrito de compras.  El precio del Producto 9 es de $100.00 y hay 100 unidades disponibles.  Tu carrito contiene ahora:\n\n* 1 x Producto 9 ($100.00)\n\nTotal: $100.00\n\n¿Te gustaría añadir algo más a tu carrito, proceder al pago o tienes alguna otra pregunta?\n', '2024-11-11 04:58:56', '2024-11-11 04:58:56'),
(29, 5, 'user', 'puedes agregar productos a mi carrito de compras?', '2024-11-11 04:59:36', '2024-11-11 04:59:36'),
(30, 5, 'bot', 'Hola Juan Diego Molina Paz Alayo (juandiego@ronaldinho.com), gracias por contactarte con Sport Armor.\n\nClaro que sí, puedo ayudarte a agregar productos a tu carrito de compras.  Para hacerlo, necesito que me indiques qué productos y en qué talla (si aplica) te gustaría añadir.\n\nPor ejemplo, podrías decirme:\n\n* \"Agregar Producto 1, talla M\"\n* \"Agregar 2 unidades de Producto 2, talla L\"\n* \"Agregar Producto 5\" (en este caso, el producto no tiene tallas disponibles)\n\n\nDime qué te gustaría agregar y lo añadiré a tu carrito.  Recuerda que puedes consultar la lista de productos y sus detalles arriba.\n', '2024-11-11 04:59:41', '2024-11-11 04:59:41');

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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(12, '2024_10_28_091722_add_user_id_to_ventas_table', 4),
(13, '2024_11_10_190842_create_chats_table', 5),
(14, '2024_11_10_190916_create_messages_table', 5);

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
  `imagen` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `productos_subcategoria_id_foreign` (`subcategoria_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `subcategoria_id`, `nombre`, `descripcion`, `precio`, `stock`, `imagen`, `created_at`, `updated_at`) VALUES
(1, 1, 'Producto 1', 'Producto 1 de prueba', 100.00, 43, '1730058479_671e98eff1ed7.webp', '2024-10-27 15:07:12', '2024-11-11 02:18:46'),
(2, 1, 'Producto 2', 'Producto 2 de prueba', 200.00, 196, '1730058521_671e9919192fa.jpg', '2024-10-28 00:38:01', '2024-11-11 02:18:46'),
(3, 1, 'Producto 3', 'Producto 3 de prueba', 300.00, 241, '1730058571_671e994b9951f.png', '2024-10-28 00:49:31', '2024-11-11 02:18:23'),
(4, 1, 'Producto 4', 'Producto 4 de prueba', 100.00, 96, '1730944543_672c1e1f4d374.jpg', '2024-11-07 06:55:43', '2024-11-11 02:18:23'),
(5, 2, 'Producto 5', 'Producto 5 de prueba', 200.00, 200, '1730944589_672c1e4da1daf.jpeg', '2024-11-07 06:56:29', '2024-11-07 06:56:29'),
(6, 2, 'Producto 6', 'Producto 6 de prueba', 350.00, 150, NULL, '2024-11-07 07:10:48', '2024-11-07 07:10:48'),
(7, 2, 'Producto 7', 'Producto 7 de prueba', 500.00, 50, NULL, '2024-11-07 08:08:28', '2024-11-07 08:08:28'),
(8, 2, 'Producto 8', 'Producto 8 de prueba', 450.00, 200, NULL, '2024-11-07 08:09:03', '2024-11-07 08:09:03'),
(9, 3, 'Producto 9', 'Producto 9 de prueba', 100.00, 100, NULL, '2024-11-07 08:09:31', '2024-11-07 08:09:40'),
(10, 4, 'Producto 10', 'Producto 10 de prueba', 200.00, 70, NULL, '2024-11-07 08:11:40', '2024-11-07 08:11:40');

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
('JpoSI9eYMqu9fcvqNJyic1A6yjm7IZrFi7oT8Btp', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWHRUajVLYkRlYnRBS2d4YnY2NWF4UlRoODVkbmw4WU5zYzQ5T040diI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1731283209);

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`id`, `categoria_id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 1, 'Subcategoria 1', NULL, '2024-10-27 14:11:02', '2024-10-27 14:11:02'),
(2, 1, 'Subcategoria 2', NULL, '2024-11-07 02:28:59', '2024-11-07 02:28:59'),
(3, 2, 'Subcategoria 3', NULL, '2024-11-07 06:37:06', '2024-11-07 06:37:06'),
(4, 2, 'Subcategoria 4', NULL, '2024-11-07 06:37:14', '2024-11-07 06:37:14');

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `profile_image`) VALUES
(1, 'Leonardo Guimaray', 'leonarditojavi@gmail.com', NULL, '$2y$12$t4aHfL5YOEuG9KA6cz8Dkud5g8aqjCIYU.Tfb1CtRQ6J0nH7iRz3W', 'JaNEce8dE4ovymxbrPBZtDh677AvZpzuCcikhxYnIKrWpGud4ftXUNCzO9Xl', '2024-10-28 10:12:42', '2024-11-06 22:27:55', 'superadmin', '1730914075_1.png'),
(2, 'Ronald Lenner Molina Quiroz', 'molinita@lenner.com', NULL, '$2y$12$5pzPujbLx5dGHUcJT..tle7etvhXnfbMsv8kdCN8TYHBFgt70/Ncm', 'cXrBYbNtTgKJtmHANrAEGqrzx3qEClLqWp0vIWvKtRG77Jcrz1xWt50fvB9N', '2024-10-28 14:08:53', '2024-11-11 02:24:14', 'cliente', '1730914149_2.png'),
(3, 'Juan Diego Molina Paz Alayo', 'juandiego@ronaldinho.com', NULL, '$2y$12$oD/lse12CIUgRCMjsZSjW.Apz0MOPeaKElPR1pT5AgEAxm.0pk4o2', NULL, '2024-11-06 02:35:44', '2024-11-06 02:37:35', 'admin', ''),
(4, 'Diego Vásquez Jaramillo', 'diegovasquez@gmail.com', NULL, '$2y$12$sTqyDPUibF7aDvDkNniyOOkzUKrPmSLZablvLkPcW2LEPNVRYGOu.', NULL, '2024-11-06 03:57:26', '2024-11-06 03:57:26', 'admin', ''),
(5, 'adminlg', 'adminlg@gmail.com', NULL, '$2y$12$pensao1Y3hXSe6myq0mlRO/mZwuStxcBj6EBacznIoGf1lZKTnD.6', NULL, '2024-11-06 03:59:05', '2024-11-07 02:26:57', 'superadmin', '1730928417_5.jpg'),
(6, 'Ronald Yoel De La Cruz Verastegui', 'ronaldyoel@gmail.com', NULL, '$2y$12$mLOR9TUV9LMBG8aG29.eqO2a2VWVkn2h/TECyqjDu/uWAvwttV8Va', NULL, '2024-11-06 04:01:50', '2024-11-06 04:01:50', 'cliente', ''),
(7, 'Lenner Solorzano Villacorta', 'lennersolorzano@gmail.com', NULL, '$2y$12$.dXDYRU2Ior2GQE02AF1hOYRCs.Gful7RR0RnmBv/c0SZqQzXqJ7u', NULL, '2024-11-06 09:55:51', '2024-11-10 08:35:01', 'cliente', '1731209701_7.jpg'),
(8, 'Ronald Verastegui Chavez de la Torres', 'ronaldvga@gmail.com', NULL, '$2y$12$mRR7ll0YoTiNLHvziWcnGunAmT35OohGeAkNWoLWzbdnJg7KInFlO', NULL, '2024-11-06 20:56:37', '2024-11-06 20:56:37', 'admin', ''),
(9, 'Christhian Andreduardo Verastegui Jondec', 'crisandredu@gmail.com', NULL, '$2y$12$57fGDgULU5BCLgbMfZqWoOe/uU0s517DtKy87Ghf6zyrsD/4istD2', NULL, '2024-11-07 01:58:54', '2024-11-07 02:23:35', 'cliente', '1730928157_9.jpg'),
(10, 'Daniel Armas Mego', 'danielarmas@gmail.com', NULL, '$2y$12$loipV6QTeTjJS2/NxkKp.eNVjf.2UPm3SDJK3RnK0zSv08gVbABLi', NULL, '2024-11-10 12:14:30', '2024-11-11 01:09:53', 'cliente', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `fecha_venta`, `cupon_id`, `total`, `created_at`, `updated_at`, `user_id`) VALUES
(1, '2024-10-28 01:43:01', 1, 150.00, '2024-10-28 06:43:01', '2024-10-28 06:43:01', NULL),
(2, '2024-10-28 09:21:37', NULL, 100.00, '2024-10-28 14:21:37', '2024-10-28 14:21:37', 2),
(3, '2024-11-06 16:03:17', 3, 0.00, '2024-11-06 21:03:17', '2024-11-06 21:03:17', 2),
(4, '2024-11-07 03:30:15', NULL, 1100.00, '2024-11-07 08:30:15', '2024-11-07 08:30:15', 1),
(5, '2024-11-10 21:18:23', NULL, 1100.00, '2024-11-11 02:18:23', '2024-11-11 02:18:23', 7),
(6, '2024-11-10 21:18:46', NULL, 800.00, '2024-11-11 02:18:46', '2024-11-11 02:18:46', 7);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
