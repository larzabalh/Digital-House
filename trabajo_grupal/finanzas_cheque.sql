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
-- Table structure for table `cheque`
--

DROP TABLE IF EXISTS `cheque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cheque` (
  `idcheque` int(11) NOT NULL AUTO_INCREMENT,
  `numero_cheque` int(11) NOT NULL,
  `importe_cheque` decimal(10,0) NOT NULL,
  `fecha_emision` date NOT NULL,
  `fecha_cobro` date NOT NULL,
  `destinatario` varchar(45) NOT NULL,
  `estado_cheque` varchar(45) DEFAULT NULL,
  `movimiento_bancario_id` int(11) NOT NULL,
  `chequera_id` int(11) DEFAULT NULL,
  `condicion_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`idcheque`),
  UNIQUE KEY `idcheque_UNIQUE` (`idcheque`),
  UNIQUE KEY `numero_cheque_UNIQUE` (`numero_cheque`),
  KEY `movientos_bancarios_id_idx` (`movimiento_bancario_id`),
  KEY `chequera_id_idx` (`chequera_id`),
  KEY `condicion_id_idx` (`condicion_id`),
  KEY `fk_cheque_1_idx` (`usuario_id`),
  CONSTRAINT `chequera_id` FOREIGN KEY (`chequera_id`) REFERENCES `chequera` (`idchequera`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `condicion_id` FOREIGN KEY (`condicion_id`) REFERENCES `condicion_cheque` (`idcondicion_cheque`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cheque_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`idusuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `moviento_bancario_id` FOREIGN KEY (`movimiento_bancario_id`) REFERENCES `movimientos` (`idmovimientos_bancarios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cheque`
--

LOCK TABLES `cheque` WRITE;
/*!40000 ALTER TABLE `cheque` DISABLE KEYS */;
/*!40000 ALTER TABLE `cheque` ENABLE KEYS */;
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
