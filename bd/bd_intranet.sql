-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: intranet
-- ------------------------------------------------------
-- Server version	5.6.38-log

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
-- Table structure for table `administradores`
--

DROP TABLE IF EXISTS `administradores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administradores` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `contrasenia` varchar(60) NOT NULL,
  `editado` datetime DEFAULT NULL,
  `nivel` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administradores`
--

LOCK TABLES `administradores` WRITE;
/*!40000 ALTER TABLE `administradores` DISABLE KEYS */;
INSERT INTO `administradores` VALUES (21,'glenn','Glenn Garcia','$2y$12$XCCm4JiZZEwPKKhKNPYBIuBDrkpyMAtNDvmpWbtXCNXOG5t69YLdC','2022-04-20 11:00:21',1),(39,'carlos','Carlos','$2y$12$wEYrCS//edAplMsjqu/EpeYg7q7E7A5SuKkApkeQz0YiMzAOhgRCO','2022-08-08 16:49:00',0),(40,'jcaceres','jcaceres','$2y$12$TvQsKBJLxaG9DGG39bwpIegDm36f4eyKbBi0EFCD6cvST7vPC4Kz.','2023-04-04 17:18:24',0),(41,'oriana','ORIANA','$2y$12$Dld5.6lXK7DMPCZ8s5ZeauPQBRL1Lxcao5jmViD9wu3b3zgwaj802',NULL,0),(42,'rodrigo','Rodrigo','$2y$12$bvNbE25D7RXZP2nQqZ8OzOIHTHkY79rBX7/C1DwMOQjI676fzwc9C','2023-04-25 09:10:50',0);
/*!40000 ALTER TABLE `administradores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `directorio`
--

DROP TABLE IF EXISTS `directorio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `directorio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `cargo` varchar(45) DEFAULT NULL,
  `cumpleano` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `directorio`
--

