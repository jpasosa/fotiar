-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-11-2011 a las 12:11:49
-- Versión del servidor: 5.0.92
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `hormigon_fotiaradm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `busqueda`
--

CREATE TABLE IF NOT EXISTS `busqueda` (
  `id` int(11) NOT NULL auto_increment,
  `usuario_id` int(11) default NULL,
  `categoria_id` int(11) default NULL,
  `subcategoria_id` int(11) default NULL,
  `preciomin` float default NULL,
  `preciomax` float default NULL,
  `fechainicial` datetime default NULL,
  `fechafinal` datetime default NULL,
  `etiquetalugar` varchar(255) default NULL,
  `etiquetatema` varchar(255) default NULL,
  `idetiquetalugar` varchar(255) default NULL,
  `idetiquetatema` varchar(255) default NULL,
  `reviewed` tinyint(1) default NULL,
  `untagged` tinyint(1) default NULL,
  `sesion_id` int(11) default NULL,
  `ordenbusqueda` varchar(100) default NULL,
  `carga_id` int(11) default NULL,
  `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `created_by` int(11) default NULL,
  `updated_at` datetime default NULL,
  `updated_by` int(11) default NULL,
  `deleted_at` datetime default NULL,
  `deleted_by` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `busqueda`
--

INSERT INTO `busqueda` (`id`, `usuario_id`, `categoria_id`, `subcategoria_id`, `preciomin`, `preciomax`, `fechainicial`, `fechafinal`, `etiquetalugar`, `etiquetatema`, `idetiquetalugar`, `idetiquetatema`, `reviewed`, `untagged`, `sesion_id`, `ordenbusqueda`, `carga_id`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, '2011-09-30 23:07:56', 1, NULL, NULL, NULL, NULL),
(6, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, '2011-10-09 22:38:52', 1, NULL, NULL, NULL, NULL),
(7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2011-11-03 22:24:08', 1, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fotografia.taken', NULL, '2011-11-03 22:24:31', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carga`
--

CREATE TABLE IF NOT EXISTS `carga` (
  `id` int(11) NOT NULL auto_increment,
  `usuario_id` int(11) default NULL,
  `fechacarga` varchar(50) default NULL,
  `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `created_by` int(11) default NULL,
  `updated_at` datetime default NULL,
  `updated_by` int(11) default NULL,
  `deleted_at` datetime default NULL,
  `deleted_by` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `carga`
--

INSERT INTO `carga` (`id`, `usuario_id`, `fechacarga`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(7, 1, '30/09/2011 20:07', '2011-09-30 23:07:19', 1, NULL, NULL, NULL, NULL),
(8, 1, '05/10/2011 15:17', '2011-10-05 18:17:21', 1, NULL, NULL, NULL, NULL),
(9, 1, '09/10/2011 19:18', '2011-10-09 22:18:11', 1, NULL, NULL, NULL, NULL),
(10, 1, '09/10/2011 19:22', '2011-10-09 22:22:18', 1, NULL, NULL, NULL, NULL),
(11, 1, '09/10/2011 19:29', '2011-10-09 22:29:12', 1, NULL, NULL, NULL, NULL),
(12, 1, '09/10/2011 19:42', '2011-10-09 22:42:08', 1, NULL, NULL, NULL, NULL),
(13, 1, '09/10/2011 19:53', '2011-10-09 22:53:05', 1, NULL, NULL, NULL, NULL),
(14, 1, '09/10/2011 20:13', '2011-10-09 23:13:58', 1, NULL, NULL, NULL, NULL),
(15, 1, '09/10/2011 20:14', '2011-10-09 23:14:11', 1, NULL, NULL, NULL, NULL),
(16, 1, '09/10/2011 20:15', '2011-10-09 23:15:15', 1, NULL, NULL, NULL, NULL),
(17, 1, '09/10/2011 20:15', '2011-10-09 23:15:22', 1, NULL, NULL, NULL, NULL),
(18, 1, '09/10/2011 20:15', '2011-10-09 23:15:56', 1, NULL, NULL, NULL, NULL),
(19, 1, '09/10/2011 20:23', '2011-10-09 23:23:35', 1, NULL, NULL, NULL, NULL),
(20, 1, '04/11/2011 11:52', '2011-11-04 14:52:26', 1, NULL, NULL, NULL, NULL),
(21, 1, '04/11/2011 11:52', '2011-11-04 14:52:40', 1, NULL, NULL, NULL, NULL),
(22, 1, '04/11/2011 12:10', '2011-11-04 15:10:50', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL auto_increment,
  `descripcion` varchar(255) NOT NULL default '',
  `created_at` datetime default NULL,
  `created_by` int(11) default NULL,
  `updated_at` datetime default NULL,
  `updated_by` int(11) default NULL,
  `deleted_at` datetime default NULL,
  `deleted_by` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `created_by` (`created_by`,`updated_by`,`deleted_by`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `categoria`
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
  `id` int(11) NOT NULL auto_increment,
  `min_letras` int(11) NOT NULL default '0',
  `min_numeros` int(11) NOT NULL default '0',
  `min_simbolos` int(11) NOT NULL default '0',
  `simbolos` varchar(255) default NULL,
  `largo_min` int(11) NOT NULL default '0',
  `largo_max` int(11) NOT NULL default '0',
  `dias_caducidad` int(11) NOT NULL default '0',
  `created_at` datetime NOT NULL default '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL default '0',
  `updated_at` datetime NOT NULL default '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL default '0',
  `deleted_at` datetime NOT NULL default '0000-00-00 00:00:00',
  `deleted_by` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `conf_seguridad`
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
  `id` int(11) NOT NULL auto_increment,
  `descripcion` longtext,
  `nombre_archivo` varchar(255) default NULL,
  `camera` varchar(255) default NULL,
  `model` varchar(255) default NULL,
  `fstop` varchar(255) default NULL,
  `exposuretime` varchar(255) default NULL,
  `isospeed` varchar(255) default NULL,
  `focallength` varchar(255) default NULL,
  `taken` datetime default NULL,
  `mimetype` varchar(255) default NULL,
  `usuario_id` int(11) default NULL,
  `categoria_id` int(11) default NULL,
  `subcategoria_id` int(11) default NULL,
  `sesion_id` int(11) default NULL,
  `carga_id` int(11) default NULL,
  `precio` float default NULL,
  `reviewed` tinyint(1) NOT NULL default '0',
  `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `created_by` int(11) default NULL,
  `updated_at` datetime default NULL,
  `updated_by` int(11) default NULL,
  `deleted_at` datetime default NULL,
  `deleted_by` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `fotografia`
--

INSERT INTO `fotografia` (`id`, `descripcion`, `nombre_archivo`, `camera`, `model`, `fstop`, `exposuretime`, `isospeed`, `focallength`, `taken`, `mimetype`, `usuario_id`, `categoria_id`, `subcategoria_id`, `sesion_id`, `carga_id`, `precio`, `reviewed`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(7, NULL, '1317424062.JPG', 'Canon', 'Canon EOS DIGITAL REBEL XTi', NULL, '1/750', '400', '108/1', '2009-10-09 09:31:13', 'image/jpeg', 1, 1, NULL, NULL, 7, 40.3, 0, '2011-09-30 23:07:43', 1, NULL, NULL, NULL, NULL),
(8, NULL, '1317424069.JPG', 'NIKON CORPORATION', 'NIKON D200', NULL, '10/2500', '800', '280/10', '2008-07-07 10:37:14', 'image/jpeg', 1, 1, NULL, NULL, 7, 40.3, 0, '2011-09-30 23:07:49', 1, NULL, NULL, NULL, NULL),
(9, NULL, '1317424074.JPG', 'Canon', 'Canon EOS REBEL T1i', NULL, '1/500', '200', '70/1', '2011-08-13 15:20:33', 'image/jpeg', 1, 1, NULL, NULL, 7, 40.3, 0, '2011-09-30 23:07:55', 1, NULL, NULL, NULL, NULL),
(10, NULL, '1318199930.jpg', 'Canon', 'Canon PowerShot G3', NULL, '1/8', '', '506/32', '2007-01-12 00:16:48', 'image/jpeg', 1, 1, 2, NULL, 11, 40.3, 0, '2011-10-09 22:38:51', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotografia_frontuser`
--

CREATE TABLE IF NOT EXISTS `fotografia_frontuser` (
  `id` int(11) NOT NULL auto_increment,
  `fotografia_id` int(11) default NULL,
  `sfguarduser_id` int(11) default NULL,
  `status` varchar(8) NOT NULL default 'admin',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotografia_lugar`
--

CREATE TABLE IF NOT EXISTS `fotografia_lugar` (
  `id` int(11) NOT NULL auto_increment,
  `fotografia_id` int(11) default NULL,
  `lugar_id` int(11) default NULL,
  `created_at` datetime default NULL,
  `created_by` int(11) default NULL,
  `updated_at` datetime default NULL,
  `updated_by` int(11) default NULL,
  `deleted_at` datetime default NULL,
  `deleted_by` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotografia_tema`
--

CREATE TABLE IF NOT EXISTS `fotografia_tema` (
  `id` int(11) NOT NULL auto_increment,
  `fotografia_id` int(11) default NULL,
  `tema_id` int(11) default NULL,
  `created_at` datetime default NULL,
  `created_by` int(11) default NULL,
  `updated_at` datetime default NULL,
  `updated_by` int(11) default NULL,
  `deleted_at` datetime default NULL,
  `deleted_by` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar`
--

CREATE TABLE IF NOT EXISTS `lugar` (
  `id` int(11) NOT NULL auto_increment,
  `descripcion` varchar(255) NOT NULL default '',
  `created_at` datetime default NULL,
  `created_by` int(11) default NULL,
  `updated_at` datetime default NULL,
  `updated_by` int(11) default NULL,
  `deleted_at` datetime default NULL,
  `deleted_by` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `created_by` (`created_by`,`updated_by`,`deleted_by`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `lugar`
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
-- Estructura de tabla para la tabla `migration_version`
--

CREATE TABLE IF NOT EXISTS `migration_version` (
  `version` int(11) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `migration_version`
--

INSERT INTO `migration_version` (`version`) VALUES
(3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `id` varchar(50) NOT NULL default '',
  `descripcion` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `descripcion`) VALUES
('admin', 'Administrador'),
('fotografo', 'Fotógrafo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE IF NOT EXISTS `sesion` (
  `id` int(11) NOT NULL auto_increment,
  `descripcion` varchar(255) NOT NULL default '',
  `usuario_id` int(11) default NULL,
  `created_at` datetime default NULL,
  `created_by` int(11) default NULL,
  `updated_at` datetime default NULL,
  `updated_by` int(11) default NULL,
  `deleted_at` datetime default NULL,
  `deleted_by` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `created_by` (`created_by`,`updated_by`,`deleted_by`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sf_guard_forgot_password`
--

CREATE TABLE IF NOT EXISTS `sf_guard_forgot_password` (
  `id` bigint(20) NOT NULL auto_increment,
  `user_id` bigint(20) NOT NULL,
  `unique_key` varchar(255) default NULL,
  `expires_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sf_guard_group`
--

CREATE TABLE IF NOT EXISTS `sf_guard_group` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sf_guard_group_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_group_permission` (
  `group_id` bigint(20) NOT NULL default '0',
  `permission_id` bigint(20) NOT NULL default '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`group_id`,`permission_id`),
  KEY `sf_guard_group_permission_permission_id_sf_guard_permission_id` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sf_guard_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_permission` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sf_guard_remember_key`
--

CREATE TABLE IF NOT EXISTS `sf_guard_remember_key` (
  `id` bigint(20) NOT NULL auto_increment,
  `user_id` bigint(20) default NULL,
  `remember_key` varchar(32) default NULL,
  `ip_address` varchar(50) default NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sf_guard_user`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user` (
  `id` bigint(20) NOT NULL auto_increment,
  `first_name` varchar(255) default NULL,
  `last_name` varchar(255) default NULL,
  `email_address` varchar(255) NOT NULL,
  `username` varchar(128) NOT NULL,
  `algorithm` varchar(128) NOT NULL default 'sha1',
  `salt` varchar(128) default NULL,
  `password` varchar(128) default NULL,
  `is_active` tinyint(1) default '1',
  `is_super_admin` tinyint(1) default '0',
  `last_login` datetime default NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `email_address` (`email_address`),
  UNIQUE KEY `username` (`username`),
  KEY `is_active_idx_idx` (`is_active`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `sf_guard_user`
--

INSERT INTO `sf_guard_user` (`id`, `first_name`, `last_name`, `email_address`, `username`, `algorithm`, `salt`, `password`, `is_active`, `is_super_admin`, `last_login`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'danilus@gmail.com', 'danilo', 'sha1', '61018c5093389fd350a0d49487fc658d', '9215b73a42b2758a34467fdd81e087abc4cae183', 1, 0, '2011-11-04 05:06:06', '2011-10-28 18:16:47', '2011-11-04 05:06:06'),
(2, NULL, NULL, 'gmourin@gmail.com', 'gasoil', 'sha1', '3f06ab65159428f0452b6e262ebb16cf', '1b080ed28f96d9bac50e160ebb388bbb22c8abd6', 0, 0, NULL, '2011-11-04 09:18:52', '2011-11-04 09:18:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sf_guard_user_group`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user_group` (
  `user_id` bigint(20) NOT NULL default '0',
  `group_id` bigint(20) NOT NULL default '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`user_id`,`group_id`),
  KEY `sf_guard_user_group_group_id_sf_guard_group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sf_guard_user_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user_permission` (
  `user_id` bigint(20) NOT NULL default '0',
  `permission_id` bigint(20) NOT NULL default '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`user_id`,`permission_id`),
  KEY `sf_guard_user_permission_permission_id_sf_guard_permission_id` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sf_guard_user_profile`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user_profile` (
  `id` bigint(20) NOT NULL auto_increment,
  `user_id` bigint(20) NOT NULL,
  `email_new` varchar(255) default NULL,
  `firstname` varchar(255) default NULL,
  `lastname` varchar(255) default NULL,
  `validate_at` datetime default NULL,
  `validate` varchar(33) default NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  UNIQUE KEY `email_new` (`email_new`),
  KEY `validate_idx` (`validate`),
  KEY `sf_guard_user_profile_user_id_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `sf_guard_user_profile`
--

INSERT INTO `sf_guard_user_profile` (`id`, `user_id`, `email_new`, `firstname`, `lastname`, `validate_at`, `validate`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Danilo', 'Frid', NULL, NULL, '2011-10-28 18:16:48', '2011-10-28 18:32:03'),
(2, 2, NULL, 'Gaston', 'Mourin', '2011-11-04 09:18:52', 'nf4962c1f488e124b32a69c7d446e723b', '2011-11-04 09:18:52', '2011-11-04 09:18:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE IF NOT EXISTS `subcategoria` (
  `id` int(11) NOT NULL auto_increment,
  `categoria_id` int(11) default NULL,
  `descripcion` varchar(255) NOT NULL default '',
  `created_at` datetime default NULL,
  `created_by` int(11) default NULL,
  `updated_at` datetime default NULL,
  `updated_by` int(11) default NULL,
  `deleted_at` datetime default NULL,
  `deleted_by` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `created_by` (`created_by`,`updated_by`,`deleted_by`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `subcategoria`
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
  `id` int(11) NOT NULL auto_increment,
  `descripcion` varchar(255) NOT NULL default '',
  `created_at` datetime default NULL,
  `created_by` int(11) default NULL,
  `updated_at` datetime default NULL,
  `updated_by` int(11) default NULL,
  `deleted_at` datetime default NULL,
  `deleted_by` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `created_by` (`created_by`,`updated_by`,`deleted_by`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `tema`
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
  `id` int(11) NOT NULL auto_increment,
  `usuario` varchar(255) NOT NULL default '',
  `contrasena` varchar(255) default '',
  `contrasena_updated_at` datetime default '0000-00-00 00:00:00',
  `nombre` varchar(255) NOT NULL default '',
  `apellido` varchar(255) NOT NULL default '',
  `correo` varchar(100) default NULL,
  `precio` float default NULL,
  `rol_id` enum('admin','fotografo') NOT NULL default 'admin',
  `comision` float default NULL,
  `created_at` datetime default NULL,
  `created_by` int(11) default NULL,
  `updated_at` datetime default NULL,
  `updated_by` int(11) default NULL,
  `deleted_at` datetime default NULL,
  `deleted_by` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `rol` (`rol_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `contrasena`, `contrasena_updated_at`, `nombre`, `apellido`, `correo`, `precio`, `rol_id`, `comision`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'gasoil', 'edde2eca26954653b4e4807c0cb0c336a8ce6d77', '2011-08-03 12:33:29', 'Gaston', 'Mourin', 'gasoil@gmail.com', 40.3, 'admin', 20, NULL, NULL, '2011-08-23 15:34:38', 1, NULL, NULL),
(2, 'groca', '048af53a1581c563a542b67eeec6870d924305ef', '2011-08-03 12:35:38', 'Gabriel', 'Roca', 'groca@hotmail.com', 30.2, 'fotografo', 20, '2011-08-03 12:35:38', 1, '2011-09-20 13:29:16', 3, NULL, NULL),
(3, 'matias', 'dbc6bbe3b711e3f58f25638428fdfc12e34c8c38', '2011-09-14 15:35:18', 'Matias', 'Cullen', 'matiascullen@gmail.com', 20, 'admin', 100, '2011-09-14 15:35:18', 1, NULL, NULL, NULL, NULL),
(4, 'prueba', '711383a59fda05336fd2ccf70c8059d1523eb41a', '2011-09-14 15:36:41', 'Prueba', 'Prueba', 'prueba@prueba.com', 10, 'fotografo', 10, '2011-09-14 15:36:41', 1, '2011-09-14 15:38:59', 1, '2011-09-14 15:39:30', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `sf_guard_forgot_password`
--
ALTER TABLE `sf_guard_forgot_password`
  ADD CONSTRAINT `sf_guard_forgot_password_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sf_guard_group_permission`
--
ALTER TABLE `sf_guard_group_permission`
  ADD CONSTRAINT `sf_guard_group_permission_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_group_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sf_guard_remember_key`
--
ALTER TABLE `sf_guard_remember_key`
  ADD CONSTRAINT `sf_guard_remember_key_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sf_guard_user_group`
--
ALTER TABLE `sf_guard_user_group`
  ADD CONSTRAINT `sf_guard_user_group_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_group_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sf_guard_user_permission`
--
ALTER TABLE `sf_guard_user_permission`
  ADD CONSTRAINT `sf_guard_user_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_permission_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sf_guard_user_profile`
--
ALTER TABLE `sf_guard_user_profile`
  ADD CONSTRAINT `sf_guard_user_profile_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
