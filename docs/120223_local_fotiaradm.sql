-- phpMyAdmin SQL Dump
-- version 3.3.2deb1ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 23, 2012 at 05:13 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.2-1ubuntu4.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fotiaradm`
--

-- --------------------------------------------------------

--
-- Table structure for table `busqueda`
--

CREATE TABLE IF NOT EXISTS `busqueda` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `usuario_id` bigint(20) DEFAULT NULL,
  `categoria_id` bigint(20) DEFAULT NULL,
  `subcategoria_id` bigint(20) DEFAULT NULL,
  `preciomin` float(18,2) DEFAULT NULL,
  `preciomax` float(18,2) DEFAULT NULL,
  `fechainicial` datetime DEFAULT NULL,
  `fechafinal` datetime DEFAULT NULL,
  `etiquetalugar` varchar(255) DEFAULT NULL,
  `etiquetatema` varchar(255) DEFAULT NULL,
  `idetiquetalugar` varchar(255) DEFAULT NULL,
  `idetiquetatema` varchar(255) DEFAULT NULL,
  `reviewed` tinyint(4) DEFAULT NULL,
  `untagged` tinyint(4) DEFAULT NULL,
  `sesion_id` bigint(20) DEFAULT NULL,
  `ordenbusqueda` varchar(100) DEFAULT NULL,
  `carga_id` bigint(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `busqueda`
--

INSERT INTO `busqueda` (`id`, `usuario_id`, `categoria_id`, `subcategoria_id`, `preciomin`, `preciomax`, `fechainicial`, `fechafinal`, `etiquetalugar`, `etiquetatema`, `idetiquetalugar`, `idetiquetatema`, `reviewed`, `untagged`, `sesion_id`, `ordenbusqueda`, `carga_id`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2012-02-21 16:52:02', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carga`
--

CREATE TABLE IF NOT EXISTS `carga` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `usuario_id` bigint(20) NOT NULL,
  `fechacarga` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `carga`
--

