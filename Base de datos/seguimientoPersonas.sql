CREATE DATABASE seguimientoPersonas;

USE seguimientoPersonas;

-- ----------------------------
-- Table structure for credencial
-- ----------------------------

CREATE TABLE `Credencial` (
  `idCredencial` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idCredencial`),
  UNIQUE KEY `uqusername` (`username`)
) ;

-- ----------------------------
-- Table structure for estadoInvitacion
-- ----------------------------
CREATE TABLE `EstadoInvitacion` (
  `idEstadoInvitacion` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
PRIMARY KEY (`idEstadoInvitacion`)
) ;

-- ----------------------------
-- Table structure for estadoVisibilidad
-- ----------------------------
CREATE TABLE `EstadoVisibilidad` (
  `idEstadoVisibilidad` int(11) NOT NULL AUTO_INCREMENT,
  `visible` enum('true','false') DEFAULT 'true',
  `noVisible` enum('true','false') DEFAULT 'false',
  PRIMARY KEY (`idEstadoVisibilidad`)
) ;

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
CREATE TABLE `Usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `idCredencial` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `fkcredencial` (`idCredencial`),
  CONSTRAINT `fkcredencial` FOREIGN KEY (`idCredencial`) REFERENCES `credencial` (`idCredencial`)
) ;

-- ----------------------------
-- Table structure for foto
-- ----------------------------
CREATE TABLE `Foto` (
  `idFoto` int(11) NOT NULL AUTO_INCREMENT,
  `foto` blob,
  `idUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idFoto`),
  KEY `fkUsuario` (`idUsuario`),
  CONSTRAINT `fkUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ;

-- ----------------------------
-- Table structure for grupo
-- ----------------------------
CREATE TABLE `Grupo` (
  `idGrupo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idGrupo`),
  KEY `fkUsuarioGrup` (`idUsuario`),
  CONSTRAINT `fkUsuarioGrup` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ;

-- ----------------------------
-- Table structure for rol
-- ----------------------------
CREATE TABLE `Rol` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idRol`)
) ;


-- ----------------------------
-- Table structure for grupoUsuario
-- ----------------------------
CREATE TABLE `GrupoUsuario` (
  `idGrupoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) DEFAULT NULL,
  `idGrupo` int(11) DEFAULT NULL,
  `idRol` int(11) DEFAULT NULL,
  `idEstadoInvitacion` int(11) DEFAULT NULL,
  `idEstadoVisibilidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`idGrupoUsuario`),
  KEY `fkUser` (`idUsuario`),
  KEY `fkGrupo` (`idGrupo`),
  KEY `fkRol` (`idRol`),
  KEY `fkVisibilidad` (`idEstadoVisibilidad`),
  KEY `fkInvitacion` (`idEstadoInvitacion`),
  CONSTRAINT `fkGrupo` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`idGrupo`),
  CONSTRAINT `fkInvitacion` FOREIGN KEY (`idEstadoInvitacion`) REFERENCES `estadoInvitacion` (`idEstadoInvitacion`),
  CONSTRAINT `fkRol` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`),
  CONSTRAINT `fkUser` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  CONSTRAINT `fkVisibilidad` FOREIGN KEY (`idEstadoVisibilidad`) REFERENCES `estadoVisibilidad` (`idEstadoVisibilidad`)
) ;


-- ----------------------------
-- Table structure for ubicacion
-- ----------------------------
CREATE TABLE `Ubicacion` (
  `idUbicacion` int(11) NOT NULL AUTO_INCREMENT,
  `latitud` varchar(255) DEFAULT NULL,
  `longitud` varchar(255) DEFAULT NULL,
  `altura` varchar(255) DEFAULT NULL,
  `fechaHora` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `idUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUbicacion`),
  KEY `fkUsuarioUb` (`idUsuario`),
  CONSTRAINT `fkUsuarioUb` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ;


