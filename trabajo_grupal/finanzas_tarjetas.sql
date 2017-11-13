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
-- Table structure for table `tarjetas`
--

DROP TABLE IF EXISTS `tarjetas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarjetas` (
  `idtarjetas` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tarjeta` varchar(45) NOT NULL,
  `dia_del_debito` int(11) NOT NULL,
  `medio_de_pago_id` int(11) NOT NULL,
  `limite` decimal(10,0) DEFAULT NULL,
  `cuenta_bancaria_id` int(11) NOT NULL,
  `movimiento_bancario_id` int(11) DEFAULT NULL,
  `usuario_tarjeta_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`idtarjetas`),
  KEY `cuenta_bancaria_id_idx` (`cuenta_bancaria_id`),
  KEY `movimento_bancario_id_idx` (`movimiento_bancario_id`),
  KEY `fk_tarjetas_1_idx` (`usuario_tarjeta_id`),
  KEY `fk_tarjetas_2_idx` (`usuario_id`),
  KEY `fk_tarjetas_3_idx` (`medio_de_pago_id`),
  CONSTRAINT `cta_bancaria_id` FOREIGN KEY (`cuenta_bancaria_id`) REFERENCES `cuentas_bancaria` (`idcuentas_bancaria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tarjetas_1` FOREIGN KEY (`usuario_tarjeta_id`) REFERENCES `usuarios_tarjetas` (`idusuarios_tarjetas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tarjetas_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`idusuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tarjetas_3` FOREIGN KEY (`medio_de_pago_id`) REFERENCES `medio_de_pago` (`idmedio_de_pago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `mov_bancario_id` FOREIGN KEY (`movimiento_bancario_id`) REFERENCES `movimientos` (`idmovimientos_bancarios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarjetas`
--

LOCK TABLES `tarjetas` WRITE;
/*!40000 ALTER TABLE `tarjetas` DISABLE KEYS */;
INSERT INTO `tarjetas` VALUES (1,'VISA',15,2,50000,16,3,1,1),(2,'MASTERCARD',2,2,75000,19,3,1,1),(3,'MASTERCARD',2,2,75000,19,3,1,1),(4,'VISA',3,2,50000,19,3,1,1);
/*!40000 ALTER TABLE `tarjetas` ENABLE KEYS */;
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
