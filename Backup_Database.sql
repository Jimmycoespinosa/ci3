-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-02-2023 a las 20:54:54
-- Versión del servidor: 8.0.32-0ubuntu0.20.04.2
-- Versión de PHP: 7.4.3-4ubuntu2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ci3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
    `id` int NOT NULL AUTO_INCREMENT,
    `code` varchar(10) DEFAULT NULL,
    `name` varchar(100) NOT NULL,
    `email` varchar(100) NOT NULL,
    `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `deleted_at` datetime DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT IGNORE INTO `users` (`id`, `code`, `name`, `email`, `created_at`, `update_at`, `deleted_at`) VALUES
(6, 'ES6', 'Andrea', 'andrea@hotmail.com', '2023-02-13 14:36:54', '2023-02-13 14:36:54', NULL),
(7, 'ES7', 'Katuchis', 'katha@yahoo.com', '2023-02-13 14:37:10', '2023-02-16 20:12:34', NULL),
(8, 'ES8', 'Juan David', 'david@gmail.com', '2023-02-13 14:37:27', '2023-02-16 20:24:31', NULL),
(9, 'ES9', 'Saul', 'saul@gmail.com', '2023-02-14 18:49:35', '2023-02-16 20:35:22', NULL),
(10, NULL, 'Lucila', 'lucila@gmail.com', '2023-02-14 18:51:12', '2023-02-14 18:51:12', NULL),
(11, NULL, 'Shannita', 'shana@gmail.com', '2023-02-14 20:12:42', '2023-02-14 20:12:42', NULL),
(12, NULL, 'Tommy', 'tommy@gmail.com', '2023-02-14 20:14:00', '2023-02-14 20:14:00', NULL),
(13, NULL, 'Guizmo', 'guizmo@hotmail.com', '2023-02-14 20:14:40', '2023-02-14 20:14:40', NULL),
(14, NULL, 'Jimmyco', 'jimmycoespinosa@gmail.com', '2023-02-15 20:59:58', '2023-02-15 20:59:58', NULL),
(15, NULL, 'Tonny', 'tonny@gmail.com', '2023-02-16 11:39:18', '2023-02-16 11:39:18', NULL),
(21, 'ES21', 'Test3', 'test3@gmail.com', '2023-02-16 14:52:09', '2023-02-16 14:52:09', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