INSERT INTO `carga` (`id`, `usuario_id`, `fechacarga`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 1, '21/02/2012 16:51', '2012-02-21 16:51:41', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id`, `descripcion`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Castor 2011', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Catedral', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Surf', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Turismo Aventura', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Skate', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Prueba 6', NULL, NULL, NULL, NULL, '2012-01-12 14:13:35', 1),
(7, 'Prueba Sechi', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Familias', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Varios', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `conf_seguridad`
--

CREATE TABLE IF NOT EXISTS `conf_seguridad` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `conf_seguridad`
--


-- --------------------------------------------------------

--
-- Table structure for table `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `caption` varchar(128) DEFAULT NULL,
  `nombre_archivo_es` varchar(255) DEFAULT NULL,
  `nombre_archivo_pt` varchar(255) DEFAULT NULL,
  `nombre_archivo_en` varchar(255) DEFAULT NULL,
  `nombre_icono` varchar(255) DEFAULT NULL,
  `categoria_id` bigint(20) DEFAULT NULL,
  `subcategoria_id` bigint(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categoria_id_idx` (`categoria_id`),
  KEY `subcategoria_id_idx` (`subcategoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `evento`
--

INSERT INTO `evento` (`id`, `caption`, `nombre_archivo_es`, `nombre_archivo_pt`, `nombre_archivo_en`, `nombre_icono`, `categoria_id`, `subcategoria_id`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Esqui', 'evento1_es.jpg', 'evento1_pt.jpg', 'evento1_en.jpg', 'icono1.png', 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Surf', 'evento2_es.jpg', 'evento2_pt.jpg', 'evento2_en.jpg', 'icono2.png', 1, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Castor 2010', 'evento3_es.jpg', 'evento3_pt.jpg', 'evento3_en.jpg', 'icono3.png', 2, 6, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Castor 2011', 'evento4_es.jpg', 'evento4_pt.jpg', 'evento4_en.jpg', 'icono4.png', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fotografia`
--

CREATE TABLE IF NOT EXISTS `fotografia` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `descripcion` text,
  `nombre_archivo` varchar(255) DEFAULT NULL,
  `camera` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `fstop` varchar(255) DEFAULT NULL,
  `exposuretime` varchar(255) DEFAULT NULL,
  `isospeed` varchar(255) DEFAULT NULL,
  `focallength` varchar(255) DEFAULT NULL,
  `taken` datetime DEFAULT NULL,
  `mimetype` varchar(255) DEFAULT NULL,
  `usuario_id` bigint(20) NOT NULL,
  `categoria_id` bigint(20) DEFAULT NULL,
  `subcategoria_id` bigint(20) DEFAULT NULL,
  `sesion_id` bigint(20) DEFAULT NULL,
  `carga_id` bigint(20) DEFAULT NULL,
  `precio` float(18,2) DEFAULT NULL,
  `reviewed` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id_idx` (`usuario_id`),
  KEY `categoria_id_idx` (`categoria_id`),
  KEY `subcategoria_id_idx` (`subcategoria_id`),
  KEY `sesion_id_idx` (`sesion_id`),
  KEY `carga_id_idx` (`carga_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `fotografia`
--

INSERT INTO `fotografia` (`id`, `descripcion`, `nombre_archivo`, `camera`, `model`, `fstop`, `exposuretime`, `isospeed`, `focallength`, `taken`, `mimetype`, `usuario_id`, `categoria_id`, `subcategoria_id`, `sesion_id`, `carga_id`, `precio`, `reviewed`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, NULL, '1317424062.JPG', 'Canon', 'Canon EOS DIGITAL REBEL XTi', NULL, '1/750', '400', '108/1', '2009-10-09 09:31:13', 'image/jpeg', 3, 1, 2, NULL, NULL, 5.10, 0, '2009-10-09 09:31:13', NULL, NULL, NULL, NULL, NULL),
(2, NULL, '1317424069.JPG', 'NIKON CORPORATION', 'NIKON D200', NULL, '1/2500', '800', '280/10', '2008-07-07 10:37:14', 'image/jpeg', 3, 1, 2, NULL, NULL, 5.10, 0, '2008-07-07 10:37:14', NULL, NULL, NULL, NULL, NULL),
(3, NULL, '1317424074.JPG', 'Canon', 'Canon EOS REBEL T1i', NULL, '1/500', '200', '70/1', '2011-08-13 15:20:33', 'image/jpeg', 2, 1, NULL, NULL, NULL, 5.10, 0, '2011-08-13 15:20:33', NULL, NULL, NULL, NULL, NULL),
(4, NULL, '1320767316.jpg', 'Canon', 'Canon EOS REBEL T1i', NULL, '1/500', '200', '70/1', '2011-08-13 15:20:33', 'image/jpeg', 2, 9, 10, NULL, NULL, 5.10, 0, '2011-08-13 15:20:33', NULL, NULL, NULL, NULL, NULL),
(5, NULL, '1315931001.jpg', 'Canon', 'Canon EOS REBEL T1i', NULL, '1/500', '200', '70/1', '2011-08-13 15:20:33', 'image/jpeg', 2, 9, NULL, NULL, NULL, 5.10, 0, '2011-08-13 15:20:33', NULL, NULL, NULL, NULL, NULL),
(6, NULL, '1315931395.jpg', 'Canon', 'Canon EOS REBEL T1i', NULL, '1/500', '200', '70/1', '2011-08-13 15:20:33', 'image/jpeg', 2, 9, NULL, NULL, NULL, 5.10, 0, '2011-08-13 15:20:33', NULL, NULL, NULL, NULL, NULL),
(7, NULL, '1320418436.jpg', 'Canon', 'Canon EOS REBEL T1i', NULL, '1/500', '200', '70/1', '2011-08-13 15:20:33', 'image/jpeg', 2, 9, NULL, NULL, NULL, 5.10, 0, '2011-08-13 15:20:33', NULL, NULL, NULL, NULL, NULL),
(8, NULL, '1318203106.jpg', 'Canon', 'Canon EOS REBEL T1i', NULL, '1/500', '200', '70/1', '2011-08-13 15:20:33', 'image/jpeg', 2, 9, NULL, NULL, NULL, 5.10, 0, '2011-08-13 15:20:33', NULL, NULL, NULL, NULL, NULL),
(9, NULL, '1.31742083308E+13.JPG', 'Canon', 'Canon EOS REBEL T1i', NULL, '1/500', '200', '70/1', '2011-08-13 15:20:33', 'image/jpeg', 2, 9, NULL, NULL, NULL, 5.10, 0, '2011-08-13 15:20:33', NULL, NULL, NULL, NULL, NULL),
(10, NULL, '1318283109.jpg', 'Canon', 'Canon EOS REBEL T1i', NULL, '1/500', '200', '70/1', '2011-08-13 15:20:33', 'image/jpeg', 2, 9, NULL, NULL, NULL, 5.10, 0, '2011-08-13 15:20:33', NULL, NULL, NULL, NULL, NULL),
(11, NULL, '1320767317.jpg', 'Canon', 'Canon EOS REBEL T1i', NULL, '1/500', '200', '70/1', '2011-08-13 15:20:33', 'image/jpeg', 2, 9, NULL, NULL, NULL, 5.10, 0, '2011-08-13 15:20:33', NULL, NULL, NULL, NULL, NULL),
(12, NULL, '1320418962.jpg', 'Canon', 'Canon EOS REBEL T1i', NULL, '1/500', '200', '70/1', '2011-08-13 15:20:33', 'image/jpeg', 2, 9, NULL, NULL, NULL, 5.10, 0, '2011-08-13 15:20:33', NULL, NULL, NULL, NULL, NULL),
(13, NULL, '1320419043.jpg', 'Canon', 'Canon EOS REBEL T1i', NULL, '1/500', '200', '70/1', '2011-08-13 15:20:33', 'image/jpeg', 2, 9, NULL, NULL, NULL, 5.10, 0, '2011-08-13 15:20:33', NULL, NULL, NULL, NULL, NULL),
(14, NULL, '1400000000.jpg', 'Canon', 'Canon EOS REBEL T1i', NULL, '1/500', '200', '70/1', '2011-08-13 15:20:33', 'image/jpeg', 2, 9, NULL, NULL, NULL, 5.10, 0, '2011-08-13 15:20:33', NULL, NULL, NULL, NULL, NULL),
(15, NULL, '15.jpg', 'Canon', 'Canon EOS REBEL T1i', NULL, '1/500', '200', '70/1', '2011-08-13 15:20:33', 'image/jpeg', 2, 9, NULL, NULL, NULL, 5.10, 0, '2011-08-13 15:20:33', NULL, NULL, NULL, NULL, NULL),
(16, NULL, '16.jpg', 'Canon', 'Canon EOS REBEL T1i', NULL, '1/500', '200', '70/1', '2011-08-13 15:20:33', 'image/jpeg', 2, 9, NULL, NULL, NULL, 5.10, 0, '2011-08-13 15:20:33', NULL, NULL, NULL, NULL, NULL),
(17, NULL, '17.jpg', 'Canon', 'Canon EOS REBEL T1i', NULL, '1/500', '200', '70/1', '2011-08-13 15:20:33', 'image/jpeg', 2, 9, NULL, NULL, NULL, 5.10, 0, '2011-08-13 15:20:33', NULL, NULL, NULL, NULL, NULL),
(18, NULL, '18.jpg', 'Canon', 'Canon EOS REBEL T1i', NULL, '1/500', '200', '70/1', '2011-08-13 15:20:33', 'image/jpeg', 2, 9, NULL, NULL, NULL, 5.10, 0, '2011-08-13 15:20:33', NULL, NULL, NULL, NULL, NULL),
(19, NULL, '19.jpg', 'Canon', 'Canon EOS REBEL T1i', NULL, '1/500', '200', '70/1', '2011-08-13 15:20:33', 'image/jpeg', 2, 9, NULL, NULL, NULL, 5.10, 0, '2011-08-13 15:20:33', NULL, NULL, NULL, NULL, NULL),
(20, NULL, '20.jpg', 'Canon', 'Canon EOS REBEL T1i', NULL, '1/500', '200', '70/1', '2011-08-13 15:20:33', 'image/jpeg', 2, 9, NULL, NULL, NULL, 5.10, 0, '2011-08-13 15:20:33', NULL, NULL, NULL, NULL, NULL),
(21, NULL, '21.jpg', 'Canon', 'Canon EOS REBEL T1i', NULL, '1/500', '200', '70/1', '2011-08-13 15:20:33', 'image/jpeg', 2, 9, NULL, NULL, NULL, 5.10, 0, '2011-08-13 15:20:33', NULL, NULL, NULL, NULL, NULL),
(22, NULL, '22.jpg', 'Canon', 'Canon EOS REBEL T1i', NULL, '1/500', '200', '70/1', '2011-08-13 15:20:33', 'image/jpeg', 2, 9, NULL, NULL, NULL, 5.10, 0, '2011-08-13 15:20:33', NULL, NULL, NULL, NULL, NULL),
(23, NULL, '23.jpg', 'Canon', 'Canon EOS REBEL T1i', NULL, '1/500', '200', '70/1', '2011-08-13 15:20:33', 'image/jpeg', 2, 9, NULL, NULL, NULL, 5.10, 0, '2011-08-13 15:20:33', NULL, NULL, NULL, NULL, NULL),
(24, NULL, '24.jpg', 'Canon', 'Canon EOS REBEL T1i', NULL, '1/500', '200', '70/1', '2011-08-13 15:20:33', 'image/jpeg', 2, 9, NULL, NULL, NULL, 5.10, 0, '2011-08-13 15:20:33', NULL, NULL, NULL, NULL, NULL),
(25, NULL, '25.jpg', 'Canon', 'Canon EOS REBEL T1i', NULL, '1/500', '200', '70/1', '2011-08-13 15:20:33', 'image/jpeg', 2, 9, NULL, NULL, NULL, 5.10, 0, '2011-08-13 15:20:33', NULL, NULL, NULL, NULL, NULL),
(26, NULL, '1320766073.jpg', 'Canon', 'Canon EOS REBEL T1i', NULL, '1/500', '200', '70/1', '2010-02-08 15:20:33', 'image/jpeg', 2, 8, NULL, 2, NULL, 5.10, 0, '2010-02-08 15:20:33', NULL, NULL, NULL, NULL, NULL),
(27, NULL, '1320766074.jpg', 'Canon', 'Canon EOS REBEL T1i', NULL, '1/500', '200', '70/1', '2010-02-08 15:20:33', 'image/jpeg', 2, 8, NULL, 2, NULL, 5.10, 0, '2010-02-08 15:20:33', NULL, NULL, NULL, NULL, NULL),
(28, NULL, '1329853922338.jpg', '', '', NULL, '', '', '', '0000-00-00 00:00:00', '', 1, 1, 2, NULL, 1, 40.30, 0, NULL, NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fotografia_lugar`
--

CREATE TABLE IF NOT EXISTS `fotografia_lugar` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fotografia_id` bigint(20) NOT NULL,
  `lugar_id` bigint(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lugar_id_idx` (`lugar_id`),
  KEY `fotografia_id_idx` (`fotografia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fotografia_lugar`
--


-- --------------------------------------------------------

--
-- Table structure for table `fotografia_tema`
--

CREATE TABLE IF NOT EXISTS `fotografia_tema` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fotografia_id` bigint(20) NOT NULL,
  `tema_id` bigint(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tema_id_idx` (`tema_id`),
  KEY `fotografia_id_idx` (`fotografia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fotografia_tema`
--


-- --------------------------------------------------------

--
-- Table structure for table `lugar`
--

CREATE TABLE IF NOT EXISTS `lugar` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `lugar`
--

INSERT INTO `lugar` (`id`, `descripcion`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Monte Olivo', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Rafael Castillo', NULL, NULL, NULL, NULL, '2012-01-12 14:57:47', 1),
(3, 'Villa Dalmine', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Espeleta', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Brandsen', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Castor', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Paternal', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Almagro', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Caballito', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Flores', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Villa Gessel', NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Villa Urquiza', NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Brasil', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) DEFAULT 'draft',
  `external_reference` varchar(20) DEFAULT NULL,
  `preference_id` varchar(20) DEFAULT NULL,
  `is_pagado` tinyint(1) DEFAULT '0',
  `user_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pedido`
--

INSERT INTO `pedido` (`id`, `status`, `external_reference`, `preference_id`, `is_pagado`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'stable', '2-1324510127', 'd03ecba4-6fb6-4405-9', 1, 2, '2011-12-21 20:28:47', '2011-12-21 20:31:08'),
(2, 'stable', '2-1324510335', 'f16998b1-e853-4fc2-a', 1, 2, '2011-12-21 20:32:15', '2011-12-21 20:49:49'),
(3, 'stable', '2-1324511408', '8f4117ce-a92f-4b37-8', 0, 2, '2011-12-21 20:50:08', '2011-12-21 21:22:05'),
(4, 'draft', '2-1324513345', '5f0342a6-fc8d-460a-a', 0, 2, '2011-12-21 21:22:25', '2012-02-21 19:21:55'),
(5, 'draft', '3-1326392735', NULL, 0, 3, '2012-01-12 15:25:35', '2012-01-12 15:25:35');

-- --------------------------------------------------------

--
-- Table structure for table `pedido_item`
--

CREATE TABLE IF NOT EXISTS `pedido_item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pedido_id` bigint(20) NOT NULL,
  `fotografia_id` bigint(20) NOT NULL,
  `precio` float(18,2) NOT NULL,
  `comision` float(18,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pedido_id_idx` (`pedido_id`),
  KEY `fotografia_id_idx` (`fotografia_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pedido_item`
--

INSERT INTO `pedido_item` (`id`, `pedido_id`, `fotografia_id`, `precio`, `comision`) VALUES
(1, 1, 5, 5.10, 10.00),
(2, 1, 7, 5.10, 10.00),
(3, 1, 8, 5.10, 10.00),
(4, 2, 20, 5.10, 10.00),
(5, 3, 10, 5.10, 10.00),
(7, 4, 17, 5.10, 10.00);

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `id` varchar(255) NOT NULL DEFAULT '',
  `descripcion` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`id`, `descripcion`) VALUES
('admin', 'Administrador'),
('fotografo', 'Fotógrafo');

-- --------------------------------------------------------

--
-- Table structure for table `sesion`
--

CREATE TABLE IF NOT EXISTS `sesion` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL DEFAULT '',
  `usuario_id` bigint(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id_idx` (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sesion`
--

INSERT INTO `sesion` (`id`, `descripcion`, `usuario_id`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'sesion1', 3, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'simon', 2, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_forgot_password`
--

CREATE TABLE IF NOT EXISTS `sf_guard_forgot_password` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `unique_key` varchar(255) DEFAULT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sf_guard_forgot_password`
--


-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_group`
--

CREATE TABLE IF NOT EXISTS `sf_guard_group` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sf_guard_group`
--

INSERT INTO `sf_guard_group` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator group', '2011-12-21 19:33:50', '2011-12-21 19:33:50');

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_group_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_group_permission` (
  `group_id` bigint(20) NOT NULL DEFAULT '0',
  `permission_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`group_id`,`permission_id`),
  KEY `sf_guard_group_permission_permission_id_sf_guard_permission_id` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_guard_group_permission`
--

INSERT INTO `sf_guard_group_permission` (`group_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2011-12-21 19:33:50', '2011-12-21 19:33:50');

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_permission` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sf_guard_permission`
--

INSERT INTO `sf_guard_permission` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator permission', '2011-12-21 19:33:50', '2011-12-21 19:33:50');

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_remember_key`
--

CREATE TABLE IF NOT EXISTS `sf_guard_remember_key` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `remember_key` varchar(32) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sf_guard_remember_key`
--


-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_user`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) NOT NULL,
  `username` varchar(128) NOT NULL,
  `algorithm` varchar(128) NOT NULL DEFAULT 'sha1',
  `salt` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_super_admin` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_address` (`email_address`),
  UNIQUE KEY `username` (`username`),
  KEY `is_active_idx_idx` (`is_active`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sf_guard_user`
--

INSERT INTO `sf_guard_user` (`id`, `first_name`, `last_name`, `email_address`, `username`, `algorithm`, `salt`, `password`, `is_active`, `is_super_admin`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'John', 'Doe', 'john.doe@gmail.com', 'admin', 'sha1', '121de753f3192e16d4b868f79f144bd2', '53cb5a77e419055215c7ecc1222fd533d33fd94c', 1, 1, NULL, '2011-12-21 19:33:51', '2011-12-21 19:33:51'),
(2, 'Danilo', 'Frid', 'danilus@gmail.com', 'danilo', 'sha1', 'c085883c005cb2f8edce51583b6b89ae', '851cb9316e725905e86720287f1bca47e327b115', 1, 0, '2012-02-23 17:09:19', '2011-12-21 19:33:51', '2012-02-23 17:09:19'),
(3, NULL, NULL, 'democrito.sabe@gmail.com', 'democrito.sabe@gmail.com', 'sha1', 'efbb6687f5711ed302a7788d562a93af', '4bdf0b2636c72e89102327deed47ebb9be31a631', 1, 0, '2012-01-12 18:49:28', '2012-01-12 15:24:41', '2012-01-12 18:49:28');

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_user_group`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user_group` (
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `group_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `sf_guard_user_group_group_id_sf_guard_group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_guard_user_group`
--

INSERT INTO `sf_guard_user_group` (`user_id`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2011-12-21 19:33:51', '2011-12-21 19:33:51'),
(2, 1, '2011-12-21 19:33:51', '2011-12-21 19:33:51');

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_user_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user_permission` (
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `permission_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `sf_guard_user_permission_permission_id_sf_guard_permission_id` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_guard_user_permission`
--


-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_user_profile`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user_profile` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `email_new` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `validate_at` datetime DEFAULT NULL,
  `validate` varchar(33) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `birthdate` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  UNIQUE KEY `email_new` (`email_new`),
  KEY `validate_idx` (`validate`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sf_guard_user_profile`
--

INSERT INTO `sf_guard_user_profile` (`id`, `user_id`, `email_new`, `firstname`, `lastname`, `validate_at`, `validate`, `country`, `city`, `address`, `phone`, `birthdate`, `created_at`, `updated_at`) VALUES
(1, 2, 'danilus@gmail.com', 'Danilo', 'Frid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2011-12-21 19:33:52', '2011-12-21 19:33:52'),
(2, 3, NULL, '', '', NULL, NULL, '', '', '', '', '2012-01-12 00:00:00', '2012-01-12 15:24:41', '2012-01-12 15:25:35');

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_user_profile_fotografia`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user_profile_fotografia` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fotografia_id` bigint(20) NOT NULL,
  `sf_guard_user_profile_id` bigint(20) NOT NULL,
  `status` varchar(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fotografia_id_idx` (`fotografia_id`),
  KEY `sf_guard_user_profile_id_idx` (`sf_guard_user_profile_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `sf_guard_user_profile_fotografia`
--

INSERT INTO `sf_guard_user_profile_fotografia` (`id`, `fotografia_id`, `sf_guard_user_profile_id`, `status`) VALUES
(1, 5, 1, 'favorita'),
(3, 8, 1, 'favorita'),
(4, 17, 1, 'favorita'),
(5, 20, 1, 'favorita'),
(6, 10, 1, 'favorita'),
(7, 9, 1, 'papelera'),
(8, 4, 1, 'favorita'),
(9, 12, 1, 'favorita'),
(10, 15, 1, 'favorita'),
(11, 24, 1, 'favorita'),
(12, 11, 1, 'favorita'),
(13, 19, 1, 'favorita'),
(14, 22, 1, 'favorita'),
(15, 16, 1, 'favorita'),
(16, 3, 1, 'favorita');

-- --------------------------------------------------------

--
-- Table structure for table `subcategoria`
--

CREATE TABLE IF NOT EXISTS `subcategoria` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `categoria_id` bigint(20) NOT NULL,
  `descripcion` varchar(255) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categoria_id_idx` (`categoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `subcategoria`
--

INSERT INTO `subcategoria` (`id`, `categoria_id`, `descripcion`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 1, 'Pose', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, 'Accion', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, 'Paisaje', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 2, 'Pose', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 2, 'Accion', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 2, 'Paisaje', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 3, 'subcat x', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 3, 'subcat y', NULL, NULL, NULL, NULL, '2012-01-12 14:52:22', 1),
(9, 3, 'subcat z', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 9, 'perro', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tema`
--

CREATE TABLE IF NOT EXISTS `tema` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tema`
--

INSERT INTO `tema` (`id`, `descripcion`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Recital Vilma Palma', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Coctel Empresarial', NULL, NULL, NULL, NULL, '2012-01-12 14:55:26', 1),
(3, 'Desfile de modelos', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Fiesta de la Espuma', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Bajada con Antorchas', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Perro', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Animales', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Mundial De Surf', NULL, NULL, NULL, NULL, NULL, NULL),
(9, '2009', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Kelly Slater', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Bajada Nocturna', NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Salto', NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Campeonato De Sky 2010', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) NOT NULL DEFAULT '',
  `contrasena` varchar(255) DEFAULT NULL,
  `contrasena_updated_at` datetime DEFAULT '0000-00-00 00:00:00',
  `nombre` varchar(255) NOT NULL DEFAULT '',
  `apellido` varchar(255) NOT NULL DEFAULT '',
  `correo` varchar(100) DEFAULT NULL,
  `precio` float(18,2) DEFAULT NULL,
  `rol_id` varchar(9) NOT NULL DEFAULT 'admin',
  `comision` float(18,2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `contrasena`, `contrasena_updated_at`, `nombre`, `apellido`, `correo`, `precio`, `rol_id`, `comision`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'gasoil', 'edde2eca26954653b4e4807c0cb0c336a8ce6d77', '0000-00-00 00:00:00', 'Gaston', 'Mourin', 'gasoil@gmail.com', 40.30, 'admin', 20.00, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'fotografo x', 'dc724af18fbdd4e59189f5fe768a5f8311527050', '0000-00-00 00:00:00', 'Francisco', 'García', 'francisco.garcia.12345@gmail.com', 32.70, 'fotografo', 10.00, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'groca', 'dc724af18fbdd4e59189f5fe768a5f8311527050', '0000-00-00 00:00:00', 'Gabriel', 'Roca', 'groca@hotmail.com', 30.20, 'fotografo', 20.00, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_categoria_id_categoria_id` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `evento_subcategoria_id_subcategoria_id` FOREIGN KEY (`subcategoria_id`) REFERENCES `subcategoria` (`id`);

--
-- Constraints for table `fotografia`
--
ALTER TABLE `fotografia`
  ADD CONSTRAINT `fotografia_carga_id_carga_id` FOREIGN KEY (`carga_id`) REFERENCES `carga` (`id`),
  ADD CONSTRAINT `fotografia_categoria_id_categoria_id` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `fotografia_sesion_id_sesion_id` FOREIGN KEY (`sesion_id`) REFERENCES `sesion` (`id`),
  ADD CONSTRAINT `fotografia_subcategoria_id_subcategoria_id` FOREIGN KEY (`subcategoria_id`) REFERENCES `subcategoria` (`id`),
  ADD CONSTRAINT `fotografia_usuario_id_usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Constraints for table `fotografia_lugar`
--
ALTER TABLE `fotografia_lugar`
  ADD CONSTRAINT `fotografia_lugar_fotografia_id_fotografia_id` FOREIGN KEY (`fotografia_id`) REFERENCES `fotografia` (`id`),
  ADD CONSTRAINT `fotografia_lugar_lugar_id_lugar_id` FOREIGN KEY (`lugar_id`) REFERENCES `lugar` (`id`);

--
-- Constraints for table `fotografia_tema`
--
ALTER TABLE `fotografia_tema`
  ADD CONSTRAINT `fotografia_tema_fotografia_id_fotografia_id` FOREIGN KEY (`fotografia_id`) REFERENCES `fotografia` (`id`),
  ADD CONSTRAINT `fotografia_tema_tema_id_tema_id` FOREIGN KEY (`tema_id`) REFERENCES `tema` (`id`);

--
-- Constraints for table `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pedido_item`
--
ALTER TABLE `pedido_item`
  ADD CONSTRAINT `pedido_item_fotografia_id_fotografia_id` FOREIGN KEY (`fotografia_id`) REFERENCES `fotografia` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pedido_item_pedido_id_pedido_id` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sesion`
--
ALTER TABLE `sesion`
  ADD CONSTRAINT `sesion_usuario_id_usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Constraints for table `sf_guard_forgot_password`
--
ALTER TABLE `sf_guard_forgot_password`
  ADD CONSTRAINT `sf_guard_forgot_password_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_group_permission`
--
ALTER TABLE `sf_guard_group_permission`
  ADD CONSTRAINT `sf_guard_group_permission_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_group_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_remember_key`
--
ALTER TABLE `sf_guard_remember_key`
  ADD CONSTRAINT `sf_guard_remember_key_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_user_group`
--
ALTER TABLE `sf_guard_user_group`
  ADD CONSTRAINT `sf_guard_user_group_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_group_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_user_permission`
--
ALTER TABLE `sf_guard_user_permission`
  ADD CONSTRAINT `sf_guard_user_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_permission_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_user_profile`
--
ALTER TABLE `sf_guard_user_profile`
  ADD CONSTRAINT `sf_guard_user_profile_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_user_profile_fotografia`
--
ALTER TABLE `sf_guard_user_profile_fotografia`
  ADD CONSTRAINT `sf_guard_user_profile_fotografia_fotografia_id_fotografia_id` FOREIGN KEY (`fotografia_id`) REFERENCES `fotografia` (`id`),
  ADD CONSTRAINT `sssi` FOREIGN KEY (`sf_guard_user_profile_id`) REFERENCES `sf_guard_user_profile` (`id`);

--
-- Constraints for table `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD CONSTRAINT `subcategoria_categoria_id_categoria_id` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`);
