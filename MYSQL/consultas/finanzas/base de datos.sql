-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: mydb
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.26-MariaDB

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
-- Table structure for table `bancos`
--

DROP TABLE IF EXISTS `bancos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bancos` (
  `idbancos` int(11) NOT NULL AUTO_INCREMENT,
  `banco_nombre` varchar(45) NOT NULL,
  `estado` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`idbancos`),
  UNIQUE KEY `idBANCOS_UNIQUE` (`idbancos`),
  UNIQUE KEY `banco_nombre_UNIQUE` (`banco_nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='					';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bancos`
--

LOCK TABLES `bancos` WRITE;
/*!40000 ALTER TABLE `bancos` DISABLE KEYS */;
INSERT INTO `bancos` VALUES (1,'SANTANDER RIO',1),(2,'HSBC',1),(3,'CIUDAD',1),(4,'PATAGONIA',1),(5,'FRANCES',1);
/*!40000 ALTER TABLE `bancos` ENABLE KEYS */;
UNLOCK TABLES;

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
  `condicion_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcheque`),
  UNIQUE KEY `idcheque_UNIQUE` (`idcheque`),
  UNIQUE KEY `numero_cheque_UNIQUE` (`numero_cheque`),
  KEY `movientos_bancarios_id_idx` (`movimiento_bancario_id`),
  KEY `chequera_id_idx` (`chequera_id`),
  KEY `condicion_id_idx` (`condicion_id`),
  CONSTRAINT `chequera_id` FOREIGN KEY (`chequera_id`) REFERENCES `chequera` (`idchequera`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `condicion_id` FOREIGN KEY (`condicion_id`) REFERENCES `condicion_cheque` (`idcondicion_cheque`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `moviento_bancario_id` FOREIGN KEY (`movimiento_bancario_id`) REFERENCES `movimientos_bancarios` (`idmovimientos_bancarios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cheque`
--

LOCK TABLES `cheque` WRITE;
/*!40000 ALTER TABLE `cheque` DISABLE KEYS */;
INSERT INTO `cheque` VALUES (1,51,1501,'2017-09-27','2017-10-13','Destinatario del cheque','1',1,1,2),(2,52,9999,'2017-09-30','2017-10-15','Provend SRL','1',1,1,1),(5,53,2500,'2017-09-30','2017-10-15','consumidor final','1',1,4,3),(6,54,2500,'2017-09-30','2017-10-15','consumidor final','1',1,3,3),(8,55,2500,'2017-09-30','2017-10-15','consumidor final','1',1,7,3),(9,58,7500,'2017-09-30','2017-10-15','consumidor final','1',1,6,2),(10,59,7700,'2017-09-30','2017-10-15','HERNAN','1',1,5,2),(11,60,8500,'2017-09-30','2017-10-15','HERNAN','1',1,5,2),(12,61,10580,'2017-09-30','2017-10-15','HERNAN','1',1,6,2);
/*!40000 ALTER TABLE `cheque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chequera`
--

DROP TABLE IF EXISTS `chequera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chequera` (
  `idchequera` int(11) NOT NULL AUTO_INCREMENT,
  `numero_chequera` int(11) NOT NULL,
  `cantidad_cheques` int(11) NOT NULL,
  `desde` int(11) NOT NULL,
  `hasta` int(11) NOT NULL,
  `cuenta_bancaria_id` int(11) NOT NULL,
  PRIMARY KEY (`idchequera`),
  KEY `cuenta_bancaria_id_idx` (`cuenta_bancaria_id`),
  CONSTRAINT `cuenta_bancaria_id` FOREIGN KEY (`cuenta_bancaria_id`) REFERENCES `cuentas_bancaria` (`idcuentas_bancaria`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chequera`
--

LOCK TABLES `chequera` WRITE;
/*!40000 ALTER TABLE `chequera` DISABLE KEYS */;
INSERT INTO `chequera` VALUES (1,1,25,51,75,1),(4,1,25,1,50,2),(5,1,25,1,50,3),(6,1,25,1,50,5),(7,1,25,101,150,7);
/*!40000 ALTER TABLE `chequera` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `idclientes` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_cliente` varchar(45) NOT NULL,
  `honorario` decimal(10,0) NOT NULL,
  `medio_pago_id` int(11) NOT NULL,
  `cobrador_id` int(11) NOT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  `cobrado` tinyint(4) DEFAULT NULL,
  `contacto_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`idclientes`),
  KEY `cobrador_id_idx` (`cobrador_id`),
  KEY `medio_pago_id_idx` (`medio_pago_id`),
  KEY `contacto_id_idx` (`contacto_id`),
  CONSTRAINT `cobrador_id` FOREIGN KEY (`cobrador_id`) REFERENCES `cobrador` (`idcobrador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `contacto_id` FOREIGN KEY (`contacto_id`) REFERENCES `contacto` (`idcontacto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `mediopagoid` FOREIGN KEY (`medio_pago_id`) REFERENCES `medio_de_pago` (`idmedio_de_pago`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cobrador`
--

DROP TABLE IF EXISTS `cobrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cobrador` (
  `idcobrador` int(11) NOT NULL AUTO_INCREMENT,
  `cobrador` varchar(45) NOT NULL,
  PRIMARY KEY (`idcobrador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cobrador`
--

LOCK TABLES `cobrador` WRITE;
/*!40000 ALTER TABLE `cobrador` DISABLE KEYS */;
/*!40000 ALTER TABLE `cobrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `condicion_cheque`
--

DROP TABLE IF EXISTS `condicion_cheque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `condicion_cheque` (
  `idcondicion_cheque` int(11) NOT NULL AUTO_INCREMENT,
  `condicion_cheque` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcondicion_cheque`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `condicion_cheque`
--

LOCK TABLES `condicion_cheque` WRITE;
/*!40000 ALTER TABLE `condicion_cheque` DISABLE KEYS */;
INSERT INTO `condicion_cheque` VALUES (1,'ABIERTO'),(2,'CRUZADO'),(3,'NO A LA ORDEN');
/*!40000 ALTER TABLE `condicion_cheque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacto`
--

DROP TABLE IF EXISTS `contacto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacto` (
  `idcontacto` int(11) NOT NULL AUTO_INCREMENT,
  `contacto` varchar(45) DEFAULT NULL,
  `mail` varchar(45) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono_fijo` varchar(255) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcontacto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacto`
--

LOCK TABLES `contacto` WRITE;
/*!40000 ALTER TABLE `contacto` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacto` ENABLE KEYS */;
UNLOCK TABLES;

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
  PRIMARY KEY (`idcuentas_bancaria`),
  UNIQUE KEY `id_cuentas_bancaria_UNIQUE` (`idcuentas_bancaria`),
  UNIQUE KEY `num_cuenta_UNIQUE` (`num_cuenta`),
  KEY `banco_id_idx` (`banco_id`),
  CONSTRAINT `banco_id` FOREIGN KEY (`banco_id`) REFERENCES `bancos` (`idbancos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuentas_bancaria`
--

LOCK TABLES `cuentas_bancaria` WRITE;
/*!40000 ALTER TABLE `cuentas_bancaria` DISABLE KEYS */;
INSERT INTO `cuentas_bancaria` VALUES (1,'362629/0',1),(2,'165189',1),(3,'15687',2),(4,'6879',2),(5,'cds',3),(6,'cegt',3),(7,'cuenta 1',4),(8,'cuenta 2',4);
/*!40000 ALTER TABLE `cuentas_bancaria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuotas`
--

DROP TABLE IF EXISTS `cuotas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuotas` (
  `idcuotas` int(11) NOT NULL AUTO_INCREMENT,
  `numero_cuotas` int(11) NOT NULL,
  PRIMARY KEY (`idcuotas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuotas`
--

LOCK TABLES `cuotas` WRITE;
/*!40000 ALTER TABLE `cuotas` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuotas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gasto`
--

DROP TABLE IF EXISTS `gasto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gasto` (
  `idgasto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_gasto` varchar(45) NOT NULL,
  `medio_pago_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`idgasto`),
  KEY `medio_pago_id_idx` (`medio_pago_id`),
  CONSTRAINT `medio_pago_id` FOREIGN KEY (`medio_pago_id`) REFERENCES `medio_de_pago` (`idmedio_de_pago`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gasto`
--

LOCK TABLES `gasto` WRITE;
/*!40000 ALTER TABLE `gasto` DISABLE KEYS */;
/*!40000 ALTER TABLE `gasto` ENABLE KEYS */;
UNLOCK TABLES;

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
  PRIMARY KEY (`idmedio_de_pago`),
  KEY `cheque_id_idx` (`cheque_id`),
  KEY `cuenta_bancaria_id_idx` (`cuenta_bancaria_id`),
  KEY `tarjeta_id_idx` (`tarjeta_id`),
  CONSTRAINT `chequeid` FOREIGN KEY (`cheque_id`) REFERENCES `cheque` (`idcheque`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `cuenta_bancariaid` FOREIGN KEY (`cuenta_bancaria_id`) REFERENCES `cuentas_bancaria` (`idcuentas_bancaria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tarjetaid` FOREIGN KEY (`tarjeta_id`) REFERENCES `tarjetas` (`idtarjetas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medio_de_pago`
--

LOCK TABLES `medio_de_pago` WRITE;
/*!40000 ALTER TABLE `medio_de_pago` DISABLE KEYS */;
/*!40000 ALTER TABLE `medio_de_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movimientos_bancarios`
--

DROP TABLE IF EXISTS `movimientos_bancarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movimientos_bancarios` (
  `idmovimientos_bancarios` int(11) NOT NULL AUTO_INCREMENT,
  `movimientos_nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idmovimientos_bancarios`),
  UNIQUE KEY `idmovimientos_bancarios_UNIQUE` (`idmovimientos_bancarios`),
  UNIQUE KEY `movimientos_nombre_UNIQUE` (`movimientos_nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimientos_bancarios`
--

LOCK TABLES `movimientos_bancarios` WRITE;
/*!40000 ALTER TABLE `movimientos_bancarios` DISABLE KEYS */;
INSERT INTO `movimientos_bancarios` VALUES (1,'CHEQUE'),(7,'COMISIONES'),(2,'EXTRACCION A CAJA'),(8,'GASTOS BANCARIOS'),(5,'IMP. CRED.'),(4,'IMP. DEB.'),(6,'SIRCREB'),(3,'TRANSFERENCIA RECIBIDA'),(9,'TRANSFERENCIAS A TERCEROS');
/*!40000 ALTER TABLE `movimientos_bancarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registro_bancario`
--

DROP TABLE IF EXISTS `registro_bancario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registro_bancario` (
  `idregistro_bancario` int(11) NOT NULL AUTO_INCREMENT,
  `cuenta_bancaria_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `movimiento_bancario_id` int(11) NOT NULL,
  `tipo` tinyint(4) DEFAULT '0',
  `debe` decimal(10,0) DEFAULT NULL,
  `haber` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`idregistro_bancario`),
  KEY `movimiento_bancario_id_idx` (`movimiento_bancario_id`),
  KEY `cuenta_bancaria_id_idx` (`cuenta_bancaria_id`),
  CONSTRAINT `cuentabancaria_id` FOREIGN KEY (`cuenta_bancaria_id`) REFERENCES `cuentas_bancaria` (`idcuentas_bancaria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `movimientobancario_id` FOREIGN KEY (`movimiento_bancario_id`) REFERENCES `movimientos_bancarios` (`idmovimientos_bancarios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro_bancario`
--

LOCK TABLES `registro_bancario` WRITE;
/*!40000 ALTER TABLE `registro_bancario` DISABLE KEYS */;
/*!40000 ALTER TABLE `registro_bancario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registros_gasto`
--

DROP TABLE IF EXISTS `registros_gasto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registros_gasto` (
  `idregistros_tarjeta` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `nombre_gasto_id` int(11) NOT NULL,
  `importe` decimal(10,0) NOT NULL,
  `tipo_gasto_id` int(11) DEFAULT NULL,
  `medio_pago_id` int(11) DEFAULT NULL,
  `cuotas_id` int(11) NOT NULL,
  `pagado` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idregistros_tarjeta`),
  KEY `nombre_gasto_id_idx` (`nombre_gasto_id`),
  KEY `tipo_gasto_id_idx` (`tipo_gasto_id`),
  KEY `medio_pago_id_idx` (`medio_pago_id`),
  KEY `cuotas_id_idx` (`cuotas_id`),
  CONSTRAINT `cuotasid` FOREIGN KEY (`cuotas_id`) REFERENCES `cuotas` (`idcuotas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `medio_pagoid` FOREIGN KEY (`medio_pago_id`) REFERENCES `medio_de_pago` (`idmedio_de_pago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `nombre_gastoid` FOREIGN KEY (`nombre_gasto_id`) REFERENCES `gasto` (`idgasto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tipo_gastoid` FOREIGN KEY (`tipo_gasto_id`) REFERENCES `tipo_gasto` (`idtipo_gasto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registros_gasto`
--

LOCK TABLES `registros_gasto` WRITE;
/*!40000 ALTER TABLE `registros_gasto` DISABLE KEYS */;
/*!40000 ALTER TABLE `registros_gasto` ENABLE KEYS */;
UNLOCK TABLES;

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
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`idtarjetas`),
  KEY `cuenta_bancaria_id_idx` (`cuenta_bancaria_id`),
  KEY `movimento_bancario_id_idx` (`movimiento_bancario_id`),
  KEY `usuario_tarjeta_id_idx` (`usuario_id`),
  CONSTRAINT `cta_bancaria_id` FOREIGN KEY (`cuenta_bancaria_id`) REFERENCES `cuentas_bancaria` (`idcuentas_bancaria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `mov_bancario_id` FOREIGN KEY (`movimiento_bancario_id`) REFERENCES `movimientos_bancarios` (`idmovimientos_bancarios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usu_tarjeta_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios_tarjetas` (`idusuarios_tarjetas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarjetas`
--

LOCK TABLES `tarjetas` WRITE;
/*!40000 ALTER TABLE `tarjetas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tarjetas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_gasto`
--

DROP TABLE IF EXISTS `tipo_gasto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_gasto` (
  `idtipo_gasto` int(11) NOT NULL AUTO_INCREMENT,
  `destino_gasto` varchar(45) NOT NULL,
  PRIMARY KEY (`idtipo_gasto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_gasto`
--

LOCK TABLES `tipo_gasto` WRITE;
/*!40000 ALTER TABLE `tipo_gasto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_gasto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios_tarjetas`
--

DROP TABLE IF EXISTS `usuarios_tarjetas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios_tarjetas` (
  `idusuarios_tarjetas` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios_tarjeta` varchar(45) NOT NULL,
  PRIMARY KEY (`idusuarios_tarjetas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_tarjetas`
--

LOCK TABLES `usuarios_tarjetas` WRITE;
/*!40000 ALTER TABLE `usuarios_tarjetas` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios_tarjetas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-24 22:31:51
