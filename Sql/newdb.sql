CREATE DATABASE FENOMENO;
use FENOMENO;

DROP TABLE IF EXISTS `declaracion`;
CREATE TABLE `declaracion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fenomeno` text DEFAULT NULL,
  `causas` text DEFAULT NULL,
  `estado` text DEFAULT NULL,
  `municipio` text DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `fecha_registro` text DEFAULT NULL,
  `fecha_inicio` text DEFAULT NULL,
  `fecha_fin` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;


LOCK TABLES `declaracion` WRITE;
INSERT INTO `declaracion` VALUES (1,'Lluvias','LluviasAtipicas','Morelos','Zacualpan',12030,'16-06-2001','09-06-2001','13-06-2001'),(2,'Lluvias','LluviasAtipicas','Morelos','Zacatepec',12023,'17-06-2001','10-06-2001','14-06-2001'),(3,'Lluvias','LluviasAtipicas','Morelos','Yecapixtla',12021,'18-06-2001','11-06-2001','15-06-2001'),(4,'Lluvias','LluviasAtipicas','Morelos','Yautepec',12018,'19-06-2001','12-06-2001','16-06-2001'),(5,'Lluvias','LluviasAtipicas','Morelos','Xochitepec',12016,'2001-06-20','2001-06-13','2001-06-17'),(6,'Lluvias','LluviasAtipicas','Morelos','Totolapan',12014,'2001-06-21','2001-06-14','2001-06-18'),(7,'Lluvias','LluviasAtipicas','Morelos','Tlayacapan',12013,'2001-06-22','2001-06-15','2001-06-19'),(8,'Lluvias','LluviasAtipicas','Morelos','Tlaquiltenango',12001,'2001-06-23','2001-06-16','2001-06-20'),(9,'Lluvias','LluviasAtipicas','Morelos','Tlaltizapn',68029,'2001-06-24','2001-06-17','2001-06-21'),(10,'Lluvias','LluviasAtipicas','Morelos','Tlalnepantla',68027,'2001-06-25','2001-06-18','2001-06-22'),(11,'Lluvias','LluviasAtipicas','Morelos','TeteladelVolcn',67077,'2001-06-26','2001-06-19','2001-06-23'),(12,'Lluvias','LluviasAtipicas','Morelos','Tetecala',10039,'2001-06-27','2001-06-20','2001-06-24'),(13,'Lluvias','LluviasAtipicas','Morelos','Tepoztln',10035,'2001-06-28','2001-06-21','2001-06-25'),(14,'Lluvias','LluviasAtipicas','Morelos','Tepalcingo',10032,'2001-06-29','2001-06-22','2001-06-26'),(15,'Lluvias','LluviasAtipicas','Morelos','Temixco',10026,'2001-06-30','2001-06-23','2001-06-27'),(16,'Lluvias','LluviasAtipicas','Morelos','PuentedeIxtla',10025,'2001-07-01','2001-06-24','2001-06-28'),(17,'Lluvias','LluviasAtipicas','Morelos','Ocuituco',10023,'2001-07-02','2001-06-25','2001-06-29'),(18,'Lluvias','LluviasAtipicas','Morelos','Miacatln',10022,'2001-07-03','2001-06-26','2001-06-30'),(19,'Lluvias','LluviasAtipicas','Morelos','Mazatepec',10020,'2001-07-04','2001-06-27','2001-07-01'),(20,'Lluvias','LluviasAtipicas','Morelos','Jonacatepec',10019,'2001-07-05','2001-06-28','2001-07-02');
UNLOCK TABLES;

DROP TABLE IF EXISTS `nivel_mar`;
CREATE TABLE `nivel_mar` (
  `id_declaracion` int(11) NOT NULL,
  `nombre` text DEFAULT NULL,
  `nivel_mar` float DEFAULT NULL,
  PRIMARY KEY (`id_declaracion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `nivel_mar` WRITE;
INSERT INTO `nivel_mar` VALUES (3,' mar rojo',32);
UNLOCK TABLES;

DROP TABLE IF EXISTS `nivel_rio`;
CREATE TABLE `nivel_rio` (
  `id_declaracion` int(11) NOT NULL,
  `nombre` text DEFAULT NULL,
  `nivel_rio` float DEFAULT NULL,
  PRIMARY KEY (`id_declaracion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `nivel_rio` WRITE;
INSERT INTO `nivel_rio` VALUES (1,'rio azul',23),(2,'rio blanco',42);
UNLOCK TABLES;

DROP TABLE IF EXISTS `tablas`;
CREATE TABLE `tablas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
LOCK TABLES `tablas` WRITE;

INSERT INTO `tablas` VALUES (1,'declaracion'),(2,'nivel_rio'),(3,'nivel_mar');
UNLOCK TABLES;