CREATE DATABASE FenomenoPluvial;

USE DATABASE FenomenoPluvial;

DROP TABLE IF EXISTS `declaratoria`;

CREATE TABLE `declaratoria` (
  `id_declaratoria` int(11) NOT NULL AUTO_INCREMENT,
  `fenomeno` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `causas` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  PRIMARY KEY (`id_declaratoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `declaratoria`
--

LOCK TABLES `declaratoria` WRITE;
/*!40000 ALTER TABLE `declaratoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `declaratoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `declaratoria_municipio`
--

DROP TABLE IF EXISTS `declaratoria_municipio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `declaratoria_municipio` (
  `id_declaratoria` int(11) NOT NULL,
  `id_municipio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_declaratoria`),
  KEY `id_municipio` (`id_municipio`),
  CONSTRAINT `declaratoria_municipio_ibfk_1` FOREIGN KEY (`id_declaratoria`) REFERENCES `declaratoria` (`id_declaratoria`),
  CONSTRAINT `declaratoria_municipio_ibfk_2` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id_municipio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `declaratoria_municipio`
--

LOCK TABLES `declaratoria_municipio` WRITE;
/*!40000 ALTER TABLE `declaratoria_municipio` DISABLE KEYS */;
/*!40000 ALTER TABLE `declaratoria_municipio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(110) CHARACTER SET utf8 DEFAULT NULL,
  `id_municipio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mar`
--

DROP TABLE IF EXISTS `mar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mar` (
  `id_declaratoria` int(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `nivel_mar` decimal(7,3) DEFAULT NULL,
  PRIMARY KEY (`id_declaratoria`),
  CONSTRAINT `mar_ibfk_1` FOREIGN KEY (`id_declaratoria`) REFERENCES `declaratoria` (`id_declaratoria`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mar`
--

LOCK TABLES `mar` WRITE;
/*!40000 ALTER TABLE `mar` DISABLE KEYS */;
/*!40000 ALTER TABLE `mar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipio`
--

DROP TABLE IF EXISTS `municipio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `municipio` (
  `id_municipio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(110) CHARACTER SET utf8 DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_municipio`),
  `id_estado` int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipio`
--

LOCK TABLES `municipio` WRITE;
/*!40000 ALTER TABLE `municipio` DISABLE KEYS */;
/*!40000 ALTER TABLE `municipio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rio`
--

DROP TABLE IF EXISTS `rio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rio` (
  `id_declaratoria` int(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `nivel_rio` decimal(7,3) DEFAULT NULL,
  PRIMARY KEY (`id_declaratoria`),
  CONSTRAINT `rio_ibfk_1` FOREIGN KEY (`id_declaratoria`) REFERENCES `declaratoria` (`id_declaratoria`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rio`
--

LOCK TABLES `rio` WRITE;
/*!40000 ALTER TABLE `rio` DISABLE KEYS */;
/*!40000 ALTER TABLE `rio` ENABLE KEYS */;
UNLOCK TABLES;