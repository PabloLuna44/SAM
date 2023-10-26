-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2023 a las 08:40:03
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
-- Base de datos: `zapateria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `idAdmin` int(11) NOT NULL,
  `password` varchar(245) NOT NULL,
  `nombreAdmin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`idAdmin`, `password`, `nombreAdmin`) VALUES
(0, '$2y$10$Tvw4Y5xbMhcdxafYPAcgl.SB//ruFr82UkMVxup2Q97SNL3n/C872', ''),
(1, '$2y$10$TuGkfBHu.09tiNnV2FxS8e62OV2Op4iR9xwg7eD4tYKPgT/Y2Vjny', ''),
(2, '$2y$10$0c.PFrREC6pHUB1CuwU.ru3C6LLlqf3YWwoN25C2ufJgsWlFEcXGG', ''),
(3, '$2y$10$yL/vtznh8GDgJZTvdXS24utCQ9.0fQKme8SlNMFViBpGTGKnHwZQG', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `NombreCliente` varchar(50) NOT NULL,
  `ClaveCliente` int(11) NOT NULL,
  `DomicilioCliente` varchar(50) NOT NULL,
  `TelefonoCliente` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `NumeroControl` int(11) NOT NULL,
  `ClaveCliente` int(11) NOT NULL,
  `NombreCliente` varchar(50) NOT NULL,
  `Domicilio` varchar(50) NOT NULL,
  `Delegacion` varchar(30) NOT NULL,
  `CP` varchar(5) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Modelo` varchar(20) NOT NULL,
  `Descripcion` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

CREATE TABLE `trabajador` (
  `NombreVendedor` varchar(50) NOT NULL,
  `IdVendedor` int(11) NOT NULL,
  `password` varchar(245) NOT NULL,
  `Direccion` varchar(30) NOT NULL,
  `Sexo` varchar(1) NOT NULL,
  `Horario` time NOT NULL,
  `Telefono` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`NombreVendedor`, `IdVendedor`, `password`, `Direccion`, `Sexo`, `Horario`, `Telefono`) VALUES
('', 0, '$2y$10$/sT/WNUEkwl3AZQsWpzXCOVS9LzYVOXvGxI2WLRoD1GY4nRefFBbW', '', '', '00:00:00', ''),
('', 1, '$2y$10$1GRJOnZH9ToY.4KLhn2A1utAggc.ukVqXYlTHiqScNrdHKmO8qohe', '', '', '00:00:00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `NombreVendedor` varchar(50) NOT NULL,
  `IdVendedor` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Modelo` varchar(20) NOT NULL,
  `PrecioUnitario` float NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Descuento` float NOT NULL,
  `IVA` float NOT NULL,
  `Total` float NOT NULL,
  `IdVenta` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zapatos`
--

CREATE TABLE `zapatos` (
  `NumeroControl` int(11) NOT NULL,
  `Marca` varchar(30) NOT NULL,
  `Modelo` varchar(20) NOT NULL,
  `Material` varchar(20) NOT NULL,
  `Color` varchar(10) NOT NULL,
  `Numero` int(11) NOT NULL,
  `TipoCalzado` varchar(30) NOT NULL,
  `Img` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ClaveCliente`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`NumeroControl`);

--
-- Indices de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD PRIMARY KEY (`IdVendedor`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`IdVenta`);

--
-- Indices de la tabla `zapatos`
--
ALTER TABLE `zapatos`
  ADD PRIMARY KEY (`NumeroControl`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
