-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for osx10.10 (x86_64)
--
-- Host: localhost    Database: dbPersonal
-- ------------------------------------------------------
-- Server version	10.4.27-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `catPuestoPersonal`
--

DROP TABLE IF EXISTS `catPuestoPersonal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catPuestoPersonal` (
  `idPuesto` int(11) NOT NULL AUTO_INCREMENT,
  `sPuesto` varchar(100) DEFAULT NULL,
  `bActivo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idPuesto`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catPuestoPersonal`
--

LOCK TABLES `catPuestoPersonal` WRITE;
/*!40000 ALTER TABLE `catPuestoPersonal` DISABLE KEYS */;
INSERT INTO `catPuestoPersonal` VALUES (1,'Directora(o)',1),(2,'Administradora(o)',1),(3,'Maestra(o)',1),(4,'Becaria(o)',1),(5,'Afanador(a)',1);
/*!40000 ALTER TABLE `catPuestoPersonal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maPersonal`
--

DROP TABLE IF EXISTS `maPersonal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maPersonal` (
  `idPersonal` int(11) NOT NULL AUTO_INCREMENT,
  `sNombre` varchar(100) DEFAULT NULL,
  `sPaterno` varchar(100) DEFAULT NULL,
  `sMaterno` varchar(100) DEFAULT NULL,
  `sCURP` varchar(20) DEFAULT NULL,
  `idPuesto` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPersonal`),
  KEY `maPersonal_FK_4` (`idPuesto`),
  CONSTRAINT `maPersonal_FK_4` FOREIGN KEY (`idPuesto`) REFERENCES `catPuestoPersonal` (`idPuesto`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maPersonal`
--

LOCK TABLES `maPersonal` WRITE;
/*!40000 ALTER TABLE `maPersonal` DISABLE KEYS */;
INSERT INTO `maPersonal` VALUES (1,'Maestro nombre','Maestro pat','Maestro mat','sincurp',3),(2,'Juan','Perez','Lopez','sincurp',3),(3,'Adriana','Romero','Robles',NULL,3),(4,'Jorgeaaaa','Gomezaaaaa','Riveraaaaa','AOOS810117HCMLRL25',1),(5,'Salvador','Alonso','Ortega','AOOS810117HCMLRL25',3),(6,'Salvador','Alonso','Ortega','AOOS810117HCMLRL25',4),(7,'Salvador','Alonso','Ortega','AOOS810117HCMLRL25',5),(8,'Salvador','Alonso','Ortega','AOOS810117HCMLRL25',2),(9,'Salvador','Alonso','Ortega','AOOS810117HCMLRL25',3),(10,'Salvador','Alonso','Ortega','AOOS810117HCMLRL25',3),(11,'Salvador','Alonso','Ortega','AOOS810117HCMLRL25',4),(12,'JUAN','PEREZ','CAMPOS','AOOS810117HCMLRL20',2),(13,'MINERVA','ALVAREZ','FELIX','AOOS810117HCMLRL24',4),(14,'Salvadora','Alonsoa','Ortegaa','AOOS810117HCMLRL30',1),(15,'fsadfdfds','fsadfsafdasf','fsdafsdffsda','fdsafasdfsdadf',4),(16,'fsddddsa','fsaddsa','fassadasdas','fsdafsa',4),(17,'fsad','fdas','fdsaf','fsdfas',2);
/*!40000 ALTER TABLE `maPersonal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maUsuarios`
--

DROP TABLE IF EXISTS `maUsuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maUsuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `sNombre` varchar(100) DEFAULT NULL,
  `sPaterno` varchar(100) DEFAULT NULL,
  `sMaterno` varchar(100) DEFAULT NULL,
  `sCorreo` varchar(100) DEFAULT NULL,
  `sPassword` varchar(200) DEFAULT NULL,
  `bActivo` bit(1) DEFAULT NULL,
  `sCURP` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maUsuarios`
--

LOCK TABLES `maUsuarios` WRITE;
/*!40000 ALTER TABLE `maUsuarios` DISABLE KEYS */;
INSERT INTO `maUsuarios` VALUES (1,'Nombre','Paterno','Materno','admin@empresa.org','$2y$10$vwqsDQkJeuOZp8.35aIFVOdAz3NUx7cHet4PqxHwUwoLwxGWJGFbW','','');
/*!40000 ALTER TABLE `maUsuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-05  1:19:14
