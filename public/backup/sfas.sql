-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: myebay
-- ------------------------------------------------------
-- Server version 	5.6.26
-- Date: Sun, 30 Jul 2017 15:18:51 +0000

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
-- Table structure for table `con_ca`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `con_ca` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `month` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cvv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `con_ca`
--

LOCK TABLES `con_ca` WRITE;
/*!40000 ALTER TABLE `con_ca` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `con_ca` VALUES (1,'4987496959111005','07','2019','411',NULL,NULL,NULL,'1','1231231',NULL),(2,'5400617023148261','09','19','854',NULL,NULL,NULL,'1','1231312',NULL),(3,'4506347034830113','02','20','488',NULL,NULL,NULL,'1','2342432423',NULL),(4,'5437713611447665','08','20','642',NULL,NULL,NULL,'1','',NULL),(5,'4543600301869940','09','20','934',NULL,NULL,NULL,'1','',NULL),(6,'5400370001838541','10','19','932',NULL,NULL,NULL,'1','',NULL),(7,'4899188767186876','10/18|692','10/18|692','10/18|692',NULL,'FL',NULL,'1','','[electronicpromo.ru] Live | [electronicpromo.ru] Live | [electronicpromo.ru] Live | 4899188767186876|10/18|692|Margaret Barry|18691 NE 5th Terrace Rd|CITRA|FL|32113|USA|352-239-3265|barry@neurosurgery.ufl.edu||||||| -Unchecked = > Info Bank: |CAMPUS USA C.U.|DEBIT CLASSIC|UNITED_STATES|352 2379060 = > Info Bank: |CAMPUS USA C.U.|DEBIT CLASSIC|UNITED_STATES|352 2379060 => Info Bank: |CAMPUS USA C.U.|DEBIT CLASSIC|UNITED_STATES|352 2379060'),(8,'4238850015679214','01','18','614',NULL,NULL,NULL,'1','','[electronicpromo.ru] Live | [electronicpromo.ru] Live | [electronicpromo.ru] Live | [electronicpromo.ru] Live | 4238850015679214|\n\n01/18|614|Barry Derr|104 Clay [email&#160;protected]/* */om||||||| -Unchecked = > Info Bank: |FOUNDERS F.C.U.|DEBIT CLASSIC|\n\nUNITED_STATES|8008451614 = > Info Bank: |FOUNDERS F.C.U.|DEBIT CLASSIC|UNITED_STATES|8008451614 = > Info Bank: |FOUNDERS F.C.U.|DEBIT \n\nCLASSIC|UNITED_STATES|8008451614 => Info Bank: |FOUNDERS F.C.U.|DEBIT CLASSIC|UNITED_STATES|8008451614'),(9,'4121850435979186','11','18','023',NULL,NULL,NULL,'1','','[electronicpromo.ru] Live | [electronicpromo.ru] Live | [electronicpromo.ru] Live | [electronicpromo.ru] Live | 4121850435979186|\r\n\r\n11/18|023|Chris Johnson|17 OAK ST|CLAYTON|NM|88415|USA||||||||| -Unchecked = > Info Bank: |USAA SAVINGS BANK|CREDIT CLASSIC|\r\n\r\nUNITED_STATES|1800531USAA 8722 = > Info Bank: |USAA SAVINGS BANK|CREDIT CLASSIC|UNITED_STATES|1800531USAA 8722 = > Info Bank: |USAA \r\n\r\nSAVINGS BANK|CREDIT CLASSIC|UNITED_STATES|1800531USAA 8722 => Info Bank: |USAA SAVINGS BANK|CREDIT CLASSIC|UNITED_STATES|1800531USAA \r\n\r\n8722'),(11,'5437712273955601 	','07/19 	556','07/19 	556','07/19 	556',NULL,NULL,NULL,'1','',NULL),(12,'4465420344517800','05','18','203',NULL,NULL,NULL,'1','','4465420344517800|05/18|203|Herman Hinshaw|243 Winterhaven lane 243 Winterhaven lane|BROWNSVILLE|TX|78526|USA|‎9565511880||||||||	-Valid'),(13,'4806482000752947 	','01','19','706',NULL,NULL,NULL,'1','','4806482000752947 	01/19 	706	Kevin McClung 	137 yorktown road 	city 	TN 	37064 	'),(14,'4806482001224664 ','06','19','066	',NULL,NULL,NULL,'1','','4806482001224664 	06/19 	066	Tamika Henderson 	3786 Marydale Drive 	Nashville 	TN 	37207 	');
/*!40000 ALTER TABLE `con_ca` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `ebay_account`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ebay_account` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paypal_id` int(10) unsigned DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `vps_id` int(10) unsigned DEFAULT NULL,
  `phone` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ebay_account_vps_id_foreign` (`vps_id`),
  KEY `ebay_account_paypal_id_foreign` (`paypal_id`),
  CONSTRAINT `ebay_account_paypal_id_foreign` FOREIGN KEY (`paypal_id`) REFERENCES `paypal` (`id`) ON DELETE SET NULL,
  CONSTRAINT `ebay_account_vps_id_foreign` FOREIGN KEY (`vps_id`) REFERENCES `vps` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ebay_account`
--

LOCK TABLES `ebay_account` WRITE;
/*!40000 ALTER TABLE `ebay_account` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `ebay_account` VALUES (1,'steverivituso','ChristinaJPugh1@hotmail.com','T5df78ew5sd',NULL,'first pet : lucky\r\n\r\nFirst car : Honda\r\n\r\nName of book : Titanic\r\n\r\nnew pass ebay: TrongLu90\r\n',1,NULL),(2,'StellaCReyes65@hotmail.com','StellaCReyes65@hotmail.com','Q5sdf78edf4d ',NULL,'first company : Apple\r\nlast name teacher : Jack\r\nchildhood nickname : Peter\r\n\r\nStellaCReyes65@hotmail.com     Q5sdf78edf4d     StellaCReyes65@yopmail.fr     TrongLu90\r\n',NULL,NULL),(3,'jamesmit452','jameshiw1@outlook.com','dskdom78xbeW',2,'EBay:\r\nAccount name: jamesmit452\r\nEmail: jameshiw1@outlook.com\r\nPass: dskdom78xbeW\r\nName: James Smith\r\nDOB: 14 May 1979\r\nPhone: ‎5878871268',NULL,NULL),(4,'emmoichoi81@gmail.com','emmoichoi81@gmail.com','litmanen37',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `ebay_account` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `full_fill`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `full_fill` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `conca_id` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_id` int(10) unsigned DEFAULT NULL,
  `order_site_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tracking` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_id` int(10) unsigned DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `full_fill_site_id_foreign` (`site_id`),
  KEY `full_fill_conca_id_foreign` (`conca_id`),
  KEY `order_id` (`order_id`),
  CONSTRAINT `full_fill_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL,
  CONSTRAINT `full_fill_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `site_ship` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `full_fill`
--

LOCK TABLES `full_fill` WRITE;
/*!40000 ALTER TABLE `full_fill` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `full_fill` VALUES (1,'89898',1,'326948625','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(2,'2',2,'21-302100062808905','2404263352','ChristinaJPugh1@hotmail.com',NULL,NULL,NULL,NULL,'2016-10-04 03:00:00',NULL,2,NULL),(3,'3',2,'21-301100157479968',' 301-565-9290','StellaCReyes65@hotmail.com',NULL,NULL,NULL,NULL,NULL,NULL,10,NULL),(4,'5400370001838541',2,'21-301100174155338','','tomtom88a@gmail.com','',NULL,NULL,NULL,'2016-10-13 22:32:26','2016-10-13 22:32:26',11,NULL),(5,'5437713611447665',1,'W514191170','','ChristinaJPugh1@hotmail.com','',NULL,NULL,NULL,'2016-10-13 23:22:19','2016-10-13 23:22:19',12,NULL),(6,'4899188767186876',5,'5128993466','352-239-3264','ChristinaJPugh1@hotmail.com','',NULL,NULL,NULL,'2016-10-15 19:02:45','2016-10-15 19:02:45',12,NULL),(7,'',5,'2134997872','(575) 374-2582','chrisjohnson98@gmail.com','',NULL,'709568633910',NULL,'2016-10-15 23:52:44','2016-10-15 23:52:44',12,NULL),(8,'5437712260916822|03/19|518',2,'21-304100076279429','','ngheo_kieu2001@yahoo.com','','pass',NULL,NULL,'2016-10-18 02:11:15','2016-10-18 02:11:15',13,NULL),(9,'5437712260974888 	03/19 	515',2,'21-301100185500549','5703943792','teogk89@gmail.com','',NULL,NULL,NULL,'2016-10-18 02:42:55','2016-10-18 02:42:55',14,NULL),(10,'4159564870026099',2,' 21-301100205642282','9377254282','','',NULL,NULL,NULL,'2016-10-23 03:07:54','2016-10-23 03:07:54',16,NULL),(11,'4465420344517800',4,'3161830469','‎9565511881','teogk89@gmail.com','',NULL,NULL,NULL,'2016-10-23 03:27:28','2016-10-23 03:27:28',17,NULL),(12,'4465420396692287|08/18|254|',4,'3161885345','(505) 573-6683','rodriguezleanh81@hotmail.com','',NULL,NULL,NULL,'2016-10-25 18:23:23','2016-10-25 18:23:23',19,'4465420396692287|08/18|254|Jerome Tecube|10700 Academy Rd. NE. Apt. 1623|ALBUQUERQUE|NM|87111|USA|‎5052058891||||||||	-Valid'),(13,'4465420396692287|08/18|254',4,'3161887366','(505) 573-6683','rodriguezleanh81@hotmail.com','',NULL,NULL,NULL,'2016-10-25 18:37:20','2016-10-25 18:37:20',17,NULL),(14,'4465420396692287|08/18|254|',4,'3161885345','(505) 573-6683','rodriguezleanh81@hotmail.com','',NULL,'92748901053338573016850573',NULL,'2016-10-25 18:42:44','2016-10-25 18:42:44',19,NULL),(15,'4465420396692287|08/18|254',5,'8107793843','201-460-3012  (844) 287-3783','richardsan90@gmail.com','',NULL,NULL,NULL,'2016-10-27 04:41:41','2016-10-27 04:41:41',18,NULL),(16,'4465420495277204|11/18|586',3,'','6502707021  8053148916','StellaCReyes65@hotmail.com','St123456@',NULL,NULL,NULL,'2016-10-27 22:57:26','2016-10-27 22:57:26',18,NULL),(17,'4465420495261091|11/19|856 Paul Lepert',5,'2135230246','201-460-3121  5153430511','santagmo29@hotmail.com','',NULL,NULL,NULL,'2016-10-28 17:24:55','2016-10-28 17:24:55',18,NULL),(18,'4506344165784912',2,'21-306100039267922','(612) 237-8713','jacklondon219@outlook.com','',NULL,'9205590100042363651421',NULL,'2016-11-04 03:52:58','2016-11-04 03:52:58',20,NULL),(19,'4159565072365631',2,' 21-306100039741983','(309) 360-2095','vanteo901@outlook.com','',NULL,'  9205590100042363651407',NULL,'2016-11-04 04:50:55','2016-11-04 04:50:55',21,NULL),(20,'4465420495261091|11/19|856',5,'5129740281','‎5153430511','vanteo901@outlook.com','',NULL,NULL,NULL,'2016-11-05 23:54:06','2016-11-05 23:54:06',22,NULL),(21,'',1,'BBY01-792062043694','(310) 349-3902','','',NULL,NULL,NULL,'2016-11-07 07:37:47','2016-11-07 07:37:47',22,NULL),(22,'4430410095854454 	02/19 	167',5,'8108114402','(812) 280-2361','carlo341@hotmail.com','',NULL,NULL,NULL,'2016-11-08 05:42:55','2016-11-08 05:42:55',22,NULL),(23,'4159566533909710 	10/25 	469',2,'21-302100111232029','(205) 572-5658','angelahogeland90@yopmail.fr','',NULL,NULL,NULL,'2016-11-12 21:57:37','2016-11-12 21:57:37',23,NULL),(24,'4159568870271373 	11/24 	570',2,'21-306100053999695','(828) 674-9610','kaylawill20@yopmail.fr','',NULL,' 9205590100042520927925',NULL,'2016-11-13 17:54:48','2016-11-13 17:54:48',24,NULL),(25,'4806482000137222 	01/19 	907',5,'8108278342','(615) 300-5407','Maddoxx87@Yopmail.Fr','',NULL,' 712840013650',NULL,'2016-11-14 22:03:54','2016-11-14 22:03:54',25,NULL),(26,'4806482000137222 	01/19 	907',4,'3162571828','6153005407','tina390@yopmail.fr','',NULL,NULL,NULL,'2016-11-16 01:19:22','2016-11-16 01:19:22',26,NULL),(27,'806482000137222 	01/19 	907',5,'8108443013','6153005407','Santibanzez@Yopmail.Fr','',NULL,'1ZY840690316233395',NULL,'2016-11-20 19:44:44','2016-11-20 19:44:44',27,NULL),(28,'5437713610988560 	04/19 	767',2,'5YUBJM5RQ','(832) 628-3004','Ingram1892@yopmail.fr','',NULL,NULL,NULL,'2016-11-22 20:20:31','2016-11-22 20:20:31',28,NULL),(29,'4806400000103440 	12/18 	893',5,'8108588177','260-668-4199','jamie45@yopmail.fr','',NULL,NULL,NULL,'2016-11-25 05:56:17','2016-11-25 05:56:17',28,NULL),(30,'4806482000137222 	01/19 	907',5,'8108592963','(615) 300-5409','Herry891@Yopmail.Fr','',NULL,NULL,NULL,'2016-11-25 06:57:52','2016-11-25 06:57:52',29,NULL),(31,'4806482000481836 	09/18 	521',4,'3163223336','(941) 755-1743','Jamieas81@gmail.com','',NULL,NULL,'33570','2016-11-26 03:16:52','2016-11-26 03:16:52',28,NULL),(32,'4806482000590610 	03/19 	788',1,'8108680638','6153105292','Evansbrya21@Gmail.Com','',NULL,'715157752489',NULL,'2016-11-27 03:53:49','2016-11-27 03:53:49',30,NULL),(33,'4806482000590610 	03/19 	788',5,'5130763735','6153105296','Herry2192@Hotmail.Com','',NULL,NULL,NULL,'2016-11-28 21:03:50','2016-11-28 21:03:50',29,NULL),(34,'4806482000481836 	09/18 	521',5,'2135880745','813-307-8077','','',NULL,NULL,NULL,'2016-11-30 04:52:38','2016-11-30 04:52:38',29,NULL),(35,'4806482000481836 	09/18 	521',4,'3163499480','(845) 283-4678','','',NULL,'92748901053338573017254660','33570','2016-12-02 03:49:58','2016-12-02 03:49:58',31,NULL),(36,'4806482000590610 	03/19 	788| 37080',4,'3163585394','6153105295','rudnick82@hotmail.com','',NULL,'92748901053338573017262122',NULL,'2016-12-03 21:08:23','2016-12-03 21:08:23',32,NULL),(37,'4806482000590610 	03/19 	788| 37080',4,'3163683269','(615) 675-4072','cherry21@hotmail.com','',NULL,'92748901053338573017281727',NULL,'2016-12-06 08:48:16','2016-12-06 08:48:16',33,NULL),(38,'4806482000752947 	01/19 	706	 37064',4,'3163757020','6152439229','','',NULL,'92748901053338573017291825',NULL,'2016-12-08 06:35:25','2016-12-08 06:35:25',34,NULL),(39,'4806482000752947 	01/19 	706 | 37042',4,'3163821653','16152439224','','',NULL,'92748901053338573017301333',NULL,'2016-12-09 23:03:25','2016-12-09 23:03:25',35,NULL),(41,'4018424018925481 	06/18 	142| 24401',4,'3163933370','5408850621','selina211@hotmail.com','',NULL,NULL,NULL,'2016-12-12 22:34:06','2016-12-12 22:34:06',36,NULL),(42,'4018424018883482 	02/18 	027| 22902',4,'3163922997','2762190626','','',NULL,' 92748901053338573017321379',NULL,'2016-12-13 09:26:02','2016-12-13 09:26:02',37,NULL),(43,'4833160122507624 	03/20 	879',5,'2136247685','7074358610','Selina21@Gmail.Com','',NULL,NULL,NULL,'2016-12-16 04:49:10','2016-12-16 04:49:10',36,NULL),(44,'',4,'','(707) 435-8605','ChristinaJPugh1@hotmail.com','',NULL,NULL,NULL,'2016-12-19 05:22:12','2016-12-19 05:22:12',36,NULL),(45,'4342562238124471 	08/19 	744',2,' 21-302100154754435 ','7074358606','','',NULL,'9205590100042364325369',NULL,'2016-12-20 07:19:26','2016-12-20 07:19:26',36,NULL),(46,'kitty@yopmail.fr 5311570156352960 	11/17 	588 k9',5,'','(281) 690-2258','','',NULL,NULL,NULL,'2016-12-23 21:25:40','2016-12-23 21:25:40',32,NULL),(47,'4867967004708537',1,'BBY01-794350022095 bestbuy','2538331980','marcella211@hotmail.com','',NULL,NULL,NULL,'2016-12-24 07:49:01','2016-12-24 07:49:01',38,NULL),(48,'4342562972699563 	12/17 	060',4,'','(623) 521-7190','nieto211@yopmail.fr','',NULL,NULL,NULL,'2016-12-30 09:42:56','2016-12-30 09:42:56',39,NULL),(49,'5269554739122019',2,'21-304100230500219','7174375510','richard89@gmail.com','',NULL,'9205590100042364661283',NULL,'2017-01-11 20:39:06','2017-01-11 20:39:06',40,NULL),(50,'4155650133101094 | visa | 01 | 20 | 734 ',2,'21-304100233639736','325-701-7545','redden87@gmail.com','',NULL,'9205590100042364681502',NULL,'2017-01-12 23:29:04','2017-01-12 23:29:04',41,NULL),(51,'5269554739122019 | master | 04 | 19 | 958',2,'21-301100459517826','6157178118','','',NULL,'9205590100042364693567',NULL,'2017-01-14 00:13:21','2017-01-14 00:13:21',42,NULL),(52,'5269552832194018 	11/18 	402',2,'21-304100249961556','9015238992','carrie21@gmail.com','',NULL,'9205590100042364786269',NULL,'2017-01-21 05:38:06','2017-01-21 05:38:06',43,NULL),(53,'21-304100256610307',2,'21-304100256610307','(618) 412-1119','abrar.hamzah21@hotmail.com','',NULL,'9205590100042364786207',NULL,'2017-01-23 06:13:43','2017-01-23 06:13:43',44,NULL),(54,'4853170000036831 	04/17 	692',2,'21-301100481016069','8507803210','ogabema2@gmail.com','',NULL,NULL,NULL,'2017-01-27 00:57:27','2017-01-27 00:57:27',45,NULL),(55,'',1,'BBY01-795511017250','(713) 216-2120','jameson21@gmail.com','',NULL,NULL,NULL,'2017-01-28 23:44:45','2017-01-28 23:44:45',46,NULL),(56,'',2,'21-304100271030742','(713) 216-2120','jamsonl21@hotmail.com','',NULL,NULL,NULL,'2017-01-29 04:04:31','2017-01-29 04:04:31',46,NULL),(57,'',1,'21-302100193213614','7139810024','milermis21@gmail.com','',NULL,'9205590100042364868347',NULL,'2017-01-31 06:07:09','2017-01-31 06:07:09',47,NULL),(58,'5466160339575605 	05/19 	634',1,'21-302100195956518','2677601820','tmcintyre196@gmail.com','',NULL,'9205590100042364895749',NULL,'2017-02-02 03:06:35','2017-02-02 03:06:35',48,NULL),(59,'',2,' 21-304100282406220','2762206819','veldridge.emt.ff222@gmail.com','',NULL,NULL,NULL,'2017-02-03 06:21:51','2017-02-03 06:21:51',49,NULL),(60,'',2,'21-302100197779914','(770) 993-0432','massi_432@yahoo.com','',NULL,NULL,NULL,'2017-02-04 04:33:29','2017-02-04 04:33:29',50,NULL),(61,'372574768555017 	10/21 	0629',2,'21-307100038236707','4059175801','','',NULL,NULL,NULL,'2017-02-07 05:16:07','2017-02-07 05:16:07',51,NULL),(62,'',2,'21-304100299156209','5805120286','jordantippecocnnic@gmail.com','',NULL,NULL,NULL,'2017-02-09 08:00:52','2017-02-09 08:00:52',52,NULL),(63,'4316780001241064',2,'21-304100310314492','(912) 996-7394','','',NULL,NULL,NULL,'2017-02-14 19:41:24','2017-02-14 19:41:24',53,NULL),(64,'',1,'BBY01-796647001863','608-792-8965','jamaljanjas2ua@gmail.com','',NULL,NULL,NULL,'2017-02-16 22:41:16','2017-02-16 22:41:16',54,NULL),(65,'',1,' #3181794-114479','608-792-8965','jamaljanjas2ua@gmail.com','',NULL,NULL,NULL,'2017-02-16 23:31:19','2017-02-16 23:31:19',54,NULL),(66,'',1,' BBY01-796559006386','(309) 365-8612','vcsmit2h@hotmail.com','',NULL,NULL,NULL,'2017-02-17 08:52:11','2017-02-17 08:52:11',55,NULL),(67,'4054285014693786',1,'#3211795942342','(214) 417-3375','davidmaod2@airmail.net','',NULL,NULL,NULL,'2017-02-19 11:01:37','2017-02-19 11:01:37',56,NULL),(68,'',1,'3241797216530','9723950487','jms892220@gmail.com','',NULL,NULL,NULL,'2017-02-23 04:21:20','2017-02-23 04:21:20',57,NULL),(69,'3271799418358',1,'','301)652-8428','blcoopea2avr4@gmail.com afiafa21','',NULL,NULL,NULL,'2017-02-26 07:31:24','2017-02-26 07:31:24',58,NULL),(70,'3271799418358',1,'','301)652-8428','blcoopea2avr4@gmail.com afiafa21','',NULL,NULL,NULL,'2017-02-26 07:31:32','2017-02-26 07:31:32',58,NULL),(71,'4153071000838621',1,'3271799418358','301)652-8428','blcoopea2avr4@gmail.com afiafa21','',NULL,NULL,NULL,'2017-02-26 07:31:53','2017-02-26 07:31:53',58,NULL),(72,'4326533153335673',1,'3281799957629','(507) 421-3039','trmielkee2@gmail.com Vda201225 trmielkee2@gmail.com','',NULL,NULL,NULL,'2017-02-26 23:43:03','2017-02-26 23:43:03',59,NULL),(73,'4737030984860147',1,'3281799166028','(276) 340-4492','mdg1711@centurylink.net Fofasf92','Fofasf92',NULL,NULL,NULL,'2017-02-27 02:01:16','2017-02-27 02:01:16',60,NULL),(74,'4342579997981727',1,'3281799660742','6053940339','jurassiraptorr2@hotmail.com','BVa93032',NULL,NULL,NULL,'2017-02-27 02:28:41','2017-02-27 02:28:41',61,NULL),(75,'4639560000004113',1,'3321751183369','(574) 342-2512','zymman21@yahoo.com','Das21021a',NULL,NULL,NULL,'2017-03-02 23:03:56','2017-03-02 23:03:56',62,NULL),(76,'4661867002685752',1,'3331752885793','(772) 766-3625','drugdocrx2x@aol.com','DDD3233',NULL,NULL,NULL,'2017-03-04 05:25:07','2017-03-04 05:25:07',63,NULL),(77,' 102 West Park Ave ',1,'1016802166423 ','(574) 342-2512','zymmans2@yahoo.com  102 West Park Ave ','DVad22121',NULL,NULL,NULL,'2017-03-04 07:49:21','2017-03-04 07:49:21',62,NULL),(78,'5275150027416932',6,'3331752981698','(281) 257-7829','sutherlandd2ws@msn.com','Dvda1212',NULL,NULL,NULL,'2017-03-04 08:11:38','2017-03-04 08:11:38',64,NULL),(79,'',1,'','(718) 371-9875','tradaza21@yahoo.com','Dvasd1225',NULL,NULL,NULL,'2017-03-04 09:01:22','2017-03-04 09:01:22',65,NULL),(80,'',7,'1016810112830','(410) 987-1042','bb2900@aol.com','DVda2122',NULL,NULL,NULL,'2017-03-07 11:38:14','2017-03-07 11:38:14',66,NULL),(81,'www.macys.com',1,'1392589746','(410) 987-1042','bb29021@aol.com','',NULL,NULL,NULL,'2017-03-09 00:40:37','2017-03-09 00:40:37',66,NULL),(82,'bhphotovideo.com',1,'','614-402-2490','ixlr8hrdds@aol.com','Dvads3231','0',NULL,NULL,'2017-03-09 02:00:26','2017-03-09 02:00:26',68,NULL),(83,'not item',6,'3381755013698','518-212-0214','keech_amyy21@yahoo.com','Vda219092',NULL,'727237154700',NULL,'2017-03-09 02:17:30','2017-03-09 02:17:30',69,NULL),(84,'4129020001182019',6,'3411757310145','(614) 402-2497','ixlr8hrdd2@aol.com','DV90933a',NULL,NULL,NULL,'2017-03-12 00:09:47','2017-03-12 00:09:47',68,NULL),(85,'4300230201401579',1,'1394697204','218-439-4340','Engebretsonjanes2@gmail.com','',NULL,'9200190112856935844454',NULL,'2017-03-17 08:31:20','2017-03-17 08:31:20',72,NULL);
/*!40000 ALTER TABLE `full_fill` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `migrations`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_09_25_100005_create_vps_table',1),('2016_09_25_100011_create_pay_pal_table',1),('2016_09_25_100016_create_ebay_account_table',1),('2016_09_25_100020_create_con_ca_table',1),('2016_09_25_100029_create_site_ship_table',1),('2016_09_25_135333_create_order_table',1),('2016_09_25_135342_create_fufill_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `orders`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ebay_id` int(10) unsigned DEFAULT NULL,
  `invoice` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phonenumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_order` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address2` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(9) NOT NULL DEFAULT '0' COMMENT '0 as open. 1 as close',
  `ebay_nick` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_ebay_id_foreign` (`ebay_id`),
  CONSTRAINT `orders_ebay_id_foreign` FOREIGN KEY (`ebay_id`) REFERENCES `ebay_account` (`id`) ON DELETE SET NULL,
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `orders` VALUES (1,1,1,'1648972541011','Marco','Domingos','811 Gramercy Dr','Los Angeles','CA','90005-3411','marcodomingosmail@gmail.com','(213) 448-5060','Protect smoke and carbon monoxide alarm - Wired 120 v','2016-09-16','2016-09-21 03:00:00','2016-09-30 03:00:00','apt 201',0,NULL),(2,1,1,'1656204351011','Darsh','Nand','8711 Ewing Dr','Bethesda','MD','20817','dnand89@gmail.com','(240) 426-3353','Fitbit alta Black - Large','2016-10-03',NULL,NULL,NULL,0,NULL),(9,1,1,'1656204351011','Darsh Nand','','8711 Ewing Dr','Bethesda','MD','20817','dnand89@gmail.com',NULL,'Fitbit alta Black - Large','Oct-03-16','2016-10-04 03:50:03','2016-10-04 03:50:03','',0,NULL),(10,1,1,'1657367998011','Jason Aleman','','13111 Conductor Way','Silver Spring','MD','20904-6820','jaysun3001@gmail.com',NULL,'Fitbit alta Black - Large','Oct-06-16','2016-10-07 01:13:19','2016-10-07 01:13:19','',0,NULL),(11,1,1,'1659397900011','Wendy Kaban','','61 Harding St','Rochester','NH','03867-3726','wendykaban@yahoo.com','(603) 335-5846','Fitbit alta Black - Large','Oct-11-16','2016-10-11 22:45:41','2016-10-11 22:45:41','',0,NULL),(12,1,3,'','Gilbert Martinez ','','459 Brighton St','Bethlehem','PA','18015','',NULL,'Apple Lighting HDMI cable','','2016-10-13 21:56:01','2016-10-13 21:56:01','',0,NULL),(13,1,1,'1661811632011','Chris De Bruin','','4651 S Westmoreland Rd','Dallas','TX','75237-1017','chris@bruinsmontessori.com',NULL,'Fitbit alta Black - Large','Oct-16-16','2016-10-17 14:21:30','2016-10-17 14:21:30','',0,NULL),(14,1,1,'1662136586011','Sarai Spring','','3340 Buckhill Rd','Muncy','PA','17756-7642','dragonflygirl821@gmail.com',NULL,'Fitbit alta Black - Large','Oct-17-16','2016-10-18 01:09:22','2016-10-18 01:09:22','',0,NULL),(16,1,1,'1662384611011','Barb Garland','','20601 State Route 12','Fostoria','OH','44830-9633','bargrlnd@copper.net','(937) 725-4281','Fitbit alta Black - Large','Oct-18-16','2016-10-19 02:12:10','2016-10-19 02:12:10','',0,NULL),(17,1,1,'1663334879011','Kasey Reid','','65 Elmwood Avenue','Braintree','MA','02184','kayyreid@outlook.com','(617) 710-1042','Fitbit alta Black - Large','Oct-20-16','2016-10-22 02:14:04','2016-10-22 02:14:04','',0,NULL),(18,1,3,'','Richard','Santana','288 Park Ave ','Rutherford','NJ','07070','','','Apple Lighting HDMI cable','','2016-10-23 04:04:45','2016-10-23 04:04:45','Apt 2R',0,NULL),(19,1,1,'1665127818011','Leah Rodriguez','','5340 Nugget Rd.','Fair Oaks','CA','95628','leah.rodriguez@live.com','','Fitbit alta Black - Large','Oct-24-16','2016-10-25 01:31:19','2016-10-25 01:31:19','',0,NULL),(20,1,1,'1667147189011','Grant Butler','','1644 Chatham Ave','Arden Hills','MN','55112-3205','grant.w.butler@gmail.com','(612) 237-8712','Fitbit alta Black - Large','Oct-29-16','2016-10-30 20:00:57','2016-10-30 20:00:57','',0,NULL),(21,1,1,'1668140964011','Janice Eberle','','11806 N Riverview Rd','Chillicothe','IL','61523-9119','mommaj1959@hotmail.com','(309) 360-2094','Fitbit alta Black - Large','Oct-31-16','2016-11-01 04:15:06','2016-11-01 04:15:06','',0,NULL),(22,1,3,'','Carlos de Cos','','3501 Jk North Av Ave','Hawthorne','CA','90250','','','Apple Lighting HDMI cable','','2016-11-04 05:40:26','2016-11-04 05:40:26','Ste 6787',0,NULL),(23,1,1,'1670402472011','Angela Hogeland','','245 Hollow Creek Rd','Hayden','AL','35079-8014','butterbeanball@yahoo.com','(205) 572-5657','Fitbit alta Black - Large','Nov-06-16','2016-11-10 03:51:42','2016-11-10 03:51:42','',0,NULL),(24,1,1,'1673266652011','Kayla Williams','','79 Garren Rd','Hendersonville','NC','28792-8602','kaylaw612@yahoo.com','(828) 674-9609','Fitbit alta Black - Large','Nov-12-16','2016-11-13 05:25:10','2016-11-13 05:25:10','',0,NULL),(25,1,1,'','Alexander','Torres','Po Box 798','Los Molinos','CA','96055','','','','','2016-11-13 18:44:47','2016-11-13 18:44:47','25265 S Center St',0,NULL),(26,1,1,'1674339773011','Tina Hampshire','','147 West St','New Haven','IN','46774-1144','tina_hampshire@yahoo.com','(260) 749-9871','Fitbit alta Black - Large','Nov-14-16','2016-11-15 04:26:59','2016-11-15 04:26:59','',0,NULL),(27,1,1,'','armando','santibanez','8618 Richmond Ave Ste 102','Houston','TX','77063','','','Apple Lightning Digital AV Adapter','','2016-11-17 04:54:30','2016-11-17 04:54:30','',0,NULL),(28,1,1,'1674856575011','Jamie Ingram','','20807 Magnolia Brook Ln','Cypress','TX','77433','jamiedingram@yahoo.com','(832) 628-3002','Fitbit alta Black - Large','Nov-15-16','2016-11-20 19:47:07','2016-11-20 19:47:07','',0,NULL),(29,1,2,'','Jeffrey Henry','','1505 Summit Ave Lot 120','Waukesha','WI','53188','','','Apple Lightning Digital AV Adapter','','2016-11-24 04:40:29','2016-11-24 04:40:29','',0,NULL),(30,1,2,'','Bryan ','Evans','4568 Meadow Ln','Wellsville','KS','66092','','','Apple Lightning Digital AV Adapter','','2016-11-25 07:04:58','2016-11-25 07:04:58','',0,NULL),(31,1,1,'1682253460011','Shane Tietsworth','','3297 US Route 9','Hudson','NY','12534','shanevand7@gmail.com','(845) 283-4677','Fitbit alta Black - Large','Dec-01-16','2016-12-02 03:01:05','2016-12-02 03:01:05','',0,NULL),(32,1,1,'1682591428011','Christian Rudnick','','735 Dulles Ave','Stafford','TX','77477-5228','krispykritter2003@gmail.com','','Fitbit alta Black - Large','Dec-01-16','2016-12-02 09:38:38','2016-12-02 09:38:38','Apt 515',0,NULL),(33,1,1,'1683291498011','Nick Cherry','','3815 Cypress St','Metairie','LA','70001','ncherry@mattressdirect.com','','Fitbit alta Black - Large','Dec-03-16','2016-12-03 22:24:12','2016-12-03 22:24:12','',0,NULL),(34,1,1,'1685217538011','Rachel Mindes','','411 Pebble Beach Dr SE','Grand Rapids','MI','49546','rachel.mindes@gmail.com','(616) 648-4784','Fitbit alta Black - Large','Dec-06-16','2016-12-07 07:14:37','2016-12-07 07:14:37','',0,NULL),(35,1,1,'1686341270011','TOM  DARCY','','209 Clover Ln','Ambler','PA','19002-2411','tdarcy10@comcast.net','(215) 669-7006','Fitbit alta Black - Large','Dec-09-16','2016-12-09 22:27:02','2016-12-09 22:27:02','',0,NULL),(36,1,1,'1687417814011','Selina Pashenee','','2106 Hillridge dr','FAIRFIELD','CA','94534-7949','sjpashen@msn.com','(707) 435-8612','Fitbit alta Black - Large','Dec-11-16','2016-12-12 04:28:52','2016-12-12 04:28:52','',0,NULL),(37,1,1,'1688247624011','Kathleen Hammons','','2175 Schillinger Rd S Apt 1325','Mobile','AL','36695-6007','qhammons518@gmail.com','(251) 709-6168','Fitbit alta Black - Large','Dec-12-16','2016-12-13 09:01:47','2016-12-13 09:01:47','',0,NULL),(38,1,1,'1692374973011','walter and marcella fogg','','2220 Forest Ridge Dr SE','Auburn','WA','98002-7093','fogginseattle@yahoo.com','','Fitbit alta Black - Large','Dec-22-16','2016-12-22 20:01:37','2016-12-22 20:01:37','',0,NULL),(39,1,1,'1692745751011','Elsa Gallardo','','2625 S 63rd Dr','Phoenix','AZ','85043','egallardo.02@gmail.com','(623) 521-7195','Fitbit alta Black - Large','Dec-23-16','2016-12-24 00:14:25','2016-12-24 00:14:25','',0,NULL),(40,1,1,'1698127346011','Tyler Richard','','2 Feeder Avenue','Lewistown','PA','17044-2727','tylerrichard2007@gmail.com','(717) 437-5540','Fitbit alta Black - Large','Jan-07-17','2017-01-08 05:48:22','2017-01-08 05:48:22','',0,NULL),(41,1,1,'1699947701011','Michael Redden','','710 Elmwood Drive','Abilene','TX','79605','mrralmr196566@yahoo.com','','Fitbit alta Black - Large','Jan-11-17','2017-01-12 09:26:04','2017-01-12 09:26:04','',0,NULL),(42,1,1,'1700269120011','Maryo toma','','620 W Stevens St Apt E7','cookeville','TN','38501-3983','mariyo_toma@yahoo.com','(615) 717-8120','Fitbit alta Black - Large','Jan-12-17','2017-01-13 05:51:02','2017-01-13 05:51:02','',0,NULL),(43,1,1,'1703276259011','Carrie Baker','','13010 Bennettsville rd','memphis','IN','47143','cabaker620@gmail.com','','Fitbit alta Black - Large','Jan-19-17','2017-01-20 05:58:30','2017-01-20 05:58:30','',0,NULL),(44,1,1,'1704549458011','Abrar Al-Emad','','819 E. No Name Rd','Carbondale','IL','62902','abrar.hamzah@hotmail.com','(618) 412-1112','Fitbit alta Black - Large','Jan-22-17','2017-01-23 05:57:07','2017-01-23 05:57:07','',0,NULL),(45,1,1,'1705060148011','Eman Ogab','','1436 Kings Rd','Cantonment','FL','32533-8950','emanqader@hotmail.com','','Fitbit alta Black - Large','Jan-23-17','2017-01-24 20:16:06','2017-01-24 20:16:06','',0,NULL),(46,1,1,'1706174892011','JAMES FASHAKIN','','7274 Autumn Sun Dr','HOUSTON','TX','77083-6900','jamesfashakin@yahoo.com','','Fitbit alta Black - Large','Jan-26-17','2017-01-28 22:48:46','2017-01-28 22:48:46','',0,NULL),(47,1,1,'1707573146011','Keira Miller','','7171 Buffalo Speedway Apt 2132','Houston','TX','77025-1437','ksmiller1222@gmail.com','','Fitbit alta Black - Large','Jan-30-17','2017-01-31 05:40:42','2017-01-31 05:40:42','',0,NULL),(48,1,1,'1708281574011','Thomas McIntyre','','1515 Beulah st','Philadelphia','PA','19147','tmcintyre96@gmail.com','(267) 760-1825','Fitbit alta Black - Large','Jan-31-17','2017-02-01 08:08:37','2017-02-01 08:08:37','',0,NULL),(49,1,1,'1709042446011','Victoria Eldridge','','1571 Main Ave W','Big Stone Gap','VA','24219','veldridge.emt.ff22@gmail.com','(276) 220-6818','Fitbit alta Black - Large','Feb-02-17','2017-02-03 05:28:44','2017-02-03 05:28:44','',0,NULL),(50,1,1,'1709139086011','massi makhmoukh','','125 creekmont ct','Roswell','GA','30076','massi_3322@yahoo.com','','Fitbit alta Black - Large','Feb-02-17','2017-02-03 20:15:53','2017-02-03 20:15:53','',0,NULL),(51,1,1,'1709518630011','Dorothy Harris','','305 S La Mesa Dr','Enid','OK','73703','susieris@suddenlink.net','','Fitbit alta Black - Large','Feb-03-17','2017-02-04 22:12:17','2017-02-04 22:12:17','',0,NULL),(52,1,1,'1711615792011','Jordan Tippeconnic','','2301 NW 122nd Street','Oklahoma City','OK','73120','jordantippeconnic@gmail.com','(580) 512-0285','Fitbit alta Black - Large','Feb-08-17','2017-02-09 02:41:19','2017-02-09 02:41:19','Apt 1212',0,NULL),(53,1,1,'1712980842011','Michelle Malanga','','114 Marsh Oak Dr','Brunswick','GA','31525-4512','michelle.l.malanga@gmail.com','','Fitbit charge 2- Large- Black','Feb-11-17','2017-02-12 06:38:23','2017-02-12 06:38:23','',0,NULL),(54,1,1,'1714243787011','Jamal Janjua','','2117 7th St S','La Crosse','WI','54601-5203','jamaljanjua@gmail.com','(608) 792-8966','Fitbit charge 2- Large- Black','Feb-14-17','2017-02-15 20:48:24','2017-02-15 20:48:24','',0,NULL),(55,1,1,'1714568161011','vern smith','','9 GREGORY LN','LEXINGTON','IL','61753','v-c-smith@hotmail.com','','Fitbit charge 2- Large- Black','Feb-15-17','2017-02-16 04:59:26','2017-02-16 04:59:26','',0,NULL),(56,1,1,'1715647618011','Mao David','','190 Summer Hill Ln','Fairview','TX','75069-4167','davidmao@airmail.net','(214) 417-3373','Fitbit charge 2- Large- Black','Feb-18-17','2017-02-18 21:04:40','2017-02-18 21:04:40','',0,NULL),(57,1,1,'1716862079011','Joe Mathews','','2841 Cameron Bay Dr','Lewisville','TX','75056-4307','jms890@gmail.com','(972) 395-0482','Fitbit charge 2- Large- Black','Feb-20-17','2017-02-21 03:36:00','2017-02-21 03:36:00','',0,NULL),(58,1,1,'1718493962011','Bridgette Cooper','','7501 Wisconsin Ave Ste 400E','Bethesda','MD','20814-6583','blcooper4@gmail.com','','Fitbit charge 2- Large- Black','Feb-24-17','2017-02-26 04:27:01','2017-02-26 04:27:01','c/o Cohnreznick',0,NULL),(59,1,1,'1719113389011','Trent Mielke','','26811 Anable Ave','Evans Mills','NY','13637','trmielke@gmail.com','(507) 421-3030','Fitbit charge 2- Large- Black','Feb-25-17','2017-02-26 23:09:48','2017-02-26 23:09:48','',0,NULL),(60,1,1,'1719493565011','Mark Gilbert','','306 Owsley Dr','Martinsville','VA','24112-0399','mdg171@centurylink.net','','Fitbit charge 2- Large- Black','Feb-26-17','2017-02-27 01:46:41','2017-02-27 01:46:41','',0,NULL),(61,1,1,'1719524117011','Justin Petersen','','708 3rd Ave E','Mobridge','SD','57601','jurassiraptor@hotmail.com','','Fitbit charge 2- Large- Black','Feb-26-17','2017-02-27 02:09:53','2017-02-27 02:09:53','',0,NULL),(62,1,1,'1721002072011','Stephen Fink','','106 W. Park Ave.','Bourbon','IN','46504','zymman@yahoo.com','','Fitbit charge 2- Large- Black','Mar-01-17','2017-03-02 22:46:56','2017-03-02 22:46:56','',0,NULL),(63,1,1,'1721307722011','JOHN RUSSO','','7495 36th Ct','VERO BEACH','FL','32967-5757','drugdocrx@aol.com','(772) 766-3621','Fitbit charge 2- Large- Black','Mar-02-17','2017-03-03 01:25:34','2017-03-03 01:25:34','',0,NULL),(64,1,1,'1721408185011','Scott Sutherland','','16906 WindyPine Dr.','Spring','TX','77379','sutherlandws@msn.com','','Fitbit charge 2- Large- Black','Mar-02-17','2017-03-04 05:11:53','2017-03-04 05:11:53','',0,NULL),(65,1,1,'1721836722011','ICEBOX Theresa Radaza-Orcullo','','JOHNNY AIR PLUS','Woodside','NY','11377','tradaza@yahoo.com','(718) 371-9871','Fitbit charge 2- Large- Black','Mar-03-17','2017-03-04 06:16:37','2017-03-04 06:16:37','69-04 Roosevelt Avenue',0,NULL),(66,1,1,'1722230029011','Scott Jacobs','','671 Stone Wheel Ct W','millersville','MD','21108-1505','bb290@aol.com','','Fitbit charge 2- Large- Black','Mar-04-17','2017-03-05 23:22:26','2017-03-05 23:22:26','',0,NULL),(67,1,1,'1722284048011','Michael Allen','','1113 stonebridge path','jordan','MN','55352-4537','amandaj.allen@yahoo.com','','Fitbit charge 2- Large- Black','Mar-04-17','2017-03-05 23:22:35','2017-03-05 23:22:35','',0,NULL),(68,1,1,'1722868907011','Charles West','','24855 Patrick Brush Run Rd','marysville','OH','43040-9263','ixlr8hrd@aol.com','(614) 402-2494','Fitbit charge 2- Large- Black','Mar-05-17','2017-03-07 08:16:21','2017-03-07 08:16:21','',0,NULL),(69,1,4,'','Amy Keech','','3 Harmony Rd','Mineville','NY ','12956-1044','keech_amy@yahoo.com','','NEW Fitbit Charge 2 Black Activity Tracker SMALL','','2017-03-07 12:21:32','2017-03-07 12:21:32','',0,NULL),(70,1,1,'1723626963011','Jennifer Axtell','','400 N Brady St','Corunna','MI','48817-1405','axtellcrain@yahoo.com','(989) 721-7119','Fitbit charge 2- Large- Black','Mar-07-17','2017-03-09 01:30:22','2017-03-09 01:30:22','',0,NULL),(71,1,1,'1726018510011','Lance MYRDEK','','133 Pine Hill Est','Weare','NH','03281-4225','renlan@comcast.net','(603) 413-6051','Fitbit charge 2- Large- Black','Mar-12-17','2017-03-14 06:28:17','2017-03-14 06:28:17','',0,NULL),(72,1,1,'','Jeanie ','Engebretson','26174 Dahl Road',' Detroit Lakes ,  ','MN','56501','','','NEW Fitbit Charge 2 Black Activity Tracker SMALL','','2017-03-17 08:02:57','2017-03-17 08:02:57','',0,NULL);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `password_resets`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `paypal`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paypal` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bank_account` text COLLATE utf8_unicode_ci,
  `note` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paypal`
--

LOCK TABLES `paypal` WRITE;
/*!40000 ALTER TABLE `paypal` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `paypal` VALUES (1,' Merrybeac524@hotmail.com','9422LbSeaR','','\r\n','Paypal:\r\nMerrybeac524@hotmail.com\r\n9422LbSeaR\r\n\r\nEbay ID:\r\nratilium\r\nsu7GVuKeyt\r\n\r\nAddress:\r\nIvan Chavez\r\n1155 Poe Road\r\nSanta Rosa CA 95407\r\n\r\nVCC:\r\n4045-3777-1293-8993\r\n08/2016\r\n3999\r\n\r\nVoice and text messaging:\r\nmaryziemkowski@gmail.com\r\nRDdz4PL3X7\r\n(530) 936-5172\r\n\r\n RXk5214AZ\r\n\r\nPaypal SQA:\r\nPetname: Clar\r\nRoommate: Nova\r\n\r\nEbay SQA:\r\nPetname: Ackmard\r\n'),(2,'jameshiw1@outlook.com','dskdom78xbeW','',NULL,'PayPal:\r\nEmail: jameshiw1@outlook.com\r\nPass: dskdom78xbeW\r\nAddress: 42 Crystal Ridge Way\r\nOkotoks, AB T1S 1P6\r\nAnswer #1: Doggy (pet)\r\nAnswer #2: California (honeymoon)\r\nName: James Smith\r\nPhone: ‎5878871268\r\n\r\nHotmail:\r\nEmail: jameshiw1@outlook.com\r\nPass: dskdom78xbeW\r\nName: James Smith\r\nDOB: 14 May 1979\r\n\r\nPhone: ‎5878871268\r\n\r\nBank account:\r\nBank Name: Discover\r\nAccount Type: Checking\r\nRouting Number: ‎031100649\r\nAccount Number:‎7006828126\r\n'),(3,'gtkuhn@hotmail.com','phil4hana','ok',NULL,'Username:	gtkuhn@hotmail.com\r\nPassword:	phil4hana\r\nName:	Glenn Kuhn\r\nEmail:	gtkuhn@hotmail.com\r\nAddress:	967 PEARL ST, SEATTLE WA 98136\r\nPayPal Balance:	0.00\r\nPP Currency:	USD\r\nUS Balance:	N\\A\r\nUS Currency:	USD\r\nCredit Card:	***5895 Visa | 9/2018\r\nBank accounts:	No bank accounts\r\nAccount type:	Personal\r\nStatus:	Unverified\r\nLast trans:	N\\A\r\nCountry:	US\r\nCheck Date:	25.09.2016');
/*!40000 ALTER TABLE `paypal` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `site_ship`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_ship` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `domain` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tip` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_ship`
--

LOCK TABLES `site_ship` WRITE;
/*!40000 ALTER TABLE `site_ship` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `site_ship` VALUES (1,'www.lowes.com','same bill address'),(2,'https://www.att.com/','cc turkey samebill'),(3,'http://www.apple.com/',NULL),(4,'www.t-mobile.com/','ship cable apple: khac bill'),(5,'www.verizonwireless.com','khac bill, xuat hien ngay ship'),(6,'walmart.com',NULL),(7,'target.com',NULL),(8,'macys.com',NULL);
/*!40000 ALTER TABLE `site_ship` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `users`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `users` VALUES (1,'dsaf','adfasdfa','asdfadsfads','asdfadsf',NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `vps`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vps` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `domain` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vps`
--

LOCK TABLES `vps` WRITE;
/*!40000 ALTER TABLE `vps` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `vps` VALUES (1,NULL,'52.32.214.127','Administrator / KY3gN?Tu!a@',NULL),(2,'149.56.201.4','149.56.201.4','5D33D2EAE4','Username: 6E101DAACB@149.56.201.4\r\nPassword: 5D33D2EAE4');
/*!40000 ALTER TABLE `vps` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Sun, 30 Jul 2017 15:18:51 +0000
