-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: finanzas
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

create database finanzas;
  use finanzas;

DROP TABLE IF EXISTS `bancos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bancos` (
  `idbancos` int(11) NOT NULL AUTO_INCREMENT,
  `banco_nombre` varchar(45) NOT NULL,
  `estado` tinyint(4) DEFAULT '1',
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`idbancos`),
  UNIQUE KEY `idBANCOS_UNIQUE` (`idbancos`),
  UNIQUE KEY `banco_nombre_UNIQUE` (`banco_nombre`),
  KEY `fk_bancos_1_idx` (`usuario_id`),
  CONSTRAINT `fk_bancos_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`idusuarios`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='					';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bancos`
--

LOCK TABLES `bancos` WRITE;
/*!40000 ALTER TABLE `bancos` DISABLE KEYS */;
INSERT INTO `bancos` VALUES (7,'GALICIA',1,1),(8,'SANTANDER RIO',1,1),(9,'FRANCES',1,1),(10,'HSCB',1,1),(11,'CIUDAD',1,1),(12,'PATAGONIA',1,1);
/*!40000 ALTER TABLE `bancos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caja`
--

DROP TABLE IF EXISTS `caja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caja` (
  `idcaja` int(10) unsigned NOT NULL,
  `caja` varchar(45) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `debe` decimal(10,2) DEFAULT NULL,
  `haber` decimal(10,2) DEFAULT NULL,
  `saldo` decimal(10,2) DEFAULT NULL,
  `movimiento_id` int(11) NOT NULL,
  PRIMARY KEY (`idcaja`),
  UNIQUE KEY `caja_UNIQUE` (`caja`),
  KEY `fk_caja_1_idx` (`usuario_id`),
  KEY `fk_caja_2_idx` (`movimiento_id`),
  CONSTRAINT `fk_caja_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`idusuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_caja_2` FOREIGN KEY (`movimiento_id`) REFERENCES `movimientos` (`idmovimientos_bancarios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caja`
--

LOCK TABLES `caja` WRITE;
/*!40000 ALTER TABLE `caja` DISABLE KEYS */;
/*!40000 ALTER TABLE `caja` ENABLE KEYS */;
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
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`idchequera`),
  KEY `cuenta_bancaria_id_idx` (`cuenta_bancaria_id`),
  KEY `fk_chequera_1_idx` (`usuario_id`),
  CONSTRAINT `cuenta_bancaria_id` FOREIGN KEY (`cuenta_bancaria_id`) REFERENCES `cuentas_bancaria` (`idcuentas_bancaria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_chequera_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`idusuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chequera`
--

LOCK TABLES `chequera` WRITE;
/*!40000 ALTER TABLE `chequera` DISABLE KEYS */;
INSERT INTO `chequera` VALUES (1,1,25,1,25,16,1),(2,2,25,51,100,17,1),(7,1,25,151,200,18,1),(8,1,25,151,200,18,1),(9,2,25,251,300,20,1),(10,2,50,1,100,24,1),(11,3,25,301,350,23,1);
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
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`idclientes`),
  KEY `cobrador_id_idx` (`cobrador_id`),
  KEY `medio_pago_id_idx` (`medio_pago_id`),
  KEY `contacto_id_idx` (`contacto_id`),
  KEY `fk_clientes_usuario_id_idx` (`usuario_id`),
  CONSTRAINT `cobrador_id` FOREIGN KEY (`cobrador_id`) REFERENCES `cobrador` (`idcobrador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `contacto_id` FOREIGN KEY (`contacto_id`) REFERENCES `contacto` (`idcontacto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_clientes_usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`idusuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`idcobrador`),
  KEY `fk_cobrador_usuario_id_idx` (`usuario_id`),
  CONSTRAINT `fk_cobrador_usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`idusuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `condicion_cheque`
--

LOCK TABLES `condicion_cheque` WRITE;
/*!40000 ALTER TABLE `condicion_cheque` DISABLE KEYS */;
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
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`idcontacto`),
  KEY `fk_contacto_1_idx` (`usuario_id`),
  CONSTRAINT `fk_contacto_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`idusuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`idcuentas_bancaria`),
  UNIQUE KEY `id_cuentas_bancaria_UNIQUE` (`idcuentas_bancaria`),
  UNIQUE KEY `num_cuenta_UNIQUE` (`num_cuenta`),
  KEY `banco_id_idx` (`banco_id`),
  KEY `fk_cuenta_banc_usuario_id_idx` (`usuario_id`),
  CONSTRAINT `banco_id` FOREIGN KEY (`banco_id`) REFERENCES `bancos` (`idbancos`) ON DELETE CASCADE ON UPDATE NO ACTION,
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuotas`
--

LOCK TABLES `cuotas` WRITE;
/*!40000 ALTER TABLE `cuotas` DISABLE KEYS */;
INSERT INTO `cuotas` VALUES (1,1),(2,2),(3,3),(4,4),(5,5),(6,6),(7,7),(8,8),(9,9),(10,10),(11,11),(12,12);
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
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`idgasto`),
  KEY `medio_pago_id_idx` (`medio_pago_id`),
  KEY `fk_gasto_1_idx` (`usuario_id`),
  CONSTRAINT `fk_gasto_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`idusuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `medio_pago_id` FOREIGN KEY (`medio_pago_id`) REFERENCES `medio_de_pago` (`idmedio_de_pago`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gasto`
