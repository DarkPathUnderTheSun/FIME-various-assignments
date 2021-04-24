-- MySQL dump 10.13  Distrib 8.0.23, for Linux (x86_64)
--
-- Host: localhost    Database: example
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.18-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `prestamos`
--

DROP TABLE IF EXISTS `prestamos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prestamos` (
  `prestamo_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `a_quien` varchar(60) DEFAULT NULL,
  `fecha_prestamo` date DEFAULT NULL,
  `fecha_devolucion` date DEFAULT NULL,
  PRIMARY KEY (`prestamo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prestamos`
--

LOCK TABLES `prestamos` WRITE;
/*!40000 ALTER TABLE `prestamos` DISABLE KEYS */;
INSERT INTO `prestamos` VALUES (1,1,'Juan','2021-04-19','2021-04-19'),(2,1,'Juan','2021-04-19','2021-04-20'),(3,1,'Juan','2021-04-19','2021-04-20'),(4,2,'Fulano','2021-04-20','2021-04-20');
/*!40000 ALTER TABLE `prestamos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tools`
--

DROP TABLE IF EXISTS `tools`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tools` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(60) NOT NULL,
  `location` varchar(60) NOT NULL,
  `who_has_it` varchar(60) NOT NULL,
  `marca` varchar(60) DEFAULT NULL,
  `modelo` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tools`
--

LOCK TABLES `tools` WRITE;
/*!40000 ALTER TABLE `tools` DISABLE KEYS */;
INSERT INTO `tools` VALUES (1,'Mini esmeriladora','almacen','almacen','DeWalt',NULL),(2,'Martillo Perforador','almacen','almacen','DeWalt',NULL),(3,'Llave impacto inalambrica','almacen','almacen','DeWalt',NULL),(4,'Alambre tubular','almacen','almacen','DeWalt',NULL),(5,'AMP Automatico','almacen','almacen','Viking',NULL),(6,'Maquina de soldar','almacen','almacen','Loncoln',NULL),(7,'Soporte de taladro','almacen','almacen','Bolid',NULL),(8,'Sierra de banda','almacen','almacen','DeWalt',NULL),(9,'Cajita','almacen','almacen','DeWalt',NULL),(10,'Amoladora de banco','almacen','almacen','DeWalt',NULL),(11,'Sierra caladora','almacen','almacen','DeWalt',NULL),(12,'Corner Clamp','almacen','almacen','DeWalt',NULL),(13,'Brocas','almacen','almacen','DeWalt',NULL),(14,'Brocas','almacen','almacen','DeWalt',NULL),(15,'Corner Clamp','almacen','almacen','DeWalt',NULL),(16,'Lijadora','almacen','almacen','DeWalt',NULL),(17,'Juego de Terrajas','almacen','almacen','Bolid',NULL),(18,'Revolvedora','almacen','almacen','DeWalt',NULL),(19,'Juegop de Formones','almacen','almacen','DeWalt',NULL);
/*!40000 ALTER TABLE `tools` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-19 19:20:06
