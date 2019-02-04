-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-02-2019 a las 04:00:30
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `talentohumano`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacitacion`
--

CREATE TABLE `capacitacion` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `documento` varchar(200) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `tipoCapacitacion_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `capacitacion`
--

INSERT INTO `capacitacion` (`id`, `descripcion`, `documento`, `fechaInicio`, `fechaFin`, `tipoCapacitacion_id`, `user_id`) VALUES
(1, 'Capacitación 1', 'C:\\fakepath\\FORMATO 01.docx', '2019-01-16', '2019-01-23', 1, 6),
(2, 'Capacitación Juan', 'Doc2', '0000-00-00', '0000-00-00', 1, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcacion`
--

CREATE TABLE `marcacion` (
  `id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE `periodo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`id`, `descripcion`, `fechaInicio`, `fechaFin`, `estado`) VALUES
(1, 'Periodo Actual', '2018-01-01', '2019-01-01', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodopersona`
--

CREATE TABLE `periodopersona` (
  `id` int(11) NOT NULL,
  `periodo_id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `cantidadDiasPeriodo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `periodopersona`
--

INSERT INTO `periodopersona` (`id`, `periodo_id`, `persona_id`, `cantidadDiasPeriodo`) VALUES
(1, 1, 1, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `fechaAprobJefe` varchar(45) DEFAULT NULL,
  `fechaAprobTTHH` varchar(45) DEFAULT NULL,
  `horaInicio` time NOT NULL,
  `horaFin` time NOT NULL,
  `estado` int(11) DEFAULT NULL,
  `justificacion` varchar(45) NOT NULL,
  `persona_id` int(11) DEFAULT NULL,
  `jefeAprueba` varchar(45) DEFAULT NULL,
  `tthhAprueba` varchar(45) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `capacitacion_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `cedula`, `capacitacion_id`, `user_id`) VALUES
(1, '1316472990', 1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocapacitacion`
--

CREATE TABLE `tipocapacitacion` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipocapacitacion`
--

INSERT INTO `tipocapacitacion` (`id`, `descripcion`) VALUES
(1, 'Capacitación Laboral');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `id` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`id`, `tipo`) VALUES
(1, 'Administrador'),
(2, 'Usuario'),
(3, 'Jefe'),
(4, 'DirectorTH');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `email` varchar(45) NOT NULL,
  `tipoUsuario_id` int(11) NOT NULL,
  `remember_token` varchar(1000) DEFAULT NULL,
  `fechaNacimiento` date NOT NULL,
  `estadoCivil` varchar(45) NOT NULL,
  `sexo` varchar(45) NOT NULL,
  `nacionalidad` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `tipoSangre` varchar(45) NOT NULL,
  `nivelEstudio` varchar(45) NOT NULL,
  `perfilProfesional` varchar(45) NOT NULL,
  `cedula` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `nombres`, `apellidos`, `password`, `email`, `tipoUsuario_id`, `remember_token`, `fechaNacimiento`, `estadoCivil`, `sexo`, `nacionalidad`, `direccion`, `telefono`, `tipoSangre`, `nivelEstudio`, `perfilProfesional`, `cedula`) VALUES
(6, 'Genesis', 'Flecher', '$2y$10$axtxNrZ7CvK4g8iERtAKs.yFN9iw/uQ7xWojvEvXEhKCofzY/AY0m', 'geneflecher@hotmail.com', 2, 'HURqMElyEqKL6c14jGRwS8Vese212YB2KG0IydVF1v7XCemaZb1ucIN0aSoC', '2002-05-30', 'Soltero', 'Femenino', 'Ecuatoriana', 'Manta', '0992345678', 'O-', 'Tercer Nivel', 'Auditora', '1315482971'),
(8, 'Cinthya', 'Álvarez', '$2y$10$IoAtn7ksqNeZGhJ6Df6ECuiAwSbJ9rDmMeseaCrR/.t79x4yZIbei', 'pamela96@hotmail.com', 4, NULL, '1996-06-24', 'Soltero', 'Femenino', 'Ecuatoriana', 'Chone', '0987654325', 'O+', 'Tercer Nivel', 'Ingeniera', '1311901613'),
(11, 'Joselin', 'Loor', '$2y$10$a/FvpcAG9ELPBqtW4l4oLe7rT2OBwM2WnxCgpYSknofo9NqcNoVeq', 'joselin_l96@live.com', 1, NULL, '1996-12-03', 'Soltero', 'Femenino', 'Ecuatoriana', 'Chone', '0968190785', 'O+', 'Tercer Nivel', 'Ingeniera', '1316472990'),
(12, 'Juan', 'Gutierres', '$2y$10$dx69lFc40yt.RO8UmwMOXOxJhEEQVt9mk18NN7wlMqdWNCn86yZ6u', 'juan@hotmail.com', 2, NULL, '1994-12-27', 'Unión libre', 'Masculino', 'Ecuatoriano', 'Calceta', '0998761234', 'O+', 'Tercer Nivel', 'Ingeniero', '0128764560'),
(13, 'Edson', 'Vidal', '$2y$10$5WYn729GI4u6vkkhdGaRcOc.URsKx/NWFGq2I/5/cxuKHl4umRvSO', 'edsonvp@hotmail.com', 3, NULL, '1995-11-12', 'Casado', 'Masculino', 'Ecuatoriano', 'Calceta', '0989997612', 'O+', 'Tercer Nivel', 'Licenciado', '1342137897');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacaciones`
--

CREATE TABLE `vacaciones` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `fechaAprobacionJefe` date DEFAULT NULL,
  `fechaAprobacionTTHH` date DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `persona_id` int(11) DEFAULT NULL,
  `jefeAprueba` varchar(45) DEFAULT NULL,
  `tthhAprueba` varchar(45) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vacaciones`
--

INSERT INTO `vacaciones` (`id`, `descripcion`, `fechaInicio`, `fechaFin`, `fechaAprobacionJefe`, `fechaAprobacionTTHH`, `estado`, `persona_id`, `jefeAprueba`, `tthhAprueba`, `user_id`) VALUES
(1, 'Vacaciones del periodo 2017', '2019-01-09', '2019-01-23', '1970-01-01', '1970-01-01', NULL, NULL, NULL, NULL, 1),
(2, 'Vacaciones', '2019-01-17', '2019-01-31', NULL, NULL, NULL, NULL, NULL, NULL, 2),
(3, 'Vacaciones periodo 2018', '2018-12-03', '2019-01-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacacionperiodo`
--

CREATE TABLE `vacacionperiodo` (
  `id` int(11) NOT NULL,
  `vacacion_id` int(11) NOT NULL,
  `periodo_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vacacionperiodo`
--

INSERT INTO `vacacionperiodo` (`id`, `vacacion_id`, `periodo_id`, `cantidad`) VALUES
(17, 1, 1, 30),
(18, 1, 1, 12);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `capacitacion`
--
ALTER TABLE `capacitacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_capacitacion_tipo_capacitacion_idx` (`tipoCapacitacion_id`);

--
-- Indices de la tabla `marcacion`
--
ALTER TABLE `marcacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_marcacion_persona1_idx` (`persona_id`);

--
-- Indices de la tabla `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `periodopersona`
--
ALTER TABLE `periodopersona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_periodo_has_persona_persona1_idx` (`persona_id`),
  ADD KEY `fk_periodo_has_persona_periodo1_idx` (`periodo_id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_permisos_persona1_idx` (`persona_id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_persona_capacitacion1_idx` (`capacitacion_id`),
  ADD KEY `fk_persona_user1_idx` (`user_id`);

--
-- Indices de la tabla `tipocapacitacion`
--
ALTER TABLE `tipocapacitacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_tipoUsuario1_idx` (`tipoUsuario_id`);

--
-- Indices de la tabla `vacaciones`
--
ALTER TABLE `vacaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vacaciones_persona1_idx` (`persona_id`);

--
-- Indices de la tabla `vacacionperiodo`
--
ALTER TABLE `vacacionperiodo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vacacion_has_persona_vacacion1_idx` (`vacacion_id`),
  ADD KEY `fk_vacacion_persona_periodo1_idx` (`periodo_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `capacitacion`
--
ALTER TABLE `capacitacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `marcacion`
--
ALTER TABLE `marcacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `periodo`
--
ALTER TABLE `periodo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `periodopersona`
--
ALTER TABLE `periodopersona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipocapacitacion`
--
ALTER TABLE `tipocapacitacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `vacaciones`
--
ALTER TABLE `vacaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `vacacionperiodo`
--
ALTER TABLE `vacacionperiodo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `capacitacion`
--
ALTER TABLE `capacitacion`
  ADD CONSTRAINT `fk_capacitacion_tipo_capacitacion` FOREIGN KEY (`tipoCapacitacion_id`) REFERENCES `tipocapacitacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `marcacion`
--
ALTER TABLE `marcacion`
  ADD CONSTRAINT `fk_marcacion_persona1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `periodopersona`
--
ALTER TABLE `periodopersona`
  ADD CONSTRAINT `fk_periodo_has_persona_periodo1` FOREIGN KEY (`periodo_id`) REFERENCES `periodo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_periodo_has_persona_persona1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `fk_permisos_persona1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_persona_capacitacion1` FOREIGN KEY (`capacitacion_id`) REFERENCES `capacitacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_persona_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_tipoUsuario1` FOREIGN KEY (`tipoUsuario_id`) REFERENCES `tipousuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vacaciones`
--
ALTER TABLE `vacaciones`
  ADD CONSTRAINT `fk_vacaciones_persona1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
