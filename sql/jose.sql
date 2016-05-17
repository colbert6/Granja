-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-05-2016 a las 17:06:23
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
-- Estructura de tabla para la tabla `aborto`
--

CREATE TABLE IF NOT EXISTS `aborto` (
`ab_id` int(11) NOT NULL,
  `ab_animal` int(11) DEFAULT NULL,
  `ab_causa_aborto` int(11) DEFAULT NULL,
  `ab_fecha_evento` datetime DEFAULT NULL,
  `ab_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aborto`
--

INSERT INTO `aborto` (`ab_id`, `ab_animal`, `ab_causa_aborto`, `ab_fecha_evento`, `ab_estado`) VALUES
(1, 1, 1, '2016-01-02 00:00:00', 1),
(2, 1, 1, '2016-03-06 00:00:00', 1),
(3, 1, 1, '2016-01-04 00:00:00', 1),
(4, 1, 1, '2015-02-06 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `analisis`
--

CREATE TABLE IF NOT EXISTS `analisis` (
`ana_id` int(11) NOT NULL,
  `ana_tipo_analisis` int(11) DEFAULT NULL,
  `ana_animal` int(11) DEFAULT NULL,
  `ana_fecha_evento` datetime DEFAULT NULL,
  `ana_resul_analisis` int(11) DEFAULT NULL,
  `ana_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `ani_raza` int(11) NOT NULL,
  `ani_descripcion` text NOT NULL,
  `ani_estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `animal`
--

INSERT INTO `animal` (`ani_id`, `ani_rp`, `ani_nombre`, `ani_padre`, `ani_madre`, `ani_fechanac`, `ani_fechareg`, `ani_sexo`, `ani_proveedor`, `ani_raza`, `ani_descripcion`, `ani_estado`) VALUES
(1, '234', 'Ganado1', 2, 3, '2016-04-30 00:00:00', '2016-04-30 00:00:00', 1, 'sergio', 1, 'ro', 1),
(2, '87678', 'Ganado2', 12, 13, '2016-04-29 00:00:00', '2016-04-29 00:00:00', 14, 'diego', 2, 'sdf', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE IF NOT EXISTS `auditoria` (
`aud_id` int(11) NOT NULL,
  `aud_tipo` varchar(100) NOT NULL,
  `aud_tabla` varchar(100) NOT NULL,
  `aud_fecha` datetime NOT NULL,
  `aud_usuario` int(11) NOT NULL,
  `aud_descripcion` varchar(200) NOT NULL,
  `aud_host` varchar(100) NOT NULL,
  `aud_registro` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=353 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `auditoria`
--

INSERT INTO `auditoria` (`aud_id`, `aud_tipo`, `aud_tabla`, `aud_fecha`, `aud_usuario`, `aud_descripcion`, `aud_host`, `aud_registro`) VALUES
(1, 'modificar', 'Razas', '0000-00-00 00:00:00', 1, '', 'Colbert', 2),
(2, 'modificar', 'Razas', '0000-00-00 00:00:00', 1, '', 'Colbert', 1),
(3, 'insertar', 'Razas', '2016-05-08 18:16:27', 1, '', 'Colbert', 3),
(4, 'cerrar sesion', 'login', '2016-05-08 19:42:47', 1, '', 'Colbert', 1),
(5, 'inciar sesion', 'login', '2016-05-08 19:43:09', 3, '', 'Colbert', 2),
(6, 'insertar', 'modulo', '2016-05-08 19:46:07', 3, '', 'Colbert', 0),
(7, 'insertar', 'modulo', '2016-05-08 19:49:03', 3, '', 'Colbert', 0),
(8, 'insertar', 'modulo', '2016-05-08 19:49:39', 3, '', 'Colbert', 0),
(9, 'insertar', 'modulo', '2016-05-08 19:50:24', 3, '', 'Colbert', 0),
(10, 'insertar', 'modulo', '2016-05-08 19:51:32', 3, '', 'Colbert', 0),
(11, 'insertar', 'modulo', '2016-05-08 19:53:03', 3, '', 'Colbert', 0),
(12, 'insertar', 'modulo', '2016-05-08 19:56:50', 3, '', 'Colbert', 58),
(13, 'insertar', 'modulo', '2016-05-08 19:58:05', 3, '', 'Colbert', 59),
(14, 'modificar', 'permiso', '2016-05-08 19:58:15', 3, '', 'Colbert', 1),
(15, 'cerrar sesion', 'login', '2016-05-08 19:58:41', 3, '', 'Colbert', 3),
(16, 'inciar sesion', 'login', '2016-05-08 19:58:49', 1, '', 'Colbert', 1),
(17, 'insertar', 'usuario', '2016-05-08 20:09:41', 1, '', 'Colbert', 3),
(18, 'modificar', 'usuario', '2016-05-08 20:11:32', 1, '', 'Colbert', 3),
(19, 'eliminar', 'usuario', '2016-05-08 20:11:41', 1, '', 'Colbert', 3),
(20, 'modificar', 'modulo', '2016-05-08 20:12:06', 1, '', 'Colbert', 59),
(21, 'modificar', 'modulo', '2016-05-08 20:12:23', 1, '', 'Colbert', 59),
(22, 'insertar', 'tipo_usuario', '2016-05-08 20:12:40', 1, '', 'Colbert', 0),
(23, 'insertar', 'tipo_usuario', '2016-05-08 20:13:38', 1, '', 'Colbert', 5),
(24, 'insertar', 'tipo_usuario', '2016-05-08 20:14:49', 1, '', 'Colbert', 6),
(25, 'insertar', 'tipo_usuario', '2016-05-08 20:14:53', 1, '', 'Colbert', 7),
(26, 'insertar', 'tipo_usuario', '2016-05-08 20:15:35', 1, '', 'Colbert', 8),
(27, 'eliminar', 'tipo_usuario', '2016-05-08 20:19:04', 1, '', 'Colbert', 6),
(28, 'eliminar', 'tipo_usuario', '2016-05-08 20:20:56', 1, '', 'Colbert', 8),
(29, 'eliminar', 'tipo_usuario', '2016-05-08 20:21:12', 1, '', 'Colbert', 7),
(30, 'eliminar', 'tipo_usuario', '2016-05-08 20:21:14', 1, '', 'Colbert', 5),
(31, 'eliminar', 'tipo_usuario', '2016-05-08 20:21:55', 1, '', 'Colbert', 4),
(32, 'modificar', 'modulo', '2016-05-08 22:04:10', 1, '', 'Colbert', 11),
(33, 'modificar', 'modulo', '2016-05-08 22:04:24', 1, '', 'Colbert', 11),
(34, 'modificar', 'tipo_usuario', '2016-05-08 22:05:51', 1, '', 'Colbert', 8),
(35, 'modificar', 'raza', '2016-05-08 22:09:48', 1, '', 'Colbert', 2),
(36, 'inciar sesion', 'login', '2016-05-08 22:17:32', 1, '', 'Colbert', 1),
(37, 'modificar', 'modulo', '2016-05-08 22:30:36', 1, '', 'Colbert', 12),
(38, 'modificar', 'modulo', '2016-05-08 22:30:54', 1, '', 'Colbert', 16),
(39, 'modificar', 'modulo', '2016-05-08 22:31:03', 1, '', 'Colbert', 21),
(40, 'modificar', 'modulo', '2016-05-08 22:31:12', 1, '', 'Colbert', 15),
(41, 'modificar', 'modulo', '2016-05-08 22:31:29', 1, '', 'Colbert', 17),
(42, 'modificar', 'modulo', '2016-05-08 22:31:43', 1, '', 'Colbert', 22),
(43, 'modificar', 'modulo', '2016-05-08 22:32:19', 1, '', 'Colbert', 23),
(44, 'modificar', 'modulo', '2016-05-08 22:32:27', 1, '', 'Colbert', 18),
(45, 'modificar', 'modulo', '2016-05-08 22:32:36', 1, '', 'Colbert', 24),
(46, 'modificar', 'modulo', '2016-05-08 22:32:44', 1, '', 'Colbert', 25),
(47, 'modificar', 'modulo', '2016-05-08 22:33:07', 1, '', 'Colbert', 32),
(48, 'modificar', 'modulo', '2016-05-08 22:33:28', 1, '', 'Colbert', 26),
(49, 'modificar', 'modulo', '2016-05-08 22:33:44', 1, '', 'Colbert', 27),
(50, 'modificar', 'modulo', '2016-05-08 22:34:00', 1, '', 'Colbert', 28),
(51, 'modificar', 'modulo', '2016-05-08 22:34:15', 1, '', 'Colbert', 37),
(52, 'modificar', 'modulo', '2016-05-08 22:34:27', 1, '', 'Colbert', 29),
(53, 'inciar sesion', 'login', '2016-05-09 08:56:03', 1, '', 'Colbert', 1),
(54, 'cerrar sesion', 'login', '2016-05-09 09:37:44', 1, '', 'Colbert', 1),
(55, 'inciar sesion', 'login', '2016-05-09 10:07:51', 1, '', 'Colbert', 1),
(56, 'modificar', 'modulo', '2016-05-09 10:32:35', 1, '', 'Colbert', 1),
(57, 'modificar', 'raza', '2016-05-09 10:34:29', 1, '', 'Colbert', 1),
(58, 'modificar', 'raza', '2016-05-09 10:34:40', 1, '', 'Colbert', 2),
(59, 'modificar', 'raza', '2016-05-09 10:34:48', 1, '', 'Colbert', 3),
(60, 'modificar', 'tipo_registro', '2016-05-09 10:37:34', 1, '', 'Colbert', 1),
(61, 'modificar', 'tipo_registro', '2016-05-09 10:37:41', 1, '', 'Colbert', 3),
(62, 'modificar', 'tipo_registro', '2016-05-09 10:37:48', 1, '', 'Colbert', 4),
(63, 'modificar', 'tipo_registro', '2016-05-09 10:37:55', 1, '', 'Colbert', 5),
(64, 'insertar', 'medi_cuartos_mamarios', '2016-05-09 10:49:29', 1, '', 'Colbert', 1),
(65, 'insertar', 'medi_cuartos_mamarios', '2016-05-09 10:49:43', 1, '', 'Colbert', 2),
(66, 'modificar', 'medi_cuartos_mamarios', '2016-05-09 10:49:53', 1, '', 'Colbert', 2),
(67, 'modificar', 'medi_cuartos_mamarios', '2016-05-09 10:50:30', 1, '', 'Colbert', 2),
(68, 'eliminar', 'modulo', '2016-05-09 10:51:09', 1, '', 'Colbert', 10),
(69, 'insertar', 'medicina_genital', '2016-05-09 10:51:54', 1, '', 'Colbert', 1),
(70, 'insertar', 'medicina_genital', '2016-05-09 10:52:03', 1, '', 'Colbert', 2),
(71, 'modificar', 'medicina_genital', '2016-05-09 10:52:07', 1, '', 'Colbert', 2),
(72, 'insertar', 'personal', '2016-05-09 11:17:09', 1, '', 'Colbert', 2),
(73, 'modificar', 'personal', '2016-05-09 11:23:04', 1, '', 'Colbert', 1),
(74, 'insertar', 'personal', '2016-05-09 11:26:49', 1, '', 'Colbert', 3),
(75, 'insertar', 'personal', '2016-05-09 11:28:34', 1, '', 'Colbert', 4),
(76, 'insertar', 'personal', '2016-05-09 11:28:50', 1, '', 'Colbert', 5),
(77, 'insertar', 'reproductor', '2016-05-09 11:29:15', 1, '', 'Colbert', 1),
(78, 'insertar', 'reproductor', '2016-05-09 11:29:40', 1, '', 'Colbert', 2),
(79, 'insertar', 'tipo_analisis', '2016-05-09 11:30:49', 1, '', 'Colbert', 1),
(80, 'insertar', 'tipo_analisis', '2016-05-09 11:31:02', 1, '', 'Colbert', 2),
(81, 'modificar', 'tipo_analisis', '2016-05-09 11:31:07', 1, '', 'Colbert', 2),
(82, 'modificar', 'tipo_analisis', '2016-05-09 11:31:16', 1, '', 'Colbert', 2),
(83, 'insertar', 'personal', '2016-05-09 11:42:57', 1, '', 'Colbert', 6),
(84, 'insertar', 'tipo_enfermedad', '2016-05-09 11:43:23', 1, '', 'Colbert', 1),
(85, 'insertar', 'tipo_enfermedad', '2016-05-09 11:43:35', 1, '', 'Colbert', 2),
(86, 'insertar', 'tipo_parto', '2016-05-09 11:45:43', 1, '', 'Colbert', 1),
(87, 'insertar', 'tipo_parto', '2016-05-09 11:45:57', 1, '', 'Colbert', 2),
(88, 'insertar', 'tipo_servicio', '2016-05-09 11:46:19', 1, '', 'Colbert', 1),
(89, 'insertar', 'tipo_servicio', '2016-05-09 11:46:29', 1, '', 'Colbert', 2),
(90, 'modificar', 'modulo', '2016-05-09 11:46:52', 1, '', 'Colbert', 19),
(91, 'insertar', 'causa_aborto', '2016-05-09 11:47:11', 1, '', 'Colbert', 1),
(92, 'insertar', 'causa_aborto', '2016-05-09 11:47:20', 1, '', 'Colbert', 2),
(93, 'modificar', 'modulo', '2016-05-09 11:47:58', 1, '', 'Colbert', 20),
(94, 'insertar', 'modulo', '2016-05-09 11:51:10', 1, '', 'Colbert', 60),
(95, 'insertar', 'causa_no_inseminal', '2016-05-09 12:04:15', 1, '', 'Colbert', 1),
(96, 'insertar', 'causa_no_inseminal', '2016-05-09 12:04:21', 1, '', 'Colbert', 2),
(97, 'insertar', 'causa_rechazo', '2016-05-09 12:04:46', 1, '', 'Colbert', 1),
(98, 'insertar', 'causa_rechazo', '2016-05-09 12:04:51', 1, '', 'Colbert', 2),
(99, 'insertar', 'diagnostico_utero', '2016-05-09 12:05:21', 1, '', 'Colbert', 1),
(100, 'insertar', 'diagnostico_utero', '2016-05-09 12:05:26', 1, '', 'Colbert', 2),
(101, 'insertar', 'raza', '2016-05-09 12:06:36', 1, '', 'Colbert', 1),
(102, 'insertar', 'raza', '2016-05-09 12:06:41', 1, '', 'Colbert', 2),
(103, 'insertar', 'enfermedad_utero', '2016-05-09 12:07:10', 1, '', 'Colbert', 1),
(104, 'modificar', 'enfermedad_utero', '2016-05-09 12:07:24', 1, '', 'Colbert', 1),
(105, 'insertar', 'enfermedad_utero', '2016-05-09 12:07:39', 1, '', 'Colbert', 2),
(106, 'insertar', 'especificacion_muerte', '2016-05-09 12:08:28', 1, '', 'Colbert', 1),
(107, 'insertar', 'especificacion_muerte', '2016-05-09 12:09:35', 1, '', 'Colbert', 2),
(108, 'insertar', 'especificacion_venta', '2016-05-09 12:09:59', 1, '', 'Colbert', 1),
(109, 'insertar', 'especificacion_venta', '2016-05-09 12:10:16', 1, '', 'Colbert', 2),
(110, 'insertar', 'estado_cria', '2016-05-09 12:10:37', 1, '', 'Colbert', 1),
(111, 'insertar', 'estado_cria', '2016-05-09 12:10:48', 1, '', 'Colbert', 2),
(112, 'insertar', 'via_aplicacion', '2016-05-09 12:33:49', 1, '', 'Colbert', 1),
(113, 'insertar', 'via_aplicacion', '2016-05-09 12:33:57', 1, '', 'Colbert', 2),
(114, 'modificar', 'permiso', '2016-05-09 12:34:52', 1, '', 'Colbert', 1),
(115, 'insertar', 'medicamentos', '2016-05-09 12:35:07', 1, '', 'Colbert', 1),
(116, 'insertar', 'medicamentos', '2016-05-09 12:35:15', 1, '', 'Colbert', 2),
(117, 'modificar', 'modulo', '2016-05-09 12:44:40', 1, '', 'Colbert', 28),
(118, 'insertar', 'resultado_analisis', '2016-05-09 12:44:58', 1, '', 'Colbert', 1),
(119, 'insertar', 'resultado_analisis', '2016-05-09 12:45:03', 1, '', 'Colbert', 2),
(120, 'inciar sesion', 'login', '2016-05-09 23:05:38', 1, '', 'Colbert', 1),
(121, 'inciar sesion', 'login', '2016-05-10 08:06:10', 1, '', 'Colbert', 1),
(122, 'inciar sesion', 'login', '2016-05-10 08:19:20', 1, '', 'Colbert', 1),
(123, 'inciar sesion', 'login', '2016-05-10 11:35:23', 1, '', 'Colbert', 1),
(124, 'insertar', 'modulo', '2016-05-10 11:38:20', 1, '', 'Colbert', 61),
(125, 'modificar', 'permiso', '2016-05-10 11:38:28', 1, '', 'Colbert', 1),
(126, 'cerrar sesion', 'login', '2016-05-10 11:44:12', 1, '', 'Colbert', 1),
(127, 'inciar sesion', 'login', '2016-05-10 11:44:44', 1, '', 'Colbert', 1),
(128, 'insertar', 'modulo', '2016-05-10 11:48:06', 1, '', 'Colbert', 62),
(129, 'insertar', 'modulo', '2016-05-10 11:50:56', 1, '', 'Colbert', 64),
(130, 'modificar', 'permiso', '2016-05-10 11:51:06', 1, '', 'Colbert', 1),
(131, 'modificar', 'modulo', '2016-05-10 12:04:18', 1, '', 'Colbert', 64),
(132, 'modificar', 'modulo', '2016-05-10 12:06:34', 1, '', 'Colbert', 64),
(133, 'modificar', 'modulo', '2016-05-10 12:10:58', 1, '', 'Colbert', 64),
(134, 'insertar', 'modulo', '2016-05-10 12:11:17', 1, '', 'Colbert', 65),
(135, 'modificar', 'permiso', '2016-05-10 12:11:29', 1, '', 'Colbert', 1),
(136, 'inciar sesion', 'login', '2016-05-10 12:40:54', 1, '', 'Colbert', 1),
(137, 'inciar sesion', 'login', '2016-05-10 14:31:32', 1, '', 'Colbert', 1),
(138, 'inciar sesion', 'login', '2016-05-10 14:42:56', 1, '', 'Colbert', 1),
(139, 'inciar sesion', 'login', '2016-05-10 18:45:48', 1, '', 'Colbert', 1),
(140, 'inciar sesion', 'login', '2016-05-10 19:07:04', 1, '', 'Colbert', 1),
(141, 'inciar sesion', 'login', '2016-05-10 22:44:22', 1, '', 'JOSE', 1),
(142, 'inciar sesion', 'login', '2016-05-11 06:58:48', 1, '', 'JOSE', 1),
(143, 'inciar sesion', 'login', '2016-05-11 07:09:44', 1, '', 'JOSE', 1),
(144, 'inciar sesion', 'login', '2016-05-12 11:04:36', 1, '', 'JOSE', 1),
(145, 'inciar sesion', 'login', '2016-05-12 12:12:10', 1, '', 'JOSE', 1),
(146, 'inciar sesion', 'login', '2016-05-12 15:27:07', 1, '', 'JOSE', 1),
(147, 'inciar sesion', 'login', '2016-05-13 09:14:07', 1, '', 'JOSE', 1),
(148, 'inciar sesion', 'login', '2016-05-13 13:41:46', 1, '', 'JOSE', 1),
(149, 'inciar sesion', 'login', '2016-05-13 13:42:17', 1, '', 'JOSE', 1),
(150, 'insertar', 'medicacion', '2016-05-13 14:44:49', 1, '', 'JOSE', 0),
(151, 'insertar', 'muerte', '2016-05-13 14:53:43', 1, '', 'JOSE', 0),
(152, 'modificar', 'modulo', '2016-05-13 16:59:24', 1, '', 'JOSE', 32),
(153, 'inciar sesion', 'login', '2016-05-13 21:09:21', 1, '', 'JOSE', 1),
(154, 'inciar sesion', 'login', '2016-05-13 21:09:54', 1, '', 'JOSE', 1),
(155, 'inciar sesion', 'login', '2016-05-14 16:17:32', 1, '', 'JOSE', 1),
(156, 'insertar', 'aborto', '2016-05-14 16:24:07', 1, '', 'JOSE', 0),
(157, 'insertar', 'aborto', '2016-05-14 16:24:13', 1, '', 'JOSE', 0),
(158, 'insertar', 'aborto', '2016-05-14 16:24:20', 1, '', 'JOSE', 0),
(159, 'insertar', 'aborto', '2016-05-14 16:37:00', 1, '', 'JOSE', 0),
(160, 'modificar', 'aborto', '2016-05-14 16:37:21', 1, '', 'JOSE', 4),
(161, 'insertar', 'aborto', '2016-05-14 16:54:12', 1, '', 'JOSE', 0),
(162, 'insertar', 'aborto', '2016-05-14 17:11:25', 1, '', 'JOSE', 0),
(163, 'insertar', 'aborto', '2016-05-14 17:13:29', 1, '', 'JOSE', 0),
(164, 'insertar', 'aborto', '2016-05-14 17:14:03', 1, '', 'JOSE', 0),
(165, 'insertar', 'aborto', '2016-05-14 17:16:10', 1, '', 'JOSE', 0),
(166, 'insertar', 'aborto', '2016-05-14 17:20:21', 1, '', 'JOSE', 0),
(167, 'insertar', 'aborto', '2016-05-14 17:23:01', 1, '', 'JOSE', 0),
(168, 'modificar', 'aborto', '2016-05-14 17:23:14', 1, '', 'JOSE', 7),
(169, 'insertar', 'aborto', '2016-05-14 17:41:57', 1, '', 'JOSE', 0),
(170, 'insertar', 'aborto', '2016-05-14 17:44:04', 1, '', 'JOSE', 0),
(171, 'insertar', 'aborto', '2016-05-14 17:46:17', 1, '', 'JOSE', 0),
(172, 'insertar', 'aborto', '2016-05-14 17:46:54', 1, '', 'JOSE', 0),
(173, 'insertar', 'aborto', '2016-05-14 17:54:05', 1, '', 'JOSE', 0),
(174, 'insertar', 'aborto', '2016-05-14 17:54:19', 1, '', 'JOSE', 0),
(175, 'insertar', 'aborto', '2016-05-14 17:54:51', 1, '', 'JOSE', 0),
(176, 'insertar', 'aborto', '2016-05-14 17:55:12', 1, '', 'JOSE', 0),
(177, 'insertar', 'aborto', '2016-05-14 17:56:32', 1, '', 'JOSE', 0),
(178, 'insertar', 'aborto', '2016-05-14 17:58:46', 1, '', 'JOSE', 0),
(179, 'insertar', 'aborto', '2016-05-14 18:37:10', 1, '', 'JOSE', 0),
(180, 'insertar', 'aborto', '2016-05-14 18:37:25', 1, '', 'JOSE', 0),
(181, 'insertar', 'aborto', '2016-05-14 18:41:52', 1, '', 'JOSE', 0),
(182, 'insertar', 'aborto', '2016-05-14 18:42:48', 1, '', 'JOSE', 0),
(183, 'insertar', 'aborto', '2016-05-14 18:43:00', 1, '', 'JOSE', 0),
(184, 'insertar', 'aborto', '2016-05-14 18:45:15', 1, '', 'JOSE', 0),
(185, 'insertar', 'aborto', '2016-05-14 18:45:25', 1, '', 'JOSE', 0),
(186, 'insertar', 'aborto', '2016-05-14 18:45:38', 1, '', 'JOSE', 0),
(187, 'insertar', 'aborto', '2016-05-14 18:49:26', 1, '', 'JOSE', 0),
(188, 'insertar', 'aborto', '2016-05-14 18:49:34', 1, '', 'JOSE', 0),
(189, 'insertar', 'aborto', '2016-05-14 18:51:00', 1, '', 'JOSE', 0),
(190, 'insertar', 'aborto', '2016-05-14 18:52:32', 1, '', 'JOSE', 0),
(191, 'insertar', 'aborto', '2016-05-14 18:53:06', 1, '', 'JOSE', 0),
(192, 'insertar', 'aborto', '2016-05-14 18:53:29', 1, '', 'JOSE', 0),
(193, 'insertar', 'aborto', '2016-05-14 18:55:51', 1, '', 'JOSE', 0),
(194, 'insertar', 'aborto', '2016-05-14 18:56:34', 1, '', 'JOSE', 0),
(195, 'insertar', 'aborto', '2016-05-14 18:56:57', 1, '', 'JOSE', 0),
(196, 'inciar sesion', 'login', '2016-05-15 07:58:06', 1, '', 'JOSE', 1),
(197, 'insertar', 'aborto', '2016-05-15 07:58:15', 1, '', 'JOSE', 0),
(198, 'insertar', 'aborto', '2016-05-15 07:58:37', 1, '', 'JOSE', 0),
(199, 'insertar', 'aborto', '2016-05-15 07:58:47', 1, '', 'JOSE', 0),
(200, 'insertar', 'aborto', '2016-05-15 07:59:25', 1, '', 'JOSE', 0),
(201, 'insertar', 'aborto', '2016-05-15 08:02:40', 1, '', 'JOSE', 0),
(202, 'insertar', 'aborto', '2016-05-15 08:02:53', 1, '', 'JOSE', 0),
(203, 'insertar', 'aborto', '2016-05-15 08:03:58', 1, '', 'JOSE', 0),
(204, 'insertar', 'aborto', '2016-05-15 08:04:08', 1, '', 'JOSE', 0),
(205, 'insertar', 'aborto', '2016-05-15 08:05:04', 1, '', 'JOSE', 0),
(206, 'insertar', 'aborto', '2016-05-15 08:06:02', 1, '', 'JOSE', 0),
(207, 'insertar', 'aborto', '2016-05-15 08:06:07', 1, '', 'JOSE', 0),
(208, 'insertar', 'aborto', '2016-05-15 08:06:45', 1, '', 'JOSE', 0),
(209, 'insertar', 'aborto', '2016-05-15 08:07:11', 1, '', 'JOSE', 0),
(210, 'insertar', 'aborto', '2016-05-15 08:07:15', 1, '', 'JOSE', 0),
(211, 'insertar', 'aborto', '2016-05-15 08:08:05', 1, '', 'JOSE', 0),
(212, 'insertar', 'aborto', '2016-05-15 08:08:22', 1, '', 'JOSE', 0),
(213, 'insertar', 'analisis', '2016-05-15 08:19:02', 1, '', 'JOSE', 0),
(214, 'insertar', 'aborto', '2016-05-15 08:26:59', 1, '', 'JOSE', 0),
(215, 'modificar', 'aborto', '2016-05-15 08:27:08', 1, '', 'JOSE', 1),
(216, 'insertar', 'aborto', '2016-05-15 08:27:23', 1, '', 'JOSE', 0),
(217, 'insertar', 'analisis', '2016-05-15 08:28:12', 1, '', 'JOSE', 0),
(218, 'insertar', 'analisis', '2016-05-15 08:29:48', 1, '', 'JOSE', 0),
(219, 'insertar', 'celo', '2016-05-15 08:30:14', 1, '', 'JOSE', 0),
(220, 'insertar', 'enfermedad', '2016-05-15 08:30:42', 1, '', 'JOSE', 0),
(221, 'insertar', 'indicaciones_especiale', '2016-05-15 08:30:55', 1, '', 'JOSE', 0),
(222, 'insertar', 'secado', '2016-05-15 08:31:15', 1, '', 'JOSE', 0),
(223, 'insertar', 'analisis', '2016-05-15 09:32:01', 1, '', 'JOSE', 0),
(224, 'insertar', 'analisis', '2016-05-15 09:33:36', 1, '', 'JOSE', 0),
(225, 'insertar', 'analisis', '2016-05-15 09:33:44', 1, '', 'JOSE', 0),
(226, 'insertar', 'analisis', '2016-05-15 09:34:01', 1, '', 'JOSE', 0),
(227, 'insertar', 'aborto', '2016-05-15 09:44:25', 1, '', 'JOSE', 0),
(228, 'insertar', 'analisis', '2016-05-15 09:45:14', 1, '', 'JOSE', 0),
(229, 'insertar', 'aborto', '2016-05-15 09:46:53', 1, '', 'JOSE', 0),
(230, 'insertar', 'aborto', '2016-05-15 09:47:23', 1, '', 'JOSE', 0),
(231, 'insertar', 'analisis', '2016-05-15 09:47:33', 1, '', 'JOSE', 0),
(232, 'insertar', 'aborto', '2016-05-15 09:48:25', 1, '', 'JOSE', 0),
(233, 'insertar', 'analisis', '2016-05-15 09:48:40', 1, '', 'JOSE', 0),
(234, 'insertar', 'aborto', '2016-05-15 09:50:28', 1, '', 'JOSE', 0),
(235, 'insertar', 'analisis', '2016-05-15 09:53:47', 1, '', 'JOSE', 0),
(236, 'insertar', 'aborto', '2016-05-15 09:54:04', 1, '', 'JOSE', 0),
(237, 'insertar', 'aborto', '2016-05-15 09:54:13', 1, '', 'JOSE', 0),
(238, 'insertar', 'aborto', '2016-05-15 09:54:52', 1, '', 'JOSE', 0),
(239, 'insertar', 'aborto', '2016-05-15 09:55:44', 1, '', 'JOSE', 0),
(240, 'insertar', 'analisis', '2016-05-15 09:56:25', 1, '', 'JOSE', 0),
(241, 'insertar', 'aborto', '2016-05-15 09:58:11', 1, '', 'JOSE', 0),
(242, 'insertar', 'analisis', '2016-05-15 09:58:20', 1, '', 'JOSE', 0),
(243, 'insertar', 'aborto', '2016-05-15 10:05:42', 1, '', 'JOSE', 0),
(244, 'insertar', 'analisis', '2016-05-15 10:06:13', 1, '', 'JOSE', 0),
(245, 'insertar', 'analisis', '2016-05-15 10:06:27', 1, '', 'JOSE', 0),
(246, 'insertar', 'aborto', '2016-05-15 10:09:11', 1, '', 'JOSE', 0),
(247, 'insertar', 'analisis', '2016-05-15 10:10:06', 1, '', 'JOSE', 0),
(248, 'insertar', 'analisis', '2016-05-15 10:12:41', 1, '', 'JOSE', 0),
(249, 'insertar', 'analisis', '2016-05-15 10:13:09', 1, '', 'JOSE', 0),
(250, 'insertar', 'aborto', '2016-05-15 10:33:34', 1, '', 'JOSE', 0),
(251, 'insertar', 'aborto', '2016-05-15 10:40:34', 1, '', 'JOSE', 0),
(252, 'insertar', 'analisis', '2016-05-15 11:26:59', 1, '', 'JOSE', 0),
(253, 'insertar', 'analisis', '2016-05-15 11:28:00', 1, '', 'JOSE', 0),
(254, 'insertar', 'analisis', '2016-05-15 11:28:28', 1, '', 'JOSE', 0),
(255, 'inciar sesion', 'login', '2016-05-15 14:11:31', 1, '', 'JOSE', 1),
(256, 'insertar', 'aborto', '2016-05-15 14:16:41', 1, '', 'JOSE', 0),
(257, 'insertar', 'aborto', '2016-05-15 14:18:41', 1, '', 'JOSE', 0),
(258, 'insertar', 'aborto', '2016-05-15 17:02:52', 1, '', 'JOSE', 0),
(259, 'insertar', 'indicaciones_especiale', '2016-05-15 17:04:39', 1, '', 'JOSE', 0),
(260, 'insertar', 'aborto', '2016-05-15 17:07:33', 1, '', 'JOSE', 0),
(261, 'insertar', 'analisis', '2016-05-15 17:07:43', 1, '', 'JOSE', 0),
(262, 'modificar', 'analisis', '2016-05-15 17:11:04', 1, '', 'JOSE', 1),
(263, 'insertar', 'aborto', '2016-05-15 17:14:01', 1, '', 'JOSE', 0),
(264, 'modificar', 'aborto', '2016-05-15 17:14:07', 1, '', 'JOSE', 1),
(265, 'insertar', 'indicaciones_especiale', '2016-05-15 17:14:18', 1, '', 'JOSE', 0),
(266, 'modificar', 'indicaciones_especiale', '2016-05-15 17:14:26', 1, '', 'JOSE', 1),
(267, 'modificar', 'indicaciones_especiale', '2016-05-15 17:14:30', 1, '', 'JOSE', 1),
(268, 'insertar', 'celo', '2016-05-15 17:14:39', 1, '', 'JOSE', 0),
(269, 'insertar', 'celo', '2016-05-15 17:15:46', 1, '', 'JOSE', 0),
(270, 'modificar', 'celo', '2016-05-15 17:16:00', 1, '', 'JOSE', 2),
(271, 'insertar', 'celo', '2016-05-15 17:16:28', 1, '', 'JOSE', 0),
(272, 'insertar', 'aborto', '2016-05-15 17:18:29', 1, '', 'JOSE', 0),
(273, 'insertar', 'analisis', '2016-05-15 17:19:00', 1, '', 'JOSE', 0),
(274, 'insertar', 'celo', '2016-05-15 17:19:07', 1, '', 'JOSE', 0),
(275, 'insertar', 'enfermedad', '2016-05-15 17:19:15', 1, '', 'JOSE', 0),
(276, 'insertar', 'indicaciones_especiale', '2016-05-15 17:19:26', 1, '', 'JOSE', 0),
(277, 'insertar', 'medicacion', '2016-05-15 17:19:35', 1, '', 'JOSE', 0),
(278, 'insertar', 'muerte', '2016-05-15 17:19:43', 1, '', 'JOSE', 0),
(279, 'insertar', 'parto', '2016-05-15 17:20:03', 1, '', 'JOSE', 0),
(280, 'insertar', 'servicio', '2016-05-15 17:20:15', 1, '', 'JOSE', 0),
(281, 'insertar', 'tacto_rectal', '2016-05-15 17:20:23', 1, '', 'JOSE', 0),
(282, 'insertar', 'venta', '2016-05-15 17:20:31', 1, '', 'JOSE', 0),
(283, 'insertar', 'secado', '2016-05-15 17:20:39', 1, '', 'JOSE', 0),
(284, 'insertar', 'rechazo', '2016-05-15 17:20:53', 1, '', 'JOSE', 0),
(285, 'modificar', 'aborto', '2016-05-15 17:20:59', 1, '', 'JOSE', 1),
(286, 'modificar', 'analisis', '2016-05-15 17:21:06', 1, '', 'JOSE', 1),
(287, 'modificar', 'celo', '2016-05-15 17:21:15', 1, '', 'JOSE', 1),
(288, 'modificar', 'enfermedad', '2016-05-15 17:21:34', 1, '', 'JOSE', 1),
(289, 'modificar', 'indicaciones_especiale', '2016-05-15 17:21:45', 1, '', 'JOSE', 1),
(290, 'modificar', 'medicacion', '2016-05-15 17:21:57', 1, '', 'JOSE', 1),
(291, 'modificar', 'muerte', '2016-05-15 17:22:11', 1, '', 'JOSE', 1),
(292, 'modificar', 'parto', '2016-05-15 17:22:27', 1, '', 'JOSE', 1),
(293, 'modificar', 'servicio', '2016-05-15 17:22:44', 1, '', 'JOSE', 1),
(294, 'modificar', 'tacto_rectal', '2016-05-15 17:23:04', 1, '', 'JOSE', 1),
(295, 'modificar', 'venta', '2016-05-15 17:23:13', 1, '', 'JOSE', 1),
(296, 'modificar', 'secado', '2016-05-15 17:23:22', 1, '', 'JOSE', 1),
(297, 'modificar', 'rechazo', '2016-05-15 17:23:30', 1, '', 'JOSE', 1),
(298, 'insertar', 'aborto', '2016-05-15 18:22:28', 1, '', 'JOSE', 0),
(299, 'modificar', 'aborto', '2016-05-15 18:22:35', 1, '', 'JOSE', 1),
(300, 'insertar', 'muerte', '2016-05-15 18:22:59', 1, '', 'JOSE', 0),
(301, 'insertar', 'aborto', '2016-05-15 18:26:18', 1, '', 'JOSE', 0),
(302, 'modificar', 'aborto', '2016-05-15 18:26:24', 1, '', 'JOSE', 2),
(303, 'insertar', 'aborto', '2016-05-15 18:48:24', 1, '', 'JOSE', 0),
(304, 'modificar', 'aborto', '2016-05-15 18:48:30', 1, '', 'JOSE', 1),
(305, 'inciar sesion', 'login', '2016-05-15 21:07:38', 1, '', 'JOSE', 1),
(306, 'insertar', 'aborto', '2016-05-15 21:11:35', 1, '', 'JOSE', 0),
(307, 'insertar', 'aborto', '2016-05-15 21:11:53', 1, '', 'JOSE', 0),
(308, 'insertar', 'aborto', '2016-05-15 21:26:39', 1, '', 'JOSE', 0),
(309, 'modificar', 'aborto', '2016-05-15 21:26:51', 1, '', 'JOSE', 1),
(310, 'insertar', 'aborto', '2016-05-15 21:27:35', 1, '', 'JOSE', 0),
(311, 'modificar', 'aborto', '2016-05-15 21:27:46', 1, '', 'JOSE', 2),
(312, 'insertar', 'aborto', '2016-05-15 21:34:35', 1, '', 'JOSE', 0),
(313, 'modificar', 'aborto', '2016-05-15 21:34:46', 1, '', 'JOSE', 3),
(314, 'modificar', 'aborto', '2016-05-15 21:34:51', 1, '', 'JOSE', 3),
(315, 'inciar sesion', 'login', '2016-05-16 08:33:17', 1, '', 'JOSE', 1),
(316, 'insertar', 'aborto', '2016-05-16 08:57:34', 1, '', 'JOSE', 0),
(317, 'insertar', 'muerte', '2016-05-16 09:10:08', 1, '', 'JOSE', 0),
(318, 'inciar sesion', 'login', '2016-05-16 13:01:23', 1, '', 'JOSE', 1),
(319, 'modificar', '', '2016-05-16 14:39:05', 1, '', 'JOSE', 1),
(320, 'modificar', '', '2016-05-16 14:42:13', 1, '', 'JOSE', 1),
(321, 'modificar', '', '2016-05-16 14:42:24', 1, '', 'JOSE', 1),
(322, 'modificar', '', '2016-05-16 14:43:16', 1, '', 'JOSE', 1),
(323, 'modificar', '', '2016-05-16 14:43:53', 1, '', 'JOSE', 1),
(324, 'modificar', '', '2016-05-16 14:44:01', 1, '', 'JOSE', 1),
(325, 'modificar', '', '2016-05-16 14:44:16', 1, '', 'JOSE', 1),
(326, 'modificar', '', '2016-05-16 14:44:32', 1, '', 'JOSE', 1),
(327, 'modificar', 'simbolo', '2016-05-16 14:47:30', 1, '', 'JOSE', 1),
(328, 'modificar', 'simbolo', '2016-05-16 14:49:01', 1, '', 'JOSE', 1),
(329, 'modificar', 'simbolo', '2016-05-16 15:00:37', 1, '', 'JOSE', 1),
(330, 'modificar', 'simbolo', '2016-05-16 15:08:47', 1, '', 'JOSE', 1),
(331, 'modificar', 'simbolo', '2016-05-16 15:11:22', 1, '', 'JOSE', 1),
(332, 'modificar', 'simbolo', '2016-05-16 15:51:35', 1, '', 'JOSE', 1),
(333, 'modificar', 'simbolo', '2016-05-16 17:48:24', 1, '', 'JOSE', 1),
(334, 'modificar', 'simbolo', '2016-05-16 17:54:14', 1, '', 'JOSE', 1),
(335, 'modificar', 'simbolo', '2016-05-16 18:58:33', 1, '', 'JOSE', 2),
(336, 'modificar', 'simbolo', '2016-05-16 18:58:44', 1, '', 'JOSE', 3),
(337, 'modificar', 'simbolo', '2016-05-16 18:58:57', 1, '', 'JOSE', 4),
(338, 'modificar', 'simbolo', '2016-05-16 18:59:06', 1, '', 'JOSE', 5),
(339, 'modificar', 'simbolo', '2016-05-16 18:59:17', 1, '', 'JOSE', 1),
(340, 'modificar', 'simbolo', '2016-05-16 18:59:29', 1, '', 'JOSE', 6),
(341, 'modificar', 'simbolo', '2016-05-16 18:59:45', 1, '', 'JOSE', 7),
(342, 'modificar', 'simbolo', '2016-05-16 19:00:06', 1, '', 'JOSE', 7),
(343, 'modificar', 'simbolo', '2016-05-16 19:00:22', 1, '', 'JOSE', 8),
(344, 'modificar', 'simbolo', '2016-05-16 19:00:22', 1, '', 'JOSE', 8),
(345, 'modificar', 'simbolo', '2016-05-16 19:00:38', 1, '', 'JOSE', 9),
(346, 'modificar', 'simbolo', '2016-05-16 19:00:54', 1, '', 'JOSE', 10),
(347, 'modificar', 'simbolo', '2016-05-16 19:01:07', 1, '', 'JOSE', 11),
(348, 'modificar', 'simbolo', '2016-05-16 19:01:21', 1, '', 'JOSE', 12),
(349, 'modificar', 'simbolo', '2016-05-16 19:01:35', 1, '', 'JOSE', 13),
(350, 'modificar', 'simbolo', '2016-05-16 19:35:39', 1, '', 'JOSE', 1),
(351, 'modificar', 'simbolo', '2016-05-16 19:35:39', 1, '', 'JOSE', 1),
(352, 'modificar', 'simbolo', '2016-05-16 19:39:12', 1, '', 'JOSE', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `causa_aborto`
--

CREATE TABLE IF NOT EXISTS `causa_aborto` (
`ca_id` int(11) NOT NULL,
  `ca_descripcion` varchar(70) NOT NULL,
  `ca_abreviatura` varchar(30) NOT NULL,
  `ca_estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `causa_aborto`
--

INSERT INTO `causa_aborto` (`ca_id`, `ca_descripcion`, `ca_abreviatura`, `ca_estado`) VALUES
(1, 'causa aborto 1', 'cauabo1', 1),
(2, 'causa aborto 2', 'cauabo2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `causa_no_inseminal`
--

CREATE TABLE IF NOT EXISTS `causa_no_inseminal` (
`cni_id` int(11) NOT NULL,
  `cni_descripcion` varchar(150) NOT NULL,
  `cni_abreviatura` varchar(50) NOT NULL,
  `cni_estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `causa_no_inseminal`
--

INSERT INTO `causa_no_inseminal` (`cni_id`, `cni_descripcion`, `cni_abreviatura`, `cni_estado`) VALUES
(1, 'causa no inseminal 1', 'caunoins1', 1),
(2, 'causa no inseminal 2', 'caunoins2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `causa_rechazo`
--

CREATE TABLE IF NOT EXISTS `causa_rechazo` (
`cr_id` int(11) NOT NULL,
  `cr_descripcion` varchar(150) NOT NULL,
  `cr_abreviatura` varchar(50) NOT NULL,
  `cr_esta` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `causa_rechazo`
--

INSERT INTO `causa_rechazo` (`cr_id`, `cr_descripcion`, `cr_abreviatura`, `cr_esta`) VALUES
(1, 'causa rechazo 1', 'caurec1', 1),
(2, 'causa rechazo 2', 'caurec2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `celo`
--

CREATE TABLE IF NOT EXISTS `celo` (
`celo_id` int(11) NOT NULL,
  `celo_rp` int(11) DEFAULT NULL,
  `celo_fecha_evento` datetime DEFAULT NULL,
  `celo_causa_no_inseminal` int(11) DEFAULT NULL,
  `celo_medicina_genital` int(11) DEFAULT NULL,
  `celo_via_aplicacion` int(11) DEFAULT NULL,
  `celo_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnostico_utero`
--

CREATE TABLE IF NOT EXISTS `diagnostico_utero` (
`diaut_id` int(11) NOT NULL,
  `diaut_descripcion` varchar(150) NOT NULL,
  `diaut_abreviatura` varchar(50) NOT NULL,
  `diaut_estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `diagnostico_utero`
--

INSERT INTO `diagnostico_utero` (`diaut_id`, `diaut_descripcion`, `diaut_abreviatura`, `diaut_estado`) VALUES
(1, 'diagnostico utero 1', 'diaute1', 1),
(2, 'diagnostico utero 2', 'diaute2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedad`
--

CREATE TABLE IF NOT EXISTS `enfermedad` (
`enf_id` int(11) NOT NULL,
  `enf_rp` int(11) DEFAULT NULL,
  `enf_fecha_evento` datetime DEFAULT NULL,
  `enf_tipo_enfermedad` int(11) DEFAULT NULL,
  `enf_medicamento` int(11) DEFAULT NULL,
  `enf_via_aplicacion` int(11) DEFAULT NULL,
  `enf_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedad_ovario`
--

CREATE TABLE IF NOT EXISTS `enfermedad_ovario` (
`enfov_id` int(11) NOT NULL,
  `enfov_descripcion` varchar(150) NOT NULL,
  `enfov_abreviatura` varchar(50) NOT NULL,
  `enfov_estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `enfermedad_ovario`
--

INSERT INTO `enfermedad_ovario` (`enfov_id`, `enfov_descripcion`, `enfov_abreviatura`, `enfov_estado`) VALUES
(1, 'enfermedad ovario 1', 'enfova1', 1),
(2, 'enfermedad ovario 2', 'enfova2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedad_utero`
--

CREATE TABLE IF NOT EXISTS `enfermedad_utero` (
`enfut_id` int(11) NOT NULL,
  `enfut_descripcion` varchar(150) NOT NULL,
  `enfut_abreviatura` varchar(50) NOT NULL,
  `enfut_estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `enfermedad_utero`
--

INSERT INTO `enfermedad_utero` (`enfut_id`, `enfut_descripcion`, `enfut_abreviatura`, `enfut_estado`) VALUES
(1, 'enfermedad utero 1', 'enfute1', 1),
(2, 'enfermedad utero 2', 'enfute2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especificacion_muerte`
--

CREATE TABLE IF NOT EXISTS `especificacion_muerte` (
`espmu_id` int(11) NOT NULL,
  `espmu_descripcion` varchar(150) NOT NULL,
  `espmu_abreviatura` varchar(50) NOT NULL,
  `espmu_estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `especificacion_muerte`
--

INSERT INTO `especificacion_muerte` (`espmu_id`, `espmu_descripcion`, `espmu_abreviatura`, `espmu_estado`) VALUES
(1, 'especificacion muerte 1', 'espmue1', 1),
(2, 'especificacion muerte 2', 'espmue2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especificacion_venta`
--

CREATE TABLE IF NOT EXISTS `especificacion_venta` (
`espve_id` int(11) NOT NULL,
  `espve_descripcion` varchar(100) DEFAULT NULL,
  `espve_abreviatura` varchar(50) DEFAULT NULL,
  `espve_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `especificacion_venta`
--

INSERT INTO `especificacion_venta` (`espve_id`, `espve_descripcion`, `espve_abreviatura`, `espve_estado`) VALUES
(1, 'especificacion venta 1', 'espven1', 1),
(2, 'especificacion venta 2', 'espven2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_cria`
--

CREATE TABLE IF NOT EXISTS `estado_cria` (
`estcr_id` int(11) NOT NULL,
  `estcr_descripcion` varchar(100) DEFAULT NULL,
  `estcr_abreviatura` varchar(50) DEFAULT NULL,
  `estcr_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_cria`
--

INSERT INTO `estado_cria` (`estcr_id`, `estcr_descripcion`, `estcr_abreviatura`, `estcr_estado`) VALUES
(1, ' estado cria 1', 'estcri1', 1),
(2, ' estado cria 2', 'estcri2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
`eve_id` int(11) NOT NULL,
  `id_tabla` int(11) NOT NULL,
  `sim_id` int(11) NOT NULL,
  `ani_id` int(11) NOT NULL,
  `eve_fecha` date NOT NULL,
  `eve_estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`eve_id`, `id_tabla`, `sim_id`, `ani_id`, `eve_fecha`, `eve_estado`) VALUES
(1, 1, 1, 1, '2016-01-02', 1),
(2, 2, 1, 1, '2016-03-06', 1),
(3, 3, 1, 1, '2016-01-04', 1),
(4, 4, 1, 1, '2015-02-06', 1),
(5, 1, 7, 1, '2016-02-05', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicaciones_especiale`
--

CREATE TABLE IF NOT EXISTS `indicaciones_especiale` (
`indes_id` int(11) NOT NULL,
  `indes_fecha_evento` datetime NOT NULL,
  `indes_rp` int(11) NOT NULL,
  `indes_indicaciones_esp` int(11) NOT NULL,
  `indes_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicaciones_especiales`
--

CREATE TABLE IF NOT EXISTS `indicaciones_especiales` (
`indesp_id` int(11) NOT NULL,
  `indesp_descripcion` varchar(100) DEFAULT NULL,
  `indesp_abreviatura` varchar(50) DEFAULT NULL,
  `indesp_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `indicaciones_especiales`
--

INSERT INTO `indicaciones_especiales` (`indesp_id`, `indesp_descripcion`, `indesp_abreviatura`, `indesp_estado`) VALUES
(1, 'esp1', NULL, 1),
(2, 'esp2', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_transacciones`
--

CREATE TABLE IF NOT EXISTS `log_transacciones` (
`logtr_id` int(11) NOT NULL,
  `logtr_usuario` int(11) NOT NULL,
  `logtr_accion` varchar(150) NOT NULL,
  `logtr_tabla` varchar(500) NOT NULL,
  `logtr_fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicacion`
--

CREATE TABLE IF NOT EXISTS `medicacion` (
`med_id` int(11) NOT NULL,
  `med_rp` int(11) DEFAULT NULL,
  `med_fecha_evento` datetime DEFAULT NULL,
  `med_medicamentos` int(11) DEFAULT NULL,
  `med_via_aplicacion` int(11) DEFAULT NULL,
  `med_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE IF NOT EXISTS `medicamentos` (
`medi_id` int(11) NOT NULL,
  `medi_descripcion` varchar(100) DEFAULT NULL,
  `medi_abreviatura` varchar(50) DEFAULT NULL,
  `medi_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`medi_id`, `medi_descripcion`, `medi_abreviatura`, `medi_estado`) VALUES
(1, 'medicamento 1', 'med1', 1),
(2, 'medicamento 2', 'med2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicina_genital`
--

CREATE TABLE IF NOT EXISTS `medicina_genital` (
`medge_id` int(11) NOT NULL,
  `medge_descripcion` varchar(100) DEFAULT NULL,
  `medge_abreviatura` varchar(50) DEFAULT NULL,
  `medge_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medicina_genital`
--

INSERT INTO `medicina_genital` (`medge_id`, `medge_descripcion`, `medge_abreviatura`, `medge_estado`) VALUES
(1, 'medicina genital 1', 'mg1', 1),
(2, 'medicina genital 2', 'mg2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medi_cuartos_mamarios`
--

CREATE TABLE IF NOT EXISTS `medi_cuartos_mamarios` (
`mecu_id` int(11) NOT NULL,
  `mecu_descripcion` varchar(100) DEFAULT NULL,
  `mecu_abreviatura` varchar(50) DEFAULT NULL,
  `mecu_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medi_cuartos_mamarios`
--

INSERT INTO `medi_cuartos_mamarios` (`mecu_id`, `mecu_descripcion`, `mecu_abreviatura`, `mecu_estado`) VALUES
(1, 'med cuartos mamarios 1', 'mcm1', 1),
(2, 'med cuartos mamarios 2', 'mcm2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE IF NOT EXISTS `modulo` (
`mod_id` int(11) NOT NULL,
  `mod_descripcion` varchar(100) NOT NULL,
  `mod_padre` int(11) NOT NULL,
  `mod_url` varchar(50) NOT NULL,
  `mod_estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`mod_id`, `mod_descripcion`, `mod_padre`, `mod_url`, `mod_estado`) VALUES
(1, 'Registro', 41, 'animales', 1),
(2, 'Razas', 41, 'razas', 1),
(3, 'Tipo Registro', 41, 'tipo_registro', 1),
(4, 'Aborto', 42, 'aborto', 1),
(5, 'Celo', 42, 'celo', 1),
(6, 'Usuario', 43, 'usuario', 1),
(7, 'Modulos', 43, 'modulo', 1),
(8, 'Tipo Usuario', 43, 'tipo_usuario', 1),
(9, 'Permisos', 43, 'permiso', 1),
(10, 'Medicacion', 41, 'medicacion', 0),
(11, 'Medicina Genital', 41, 'medicina_genital', 1),
(12, 'Medicina Cuartos Mamarios', 41, 'medicina_cuarto_mamarios', 1),
(13, 'Personal', 41, 'personal', 1),
(14, 'Reproductor', 41, 'reproductor', 1),
(15, 'Tipo Analisis', 41, 'tipo_analisis', 1),
(16, 'Tipo Enfermedad', 41, 'tipo_enfermedad', 1),
(17, 'Tipo Parto', 41, 'tipo_parto', 1),
(18, 'Tipo Servicio', 41, 'tipo_servicio', 1),
(19, 'Causa Aborto', 41, 'causa_aborto', 1),
(20, 'Causa No Inseminal', 41, 'causa_no_inseminal', 1),
(21, 'Causa Rechazo', 41, 'causa_rechazo', 1),
(22, 'Diagnostico Utero', 41, 'diagnostico_utero', 1),
(23, 'Enfermedad Ovario', 41, 'enfermedad_ovario', 1),
(24, 'Enfermedad Utero', 41, 'enfermedad_utero', 1),
(25, 'Especificacion Muerte', 41, 'especificacion_muerte', 1),
(26, 'Especificacion Venta', 41, 'especificacion_venta', 1),
(27, 'Estado Cria', 41, 'estado_cria', 1),
(28, 'Resultado De Analisis', 41, 'resultado_analisis', 1),
(29, 'Via Aplicacion', 41, 'via_aplicacion', 1),
(30, 'Analisis', 42, 'analisis', 1),
(31, 'Enfermedad', 42, 'enfermedad', 1),
(32, 'Indicaciones Especiales', 42, 'indicaciones_especiale', 1),
(33, 'Medicacion', 42, 'medicacion', 1),
(34, 'Muerte', 42, 'muerte', 1),
(35, 'Parto', 42, 'parto', 1),
(36, 'Servicio', 42, 'servicio', 1),
(37, 'Tacto Rectal', 42, 'tacto_rectal', 1),
(38, 'Venta', 42, 'venta', 1),
(39, 'Secado', 42, 'secado', 1),
(40, 'Rechazo', 42, 'rechazo', 1),
(41, 'Mantenimiento', 0, '#', 1),
(42, 'Evento', 0, '#', 1),
(43, 'Sistema', 0, '#', 1),
(44, 'Calendario', 0, '#', 1),
(59, 'Calendario', 44, 'calendario', 1),
(60, 'Medicamentos', 41, 'medicamentos', 1),
(61, 'simbolo', 44, 'simbolo', 1),
(62, 'Reportes', 0, '#', 1),
(64, 'Calendario', 62, 'reporte/calendario_original', 1),
(65, 'Calenda Conteo', 62, 'reporte/calendario_conteo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `muerte`
--

CREATE TABLE IF NOT EXISTS `muerte` (
`mue_id` int(11) NOT NULL,
  `mue_rp` int(11) DEFAULT NULL,
  `mue_fecha_evento` datetime DEFAULT NULL,
  `mue_espec_muerte` int(11) DEFAULT NULL,
  `mue_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `muerte`
--

INSERT INTO `muerte` (`mue_id`, `mue_rp`, `mue_fecha_evento`, `mue_espec_muerte`, `mue_estado`) VALUES
(1, 1, '2016-02-05 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parto`
--

CREATE TABLE IF NOT EXISTS `parto` (
`par_id` int(11) NOT NULL,
  `par_rp` varchar(50) DEFAULT NULL,
  `par_fechanac` datetime DEFAULT NULL,
  `par_estado_cria` int(11) DEFAULT NULL,
  `par_tipo_parto` int(11) DEFAULT NULL,
  `par_sexo_cria` varchar(30) DEFAULT NULL,
  `par_estado` int(11) DEFAULT NULL,
  `par_servicio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE IF NOT EXISTS `permiso` (
  `per_tipo_usuario` int(11) NOT NULL,
  `per_modulo` int(11) NOT NULL,
  `per_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`per_tipo_usuario`, `per_modulo`, `per_estado`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 1),
(1, 4, 1),
(1, 5, 1),
(1, 6, 1),
(1, 7, 1),
(1, 8, 1),
(1, 9, 1),
(1, 10, 1),
(1, 11, 1),
(1, 12, 1),
(1, 13, 1),
(1, 14, 1),
(1, 15, 1),
(1, 16, 1),
(1, 17, 1),
(1, 18, 1),
(1, 19, 1),
(1, 20, 1),
(1, 21, 1),
(1, 22, 1),
(1, 23, 1),
(1, 24, 1),
(1, 25, 1),
(1, 26, 1),
(1, 27, 1),
(1, 28, 1),
(1, 29, 1),
(1, 30, 1),
(1, 31, 1),
(1, 32, 1),
(1, 33, 1),
(1, 34, 1),
(1, 35, 1),
(1, 36, 1),
(1, 37, 1),
(1, 38, 1),
(1, 39, 1),
(1, 40, 1),
(1, 59, 1),
(1, 60, 1),
(1, 61, 1),
(1, 62, 0),
(1, 64, 1),
(1, 65, 1),
(3, 1, 0),
(3, 2, 0),
(3, 3, 0),
(3, 4, 0),
(3, 5, 0),
(3, 6, 1),
(3, 7, 1),
(3, 8, 1),
(3, 9, 1),
(3, 10, 0),
(3, 11, 0),
(3, 12, 0),
(3, 13, 0),
(3, 14, 0),
(3, 15, 0),
(3, 16, 0),
(3, 17, 0),
(3, 18, 0),
(3, 19, 0),
(3, 20, 0),
(3, 21, 0),
(3, 22, 0),
(3, 23, 0),
(3, 24, 0),
(3, 25, 0),
(3, 26, 0),
(3, 27, 1),
(3, 28, 0),
(3, 29, 0),
(3, 30, 0),
(3, 31, 0),
(3, 32, 0),
(3, 33, 0),
(3, 34, 0),
(3, 35, 0),
(3, 36, 0),
(3, 37, 0),
(3, 38, 0),
(3, 39, 1),
(3, 40, 1),
(3, 59, 0),
(3, 60, 0),
(3, 61, 0),
(3, 62, 0),
(3, 64, 0),
(3, 65, 0),
(8, 1, 0),
(8, 2, 0),
(8, 3, 0),
(8, 4, 0),
(8, 5, 0),
(8, 6, 0),
(8, 7, 0),
(8, 8, 0),
(8, 9, 0),
(8, 10, 0),
(8, 11, 0),
(8, 12, 0),
(8, 13, 0),
(8, 14, 0),
(8, 15, 0),
(8, 16, 0),
(8, 17, 0),
(8, 18, 0),
(8, 19, 0),
(8, 20, 0),
(8, 21, 0),
(8, 22, 0),
(8, 23, 0),
(8, 24, 0),
(8, 25, 0),
(8, 26, 0),
(8, 27, 0),
(8, 28, 0),
(8, 29, 0),
(8, 30, 0),
(8, 31, 0),
(8, 32, 0),
(8, 33, 0),
(8, 34, 0),
(8, 35, 0),
(8, 36, 0),
(8, 37, 0),
(8, 38, 0),
(8, 39, 0),
(8, 40, 0),
(8, 59, 0),
(8, 60, 0),
(8, 61, 0),
(8, 62, 0),
(8, 64, 0),
(8, 65, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE IF NOT EXISTS `personal` (
`per_id` int(11) NOT NULL,
  `per_dni` varchar(8) NOT NULL,
  `per_nombre` varchar(150) NOT NULL,
  `per_ape_paterno` varchar(150) NOT NULL,
  `per_ape_materno` varchar(150) NOT NULL,
  `per_direccion` varchar(150) NOT NULL,
  `per_telefono` varchar(30) NOT NULL,
  `per_estado` int(11) NOT NULL,
  `per_tipo_personal` int(11) NOT NULL,
  `per_distrito` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`per_id`, `per_dni`, `per_nombre`, `per_ape_paterno`, `per_ape_materno`, `per_direccion`, `per_telefono`, `per_estado`, `per_tipo_personal`, `per_distrito`) VALUES
(1, '', 'Enrique', 'Salvador', 'Ayende', 'Loretana', '965685309', 1, 1, 0),
(2, '', 'colbert', 'calampa', 'Tantachuco', 'Jr. Mariscal Sucre', '973949944', 1, 1, 0),
(3, '', 'Jose', 'Villanueva', 'Davila', '', '', 1, 1, 0),
(4, '', 'Willy', 'Lopez', 'Leonardo', '', '', 1, 1, 0),
(5, '', 'Sergio', 'Santos', 'Martinez', '', '', 1, 1, 0),
(6, '', 'Diego', 'Contreras', 'Ishuiza', '', '', 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raza`
--

CREATE TABLE IF NOT EXISTS `raza` (
`raz_id` int(11) NOT NULL,
  `raz_descripcion` varchar(150) NOT NULL,
  `raz_abreviacion` varchar(50) NOT NULL,
  `raz_estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `raza`
--

INSERT INTO `raza` (`raz_id`, `raz_descripcion`, `raz_abreviacion`, `raz_estado`) VALUES
(1, 'Raza1', 'R1', 1),
(2, 'Raza2', 'R2', 1),
(3, 'Raza3', 'R3', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rechazo`
--

CREATE TABLE IF NOT EXISTS `rechazo` (
`recha_id` int(11) NOT NULL,
  `recha_rp` int(11) DEFAULT NULL,
  `recha_fecha_evento` datetime DEFAULT NULL,
  `recha_causa_rechazo` int(11) DEFAULT NULL,
  `recha_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reproductor`
--

CREATE TABLE IF NOT EXISTS `reproductor` (
`repro_id` int(11) NOT NULL,
  `repro_descripcion` varchar(100) DEFAULT NULL,
  `repro_abreviatura` varchar(50) DEFAULT NULL,
  `repro_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reproductor`
--

INSERT INTO `reproductor` (`repro_id`, `repro_descripcion`, `repro_abreviatura`, `repro_estado`) VALUES
(1, 'Reproductor1', 'rep1', 1),
(2, 'Reproductor2', 'rep2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultado_analisis`
--

CREATE TABLE IF NOT EXISTS `resultado_analisis` (
`resan_id` int(11) NOT NULL,
  `resan_descripcion` varchar(100) DEFAULT NULL,
  `resan_abreviatura` varchar(50) DEFAULT NULL,
  `resan_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `resultado_analisis`
--

INSERT INTO `resultado_analisis` (`resan_id`, `resan_descripcion`, `resan_abreviatura`, `resan_estado`) VALUES
(1, 'resultado analisis1', 'resana1', 1),
(2, 'resultado analisis2', 'resana2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secado`
--

CREATE TABLE IF NOT EXISTS `secado` (
`sec_id` int(11) NOT NULL,
  `sec_rp` int(11) DEFAULT NULL,
  `sec_fecha_evento` datetime DEFAULT NULL,
  `sec_cuarto_mamarios` int(11) DEFAULT NULL,
  `sec_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE IF NOT EXISTS `servicio` (
`ser_id` int(11) NOT NULL,
  `ser_animal` int(11) NOT NULL,
  `ser_fecha_evento` datetime NOT NULL,
  `ser_reproductor` int(11) NOT NULL,
  `ser_personal` int(11) NOT NULL,
  `ser_estado` int(11) NOT NULL,
  `ser_tipo_servicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo_cria`
--

CREATE TABLE IF NOT EXISTS `sexo_cria` (
`sexcr_id` int(11) NOT NULL,
  `sexcr_descripcion` varchar(150) NOT NULL,
  `sexcr_estado` int(11) NOT NULL,
  `sexcr_codigo` int(11) NOT NULL,
  `sexcr_abreviatura` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sexo_cria`
--

INSERT INTO `sexo_cria` (`sexcr_id`, `sexcr_descripcion`, `sexcr_estado`, `sexcr_codigo`, `sexcr_abreviatura`) VALUES
(1, 'sexo1', 1, 0, ''),
(2, 'sexo2', 1, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `simbolo`
--

CREATE TABLE IF NOT EXISTS `simbolo` (
`sim_id` int(11) NOT NULL,
  `evento` varchar(100) NOT NULL,
  `sim_descripcion` varchar(100) NOT NULL,
  `sim_icono` varchar(60) NOT NULL,
  `sim_estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `simbolo`
--

INSERT INTO `simbolo` (`sim_id`, `evento`, `sim_descripcion`, `sim_icono`, `sim_estado`) VALUES
(1, 'aborto', 'Casa ', 'fa fa-android', 1),
(2, 'analisis', 'mensaje', 'fa fa-dashboard', 1),
(3, 'celo', 'Calendario', 'fa fa-calendar', 1),
(4, 'enfermedad', 'Libro', 'fa fa-chain', 1),
(5, 'indicaciones_especiale', 'Mas', 'fa fa-archive', 1),
(6, 'medicacion', 'pastilla', 'fa fa-comment', 1),
(7, 'muerte', 'Muerte', 'fa fa-arrows-alt', 1),
(8, 'parto', 'Parto', 'fa fa-cut', 1),
(9, 'servicio', 'Servicio', 'fa fa-crosshairs', 1),
(10, 'tacto_rectal', 'Tacto Rectal', 'fa fa-bullhorn', 1),
(11, 'venta', 'Venta', 'fa fa-desktop', 1),
(12, 'secado', 'Secado', 'fa fa-bookmark', 1),
(13, 'rechazo', 'Rechazo', 'fa fa-beer', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tacto_rectal`
--

CREATE TABLE IF NOT EXISTS `tacto_rectal` (
`tarec_id` int(11) NOT NULL,
  `tarec_rp` int(11) DEFAULT NULL,
  `tarec_fecha_evento` datetime DEFAULT NULL,
  `tarec_diag_utero` int(11) DEFAULT NULL,
  `tarec_enfe_ovario` int(11) DEFAULT NULL,
  `tarec_via_aplicacion` int(11) DEFAULT NULL,
  `tarec_estado` int(11) DEFAULT NULL,
  `tarec_enfe_utero` int(11) NOT NULL,
  `tarec_med_genital` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_analisis`
--

CREATE TABLE IF NOT EXISTS `tipo_analisis` (
`tipan_id` int(11) NOT NULL,
  `tipan_descripcion` varchar(100) DEFAULT NULL,
  `tipan_abreviatura` varchar(50) DEFAULT NULL,
  `tipan_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_analisis`
--

INSERT INTO `tipo_analisis` (`tipan_id`, `tipan_descripcion`, `tipan_abreviatura`, `tipan_estado`) VALUES
(1, 'Tipo Analisis 1', 'tipana1', 1),
(2, 'Tipo Analisis 2', 'tipana2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_enfermedad`
--

CREATE TABLE IF NOT EXISTS `tipo_enfermedad` (
`tipen_id` int(11) NOT NULL,
  `tipen_descripcion` varchar(100) DEFAULT NULL,
  `tipen_abreviatura` varchar(50) DEFAULT NULL,
  `tipen_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_enfermedad`
--

INSERT INTO `tipo_enfermedad` (`tipen_id`, `tipen_descripcion`, `tipen_abreviatura`, `tipen_estado`) VALUES
(1, 'tipo enfermedad', 'tipenf1', 1),
(2, 'tipo enfermedad 2', 'tipenf2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_parto`
--

CREATE TABLE IF NOT EXISTS `tipo_parto` (
`tippar_id` int(11) NOT NULL,
  `tippar_descripcion` varchar(100) DEFAULT NULL,
  `tippar_abreviatura` varchar(50) DEFAULT NULL,
  `tippar_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_parto`
--

INSERT INTO `tipo_parto` (`tippar_id`, `tippar_descripcion`, `tippar_abreviatura`, `tippar_estado`) VALUES
(1, 'tipo parto 1', 'tippar1', 1),
(2, 'tipo parto 2', 'tippar2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_registro`
--

CREATE TABLE IF NOT EXISTS `tipo_registro` (
`tipre_id` int(11) NOT NULL,
  `tipre_descripcion` varchar(50) NOT NULL,
  `tipre_estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_registro`
--

INSERT INTO `tipo_registro` (`tipre_id`, `tipre_descripcion`, `tipre_estado`) VALUES
(1, 'tipo registro 1', 1),
(2, 'dfgf', 0),
(3, 'tipo registro 2', 1),
(4, 'tipo registro 3', 1),
(5, 'tipo registro 4', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_servicio`
--

CREATE TABLE IF NOT EXISTS `tipo_servicio` (
`tipse_id` int(11) NOT NULL,
  `tipse_descripcion` varchar(150) NOT NULL,
  `tipse_abreviatura` varchar(50) NOT NULL,
  `tipse_estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_servicio`
--

INSERT INTO `tipo_servicio` (`tipse_id`, `tipse_descripcion`, `tipse_abreviatura`, `tipse_estado`) VALUES
(1, 'Tipo Servicio 1', 'tipser1', 1),
(2, 'Tipo Servicio 2', 'tipser2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `tipo_usuario` (
`tipusu_id` int(11) NOT NULL,
  `tipusu_descripcion` varchar(50) NOT NULL,
  `tipusu_estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`tipusu_id`, `tipusu_descripcion`, `tipusu_estado`) VALUES
(1, 'Administrador', 1),
(3, 'DBA', 1),
(4, 'Invitado', 0),
(5, 'Invitado', 0),
(6, 'Invitado', 0),
(7, 'Invitado', 0),
(8, 'Invitado user', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`usu_id` int(11) NOT NULL,
  `usu_nombre` varchar(150) NOT NULL,
  `usu_password` varchar(500) NOT NULL,
  `usu_estado` int(11) NOT NULL,
  `usu_personal` int(11) NOT NULL,
  `usu_tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usu_nombre`, `usu_password`, `usu_estado`, `usu_personal`, `usu_tipo_usuario`) VALUES
(1, 'admin', '1234', 1, 1, 1),
(2, 'colbert', '1234', 1, 1, 3),
(3, 'fisiano', '1234', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE IF NOT EXISTS `venta` (
`venta_id` int(11) NOT NULL,
  `venta_rp` int(11) DEFAULT NULL,
  `venta_fecha_evento` datetime DEFAULT NULL,
  `venta_especif_venta` int(11) DEFAULT NULL,
  `venta_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `via_aplicacion`
--

CREATE TABLE IF NOT EXISTS `via_aplicacion` (
`viaap_id` int(11) NOT NULL,
  `viaap_descripcion` varchar(100) DEFAULT NULL,
  `viaap_abreviatura` varchar(50) DEFAULT NULL,
  `viaap_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `via_aplicacion`
--

INSERT INTO `via_aplicacion` (`viaap_id`, `viaap_descripcion`, `viaap_abreviatura`, `viaap_estado`) VALUES
(1, 'via aplicacion 1', 'viaapl1', 1),
(2, 'via aplicacion 2', 'viaapl2', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aborto`
--
ALTER TABLE `aborto`
 ADD PRIMARY KEY (`ab_id`);

--
-- Indices de la tabla `analisis`
--
ALTER TABLE `analisis`
 ADD PRIMARY KEY (`ana_id`);

--
-- Indices de la tabla `animal`
--
ALTER TABLE `animal`
 ADD PRIMARY KEY (`ani_id`);

--
-- Indices de la tabla `auditoria`
--
ALTER TABLE `auditoria`
 ADD PRIMARY KEY (`aud_id`), ADD KEY `aud_usuario` (`aud_usuario`);

--
-- Indices de la tabla `causa_aborto`
--
ALTER TABLE `causa_aborto`
 ADD PRIMARY KEY (`ca_id`);

--
-- Indices de la tabla `causa_no_inseminal`
--
ALTER TABLE `causa_no_inseminal`
 ADD PRIMARY KEY (`cni_id`);

--
-- Indices de la tabla `causa_rechazo`
--
ALTER TABLE `causa_rechazo`
 ADD PRIMARY KEY (`cr_id`);

--
-- Indices de la tabla `celo`
--
ALTER TABLE `celo`
 ADD PRIMARY KEY (`celo_id`);

--
-- Indices de la tabla `diagnostico_utero`
--
ALTER TABLE `diagnostico_utero`
 ADD PRIMARY KEY (`diaut_id`);

--
-- Indices de la tabla `enfermedad`
--
ALTER TABLE `enfermedad`
 ADD PRIMARY KEY (`enf_id`);

--
-- Indices de la tabla `enfermedad_ovario`
--
ALTER TABLE `enfermedad_ovario`
 ADD PRIMARY KEY (`enfov_id`);

--
-- Indices de la tabla `enfermedad_utero`
--
ALTER TABLE `enfermedad_utero`
 ADD PRIMARY KEY (`enfut_id`);

--
-- Indices de la tabla `especificacion_muerte`
--
ALTER TABLE `especificacion_muerte`
 ADD PRIMARY KEY (`espmu_id`);

--
-- Indices de la tabla `especificacion_venta`
--
ALTER TABLE `especificacion_venta`
 ADD PRIMARY KEY (`espve_id`);

--
-- Indices de la tabla `estado_cria`
--
ALTER TABLE `estado_cria`
 ADD PRIMARY KEY (`estcr_id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
 ADD PRIMARY KEY (`eve_id`);

--
-- Indices de la tabla `indicaciones_especiale`
--
ALTER TABLE `indicaciones_especiale`
 ADD PRIMARY KEY (`indes_id`);

--
-- Indices de la tabla `indicaciones_especiales`
--
ALTER TABLE `indicaciones_especiales`
 ADD PRIMARY KEY (`indesp_id`);

--
-- Indices de la tabla `log_transacciones`
--
ALTER TABLE `log_transacciones`
 ADD PRIMARY KEY (`logtr_id`);

--
-- Indices de la tabla `medicacion`
--
ALTER TABLE `medicacion`
 ADD PRIMARY KEY (`med_id`);

--
-- Indices de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
 ADD PRIMARY KEY (`medi_id`);

--
-- Indices de la tabla `medicina_genital`
--
ALTER TABLE `medicina_genital`
 ADD PRIMARY KEY (`medge_id`);

--
-- Indices de la tabla `medi_cuartos_mamarios`
--
ALTER TABLE `medi_cuartos_mamarios`
 ADD PRIMARY KEY (`mecu_id`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
 ADD PRIMARY KEY (`mod_id`);

--
-- Indices de la tabla `muerte`
--
ALTER TABLE `muerte`
 ADD PRIMARY KEY (`mue_id`);

--
-- Indices de la tabla `parto`
--
ALTER TABLE `parto`
 ADD PRIMARY KEY (`par_id`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
 ADD PRIMARY KEY (`per_tipo_usuario`,`per_modulo`), ADD KEY `per_tipo_user` (`per_tipo_usuario`), ADD KEY `per_modulo` (`per_modulo`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
 ADD PRIMARY KEY (`per_id`);

--
-- Indices de la tabla `raza`
--
ALTER TABLE `raza`
 ADD PRIMARY KEY (`raz_id`);

--
-- Indices de la tabla `rechazo`
--
ALTER TABLE `rechazo`
 ADD PRIMARY KEY (`recha_id`);

--
-- Indices de la tabla `reproductor`
--
ALTER TABLE `reproductor`
 ADD PRIMARY KEY (`repro_id`);

--
-- Indices de la tabla `resultado_analisis`
--
ALTER TABLE `resultado_analisis`
 ADD PRIMARY KEY (`resan_id`);

--
-- Indices de la tabla `secado`
--
ALTER TABLE `secado`
 ADD PRIMARY KEY (`sec_id`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
 ADD PRIMARY KEY (`ser_id`);

--
-- Indices de la tabla `sexo_cria`
--
ALTER TABLE `sexo_cria`
 ADD PRIMARY KEY (`sexcr_id`);

--
-- Indices de la tabla `simbolo`
--
ALTER TABLE `simbolo`
 ADD PRIMARY KEY (`sim_id`);

--
-- Indices de la tabla `tacto_rectal`
--
ALTER TABLE `tacto_rectal`
 ADD PRIMARY KEY (`tarec_id`);

--
-- Indices de la tabla `tipo_analisis`
--
ALTER TABLE `tipo_analisis`
 ADD PRIMARY KEY (`tipan_id`);

--
-- Indices de la tabla `tipo_enfermedad`
--
ALTER TABLE `tipo_enfermedad`
 ADD PRIMARY KEY (`tipen_id`);

--
-- Indices de la tabla `tipo_parto`
--
ALTER TABLE `tipo_parto`
 ADD PRIMARY KEY (`tippar_id`);

--
-- Indices de la tabla `tipo_registro`
--
ALTER TABLE `tipo_registro`
 ADD PRIMARY KEY (`tipre_id`);

--
-- Indices de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
 ADD PRIMARY KEY (`tipse_id`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
 ADD PRIMARY KEY (`tipusu_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`usu_id`), ADD UNIQUE KEY `usu_nombre` (`usu_nombre`), ADD KEY `usu_personal` (`usu_personal`), ADD KEY `usu_tipo_usuario` (`usu_tipo_usuario`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
 ADD PRIMARY KEY (`venta_id`);

--
-- Indices de la tabla `via_aplicacion`
--
ALTER TABLE `via_aplicacion`
 ADD PRIMARY KEY (`viaap_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aborto`
--
ALTER TABLE `aborto`
MODIFY `ab_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `analisis`
--
ALTER TABLE `analisis`
MODIFY `ana_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `animal`
--
ALTER TABLE `animal`
MODIFY `ani_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
MODIFY `aud_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=353;
--
-- AUTO_INCREMENT de la tabla `causa_aborto`
--
ALTER TABLE `causa_aborto`
MODIFY `ca_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `causa_no_inseminal`
--
ALTER TABLE `causa_no_inseminal`
MODIFY `cni_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `causa_rechazo`
--
ALTER TABLE `causa_rechazo`
MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `celo`
--
ALTER TABLE `celo`
MODIFY `celo_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `diagnostico_utero`
--
ALTER TABLE `diagnostico_utero`
MODIFY `diaut_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `enfermedad`
--
ALTER TABLE `enfermedad`
MODIFY `enf_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `enfermedad_ovario`
--
ALTER TABLE `enfermedad_ovario`
MODIFY `enfov_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `enfermedad_utero`
--
ALTER TABLE `enfermedad_utero`
MODIFY `enfut_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `especificacion_muerte`
--
ALTER TABLE `especificacion_muerte`
MODIFY `espmu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `especificacion_venta`
--
ALTER TABLE `especificacion_venta`
MODIFY `espve_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `estado_cria`
--
ALTER TABLE `estado_cria`
MODIFY `estcr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
MODIFY `eve_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `indicaciones_especiale`
--
ALTER TABLE `indicaciones_especiale`
MODIFY `indes_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `indicaciones_especiales`
--
ALTER TABLE `indicaciones_especiales`
MODIFY `indesp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `log_transacciones`
--
ALTER TABLE `log_transacciones`
MODIFY `logtr_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `medicacion`
--
ALTER TABLE `medicacion`
MODIFY `med_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
MODIFY `medi_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `medicina_genital`
--
ALTER TABLE `medicina_genital`
MODIFY `medge_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `medi_cuartos_mamarios`
--
ALTER TABLE `medi_cuartos_mamarios`
MODIFY `mecu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
MODIFY `mod_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT de la tabla `muerte`
--
ALTER TABLE `muerte`
MODIFY `mue_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `parto`
--
ALTER TABLE `parto`
MODIFY `par_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `raza`
--
ALTER TABLE `raza`
MODIFY `raz_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `rechazo`
--
ALTER TABLE `rechazo`
MODIFY `recha_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `reproductor`
--
ALTER TABLE `reproductor`
MODIFY `repro_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `resultado_analisis`
--
ALTER TABLE `resultado_analisis`
MODIFY `resan_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `secado`
--
ALTER TABLE `secado`
MODIFY `sec_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
MODIFY `ser_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sexo_cria`
--
ALTER TABLE `sexo_cria`
MODIFY `sexcr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `simbolo`
--
ALTER TABLE `simbolo`
MODIFY `sim_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `tacto_rectal`
--
ALTER TABLE `tacto_rectal`
MODIFY `tarec_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_analisis`
--
ALTER TABLE `tipo_analisis`
MODIFY `tipan_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_enfermedad`
--
ALTER TABLE `tipo_enfermedad`
MODIFY `tipen_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_parto`
--
ALTER TABLE `tipo_parto`
MODIFY `tippar_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_registro`
--
ALTER TABLE `tipo_registro`
MODIFY `tipre_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
MODIFY `tipse_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
MODIFY `tipusu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
MODIFY `venta_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `via_aplicacion`
--
ALTER TABLE `via_aplicacion`
MODIFY `viaap_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `permiso`
--
ALTER TABLE `permiso`
ADD CONSTRAINT `permiso_ibfk_1` FOREIGN KEY (`per_tipo_usuario`) REFERENCES `tipo_usuario` (`tipusu_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `permiso_ibfk_2` FOREIGN KEY (`per_modulo`) REFERENCES `modulo` (`mod_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`usu_personal`) REFERENCES `personal` (`per_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`usu_tipo_usuario`) REFERENCES `tipo_usuario` (`tipusu_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
