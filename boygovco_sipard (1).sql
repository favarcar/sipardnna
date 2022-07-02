-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-03-2022 a las 20:35:28
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `boygovco_sipard`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuidadores`
--

CREATE TABLE `cuidadores` (
  `id_cuidadores` int(11) NOT NULL,
  `id_tipo_documento` varchar(4) DEFAULT NULL,
  `No_Cedula` int(11) NOT NULL,
  `Nombres` varchar(50) DEFAULT NULL,
  `Apellidos` varchar(50) DEFAULT NULL,
  `Fecha_Nacimiento` date DEFAULT NULL,
  `Edad` int(3) DEFAULT NULL,
  `Direccion` varchar(30) DEFAULT NULL,
  `telefono_movil` varchar(30) DEFAULT NULL,
  `correo_electronico` varchar(100) DEFAULT NULL,
  `id_parentesco` int(3) DEFAULT NULL,
  `id_estado` int(3) DEFAULT NULL,
  `id_estrato` int(3) DEFAULT NULL,
  `id_etnia` int(3) DEFAULT NULL,
  `id_genero` varchar(1) DEFAULT NULL,
  `id_niveleducativo` int(3) DEFAULT NULL,
  `id_regimen` int(5) DEFAULT NULL,
  `id_eps` varchar(10) DEFAULT NULL,
  `id_municipio` int(5) DEFAULT NULL,
  `id_provincia` int(5) DEFAULT NULL,
  `id_zona` varchar(3) DEFAULT NULL,
  `Puntaje_Sisben` int(11) DEFAULT NULL,
  `fecha_cuida` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_ninos` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cuidadores`
--

INSERT INTO `cuidadores` (`id_cuidadores`, `id_tipo_documento`, `No_Cedula`, `Nombres`, `Apellidos`, `Fecha_Nacimiento`, `Edad`, `Direccion`, `telefono_movil`, `correo_electronico`, `id_parentesco`, `id_estado`, `id_estrato`, `id_etnia`, `id_genero`, `id_niveleducativo`, `id_regimen`, `id_eps`, `id_municipio`, `id_provincia`, `id_zona`, `Puntaje_Sisben`, `fecha_cuida`, `id_usuario`, `id_ninos`) VALUES
(1, 'CC', 9517925, 'JORGE', 'VELANDIA', '1988-04-04', 64, 'calle 37a # 4-10', '3123659740', 'indigenablanco@gmail.com', 1, 2, 1, 1, 'M', 8, 1, 'CCF009', 15092, 1, 'U', 45, '2017-10-17', 1057578145, 7),
(4, 'CC', 74233621, 'MANUEL ', 'LIZARAZO', '1962-11-10', 55, 'calle 2 # 7-40', '3123444010', 'manuelbelen@gmail.com', 1, 3, 1, 1, 'M', 3, 2, 'EPSS33', 15087, 12, 'U', 17, '2017-11-07', 900333743, 9),
(3, 'CC', 33123, 'XIMENA', 'CASTELLANOS', '1988-04-04', 23, '453453453', '3543534535', 'dacastellanos88@gmail.com', 2, 4, 3, 1, 'M', 5, 1, 'CCF023', 15001, 1, 'R', 454, '2017-10-18', 1057578145, 5),
(7, 'RC', 33, 'CC', 'CC', '1988-04-04', 33, '33', '33', 'ejemplo@ejemplo.com', 2, 1, 2, 5, 'F', 2, 2, 'CCF037', 15232, 12, 'U', 33, '2017-11-22', 1057578145, 12),
(8, 'RC', 2, 'F', 'F', '1988-04-04', 2, '2', '2', 'ejemplo@ejemplo.com', 9, 4, 6, 2, 'F', 7, 4, 'CCF049', 15176, 1, 'R', 2, '2017-11-24', 30303843, 13),
(9, 'CC', 23423423, 'EVER ', 'SALAZAR BLANCO', '1980-06-15', 38, 'cr 1-d n 3-24', '3204569595', 'ever-90101@gotmail.com', 1, 1, 4, 1, 'M', 3, 2, 'EPSS03', 15879, 4, 'R', 2, '2018-06-05', 41001100, 16),
(10, 'TI', 1049621862, 'MARIO ESTEBAN', 'SALAZAR OCAMPO', '1990-07-10', 27, 'CASA 18 N 17', '3102951389', 'ANDERSON-90101@HOTMAIL.COM', 1, 3, 2, 1, 'M', 3, 3, 'EPSS03', 15455, 5, 'U', 2, '2018-06-19', 40179942, 17),
(11, 'CC', 2147483647, 'ESTEBAN', 'ROA', '2018-05-09', 23, '5101 Van Loon St 2Fl. Elmhurst', '6466676286', 'leonago_38@hotmail.com', 1, 1, 2, 1, 'M', 1, 2, 'CCF002', 15001, 1, 'U', 2, '2019-01-15', 40179942, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `derechos`
--

CREATE TABLE `derechos` (
  `id_derecho` int(11) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `derechos`
--

INSERT INTO `derechos` (`id_derecho`, `descripcion`) VALUES
(1, 'A tener derechos sin ser discriminado'),
(2, 'A gozar de una seguridad social'),
(3, 'A tener un nombre y una nacionalidad'),
(4, 'A disfrutar de alimentación, vivienda, recreo y servicios médicos adecuados'),
(5, 'A recibir atención y cuidados especiales cuando el niño sufre algún impedimento físico, mental o social'),
(6, 'Al amor y a la familia'),
(7, 'A la educación'),
(8, 'A ser los primeros en recibir atención en situaciones de emergencia'),
(9, 'Al buen trato'),
(10, 'A la protección contra todo tipo de discriminación y a la educación en la tolerancia frente a las diferencias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discapacidades`
--

