-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-04-2016 a las 04:55:42
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `granja`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animal`
--

CREATE TABLE IF NOT EXISTS `animal` (
  `ani_id` int(11) NOT NULL,
  `ani_rp` varchar(20) NOT NULL,
  `ani_nombre` varchar(50) NOT NULL,
  `ani_padre` int(11) NOT NULL,
  `ani_madre` int(11) NOT NULL,
  `ani_fechanac` datetime NOT NULL,
  `ani_fechareg` datetime NOT NULL,
  `ani_sexo` int(11) NOT NULL,
  `ani_proveedor` varchar(50) NOT NULL,
  `ani_tiporeg` int(11) NOT NULL,
  `ani_especie` int(11) NOT NULL,
  `ani_raza` int(11) NOT NULL,
  `ani_descripcion` text NOT NULL,
  `ani_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especie`
--

CREATE TABLE IF NOT EXISTS `especie` (
  `esp_id` int(11) NOT NULL,
  `esp_descripcion` varchar(100) NOT NULL,
  `esp_abreviacion` varchar(50) NOT NULL,
  `esp_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raza`
--

CREATE TABLE IF NOT EXISTS `raza` (
  `raz_id` int(11) NOT NULL,
  `raz_descripcion` varchar(150) NOT NULL,
  `raz_abreviacion` varchar(50) NOT NULL,
  `raz_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_registro`
--

CREATE TABLE IF NOT EXISTS `tipo_registro` (
  `tipreg_id` int(11) NOT NULL,
  `tipreg_descripcion` varchar(50) NOT NULL,
  `tipreg_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `animal`
--
ALTER TABLE `animal`
 ADD PRIMARY KEY (`ani_id`);

--
-- Indices de la tabla `raza`
--
ALTER TABLE `raza`
 ADD PRIMARY KEY (`raz_id`);

--
-- Indices de la tabla `tipo_registro`
--
ALTER TABLE `tipo_registro`
 ADD PRIMARY KEY (`tipreg_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