LOCK TABLES `directorio` WRITE;
/*!40000 ALTER TABLE `directorio` DISABLE KEYS */;
INSERT INTO `directorio` VALUES (1,'Glenn Garcia','948686099','ggarcia@cokase.cl','Jefe sistema','2028-01-28'),(2,'Oriana Almada','999999999','oalmada@cokase.cl','XXX','2028-10-07'),(3,'Carlos Monras','999999999','cmonras@cokase.cl','XXX','2028-02-03'),(4,'Paola Villegas','999999999','pvillegas@cokase.cl','XXX','2028-06-18'),(5,'Jeannette Caceres','999999999','jcaceres@cokase.cl','XXX','2028-10-14'),(6,'Angelica Garcia','999999999','agarcia@cokase.cl','XXX','2028-10-29'),(7,'Rene Valdivia','999999999','rvaldivia@cokase.cl','XXX','2028-09-20'),(8,'Gonzalo Perez','999999999','gperez@cokase.cl','XXX','2028-11-26'),(9,'Rodrigo Perez','999999999','rperez@cokase.cl','XXX','2028-07-25'),(10,'Elizabeth Garcia','999999999','egarcia@cokase.cl','XXX','2028-03-20'),(11,'Hernan Perez','999999999','hperez@cokase.cl','XXX','2028-02-10'),(12,'Jesmer Lujan','999999999','jlujan@cokase.cl','XXX','2028-01-28'),(13,'Lenin Cabrera','999999999','xxx@xxx.cl','XXX','2028-06-15'),(14,'Ariela Leal','999999999','aleal@cokase.cl','XXX','2028-06-24'),(15,'Angelo Amengual','999999999','xxx@xxx.cl','XXX','2028-06-26'),(16,'Jorge Perez','999999999','xxx@xxx.cl','XXX','2028-09-25'),(17,'Lieska Zapata','999999999','xxx@xxx.cl','XXX','2028-03-22');
/*!40000 ALTER TABLE `directorio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `directorio_local`
--

DROP TABLE IF EXISTS `directorio_local`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `directorio_local` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `local` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `jefe_local` varchar(45) DEFAULT NULL,
  `subjefe` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `formato` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `directorio_local`
--

LOCK TABLES `directorio_local` WRITE;
/*!40000 ALTER TABLE `directorio_local` DISABLE KEYS */;
INSERT INTO `directorio_local` VALUES (1,'09','ANTOFAGASTA','MANUEL ANTONIO MATTA 2451','XXX','XXX','c09@cokase.cl','COKASE'),(2,'16','COPIAPÓ','CHACABUCO 393 A LOCAL 2','XXX','XXX','c16@cokase.cl','COKASE'),(3,'23','LA SERENA','GREGORIO CORDOVEZ N° 613','XXX','XXX','p23@cokase.cl','PASARELA'),(4,'11',' PUENTE ALTO','CONCHA Y TORO N° 80','XXX','XXX','c11@cokase.cl','COKASE'),(5,'21','SAN BERNARDO ','EYZAGUIRRE N° 636','XXX','XXX','c21@cokase.cl','COKASE'),(6,'12','RANCAGUA','INDEPENDENCIA N° 718. DP 724','XXX','XXX','c12@cokase.cl','COKASE'),(7,'22','RANCAGUA','AV. BRASIL N° 901','XXX','XXX','p22@cokase.cl','PASARELA'),(8,'14','SAN FERNÁNDO','AV. MANUEL RODRIGUEZ N° 976 A','XXX','XXX','c14@cokase.cl','COKASE'),(9,'13','CURICO','PEÑA N° 705','XXX','XXX','c13@cokase.cl','COKASE'),(10,'03','TALCA','UNO SUR N° 1389','XXX','XXX','c03@cokase.cl','COKASE'),(11,'04','CHILLAN','MAIPON N° 711','XXX','XXX','m04@cokase.cl','MAS'),(12,'26','CONCEPCION','BARROS ARANA 859','XXX','XXX','p26@cokase.cl','PASARELA'),(13,'20','CONCEPCION','ANIBAL PINTO N° 563','XXX','XXX','p20@cokase.cl','PASARELA'),(14,'10','CONCEPCION','RAMON FREIRE N° 630 L- 2','XXX','XXX','m10@cokase.cl','MAS'),(15,'29','LOS ANGELES','COLON N° 489 LOCAL 1','XXX','XXX','p29@cokase.cl','PASARELA'),(16,'15','TEMUCO','MANUEL MONTT N° 727-737','XXX','XXX','c15@cokase.cl','COKASE'),(17,'25','TEMUCO','DIEGO PORTALES N° 988','XXX','XXX','p25@cokase.cl','PASARELA'),(18,'06','VALDIVIA  ','RAMÓN PICARTE N° 332','XXX','XXX','c06@cokase.cl','COKASE'),(19,'27','OSORNO','ELEUTERIO RAMIREZ N° 955','XXX','XXX','p27@cokase.cl','PASARELA'),(20,'07','OSORNO','ELEUTERIO RAMIREZ N° 1060','XXX','XXX','m07@cokase.cl','MAS'),(21,'08','PUERTO MONTT','ANTONIOVARAS N° 773','XXX','XXX','c08@cokase.cl','COKASE');
/*!40000 ALTER TABLE `directorio_local` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'intranet'
--
/*!50106 SET @save_time_zone= @@TIME_ZONE */ ;
/*!50106 DROP EVENT IF EXISTS `delete_stock_mes_anterior` */;
DELIMITER ;;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;;
/*!50003 SET character_set_client  = utf8 */ ;;
/*!50003 SET character_set_results = utf8 */ ;;
/*!50003 SET collation_connection  = utf8_general_ci */ ;;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;;
/*!50003 SET @saved_time_zone      = @@time_zone */ ;;
/*!50003 SET time_zone             = 'SYSTEM' */ ;;
/*!50106 CREATE*/ /*!50117 DEFINER=`root`@`localhost`*/ /*!50106 EVENT `delete_stock_mes_anterior` ON SCHEDULE EVERY 1 MONTH STARTS '2017-11-01 01:00:00' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM `stock_local_inicial_mes` */ ;;
/*!50003 SET time_zone             = @saved_time_zone */ ;;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;;
/*!50003 SET character_set_client  = @saved_cs_client */ ;;
/*!50003 SET character_set_results = @saved_cs_results */ ;;
/*!50003 SET collation_connection  = @saved_col_connection */ ;;
/*!50106 DROP EVENT IF EXISTS `insert_stock_actual` */;;
DELIMITER ;;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;;
/*!50003 SET character_set_client  = utf8 */ ;;
/*!50003 SET character_set_results = utf8 */ ;;
/*!50003 SET collation_connection  = utf8_general_ci */ ;;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;;
/*!50003 SET @saved_time_zone      = @@time_zone */ ;;
/*!50003 SET time_zone             = 'SYSTEM' */ ;;
/*!50106 CREATE*/ /*!50117 DEFINER=`root`@`localhost`*/ /*!50106 EVENT `insert_stock_actual` ON SCHEDULE EVERY 1 MONTH STARTS '2017-11-01 02:01:01' ON COMPLETION NOT PRESERVE ENABLE DO INSERT INTO stock_local_inicial_mes (articulo,cantidad, fecha_ingreso, numero_local)
			SELECT sl.articulo,sl.cantidad,now(),sl.numero_local FROM stock_local sl */ ;;
/*!50003 SET time_zone             = @saved_time_zone */ ;;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;;
/*!50003 SET character_set_client  = @saved_cs_client */ ;;
/*!50003 SET character_set_results = @saved_cs_results */ ;;
/*!50003 SET collation_connection  = @saved_col_connection */ ;;
DELIMITER ;
/*!50106 SET TIME_ZONE= @save_time_zone */ ;

--
-- Dumping routines for database 'intranet'
--
/*!50003 DROP PROCEDURE IF EXISTS `llenar_fecha` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `llenar_fecha`(IN `dia_entrada` DATE)
BEGIN
#Declaration of variables
DECLARE var_inicio, var_final INT DEFAULT 0;
DECLARE fecha_Inicial,fecha_Final, fecha_incremento DATE;

#AVariable initializations
SET fecha_Inicial = dia_entrada;
SET fecha_Final= LAST_DAY(fecha_Inicial);
SET var_inicio = EXTRACT(DAY FROM fecha_Inicial);
SET var_final = EXTRACT(DAY FROM fecha_Final);
SET fecha_incremento = fecha_Inicial;


WHILE var_inicio <= var_final DO
INSERT INTO dias (fecha) values(fecha_incremento);
SET fecha_incremento = DATE_ADD(fecha_incremento, INTERVAL 1 DAY);
SET var_inicio = var_inicio + 1;
END WHILE;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-30 16:54:01
