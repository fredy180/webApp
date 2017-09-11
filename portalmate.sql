-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-09-2017 a las 01:55:18
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `portalmate`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `idadministrador` varchar(15) NOT NULL,
  `nombreAdministrador` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idadministrador`, `nombreAdministrador`) VALUES
('123', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `idcomentario` int(11) NOT NULL,
  `contenido` varchar(1000) NOT NULL,
  `idDocente` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `iddocente` varchar(20) NOT NULL,
  `contraDocente` varchar(20) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `gradoEncargado` varchar(45) NOT NULL,
  `sexo` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `idAdministrador` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`iddocente`, `contraDocente`, `nombre`, `apellido`, `gradoEncargado`, `sexo`, `telefono`, `idAdministrador`) VALUES
('123', '123', 'jean', 'rivera', '9', 'MASCULINO', '3203203', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `idestudiante` varchar(20) NOT NULL,
  `contrasena` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `edad` varchar(45) NOT NULL,
  `grado` varchar(45) NOT NULL,
  `sexo` varchar(45) NOT NULL,
  `idDocente` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`idestudiante`, `contrasena`, `nombre`, `apellido`, `edad`, `grado`, `sexo`, `idDocente`) VALUES
('1233', ' klk', 'jea', 'dfd', '32', '9', 'MASCULINO', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion`
--

CREATE TABLE `evaluacion` (
  `idevaluacion` int(11) NOT NULL,
  `pregunta` varchar(200) DEFAULT NULL,
  `opcionA` varchar(45) DEFAULT NULL,
  `opcionB` varchar(45) DEFAULT NULL,
  `opcionC` varchar(45) DEFAULT NULL,
  `opcionD` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema`
--

CREATE TABLE `tema` (
  `idtema` int(11) NOT NULL,
  `nombreTema` varchar(45) NOT NULL,
  `contenidoTema` varchar(2000) NOT NULL,
  `imagenTema` varchar(200) DEFAULT NULL,
  `videoTema` varchar(200) DEFAULT NULL,
  `idUnidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tema`
--

INSERT INTO `tema` (`idtema`, `nombreTema`, `contenidoTema`, `imagenTema`, `videoTema`, `idUnidad`) VALUES
(122, 'fucnion', 'jnjnjfndnjkfd', 'https://encrypted-tbn0.gstatic.com/images', '', 1233),
(434, 'klm', 'mlmkmkm', 'http://www.saberia.com/wp-content/uploads/operaciones.gif', '', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `idtema` int(11) NOT NULL,
  `nombreUnidad` varchar(45) DEFAULT NULL,
  `grado` int(11) NOT NULL,
  `idDocente` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`idtema`, `nombreUnidad`, `grado`, `idDocente`) VALUES
(11, 'calculo', 9, '123'),
(1233, 'calculo2', 9, '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idadministrador`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idcomentario`),
  ADD KEY `fk_comentario_docente1_idx` (`idDocente`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`iddocente`),
  ADD KEY `fk_docente_administrador1_idx` (`idAdministrador`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`idestudiante`),
  ADD KEY `fk_estudiante_docente1_idx` (`idDocente`);

--
-- Indices de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD PRIMARY KEY (`idevaluacion`);

--
-- Indices de la tabla `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`idtema`),
  ADD KEY `fk_tema_unidad1_idx` (`idUnidad`);

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`idtema`),
  ADD KEY `fk_unidad_docente1_idx` (`idDocente`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_comentario_docente1` FOREIGN KEY (`idDocente`) REFERENCES `docente` (`iddocente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `fk_docente_administrador1` FOREIGN KEY (`idAdministrador`) REFERENCES `administrador` (`idadministrador`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `fk_estudiante_docente1` FOREIGN KEY (`idDocente`) REFERENCES `docente` (`iddocente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tema`
--
ALTER TABLE `tema`
  ADD CONSTRAINT `fk_tema_unidad1` FOREIGN KEY (`idUnidad`) REFERENCES `unidad` (`idtema`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD CONSTRAINT `fk_unidad_docente1` FOREIGN KEY (`idDocente`) REFERENCES `docente` (`iddocente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
