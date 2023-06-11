-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: second_hand
-- ------------------------------------------------------
-- Server version	8.0.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `garments`
--

DROP TABLE IF EXISTS `garments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `garments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `garment` varchar(155) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `date_added` varchar(42) DEFAULT NULL,
  `sold_status` tinyint(1) DEFAULT NULL,
  `seller_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_seller_id` (`seller_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `garments`
--

LOCK TABLES `garments` WRITE;
/*!40000 ALTER TABLE `garments` DISABLE KEYS */;
INSERT INTO `garments` VALUES (1,'Electric Dream Jacket',250,'2023-05-29',0,5),(2,'Steller Sequin Dress',169,'2023-05-15',0,1),(3,'Cosmic Hoodie',229,'2023-05-30',0,2),(4,'Nebula Leggings',159,'2023-04-28',0,2),(5,'Techno Tuxedo',450,'2023-04-17',0,3),(6,'Lunar Lace Top',99,'2023-03-23',1,4),(7,'Solar Flare Skirt',199,'2023-03-23',1,6),(8,'Celestial Jumpsuit',329,'2023-05-22',0,5),(9,'Meteorite Socks',69,'2023-04-08',0,7),(10,'Aurora Borealis Scarf',129,'2023-04-16',1,1);
/*!40000 ALTER TABLE `garments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sellers`
--

DROP TABLE IF EXISTS `sellers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sellers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(42) DEFAULT NULL,
  `last_name` varchar(42) DEFAULT NULL,
  `email` varchar(42) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sellers`
--

LOCK TABLES `sellers` WRITE;
/*!40000 ALTER TABLE `sellers` DISABLE KEYS */;
INSERT INTO `sellers` VALUES (1,'Max','Steel','steel@user.com'),(2,'Luna','Stardust','star@user.com'),(3,'Oliver','Twist','twist@user.com'),(4,'Ruby','Sparks','rubyS@user.com'),(5,'Jack','Thunderbolt','jbolt@user.com'),(6,'Nova','Galaxy','novaG@user.com'),(7,'Finn','FireStorm','storm@user.com'),(8,'Rhea','Redcheeks','rhea@user.com'),(9,'Rhea','Redcheeks','rhea@user.com'),(10,'','',''),(11,'','',''),(12,'','',''),(13,'','',''),(14,'','','');
/*!40000 ALTER TABLE `sellers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-11  8:59:58
