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
-- Table structure for table `medio_de_pago`
--

DROP TABLE IF EXISTS `medio_de_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medio_de_pago` (
  `idmedio_de_pago` int(11) NOT NULL AUTO_INCREMENT,
  `forma_de_pago` varchar(45) NOT NULL,
  `tarjeta_id` int(11) DEFAULT NULL,
  `cuenta_bancaria_id` int(11) DEFAULT NULL,
  `cheque_id` int(11) DEFAULT NULL,
  `caja_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`idmedio_de_pago`),
  KEY `cheque_id_idx` (`cheque_id`),
  KEY `cuenta_bancaria_id_idx` (`cuenta_bancaria_id`),
  KEY `tarjeta_id_idx` (`tarjeta_id`),
  KEY `fk_medio_de_pago_1_idx` (`usuario_id`),
  CONSTRAINT `chequeid` FOREIGN KEY (`cheque_id`) REFERENCES `cheque` (`idcheque`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `cuenta_bancariaid` FOREIGN KEY (`cuenta_bancaria_id`) REFERENCES `cuentas_bancaria` (`idcuentas_bancaria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_medio_de_pago_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`idusuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tarjetaid` FOREIGN KEY (`tarjeta_id`) REFERENCES `tarjetas` (`idtarjetas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medio_de_pago`
--

LOCK TABLES `medio_de_pago` WRITE;
/*!40000 ALTER TABLE `medio_de_pago` DISABLE KEYS */;
INSERT INTO `medio_de_pago` VALUES (1,'EFECTIVO',NULL,NULL,NULL,NULL,1),(2,'DEBITO AUTOMATICO',NULL,NULL,NULL,NULL,1),(3,'CHEQUE',NULL,NULL,NULL,NULL,1),(4,'TARJETA',NULL,NULL,NULL,NULL,1);
/*!40000 ALTER TABLE `medio_de_pago` ENABLE KEYS */;
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