--

LOCK TABLES `gasto` WRITE;
/*!40000 ALTER TABLE `gasto` DISABLE KEYS */;
INSERT INTO `gasto` VALUES (1,'SUELDO JOSE LUIS',1,1),(2,'SUELDO FLORENCIA',1,1),(3,'ALQUILER',1,1),(4,'COLEGIO PEDRO',2,1),(5,'COLEGIO ANA',2,1),(6,'DIGITAL HOUSE',4,1);
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

--
-- Table structure for table `movimientos`
--

DROP TABLE IF EXISTS `movimientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movimientos` (
  `idmovimientos_bancarios` int(11) NOT NULL AUTO_INCREMENT,
  `movimientos_nombre` varchar(45) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`idmovimientos_bancarios`),
  UNIQUE KEY `idmovimientos_bancarios_UNIQUE` (`idmovimientos_bancarios`),
  UNIQUE KEY `movimientos_nombre_UNIQUE` (`movimientos_nombre`),
  KEY `fk_movimientos_idx` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimientos`
--

LOCK TABLES `movimientos` WRITE;
/*!40000 ALTER TABLE `movimientos` DISABLE KEYS */;
INSERT INTO `movimientos` VALUES (1,'TRANSFERENCIAS RECIBIDAS',0),(2,'TR REALIZADAS',0),(3,'TARJETA',0),(4,'CHEQUE',0),(5,'DEBITO AUTOMATICO',0),(6,'COMISIONES BANCARIAS',0),(7,'INTERESES',0),(8,'CH RECHAZADO',0),(9,'IMP. DEB BANCARIO',0);
/*!40000 ALTER TABLE `movimientos` ENABLE KEYS */;
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
  `movimiento_id` int(11) NOT NULL,
  `tipo` tinyint(4) DEFAULT '0',
  `debe` decimal(10,2) DEFAULT NULL,
  `haber` decimal(10,2) DEFAULT NULL,
  `saldo` decimal(10,2) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`idregistro_bancario`),
  KEY `movimiento_bancario_id_idx` (`movimiento_id`),
  KEY `cuenta_bancaria_id_idx` (`cuenta_bancaria_id`),
  KEY `fk_reg_banco_usuario_id_idx` (`usuario_id`),
  CONSTRAINT `cuentabancaria_id` FOREIGN KEY (`cuenta_bancaria_id`) REFERENCES `cuentas_bancaria` (`idcuentas_bancaria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reg_banco_usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`idusuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `movimientobancario_id` FOREIGN KEY (`movimiento_id`) REFERENCES `movimientos` (`idmovimientos_bancarios`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
  CONSTRAINT `nombre_gastoid` FOREIGN KEY (`nombre_gasto_id`) REFERENCES `gasto` (`idgasto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tipo_gastoid` FOREIGN KEY (`tipo_gasto_id`) REFERENCES `tipo_gasto` (`idtipo_gasto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registros_gasto`
--

LOCK TABLES `registros_gasto` WRITE;
/*!40000 ALTER TABLE `registros_gasto` DISABLE KEYS */;
INSERT INTO `registros_gasto` VALUES (1,'2017-10-01',1,1500,1,1,1,1,1),(2,'2017-09-01',2,1200,2,2,3,0,1),(3,'2017-08-10',3,9500,1,1,1,1,1),(4,'2017-07-04',4,2500,2,4,3,1,1),(5,'2017-07-04',4,2500,2,4,3,1,1),(6,'2017-02-01',6,2532,6,3,1,0,1),(7,'2017-10-01',5,268,6,1,1,0,1);
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

--
-- Table structure for table `tipo_gasto`
--

DROP TABLE IF EXISTS `tipo_gasto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_gasto` (
  `idtipo_gasto` int(11) NOT NULL AUTO_INCREMENT,
  `destino_gasto` varchar(45) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`idtipo_gasto`),
  KEY `fk_tipo_gasto_1_idx` (`usuario_id`),
  CONSTRAINT `fk_tipo_gasto_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`idusuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_gasto`
--

LOCK TABLES `tipo_gasto` WRITE;
/*!40000 ALTER TABLE `tipo_gasto` DISABLE KEYS */;
INSERT INTO `tipo_gasto` VALUES (1,'FIJO',1),(2,'VARIABLE',1),(3,'GISELA',1),(4,'LIA',1),(5,'PADRES',1),(6,'OFICINA',1);
/*!40000 ALTER TABLE `tipo_gasto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `idusuarios` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`idusuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'larzabalh@hotmail.com','hernan','larzabal','0000-00-00',1,'');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
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
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`idusuarios_tarjetas`),
  KEY `fk_usuarios_tarjetas_1_idx` (`usuario_id`),
  CONSTRAINT `fk_usuarios_tarjetas_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`idusuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_tarjetas`
--

LOCK TABLES `usuarios_tarjetas` WRITE;
/*!40000 ALTER TABLE `usuarios_tarjetas` DISABLE KEYS */;
INSERT INTO `usuarios_tarjetas` VALUES (1,'HERNAN',1),(2,'VANESA',1),(3,'GISELA',1),(4,'LIA',1),(5,'PADRES',1);
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

-- Dump completed on 2017-10-01 23:09:08
