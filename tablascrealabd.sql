create DATABASE fenomenoPluvial;
use fenomenoPluvial;

CREATE TABLE `declaratoria` (
  `id_declaratoria` int(11) NOT NULL AUTO_INCREMENT,
  `fenomeno` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `causas` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  PRIMARY KEY (`id_declaratoria`)
);

CREATE TABLE `municipio` (
  `id_municipio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(110) CHARACTER SET utf8 DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_municipio`),
  `id_estado` int(11)
);

CREATE TABLE `declaratoria_municipio` (
  `id_declaratoria` int(11) NOT NULL,
  `id_municipio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_declaratoria`),
  KEY `id_municipio` (`id_municipio`),
  CONSTRAINT `declaratoria_municipio_ibfk_1` FOREIGN KEY (`id_declaratoria`) REFERENCES `declaratoria` (`id_declaratoria`),
  CONSTRAINT `declaratoria_municipio_ibfk_2` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id_municipio`)
);

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(110) CHARACTER SET utf8 DEFAULT NULL,
  `id_municipio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_estado`)
);

CREATE TABLE `mar` (
  `id_declaratoria` int(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `nivel_mar` decimal(7,3) DEFAULT NULL,
  PRIMARY KEY (`id_declaratoria`),
  CONSTRAINT `mar_ibfk_1` FOREIGN KEY (`id_declaratoria`) REFERENCES `declaratoria` (`id_declaratoria`) ON UPDATE CASCADE
);


CREATE TABLE `rio` (
  `id_declaratoria` int(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `nivel_rio` decimal(7,3) DEFAULT NULL,
  PRIMARY KEY (`id_declaratoria`),
  CONSTRAINT `rio_ibfk_1` FOREIGN KEY (`id_declaratoria`) REFERENCES `declaratoria` (`id_declaratoria`) ON UPDATE CASCADE
);