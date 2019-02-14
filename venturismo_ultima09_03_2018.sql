-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-03-2018 a las 21:53:08
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `venturismo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `ADM_ID` int(11) NOT NULL,
  `ADM_USUARIO` varchar(50) NOT NULL,
  `ADM_CLAVE` varchar(50) DEFAULT NULL,
  `PER_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`ADM_ID`, `ADM_USUARIO`, `ADM_CLAVE`, `PER_ID`) VALUES
(1, 'lfawks0', 'KHkpxKx', 1),
(2, 'driba1', 'NepxYM10n2Bn', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agencia`
--

CREATE TABLE `agencia` (
  `AG_ID` int(11) NOT NULL,
  `AG_TIPO_RIF` varchar(5) NOT NULL,
  `AG_RIF` varchar(20) NOT NULL,
  `AG_TIPO` varchar(50) NOT NULL,
  `AG_NOMBRE` varchar(50) NOT NULL,
  `AG_PAIS` varchar(50) NOT NULL,
  `AG_ESTADO` varchar(50) NOT NULL,
  `AG_CIUDAD` varchar(50) NOT NULL,
  `AG_DIRECCION` varchar(100) NOT NULL,
  `AG_TELEFONO` varchar(20) NOT NULL,
  `AG_TELEFONO2` varchar(20) DEFAULT NULL,
  `AG_HORA_APERTURA` varchar(50) NOT NULL,
  `AG_HORA_CIERRE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `agencia`
--

INSERT INTO `agencia` (`AG_ID`, `AG_TIPO_RIF`, `AG_RIF`, `AG_TIPO`, `AG_NOMBRE`, `AG_PAIS`, `AG_ESTADO`, `AG_CIUDAD`, `AG_DIRECCION`, `AG_TELEFONO`, `AG_TELEFONO2`, `AG_HORA_APERTURA`, `AG_HORA_CIERRE`) VALUES
(2, '', 'j-987654321', '', 'despegar', '', '', '', 'Big-low center', '0241-1234567', NULL, '', ''),
(3, '', 'J-123456781', '', 'aerolin', '', '', '', 'ygua', '0241-0000000', NULL, '', ''),
(12, '', 'j-1223456789', '', 'TuriZuela', '', '', '', 'av-universidad', '0241-5114547', NULL, '', ''),
(14, '', 'J-1123456781', '', 'TuriZuela', '', '', '', 'av-universidad', '0241-5114547', NULL, '', ''),
(17, '', 'J-156781', '', 'TuriZuela', '', '', '', 'av-universidad', '0241-5114547', NULL, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleto`
--

CREATE TABLE `boleto` (
  `BOL_ID` int(11) NOT NULL,
  `BOL_NUMERO` int(11) DEFAULT NULL,
  `BOL_FECHA` varchar(25) DEFAULT NULL,
  `BOL_TIPO` varchar(50) DEFAULT NULL,
  `PER_ID` int(11) NOT NULL,
  `VIJ_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `boleto`
--

INSERT INTO `boleto` (`BOL_ID`, `BOL_NUMERO`, `BOL_FECHA`, `BOL_TIPO`, `PER_ID`, `VIJ_ID`) VALUES
(2, 123, '10/03/2018', 'Pasajes Bus', 1, 1),
(3, 123, '10/03/2018', 'Pasajes Bus', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `CIU_ID` int(11) NOT NULL,
  `CIU_NOMBRE` varchar(100) DEFAULT NULL,
  `CIU_LATITUD` varchar(50) DEFAULT NULL,
  `CIU_LONGITUD` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `COM_ID` int(11) NOT NULL,
  `PER_ID` int(11) NOT NULL,
  `VIJ_ID` int(11) NOT NULL,
  `COM_TPAGO` varchar(50) DEFAULT NULL,
  `COM_TCOMPRA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `EST_ID` int(11) NOT NULL,
  `EST_NOMBRE` varchar(100) DEFAULT NULL,
  `EST_LATITUD` varchar(50) DEFAULT NULL,
  `EST_LONGITUD` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localizacion`
--

CREATE TABLE `localizacion` (
  `LOC_ID` bigint(20) NOT NULL,
  `LOC_DESC` varchar(500) NOT NULL,
  `LOC_LAT` varchar(500) NOT NULL,
  `LOC_LONG` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `localizacion`
--

INSERT INTO `localizacion` (`LOC_ID`, `LOC_DESC`, `LOC_LAT`, `LOC_LONG`) VALUES
(1, 'Esta en camino', '10000', '18524'),
(2, 'Esta en EL FINA', '10000', '18524');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `PAI_ID` int(11) NOT NULL,
  `PAI_NOMBRE` varchar(100) DEFAULT NULL,
  `PAI_LATITUD` varchar(50) DEFAULT NULL,
  `PAI_LONGITUD` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `PER_ID` int(11) NOT NULL,
  `PER_TIPO_DOC` varchar(2) NOT NULL,
  `PER_CEDULA` varchar(20) DEFAULT NULL,
  `PER_NOMBRES` varchar(50) DEFAULT NULL,
  `PER_APELLIDOS` varchar(50) DEFAULT NULL,
  `PER_EMAIL` varchar(50) DEFAULT NULL,
  `PER_FECHANAC` varchar(20) DEFAULT NULL,
  `PER_NACIONALIDAD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`PER_ID`, `PER_TIPO_DOC`, `PER_CEDULA`, `PER_NOMBRES`, `PER_APELLIDOS`, `PER_EMAIL`, `PER_FECHANAC`, `PER_NACIONALIDAD`) VALUES
(1, '', '31770874', 'Janene', 'Pridgeon', 'jpridgeon0@gnu.org', '04/08/1998', ''),
(2, '', '14482471', 'Gaven', 'Loseke', 'gloseke1@mapquest.com', '13/10/1957', ''),
(3, '', '80200258', 'Phillida', 'Chatt', 'pchatt2@dropbox.com', '25/11/1975', ''),
(4, '', '18641154', 'Flinn', 'Fearns', 'ffearns3@cisco.com', '27/09/1977', ''),
(5, '', '33660894', 'Sigrid', 'Normansell', 'snormansell4@shop-pro.jp', '14/11/1954', ''),
(6, '', '06694479', 'Freeman', 'Hymer', 'fhymer5@marriott.com', '06/09/1953', ''),
(7, '', '20130543', 'Wright', 'Irce', 'wirce6@mozilla.com', '09/08/1994', ''),
(8, '', '32926856', 'Gwendolyn', 'Rediers', 'grediers7@ocn.ne.jp', '19/12/1964', ''),
(9, '', '24263364', 'Maurits', 'Theriot', 'mtheriot8@indiatimes.com', '23/01/1983', ''),
(10, '', '55764696', 'Betsy', 'Consadine', 'bconsadine9@ibm.com', '02/12/1999', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE `ruta` (
  `RUT_ID` int(11) NOT NULL,
  `RUT_PAI_ID_O` varchar(50) DEFAULT NULL,
  `RUT_EST_ID_O` varchar(50) DEFAULT NULL,
  `RUT_CIU_ID_O` varchar(50) DEFAULT NULL,
  `LOC_ORIGEN` bigint(20) DEFAULT NULL,
  `RUT_PAI_ID_D` varchar(50) DEFAULT NULL,
  `RUT_EST_ID_D` varchar(50) DEFAULT NULL,
  `RUT_CIU_ID_D` varchar(50) DEFAULT NULL,
  `LOC_DESTINO` bigint(20) DEFAULT NULL,
  `TRANS_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ruta`
--

INSERT INTO `ruta` (`RUT_ID`, `RUT_PAI_ID_O`, `RUT_EST_ID_O`, `RUT_CIU_ID_O`, `LOC_ORIGEN`, `RUT_PAI_ID_D`, `RUT_EST_ID_D`, `RUT_CIU_ID_D`, `LOC_DESTINO`, `TRANS_ID`) VALUES
(1, '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, 3),
(2, '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte`
--

CREATE TABLE `transporte` (
  `TRANS_ID` int(11) NOT NULL,
  `TRANS_PLACA` varchar(50) NOT NULL,
  `TRANS_TIPO` varchar(25) NOT NULL,
  `TRANS_PESO` double NOT NULL,
  `TRANS_CAPACIDAD` double NOT NULL,
  `TRANS_LINEA` varchar(100) NOT NULL,
  `AGENCIA_AG_ID` int(11) NOT NULL,
  `LOC_ID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `transporte`
--

INSERT INTO `transporte` (`TRANS_ID`, `TRANS_PLACA`, `TRANS_TIPO`, `TRANS_PESO`, `TRANS_CAPACIDAD`, `TRANS_LINEA`, `AGENCIA_AG_ID`, `LOC_ID`) VALUES
(3, 'JAH7', 'terrestre', 2000, 52, '', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `USU_ID` int(11) NOT NULL,
  `USU_USUARIO` varchar(50) NOT NULL,
  `USU_CLAVE` varchar(50) DEFAULT NULL,
  `PER_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`USU_ID`, `USU_USUARIO`, `USU_CLAVE`, `PER_ID`) VALUES
(1, 'mlafaye0', 'XMMMUfwWXB', 3),
(2, 'pludlam1', 'nYM6an', 4),
(3, 'vrisley2', '3Z2gRQkPxMF', 5),
(4, 'cjays3', 'G8Eofx6G', 6),
(5, 'dalan4', 'lctCipqQ5j2', 7),
(6, 'ljandac5', 'SfjiwkhV', 8),
(7, 'bandreu6', 'rnWJv3Z6Pedu', 9),
(8, 'gshatliffe7', 'bjiI1rxXxh', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE `viaje` (
  `VIJ_ID` int(11) NOT NULL,
  `VIJ_FECHA` varchar(20) DEFAULT NULL,
  `VIJ_TIPO` varchar(50) DEFAULT NULL,
  `VIJ_COSTO` double DEFAULT NULL,
  `CANT_BOL` int(11) DEFAULT NULL,
  `AGENCIA_AG_ID` int(11) NOT NULL,
  `RUT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`VIJ_ID`, `VIJ_FECHA`, `VIJ_TIPO`, `VIJ_COSTO`, `CANT_BOL`, `AGENCIA_AG_ID`, `RUT_ID`) VALUES
(1, '10/03/2018', 'aereo', 250, NULL, 2, 1),
(2, '10/03/2018', 'TERRESTRE', 250, NULL, 3, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`ADM_ID`),
  ADD UNIQUE KEY `ADM_USUARIO` (`ADM_USUARIO`),
  ADD KEY `fk_PER_ID_3` (`PER_ID`);

--
-- Indices de la tabla `agencia`
--
ALTER TABLE `agencia`
  ADD PRIMARY KEY (`AG_ID`),
  ADD UNIQUE KEY `AG_RIF` (`AG_RIF`);

--
-- Indices de la tabla `boleto`
--
ALTER TABLE `boleto`
  ADD PRIMARY KEY (`BOL_ID`),
  ADD KEY `fk_PER_ID_2` (`PER_ID`) USING BTREE,
  ADD KEY `fk_VIJ_ID_2` (`VIJ_ID`);

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`CIU_ID`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`COM_ID`),
  ADD KEY `fk_PER_ID` (`PER_ID`),
  ADD KEY `fk_VIJ_ID` (`VIJ_ID`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`EST_ID`);

--
-- Indices de la tabla `localizacion`
--
ALTER TABLE `localizacion`
  ADD PRIMARY KEY (`LOC_ID`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`PAI_ID`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`PER_ID`),
  ADD UNIQUE KEY `PER_EMAIL` (`PER_EMAIL`);

--
-- Indices de la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD PRIMARY KEY (`RUT_ID`),
  ADD KEY `fk_RUT_TRANS` (`TRANS_ID`),
  ADD KEY `fk_LOC_ORIGEN` (`LOC_ORIGEN`),
  ADD KEY `fk_LOC_DESTINO` (`LOC_DESTINO`);

--
-- Indices de la tabla `transporte`
--
ALTER TABLE `transporte`
  ADD PRIMARY KEY (`TRANS_ID`,`AGENCIA_AG_ID`),
  ADD KEY `fk_TRANSPORTE_AGENCIA1_idx` (`AGENCIA_AG_ID`),
  ADD KEY `fk_LOC_id` (`LOC_ID`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`USU_ID`),
  ADD UNIQUE KEY `USU_USUARIO` (`USU_USUARIO`),
  ADD KEY `fk_PER_ID_4` (`PER_ID`);

--
-- Indices de la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`VIJ_ID`,`AGENCIA_AG_ID`),
  ADD KEY `fk_VIAJE_AGENCIA1_idx` (`AGENCIA_AG_ID`),
  ADD KEY `fk_RUT_ID` (`RUT_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `ADM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `agencia`
--
ALTER TABLE `agencia`
  MODIFY `AG_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `boleto`
--
ALTER TABLE `boleto`
  MODIFY `BOL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `CIU_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `COM_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `EST_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `localizacion`
--
ALTER TABLE `localizacion`
  MODIFY `LOC_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `PAI_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `PER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `ruta`
--
ALTER TABLE `ruta`
  MODIFY `RUT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `transporte`
--
ALTER TABLE `transporte`
  MODIFY `TRANS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `USU_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `viaje`
--
ALTER TABLE `viaje`
  MODIFY `VIJ_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `fk_PER_ID_3` FOREIGN KEY (`PER_ID`) REFERENCES `persona` (`PER_ID`);

--
-- Filtros para la tabla `boleto`
--
ALTER TABLE `boleto`
  ADD CONSTRAINT `fk_PER_ID_2` FOREIGN KEY (`PER_ID`) REFERENCES `persona` (`PER_ID`),
  ADD CONSTRAINT `fk_VIJ_ID_2` FOREIGN KEY (`VIJ_ID`) REFERENCES `viaje` (`VIJ_ID`);

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `fk_PER_ID` FOREIGN KEY (`PER_ID`) REFERENCES `persona` (`PER_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_VIJ_ID` FOREIGN KEY (`VIJ_ID`) REFERENCES `viaje` (`VIJ_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD CONSTRAINT `fk_LOC_DESTINO` FOREIGN KEY (`LOC_DESTINO`) REFERENCES `localizacion` (`LOC_ID`),
  ADD CONSTRAINT `fk_LOC_ORIGEN` FOREIGN KEY (`LOC_ORIGEN`) REFERENCES `localizacion` (`LOC_ID`),
  ADD CONSTRAINT `fk_RUT_TRANS` FOREIGN KEY (`TRANS_ID`) REFERENCES `transporte` (`TRANS_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `transporte`
--
ALTER TABLE `transporte`
  ADD CONSTRAINT `fk_LOC_id` FOREIGN KEY (`LOC_ID`) REFERENCES `localizacion` (`LOC_ID`),
  ADD CONSTRAINT `fk_TRANSPORTE_AGENCIA1` FOREIGN KEY (`AGENCIA_AG_ID`) REFERENCES `agencia` (`AG_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_USUARIO_PERSONA1` FOREIGN KEY (`PER_ID`) REFERENCES `persona` (`PER_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD CONSTRAINT `fk_RUT_ID` FOREIGN KEY (`RUT_ID`) REFERENCES `ruta` (`RUT_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_VIAJE_AGENCIA1` FOREIGN KEY (`AGENCIA_AG_ID`) REFERENCES `agencia` (`AG_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
