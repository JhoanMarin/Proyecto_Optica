-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-03-2024 a las 16:40:37
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `historias_clinicas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estratos`
--

CREATE TABLE `estratos` (
  `est_id` int(11) NOT NULL,
  `est_nombre` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `estratos`
--

INSERT INTO `estratos` (`est_id`, `est_nombre`) VALUES
(1, 'Estrato 1'),
(2, 'Estrato 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `pac_id` int(11) NOT NULL,
  `pac_docum` int(11) NOT NULL,
  `pac_nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `pac_apellido` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `pac_direccion` varchar(70) COLLATE utf8_spanish2_ci NOT NULL,
  `pac_telefono` bigint(20) NOT NULL,
  `est_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`pac_id`, `pac_docum`, `pac_nombre`, `pac_apellido`, `pac_direccion`, `pac_telefono`, `est_id`) VALUES
(1, 1234, 'Sofia', 'Lopez', 'calle 60', 3100020303, 1),
(2, 1234, 'Sofia', 'Lopez', 'calle 23', 3152211010, 1),
(3, 2147483647, 'Jhoan', 'Marin', 'CL 80 E    26 C  60', 3147600638, 1),
(4, 314563298, 'Carlos', 'Mosquera', 'CL 80 E    26 C  60', 4563278, 1),
(5, 12345, 'Sara', 'Rodriguez', 'calle 90 45', 36548129, 1),
(6, 12345, 'Zharick', 'Velez', 'calle 100#89', 32145598, 1),
(7, 12345, 'Zharick', 'Velez', 'calle 100#89', 78954, 1),
(8, 46982, 'Brahian', 'Balanta', 'carrera 85 #78', 3265478, 1),
(9, 4562, 'Stefany', 'Perez', 'CL 80 E # 26 C - 60', 789642, 1),
(10, 896254, 'Samantha', 'Lopez', 'avenida 4 Norte # 65-45', 4563278, 1),
(11, 4569874, 'Esteban', 'Collazos', 'Calle 73#34-56', 320789652, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `rol_id` int(11) NOT NULL,
  `rol_nombre` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`rol_id`, `rol_nombre`) VALUES
(1, 'administrador'),
(2, 'optometra'),
(3, 'Medico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usu_id` int(11) NOT NULL,
  `usu_nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `usu_docum` int(11) NOT NULL,
  `usu_clave` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usu_id`, `usu_nombre`, `usu_docum`, `usu_clave`, `rol_id`) VALUES
(1, 'Pepito Pérez', 1140521110, 'cl101020', 1),
(2, 'Juan', 123456789, 'password123', 1),
(3, '', 0, '', 0),
(4, 'Juan', 123456789, 'password123', 1),
(5, 'Juan', 123456789, 'password123', 1),
(6, 'Juan', 123456789, 'password123', 1),
(7, 'Juan', 123456789, 'password123', 1),
(8, 'Juan', 123456789, 'password123', 1),
(9, 'Juan', 123456789, 'password123', 1),
(10, 'Juan', 123456789, 'password123', 1),
(11, 'Juan', 123456789, 'password123', 1),
(12, 'Juan', 123456789, 'password123', 1),
(13, 'Juan', 123456789, 'password123', 1),
(14, 'lucas', 12345, '4567', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estratos`
--
ALTER TABLE `estratos`
  ADD PRIMARY KEY (`est_id`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`pac_id`),
  ADD KEY `est_id` (`est_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usu_id`),
  ADD KEY `FOREIGN KEY` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estratos`
--
ALTER TABLE `estratos`
  MODIFY `est_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `pac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
