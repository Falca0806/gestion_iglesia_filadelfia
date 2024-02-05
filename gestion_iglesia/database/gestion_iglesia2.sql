-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-02-2024 a las 21:14:58
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion_iglesia2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `actividades_id` int(10) NOT NULL,
  `actividades_nombre` varchar(50) NOT NULL,
  `actividades_detalle` varchar(200) NOT NULL,
  `actividades_fecha` date NOT NULL,
  `ministerios_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `cargos_id` int(10) NOT NULL,
  `cargos_nombre` varchar(40) NOT NULL,
  `cargos_descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`cargos_id`, `cargos_nombre`, `cargos_descripcion`) VALUES
(1, 'Administrador', 'Administrador de la Iglesia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresosegresos`
--

CREATE TABLE `ingresosegresos` (
  `ingresos_egresos_id` int(10) NOT NULL,
  `ingresos_egresos_tipo` varchar(10) NOT NULL,
  `ingresos_egresos_descripcion` varchar(100) NOT NULL,
  `ingresos_egresos_monto` decimal(30,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembros`
--

CREATE TABLE `miembros` (
  `miembros_id` int(10) NOT NULL,
  `miembros_nombre` varchar(40) NOT NULL,
  `miembros_apellido` varchar(40) NOT NULL,
  `miembros_dni` int(25) NOT NULL,
  `miembros_fecha_nac` date NOT NULL,
  `miembros_telefono` int(50) NOT NULL,
  `miembros_direccion` varchar(200) NOT NULL,
  `miembros_correo` varchar(100) NOT NULL,
  `miembros_estado_civil` varchar(15) NOT NULL,
  `miembros_genero` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ministerios`
--

CREATE TABLE `ministerios` (
  `ministerios_id` int(10) NOT NULL,
  `ministerios_nombre` varchar(70) NOT NULL,
  `ministerios_funcion` varchar(200) NOT NULL,
  `personal_dni` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ministerios_miembros`
--

CREATE TABLE `ministerios_miembros` (
  `ministerios_miembros_id` int(10) NOT NULL,
  `ministerios_id` int(10) NOT NULL,
  `miembros_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `personal_id` int(10) NOT NULL,
  `personal_dni` varchar(25) DEFAULT NULL,
  `personal_nombre` varchar(40) DEFAULT NULL,
  `personal_apellido` varchar(40) DEFAULT NULL,
  `personal_fecha_nac` date DEFAULT NULL,
  `personal_telefono` varchar(50) DEFAULT NULL,
  `personal_direccion` varchar(200) DEFAULT NULL,
  `personal_correo` varchar(100) DEFAULT NULL,
  `personal_genero` varchar(10) DEFAULT NULL,
  `personal_estado_civil` varchar(15) DEFAULT NULL,
  `cargos_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`personal_id`, `personal_dni`, `personal_nombre`, `personal_apellido`, `personal_fecha_nac`, `personal_telefono`, `personal_direccion`, `personal_correo`, `personal_genero`, `personal_estado_civil`, `cargos_id`) VALUES
(1, '30131490', 'Christian', 'Monasterios', '2001-06-08', '04146809866', 'Nueva democracia', 'costerochristian@gmail.com', 'Masculino', 'Soltero', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `roles_id` int(10) NOT NULL,
  `roles_nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`roles_id`, `roles_nombre`) VALUES
(1, 'Administrador'),
(2, 'Asistente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuarios_id` int(10) NOT NULL,
  `usuarios_nombre` varchar(25) NOT NULL,
  `usuarios_clave` varchar(100) NOT NULL,
  `personal_dni` varchar(25) NOT NULL,
  `roles_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuarios_id`, `usuarios_nombre`, `usuarios_clave`, `personal_dni`, `roles_id`) VALUES
(1, 'Admin123', '$2y$10$2YQSV9y1qYaDTVAuhIgq8O6wp8.eEv179eb11iX/N4wGQ5cqjs6re', '30131490', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`actividades_id`),
  ADD KEY `Ministerios_ID` (`ministerios_id`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`cargos_id`);

--
-- Indices de la tabla `ingresosegresos`
--
ALTER TABLE `ingresosegresos`
  ADD PRIMARY KEY (`ingresos_egresos_id`);

--
-- Indices de la tabla `miembros`
--
ALTER TABLE `miembros`
  ADD PRIMARY KEY (`miembros_id`);

--
-- Indices de la tabla `ministerios`
--
ALTER TABLE `ministerios`
  ADD PRIMARY KEY (`ministerios_id`),
  ADD KEY `personal_dni` (`personal_dni`);

--
-- Indices de la tabla `ministerios_miembros`
--
ALTER TABLE `ministerios_miembros`
  ADD PRIMARY KEY (`ministerios_miembros_id`),
  ADD KEY `Ministerios_ID` (`ministerios_id`),
  ADD KEY `Miembros_ID` (`miembros_id`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`personal_id`),
  ADD UNIQUE KEY `personal_dni` (`personal_dni`),
  ADD KEY `cargos_id` (`cargos_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roles_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuarios_id`),
  ADD KEY `personal_dni` (`personal_dni`),
  ADD KEY `roles_id` (`roles_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `actividades_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `cargos_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ingresosegresos`
--
ALTER TABLE `ingresosegresos`
  MODIFY `ingresos_egresos_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `miembros`
--
ALTER TABLE `miembros`
  MODIFY `miembros_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ministerios`
--
ALTER TABLE `ministerios`
  MODIFY `ministerios_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ministerios_miembros`
--
ALTER TABLE `ministerios_miembros`
  MODIFY `ministerios_miembros_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `personal_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `roles_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuarios_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `actividades_ibfk_1` FOREIGN KEY (`ministerios_id`) REFERENCES `ministerios` (`ministerios_id`);

--
-- Filtros para la tabla `ministerios`
--
ALTER TABLE `ministerios`
  ADD CONSTRAINT `ministerios_ibfk_1` FOREIGN KEY (`personal_dni`) REFERENCES `personal` (`personal_dni`);

--
-- Filtros para la tabla `ministerios_miembros`
--
ALTER TABLE `ministerios_miembros`
  ADD CONSTRAINT `ministerios_miembros_ibfk_1` FOREIGN KEY (`miembros_id`) REFERENCES `miembros` (`miembros_id`),
  ADD CONSTRAINT `ministerios_miembros_ibfk_2` FOREIGN KEY (`ministerios_id`) REFERENCES `ministerios` (`ministerios_id`);

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `personal_ibfk_1` FOREIGN KEY (`cargos_id`) REFERENCES `cargos` (`cargos_id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`roles_id`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`personal_dni`) REFERENCES `personal` (`personal_dni`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