CREATE TABLE `discapacidades` (
  `id_discapacidad` int(11) NOT NULL,
  `descripcion` varchar(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `discapacidades`
--

INSERT INTO `discapacidades` (`id_discapacidad`, `descripcion`) VALUES
(1, 'COGNITIVA'),
(2, 'AUDITIVA'),
(3, 'VISUAL'),
(4, 'SENSORIAL'),
(5, 'FISICA'),
(6, 'COMUNICATIVA'),
(7, 'MULTIPLE'),
(8, 'OTRA DISCAPACIDAD'),
(9, 'NINGUNA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidades`
--

CREATE TABLE `entidades` (
  `id_entidad` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entidades`
--

INSERT INTO `entidades` (`id_entidad`, `descripcion`) VALUES
(1, 'PRIMERA INFANCIA'),
(2, 'GOBERNACION DE BOYACA'),
(3, 'INDEPORTES'),
(4, 'SENA'),
(5, 'ADMINISTRACION MUNICIPAL'),
(6, 'COMISARIA DE FAMILLIA'),
(7, 'ESE MUNICIPAL'),
(8, 'ICBF'),
(9, 'PROCURADURIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eps`
--

CREATE TABLE `eps` (
  `id_eps` varchar(10) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `descripcion` varchar(150) CHARACTER SET latin1 NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eps`
--

INSERT INTO `eps` (`id_eps`, `descripcion`) VALUES
('CCF001', 'CAJA DE COMPENSACION FAMILIAR COMFAMILIAR CAMACOLCOMFAMILIAR CAMACOL'),
('CCF002', 'CAJA DE COMPENSACION FAMILIAR DE ANTIOQUIA COMFAMA.'),
('CCF007', 'Caja de CompensaciÃ³n Familiar de Cartagena \"COMFAMILIAR CARTAGENA\".'),
('CCF009', 'Caja de CompensaciÃ³n Familiar de BoyacÃ¡ COMFABOY.'),
('CCF015', 'CAJA DE COMPENSACION FAMILIAR DE CORDOBA COMFACOR.'),
('CCF018', 'CAJA DE COMPENSACION FAMILIAR CAFAM.'),
('CCF023', 'Caja de CompensaciÃ³n Familiar de la Guajira.'),
('CCF024', 'Caja de CompensaciÃ³n Familiar del Huila \"COMFAMILIAR\".'),
('CCF027', 'Caja de CompensaciÃ³n Familiar de NariÃ±o \"COMFAMILIAR NARIÃ‘O\".'),
('CCF028', 'Caja de CompensaciÃ³n Familiar de Fenalco \"COMFENALCO QUINDIO\".'),
('CCF031', 'Caja Santandereana de Subsidio Familiar \"CAJASAN\".'),
('CCF032', 'Caja de CompensaciÃ³n Familiar de Fenalco Seccional de Santander.'),
('CCF033', 'Caja de CompensaciÃ³n Familiar de Sucre.'),
('CCF035', 'CAJA DE COMPENSACION FAMILIAR DE BARRANCABERMEJA CAFABA.'),
('CCF037', 'CAJA DE COMPENSACION FAMILIAR DE FENALCO DE TOLIMA COMFENALCO.'),
('CCF045', 'Caja de CompensaciÃ³n Familiar del Norte de Santander \"COMFANORTE\".'),
('CCF049', 'Caja de CompensaciÃ³n Familiar C.C.F. del Oriente Colombiano \"COMFAORIENTE\".'),
('CCF053', 'Caja de CompensaciÃ³n Familiar de Cundinamarca COMFACUNDI.'),
('CCF055', 'CAJA DE DE COMPENSACION FAMILIAR CAJACOPI ATLANTICO.'),
('CCF101', 'COLSUBSIDIO.'),
('CCF102', 'Caja de CompensaciÃ³n Familiar del ChocÃ³ COMFACHOCO.'),
('CCF103', 'Caja de CompensaciÃ³n Familiar del CaquetÃ¡ â€“ COMFACA.'),
('EPS020', 'Caprecom EPS.'),
('EPS022', 'EPS CONVIDA.'),
('EPS025', 'CAPRESOCA EPS.'),
('EPS028', 'CALISALUD E.P.S'),
('EPS030', 'E.P.S. CONDOR S.A.'),
('EPS031', 'SELVASALUD S.A. E.P.S'),
('EPSI06 ', 'PIJAOS SALUD EPSI'),
('EPSS02', 'Salud Total S.A. E.P.S.'),
('EPSS03', 'Cafesalud E.P.S. S.A.'),
('EPSS09', 'EPS Programa Comfenalco'),
('EPSS14', 'Humana Vivir S.A. E.P.S.'),
('EPSS26', 'SOLSALUD E.P.S. S.A'),
('EPSS33', 'SALUDVIDA S.A .E.P.S'),
('ESS002', 'Empresa Mutual para el Desarrollo Integral DE LA SALUD E.S.S. EMDISALUD ESS.'),
('ESS024', 'Cooperativa de Salud y Desarrollo Integral Zona Sur Oriental de Cartagena Ltda. COOSALUD E.S.S.'),
('ESS062', 'AsociaciÃ³n Mutual La Esperanza ASMET SALUD.'),
('ESS076', 'AsociaciÃ³n Mutual Barrios Unidos de QuibdÃ³ E.S.S.'),
('ESS091', 'Entidad Cooperativa Sol.de Salud del Norte de Soacha ECOOPSOS.'),
('ESS118', 'AsociaciÃ³n Mutual Empresa Solidaria de Salud de NariÃ±o E.S.S. EMSSANAR E.S.S.'),
('ESS133', 'Cooperativa de Salud Comunitaria-COMPARTA.'),
('ESS207', 'AsociaciÃ³n Mutual SER Empresa Solidaria de Salud ESS.'),
('CCC01', 'EPS SANITAS.'),
('CCC02', 'EPS SURA S.A'),
('CCC03', 'EPS COMPENSAR'),
('CCC04', 'EPS COOMEVA'),
('CCC05', 'EPS NUEVA EPS.'),
('CCC06', 'EPS FAMISANAR.'),
('CCC07', 'EPS MUTUALSER'),
('CCC08', 'EPS COOSALUD'),
('CCC09', 'EPS EMSSANAR'),
('CCC10', 'ALIANSALUD'),
('CCC11', 'EPS ASMET SALUD'),
('CCC12', 'SERVICIO OCCIDENTAL DE SALUD'),
('CCC13', 'EPS AMBUQ'),
('CCC14', 'EPS CRUZ BLANCA.'),
('CCC15', 'EPS SAVIASALUD'),
('CCC17', 'EPS CAPITAL SALUD'),
('CCC16', 'EPS MEGASALUD S.A.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_civiles`
--

CREATE TABLE `estados_civiles` (
  `id_estado` int(11) NOT NULL,
  `descripcion` varchar(20) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estados_civiles`
--

INSERT INTO `estados_civiles` (`id_estado`, `descripcion`) VALUES
(1, 'SOLTERO(A)'),
(2, 'CASADO(A)'),
(3, 'UNION LIBRE'),
(4, 'SEPARADO(A)'),
(5, 'VIUDO(A)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_caso`
--

CREATE TABLE `estado_caso` (
  `id_estadocaso` int(1) NOT NULL,
  `descripcion` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado_caso`
--

INSERT INTO `estado_caso` (`id_estadocaso`, `descripcion`) VALUES
(1, 'Pendiente'),
(2, 'Resuelto'),
(3, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estratos`
--

CREATE TABLE `estratos` (
  `id_estrato` int(11) NOT NULL,
  `descripcion` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estratos`
--

INSERT INTO `estratos` (`id_estrato`, `descripcion`) VALUES
(1, 'ESTRATO 1'),
(2, 'ESTRATO 2'),
(3, 'ESTRATO 3'),
(4, 'ESTRATO 4'),
(5, 'ESTRATO 5'),
(6, 'ESTRATO 6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etnias`
--

CREATE TABLE `etnias` (
  `id_etnia` int(11) NOT NULL,
  `descripcion` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `etnias`
--

INSERT INTO `etnias` (`id_etnia`, `descripcion`) VALUES
(1, 'NINGUNA'),
(2, 'AFRODESCENDIENTE'),
(3, 'INDIGENA COMUNIDAD UWA'),
(4, 'INDIGENA COMUNIDAD EMBERA'),
(5, 'INDIGENA OTRA COMUNIDAD'),
(6, 'GITANO'),
(7, 'OTRA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

CREATE TABLE `expediente` (
  `codigo_expediente` int(11) NOT NULL,
  `Fecha_inicio_expediente` date DEFAULT NULL,
  `id_ninnos` int(11) NOT NULL,
  `id_cuidadores` int(11) NOT NULL,
  `id_discapacidad` int(3) DEFAULT NULL,
  `id_indicador` int(3) DEFAULT NULL,
  `id_maltrato` int(3) DEFAULT NULL,
  `id_victima` int(3) DEFAULT NULL,
  `Descripcion_expediente` varchar(500) DEFAULT NULL,
  `id_derecho` varchar(7) DEFAULT NULL,
  `Observacion` varchar(200) DEFAULT NULL,
  `Veredicto_Caso` varchar(200) DEFAULT NULL,
  `Fecha_finalizacion_expediente` date DEFAULT NULL,
  `id_entidad` varchar(7) DEFAULT NULL,
  `id_usuario_exp` int(11) NOT NULL,
  `id_estadocaso` int(1) NOT NULL,
  `fecha_limite` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `expediente`
--

INSERT INTO `expediente` (`codigo_expediente`, `Fecha_inicio_expediente`, `id_ninnos`, `id_cuidadores`, `id_discapacidad`, `id_indicador`, `id_maltrato`, `id_victima`, `Descripcion_expediente`, `id_derecho`, `Observacion`, `Veredicto_Caso`, `Fecha_finalizacion_expediente`, `id_entidad`, `id_usuario_exp`, `id_estadocaso`, `fecha_limite`) VALUES
(2, '2017-10-25', 7, 1, 9, 9, 10, 5, 'A menudo Dios es concebido como el creador sobrenatural y supervisor del universo. Los teólogos han adscrito una variedad de atributos a las numerosas concepciones diferentes de Dios. Entre estos, los más comunes son omnisciencia, omnipotencia, omnipresencia, omnibenevolencia (perfecta bondad), simplicidad divina, y existencia eterna. Dios también ha sido concebido como de naturaleza incorpórea, un ser personal, la fuente de toda obligación moral, y el «mayor ser concebible con existencia».\r\n\r\n', '12', 'bb', 'bbb', '2017-10-25', '9', 1057578145, 2, '0000-00-00'),
(3, '2017-10-25', 7, 1, 3, 4, 3, 3, 'c', '1', 'cc', 'ccc', '2017-10-25', '4', 1057578145, 2, '0000-00-00'),
(4, '2017-11-22', 7, 1, 1, 3, 3, 3, 'oo', '1', 'kkkk', 'pppp', '0000-00-00', '2', 1057578145, 1, '2018-02-28'),
(5, '2019-02-15', 9, 4, 9, 9, 1, 1, 'El niño presenta golpes contundentes en la cara que según el padre son propiciados por la madre', '5', 'el niño se encuentra en alto grado de desnutrición y se remite a medicina general para su valoración ', 'Pendiente', '0000-00-00', '6', 900333743, 1, '2018-03-07'),
(6, '2019-02-15', 9, 4, 9, 9, 3, 5, 'Maltrato Psicologico', '8', 'Se repiten los insultos y agresión verbal.', 'N/A', '0000-00-00', '6', 900333743, 1, '2018-03-07'),
(7, '2017-11-23', 12, 7, 9, 9, 10, 5, 'eeeeeeeeeeeeerrrrrrrrrrrrrrrrrrrr', '14', 'eeeeeeeeeeeeeeerrrrrrrrrrrrrrrrrrrrrrr', 'eeeeeeeeeeeeeerrrrrrrrrrrrrrrrrrrrr', '0000-00-00', '8', 1057578145, 1, '2018-03-22'),
(8, '2017-11-23', 0, 7, 4, 3, 5, 4, 'nnnnnnnnnnnnnnnn', '2', 'nnnnnnnnnnnnnnnnnnnn', 'nnnnnnnnnnnnnnnnnnnnnnn', '1988-04-04', '2', 1057578145, 1, '2018-03-23'),
(9, '2017-11-23', 0, 7, 4, 3, 3, 3, 'nnnnnnnnnnnn', '2', 'nnnnnnnnnnnnnnnnn', 'nnnnnnnnnnnnnnnnn', '2017-11-30', '2', 1057578145, 2, '2018-03-23'),
(11, '2017-11-24', 13, 8, 1, 5, 5, 3, 'rer34r34r34r', '2', 'sdfsafsfd', 'sdfsdfsdfs', '1988-04-04', '2', 30303843, 1, '2018-03-24'),
(12, '2018-06-20', 15, 0, 9, 9, 9, 5, 'EL MENOR ABUSA SEXUALMENTE DE SU HERMANA LA DEJA EMBARAZO Y ESTA TIENE UN BEBE', '6', 'SE REMITE EL EXPEDIENTE AL JUZGADO DE FAMILIA POR PERDIDA DE COMPETENCIA', 'A LA ESPERA DEL FALLO DEL JUZGADO DE FAMILIA', '2018-03-23', '6', 40179942, 1, '2018-09-08'),
(16, '2019-04-08', 18, 0, 1, 1, 2, 5, 'ASHDKJAHSDKJ', '1', 'JKSLDJFKSJDLF', 'SDFJSKDJFL', '2018-10-19', '1', 40179942, 1, '2019-01-22'),
(17, '2018-11-15', 17, 10, 3, 3, 7, 2, 'gjgghggjgjhgjhghjgjg', '3', 'bvjbvbvbnvnbvbvn', 'hghjgjhgjhgjhghjg', '2018-12-20', '8', 40179942, 1, '2019-05-14'),
(18, '2019-01-15', 20, 11, 1, NULL, 2, 1, 'dgfdfgdfgdgdf', '1', 'ertertwer', 'werwerwrerwerwe', '2019-06-11', '1', 40179942, 1, '2019-07-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id_genero` varchar(1) NOT NULL,
  `descripcion` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id_genero`, `descripcion`) VALUES
('F', 'FEMENINO'),
('M', 'MASCULINO'),
('L', 'LGBTI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestacion`
--

CREATE TABLE `gestacion` (
  `id_gestacion` int(11) NOT NULL,
  `Nombres de la Madre` varchar(50) DEFAULT NULL,
  `Apellidos de la Madre` varchar(50) DEFAULT NULL,
  `Â¿Asiste a Controles Prenatales Si/No?` varchar(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gestacion`
--

INSERT INTO `gestacion` (`id_gestacion`, `Nombres de la Madre`, `Apellidos de la Madre`, `Â¿Asiste a Controles Prenatales Si/No?`) VALUES
(1, 'MARIA CAMILA', 'TORRES GIL', 'Si'),
(2, 'SANDRA MILENA', 'VARGAS ROA', 'Si'),
(3, 'ANGELA NATALIA', 'PORRAS MORA', 'Si'),
(4, 'MONICA ANDREA', 'VALENCIA', 'Si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicadores`
--

CREATE TABLE `indicadores` (
  `id_indicador` int(11) NOT NULL,
  `descripcion` varchar(300) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `indicadores`
--

INSERT INTO `indicadores` (`id_indicador`, `descripcion`) VALUES
(1, 'El niño, niña o adolescente inicia el proceso de restablecimiento de derechos'),
(2, 'El niño, niña o adolescente fue victima del conflicto armado'),
(3, 'El niño, niña o adolescente fue victima de violencia intrafamiliar'),
(4, 'El niño, niña o adolescente tiene alguna discapacidad'),
(5, 'El niño, niña o adolescente es huérfano'),
(6, 'El niño, niña o adolescente se encuentra en estado de desnutrición severa'),
(7, 'El niño, niña o adolescente en este momento está desaparecido'),
(8, 'La custodia del niño la tienen los cuidadores que figuran como adultos responsables'),
(9, 'Ninguno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logins`
--

CREATE TABLE `logins` (
  `consecutivo` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `logins`
--

INSERT INTO `logins` (`consecutivo`, `id_usuario`, `fecha`, `hora`) VALUES
(38, 139, '2017-10-25', '09:10:10'),
(37, 139, '2017-10-24', '08:10:10'),
(36, 139, '2017-10-24', '08:10:10'),
(35, 139, '2017-10-22', '11:10:10'),
(34, 139, '2017-10-20', '12:10:10'),
(33, 139, '2017-10-20', '12:10:10'),
(32, 140, '2017-10-20', '12:10:10'),
(31, 139, '2017-10-20', '12:10:10'),
(30, 139, '2017-10-20', '12:10:10'),
(29, 139, '2017-10-20', '10:10:10'),
(28, 139, '2017-10-19', '15:10:10'),
(27, 139, '2017-10-19', '10:10:10'),
(26, 139, '2017-10-17', '18:10:10'),
(25, 139, '2017-10-17', '17:10:10'),
(24, 139, '2017-10-16', '06:10:10'),
(23, 139, '2017-10-14', '09:10:10'),
(22, 139, '2017-10-12', '09:10:10'),
(21, 139, '2017-10-12', '09:10:10'),
(20, 139, '2017-10-12', '08:10:10'),
(39, 139, '2017-10-25', '21:10:10'),
(40, 139, '2017-10-27', '08:10:10'),
(41, 139, '2017-10-27', '09:10:10'),
(42, 139, '2017-10-27', '09:10:10'),
(43, 139, '2017-10-27', '12:10:10'),
(44, 139, '2017-10-27', '20:10:10'),
(45, 139, '2017-10-28', '10:10:10'),
(46, 139, '2017-10-28', '10:10:10'),
(47, 139, '2017-10-29', '17:10:10'),
(48, 139, '2017-10-29', '18:10:10'),
(49, 139, '2017-10-31', '09:10:10'),
(50, 139, '2017-10-31', '09:10:10'),
(51, 139, '2017-10-31', '15:10:10'),
(52, 139, '2017-11-01', '18:11:11'),
(53, 139, '2017-11-02', '17:11:11'),
(54, 139, '2017-11-03', '08:11:11'),
(55, 139, '2017-11-03', '08:11:11'),
(56, 139, '2017-11-05', '09:11:11'),
(57, 139, '2017-11-05', '13:11:11'),
(58, 139, '2017-11-05', '15:11:11'),
(59, 139, '2017-11-05', '15:11:11'),
(60, 139, '2017-11-05', '15:11:11'),
(61, 139, '2017-11-05', '15:11:11'),
(62, 139, '2017-11-05', '15:11:11'),
(63, 139, '2017-11-06', '07:11:11'),
(64, 139, '2017-11-06', '08:11:11'),
(65, 139, '2017-11-06', '08:11:11'),
(66, 139, '2017-11-06', '08:11:11'),
(67, 139, '2017-11-06', '11:11:11'),
(68, 139, '2017-11-06', '11:11:11'),
(69, 139, '2017-11-07', '08:11:11'),
(70, 139, '2017-11-07', '08:11:11'),
(71, 137, '2017-11-07', '08:11:11'),
(72, 135, '2017-11-07', '08:11:11'),
(73, 135, '2017-11-07', '08:11:11'),
(74, 139, '2017-11-07', '09:11:11'),
(75, 142, '2017-11-07', '09:11:11'),
(76, 135, '2017-11-07', '09:11:11'),
(77, 135, '2017-11-07', '10:11:11'),
(78, 134, '2017-11-07', '10:11:11'),
(79, 137, '2017-11-08', '12:11:11'),
(80, 139, '2017-11-17', '10:11:11'),
(81, 139, '2017-11-17', '15:11:11'),
(82, 139, '2017-11-17', '15:11:11'),
(83, 139, '2017-11-17', '15:11:11'),
(84, 139, '2017-11-17', '15:11:11'),
(85, 139, '2017-11-17', '15:11:11'),
(86, 139, '2017-11-17', '15:11:11'),
(87, 139, '2017-11-17', '15:11:11'),
(88, 139, '2017-11-17', '15:11:11'),
(89, 139, '2017-11-17', '16:11:11'),
(90, 139, '2017-11-17', '16:11:11'),
(91, 139, '2017-11-17', '17:11:11'),
(92, 139, '2017-11-17', '17:11:11'),
(93, 139, '2017-11-21', '08:11:11'),
(94, 138, '2017-11-21', '14:11:11'),
(95, 138, '2017-11-21', '14:11:11'),
(96, 138, '2017-11-21', '16:11:11'),
(97, 138, '2017-11-21', '16:11:11'),
(98, 138, '2017-11-21', '16:11:11'),
(99, 138, '2017-11-21', '16:11:11'),
(100, 138, '2017-11-21', '16:11:11'),
(101, 138, '2017-11-21', '16:11:11'),
(102, 138, '2017-11-21', '16:11:11'),
(103, 138, '2017-11-21', '17:11:11'),
(104, 138, '2017-11-21', '17:11:11'),
(105, 138, '2017-11-21', '17:11:11'),
(106, 138, '2017-11-21', '17:11:11'),
(107, 138, '2017-11-21', '18:11:11'),
(108, 138, '2017-11-21', '18:11:11'),
(109, 138, '2017-11-21', '18:11:11'),
(110, 142, '2017-11-24', '09:11:11'),
(111, 142, '2017-11-24', '09:11:11'),
(112, 138, '2017-11-24', '09:11:11'),
(113, 138, '2017-11-24', '18:11:11'),
(114, 138, '2017-11-24', '18:11:11'),
(115, 138, '2017-11-24', '18:11:11'),
(116, 138, '2017-11-24', '18:11:11'),
(117, 138, '2017-11-24', '18:11:11'),
(118, 138, '2017-11-24', '18:11:11'),
(119, 138, '2017-11-24', '18:11:11'),
(120, 138, '2017-11-24', '19:11:11'),
(121, 138, '2017-11-24', '21:11:11'),
(122, 138, '2017-11-24', '21:11:11'),
(123, 138, '2017-11-25', '07:11:11'),
(124, 138, '2017-11-25', '07:11:11'),
(125, 138, '2017-11-25', '07:11:11'),
(126, 138, '2017-11-25', '07:11:11'),
(127, 138, '2017-11-25', '07:11:11'),
(128, 138, '2017-11-25', '19:11:11'),
(129, 138, '2017-11-25', '19:11:11'),
(130, 2, '2018-05-10', '09:05:05'),
(131, 59, '2018-05-11', '11:05:05'),
(132, 59, '2018-05-11', '12:05:05'),
(133, 5, '2018-06-05', '08:06:06'),
(134, 5, '2018-06-05', '16:06:06'),
(135, 59, '2018-06-15', '15:06:06'),
(136, 59, '2018-06-15', '15:06:06'),
(137, 59, '2018-06-19', '15:06:06'),
(138, 59, '2018-06-19', '15:06:06'),
(139, 3, '2018-06-19', '16:06:06'),
(140, 4, '2018-06-19', '16:06:06'),
(141, 137, '2018-06-19', '16:06:06'),
(142, 138, '2018-06-19', '16:06:06'),
(143, 59, '2018-06-19', '22:06:06'),
(144, 59, '2018-06-20', '09:06:06'),
(145, 59, '2018-06-22', '10:06:06'),
(146, 2, '2018-07-16', '15:07:07'),
(147, 59, '2018-07-16', '15:07:07'),
(148, 2, '2018-07-24', '15:07:07'),
(149, 59, '2018-07-24', '15:07:07'),
(150, 133, '2018-07-26', '11:07:07'),
(151, 134, '2018-07-26', '11:07:07'),
(152, 135, '2018-07-26', '12:07:07'),
(153, 137, '2018-07-26', '12:07:07'),
(154, 138, '2018-07-26', '12:07:07'),
(155, 140, '2018-07-26', '14:07:07'),
(156, 142, '2018-07-26', '14:07:07'),
(157, 59, '2018-07-26', '16:07:07'),
(158, 59, '2018-07-26', '16:07:07'),
(159, 3, '2018-07-26', '16:07:07'),
(160, 2, '2018-07-30', '10:07:07'),
(161, 2, '2018-07-30', '10:07:07'),
(162, 138, '2018-07-30', '10:07:07'),
(163, 138, '2018-07-30', '10:07:07'),
(164, 134, '2018-07-30', '10:07:07'),
(165, 123, '2018-07-30', '11:07:07'),
(166, 124, '2018-07-30', '11:07:07'),
(167, 125, '2018-07-30', '11:07:07'),
(168, 59, '2018-07-31', '15:07:07'),
(169, 59, '2018-08-15', '12:08:08'),
(170, 59, '2018-08-21', '18:08:08'),
(171, 59, '2018-08-29', '10:08:08'),
(172, 59, '2018-11-15', '18:11:11'),
(173, 140, '2018-11-21', '10:11:11'),
(174, 7, '2018-11-22', '16:11:11'),
(175, 5, '2018-11-23', '14:11:11'),
(176, 5, '2018-11-23', '14:11:11'),
(177, 5, '2018-11-23', '14:11:11'),
(178, 137, '2018-11-29', '09:11:11'),
(179, 3, '2018-12-21', '15:12:12'),
(180, 3, '2018-12-21', '15:12:12'),
(181, 3, '2018-12-21', '15:12:12'),
(182, 59, '2018-12-21', '15:12:12'),
(183, 59, '2018-12-26', '16:12:12'),
(184, 3, '2018-12-26', '17:12:12'),
(185, 59, '2019-01-14', '16:01:01'),
(186, 59, '2019-01-14', '16:01:01'),
(187, 59, '2019-01-14', '16:01:01'),
(188, 59, '2019-01-15', '15:01:01'),
(189, 59, '2019-01-15', '15:01:01'),
(190, 59, '2019-01-15', '17:01:01'),
(191, 59, '2019-01-17', '14:01:01'),
(192, 59, '2019-01-17', '14:01:01'),
(193, 59, '2019-01-17', '14:01:01'),
(194, 135, '2019-02-15', '14:02:02'),
(195, 59, '2019-03-05', '10:03:03'),
(196, 59, '2019-03-06', '15:03:03'),
(197, 59, '2019-04-08', '15:04:04'),
(198, 59, '2019-04-08', '15:04:04'),
(199, 59, '2019-04-08', '16:04:04'),
(200, 59, '2019-04-09', '23:04:04'),
(201, 59, '2019-04-12', '18:04:04'),
(202, 31, '2019-05-06', '11:05:05'),
(203, 59, '2019-06-05', '12:06:06'),
(204, 59, '2019-06-05', '12:06:06'),
(205, 59, '2019-06-05', '12:06:06'),
(206, 59, '2019-06-05', '12:06:06'),
(207, 59, '2019-06-05', '12:06:06'),
(208, 59, '2019-06-19', '15:06:06'),
(209, 59, '2019-06-28', '09:06:06'),
(210, 31, '2019-08-28', '15:08:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maltratos`
--

CREATE TABLE `maltratos` (
  `id_maltrato` int(11) NOT NULL,
  `descripcion` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `maltratos`
--

INSERT INTO `maltratos` (`id_maltrato`, `descripcion`) VALUES
(1, 'MALTRATO FISICO'),
(2, 'MALTRATO EMOCIONAL'),
(3, 'MALTRATO PSICOLOGICO'),
(4, 'NIÃ‘O(A) ENFLAQUECIDO'),
(5, 'NIÃ‘O(A) MUY ENFLAQUECIDO'),
(6, 'NEGLIGENCIA'),
(7, 'MALTRATO SOCIAL'),
(8, 'MALTRATO INSTITUCIONAL'),
(9, 'ABUSO SEXUAL'),
(10, 'OTRO TIPO DE MALTRATO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id_municipio` varchar(10) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id_municipio`, `descripcion`) VALUES
('15001', 'TUNJA'),
('15022', 'ALMEIDA'),
('15047', 'AQUITANIA'),
('15051', 'ARCABUCO'),
('15087', 'BELEN'),
('15090', 'BERBEO'),
('15092', 'BETEITIVA'),
('15097', 'BOAVITA'),
('15104', 'BOYACA'),
('15106', 'BRICEÃ‘O'),
('15109', 'BUENAVISTA'),
('15114', 'BUSBANZA'),
('15131', 'CALDAS'),
('15135', 'CAMPOHERMOSO'),
('15162', 'CERINZA'),
('15172', 'CHINAVITA'),
('15176', 'CHIQUINQUIRA'),
('15232', 'CHIQUIZA'),
('15180', 'CHISCAS'),
('15183', 'CHITA'),
('15185', 'CHITARAQUE'),
('15187', 'CHIVATA'),
('15236', 'CHIVOR'),
('15189', 'CIENEGA'),
('15204', 'COMBITA'),
('15212', 'COPER'),
('15215', 'CORRALES'),
('15218', 'COVARACHIA'),
('15223', 'CUBARA'),
('15224', 'CUCAITA'),
('15226', 'CUITIVA'),
('15238', 'DUITAMA'),
('15244', 'EL COCUY'),
('15248', 'EL ESPINO'),
('15272', 'FIRAVITOBA'),
('15276', 'FLORESTA'),
('15293', 'GACHANTIVA'),
('15296', 'GAMEZA'),
('15299', 'GARAGOA'),
('15317', 'GUACAMAYAS'),
('15322', 'GUATEQUE'),
('15325', 'GUAYATA'),
('15332', 'GUICAN'),
('15362', 'IZA'),
('15367', 'JENESANO'),
('15368', 'JERICOâ€œ'),
('15380', 'LA CAPILLA'),
('15403', 'LA UVITA'),
('15401', 'LA VICTORIA'),
('15377', 'LABRANZAGRANDE'),
('15425', 'MACANAL'),
('15442', 'MARIPI'),
('15455', 'MIRAFLORES'),
('15464', 'MONGUA'),
('15466', 'MONGUA'),
('15469', 'MONIQUIRA'),
('15476', 'MOTAVITA'),
('15480', 'MUZO'),
('15491', 'NOBSA'),
('15494', 'NUEVO COLON'),
('15500', 'OICATA'),
('15507', 'OTANCHE'),
('15511', 'PACHAVITA'),
('15514', 'PAEZ'),
('15516', 'PAIPA'),
('15518', 'PAJARITO'),
('15522', 'PANQUEBA'),
('15531', 'PAUNA'),
('15533', 'PAYA'),
('15537', 'PAZ DE RIO'),
('15542', 'PESCA'),
('15550', 'PISBA'),
('15572', 'PUERTO BOYACA'),
('15580', 'QUIPAMA'),
('15599', 'RAMIRIQUI'),
('15600', 'RAQUIRA'),
('15621', 'RONDON'),
('15632', 'SABOYA'),
('15638', 'SACHICA'),
('15646', 'SAMACA'),
('15660', 'SAN EDUARDO'),
('15664', 'SAN JOSE DE PARE'),
('15667', 'SAN LUIS DE GACENO'),
('15673', 'SAN MATEO'),
('15676', 'SAN MIGUEL DE SEMA'),
('15681', 'SAN PABLO DE BORBUR'),
('15690', 'SANTA MARIA'),
('15693', 'SANTA ROSA DE VITERBO'),
('15696', 'SANTA SOFIA'),
('15686', 'SANTANA'),
('15720', 'SATIVANORTE'),
('15723', 'SATIVASUR'),
('15740', 'SIACHOQUE'),
('15753', 'SOATA'),
('15757', 'SOCHA'),
('15755', 'SOCOTA'),
('15759', 'SOGAMOSO'),
('15761', 'SOMONDOCO'),
('15762', 'SORA'),
('15764', 'SORACA'),
('15763', 'SOTAQUIRA'),
('15774', 'SUSACON'),
('15776', 'SUTAMARCHAN'),
('15778', 'SUTATENZA'),
('15790', 'TASCO'),
('15798', 'TENZA'),
('15804', 'TIBANA'),
('15806', 'TIBASOSA'),
('15808', 'TINJACA'),
('15810', 'TIPACOQUE'),
('15814', 'TOCA'),
('15816', 'TOGUI'),
('15820', 'TOPAGA'),
('15822', 'TOTA'),
('15832', 'TUNUNGUA'),
('15835', 'TURMEQUE'),
('15837', 'TUTA'),
('15839', 'TUTAZA'),
('15842', 'UMBITA'),
('15861', 'VENTAQUEMADA'),
('15407', 'VILLA DE LEYVA'),
('15879', 'VIRACACHA'),
('15897', 'ZETAQUIRA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ninnosnna`
--

CREATE TABLE `ninnosnna` (
  `id_ninnos` int(11) NOT NULL,
  `id_tipo_documento` varchar(4) DEFAULT NULL,
  `No_identificacion` int(11) NOT NULL,
  `Nombres` varchar(50) DEFAULT NULL,
  `Apellidos` varchar(50) DEFAULT NULL,
  `Fecha_Nacimiento` date DEFAULT NULL,
  `Edad` varchar(2) DEFAULT NULL,
  `Direccion` varchar(30) DEFAULT NULL,
  `telefono_movil` varchar(30) DEFAULT NULL,
  `correo_electronico` varchar(100) DEFAULT NULL,
  `id_genero` varchar(1) DEFAULT NULL,
  `id_estrato` int(3) DEFAULT NULL,
  `id_niveleducativo` int(3) DEFAULT NULL,
  `id_cuidadores` int(11) DEFAULT NULL,
  `id_municipio` varchar(5) DEFAULT NULL,
  `id_provincia` varchar(5) DEFAULT NULL,
  `id_regimen` int(3) DEFAULT NULL,
  `id_eps` varchar(10) DEFAULT NULL,
  `id_etnia` varchar(2) DEFAULT NULL,
  `Puntaje_Sisben` int(5) DEFAULT NULL,
  `id_zona` varchar(3) DEFAULT NULL,
  `fecha_ingreso` date NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ninnosnna`
--

INSERT INTO `ninnosnna` (`id_ninnos`, `id_tipo_documento`, `No_identificacion`, `Nombres`, `Apellidos`, `Fecha_Nacimiento`, `Edad`, `Direccion`, `telefono_movil`, `correo_electronico`, `id_genero`, `id_estrato`, `id_niveleducativo`, `id_cuidadores`, `id_municipio`, `id_provincia`, `id_regimen`, `id_eps`, `id_etnia`, `Puntaje_Sisben`, `id_zona`, `fecha_ingreso`, `id_usuario`) VALUES
(9, 'RC', 1002993441, 'JUAN JOSE ', 'LIZARAZO VARGAS ', '2010-07-10', '7', 'CALLE 2 # 7-40', '3102664030', 'juan740@gmail.com', 'M', 1, 2, 0, '15087', '12', 2, 'EPSS33', '1', 17, 'U', '2017-11-07', 900333743),
(5, 'CC', 111111111, 'GABRIEL', 'MONTAÑA', '0000-00-00', '1', 'calle 37a # 4-10', '3123659740', 'dacastellanos88@gmail.com', 'M', 6, 7, 0, '15001', '1', 4, 'CCF037', '2', 4, 'U', '2017-10-17', 1057578145),
(6, 'CC', 1057578145, 'LUIS MIGUEL', 'SUAREZ', '0000-00-00', '34', 'calle 37a # 4-10', '3123659740', 'dacastellanos88@gmail.com', 'F', 6, 7, 0, '15001', '1', 4, 'CCF037', '2', 4, 'U', '2017-10-17', 1057578145),
(7, 'CC', 4416, 'ALEJANDRO ', 'CASTELLANOS', '0000-00-00', '34', 'calle 37a # 4-10', '3123659740', 'dacastellanos88@gmail.com', 'F', 6, 7, 0, '15001', '1', 4, 'CCF037', '2', 4, 'U', '2017-10-17', 1057578145),
(8, 'RC', 454545, 'PREUBA', 'PREUBA', '1988-04-04', '23', 'a', '1', 'ejemplo@ejemplo.com', 'M', 4, 5, 0, '15001', '1', 2, 'CCF045', '3', 3, 'R', '2017-11-05', 1057578145),
(10, 'TI', 1062097102, 'LAURA ALEJANDRA', 'ARIAS GONZALEZ', '0000-00-00', '10', 'CALLE 3 No. 7 - 47', '3443324617', 'LAURAARIAS@GMAIL.COM', 'F', 2, 5, 0, '15362', '11', 3, 'CCC06', '1', 21, 'U', '2017-11-07', 900333743),
(13, 'RC', 1, 'D', 'D', '1988-04-04', '1', '1', '1', 'ejemplo@ejemplo.com', 'F', 1, 8, 0, '15022', '1', 5, 'CCF053', '3', 1, 'R', '2017-11-24', 30303843),
(12, 'RC', 222, 'BBB', 'BBB', '1988-04-04', '22', 'bbb', '222', 'ejemplo@ejemplo.com', 'M', 1, 1, 0, '15232', '12', 1, 'CCF053', '5', 1111, 'R', '2017-11-22', 1057578145),
(14, 'TI', 1002721619, 'ANDRES FELIPE', 'ACEVEDO ROA', '2003-02-24', '14', 'BARRIO SANTA BARBARA', '3202439060', 'notiene@HOTMAIL.COM', 'M', 1, 1, 0, '15455', '5', 2, 'CCC05', '7', 0, 'U', '2018-05-11', 40179942),
(15, 'TI', 1002721619, 'ANDRES FELIPE', 'ACEVEDO ROA', '2003-02-24', '14', 'BARRIO SANTA BARBARA', '3202439060', 'notiene@HOTMAIL.COM', 'M', 1, 1, 0, '15455', '5', 2, 'CCC05', '7', 0, 'U', '2018-05-11', 40179942),
(16, 'TI', 1049621862, 'ANDERSON', 'SALAZAR MORENO', '2010-07-10', '8', 'cr 1-d n 3-24', '3144828626', 'ANDERSON-90101@HOTMAIL.COM', 'M', 4, 2, 0, '15879', '4', 2, 'EPSS03', '1', 2, 'U', '2018-06-05', 41001100),
(17, 'TI', 1231451, 'NELSON ', 'SALAZAR MEZA', '2015-06-07', '3', 'CASA 18 N 17', '3102951389', 'ANDERSON-90101@HOTMAIL.COM', 'M', 2, 1, 0, '15455', '5', 2, 'EPSS03', '1', 2, 'U', '2018-06-19', 40179942),
(18, 'RC', 123456789, 'NANA', 'NANA', '2014-09-09', '4', 'Calle 49 B N 9b-20 Tunja', '6466676286', 'leonago_38@hotmail.com', 'M', 1, 1, 0, '15001', '1', 1, 'CCF055', '1', 1, 'R', '2018-07-16', 40179942),
(19, 'TI', 1049621862, 'ANDERSON ', 'SALAZAR MORENO', '2017-12-09', '1', 'cra 1D # 3-24', '3102951389', 'anderson-9010@hotmail.com', 'M', 2, 1, 0, '15455', '5', 2, 'EPSS33', '1', 2, 'U', '2018-12-26', 40179942),
(20, 'TI', 123123123, 'ASDASDASD', 'RERTERTERT', '2018-10-10', '', 'Calle 49 B N 9b-20 Tunja', '3102951389', 'leonago38@gmail.com', 'F', 2, 1, 0, '15001', '1', 3, 'CCF002', '1', 2, 'U', '2019-01-15', 40179942);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_educativo`
--

CREATE TABLE `nivel_educativo` (
  `id_niveleducativo` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nivel_educativo`
--

INSERT INTO `nivel_educativo` (`id_niveleducativo`, `descripcion`) VALUES
(1, 'SIN ESCOLARIDAD'),
(2, 'BASICA PRIMARIA'),
(3, 'BASICA SECUNDARIA'),
(4, 'MEDIA ACADEMICA/TECNICA'),
(5, 'PREGRADO'),
(6, 'POSTGRADO'),
(7, 'ESPECIALIZACION'),
(8, 'MAESTRIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parentescos`
--

CREATE TABLE `parentescos` (
  `id_parentesco` int(3) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `parentescos`
--

INSERT INTO `parentescos` (`id_parentesco`, `descripcion`) VALUES
(1, 'PAPÁ'),
(2, 'MAMÁ'),
(3, 'HERMANO (A)'),
(4, 'TIO (A)'),
(5, 'ABUELO (A)'),
(6, 'PRIMO (A)'),
(7, 'PADRINO/MADRINA'),
(8, 'FAMILIAR CERCANO'),
(9, 'AMIGO (A)'),
(10, 'VECINO (A)'),
(11, 'OTRO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id_perfil` int(11) NOT NULL,
  `descripcion` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfil`, `descripcion`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'DIRECTOR'),
(3, 'SUPERVISOR'),
(4, 'ENLACE MUNICIPAL'),
(5, 'INVITADO'),
(6, 'COMISARIA DE FAMILIA'),
(7, 'PERSONERIA'),
(8, 'PROCURADURIA'),
(9, 'JUEZ DE FAMILIA'),
(10, 'SUPERADMINISTRADOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id_provincia` varchar(7) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id_provincia`, `descripcion`) VALUES
('1', 'CENTRO'),
('2', 'NORTE'),
('3', 'NEIRA'),
('4', 'MARQUEZ'),
('5', 'LENGUPA'),
('6', 'LA LIBERTAD'),
('7', 'GUTIERREZ'),
('8', 'OCCIDENTE'),
('9', 'ORIENTE'),
('10', 'RICAURTE'),
('11', 'SUGAMUXI'),
('12', 'TUNDAMA'),
('13', 'VALDERRAMA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regimenes`
--

CREATE TABLE `regimenes` (
  `id_regimen` int(11) NOT NULL,
  `descripcion` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `regimenes`
--

INSERT INTO `regimenes` (`id_regimen`, `descripcion`) VALUES
(1, 'NO AFILIADO/ASEGURADO'),
(2, 'SUBSIDIADO'),
(3, 'CONTRIBUTIVO'),
(4, 'ESPECIAL'),
(5, 'OTRO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remite`
--

CREATE TABLE `remite` (
  `id_remite` int(11) NOT NULL,
  `codigo_expediente` int(11) NOT NULL,
  `id_ninnos` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `usuario_que_remite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `remite`
--

INSERT INTO `remite` (`id_remite`, `codigo_expediente`, `id_ninnos`, `id_usuario`, `usuario_que_remite`) VALUES
(5, 2, 7, 134, 0),
(7, 7, 12, 134, 138),
(10, 7, 12, 138, 142);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `si_no`
--

CREATE TABLE `si_no` (
  `id_sino` int(2) NOT NULL,
  `nom_sino` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `si_no`
--

INSERT INTO `si_no` (`id_sino`, `nom_sino`) VALUES
(1, 'SI'),
(2, 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_documentos`
--

CREATE TABLE `tipos_documentos` (
  `id_tipo_documento` varchar(4) NOT NULL,
  `descripcion` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipos_documentos`
--

INSERT INTO `tipos_documentos` (`id_tipo_documento`, `descripcion`) VALUES
('RC', 'REGISTRO CIVIL'),
('TI', 'TARJETA DE IDENTIDAD'),
('CC', 'CEDULA DE CIUDADANIA'),
('CE', 'CEDULA DE EXTRANGERIA'),
('NUIP', 'NUMERO UNICO DE IDENTIFICACION');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `id_tipo_documento` varchar(2) DEFAULT NULL,
  `numero_documento` varchar(20) DEFAULT NULL,
  `id_genero` varchar(1) DEFAULT NULL,
  `id_municipio` varchar(5) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `clave` varchar(20) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `id_perfil` int(11) DEFAULT NULL,
  `id_entidad` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `apellidos`, `nombres`, `id_tipo_documento`, `numero_documento`, `id_genero`, `id_municipio`, `telefono`, `usuario`, `clave`, `correo`, `id_perfil`, `id_entidad`, `estado`, `fecha_registro`) VALUES
(140, 'LOPEZ VARGAS', 'JUAN FERNANDO', 'CC', '1059233331', 'M', '15001', '3102411770', 'ELE_CHITA', 'CHITA772', 'juanlvargas77@gmail.com', 4, 0, 1, '2017-10-20'),
(2, 'SALAZAR MORENO', 'ANDERSON ARLEX', 'CC', '1049621862', 'M', '15001', '3102951389', 'admin', '900710', 'Anderson-90101@hotmail.com', 1, 2, 1, '0000-00-00'),
(3, 'CAMACHO', 'ADRIANA', 'CC', '23456777', 'F', '15001', '7420150', 'DocAdri', '20170520', 'adricamachol@hotmail.com', 1, 2, 1, '0000-00-00'),
(4, 'INFANCIA', 'PRIMERA', 'CC', '40001123', 'F', '15001', '7420222', 'PRIMERA_INFANCIA', '20170521', 'Primerainfancia@boyaca.gov.co', 2, 1, 1, '0000-00-00'),
(5, 'BARAJAS CARO', 'LUZ MARINA', 'CC', '41001100', 'F', '15879', '3203309960', 'CDF_VIRACACHA', '2017', 'comisaria@viracacha-boyaca.gov.co', 6, 6, 1, '0000-00-00'),
(6, 'REYES', 'LEIDY YOBANA', 'CC', '42101110', 'F', '15897', '3124768074', 'CDF_ZETAQUIRA', '2018', 'comisaria@zetaquira-boyaca.gov.co ', 6, 6, 1, '0000-00-00'),
(7, 'GUIO NIÃ‘O', 'YANIRA CONSUELO', 'CC', '42301447', 'F', '15022', '3125136097', 'CDF_ALMEIDA', '2019', 'yguionio8@gmail.com \r\ncomisaria@almeida-boyaca.gov.co \r\n', 6, 6, 1, '0000-00-00'),
(8, 'SANABRIA', 'YENNY A.', 'CC', '43200987', 'F', '15047', '3115098139 ', 'CDF_AQUITANIA', '2020', 'comisaria@aquitania-boyaca.gov.co \r\nalcaldia@aquitania-boyaca.gov.co \r\n', 6, 6, 1, '0000-00-00'),
(9, 'GALLARDO', 'IVON GISELL', 'CC', '44567777', 'F', '15051', '3148248428', 'CDF_ARCABUCO', '2021', 'alcaldia@arcabuco-boyaca.gov.co  draivongallardo@hotmail.com    ', 6, 6, 1, '0000-00-00'),
(10, 'PERÃ‰Z DE LOS RÃOS', 'PATRICIA', 'CC', '45767909', 'F', '15087', '3002851577', 'CDF_BELEN', '2022', 'perezdelosrios-abogada@hotmail.com \r\ncomisaria@belen-boyaca.gov.co \r\n', 6, 6, 1, '0000-00-00'),
(11, 'GONZALEZ M.', 'FRANCY LILIANA', 'CC', '40987654', 'F', '15090', '3202281965', 'CDF_BERBEO', '2023', 'fraligoma@yahoo.es  \r\ncomisaria@berbeo-boyaca.gov.co ', 6, 6, 1, '0000-00-00'),
(12, 'GALINDO SÃNCHEZ', 'ÃNGELA ROCÃO', 'CC', '41090977', 'F', '15092', '3125301543', 'CDF_BETEITIVA', '2024', 'angelagalindosanchez@gmail.com \r\nalcaldia@beteitiva-boyaca.gov.co \r\n', 6, 6, 1, '0000-00-00'),
(13, 'COMISARIA DE FAMILIA', 'BOAVITA', 'CC', '52711097', 'F', '15097', '3009212244', 'CDF_BOAVITA', '2025', 'comisariadefamilia@boavita-boyaca.gov.co', 6, 6, 1, '0000-00-00'),
(14, 'ROJAS CARO', 'NIDIA YANETH', 'CC', '40020997', 'F', '15104', '3142568794', 'CDF_BOYACA', '2026', 'comisaria@boyaca-boyaca.gov.co \r\nnyrc77@hotmail.com ', 6, 6, 1, '0000-00-00'),
(15, 'PERALTA', 'GERMAN ZAMIR', 'CC', '7654332', 'M', '15106', '3125708391', 'CDF_BRICEÃ‘O', '2027', 'comisaria@briceno-boyaca.gov.co alcaldia@briceno-boyaca.gov.co\r\npgermanzamir@yahoo.es \r\n', 6, 6, 1, '0000-00-00'),
(16, 'CASAS PEÃ‘A', 'LILIANA MAYERLY', 'CC', '44707201', 'F', '15109', '3125510055', 'CDF_BUENAVISTA', '2028', 'mayerlicita83@yahoo.es  \r\nfamilia@buenavista-boyaca.gov.co  \r\n', 6, 6, 1, '0000-00-00'),
(17, 'ADAME', 'SANDRA MAYERLY', 'CC', '40021337', 'F', '15114', '3114925723', 'CDF_BUSBANZA', '2029', 'smadame@hotmail.com\r\ncomisariadefamilia@busbanza-boyaca.gov.co  \r\n', 6, 6, 1, '0000-00-00'),
(18, 'GONZÃLEZ CASTRO ', 'HÃ‰CTOR MANUEL', 'CC', '7771230', 'M', '15131', '3204994583', 'CDF_CALDAS', '2030', 'comisariadefamilia@caldas-boyaca.gov.co', 6, 6, 1, '0000-00-00'),
(19, 'NEIRA MARTÃNEZ', 'JUAN PABLO', 'CC', '74130244', 'M', '15135', '3115419662', 'CDF_CAMPOHERMOSO', '2031', 'comisaria@campohermoso-boyaca.gov.co\r\njuanpabloneiramartinez@gmail.com  \r\n', 6, 6, 1, '0000-00-00'),
(20, 'DUEÃ‘AS CHOCONTA', 'VLADIMIR', 'CC', '74090371', 'M', '15162', '3103487510', 'CDF_CERINZA', '2032', 'comisariafamilia@cerinza-boyaca.gov.co', 6, 6, 1, '0000-00-00'),
(21, 'LÃ“PEZ CASTELBLANCO', 'LOREN ASTRITH', 'CC', '40017742', 'F', '15172', '7524098/3107551254', 'CDF_CHINAVITA', '2033', 'comisariadefamilia@chinavita-boyaca.gov.co ', 6, 6, 1, '0000-00-00'),
(22, 'RINCÃ“N TORRES', 'NIDIA ELIZABETH', 'CC', '40044572', 'F', '15176', '3213352646 ', 'CDF_CHIQUINQUIRA', '2034', 'comisariadefamilia@chiquinquira-boyaca.gov.co   \r\nelizabethcomisaria@hotmail.com \r\n', 6, 6, 1, '0000-00-00'),
(23, 'TARAZONA', 'YENNY ALEXANDRA', 'CC', '23999427', 'F', '15232', '3212049562', 'CDF_CHIQUIZA', '2035', 'comisariadefamilia@chiquiza-boyaca.gov.co', 6, 6, 1, '0000-00-00'),
(24, 'FUENTES ROJAS', 'YULLY CAROLINA', 'CC', '23777201', 'F', '15180', '3115477218', 'CDF_CHISCAS', '2036', 'comisariadefamilia@chiscas-boyaca.gov.co   yullyfuentes@hotmail.com', 6, 6, 1, '0000-00-00'),
(25, 'GÃ“MEZ PÃ‰REZ', 'YENNY PAOLA', 'CC', '40772247', 'F', '15183', '3106082404', 'CDF_CHITA', '2037', 'comisariadefamiliachita2016@gmail.com\r\njennypaola711@gmail.com \r\n', 6, 6, 1, '0000-00-00'),
(26, 'CASTIBLANCO TELLEZ', 'YURLENY', 'CC', '21808300', 'F', '15185', '3133750819', 'CDF_CHITARAQUE', '2038', 'comisaria@chitaraque-boyaca.gov.co ', 6, 6, 1, '0000-00-00'),
(27, 'QUINTANA PÃEZ', 'NIGHUIER FRANCISCO', 'CC', '74740047', 'M', '15187', '3123824931', 'CDF_CHIVATA', '2039', 'comisariadefamilia@chivata-boyaca.gov.co \r\nfranciscoqp7@yahoo.es\r\n', 6, 6, 1, '0000-00-00'),
(28, 'SILVA RANGEL', 'MARITZA', 'CC', '40711112', 'F', '15236', '3118476581', 'CDF_CHIVOR', '2040', '\r\ncomisariadefamilia@chivor-boyaca.gov.co', 6, 6, 1, '0000-00-00'),
(29, 'REYES MOLINA', 'EDISON', 'CC', '7181427', 'M', '15189', '3132065887', 'CDF_CIENEGA', '2041', 'comisariadefamilia@cienega-boyaca.gov.co ', 6, 6, 1, '0000-00-00'),
(30, 'SUÃREZ SUÃREZ', 'LINA MARCELA', 'CC', '20007479', 'F', '15204', '3115243513 ', 'CDF_COMBITA', '2042', 'limasu76@hotmail.com', 6, 6, 1, '0000-00-00'),
(31, 'SANTAMARIA', 'VLADIMER', 'CC', '7184323', 'M', '15212', '3105552191', 'CDF_COPER', '2043', 'comisariadefamilia@coper-boyaca.gov.co \r\nvladimersantamaria@hotmail.com \r\n', 6, 6, 1, '0000-00-00'),
(32, 'NUÃ‘EZ PRECIADO', 'DIANA CAROLINA', 'CC', '23007784', 'F', '15215', '3114510108', 'CDF_CORRALES', '2044', 'comisaria@corrales-boyaca.gov.co \r\nkarolpre@hotmail.com\r\n', 6, 6, 1, '0000-00-00'),
(33, 'BARRERA', 'CARLOS', 'CC', '6761009', 'M', '15218', '3112497104', 'CDF_COVARACHIA', '2045', 'comisariadefamilia@covarachia-boyaca.gov.co', 6, 6, 1, '0000-00-00'),
(34, 'TEGRIA', 'EVARISTO', 'CC', '7199240', 'M', '15223', '3204499951', 'CDF_CUBARA', '2047', 'comisaria@cubara-boyaca.gov.co \r\nastridcaroj@hotmail.com ', 6, 6, 1, '0000-00-00'),
(35, 'OTÃLORA MUZO', 'ANA YOLIMA', 'CC', '23566900', 'F', '15224', '3123185036', 'CDF_CUCAITA', '2047', 'comisaria@cucaita-boyaca.gov.co ', 6, 6, 1, '0000-00-00'),
(36, 'MORENO HUERTAS', 'OSCAR JAVIER', 'CC', '7179403', 'M', '15226', '3142932901', 'CDF_CUITIVA', '2048', 'comisariadefamilia@cuitiva-boyaca.gov.co ', 6, 6, 1, '0000-00-00'),
(37, 'ROJAS ', 'MARTHA LUCIA', 'CC', '24777997', 'F', '15238', ' 7626248', 'CDF1_DUITAMA', '2049', 'comisaria1@duitama-boyaca.gov.co ', 6, 6, 1, '0000-00-00'),
(38, 'CRUZ SÃNCHEZ', 'JENNY CONSTANZA', 'CC', '23123790', 'F', '15238', '7605237 ', 'CDF2_DUITAMA', '2050', 'comisaria2@duitama-boyaca.gov.co ', 6, 6, 1, '0000-00-00'),
(39, 'OROZCO MARTÃNEZ', 'AURA LUCILA', 'CC', '41222771', 'F', '15244', '87890024', 'CDF_ELCOCUY', '2051', 'comisariadefamilia@elcocuy-boyaca.gov.co \r\naura.orozco.m@hotmail.com\r\n', 6, 6, 1, '0000-00-00'),
(40, 'COMISARIA DE FAMILIA', 'EL ESPINO', 'CC', '23080772', 'F', '15248', '22222222', 'CDF_ELESPINO', '2052', 'comisariadefamilia@elespino-boyaca.gov.co ', 6, 6, 1, '0000-00-00'),
(41, 'AVELLA FONSECA', 'JADY SHIRLEY', 'CC', '40010107', 'F', '15272', '3112281011', 'CDF_FIRAVITOBA', '2053', 'shirleyavellaf@hotmail.com ', 6, 6, 1, '0000-00-00'),
(42, 'CRUZ PAREDES', 'LUISA FERNANDA', 'CC', '40765533', 'F', '15276', '3115091345', 'CDF_FLORESTA', '2054', 'comisaria@floresta-boyaca.gov.co \r\nluisafernandacruz27@gmail.com \r\n', 6, 6, 1, '0000-00-00'),
(43, 'TORRES GAONA', 'ANA O.', 'CC', '1049234707', 'F', '15293', '3133358511', 'CDF_GACHANTIVA', '2055', 'Xanatoga20@gmail.com \r\ncomisariadefamilia@gachantiva-boyaca.gov.co', 6, 6, 1, '0000-00-00'),
(44, 'CRISTANCHO CUTA', 'DIANA', 'CC', '40027120', 'F', '15296', '3212329886', 'CDF_GAMEZA', '2056', 'comisariadefamiliagameza@hotmail.com\r\ndianacr17@hotmail.com \r\n', 6, 6, 1, '0000-00-00'),
(45, 'ORTEGA GARZÃ“N', 'PAULA LISSETTE', 'CC', '40024721', 'F', '15299', '3186319993', 'CDF_GARAGOA', '2057', 'comisariadefamilia@garagoa-boyaca.gov.co ', 6, 6, 1, '0000-00-00'),
(46, 'RAMOS DIAZ', 'DIANA MARIA', 'CC', '23909333', 'F', '15317', '7880283 ext 107', 'CDF_GUACAMAYAS', '15317', 'comisaria@guacamayas-boyaca.gov.co\r\ndiana.ramos.diaz@hotmail.com\r\n', 6, 6, 1, '0000-00-00'),
(47, 'AVILA', 'CINDY', 'CC', '23544472', 'F', '15322', '3133864482', 'GUATEQUE', '2059', 'comisariaguateque2016@gmail.com ', 6, 6, 1, '0000-00-00'),
(48, 'REYES REYES', 'JOSÃ‰ GONZALO', 'CC', '7167720', 'M', '15325', '3203748066', 'CDF_GUAYATA', '2060', 'comisaria-familia@guayata-boyaca.gov.co ', 6, 6, 1, '0000-00-00'),
(49, 'MENDIVELSO TORRES', 'JULIO ROBERTO', 'CC', '6742210', 'M', '15332', '3133130891', 'CDF_GÃœICAN', '2061', 'juliomendivelso64@hotmail.es \r\ncomisaria.guican@gmail.com', 6, 6, 1, '0000-00-00'),
(50, 'GRANADOS TALERO', 'CLAUDIA LUCÃA', 'CC', '34243970', 'F', '15362', '3103111615', 'CDF_IZA', '2062', 'Comisariadefamilia@iza-boyaca.gov.co \r\nclaudiagyt@hotmail.com\r\n', 6, 6, 1, '0000-00-00'),
(51, 'ROJAS RODRÃGUEZ', 'AURA LILIANA', 'CC', '1049297555', 'F', '15367', '3203390017', 'CDF_JENESANO', '2063', 'dra_lilo@hotmail.com    \r\ncomisariadefamilia@jenesano-boyaca.gov.co \r\n', 6, 6, 1, '0000-00-00'),
(52, 'MUÃ‘OZ', 'ASTRID LILIANA', 'CC', '24977399', 'F', '15368', '3102692570', 'CDF_JERICO', '2064', 'comisaria@jerico-boyaca.gov.co \r\nsecretariadegobierno@jerico-boyaca.gov.co \r\n', 6, 6, 1, '0000-00-00'),
(53, 'PEREZ FERNANDEZ', 'ANGEL MARIA', 'CC', '7180244', 'M', '15377', '3124580004', 'CDF_LABRANZAGRANDE', '2068', 'angel71perez@hotmail.com ', 6, 6, 1, '0000-00-00'),
(54, 'RODRIGUEZ GONZALEZ', 'ANA YALILE', 'CC', '40090971', 'F', '15380', '3208494825', 'CDF_LACAPILLA', '2065', 'comdefamilia@lacapilla-boyaca.gov.co \r\nanayalilerodriguez@gmail.com ', 6, 6, 1, '0000-00-00'),
(55, 'BERNAL DIAZ ', 'YEISON', 'CC', '74555699', 'M', '15403', '3125593370 ', 'CDF_LAUVITA', '15403', 'alcaldia@lauvita-boyaca.gov.co \r\nalcaldÃ­auvita@hotmail.com \r\nyei00@hotmail.com ', 6, 6, 1, '0000-00-00'),
(56, 'CASTELLANOS', 'ALBA YANETH', 'CC', '47927324', 'F', '', '3138221243', 'CDF_LAVICTORIA', '2067', 'comisariadefamilia@lavictoria-boyaca.gov.co', 6, 6, 0, '0000-00-00'),
(57, 'AGUILLON ALFONSO', 'JENNITH ROCIO', 'CC', '40012277', 'F', '15425', '7590131/3188272713', 'CDF_MACANAL', '2069', 'comisariadefamilia@macanal-boyaca.gov.co \r\njenithaguillon@hotmail.com \r\n', 6, 6, 1, '0000-00-00'),
(58, 'VALENZUELA ', 'ANA LUCRECIA', 'CC', '23997773', 'F', '15442', '3133866774 ', 'CDF_MARIPI', '2070', 'analucre25@hotmail.com', 6, 6, 1, '0000-00-00'),
(59, 'ZUBIETA', 'DERLY YULIETH', 'CC', '40179942', 'F', '15455', '3203453562', 'CDF_MIRAFLORES', '2071', 'comisaria_miraflores@hotmail.com', 6, 6, 1, '0000-00-00'),
(60, 'PUERTO', 'EDGAR ALBERTO', 'CC', '7181474', 'M', '15464', '3204195065', 'CDF_MONGUA', '2072', 'abogadoedgarpuerto@gmail.com', 6, 6, 1, '0000-00-00'),
(61, 'RINCON BARRERA', 'YENNY CAROLINA', 'CC', '40029433', 'F', '15466', '3178950997 ', 'CDF_MONGUI', '2073', 'comisariadefamilia@mongui-boyaca.gov.co \r\nyennycarolina.rincon@gmail.com ', 6, 6, 1, '0000-00-00'),
(62, 'GAMBA COY', 'JOSE PASTOR', 'CC', '7172209', 'M', '15469', '3124306452/7282413', 'CDF_MONIQUIRA', '2074', 'comisaria@moniquira-boyaca.gov.co josepastorgc@yahoo.es ', 6, 6, 1, '0000-00-00'),
(63, 'VASCO PIEDRAHITA', 'LILIANA PATRICIA', 'CC', '40101707', 'M', '15476', '3138646281', 'CDF_MOTAVITA', '2075', 'comisariadefamilia@motavita-boyaca.gov.co \r\nvascoliliana@hotmail.com   \r\n', 6, 6, 1, '0000-00-00'),
(64, 'MARTINEZ', 'ANDRES', 'CC', '7184555', 'M', '15480', '3105522712', 'CDF_MUZO', '2076', 'comisaria@muzo-boyaca.gov.co \r\niesanmarcos@hotmail.com \r\n', 6, 6, 1, '0000-00-00'),
(65, 'CRISTANCHO', 'SANDRA MILENA', 'CC', '40017747', 'F', '15491', '3208459746', 'CDF_NOBSA', '2077', 'comisariadefamilianobsa@hotmail.com \r\nenith.restrepo@psicologas.com \r\n', 6, 6, 1, '0000-00-00'),
(66, 'SANCHEZ SANCHEZ', 'JUAN CARLOS', 'CC', '7183456', 'M', '15494', '3208346993', 'CDF_NUEVOCOLON', '2078 ', 'comisaria@nuevocolon-boyaca.gov.co ', 6, 6, 1, '0000-00-00'),
(67, 'GOMEZ', 'ERIKA XIMENA', 'CC', '23771900', 'F', '15500', '3144138761/7401818', 'CDF_OICATA', '2079', 'comisaria@oicata-boyaca.gov.co ', 6, 6, 1, '0000-00-00'),
(68, 'ESTUPIÃ‘AN LOPEZ', 'MONICA CRISTINA', 'CC', '40900231', 'F', '15507', '3112705404', 'CDF_OTANCHE', '2080', 'comisaria@otanche-boyaca.gov.co \r\ntoesvero@hotmail.com \r\n', 6, 6, 1, '0000-00-00'),
(69, 'PULIDO APONTE', 'SANDRA NELLY', 'CC', '40107700', 'F', '15511', '3124646078', 'CDF_PACHAVITA', '2081', 'comisariadefamilia@pachavita-boyaca.gov.co ', 6, 6, 1, '0000-00-00'),
(70, 'MARTINEZ BARRETO', 'SANDRA MILENA', 'CC', '40999211', 'F', '15514', '3133674733', 'CDF_PAEZ', '2082', 'samima0221@hotmail.com \r\ncomisariapaezboy@yahoo.es \r\n', 6, 6, 1, '0000-00-00'),
(71, 'NIÃ‘O PAIPILLA', 'ANA VELICE', 'CC', '40011227', 'F', '15516', '3114891378', 'CDF_PAIPA', '2083', 'comisaria@paipa-boyaca.gov.co', 6, 6, 1, '0000-00-00'),
(72, 'HERNANDEZ PEREZ', 'ANGELA AZUCENA', 'CC', '42000339', 'F', '15518', '3208560662', 'CDF_PAJARITO', '2084', 'comisariadefamilia@pajarito-boyaca.gov.co ', 6, 6, 1, '0000-00-00'),
(73, 'ALARCON BOYACÃ', 'MONICA YOHANA', 'CC', '40077207', 'F', '15522', '3112768990', 'CDF_PANQUEBA', '2085', 'comisariadefamilia@panqueba-boyaca.gov.co ', 6, 6, 1, '0000-00-00'),
(74, 'BARRAGAN', 'ALIRIO', 'CC', '6755307', 'F', '15531', '3138881440', 'CDF_PAUNA', '2086', 'aliriobarragan@hotmail.com', 6, 6, 1, '0000-00-00'),
(75, 'PINTO ZAMBRANO', 'KEINER GILBERTO', 'CC', '7182247', 'F', '15533', '3124499749', 'CDF_PAYA', '2087', 'comisariafamilia@paya-boyaca.gov.co ', 6, 6, 1, '0000-00-00'),
(76, 'FONSECA PARRA ', 'MARINA', 'CC', '40090997', 'F', '15537', '3112262465', 'CDF_PAZDELRIO', '2088', 'comisariadefamilia.pazderio@gmail.com ', 6, 6, 1, '0000-00-00'),
(77, 'SANCHEZ', 'MERY SAGRARIO', 'CC', '40044277', 'F', '15542', '3132852065', 'CDF_PESCA', '2089', 'comisariadefamilia@pesca-boyaca.gov.co ', 6, 6, 1, '0000-00-00'),
(78, 'HUERFANO GUANUMEN', 'MARY', 'CC', '40088777', 'F', '15550', '3133515970', 'CDF_PISBA', '2090', 'comisariafpisba@gmail.com ', 6, 6, 1, '0000-00-00'),
(79, 'CANIZALES ARIAS ', 'MERCEDES', 'CC', '40114477', 'F', '15572', '7383355/3115927978', 'CDF_PUERTOBOYACA', '2091', 'comfliampal@puertoboyaca-boyaca.gov.co  ', 6, 6, 1, '0000-00-00'),
(80, 'AMEZQUITA', 'CAROLINA', 'CC', '40020111', 'F', '15580', '3208893979', 'CDF_QUIPAMA', '2092', 'comisariadefamilia@quipama-boyaca.gov.co  ', 6, 6, 1, '0000-00-00'),
(81, 'SALAMANCA', 'ANA MILENA', 'CC', '40999900', 'F', '15599', '3107870609', 'CDF_RAMIRIQUI', '2091', 'comisaria.ramiriqui@gmail.com ', 6, 6, 1, '0000-00-00'),
(82, 'VALERO', 'OCTAVIO', 'CC', '6780321', 'M', '15600', '3103130054', 'CDF_RAQUIRA', '2094', 'elrruyn@gmail.com ', 6, 6, 1, '0000-00-00'),
(83, 'CARDENAS SOLER', 'AURA ELVIRA', 'CC', '41202797', 'F', '15621', '3125292748', 'CDF_RONDON', '2095', 'comisaria@rondon-boyaca.gov.co    ', 6, 6, 1, '0000-00-00'),
(84, 'ALFONSO DEHAQUIZ', 'ALEXANDRA', 'CC', '40717007', 'F', '15632', '3204002749', 'CDF_SABOYA', '2096', 'comisaria@saboya-boyaca.gov.co ', 6, 6, 1, '0000-00-00'),
(85, 'PAEZ PAEZ', 'MARTHA LUCERO', 'CC', '40551090', 'F', '15638', '3115685126', 'CDF_SACHICA', '2097', 'luceropaez23@hotmail.com   \r\ncomisaria@sachica-boyaca.gov.co ', 6, 6, 1, '0000-00-00'),
(86, 'PEDROZA CANARIA', 'PILAR VERONICA', 'CC', '40027333', 'F', '15646', '3202777454', 'CDF_SAMACA', '2098', 'abogadapilar@hotmail.com ', 6, 6, 1, '0000-00-00'),
(87, 'CICUA ARIAS', 'ALVARO ARIEL FERNANDO', 'CC', '7784377', 'M', '15660', '3124508207', 'CDF_SANEDUARDO', '2099', 'abogado150920@yahoo.es ', 6, 6, 1, '0000-00-00'),
(88, 'LOPEZ', 'ANDRES', 'CC', '74241070', 'M', '15664', '3204788188', 'CDF_SANJOSEDEPARE', '2100', 'comisaria@sanjosedepare-boyaca.gov.co \r\ncomisariasanjosedepare@gmail.com\r\n', 6, 6, 1, '0000-00-00'),
(89, 'BARRERA REYES ', 'GLORIA ESPERANZA', 'CC', '3104779620', 'F', '15667', '3104779620', 'CDF_SANLUISDEGACENO', '2101', 'comisaria@sanluisdegaceno-boyaca.gov.co ', 6, 6, 1, '0000-00-00'),
(90, 'REYES FIGUEROA ', 'RAFAEL', 'CC', '6771959', 'M', '15673', '3118948086', 'CDF_SANMATEO', '2102', 'rareabogado@hotmail.com', 6, 6, 1, '0000-00-00'),
(91, 'FONSECA GRANADOS ', 'JULIAN ERNESTO', 'CC', '74227774', 'M', '15676', '3114627013', 'CDF_SANMIGUELDESEMA', '2103', 'julianfonseca08@gmail.com ', 6, 6, 1, '0000-00-00'),
(92, 'RINCON GOMEZ', 'WILSON ORLANDO', 'CC', '7187347', 'F', '15681', '3143346918', 'CDF_SANPABLODEBORBUR', '2104', 'comisaria@sanpablodeborbur-boyaca.gov.co', 6, 6, 1, '0000-00-00'),
(93, 'FIGUEREDO', 'MARIA ESTELA', 'CC', '23777401', 'F', '15690', '3212092213', 'CDF_SANTAMARIA', '2105', 'comisaria@santamaria-boyaca.gov.co ', 6, 6, 1, '0000-00-00'),
(94, 'REYES GALVIS', 'GUILLERMO ALFREDO', 'CC', '7184327', 'M', '15693', '3212092213', 'CDF_SANTAROSADEVITERBO', '2106', 'comisariadefamilia@santarosadeviterbo-boyaca.gov.co ', 6, 6, 1, '0000-00-00'),
(95, 'ALFONSO BELTRAN', 'FENRY', 'CC', '7177001', 'M', '15696', '3107688810', 'CDF_SANTASOFIA', '2107', 'fenryvallenet@hotmail.com ', 6, 6, 1, '0000-00-00'),
(96, 'NUÃ‘EZ NUÃ‘EZ', 'MARIA JIMENA', 'CC', '40027973', 'F', '15686', '3143000679', 'CDF_SANTANA', '2108', 'comisaria@santana-boyaca.gov.co  \r\nmaria.jimenanunez@hotmail.com  ', 6, 6, 1, '0000-00-00'),
(97, 'CORTES CELY', 'LIDYA ESPERANZA', 'CC', '24557788', 'F', '15720', '3212464182', 'CDF_SATIVANORTE', '2109', 'comfamilia@sativanorte-boyaca.gov.co ', 6, 6, 1, '0000-00-00'),
(98, 'PEREZ RIVERA', 'DEYSY LORENA', 'CC', '23927721', 'F', '15723', '3114872938', 'CDF_SATIVASUR', '2110', 'comisariadefamilia@sativasur-boyaca.gov.co', 6, 6, 1, '0000-00-00'),
(99, 'PAREDES FORERO', 'CARLOS RAFAEL', 'CC', '7178821', 'M', '15740', '3115514879', 'CDF_SIACHOQUE', '2111', 'comisaria@siachoque-boyaca.gov.co     \r\ncrafael.paredes49@gmail.com', 6, 6, 1, '0000-00-00'),
(100, 'PEÃ‘A HERREÃ‘O', 'BLANCA ORFIDIA', 'CC', '23990077', 'F', '15753', '3123508455', 'CDF_SOATA', '2112', 'blanca7004@hotmail.com \r\ncomisaria@soata-boyaca.gov.co', 6, 6, 1, '0000-00-00'),
(101, 'ALVARADO DIAZ', 'HUMBERTO ARMANDO', 'CC', '74333777', 'M', '15757', '3132337105', 'CDF_SOCHA', '2113', 'humbertoalvarado04@gmail.com \r\ncomisariadefamiliadesocha@gmail.com', 6, 6, 1, '0000-00-00'),
(102, 'BONILLA ', 'GLORIA ESPERANZA', 'CC', '40728844', 'F', '15755', '3112235317', 'CDF_SOCOTA', '2114', 'bonilla0811@gmail.com ', 6, 6, 1, '0000-00-00'),
(103, 'BASTOS LEON', 'MILENA', 'CC', '24007112', 'F', '15759', '3186908860', 'CDF1_SOGAMOSO', '2115', 'gobierno@sogamoso-boyaca.gov.co ', 6, 6, 1, '0000-00-00'),
(104, 'BARRERA GUATAQUI', 'MARIA LUMEI', 'CC', '40701107', 'F', '15759', '3138300293', 'CDF2_SOGAMOSO', '2139', 'centroconvivencia@sogamoso-boyaca.gov.co', 6, 6, 1, '0000-00-00'),
(105, 'CHAPARRO', 'YENCI', 'CC', '24244901', 'F', '15759', '3138300293', 'CDF3_SOGAMOSO', '2140', 'centroconvivencia@sogamoso-boyaca.gov.co', 6, 6, 1, '0000-00-00'),
(106, 'SAMORA ', 'MANUEL', 'CC', '40177911', 'M', '15761', '3115758440', 'CDF_SOMONDOCO', '2116', 'comisariafamiliasomondoco@gmail.com\r\ncomisaridefamilia@somondoco-boyaca.gov.co', 6, 6, 1, '0000-00-00'),
(107, 'SABALLETH CAJIGAS', 'WENDY', 'CC', '23749477', 'F', '15762', '3202637034', 'CDF_SORA', '2117', 'comisariafamilia@sora-boyaca.gov.co \r\nmariSua_76@hotmail.com', 6, 6, 1, '0000-00-00'),
(108, 'VARGAS VACCA', 'MAGDALIZ', 'CC', '42997790', 'F', '15764', '3143437626', 'CDF_SORACA', '2118', 'coneja300@hotmail.com', 6, 6, 1, '0000-00-00'),
(109, 'LACHE SANDOVAL', 'LUZ MERY', 'CC', '44800977', 'F', '15763', '3106805444', 'CDF_SOTAQUIRA', '2119', 'comisaria@sotaquira-boyaca.gov.co \r\nlumelasan19@hotmail.com', 6, 6, 1, '0000-00-00'),
(110, 'SANABRIA URIBE', 'ZULMA', 'CC', '24778880', 'F', '15774', '3124437476', 'CDF_SUSACON', '2120', 'zulmis88@hotmail.com \r\ncomfamilia@susacon-boyaca.gov.co', 6, 6, 1, '0000-00-00'),
(111, 'RIOS ACOSTA', 'ADRIANA DEL PILAR', 'CC', '24997730', 'F', '15776', '3112346309', 'CDF_SUTAMARCHAN', '2121', 'comisariasutamarchan@gmail.com \r\ncomisaria@sutamarchan-boyaca.gov.co', 6, 6, 1, '0000-00-00'),
(112, 'MOLINA GUTIERREZ', 'ANDREA', 'CC', '40901201', 'F', '15778', '3212673944', 'CDF_SUTATENZA', '2122', 'comisariadefamilia@sutatenza-boyaca.gov.co', 6, 6, 1, '0000-00-00'),
(113, 'MURILLO M.', 'NORMAN ARMANDO', 'CC', '74707301', 'M', '15790', '3204896814', 'CDF_TASCO', '2123', 'camil12@ymail.com', 6, 6, 1, '0000-00-00'),
(114, 'FONSECA', 'YESENIA', 'CC', '23444911', 'F', '15798', '3105595888', 'CDF_TENZA', '2124', 'comisariadefamilia@tenza-boyaca.gov.co', 6, 6, 1, '0000-00-00'),
(115, 'MALDONADO CABALLERO', 'DIANA MARIA', 'CC', '40933470', 'F', '15804', '3143394353', 'CDF_TIBANA', '2125', 'comisaria@tibana-boyaca.gov.co', 6, 6, 1, '0000-00-00'),
(116, 'GONZALEZ', 'YENNY ALEXANDRA', 'CC', '23997400', 'F', '15806', '3213172848', 'CDF_TIBASOSA', '2126', 'comisariadefamilia@tibasosa-boyaca.gov.co \r\njennyalgonzalez@gmail.com', 6, 6, 1, '0000-00-00'),
(117, 'SANCHEZ MENDIETA', 'YICED PATRICIA', 'CC', '40277499', 'F', '15808', '3134147737', 'CDF_TINJACA', '2127', 'comisariadefamilia@tinjaca-boyaca.gov.co', 6, 6, 1, '0000-00-00'),
(118, 'PARRA', 'GIOVANNY', 'CC', '7227107', 'F', '15810', '3012390145', 'CDF_TIPACOQUE', '2128', 'comisariadefamilia@tipacoque-boyaca.gov.co \r\ngioparra@gmail.com', 6, 6, 1, '0000-00-00'),
(119, 'GUIO', 'ALEXANDRA', 'CC', '40701177', 'F', '15814', '3106496628', 'CDF_TOCA', '2129', 'comisaria@toca-boyaca.gov.co ', 6, 6, 1, '0000-00-00'),
(120, 'MARTINEZ GUERRERO', 'VIRGINIA', 'CC', '23900777', 'F', '15816', '3125433107', 'CDF_TOGUI', '2130', 'virmargue@hotmail.com\r\ncomisaria@togui-boyaca.gov.co', 6, 6, 1, '0000-00-00'),
(121, 'TORRES CIENDUA', 'MARIAN ALEXANDRA', 'CC', '40737557', 'F', '15820', '3124354039', 'CDF_TOPAGA', '2131', 'comisariadefamilia@topaga-boyaca.gov.co', 6, 6, 1, '0000-00-00'),
(122, 'GOMEZ HERNANDEZ', 'JAZMIN', 'CC', '40555121', 'F', '15822', '3108763959', 'CDF_TOTA', '2132', 'comisariadefamilia@tota-boyaca.gov.co', 6, 6, 1, '0000-00-00'),
(123, 'DIAZ DIAZ', 'CLARA ISABEL', 'CC', '23990214', 'F', '15001', '3138912164', 'CDF1_TUNJA', '2141', 'cidd01@hotmail.com', 6, 6, 1, '0000-00-00'),
(124, 'RENDON PLAZAS', 'MARIA ESTHER', 'CC', '40221333', 'F', '15001', '3102084038', 'CDF2_TUNJA', '2142', 'merpfamilia@gmail.com', 6, 6, 1, '0000-00-00'),
(125, 'ORTIZ ', 'SOLEY DE LOS ANGELES', 'CC', '20121907', 'F', '15001', '3134926358', 'CDF3_TUNJA', '2143', 'maesni55@yahoo.com', 6, 6, 1, '0000-00-00'),
(126, 'CUBIDES PINEDA', 'DIANA CAMILA', 'CC', '40777191', 'F', '15832', '3143463032', 'CDF_TUNUNGUA', '2133', 'kmijoma@hotmail.com  comisariatununguaboyaca@gmail.com', 6, 6, 1, '0000-00-00'),
(127, 'MORENO SOSA', 'NUBIA ESPERANZA', 'CC', '42900344', 'F', '15835', '3204939179', 'CDF_TURMEQUE', '2134', 'nesmo7@hotmail.com, nesmo7@gmail.com \r\ncomisaria@turmeque-boyaca.gov.co', 6, 6, 1, '0000-00-00'),
(128, 'VARGAS CIFUENTES', 'YENNY EDITH', 'CC', '42777504', 'F', '15837', '3202714070', 'CDF_TUTA', '2135', 'yenvarci@hotmail.com ', 6, 6, 1, '0000-00-00'),
(129, 'BALLESTEROS TORRES ', 'YESID', 'CC', '7179740', 'M', '15839', '3157921671', 'CDF_TUTAZA', '2136', 'yesid35@yahoo.es', 6, 6, 1, '0000-00-00'),
(130, 'BERNAL CRUZ', 'ANA STELLA', 'CC', '3142200971', 'F', '15842', '3142200971', 'CDF_UMBITA', '2137', 'comisariadefamilia@umbita-boyaca.gov.co', 6, 6, 1, '0000-00-00'),
(131, 'MORENO ROJAS', 'LEIDY DADIANA', 'CC', '23249877', 'F', '15861', '3142907921', 'CDF_VENTAQUEMADA', '2138', 'ldmr_75@yahoo.es \r\ncomisaria@ventaquemada-boyaca.gov.co', 6, 6, 1, '0000-00-00'),
(132, 'RODRIGUEZ ', 'CAMILO ANDRES', 'CC', '7507002', 'M', '15407', '3203259670', 'CDF_VILLADELEYVA', '2139', 'comisariafamilia@villadeleyva-boyaca.gov.co', 6, 6, 1, '0000-00-00'),
(133, 'PROCURADURIA', 'GENERAL DE LA NACION', 'CC', '90021344', 'M', '15001', '7440090', 'PROCURADURIA', '2144', 'Procuraduria@general.gov.co', 8, 9, 1, '0000-00-00'),
(134, 'ENLACE', 'MUNICIPAL', 'CC', '900400321', 'M', '15001', '7455577', 'JUEZ', '1234567', 'Enlace_Mpal@gmail.com', 9, 5, 1, '0000-00-00'),
(135, 'INVITADO', 'MUNICIPAL', 'CC', '900333743', 'M', '15001', '7443388', 'COMISARIO', '1234567', 'Invitado@gmail.com', 6, 5, 1, '0000-00-00'),
(136, 'ICBF', 'ICBF', 'CC', '123456789', 'F', '15001', '7447777', 'ICDF', '1237', 'Contacto@icbf.gov.co', 9, 8, 1, '0000-00-00'),
(137, 'SUPERVISOR', 'GOBERNACIÃ“N', 'CC', '900211911', 'M', '15001', '7441010', 'ADMIN', '1234567', 'Supervisorgob@boyaca.gov.co', 1, 2, 1, '0000-00-00'),
(138, 'SALAZAR MORENO', 'ANDERSON ARLEX', 'CC', '1049621862', 'M', '15001', '3102951389', 'SUPERADMIN', '900710', 'Anderson-90101@hotmail.com', 10, 0, 1, '2017-10-06'),
(142, 'PEREZ PRECIADO', 'LUCILA ESPERANZA', 'CC', '30303843', 'F', '', '3134841836', 'LUCIPERE', '123456', 'director.grupospoblacionales@boyaca.gov.co', 6, 0, 1, '2017-11-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `victimas`
--

CREATE TABLE `victimas` (
  `id_victima` int(11) NOT NULL,
  `descripcion` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `victimas`
--

INSERT INTO `victimas` (`id_victima`, `descripcion`) VALUES
(1, 'NO ES VICTIMA CONFLICTO ARMADO'),
(2, 'EN SITUACION DE DESPLAZAMIENTO'),
(3, 'DESVINCULADO DE GRUPOS ARMADOS'),
(4, 'HIJO DE ADULTO DESMOVILIZADO'),
(5, 'OTRO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

CREATE TABLE `zonas` (
  `id_zona` varchar(1) NOT NULL,
  `descripcion` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`id_zona`, `descripcion`) VALUES
('R', 'RURAL'),
('U', 'URBANA');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuidadores`
--
ALTER TABLE `cuidadores`
  ADD UNIQUE KEY `id_cuidadores` (`id_cuidadores`);

--
-- Indices de la tabla `derechos`
--
ALTER TABLE `derechos`
  ADD PRIMARY KEY (`id_derecho`);

--
-- Indices de la tabla `eps`
--
ALTER TABLE `eps`
  ADD PRIMARY KEY (`id_eps`),
  ADD UNIQUE KEY `codigo` (`id_eps`);

--
-- Indices de la tabla `estado_caso`
--
ALTER TABLE `estado_caso`
  ADD PRIMARY KEY (`id_estadocaso`);

--
-- Indices de la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD UNIQUE KEY `codigo_expediente` (`codigo_expediente`);

--
-- Indices de la tabla `gestacion`
--
ALTER TABLE `gestacion`
  ADD PRIMARY KEY (`id_gestacion`);

--
-- Indices de la tabla `indicadores`
--
ALTER TABLE `indicadores`
  ADD PRIMARY KEY (`id_indicador`);

--
-- Indices de la tabla `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`consecutivo`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD UNIQUE KEY `id_municipio` (`id_municipio`);

--
-- Indices de la tabla `ninnosnna`
--
ALTER TABLE `ninnosnna`
  ADD UNIQUE KEY `id_ninnos` (`id_ninnos`);

--
-- Indices de la tabla `parentescos`
--
ALTER TABLE `parentescos`
  ADD PRIMARY KEY (`id_parentesco`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD UNIQUE KEY `id_provincia` (`id_provincia`);

--
-- Indices de la tabla `regimenes`
--
ALTER TABLE `regimenes`
  ADD PRIMARY KEY (`id_regimen`),
  ADD UNIQUE KEY `id_afiliacion` (`id_regimen`);

--
-- Indices de la tabla `remite`
--
ALTER TABLE `remite`
  ADD PRIMARY KEY (`id_remite`);

--
-- Indices de la tabla `si_no`
--
ALTER TABLE `si_no`
  ADD PRIMARY KEY (`id_sino`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD UNIQUE KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuidadores`
--
ALTER TABLE `cuidadores`
  MODIFY `id_cuidadores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `derechos`
--
ALTER TABLE `derechos`
  MODIFY `id_derecho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `estado_caso`
--
ALTER TABLE `estado_caso`
  MODIFY `id_estadocaso` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `expediente`
--
ALTER TABLE `expediente`
  MODIFY `codigo_expediente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `gestacion`
--
ALTER TABLE `gestacion`
  MODIFY `id_gestacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `indicadores`
--
ALTER TABLE `indicadores`
  MODIFY `id_indicador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `logins`
--
ALTER TABLE `logins`
  MODIFY `consecutivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT de la tabla `ninnosnna`
--
ALTER TABLE `ninnosnna`
  MODIFY `id_ninnos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `regimenes`
--
ALTER TABLE `regimenes`
  MODIFY `id_regimen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `remite`
--
ALTER TABLE `remite`
  MODIFY `id_remite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `si_no`
--
ALTER TABLE `si_no`
  MODIFY `id_sino` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1057578146;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
