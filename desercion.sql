-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2021 a las 01:48:50
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_desercion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprendiz`
--

CREATE TABLE `aprendiz` (
  `apr_id` varchar(20) NOT NULL,
  `apr_nombre` varchar(80) NOT NULL,
  `apr_apellido` varchar(80) NOT NULL,
  `apr_telefono` varchar(20) NOT NULL,
  `ciu_id` varchar(20) NOT NULL,
  `tii_id` int(20) NOT NULL,
  `rh_id` int(20) NOT NULL,
  `apr_genero` varchar(20) NOT NULL,
  `apr_edad` int(3) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aprendiz`
--

INSERT INTO `aprendiz` (`apr_id`, `apr_nombre`, `apr_apellido`, `apr_telefono`, `ciu_id`, `tii_id`, `rh_id`, `apr_genero`, `apr_edad`, `usuario_id`) VALUES
('1010005639', 'Jean Sebastian', 'Giron Montes', '3002450173', '76834', 1, 4, 'Masculino', 21, 1010005639),
('2010005639', 'Jose Alejandro', 'Sanchez', '3053996975', '76001', 5, 2, 'Masculino', 25, 2010005639),
('31152008', 'juan', 'benito', '3158456545', '66001', 1, 7, 'masculino', 23, 31152008),
('3180005639', 'Sebastian', 'Ayala ortega', '3187212919', '76147', 1, 5, 'Masculino', 20, 2147483647),
('431211563', 'Daniel', 'Medina Guillar', '4013996975', '76001', 4, 6, 'Masculino', 21, 431211563),
('600212812', 'Gloria Mary', 'Medina Valencia', '4022450173', '76001', 1, 3, 'Femenino', 28, 600212812),
('67016915', 'Sandra Milena', 'Ramirez Naranjo', '3157214881', '76111', 1, 7, 'Femenino', 31, 67016915);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `causa_desercion`
--

