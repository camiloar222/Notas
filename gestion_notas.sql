-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2024 a las 03:00:37
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
-- Base de datos: `gestion_notas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estudiante` varchar(50) NOT NULL,
  `materia` varchar(50) NOT NULL,
  `nota1` decimal(2,1) NOT NULL CHECK (`nota1` between 1 and 5),
  `nota2` decimal(2,1) NOT NULL CHECK (`nota2` between 1 and 5),
  `nota3` decimal(2,1) NOT NULL CHECK (`nota3` between 1 and 5),
  `definitiva` decimal(3,2) GENERATED ALWAYS AS ((`nota1` + `nota2` + `nota3`) / 3) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `nombre`, `estudiante`, `materia`, `nota1`, `nota2`, `nota3`) VALUES
(7, 'Camilo ', '12', 'Fisica', 2.0, 3.0, 5.0),
(8, 'Camilo', '12', 'Fisica', 2.0, 4.0, 5.0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
