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
-- Table structure for table `estudiantes`
--

DROP TABLE IF EXISTS `estudiantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estudiantes` (
  `ID_Estudiante` int NOT NULL AUTO_INCREMENT,
  `Pri_Nombre` varchar(20) NOT NULL,
  `Seg_Nombre` varchar(20) DEFAULT NULL,
  `Pri_Apellido` varchar(20) NOT NULL,
  `Seg_Apellido` varchar(20) DEFAULT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Cedula` varchar(25) DEFAULT NULL,
  `FK_Genero` int NOT NULL,
  `Telefono` int NOT NULL,
  `Direccion` varchar(45) NOT NULL,
  `Correo_Electronico` varchar(45) NOT NULL,
  `FK_Tutor` int NOT NULL,
  `FK_Parentesco` int NOT NULL,
  PRIMARY KEY (`ID_Estudiante`),
  UNIQUE KEY `Cedula` (`Cedula`),
  KEY `pk_Tutor_id` (`FK_Tutor`),
  KEY `pk_Genero_id` (`FK_Genero`),
  KEY `pk_Parentesco_id` (`FK_Parentesco`),
  CONSTRAINT `pk_Genero_id` FOREIGN KEY (`FK_Genero`) REFERENCES `generos` (`ID_Genero`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pk_Parentesco_id` FOREIGN KEY (`FK_Parentesco`) REFERENCES `parentescos` (`ID_Parentesco`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pk_Tutor_id` FOREIGN KEY (`FK_Tutor`) REFERENCES `tutores` (`ID_Tutor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiantes`
--

LOCK TABLES `estudiantes` WRITE;
/*!40000 ALTER TABLE `estudiantes` DISABLE KEYS */;
INSERT INTO `estudiantes` VALUES (1,'Juan','Carlos','Perez','Gomez','2000-01-01','12345678901234',1,30012345,'Calle Falsa 123','juan.carlos.perez@gmail.com',1,1),(2,'Maria','Josefa','Rodriguez','Lopez','2005-02-02','23456789012345',2,49876543,'Avenida Siempre Viva 456','maria.josefa.rodriguez@yahoo.com',2,2),(3,'Pedro','Manuel','Gonzalez','Martinez','2010-03-03','34567890123456',1,7654321,'Boulevard Eterno 789','pedro.manuel.gonzalez@hotmail.com',3,3),(4,'Ana','María','Torres','Fernandez','1995-04-04','98765432101234',2,55512345,'Carrera Principal 321','ana.torres@ejemplo.com',4,1),(5,'Carlos','Jorge','Ramirez','Vargas','2000-05-05','76543210981234',1,77754321,'Diagonal Desierto 987','carlos.ramirez@ejemplo.com',5,2),(6,'Sofia','Patricia','Garcia','Luna','1996-06-06','65432109801234',2,88876543,'Avenida Sol 456','sofia.garcia@ejemplo.com',6,3),(7,'Luis','Alejandro','Hernandez','Guzman','2001-07-07','54321098701234',1,99954321,'Boulevard Luna 789','luis.hernandez@ejemplo.com',7,1),(8,'Gabriela','Elena','Lopez','Sanchez','1997-08-08','43210987601234',2,11154321,'Calle Estrella 321','gabriela.lopez@ejemplo.com',8,2),(9,'Fernando','Ignacio','Perez','Moreno','2002-09-09','32109876501234',1,22254321,'Transversal Estrellas 654','fernando.perez@ejemplo.com',9,3),(10,'Daniel','Oscar','Gonzalez','Ortiz','1998-10-10','98765432101235',1,44454321,'Carrera Planetas 321','daniel.oscar.gonzalez@gmail.com',10,1),(11,'Carolina','Daniela','Torres','Figueroa','1999-11-11','87654321012336',2,55554321,'Transversal Galaxias 654','carolina.daniela.torres@yahoo.com',11,2),(12,'Alfredo','Adrian','Ramirez','Diaz','2000-12-12','76543210912337',1,66654321,'Diagonal Nebulosas 987','alfredo.adrian.ramirez@hotmail.com',12,3),(13,'Victoria','Vanessa','Morales','Romero','2001-01-13','65432109812338',2,77754321,'Carrera Quasars 321','victoria.vanessa.morales@gmail.com',13,1),(14,'Manuel','Antonio','Rodriguez','Lopez','2002-02-14','54321098712339',1,88876543,'Calle Ejemplo 101','manuel.antoniordiguez@yahoo.com',14,2),(15,'Beatriz','Francisco','Gutierrez','Perez','2003-03-15','43210987612340',2,99954321,'Avenida Otro 102','beatriz.franciscogutierrez@hotmail.com',15,3);
/*!40000 ALTER TABLE `estudiantes` ENABLE KEYS */;
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
