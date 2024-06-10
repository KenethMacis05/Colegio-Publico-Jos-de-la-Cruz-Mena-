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
-- Table structure for table `matriculas`
--

DROP TABLE IF EXISTS `matriculas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `matriculas` (
  `ID_Matricula` int NOT NULL AUTO_INCREMENT,
  `Cod_Matricula` varchar(5) NOT NULL,
  `FK_Estudiante` int NOT NULL,
  `FK_Grado` int NOT NULL,
  `FK_Seccion` int NOT NULL,
  `FK_Turno` int NOT NULL,
  `FK_Estado` int NOT NULL,
  `FK_Anio_Lectivo` int NOT NULL,
  `Fecha_Matricula` date NOT NULL,
  PRIMARY KEY (`ID_Matricula`),
  KEY `pk_Estados_id` (`FK_Estado`),
  KEY `pk_Anios_Lectivos_id` (`FK_Anio_Lectivo`),
  KEY `pk_Turnos_id` (`FK_Turno`),
  KEY `pk_Grados_id` (`FK_Grado`),
  KEY `pk_Secciones_id` (`FK_Seccion`),
  KEY `idx_FK_Estudiante` (`FK_Estudiante`),
  CONSTRAINT `pk_Anios_Lectivos_id` FOREIGN KEY (`FK_Anio_Lectivo`) REFERENCES `anio_lectivo` (`ID_Anio_Lectivo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pk_Estados_id` FOREIGN KEY (`FK_Estado`) REFERENCES `estados` (`ID_Estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pk_estudiantes_id` FOREIGN KEY (`FK_Estudiante`) REFERENCES `estudiantes` (`ID_Estudiante`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pk_Grados_id` FOREIGN KEY (`FK_Grado`) REFERENCES `grados` (`ID_Grado`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pk_Secciones_id` FOREIGN KEY (`FK_Seccion`) REFERENCES `secciones` (`ID_Seccion`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pk_Turnos_id` FOREIGN KEY (`FK_Turno`) REFERENCES `turnos` (`ID_Turno`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matriculas`
--

LOCK TABLES `matriculas` WRITE;
/*!40000 ALTER TABLE `matriculas` DISABLE KEYS */;
INSERT INTO `matriculas` VALUES (1,'M001',1,1,1,1,1,1,'2024-01-01'),(2,'M002',2,1,1,1,1,1,'2024-01-01'),(3,'M003',3,1,1,1,1,1,'2024-01-01'),(4,'M004',4,2,1,1,2,1,'2024-01-01'),(5,'M005',5,6,1,2,2,1,'2024-01-01'),(6,'M006',6,1,1,1,1,1,'2024-01-01'),(7,'M007',7,2,1,1,1,1,'2024-01-01'),(8,'M008',8,3,1,1,1,1,'2024-01-01'),(9,'M009',9,4,1,1,2,1,'2024-01-01'),(10,'M010',10,5,1,2,2,1,'2024-01-01'),(11,'M011',11,6,1,2,2,1,'2024-01-01'),(12,'M012',12,7,1,1,1,1,'2024-01-01'),(13,'M013',13,8,1,1,2,1,'2024-01-01'),(14,'M014',14,9,2,1,2,1,'2024-01-01'),(15,'M015',15,10,1,1,1,1,'2024-01-01');
/*!40000 ALTER TABLE `matriculas` ENABLE KEYS */;
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
