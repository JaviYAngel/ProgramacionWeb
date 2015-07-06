-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-06-2015 a las 23:00:26
-- Versión del servidor: 5.5.43-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;



-- --------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- Estructura de tabla para la tabla `recurso`
--

CREATE TABLE IF NOT EXISTS `recurso` (
  `COD` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `lugar` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `horario_ini` date NOT NULL,
  `DNIprofesional` char(9) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`COD`),
  KEY `COD_2` (`COD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `recurso`
--

INSERT INTO `recurso` (`COD`, `nombre`, `descripcion`, `lugar`, `horario_ini`, `DNIprofesional`) VALUES
('BALONCESTO', 'Baloncesto', 'asdasdasd', 'asdasd', '2015-06-18', '123'),
('FUTBOL', 'futbol', 'asdas', 'asd', '2015-06-03', '123'),
('MEDICO', 'medico', 'kjlkjlk', 'lkjlk', '2015-06-02', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiene`
--

CREATE TABLE IF NOT EXISTS `tiene` (
  `DNI` char(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `COD` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `prioridad` int(11) NOT NULL,
  `cod_cola` char(10) NOT NULL,
  `atendido` tinyint(1) NOT NULL,
  PRIMARY KEY (`cod_cola`,`COD`,`DNI`),
  KEY `COD` (`COD`),
  KEY `DNI` (`DNI`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tiene`
--

INSERT INTO `tiene` (`DNI`, `COD`, `prioridad`, `cod_cola`, `atendido`) VALUES
('ggg', 'BALONCESTO', 5, 'BAL5', 1),
('fffa', 'FUTBOL', 3, 'FU3', 1),
('123', 'FUTBOL', 1, 'FUT1', 1),
('bbb', 'FUTBOL', 1, 'FUT1', 0),
('1231231', 'FUTBOL', 2, 'FUT2', 0),
('123', 'MEDICO', 2, 'MED1', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `DNI` char(9) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`DNI`),
  UNIQUE KEY `DNI` (`DNI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`DNI`, `nombre`, `pass`, `tipo_usuario`) VALUES
('123', '123', '123', 'profesional'),
('1231231', '1233', '123123', 'cliente'),
('12345678', '123', '123', 'cliente'),
('76439462C', 'Angel', 'cisneros', 'admin'),
('76439462s', 'pepe', '123', 'profesional'),
('aa123123', 'ss', 'dd', 'profesional'),
('bbb', 'bbb', 'bbb', 'cliente'),
('fffa', 'ssd', 'asasda', 'cliente'),
('ggg', 'dddd', 'dddd', 'profesional'),
('ggggggggg', 'gggggg', 'ggggg', 'admin'),
('qwerty', 'qwerty', 'qwerty', 'cliente');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tiene`
--
ALTER TABLE `tiene`
  ADD CONSTRAINT `tiene_ibfk_1` FOREIGN KEY (`COD`) REFERENCES `recurso` (`COD`),
  ADD CONSTRAINT `tiene_ibfk_2` FOREIGN KEY (`DNI`) REFERENCES `usuarios` (`DNI`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
