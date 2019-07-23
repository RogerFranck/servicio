-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-07-2019 a las 04:01:13
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `yna`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ynaalumnos`
--

CREATE TABLE `ynaalumnos` (
  `id_alumno` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `matricula` int(11) NOT NULL,
  `id_grupos` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ynaalumnos`
--

INSERT INTO `ynaalumnos` (`id_alumno`, `id_persona`, `matricula`, `id_grupos`) VALUES
(1, 4, 123456, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ynaasignatura`
--

CREATE TABLE `ynaasignatura` (
  `id_asignatura` int(11) NOT NULL,
  `materia` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ynaasignatura`
--

INSERT INTO `ynaasignatura` (`id_asignatura`, `materia`) VALUES
(1, 'Calculo INT.'),
(2, 'Submodulo 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ynadocentes`
--

CREATE TABLE `ynadocentes` (
  `id_docente` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ynadocentes`
--

INSERT INTO `ynadocentes` (`id_docente`, `id_persona`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ynadocentesasignatura`
--

CREATE TABLE `ynadocentesasignatura` (
  `id_docenteasignatura` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL,
  `id_asignatura` int(11) NOT NULL,
  `id_grupos` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ynadocentesasignatura`
--

INSERT INTO `ynadocentesasignatura` (`id_docenteasignatura`, `id_docente`, `id_asignatura`, `id_grupos`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 2),
(3, 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ynagrupos`
--

CREATE TABLE `ynagrupos` (
  `id_grupos` int(11) NOT NULL,
  `semestre` int(11) NOT NULL,
  `grupo` text COLLATE utf8_spanish_ci NOT NULL,
  `especialidad` text COLLATE utf8_spanish_ci NOT NULL,
  `turno` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ynagrupos`
--

INSERT INTO `ynagrupos` (`id_grupos`, `semestre`, `grupo`, `especialidad`, `turno`) VALUES
(1, 6, 'B', 'Programacion', 'Matutino'),
(2, 6, 'A', 'Gericultura', 'Matutino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ynalista`
--

CREATE TABLE `ynalista` (
  `id_lista` int(11) NOT NULL,
  `id_grupos` int(30) NOT NULL,
  `id_asignatura` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `asistencia` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `hora` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ynalista`
--

INSERT INTO `ynalista` (`id_lista`, `id_grupos`, `id_asignatura`, `id_docente`, `id_alumno`, `asistencia`, `fecha`, `hora`) VALUES
(1, 1, 1, 1, 1, 'S', '16/Julio/2019', '18:59'),
(2, 1, 1, 1, 1, 'S', '16/Julio/2019', '20:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ynapersonas`
--

CREATE TABLE `ynapersonas` (
  `id_persona` int(11) NOT NULL,
  `Apellido1` text COLLATE utf8_spanish_ci NOT NULL,
  `Apellido2` text COLLATE utf8_spanish_ci NOT NULL,
  `Nombres` text COLLATE utf8_spanish_ci NOT NULL,
  `CURP` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ynapersonas`
--

INSERT INTO `ynapersonas` (`id_persona`, `Apellido1`, `Apellido2`, `Nombres`, `CURP`) VALUES
(1, 'Principal', 'Del sistema', 'Admin', 'SinCurp'),
(2, 'Principal', 'De Pruebas', 'Maestro', 'Desconocido'),
(4, 'Primero', 'De Pruebas', 'Alumno', 'Desconocido2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ynausuarios`
--

CREATE TABLE `ynausuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `clase` int(11) NOT NULL,
  `Usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `Pass` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ynausuarios`
--

INSERT INTO `ynausuarios` (`id_usuario`, `id_persona`, `clase`, `Usuario`, `Pass`) VALUES
(1, 1, 0, 'Admin', 'SinCurp'),
(2, 2, 1, 'Maestro', 'Desconocido'),
(3, 4, 2, 'Alumno', 'Desconocido2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ynaalumnos`
--
ALTER TABLE `ynaalumnos`
  ADD PRIMARY KEY (`id_alumno`),
  ADD KEY `id_persona` (`id_persona`),
  ADD KEY `id_grupo` (`id_grupos`);

--
-- Indices de la tabla `ynaasignatura`
--
ALTER TABLE `ynaasignatura`
  ADD PRIMARY KEY (`id_asignatura`);

--
-- Indices de la tabla `ynadocentes`
--
ALTER TABLE `ynadocentes`
  ADD PRIMARY KEY (`id_docente`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `ynadocentesasignatura`
--
ALTER TABLE `ynadocentesasignatura`
  ADD PRIMARY KEY (`id_docenteasignatura`),
  ADD KEY `id_docente` (`id_docente`),
  ADD KEY `id_asignatura` (`id_asignatura`),
  ADD KEY `id_grupos` (`id_grupos`);

--
-- Indices de la tabla `ynagrupos`
--
ALTER TABLE `ynagrupos`
  ADD PRIMARY KEY (`id_grupos`);

--
-- Indices de la tabla `ynalista`
--
ALTER TABLE `ynalista`
  ADD PRIMARY KEY (`id_lista`),
  ADD KEY `id_grupo` (`id_grupos`),
  ADD KEY `id_asignatura` (`id_asignatura`),
  ADD KEY `id_docente` (`id_docente`),
  ADD KEY `id_alumno` (`id_alumno`);

--
-- Indices de la tabla `ynapersonas`
--
ALTER TABLE `ynapersonas`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `ynausuarios`
--
ALTER TABLE `ynausuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_persona` (`id_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ynaalumnos`
--
ALTER TABLE `ynaalumnos`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ynaasignatura`
--
ALTER TABLE `ynaasignatura`
  MODIFY `id_asignatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ynadocentes`
--
ALTER TABLE `ynadocentes`
  MODIFY `id_docente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ynadocentesasignatura`
--
ALTER TABLE `ynadocentesasignatura`
  MODIFY `id_docenteasignatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ynagrupos`
--
ALTER TABLE `ynagrupos`
  MODIFY `id_grupos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ynalista`
--
ALTER TABLE `ynalista`
  MODIFY `id_lista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ynapersonas`
--
ALTER TABLE `ynapersonas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ynausuarios`
--
ALTER TABLE `ynausuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ynaalumnos`
--
ALTER TABLE `ynaalumnos`
  ADD CONSTRAINT `ynaalumnos_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `ynapersonas` (`id_persona`),
  ADD CONSTRAINT `ynaalumnos_ibfk_2` FOREIGN KEY (`id_grupos`) REFERENCES `ynagrupos` (`id_grupos`);

--
-- Filtros para la tabla `ynadocentes`
--
ALTER TABLE `ynadocentes`
  ADD CONSTRAINT `ynadocentes_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `ynapersonas` (`id_persona`);

--
-- Filtros para la tabla `ynadocentesasignatura`
--
ALTER TABLE `ynadocentesasignatura`
  ADD CONSTRAINT `ynadocentesasignatura_ibfk_1` FOREIGN KEY (`id_docente`) REFERENCES `ynadocentes` (`id_docente`),
  ADD CONSTRAINT `ynadocentesasignatura_ibfk_2` FOREIGN KEY (`id_asignatura`) REFERENCES `ynaasignatura` (`id_asignatura`),
  ADD CONSTRAINT `ynadocentesasignatura_ibfk_3` FOREIGN KEY (`id_grupos`) REFERENCES `ynagrupos` (`id_grupos`);

--
-- Filtros para la tabla `ynalista`
--
ALTER TABLE `ynalista`
  ADD CONSTRAINT `ynalista_ibfk_1` FOREIGN KEY (`id_docente`) REFERENCES `ynadocentes` (`id_docente`),
  ADD CONSTRAINT `ynalista_ibfk_2` FOREIGN KEY (`id_alumno`) REFERENCES `ynaalumnos` (`id_alumno`),
  ADD CONSTRAINT `ynalista_ibfk_3` FOREIGN KEY (`id_asignatura`) REFERENCES `ynaasignatura` (`id_asignatura`),
  ADD CONSTRAINT `ynalista_ibfk_4` FOREIGN KEY (`id_grupos`) REFERENCES `ynagrupos` (`id_grupos`);

--
-- Filtros para la tabla `ynausuarios`
--
ALTER TABLE `ynausuarios`
  ADD CONSTRAINT `ynausuarios_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `ynapersonas` (`id_persona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
