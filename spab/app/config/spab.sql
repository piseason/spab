CREATE DATABASE  IF NOT EXISTS `spab` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `spab`;
-- MySQL dump 10.13  Distrib 5.6.24, for linux-glibc2.5 (x86_64)
--
-- Host: 127.0.0.1    Database: spab
-- ------------------------------------------------------
-- Server version	5.6.25-0ubuntu0.15.04.1

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
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(50) CHARACTER SET utf8 NOT NULL,
  `number` int(50) NOT NULL,
  `appliantname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `appliantid` varchar(50) CHARACTER SET utf8 NOT NULL,
  `time` varchar(50) CHARACTER SET utf8 NOT NULL,
  `incharge` varchar(50) CHARACTER SET utf8 NOT NULL,
  `applycode` varchar(50) NOT NULL,
  `state` int(10) NOT NULL,
  `other` varchar(120) CHARACTER SET utf8 NOT NULL,
  `telephone` varchar(30) CHARACTER SET utf8 NOT NULL,
  `signuptime` varchar(50) CHARACTER SET utf8 NOT NULL,
  `reply` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '请您耐心等待',
  `detail` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '感谢您对我们工作的支持，我们会尽快回复您的预约，如有疑问，请联系我们。',
  PRIMARY KEY (`id`),
  UNIQUE KEY `time` (`time`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointments`
--

LOCK TABLES `appointments` WRITE;
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
INSERT INTO `appointments` VALUES (64,'q',12,'a','a','9月30日周三16:00~18:00','a','a6458',1,'a','a','Friday 25th of September 2015 CST 23:57:43 PM','这是一条测试简讯','谢您对我们工作的支持，我们会尽快回复您的预约，如有疑问，请联系我们。'),(65,'q',12,'a','a','10月1日周四8:00~10:00','a','a3241',1,'a','a','Friday 25th of September 2015 CST 23:57:46 PM','请您耐心等待','感谢您对我们工作的支持，我们会尽快回复您的预约，如有疑问，请联系我们。'),(66,'q',12,'a','a','10月1日周四10:00~12:00','a','a3737',1,'a','a','Friday 25th of September 2015 CST 23:57:49 PM','请您耐心等待','感谢您对我们工作的支持，我们会尽快回复您的预约，如有疑问，请联系我们。'),(67,'q',12,'a','a','10月1日周四14:00~16:00','a','a5116',1,'a','a','Friday 25th of September 2015 CST 23:57:51 PM','请您耐心等待','感谢您对我们工作的支持，我们会尽快回复您的预约，如有疑问，请联系我们。'),(69,'q',12,'a','a','10月2日周五8:00~10:00','a','a5907',1,'a','a','Friday 25th of September 2015 CST 23:57:57 PM','请您耐心等待','感谢您对我们工作的支持，我们会尽快回复您的预约，如有疑问，请联系我们。'),(70,'q',12,'a','a','10月2日周五10:00~12:00','a','a0244',1,'a','a','Friday 25th of September 2015 CST 23:57:59 PM','请您耐心等待','感谢您对我们工作的支持，我们会尽快回复您的预约，如有疑问，请联系我们。'),(71,'q',12,'a','a','10月2日周五14:00~16:00','a','a1313',1,'a','a','Friday 25th of September 2015 CST 23:58:03 PM','请您耐心等待','感谢您对我们工作的支持，我们会尽快回复您的预约，如有疑问，请联系我们。'),(72,'f',1,'d','x','9月29日周二8:00~10:00','f','x8768',0,'f','d','Monday 28th of September 2015 CST 11:54:35 AM','请您耐心等待','感谢您对我们工作的支持，我们会尽快回复您的预约，如有疑问，请联系我们。'),(73,'011500',12,'吴晓杰','12151042','10月21日周三8:00~10:00','1','121510425577',0,'1','1','Monday 19th of October 2015 CST 19:59:38 PM','请您耐心等待','感谢您对我们工作的支持，我们会尽快回复您的预约，如有疑问，请联系我们。'),(74,'我',12,'吴晓杰','12151042','10月23日周五10:00~12:00','我','121510424042',1,'11','123','Wednesday 21st of October 2015 CST 19:14:53 PM','请您耐心等待','感谢您对我们工作的支持，我们会尽快回复您的预约，如有疑问，请联系我们。'),(75,'11',11,'吴晓杰','12151042','10月27日周二8:00~10:00','11','121510421860',0,'11','111','Monday 26th of October 2015 CST 15:44:12 PM','请您耐心等待','感谢您对我们工作的支持，我们会尽快回复您的预约，如有疑问，请联系我们。'),(76,'11',1,'吴晓杰','12151042','10月27日周二10:00~12:00','1','121510428715',0,'1','1','Monday 26th of October 2015 CST 18:03:41 PM','请您耐心等待','感谢您对我们工作的支持，我们会尽快回复您的预约，如有疑问，请联系我们。');
/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deniedappointments`
--

DROP TABLE IF EXISTS `deniedappointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deniedappointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(50) CHARACTER SET utf8 NOT NULL,
  `number` int(50) NOT NULL,
  `appliantname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `appliantid` varchar(50) CHARACTER SET utf8 NOT NULL,
  `time` varchar(50) CHARACTER SET utf8 NOT NULL,
  `incharge` varchar(50) CHARACTER SET utf8 NOT NULL,
  `applycode` varchar(50) NOT NULL,
  `state` int(10) NOT NULL,
  `other` varchar(120) CHARACTER SET utf8 NOT NULL,
  `telephone` varchar(30) CHARACTER SET utf8 NOT NULL,
  `signuptime` varchar(50) CHARACTER SET utf8 NOT NULL,
  `reply` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '请您耐心等待',
  `detail` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '感谢您对我们工作的支持，我们会尽快回复您的预约，如有疑问，请联系我们。',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deniedappointments`
