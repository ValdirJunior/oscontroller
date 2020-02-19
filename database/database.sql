-- MySQL dump 10.13  Distrib 5.7.28, for osx10.14 (x86_64)
--
-- Host: 127.0.0.1    Database: testedev
-- ------------------------------------------------------
-- Server version	5.7.28

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
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(90) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `birth_date` date NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `cpf` varchar(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `client_phone_uindex` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` (`id`, `name`, `email`, `phone`, `birth_date`, `address`, `cpf`) VALUES (1,'Odair','user1@email.com','14911111111','1991-01-02','R. Antonio Orlandor Boer, 371 - Jd. Flamingo','11122233300'),(2,'Tiana','user2@email.com','14911111112','1991-02-03',NULL,'22233311100'),(3,'Cleide','user3@email.com','14911111113','1991-03-14',NULL,'33322211100'),(9,'Alexandre','alexandre@email.com','14998355160','2020-02-04',NULL,'00011122290');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text,
  `value` double NOT NULL,
  `provider` int(10) unsigned NOT NULL,
  `item_code` int(11) NOT NULL COMMENT 'item code by provider',
  PRIMARY KEY (`id`),
  KEY `provider` (`provider`),
  CONSTRAINT `provider` FOREIGN KEY (`provider`) REFERENCES `provider` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` (`id`, `name`, `description`, `value`, `provider`, `item_code`) VALUES (1,'Tela J - Samsung','Telas para a linha J da Samsung',200,3,19282),(2,'Conector USB C','Conector universal USB-C',110,1,55662),(3,'Bateria Razr','Baterias para linhas razr motorola',350.5,2,1239),(4,'Teste','Testando',123,4,123);
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provider`
--

DROP TABLE IF EXISTS `provider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provider` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cnpj` varchar(14) NOT NULL,
  `social_name` varchar(100) NOT NULL,
  `real_name` varchar(100) NOT NULL,
  `email` varchar(90) NOT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `provider_cnpj_uindex` (`cnpj`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provider`
--

LOCK TABLES `provider` WRITE;
/*!40000 ALTER TABLE `provider` DISABLE KEYS */;
INSERT INTO `provider` (`id`, `cnpj`, `social_name`, `real_name`, `email`, `phone`, `address`) VALUES (1,'50388287000147','Empresa 1','Componenetes LTDA.','pv1@email.com','14911111111','R. Test, 123 - Industria - Marília'),(2,'67692780000159','Empresa 2','Peças MEI','pv2@email.com','14911111112','R. Test, 123 - Industria - Marília'),(3,'23993596000173','Empresa 3','Telas 4ALL','pv3@email.com','14911111113','R. Test, 123 - Industria - Marília'),(4,'90995437000103','Teste','Testando','testepv@email.com','14997619596',NULL);
/*!40000 ALTER TABLE `provider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `hour` time NOT NULL,
  `client` int(10) unsigned NOT NULL,
  `value_hour` double NOT NULL,
  `status` int(11) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `service_client_id_fk` (`client`),
  CONSTRAINT `service_client_id_fk` FOREIGN KEY (`client`) REFERENCES `client` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service`
--

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
INSERT INTO `service` (`id`, `date`, `hour`, `client`, `value_hour`, `status`, `description`) VALUES (1,'2020-02-18','17:00:00',1,30,0,''),(2,'2020-02-18','17:00:00',1,30,0,'teste'),(3,'2020-02-17','12:00:00',2,40,0,'teste2'),(4,'2020-02-11','09:00:00',3,20,0,'teste'),(5,'2020-02-18','17:00:00',2,50,1,'teste'),(6,'2020-02-17','12:00:00',3,70,1,'teste2'),(7,'2020-02-11','09:00:00',9,10,1,'teste'),(8,'2020-02-15','17:00:00',1,10,2,'teste'),(9,'2020-02-10','12:00:00',2,20,2,'teste2'),(10,'2020-02-07','09:00:00',3,80,2,'teste');
/*!40000 ALTER TABLE `service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_item`
--

DROP TABLE IF EXISTS `service_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service_item` (
  `service` int(10) unsigned NOT NULL,
  `item` int(10) unsigned NOT NULL,
  `amount` int(11) NOT NULL,
  KEY `service_item_item_id_fk` (`item`),
  KEY `service_item_service_id_fk` (`service`),
  CONSTRAINT `service_item_item_id_fk` FOREIGN KEY (`item`) REFERENCES `item` (`id`),
  CONSTRAINT `service_item_service_id_fk` FOREIGN KEY (`service`) REFERENCES `service` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_item`
--

LOCK TABLES `service_item` WRITE;
/*!40000 ALTER TABLE `service_item` DISABLE KEYS */;
INSERT INTO `service_item` (`service`, `item`, `amount`) VALUES (1,1,2),(1,2,1);
/*!40000 ALTER TABLE `service_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(90) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `birth_date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_email_uindex` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `name`, `email`, `password`, `phone`, `birth_date`) VALUES (1,'User 1','user1@email.com','10470c3b4b1fed12c3baac014be15fac67c6e815','14911111111','1991-01-02'),(2,'User 2','user2@email.com','10470c3b4b1fed12c3baac014be15fac67c6e815','14911111112','1991-02-03'),(3,'User 3','user3@email.com','10470c3b4b1fed12c3baac014be15fac67c6e815','14911111113','1991-03-14');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-18 23:33:06
