-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-06-2015 a las 02:23:14
-- Versión del servidor: 5.5.43-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `76439462`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recurso`
--

CREATE TABLE IF NOT EXISTS recurso (
  COD varchar(11) NOT NULL DEFAULT '0',
  nombre varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  descripcion varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  lugar varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  horario_ini date NOT NULL,
  PRIMARY KEY (`COD`));

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS usuarios (
  DNI char(9) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  nombre varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  pass varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  tipo_usuario varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`DNI`));


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiene`
--


CREATE TABLE IF NOT EXISTS tiene (
    DNI char(9) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
    COD varchar(20) COLLATE utf8_spanish_ci NOT NULL,
    prioridad int(11) NOT NULL,
    PRIMARY KEY (prioridad, COD, DNI),
    FOREIGN KEY (COD) REFERENCES recurso (COD),
    FOREIGN KEY (DNI) REFERENCES usuarios (DNI) 
);


--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`DNI`, `nombre`, `pass`, `tipo_usuario`) VALUES
('123', '123', '123', 'cliente'),
('1231231', '1233', '123123', 'cliente'),
('12345678', '123', '123', 'cliente'),
('76439462C', 'Angel', 'cisneros', 'admin'),
('76439462s', 'pepe', '123', 'profesional'),
('aa123123', 'ss', 'dd', 'profesional'),
('bbb', 'bbb', 'bbb', 'admin'),
('fffa', 'ssd', 'asasda', 'cliente'),
('ggg', 'dddd', 'dddd', 'profesional'),
('ggggggggg', 'gggggg', 'ggggg', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
