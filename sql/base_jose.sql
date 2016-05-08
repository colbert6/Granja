-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2016 a las 23:32:17
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, '234', 'elar', 2, 3, '2016-04-30 00:00:00', '2016-04-30 00:00:00', 1, 'sergio', 1, 'ro', 1),
(2, '87678', 'diego', 12, 13, '2016-04-29 00:00:00', '2016-04-29 00:00:00', 14, 'diego', 2, 'sdf', 1);

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
(1, 'infeccion', 'i', 1),
(2, 'beneno', 'b', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `causa_no_inseminal`
--

CREATE TABLE IF NOT EXISTS `causa_no_inseminal` (
`cni_id` int(11) NOT NULL,
  `cni_descripcion` varchar(150) NOT NULL,
  `cni_abreviatura` varchar(50) NOT NULL,
  `cni_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `causa_rechazo`
--

CREATE TABLE IF NOT EXISTS `causa_rechazo` (
`cr_id` int(11) NOT NULL,
  `cr_descripcion` varchar(150) NOT NULL,
  `cr_abreviatura` varchar(50) NOT NULL,
  `cr_esta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedad`
--

CREATE TABLE IF NOT EXISTS `enfermedad` (
`enf_id` int(11) NOT NULL,
  `enf_rp` int(11) DEFAULT NULL,
  `enf_fecha_evento` datetime DEFAULT NULL,
  `enf_tipo_enfermedad` int(11) DEFAULT NULL,
  `enf_mediciamento` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedad_utero`
--

CREATE TABLE IF NOT EXISTS `enfermedad_utero` (
`enfut_id` int(11) NOT NULL,
  `enfut_descripcion` varchar(150) NOT NULL,
  `enfut_abreviatura` varchar(50) NOT NULL,
  `enfut_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especificacion_muerte`
--

CREATE TABLE IF NOT EXISTS `especificacion_muerte` (
`espmu_id` int(11) NOT NULL,
  `espmu_descripcion` varchar(150) NOT NULL,
  `espmu_abreviatura` varchar(50) NOT NULL,
  `espmu_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especificacion_venta`
--

CREATE TABLE IF NOT EXISTS `especificacion_venta` (
`espve_id` int(11) NOT NULL,
  `espve_descripcion` varchar(100) DEFAULT NULL,
  `espve_abreviatura` varchar(50) DEFAULT NULL,
  `espve_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_cria`
--

CREATE TABLE IF NOT EXISTS `estado_cria` (
`estcr_id` int(11) NOT NULL,
  `estcr_descripcion` varchar(100) DEFAULT NULL,
  `estcr_abreviatura` varchar(50) DEFAULT NULL,
  `estcr_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medicacion`
--

INSERT INTO `medicacion` (`med_id`, `med_rp`, `med_fecha_evento`, `med_medicamentos`, `med_via_aplicacion`, `med_estado`) VALUES
(1, 12, '2016-05-12 00:00:00', 3, 23, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE IF NOT EXISTS `medicamentos` (
`medi_id` int(11) NOT NULL,
  `medi_descripcion` varchar(100) DEFAULT NULL,
  `medi_abreviatura` varchar(50) DEFAULT NULL,
  `medi_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicina_genital`
--

CREATE TABLE IF NOT EXISTS `medicina_genital` (
`medge_id` int(11) NOT NULL,
  `medge_descripcion` varchar(100) DEFAULT NULL,
  `medge_abreviatura` varchar(50) DEFAULT NULL,
  `medge_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medi_cuartos_mamarios`
--

CREATE TABLE IF NOT EXISTS `medi_cuartos_mamarios` (
`mecu_id` int(11) NOT NULL,
  `mecu_descripcion` varchar(100) DEFAULT NULL,
  `mecu_abreviatura` varchar(50) DEFAULT NULL,
  `mecu_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE IF NOT EXISTS `modulo` (
`mod_id` int(11) NOT NULL,
  `mod_descripcion` varchar(100) NOT NULL,
  `mod_padre` varchar(50) NOT NULL,
  `mod_url` varchar(50) NOT NULL,
  `mod_estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`mod_id`, `mod_descripcion`, `mod_padre`, `mod_url`, `mod_estado`) VALUES
(1, 'Registro', 'mantenimiento', 'animal', 1),
(2, 'Razas', 'mantenimiento', 'razas', 1),
(3, 'Tipo Registro', 'mantenimiento', 'tipo_registro', 1),
(4, 'Aborto', 'evento', 'aborto', 1),
(5, 'Celo', 'evento', 'celo', 1),
(6, 'Usuario', 'sistema', 'usuario', 1),
(7, 'Modulos', 'sistema', 'modulo', 1),
(8, 'Tipo', 'sistema', 'tipo_usuario', 1),
(9, 'Permisos', 'sistema', 'Permiso', 1),
(10, 'Medicacion', 'mantenimiento', 'medicacion', 1),
(11, 'Medicina Genital', 'mantenimiento', 'medicina_genital', 1),
(12, 'Medicina Cuartos Mamarios', 'mantenimiento', 'medicina_cuarto_mamarios', 1),
(13, 'Personal', 'mantenimiento', 'personal', 1),
(14, 'Reproductor', 'mantenimiento', 'reproductor', 1),
(15, 'Tipo Analisis', 'mantenimiento', 'tipo_analisis', 1),
(16, 'Tipo Enfermedad', 'mantenimiento', 'tipo_endermedad', 1),
(17, 'Tipo Parto', 'mantenimiento', 'tipo_parto', 1),
(18, 'Tipo Servicio', 'mantenimiento', 'tipo_servicio', 1),
(19, 'Causa Aborto', 'mantenimiento', 'causa_aborto', 1),
(20, 'Causa No Inseminal', 'mantenimiento', 'causa_no_inseminal', 1),
(21, 'Causa Rechazo', 'mantenimiento', 'causa_rechazo', 1),
(22, 'Diagnostico Utero', 'mantenimiento', 'diagnostico_utero', 1),
(23, 'Enfermedad Ovario', 'mantenimiento', 'enfermedad_ovario', 1),
(24, 'Enfermedad Utero', 'mantenimiento', 'enfermedad_utero', 1),
(25, 'Especificacion Muerte', 'mantenimiento', 'especificacion_muerte', 1),
(26, 'Especificacion Venta', 'mantenimiento', 'especificacion venta', 1),
(27, 'Estado Cria', 'mantenimiento', 'estado cria', 1),
(28, 'Resultado De Analisis', 'mantenimiento', 'resultado de analisis', 1),
(29, 'Via Aplicacion', 'mantenimiento', 'via aplicacion', 1),
(30, 'Analisis', 'evento', 'analisis', 1),
(31, 'Enfermedad', 'evento', 'enfermedad', 1),
(32, 'Indicaciones Especiales', 'evento', 'indicaciones especiales', 1),
(33, 'Medicacion', 'evento', 'medicacion', 1),
(34, 'Muerte', 'evento', 'muerte', 1),
(35, 'Parto', 'evento', 'parto', 1),
(36, 'Servicio', 'evento', 'servicio', 1),
(37, 'Tacto Rectal', 'evento', 'tacto rectal', 1),
(38, 'Venta', 'evento', 'venta', 1),
(39, 'Secado', 'evento', 'secado', 1),
(40, 'Rechazo', 'evento', 'rechazo', 1);

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
(1, 1, '2016-05-19 00:00:00', 2, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parto`
--

INSERT INTO `parto` (`par_id`, `par_rp`, `par_fechanac`, `par_estado_cria`, `par_tipo_parto`, `par_sexo_cria`, `par_estado`, `par_servicio`) VALUES
(1, '1', '2016-05-13 00:00:00', 1, 1, '1', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE IF NOT EXISTS `permiso` (
  `per_user` int(11) NOT NULL,
  `per_modulo` int(11) NOT NULL,
  `per_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`per_user`, `per_modulo`, `per_estado`) VALUES
(1, 1, 1),
(1, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE IF NOT EXISTS `personal` (
`per_id` int(11) NOT NULL,
  `per_nombre` varchar(150) NOT NULL,
  `per_ape_paterno` varchar(150) NOT NULL,
  `per_ape_materno` varchar(150) NOT NULL,
  `per_direccion` varchar(150) NOT NULL,
  `per_telefono` varchar(30) NOT NULL,
  `per_estado` int(11) NOT NULL,
  `per_tipo_personal` int(11) NOT NULL,
  `per_distrito` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`per_id`, `per_nombre`, `per_ape_paterno`, `per_ape_materno`, `per_direccion`, `per_telefono`, `per_estado`, `per_tipo_personal`, `per_distrito`) VALUES
(1, 'Enrique', 'Salvador', 'Ayende', '', '', 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raza`
--

CREATE TABLE IF NOT EXISTS `raza` (
`raz_id` int(11) NOT NULL,
  `raz_descripcion` varchar(150) NOT NULL,
  `raz_abreviacion` varchar(50) NOT NULL,
  `raz_estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `raza`
--

INSERT INTO `raza` (`raz_id`, `raz_descripcion`, `raz_abreviacion`, `raz_estado`) VALUES
(1, 'Cebu', '', 1),
(2, 'fleiber', '', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rechazo`
--

INSERT INTO `rechazo` (`recha_id`, `recha_rp`, `recha_fecha_evento`, `recha_causa_rechazo`, `recha_estado`) VALUES
(1, 3, '2016-05-12 00:00:00', 6, 1),
(2, 7, '2016-05-18 00:00:00', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reproductor`
--

CREATE TABLE IF NOT EXISTS `reproductor` (
`repro_id` int(11) NOT NULL,
  `repro_descripcion` varchar(100) DEFAULT NULL,
  `repro_abreviatura` varchar(50) DEFAULT NULL,
  `repro_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultado_analisis`
--

CREATE TABLE IF NOT EXISTS `resultado_analisis` (
`resan_id` int(11) NOT NULL,
  `resan_descripcion` varchar(100) DEFAULT NULL,
  `resan_abreviatura` varchar(50) DEFAULT NULL,
  `resan_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `secado`
--

INSERT INTO `secado` (`sec_id`, `sec_rp`, `sec_fecha_evento`, `sec_cuarto_mamarios`, `sec_estado`) VALUES
(1, 1, '2016-05-12 00:00:00', 8, 1),
(2, 9, '2016-05-20 00:00:00', 7, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`ser_id`, `ser_animal`, `ser_fecha_evento`, `ser_reproductor`, `ser_personal`, `ser_estado`, `ser_tipo_servicio`) VALUES
(1, 1, '2016-05-02 00:00:00', 2, 3, 1, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `simbolo`
--

CREATE TABLE IF NOT EXISTS `simbolo` (
  `sim_id` varchar(50) NOT NULL,
  `sim_descripcion` varchar(100) NOT NULL,
  `sim_icono` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `tarec_enfe_utero` int(11) DEFAULT NULL,
  `tarec_med_genital` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tacto_rectal`
--

INSERT INTO `tacto_rectal` (`tarec_id`, `tarec_rp`, `tarec_fecha_evento`, `tarec_diag_utero`, `tarec_enfe_ovario`, `tarec_via_aplicacion`, `tarec_estado`, `tarec_enfe_utero`, `tarec_med_genital`) VALUES
(1, 1, '2016-05-19 00:00:00', 2, 1, 1, 1, 21, 2),
(2, 2, '2016-05-18 00:00:00', 5, 5, 5, 1, 6, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_analisis`
--

CREATE TABLE IF NOT EXISTS `tipo_analisis` (
`tipan_id` int(11) NOT NULL,
  `tipan_descripcion` varchar(100) DEFAULT NULL,
  `tipan_abreviatura` varchar(50) DEFAULT NULL,
  `tipan_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_enfermedad`
--

CREATE TABLE IF NOT EXISTS `tipo_enfermedad` (
`tipen_id` int(11) NOT NULL,
  `tipen_descripcion` varchar(100) DEFAULT NULL,
  `tipen_abreviatura` varchar(50) DEFAULT NULL,
  `tipen_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_parto`
--

CREATE TABLE IF NOT EXISTS `tipo_parto` (
`tippar_id` int(11) NOT NULL,
  `tippar_descripcion` varchar(100) DEFAULT NULL,
  `tippar_abreviatura` varchar(50) DEFAULT NULL,
  `tippar_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Cuaderno', 1),
(2, 'dfgf', 0),
(3, 'dfgf', 1),
(4, 'jose', 1),
(5, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_servicio`
--

CREATE TABLE IF NOT EXISTS `tipo_servicio` (
`tipse_id` int(11) NOT NULL,
  `tipse_descripcion` varchar(150) NOT NULL,
  `tipse_abreviatura` varchar(50) NOT NULL,
  `tipse_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `tipo_usuario` (
`tipusu_id` int(11) NOT NULL,
  `tipusu_descripcion` varchar(50) NOT NULL,
  `tipusu_estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`tipusu_id`, `tipusu_descripcion`, `tipusu_estado`) VALUES
(1, 'Administrador', 1),
(2, 'DBA', 1);

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
(2, 'colbertss', '1234', 1, 1, 1),
(3, 'willy', '4321', 1, 1, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`venta_id`, `venta_rp`, `venta_fecha_evento`, `venta_especif_venta`, `venta_estado`) VALUES
(1, 3, '2016-05-07 00:00:00', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `via_aplicacion`
--

CREATE TABLE IF NOT EXISTS `via_aplicacion` (
`viaap_id` int(11) NOT NULL,
  `viaap_descripcion` varchar(100) DEFAULT NULL,
  `viaap_abreviatura` varchar(50) DEFAULT NULL,
  `viaap_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
 ADD PRIMARY KEY (`usu_id`);

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
MODIFY `ab_id` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT de la tabla `causa_aborto`
--
ALTER TABLE `causa_aborto`
MODIFY `ca_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `causa_no_inseminal`
--
ALTER TABLE `causa_no_inseminal`
MODIFY `cni_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `causa_rechazo`
--
ALTER TABLE `causa_rechazo`
MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `celo`
--
ALTER TABLE `celo`
MODIFY `celo_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `diagnostico_utero`
--
ALTER TABLE `diagnostico_utero`
MODIFY `diaut_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `enfermedad`
--
ALTER TABLE `enfermedad`
MODIFY `enf_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `enfermedad_ovario`
--
ALTER TABLE `enfermedad_ovario`
MODIFY `enfov_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `enfermedad_utero`
--
ALTER TABLE `enfermedad_utero`
MODIFY `enfut_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `especificacion_muerte`
--
ALTER TABLE `especificacion_muerte`
MODIFY `espmu_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `especificacion_venta`
--
ALTER TABLE `especificacion_venta`
MODIFY `espve_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estado_cria`
--
ALTER TABLE `estado_cria`
MODIFY `estcr_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `indicaciones_especiale`
--
ALTER TABLE `indicaciones_especiale`
MODIFY `indes_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `indicaciones_especiales`
--
ALTER TABLE `indicaciones_especiales`
MODIFY `indesp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `log_transacciones`
--
ALTER TABLE `log_transacciones`
MODIFY `logtr_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `medicacion`
--
ALTER TABLE `medicacion`
MODIFY `med_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
MODIFY `medi_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `medicina_genital`
--
ALTER TABLE `medicina_genital`
MODIFY `medge_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `medi_cuartos_mamarios`
--
ALTER TABLE `medi_cuartos_mamarios`
MODIFY `mecu_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
MODIFY `mod_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `muerte`
--
ALTER TABLE `muerte`
MODIFY `mue_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `parto`
--
ALTER TABLE `parto`
MODIFY `par_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `raza`
--
ALTER TABLE `raza`
MODIFY `raz_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `rechazo`
--
ALTER TABLE `rechazo`
MODIFY `recha_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `reproductor`
--
ALTER TABLE `reproductor`
MODIFY `repro_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `resultado_analisis`
--
ALTER TABLE `resultado_analisis`
MODIFY `resan_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `secado`
--
ALTER TABLE `secado`
MODIFY `sec_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
MODIFY `ser_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `sexo_cria`
--
ALTER TABLE `sexo_cria`
MODIFY `sexcr_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tacto_rectal`
--
ALTER TABLE `tacto_rectal`
MODIFY `tarec_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_analisis`
--
ALTER TABLE `tipo_analisis`
MODIFY `tipan_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_enfermedad`
--
ALTER TABLE `tipo_enfermedad`
MODIFY `tipen_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_parto`
--
ALTER TABLE `tipo_parto`
MODIFY `tippar_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_registro`
--
ALTER TABLE `tipo_registro`
MODIFY `tipre_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
MODIFY `tipse_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
MODIFY `tipusu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
MODIFY `venta_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `via_aplicacion`
--
ALTER TABLE `via_aplicacion`
MODIFY `viaap_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
