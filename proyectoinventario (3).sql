-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3308
-- Tiempo de generación: 04-08-2022 a las 03:54:40
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectoinventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anio`
--

CREATE TABLE `anio` (
  `id` int(5) NOT NULL,
  `codigo` int(10) NOT NULL,
  `anio` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `anio`
--

INSERT INTO `anio` (`id`, `codigo`, `anio`) VALUES
(1, 24516, 2022),
(2, 24156, 2021),
(4, 24516, 2019),
(5, 2145, 2018),
(6, 1425, 2017);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id` int(5) NOT NULL,
  `area` varchar(20) NOT NULL,
  `siglo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id`, `area`, `siglo`) VALUES
(3, 'Manzano', 'Mz'),
(4, 'DIRECCION', 'dir'),
(7, 'Tecnica', 'tec'),
(8, 'Recursos Humano', 'rrhh'),
(9, '5664', 'dsfsdf'),
(10, 'dvsd', 'dsvsd'),
(11, 'ni', 'kopjp'),
(12, '45', 'hjn');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `id` int(5) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `area` varchar(20) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `fabricante` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `anio` year(4) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `serie` varchar(20) NOT NULL,
  `condicion` varchar(10) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `observacion` varchar(30) DEFAULT NULL,
  `marca` varchar(20) NOT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id`, `codigo`, `area`, `categoria`, `fabricante`, `color`, `anio`, `modelo`, `serie`, `condicion`, `descripcion`, `observacion`, `marca`, `estado`) VALUES
(5, '0254', 'Tecnica', 'Pesado', 'Huawei', 'Morado', 2019, 'P30', 'Xdfd4d5f', 'Activo', 'Smartphon', 'Excelente', 'Huawei', 'Bueno'),
(9, '2541', 'Tecnica', 'Hola', 'Huawei', 'Purpura', 2019, 'RX-80', 'Dfbdfbd', 'Inactivo', 'Computadora', 'Revisado', 'Huawei', 'Bueno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(5) NOT NULL,
  `codigo` int(10) NOT NULL,
  `categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `codigo`, `categoria`) VALUES
(12, 257, 'Ma'),
(13, 258, 'Cars'),
(15, 1215, 'Pesado'),
(16, 45, 'Sdfsf'),
(17, 45, 'Dv'),
(18, 86, 'Dsfsdf'),
(19, 151, 'Hola'),
(20, 26, 'DSsdf'),
(21, 2141, 'dfsdf'),
(22, 62556, 'gsdg'),
(23, 65, 'gdfg'),
(24, 5651, 'dgffd'),
(25, 16415, 'dsvsdv'),
(26, 55165, 'dfdsf'),
(27, 2651, 'dvds'),
(28, 215, 'sdvds'),
(29, 51454, 'frfer'),
(30, 545, 'dfvds'),
(31, 1546, 'sDvsdv'),
(32, 2651, 'dfaf'),
(33, 5414564, 'dvdvd'),
(34, 454, 'dsfsdf'),
(35, 56546, 'knnjo'),
(36, 56546, 'KJID'),
(37, 656464, 'ojdsofsj'),
(38, 654165, 'dlmfsd'),
(39, 56465, 'ojoihjo'),
(40, 5465, 'njnlk'),
(41, 545, 'nnl'),
(42, 6564, 'guiuh'),
(43, 5846, 'jkhoihoi'),
(44, 15445, 'mokno'),
(45, 54, 'fdvdfv'),
(46, 455646, 'nojo'),
(47, 656, 'mkjodkf'),
(48, 5465, 'jiojo'),
(50, 54564, 'jdjofdkv'),
(51, 54654, 'dvdfvsd'),
(52, 1546, 'dnvkfm'),
(53, 455, 'dvgdfgvd'),
(54, 514654, 'jiojo'),
(55, 484849, 'dkfodfod'),
(56, 565, 'jioi'),
(57, 844, 'dvdf'),
(58, 844, 'dvdf'),
(59, 8947894, 'kkj'),
(60, 566, 'oijoij'),
(61, 565, 'kjokj'),
(62, 6564, 'dkfocisdj'),
(63, 55656, 'dzvdv'),
(64, 2451, 'nuevos'),
(65, 54152, 'isadd'),
(66, 2151, 'ihuhuih'),
(67, 2151, 'ihuhuih'),
(68, 4554, 'dsfsdf'),
(69, 266, 'nknkj'),
(70, 1454, 'jokj'),
(71, 1454, 'jokj'),
(72, 6265, 'joikjho'),
(73, 2651, 'wefwafd'),
(74, 645, 'dfsdf'),
(75, 564, 'jiojoi'),
(76, 8464, 'ijo'),
(77, 545645, 'iji'),
(78, 654, 'koivjsd'),
(79, 464, 'mojii'),
(80, 565, 'sdmkocjksdo'),
(81, 56564, 'dsfd'),
(82, 454, 'hjk'),
(83, 5465, 'nkn'),
(84, 48465, 'khoi'),
(85, 565, 'jkj'),
(86, 5465, 'ojoi'),
(87, 45646, 'khjiuj'),
(88, 64, 'ojioih'),
(89, 5465, 'kmkjh'),
(90, 526, 'jijoi'),
(91, 656, 'dgdg'),
(92, 5984, 'dcsd'),
(93, 545, 'dfsdf'),
(94, 2665, 'dvdvd'),
(95, 62665, 'knoin'),
(96, 5464, 'kokn'),
(97, 265, 'noih'),
(98, 656, 'Efvawde'),
(99, 1452, 'Laptop'),
(100, 65, 'Hji'),
(101, 656, 'Knhk'),
(102, 56, 'Joj');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE `color` (
  `id` int(5) NOT NULL,
  `codigo` int(10) NOT NULL,
  `color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`id`, `codigo`, `color`) VALUES
(2, 2541, 'Amarillo'),
(3, 2542, 'Azul'),
(4, 2543, 'Rojo'),
(5, 2544, 'Naranja'),
(6, 5659, 'Morado'),
(7, 58548, 'Cafe'),
(8, 1341, 'negro'),
(9, 1451, 'Celeste'),
(10, 2546, 'Purpura'),
(11, 2145, 'plomo'),
(12, 515646, 'Blank'),
(13, 654, 'rojo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fabricante`
--

CREATE TABLE `fabricante` (
  `id` int(5) NOT NULL,
  `codigo` int(10) NOT NULL,
  `fabricante` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fabricante`
--

INSERT INTO `fabricante` (`id`, `codigo`, `fabricante`) VALUES
(1, 254, 'Apple'),
(3, 214, 'LG'),
(4, 256, 'Huawei'),
(5, 25456, 'Xiaomi'),
(6, 2145, 'Lambo'),
(7, 25646, 'Pilas'),
(8, 54, 'iho'),
(9, 6, 'xv'),
(10, 241, 'dfg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombres_usuario` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombres_usuario`, `username`, `password`) VALUES
(1, 'Daniel Asanza', 'dasanza79', '62318365d03bb119c953aa6222d41e58'),
(2, 'Miguel Jaramillo', 'mjaramillo', '940bae10ca539c9d097187f5d5cc554f'),
(10, 'Heber Illanes', 'hillanes', 'a2b101bfe2e4288328d8dd73b5cb8f06'),
(11, 'Kevin Arevalo', 'karevalo', '83f3f4a6208b5a83728ba90ee94111ee');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anio`
--
ALTER TABLE `anio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fabricante`
--
ALTER TABLE `fabricante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anio`
--
ALTER TABLE `anio`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `fabricante`
--
ALTER TABLE `fabricante`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