CREATE TABLE `causa_desercion` (
  `cad_codigo` int(20) NOT NULL,
  `cad_descripcion` varchar(80) NOT NULL,
  `cad_mat_estado` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `causa_desercion`
--

INSERT INTO `causa_desercion` (`cad_codigo`, `cad_descripcion`, `cad_mat_estado`) VALUES
(6, 'Problema medico', 'Activa'),
(7, 'Problemas familiares', 'Activa'),
(8, 'Inasistencia 3 dÃ­as seguidos', 'Activa'),
(10, 'Mal comportamiento', 'Activo'),
(12, 'Incumplimiento de actividades', 'Activo'),
(13, 'No inicio el proceso de formaciÃ³n', 'Activo'),
(14, 'No cumpliÃ³ plan de mejoramiento', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro`
--

CREATE TABLE `centro` (
  `cen_codigo` varchar(20) NOT NULL,
  `cen_descripcion` varchar(80) NOT NULL,
  `cen_telefono` varchar(20) NOT NULL,
  `cen_direccion` varchar(60) NOT NULL,
  `ciu_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `centro`
--

INSERT INTO `centro` (`cen_codigo`, `cen_descripcion`, `cen_telefono`, `cen_direccion`, `ciu_id`) VALUES
('11_9303', 'centro de gestion de mercados logistica y tecnologias de la informacion', '5941301 Ext. 16973', 'Cl 52 No. 13-65', '76001'),
('11_9405', 'cen de servicios financieros', '5461600 Ext. 13506', 'Cra. 13 No. 65-10', '11001'),
('11_9406', 'centro nacional de hoteleria turismo y alimentos', '5960100 Ext. 15455', 'Cra. 30 No. 15-53', '11001'),
('11_9508', 'centro de formacion actividad fisica y cultural', '5461500 Ext. 16573', 'Trans. 79 No, 41D-15', '11001'),
('63_9120', 'centro agroindustrial', '7494996', 'Avenida Centenario carrera 6 # 44N-15', '63001'),
('63_9231', 'centro para el desarrollo tecnologico de la construccion', '7494999', 'Carrera 6 AV Centenario # 47N-15', '63001'),
('63_9538', 'centro de comercio industria y turismo', '7461417', 'Cra. 18 No. 7-58', '63001'),
('66_9308', 'centro de comercio y servicios', '3135800 Ext. 63200', 'Cra. 8 No. 26-79', '66001'),
('76_9227', 'centro de electricidad y automatizacion industrial', '4315800 Ext. 22581', 'Cl 52 No. 2 Bis-15', '76001'),
('76_9228', 'centro de la construccion', '4315800/4411212/ 448', 'Cl 34 No. 17B-23', '11001'),
('76_9229', 'centro de diseno tecnologico industrial', '4315800 Ext. 22667', 'Cl. 72k ##26J - 97', '76001'),
('76_9230', 'centro nacional de asistencia tecnica a la industria', '4315800 Ext. 22667', 'Cl 52 No. 2Bis-15', '76001'),
('76_9311', 'Centro de formacion', '3002450173', 'calle 10c #43-67', '76834'),
('76_9543', 'centro de tecnologias agroindustriales', '2119999', 'Cra. 9 #12-141', '76147'),
('76_9544', 'centro de biotecnologia industrial', '2750968 Ext. 23737-2', 'Cl 40 No. 30-44', '76520');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `ciu_id` varchar(20) NOT NULL,
  `ciu_nombre` varchar(60) NOT NULL,
  `dep_codigo` varchar(20) NOT NULL,
  `ciu_cant_habitantes` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`ciu_id`, `ciu_nombre`, `dep_codigo`, `ciu_cant_habitantes`) VALUES
('66001', 'pereira', '05', '483925'),
('76001', 'cali', '76', '2523925'),
('76111', 'buga', '76', '113931'),
('76147', 'cartago', '76', '136466'),
('76520', 'palmira', '76', '316690'),
('76834', 'tulua', '76', '227043');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `dep_codigo` varchar(20) NOT NULL,
  `dep_nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`dep_codigo`, `dep_nombre`) VALUES
('05', 'antioquia'),
('08', 'atlantico'),
('11', 'bogota'),
('12234', 'antioquia'),
('123', 'antioquia'),
('13', 'bolivar'),
('15', 'boyaca'),
('17', 'caldas'),
('18', 'caqueta'),
('19', 'cauca'),
('20', 'cesar'),
('23', 'cordoba'),
('25', 'cundinamarca'),
('27', 'choco'),
('41', 'huila'),
('44', 'la guajira'),
('47', 'magdalena'),
('50', 'meta'),
('52', 'narinio'),
('54', 'norte de santander'),
('63', 'quindio'),
('66', 'risaralda'),
('68', 'santander'),
('70', 'sucre'),
('76', 'valle del cauca'),
('81', 'arauca'),
('85', 'casanare'),
('86', 'putumayo'),
('88', 'san andres'),
('91', 'amazonas'),
('94', 'guainia'),
('95', 'guaviare'),
('97', 'vaupes'),
('99', 'vichada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desercion`
--

CREATE TABLE `desercion` (
  `der_id` int(11) NOT NULL,
  `der_fecha` varchar(20) NOT NULL,
  `apr_id` varchar(20) NOT NULL,
  `fic_numero` varchar(20) NOT NULL,
  `cad_codigo` varchar(20) NOT NULL,
  `der_fecha_desercion` varchar(20) NOT NULL,
  `der_fase` varchar(50) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `estado` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `desercion`
--

INSERT INTO `desercion` (`der_id`, `der_fecha`, `apr_id`, `fic_numero`, `cad_codigo`, `der_fecha_desercion`, `der_fase`, `usuario_id`, `estado`) VALUES
(79, '', '31152008', '930250', '7', '14/12/21', 'Lectiva', 31152008, 'ACEPTADO'),
(80, '', '31152008', '288084', '6', '14/12/21', 'Practica', 31152008, 'RECHAZADO'),
(81, '', '31152008', '288084', '7', '14/12/21', 'Lectiva', 31152008, 'ACEPTADO'),
(82, '', '31152008', '3212828', '7', '14/12/21', 'Practica', 31152008, 'RECHAZADO'),
(83, '', '31152008', '288084', '6', '', 'Lectiva', 31152008, 'PENDIENTE'),
(84, '', '600212812', '22404698', '7', '', 'Practica', 600212812, 'PENDIENTE'),
(85, '', '67016915	', '199533', '10', '', 'Lectiva', 67016915, 'PENDIENTE'),
(86, '', '3180005639', '22404698', '13', '', 'Lectiva', 2147483647, 'PENDIENTE'),
(87, '', '431211563', '2206568', '10', '', 'Practica', 431211563, 'PENDIENTE'),
(88, '', '2010005639', '288084', '12', '', 'Practica', 2010005639, 'PENDIENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha`
--

CREATE TABLE `ficha` (
  `fic_numero` varchar(20) NOT NULL,
  `pro_codigo` int(20) NOT NULL,
  `fic_fecha_inicial` varchar(20) NOT NULL,
  `der_fecha_fin` varchar(20) NOT NULL,
  `cen_codigo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ficha`
--

INSERT INTO `ficha` (`fic_numero`, `pro_codigo`, `fic_fecha_inicial`, `der_fecha_fin`, `cen_codigo`) VALUES
('121907', 6, '2022-06-15', '2023-06-15', '11_9303'),
('132113', 5, '2022-04-15', '2023-04-15', '11_9303'),
('185670', 3, '2021-12-13', '2022-12-13', '76_9229'),
('199533', 4, '2022-01-15', '2023-01-15', '76_9543'),
('2206568', 1, '2020-12-17', '2021-12-31', '66_9308'),
('22404698', 4, '02-02-2000', '02-02-2001', '11_9211'),
('2280843', 121212, '2021-12-07', '2021-12-08', '12121'),
('288084', 2, '2021-12-18', '2021-12-25', '63_9120'),
('3212828', 3, '2021-12-12', '2022-02-12', '66_9308	'),
('930250', 7, '2023-01-20', '2024-01-20', '76_9544');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `num_mat` int(20) NOT NULL,
  `fic_numero` varchar(20) NOT NULL,
  `apr_id` varchar(20) NOT NULL,
  `mat_estado` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`num_mat`, `fic_numero`, `apr_id`, `mat_estado`) VALUES
(6, '22404698', '1010075056', 'Pendiente'),
(7, '2280843', '1010075056', 'Pendiente'),
(8, '22404698	', '1010075056', 'Pendiente'),
(9, 'dfgh', '1010075056', 'Pendiente'),
(10, '-1010005639', '1010075056', 'Pendiente'),
(11, '6', '22404698', 'Pendiente'),
(12, '2206568', '67016915	', 'Pendiente'),
(13, '3212828', '1010075056', 'activo'),
(14, '3212828', '1010075056', 'activo'),
(15, '22404698', '1010075056', 'activo'),
(16, '22404698', '1010075056', 'activo'),
(17, '22404698', '1010075056', 'activo'),
(18, '22404698', '1010075056', 'activo'),
(19, '22404698', '1010075056', 'activo'),
(20, '22404698', '1010075056', 'activo'),
(21, '22404698', '1010075056', 'activo'),
(22, '22404698', '31152008', 'activo'),
(23, '930250', '600212812', 'activo'),
(24, '199533', '67016915	', 'activo'),
(25, '2206568', '67016915', 'activo'),
(26, '288084', '1010005639', 'activo'),
(27, '185670', '431211563', 'activo'),
(28, '288084', '600212812', 'activo'),
(29, '2206568', '67016915', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id_not` int(11) NOT NULL,
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `leido` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `pro_codigo` int(20) NOT NULL,
  `pro_descripcion` varchar(80) NOT NULL,
  `pro_estado` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`pro_codigo`, `pro_descripcion`, `pro_estado`) VALUES
(1, 'Analisis y desarrollo de sistemas de informaciÃ³n', 'activo'),
(2, 'Programacion de software', 'activo'),
(3, 'Mecatronica', 'activo'),
(4, 'Manejo ambiental', 'activo'),
(5, 'Venta de productos y servicios', 'activo'),
(6, 'Apoyo administrativo en salud', 'activo'),
(7, 'CosmetologÃ­a y estÃ©tica integral', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rh`
--

CREATE TABLE `rh` (
  `rh_id` int(20) NOT NULL,
  `rh_descripcion` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rh`
--

INSERT INTO `rh` (`rh_id`, `rh_descripcion`) VALUES
(1, 'O+'),
(2, 'O-'),
(3, 'A-'),
(4, 'A+'),
(5, 'B-'),
(6, 'B+'),
(7, 'AB+'),
(8, 'AB-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `rol_id` int(11) NOT NULL,
  `rol_nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`rol_id`, `rol_nombre`) VALUES
(1, 'aprendiz'),
(2, 'instructor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_id`
--

CREATE TABLE `tipo_id` (
  `tii_id` int(20) NOT NULL,
  `tii_descripcion` varchar(80) NOT NULL,
  `tii_sigla` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_id`
--

INSERT INTO `tipo_id` (`tii_id`, `tii_descripcion`, `tii_sigla`) VALUES
(1, 'cedula de ciudadania', 'CC'),
(2, 'tarjeta de identidad', 'TI'),
(3, 'cedula extranjera', 'CE'),
(4, 'numero de identificacion tributaria', 'NIT'),
(5, 'pasaporte', 'PAP'),
(6, 'documento nacional de identidad', 'DNI'),
(7, 'permiso especial de permanencia', 'PEP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `usuario_nombre` varchar(50) NOT NULL,
  `usuario_apellido` varchar(50) NOT NULL,
  `usuario_login` varchar(50) NOT NULL,
  `usuario_clave` varchar(50) NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `usuario_nombre`, `usuario_apellido`, `usuario_login`, `usuario_clave`, `rol_id`) VALUES
(31152008, 'juan', 'benito', 'jaun123', '123456', 1),
(67016915, 'Sandra Milena', 'Ramirez Naranjo', '', '67016915', 1),
(431211563, 'Daniel', 'Medina Guillar', '', '431211563', 1),
(600212812, 'Gloria Mary', 'Medina Valencia', '', '600212812', 1),
(1010005639, 'Jean Sebastian', 'Giron Montes', '', '1010005639', 1),
(1010045032, 'Pablo', 'Ramirez', 'pablito14', '123456', 2),
(2010005639, 'Jose Alejandro', 'Sanchez', '', '2010005639', 1),
(2147483647, 'Sebastian', 'Ayala ortega', '', '3180005639', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  ADD PRIMARY KEY (`apr_id`),
  ADD KEY `ciu_id` (`ciu_id`,`tii_id`,`rh_id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `tii_id` (`tii_id`),
  ADD KEY `rh_id` (`rh_id`);

--
-- Indices de la tabla `causa_desercion`
--
ALTER TABLE `causa_desercion`
  ADD PRIMARY KEY (`cad_codigo`);

--
-- Indices de la tabla `centro`
--
ALTER TABLE `centro`
  ADD PRIMARY KEY (`cen_codigo`),
  ADD KEY `ciu_id` (`ciu_id`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`ciu_id`),
  ADD KEY `dep_codigo` (`dep_codigo`),
  ADD KEY `dep_codigo_2` (`dep_codigo`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`dep_codigo`);

--
-- Indices de la tabla `desercion`
--
ALTER TABLE `desercion`
  ADD PRIMARY KEY (`der_id`),
  ADD KEY `apr_id` (`apr_id`,`fic_numero`,`cad_codigo`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD PRIMARY KEY (`fic_numero`),
  ADD KEY `pro_codigo` (`pro_codigo`,`cen_codigo`),
  ADD KEY `cen_codigo` (`cen_codigo`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`num_mat`),
  ADD KEY `apr_id` (`apr_id`),
  ADD KEY `fic_numero` (`fic_numero`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id_not`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`pro_codigo`);

--
-- Indices de la tabla `rh`
--
ALTER TABLE `rh`
  ADD PRIMARY KEY (`rh_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `tipo_id`
--
ALTER TABLE `tipo_id`
  ADD PRIMARY KEY (`tii_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `causa_desercion`
--
ALTER TABLE `causa_desercion`
  MODIFY `cad_codigo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `desercion`
--
ALTER TABLE `desercion`
  MODIFY `der_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `num_mat` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id_not` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `pro_codigo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `rh`
--
ALTER TABLE `rh`
  MODIFY `rh_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
