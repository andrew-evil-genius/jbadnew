CREATE DATABASE  IF NOT EXISTS `jbadnew` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `jbadnew`;
-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: jbadnew
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1

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
-- Table structure for table `assets`
--

DROP TABLE IF EXISTS `assets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assets` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PROJECT_ID` int(11) NOT NULL,
  `upload` varchar(155) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assets`
--

LOCK TABLES `assets` WRITE;
/*!40000 ALTER TABLE `assets` DISABLE KEYS */;
INSERT INTO `assets` VALUES (1,1,'rep_page_layout.jpg','2013-08-09 22:42:16'),(2,1,'IMG_9997.jpg','2013-08-09 22:49:15'),(3,1,'IMG_5881.jpg','2013-08-09 22:49:17'),(4,2,'lighthouse.jpg','2013-08-13 11:58:56'),(5,2,'promo_offers.doc','2013-08-14 23:36:59'),(6,5,'Cypress Elite Ad.jpg','2013-09-16 22:52:13'),(7,919,'Blue Line Kennel.jpg','2013-10-21 20:34:08'),(8,1719,'Waxhaw Barber Styling Shop.txt','2013-10-21 20:43:05'),(9,1153,'Fusion Hair Design.jpg','2013-10-21 20:49:03'),(10,851,'American Recycling Equipment.jpg','2013-10-22 09:44:03'),(11,861,'APEX Heating&Cooling.jpg','2013-10-22 09:47:38'),(12,879,'Autohaus of Waxhaw.jpg','2013-10-22 09:53:59'),(13,1067,'Deep South Lawn Care.jpg','2013-10-22 10:03:37'),(14,1552,'S&S Auto Truck & Trailer Sales.jpg','2013-10-22 10:05:26'),(15,1119,'F&C Construction.jpg','2013-10-22 10:08:49'),(16,1119,'F&C Construction 2.jpg','2013-10-22 10:11:15'),(17,2004,'Austin Insurance & Financial Services.jpg','2013-10-22 10:35:51'),(18,2004,'Austin Insurance 2.jpg','2013-10-22 10:36:32'),(19,2218,'BGM.jpg','2013-10-22 10:39:44'),(20,2008,'Prestige.jpg','2013-10-22 10:46:58'),(21,2040,'Bail M Out Bail Bonds.jpg','2013-10-22 10:49:29'),(22,2425,'Carolina Inspection Services Inc..jpg','2013-10-22 10:53:15'),(23,2175,'AirMarc.jpg','2013-10-22 11:00:45'),(24,2175,'AirMarc 2.jpg','2013-10-22 11:04:52'),(25,2839,'DOC Imports.jpg','2013-10-22 11:08:03'),(26,2496,'Catoe Well Drilling Inc..jpg','2013-10-22 11:11:32'),(27,2519,'Century 21.jpg','2013-10-22 11:22:22'),(28,1973,'ASAP Communications.jpg','2013-10-22 11:32:06'),(29,1151,'Furniture Factory Outlet.jpg','2013-11-03 20:11:30'),(30,1779,'Winning Awards.jpg','2013-11-03 20:22:26'),(31,1000,'Chris Brown NCDOA Calendar 2.jpg','2013-11-03 20:28:24'),(32,1000,'notes.txt','2013-11-03 20:28:33'),(33,5358,'Williams & Truck Repair.jpg','2013-11-04 15:33:03'),(34,2079,'5 Kids Auto Sales.jpg','2013-11-04 15:37:38'),(35,2166,'Affordable Septic Repair.jpg','2013-11-04 15:43:53'),(36,1928,'American Store & Lock.jpg','2013-11-04 15:47:03'),(37,2216,'BFF Pet Grooming.jpg','2013-11-04 16:22:05'),(38,2440,'Carolina Steamer.jpg','2013-11-04 16:32:15'),(39,2449,'Carolinas Animal Health.jpg','2013-11-04 16:43:46'),(40,2542,'Charlotte Monroe Airport.jpg','2013-11-04 16:52:02'),(41,2561,'Chimney Guys.jpg','2013-11-04 16:59:53'),(42,4634,'Classic Molders.jpg','2013-11-04 17:02:13'),(43,3327,'Bob Mayberry Hyundai.pdf','2013-11-04 17:09:05'),(44,2705,'INDIAN_TRAIL.pdf','2013-11-10 19:32:13'),(45,2705,'KIA.pdf','2013-11-10 19:32:26'),(46,2713,'CSR.jpg','2013-11-10 19:37:03'),(47,2780,'Daybreaker Express.jpg','2013-11-10 19:46:42'),(48,2839,'copy1_DOC Imports.jpg','2013-11-10 19:49:35'),(49,2750,'Sconic.jpg','2013-11-10 19:53:51'),(50,2879,'Dymond Model Sports.jpg','2013-11-10 19:57:27'),(51,2935,'Engineering Manufacturing Svc.jpg','2013-11-10 20:03:41'),(52,2984,'Fairway Off LOGO.jpg','2013-11-10 20:08:49'),(53,2984,'Dan Ad.pdf','2013-11-10 20:08:58'),(54,3114,'Gary Rash Plumbing.jpg','2013-11-10 20:14:14'),(55,3115,'Gary\'s Monroe Transmission.jpg','2013-11-10 20:17:25'),(56,3205,'HQ Roofing.jpg','2013-11-10 20:21:35'),(57,3280,'Hilton & Helms Accountants.jpg','2013-11-10 20:24:47'),(58,3299,'Honeycutt, Kenneth.jpg','2013-11-10 20:30:11'),(59,3318,'Hughes Supply.jpg','2013-11-10 20:32:34'),(60,3364,'Interstate All Battery.jpg','2013-11-10 20:35:43'),(61,3435,'Johnstone Supply.jpg','2013-11-10 20:38:02'),(62,3476,'Kenny\'s Welding & Repair.jpg','2013-11-10 20:40:26'),(63,3501,'Koy E. Dawkins.jpg','2013-11-10 20:43:05'),(64,3620,'Love Well & Pump Supply.jpg','2013-11-10 20:46:00'),(65,3685,'Matthew Smith Law Office.jpg','2013-11-10 20:48:47'),(66,4011,'Monroe Alternator & Starter.jpg','2013-11-10 20:52:33'),(67,4083,'Monroe Manor Assisted Living.jpg','2013-11-10 20:55:15'),(68,4214,'North Carolina Indl Supply.jpg','2013-11-10 20:58:21'),(69,4215,'Norton Door Controls.jpg','2013-11-10 21:02:04'),(70,4235,'Oasis Sandwich Shop.jpg','2013-11-10 21:05:19'),(71,4493,'Polyreps Inc.jpg','2013-11-10 21:07:48'),(72,4401,'J17105.pdf','2013-11-10 21:12:33'),(73,4401,'record+BL.tif','2013-11-10 21:12:44'),(74,4418,'Reflections Custom Refinishing.jpg','2013-11-10 21:32:34'),(75,4596,'Robins Maid Svc.jpg','2013-11-10 21:36:08'),(76,4636,'RTE Welding & Fabrication.jpg','2013-11-10 21:38:50'),(77,4646,'Ryback & Ryback.jpg','2013-11-10 21:40:52'),(78,4692,'Secrest Wrecker Service.pdf','2013-11-10 21:42:38'),(79,4741,'Stabella Inc.jpg','2013-11-10 21:46:09'),(80,3274,'Southern Choice Realty.jpg','2013-11-10 21:55:02'),(81,4850,'State Farm.jpg','2013-11-10 21:57:57'),(82,4960,'TBM Trucking.jpg','2013-11-10 22:00:09'),(83,4976,'Thomas Concrete.docx','2013-11-10 22:04:15'),(84,5002,'Tokey\'s Hot Kutz.jpg','2013-11-10 22:10:01'),(85,5002,'Add the hours to ad.jpg','2013-11-10 22:10:13'),(86,5250,'USA Gun & Pawn.jpg','2013-11-10 22:12:45'),(87,5355,'William K Goldfarb.jpg','2013-11-10 22:15:16'),(88,1931,'American Wood Reface.pdf','2013-11-10 22:18:32'),(89,4496,'Popper, George PHD.jpg','2013-11-10 22:21:19'),(90,4824,'SPI Express.jpg','2013-11-10 22:23:40'),(91,5460,'All About Floors.jpg','2013-11-11 10:13:58'),(92,5650,'Auto Tech.jpg','2013-11-11 10:16:03'),(93,5682,'Barrett, Paul DDS.jpg','2013-11-11 10:21:14'),(94,5686,'Beautiful Pets Groming.jpg','2013-11-11 10:23:46'),(95,5530,'Chrismon Heating Cooling.jpg','2013-11-11 10:26:16'),(96,5538,'Citty\'s Plumbing & Pools.jpg','2013-11-11 10:28:27'),(97,5543,'Classic Cut.jpg','2013-11-11 10:31:38'),(98,5558,'College Park Baptist Church.pdf','2013-11-11 10:34:48'),(99,5566,'Compute This.jpg','2013-11-11 10:37:24'),(101,5569,'Connections Integrative Massage.jpg','2013-11-11 10:40:38'),(102,5603,'D&R Auto Sales.jpg','2013-11-11 10:42:50'),(103,5613,'Danc Elite By Angie.jpg','2013-11-11 10:45:04'),(104,5828,'Denning Paint.jpg','2013-11-11 10:49:23'),(105,5828,'Denning 2.jpg','2013-11-11 10:49:34'),(106,5866,'East Side Baptist Church.jpg','2013-11-11 10:53:45'),(107,6460,'EconoServiceCenter.jpg','2013-11-11 10:56:31'),(108,5883,'Electric Systems Inc.jpg','2013-11-11 11:00:38'),(109,5884,'Elizabeth\'s Pizza.jpg','2013-11-11 11:08:10');
/*!40000 ALTER TABLE `assets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campaigns`
--

DROP TABLE IF EXISTS `campaigns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campaigns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) CHARACTER SET latin1 NOT NULL DEFAULT 'No Campaign Name',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `dare` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaigns`
--

LOCK TABLES `campaigns` WRITE;
/*!40000 ALTER TABLE `campaigns` DISABLE KEYS */;
INSERT INTO `campaigns` VALUES (23,'2015 Chester County',0,'2014-06-13','2014-06-20',1),(24,'2015 Calhoun Co.',0,'2014-07-25','2014-07-31',1),(25,'2015 Barnwell County',0,'2014-07-31','2014-08-07',1),(26,'2015 Liberty County',0,'2014-08-06','2014-08-13',1),(27,'2014 Hampton County',1,'2015-04-02','2015-04-02',1),(28,'2015 Griffin Ga PD',0,'2014-08-11','2014-08-25',1),(29,'2015 York Co.',1,'2014-09-02','2014-09-23',0),(33,'2015 Hamblen Co.',1,'2015-04-02','2015-04-02',1);
/*!40000 ALTER TABLE `campaigns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client_sales`
--

DROP TABLE IF EXISTS `client_sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client_sales` (
  `ID` int(11) NOT NULL,
  `sale_status` tinyint(4) NOT NULL,
  `sale_item1` tinyint(4) NOT NULL,
  `routing` tinyint(4) NOT NULL,
  `totalcost` decimal(10,2) NOT NULL,
  `signed` tinyint(1) NOT NULL DEFAULT '0',
  `dateCollected` datetime NOT NULL,
  `dateInvoiced` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client_sales`
--

LOCK TABLES `client_sales` WRITE;
/*!40000 ALTER TABLE `client_sales` DISABLE KEYS */;
INSERT INTO `client_sales` VALUES (3,4,4,2,200.00,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,3,3,5,0.00,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(177,11,3,2,100.00,0,'2014-04-30 00:00:00','0000-00-00 00:00:00'),(2394,1,0,0,0.00,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(7604,1,0,0,0.00,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(15090,1,0,0,0.00,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(38773,11,4,2,150.00,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(42381,11,2,2,300.00,0,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `client_sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoices` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) NOT NULL,
  `ADMIN_ID` int(11) NOT NULL,
  `PROJECT_ID` int(11) NOT NULL,
  `curr` varchar(20) NOT NULL DEFAULT 'USD',
  `upload` tinytext NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `charged` decimal(8,2) NOT NULL,
  `hash` varchar(32) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `hash` (`hash`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices`
--

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lead_address`
--

DROP TABLE IF EXISTS `lead_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lead_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lead_id` int(11) NOT NULL,
  `line_1` varchar(100) NOT NULL,
  `line_2` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state_id` int(11) NOT NULL,
  `zip` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lead_address`
--

LOCK TABLES `lead_address` WRITE;
/*!40000 ALTER TABLE `lead_address` DISABLE KEYS */;
INSERT INTO `lead_address` VALUES (1,7,'1 Desert Way','','Tacoma',43,'37814'),(2,8,'1 Some Street','','Somewhere',43,'33383'),(3,12,'Street Name','','Morristown',43,'37814'),(4,9,'47 Bob Street, Unit 42','ATTN: Bubblegum Pirate','Morristown',43,'17814'),(5,10,'','','Morristown',43,'37814'),(6,11,'Some Street','','Newport',43,'37814'),(7,2,'89 Coatbridge Crescent','','Cape Town',1,'South'),(8,1,'LaLa Avenue','','Morristown',43,'37814'),(9,3,'Somewhere round here','','Morristown',43,'37814');
/*!40000 ALTER TABLE `lead_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lead_email`
--

DROP TABLE IF EXISTS `lead_email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lead_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lead_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lead_email`
--

LOCK TABLES `lead_email` WRITE;
/*!40000 ALTER TABLE `lead_email` DISABLE KEYS */;
INSERT INTO `lead_email` VALUES (1,8,'guy@newcompany.com'),(2,9,'barker@alwaysright.com'),(3,10,'Frank@wallace.com'),(4,2,'andrew@opengatefellowship.org'),(5,1,'test@gmail.com'),(6,3,'bill@parker.net');
/*!40000 ALTER TABLE `lead_email` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lead_notes`
--

DROP TABLE IF EXISTS `lead_notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lead_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lead_id` int(11) NOT NULL,
  `note` varchar(500) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lead_notes`
--

LOCK TABLES `lead_notes` WRITE;
/*!40000 ALTER TABLE `lead_notes` DISABLE KEYS */;
INSERT INTO `lead_notes` VALUES (1,10,'This is a test Note.  It is not very interesting.','2014-10-09 14:14:09'),(2,10,'Another of these test notes.  Still not very interesting but we are making it longer just because we can.','2014-10-09 14:14:09'),(3,10,'â€‹â€‹I\'m going to type in another note. &nbsp;Just for fun, you know. &nbsp;We have to test out this crap after all.<br>','2014-10-09 14:58:34'),(4,10,'â€‹â€‹I\'m going to type in <span style=\"font-weight: bold; text-decoration: underline;\">another </span>note. &nbsp;Just for fun, you know. &nbsp;We have to test out this crap after all.<br>','2014-10-09 14:58:47'),(5,10,'Blah','2014-10-09 14:59:50'),(6,10,'Blah Again!','2014-10-09 15:00:09'),(7,10,'â€‹[09-Oct-2014 14:04:36 Europe/Berlin] PHP Notice: &nbsp;Undefined variable: db in C:xampphtdocsjb-newdbleads_edit_functions.php on line 10<br><br>','2014-10-09 15:02:02'),(8,9,'<div>â€‹Look!!! &nbsp;<span style=\"font-weight: bold;\">A note!</span></div>','2014-10-10 11:16:49'),(9,11,'â€‹jqxMaskedInput represents a jQuery input widget which uses a mask to distinguish between proper and improper user input. You can define phone number, ssn, zip code, dates, etc. masks by setting the jqxMaskedInput mask property.&nbsp;<br><br><div>Every UI widget from jQWidgets toolkit needs its JavaScript files to be included in order to work properly.<br></div>','2014-10-10 11:51:10'),(10,8,'<div>â€‹This is a cool note.</div>','2014-10-10 13:14:33'),(11,1,'<div>â€‹Blah... blah blah</div>','2015-02-04 14:18:32'),(12,3,'<div>â€‹This is the coolest note ever.</div>','2015-02-07 20:51:47'),(13,3,'<div style=\"text-align: center;\">This text should be centered?</div>','2015-02-07 20:52:44'),(14,3,'<span style=\"text-decoration: underline;\">Underlined. &nbsp;</span><span style=\"font-style: italic;\">italics</span><span style=\"font-weight: bold;\">&nbsp;Bold</span>','2015-02-07 20:53:22');
/*!40000 ALTER TABLE `lead_notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lead_phone`
--

DROP TABLE IF EXISTS `lead_phone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lead_phone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lead_id` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lead_phone`
--

LOCK TABLES `lead_phone` WRITE;
/*!40000 ALTER TABLE `lead_phone` DISABLE KEYS */;
INSERT INTO `lead_phone` VALUES (1,11,'(423)555-1234'),(2,8,'(325)698-5487'),(3,9,'(112)452-3654'),(4,10,'(865)443-4986'),(5,12,'(423) 512-4589'),(6,2,'(555)555-5555'),(7,1,'(452)653-2589'),(8,3,'(423)555-6666');
/*!40000 ALTER TABLE `lead_phone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lead_stages`
--

DROP TABLE IF EXISTS `lead_stages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lead_stages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stage` varchar(20) NOT NULL DEFAULT 'New Stage',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lead_stages`
--

LOCK TABLES `lead_stages` WRITE;
/*!40000 ALTER TABLE `lead_stages` DISABLE KEYS */;
INSERT INTO `lead_stages` VALUES (1,'Outstanding'),(2,'Collected'),(3,'Invoiced'),(4,'Donation'),(5,'Return to Rep'),(6,'Written Up');
/*!40000 ALTER TABLE `lead_stages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lead_status`
--

DROP TABLE IF EXISTS `lead_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lead_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lead_status`
--

LOCK TABLES `lead_status` WRITE;
/*!40000 ALTER TABLE `lead_status` DISABLE KEYS */;
INSERT INTO `lead_status` VALUES (1,'New Lead'),(2,'LM Machine'),(3,'LM Person'),(4,'Spoke With'),(5,'Call Back'),(6,'Need Email'),(7,'Need Fax'),(8,'No Sale'),(9,'Disconnected'),(10,'Direct Bill'),(11,'Sold'),(12,'Government'),(13,'No Answer'),(14,'Previous Sale');
/*!40000 ALTER TABLE `lead_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lead_type`
--

DROP TABLE IF EXISTS `lead_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lead_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lead_type`
--

LOCK TABLES `lead_type` WRITE;
/*!40000 ALTER TABLE `lead_type` DISABLE KEYS */;
INSERT INTO `lead_type` VALUES (1,'Banner'),(2,'Feature'),(3,'Single'),(4,'Double'),(5,'Trade'),(6,'Donation');
/*!40000 ALTER TABLE `lead_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leads`
--

DROP TABLE IF EXISTS `leads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `leads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `contact_name` varchar(100) NOT NULL,
  `status_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `stage_id` int(11) NOT NULL,
  `line_of_business` varchar(100) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leads`
--

LOCK TABLES `leads` WRITE;
/*!40000 ALTER TABLE `leads` DISABLE KEYS */;
INSERT INTO `leads` VALUES (1,'Test Company','Bob',2,1,1,'building',23,43410),(2,'Another Test Company','Papa John',1,4,3,'Pizza',29,1),(3,'One More Test Company','Bill Joe Tom Bob Parker',14,4,3,'Who knows?',29,43410),(8,'Acme','Good Guy',11,2,5,'Widgets',25,43410),(9,'Price Is Right','Bob Barker',4,3,1,'Give stuff away',25,1),(10,'Wallace Hardware','Frank Rowe',1,1,1,'Hardware distribution',25,43410),(11,'The Grease Rack','Sam Smith',1,1,1,'Restaurant',25,1);
/*!40000 ALTER TABLE `leads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `to` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'unread',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,5,1,'New Invoice!','Hello Suzi Shoemaker,\r\n\r\nYou have a new invoice for the amount of 100. Please login to your account or <a href=\"http://www.youmightbeaterrorist.com/Clivo/view.php?id=f1d729bcd6a8f429d3f71950137f35da\">http://www.youmightbeaterrorist.com/Clivo/view.php?id=f1d729bcd6a8f429d3f71950137f35da</a>\r\n\r\nSincerely,\r\n\r\nYour Noesis Management Team!','2013-08-11 04:36:34','replied'),(2,1,5,'Re: New Invoice!','Thank you Mr. Lowery for the notice.  I will pay my $100 on Monday.  \r\n\r\n----------------ORIGINAL MESSAGE----------------\r\nTo: Suzi Shoemaker\r\nFrom: Don Lowery\r\nDate: 2013-08-11 04:36:34\r\nMessage: Hello Suzi Shoemaker,\r\n\r\nYou have a new invoice for the amount of 100. Please login to your account or &lt;a href=&quot;http://www.youmightbeaterrorist.com/Clivo/view.php?id=f1d729bcd6a8f429d3f71950137f35da&quot;&gt;http://www.youmightbeaterrorist.com/Clivo/view.php?id=f1d729bcd6a8f429d3f71950137f35da&lt;/a&gt;\r\n\r\nSincerely,\r\n\r\nYour Noesis Management Team!','2013-08-11 04:44:13','read'),(3,5,1,'New Invoice!','Hello Suzi Shoemaker,\r\n\r\nYou have a new invoice for the amount of 150. Please login to your account or <a href=\"http://www.youmightbeaterrorist.com/Clivo/view.php?id=c9eaf8cd7bb70d323dd536c621cb51c7\">http://www.youmightbeaterrorist.com/Clivo/view.php?id=c9eaf8cd7bb70d323dd536c621cb51c7</a>\r\n\r\nSincerely,\r\n\r\nYour Noesis Management Team!','2013-08-11 04:48:40','read'),(4,5,4,'New Project Created!','Hello Suzi Shoemaker,\r\n\r\nA project has been created for you at Noesis! To view the client please log into your account or click on the following link: <a href=\"http://www.youmightbeaterrorist.com/Clivo/projects.php?id=3\">http://www.youmightbeaterrorist.com/Clivo/projects.php?id=3</a>\r\n\r\nSincerely,\r\n\r\nYour Noesis Management Team!','2013-08-11 05:13:44','read'),(5,5,1,'New Invoice!','Hello Suzi Shoemaker,\r\n\r\nYou have a new invoice for the amount of 100. Please login to your account or <a href=\"http://clients.noesisgroup.com/Clivo/view.php?id=27f288c9f555354a86c67372b2d3cb7f\">http://clients.noesisgroup.com/Clivo/view.php?id=27f288c9f555354a86c67372b2d3cb7f</a>\r\n\r\nSincerely,\r\n\r\nYour Noesis Management Team!','2013-08-13 04:18:56','read'),(6,5,1,'New Invoice from Noesis!','Hello Suzi Shoemaker,\r\n\r\nYou have a new invoice for the amount of 100. Please login to your account or <a href=\"http://clients.noesisgroup.com//view.php?id=7555202a6fce49dd0393b5344cb8aa74\">http://clients.noesisgroup.com//view.php?id=7555202a6fce49dd0393b5344cb8aa74</a>\r\n\r\nSincerely,\r\n\r\nYour Noesis Management Team!','2013-08-13 04:42:31','read'),(7,1,179,'dfgdfg','afgafdgafdg','2014-09-09 20:13:39','unread'),(8,2,179,'Blarh','alsdglqhdlglkasdnjglkalsdgjlkaq ladjflkajsld ad;fja;sdjfa ad;jfa','2014-09-13 13:23:08','unread');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PROJECT_ID` int(11) NOT NULL,
  `ASSET_ID` int(11) NOT NULL,
  `x1` varchar(10) NOT NULL,
  `y1` varchar(10) NOT NULL,
  `height` varchar(10) NOT NULL,
  `width` varchar(10) NOT NULL,
  `note` longtext NOT NULL,
  `by` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notes`
--

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
INSERT INTO `notes` VALUES (1,3,0,'','','','','This is a test...',4,'2013-08-11 05:14:31'),(2,2,0,'','','','','Website template up at http://lighthouse.noesisgroup.com',1,'2013-08-13 11:56:10'),(3,2,0,'','','','','hello\r\ntell me what kinds of things do you enjoy? well a few things come to mine for me like,eating healthy, staying fit, travel, and entertainment. i am open for comments.\r\noctavia smith',3,'2013-08-13 17:28:26'),(5,0,31,'140','332','120','160','&ldquo;In Loving Memory of Christopher Brown&rdquo;<br />12/09/85 &ndash; 06/02/13<br /> ',178,'2013-11-03 20:29:09'),(6,0,28,'120','90','120','160','Avaya Telephone System Sales &amp; Repair.  Install &amp; Repair Voice &amp; Data Cabling Fiber Optics.  ',178,'2013-11-04 15:52:50'),(7,0,28,'121','90','120','160','Avaya Telephone System Sales &amp; Repair.  Install &amp; Repair Voice &amp; Data Cabling Fiber Optics.  Use Blue ASAP Logo in top left and add info',178,'2013-11-04 15:53:25'),(8,0,37,'120','90','120','160','Add &quot;Voted #1 Pet Groomer in Union County 2015!&quot;',178,'2013-11-04 16:23:31'),(9,0,40,'120','90','120','160','Please add phone and address:  (704) 226-2300<br />3900 Paul J. Helms Dr.<br />Monroe, NC 28110',178,'2013-11-04 17:05:07'),(10,0,49,'120','90','120','160','Add Monroe, NC',178,'2013-11-10 19:54:12'),(11,0,52,'120','90','120','160','email proof to angelaa@fairwaymc.com',178,'2013-11-10 20:10:02'),(12,0,60,'120','90','120','160','Make green',178,'2013-11-10 20:35:59'),(13,0,80,'120','90','120','160','remove www from the email address on bottom left',178,'2013-11-10 21:55:39'),(14,0,108,'120','90','120','160','Use Logo address &amp; phone info.  Just bring them closer together and make it look right',178,'2013-11-11 11:01:24'),(15,1,0,'','','','','Bob\'s your uncle.',179,'2014-09-13 13:20:09'),(16,1,0,'','','','','Boing!',179,'2014-09-13 13:20:22'),(17,1,0,'','','','','Bob\'s your uncle.',179,'2014-09-13 13:21:04'),(18,6,0,'','','','','Blah.',43408,'2014-09-13 13:27:48');
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) NOT NULL,
  `by` int(11) NOT NULL,
  `name` varchar(155) DEFAULT NULL,
  `description` longtext,
  `created` datetime DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=43280 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,2,1,'CRM Implementation','CRM (SugarCRM?) integrated with SalesGenie for Call-based marketing company','2013-08-09 21:02:14','2013-08-09 21:02:14','0000-00-00 00:00:00'),(2,3,1,'Affiliate Web Site','Setup & Host affiliate marketing website\r\n\r\n','2013-08-10 19:03:57','2013-08-10 19:03:57','0000-00-00 00:00:00'),(4,93,1,'test','test','2013-09-15 22:47:03','2013-09-15 22:47:03','0000-00-00 00:00:00'),(5,97,1,'7-11 acct 1','1','2013-09-16 22:47:25','2013-09-16 22:47:25','0000-00-00 00:00:00'),(6,1,1,'don1','test',NULL,NULL,NULL);
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lead_id` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (1,1,1200,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,2,500,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,3,600,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,4,500,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,8,555,'2015-02-07 21:05:47',NULL),(6,10,1200,'2015-02-07 21:06:04',NULL);
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `name` char(3) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES ('apn','1'),('aut','0'),('cpn','1'),('cre','1'),('ims','Hello {CLIENT},\r\n\r\nYou have a new invoice for the amount of {AMOUNT}. Please login to your account or {LINK}\r\n\r\n{SIGNATURE}'),('ivs','Thank you for your payment!'),('lan','en'),('lin',''),('mes','We appreciate you taking the time to pay for our services using our online payment system. Please choose a payment method below.'),('msb','Welcome to Noesis!'),('nsb','New Invoice from Noesis!'),('pay','0'),('pem','Dear {CLIENT},\r\n\r\nThank you for your payment of {AMOUNT}! To view your invoice history or to make another payment please visit the following link: {LINK}\r\n\r\n{SIGNATURE}'),('pms','Hello {CLIENT},\r\n\r\nA project has been created for you at Noesis! To view the client please log into your account or click on the following link: {LINK}\r\n\r\n{SIGNATURE}'),('psb','New Artwork Project Created for {CLIENT}!'),('sig','Sincerely,\r\n\r\nYour Management Team!'),('wel','Dear {CLIENT},\r\n\r\nAn account has been created for you. To login and view your account details, invoices, messages and projects, please use the login details below:\r\n{CREDENTIALS}\r\n\r\n{SIGNATURE}'),('wem','1');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_state`
--

DROP TABLE IF EXISTS `tbl_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_state` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'PK: Unique state ID',
  `state_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT 'State name with first letter capital',
  `state_abbr` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Optional state abbreviation (US is 2 capital letters)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_state`
--

LOCK TABLES `tbl_state` WRITE;
/*!40000 ALTER TABLE `tbl_state` DISABLE KEYS */;
INSERT INTO `tbl_state` VALUES (1,'Alabama','AL'),(2,'Alaska','AK'),(3,'Arizona','AZ'),(4,'Arkansas','AR'),(5,'California','CA'),(6,'Colorado','CO'),(7,'Connecticut','CT'),(8,'Delaware','DE'),(9,'District of Columbia','DC'),(10,'Florida','FL'),(11,'Georgia','GA'),(12,'Hawaii','HI'),(13,'Idaho','ID'),(14,'Illinois','IL'),(15,'Indiana','IN'),(16,'Iowa','IA'),(17,'Kansas','KS'),(18,'Kentucky','KY'),(19,'Louisiana','LA'),(20,'Maine','ME'),(21,'Maryland','MD'),(22,'Massachusetts','MA'),(23,'Michigan','MI'),(24,'Minnesota','MN'),(25,'Mississippi','MS'),(26,'Missouri','MO'),(27,'Montana','MT'),(28,'Nebraska','NE'),(29,'Nevada','NV'),(30,'New Hampshire','NH'),(31,'New Jersey','NJ'),(32,'New Mexico','NM'),(33,'New York','NY'),(34,'North Carolina','NC'),(35,'North Dakota','ND'),(36,'Ohio','OH'),(37,'Oklahoma','OK'),(38,'Oregon','OR'),(39,'Pennsylvania','PA'),(40,'Rhode Island','RI'),(41,'South Carolina','SC'),(42,'South Dakota','SD'),(43,'Tennessee','TN'),(44,'Texas','TX'),(45,'Utah','UT'),(46,'Vermont','VT'),(47,'Virginia','VA'),(48,'Washington','WA'),(49,'West Virginia','WV'),(50,'Wisconsin','WI'),(51,'Wyoming','WY');
/*!40000 ALTER TABLE `tbl_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) NOT NULL,
  `INVOICE_ID` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `method` varchar(25) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `trans_id` varchar(32) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `trans_id` (`trans_id`),
  KEY `INVOICE_ID` (`INVOICE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (2,5,5,'2013-08-13 04:40:23','Credits',50.00,'da43ade3ac7534c6817fa62c76b3c1e4');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_notes`
--

DROP TABLE IF EXISTS `user_notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `note` varchar(500) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_notes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_preferences` (`USER_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=31516 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_notes`
--

LOCK TABLES `user_notes` WRITE;
/*!40000 ALTER TABLE `user_notes` DISABLE KEYS */;
INSERT INTO `user_notes` VALUES (14,2,'testing','2014-09-19 04:53:17'),(284,2394,' - Male','2014-09-19 04:53:17'),(4721,7604,' - Male','2014-09-19 04:53:17'),(31515,39249,'pickup from Faith Baptist Church. she works there and lives across the street. said to call her cell number and she will walk over and meet you to give you both checks and cards','2014-09-19 04:53:17');
/*!40000 ALTER TABLE `user_notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_preferences`
--

DROP TABLE IF EXISTS `user_preferences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_preferences` (
  `USER_ID` int(11) unsigned NOT NULL DEFAULT '0',
  `billing_addr1` varchar(155) DEFAULT NULL,
  `billing_addr2` varchar(155) DEFAULT NULL,
  `billing_city` varchar(55) DEFAULT NULL,
  `billing_state` char(2) DEFAULT NULL,
  `billing_zip` char(5) DEFAULT NULL,
  `credit` decimal(8,2) DEFAULT '0.00',
  `lan` varchar(15) DEFAULT 'en',
  `theme` varchar(35) DEFAULT 'default',
  `phone2` varchar(10) DEFAULT NULL,
  `fax` varchar(10) DEFAULT NULL,
  `line_of_biz` varchar(55) DEFAULT NULL,
  `notes` text,
  PRIMARY KEY (`USER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_preferences`
--

LOCK TABLES `user_preferences` WRITE;
/*!40000 ALTER TABLE `user_preferences` DISABLE KEYS */;
INSERT INTO `user_preferences` VALUES (1,'','','','','',0.00,'en','default',NULL,NULL,NULL,NULL),(2,'','','','AZ','85719',0.00,'en','gunmetal','5202254700','','','testing'),(3,'','','','','',0.00,'en','gunmetal',NULL,NULL,NULL,NULL),(177,'','','','','',0.00,'en','default','5203331312','','',''),(2394,NULL,NULL,NULL,NULL,NULL,0.00,'en','default',NULL,'','Physicians & Surgeons',' - Male'),(7604,NULL,NULL,NULL,NULL,NULL,0.00,'en','default',NULL,'','Dentists',' - Male'),(13197,NULL,NULL,NULL,NULL,NULL,0.00,'en','default',NULL,NULL,NULL,NULL),(15090,NULL,NULL,NULL,NULL,NULL,0.00,'en','default',NULL,NULL,NULL,NULL),(38475,NULL,NULL,NULL,NULL,NULL,0.00,'en','default',NULL,NULL,NULL,NULL),(38773,NULL,NULL,NULL,NULL,NULL,0.00,'en','default',NULL,NULL,NULL,''),(39249,NULL,NULL,NULL,NULL,NULL,0.00,'en','default',NULL,NULL,NULL,'pickup from Faith Baptist Church. she works there and lives across the street. said to call her cell number and she will walk over and meet you to give you both checks and cards'),(42381,NULL,NULL,NULL,NULL,NULL,0.00,'en','default',NULL,NULL,NULL,''),(42382,NULL,NULL,NULL,NULL,NULL,0.00,'en','default',NULL,NULL,NULL,''),(43176,NULL,NULL,NULL,NULL,NULL,0.00,'en','default',NULL,NULL,NULL,'');
/*!40000 ALTER TABLE `user_preferences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(26) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fname` varchar(55) DEFAULT NULL,
  `lname` varchar(55) DEFAULT NULL,
  `created` datetime NOT NULL,
  `campaign` int(11) DEFAULT '1',
  `roles` varchar(100) NOT NULL DEFAULT 'sales',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=43413 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (43408,'acooper','073016eae1f0161489c047f20e7ad4b5','andrew.evil.genius@gmail.com','Andrew','Cooper','2014-09-13 01:24:38',29,'admin'),(43410,'andrewc','073016eae1f0161489c047f20e7ad4b5','andrew@opengatefellowship.org','Andrew','Cooper','2014-09-26 13:50:57',25,'sales'),(43411,'kevin','5f4dcc3b5aa765d61d8327deb882cf99','ksoutherland@jbadvertising.com','Kevin','Southerland','0000-00-00 00:00:00',23,'admin'),(43412,'EvilGenius','5f4dcc3b5aa765d61d8327deb882cf99','dthomas@gmail.com','Dylan','Thomas','0000-00-00 00:00:00',25,'collections');
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

-- Dump completed on 2015-02-08 21:51:23
