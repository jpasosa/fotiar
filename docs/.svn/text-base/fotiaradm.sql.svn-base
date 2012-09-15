-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 30-09-2011 a las 14:19:37
-- Versión del servidor: 5.1.50
-- Versión de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `fotiaradm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `busqueda`
--

CREATE TABLE IF NOT EXISTS `busqueda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `subcategoria_id` int(11) DEFAULT NULL,
  `preciomin` float DEFAULT NULL,
  `preciomax` float DEFAULT NULL,
  `fechainicial` datetime DEFAULT NULL,
  `fechafinal` datetime DEFAULT NULL,
  `etiquetalugar` varchar(255) DEFAULT NULL,
  `etiquetatema` varchar(255) DEFAULT NULL,
  `idetiquetalugar` varchar(255) DEFAULT NULL,
  `idetiquetatema` varchar(255) DEFAULT NULL,
  `reviewed` tinyint(1) DEFAULT NULL,
  `untagged` tinyint(1) DEFAULT NULL,
  `sesion_id` int(11) DEFAULT NULL,
  `ordenbusqueda` varchar(100) DEFAULT NULL,
  `carga_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `busqueda`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carga`
--

CREATE TABLE IF NOT EXISTS `carga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `fechacarga` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `carga`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`,`updated_by`,`deleted_by`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `descripcion`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Castor 2011', '2011-08-04 10:13:57', 1, '2011-09-20 13:24:50', 3, NULL, NULL),
(2, 'Catedral', '2011-08-04 10:16:09', 1, NULL, NULL, NULL, NULL),
(3, 'Surf', '2011-08-04 10:17:14', 1, NULL, NULL, NULL, NULL),
(4, 'Turismo Aventura', '2011-08-04 10:17:23', 1, NULL, NULL, '2011-09-20 13:24:34', 3),
(5, 'Skate', '2011-08-04 10:17:29', 1, NULL, NULL, NULL, NULL),
(6, 'Prueba', '2011-08-24 13:52:54', 1, NULL, NULL, '2011-08-24 13:53:00', 1),
(7, 'Esta Es   Una Prueba', '2011-09-02 12:51:19', 1, NULL, NULL, '2011-09-02 12:51:23', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conf_seguridad`
--

CREATE TABLE IF NOT EXISTS `conf_seguridad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `min_letras` int(11) NOT NULL DEFAULT '0',
  `min_numeros` int(11) NOT NULL DEFAULT '0',
  `min_simbolos` int(11) NOT NULL DEFAULT '0',
  `simbolos` varchar(255) DEFAULT NULL,
  `largo_min` int(11) NOT NULL DEFAULT '0',
  `largo_max` int(11) NOT NULL DEFAULT '0',
  `dias_caducidad` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `deleted_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_by` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `conf_seguridad`
--

INSERT INTO `conf_seguridad` (`id`, `min_letras`, `min_numeros`, `min_simbolos`, `simbolos`, `largo_min`, `largo_max`, `dias_caducidad`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 0, 0, 4, '-_&%$', 6, 8, 3, '2008-09-02 18:20:28', 4, '2008-09-02 18:21:35', 4, '0000-00-00 00:00:00', 0),
(2, 0, 0, 4, '-_&%$', 6, 8, 3, '2008-09-02 18:23:47', 4, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(3, 0, 0, 0, NULL, 6, 8, 30, '2008-09-08 01:44:49', 4, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(4, 0, 0, 0, NULL, 4, 20, 0, '2008-09-08 09:57:34', 4, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(5, 0, 0, 0, NULL, 4, 20, 0, '2008-11-04 23:39:01', 13, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotografia`
--

CREATE TABLE IF NOT EXISTS `fotografia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` longtext,
  `nombre_archivo` varchar(255) DEFAULT NULL,
  `camera` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `fstop` varchar(255) DEFAULT NULL,
  `exposuretime` varchar(255) DEFAULT NULL,
  `isospeed` varchar(255) DEFAULT NULL,
  `focallength` varchar(255) DEFAULT NULL,
  `taken` datetime DEFAULT NULL,
  `mimetype` varchar(255) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `subcategoria_id` int(11) DEFAULT NULL,
  `sesion_id` int(11) DEFAULT NULL,
  `carga_id` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `reviewed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `fotografia`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotografia_lugar`
--

CREATE TABLE IF NOT EXISTS `fotografia_lugar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fotografia_id` int(11) DEFAULT NULL,
  `lugar_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `fotografia_lugar`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotografia_tema`
--

CREATE TABLE IF NOT EXISTS `fotografia_tema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fotografia_id` int(11) DEFAULT NULL,
  `tema_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `fotografia_tema`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar`
--

CREATE TABLE IF NOT EXISTS `lugar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`,`updated_by`,`deleted_by`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Volcar la base de datos para la tabla `lugar`
--

INSERT INTO `lugar` (`id`, `descripcion`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Monte Olivo', '2011-08-12 14:43:42', 1, NULL, NULL, '2011-08-23 14:57:52', 1),
(2, 'Rafael Castillo', '2011-08-12 14:43:52', 1, NULL, NULL, NULL, NULL),
(3, 'Villa Dalmine', '2011-08-12 14:44:02', 1, NULL, NULL, NULL, NULL),
(4, 'Espeleta', '2011-08-12 14:44:10', 1, NULL, NULL, NULL, NULL),
(5, 'Brandsen', '2011-08-12 14:44:19', 1, NULL, NULL, NULL, NULL),
(6, 'Castor', '2011-08-15 10:15:01', 1, NULL, NULL, NULL, NULL),
(12, 'Paternal', '2011-08-15 12:28:20', 1, NULL, NULL, NULL, NULL),
(13, 'Almagro', '2011-08-18 12:19:35', 1, NULL, NULL, NULL, NULL),
(14, 'Caballito', '2011-08-18 12:20:07', 1, NULL, NULL, NULL, NULL),
(15, 'Flores', '2011-08-18 12:20:07', 1, NULL, NULL, NULL, NULL),
(16, 'Villa Gessel', '2011-08-18 22:46:54', 1, NULL, NULL, NULL, NULL),
(17, 'Villa Urquiza', '2011-08-29 12:07:37', 1, NULL, NULL, NULL, NULL),
(18, 'Brasil', '2011-09-01 20:25:23', 1, NULL, NULL, NULL, NULL),
(19, 'Praia Joaquina', '2011-09-01 20:25:23', 1, NULL, NULL, NULL, NULL),
(20, 'Hawaii', '2011-09-01 20:26:03', 1, NULL, NULL, NULL, NULL),
(21, 'Costa Rica', '2011-09-01 20:27:43', 1, NULL, NULL, NULL, NULL),
(22, 'Cerro Catedral', '2011-09-01 20:35:15', 2, NULL, NULL, NULL, NULL),
(23, 'Cerro Castor', '2011-09-01 20:41:38', 2, NULL, NULL, NULL, NULL),
(24, 'Esto   Es   Una   Prueba', '2011-09-02 12:53:41', 1, NULL, NULL, '2011-09-02 12:53:45', 1),
(25, 'Prueba', '2011-09-20 12:55:15', 3, NULL, NULL, NULL, NULL),
(26, 'Prueba 2', '2011-09-20 13:26:04', 3, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `id` varchar(50) NOT NULL DEFAULT '',
  `descripcion` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `descripcion`) VALUES
('admin', 'Administrador'),
('fotografo', 'Fotógrafo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE IF NOT EXISTS `sesion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL DEFAULT '',
  `usuario_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`,`updated_by`,`deleted_by`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `sesion`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE IF NOT EXISTS `subcategoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_id` int(11) DEFAULT NULL,
  `descripcion` varchar(255) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`,`updated_by`,`deleted_by`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Volcar la base de datos para la tabla `subcategoria`
--

INSERT INTO `subcategoria` (`id`, `categoria_id`, `descripcion`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 1, 'Pose', '2011-08-16 09:57:49', 1, NULL, NULL, NULL, NULL),
(2, 1, 'Accion', '2011-08-16 09:57:56', 1, NULL, NULL, NULL, NULL),
(3, 1, 'Paisaje', '2011-08-16 09:58:03', 1, NULL, NULL, NULL, NULL),
(4, 2, 'Pose', '2011-08-16 09:58:10', 1, NULL, NULL, NULL, NULL),
(5, 2, 'Accion', '2011-08-16 09:58:18', 1, NULL, NULL, NULL, NULL),
(7, 2, 'Paisaje', '2011-08-16 09:58:57', 1, NULL, NULL, NULL, NULL),
(8, 5, 'Pose', '2011-08-16 09:59:11', 1, NULL, NULL, NULL, NULL),
(10, 5, 'Accion', '2011-08-16 09:59:29', 1, NULL, NULL, NULL, NULL),
(12, 5, 'Paisaje', '2011-08-16 10:00:00', 1, NULL, NULL, NULL, NULL),
(13, 3, 'Pose', '2011-08-16 10:00:10', 1, NULL, NULL, NULL, NULL),
(14, 3, 'Accion', '2011-08-16 10:00:21', 1, NULL, NULL, NULL, NULL),
(15, 3, 'Paisaje', '2011-08-16 10:00:32', 1, NULL, NULL, NULL, NULL),
(16, 4, 'Accion', '2011-08-16 10:00:41', 1, NULL, NULL, NULL, NULL),
(17, 1, 'Poses', '2011-09-02 12:34:19', 1, NULL, NULL, '2011-09-02 12:34:27', 1),
(18, 1, 'Poses', '2011-09-02 12:35:15', 1, NULL, NULL, '2011-09-02 12:36:14', 1),
(19, 1, 'Poses', '2011-09-02 12:36:22', 1, NULL, NULL, '2011-09-02 12:36:38', 1),
(20, 1, 'Poses', '2011-09-02 12:36:44', 1, NULL, NULL, '2011-09-02 12:36:48', 1),
(21, 1, 'poses', '2011-09-02 12:37:56', 1, NULL, NULL, '2011-09-02 12:38:03', 1),
(22, 1, 'Esto   Es   Una   Prueba', '2011-09-02 12:53:18', 1, NULL, NULL, '2011-09-02 12:53:21', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema`
--

CREATE TABLE IF NOT EXISTS `tema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`,`updated_by`,`deleted_by`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Volcar la base de datos para la tabla `tema`
--

INSERT INTO `tema` (`id`, `descripcion`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Recital Vilma Palma', '2011-08-12 14:43:42', 1, '2011-08-12 14:48:44', 1, NULL, NULL),
(2, 'Coctel Empresarial', '2011-08-12 14:43:52', 1, '2011-08-12 14:48:58', 1, NULL, NULL),
(3, 'Desfile de modelos', '2011-08-12 14:44:02', 1, '2011-08-12 14:49:07', 1, NULL, NULL),
(4, 'Fiesta de la Espuma', '2011-08-12 14:44:10', 1, '2011-08-12 14:48:36', 1, NULL, NULL),
(5, 'Bajada con Antorchas', '2011-08-12 14:44:19', 1, '2011-09-01 15:23:51', 1, NULL, NULL),
(10, 'Perro', '2011-09-01 20:26:27', 1, NULL, NULL, NULL, NULL),
(11, 'Animales', '2011-09-01 20:26:27', 1, NULL, NULL, NULL, NULL),
(12, 'Mundial De Surf', '2011-09-01 20:27:43', 1, NULL, NULL, NULL, NULL),
(13, '2009', '2011-09-01 20:27:43', 1, NULL, NULL, NULL, NULL),
(14, 'Kelly Slater', '2011-09-01 20:28:36', 1, NULL, NULL, NULL, NULL),
(15, 'Bajada Nocturna', '2011-09-01 20:35:15', 2, NULL, NULL, NULL, NULL),
(16, 'Salto', '2011-09-01 20:35:46', 2, NULL, NULL, NULL, NULL),
(17, 'Campeonato De Sky 2010', '2011-09-01 20:41:38', 2, NULL, NULL, NULL, NULL),
(18, 'Confederacion Argentina De Sky', '2011-09-01 20:41:38', 2, NULL, NULL, NULL, NULL),
(19, 'Slalom', '2011-09-01 20:41:55', 2, NULL, NULL, NULL, NULL),
(20, 'Snowboard', '2011-09-01 20:42:15', 2, NULL, NULL, NULL, NULL),
(21, 'Esto   Es   Una   Prueba', '2011-09-02 12:53:30', 1, NULL, NULL, '2011-09-02 12:53:36', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) NOT NULL DEFAULT '',
  `contrasena` varchar(255) DEFAULT '',
  `contrasena_updated_at` datetime DEFAULT '0000-00-00 00:00:00',
  `nombre` varchar(255) NOT NULL DEFAULT '',
  `apellido` varchar(255) NOT NULL DEFAULT '',
  `correo` varchar(100) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `rol_id` enum('admin','fotografo') NOT NULL DEFAULT 'admin',
  `comision` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rol` (`rol_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `contrasena`, `contrasena_updated_at`, `nombre`, `apellido`, `correo`, `precio`, `rol_id`, `comision`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'gasoil', 'edde2eca26954653b4e4807c0cb0c336a8ce6d77', '2011-08-03 12:33:29', 'Gaston', 'Mourin', 'gasoil@gmail.com', 40.3, 'admin', 20, NULL, NULL, '2011-08-23 15:34:38', 1, NULL, NULL),
(2, 'groca', '048af53a1581c563a542b67eeec6870d924305ef', '2011-08-03 12:35:38', 'Gabriel', 'Roca', 'groca@hotmail.com', 30.2, 'fotografo', 20, '2011-08-03 12:35:38', 1, '2011-09-20 13:29:16', 3, NULL, NULL),
(3, 'matias', 'dbc6bbe3b711e3f58f25638428fdfc12e34c8c38', '2011-09-14 15:35:18', 'Matias', 'Cullen', 'matiascullen@gmail.com', 20, 'admin', 100, '2011-09-14 15:35:18', 1, NULL, NULL, NULL, NULL),
(4, 'prueba', '711383a59fda05336fd2ccf70c8059d1523eb41a', '2011-09-14 15:36:41', 'Prueba', 'Prueba', 'prueba@prueba.com', 10, 'fotografo', 10, '2011-09-14 15:36:41', 1, '2011-09-14 15:38:59', 1, '2011-09-14 15:39:30', 1);
