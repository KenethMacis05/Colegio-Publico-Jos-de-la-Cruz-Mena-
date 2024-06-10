CREATE DATABASE  IF NOT EXISTS `gestion_escolar_jdlcm` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `gestion_escolar_jdlcm`;
-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: gestion_escolar_jdlcm
-- ------------------------------------------------------
-- Server version	8.0.36

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
-- Table structure for table `calificaciones`
--

DROP TABLE IF EXISTS `calificaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `calificaciones` (
  `ID_Calificacion` int NOT NULL AUTO_INCREMENT,
  `FK_Estudiante` int NOT NULL,
  `Matematica` int DEFAULT NULL,
  `Lengua_Extranjera` int DEFAULT NULL,
  `Lengua_Literatura` int DEFAULT NULL,
  `Ciencias_Naturales` int DEFAULT NULL,
  `Educacion_Fisica` int DEFAULT NULL,
  `Quimica` int DEFAULT NULL,
  `OTV` int DEFAULT NULL,
  `Fisica` int DEFAULT NULL,
  `Biologia` int DEFAULT NULL,
  `Historia` int DEFAULT NULL,
  `Geografia` int DEFAULT NULL,
  `Economia` int DEFAULT NULL,
  `Sociologia` int DEFAULT NULL,
  `ECA` int DEFAULT NULL,
  `FK_Anio_Lectivo` int NOT NULL,
  PRIMARY KEY (`ID_Calificacion`),
  KEY `pk_Estudiante_id` (`FK_Estudiante`),
  KEY `pk_Anio_Lectivo_id` (`FK_Anio_Lectivo`),
  CONSTRAINT `pk_Anio_Lectivo_id` FOREIGN KEY (`FK_Anio_Lectivo`) REFERENCES `anio_lectivo` (`ID_Anio_Lectivo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pk_Estudiante_id` FOREIGN KEY (`FK_Estudiante`) REFERENCES `estudiantes` (`ID_Estudiante`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calificaciones`
--

LOCK TABLES `calificaciones` WRITE;
/*!40000 ALTER TABLE `calificaciones` DISABLE KEYS */;
INSERT INTO `calificaciones` VALUES (1,1,85,90,88,92,80,75,70,78,85,89,86,83,87,90,1),(2,2,80,82,84,88,76,71,69,77,84,88,85,82,86,89,1),(3,3,85,90,88,92,80,75,70,78,85,89,86,83,87,90,1),(4,4,80,82,84,88,76,71,69,77,84,88,85,82,86,89,1),(5,5,85,90,88,92,80,75,70,78,85,89,86,83,87,90,1),(6,6,80,82,84,88,76,71,69,77,84,88,85,82,86,89,1),(7,7,85,90,88,92,80,75,70,78,85,89,86,83,87,90,1),(8,8,80,82,84,88,76,71,69,77,84,88,85,82,86,89,1),(9,9,85,90,88,92,80,75,70,78,85,89,86,83,87,90,1),(10,10,80,82,84,88,76,71,69,77,84,88,85,82,86,89,1),(11,11,85,90,88,92,80,75,70,78,85,89,86,83,87,90,1),(12,12,80,82,84,88,76,71,69,77,84,88,85,82,86,89,1),(13,13,85,90,88,92,80,75,70,78,85,89,86,83,87,90,1),(14,14,80,82,84,88,76,71,69,77,84,88,85,82,86,89,1),(15,15,95,93,91,96,85,76,72,79,86,90,87,84,88,91,1);
/*!40000 ALTER TABLE `calificaciones` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-09 20:35:37
