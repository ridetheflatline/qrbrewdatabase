-- MySQL dump 10.13  Distrib 5.5.29, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: beer
-- ------------------------------------------------------
-- Server version	5.5.29-0ubuntu0.12.04.2

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
-- Table structure for table `batchAccess`
--

DROP TABLE IF EXISTS `batchAccess`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `batchAccess` (
  `batchId` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `level` enum('Creator','Editer','Viewer') DEFAULT 'Viewer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `batchAccess`
--

LOCK TABLES `batchAccess` WRITE;
/*!40000 ALTER TABLE `batchAccess` DISABLE KEYS */;
INSERT INTO `batchAccess` VALUES (4,4,'Creator'),(3,4,'Editer'),(1,4,'Viewer');
/*!40000 ALTER TABLE `batchAccess` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `batches`
--

DROP TABLE IF EXISTS `batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `batches` (
  `batchId` int(11) NOT NULL AUTO_INCREMENT,
  `batchNumber` int(11) NOT NULL COMMENT 'The batch number',
  `batchName` text NOT NULL,
  `batchCode` text NOT NULL,
  `batchVolume` float NOT NULL,
  `brewDate` date NOT NULL,
  `public` tinyint(1) NOT NULL DEFAULT '0',
  `state` enum('None','Deleted') NOT NULL DEFAULT 'None',
  UNIQUE KEY `batchId` (`batchId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `batches`
--

LOCK TABLES `batches` WRITE;
/*!40000 ALTER TABLE `batches` DISABLE KEYS */;
INSERT INTO `batches` VALUES (1,1,'TestBrew','TB',21.5,'2012-12-09',0,'None'),(2,14,'Sturdy Little Helper','SLH',20,'2012-10-02',1,'None'),(3,15,'Sturdy Santa','SSa',20,'2012-10-01',1,'None'),(4,18,'Ã˜lhond IPA','Ã˜I',21.5,'2013-01-12',1,'None');
/*!40000 ALTER TABLE `batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `boilings`
--

DROP TABLE IF EXISTS `boilings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `boilings` (
  `boilNumber` int(11) NOT NULL AUTO_INCREMENT,
  `batchId` int(11) NOT NULL,
  PRIMARY KEY (`boilNumber`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boilings`
--

LOCK TABLES `boilings` WRITE;
/*!40000 ALTER TABLE `boilings` DISABLE KEYS */;
INSERT INTO `boilings` VALUES (1,1),(2,4);
/*!40000 ALTER TABLE `boilings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bottles`
--

DROP TABLE IF EXISTS `bottles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bottles` (
  `bottleNumber` int(11) NOT NULL AUTO_INCREMENT,
  `bottleId` int(11) NOT NULL,
  `bottlingNumber` int(11) NOT NULL,
  `bottleVolume` float NOT NULL DEFAULT '0.5',
  `bottleStatus` text NOT NULL,
  PRIMARY KEY (`bottleNumber`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bottles`
--

LOCK TABLES `bottles` WRITE;
/*!40000 ALTER TABLE `bottles` DISABLE KEYS */;
INSERT INTO `bottles` VALUES (1,0,1,0.5,'Printed'),(2,0,1,0.5,'Printed');
/*!40000 ALTER TABLE `bottles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bottlings`
--

DROP TABLE IF EXISTS `bottlings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bottlings` (
  `bottlingNumber` int(11) NOT NULL AUTO_INCREMENT,
  `bottlesUsed` int(11) NOT NULL,
  `bottledVolume` float NOT NULL,
  `batchId` int(11) NOT NULL,
  `bottleDate` date NOT NULL,
  UNIQUE KEY `bottlingNumber` (`bottlingNumber`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bottlings`
--

LOCK TABLES `bottlings` WRITE;
/*!40000 ALTER TABLE `bottlings` DISABLE KEYS */;
INSERT INTO `bottlings` VALUES (1,20,10,1,'2012-12-10'),(2,10,5.5,1,'2012-12-11');
/*!40000 ALTER TABLE `bottlings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commenters`
--

DROP TABLE IF EXISTS `commenters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commenters` (
  `commenterId` int(11) NOT NULL AUTO_INCREMENT,
  `commenterName` text COLLATE utf8_swedish_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`commenterId`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commenters`
--

LOCK TABLES `commenters` WRITE;
/*!40000 ALTER TABLE `commenters` DISABLE KEYS */;
INSERT INTO `commenters` VALUES (1,'nosa','2013-02-24 16:57:11'),(9,'nasa','2013-02-24 21:15:52'),(10,'lakselus','2013-02-24 21:44:58'),(11,'Rema-reitan','2013-02-24 21:57:14');
/*!40000 ALTER TABLE `commenters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `commentId` int(11) NOT NULL AUTO_INCREMENT,
  `commentText` text COLLATE utf8_swedish_ci NOT NULL,
  `commenterId` int(11) NOT NULL,
  `batchId` int(11) NOT NULL,
  `bottleNumber` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  PRIMARY KEY (`commentId`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'kjem denne kommentaren igjennom?	  ',1,1,0,0),(2,'kjem denne kommentaren igjennom?	  ',1,1,0,0),(3,'	  haha',0,1,0,6),(4,'	  haha',0,1,0,6),(5,'	  andre kommentar frÃ¥ nosa',1,1,0,0),(6,'Hei, eg er broren til nosa. Eg syns det er godt med TestBrew!	  ',0,1,0,0),(10,'Hei, eg er broren til nosa. Eg syns det er godt med TestBrew!	  ',9,1,0,0),(11,'Pisspils er eigentleg min favoritt.',10,1,0,0),(12,'Bare er best.',11,1,0,0),(13,'Bare er best.',11,1,0,0),(14,'I just farted.',0,15,0,4);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hoppings`
--

DROP TABLE IF EXISTS `hoppings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hoppings` (
  `hopNumber` int(11) NOT NULL AUTO_INCREMENT,
  `hopType` text NOT NULL,
  `boilTime` int(11) NOT NULL,
  `hopMass` int(11) NOT NULL,
  `boilNumber` int(11) NOT NULL,
  `hopName` text,
  `hopAlpha` float DEFAULT NULL,
  PRIMARY KEY (`hopNumber`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hoppings`
--

LOCK TABLES `hoppings` WRITE;
/*!40000 ALTER TABLE `hoppings` DISABLE KEYS */;
INSERT INTO `hoppings` VALUES (1,'Pellets',60,30,1,'Styrian Golding',NULL),(2,'Pellets',15,30,1,'Saaz',NULL),(3,'Pellets',5,25,1,'Fuggles',NULL),(4,'Cones',60,45,2,'Magnum',14.9),(5,'Pellets',15,60,2,'Cascade',6.5),(6,'Pellets',5,50,2,'Cascade',6.5),(7,'Pellets',0,34,2,'Cascade',6.5);
/*!40000 ALTER TABLE `hoppings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keggings`
--

DROP TABLE IF EXISTS `keggings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `keggings` (
  `keggingNumber` int(11) NOT NULL AUTO_INCREMENT,
  `kegUsed` text NOT NULL,
  `keggedVolume` float NOT NULL,
  `batchId` int(11) NOT NULL,
  `kegDate` date NOT NULL,
  PRIMARY KEY (`keggingNumber`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keggings`
--

LOCK TABLES `keggings` WRITE;
/*!40000 ALTER TABLE `keggings` DISABLE KEYS */;
INSERT INTO `keggings` VALUES (1,'virtualTestKeg',5,1,'2012-12-04');
/*!40000 ALTER TABLE `keggings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maltAdds`
--

DROP TABLE IF EXISTS `maltAdds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maltAdds` (
  `maltAddNumber` int(11) NOT NULL AUTO_INCREMENT,
  `mashNumber` int(11) NOT NULL,
  `maltType` text NOT NULL,
  `maltMass` float NOT NULL,
  `mashTime` int(11) NOT NULL,
  `maltEbc` float DEFAULT NULL,
  PRIMARY KEY (`maltAddNumber`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maltAdds`
--

LOCK TABLES `maltAdds` WRITE;
/*!40000 ALTER TABLE `maltAdds` DISABLE KEYS */;
INSERT INTO `maltAdds` VALUES (1,1,'Brent kveitemalt.',4.54,60,NULL),(2,1,'Spelt',2,60,NULL),(3,2,'Pale Ale',5.5,0,20);
/*!40000 ALTER TABLE `maltAdds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mashStages`
--

DROP TABLE IF EXISTS `mashStages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mashStages` (
  `mashStageNumber` int(11) NOT NULL AUTO_INCREMENT,
  `mashNumber` int(11) NOT NULL,
  `mashStage` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `temp` int(11) NOT NULL,
  PRIMARY KEY (`mashStageNumber`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mashStages`
--

LOCK TABLES `mashStages` WRITE;
/*!40000 ALTER TABLE `mashStages` DISABLE KEYS */;
INSERT INTO `mashStages` VALUES (1,1,1,60,67),(2,2,1,60,72);
/*!40000 ALTER TABLE `mashStages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mashings`
--

DROP TABLE IF EXISTS `mashings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mashings` (
  `mashNumber` int(11) NOT NULL AUTO_INCREMENT,
  `batchId` int(11) NOT NULL,
  PRIMARY KEY (`mashNumber`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mashings`
--

LOCK TABLES `mashings` WRITE;
/*!40000 ALTER TABLE `mashings` DISABLE KEYS */;
INSERT INTO `mashings` VALUES (1,1),(2,4);
/*!40000 ALTER TABLE `mashings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members` (
  `member_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `login` varchar(100) NOT NULL DEFAULT '',
  `passwd` varchar(32) NOT NULL DEFAULT '',
  `email` text,
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (2,'foo','Bar','User','dc647eb65e6711e155375218212b3964',NULL),(3,'Test','Test','test','1a1dc91c907325c69271ddf0c944bc72',NULL),(4,'Dagfinn Olav','Reiakvam','Dagfinn','1a1dc91c907325c69271ddf0c944bc72','dagfinn@reiakvam.no'),(5,'Anneli','Marsfjell','Annelikm','aa5a6eace1cf4198bfcf4232e0be2b67','annelikm@gmail.com'),(6,'kim','runar','kimrunar','24ac62a38bd755f58da123f516376a3f','kimrunarsh@gmail.com');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `queries`
--

DROP TABLE IF EXISTS `queries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `queries` (
  `queryNumber` int(11) NOT NULL AUTO_INCREMENT,
  `batchId` int(11) NOT NULL,
  `bottleNumber` int(11) NOT NULL,
  `queryTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`queryNumber`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `queries`
--

LOCK TABLES `queries` WRITE;
/*!40000 ALTER TABLE `queries` DISABLE KEYS */;
/*!40000 ALTER TABLE `queries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scanLog`
--

DROP TABLE IF EXISTS `scanLog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scanLog` (
  `scanNumber` int(11) NOT NULL AUTO_INCREMENT,
  `scanStatus` text NOT NULL,
  `scanTimeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bottleNumber` int(11) NOT NULL,
  PRIMARY KEY (`scanNumber`),
  KEY `scanNumber` (`scanNumber`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scanLog`
--

LOCK TABLES `scanLog` WRITE;
/*!40000 ALTER TABLE `scanLog` DISABLE KEYS */;
INSERT INTO `scanLog` VALUES (1,'Stock','2012-12-09 18:38:34',1),(2,'Stock','2012-12-09 18:40:28',1),(3,'Printed','2012-12-09 18:41:26',1),(4,'In','2012-12-09 19:00:46',2),(5,'Out','2012-12-09 19:00:46',2);
/*!40000 ALTER TABLE `scanLog` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-03-11 19:49:23
