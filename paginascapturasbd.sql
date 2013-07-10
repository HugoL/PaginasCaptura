-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-05-2013 a las 00:20:13
-- Versión del servidor: 5.5.31
-- Versión de PHP: 5.3.10-1ubuntu3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `paginascapturasbd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hl_paginas_captura`
--
USE hlangabd;

CREATE TABLE IF NOT EXISTS `hl_paginas_captura` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` text COLLATE utf8_spanish_ci NOT NULL,
  `subtitulo` text COLLATE utf8_spanish_ci,
  `pretitulo` text COLLATE utf8_spanish_ci,
  `cod_video` text COLLATE utf8_spanish_ci,
  `accion` text COLLATE utf8_spanish_ci,
  `cod_formulario` text COLLATE utf8_spanish_ci,
  `texto` text COLLATE utf8_spanish_ci,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `habilitada` tinyint(1) DEFAULT '1',
  `id_usuario` bigint(20) unsigned NOT NULL,
  `id_tipo_pagina` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_tipo_pagina` (`id_tipo_pagina`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hl_paginas_estilos`
--

CREATE TABLE IF NOT EXISTS `hl_paginas_estilos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_pagina` int(11) unsigned NOT NULL,
  `boton_form` varchar(255) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'btn-rojo',
  `estilo_form` varchar(128) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pagina` (`id_pagina`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hl_paginas_tags`
--

CREATE TABLE IF NOT EXISTS `hl_paginas_tags` (
  `id` int(10) unsigned NOT NULL,
  `id_pagina` int(10) unsigned NOT NULL,
  `id_tag` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pagina` (`id_pagina`,`id_tag`),
  KEY `id_tag` (`id_tag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hl_tags`
--

CREATE TABLE IF NOT EXISTS `hl_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `valor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hl_tipos_pagina`
--

CREATE TABLE IF NOT EXISTS `hl_tipos_pagina` (
  `id` int(11) unsigned NOT NULL,
  `tipo` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `habilitado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `hl_paginas_captura`
--
ALTER TABLE `hl_paginas_captura`
  ADD CONSTRAINT `hl_paginas_captura_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `wp_users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hl_paginas_captura_ibfk_2` FOREIGN KEY (`id_tipo_pagina`) REFERENCES `hl_tipos_pagina` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `hl_paginas_estilos`
--
ALTER TABLE `hl_paginas_estilos`
  ADD CONSTRAINT `hl_paginas_estilos_ibfk_1` FOREIGN KEY (`id_pagina`) REFERENCES `hl_paginas_captura` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hl_paginas_tags`
--
ALTER TABLE `hl_paginas_tags`
  ADD CONSTRAINT `hl_paginas_tags_ibfk_1` FOREIGN KEY (`id_tag`) REFERENCES `hl_tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hl_paginas_tags_ibfk_2` FOREIGN KEY (`id_pagina`) REFERENCES `hl_paginas_captura` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
