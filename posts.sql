-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: 34.132.199.73    Database: geniat
-- ------------------------------------------------------
-- Server version	8.0.18-google

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
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
SET @@SESSION.SQL_LOG_BIN= 0;

--
-- GTID state at the beginning of the backup 
--

SET @@GLOBAL.GTID_PURGED=/*!80000 '+'*/ '73bb2230-7afd-11ec-82b9-42010a800003:1-16461';

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permission_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1,5),(3,2,2),(4,3,5),(5,3,1),(6,4,5),(7,4,2),(8,4,1),(9,4,3),(10,5,1),(11,2,5),(12,5,2),(13,5,3),(14,5,4),(15,5,5);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `per_description` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'create'),(2,'read'),(3,'update'),(4,'delete'),(5,'login'),(6,'total');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(2000) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (1,'El principito','Es un adulto que intenta razonar y actuar como un niÃ±o, para recuperar al niÃ±o que todos hemos sido y que llevamos dentro. Es nuestra propia imagen, nuestro reflejo en la historia; el personaje que nos identifica y nos hace ver cÃ³mo deberÃ­amos ver las cosas y cÃ³mo las vemos en realidad','2022-01-21 21:31:37',1),(2,'Señor de los anillosv','La novela narra el viaje del protagonista principal, Frodo Bolsón, hobbit de la Comarca, para destruir el Anillo Único y la consiguiente guerra que provocará el enemigo para recuperarlo, ya que es la principal fuente de poder de su creador, el Señor oscuro, Sauron.','2022-01-22 03:31:17',1),(3,'titulo','hjdahsdahdhdha','2022-01-22 03:33:27',1),(4,'test','test','2022-01-22 03:59:12',1),(5,'test','test','2022-01-22 04:04:23',1),(6,'test','test','2022-01-22 04:04:45',1),(7,'test','test','2022-01-22 04:35:23',1),(8,'test','test','2022-01-22 04:36:53',1),(9,'test','test','2022-01-22 04:37:09',1),(11,'test','test','2022-01-22 04:38:07',1),(12,'test','test','2022-01-22 04:38:40',1),(13,'test','test','2022-01-22 06:07:42',1),(14,'test','test','2022-01-22 06:11:33',1),(16,'El principito','Es un adulto que intenta razonar y actuar como un niÃ±o, para recuperar al niÃ±o que todos hemos sido y que llevamos dentro. Es nuestra propia imagen, nuestro reflejo en la historia; el personaje que nos identifica y nos hace ver cÃ³mo deberÃ­amos ver las cosas y cÃ³mo las vemos en realidad','2022-01-22 06:12:33',1),(17,'Principal','test','2022-01-22 07:40:17',4);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rol_description` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Rol básico'),(2,'Rol medio'),(3,'Rol medio alto'),(4,'Rol alto medio'),(5,'Rol alto');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `lastname` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `pr_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Rol_idx` (`pr_id`),
  CONSTRAINT `Rol` FOREIGN KEY (`pr_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Humberto','Hernandez','kh17728@gmail.com','$2y$10$TQjoSF/bjUztNW133Xpyy.GHn3ZK49Hj7XJA18jg5p74Tl3UQ.Ja6',5),(2,'Felipe','Fernandez','felipe01@gmail.com','$2y$10$TQjoSF/bjUztNW133Xpyy.GHn3ZK49Hj7XJA18jg5p74Tl3UQ.Ja6',1),(3,'Lourdes','Garcia','lourdes@gmail.com','$2y$10$TQjoSF/bjUztNW133Xpyy.GHn3ZK49Hj7XJA18jg5p74Tl3UQ.Ja6',2),(4,'Alexandeer','Guillen','guillen@gmail.com','$2y$10$TQjoSF/bjUztNW133Xpyy.GHn3ZK49Hj7XJA18jg5p74Tl3UQ.Ja6',3),(5,'Cristian','Jimenez','jimenez@gmail.com','$2y$10$TQjoSF/bjUztNW133Xpyy.GHn3ZK49Hj7XJA18jg5p74Tl3UQ.Ja6',4),(6,'Jenifer','Lopez','otro@gmail.com','$2y$10$AKIP/UrAOJlt3wTIJec5kujuFBri8aZrGFBBKvrzYhzPFwyIoaBj2',1),(8,'Jenifer','Lopez','jenifer@gmail.com','$2y$10$zFrDEeaHvYMRCoiKpzFEKOZji//tPEJCzPbXBYMn4xHfXFjkFoR0O',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-22 13:53:02
