-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-07-2015 a las 23:39:17
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `corpnet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amigo`
--

CREATE TABLE IF NOT EXISTS `amigo` (
`idAmigo` int(11) NOT NULL,
  `idCuenta` int(11) NOT NULL,
  `idCuentaAmigo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `amigo`
--

INSERT INTO `amigo` (`idAmigo`, `idCuenta`, `idCuentaAmigo`) VALUES
(26, 8, 4),
(27, 8, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aplicadores`
--

CREATE TABLE IF NOT EXISTS `aplicadores` (
`idAplicacion` int(11) NOT NULL,
  `idOferta` int(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `Usuario` varchar(45) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aplicadores`
--

INSERT INTO `aplicadores` (`idAplicacion`, `idOferta`, `idEmpresa`, `Usuario`, `idUsuario`) VALUES
(2, 1, 3, 'CarlosM', 7),
(3, 5, 3, 'CarlosM', 7),
(4, 8, 8, 'JRjunior32', 10),
(5, 8, 8, 'JRjunior32', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
`idCategorias` int(11) NOT NULL,
  `NombreCat` varchar(20) NOT NULL,
  `cuenta_idCuenta` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategorias`, `NombreCat`, `cuenta_idCuenta`) VALUES
(2, 'General', 1),
(3, 'Informatica', 1),
(4, 'Restaurantes', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
`idChat` int(11) NOT NULL,
  `FechaChat` date NOT NULL,
  `Texto` varchar(300) NOT NULL,
  `ArchivosChat` mediumblob,
  `NombreArchChat` varchar(30) DEFAULT NULL,
  `Size` int(11) DEFAULT NULL,
  `cuenta_idCuenta` int(11) NOT NULL,
  `idAmigo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`idChat`, `FechaChat`, `Texto`, `ArchivosChat`, `NombreArchChat`, `Size`, `cuenta_idCuenta`, `idAmigo`) VALUES
(34, '2015-06-28', 'hey', NULL, NULL, NULL, 4, 3),
(35, '2015-07-09', 'Soy Nayib', NULL, NULL, NULL, 8, 4),
(36, '2015-07-09', 'Yo no soy nadie :(', NULL, NULL, NULL, 4, 8),
(37, '2015-07-09', 'Bueno, soy un  pokemÃ³n', NULL, NULL, NULL, 4, 8),
(38, '2015-07-09', 'Papiiiiii', NULL, NULL, NULL, 9, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
`idComentario` int(11) NOT NULL,
  `Usuario` varchar(45) NOT NULL,
  `imgUsuario` varchar(70) NOT NULL,
  `Comentario` tinytext NOT NULL,
  `idPub` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`idComentario`, `Usuario`, `imgUsuario`, `Comentario`, `idPub`) VALUES
(1, 'cn', 'elefantes-bebe.jpg', 'que tal?\r\n', 0),
(2, 'cn', 'elefantes-bebe.jpg', 'Que tal?\r\n', 0),
(5, 'CarlosM', '333853.jpg', 'nos vale verga mahe\r\n', 0),
(6, 'cn', 'elefantes-bebe.jpg', 'hola\r\n', 0),
(7, 'wn', 'Squirtle.jpg', 'Hola amigo? que pollo soy jaja hablo solo xD', 0),
(8, 'BK_ALoKing', 'burguer.jpg', 'el cara de miembro es atilio :3 :D\r\n', 0),
(16, 'CarlosM', '333853.jpg', 'Hola\r\n', 11),
(17, 'wn', 'Squirtle.jpg', 'aqui hay desvergue\r\n', 11),
(18, 'CarlosM', '333853.jpg', 'tu nana es el desvergue\r\n', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE IF NOT EXISTS `cuenta` (
`idCuenta` int(11) NOT NULL,
  `Tipo` varchar(1) NOT NULL,
  `Usuario` varchar(30) NOT NULL,
  `Correo` varchar(45) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `ImgCuenta` varchar(30) NOT NULL,
  `Empresa` varchar(70) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellido` varchar(30) NOT NULL,
  `FechaNac` date NOT NULL,
  `DUI` varchar(10) NOT NULL,
  `Direc` varchar(70) NOT NULL,
  `Telefono` varchar(9) NOT NULL,
  `SitioWeb` varchar(100) NOT NULL,
  `Estado` varchar(1) NOT NULL,
  `Categoria` varchar(45) NOT NULL,
  `State_Curriculum` int(11) NOT NULL DEFAULT '0',
  `work_count` varchar(1) NOT NULL DEFAULT '0',
  `new_count` int(11) DEFAULT '0',
  `cuenta_cuenta` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`idCuenta`, `Tipo`, `Usuario`, `Correo`, `Password`, `ImgCuenta`, `Empresa`, `Nombre`, `Apellido`, `FechaNac`, `DUI`, `Direc`, `Telefono`, `SitioWeb`, `Estado`, `Categoria`, `State_Curriculum`, `work_count`, `new_count`, `cuenta_cuenta`) VALUES
(1, '1', 'admin', 'admin@admin.com', 'admin', '', 'admin', 'admin', 'admin', '0000-00-00', '', '', '', '', '', '', 0, '0', 0, 0),
(4, '2', 'wn', 'hsdkhfs@fjasd.com', 'work1', 'Squirtle.jpg', 'WorkNet', 'ffdasfds', 'sdfdsaf', '2015-05-01', '654567654', 'sdfafsda', '2354123', 'https://bootswatch.com/', '1', 'Restaurantes', 0, '1', 0, 0),
(6, '3', 'carlos98', 'carlosminerodubon@gmail.com', 'WorkNet2015', 'hgcyhgchfgvhdf.gif', 'cn', 'Carlos', 'Minero', '2015-05-29', '34567890-9', 'no definida', '0000', 'no definida', '0', '', 0, '0', 2, 3),
(7, '4', 'CarlosM', 'carlos@gmail.com', 'carlos98', '333853.jpg', 'no definida', 'Carlos', 'Minero', '1993-02-09', '78522348-5', 'no definida', '0000', 'no definida', '0', '', 0, '0', 1, 0),
(8, '2', 'BK_ALoKing', 'bk_aloking@gmail.com', '123456', 'burguer.jpg', 'Burguer King', 'Nayib', 'Bukele', '1999-06-16', '46754621-6', 'En todo sivar', '2256-5654', 'http://livepipe.net/control/rating', '1', 'Restaurantes', 0, '1', 0, 0),
(9, '3', 'NayibJr', 'nayibjr@gmail.com', '123456', 'nayib-1.jpg', 'BK_ALoKing', 'Nayib Junior', 'Bukele', '1995-02-08', '45567645-6', 'no definida', '0000', 'no definida', '0', '', 0, '0', 0, 8),
(10, '4', 'JRjunior32', 'junior.rod78@gmail.com', '123456', 'default.jpg', 'no definida', 'Julio', 'Rodriguez', '1992-06-10', '54654646-5', 'no definida', '0000', 'no definida', '0', '', 1, '0', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curriculum`
--

CREATE TABLE IF NOT EXISTS `curriculum` (
`idCurriculum` int(11) NOT NULL,
  `Nombre_Completo` varchar(50) NOT NULL,
  `Telefono` varchar(9) NOT NULL,
  `Celular` varchar(9) NOT NULL,
  `direccion` varchar(75) NOT NULL,
  `FormacionAc` tinytext NOT NULL,
  `Experiencia` tinytext NOT NULL,
  `Referencia1` varchar(40) NOT NULL,
  `TelRef1` varchar(9) NOT NULL,
  `Referencia2` varchar(40) NOT NULL,
  `TelRef2` varchar(9) NOT NULL,
  `Referencia3` varchar(40) DEFAULT NULL,
  `TelRef3` varchar(9) DEFAULT NULL,
  `idCuenta_cuenta` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `curriculum`
--

INSERT INTO `curriculum` (`idCurriculum`, `Nombre_Completo`, `Telefono`, `Celular`, `direccion`, `FormacionAc`, `Experiencia`, `Referencia1`, `TelRef1`, `Referencia2`, `TelRef2`, `Referencia3`, `TelRef3`, `idCuenta_cuenta`) VALUES
(1, 'Julio Cesar Rodriguez Gomez', '2314-1762', '7741-7336', 'Col. Sn Francisco. Cal. Los CastaÃ±os Av Las Dalias Con Res Terralinda B8', 'Escuela de Comunicaciones Monica Herrera', 'BISA', 'Maria Fernanda Duque Rodriguez', '7850-4369', 'Carlos Antonio Minero Dubon', '6864-6546', 'Jose Atilio Garcia Sibrian', '7578-7878', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denuncias`
--

CREATE TABLE IF NOT EXISTS `denuncias` (
`idDenuncias` int(11) NOT NULL,
  `Motivo` tinytext NOT NULL,
  `FechaRealizada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UserEmpresa` varchar(30) NOT NULL,
  `cuenta_idCuenta` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `denuncias`
--

INSERT INTO `denuncias` (`idDenuncias`, `Motivo`, `FechaRealizada`, `UserEmpresa`, `cuenta_idCuenta`) VALUES
(1, 'Porque si me cae mal', '2015-07-09 20:05:14', '8', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
`idEventos` int(11) NOT NULL,
  `idCuenta` int(11) NOT NULL,
  `FechaIni` date NOT NULL,
  `HoraIni` time NOT NULL,
  `FechaFin` date NOT NULL,
  `HoraFin` time NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Descripcion` tinytext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitados`
--

CREATE TABLE IF NOT EXISTS `invitados` (
  `seguidores_idSeguidores` int(11) NOT NULL,
  `seguidores_cuenta_idCuenta` int(11) NOT NULL,
  `eventos_idEventos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE IF NOT EXISTS `ofertas` (
`idOfertas` int(11) NOT NULL,
  `idCuenta` int(11) NOT NULL,
  `Titulo` varchar(70) CHARACTER SET utf8 NOT NULL,
  `Detalle` tinytext NOT NULL,
  `Genero` varchar(1) NOT NULL,
  `Salario` double NOT NULL,
  `Direccion` tinytext NOT NULL,
  `Cargo` varchar(45) NOT NULL,
  `Edad` varchar(2) NOT NULL,
  `Requisitos` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ofertas`
--

INSERT INTO `ofertas` (`idOfertas`, `idCuenta`, `Titulo`, `Detalle`, `Genero`, `Salario`, `Direccion`, `Cargo`, `Edad`, `Requisitos`) VALUES
(8, 8, 'Manager', 'We need a good manager vaaa', 'A', 20, 'Col. Ecalon AhÃ­ por el paseo mall', 'Manager in Col Escalon', '25', 'Be a good manager please');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portafolio`
--

CREATE TABLE IF NOT EXISTS `portafolio` (
`idPortafolio` int(11) NOT NULL,
  `NombreArchivo` varchar(30) NOT NULL,
  `FechaSubida` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Size` int(11) NOT NULL,
  `calificacion` int(11) NOT NULL DEFAULT '0',
  `cuenta_idCuenta` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `portafolio`
--

INSERT INTO `portafolio` (`idPortafolio`, `NombreArchivo`, `FechaSubida`, `Size`, `calificacion`, `cuenta_idCuenta`) VALUES
(7, 'BackupWorknet.sql', '2015-07-15 19:06:59', 21423, 4, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE IF NOT EXISTS `publicaciones` (
`idPub` int(11) NOT NULL,
  `Texto` tinytext NOT NULL,
  `imgUsuario` varchar(30) NOT NULL,
  `Fecha` date NOT NULL,
  `cuenta_idCuenta` int(11) NOT NULL,
  `Usuario_cuenta` varchar(45) NOT NULL,
  `works` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='	';

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`idPub`, `Texto`, `imgUsuario`, `Fecha`, `cuenta_idCuenta`, `Usuario_cuenta`, `works`) VALUES
(7, 'Hey hola!\r\n', 'Squirtle.jpg', '2015-07-08', 4, 'wn', 1),
(8, 'Hola amigos y amigas de WorkNet', 'Squirtle.jpg', '2015-07-09', 4, 'wn', 1),
(9, 'Hola soy el hijo de Nayib :'')', 'default.jpg', '2015-07-09', 9, 'NayibJr', 0),
(10, 'Hola soy el hijo de Nayib :'')', 'nayib-1.jpg', '2015-07-09', 9, 'NayibJr', 1),
(12, 'HOLA!\r\n', 'default.jpg', '2015-07-15', 10, 'JRjunior32', 0),
(13, '.l.', 'burguer.jpg', '2015-07-15', 8, 'BK_ALoKing', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguidores`
--

CREATE TABLE IF NOT EXISTS `seguidores` (
`idSeguidores` int(11) NOT NULL,
  `cuenta_idCuenta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE IF NOT EXISTS `solicitudes` (
`idSoli` int(11) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Tipo` varchar(1) NOT NULL,
  `cuentaAmigo` int(45) NOT NULL,
  `cuenta_idCuenta` int(11) NOT NULL,
  `user_idCuenta` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`idSoli`, `Fecha`, `Tipo`, `cuentaAmigo`, `cuenta_idCuenta`, `user_idCuenta`) VALUES
(1, '2015-07-15 19:34:04', '1', 7, 8, 'BK_ALoKing');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `amigo`
--
ALTER TABLE `amigo`
 ADD PRIMARY KEY (`idAmigo`), ADD KEY `idCuenta` (`idCuenta`);

--
-- Indices de la tabla `aplicadores`
--
ALTER TABLE `aplicadores`
 ADD PRIMARY KEY (`idAplicacion`), ADD KEY `idOferta` (`idOferta`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
 ADD PRIMARY KEY (`idCategorias`,`cuenta_idCuenta`), ADD KEY `fk_categorias_cuenta1_idx` (`cuenta_idCuenta`);

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
 ADD PRIMARY KEY (`idChat`), ADD KEY `fk_Chat_cuenta1_idx` (`cuenta_idCuenta`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
 ADD PRIMARY KEY (`idComentario`), ADD UNIQUE KEY `idComentario` (`idComentario`), ADD UNIQUE KEY `idComentario_2` (`idComentario`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
 ADD PRIMARY KEY (`idCuenta`), ADD UNIQUE KEY `Correo` (`Correo`), ADD KEY `idCuenta` (`idCuenta`);

--
-- Indices de la tabla `curriculum`
--
ALTER TABLE `curriculum`
 ADD PRIMARY KEY (`idCurriculum`), ADD KEY `idCuenta_cuenta` (`idCuenta_cuenta`);

--
-- Indices de la tabla `denuncias`
--
ALTER TABLE `denuncias`
 ADD PRIMARY KEY (`idDenuncias`,`cuenta_idCuenta`), ADD KEY `fk_denuncias_cuenta1_idx` (`cuenta_idCuenta`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
 ADD PRIMARY KEY (`idEventos`), ADD KEY `idCuenta` (`idCuenta`);

--
-- Indices de la tabla `invitados`
--
ALTER TABLE `invitados`
 ADD PRIMARY KEY (`seguidores_idSeguidores`,`seguidores_cuenta_idCuenta`,`eventos_idEventos`), ADD KEY `fk_seguidores_has_eventos_eventos1_idx` (`eventos_idEventos`), ADD KEY `fk_seguidores_has_eventos_seguidores1_idx` (`seguidores_idSeguidores`,`seguidores_cuenta_idCuenta`);

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
 ADD PRIMARY KEY (`idOfertas`), ADD KEY `idCuenta` (`idCuenta`);

--
-- Indices de la tabla `portafolio`
--
ALTER TABLE `portafolio`
 ADD PRIMARY KEY (`idPortafolio`,`cuenta_idCuenta`), ADD KEY `fk_portafolio_cuenta1_idx` (`cuenta_idCuenta`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
 ADD PRIMARY KEY (`idPub`,`cuenta_idCuenta`), ADD UNIQUE KEY `idPub` (`idPub`), ADD KEY `fk_publicaciones_cuenta_idx` (`cuenta_idCuenta`), ADD KEY `cuenta_idCuenta` (`cuenta_idCuenta`);

--
-- Indices de la tabla `seguidores`
--
ALTER TABLE `seguidores`
 ADD PRIMARY KEY (`idSeguidores`,`cuenta_idCuenta`), ADD KEY `fk_seguidores_cuenta1_idx` (`cuenta_idCuenta`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
 ADD PRIMARY KEY (`idSoli`,`cuenta_idCuenta`), ADD KEY `fk_solicitudes_cuenta1_idx` (`cuenta_idCuenta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `amigo`
--
ALTER TABLE `amigo`
MODIFY `idAmigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `aplicadores`
--
ALTER TABLE `aplicadores`
MODIFY `idAplicacion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
MODIFY `idCategorias` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
MODIFY `idChat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
MODIFY `idCuenta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `curriculum`
--
ALTER TABLE `curriculum`
MODIFY `idCurriculum` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `denuncias`
--
ALTER TABLE `denuncias`
MODIFY `idDenuncias` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
MODIFY `idEventos` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
MODIFY `idOfertas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `portafolio`
--
ALTER TABLE `portafolio`
MODIFY `idPortafolio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
MODIFY `idPub` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `seguidores`
--
ALTER TABLE `seguidores`
MODIFY `idSeguidores` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
MODIFY `idSoli` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `amigo`
--
ALTER TABLE `amigo`
ADD CONSTRAINT `amigo_ibfk_1` FOREIGN KEY (`idCuenta`) REFERENCES `cuenta` (`idCuenta`) ON DELETE CASCADE;

--
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
ADD CONSTRAINT `fk_categorias_cuenta1` FOREIGN KEY (`cuenta_idCuenta`) REFERENCES `cuenta` (`idCuenta`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `chat`
--
ALTER TABLE `chat`
ADD CONSTRAINT `fk_Chat_cuenta1` FOREIGN KEY (`cuenta_idCuenta`) REFERENCES `cuenta` (`idCuenta`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `curriculum`
--
ALTER TABLE `curriculum`
ADD CONSTRAINT `curriculum_ibfk_1` FOREIGN KEY (`idCuenta_cuenta`) REFERENCES `cuenta` (`idCuenta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `denuncias`
--
ALTER TABLE `denuncias`
ADD CONSTRAINT `fk_denuncias_cuenta1` FOREIGN KEY (`cuenta_idCuenta`) REFERENCES `cuenta` (`idCuenta`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`idCuenta`) REFERENCES `cuenta` (`idCuenta`) ON DELETE CASCADE;

--
-- Filtros para la tabla `invitados`
--
ALTER TABLE `invitados`
ADD CONSTRAINT `fk_seguidores_has_eventos_eventos1` FOREIGN KEY (`eventos_idEventos`) REFERENCES `eventos` (`idEventos`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_seguidores_has_eventos_seguidores1` FOREIGN KEY (`seguidores_idSeguidores`, `seguidores_cuenta_idCuenta`) REFERENCES `seguidores` (`idSeguidores`, `cuenta_idCuenta`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ofertas`
--
ALTER TABLE `ofertas`
ADD CONSTRAINT `ofertas_ibfk_1` FOREIGN KEY (`idCuenta`) REFERENCES `cuenta` (`idCuenta`) ON DELETE CASCADE,
ADD CONSTRAINT `ofertas_ibfk_2` FOREIGN KEY (`idOfertas`) REFERENCES `aplicadores` (`idOferta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `portafolio`
--
ALTER TABLE `portafolio`
ADD CONSTRAINT `fk_portafolio_cuenta1` FOREIGN KEY (`cuenta_idCuenta`) REFERENCES `cuenta` (`idCuenta`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
ADD CONSTRAINT `fk_publicaciones_cuenta` FOREIGN KEY (`cuenta_idCuenta`) REFERENCES `cuenta` (`idCuenta`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
ADD CONSTRAINT `fk_solicitudes_cuenta1` FOREIGN KEY (`cuenta_idCuenta`) REFERENCES `cuenta` (`idCuenta`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
