-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-10-2022 a las 22:02:50
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cinema_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(3) NOT NULL,
  `genero_Detalle` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `genero_Detalle`) VALUES
(1, 'Comedia'),
(2, 'Drama'),
(3, 'Romance'),
(4, 'Terror'),
(5, 'Suspenso'),
(6, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(5) NOT NULL,
  `titulo` varchar(32) NOT NULL,
  `actores` varchar(64) NOT NULL,
  `director` varchar(32) NOT NULL,
  `guion` varchar(32) NOT NULL,
  `produccion` varchar(22) NOT NULL,
  `anio` date NOT NULL,
  `nacionalidad` varchar(22) NOT NULL,
  `id_genero` int(3) NOT NULL,
  `duracion` int(3) NOT NULL,
  `id_restric` int(3) NOT NULL,
  `sinopsis` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `titulo`, `actores`, `director`, `guion`, `produccion`, `anio`, `nacionalidad`, `id_genero`, `duracion`, `id_restric`, `sinopsis`) VALUES
(1, 'Volver al Futuro', 'Michael J. Fox, Christopher Lloyd', 'Robert Zemeckis', 'Robert Zemeckis, Bob Gale', 'Neil Canton, Bob Gale', '1985-07-03', 'Estados Unidos', 1, 117, 1, 'Marty McFly es un adolescente amigo de Doc, un científico a los que todos menos él toman por chiflado. Cuando Doc crea una máquina para viajar en el tiempo en forma de un automóvil deportivo, Marty viaja accidentalmente al año 1955.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restric`
--

CREATE TABLE `restric` (
  `id_restric` int(3) NOT NULL,
  `restric_detalle` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `restric`
--

INSERT INTO `restric` (`id_restric`, `restric_detalle`) VALUES
(1, 'Todo publico'),
(2, 'Mayores de 7 Años'),
(3, 'Mayores de 18 Años');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_genero` (`id_genero`),
  ADD KEY `id_restric` (`id_restric`);

--
-- Indices de la tabla `restric`
--
ALTER TABLE `restric`
  ADD PRIMARY KEY (`id_restric`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`) ON UPDATE CASCADE,
  ADD CONSTRAINT `peliculas_ibfk_2` FOREIGN KEY (`id_restric`) REFERENCES `restric` (`id_restric`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
