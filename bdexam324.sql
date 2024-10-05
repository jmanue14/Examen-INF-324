-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-10-2024 a las 08:11:37
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdexam324`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `id_cuenta` int(11) NOT NULL,
  `nombre_cuenta` varchar(50) DEFAULT NULL,
  `rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`id_cuenta`, `nombre_cuenta`, `rol`) VALUES
(23, '20001', ''),
(24, '20002', ''),
(25, '20003', 'funcionario'),
(26, '20004', ''),
(27, '20005', ''),
(28, '20006', ''),
(29, '20007', 'funcionario'),
(30, '20008', 'usuario'),
(31, '20009', ''),
(32, '20010', 'funcionario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE `distrito` (
  `idDistrito` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`idDistrito`, `nombre`) VALUES
(1, 'Distrito 1'),
(2, 'Distrito 2'),
(3, 'Distrito 3'),
(4, 'Distrito 4'),
(5, 'Distrito 5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impuesto`
--

CREATE TABLE `impuesto` (
  `id_impuesto` int(11) NOT NULL,
  `codigo_catastral` varchar(20) NOT NULL,
  `tipo_impuesto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `impuesto`
--

INSERT INTO `impuesto` (`id_impuesto`, `codigo_catastral`, `tipo_impuesto`) VALUES
(18, 'F006', 'Bajo'),
(19, 'G007', 'Medio'),
(20, 'H008', 'Alto'),
(21, 'I009', 'Medio'),
(22, 'J010', 'Bajo'),
(23, 'K011', 'Alto'),
(24, 'L012', 'Medio'),
(25, 'M013', 'Bajo'),
(26, 'N014', 'Alto'),
(27, 'O015', 'Medio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `apellidomaterno` varchar(50) NOT NULL,
  `ci` varchar(20) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `id_cuenta` int(11) DEFAULT NULL,
  `distrito` varchar(50) NOT NULL,
  `zona` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `nombre`, `apellido`, `apellidomaterno`, `ci`, `direccion`, `id_cuenta`, `distrito`, `zona`) VALUES
(32, 'Luis', 'Mendez', '0', '201234', 'Calle 10', 23, '', ''),
(33, 'Sofia', 'Campos', '0', '202345', 'Avenida 11', 27, '', ''),
(34, 'Roberto', 'Garcia', '0', '203456', 'Pasaje 12', 32, '', ''),
(35, 'Daniela', 'Torrez', '0', '123456', 'Boulevard 13', 29, '', ''),
(36, 'Esteban', 'Quintana', '0', '123456', 'Alameda 14', 25, '', ''),
(37, 'Carmen', 'Rojo', '0', '206789', 'Calle 15', 26, '', ''),
(38, 'Diego', 'Soliz', '0', '207890', 'Avenida 16', 23, '', ''),
(39, 'Patricia', 'Lozano', '0', '208901', 'Pasaje 17', 24, '', ''),
(40, 'Oscar', 'Blanco', '0', '123456', 'Boulevard 18', 30, '', ''),
(41, 'Teresa', 'Prado', '0', '210123', 'Alameda 19', 31, '', ''),
(42, 'manue', 'huarachi', '0', '123', '1233', NULL, '3', '8'),
(43, 'manue', 'huarachi', '0', '123', '1233', NULL, '4', '10'),
(44, 'manue', 'huarachi', '0', '123', '1233', NULL, '1', '1'),
(45, 'm1', 'dd1', '', '121', '121', NULL, '3', '8'),
(46, 'asd', 'asda', '', '123', '123', NULL, '2', '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedad`
--

CREATE TABLE `propiedad` (
  `id_propiedad` int(11) NOT NULL,
  `codigo_catastral` varchar(20) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `id_persona` int(11) DEFAULT NULL,
  `latitud1` decimal(10,6) DEFAULT NULL,
  `longitud1` decimal(10,6) DEFAULT NULL,
  `latitud2` decimal(10,6) DEFAULT NULL,
  `longitud2` decimal(10,6) DEFAULT NULL,
  `superficie` decimal(10,2) DEFAULT NULL,
  `distrito` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `propiedad`
--

INSERT INTO `propiedad` (`id_propiedad`, `codigo_catastral`, `direccion`, `id_persona`, `latitud1`, `longitud1`, `latitud2`, `longitud2`, `superficie`, `distrito`) VALUES
(47, 'F006', 'Calle Sexta 600', 41, -16.510000, -68.160000, -16.511000, -68.161000, 80.00, 'Centro'),
(48, 'G007', 'Avenida Séptima 700', 36, -16.512000, -68.162000, -16.513000, -68.160000, 90.00, 'Sur'),
(49, 'H008', 'Pasaje Octavo 800', 37, -16.514000, -68.164000, -16.515000, -68.165000, 100.00, 'Este'),
(50, 'I009', 'Boulevard Noveno 900', 39, -16.516000, -68.166000, -16.517000, -68.167000, 85.00, 'Oeste'),
(51, 'J010', 'Alameda Décimo 1000', 38, -16.518000, -68.168000, -16.519000, -68.169000, 70.00, 'Norte'),
(52, 'K011', 'Calle Undécima 1100', 34, -16.520000, -68.170000, -16.521000, -68.171000, 90.50, 'Centro'),
(53, 'L012', 'Avenida Duodécima 1200', 33, -16.522000, -68.172000, -16.523000, -68.173000, 110.75, 'Sur'),
(54, 'M013', 'Pasaje Décimotercero 1300', 37, -16.524000, -68.174000, -16.525000, -68.175000, 120.00, 'Este'),
(55, 'N014', 'Boulevard Décimocuarto 1400', 38, -16.526000, -68.176000, -16.527000, -68.177000, 130.00, 'Oeste'),
(56, 'O015', 'Alameda Décimoquinto 1500', 40, -16.528000, -68.178000, -16.529000, -68.179000, 140.30, 'Norte'),
(59, '123', '123', 36, 123.000000, 123.000000, 132.000000, 123.000000, 123.00, '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE `zona` (
  `idZona` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `idDistrito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`idZona`, `nombre`, `idDistrito`) VALUES
(1, 'Centro', 1),
(2, 'San Pedro', 1),
(3, 'Sopocachi', 1),
(4, 'Miraflores', 2),
(5, 'Villa Fátima', 2),
(6, 'Bajo San Antonio', 2),
(7, 'Achumani', 3),
(8, 'Calacoto', 3),
(9, 'Obrajes', 3),
(10, 'Villa Copacabana', 4),
(11, 'Villa Armonía', 4),
(12, 'Chasquipampa', 4),
(13, 'Pampahasi', 5),
(14, 'Alto Obrajes', 5),
(15, 'Bella Vista', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`id_cuenta`);

--
-- Indices de la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`idDistrito`);

--
-- Indices de la tabla `impuesto`
--
ALTER TABLE `impuesto`
  ADD PRIMARY KEY (`id_impuesto`),
  ADD KEY `codigo_catastral` (`codigo_catastral`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `id_cuenta` (`id_cuenta`);

--
-- Indices de la tabla `propiedad`
--
ALTER TABLE `propiedad`
  ADD PRIMARY KEY (`id_propiedad`),
  ADD UNIQUE KEY `codigo_catastral` (`codigo_catastral`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`idZona`),
  ADD KEY `idDistrito` (`idDistrito`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `id_cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `distrito`
--
ALTER TABLE `distrito`
  MODIFY `idDistrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `impuesto`
--
ALTER TABLE `impuesto`
  MODIFY `id_impuesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `propiedad`
--
ALTER TABLE `propiedad`
  MODIFY `id_propiedad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `zona`
--
ALTER TABLE `zona`
  MODIFY `idZona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `impuesto`
--
ALTER TABLE `impuesto`
  ADD CONSTRAINT `impuesto_ibfk_1` FOREIGN KEY (`codigo_catastral`) REFERENCES `propiedad` (`codigo_catastral`) ON DELETE CASCADE;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`id_cuenta`) REFERENCES `cuenta` (`id_cuenta`) ON DELETE CASCADE;

--
-- Filtros para la tabla `propiedad`
--
ALTER TABLE `propiedad`
  ADD CONSTRAINT `propiedad_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE CASCADE;

--
-- Filtros para la tabla `zona`
--
ALTER TABLE `zona`
  ADD CONSTRAINT `zona_ibfk_1` FOREIGN KEY (`idDistrito`) REFERENCES `distrito` (`idDistrito`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
