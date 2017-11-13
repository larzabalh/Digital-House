-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: finanzas
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
-- Table structure for table `cuentas_bancaria`
--

DROP TABLE IF EXISTS `cuentas_bancaria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuentas_bancaria` (
  `idcuentas_bancaria` int(11) NOT NULL AUTO_INCREMENT,
  `num_cuenta` varchar(45) NOT NULL,
  `banco_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`idcuentas_bancaria`),
  UNIQUE KEY `id_cuentas_bancaria_UNIQUE` (`idcuentas_bancaria`),
  UNIQUE KEY `num_cuenta_UNIQUE` (`num_cuenta`),
  KEY `banco_id_idx` (`banco_id`),
  KEY `fk_cuenta_banc_usuario_id_idx` (`usuario_id`),
  CONSTRAINT `banco_id` FOREIGN KEY (`banco_id`) REFERENCES `bancos` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_cuenta_banc_usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`idusuarios`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuentas_bancaria`
--

LOCK TABLES `cuentas_bancaria` WRITE;
/*!40000 ALTER TABLE `cuentas_bancaria` DISABLE KEYS */;
INSERT INTO `cuentas_bancaria` VALUES (16,'CUENTA DEL GALICIA',7,1),(17,'CUENTA DEL SANTANDER',8,1),(18,'CUENTA DEL FRANCES',9,1),(19,'CUENTA DEL HSBC',10,1),(20,'CUENTA 2 DEL GALICIA',7,1),(21,'CUENTA 2 DEL SANTANDER',8,1),(22,'CUENTA 2 DEL FRANCES',9,1),(23,'CUENTA 2 DEL HSBC',10,1),(24,'CUENTA DEL CIUDAD',11,1),(25,'Cuenta Banco Pata',12,1);
/*!40000 ALTER TABLE `cuentas_bancaria` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-13  9:05:05
