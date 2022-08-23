-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-08-2022 a las 16:58:30
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_zacred`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `usuario_cliente` int(11) DEFAULT NULL,
  `estado_cliente` enum('activo','desconectado') DEFAULT NULL,
  `no_casa` char(6) DEFAULT NULL,
  `referencias` char(150) DEFAULT NULL,
  `rancho_cliente` int(11) DEFAULT NULL,
  `calle_uno` char(50) DEFAULT NULL,
  `calle_dos` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `usuario_cliente`, `estado_cliente`, `no_casa`, `referencias`, `rancho_cliente`, `calle_uno`, `calle_dos`) VALUES
(1, 5, 'activo', '883', 'casa esquina', 3, 'javier mina', 'av. colon'),
(2, 6, 'desconectado', '317', 'casa verde', 7, 'miguel hidalgo', 'gardenias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instalacion`
--

CREATE TABLE `instalacion` (
  `reg` int(11) NOT NULL,
  `fecha_instalacion` date DEFAULT NULL,
  `radio` int(11) DEFAULT NULL,
  `router` int(11) DEFAULT NULL,
  `paquete` int(11) DEFAULT NULL,
  `direccion_ip_radio` char(16) DEFAULT '0.0.0.0',
  `direccion_ip_router` char(16) DEFAULT '0.0.0.0',
  `trabajador_instalacion` int(11) DEFAULT NULL,
  `solicitud_instalacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE `localidad` (
  `Id_localidad` int(11) NOT NULL,
  `nombre` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `localidad`
--

INSERT INTO `localidad` (`Id_localidad`, `nombre`) VALUES
(15, 'MATAMOROS'),
(16, 'TORREON');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas_radios`
--

CREATE TABLE `marcas_radios` (
  `Id_marca_rad` int(11) NOT NULL,
  `nombre_m_rad` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marcas_radios`
--

INSERT INTO `marcas_radios` (`Id_marca_rad`, `nombre_m_rad`) VALUES
(6, 'TP-LINK');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas_router`
--

CREATE TABLE `marcas_router` (
  `Id_marca_rou` int(11) NOT NULL,
  `nombre_m_rou` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelos_radios`
--

CREATE TABLE `modelos_radios` (
  `Id_modelo_rad` int(11) NOT NULL,
  `nombre_m_rad` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modelos_radios`
--

INSERT INTO `modelos_radios` (`Id_modelo_rad`, `nombre_m_rad`) VALUES
(1, 'modelo1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelos_router`
--

CREATE TABLE `modelos_router` (
  `Id_modelo_rou` int(11) NOT NULL,
  `nombre_m_rou` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modelos_router`
--

INSERT INTO `modelos_router` (`Id_modelo_rou`, `nombre_m_rou`) VALUES
(1, 'modelo1router'),
(2, 'modelo2router'),
(3, 'modelo13router');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquetes`
--

CREATE TABLE `paquetes` (
  `n_paquete` int(11) NOT NULL,
  `Velocidad_down` int(11) DEFAULT NULL,
  `Velocidad_up` int(11) DEFAULT NULL,
  `No_user_recomendados` int(11) DEFAULT NULL,
  `Descripcion` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `radios`
--

CREATE TABLE `radios` (
  `id_radio` int(11) NOT NULL,
  `marca_radio` int(11) DEFAULT NULL,
  `modelo_radio` int(11) DEFAULT NULL,
  `serie_radio` char(17) DEFAULT NULL,
  `estado_radio` enum('asignado','sin usar') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ranchos`
--

CREATE TABLE `ranchos` (
  `id_rancho` int(11) NOT NULL,
  `nombre` char(50) DEFAULT NULL,
  `Codigo_Postal` char(8) DEFAULT NULL,
  `localidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ranchos`
--

INSERT INTO `ranchos` (`id_rancho`, `nombre`, `Codigo_Postal`, `localidad`) VALUES
(2, 'ANDALUCIA', '27447', 15),
(3, 'LA ESPERANZA', '27460', 15),
(4, 'EL DOCE', '27413', 15),
(5, 'BENITO JUAREZ', '27463', 15),
(6, 'MONTE ALEGRE', '27414', 16),
(7, 'GRANADA', '27454', 16),
(8, 'VICENTE GUERRERO', '27463', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE `reporte` (
  `reg` int(11) NOT NULL,
  `reporte` int(11) DEFAULT NULL,
  `fecha_solucion` date DEFAULT NULL,
  `detalles_solucion` char(150) DEFAULT NULL,
  `trabajador_reporte` int(11) DEFAULT NULL,
  `solicitud_reporte` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `router`
--

CREATE TABLE `router` (
  `id_router` int(11) NOT NULL,
  `marca_router` int(11) DEFAULT NULL,
  `modelo_router` int(11) DEFAULT NULL,
  `serie_router` char(17) DEFAULT NULL,
  `estado_router` enum('asignado','sin usar') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `Reg_Solicitud` int(11) NOT NULL,
  `F_Solicitud` date DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `tipo_solicitud` int(11) DEFAULT NULL,
  `detalles` char(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`Reg_Solicitud`, `F_Solicitud`, `usuario`, `tipo_solicitud`, `detalles`) VALUES
(1, '2022-03-01', 5, 1, NULL),
(2, '2022-03-21', 6, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_reporte`
--

CREATE TABLE `tipo_reporte` (
  `id_reporte` int(11) NOT NULL,
  `nombre_reporte` char(50) DEFAULT NULL,
  `prioridad` enum('alta','media','baja') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_reporte`
--

INSERT INTO `tipo_reporte` (`id_reporte`, `nombre_reporte`, `prioridad`) VALUES
(1, 'INTERNET LENTO', 'media'),
(2, 'SIN INTERNET', 'alta'),
(3, 'CAMBIO DE PAQUETE', 'alta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_solicitudes`
--

CREATE TABLE `tipo_solicitudes` (
  `id_tipo_solicitud` int(11) NOT NULL,
  `Nombre_solicitud` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_solicitudes`
--

INSERT INTO `tipo_solicitudes` (`id_tipo_solicitud`, `Nombre_solicitud`) VALUES
(1, 'INSTALACIÓN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_trabajador`
--

CREATE TABLE `tipo_trabajador` (
  `id_tipo_trabajador` int(11) NOT NULL,
  `tipo` char(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_trabajador`
--

INSERT INTO `tipo_trabajador` (`id_tipo_trabajador`, `tipo`) VALUES
(1, 'central'),
(2, 'tecnico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

CREATE TABLE `trabajadores` (
  `id_trabajador` int(11) NOT NULL,
  `usuario_trabajador` int(11) DEFAULT NULL,
  `tipo_trabajador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`id_trabajador`, `usuario_trabajador`, `tipo_trabajador`) VALUES
(1, 1, 2),
(2, 2, 1),
(3, 3, 1),
(4, 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` char(50) DEFAULT NULL,
  `contraseña` char(100) DEFAULT NULL,
  `A_Paterno` char(50) DEFAULT NULL,
  `A_Materno` char(50) DEFAULT NULL,
  `correo` char(50) DEFAULT NULL,
  `telefono` char(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `contraseña`, `A_Paterno`, `A_Materno`, `correo`, `telefono`) VALUES
(1, 'jared', '74925926..1', 'salazar', 'loera', 'salazarloerajared@gmail.com', '8711706749'),
(2, 'julie', '16114423', 'valdes', 'dominguez', 'julievaldes2@gmail.com', '8711438023'),
(3, 'yordi', '20170049', 'ortiz', 'juarez', 'yordiortizjuarez@gmail.com', '8712736050'),
(4, 'manuel sebastian', 'contraseña', 'ramirez', 'murillo', 'sebastianrmz@gmail.com', '8712117940'),
(5, 'gerardo', 'palalalala', 'sotelo', 'ugalde', 'gerardosotelougalde@gmail.com', '8714582009'),
(6, 'jesus andres', 'nosequeponerdecontraseña', 'catarino', 'violante', 'andrescv@gmail.com', '8711100689');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `FK_Rancho_Cliente` (`rancho_cliente`),
  ADD KEY `FK_usuario_cliente` (`usuario_cliente`);

--
-- Indices de la tabla `instalacion`
--
ALTER TABLE `instalacion`
  ADD PRIMARY KEY (`reg`),
  ADD KEY `FK_Solicitud_Instalacion` (`solicitud_instalacion`),
  ADD KEY `FK_instalacion_radio` (`radio`),
  ADD KEY `FK_instalacion_router` (`router`),
  ADD KEY `FK_instalacion_paquete` (`paquete`),
  ADD KEY `FK_instalacion_trabajador` (`trabajador_instalacion`);

--
-- Indices de la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`Id_localidad`);

--
-- Indices de la tabla `marcas_radios`
--
ALTER TABLE `marcas_radios`
  ADD PRIMARY KEY (`Id_marca_rad`);

--
-- Indices de la tabla `marcas_router`
--
ALTER TABLE `marcas_router`
  ADD PRIMARY KEY (`Id_marca_rou`);

--
-- Indices de la tabla `modelos_radios`
--
ALTER TABLE `modelos_radios`
  ADD PRIMARY KEY (`Id_modelo_rad`);

--
-- Indices de la tabla `modelos_router`
--
ALTER TABLE `modelos_router`
  ADD PRIMARY KEY (`Id_modelo_rou`);

--
-- Indices de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  ADD PRIMARY KEY (`n_paquete`);

--
-- Indices de la tabla `radios`
--
ALTER TABLE `radios`
  ADD PRIMARY KEY (`id_radio`),
  ADD KEY `FK_radio_marca` (`marca_radio`),
  ADD KEY `FK_radio_modelo` (`modelo_radio`);

--
-- Indices de la tabla `ranchos`
--
ALTER TABLE `ranchos`
  ADD PRIMARY KEY (`id_rancho`),
  ADD KEY `FK_Localidad` (`localidad`);

--
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`reg`),
  ADD KEY `FK_Solicitud_Reporte` (`solicitud_reporte`),
  ADD KEY `FK_reporte_tipo_reporte` (`reporte`),
  ADD KEY `FK_reporte_trabajador` (`trabajador_reporte`);

--
-- Indices de la tabla `router`
--
ALTER TABLE `router`
  ADD PRIMARY KEY (`id_router`),
  ADD KEY `FK_router_marca` (`marca_router`),
  ADD KEY `FK_router_modelo` (`modelo_router`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`Reg_Solicitud`),
  ADD KEY `FK_Solicitud_usuario` (`usuario`),
  ADD KEY `FK_tipo_solicitud` (`tipo_solicitud`);

--
-- Indices de la tabla `tipo_reporte`
--
ALTER TABLE `tipo_reporte`
  ADD PRIMARY KEY (`id_reporte`);

--
-- Indices de la tabla `tipo_solicitudes`
--
ALTER TABLE `tipo_solicitudes`
  ADD PRIMARY KEY (`id_tipo_solicitud`);

--
-- Indices de la tabla `tipo_trabajador`
--
ALTER TABLE `tipo_trabajador`
  ADD PRIMARY KEY (`id_tipo_trabajador`);

--
-- Indices de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD PRIMARY KEY (`id_trabajador`),
  ADD KEY `FK_trabajadores_tipo` (`tipo_trabajador`),
  ADD KEY `FK_usuario_trabajador` (`usuario_trabajador`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `instalacion`
--
ALTER TABLE `instalacion`
  MODIFY `reg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `localidad`
--
ALTER TABLE `localidad`
  MODIFY `Id_localidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `marcas_radios`
--
ALTER TABLE `marcas_radios`
  MODIFY `Id_marca_rad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `marcas_router`
--
ALTER TABLE `marcas_router`
  MODIFY `Id_marca_rou` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `modelos_radios`
--
ALTER TABLE `modelos_radios`
  MODIFY `Id_modelo_rad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `modelos_router`
--
ALTER TABLE `modelos_router`
  MODIFY `Id_modelo_rou` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  MODIFY `n_paquete` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `radios`
--
ALTER TABLE `radios`
  MODIFY `id_radio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ranchos`
--
ALTER TABLE `ranchos`
  MODIFY `id_rancho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `reg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `router`
--
ALTER TABLE `router`
  MODIFY `id_router` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `Reg_Solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_reporte`
--
ALTER TABLE `tipo_reporte`
  MODIFY `id_reporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_solicitudes`
--
ALTER TABLE `tipo_solicitudes`
  MODIFY `id_tipo_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipo_trabajador`
--
ALTER TABLE `tipo_trabajador`
  MODIFY `id_tipo_trabajador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  MODIFY `id_trabajador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `FK_Rancho_Cliente` FOREIGN KEY (`rancho_cliente`) REFERENCES `ranchos` (`id_rancho`),
  ADD CONSTRAINT `FK_usuario_cliente` FOREIGN KEY (`usuario_cliente`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `instalacion`
--
ALTER TABLE `instalacion`
  ADD CONSTRAINT `FK_Solicitud_Instalacion` FOREIGN KEY (`solicitud_instalacion`) REFERENCES `solicitudes` (`Reg_Solicitud`),
  ADD CONSTRAINT `FK_instalacion_paquete` FOREIGN KEY (`paquete`) REFERENCES `paquetes` (`n_paquete`),
  ADD CONSTRAINT `FK_instalacion_radio` FOREIGN KEY (`radio`) REFERENCES `radios` (`id_radio`),
  ADD CONSTRAINT `FK_instalacion_router` FOREIGN KEY (`router`) REFERENCES `router` (`id_router`),
  ADD CONSTRAINT `FK_instalacion_trabajador` FOREIGN KEY (`trabajador_instalacion`) REFERENCES `trabajadores` (`id_trabajador`);

--
-- Filtros para la tabla `radios`
--
ALTER TABLE `radios`
  ADD CONSTRAINT `FK_radio_marca` FOREIGN KEY (`marca_radio`) REFERENCES `marcas_radios` (`Id_marca_rad`),
  ADD CONSTRAINT `FK_radio_modelo` FOREIGN KEY (`modelo_radio`) REFERENCES `modelos_radios` (`Id_modelo_rad`);

--
-- Filtros para la tabla `ranchos`
--
ALTER TABLE `ranchos`
  ADD CONSTRAINT `FK_Localidad` FOREIGN KEY (`localidad`) REFERENCES `localidad` (`Id_localidad`);

--
-- Filtros para la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD CONSTRAINT `FK_Solicitud_Reporte` FOREIGN KEY (`solicitud_reporte`) REFERENCES `solicitudes` (`Reg_Solicitud`),
  ADD CONSTRAINT `FK_reporte_tipo_reporte` FOREIGN KEY (`reporte`) REFERENCES `tipo_reporte` (`id_reporte`),
  ADD CONSTRAINT `FK_reporte_trabajador` FOREIGN KEY (`trabajador_reporte`) REFERENCES `trabajadores` (`id_trabajador`);

--
-- Filtros para la tabla `router`
--
ALTER TABLE `router`
  ADD CONSTRAINT `FK_router_marca` FOREIGN KEY (`marca_router`) REFERENCES `marcas_router` (`Id_marca_rou`),
  ADD CONSTRAINT `FK_router_modelo` FOREIGN KEY (`modelo_router`) REFERENCES `modelos_router` (`Id_modelo_rou`);

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `FK_Solicitud_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `FK_tipo_solicitud` FOREIGN KEY (`tipo_solicitud`) REFERENCES `tipo_solicitudes` (`id_tipo_solicitud`);

--
-- Filtros para la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD CONSTRAINT `FK_trabajadores_tipo` FOREIGN KEY (`tipo_trabajador`) REFERENCES `tipo_trabajador` (`id_tipo_trabajador`),
  ADD CONSTRAINT `FK_usuario_trabajador` FOREIGN KEY (`usuario_trabajador`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
