-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: cafteria
-- ------------------------------------------------------
-- Server version	5.5.47-0ubuntu0.14.04.1

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
-- Current Database: `cafteria`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `cafteria` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `cafteria`;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `ctg_id` int(11) NOT NULL AUTO_INCREMENT,
  `ctg_name` varchar(15) NOT NULL,
  PRIMARY KEY (`ctg_id`),
  UNIQUE KEY `ctg_name` (`ctg_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'dasd'),(2,'Drinks');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `o_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) DEFAULT 'Proccessing',
  `u_id` int(11) NOT NULL,
  `dest_room_no` int(11) unsigned NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `total_price` tinyint(11) DEFAULT NULL,
  `notes` tinytext,
  PRIMARY KEY (`o_id`),
  KEY `u_id` (`u_id`),
  KEY `dest_room_no` (`dest_room_no`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE,
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`dest_room_no`) REFERENCES `rooms` (`room_no`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (75,'Out for delivery',3,1,'2016-02-13','16:03:43',14,''),(76,'Proccessing',6,2,'2016-02-19','16:04:49',16,'hhhhhh'),(77,'canceled',3,1,'2016-02-12','16:54:29',63,'dasd'),(78,'Proccessing',4,1,'2016-02-19','16:54:35',31,''),(79,'Out for delivery',5,1,'2016-02-16','16:54:41',22,''),(80,'Proccessing',6,1,'2016-02-19','16:54:47',49,''),(81,'Proccessing',7,1,'2016-02-19','16:54:53',58,''),(82,'Proccessing',3,1,'2016-02-19','16:54:59',121,''),(83,'Proccessing',3,1,'2016-02-26','16:55:05',62,''),(84,'Proccessing',3,1,'2016-02-17','16:55:11',94,''),(85,'Proccessing',4,1,'2016-02-19','16:55:15',44,''),(86,'Proccessing',6,1,'2016-02-19','16:55:19',77,''),(87,'Proccessing',7,2,'2016-02-19','21:55:33',127,'dddd'),(88,'Proccessing',3,2,'2016-02-19','22:04:59',39,'ÙŠØ´Ø³ÙŠ');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_details`
--

DROP TABLE IF EXISTS `orders_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders_details` (
  `p_id` int(11) NOT NULL,
  `o_id` int(11) NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `total_price` tinyint(11) DEFAULT NULL,
  PRIMARY KEY (`p_id`,`o_id`),
  KEY `o_id` (`o_id`),
  CONSTRAINT `orders_details_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `products` (`p_id`) ON DELETE CASCADE,
  CONSTRAINT `orders_details_ibfk_2` FOREIGN KEY (`o_id`) REFERENCES `orders` (`o_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_details`
--

LOCK TABLES `orders_details` WRITE;
/*!40000 ALTER TABLE `orders_details` DISABLE KEYS */;
INSERT INTO `orders_details` VALUES (2,75,1,12),(2,76,1,12),(2,77,3,36),(2,79,1,12),(2,80,1,12),(2,81,4,48),(2,82,3,36),(2,83,4,48),(2,84,3,36),(2,85,3,36),(2,87,1,12),(2,88,1,12),(3,76,1,2),(3,77,1,2),(3,79,2,4),(3,80,2,4),(3,82,3,6),(3,83,3,6),(3,84,3,6),(3,87,1,2),(3,88,1,2),(4,77,1,23),(4,78,1,23),(4,80,1,23),(4,82,3,69),(4,84,2,46),(4,86,3,69),(4,87,7,127),(4,88,1,23);
/*!40000 ALTER TABLE `orders_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(15) NOT NULL,
  `u_price` tinyint(4) NOT NULL,
  `ctg_id` int(11) NOT NULL,
  `p_img` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`p_id`),
  KEY `ctg_id` (`ctg_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`ctg_id`) REFERENCES `category` (`ctg_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (2,'Coffee',12,1,'coffee.png',1),(3,'Orange Juice',2,1,'orange.png',1),(4,'Coke',5,2,'coke.png',1),(5,'Tea',3,1,'tea.ico',1),(6,'Mango Juice',9,2,'Redes_de_hilo_by_Juan_Pablo_Lauriente.jpg',1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rooms` (
  `room_no` int(11) unsigned NOT NULL,
  PRIMARY KEY (`room_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` VALUES (1),(2);
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(15) NOT NULL,
  `u_email` varchar(128) NOT NULL,
  `u_password` char(32) NOT NULL,
  `room_no` int(11) unsigned NOT NULL,
  `ext` char(8) NOT NULL,
  `u_img` varchar(255) NOT NULL,
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `u_email` (`u_email`),
  KEY `room_no` (`room_no`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`room_no`) REFERENCES `rooms` (`room_no`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'root','root@mail.com','202cb962ac59075b964b07152d234b70',1,'321','../assets/img/1.jpg'),(3,'Hazem','hazem@mail.com','202cb962ac59075b964b07152d234b70',1,'123','../assets/img/2.jpg'),(4,'Ahmed','dasdasd','123123',1,'1234','dasdasdasd'),(5,'Mohamed','mmmmmmm','123',2,'123','asdasd'),(6,'Hussien','mmmmm','123',2,'342','123123'),(7,'Mahmoud','dsdwqewq','123',1,'245','dasqwe');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-20 16:26:51
