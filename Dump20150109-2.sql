CREATE DATABASE  IF NOT EXISTS `thirty` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `thirty`;
-- MySQL dump 10.13  Distrib 5.6.19, for linux-glibc2.5 (x86_64)
--
-- Host: 127.0.0.1    Database: thirty
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu0.14.04.1

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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `prayer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comments_users_idx` (`user_id`),
  KEY `fk_comments_prayers1_idx` (`prayer_id`),
  CONSTRAINT `fk_comments_prayers1` FOREIGN KEY (`prayer_id`) REFERENCES `prayers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_comments_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT=' ';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'amen u are bless','0000-00-00 00:00:00','0000-00-00 00:00:00',2,108),(9,'stay blessed','0000-00-00 00:00:00','0000-00-00 00:00:00',2,108),(10,'amen o','0000-00-00 00:00:00','0000-00-00 00:00:00',2,117);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medias`
--

DROP TABLE IF EXISTS `medias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `thedate` date NOT NULL,
  `mediacontent` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `live` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_media_users1_idx` (`user_id`),
  CONSTRAINT `fk_media_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medias`
--

LOCK TABLES `medias` WRITE;
/*!40000 ALTER TABLE `medias` DISABLE KEYS */;
/*!40000 ALTER TABLE `medias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prayers`
--

DROP TABLE IF EXISTS `prayers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prayers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` varchar(45) NOT NULL,
  `message` text NOT NULL,
  `prayercount` int(11) NOT NULL,
  `colors` varchar(45) NOT NULL,
  `featimg` varchar(45) NOT NULL,
  `anonynmous` int(11) NOT NULL,
  `imgcat` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_prayers_users1_idx` (`user_id`),
  CONSTRAINT `fk_prayers_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prayers`
--

LOCK TABLES `prayers` WRITE;
/*!40000 ALTER TABLE `prayers` DISABLE KEYS */;
INSERT INTO `prayers` VALUES (101,'deliverance','Grant me eyes that see and ears that hear, that I may see and hear clearly that which You are showing and telling me to do',1,'alert-wine','imgtwo.jpg',0,0,'0000-00-00 00:00:00','2014-12-31 12:48:04',1),(104,'0','0',0,'alert-greeny','imgtwo.jpg',0,1,'0000-00-00 00:00:00','2014-11-11 07:40:16',1),(108,'deliverance','Dear Lord, as this year draws to an end, please perfect all that concerns me and my family. Let your abundance rest with us, and let every pain be turned around for our good in Jesus name.',78,'alert-success','imgtwo.jpg',0,0,'2014-11-13 11:13:22','2014-12-31 12:47:42',1),(110,'0','0',0,'alert-success','imgtwo.jpg',0,1,'0000-00-00 00:00:00','2014-11-13 11:14:25',1),(112,'deliverance','Let your Holy Spirit order my steps in the path you have ordained. Help me fulfill my divine purpose in Jesus name.',0,'alert-warning','imgtwo.jpg',0,0,'2014-11-28 20:34:55','2014-12-31 12:47:18',1),(113,'nation','Let us ask for supernatural intervention in the economic, political and security situation of Nigeria.',0,'alert-blue','imgtwo.jpg',0,0,'2014-11-28 20:42:53','2014-12-31 12:48:28',1),(115,'deliverance','Father, I ask that you give me clarity with respect to your assignment for my life',0,'alert-navy','imgtwo.jpg',0,0,'2014-11-28 20:43:49','2014-12-31 12:47:01',1),(116,'0','0',0,'alert-greeny','img3.jpg',0,1,'0000-00-00 00:00:00','2014-11-28 20:43:49',1),(117,'deliverance','The eyes of my understanding be enlightened',33,'alert-blue','img3.jpg',0,0,'2014-11-29 12:56:16','2014-12-31 12:46:41',1);
/*!40000 ALTER TABLE `prayers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shouts`
--

DROP TABLE IF EXISTS `shouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shouts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_shouts_users1_idx` (`user_id`),
  CONSTRAINT `fk_shouts_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shouts`
--

LOCK TABLES `shouts` WRITE;
/*!40000 ALTER TABLE `shouts` DISABLE KEYS */;
INSERT INTO `shouts` VALUES (1,'praise the lord, the lord has added to our family a baby boy',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'preserve and continue the work which God committed to Pastor Abimbola Rosemary Odukoya during her lifetime. This is accomplished primarily through the continued broadcast of “Single & Married” programme on television, radio and cable stations across the world, keeping her published works in circulation and developing other publications from her library of journals and teachings. In 2007, the Foundation was incorporated as a faith-based, non-profit, non-governmental organization with a mission, in addition to that for which it was inaugurated, to bring about social transformation by executing visible actions aimed at addressing the socio-economic, attitudinal and moral challenges faced by Nigerian youths wd3d3d3ed3d33',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'praise the lord, the lord has added to our family a bouncing baby boy',2,'0000-00-00 00:00:00','2014-11-11 15:10:14');
/*!40000 ALTER TABLE `shouts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `access` enum('1','2') NOT NULL DEFAULT '1',
  `activation` varchar(32) NOT NULL,
  `remember_token` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'dee@aol.com','Anonynmous','$2y$10$LtPC44o9kyPB/7O/CzmrB.UYdf6D2RRWK3OuD7jSbsYDaKO/as2dW','1','1','JosmKpzxswpUEZA9VyuZvcLeuCjOTeZGT78ofks2ocV9rHieolQ1QYQ99bZu','2014-10-30 16:35:34','2014-10-31 15:23:43'),(2,'dplumptre@yahoo.com','dplumptre','$2y$10$RgI.tkXNzMnyiIbjMarXCuuIA9YBKCPu6Uo8Si8E7w.5p4Yf9YV1a','2','1','xfRL7k0i9n3zG2lJdtT79efrICOVJCdejYNEneVtG4Xtfs6WHjI6wPObWNYS','2014-10-31 15:01:23','2014-12-31 13:48:38');
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

-- Dump completed on 2015-01-09  8:19:10
