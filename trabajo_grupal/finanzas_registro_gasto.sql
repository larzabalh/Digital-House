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
-- Table structure for table `registro_gasto`
--

DROP TABLE IF EXISTS `registro_gasto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registro_gasto` (
  `idregistros_tarjeta` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `nombre_gasto_id` int(11) NOT NULL,
  `importe` decimal(10,0) NOT NULL,
  `tipo_gasto_id` int(11) DEFAULT NULL,
  `medio_pago_id` int(11) DEFAULT NULL,
  `cuotas_id` int(11) NOT NULL,
  `pagado` tinyint(4) NOT NULL DEFAULT '1',
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`idregistros_tarjeta`),
  KEY `nombre_gasto_id_idx` (`nombre_gasto_id`),
  KEY `tipo_gasto_id_idx` (`tipo_gasto_id`),
  KEY `medio_pago_id_idx` (`medio_pago_id`),
  KEY `cuotas_id_idx` (`cuotas_id`),
  KEY `fk_reg_gasto_usuario_id_idx` (`usuario_id`),
  CONSTRAINT `cuotasid` FOREIGN KEY (`cuotas_id`) REFERENCES `cuotas` (`idcuotas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reg_gasto_usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`idusuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `medio_pagoid` FOREIGN KEY (`medio_pago_id`) REFERENCES `medio_de_pago` (`idmedio_de_pago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `nombre_gastoid` FOREIGN KEY (`nombre_gasto_id`) REFERENCES `gastos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tipo_gastoid` FOREIGN KEY (`tipo_gasto_id`) REFERENCES `tipo_gasto` (`idtipo_gasto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro_gasto`
--

LOCK TABLES `registro_gasto` WRITE;
/*!40000 ALTER TABLE `registro_gasto` DISABLE KEYS */;
INSERT INTO `registro_gasto` VALUES (1,'2017-10-01',1,1500,1,1,1,1,1),(2,'2017-09-01',2,1200,2,2,3,0,1),(3,'2017-08-10',3,9500,1,1,1,1,1),(4,'2017-07-04',4,2500,2,4,3,1,1),(5,'2017-07-04',4,2500,2,4,3,1,1),(6,'2017-02-01',6,2532,6,3,1,0,1),(7,'2017-10-01',5,268,6,1,1,0,1),(8,'2017-10-02',6,12,4,3,7,0,1),(9,'2017-10-12',1,23,1,1,1,1,1),(10,'2017-10-04',3,10000,5,3,12,1,1);
/*!40000 ALTER TABLE `registro_gasto` ENABLE KEYS */;
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
