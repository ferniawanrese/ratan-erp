/*
SQLyog Ultimate v8.61 
MySQL - 5.1.41 : Database - merp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`merp` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `merp`;

/*Table structure for table `access` */

DROP TABLE IF EXISTS `access`;

CREATE TABLE `access` (
  `access_ID` int(30) NOT NULL AUTO_INCREMENT,
  `access_hexaID` char(30) DEFAULT NULL,
  `employee_hexaID` char(30) DEFAULT NULL,
  `menu_hexaID` char(30) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`access_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `access` */

insert  into `access`(`access_ID`,`access_hexaID`,`employee_hexaID`,`menu_hexaID`,`deleted`) values (1,'1','1','1',0),(2,'2','1','2',0),(3,'3','1','3',0),(4,'4','1','4',0);

/*Table structure for table `ci_sessions` */

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `online` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ci_sessions` */

insert  into `ci_sessions`(`session_id`,`ip_address`,`user_agent`,`last_activity`,`user_data`,`date_created`,`online`) values ('dc1f372bb0ea8296a8f5aa2480763123','::1','Mozilla/5.0 (Windows NT 6.2; WOW64; rv:26.0) Gecko/20100101 Firefox/26.0',1388059852,'a:30:{s:9:\"user_data\";s:0:\"\";s:11:\"employee_ID\";s:1:\"1\";s:15:\"employee_hexaID\";s:1:\"1\";s:13:\"employee_name\";s:10:\"Nurjamilah\";s:14:\"employee_email\";s:20:\"anakpisces@gmail.com\";s:17:\"employee_password\";s:32:\"7884fc6616d2e1c408a298a75eb159d4\";s:15:\"employee_access\";s:1:\"1\";s:14:\"employee_photo\";s:38:\"./upload/employee_image/nurjamilah.jpg\";s:21:\"employee_startworking\";s:10:\"2012-12-12\";s:19:\"employee_endworking\";N;s:14:\"employee_badge\";s:10:\"ADR-100119\";s:19:\"employee_positionID\";N;s:19:\"employee_divisionID\";N;s:15:\"employee_status\";s:3:\"new\";s:20:\"employee_mobilephone\";N;s:14:\"employee_phone\";s:12:\"085271129400\";s:18:\"employee_managerID\";N;s:23:\"employee_worklocationID\";N;s:16:\"employee_address\";s:41:\"Jl. Bukit Barisan Perum Cendana I blok c2\";s:12:\"employee_SSN\";N;s:20:\"employee_passport_no\";N;s:15:\"employee_gender\";N;s:14:\"employee_blood\";N;s:17:\"employee_religion\";N;s:20:\"employee_maritalstat\";N;s:18:\"employee_countryID\";N;s:12:\"employee_dob\";N;s:14:\"employee_notes\";N;s:7:\"deleted\";s:1:\"0\";s:19:\"employee_datecreate\";s:19:\"0000-00-00 00:00:00\";}','2013-12-26 18:06:29',1),('477d972678cb010bcabcf9301c84c24b','::1','Mozilla/5.0 (Windows NT 6.2; WOW64; rv:26.0) Gecko/20100101 Firefox/26.0',1388055587,'a:30:{s:9:\"user_data\";s:0:\"\";s:11:\"employee_ID\";s:1:\"1\";s:15:\"employee_hexaID\";s:1:\"1\";s:13:\"employee_name\";s:10:\"Nurjamilah\";s:14:\"employee_email\";s:20:\"anakpisces@gmail.com\";s:17:\"employee_password\";s:32:\"7884fc6616d2e1c408a298a75eb159d4\";s:15:\"employee_access\";s:1:\"1\";s:14:\"employee_photo\";s:38:\"./upload/employee_image/nurjamilah.jpg\";s:21:\"employee_startworking\";s:10:\"2012-12-12\";s:19:\"employee_endworking\";N;s:14:\"employee_badge\";s:10:\"ADR-100119\";s:19:\"employee_positionID\";N;s:19:\"employee_divisionID\";N;s:15:\"employee_status\";s:3:\"new\";s:20:\"employee_mobilephone\";N;s:14:\"employee_phone\";s:12:\"085271129400\";s:18:\"employee_managerID\";N;s:23:\"employee_worklocationID\";N;s:16:\"employee_address\";s:41:\"Jl. Bukit Barisan Perum Cendana I blok c2\";s:12:\"employee_SSN\";N;s:20:\"employee_passport_no\";N;s:15:\"employee_gender\";N;s:14:\"employee_blood\";N;s:17:\"employee_religion\";N;s:20:\"employee_maritalstat\";N;s:18:\"employee_countryID\";N;s:12:\"employee_dob\";N;s:14:\"employee_notes\";N;s:7:\"deleted\";s:1:\"0\";s:19:\"employee_datecreate\";s:19:\"0000-00-00 00:00:00\";}','2013-12-26 17:21:06',1),('1e109a8f7e1f8ecf5d864d3813e10b78','::1','Mozilla/5.0 (Windows NT 6.2; WOW64; rv:26.0) Gecko/20100101 Firefox/26.0',1388065636,'a:30:{s:9:\"user_data\";s:0:\"\";s:11:\"employee_ID\";s:1:\"1\";s:15:\"employee_hexaID\";s:1:\"1\";s:13:\"employee_name\";s:10:\"Nurjamilah\";s:14:\"employee_email\";s:20:\"anakpisces@gmail.com\";s:17:\"employee_password\";s:32:\"7884fc6616d2e1c408a298a75eb159d4\";s:15:\"employee_access\";s:1:\"1\";s:14:\"employee_photo\";s:38:\"./upload/employee_image/nurjamilah.jpg\";s:21:\"employee_startworking\";s:10:\"2012-12-12\";s:19:\"employee_endworking\";N;s:14:\"employee_badge\";s:10:\"ADR-100119\";s:19:\"employee_positionID\";N;s:19:\"employee_divisionID\";N;s:15:\"employee_status\";s:3:\"new\";s:20:\"employee_mobilephone\";N;s:14:\"employee_phone\";s:12:\"085271129400\";s:18:\"employee_managerID\";N;s:23:\"employee_worklocationID\";N;s:16:\"employee_address\";s:41:\"Jl. Bukit Barisan Perum Cendana I blok c2\";s:12:\"employee_SSN\";N;s:20:\"employee_passport_no\";N;s:15:\"employee_gender\";N;s:14:\"employee_blood\";N;s:17:\"employee_religion\";N;s:20:\"employee_maritalstat\";N;s:18:\"employee_countryID\";N;s:12:\"employee_dob\";N;s:14:\"employee_notes\";N;s:7:\"deleted\";s:1:\"0\";s:19:\"employee_datecreate\";s:19:\"0000-00-00 00:00:00\";}','2013-12-26 19:34:02',1);

/*Table structure for table `countries` */

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
  `idCountry` int(5) NOT NULL AUTO_INCREMENT,
  `countryCode` char(2) NOT NULL DEFAULT '',
  `countryName` varchar(45) NOT NULL DEFAULT '',
  `currencyCode` char(3) DEFAULT NULL,
  `fipsCode` char(2) DEFAULT NULL,
  `isoNumeric` char(4) DEFAULT NULL,
  `capital` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idCountry`)
) ENGINE=MyISAM AUTO_INCREMENT=252 DEFAULT CHARSET=utf8;

/*Data for the table `countries` */

insert  into `countries`(`idCountry`,`countryCode`,`countryName`,`currencyCode`,`fipsCode`,`isoNumeric`,`capital`) values (1,'AD','Andorra','EUR','AN','020','Andorra la Vella'),(2,'AE','United Arab Emirates','AED','AE','784','Abu Dhabi'),(3,'AF','Afghanistan','AFN','AF','004','Kabul'),(4,'AG','Antigua and Barbuda','XCD','AC','028','St. John\'s'),(5,'AI','Anguilla','XCD','AV','660','The Valley'),(6,'AL','Albania','ALL','AL','008','Tirana'),(7,'AM','Armenia','AMD','AM','051','Yerevan'),(8,'AO','Angola','AOA','AO','024','Luanda'),(9,'AQ','Antarctica','','AY','010',''),(10,'AR','Argentina','ARS','AR','032','Buenos Aires'),(11,'AS','American Samoa','USD','AQ','016','Pago Pago'),(12,'AT','Austria','EUR','AU','040','Vienna'),(13,'AU','Australia','AUD','AS','036','Canberra'),(14,'AW','Aruba','AWG','AA','533','Oranjestad'),(15,'AX','Åland','EUR','','248','Mariehamn'),(16,'AZ','Azerbaijan','AZN','AJ','031','Baku'),(17,'BA','Bosnia and Herzegovina','BAM','BK','070','Sarajevo'),(18,'BB','Barbados','BBD','BB','052','Bridgetown'),(19,'BD','Bangladesh','BDT','BG','050','Dhaka'),(20,'BE','Belgium','EUR','BE','056','Brussels'),(21,'BF','Burkina Faso','XOF','UV','854','Ouagadougou'),(22,'BG','Bulgaria','BGN','BU','100','Sofia'),(23,'BH','Bahrain','BHD','BA','048','Manama'),(24,'BI','Burundi','BIF','BY','108','Bujumbura'),(25,'BJ','Benin','XOF','BN','204','Porto-Novo'),(26,'BL','Saint Barthélemy','EUR','TB','652','Gustavia'),(27,'BM','Bermuda','BMD','BD','060','Hamilton'),(28,'BN','Brunei','BND','BX','096','Bandar Seri Begawan'),(29,'BO','Bolivia','BOB','BL','068','Sucre'),(30,'BQ','Bonaire','USD','','535',''),(31,'BR','Brazil','BRL','BR','076','Brasília'),(32,'BS','Bahamas','BSD','BF','044','Nassau'),(33,'BT','Bhutan','BTN','BT','064','Thimphu'),(34,'BV','Bouvet Island','NOK','BV','074',''),(35,'BW','Botswana','BWP','BC','072','Gaborone'),(36,'BY','Belarus','BYR','BO','112','Minsk'),(37,'BZ','Belize','BZD','BH','084','Belmopan'),(38,'CA','Canada','CAD','CA','124','Ottawa'),(39,'CC','Cocos [Keeling] Islands','AUD','CK','166','West Island'),(40,'CD','Democratic Republic of the Congo','CDF','CG','180','Kinshasa'),(41,'CF','Central African Republic','XAF','CT','140','Bangui'),(42,'CG','Republic of the Congo','XAF','CF','178','Brazzaville'),(43,'CH','Switzerland','CHF','SZ','756','Berne'),(44,'CI','Ivory Coast','XOF','IV','384','Yamoussoukro'),(45,'CK','Cook Islands','NZD','CW','184','Avarua'),(46,'CL','Chile','CLP','CI','152','Santiago'),(47,'CM','Cameroon','XAF','CM','120','Yaoundé'),(48,'CN','China','CNY','CH','156','Beijing'),(49,'CO','Colombia','COP','CO','170','Bogotá'),(50,'CR','Costa Rica','CRC','CS','188','San José'),(51,'CU','Cuba','CUP','CU','192','Havana'),(52,'CV','Cape Verde','CVE','CV','132','Praia'),(53,'CW','Curacao','ANG','UC','531','Willemstad'),(54,'CX','Christmas Island','AUD','KT','162','The Settlement'),(55,'CY','Cyprus','EUR','CY','196','Nicosia'),(56,'CZ','Czechia','CZK','EZ','203','Prague'),(57,'DE','Germany','EUR','GM','276','Berlin'),(58,'DJ','Djibouti','DJF','DJ','262','Djibouti'),(59,'DK','Denmark','DKK','DA','208','Copenhagen'),(60,'DM','Dominica','XCD','DO','212','Roseau'),(61,'DO','Dominican Republic','DOP','DR','214','Santo Domingo'),(62,'DZ','Algeria','DZD','AG','012','Algiers'),(63,'EC','Ecuador','USD','EC','218','Quito'),(64,'EE','Estonia','EUR','EN','233','Tallinn'),(65,'EG','Egypt','EGP','EG','818','Cairo'),(66,'EH','Western Sahara','MAD','WI','732','El Aaiún'),(67,'ER','Eritrea','ERN','ER','232','Asmara'),(68,'ES','Spain','EUR','SP','724','Madrid'),(69,'ET','Ethiopia','ETB','ET','231','Addis Ababa'),(70,'FI','Finland','EUR','FI','246','Helsinki'),(71,'FJ','Fiji','FJD','FJ','242','Suva'),(72,'FK','Falkland Islands','FKP','FK','238','Stanley'),(73,'FM','Micronesia','USD','FM','583','Palikir'),(74,'FO','Faroe Islands','DKK','FO','234','Tórshavn'),(75,'FR','France','EUR','FR','250','Paris'),(76,'GA','Gabon','XAF','GB','266','Libreville'),(77,'GB','United Kingdom','GBP','UK','826','London'),(78,'GD','Grenada','XCD','GJ','308','St. George\'s'),(79,'GE','Georgia','GEL','GG','268','Tbilisi'),(80,'GF','French Guiana','EUR','FG','254','Cayenne'),(81,'GG','Guernsey','GBP','GK','831','St Peter Port'),(82,'GH','Ghana','GHS','GH','288','Accra'),(83,'GI','Gibraltar','GIP','GI','292','Gibraltar'),(84,'GL','Greenland','DKK','GL','304','Nuuk'),(85,'GM','Gambia','GMD','GA','270','Banjul'),(86,'GN','Guinea','GNF','GV','324','Conakry'),(87,'GP','Guadeloupe','EUR','GP','312','Basse-Terre'),(88,'GQ','Equatorial Guinea','XAF','EK','226','Malabo'),(89,'GR','Greece','EUR','GR','300','Athens'),(90,'GS','South Georgia and the South Sandwich Islands','GBP','SX','239','Grytviken'),(91,'GT','Guatemala','GTQ','GT','320','Guatemala City'),(92,'GU','Guam','USD','GQ','316','Hagåtña'),(93,'GW','Guinea-Bissau','XOF','PU','624','Bissau'),(94,'GY','Guyana','GYD','GY','328','Georgetown'),(95,'HK','Hong Kong','HKD','HK','344','Hong Kong'),(96,'HM','Heard Island and McDonald Islands','AUD','HM','334',''),(97,'HN','Honduras','HNL','HO','340','Tegucigalpa'),(98,'HR','Croatia','HRK','HR','191','Zagreb'),(99,'HT','Haiti','HTG','HA','332','Port-au-Prince'),(100,'HU','Hungary','HUF','HU','348','Budapest'),(101,'ID','Indonesia','IDR','ID','360','Jakarta'),(102,'IE','Ireland','EUR','EI','372','Dublin'),(103,'IL','Israel','ILS','IS','376',''),(104,'IM','Isle of Man','GBP','IM','833','Douglas'),(105,'IN','India','INR','IN','356','New Delhi'),(106,'IO','British Indian Ocean Territory','USD','IO','086',''),(107,'IQ','Iraq','IQD','IZ','368','Baghdad'),(108,'IR','Iran','IRR','IR','364','Tehran'),(109,'IS','Iceland','ISK','IC','352','Reykjavik'),(110,'IT','Italy','EUR','IT','380','Rome'),(111,'JE','Jersey','GBP','JE','832','Saint Helier'),(112,'JM','Jamaica','JMD','JM','388','Kingston'),(113,'JO','Jordan','JOD','JO','400','Amman'),(114,'JP','Japan','JPY','JA','392','Tokyo'),(115,'KE','Kenya','KES','KE','404','Nairobi'),(116,'KG','Kyrgyzstan','KGS','KG','417','Bishkek'),(117,'KH','Cambodia','KHR','CB','116','Phnom Penh'),(118,'KI','Kiribati','AUD','KR','296','Tarawa'),(119,'KM','Comoros','KMF','CN','174','Moroni'),(120,'KN','Saint Kitts and Nevis','XCD','SC','659','Basseterre'),(121,'KP','North Korea','KPW','KN','408','Pyongyang'),(122,'KR','South Korea','KRW','KS','410','Seoul'),(123,'KW','Kuwait','KWD','KU','414','Kuwait City'),(124,'KY','Cayman Islands','KYD','CJ','136','George Town'),(125,'KZ','Kazakhstan','KZT','KZ','398','Astana'),(126,'LA','Laos','LAK','LA','418','Vientiane'),(127,'LB','Lebanon','LBP','LE','422','Beirut'),(128,'LC','Saint Lucia','XCD','ST','662','Castries'),(129,'LI','Liechtenstein','CHF','LS','438','Vaduz'),(130,'LK','Sri Lanka','LKR','CE','144','Colombo'),(131,'LR','Liberia','LRD','LI','430','Monrovia'),(132,'LS','Lesotho','LSL','LT','426','Maseru'),(133,'LT','Lithuania','LTL','LH','440','Vilnius'),(134,'LU','Luxembourg','EUR','LU','442','Luxembourg'),(135,'LV','Latvia','LVL','LG','428','Riga'),(136,'LY','Libya','LYD','LY','434','Tripoli'),(137,'MA','Morocco','MAD','MO','504','Rabat'),(138,'MC','Monaco','EUR','MN','492','Monaco'),(139,'MD','Moldova','MDL','MD','498','Chişinău'),(140,'ME','Montenegro','EUR','MJ','499','Podgorica'),(141,'MF','Saint Martin','EUR','RN','663','Marigot'),(142,'MG','Madagascar','MGA','MA','450','Antananarivo'),(143,'MH','Marshall Islands','USD','RM','584','Majuro'),(144,'MK','Macedonia','MKD','MK','807','Skopje'),(145,'ML','Mali','XOF','ML','466','Bamako'),(146,'MM','Myanmar [Burma]','MMK','BM','104','Nay Pyi Taw'),(147,'MN','Mongolia','MNT','MG','496','Ulan Bator'),(148,'MO','Macao','MOP','MC','446','Macao'),(149,'MP','Northern Mariana Islands','USD','CQ','580','Saipan'),(150,'MQ','Martinique','EUR','MB','474','Fort-de-France'),(151,'MR','Mauritania','MRO','MR','478','Nouakchott'),(152,'MS','Montserrat','XCD','MH','500','Plymouth'),(153,'MT','Malta','EUR','MT','470','Valletta'),(154,'MU','Mauritius','MUR','MP','480','Port Louis'),(155,'MV','Maldives','MVR','MV','462','Malé'),(156,'MW','Malawi','MWK','MI','454','Lilongwe'),(157,'MX','Mexico','MXN','MX','484','Mexico City'),(158,'MY','Malaysia','MYR','MY','458','Kuala Lumpur'),(159,'MZ','Mozambique','MZN','MZ','508','Maputo'),(160,'NA','Namibia','NAD','WA','516','Windhoek'),(161,'NC','New Caledonia','XPF','NC','540','Noumea'),(162,'NE','Niger','XOF','NG','562','Niamey'),(163,'NF','Norfolk Island','AUD','NF','574','Kingston'),(164,'NG','Nigeria','NGN','NI','566','Abuja'),(165,'NI','Nicaragua','NIO','NU','558','Managua'),(166,'NL','Netherlands','EUR','NL','528','Amsterdam'),(167,'NO','Norway','NOK','NO','578','Oslo'),(168,'NP','Nepal','NPR','NP','524','Kathmandu'),(169,'NR','Nauru','AUD','NR','520',''),(170,'NU','Niue','NZD','NE','570','Alofi'),(171,'NZ','New Zealand','NZD','NZ','554','Wellington'),(172,'OM','Oman','OMR','MU','512','Muscat'),(173,'PA','Panama','PAB','PM','591','Panama City'),(174,'PE','Peru','PEN','PE','604','Lima'),(175,'PF','French Polynesia','XPF','FP','258','Papeete'),(176,'PG','Papua New Guinea','PGK','PP','598','Port Moresby'),(177,'PH','Philippines','PHP','RP','608','Manila'),(178,'PK','Pakistan','PKR','PK','586','Islamabad'),(179,'PL','Poland','PLN','PL','616','Warsaw'),(180,'PM','Saint Pierre and Miquelon','EUR','SB','666','Saint-Pierre'),(181,'PN','Pitcairn Islands','NZD','PC','612','Adamstown'),(182,'PR','Puerto Rico','USD','RQ','630','San Juan'),(183,'PS','Palestine','ILS','WE','275',''),(184,'PT','Portugal','EUR','PO','620','Lisbon'),(185,'PW','Palau','USD','PS','585','Melekeok - Palau State Capital'),(186,'PY','Paraguay','PYG','PA','600','Asunción'),(187,'QA','Qatar','QAR','QA','634','Doha'),(188,'RE','Réunion','EUR','RE','638','Saint-Denis'),(189,'RO','Romania','RON','RO','642','Bucharest'),(190,'RS','Serbia','RSD','RI','688','Belgrade'),(191,'RU','Russia','RUB','RS','643','Moscow'),(192,'RW','Rwanda','RWF','RW','646','Kigali'),(193,'SA','Saudi Arabia','SAR','SA','682','Riyadh'),(194,'SB','Solomon Islands','SBD','BP','090','Honiara'),(195,'SC','Seychelles','SCR','SE','690','Victoria'),(196,'SD','Sudan','SDG','SU','729','Khartoum'),(197,'SE','Sweden','SEK','SW','752','Stockholm'),(198,'SG','Singapore','SGD','SN','702','Singapore'),(199,'SH','Saint Helena','SHP','SH','654','Jamestown'),(200,'SI','Slovenia','EUR','SI','705','Ljubljana'),(201,'SJ','Svalbard and Jan Mayen','NOK','SV','744','Longyearbyen'),(202,'SK','Slovakia','EUR','LO','703','Bratislava'),(203,'SL','Sierra Leone','SLL','SL','694','Freetown'),(204,'SM','San Marino','EUR','SM','674','San Marino'),(205,'SN','Senegal','XOF','SG','686','Dakar'),(206,'SO','Somalia','SOS','SO','706','Mogadishu'),(207,'SR','Suriname','SRD','NS','740','Paramaribo'),(208,'SS','South Sudan','SSP','OD','728','Juba'),(209,'ST','São Tomé and Príncipe','STD','TP','678','São Tomé'),(210,'SV','El Salvador','USD','ES','222','San Salvador'),(211,'SX','Sint Maarten','ANG','NN','534','Philipsburg'),(212,'SY','Syria','SYP','SY','760','Damascus'),(213,'SZ','Swaziland','SZL','WZ','748','Mbabane'),(214,'TC','Turks and Caicos Islands','USD','TK','796','Cockburn Town'),(215,'TD','Chad','XAF','CD','148','N\'Djamena'),(216,'TF','French Southern Territories','EUR','FS','260','Port-aux-Français'),(217,'TG','Togo','XOF','TO','768','Lomé'),(218,'TH','Thailand','THB','TH','764','Bangkok'),(219,'TJ','Tajikistan','TJS','TI','762','Dushanbe'),(220,'TK','Tokelau','NZD','TL','772',''),(221,'TL','East Timor','USD','TT','626','Dili'),(222,'TL','East Timor','USD','TT','626','Dili'),(223,'TM','Turkmenistan','TMT','TX','795','Ashgabat'),(224,'TN','Tunisia','TND','TS','788','Tunis'),(225,'TO','Tonga','TOP','TN','776','Nuku\'alofa'),(226,'TR','Turkey','TRY','TU','792','Ankara'),(227,'TT','Trinidad and Tobago','TTD','TD','780','Port of Spain'),(228,'TV','Tuvalu','AUD','TV','798','Funafuti'),(229,'TW','Taiwan','TWD','TW','158','Taipei'),(230,'TZ','Tanzania','TZS','TZ','834','Dodoma'),(231,'UA','Ukraine','UAH','UP','804','Kyiv'),(232,'UG','Uganda','UGX','UG','800','Kampala'),(233,'UM','U.S. Minor Outlying Islands','USD','','581',''),(234,'US','United States','USD','US','840','Washington'),(235,'UY','Uruguay','UYU','UY','858','Montevideo'),(236,'UZ','Uzbekistan','UZS','UZ','860','Tashkent'),(237,'VA','Vatican City','EUR','VT','336','Vatican'),(238,'VC','Saint Vincent and the Grenadines','XCD','VC','670','Kingstown'),(239,'VE','Venezuela','VEF','VE','862','Caracas'),(240,'VG','British Virgin Islands','USD','VI','092','Road Town'),(241,'VI','U.S. Virgin Islands','USD','VQ','850','Charlotte Amalie'),(242,'VN','Vietnam','VND','VM','704','Hanoi'),(243,'VU','Vanuatu','VUV','NH','548','Port Vila'),(244,'WF','Wallis and Futuna','XPF','WF','876','Mata-Utu'),(245,'WS','Samoa','WST','WS','882','Apia'),(246,'XK','Kosovo','EUR','KV','0','Pristina'),(247,'YE','Yemen','YER','YM','887','Sanaa'),(248,'YT','Mayotte','EUR','MF','175','Mamoutzou'),(249,'ZA','South Africa','ZAR','SF','710','Pretoria'),(250,'ZM','Zambia','ZMK','ZA','894','Lusaka'),(251,'ZW','Zimbabwe','ZWL','ZI','716','Harare');

/*Table structure for table `employee` */

DROP TABLE IF EXISTS `employee`;

CREATE TABLE `employee` (
  `employee_ID` int(10) NOT NULL AUTO_INCREMENT,
  `employee_hexaID` char(30) DEFAULT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  `employee_email` varchar(255) DEFAULT NULL,
  `employee_password` varchar(255) DEFAULT NULL,
  `employee_access` tinyint(1) DEFAULT '1',
  `employee_photo` varchar(255) DEFAULT NULL,
  `employee_startworking` date DEFAULT NULL,
  `employee_endworking` date DEFAULT NULL,
  `employee_badge` varchar(11) DEFAULT NULL,
  `employee_positionID` char(36) DEFAULT NULL,
  `employee_divisionID` char(36) DEFAULT NULL,
  `employee_status` varchar(255) DEFAULT NULL,
  `employee_mobilephone` char(30) DEFAULT NULL,
  `employee_phone` char(30) DEFAULT NULL,
  `employee_managerID` char(30) DEFAULT NULL,
  `employee_worklocationID` char(30) DEFAULT NULL,
  `employee_address` varchar(255) DEFAULT NULL,
  `employee_SSN` char(30) DEFAULT NULL,
  `employee_passport_no` char(50) DEFAULT NULL,
  `employee_gender` char(6) DEFAULT NULL,
  `employee_blood` char(2) DEFAULT NULL,
  `employee_religion` varchar(30) DEFAULT NULL,
  `employee_maritalstat` varchar(30) DEFAULT NULL,
  `employee_countryID` char(30) DEFAULT NULL,
  `employee_dob` date DEFAULT NULL,
  `employee_notes` varchar(255) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `employee_datecreate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`employee_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=133 DEFAULT CHARSET=latin1;

/*Data for the table `employee` */

insert  into `employee`(`employee_ID`,`employee_hexaID`,`employee_name`,`employee_email`,`employee_password`,`employee_access`,`employee_photo`,`employee_startworking`,`employee_endworking`,`employee_badge`,`employee_positionID`,`employee_divisionID`,`employee_status`,`employee_mobilephone`,`employee_phone`,`employee_managerID`,`employee_worklocationID`,`employee_address`,`employee_SSN`,`employee_passport_no`,`employee_gender`,`employee_blood`,`employee_religion`,`employee_maritalstat`,`employee_countryID`,`employee_dob`,`employee_notes`,`deleted`,`employee_datecreate`) values (1,'1','Nurjamilah','anakpisces@gmail.com','7884fc6616d2e1c408a298a75eb159d4',1,'./upload/employee_image/nurjamilah.jpg','2012-12-12',NULL,'ADR-100119',NULL,NULL,'new',NULL,'085271129400',NULL,NULL,'Jl. Bukit Barisan Perum Cendana I blok c2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'0000-00-00 00:00:00'),(132,'40521937-bd37-5c61-af0b-d06d2e','ferniawan','ferniawan@ratan.co',NULL,1,'./upload/employee_photo/43a37644-1dc9-5e29-8c58-11c1ed6ad9c0/43a37644-1dc9-5e29-8c58-11c1ed6ad9c0.jpg',NULL,NULL,'0991','Programmer','IT',NULL,'082387873400','082387873400','PP','asd','Jl. asd','','','Male','A','Single','Single','1','0000-00-00','',0,'2013-12-26 20:32:54'),(131,'7966a515-0cab-5ea1-91dd-f17826','asd','ASD@sfd.j',NULL,1,'./upload/employee_photo/fe493f10-dee4-56bc-9aa5-83567c954fef/fe493f10-dee4-56bc-9aa5-83567c954fef.jpg',NULL,NULL,'','','',NULL,'','','','','','','','Male','A','Single','Single','1','0000-00-00','',0,'2013-12-26 20:03:44');

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `menu_ID` int(10) NOT NULL AUTO_INCREMENT,
  `menu_hexaID` char(30) DEFAULT NULL,
  `menu_name` varchar(30) DEFAULT NULL,
  `menu_desc` varchar(128) DEFAULT NULL,
  `menu_url` varchar(128) DEFAULT NULL,
  `menu_class` varchar(128) DEFAULT NULL,
  `menu_icon` varchar(128) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`menu_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `menu` */

insert  into `menu`(`menu_ID`,`menu_hexaID`,`menu_name`,`menu_desc`,`menu_url`,`menu_class`,`menu_icon`,`deleted`) values (1,'1','Project','Project','project','magenta','icon-bar-chart',0),(2,'2','Purchase','Purchase','purchase','green','icon-shopping-cart',0),(3,'3','Finance','Finance','finance','dark-yellow','icon-money',0),(4,'4','HRD','HRD','hrd','blue-violate','icon-money',0),(5,'5','CRM','CRM','crm','blue','icon-briefcase',0),(6,'6','POS','POS','pos','dark-yellow','icon-truck',0),(7,'7','Warehouse','Warehouse','warehouse','green','icon-hdd',0),(8,'8','Manufacture','Manufacture','manufacture','orange','icon-wrench',0),(9,'9','Payroll','Payroll','payroll','green','icon-credit-card',0),(10,'10','Asset','Asset','Asset','blue','icon-list-alt',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
