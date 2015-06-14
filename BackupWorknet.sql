-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-06-2015 a las 03:18:56
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `amigo`
--

INSERT INTO `amigo` (`idAmigo`, `idCuenta`, `idCuentaAmigo`) VALUES
(3, 3, 2),
(11, 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
`idCategorias` int(11) NOT NULL,
  `NombreCat` varchar(20) NOT NULL,
  `cuenta_idCuenta` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`idChat`, `FechaChat`, `Texto`, `ArchivosChat`, `NombreArchChat`, `Size`, `cuenta_idCuenta`, `idAmigo`) VALUES
(33, '2015-06-14', 'hola', NULL, NULL, NULL, 3, 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
  `cuenta_cuenta` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`idCuenta`, `Tipo`, `Usuario`, `Correo`, `Password`, `ImgCuenta`, `Empresa`, `Nombre`, `Apellido`, `FechaNac`, `DUI`, `Direc`, `Telefono`, `SitioWeb`, `Estado`, `cuenta_cuenta`) VALUES
(1, '1', 'admin', 'admin@admin.com', 'admin', '', 'admin', 'admin', 'admin', '0000-00-00', '', '', '', '', '', 0),
(3, '2', 'cn', 'karloz_minero@hotmail.com', 'cn', '2015.jpg', 'CorpNet', 'Carlos', 'Minero', '2002-02-05', '123456', 'cn', '22222222', 'https://www.facebook.com/groups/1422689947974430/?fref=nf', '0', 0),
(4, '2', 'wn', 'wn@wn.com', 'work1', 'Squirtle.jpg', 'WorkNet', 'ffdasfds', 'sdfdsaf', '2015-05-01', '654567654', 'sdfafsda', '2354123', '', '1', 0),
(6, '3', 'carlos98', 'carlosminerodubon@gmail.com', 'WorkNet2015', 'default.jpg', 'no definida', 'Carlos', 'Minero', '2015-05-29', '34567890-9', 'no definida', '0000', 'no definida', '0', 3);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denuncias`
--

CREATE TABLE IF NOT EXISTS `denuncias` (
`idDenuncias` int(11) NOT NULL,
  `Motivo` tinytext NOT NULL,
  `FechaRealizada` date NOT NULL,
  `UserEmpresa` varchar(30) NOT NULL,
  `cuenta_idCuenta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
`idEventos` int(11) NOT NULL,
  `idCuenta` int(11) NOT NULL,
  `FechaIni` date NOT NULL,
  `FechaFin` date NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Descripcion` tinytext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`idEventos`, `idCuenta`, `FechaIni`, `FechaFin`, `Nombre`, `Descripcion`) VALUES
(1, 1, '2015-04-16', '2015-04-17', 'sdfa', 'dasf'),
(2, 1, '2015-04-16', '2015-04-17', 'sdfa', 'dasf');

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
  `Cargo` varchar(45) NOT NULL,
  `Edad` varchar(2) NOT NULL,
  `Requisitos` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
`idPerfil` int(11) NOT NULL,
  `Imagen` varchar(30) NOT NULL,
  `cuenta_idCuenta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portafolio`
--

CREATE TABLE IF NOT EXISTS `portafolio` (
`idPortafolio` int(11) NOT NULL,
  `NombreArchivo` varchar(30) NOT NULL,
  `FechaSubida` date NOT NULL,
  `Size` int(11) NOT NULL,
  `cuenta_idCuenta` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `portafolio`
--

INSERT INTO `portafolio` (`idPortafolio`, `NombreArchivo`, `FechaSubida`, `Size`, `cuenta_idCuenta`) VALUES
(1, '4740907330_c89aa4f53c_b1.jpg', '0000-00-00', 1201534, 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='	';

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`idPub`, `Texto`, `imgUsuario`, `Fecha`, `cuenta_idCuenta`, `Usuario_cuenta`, `works`) VALUES
(2, 'Hola soy nuevo aqui!', '2015.jpg', '2015-06-14', 3, 'cn', 0);

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
  `Fecha` date NOT NULL,
  `Solicitudescol` varchar(45) NOT NULL,
  `Solicitudescol1` varchar(45) NOT NULL,
  `cuenta_idCuenta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `amigo`
--
ALTER TABLE `amigo`
 ADD PRIMARY KEY (`idAmigo`), ADD KEY `idCuenta` (`idCuenta`);

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
 ADD PRIMARY KEY (`idComentario`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
 ADD PRIMARY KEY (`idCuenta`), ADD UNIQUE KEY `Correo` (`Correo`), ADD KEY `idCuenta` (`idCuenta`);

--
-- Indices de la tabla `curriculum`
--
ALTER TABLE `curriculum`
 ADD PRIMARY KEY (`idCurriculum`);

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
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
 ADD PRIMARY KEY (`idPerfil`,`cuenta_idCuenta`), ADD KEY `fk_perfil_cuenta1_idx` (`cuenta_idCuenta`);

--
-- Indices de la tabla `portafolio`
--
ALTER TABLE `portafolio`
 ADD PRIMARY KEY (`idPortafolio`,`cuenta_idCuenta`), ADD KEY `fk_portafolio_cuenta1_idx` (`cuenta_idCuenta`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
 ADD PRIMARY KEY (`idPub`,`cuenta_idCuenta`), ADD KEY `fk_publicaciones_cuenta_idx` (`cuenta_idCuenta`);

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
MODIFY `idAmigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
MODIFY `idCategorias` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
MODIFY `idChat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
MODIFY `idCuenta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `curriculum`
--
ALTER TABLE `curriculum`
MODIFY `idCurriculum` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `denuncias`
--
ALTER TABLE `denuncias`
MODIFY `idDenuncias` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
MODIFY `idEventos` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
MODIFY `idOfertas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
MODIFY `idPerfil` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `portafolio`
--
ALTER TABLE `portafolio`
MODIFY `idPortafolio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
MODIFY `idPub` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `seguidores`
--
ALTER TABLE `seguidores`
MODIFY `idSeguidores` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
MODIFY `idSoli` int(11) NOT NULL AUTO_INCREMENT;
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
ADD CONSTRAINT `ofertas_ibfk_1` FOREIGN KEY (`idCuenta`) REFERENCES `cuenta` (`idCuenta`) ON DELETE CASCADE;

--
-- Filtros para la tabla `perfil`
--
ALTER TABLE `perfil`
ADD CONSTRAINT `fk_perfil_cuenta1` FOREIGN KEY (`cuenta_idCuenta`) REFERENCES `cuenta` (`idCuenta`) ON DELETE CASCADE ON UPDATE NO ACTION;

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
-- Filtros para la tabla `seguidores`
--
ALTER TABLE `seguidores`
ADD CONSTRAINT `fk_seguidores_cuenta1` FOREIGN KEY (`cuenta_idCuenta`) REFERENCES `cuenta` (`idCuenta`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
ADD CONSTRAINT `fk_solicitudes_cuenta1` FOREIGN KEY (`cuenta_idCuenta`) REFERENCES `cuenta` (`idCuenta`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
