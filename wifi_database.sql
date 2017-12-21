-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: wifi_database
-- ------------------------------------------------------
-- Server version	5.7.20-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `WiFiSpots`
--

DROP TABLE IF EXISTS `WiFiSpots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `WiFiSpots` (
  `idWiFiSpots` int(11) NOT NULL,
  `WiFiName` varchar(45) DEFAULT NULL,
  `Strength` int(11) DEFAULT NULL,
  `Paid` varchar(45) DEFAULT NULL,
  `UsersPerDay` int(11) DEFAULT NULL,
  `latitude` float(10,6) DEFAULT NULL,
  `longitude` float(10,6) DEFAULT NULL,
  `Address` varchar(80) DEFAULT NULL,
  `DateRegistered` date DEFAULT NULL,
  PRIMARY KEY (`idWiFiSpots`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `WiFiSpots`
--

LOCK TABLES `WiFiSpots` WRITE;
/*!40000 ALTER TABLE `WiFiSpots` DISABLE KEYS */;
INSERT INTO `WiFiSpots` VALUES (1,'Ile sans-fil St-Cath',3,'No',12000,45.497059,-73.575905,'1371 Rue Sainte-Catherine O Montreal, QC H3G 1R1','2017-06-29'),(2,'ConcordiaUniversity',4,'Yes',20000,45.495316,-73.577614,'1515 Saint-Catherine St W, Montreal, QC H3G 2W1','2017-06-29'),(3,'McDonald\'s Free Wi-FI',4,'No',15000,45.495647,-73.577019,'1472 Saint-Catherine St W, Montreal, QC H3G 1S8','2017-07-13');
/*!40000 ALTER TABLE `WiFiSpots` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-21 15:39:22
