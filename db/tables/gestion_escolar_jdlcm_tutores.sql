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
-- Table structure for table `tutores`
--

DROP TABLE IF EXISTS `tutores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tutores` (
  `ID_Tutor` int NOT NULL AUTO_INCREMENT,
  `Pri_Nombre` varchar(20) NOT NULL,
  `Seg_Nombre` varchar(20) DEFAULT NULL,
  `Pri_Apellido` varchar(20) NOT NULL,
  `Seg_Apellido` varchar(20) DEFAULT NULL,
  `Cedula` varchar(25) NOT NULL,
  `Telefono` int NOT NULL,
  `Direccion` varchar(45) NOT NULL,
  `Correo_Electronico` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_Tutor`),
  UNIQUE KEY `Cedula` (`Cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tutores`
--

LOCK TABLES `tutores` WRITE;
/*!40000 ALTER TABLE `tutores` DISABLE KEYS */;
INSERT INTO `tutores` VALUES (1,'Ana','María','Torres','Fernandez','9876543210',55512345,'Carrera Principal 321','ana.torres@ejemplo.com'),(2,'Laura','Isabel','Morales','Rojas','8765432109',66676543,'Transversal Perdido 654','laura.morales@ejemplo.com'),(3,'Carlos','Jorge','Ramirez','Vargas','7654321098',77754321,'Diagonal Desierto 987','carlos.ramirez@ejemplo.com'),(4,'Sofia','Patricia','Garcia','Luna','6543210987',88876543,'Avenida Sol 456','sofia.garcia@ejemplo.com'),(5,'Luis','Alejandro','Hernandez','Guzman','5432109876',99954321,'Boulevard Luna 789','luis.hernandez@ejemplo.com'),(6,'Gabriela','Elena','Lopez','Sanchez','4321098765',11154321,'Calle Estrella 321','gabriela.lopez@ejemplo.com'),(7,'Fernando','Ignacio','Perez','Moreno','3210987654',22254321,'Transversal Estrellas 654','fernando.perez@ejemplo.com'),(8,'Camila','Valeria','Rodriguez','Castillo','2109876543',33354321,'Diagonal Nubes 987','camila.rodriguez@ejemplo.com'),(9,'Daniel','Oscar','Gonzalez','Ortiz','1876543211',44454321,'Carrera Planetas 321','daniel.gonzalez@ejemplo.com'),(10,'Carolina','Daniela','Torres','Figueroa','1765432109',55554321,'Transversal Galaxias 654','carolina.torres@ejemplo.com'),(11,'Alfredo','Adrian','Ramirez','Diaz','5654321198',66654321,'Diagonal Nebulosas 987','alfredo.ramirez@ejemplo.com'),(12,'Victoria','Vanessa','Morales','Romero','7543210987',77754321,'Carrera Quasars 321','victoria.morales@ejemplo.com'),(13,'Manuel','Antonio','Rodriguez','Lopez','9876543212',78901234,'Calle Ejemplo 101','manuel.antoniordiguez@gmail.com'),(14,'Beatriz','Francisco','Gutierrez','Perez','2345678902',89012345,'Avenida Otro 102','beatriz.franciscogutierrez@gmail.com'),(15,'Miguel','Maria','Jimenez','Garcia','3456789013',90123456,'Boulevard Otra 103','miguel.mariajimenez@gmail.com');
/*!40000 ALTER TABLE `tutores` ENABLE KEYS */;
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