--

LOCK TABLES `deniedappointments` WRITE;
/*!40000 ALTER TABLE `deniedappointments` DISABLE KEYS */;
INSERT INTO `deniedappointments` VALUES (1,'q',12,'a','a','10月1日周四16:00~18:00','a','a5103',2,'a','a','Friday 25th of September 2015 CEST 18:33:44 PM','请您耐心等待','感谢您对我们工作的支持，我们会尽快回复您的预约，如有疑问，请联系我们。'),(2,'q',12,'a','a','10月2日周五16:00~18:00','a','a5938',2,'a','a','Friday 25th of September 2015 CEST 18:33:48 PM','请您耐心等待','感谢您对我们工作的支持，我们会尽快回复您的预约，如有疑问，请联系我们。'),(3,'q',12,'a','a','9月30日周三8:00~10:00','a','a8418',2,'a','a','Friday 25th of September 2015 CEST 18:33:54 PM','请您耐心等待','感谢您对我们工作的支持，我们会尽快回复您的预约，如有疑问，请联系我们。'),(4,'q',12,'a','a','9月29日周二10:00~12:00','a','a1451',2,'a','a','Friday 25th of September 2015 CEST 18:33:58 PM','请您耐心等待','感谢您对我们工作的支持，我们会尽快回复您的预约，如有疑问，请联系我们。'),(5,'q',12,'a','a','9月29日周二8:00~10:00','a','a9221',2,'a','a','Friday 25th of September 2015 CEST 18:34:00 PM','请您耐心等待','感谢您对我们工作的支持，我们会尽快回复您的预约，如有疑问，请联系我们。'),(6,'q',12,'a','a','9月28日周一8:00~10:00','a','a9201',2,'a','a','Friday 25th of September 2015 CEST 18:34:05 PM','请您耐心等待','感谢您对我们工作的支持，我们会尽快回复您的预约，如有疑问，请联系我们。'),(7,'q',12,'a','a','9月28日周一16:00~18:00','a','a0917',2,'a','a','Friday 25th of September 2015 CEST 18:34:27 PM','请您耐心等待','感谢您对我们工作的支持，我们会尽快回复您的预约，如有疑问，请联系我们。'),(8,'q',12,'a','a','9月28日周一10:00~12:00','a','a7693',2,'a','a','Friday 25th of September 2015 CEST 18:34:35 PM','请您耐心等待','感谢您对我们工作的支持，我们会尽快回复您的预约，如有疑问，请联系我们。'),(9,'q',12,'a','a','9月28日周一14:00~16:00','a','a0704',2,'a','a','Friday 25th of September 2015 CEST 18:34:38 PM','请您耐心等待','感谢您对我们工作的支持，我们会尽快回复您的预约，如有疑问，请联系我们。'),(10,'q',12,'a','a','9月29日周二14:00~16:00','a','a9807',2,'a','a','Friday 25th of September 2015 CEST 18:34:39 PM','请您耐心等待','感谢您对我们工作的支持，我们会尽快回复您的预约，如有疑问，请联系我们。'),(11,'q',12,'a','a','9月29日周二16:00~18:00','a','a8093',2,'a','a','Friday 25th of September 2015 CEST 18:34:43 PM','请您耐心等待','感谢您对我们工作的支持，我们会尽快回复您的预约，如有疑问，请联系我们。'),(12,'q',12,'a','a','9月30日周三10:00~12:00','a','a7509',2,'a','a','Friday 25th of September 2015 CEST 18:34:45 PM','请您耐心等待','感谢您对我们工作的支持，我们会尽快回复您的预约，如有疑问，请联系我们。'),(13,'q',12,'a','a','9月30日周三14:00~16:00','a','a4644',2,'a','a','Friday 25th of September 2015 CEST 18:34:46 PM','请您耐心等待','感谢您对我们工作的支持，我们会尽快回复您的预约，如有疑问，请联系我们。');
/*!40000 ALTER TABLE `deniedappointments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `superadmin`
--

DROP TABLE IF EXISTS `superadmin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `superadmin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `superadmin`
--

LOCK TABLES `superadmin` WRITE;
/*!40000 ALTER TABLE `superadmin` DISABLE KEYS */;
INSERT INTO `superadmin` VALUES (6,'sadiq','9b3e9e6c1f7df8490940bf0ae33892f7f410b093'),(7,'security','f144e9a2ab52fdae424d562bec99fa6979194ce2');
/*!40000 ALTER TABLE `superadmin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `times`
--

DROP TABLE IF EXISTS `times`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `times` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `time` varchar(100) CHARACTER SET utf8 NOT NULL,
  `oristate` varchar(8) CHARACTER SET utf8 NOT NULL,
  `newstate` varchar(8) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `times`
--

LOCK TABLES `times` WRITE;
/*!40000 ALTER TABLE `times` DISABLE KEYS */;
INSERT INTO `times` VALUES (4,'9月28日周一16:00~18:00','休息日','可预定'),(5,'9月28日周一14:00~16:00','休息日','可预定'),(6,'9月29日周二10:00~12:00','休息日','可预定'),(7,'9月27日周日8:00~10:00','可预定','休息日'),(8,'9月27日周日10:00~12:00','可预定','休息日'),(9,'9月28日周一8:00~10:00','休息日','可预定'),(10,'10月22日周四8:00~10:00','休息日','可预定'),(11,'10月30日周五8:00~10:00','休息日','可预定');
/*!40000 ALTER TABLE `times` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-26 21:44:05
