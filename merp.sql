/*
SQLyog Ultimate v8.61 
MySQL - 5.6.16 : Database - merp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`merp` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `merp`;

/*Table structure for table `access` */

DROP TABLE IF EXISTS `access`;

CREATE TABLE `access` (
  `access_ID` char(36) NOT NULL,
  `employee_ID` char(36) CHARACTER SET latin1 DEFAULT NULL,
  `menu_ID` char(36) CHARACTER SET latin1 DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`access_ID`),
  KEY `FK_access` (`employee_ID`),
  KEY `FK_access_menu` (`menu_ID`),
  CONSTRAINT `FK_access` FOREIGN KEY (`employee_ID`) REFERENCES `employee` (`employee_ID`) ON UPDATE CASCADE,
  CONSTRAINT `FK_access_menu` FOREIGN KEY (`menu_ID`) REFERENCES `menu` (`menu_ID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `access` */

insert  into `access`(`access_ID`,`employee_ID`,`menu_ID`,`deleted`) values ('1','1','1',0),('10','1','10',0),('2','1','2',0),('3','1','3',0),('4','1','4',0),('5','1','5',0),('6','1','6',0),('7','1','7',0),('8','1','8',0),('9','1','9',0);

/*Table structure for table `allowance` */

DROP TABLE IF EXISTS `allowance`;

CREATE TABLE `allowance` (
  `allowance_ID` char(36) NOT NULL,
  `allowance_name` varchar(100) DEFAULT NULL,
  `allowance_desc` blob,
  `deduction_stat` tinyint(1) DEFAULT '0',
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`allowance_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `allowance` */

insert  into `allowance`(`allowance_ID`,`allowance_name`,`allowance_desc`,`deduction_stat`,`dateCreated`,`deleted`) values ('1','Tunjangan Jabatan','jabatan per divisiasd',1,'2015-02-19 15:46:05',1),('16f09338-3920-562f-adaa-38e51eee3949','Function','Function',0,'2015-02-21 22:09:01',0),('2','JHT','Jaminan hari tua',1,'2015-02-19 15:47:04',1),('4a09116b-ab36-533d-b66e-4c0a0ceabbaa','Incentive','Incentive',0,'2015-02-21 22:10:22',0),('4f1c1f88-01fc-5a35-bf7c-280dfa5390d3','PPH 21 Tax','PPH 21 Tax',1,'2015-02-21 22:12:08',1),('5668ce29-78ab-577c-9144-53f80cb248d2','Field Force','Field Force',0,'2015-02-21 22:09:10',0),('5f7c78f5-dd2b-5081-b74c-9bcbb4afe871','Family','Family',0,'2015-02-21 22:07:45',0),('8c61474d-4f80-5513-80f0-44188834aaf0','Transport','Transport',0,'2015-02-21 22:09:49',0),('9a340ad8-56f6-5485-bd54-480e44908c3d','JHT ','JHT ',1,'2015-02-21 22:11:39',0),('a8a16bf9-111a-5e9c-8987-f04597f50eac','Bonus','Bonus',0,'2015-02-21 22:09:28',0),('bd3bd644-39e4-588c-a628-02816c8843ef','THR Bonus','THR Bonus',0,'2015-02-21 22:10:32',0),('c4edfb26-e6ca-532c-869a-46f5ffc75e00','Tunjangan Transport','Tunjangan Transport',1,'2015-02-19 16:58:49',1),('cce42531-2ae2-5698-9fa8-87f4eb30eb58','Tunjangan makan','Tunjangan makan',0,'2015-02-19 16:57:07',1),('cfb99cf4-806e-5825-b0eb-ae0a3e48be26','Hutang Koperasi','Hutang Koperasi',1,'2015-02-21 12:17:04',1),('e24fd00a-8203-5bc4-8327-21e9f863ede1','BPJS','BPJS',1,'2015-02-21 22:11:51',0),('e8ce4218-e134-5995-9520-089163a0ea2e','Jamsostek Ketenagakerjaan','Jamsostek Ketenagakerjaan',1,'2015-02-21 12:15:55',1),('f5cf0abb-e039-514c-a164-e8cae812ae66','Additional','Additional',0,'2015-02-21 22:09:20',0),('fc169480-481e-5dcc-9a6c-2dbe0aff8eb5','Meal','Meal',0,'2015-02-21 22:10:07',0);

/*Table structure for table `allowance_map` */

DROP TABLE IF EXISTS `allowance_map`;

CREATE TABLE `allowance_map` (
  `allowance_mapID` char(36) NOT NULL,
  `allowance_ID` char(36) DEFAULT NULL,
  `employee_ID` char(36) DEFAULT NULL,
  `ammount` double(12,2) DEFAULT '0.00',
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`allowance_mapID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `allowance_map` */

/*Table structure for table `applicant` */

DROP TABLE IF EXISTS `applicant`;

CREATE TABLE `applicant` (
  `applicant_ID` char(36) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `applicant_name` varchar(255) DEFAULT NULL,
  `job_ID` char(36) DEFAULT NULL,
  `department_ID` char(36) DEFAULT NULL,
  `stage` enum('Initial Qualification','Fisrt Interview','Second Interview','Contract Porposed','Refused') DEFAULT NULL,
  `responsible_ID` char(36) DEFAULT NULL COMMENT 'employee_ID',
  `date_closed` date DEFAULT NULL,
  `partner_ID` char(36) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `expectation_salary` double(12,2) DEFAULT '0.00',
  `degree` enum('Graduate','Bachelor Degree','Master Degree','Doctoral Degree') DEFAULT NULL,
  `appreciation` enum('Not Good','On Avarage','Good','Very Good','Excelent') DEFAULT NULL,
  `notes` blob,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`applicant_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `applicant` */

insert  into `applicant`(`applicant_ID`,`subject`,`applicant_name`,`job_ID`,`department_ID`,`stage`,`responsible_ID`,`date_closed`,`partner_ID`,`phone`,`mobile`,`email`,`expectation_salary`,`degree`,`appreciation`,`notes`,`dateCreated`,`deleted`) values ('','a','m','22607a3a-d3ce-56ec-b69e-8538824076c3','8d874ebe-500d-5cae-a4c3-25725be2c51f','Fisrt Interview','7da87597-705f-5b1e-b85b-16495f','1970-01-07','as','asd','asd','asd',0.00,'Graduate','Not Good','','2015-04-18 00:44:25',0),('699c8ba4-2bbe-5df5-baff-a67b96ae5a9a','lamaranPR','Lamaran Penting asd','89c05cad-bd90-5e5b-a1aa-eab3f2c79cc1','8d874ebe-500d-5cae-a4c3-25725be2c51f','Initial Qualification','7da87597-705f-5b1e-b85b-16495f','2015-01-01','asd','0218898777','081277676','gambir@gmail.com',500000.00,'Bachelor Degree','On Avarage','asd','2015-03-07 11:12:40',0),('82b53647-878a-5b07-a48c-a867dff744a3','asd','asd','89c05cad-bd90-5e5b-a1aa-eab3f2c79cc1','8d874ebe-500d-5cae-a4c3-25725be2c51f','Initial Qualification','','2015-03-07','asd','asd','asd','asd',0.00,'Graduate','Not Good','asd','2015-03-07 11:10:57',0);

/*Table structure for table `appraisal` */

DROP TABLE IF EXISTS `appraisal`;

CREATE TABLE `appraisal` (
  `appraisal_ID` char(36) DEFAULT NULL,
  `employee_ID` char(36) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `proggress` int(3) DEFAULT NULL,
  `apreciation` int(5) DEFAULT NULL,
  `datecreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) DEFAULT '0',
  `state` varchar(100) DEFAULT NULL,
  `plan_ID` char(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `appraisal` */

insert  into `appraisal`(`appraisal_ID`,`employee_ID`,`deadline`,`proggress`,`apreciation`,`datecreated`,`deleted`,`state`,`plan_ID`) values ('1','1','2014-11-11',10,80,'2014-11-02 08:08:24',0,'1','1'),('1','1','2014-11-11',10,80,'2014-11-02 08:08:24',0,'1','1'),('1','1','2014-11-11',10,80,'2014-11-02 08:08:24',0,'1','1'),('1','1','2014-11-11',10,80,'2014-11-02 08:08:24',0,'1','1'),('1','1','2014-11-11',10,80,'2014-11-02 08:08:24',0,'1','1'),('1','1','2014-11-11',10,80,'2014-11-02 08:08:24',0,'1','1');

/*Table structure for table `arrearage` */

DROP TABLE IF EXISTS `arrearage`;

CREATE TABLE `arrearage` (
  `arrearage_ID` char(36) NOT NULL,
  `arrearage_name` varchar(255) DEFAULT NULL,
  `ammount` double(12,2) DEFAULT '0.00',
  `rate` double(6,2) DEFAULT '0.00',
  `periode` int(6) DEFAULT '0',
  `periode_rest` int(6) DEFAULT '0',
  `installment` double(12,2) DEFAULT '0.00',
  `employee_ID` char(36) DEFAULT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`arrearage_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `arrearage` */

/*Table structure for table `arrearage_detail` */

DROP TABLE IF EXISTS `arrearage_detail`;

CREATE TABLE `arrearage_detail` (
  `arrearage_detailID` char(36) NOT NULL,
  `arrearage_ID` char(36) DEFAULT NULL,
  `ammount_paid` double(12,2) DEFAULT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`arrearage_detailID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `arrearage_detail` */

/*Table structure for table `asset` */

DROP TABLE IF EXISTS `asset`;

CREATE TABLE `asset` (
  `asset_ID` char(36) NOT NULL,
  `asset_name` varchar(255) DEFAULT NULL,
  `asset_stateID` char(36) DEFAULT NULL,
  `asset_groupID` char(36) DEFAULT NULL,
  `product_ID` char(36) DEFAULT NULL,
  `department_ID` char(36) DEFAULT NULL,
  `employee_ID` char(36) DEFAULT NULL COMMENT 'user',
  `note` blob,
  `location` varchar(255) DEFAULT NULL,
  `asset_code` char(36) DEFAULT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`asset_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `asset` */

insert  into `asset`(`asset_ID`,`asset_name`,`asset_stateID`,`asset_groupID`,`product_ID`,`department_ID`,`employee_ID`,`note`,`location`,`asset_code`,`dateCreated`,`deleted`) values ('01205ea7-6460-5df2-bf98-d09e18e16ef0','vacum dempo','1','19047e9b-cdd6-5f67-89c0-6ec90984f768','df6f1ed3-0d00-52cd-bcd1-5847329fcaa1','962260f3-0808-51d4-b735-103c98926370','1','','cipadu','AN00002','2015-06-13 12:10:01',0),('5b708439-6582-557d-95a1-61f1f8e2bdfc','asdas',NULL,NULL,'0e7586f5-e0c6-57b8-be1e-1f7e777a76fb','962260f3-0808-51d4-b735-103c98926370','93f21b72-b9fa-5651-8fdb-dba188',NULL,'asd','asd','2015-05-02 23:28:41',1),('899007e7-9931-5932-b788-72af82c7db31','asd',NULL,NULL,'0c075d73-97f3-5486-9d90-93c4a88f39f1','962260f3-0808-51d4-b735-103c98926370','7da87597-705f-5b1e-b85b-16495f',NULL,'asd','asd','2015-05-02 23:28:04',1),('9ec814b1-fdef-5a6a-9ae4-1309374e8d5c','Gunting kecil','1','19047e9b-cdd6-5f67-89c0-6ec90984f768','8ec21214-f427-57b5-b25d-dacfd4ac75f3','962260f3-0808-51d4-b735-103c98926370','1','','Cipadu','AN00001','2015-05-23 09:39:38',0),('a744c43b-4369-5150-9bd0-8702a4083d90','qwe','1','1','0c075d73-97f3-5486-9d90-93c4a88f39f1','962260f3-0808-51d4-b735-103c98926370','7da87597-705f-5b1e-b85b-16495f','asdasd','qwe','qwe','2015-05-02 23:51:37',1),('b274a503-ccd2-56c6-88c5-deb490942105','qwe123','cf4976f7-e5f4-5643-912d-c41b6ac15841','b9e66b54-0fb4-5aa7-a931-0dff3a5cb7ca','0e7586f5-e0c6-57b8-be1e-1f7e777a76fb','8d874ebe-500d-5cae-a4c3-25725be2c51f','7da87597-705f-5b1e-b85b-16495f','asd','asd','asdqwe','2015-05-02 23:54:51',1);

/*Table structure for table `asset_group` */

DROP TABLE IF EXISTS `asset_group`;

CREATE TABLE `asset_group` (
  `asset_groupID` char(36) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`asset_groupID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `asset_group` */

insert  into `asset_group`(`asset_groupID`,`group_name`,`description`,`dateCreated`,`deleted`) values ('0573a3e7-bc55-532f-8f09-0e5fba87fbf8','asd','asd','2015-05-03 20:47:49',1),('0c49494d-2cc8-5517-809f-a10788b4f7ad','asdasd','asdasd','2015-05-03 20:36:38',1),('0eee1850-6fc2-5fb9-a2d3-3612ce2aee9f','asdqweasd','asdasd','2015-05-21 22:17:07',1),('1','IT Asset','seluruh perlengkapan IT kantor','2015-04-28 23:11:44',0),('19047e9b-cdd6-5f67-89c0-6ec90984f768','Peralatan konveksi','seluruh peralatan yang digunakan untuk konveksi','2015-05-21 22:09:38',0),('2a6b14d7-e98b-5f1e-b106-aad7663aea73','1','1','2015-05-03 20:54:29',1),('3712d7e5-2fa1-5bfa-88fa-3e46508c7e33','fds','fds','2015-05-03 20:03:16',1),('3d4fd37e-f7ef-5292-819a-5d321913c3e4','qwe','qwe','2015-05-03 09:15:16',1),('47b15e71-3c46-5467-bc07-23003f385074','2','2','2015-05-03 20:54:37',1),('4c160972-8fec-5de7-9cb1-e5ab32ca2c76','asdqweasd','asd','2015-05-21 22:15:21',1),('6de53730-5288-5bf8-97af-6921f3d93b27','123','123','2015-05-03 20:00:21',1),('8093b1ba-82ba-5581-a910-7cef0d97c8c4','Peralatan konveksi','seluruh peralatan yang digunakan untuk konveksi','2015-05-21 22:09:40',1),('834787f2-adc5-51b4-a9ae-00afb9623375','zzz','zzz','2015-05-03 20:48:03',1),('8df0d09b-56de-52ab-afe1-4d2ad6c345d5','asdqweasd','asd','2015-05-21 22:16:02',1),('9c1c9500-039a-5ebb-bc9c-9546440e88a0','Motor survei','motor survei','2015-05-02 19:01:40',1),('adcd02dc-58d8-5c82-8e7f-dd5e4fbf75e0','z','z','2015-05-03 20:49:08',1),('b9e66b54-0fb4-5aa7-a931-0dff3a5cb7ca','ATK Asset','ATK asset kantor','2015-05-02 22:05:27',1),('be829e57-c15e-5384-bc16-ed6b3a233617','qwer','qwer','2015-05-03 20:35:58',1),('c005ff09-a6a9-5fdc-8bf2-d5122cb98a27','asdf','asdf','2015-05-03 20:00:40',1),('e65ad561-6327-5e50-9bf3-3da0b40eea98','qwe','qwe','2015-05-03 19:58:03',1),('ed9351a8-8a8f-5744-a604-e051a6f56ef1','asdqwe','asdqwe','2015-05-03 20:37:34',1),('efe1fb27-f825-5331-9fba-91a62595c11f','','','2015-05-03 20:00:13',1),('fe7af598-642f-57a0-a423-264bbe2f8b26','qweqwe','qweqwe','2015-05-03 20:36:18',1);

/*Table structure for table `asset_state` */

DROP TABLE IF EXISTS `asset_state`;

CREATE TABLE `asset_state` (
  `asset_stateID` char(36) NOT NULL,
  `state_name` varchar(255) DEFAULT NULL,
  `description` blob,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`asset_stateID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `asset_state` */

insert  into `asset_state`(`asset_stateID`,`state_name`,`description`,`dateCreated`,`deleted`) values ('1','In Use','In Use','2015-05-02 19:52:43',0),('2e328df4-3846-517f-9636-043749cc4fa1','Expired','Expired','2015-05-02 22:07:37',0),('6c13fce5-ea14-5fd9-803d-d913f812f8e5','In Store','In Store','2015-05-02 20:02:03',0),('74660393-ef56-5bed-9682-8e53c28a6615','asd','asd','2015-05-03 21:04:42',1),('a0f5c122-439b-5cd5-8160-bc9d21bb961e','Disposed','Disposed','2015-05-02 22:07:46',0),('cf4976f7-e5f4-5643-912d-c41b6ac15841','In Repair','In Repair','2015-05-02 22:07:28',0);

/*Table structure for table `attendance` */

DROP TABLE IF EXISTS `attendance`;

CREATE TABLE `attendance` (
  `attendance_ID` char(36) CHARACTER SET latin1 NOT NULL,
  `employee_badge` varchar(36) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `signin` datetime DEFAULT NULL,
  `signout` datetime DEFAULT NULL,
  `overtime` double(4,2) DEFAULT '0.00',
  `late` double(4,2) DEFAULT '0.00',
  `goback_early` double(4,2) DEFAULT '0.00',
  `dateCreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`attendance_ID`),
  KEY `FK_attendance` (`employee_badge`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `attendance` */

insert  into `attendance`(`attendance_ID`,`employee_badge`,`date`,`status`,`signin`,`signout`,`overtime`,`late`,`goback_early`,`dateCreated`,`deleted`) values ('0fdc66c7-fe11-54d1-b0fc-7cc082ee86fd','ASR-00001','2015-02-19','masuk','2015-02-19 07:59:59','2015-02-19 16:59:59',1.00,0.00,0.00,'2015-02-28 23:49:59',0),('17bb64a1-beff-582b-ae47-e54c988ba056','ASR-00001','2015-02-16','masuk','2015-02-16 07:59:59','2015-02-16 16:59:59',1.00,0.00,0.00,'2015-02-28 23:49:59',0),('19af74b7-70c4-54ef-969f-907749edb386','ASR-00001','2015-02-12','masuk','2015-02-12 07:59:59','2015-02-12 16:59:59',1.00,0.00,0.00,'2015-02-28 23:49:59',0),('1c572c4f-4c8e-56cd-97dd-a0ffc000b2d9','ASR-00001','2015-02-01','masuk','2015-02-01 07:59:59','2015-02-01 16:59:59',1.00,0.10,0.10,'2015-02-28 23:49:59',0),('260ea853-4681-50d7-9704-34d58be9e8cc','ASR-00001','2015-02-09','masuk','2015-02-09 07:59:59','2015-02-09 16:59:59',1.00,0.00,0.00,'2015-02-28 23:49:59',0),('36540f8b-197e-5d95-9ef3-c2af6f9d1231','ASR-00001','2015-02-25','masuk','2015-02-25 07:59:59','2015-02-25 16:59:59',1.00,0.00,0.00,'2015-02-28 23:49:59',0),('570eeee3-7b76-5df7-8571-a1ba7b61d4b8','ASR-00001','2015-02-08','masuk','2015-02-08 07:59:59','2015-02-08 16:59:59',1.00,0.00,0.00,'2015-02-28 23:49:59',0),('5e432e13-f0da-52c6-9f59-7d2e3116eb0f','ASR-00001','2015-02-02','masuk','2015-02-02 07:59:59','2015-02-02 16:59:59',1.00,0.10,0.10,'2015-02-28 23:49:59',0),('604c3503-094f-54c2-83c9-7e1492f94547','ASR-00001','2015-02-23','masuk','2015-02-23 07:59:59','2015-02-23 16:59:59',1.00,0.00,0.00,'2015-02-28 23:49:59',0),('60d5e649-d943-5f78-b079-25ac685293f7','ASR-00001','2015-02-20','masuk','2015-02-20 07:59:59','2015-02-20 16:59:59',1.00,0.00,0.00,'2015-02-28 23:49:59',0),('63707c70-3fee-5f5d-ab4f-23caa41b89d9','ASR-00001','2015-02-07','masuk','2015-02-07 07:59:59','2015-02-07 16:59:59',1.00,0.00,0.00,'2015-02-28 23:49:59',0),('647a126a-cfda-5b64-9efe-3495b87a0a7f','ASR-00001','2015-02-15','masuk','2015-02-15 07:59:59','2015-02-15 16:59:59',1.00,0.00,0.00,'2015-02-28 23:49:59',0),('65a67a19-e1c4-5a7e-8d62-9cf36fabc206','ASR-00001','2015-02-06','masuk','2015-02-06 07:59:59','2015-02-06 16:59:59',1.00,0.00,0.00,'2015-02-28 23:49:59',0),('6f7c20bc-30e7-5dcb-af28-bab56aa42fc6','ASR-00001','2015-02-24','masuk','2015-02-24 07:59:59','2015-02-24 16:59:59',1.00,0.00,0.00,'2015-02-28 23:49:59',0),('76495090-8f48-50dc-ab2c-2880ed57ad70','ASR-00001','2015-02-05','masuk','2015-02-05 07:59:59','2015-02-05 16:59:59',1.00,0.00,0.00,'2015-02-28 23:49:59',0),('803cb50f-28e7-5861-a379-4350d0d3fd2a','ASR-00001','2015-02-17','masuk','2015-02-17 07:59:59','2015-02-17 16:59:59',1.00,0.00,0.00,'2015-02-28 23:49:59',0),('9d0b641e-e45e-5e1d-a5fe-fd682a6d7051','ASR-00001','2015-02-04','masuk','2015-02-04 07:59:59','2015-02-04 16:59:59',1.00,0.00,0.00,'2015-02-28 23:49:59',0),('9dd6c6bc-f9e5-5645-ade4-a7bf6cc8dad0','ASR-00001','2015-02-27','masuk','2015-02-27 07:59:59','2015-02-27 16:59:59',1.00,0.00,0.00,'2015-02-28 23:49:59',0),('a00c1491-d286-5515-b16a-bb88a3cdcb2e','ASR-00001','2015-02-14','masuk','2015-02-14 07:59:59','2015-02-14 16:59:59',1.00,0.00,0.00,'2015-02-28 23:49:59',0),('a20d472a-63b2-5f6d-87ba-fe1f861e5268','ASR-00001','2015-02-21','masuk','2015-02-21 07:59:59','2015-02-21 16:59:59',1.00,0.00,0.00,'2015-02-28 23:49:59',0),('a6b4f5e3-b5f3-573a-a78c-b57f5a757403','ASR-00001','2015-02-26','tidak','2015-02-26 07:59:59','2015-02-26 16:59:59',1.00,0.00,0.00,'2015-02-28 23:49:59',0),('b4e73446-a970-5e3c-87f4-de09a33ccfd8','ASR-00001','2015-02-28','tidak','0000-00-00 00:00:00','0000-00-00 00:00:00',0.00,0.00,0.00,'2015-02-28 23:49:59',0),('c8128b07-314c-5650-96fe-75d40310d067','ASR-00001','2015-02-18','masuk','2015-02-18 07:59:59','2015-02-18 16:59:59',1.00,0.00,0.00,'2015-02-28 23:49:59',0),('ce4af87a-a8ff-532f-98c1-1bd6fb58ea04','ASR-00001','2015-02-13','masuk','2015-02-13 07:59:59','2015-02-13 16:59:59',1.00,0.00,0.00,'2015-02-28 23:49:59',0),('d0534133-945d-5a5e-867d-4b76c50f5e9e','ASR-00001','2015-02-03','masuk','2015-02-03 07:59:59','2015-02-03 16:59:59',1.00,0.10,0.10,'2015-02-28 23:49:59',0),('dffd401a-26c7-5a51-b847-2fadb156ccd7','ASR-00001','2015-02-10','masuk','2015-02-10 07:59:59','2015-02-10 16:59:59',1.00,0.00,0.00,'2015-02-28 23:49:59',0),('e5335921-d227-5a3b-bcf2-34806482533a','ASR-00001','2015-02-22','masuk','2015-02-22 07:59:59','2015-02-22 16:59:59',1.00,0.00,0.00,'2015-02-28 23:49:59',0),('f7fe26ac-f73e-5b90-85a5-9acc8d167837','ASR-00001','2015-02-11','masuk','2015-02-11 07:59:59','2015-02-11 16:59:59',1.00,0.00,0.00,'2015-02-28 23:49:59',0);

/*Table structure for table `billing` */

DROP TABLE IF EXISTS `billing`;

CREATE TABLE `billing` (
  `billing_ID` char(36) NOT NULL,
  `billing_name` varchar(100) DEFAULT NULL,
  `address` blob,
  `postcode` varchar(10) DEFAULT NULL,
  `state_ID` char(36) DEFAULT NULL,
  `city_ID` char(36) DEFAULT NULL,
  `country_ID` char(36) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`billing_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `billing` */

insert  into `billing`(`billing_ID`,`billing_name`,`address`,`postcode`,`state_ID`,`city_ID`,`country_ID`,`deleted`,`dateCreated`) values ('1','asd1','sdasd1','12345',NULL,NULL,NULL,0,'2015-05-24 19:20:05');

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

insert  into `ci_sessions`(`session_id`,`ip_address`,`user_agent`,`last_activity`,`user_data`,`date_created`,`online`) values ('3e5a52155ccc175d5ea4838bc8a2876d','::1','Mozilla/5.0 (Windows NT 6.2; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0',1438516386,'a:44:{s:9:\"user_data\";s:0:\"\";s:11:\"employee_ID\";s:1:\"1\";s:14:\"employee_catID\";s:36:\"8c6f87b1-43fa-58f8-a78e-7079206da22e\";s:13:\"employee_name\";s:10:\"Nurjamilah\";s:20:\"employee_dateofbirth\";s:10:\"1989-01-13\";s:21:\"employee_placeofbirth\";s:10:\"Tembilahan\";s:14:\"employee_email\";s:17:\"milla@anasher.com\";s:17:\"employee_password\";s:32:\"7884fc6616d2e1c408a298a75eb159d4\";s:15:\"employee_access\";s:1:\"1\";s:14:\"employee_photo\";s:101:\"./upload/employee_photo/9d9457d1-e0fd-527e-8f16-9274f82dae68/9d9457d1-e0fd-527e-8f16-9274f82dae68.jpg\";s:21:\"employee_startworking\";s:19:\"2012-12-12 00:00:00\";s:19:\"employee_endworking\";N;s:18:\"employee_badge_int\";s:1:\"1\";s:14:\"employee_badge\";s:9:\"ASR-00001\";s:15:\"employee_salary\";s:8:\"15500.00\";s:11:\"currency_ID\";s:36:\"e4b5cbe5-aaad-12e2-8eb1-24155d6a1ec9\";s:10:\"company_ID\";s:36:\"bf088a55-8d09-5780-b3df-20bbf121532e\";s:15:\"company_groupID\";s:36:\"v1540375-0afa-5dd2-b33f-f1fabd54c009\";s:6:\"job_ID\";s:36:\"0df1f426-6f9a-5064-8485-4f51009677d7\";s:15:\"employee_status\";s:3:\"new\";s:20:\"employee_mobilephone\";s:12:\"085271129400\";s:14:\"employee_phone\";s:10:\" 021334455\";s:10:\"manager_ID\";s:1:\"1\";s:23:\"employee_worklocationID\";s:12:\"Jakarta Raya\";s:16:\"employee_address\";s:41:\"Jl. Bukit Barisan Perum Cendana I blok c2\";s:30:\"employee_tax_obligation_number\";s:0:\"\";s:12:\"employee_SSN\";s:0:\"\";s:20:\"employee_passport_no\";s:0:\"\";s:15:\"employee_gender\";s:6:\"Female\";s:14:\"employee_blood\";s:1:\"B\";s:17:\"employee_religion\";s:5:\"Islam\";s:20:\"employee_maritalstat\";s:7:\"Married\";s:18:\"employee_countryID\";s:3:\"101\";s:12:\"employee_dob\";N;s:14:\"employee_notes\";s:9:\"CEO Owner\";s:7:\"deleted\";s:1:\"0\";s:11:\"datecreated\";s:19:\"0000-00-00 00:00:00\";s:13:\"department_ID\";s:36:\"773d2127-4ed1-5ecf-b764-6a63cc8aeadb\";s:12:\"company_name\";s:19:\"PT. Anasher Textile\";s:18:\"default_currencyID\";s:36:\"b4b5bbf5-eead-11e2-8db1-00155d6a1ec9\";s:7:\"company\";a:4:{i:0;a:15:{s:10:\"company_ID\";s:36:\"bf088a55-8d09-5780-b3df-20bbf121532e\";s:15:\"company_groupID\";s:36:\"v1540375-0afa-5dd2-b33f-f1fabd54c009\";s:12:\"company_name\";s:19:\"PT. Anasher Textile\";s:7:\"address\";s:14:\"Jl. Kebangsaan\";s:10:\"found_year\";s:4:\"2014\";s:5:\"badge\";s:4:\"ASR-\";s:9:\"badge_inc\";s:1:\"1\";s:18:\"badge_leadingzeros\";s:1:\"5\";s:7:\"website\";s:15:\"www.anasher.com\";s:11:\"employee_ID\";s:1:\"1\";s:5:\"phone\";s:9:\"021887788\";s:18:\"default_currencyID\";s:36:\"b4b5bbf5-eead-11e2-8db1-00155d6a1ec9\";s:12:\"company_logo\";N;s:10:\"dateCreate\";s:19:\"2015-01-03 20:06:48\";s:7:\"deleted\";s:1:\"0\";}i:1;a:15:{s:10:\"company_ID\";s:36:\"v1540375-0afa-5dd2-b33f-f1fabd54c009\";s:15:\"company_groupID\";s:36:\"v1540375-0afa-5dd2-b33f-f1fabd54c009\";s:12:\"company_name\";s:28:\"PT. Ratan Software Indonesia\";s:7:\"address\";s:24:\"Jl. Muchtarudin pav 13 A\";s:10:\"found_year\";s:4:\"2014\";s:5:\"badge\";s:4:\"RTN-\";s:9:\"badge_inc\";s:1:\"1\";s:18:\"badge_leadingzeros\";s:1:\"5\";s:7:\"website\";s:15:\"http://ratan.co\";s:11:\"employee_ID\";s:30:\"7da87597-705f-5b1e-b85b-16495f\";s:5:\"phone\";s:10:\"0218877898\";s:18:\"default_currencyID\";s:36:\"u4b5cbe5-eead-11e2-8db1-22155d6a1ec9\";s:12:\"company_logo\";N;s:10:\"dateCreate\";s:19:\"2015-01-03 10:24:00\";s:7:\"deleted\";s:1:\"0\";}i:2;a:15:{s:10:\"company_ID\";s:36:\"0c75a4ac-b7fb-5004-a6cd-214320fbb21b\";s:15:\"company_groupID\";s:36:\"v1540375-0afa-5dd2-b33f-f1fabd54c009\";s:12:\"company_name\";s:15:\"PT. WINS Global\";s:7:\"address\";s:50:\"Jl. Iskandarsyah Raya Gd. Graha Iskandarsyah lt 8 \";s:10:\"found_year\";s:4:\"2012\";s:5:\"badge\";s:4:\"WNS-\";s:9:\"badge_inc\";s:1:\"1\";s:18:\"badge_leadingzeros\";s:1:\"4\";s:7:\"website\";s:18:\"www.winsglobal.com\";s:11:\"employee_ID\";s:30:\"122ab75e-7f18-5818-861d-fc86db\";s:5:\"phone\";s:11:\"0217205886 \";s:18:\"default_currencyID\";s:36:\"b4b5bbf5-eead-11e2-8db1-00155d6a1ec9\";s:12:\"company_logo\";N;s:10:\"dateCreate\";s:19:\"2015-04-01 21:12:10\";s:7:\"deleted\";s:1:\"0\";}i:3;a:15:{s:10:\"company_ID\";s:36:\"a89c6a97-b7b5-5acc-b446-d3f075c1a00b\";s:15:\"company_groupID\";s:36:\"v1540375-0afa-5dd2-b33f-f1fabd54c009\";s:12:\"company_name\";s:7:\"PT. Yui\";s:7:\"address\";s:13:\"Jl. Sudirman \";s:10:\"found_year\";s:4:\"2014\";s:5:\"badge\";s:4:\"YUI-\";s:9:\"badge_inc\";s:1:\"1\";s:18:\"badge_leadingzeros\";s:1:\"6\";s:7:\"website\";s:11:\"www.yui.com\";s:11:\"employee_ID\";s:30:\"7da87597-705f-5b1e-b85b-16495f\";s:5:\"phone\";s:4:\"0213\";s:18:\"default_currencyID\";s:36:\"b4b5bbf5-eead-11e2-8db1-00155d6a1ec9\";s:12:\"company_logo\";N;s:10:\"dateCreate\";s:19:\"2015-01-03 19:15:00\";s:7:\"deleted\";s:1:\"0\";}}s:17:\"current_companyID\";s:36:\"bf088a55-8d09-5780-b3df-20bbf121532e\";s:22:\"current_companygroupID\";s:36:\"v1540375-0afa-5dd2-b33f-f1fabd54c009\";s:19:\"current_companyName\";s:19:\"PT. Anasher Textile\";}','2015-08-02 17:09:50',1);

/*Table structure for table `city` */

DROP TABLE IF EXISTS `city`;

CREATE TABLE `city` (
  `city_ID` char(36) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `state_ID` char(36) NOT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`city_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `city` */

insert  into `city`(`city_ID`,`city_name`,`state_ID`,`deleted`) values ('1','BANDA ACEH','1',0),('10','KAB. ACEH SELATAN','1',0),('100','CILACAP','9',0),('101','KAB. KEBUMEN','9',0),('102','KAB. WONOSOBO','9',0),('103','KAB. PURWOREJO','9',0),('104','KAB. TEMANGGUNG','9',0),('105','KOTA MAGELANG','9',0),('106','KAB. MAGELANG','9',0),('107','SURAKARTA','9',0),('108','KAB. BOYOLALI','9',0),('109','KAB. KARANGANYAR','9',0),('11','KOTA SABANG','1',0),('110','KLATEN','9',0),('111','KAB. KLATEN','9',0),('112','KAB. SRAGEN','9',0),('113','KAB. SUKOHARJO','9',0),('114','KAB. WONOGIRI','9',0),('115','KAB. SEMARANG','9',0),('116','KAB. JEPARA','9',0),('117','KAB. KUDUS','9',0),('118','KOTA PEKALONGAN','9',0),('119','PURWOKERTO','9',0),('12','KAB. ACEH SINGKIL','1',0),('120','KAB. BANYUMAS','9',0),('121','KAB BATANG','9',0),('122','KAB. BLORA','9',0),('123','KAB. BREBES','9',0),('124','KAB. DEMAK','9',0),('125','KAB. KENDAL','9',0),('126','KAB. PATI','9',0),('127','KAB. PEMALANG','9',0),('128','KAB. GROBOGAN','9',0),('129','KAB. REMBANG','9',0),('13','KAB. ACEH TAMIANG','1',0),('130','KOTA SALATIGA','9',0),('131','KAB. TEGAL','9',0),('132','TEGAL','9',0),('133','KAB. PURBALINGGA','9',0),('134','KAB. BANJARNEGARA','9',0),('135','KAB. PEKALONGAN','9',0),('136','SURABAYA','10',0),('137','JEMBER','10',0),('138','KAB. BANYUWANGI','10',0),('139','KAB. BONDOWOSO','10',0),('14','KAB. ACEH TIMUR','1',0),('140','KAB. KEDIRI','10',0),('141','KOTA MADIUN','10',0),('142','KAB. MADIUN','10',0),('143','KAB. MAGETAN','10',0),('144','KAB. NGAWI','10',0),('145','KAB. PACITAN','10',0),('146','KAB. PONOROGO','10',0),('147','MOJOKERTO','10',0),('148','KAB. MOJOKERTO','10',0),('149','BLITAR','10',0),('15','KAB. ACEH UTARA','1',0),('150','BATU','10',0),('151','KOTA MALANG','10',0),('152','KAB. MALANG','10',0),('153','PROBOLINGGO','10',0),('154','KAB. LUMAJANG','10',0),('155','KAB. SITUBONDO','10',0),('156','KAB. PASURUAN','10',0),('157','PASURUAN','10',0),('158','KAB. BOJONEGORO','10',0),('159','KAB. GRESIK','10',0),('16','KAB. BENER MERIAH','1',0),('160','KAB. LAMONGAN','10',0),('161','KAB. BANGKALAN','10',0),('162','KAB. JOMBANG','10',0),('163','KAB. NGANJUK','10',0),('164','KAB. PAMEKASAN','10',0),('165','KAB. SAMPANG','10',0),('166','KAB. SIDOARJO','10',0),('167','KAB. SUMENEP','10',0),('168','KAB. TUBAN','10',0),('169','KAB. TULUNGAGUNG','10',0),('17','KAB. GAYOLUES','1',0),('170','KAB. TRENGGALEK','10',0),('171','PONTIANAK','11',0),('172','KAB PONTIANAK','11',0),('173','KAB. KETAPANG','11',0),('174','KAB. SANGGAU','11',0),('175','SINGKAWANG','11',0),('176','KAB. SINTANG','11',0),('177','KAB. KAPUAS HULU','11',0),('178','BENGKAYANG','11',0),('179','KAB. LANDAK','11',0),('18','KAB. NAGAN RAYA','1',0),('180','KAB. MELAWI','11',0),('181','KAB. SAMBAS','11',0),('182','SEKADAU','11',0),('183','KAB. KUBU RAYA','11',0),('184','KAB. KAYONG UTARA','11',0),('185','BANJARMASIN','12',0),('186','KAB. HULU SUNGAI TNGH','12',0),('187','KAB. HULU SUNGAI SLTN','12',0),('188','KAB. KOTABARU','12',0),('189','KAB. TABALONG','12',0),('19','KAB. PIDIE JAYA','1',0),('190','BANJARBARU','12',0),('191','AMUNTAI','12',0),('192','KAB. BARITO KUALA','12',0),('193','KAB. BANJAR','12',0),('194','KAB. TANAH LAUT','12',0),('195','KAB. TAPIN','12',0),('196','KAB BALANGAN','12',0),('197','BATULICIN','12',0),('198','PALANGKA RAYA','13',0),('199','KAB. BARITO UTARA','13',0),('2','KOTA LANGSA','1',0),('20','KAB. SIMEULUE','1',0),('200','KAB. BARITO TIMUR','13',0),('201','KAB. MURUNG RAYA','13',0),('202','BUNTOK','13',0),('203','BARITO SELATAN','13',0),('204','KAB. KATINGAN','13',0),('205','KAB. KAPUAS','13',0),('206','KAB. GUNUNG MAS','13',0),('207','KAB. SERUYAN','13',0),('208','KAB. KOTAWARINGIN BARAT','13',0),('209','KAB. KOTAWARINGIN TIMUR','13',0),('21','SUBULUSSALAM','1',0),('210','KAB. LAMANDAU','13',0),('211','KAB. PULANG PISAU','13',0),('212','KAB. SUKAMARA','13',0),('213','BALIKPAPAN','14',0),('214','KAB. PASER','14',0),('215','KAB. BERAU','14',0),('216','KAB. PENAJAM PASER UTARA','14',0),('217','BONTANG','14',0),('218','KAB. KUTAI TIMUR','14',0),('219','KOTA SAMARINDA','14',0),('22','KOTA LHOKSEUMAWE','1',0),('220','KAB. KUTAI KARTANEGARA','14',0),('221','SENDAWAR','14',0),('222','KAB. KUTAI BARAT','14',0),('223','TARAKAN','15',0),('224','KAB. BULUNGAN','15',0),('225','KAB. MALINAU','15',0),('226','KAB. NUNUKAN','15',0),('227','KAB. TANA TIDUNG','15',0),('228','PANGKAL PINANG','16',0),('229','KAB. BANGKA','16',0),('23','BLANGPIDIE','1',0),('230','KAB. BANGKA BARAT','16',0),('231','KAB. BANGKA TENGAH','16',0),('232','KAB. BANGKA SELATAN','16',0),('233','KAB. BELITUNG','16',0),('234','KAB. BELITUNG TIMUR','16',0),('235','TANJUNG PINANG','17',0),('236','BATAM','17',0),('237','RANAI','17',0),('238','KAB. NATUNA','17',0),('239','KAB. KARIMUN','17',0),('24','KAB. ACEH JAYA','1',0),('240','KAB. BINTAN','17',0),('241','BANDAR LAMPUNG','18',0),('242','KAB. LAMPUNG SELATAN','18',0),('243','KOTABUMI','18',0),('244','KAB. LAMPUNG UTARA','18',0),('245','KOTA METRO','18',0),('246','METRO','18',0),('247','KOTA LIWA','18',0),('248','KAB. LAMPUNG BARAT','18',0),('249','KAB. LAMPUNG TNGH','18',0),('25','DENPASAR','2',0),('250','SUKADANA','18',0),('251','KAB. LAMPUNG TIMUR','18',0),('252','KAB. WAY KANAN','18',0),('253','KAB. TULANG BAWANG','18',0),('254','KAB. TANGGAMUS','18',0),('255','KAB. PESAWARAN','18',0),('256','TERNATE','19',0),('257','KAB. HALMAHERA SELATAN','19',0),('258','TIDORE','19',0),('259','KAB. HALMAHERA TENGAH','19',0),('26','AMLAPURA','2',0),('260','KAB. HALMAHERA TIMUR','19',0),('261','KAB. HALMAHERA UTARA','19',0),('262','KAB. KEPULAUAN SULA','19',0),('263','AMBON','20',0),('264','JAILOLO','20',0),('265','KAB. MALUKU TENGAH','20',0),('266','TUAL','20',0),('267','KAB. BURU','20',0),('268','KAB. KEPULAUAN ARU','20',0),('269','KAB. SERAM BAHAGIAN BARAT','20',0),('27','KAB. BANGLI','2',0),('270','DATARAN HUNIMOA','20',0),('271','KAB. MALUKU TENGGARA','20',0),('272','MATARAM','21',0),('273','BIMA','21',0),('274','KAB. DOMPU','21',0),('275','KAB. LOMBOK TENGAH','21',0),('276','KAB. LOMBOK TIMUR','21',0),('277','KAB. SUMBAWA','21',0),('278','KAB.LOMBOK BARAT','21',0),('279','TALIWANG','21',0),('28','GIANYAR','2',0),('280','KAB. SUMBAWA BARAT','21',0),('281','KAB. BIMA','21',0),('282','KUPANG','22',0),('283','KAB. SUMBA TENGAH','22',0),('284','KAB. BELU','22',0),('285','KALABAHI','22',0),('286','KAB. ALOR','22',0),('287','KAB. TIMOR TGH UTARA','22',0),('288','KAB. FLORES TIMUR','22',0),('289','KAB. SIKKA','22',0),('29','KAB. JEMBRANA','2',0),('290','KAB. MANGGARAI','22',0),('291','KAB. TIMOR TENGAH SELATAN','22',0),('292','KAB. ENDE','22',0),('293','BAJAWA','22',0),('294','KAB. NGADA','22',0),('295','KAB. SUMBA TIMUR','22',0),('296','WAIKABUBAK','22',0),('297','KAB. MANGGARAI BARAT','22',0),('298','KAB. MANGGARAI TIMUR','22',0),('299','KAB. NAGEKEO','22',0),('3','KAB. ACEH BESAR','1',0),('30','KAB. KLUNGKUNG','2',0),('300','BAA','22',0),('301','KAB. SUMBA BARAT DAYA','22',0),('302','KAB. LEMBATA','22',0),('303','KAB. KUPANG','22',0),('304','JAYAPURA','23',0),('305','BIAK','23',0),('306','KAB. MERAUKE','23',0),('307','KAB. KEPULAUAN YAPEN','23',0),('308','KAB. JAYAWIJAYA','23',0),('309','KAB.ASMAT','23',0),('31','KAB. BULELENG','2',0),('310','KAB. BOVEN DIGOEL','23',0),('311','KAB KEEROM','23',0),('312','ENAROTARI','23',0),('313','KAB. PEGUNUNGAN BINTANG','23',0),('314','KAB. SARMI','23',0),('315','KAB. SUPIORI','23',0),('316','KAB. TOLIKORA','23',0),('317','BOTAWA','23',0),('318','KAB. YAHUKIMO','23',0),('319','BURMESO','23',0),('32','KAB. TABANAN','2',0),('320','KAB. NABIRE','23',0),('321','KAB. DOGIYAI','23',0),('322','KAB. PANIAI','23',0),('323','KAB. PUNCAK JAYA','23',0),('324','MAPPI','23',0),('325','KAB. INTAN JAYA','23',0),('326','KAB. DEIYAI','23',0),('327','KAB. TIMIKA','23',0),('328','KAB. SORONG','24',0),('329','FAK-FAK','24',0),('33','KAB. BADUNG/KUTA','2',0),('330','KAB. KAIMANA','24',0),('331','KAB. RAJA AMPAT','24',0),('332','KAB. SORONG SELATAN','24',0),('333','KAB. TELUK BINTUNI','24',0),('334','KAB. TELUK WINDAMA','24',0),('335','KAB. MANOKWARI','24',0),('336','PEKANBARU','25',0),('337','DAIK','25',0),('338','KOTA DUMAI','25',0),('339','KAB. KAMPAR','25',0),('34','CILEGON','3',0),('340','KAB. BENGKALIS','25',0),('341','KAB. INDRAGIRI HULU','25',0),('342','KAB. INDRAGIRI HILIR','25',0),('343','BAGANSIAPIAPI','25',0),('344','KAB ROKAN HILIR','25',0),('345','KAB. KUANTAN SINGINGI','25',0),('346','KAB. PELALAWAN','25',0),('347','KAB. ROKAN HULU','25',0),('348','KAB. SIAK','25',0),('349','KAB. MERANTI','25',0),('35','KAB. PANDEGLANG','3',0),('350','KAB. MAMUJU','26',0),('351','KAB. MAJENE','26',0),('352','KAB. POLEWALI MANDAR','26',0),('353','KAB. MAMASA','26',0),('354','KAB. MAMUJU UTARA','26',0),('355','MAKASAR','27',0),('356','KAB.BANTAENG','27',0),('357','KAB. BARRU','27',0),('358','BULUKUMBA','27',0),('359','KAB. ENREKANG','27',0),('36','KAB. LEBAK','3',0),('360','KAB. JENEPONTO','27',0),('361','KAB. TANA TORAJA','27',0),('362','KAB. TANA TORAJA UTARA/RANTEPAO','27',0),('363','KAB. MAROS','27',0),('364','PALOPO','27',0),('365','KAB. PINRANG','27',0),('366','KAB. SIDENRENG','27',0),('367','KAB. WAJO','27',0),('368','KAB. SINJAI','27',0),('369','KAB. GOWA','27',0),('37','SERANG','3',0),('370','KAB. TAKALAR','27',0),('371','KAB. BONE','27',0),('372','KAB. SOPPENG','27',0),('373','KAB.SELAYAR','27',0),('374','KAB. PANGKAJENE DAN KEPULAUAN','27',0),('375','PARE-PARE','27',0),('376','KAB. LUWU','27',0),('377','KAB. LUWU TIMUR','27',0),('378','KAB. LUWU UTARA','27',0),('379','PALU','28',0),('38','KAB.SERANG','3',0),('380','KAB. BANGGAI','28',0),('381','KAB. POSO','28',0),('382','KAB. TOLITOLI','28',0),('383','KAB. BANGGAI KEPULAUAN','28',0),('384','KAB. BUOL','28',0),('385','KAB. DONGGALA','28',0),('386','KAB. MOROWALI','28',0),('387','KAB. PARIGI MOUTONG','28',0),('388','AMPANA','28',0),('389','KENDARI','29',0),('39','TANGERANG','3',0),('390','BAU-BAU','29',0),('391','KAB. KOLAKA','29',0),('392','KAB. MUNA','29',0),('393','RAHA','29',0),('394','KAB. BOMBANA','29',0),('395','KAB. BUTON','29',0),('396','KAB. KOLAKA UTARA','29',0),('397','KAB. KONAWE','29',0),('398','KAB. WAKATOBI','29',0),('399','MANADO','30',0),('4','BIREUEN','1',0),('40','KAB. TANGERANG','3',0),('400','KAB. BOLAANG MONGONDOW','30',0),('401','KAB. KEPULAUAN SANGIHE','30',0),('402','TONDANO','30',0),('403','KAB. MINAHASA','30',0),('404','BITUNG','30',0),('405','KAB. BOLAANG MONGONDOW UTARA','30',0),('406','KAB. KEP TALAUD','30',0),('407','AIRMADIDI','30',0),('408','KAB. MINAHASA UTARA','30',0),('409','AMURANG','30',0),('41','BENGKULU','4',0),('410','KAB. MINAHASA SELATAN','30',0),('411','KAB. MINAHASA TENGGARA','30',0),('412','TOMOHON','30',0),('413','PADANG','31',0),('414','BATUSANGKAR','31',0),('415','BUKITTINGGI','31',0),('416','KAB. PASAMAN','31',0),('417','KAB. PESISIR SELATAN','31',0),('418','KAB. PADANG PARIAMAN','31',0),('419','KOTA PAYAKUMBUH','31',0),('42','KAB. BENGKULU UTARA','4',0),('420','SAWAHLUNTOH','31',0),('421','KOTA SOLOK','31',0),('422','KOTA PADANG PANJANG','31',0),('423','KAB.DHARMASRAYA','31',0),('424','KAB. LIMA PULUH KOTA','31',0),('425','KAB. KEPULAUAN MENTAWAI','31',0),('426','KAB. PASAMAN BARAT','31',0),('427','AROSUKA','31',0),('428','KAB. SOLOK','31',0),('429','KAB. SOLOK SELATAN','31',0),('43','CURUP','4',0),('430','KAB. SIJUNJUNG','31',0),('431','KAB. AGAM','31',0),('432','PALEMBANG','32',0),('433','KAB. MUSI RAWAS','32',0),('434','BATURAJA','32',0),('435','KAB. OGAN KOMERING','32',0),('436','KAB. LAHAT','32',0),('437','KAB. MUARA ENIM','32',0),('438','PAGAR ALAM','32',0),('439','PRABUMULIH','32',0),('44','KAB. REJANG LEBONG','4',0),('440','KAB. MUSI BANYUASIN','32',0),('441','KAB. BANYUASIN','32',0),('442','KAB. EMPAT LAWANG','32',0),('443','KAB. OGAN ILIR','32',0),('444','KAB. OGAN KOMERINULU TIMUR','32',0),('445','KAB. OGAN KOMERING ULU SELATAN','32',0),('446','KOTA LUBUK LINGGAU','32',0),('447','MEDAN','33',0),('448','KAB. ASAHAN/KISARAN','33',0),('449','KAB. TAPANULI TENGAH','33',0),('45','KAB. BENGKULU SELATAN','4',0),('450','KAB. DAIRI','33',0),('451','KAB. DELI SERDANG','33',0),('452','BALIGE','33',0),('453','KAB. TOBA SAMOSIR','33',0),('454','KOTA BINJAI','33',0),('455','KAB.NIAS','33',0),('456','KOTA PADANG SIDEMPUAN','33',0),('457','KAB. SIMALUNGUN','33',0),('458','KAB. LABUHAN BATU','33',0),('459','KAB. KARO','33',0),('46','KAB. KAUR','4',0),('460','KAB. LANGKAT','33',0),('461','KAB. TAPANULI UTARA','33',0),('462','KOTA TEBING TINGGI ','33',0),('463','KAB. PADANG LAWAS UTARA','33',0),('464','KAB. BATU BARA','33',0),('465','KAB. HUMBANG','33',0),('466','KAB. MANDAILING NATAL','33',0),('467','KAB. NIAS SELATAN','33',0),('468','KAB. PADANG LAWAS','33',0),('469','KAB. PAKPAK BARAT','33',0),('47','KAB. KEPAHIANG','4',0),('470','KAB. SAMOSIR','33',0),('471','KAB. SERDANG BEDAGAI','33',0),('472','KAB. TAPANULI SELATAN','33',0),('473','TANJUNG BALAI','33',0),('474','PEMATANGSIANTAR','33',0),('475','KOTA YOGYAKARTA','34',0),('476','KAB.BANTUL','34',0),('477','KAB. SLEMAN','34',0),('478','KAB. KULON PROGO','34',0),('479','KAB. GUNUNG KIDUL','34',0),('48','KAB. LEBONG','4',0),('49','KAB. MUKO-MUKO','4',0),('5','KAB. ACEH TENGGARA','1',0),('50','KAB. SELUMA','4',0),('51','GORONTALO','5',0),('52','KAB. GORONTALO','5',0),('53','KAB. BOALEMO','5',0),('54','KAB. BONE BOLANGO','5',0),('55','KAB. GORONTALO UTARA','5',0),('56','KAB. PAHUWATO','5',0),('57','JAKARTA BARAT','6',0),('58','JAKARTA SELATAN','6',0),('59','JAKARTA PUSAT','6',0),('6','MEULABOH','1',0),('60','JAKARTA UTARA','6',0),('61','JAKARTA TIMUR','6',0),('62','KEPULAUAN SERIBU','6',0),('63','JAMBI','7',0),('64','KAB. TANJUNG JABUNG BARAT','7',0),('65','KAB.MERANGIN','7',0),('66','KAB. BATANG HARI','7',0),('67','KAB. BUNGO','7',0),('68','SUNGAIPENUH','7',0),('69','KAB. KERINCI','7',0),('7','KAB. ACEH BARAT','1',0),('70','KAB. MUARO JAMBI','7',0),('71','KAB. SAROLANGUN','7',0),('72','KAB. TANJUNG JABUNG TIMUR','7',0),('73','KAB. TEBO','7',0),('74','BANDUNG','8',0),('75','KAB. BANDUNG','8',0),('76','CIMAHI','8',0),('77','KAB. SUMEDANG','8',0),('78','BANJAR','8',0),('79','KAB. CIAMIS','8',0),('8','KAB. PIDIE','1',0),('80','TASIKMALAYA','8',0),('81','KAB. TASIKMALAYA','8',0),('82','KAB.GARUT','8',0),('83','KAB. PURWAKARTA','8',0),('84','KAB. BANDUNG BARAT','8',0),('85','KAB. SUBANG','8',0),('86','BEKASI','8',0),('87','KAB. BEKASI','8',0),('88','BOGOR','8',0),('89','KAB. BOGOR','8',0),('9','KAB. ACEH TENGAH','1',0),('90','KAB. INDRAMAYU','8',0),('91','KAB. KUNINGAN','8',0),('92','KAB. MAJALENGKA','8',0),('93','CIREBON','8',0),('94','KAB. CIREBON','8',0),('95','DEPOK','8',0),('96','KAB. KARAWANG','8',0),('97','SUKABUMI','8',0),('98','KAB. CIANJUR','8',0),('99','SEMARANG','9',0);

/*Table structure for table `company` */

DROP TABLE IF EXISTS `company`;

CREATE TABLE `company` (
  `company_ID` char(36) CHARACTER SET latin1 NOT NULL,
  `company_groupID` char(36) DEFAULT NULL,
  `company_name` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `found_year` year(4) DEFAULT NULL,
  `badge` varchar(100) DEFAULT NULL,
  `badge_inc` int(7) DEFAULT NULL,
  `badge_leadingzeros` int(7) DEFAULT '5',
  `website` varchar(100) DEFAULT NULL,
  `employee_ID` char(36) DEFAULT NULL COMMENT 'owner',
  `phone` varchar(50) DEFAULT NULL,
  `default_currencyID` char(36) DEFAULT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
  `dateCreate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`company_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `company` */

insert  into `company`(`company_ID`,`company_groupID`,`company_name`,`address`,`found_year`,`badge`,`badge_inc`,`badge_leadingzeros`,`website`,`employee_ID`,`phone`,`default_currencyID`,`company_logo`,`dateCreate`,`deleted`) values ('0c75a4ac-b7fb-5004-a6cd-214320fbb21b','v1540375-0afa-5dd2-b33f-f1fabd54c009','PT. WINS Global','Jl. Iskandarsyah Raya Gd. Graha Iskandarsyah lt 8 ',2012,'WNS-',1,4,'www.winsglobal.com','122ab75e-7f18-5818-861d-fc86db','0217205886 ','b4b5bbf5-eead-11e2-8db1-00155d6a1ec9',NULL,'2015-04-01 21:12:10',0),('a89c6a97-b7b5-5acc-b446-d3f075c1a00b','v1540375-0afa-5dd2-b33f-f1fabd54c009','PT. Yui','Jl. Sudirman ',2014,'YUI-',1,6,'www.yui.com','7da87597-705f-5b1e-b85b-16495f','0213','b4b5bbf5-eead-11e2-8db1-00155d6a1ec9',NULL,'2015-01-03 19:15:00',0),('bf088a55-8d09-5780-b3df-20bbf121532e','v1540375-0afa-5dd2-b33f-f1fabd54c009','PT. Anasher Textile','Jl. Kebangsaan',2014,'ASR-',1,5,'www.anasher.com','1','021887788','b4b5bbf5-eead-11e2-8db1-00155d6a1ec9',NULL,'2015-01-03 20:06:48',0),('v1540375-0afa-5dd2-b33f-f1fabd54c009','v1540375-0afa-5dd2-b33f-f1fabd54c009','PT. Ratan Software Indonesia','Jl. Muchtarudin pav 13 A',2014,'RTN-',1,5,'http://ratan.co','7da87597-705f-5b1e-b85b-16495f','0218877898','u4b5cbe5-eead-11e2-8db1-22155d6a1ec9',NULL,'2015-01-03 10:24:00',0);

/*Table structure for table `countries` */

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
  `idCountry` char(36) NOT NULL,
  `countryCode` char(2) NOT NULL DEFAULT '',
  `countryName` varchar(45) NOT NULL DEFAULT '',
  `currencyCode` char(3) DEFAULT NULL,
  `fipsCode` char(2) DEFAULT NULL,
  `isoNumeric` char(4) DEFAULT NULL,
  `capital` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idCountry`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `countries` */

insert  into `countries`(`idCountry`,`countryCode`,`countryName`,`currencyCode`,`fipsCode`,`isoNumeric`,`capital`) values ('1','AD','Andorra','EUR','AN','020','Andorra la Vella'),('10','AR','Argentina','ARS','AR','032','Buenos Aires'),('100','HU','Hungary','HUF','HU','348','Budapest'),('101','ID','Indonesia','IDR','ID','360','Jakarta'),('102','IE','Ireland','EUR','EI','372','Dublin'),('103','IL','Israel','ILS','IS','376',''),('104','IM','Isle of Man','GBP','IM','833','Douglas'),('105','IN','India','INR','IN','356','New Delhi'),('106','IO','British Indian Ocean Territory','USD','IO','086',''),('107','IQ','Iraq','IQD','IZ','368','Baghdad'),('108','IR','Iran','IRR','IR','364','Tehran'),('109','IS','Iceland','ISK','IC','352','Reykjavik'),('11','AS','American Samoa','USD','AQ','016','Pago Pago'),('110','IT','Italy','EUR','IT','380','Rome'),('111','JE','Jersey','GBP','JE','832','Saint Helier'),('112','JM','Jamaica','JMD','JM','388','Kingston'),('113','JO','Jordan','JOD','JO','400','Amman'),('114','JP','Japan','JPY','JA','392','Tokyo'),('115','KE','Kenya','KES','KE','404','Nairobi'),('116','KG','Kyrgyzstan','KGS','KG','417','Bishkek'),('117','KH','Cambodia','KHR','CB','116','Phnom Penh'),('118','KI','Kiribati','AUD','KR','296','Tarawa'),('119','KM','Comoros','KMF','CN','174','Moroni'),('12','AT','Austria','EUR','AU','040','Vienna'),('120','KN','Saint Kitts and Nevis','XCD','SC','659','Basseterre'),('121','KP','North Korea','KPW','KN','408','Pyongyang'),('122','KR','South Korea','KRW','KS','410','Seoul'),('123','KW','Kuwait','KWD','KU','414','Kuwait City'),('124','KY','Cayman Islands','KYD','CJ','136','George Town'),('125','KZ','Kazakhstan','KZT','KZ','398','Astana'),('126','LA','Laos','LAK','LA','418','Vientiane'),('127','LB','Lebanon','LBP','LE','422','Beirut'),('128','LC','Saint Lucia','XCD','ST','662','Castries'),('129','LI','Liechtenstein','CHF','LS','438','Vaduz'),('13','AU','Australia','AUD','AS','036','Canberra'),('130','LK','Sri Lanka','LKR','CE','144','Colombo'),('131','LR','Liberia','LRD','LI','430','Monrovia'),('132','LS','Lesotho','LSL','LT','426','Maseru'),('133','LT','Lithuania','LTL','LH','440','Vilnius'),('134','LU','Luxembourg','EUR','LU','442','Luxembourg'),('135','LV','Latvia','LVL','LG','428','Riga'),('136','LY','Libya','LYD','LY','434','Tripoli'),('137','MA','Morocco','MAD','MO','504','Rabat'),('138','MC','Monaco','EUR','MN','492','Monaco'),('139','MD','Moldova','MDL','MD','498','Chişinău'),('14','AW','Aruba','AWG','AA','533','Oranjestad'),('140','ME','Montenegro','EUR','MJ','499','Podgorica'),('141','MF','Saint Martin','EUR','RN','663','Marigot'),('142','MG','Madagascar','MGA','MA','450','Antananarivo'),('143','MH','Marshall Islands','USD','RM','584','Majuro'),('144','MK','Macedonia','MKD','MK','807','Skopje'),('145','ML','Mali','XOF','ML','466','Bamako'),('146','MM','Myanmar [Burma]','MMK','BM','104','Nay Pyi Taw'),('147','MN','Mongolia','MNT','MG','496','Ulan Bator'),('148','MO','Macao','MOP','MC','446','Macao'),('149','MP','Northern Mariana Islands','USD','CQ','580','Saipan'),('15','AX','Åland','EUR','','248','Mariehamn'),('150','MQ','Martinique','EUR','MB','474','Fort-de-France'),('151','MR','Mauritania','MRO','MR','478','Nouakchott'),('152','MS','Montserrat','XCD','MH','500','Plymouth'),('153','MT','Malta','EUR','MT','470','Valletta'),('154','MU','Mauritius','MUR','MP','480','Port Louis'),('155','MV','Maldives','MVR','MV','462','Malé'),('156','MW','Malawi','MWK','MI','454','Lilongwe'),('157','MX','Mexico','MXN','MX','484','Mexico City'),('158','MY','Malaysia','MYR','MY','458','Kuala Lumpur'),('159','MZ','Mozambique','MZN','MZ','508','Maputo'),('16','AZ','Azerbaijan','AZN','AJ','031','Baku'),('160','NA','Namibia','NAD','WA','516','Windhoek'),('161','NC','New Caledonia','XPF','NC','540','Noumea'),('162','NE','Niger','XOF','NG','562','Niamey'),('163','NF','Norfolk Island','AUD','NF','574','Kingston'),('164','NG','Nigeria','NGN','NI','566','Abuja'),('165','NI','Nicaragua','NIO','NU','558','Managua'),('166','NL','Netherlands','EUR','NL','528','Amsterdam'),('167','NO','Norway','NOK','NO','578','Oslo'),('168','NP','Nepal','NPR','NP','524','Kathmandu'),('169','NR','Nauru','AUD','NR','520',''),('17','BA','Bosnia and Herzegovina','BAM','BK','070','Sarajevo'),('170','NU','Niue','NZD','NE','570','Alofi'),('171','NZ','New Zealand','NZD','NZ','554','Wellington'),('172','OM','Oman','OMR','MU','512','Muscat'),('173','PA','Panama','PAB','PM','591','Panama City'),('174','PE','Peru','PEN','PE','604','Lima'),('175','PF','French Polynesia','XPF','FP','258','Papeete'),('176','PG','Papua New Guinea','PGK','PP','598','Port Moresby'),('177','PH','Philippines','PHP','RP','608','Manila'),('178','PK','Pakistan','PKR','PK','586','Islamabad'),('179','PL','Poland','PLN','PL','616','Warsaw'),('18','BB','Barbados','BBD','BB','052','Bridgetown'),('180','PM','Saint Pierre and Miquelon','EUR','SB','666','Saint-Pierre'),('181','PN','Pitcairn Islands','NZD','PC','612','Adamstown'),('182','PR','Puerto Rico','USD','RQ','630','San Juan'),('183','PS','Palestine','ILS','WE','275',''),('184','PT','Portugal','EUR','PO','620','Lisbon'),('185','PW','Palau','USD','PS','585','Melekeok - Palau State Capital'),('186','PY','Paraguay','PYG','PA','600','Asunción'),('187','QA','Qatar','QAR','QA','634','Doha'),('188','RE','Réunion','EUR','RE','638','Saint-Denis'),('189','RO','Romania','RON','RO','642','Bucharest'),('19','BD','Bangladesh','BDT','BG','050','Dhaka'),('190','RS','Serbia','RSD','RI','688','Belgrade'),('191','RU','Russia','RUB','RS','643','Moscow'),('192','RW','Rwanda','RWF','RW','646','Kigali'),('193','SA','Saudi Arabia','SAR','SA','682','Riyadh'),('194','SB','Solomon Islands','SBD','BP','090','Honiara'),('195','SC','Seychelles','SCR','SE','690','Victoria'),('196','SD','Sudan','SDG','SU','729','Khartoum'),('197','SE','Sweden','SEK','SW','752','Stockholm'),('198','SG','Singapore','SGD','SN','702','Singapore'),('199','SH','Saint Helena','SHP','SH','654','Jamestown'),('2','AE','United Arab Emirates','AED','AE','784','Abu Dhabi'),('20','BE','Belgium','EUR','BE','056','Brussels'),('200','SI','Slovenia','EUR','SI','705','Ljubljana'),('201','SJ','Svalbard and Jan Mayen','NOK','SV','744','Longyearbyen'),('202','SK','Slovakia','EUR','LO','703','Bratislava'),('203','SL','Sierra Leone','SLL','SL','694','Freetown'),('204','SM','San Marino','EUR','SM','674','San Marino'),('205','SN','Senegal','XOF','SG','686','Dakar'),('206','SO','Somalia','SOS','SO','706','Mogadishu'),('207','SR','Suriname','SRD','NS','740','Paramaribo'),('208','SS','South Sudan','SSP','OD','728','Juba'),('209','ST','São Tomé and Príncipe','STD','TP','678','São Tomé'),('21','BF','Burkina Faso','XOF','UV','854','Ouagadougou'),('210','SV','El Salvador','USD','ES','222','San Salvador'),('211','SX','Sint Maarten','ANG','NN','534','Philipsburg'),('212','SY','Syria','SYP','SY','760','Damascus'),('213','SZ','Swaziland','SZL','WZ','748','Mbabane'),('214','TC','Turks and Caicos Islands','USD','TK','796','Cockburn Town'),('215','TD','Chad','XAF','CD','148','N\'Djamena'),('216','TF','French Southern Territories','EUR','FS','260','Port-aux-Français'),('217','TG','Togo','XOF','TO','768','Lomé'),('218','TH','Thailand','THB','TH','764','Bangkok'),('219','TJ','Tajikistan','TJS','TI','762','Dushanbe'),('22','BG','Bulgaria','BGN','BU','100','Sofia'),('220','TK','Tokelau','NZD','TL','772',''),('221','TL','East Timor','USD','TT','626','Dili'),('222','TL','East Timor','USD','TT','626','Dili'),('223','TM','Turkmenistan','TMT','TX','795','Ashgabat'),('224','TN','Tunisia','TND','TS','788','Tunis'),('225','TO','Tonga','TOP','TN','776','Nuku\'alofa'),('226','TR','Turkey','TRY','TU','792','Ankara'),('227','TT','Trinidad and Tobago','TTD','TD','780','Port of Spain'),('228','TV','Tuvalu','AUD','TV','798','Funafuti'),('229','TW','Taiwan','TWD','TW','158','Taipei'),('23','BH','Bahrain','BHD','BA','048','Manama'),('230','TZ','Tanzania','TZS','TZ','834','Dodoma'),('231','UA','Ukraine','UAH','UP','804','Kyiv'),('232','UG','Uganda','UGX','UG','800','Kampala'),('233','UM','U.S. Minor Outlying Islands','USD','','581',''),('234','US','United States','USD','US','840','Washington'),('235','UY','Uruguay','UYU','UY','858','Montevideo'),('236','UZ','Uzbekistan','UZS','UZ','860','Tashkent'),('237','VA','Vatican City','EUR','VT','336','Vatican'),('238','VC','Saint Vincent and the Grenadines','XCD','VC','670','Kingstown'),('239','VE','Venezuela','VEF','VE','862','Caracas'),('24','BI','Burundi','BIF','BY','108','Bujumbura'),('240','VG','British Virgin Islands','USD','VI','092','Road Town'),('241','VI','U.S. Virgin Islands','USD','VQ','850','Charlotte Amalie'),('242','VN','Vietnam','VND','VM','704','Hanoi'),('243','VU','Vanuatu','VUV','NH','548','Port Vila'),('244','WF','Wallis and Futuna','XPF','WF','876','Mata-Utu'),('245','WS','Samoa','WST','WS','882','Apia'),('246','XK','Kosovo','EUR','KV','0','Pristina'),('247','YE','Yemen','YER','YM','887','Sanaa'),('248','YT','Mayotte','EUR','MF','175','Mamoutzou'),('249','ZA','South Africa','ZAR','SF','710','Pretoria'),('25','BJ','Benin','XOF','BN','204','Porto-Novo'),('250','ZM','Zambia','ZMK','ZA','894','Lusaka'),('251','ZW','Zimbabwe','ZWL','ZI','716','Harare'),('26','BL','Saint Barthélemy','EUR','TB','652','Gustavia'),('27','BM','Bermuda','BMD','BD','060','Hamilton'),('28','BN','Brunei','BND','BX','096','Bandar Seri Begawan'),('29','BO','Bolivia','BOB','BL','068','Sucre'),('3','AF','Afghanistan','AFN','AF','004','Kabul'),('30','BQ','Bonaire','USD','','535',''),('31','BR','Brazil','BRL','BR','076','Brasília'),('32','BS','Bahamas','BSD','BF','044','Nassau'),('33','BT','Bhutan','BTN','BT','064','Thimphu'),('34','BV','Bouvet Island','NOK','BV','074',''),('35','BW','Botswana','BWP','BC','072','Gaborone'),('36','BY','Belarus','BYR','BO','112','Minsk'),('37','BZ','Belize','BZD','BH','084','Belmopan'),('38','CA','Canada','CAD','CA','124','Ottawa'),('39','CC','Cocos [Keeling] Islands','AUD','CK','166','West Island'),('4','AG','Antigua and Barbuda','XCD','AC','028','St. John\'s'),('40','CD','Democratic Republic of the Congo','CDF','CG','180','Kinshasa'),('41','CF','Central African Republic','XAF','CT','140','Bangui'),('42','CG','Republic of the Congo','XAF','CF','178','Brazzaville'),('43','CH','Switzerland','CHF','SZ','756','Berne'),('44','CI','Ivory Coast','XOF','IV','384','Yamoussoukro'),('45','CK','Cook Islands','NZD','CW','184','Avarua'),('46','CL','Chile','CLP','CI','152','Santiago'),('47','CM','Cameroon','XAF','CM','120','Yaoundé'),('48','CN','China','CNY','CH','156','Beijing'),('49','CO','Colombia','COP','CO','170','Bogotá'),('5','AI','Anguilla','XCD','AV','660','The Valley'),('50','CR','Costa Rica','CRC','CS','188','San José'),('51','CU','Cuba','CUP','CU','192','Havana'),('52','CV','Cape Verde','CVE','CV','132','Praia'),('53','CW','Curacao','ANG','UC','531','Willemstad'),('54','CX','Christmas Island','AUD','KT','162','The Settlement'),('55','CY','Cyprus','EUR','CY','196','Nicosia'),('56','CZ','Czechia','CZK','EZ','203','Prague'),('57','DE','Germany','EUR','GM','276','Berlin'),('58','DJ','Djibouti','DJF','DJ','262','Djibouti'),('59','DK','Denmark','DKK','DA','208','Copenhagen'),('6','AL','Albania','ALL','AL','008','Tirana'),('60','DM','Dominica','XCD','DO','212','Roseau'),('61','DO','Dominican Republic','DOP','DR','214','Santo Domingo'),('62','DZ','Algeria','DZD','AG','012','Algiers'),('63','EC','Ecuador','USD','EC','218','Quito'),('64','EE','Estonia','EUR','EN','233','Tallinn'),('65','EG','Egypt','EGP','EG','818','Cairo'),('66','EH','Western Sahara','MAD','WI','732','El Aaiún'),('67','ER','Eritrea','ERN','ER','232','Asmara'),('68','ES','Spain','EUR','SP','724','Madrid'),('69','ET','Ethiopia','ETB','ET','231','Addis Ababa'),('7','AM','Armenia','AMD','AM','051','Yerevan'),('70','FI','Finland','EUR','FI','246','Helsinki'),('71','FJ','Fiji','FJD','FJ','242','Suva'),('72','FK','Falkland Islands','FKP','FK','238','Stanley'),('73','FM','Micronesia','USD','FM','583','Palikir'),('74','FO','Faroe Islands','DKK','FO','234','Tórshavn'),('75','FR','France','EUR','FR','250','Paris'),('76','GA','Gabon','XAF','GB','266','Libreville'),('77','GB','United Kingdom','GBP','UK','826','London'),('78','GD','Grenada','XCD','GJ','308','St. George\'s'),('79','GE','Georgia','GEL','GG','268','Tbilisi'),('8','AO','Angola','AOA','AO','024','Luanda'),('80','GF','French Guiana','EUR','FG','254','Cayenne'),('81','GG','Guernsey','GBP','GK','831','St Peter Port'),('82','GH','Ghana','GHS','GH','288','Accra'),('83','GI','Gibraltar','GIP','GI','292','Gibraltar'),('84','GL','Greenland','DKK','GL','304','Nuuk'),('85','GM','Gambia','GMD','GA','270','Banjul'),('86','GN','Guinea','GNF','GV','324','Conakry'),('87','GP','Guadeloupe','EUR','GP','312','Basse-Terre'),('88','GQ','Equatorial Guinea','XAF','EK','226','Malabo'),('89','GR','Greece','EUR','GR','300','Athens'),('9','AQ','Antarctica','','AY','010',''),('90','GS','South Georgia and the South Sandwich Islands','GBP','SX','239','Grytviken'),('91','GT','Guatemala','GTQ','GT','320','Guatemala City'),('92','GU','Guam','USD','GQ','316','Hagåtña'),('93','GW','Guinea-Bissau','XOF','PU','624','Bissau'),('94','GY','Guyana','GYD','GY','328','Georgetown'),('95','HK','Hong Kong','HKD','HK','344','Hong Kong'),('96','HM','Heard Island and McDonald Islands','AUD','HM','334',''),('97','HN','Honduras','HNL','HO','340','Tegucigalpa'),('98','HR','Croatia','HRK','HR','191','Zagreb'),('99','HT','Haiti','HTG','HA','332','Port-au-Prince');

/*Table structure for table `currency` */

DROP TABLE IF EXISTS `currency`;

CREATE TABLE `currency` (
  `currency_ID` char(36) NOT NULL,
  `currency_name` char(25) DEFAULT NULL,
  `currency_code` char(3) DEFAULT NULL,
  `currency_symbol` varchar(10) DEFAULT NULL,
  `currency_format_separator` char(1) DEFAULT NULL,
  `currency_format_decimal` char(1) DEFAULT NULL,
  `exchange_rate` varchar(20) DEFAULT NULL,
  `expired_sync_exchange_rate` datetime DEFAULT NULL,
  `time_to_sync_exchange_rate` varchar(20) DEFAULT NULL COMMENT 'in hours',
  `dateCreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`currency_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `currency` */

insert  into `currency`(`currency_ID`,`currency_name`,`currency_code`,`currency_symbol`,`currency_format_separator`,`currency_format_decimal`,`exchange_rate`,`expired_sync_exchange_rate`,`time_to_sync_exchange_rate`,`dateCreated`,`deleted`) values ('8cb742ef-4e7e-524f-b481-f748c7341844','Peso','PSO','₱',',','.','1100',NULL,NULL,'2015-02-07 16:11:23',1),('b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','Rupiah','IDR','Rp','.',',','1','2013-08-20 21:03:39',NULL,'2015-02-07 15:29:54',0),('b541d327-4d68-5629-a363-aa8dad702768','123','123','123','1','1','123',NULL,NULL,'2015-05-03 20:51:44',0),('c2078662-72ed-5f3e-a9e8-fab3403d112f','Ringgit','RM','RM',',','.','3600',NULL,NULL,'2015-02-07 15:45:49',0),('e4b5cbe5-aaad-12e2-8eb1-24155d6a1ec9','Euro','EUR','€',',','.','18000','2013-08-20 21:03:39',NULL,'2015-02-07 15:29:54',0),('j4b5cbe5-jpad-32e2-7yb1-43155d6a1ec9','Japanese Yen','JPY','¥','.',',','108.92','2013-08-20 21:03:39',NULL,'2015-02-07 15:29:54',0),('s4b5cbe5-dyad-41e2-7yb1-11155d6a1ec9','Singapore Dollar','SGD','S$','.',',','9712','2013-08-20 21:03:39',NULL,'2015-02-07 15:29:54',0),('u4b5cbe5-eead-11e2-8db1-22155d6a1ec9','US Dollar','USD','$',',','.','13000','2013-08-20 21:03:39',NULL,'2015-02-07 15:29:54',0),('y4b5cbe5-yyad-13e2-8yb1-36155d6a1ec9','Yuan','CNY','¥','.',',','2009','2013-08-20 21:03:39',NULL,'2015-02-07 15:29:54',0);

/*Table structure for table `department` */

DROP TABLE IF EXISTS `department`;

CREATE TABLE `department` (
  `department_ID` char(36) CHARACTER SET latin1 NOT NULL,
  `company_ID` char(36) CHARACTER SET latin1 DEFAULT '1',
  `department_name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `department_parentID` char(36) CHARACTER SET latin1 DEFAULT '0',
  `manager_ID` char(36) CHARACTER SET latin1 DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `datecreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`department_ID`),
  KEY `FK_department_manager` (`manager_ID`),
  KEY `FK_department` (`company_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `department` */

insert  into `department`(`department_ID`,`company_ID`,`department_name`,`department_parentID`,`manager_ID`,`deleted`,`datecreated`) values ('011ccac4-cd6a-5934-b794-8d0b9d6104cb','a89c6a97-b7b5-5acc-b446-d3f075c1a00b','IT','0','7da87597-705f-5b1e-b85b-16495f',0,'2015-01-17 12:13:10'),('0db60258-9378-5f57-8d9c-923cf1801247','a89c6a97-b7b5-5acc-b446-d3f075c1a00b','Design','011ccac4-cd6a-5934-b794-8d0b9d6104cb','7da87597-705f-5b1e-b85b-16495f',0,'2015-01-17 12:13:10'),('2282e769-72d3-51c0-8792-a21800bde44c','v1540375-0afa-5dd2-b33f-f1fabd54c009','fer','e40b4aa5-01da-54a8-99bc-0c6473659eaa','',0,'2014-10-04 23:56:22'),('337e1265-8761-5852-96ee-bdeaa844ad8d','v1540375-0afa-5dd2-b33f-f1fabd54c009','NETWORK','b6505476-d53d-561d-97b8-86702fdde674','1',0,'2014-09-20 16:33:36'),('37eed971-3fe7-5b0e-a1d9-e98f3646e5ab','a89c6a97-b7b5-5acc-b446-d3f075c1a00b','HR Management','e5a91510-f93c-5849-b021-0274021872dc','7da87597-705f-5b1e-b85b-16495f',0,'2015-01-17 12:17:59'),('4154f1b8-da75-594b-9046-d75e43f4f843','v1540375-0afa-5dd2-b33f-f1fabd54c009','Impian','e3ef5797-db90-5352-bae6-bb930737acba','7d2de3dc-773a-5a93-9bbd-f66ea4',0,'2014-10-07 21:31:25'),('4263c641-6fa6-5e57-9345-7e5dc66605b4','0c75a4ac-b7fb-5004-a6cd-214320fbb21b','Director','0','',0,'2015-04-01 23:51:08'),('4fc7a8c8-bf98-511d-9e99-8a7d4587ffe1','v1540375-0afa-5dd2-b33f-f1fabd54c009','Directur','d0879a22-7fa7-5e99-8e7a-4d0e0b7f64d9','1',1,'2014-12-28 15:17:04'),('541e65b8-0a0d-500e-a9a1-e010679656b0','v1540375-0afa-5dd2-b33f-f1fabd54c009','Database Manager','b6505476-d53d-561d-97b8-86702fdde674','7da87597-705f-5b1e-b85b-16495f',0,'2015-02-19 08:05:48'),('5b4f5d5f-55c4-531b-8d7a-207d04944eda','0c75a4ac-b7fb-5004-a6cd-214320fbb21b','Finance','0','122ab75e-7f18-5818-861d-fc86db',0,'2015-04-02 00:03:31'),('5decc6b1-f5ab-55bf-8492-a4bc7b6f33fd','v1540375-0afa-5dd2-b33f-f1fabd54c009','fer','e40b4aa5-01da-54a8-99bc-0c6473659eaa','',0,'2014-10-04 23:56:16'),('720f7f41-6e4b-561f-82f0-a4462f84a5d2','v1540375-0afa-5dd2-b33f-f1fabd54c009','DWE','e40b4aa5-01da-54a8-99bc-0c6473659eaa','7da87597-705f-5b1e-b85b-16495f',1,'2014-10-04 23:57:04'),('759f31a0-2255-5752-b1ac-2363d8b67ca1','v1540375-0afa-5dd2-b33f-f1fabd54c009','New Car','e3ef5797-db90-5352-bae6-bb930737acba','1',0,'2014-10-07 21:30:39'),('773d2127-4ed1-5ecf-b764-6a63cc8aeadb','bf088a55-8d09-5780-b3df-20bbf121532e','CEO','ba124829-b533-5c8b-b06a-c733d3e08889','1',0,'2015-01-04 14:15:45'),('7a7a73ba-e646-5933-a2df-ef58a61ecedc','bf088a55-8d09-5780-b3df-20bbf121532e','HR Department','0','1',0,'2015-01-04 13:59:07'),('7c176034-4be9-57fc-ab3f-b76188265bdd','v1540375-0afa-5dd2-b33f-f1fabd54c009','Credit Card','e3ef5797-db90-5352-bae6-bb930737acba','7da87597-705f-5b1e-b85b-16495f',0,'2014-10-07 21:42:25'),('830c62fa-6773-5723-abcb-261ea930b6b7','0c75a4ac-b7fb-5004-a6cd-214320fbb21b','Partner','4263c641-6fa6-5e57-9345-7e5dc66605b4','',0,'2015-04-01 23:51:08'),('8319a2eb-7203-50f3-a63f-370f2b952e64','bf088a55-8d09-5780-b3df-20bbf121532e','Finance','0','1',0,'2015-06-03 21:19:53'),('8d874ebe-500d-5cae-a4c3-25725be2c51f','bf088a55-8d09-5780-b3df-20bbf121532e','Recruitment','7a7a73ba-e646-5933-a2df-ef58a61ecedc','1',0,'2015-01-04 13:59:32'),('95bb7b52-7a3b-5f44-a0c3-6115215a1159','v1540375-0afa-5dd2-b33f-f1fabd54c009','RE','e40b4aa5-01da-54a8-99bc-0c6473659eaa','',0,'2014-10-04 23:56:49'),('962260f3-0808-51d4-b735-103c98926370','bf088a55-8d09-5780-b3df-20bbf121532e','Manufacture','0','1',0,'2015-04-12 16:21:36'),('a228b3ce-6769-5272-a651-9964489f6074','v1540375-0afa-5dd2-b33f-f1fabd54c009','Finance','0','1',0,'2014-09-22 13:40:43'),('a975df69-aaa9-5013-afc0-78a57cf33c3e','v1540375-0afa-5dd2-b33f-f1fabd54c009','Casier','a228b3ce-6769-5272-a651-9964489f6074','1',0,'2014-09-22 13:40:43'),('aed7fb01-6a50-585f-a23d-82680c32f9cb','v1540375-0afa-5dd2-b33f-f1fabd54c009','SOFTWARE','b6505476-d53d-561d-97b8-86702fdde674','1',0,'2014-09-20 16:22:39'),('b4ae6091-aa0f-5074-8ba2-02192c62b223','v1540375-0afa-5dd2-b33f-f1fabd54c009','Manager','a228b3ce-6769-5272-a651-9964489f6074','1',0,'2014-10-04 23:13:20'),('b6505476-d53d-561d-97b8-86702fdde674','v1540375-0afa-5dd2-b33f-f1fabd54c009','IT','0','1',0,'2014-09-20 16:22:39'),('ba124829-b533-5c8b-b06a-c733d3e08889','bf088a55-8d09-5780-b3df-20bbf121532e','Directur','0','1',0,'2015-01-04 14:15:45'),('bbd50a82-883c-50d5-a36b-2b3012435137','0c75a4ac-b7fb-5004-a6cd-214320fbb21b','Programmer','c5e22162-5b98-521b-b5af-4ab8679dddf5','122ab75e-7f18-5818-861d-fc86db',0,'2015-04-02 00:00:32'),('c5a2ae00-0110-5613-b5fd-380078ee08e5','v1540375-0afa-5dd2-b33f-f1fabd54c009','RE','e40b4aa5-01da-54a8-99bc-0c6473659eaa','7da87597-705f-5b1e-b85b-16495f',1,'2014-10-04 23:55:39'),('c5e22162-5b98-521b-b5af-4ab8679dddf5','0c75a4ac-b7fb-5004-a6cd-214320fbb21b','IT','0','122ab75e-7f18-5818-861d-fc86db',0,'2015-04-02 00:00:32'),('c7dca8d1-5fea-568c-92d5-081b25981930','v1540375-0afa-5dd2-b33f-f1fabd54c009','Use Car','e3ef5797-db90-5352-bae6-bb930737acba','1',0,'2014-10-07 21:30:08'),('d0879a22-7fa7-5e99-8e7a-4d0e0b7f64d9','v1540375-0afa-5dd2-b33f-f1fabd54c009','Directur','0','1',0,'2014-12-28 15:17:04'),('e3ef5797-db90-5352-bae6-bb930737acba','v1540375-0afa-5dd2-b33f-f1fabd54c009','Marketing','0','1',0,'2014-10-05 08:51:51'),('e40b4aa5-01da-54a8-99bc-0c6473659eaa','v1540375-0afa-5dd2-b33f-f1fabd54c009','HU','0','7da87597-705f-5b1e-b85b-16495f',1,'2014-10-04 23:55:38'),('e5a91510-f93c-5849-b021-0274021872dc','a89c6a97-b7b5-5acc-b446-d3f075c1a00b','HR Department','0','7da87597-705f-5b1e-b85b-16495f',0,'2015-01-17 12:17:59'),('ec93960e-3bb5-5bdd-91e1-52ff9c5f898a','bf088a55-8d09-5780-b3df-20bbf121532e','Finance Dvs','8319a2eb-7203-50f3-a63f-370f2b952e64','1',0,'2015-06-03 21:19:53'),('f091111b-802c-5281-be46-f2f69f9698f6','0c75a4ac-b7fb-5004-a6cd-214320fbb21b','Accounting','5b4f5d5f-55c4-531b-8d7a-207d04944eda','122ab75e-7f18-5818-861d-fc86db',0,'2015-04-02 00:03:31'),('f246ce31-15f6-5760-8e80-38ddddd29465','v1540375-0afa-5dd2-b33f-f1fabd54c009','FE','a228b3ce-6769-5272-a651-9964489f6074','7da87597-705f-5b1e-b85b-16495f',1,'2014-10-04 23:16:41'),('f6989d34-b8d6-5acd-b1d2-cdea80b46cf7','bf088a55-8d09-5780-b3df-20bbf121532e','Presiden Directur','ba124829-b533-5c8b-b06a-c733d3e08889','1',0,'2015-01-04 14:16:09'),('fe6bd373-c6ef-58df-93cb-ac57ff261551','bf088a55-8d09-5780-b3df-20bbf121532e','packing','962260f3-0808-51d4-b735-103c98926370','1',0,'2015-04-12 16:21:36');

/*Table structure for table `employee` */

DROP TABLE IF EXISTS `employee`;

CREATE TABLE `employee` (
  `employee_ID` char(30) CHARACTER SET latin1 NOT NULL,
  `employee_catID` char(36) CHARACTER SET latin1 DEFAULT NULL,
  `employee_name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `employee_dateofbirth` date DEFAULT NULL COMMENT 'Date of Birth',
  `employee_placeofbirth` varchar(255) DEFAULT NULL COMMENT 'Place of Birth',
  `employee_email` varchar(255) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Email',
  `employee_password` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `employee_access` tinyint(1) DEFAULT '1' COMMENT 'Access',
  `employee_photo` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `employee_startworking` datetime DEFAULT NULL COMMENT 'Start Working',
  `employee_endworking` datetime DEFAULT NULL COMMENT 'End Working',
  `employee_badge_int` int(7) DEFAULT NULL COMMENT 'Badge Number',
  `employee_badge` varchar(100) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Badge ',
  `employee_salary` double(12,2) DEFAULT '0.00',
  `currency_ID` char(36) DEFAULT NULL,
  `company_ID` char(36) DEFAULT NULL,
  `company_groupID` char(36) DEFAULT NULL,
  `job_ID` char(36) CHARACTER SET latin1 DEFAULT NULL,
  `employee_status` varchar(255) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Status',
  `employee_mobilephone` char(30) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Mobile Phone',
  `employee_phone` char(30) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Phone',
  `manager_ID` char(30) CHARACTER SET latin1 DEFAULT NULL,
  `employee_worklocationID` char(30) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Work Location',
  `employee_address` varchar(255) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Address',
  `employee_tax_obligation_number` varchar(255) DEFAULT NULL COMMENT 'Tax Obligation Number',
  `employee_SSN` char(30) CHARACTER SET latin1 DEFAULT NULL COMMENT 'SSN',
  `employee_passport_no` char(50) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Passport',
  `employee_gender` char(6) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Gender',
  `employee_blood` char(2) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Blood',
  `employee_religion` varchar(30) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Religion',
  `employee_maritalstat` varchar(30) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Marital Status',
  `employee_countryID` char(36) CHARACTER SET latin1 DEFAULT NULL,
  `employee_dob` date DEFAULT NULL COMMENT 'Date of Brith',
  `employee_notes` varchar(255) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Note',
  `deleted` tinyint(1) DEFAULT '0',
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `department_ID` char(36) DEFAULT NULL,
  PRIMARY KEY (`employee_ID`),
  KEY `FK_employee` (`employee_catID`),
  KEY `FK_employee_job` (`job_ID`),
  KEY `FK_employeecompany` (`company_ID`),
  CONSTRAINT `FK_employee` FOREIGN KEY (`employee_catID`) REFERENCES `employee_cat` (`employee_catID`) ON UPDATE CASCADE,
  CONSTRAINT `FK_employee_job` FOREIGN KEY (`job_ID`) REFERENCES `job` (`job_ID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `employee` */

insert  into `employee`(`employee_ID`,`employee_catID`,`employee_name`,`employee_dateofbirth`,`employee_placeofbirth`,`employee_email`,`employee_password`,`employee_access`,`employee_photo`,`employee_startworking`,`employee_endworking`,`employee_badge_int`,`employee_badge`,`employee_salary`,`currency_ID`,`company_ID`,`company_groupID`,`job_ID`,`employee_status`,`employee_mobilephone`,`employee_phone`,`manager_ID`,`employee_worklocationID`,`employee_address`,`employee_tax_obligation_number`,`employee_SSN`,`employee_passport_no`,`employee_gender`,`employee_blood`,`employee_religion`,`employee_maritalstat`,`employee_countryID`,`employee_dob`,`employee_notes`,`deleted`,`datecreated`,`department_ID`) values ('02f67708-b01e-5831-a987-658552',NULL,'Jalu','1980-02-01','Depok','jalu@anasher.com',NULL,1,'./upload/employee_photo/4164e1a6-7d27-5fe2-b115-ea17ad6046ab/4164e1a6-7d27-5fe2-b115-ea17ad6046ab.jpg',NULL,NULL,9,'ASR-00009',1500000.00,'b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','bf088a55-8d09-5780-b3df-20bbf121532e','v1540375-0afa-5dd2-b33f-f1fabd54c009','6dd38b7d-4155-5aa0-bba1-9b9ab62e737f',NULL,'081365007600','021889989','1','Cipadu','Jl. Cipadu raya','','123123123','','Male','A','Islam','Single','101',NULL,'asd',1,'2015-04-18 11:55:08','962260f3-0808-51d4-b735-103c98926370'),('1','8c6f87b1-43fa-58f8-a78e-7079206da22e','Nurjamilah','1989-01-13','Tembilahan','milla@anasher.com','7884fc6616d2e1c408a298a75eb159d4',1,'./upload/employee_photo/9d9457d1-e0fd-527e-8f16-9274f82dae68/9d9457d1-e0fd-527e-8f16-9274f82dae68.jpg','2012-12-12 00:00:00',NULL,1,'ASR-00001',15500.00,'e4b5cbe5-aaad-12e2-8eb1-24155d6a1ec9','bf088a55-8d09-5780-b3df-20bbf121532e','v1540375-0afa-5dd2-b33f-f1fabd54c009','0df1f426-6f9a-5064-8485-4f51009677d7','new','085271129400',' 021334455','1','Jakarta Raya','Jl. Bukit Barisan Perum Cendana I blok c2','','','','Female','B','Islam','Married','101',NULL,'CEO Owner',0,'0000-00-00 00:00:00','773d2127-4ed1-5ecf-b764-6a63cc8aeadb'),('122ab75e-7f18-5818-861d-fc86db',NULL,'Ann Patricia Garett','1970-01-01','Dallass','ann@winsglobal.com',NULL,1,'./upload/employee_photo/331928ef-0e2f-551b-949f-1fdd1efae7f5/331928ef-0e2f-551b-949f-1fdd1efae7f5.jpg',NULL,NULL,1,'WNS-0001',15000000.00,'b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','0c75a4ac-b7fb-5004-a6cd-214320fbb21b','v1540375-0afa-5dd2-b33f-f1fabd54c009','bad6ddd9-c231-5473-9a63-0567494f0497',NULL,'08138766778','02188998','122ab75e-7f18-5818-861d-fc86db','Jakarta Selatan','Jl. Hanglekir no 13 P','','','','Male','A','Protestan','Married','234',NULL,'asd',0,'2015-04-01 23:58:33','830c62fa-6773-5723-abcb-261ea930b6b7'),('4b17da1d-bc12-55ab-94c2-777634',NULL,'Sumarno','1979-01-04','Parung','sumarno@anasher.com',NULL,1,NULL,NULL,NULL,7,'ASR-00007',0.00,'b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','bf088a55-8d09-5780-b3df-20bbf121532e','v1540375-0afa-5dd2-b33f-f1fabd54c009','22607a3a-d3ce-56ec-b69e-8538824076c3',NULL,'08126656567','0852334455','7da87597-705f-5b1e-b85b-16495f','Jakarta Raya','Jl. Sabar mulya no 144','','','','Male','A','Islam','Single','3',NULL,'asd',1,'2015-01-06 22:28:29','8d874ebe-500d-5cae-a4c3-25725be2c51f'),('69fdd885-8ff4-574d-ad81-a73299',NULL,'Handi Sampoerna','1990-01-01','Padang','handi@ratan.co',NULL,1,'./upload/employee_photo/73ed5001-0c43-5c10-aed7-482d43846d34/73ed5001-0c43-5c10-aed7-482d43846d34.png',NULL,NULL,2,'RTN-00002',0.00,'b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','bf088a55-8d09-5780-b3df-20bbf121532e','v1540375-0afa-5dd2-b33f-f1fabd54c009','6e688f39-4372-532e-9d73-74c88b20c85a',NULL,'0852334455','0852334455','7da87597-705f-5b1e-b85b-16495f','Jakarta Raya','Jl. Srigunting no12','','','','Male','A','Islam','Single','101',NULL,'great',1,'2015-01-04 11:55:06','8d874ebe-500d-5cae-a4c3-25725be2c51f'),('7d2de3dc-773a-5a93-9bbd-f66ea4',NULL,'Siti Nurhayati','1970-01-01','','siti@anasher.com',NULL,1,'./upload/employee_photo/c9c8062b-23cc-5965-bd7c-cca1aef99096/c9c8062b-23cc-5965-bd7c-cca1aef99096.jpg',NULL,NULL,4,'ASR-00004',0.00,'b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','bf088a55-8d09-5780-b3df-20bbf121532e','v1540375-0afa-5dd2-b33f-f1fabd54c009','08af3cf0-7f9c-522c-aa18-c97c463c7bed',NULL,'085271129400','085271129400','1','pekanbaru','Jl. Muchtarudin 13 A','','','','Male','A','Islam','Single','3',NULL,'zxc',1,'2014-10-05 08:53:38',''),('7d6ee3f4-a049-5caa-ae7e-d241ad',NULL,'Ferniawan','1989-03-10','Pekanbaru','ferniawan@anasher.com',NULL,1,'./upload/employee_photo/51b42449-186e-5dda-b3ce-3347b84186ac/51b42449-186e-5dda-b3ce-3347b84186ac.jpg',NULL,NULL,10,'ASR-00010',3000000.00,'b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','bf088a55-8d09-5780-b3df-20bbf121532e','v1540375-0afa-5dd2-b33f-f1fabd54c009','accd1a39-bc6b-577c-8ca8-ba588f8e8ec2',NULL,'082387873400','082387873400','1','Cipadu','Jl. Muchtarudin pav 13 A','asd','ads','asd','Male','A','Islam','Married','101',NULL,'best',0,'2015-05-21 21:25:36','fe6bd373-c6ef-58df-93cb-ac57ff261551'),('7da87597-705f-5b1e-b85b-16495f',NULL,'Ferniawan','1989-03-10','Pekanbaru','ferniawan@ratan.co',NULL,1,'./upload/employee_photo/95d9bf39-3ace-53aa-aa63-95c08c8dee05/95d9bf39-3ace-53aa-aa63-95c08c8dee05.JPG',NULL,NULL,1,'RTN-00001',700.00,'u4b5cbe5-eead-11e2-8db1-22155d6a1ec9','v1540375-0afa-5dd2-b33f-f1fabd54c009','v1540375-0afa-5dd2-b33f-f1fabd54c009','3ee96b28-a36c-5724-8d3a-c34aa4407843',NULL,'082387873400','082387873400','1','Jakarta','Jl. Gunung Raya no 61B','974160277211000','1471101003890001','','Male','A','Islam','Married','101',NULL,'Funding and Support Executive',0,'2014-09-20 17:40:05','d0879a22-7fa7-5e99-8e7a-4d0e0b7f64d9'),('912d0912-711c-59de-a122-2b5418',NULL,'Mumui','1993-04-01','Sukabumi','mumui@anasher.com',NULL,1,'./upload/employee_photo/a28b2e7e-efa9-58fd-ac8b-72981c417bc0/a28b2e7e-efa9-58fd-ac8b-72981c417bc0.jpg',NULL,NULL,8,'ASR-00008',2500000.00,'b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','bf088a55-8d09-5780-b3df-20bbf121532e','v1540375-0afa-5dd2-b33f-f1fabd54c009','accd1a39-bc6b-577c-8ca8-ba588f8e8ec2',NULL,'08136677656','02188998','1','Cipadu','Jl. Kimula no 32','123123123','123123123','123123123','Female','A','Islam','Single','101',NULL,'asd',1,'2015-04-12 16:26:18','fe6bd373-c6ef-58df-93cb-ac57ff261551'),('93f21b72-b9fa-5651-8fdb-dba188',NULL,'Hanafi','1980-05-01','Jakarta','hanafi@anasher.com',NULL,1,'./upload/employee_photo/edfa09f9-6110-5d22-a460-de8f15021feb/edfa09f9-6110-5d22-a460-de8f15021feb.jpg',NULL,NULL,6,'ASR-00006',1000000.00,'b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','bf088a55-8d09-5780-b3df-20bbf121532e','v1540375-0afa-5dd2-b33f-f1fabd54c009','22607a3a-d3ce-56ec-b69e-8538824076c3',NULL,'0816778899','02188998','1','Jakarta','Jl. Bukit bintang no 54 ','10000920901','140991000012','0987111','Male','A','Protestan','Single','234',NULL,'-',1,'2015-02-18 23:29:09','8d874ebe-500d-5cae-a4c3-25725be2c51f'),('a24b7630-b5f1-558e-a405-639b6b',NULL,'Aji Saka','1987-01-01','Bekasi','aji@ratan.co',NULL,1,NULL,NULL,NULL,5,'RTN-00005',7000000.00,'b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','v1540375-0afa-5dd2-b33f-f1fabd54c009','v1540375-0afa-5dd2-b33f-f1fabd54c009','6bd97aa0-44f9-5304-90c8-382936c14510',NULL,'08126656567','021334455','7da87597-705f-5b1e-b85b-16495f','Jakarta Raya','Jl. Sido Mulyono12','','','','Male','A','Islam','Single','3',NULL,'Great',0,'2015-01-04 12:15:24','aed7fb01-6a50-585f-a23d-82680c32f9cb'),('a4d9ecb6-d25b-574b-9e82-886fca',NULL,'Arol Ahmad','1969-12-31','asd','arol@anasher.com',NULL,1,'./upload/employee_photo/6c498a0d-f783-5f60-91c3-5d30c0b606f0/6c498a0d-f783-5f60-91c3-5d30c0b606f0.jpg',NULL,NULL,5,'ASR-00005',0.00,'b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','bf088a55-8d09-5780-b3df-20bbf121532e','v1540375-0afa-5dd2-b33f-f1fabd54c009','6e688f39-4372-532e-9d73-74c88b20c85a',NULL,'082387873400','085271129400','7da87597-705f-5b1e-b85b-16495f','Jakarta','Jl. Hutama karya','','','','Male','A','Islam','Single','3',NULL,'asd',1,'2014-10-07 21:15:49','8d874ebe-500d-5cae-a4c3-25725be2c51f'),('ad9c3b65-7da2-5f5c-9715-dfd15d',NULL,'Khairunisa ','1990-02-01','Tembilahan','nica@anasher.com',NULL,1,'./upload/employee_photo/23d7a9c3-59f8-595d-9b3e-d83d1f594aa8/23d7a9c3-59f8-595d-9b3e-d83d1f594aa8.jpg',NULL,NULL,3,'ASR-00003',0.00,'b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','bf088a55-8d09-5780-b3df-20bbf121532e','v1540375-0afa-5dd2-b33f-f1fabd54c009','08af3cf0-7f9c-522c-aa18-c97c463c7bed',NULL,'082387873400','021334455','1','Jakarta','Jl. Kutilang sakti no 54','','','','Female','A','Islam','Single','101',NULL,'asd',0,'2014-09-21 10:31:26',''),('b49c5c33-6851-5723-a5e4-b27800',NULL,'Ryan Permana','1982-01-01','Jakarta','ryan@winsglobal.com',NULL,1,'./upload/employee_photo/2e215826-c045-5f98-89b4-2af976a3357f/2e215826-c045-5f98-89b4-2af976a3357f.jpg',NULL,NULL,2,'WNS-0002',7000000.00,'b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','0c75a4ac-b7fb-5004-a6cd-214320fbb21b','v1540375-0afa-5dd2-b33f-f1fabd54c009','dcd6b5a6-74ac-5255-a4ca-c199e33f9503',NULL,'08528871201','08528871201','122ab75e-7f18-5818-861d-fc86db','Jakarta Selatan','Jl. Mengkal dalam no 13 A','','','','Male','A','Islam','Married','101',NULL,'Manager IT',0,'2015-04-02 00:02:32','bbd50a82-883c-50d5-a36b-2b3012435137'),('bbd8ade0-cb83-57f4-bca6-f0c923',NULL,'Bully','1970-01-01','fe','bully@yui.co.id',NULL,1,NULL,NULL,NULL,2,'YUI-000002',0.00,NULL,'a89c6a97-b7b5-5acc-b446-d3f075c1a00b','v1540375-0afa-5dd2-b33f-f1fabd54c009','dceee31d-1f57-557f-a086-ccda51b07b5a',NULL,'','','7da87597-705f-5b1e-b85b-16495f','','','','','','Male','A','Islam','Single','3',NULL,'asd',0,'2015-01-17 12:53:19','37eed971-3fe7-5b0e-a1d9-e98f3646e5ab'),('c506fe41-d1b1-5451-aae7-6b1915',NULL,'Aila Jannah','1993-01-01','Jakarta','aila@ratan.co',NULL,1,NULL,NULL,NULL,3,'RTN-00003',4000000.00,'b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','v1540375-0afa-5dd2-b33f-f1fabd54c009','v1540375-0afa-5dd2-b33f-f1fabd54c009','08af3cf0-7f9c-522c-aa18-c97c463c7bed',NULL,'08523456765','021334455','7da87597-705f-5b1e-b85b-16495f','Jakarta Raya','Jl. Sabar mulya no 12','','','','Male','A','Islam','Single','3',NULL,'Great',0,'2015-01-04 11:57:29','e3ef5797-db90-5352-bae6-bb930737acba'),('cc125693-401f-50d8-bb04-3220da',NULL,'Samaran Ali','1990-01-01','Jakarta','samaran@ratan.co',NULL,1,NULL,NULL,NULL,4,'RTN-00004',4000000.00,'b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','v1540375-0afa-5dd2-b33f-f1fabd54c009','v1540375-0afa-5dd2-b33f-f1fabd54c009','2c55e6c1-9de3-586f-afdc-27fe8d2a9bae',NULL,'08167765677','021334455','7da87597-705f-5b1e-b85b-16495f','Jakarta Raya','Jl. Petukangan no 3','','','','Male','A','Islam','Single','3',NULL,'asd',0,'2015-01-04 12:11:14','337e1265-8761-5852-96ee-bdeaa844ad8d'),('ccd8edca-9636-56ce-9989-10b4de',NULL,'John Doe','1980-02-06','Jakarta Selatan','john@yui.co.id',NULL,1,'./upload/employee_photo/219b62d4-5a36-534e-ac59-89323b8e78dd/219b62d4-5a36-534e-ac59-89323b8e78dd.jpg',NULL,NULL,1,'YUI-000001',0.00,NULL,'a89c6a97-b7b5-5acc-b446-d3f075c1a00b','v1540375-0afa-5dd2-b33f-f1fabd54c009','f8c0f795-dc59-5556-b6f1-b1aba49a3714',NULL,'08236543567','021887766','7da87597-705f-5b1e-b85b-16495f','Jakarta Raya','Jl. Margonda Raya no 69 A','176672638','140233780001301','','Male','A','Islam','Married','101',NULL,'good',0,'2015-01-17 12:16:40','0db60258-9378-5f57-8d9c-923cf1801247'),('f5b23572-01a7-5dd1-89a1-ec26b5',NULL,'Tati Novie Yanti','1982-01-01','Depok','novie@winsglobal.com',NULL,1,'./upload/employee_photo/ccbe135d-948d-5685-9f19-8eb35bcdd302/ccbe135d-948d-5685-9f19-8eb35bcdd302.jpg',NULL,NULL,3,'WNS-0003',5000000.00,'b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','0c75a4ac-b7fb-5004-a6cd-214320fbb21b','v1540375-0afa-5dd2-b33f-f1fabd54c009','5a57975d-d9f5-5bd8-a9a0-4e33da539b3d',NULL,'08138766778','02188998','122ab75e-7f18-5818-861d-fc86db','Jakarta Selatan','Jl. Bukit bintang no 54 ','','','','Female','A','Islam','Single','101',NULL,'asda',0,'2015-04-02 00:07:37','f091111b-802c-5281-be46-f2f69f9698f6'),('fcc8ed56-8161-58dc-817a-3febcd',NULL,'Suryo Mboh',NULL,NULL,'suryo@gmail.com',NULL,1,NULL,NULL,NULL,NULL,'09898',0.00,NULL,NULL,'v1540375-0afa-5dd2-b33f-f1fabd54c009','6bd97aa0-44f9-5304-90c8-382936c14510',NULL,'08080','080808','7da87597-705f-5b1e-b85b-16495f','','',NULL,'','','Male','A','Islam','Single','3',NULL,'asd',1,'2014-11-08 08:25:24','aed7fb01-6a50-585f-a23d-82680c32f9cb');

/*Table structure for table `employee_cat` */

DROP TABLE IF EXISTS `employee_cat`;

CREATE TABLE `employee_cat` (
  `employee_catID` char(36) CHARACTER SET latin1 NOT NULL,
  `employee_catParentID` char(36) CHARACTER SET latin1 DEFAULT '0',
  `employee_catName` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `datecreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`employee_catID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `employee_cat` */

insert  into `employee_cat`(`employee_catID`,`employee_catParentID`,`employee_catName`,`deleted`,`datecreated`) values ('1','0','CEO',0,'2014-08-27 21:59:28'),('3','1','Presiden Directur',0,'2014-08-27 21:59:28'),('5d6920ef-ce03-5e7c-bbcc-9aee44bfc2a3','1','asda',1,'2014-09-20 17:48:24'),('8c6f87b1-43fa-58f8-a78e-7079206da22e','1','Directur Technic',1,'2014-09-20 16:58:06');

/*Table structure for table `expense` */

DROP TABLE IF EXISTS `expense`;

CREATE TABLE `expense` (
  `expense_ID` char(36) NOT NULL,
  `task_ID` char(36) DEFAULT NULL,
  `employee_ID` char(36) DEFAULT NULL,
  `currency_ID` char(36) DEFAULT NULL,
  `description` blob,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date` date DEFAULT NULL,
  `approved` tinyint(1) DEFAULT '0',
  `state` enum('Awaiting Approval','Approved','Invoiced','Refused') DEFAULT 'Awaiting Approval',
  `total_amount` double(10,2) DEFAULT NULL,
  `draft` tinyint(1) DEFAULT '1',
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`expense_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `expense` */

insert  into `expense`(`expense_ID`,`task_ID`,`employee_ID`,`currency_ID`,`description`,`dateCreated`,`date`,`approved`,`state`,`total_amount`,`draft`,`deleted`) values ('0202037f-3a8d-5f88-8155-01fac369862d','8d2cb3cb-5d08-5573-a9e0-c6b282010c16','1','b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','toko warna','2015-06-04 23:18:03','2015-06-04',1,'Approved',361950.00,1,0),('03bee3c3-c176-5b7c-b3ba-2a7af4275311','8d2cb3cb-5d08-5573-a9e0-c6b282010c16','1','b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','ongkir ke Pekanbaru','2015-06-03 22:00:24','2015-06-03',1,'Approved',57000.00,1,0),('08ecc2e0-c55e-5d5f-af86-334698f71f03','5cf87f27-7a5a-54c0-ae6b-f2c8107ae5ca','1','b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','Sonia','2015-06-03 21:34:23','2015-06-03',1,'Approved',600000.00,1,0),('09e89734-6f5e-5ca2-9124-653a6b4025a4','1d2992e6-39e5-57d1-b4ab-bd24f1832461','912d0912-711c-59de-a122-2b5418','c2078662-72ed-5f3e-a9e8-fab3403d112f','gunting kain','2015-04-25 13:01:26','2015-04-25',0,'Awaiting Approval',150.00,1,1),('0c1d4dcd-163f-5eb7-b8b1-27ad7d7411c5','8d2cb3cb-5d08-5573-a9e0-c6b282010c16','1','b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','pulsa','2015-06-03 21:48:05','2015-06-01',1,'Approved',20000.00,1,0),('2897c12d-387b-5e1d-94e8-10b84dd069bf','8d2cb3cb-5d08-5573-a9e0-c6b282010c16','1','b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','toko royal','2015-06-04 23:16:12','2015-06-04',1,'Approved',558600.00,1,0),('3515075c-6dc9-5bbf-bdd5-53dca6613520','a7592246-8edc-56e5-b71b-414a74508864','7da87597-705f-5b1e-b85b-16495f','b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','obat rambut kering','2015-02-18 00:20:51','2015-01-01',1,'Approved',15000.00,1,1),('3a7a43d1-8984-544b-b19b-1571cba4d144','a7592246-8edc-56e5-b71b-414a74508864','912d0912-711c-59de-a122-2b5418','b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','asd','2015-04-18 12:55:28','2015-04-18',0,'Awaiting Approval',7500.00,1,1),('41e1749d-e2fc-5b89-872f-58507a4fc755','8d2cb3cb-5d08-5573-a9e0-c6b282010c16','1','b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','nisa','2015-06-03 22:01:31','2015-06-03',1,'Approved',200000.00,1,0),('4cb93276-7d67-5621-836c-1aaf5d44192a','a7592246-8edc-56e5-b71b-414a74508864','7da87597-705f-5b1e-b85b-16495f','b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','asd','2015-04-15 02:20:10','2015-04-14',1,'Invoiced',184800.00,1,1),('4db5b17f-d301-5189-a53d-7c1115b46ff8','965052b8-c607-5d76-a151-955358d0fef4','912d0912-711c-59de-a122-2b5418','b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','jahit rombak','2015-04-18 13:10:08','2015-04-18',1,'Approved',150000.00,1,1),('4eb4413c-a93c-5b8c-8168-c25be988d023','8d2cb3cb-5d08-5573-a9e0-c6b282010c16','1','b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','toko Royal','2015-06-04 23:17:10','2015-06-04',1,'Approved',568400.00,1,0),('5cdf0ce2-c149-55ec-872c-5814d02416ba','5cf87f27-7a5a-54c0-ae6b-f2c8107ae5ca','1','b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','Nella','2015-06-03 21:26:20','2015-06-03',1,'Approved',170000.00,1,0),('5ef404a2-f4e0-5b2d-97a1-efd722c3cfc0','5cf87f27-7a5a-54c0-ae6b-f2c8107ae5ca','1','b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','Maya','2015-06-03 21:58:09','2015-06-03',1,'Approved',650000.00,1,0),('6347c8fc-c17b-58b2-b149-7e352a66db51','d69fb312-8442-5038-ba39-6e55e311961f','122ab75e-7f18-5818-861d-fc86db','b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','pay mailchimp','2015-04-18 13:30:36','2015-04-18',0,'Awaiting Approval',300000.00,1,0),('8d67f5b7-5816-50a7-8b2d-f52c29d5da2a','004eef28-7b01-58f3-bee6-b1bd2451d7fa','7da87597-705f-5b1e-b85b-16495f','b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','asd','2015-04-18 19:45:56','2015-04-18',1,'Approved',7000.00,1,0),('90734506-49b6-5fed-8029-946508158479','a7592246-8edc-56e5-b71b-414a74508864','7da87597-705f-5b1e-b85b-16495f','b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','asdasd','2015-04-16 21:07:00','2015-04-16',0,'Awaiting Approval',15129.00,1,1),('90eba04e-23d4-5840-a0d7-560a816842c5','a7592246-8edc-56e5-b71b-414a74508864','7da87597-705f-5b1e-b85b-16495f','b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','asd','2015-04-15 23:33:00','2015-04-15',0,'Awaiting Approval',0.00,1,1),('931b0cf4-8aa7-5c63-8c05-81c414676b58','a7592246-8edc-56e5-b71b-414a74508864','02f67708-b01e-5831-a987-658552','b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','Beli benang','2015-04-18 12:11:18','2015-04-18',0,'Awaiting Approval',250000.00,1,1),('93bc13ce-020d-5a79-90be-3b80f373243f','1fc9d0ea-69c7-5ba8-9a04-575de6e4d069','1','b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','bahan mukena ','2015-06-04 23:14:06','2015-06-04',1,'Approved',98600.00,1,0),('9f8cfc5a-81b2-5d58-bb19-3ad257f1a0e2','8d2cb3cb-5d08-5573-a9e0-c6b282010c16','1','b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','Pembelian bahan tanggal 21 mei 2015 ','2015-05-21 22:45:38','2015-05-21',1,'Approved',1249132.50,1,0),('b257dfdc-dd7f-5530-a360-959442dbfe29','5cf87f27-7a5a-54c0-ae6b-f2c8107ae5ca','1','b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','Cik Nana','2015-06-03 21:59:11','2015-06-03',1,'Approved',435000.00,1,0),('b9d371d2-a6fa-5390-8b99-8807ce934228','8d2cb3cb-5d08-5573-a9e0-c6b282010c16','1','b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','toko paris sprei','2015-06-04 23:19:36','2015-06-04',1,'Approved',48450.00,1,0),('ca0c7a9d-e7f0-5723-8aea-3f090c23c652','1fc9d0ea-69c7-5ba8-9a04-575de6e4d069','1','b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','bahan mukena bidang kecil','2015-06-04 23:13:10','2015-06-04',1,'Approved',91200.00,1,0),('d247a072-6f76-5032-9821-8d6f01564ccb','a7592246-8edc-56e5-b71b-414a74508864','7da87597-705f-5b1e-b85b-16495f','b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','Unit Kesehatan 19 feb 2015','2015-02-19 07:59:35','2015-02-19',0,'Awaiting Approval',133123.00,1,1),('d794cfda-77b9-5e2d-a886-c01107d9beaa','a36300f9-6483-5ab2-88f7-99bd91a61487','1','b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','pinjaman','2015-06-03 21:55:11','2015-06-03',1,'Approved',2000000.00,1,0),('d89e248e-6c41-591c-9342-ce219631cc42','a36300f9-6483-5ab2-88f7-99bd91a61487','1','b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','pinjaman ','2015-06-04 23:10:55','2015-06-04',1,'Approved',1500000.00,1,0),('e798b07f-6e2a-5df2-a03f-9a0bd25a81bf','8d2cb3cb-5d08-5573-a9e0-c6b282010c16','1','b4b5bbf5-eead-11e2-8db1-00155d6a1ec9','bahan sprei','2015-06-03 21:17:35','2015-06-01',1,'Approved',1403650.00,1,0);

/*Table structure for table `expense_detail` */

DROP TABLE IF EXISTS `expense_detail`;

CREATE TABLE `expense_detail` (
  `expense_detaiID` char(36) NOT NULL,
  `expense_ID` char(36) DEFAULT NULL,
  `product_ID` char(36) DEFAULT NULL,
  `unit_price` double(10,2) DEFAULT '0.00',
  `expense_note` blob,
  `quantity` double(10,2) DEFAULT '0.00',
  `sub_total` double(10,2) DEFAULT '0.00',
  `reference` varchar(255) DEFAULT NULL,
  `uom` varchar(100) DEFAULT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`expense_detaiID`),
  KEY `FK_expense_detail` (`expense_ID`),
  CONSTRAINT `FK_expense_detail` FOREIGN KEY (`expense_ID`) REFERENCES `expense` (`expense_ID`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `expense_detail` */

insert  into `expense_detail`(`expense_detaiID`,`expense_ID`,`product_ID`,`unit_price`,`expense_note`,`quantity`,`sub_total`,`reference`,`uom`,`dateCreated`,`deleted`) values ('12dbade2-f392-5085-9557-78cb02660c53','e798b07f-6e2a-5df2-a03f-9a0bd25a81bf','dfe62170-e220-5d34-9958-7016a39380ec',28500.00,'',6.50,185250.00,'','Pieces ','2015-06-03 21:17:35',0),('17d54105-c3f8-5122-8f6a-da16612070d7','ca0c7a9d-e7f0-5723-8aea-3f090c23c652','9f47151d-fa51-5d0c-983a-1a19f5ea26a5',24000.00,'',3.80,91200.00,'','Pieces ','2015-06-04 23:13:10',0),('1a66757e-13d1-5bcc-8179-c1f382e06dd1','41e1749d-e2fc-5b89-872f-58507a4fc755','48cca0b6-55f2-5c09-b280-07fca51c65d2',200000.00,'',1.00,200000.00,'','Pieces ','2015-06-03 22:01:31',0),('23e05ebf-d7df-5f08-a0d6-452a193dc7bb','3515075c-6dc9-5bbf-bdd5-53dca6613520','75d266f9-615a-55b6-931b-6de8a0e244a6',15000.00,'-',1.00,15000.00,'','Pieces ','2015-02-18 00:20:51',0),('29d3631a-1a41-5065-a5c9-63c113da4859','08ecc2e0-c55e-5d5f-af86-334698f71f03','48cca0b6-55f2-5c09-b280-07fca51c65d2',600000.00,'',1.00,600000.00,'','Pieces ','2015-06-03 21:34:24',0),('363f2256-3d6c-5e38-9f59-fd06ca0153ac','d89e248e-6c41-591c-9342-ce219631cc42','48cca0b6-55f2-5c09-b280-07fca51c65d2',1500000.00,'',1.00,1500000.00,'','Pieces ','2015-06-04 23:10:55',0),('3e40a30e-4f75-5b32-8cd1-1c80d6f86e66','b257dfdc-dd7f-5530-a360-959442dbfe29','48cca0b6-55f2-5c09-b280-07fca51c65d2',435000.00,'',1.00,435000.00,'','Pieces ','2015-06-03 21:59:11',0),('48462888-d6ed-5c37-a4bc-59d92cf32275','0c1d4dcd-163f-5eb7-b8b1-27ad7d7411c5','da0641cf-0fb3-562f-80d8-48586d3a7c1e',20000.00,'',1.00,20000.00,'','Pieces ','2015-06-03 21:48:05',0),('4a9e0cdd-28f1-5db3-b4d3-152d08cce520','b9d371d2-a6fa-5390-8b99-8807ce934228','dfe62170-e220-5d34-9958-7016a39380ec',28500.00,'',1.70,48450.00,'','Pieces ','2015-06-04 23:19:36',0),('53f219ad-a978-5858-9c65-c5d28983386c','e798b07f-6e2a-5df2-a03f-9a0bd25a81bf','e61d2e1b-36f4-5ea4-ae1c-fe22365c0d95',28000.00,'',41.20,1153600.00,'','Pieces ','2015-06-03 21:17:35',0),('5f4b031a-bcda-512e-acb3-fb5c9c5bf08a','5ef404a2-f4e0-5b2d-97a1-efd722c3cfc0','48cca0b6-55f2-5c09-b280-07fca51c65d2',650000.00,'',1.00,650000.00,'','Pieces ','2015-06-03 21:58:09',0),('5fe3b795-c80f-570d-bd1b-03947f4022e7','6347c8fc-c17b-58b2-b149-7e352a66db51','cc4f1eba-9920-537e-ad41-3306967dbd7e',300000.00,'mailchimp montly fee',1.00,300000.00,'','Pieces ','2015-04-18 13:30:36',0),('62ac9145-5ce1-5c88-9112-10d77811f42a','d794cfda-77b9-5e2d-a886-c01107d9beaa','48cca0b6-55f2-5c09-b280-07fca51c65d2',2000000.00,'',1.00,2000000.00,'','Pieces ','2015-06-03 21:55:11',0),('68966c48-90da-5ca6-becd-3640fe06214b','5cdf0ce2-c149-55ec-872c-5814d02416ba','48cca0b6-55f2-5c09-b280-07fca51c65d2',170000.00,'',1.00,170000.00,'','Pieces ','2015-06-03 21:31:47',0),('6f05b3e9-51d1-580a-b233-aa05b0f53f5d','5cdf0ce2-c149-55ec-872c-5814d02416ba','',600000.00,'',1.00,600000.00,'','Pieces ','2015-06-03 21:26:20',0),('712144dd-2f4d-5338-9b84-5672f59d8123','d247a072-6f76-5032-9821-8d6f01564ccb','75d266f9-615a-55b6-931b-6de8a0e244a6',10000.00,'rambut kering',1.00,10000.00,'-','Pieces ','2015-02-19 07:59:35',0),('741132a7-3b25-5f8a-9064-5200cc32e378','09e89734-6f5e-5ca2-9124-653a6b4025a4','0e7586f5-e0c6-57b8-be1e-1f7e777a76fb',15.00,'benang ',10.00,150.00,'-','Pieces ','2015-04-25 13:01:26',0),('76494ee4-47cb-5978-b2a8-1398c4d4a1a8','4db5b17f-d301-5189-a53d-7c1115b46ff8','0e7586f5-e0c6-57b8-be1e-1f7e777a76fb',15000.00,'ads',10.00,150000.00,'asd','Pieces ','2015-04-18 13:10:08',0),('7a22aa82-27c9-5036-af89-c3a67e0ade59','0202037f-3a8d-5f88-8155-01fac369862d','dfe62170-e220-5d34-9958-7016a39380ec',28500.00,'',12.70,361950.00,'','Pieces ','2015-06-04 23:18:03',0),('7d43f93a-d3f4-537c-844a-81f9bbabb625','3a7a43d1-8984-544b-b19b-1571cba4d144','0c075d73-97f3-5486-9d90-93c4a88f39f1',1500.00,'makan',5.00,7500.00,'','Pieces ','2015-04-18 12:55:28',0),('8364c6a5-5d63-55db-9843-7647d106340b','8d67f5b7-5816-50a7-8b2d-f52c29d5da2a','16840df0-a69d-5803-96a7-4e300702631b',7000.00,'makan cemilan',1.00,7000.00,'','Pieces ','2015-04-18 19:45:56',0),('8c139f96-e630-5651-9000-4a85152d1231','90734506-49b6-5fed-8029-946508158479','16840df0-a69d-5803-96a7-4e300702631b',15000.00,'n',0.00,0.00,'','Pieces ','2015-04-17 00:54:58',0),('8f0d9072-5779-546e-b961-09c5e22f439a','03bee3c3-c176-5b7c-b3ba-2a7af4275311','48cca0b6-55f2-5c09-b280-07fca51c65d2',57000.00,'',1.00,57000.00,'','Pieces ','2015-06-03 22:00:24',0),('924e106c-17eb-5ff5-ae87-8c0f53f6e4fc','2897c12d-387b-5e1d-94e8-10b84dd069bf','dfe62170-e220-5d34-9958-7016a39380ec',28500.00,'',19.60,558600.00,'','Pieces ','2015-06-04 23:16:12',0),('b1fc5ad3-3e7d-525c-bf7e-848c8357a229','9f8cfc5a-81b2-5d58-bb19-3ad257f1a0e2','509ef4b0-68df-5cbc-8cdc-fb87cfb2948f',8950.00,'-',2.35,21032.50,'-','Liter/Liters ','2015-05-21 22:47:36',0),('b7533c6f-2b07-5d24-a394-8b63912e3623','931b0cf4-8aa7-5c63-8c05-81c414676b58','0e7586f5-e0c6-57b8-be1e-1f7e777a76fb',50000.00,'mingguan',5.00,250000.00,'-','Pieces ','2015-04-18 12:11:18',0),('bf2ab867-52ee-5a8c-9ac1-51d1aad162a8','4cb93276-7d67-5621-836c-1aaf5d44192a','0c075d73-97f3-5486-9d90-93c4a88f39f1',15400.00,'makan siang',12.00,184800.00,'-','Pieces ','2015-04-15 02:20:10',0),('d61010f3-dd3a-582f-bcc9-e12ea4a05c35','93bc13ce-020d-5a79-90be-3b80f373243f','9f47151d-fa51-5d0c-983a-1a19f5ea26a5',29000.00,'',3.40,98600.00,'','Pieces ','2015-06-04 23:14:06',0),('d6525aec-070e-559d-9bc5-d5f62fdf6ca6','e798b07f-6e2a-5df2-a03f-9a0bd25a81bf','9f47151d-fa51-5d0c-983a-1a19f5ea26a5',24000.00,'',2.70,64800.00,'','Pieces ','2015-06-03 21:17:35',0),('d727e4bc-3124-5067-83f5-a977256e7992','d247a072-6f76-5032-9821-8d6f01564ccb','2b692d3d-4048-5a67-8354-fc36a9b70ae2',123123.00,'qwe',1.00,123123.00,'123','Pieces ','2015-04-15 03:55:54',0),('dc8469ec-35ed-565b-acd6-e46b2bfea7f3','9f8cfc5a-81b2-5d58-bb19-3ad257f1a0e2','e61d2e1b-36f4-5ea4-ae1c-fe22365c0d95',28000.00,'-',29.00,812000.00,'-','Meter ','2015-05-21 22:45:38',0),('ddd2cd7a-c5db-5977-b9ce-62022aecb1ea','4eb4413c-a93c-5b8c-8168-c25be988d023','e61d2e1b-36f4-5ea4-ae1c-fe22365c0d95',28000.00,'',20.30,568400.00,'','Pieces ','2015-06-04 23:17:10',0),('e991aab1-40c4-55e3-9051-cb013a96b147','9f8cfc5a-81b2-5d58-bb19-3ad257f1a0e2','dfe62170-e220-5d34-9958-7016a39380ec',28500.00,'-',14.60,416100.00,'-','Meter ','2015-05-21 22:45:38',0),('f3414908-7a80-5527-9c3d-70d1e497783e','90734506-49b6-5fed-8029-946508158479','16840df0-a69d-5803-96a7-4e300702631b',123.00,'as',123.00,15129.00,'123','Pieces ','2015-04-16 21:07:00',0);

/*Table structure for table `interview` */

DROP TABLE IF EXISTS `interview`;

CREATE TABLE `interview` (
  `interview_ID` char(36) NOT NULL,
  `deadline` date DEFAULT NULL,
  `survey` char(36) DEFAULT NULL,
  `interviewer_ID` char(36) DEFAULT NULL,
  `employee_ID` char(36) DEFAULT NULL,
  `state` enum('Draft') DEFAULT NULL,
  `appraisal_formID` char(36) DEFAULT NULL,
  PRIMARY KEY (`interview_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `interview` */

insert  into `interview`(`interview_ID`,`deadline`,`survey`,`interviewer_ID`,`employee_ID`,`state`,`appraisal_formID`) values ('1','2014-12-12','qwert','1','1','Draft','1');

/*Table structure for table `job` */

DROP TABLE IF EXISTS `job`;

CREATE TABLE `job` (
  `job_ID` char(36) CHARACTER SET latin1 NOT NULL,
  `job_name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `department_ID` char(36) CHARACTER SET latin1 DEFAULT NULL,
  `job_desc` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `job_requirement` blob,
  `job_expected_requirement` int(10) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `datecreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`job_ID`),
  KEY `FK_job` (`department_ID`),
  CONSTRAINT `FK_job` FOREIGN KEY (`department_ID`) REFERENCES `department` (`department_ID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `job` */

insert  into `job`(`job_ID`,`job_name`,`department_ID`,`job_desc`,`job_requirement`,`job_expected_requirement`,`deleted`,`datecreated`) values ('08af3cf0-7f9c-522c-aa18-c97c463c7bed','Marketing Executive','e3ef5797-db90-5352-bae6-bb930737acba','selling product','selling product',5,0,'2014-10-05 08:52:50'),('0df1f426-6f9a-5064-8485-4f51009677d7','CEO','773d2127-4ed1-5ecf-b764-6a63cc8aeadb','CEO','CEO',1,0,'2015-01-04 14:16:47'),('22607a3a-d3ce-56ec-b69e-8538824076c3','Employee Training','8d874ebe-500d-5cae-a4c3-25725be2c51f','Employee Training','Employee Training',2,0,'2015-01-07 06:57:03'),('28d04d56-5504-591d-9834-4ba64c90adb4','Casier Piutang','a975df69-aaa9-5013-afc0-78a57cf33c3e','menghitung nilai piutang','s1 ekonomi manajemen ',5,0,'2014-09-22 13:42:05'),('2c55e6c1-9de3-586f-afdc-27fe8d2a9bae','Networking','337e1265-8761-5852-96ee-bdeaa844ad8d','Networking','Networking',2,0,'2015-01-04 12:10:31'),('3816ed68-62a7-5492-b103-9ee02c41d27e','12345','f246ce31-15f6-5760-8e80-38ddddd29465','1234','12345',0,1,'2014-10-04 23:50:22'),('3ee96b28-a36c-5724-8d3a-c34aa4407843','Commissioner','d0879a22-7fa7-5e99-8e7a-4d0e0b7f64d9','Commissioner','Commissioner and Funding executive',1,0,'2014-12-29 21:22:17'),('5a57975d-d9f5-5bd8-a9a0-4e33da539b3d','Accounting Manager','f091111b-802c-5281-be46-f2f69f9698f6','Accounting Manager','Accounting Manager',1,0,'2015-04-02 00:04:01'),('5b226cf8-77d7-5fe1-8458-777a3b5ce8b1','Manager IT','b6505476-d53d-561d-97b8-86702fdde674','managing it division','managing it division',1,0,'2014-09-20 16:50:35'),('672c657e-5106-5ac0-b61f-2d13a32989c2','Sales','7c176034-4be9-57fc-ab3f-b76188265bdd','sale credit card to people','sale credit card to people',2,0,'2014-12-25 15:22:32'),('6bd97aa0-44f9-5304-90c8-382936c14510','PHP Programmer','aed7fb01-6a50-585f-a23d-82680c32f9cb','web developer','web developer',12,0,'2014-09-20 16:39:30'),('6dd38b7d-4155-5aa0-bba1-9b9ab62e737f','Penjahit','962260f3-0808-51d4-b735-103c98926370','menjahit sprei bedcover','menjahit sprei bedcover',2,0,'2015-04-18 11:52:22'),('6e688f39-4372-532e-9d73-74c88b20c85a','Employee Recruitment','8d874ebe-500d-5cae-a4c3-25725be2c51f','Employee Recruitment','Employee Recruitment',3,0,'2015-01-04 14:12:19'),('854615ba-80a2-54b9-a4f5-99bab1688b35','CEO','d0879a22-7fa7-5e99-8e7a-4d0e0b7f64d9','Owner and Responsibility','Founder Company',1,0,'2014-12-28 15:18:59'),('89c05cad-bd90-5e5b-a1aa-eab3f2c79cc1','PR CEO','8d874ebe-500d-5cae-a4c3-25725be2c51f','Personal Relationship','Personal Relationship',1,0,'2015-03-07 09:28:51'),('a1ba9658-3003-5eee-a513-b6b4ea90427d','Accounting IT','b6505476-d53d-561d-97b8-86702fdde674','Accounting IT','Accounting IT',1,0,'2014-09-20 17:30:30'),('a87636a0-0c4a-5603-aa23-a721dffe85e5','DE','c5a2ae00-0110-5613-b5fd-380078ee08e5','fe','',0,1,'2014-10-04 23:55:54'),('accd1a39-bc6b-577c-8ca8-ba588f8e8ec2','packing kain','fe6bd373-c6ef-58df-93cb-ac57ff261551','packing kain yang telah dijahit','tamat SMA',3,0,'2015-04-12 16:23:22'),('bad6ddd9-c231-5473-9a63-0567494f0497','Management Employee','830c62fa-6773-5723-abcb-261ea930b6b7','Management Employee','Management Employee',1,0,'2015-04-01 23:53:57'),('cc7ebf98-86e5-50c4-afe6-00728f6f3ea3','Manage Database Server','541e65b8-0a0d-500e-a9a1-e010679656b0','Manage all database daily','mysql, php, java, SQL ',1,0,'2015-02-19 08:07:18'),('dcd6b5a6-74ac-5255-a4ca-c199e33f9503','Manager','bbd50a82-883c-50d5-a36b-2b3012435137','Manager','Manager',1,0,'2015-04-02 00:00:47'),('dceee31d-1f57-557f-a086-ccda51b07b5a','Manager','37eed971-3fe7-5b0e-a1d9-e98f3646e5ab','Manager','Manager',1,0,'2015-01-17 12:18:24'),('f8c0f795-dc59-5556-b6f1-b1aba49a3714','Designer','0db60258-9378-5f57-8d9c-923cf1801247','Designer','Designer',3,0,'2015-01-17 12:13:30');

/*Table structure for table `leave` */

DROP TABLE IF EXISTS `leave`;

CREATE TABLE `leave` (
  `leave_ID` char(36) NOT NULL,
  `leave_typeID` char(36) DEFAULT NULL,
  `employee_ID` char(36) DEFAULT NULL,
  `signature_byID` char(36) DEFAULT NULL COMMENT 'employeeID whoose sign letter',
  `note` blob,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `total_leaves` int(3) DEFAULT '0',
  `uploadfile_url` varchar(255) DEFAULT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `approved` tinyint(1) DEFAULT '0',
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`leave_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `leave` */

insert  into `leave`(`leave_ID`,`leave_typeID`,`employee_ID`,`signature_byID`,`note`,`date_start`,`date_end`,`total_leaves`,`uploadfile_url`,`dateCreated`,`approved`,`deleted`) values ('289b68ab-c243-53d4-88b7-1eb7d4be0cbe','2','b49c5c33-6851-5723-a5e4-b27800','122ab75e-7f18-5818-861d-fc86db','umrah ','2015-03-31','2015-04-11',8,NULL,'2015-04-11 20:21:37',1,0),('301b55ac-5dfc-5a26-9e58-1571ee395a58','2','1','7da87597-705f-5b1e-b85b-16495f','asd','2015-04-16','2015-04-22',5,NULL,'2015-04-17 01:26:40',-1,0),('87064b9d-9766-5fbc-89c5-2bcb3b9b5a1f','2','912d0912-711c-59de-a122-2b5418','1','asd','2015-04-16','2015-04-30',11,NULL,'2015-04-17 01:05:29',-1,0),('945b37d0-43d2-5da6-b2b4-fcebb5ffd091','621a1725-7677-53df-9b16-aca59a9ad87d','f5b23572-01a7-5dd1-89a1-ec26b5','122ab75e-7f18-5818-861d-fc86db','cuti hamil','2015-04-11','2015-04-13',1,NULL,'2015-04-11 20:31:37',1,0),('99f4ad58-ccb7-54d9-83ef-363ac8dd3e85','2','1','7da87597-705f-5b1e-b85b-16495f','pulang kampung','2015-04-11','2015-04-15',3,NULL,'2015-04-12 01:07:12',1,0),('ab7cffb6-c7ee-5448-9978-86d582811686','2','f5b23572-01a7-5dd1-89a1-ec26b5','122ab75e-7f18-5818-861d-fc86db','','2015-04-11','2015-04-14',2,NULL,'2015-04-11 20:34:05',1,0),('ef488466-4699-51ff-84db-6d0dcee535b1','621a1725-7677-53df-9b16-aca59a9ad87d','1','7da87597-705f-5b1e-b85b-16495f','cuti bersalin','2015-04-11','2015-04-16',4,NULL,'2015-04-12 01:40:42',1,0);

/*Table structure for table `leave_type` */

DROP TABLE IF EXISTS `leave_type`;

CREATE TABLE `leave_type` (
  `leave_typeID` char(36) NOT NULL,
  `leave_type_name` varchar(255) DEFAULT NULL,
  `description` blob,
  `limit_days` int(3) DEFAULT '0' COMMENT 'limit each year',
  `payroll_deduction` tinyint(1) DEFAULT '0',
  `holiday_stat` tinyint(1) DEFAULT '0',
  `date_color` enum('red','yellow','green') DEFAULT NULL,
  `dateCreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`leave_typeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `leave_type` */

insert  into `leave_type`(`leave_typeID`,`leave_type_name`,`description`,`limit_days`,`payroll_deduction`,`holiday_stat`,`date_color`,`dateCreated`,`deleted`) values ('1','Hari Libur Nasional 2015','Hari Libur Nasional 2015',15,0,1,'red','2015-02-08 07:59:59',0),('2','Cuti tahunan','cuti tahunan pegawai',14,0,0,'yellow','2015-02-08 08:00:33',0),('3','Sakit ','Cuti sakit tahun',3,0,0,'yellow','2015-02-08 08:01:19',0),('529f8bab-0533-514b-8402-9aa522710036','Absent','No Text absent',0,1,0,'yellow','2015-02-18 20:56:28',1),('577611c0-1f46-5019-ac1e-f14ccd9a1831','Libur Kantor','kebijakan kantor',1,0,0,'red','2015-02-08 08:31:20',1),('621a1725-7677-53df-9b16-aca59a9ad87d','Cuti Bersalin','Cuti bersalin untuk ibu ibu',60,0,0,'green','2015-04-11 10:15:07',0),('7c7f4744-64ee-5f3c-947f-9bb5d133df59','Ulang Tahun Owner (Bpk Wawan)','Free Time & lunch',1,0,0,'yellow','2015-02-15 11:59:54',1),('7d066270-e260-5a2d-8f64-c93ee426355f','','',0,0,0,'red','2015-02-19 08:20:19',1),('e28e466f-2997-515c-9668-238500ff584a','Kick Off','Kick Off starting year proggram',1,0,0,'green','2015-02-15 17:30:32',1);

/*Table structure for table `leave_type_date` */

DROP TABLE IF EXISTS `leave_type_date`;

CREATE TABLE `leave_type_date` (
  `leave_type_dateID` char(36) NOT NULL,
  `leave_typeID` char(36) DEFAULT NULL,
  `date_allow` date DEFAULT NULL,
  `note` blob,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`leave_type_dateID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `leave_type_date` */

insert  into `leave_type_date`(`leave_type_dateID`,`leave_typeID`,`date_allow`,`note`,`dateCreated`,`deleted`) values ('0035849a-e634-5035-9b4b-02265ab71ed6','1','2015-05-16','Isra Mi\'raj Nabi Muhammad SAW ','2015-02-11 20:41:54',0),('09753325-a2e3-53b4-8a11-21f71fcd2198','1','2015-08-17','Hari Kemerdekaan RI','2015-02-11 20:45:49',0),('0b6e46ca-b838-5ec3-8ede-c6cce7573fb3','e3c8b7da-d431-51ff-aa21-62eef00d364d','2015-02-03','qwe','2015-02-08 11:46:32',0),('0dad4ec4-370b-5e41-b704-4ce043b7ddd0','1','2015-04-03','Wafat Isa Almasih','2015-02-11 20:41:53',0),('1','1','2015-01-01','Tahun Baru 2015','2015-02-08 09:41:03',0),('15b01257-a9e6-5483-86b8-24a4afab50ea','577611c0-1f46-5019-ac1e-f14ccd9a1831','1970-01-01','a','2015-02-08 12:16:52',1),('18b377ff-85a0-58e4-9fb1-986d0faeadbc','1','1970-01-01','asd','2015-02-08 18:23:42',1),('368b3f81-4615-5b5f-8afa-3c8ea353f7af','7c7f4744-64ee-5f3c-947f-9bb5d133df59','2015-03-10','Birthday Owner','2015-02-15 11:59:54',0),('3e03b24d-2eec-504f-80f0-e985f4927294','1','2015-03-21','Hari Raya Nyepi Tahun Baru Saka 1937','2015-02-11 20:41:53',0),('4590bbe1-5c8c-5ae9-bd34-501c9ff055cc','1','2015-06-02','Hari Raya Waisak 2559','2015-02-11 20:41:54',0),('4b28699e-5076-5ba3-a0c3-7342abefedf4','1','2015-10-14','Tahun Baru 1437 Hijriyah','2015-02-11 20:45:49',0),('5044ecf3-d503-538b-b66a-759b67e3f07f','1','1970-01-01',NULL,'2015-02-08 18:29:10',1),('74fa09d5-04ee-5cae-8c3f-7dcebd45f69c','1','2015-05-14','Kenaikan Yesus Kristus','2015-02-11 20:41:54',0),('8158f420-18ab-55e1-b31e-f4b236c5c24f','3ccd0691-1f69-5fef-868c-f444165f8145','2015-02-02','asdnya1','2015-02-08 12:06:56',0),('84ba0ff1-cb4d-5017-bbd2-325260653fa3','1','2015-07-17','Hari Raya Idul Fitri 1436 Hijriyah','2015-02-11 20:41:54',0),('87303c5b-eb69-53c4-b9ef-60866d568dc2','1','1970-01-01','asdasd','2015-02-08 18:21:18',1),('989bc680-a4b6-5b4b-b189-b873c43cee18','1','2015-12-25','Hari Raya Natal','2015-02-11 20:45:49',0),('9b3587ed-2e3d-5ef7-ba61-268b7549b513','1','2015-02-19','Tahun Baru Imlek 2566 Kongzili','2015-02-08 14:08:02',0),('9f952344-8db7-5549-9cef-99f90cee8a17','3ccd0691-1f69-5fef-868c-f444165f8145','2015-02-03','qwe','2015-02-08 12:06:56',0),('ac31ba73-3949-5a44-add9-b278d7c16e10','577611c0-1f46-5019-ac1e-f14ccd9a1831','1970-01-01','1','2015-02-08 12:14:35',1),('acc4f7db-4845-5e3f-941f-e2593c9d7123','e28e466f-2997-515c-9668-238500ff584a','2015-01-12','Kick Off 2015','2015-02-15 17:30:32',0),('b39dd634-6860-5b0e-957b-ef7388f9f191','1','2015-09-24','Hari Raya Idul Adha 1436 Hijriyah','2015-02-11 20:45:49',0),('baba73ae-e9b2-53d2-b5b0-ee58b7215041','577611c0-1f46-5019-ac1e-f14ccd9a1831','1970-01-01','asda','2015-02-08 12:13:11',1),('c0ac4420-4bff-5139-bc7d-83c5aff7ef05','1','1970-01-01',NULL,'2015-02-08 18:29:10',1),('c8eab816-e144-5ed8-81eb-79a2cf2b986b','1','1970-01-01','asdlagi','2015-02-08 18:26:34',1),('cede5581-a1aa-52fa-824d-4f8b16120d67','1','2015-05-01','Hari Buruh Internasional','2015-02-11 20:41:54',0),('e080175d-1dfb-5168-bc33-150f5007070b','1','2015-02-03','Maulid Nabi Muhammad SAW','2015-02-08 12:34:57',0),('e1196d05-2e40-5a98-85b2-82478d7afe68','577611c0-1f46-5019-ac1e-f14ccd9a1831','1970-01-01','asd','2015-02-08 12:12:15',1),('e2a03c56-6851-5272-bf65-e857ff746559','e3c8b7da-d431-51ff-aa21-62eef00d364d','2015-02-04','qwee','2015-02-08 11:46:32',0),('f425a415-ec41-5a8e-bb80-381e3c570d7c','1','2015-07-18','Hari Raya Idul Fitri 1436 Hijriyah','2015-02-11 20:41:54',0),('f9b7f735-492e-574b-9b28-b7ada54878db','1','1970-01-01',NULL,'2015-02-08 18:29:10',1);

/*Table structure for table `material_request` */

DROP TABLE IF EXISTS `material_request`;

CREATE TABLE `material_request` (
  `material_requestID` char(36) NOT NULL,
  `material_request_no` varchar(36) DEFAULT NULL,
  `employee_ID` char(36) DEFAULT NULL,
  `material_request_typeID` char(36) DEFAULT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`material_requestID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `material_request` */

/*Table structure for table `material_request_type` */

DROP TABLE IF EXISTS `material_request_type`;

CREATE TABLE `material_request_type` (
  `material_request_typeID` char(36) NOT NULL,
  `type_name` varchar(100) DEFAULT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`material_request_typeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `material_request_type` */

/*Table structure for table `meeting` */

DROP TABLE IF EXISTS `meeting`;

CREATE TABLE `meeting` (
  `meeting_ID` char(36) NOT NULL,
  `meeting_title` varchar(100) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `allday` tinyint(1) DEFAULT '0',
  `duration` varchar(100) DEFAULT NULL,
  `reminder` varchar(100) DEFAULT NULL,
  `recurrent` tinyint(1) DEFAULT '0',
  `responsible_ID` char(36) DEFAULT NULL COMMENT 'employee_ID reponse',
  `partner_ID` char(36) DEFAULT NULL,
  `location` blob,
  `description` blob,
  `deleted` tinyint(1) DEFAULT '0',
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`meeting_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `meeting` */

insert  into `meeting`(`meeting_ID`,`meeting_title`,`summary`,`start_date`,`end_date`,`allday`,`duration`,`reminder`,`recurrent`,`responsible_ID`,`partner_ID`,`location`,`description`,`deleted`,`dateCreated`) values ('','a','asd','0000-00-00','0000-00-00',0,'1','1 minute before',0,'02f67708-b01e-5831-a987-658552','87778cc7-f3c5-5a2f-b634-040de0461c43','asd','asd',0,'2015-08-02 17:59:29'),('1','asd','asd',NULL,NULL,1,'1','1',1,'1','1',NULL,NULL,0,'2015-07-11 15:25:08'),('e8623da9-0557-5781-9e2d-7981463c6084','asdqwe','asdqwe','2015-07-27','2015-08-05',0,'1','40 minutes before',0,'1','87778cc7-f3c5-5a2f-b634-040de0461c43','1','asd',0,'2015-08-02 18:50:01');

/*Table structure for table `meeting_invitation` */

DROP TABLE IF EXISTS `meeting_invitation`;

CREATE TABLE `meeting_invitation` (
  `meeting_invatationID` char(36) NOT NULL,
  `meeting_ID` char(36) DEFAULT NULL,
  `to_ID` char(36) DEFAULT NULL,
  `role` enum('Participant','Chair person') DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `dateCreated` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`meeting_invatationID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `meeting_invitation` */

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `menu_ID` char(36) CHARACTER SET latin1 NOT NULL,
  `menu_name` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `menu_desc` varchar(128) CHARACTER SET latin1 DEFAULT NULL,
  `menu_url` varchar(128) CHARACTER SET latin1 DEFAULT NULL,
  `menu_class` varchar(128) CHARACTER SET latin1 DEFAULT NULL,
  `menu_icon` varchar(128) CHARACTER SET latin1 DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`menu_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `menu` */

insert  into `menu`(`menu_ID`,`menu_name`,`menu_desc`,`menu_url`,`menu_class`,`menu_icon`,`deleted`) values ('1','Project','Project','project','magenta','icon-bar-chart',0),('10','Asset','Asset','asset','bondi-blue','icon-list-alt',0),('2','Purchase','Purchase','purchase','grey','icon-shopping-cart',0),('3','Finance','Finance','finance','dark-yellow','icon-money',0),('4','HRD','HRD','hrd','blue-violate','icon-group',0),('5','CRM','CRM','crm','blue','icon-briefcase',0),('6','POS','POS','pos','cocolate','icon-truck',0),('7','Warehouse','Warehouse','warehouse','brown','icon-hdd',0),('8','Manufacture','Manufacture','manufacture','orange','icon-wrench',0),('9','Payroll','Payroll','payroll','green','icon-credit-card',0);

/*Table structure for table `partner` */

DROP TABLE IF EXISTS `partner`;

CREATE TABLE `partner` (
  `partner_ID` char(36) NOT NULL,
  `partner_name` varchar(100) DEFAULT NULL,
  `description` blob,
  `contact_person` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fax` varchar(30) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `address` blob,
  `website` varchar(30) DEFAULT NULL,
  `postcode` varchar(6) DEFAULT NULL,
  `vendor_stat` tinyint(1) DEFAULT '0' COMMENT '0:customer;1:vendor',
  `deleted` tinyint(1) DEFAULT '0',
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`partner_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `partner` */

insert  into `partner`(`partner_ID`,`partner_name`,`description`,`contact_person`,`email`,`fax`,`phone`,`address`,`website`,`postcode`,`vendor_stat`,`deleted`,`dateCreated`) values ('1','asd',NULL,'asd','as','as','as','asd','asd','123',0,1,'2015-06-20 15:28:35'),('18dae4a4-273d-5afe-86ff-3e652d667afc','qwe','qwe','qwe','qwe','qwe','qwe','qwe','qwe','qwe',0,1,'2015-06-20 16:14:18'),('87778cc7-f3c5-5a2f-b634-040de0461c43','PT. Profita Group','asdasd','Marwan','marwan@profita.com','02133221','087767267','Jl. Cemara no 67 pamulang','www.profita.com','12345',0,0,'2015-07-11 14:49:26'),('88f67afe-5314-5e46-8c9e-6bdd1ace8b8b','zxc','zxc','zxc','zxc','zxc','zxc','zxc','zxc','zxc',0,1,'2015-06-20 16:18:25'),('92ecdacc-76a5-52a7-9e27-f8483b9e44fc','PTPN V','asdasd','Arif','arif@ptpnv.co.id','076121003','076121003','Jl. Rambutan no 67-68 a','www.ptpnv.co.id','123456',0,0,'2015-06-27 13:21:45'),('df17f8e6-3eb4-57d2-836f-772de1ff5d86','asd','','asd','asd@asd.fo','','123','','','',0,1,'2015-07-25 22:23:58');

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `product_ID` char(36) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_desc` blob,
  `product_code` varchar(255) DEFAULT NULL,
  `UoM_ID` char(36) DEFAULT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`product_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `product` */

insert  into `product`(`product_ID`,`product_name`,`product_desc`,`product_code`,`UoM_ID`,`dateCreated`,`deleted`) values ('0c075d73-97f3-5486-9d90-93c4a88f39f1','Nutri Jell Mangga','Nutri Jell Mangga Size/Weight:	15gr','8992933216110','1','2015-02-17 23:17:03',1),('0e7586f5-e0c6-57b8-be1e-1f7e777a76fb','benang jahit warna merah taylor','benang jahit warna merah taylor','2015041807104528','1','2015-04-18 12:10:45',1),('16840df0-a69d-5803-96a7-4e300702631b','Potato Chips Pringles Flavor Original 110 g.','Potato Chips Pringles Flavor Original 110 g.','8886467100017','1','2015-02-17 23:22:27',1),('2b692d3d-4048-5a67-8354-fc36a9b70ae2','Energen - Kacang Hijau','Energen - Kacang Hijau 30gr','8996001440087','1','2015-02-17 23:17:41',1),('314adf44-b286-55be-9352-428671e181db','Bolt SLIM Mobile WIFI','Bolt SLIM Mobile WIFI','9992238032','1','2015-02-17 23:18:41',0),('32058542-a306-51cf-8de3-75e5a6f13f97','qwe','qwe','123','1','2015-05-03 19:57:38',1),('48cca0b6-55f2-5c09-b280-07fca51c65d2','Sprei ','','2015060304245629','1','2015-06-03 21:24:56',0),('509ef4b0-68df-5cbc-8cdc-fb87cfb2948f','BBM Super Sell','pembelian bahan bakar operasional','SELLSUPER','43','2015-05-21 22:32:20',0),('5dc0bf5b-d140-57a3-a1db-c4fdec56c1bf','BB Curve 8530','Mobile phone BB Curve 8530 CDMA','234567891','1','2015-05-02 23:11:32',0),('75d266f9-615a-55b6-931b-6de8a0e244a6','Dove hairtherapy 6 granule','Dove hairtherapy 6 granule','8999999036270','1','2015-02-17 23:35:51',1),('862ceede-736d-53f6-84fa-80dd1017e267','Keji beling 25gr','Keji beling 25gr obat perut','2015021705262315','1','2015-02-17 23:26:23',1),('8b01cdc2-9b44-5840-9bdf-c99ef5d397d2','Bahan Katun Jepang','Bahan Katun Jepang','BAHANKJ','46','2015-05-21 22:39:08',0),('8ec21214-f427-57b5-b25d-dacfd4ac75f3','Gunting kecil','Gunting kecil','2015052304390678','1','2015-05-23 09:39:06',0),('9f47151d-fa51-5d0c-983a-1a19f5ea26a5','Bahan mukena KJ','','2015060304163970','1','2015-06-03 21:16:39',0),('c7e300ae-f087-5f95-89ee-8bdcd8b341e1','Indofood Bumbu Racik Nasi Goreng ','Indofood Bumbu Racik Nasi Goreng (instant Seasoning For Fried Rice) - 0.7oz','089686386011','1','2015-02-17 23:23:24',1),('cc4f1eba-9920-537e-ad41-3306967dbd7e','mailchimp ','mailchimp sender','2015041808301043','1','2015-04-18 13:30:10',1),('cc84b9ce-076c-5723-9092-635040a39499','Lion Star Drinking Bootle Plastic','Lion Star Drinking Bootle Plastic','8999979002479','1','2015-02-17 23:21:21',1),('da0641cf-0fb3-562f-80d8-48586d3a7c1e','pulsa','','2015060304472560','1','2015-06-03 21:47:25',0),('df6f1ed3-0d00-52cd-bcd1-5847329fcaa1','Vacum dempo','vacum dempo','2015061307091321','1','2015-06-13 12:09:13',0),('dfdf7153-99d2-53b2-af2e-a671045b932a','','','2015021705404858','1','2015-02-17 23:40:48',1),('dfe62170-e220-5d34-9958-7016a39380ec','Bahan Star','bahan star','BAHANSTAR','46','2015-05-21 22:38:08',0),('e61d2e1b-36f4-5ea4-ae1c-fe22365c0d95','Bahan Viena Nikita Panca','Bahan Viena Nikita Panca','BAHANVIENANIKITAPANCA','46','2015-05-21 22:38:35',0);

/*Table structure for table `project` */

DROP TABLE IF EXISTS `project`;

CREATE TABLE `project` (
  `project_ID` char(36) CHARACTER SET latin1 NOT NULL,
  `project_name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `department_ID` char(36) CHARACTER SET latin1 DEFAULT NULL,
  `status` enum('pending','finish','active') CHARACTER SET latin1 DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `datecreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `billable` tinyint(1) DEFAULT '0' COMMENT '0=tidak;1=iya',
  `hourly_rate` double(10,2) DEFAULT '0.00',
  `fix_ammount` double(10,2) DEFAULT '0.00',
  PRIMARY KEY (`project_ID`),
  KEY `FK_project` (`department_ID`),
  CONSTRAINT `FK_project` FOREIGN KEY (`department_ID`) REFERENCES `department` (`department_ID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `project` */

insert  into `project`(`project_ID`,`project_name`,`department_ID`,`status`,`deleted`,`datecreated`,`billable`,`hourly_rate`,`fix_ammount`) values ('03e2903e-d056-5ea1-bb34-a545453eeb8e','Meet up to merchants','773d2127-4ed1-5ecf-b764-6a63cc8aeadb','active',1,'2015-04-12 21:09:04',0,0.00,0.00),('14d7b9ff-55e9-52ac-9d90-b782dc7c4662','HRD fix','aed7fb01-6a50-585f-a23d-82680c32f9cb','active',0,'2015-01-25 06:27:13',0,0.00,0.00),('24f665bd-92be-5e90-978b-a59da9bb8e15','HRD go AWS','aed7fb01-6a50-585f-a23d-82680c32f9cb','active',0,'2015-02-19 07:43:29',0,0.00,0.00),('51346c5c-0fe6-53a1-b1f1-a1b623c9178b','Mukena','962260f3-0808-51d4-b735-103c98926370','active',0,'2015-05-21 22:24:46',0,0.00,0.00),('7af8974d-0a85-51e6-8b46-089c24192db3','Hotel Aryaduta','962260f3-0808-51d4-b735-103c98926370','active',1,'2015-04-12 16:33:13',0,0.00,0.00),('a056f91c-6b54-59c3-8ac1-4a348505c5a2','Mobile Apps','bbd50a82-883c-50d5-a36b-2b3012435137','active',0,'2015-04-02 07:08:30',0,0.00,0.00),('a1dbf937-234f-5e42-ba0b-6bbfd83a4c06','Sprei Bedcover','962260f3-0808-51d4-b735-103c98926370','active',0,'2015-05-21 22:24:35',0,0.00,0.00),('a884ecb9-167a-5430-94b4-0907484a95d9','Listing Employee','37eed971-3fe7-5b0e-a1d9-e98f3646e5ab','active',0,'2015-01-17 12:57:01',0,0.00,0.00),('b080ac83-afd4-5eb2-a40c-46af86bebe99','Dana Masuk','8319a2eb-7203-50f3-a63f-370f2b952e64','active',0,'2015-06-03 21:20:27',0,0.00,0.00),('b47e07dc-6b31-5eac-9fa7-5537c652b83f','Kak Neneng','962260f3-0808-51d4-b735-103c98926370','active',1,'2015-05-21 22:22:43',0,0.00,0.00),('bb72f3d6-923f-5606-88c9-9e359f28fd20','Homeset','962260f3-0808-51d4-b735-103c98926370','active',0,'2015-05-21 22:25:00',0,0.00,0.00),('bc18a2f3-d2b8-57f8-bdb1-a13004740c8a','Suplain makanan minuman kantor','7a7a73ba-e646-5933-a2df-ef58a61ecedc','active',1,'2015-04-18 12:19:00',0,0.00,0.00),('d08a8934-b15e-59b0-aef7-5da3ddebe611','Hotel Aryaduta','fe6bd373-c6ef-58df-93cb-ac57ff261551','active',1,'2015-04-12 16:33:41',0,0.00,0.00),('d6f8991a-55b7-516f-a45a-02270e2635c7','Laporan Tahunan ','f091111b-802c-5281-be46-f2f69f9698f6','active',0,'2015-04-02 00:08:24',0,0.00,0.00),('e568954a-3809-5d66-aef9-c150941c27af','asd','ba124829-b533-5c8b-b06a-c733d3e08889','active',1,'2015-02-08 11:27:12',0,0.00,0.00);

/*Table structure for table `purchase` */

DROP TABLE IF EXISTS `purchase`;

CREATE TABLE `purchase` (
  `purchase_ID` char(36) NOT NULL,
  `purchase_name` varchar(100) DEFAULT NULL,
  `purchase_no` varchar(36) DEFAULT NULL,
  `employee_ID` char(36) DEFAULT NULL COMMENT 'author',
  `currency_ID` char(36) DEFAULT NULL,
  `vendor_ID` char(36) DEFAULT NULL,
  `shipping_ID` char(36) DEFAULT NULL,
  `billing_ID` char(36) DEFAULT NULL,
  `remark` blob,
  `term` blob,
  `attachment_url` varchar(200) DEFAULT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`purchase_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `purchase` */

/*Table structure for table `purchase_approval` */

DROP TABLE IF EXISTS `purchase_approval`;

CREATE TABLE `purchase_approval` (
  `purchase_approvalID` char(36) NOT NULL,
  `purchase_ID` char(36) DEFAULT NULL,
  `employee_ID` char(36) DEFAULT NULL,
  `status` enum('approved','refused') DEFAULT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`purchase_approvalID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `purchase_approval` */

/*Table structure for table `purchase_detail` */

DROP TABLE IF EXISTS `purchase_detail`;

CREATE TABLE `purchase_detail` (
  `purchase_detailID` char(36) NOT NULL,
  `purchase_ID` char(36) DEFAULT NULL,
  `product_ID` char(36) DEFAULT NULL,
  `material_requestID` char(36) DEFAULT NULL,
  `price` double(12,2) DEFAULT '0.00',
  `quantity` double(12,2) DEFAULT '0.00',
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`purchase_detailID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `purchase_detail` */

/*Table structure for table `salarylog` */

DROP TABLE IF EXISTS `salarylog`;

CREATE TABLE `salarylog` (
  `salarylog_ID` char(36) NOT NULL,
  `period_start` date DEFAULT NULL,
  `period_end` date DEFAULT NULL,
  `employee_ID` char(36) DEFAULT NULL,
  `total_allowance` double(12,2) DEFAULT '0.00',
  `total_deduction` double(12,2) DEFAULT '0.00',
  `total_tax` double(12,2) DEFAULT '0.00',
  `total_takehome` double(12,2) DEFAULT '0.00',
  `deleted` tinyint(1) DEFAULT '0',
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`salarylog_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `salarylog` */

/*Table structure for table `salarylog_detail` */

DROP TABLE IF EXISTS `salarylog_detail`;

CREATE TABLE `salarylog_detail` (
  `salarylog_detailID` char(36) NOT NULL,
  `salarylog_ID` char(36) DEFAULT NULL,
  `allowance_ID` char(36) DEFAULT NULL,
  `nvalue` double(12,2) DEFAULT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`salarylog_detailID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `salarylog_detail` */

/*Table structure for table `shipping` */

DROP TABLE IF EXISTS `shipping`;

CREATE TABLE `shipping` (
  `shipping_ID` char(36) NOT NULL,
  `shipping_name` varchar(100) DEFAULT NULL,
  `address` blob,
  `postcode` varchar(10) DEFAULT NULL,
  `state_ID` char(36) DEFAULT NULL,
  `city_ID` char(36) DEFAULT NULL,
  `country_ID` char(36) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`shipping_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `shipping` */

insert  into `shipping`(`shipping_ID`,`shipping_name`,`address`,`postcode`,`state_ID`,`city_ID`,`country_ID`,`deleted`,`dateCreated`) values ('1','Alamat Rumah','Jl. Muchtarudin pav 13A',NULL,NULL,NULL,NULL,0,'2015-05-24 18:57:45'),('2f311241-02f6-5d78-9ee1-cca7da8bf422','Alamat Kantor','Jl. Iskandarsyah Raya Gd. Iskandarsyah lt 8 PT. WINS Global',NULL,NULL,NULL,NULL,0,'2015-05-24 19:06:19');

/*Table structure for table `state` */

DROP TABLE IF EXISTS `state`;

CREATE TABLE `state` (
  `state_ID` char(36) NOT NULL,
  `state_name` varchar(30) NOT NULL,
  `country_ID` char(36) NOT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`state_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `state` */

insert  into `state`(`state_ID`,`state_name`,`country_ID`,`deleted`) values ('1','NANGGROE ACEH DARUSSALAM','101',0),('10','JAWA TIMUR','101',0),('11','KALIMANTAN BARAT','101',0),('12','KALIMANTAN SELATAN','101',0),('13','KALIMANTAN TENGAH','101',0),('14','KALIMANTAN TIMUR','101',0),('15','KALIMANTAN UTARA','101',0),('16','KEPULAUAN BANGKA BELITUNG','101',0),('17','KEPULAUAN RIAU','101',0),('18','LAMPUNG','101',0),('19','MALUKU UTARA','101',0),('2','BALI','101',0),('20','MALUKU','101',0),('21','NUSA TENGGARA BARAT','101',0),('22','NUSA TENGGARA TIMUR','101',0),('23','PAPUA','101',0),('24','PAPUA BARAT','101',0),('25','RIAU','101',0),('26','SULAWESI BARAT','101',0),('27','SULAWESI SELATAN','101',0),('28','SULAWESI TENGAH','101',0),('29','SULAWESI TENGGARA','101',0),('3','BANTEN','101',0),('30','SULAWESI UTARA','101',0),('31','SUMATRA BARAT','101',0),('32','SUMATRA SELATAN','101',0),('33','SUMATRA UTARA','101',0),('34','YOGYAKARTA','101',0),('4','BENGKULU','101',0),('5','GORONTALO','101',0),('6','JAKARTA','101',0),('7','JAMBI','101',0),('8','JAWA BARAT','101',0),('9','JAWA TENGAH','101',0);

/*Table structure for table `task` */

DROP TABLE IF EXISTS `task`;

CREATE TABLE `task` (
  `task_ID` char(36) CHARACTER SET latin1 NOT NULL,
  `task_name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `project_ID` char(36) CHARACTER SET latin1 DEFAULT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`task_ID`),
  KEY `FK_task` (`project_ID`),
  CONSTRAINT `FK_task` FOREIGN KEY (`project_ID`) REFERENCES `project` (`project_ID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `task` */

insert  into `task`(`task_ID`,`task_name`,`project_ID`,`datecreated`,`deleted`) values ('004eef28-7b01-58f3-bee6-b1bd2451d7fa','Fix HR Modul','14d7b9ff-55e9-52ac-9d90-b782dc7c4662','2015-01-25 06:27:29',0),('1d2992e6-39e5-57d1-b4ab-bd24f1832461','Gunting kain','7af8974d-0a85-51e6-8b46-089c24192db3','2015-04-12 21:12:10',1),('1fc9d0ea-69c7-5ba8-9a04-575de6e4d069','Mukena Task','51346c5c-0fe6-53a1-b1f1-a1b623c9178b','2015-05-21 22:26:34',0),('20f70264-e55d-5868-8ed9-d566332bace2','AWS Prepare','24f665bd-92be-5e90-978b-a59da9bb8e15','2015-02-19 07:43:42',0),('2f286f78-b559-557b-8d75-15987aa31022','kartu kredit','b080ac83-afd4-5eb2-a40c-46af86bebe99','2015-06-03 21:53:35',1),('32865e61-986a-5f53-8f9f-b770873f7983','Mukena Ity','51346c5c-0fe6-53a1-b1f1-a1b623c9178b','2015-05-21 22:25:55',1),('34f0f1a1-7a96-538f-b068-d2848f7fa8aa','kartu kredit','b080ac83-afd4-5eb2-a40c-46af86bebe99','2015-06-03 21:52:53',1),('351e64ba-6e7c-5a48-bebb-631e98fbcf70','kartu kredit','b080ac83-afd4-5eb2-a40c-46af86bebe99','2015-06-03 21:52:54',1),('36aa6d97-bb03-54e1-b913-e0f7289eaf26','asd','e568954a-3809-5d66-aef9-c150941c27af','2015-02-08 11:27:18',1),('3c7291d9-8500-519c-afb3-255598e220c1','kartu kredit','b080ac83-afd4-5eb2-a40c-46af86bebe99','2015-06-03 21:53:40',1),('4db96b51-7ae0-5529-9096-e151c1a0e191','kartu kredit','b080ac83-afd4-5eb2-a40c-46af86bebe99','2015-06-03 21:53:13',1),('51ecf601-e8fc-5bad-a10c-029fe484334c','meeting to lazada','03e2903e-d056-5ea1-bb34-a545453eeb8e','2015-04-12 21:09:35',1),('567c2d9b-3a64-5205-a02a-006ef7e9de75','laporan bulanan ','d6f8991a-55b7-516f-a45a-02270e2635c7','2015-04-02 19:42:25',0),('5cf87f27-7a5a-54c0-ae6b-f2c8107ae5ca','Pembayaran Order','b080ac83-afd4-5eb2-a40c-46af86bebe99','2015-06-03 21:21:55',0),('609c7145-2f0a-5d15-91db-77eba109f873','Suntikan dana ','b080ac83-afd4-5eb2-a40c-46af86bebe99','2015-06-13 11:30:50',1),('715ac770-3a42-5aff-9154-b19a80f3d6a9','Mukena Enik','51346c5c-0fe6-53a1-b1f1-a1b623c9178b','2015-05-21 22:26:24',1),('72899ce9-e8bd-51df-ac4d-66cdb6a1cc04','upload all data','a884ecb9-167a-5430-94b4-0907484a95d9','2015-01-17 12:57:44',0),('898aad1c-ce4f-5479-98cf-d37762344b16','WINS TIX','a056f91c-6b54-59c3-8ac1-4a348505c5a2','2015-04-02 07:08:42',0),('8c0e8316-6eeb-5bb1-89fd-3dc9f47e2791','Beli kain','d08a8934-b15e-59b0-aef7-5da3ddebe611','2015-04-12 16:33:50',1),('8d2cb3cb-5d08-5573-a9e0-c6b282010c16','Bedset Task','a1dbf937-234f-5e42-ba0b-6bbfd83a4c06','2015-05-21 22:28:11',0),('8d7d968a-0ee3-5ad7-a81b-7a9e9290145d','Pembayaran Order','b080ac83-afd4-5eb2-a40c-46af86bebe99','2015-06-03 21:21:57',1),('8ebbe142-a3fb-5268-9d4b-0dd9ef2c210c','kartu kredit','b080ac83-afd4-5eb2-a40c-46af86bebe99','2015-06-03 21:53:37',1),('8fdd5d2c-118b-536d-afec-cd3b61e8accc','kartu kredit','b080ac83-afd4-5eb2-a40c-46af86bebe99','2015-06-03 21:52:54',1),('91b32941-4f5a-5a33-a5ee-97d8ba31b4ca','kartu kredit','b080ac83-afd4-5eb2-a40c-46af86bebe99','2015-06-03 21:52:54',1),('965052b8-c607-5d76-a151-955358d0fef4','Jahit bantal guling','7af8974d-0a85-51e6-8b46-089c24192db3','2015-04-18 11:56:38',1),('97c52add-645d-5e64-84ef-d363ba66d187','pembuatan laporan tahunan','d6f8991a-55b7-516f-a45a-02270e2635c7','2015-04-02 00:08:39',0),('995834a7-74fb-5f97-a516-164857ac6c5e','Mukena Mama','51346c5c-0fe6-53a1-b1f1-a1b623c9178b','2015-05-21 22:26:08',1),('99e6ff4d-295a-5935-880c-b813ec87cda4','asd','b080ac83-afd4-5eb2-a40c-46af86bebe99','2015-06-13 11:35:41',1),('a013ab27-c0b6-5ac8-b9f8-f7ef906ad9a2','Bedset kaka neneng','a1dbf937-234f-5e42-ba0b-6bbfd83a4c06','2015-05-21 22:27:21',1),('a36300f9-6483-5ab2-88f7-99bd91a61487','kartu kredit','b080ac83-afd4-5eb2-a40c-46af86bebe99','2015-06-03 21:52:49',0),('a3c41b4d-b7b7-54df-8be9-764f689f5fa0','kartu kredit','b080ac83-afd4-5eb2-a40c-46af86bebe99','2015-06-03 21:52:56',1),('a7592246-8edc-56e5-b71b-414a74508864','Makanan minuman ','bc18a2f3-d2b8-57f8-bdb1-a13004740c8a','2015-04-18 12:19:22',1),('a8473477-4601-52a2-b2a4-b79451719582','Bedset kk imel','a1dbf937-234f-5e42-ba0b-6bbfd83a4c06','2015-05-21 22:27:35',1),('ae6d6cbe-1fbc-5856-a2af-44f0a2400cfc','kartu kredit','b080ac83-afd4-5eb2-a40c-46af86bebe99','2015-06-03 21:53:14',1),('d6751938-2046-56b3-86e6-6d04fee9f68d','kartu kredit','b080ac83-afd4-5eb2-a40c-46af86bebe99','2015-06-03 21:53:34',1),('d69fb312-8442-5038-ba39-6e55e311961f','WINS Newsletter','a056f91c-6b54-59c3-8ac1-4a348505c5a2','2015-04-02 20:07:09',0),('ef992736-633b-52aa-899f-f6cfdf538804','WINS Garage Sale','a056f91c-6b54-59c3-8ac1-4a348505c5a2','2015-04-02 19:59:16',0),('f54cae93-d91c-510c-b859-c399ea05c17a','kartu kredit','b080ac83-afd4-5eb2-a40c-46af86bebe99','2015-06-03 21:53:34',1),('fbf0e6af-a49f-5a92-918c-a6fab689e7e4','WINS Shop','a056f91c-6b54-59c3-8ac1-4a348505c5a2','2015-04-02 19:43:15',0),('ff30d0ac-a98e-5289-b163-f555ec9f97f4','Bedset Mama','a1dbf937-234f-5e42-ba0b-6bbfd83a4c06','2015-05-21 22:27:07',1);

/*Table structure for table `tax` */

DROP TABLE IF EXISTS `tax`;

CREATE TABLE `tax` (
  `tax_ID` char(36) NOT NULL,
  `tax_name` varchar(100) DEFAULT NULL,
  `grossnetto` enum('gross','netto','salary') DEFAULT NULL,
  `tax_persentage` double(3,2) DEFAULT '0.00',
  `taxable_min_year` double(12,2) DEFAULT '0.00',
  `taxable_addmarried_year` double(12,2) DEFAULT '0.00',
  `taxable_min_month` double(12,2) DEFAULT '0.00',
  `taxable_addmarried_month` double(12,2) DEFAULT '0.00',
  `taxable_annually` tinyint(1) DEFAULT '1',
  `manual_amount` double(12,2) DEFAULT '0.00',
  `dateCreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`tax_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tax` */

insert  into `tax`(`tax_ID`,`tax_name`,`grossnetto`,`tax_persentage`,`taxable_min_year`,`taxable_addmarried_year`,`taxable_min_month`,`taxable_addmarried_month`,`taxable_annually`,`manual_amount`,`dateCreated`,`deleted`) values ('1','PPH 21','netto',5.00,24300000.00,2025000.00,0.00,0.00,1,0.00,'2015-02-19 20:24:47',0);

/*Table structure for table `timetracking` */

DROP TABLE IF EXISTS `timetracking`;

CREATE TABLE `timetracking` (
  `timetracking_ID` char(36) CHARACTER SET latin1 NOT NULL,
  `description` blob,
  `datecreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deadline` date DEFAULT NULL COMMENT 'dead line',
  `register_date` date DEFAULT NULL COMMENT 'register date',
  `currency_ID` char(36) DEFAULT NULL,
  `ammount_expenses` double(10,2) DEFAULT '0.00' COMMENT 'amount expenses',
  `task_ID` char(36) CHARACTER SET latin1 DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `status_task` enum('active','pause','close') DEFAULT 'active' COMMENT 'status',
  `date_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`timetracking_ID`),
  KEY `FK_timetracking` (`task_ID`),
  CONSTRAINT `FK_timetracking` FOREIGN KEY (`task_ID`) REFERENCES `task` (`task_ID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `timetracking` */

insert  into `timetracking`(`timetracking_ID`,`description`,`datecreated`,`deadline`,`register_date`,`currency_ID`,`ammount_expenses`,`task_ID`,`deleted`,`status_task`,`date_modified`) values ('26157382-db1e-537a-a1ed-5d1847dea4d1','asd','2015-04-12 21:12:15','2015-04-19','2015-04-12',NULL,0.00,'1d2992e6-39e5-57d1-b4ab-bd24f1832461',0,'close','2015-04-14 01:25:43'),('9a8b8903-1c75-50d3-a4c7-f68d64b79418','ayo donk','2015-04-15 02:12:20','2015-04-15','2015-04-01','b4b5bbf5-eead-11e2-8db1-00155d6a1ec9',950000.00,'1d2992e6-39e5-57d1-b4ab-bd24f1832461',0,'active','2015-04-15 02:12:29'),('c44cc8d3-ec3d-5a49-a960-6bc5aca9c1bc','asd','2015-04-12 16:34:22','2015-04-19','2015-04-12',NULL,9000000.00,'8c0e8316-6eeb-5bb1-89fd-3dc9f47e2791',0,'active',NULL),('d4f418d2-fb1f-5e9e-8457-54ff05960b0e','jalu tanggung jawab','2015-04-18 11:57:02','2015-04-25','2015-04-18','b4b5bbf5-eead-11e2-8db1-00155d6a1ec9',2000000.00,'1d2992e6-39e5-57d1-b4ab-bd24f1832461',0,'close','2015-04-18 13:20:49'),('d789d18f-fe38-52fd-87e5-6ec5ab2dba71','asd','2015-04-12 21:09:41','2015-04-21','2015-04-12',NULL,0.00,'51ecf601-e8fc-5bad-a10c-029fe484334c',0,'pause','2015-04-12 21:22:17');

/*Table structure for table `timetrackingmap` */

DROP TABLE IF EXISTS `timetrackingmap`;

CREATE TABLE `timetrackingmap` (
  `timetrackingmapID` char(36) CHARACTER SET latin1 NOT NULL,
  `timetracking_ID` char(36) CHARACTER SET latin1 DEFAULT NULL,
  `employee_ID` char(36) CHARACTER SET latin1 DEFAULT NULL,
  `status_taskmap` enum('active','pause','close') DEFAULT 'active',
  `date_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`timetrackingmapID`),
  KEY `FK_timetrackingmap` (`timetracking_ID`),
  KEY `FK_timetrackingmape` (`employee_ID`),
  CONSTRAINT `FK_timetrackingmap` FOREIGN KEY (`timetracking_ID`) REFERENCES `timetracking` (`timetracking_ID`) ON UPDATE CASCADE,
  CONSTRAINT `FK_timetrackingmape` FOREIGN KEY (`employee_ID`) REFERENCES `employee` (`employee_ID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `timetrackingmap` */

insert  into `timetrackingmap`(`timetrackingmapID`,`timetracking_ID`,`employee_ID`,`status_taskmap`,`date_modified`) values ('12e42c12-63da-57d4-b4ca-a1ad24323c28','d789d18f-fe38-52fd-87e5-6ec5ab2dba71','1','pause','2015-04-18 12:09:10'),('46a81008-b093-5c8c-a7d8-d4dd261355f8','26157382-db1e-537a-a1ed-5d1847dea4d1','912d0912-711c-59de-a122-2b5418','close','2015-04-14 02:05:12'),('9cb3a9f6-9c79-5ada-a4d6-f3db7228fdf5','c44cc8d3-ec3d-5a49-a960-6bc5aca9c1bc','912d0912-711c-59de-a122-2b5418','active','2015-04-12 16:34:23'),('a0670118-abda-5853-a17a-0219aa46d266','9a8b8903-1c75-50d3-a4c7-f68d64b79418','912d0912-711c-59de-a122-2b5418','active','2015-04-15 02:12:20'),('c31450b9-d6e1-507b-acec-8296cf5f187c','26157382-db1e-537a-a1ed-5d1847dea4d1','1','pause','2015-04-18 12:08:46'),('ff2a6c2b-5eee-589a-8e28-10eec51c5908','d4f418d2-fb1f-5e9e-8457-54ff05960b0e','02f67708-b01e-5831-a987-658552','close','2015-04-18 11:57:44');

/*Table structure for table `uom` */

DROP TABLE IF EXISTS `uom`;

CREATE TABLE `uom` (
  `UoM_ID` char(36) NOT NULL,
  `uom_name` varchar(100) DEFAULT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`UoM_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `uom` */

insert  into `uom`(`UoM_ID`,`uom_name`,`dateCreated`,`deleted`) values ('1','Pieces ','2015-01-31 21:44:25',0),('10','Bushel/Bushels ','2015-01-31 21:44:25',0),('11','Carat/Carats ','2015-01-31 21:44:25',0),('12','Carton/Cartons ','2015-01-31 21:44:25',0),('13','Case/Cases ','2015-01-31 21:44:25',0),('14','Centimeter/Centimeters ','2015-01-31 21:44:25',0),('15','Chain/Chains ','2015-01-31 21:44:25',0),('16','Cubic Centimeter/Cubic Centimeters ','2015-01-31 21:44:25',0),('17','Cubic Foot/Cubic Feet ','2015-01-31 21:44:25',0),('18','Cubic Inch/Cubic Inches ','2015-01-31 21:44:25',0),('19','Cubic Meter/Cubic Meters ','2015-01-31 21:44:25',0),('1fc6193c-60ff-5373-aee0-0d2358552504','asd1','2015-02-07 16:45:40',1),('2','20\' Container ','2015-01-31 21:44:25',0),('20','Cubic Yard/Cubic Yards ','2015-01-31 21:44:25',0),('21','Degrees Celsius ','2015-01-31 21:44:25',0),('22','Degrees Fahrenheit ','2015-01-31 21:44:25',0),('23','Dozen/Dozens ','2015-01-31 21:44:25',0),('24','Dram/Drams ','2015-01-31 21:44:25',0),('25','Fluid Ounce/Fluid Ounces ','2015-01-31 21:44:25',0),('26','Foot ','2015-01-31 21:44:25',0),('27','Furlong/Furlongs ','2015-01-31 21:44:25',0),('28','Gallon/Gallons ','2015-01-31 21:44:25',0),('29','Gill/Gills ','2015-01-31 21:44:25',0),('3','40\' Container ','2015-01-31 21:44:25',0),('30','Grain/Grains ','2015-01-31 21:44:25',0),('31','Gram/Grams ','2015-01-31 21:44:25',0),('32','Gross ','2015-01-31 21:44:25',0),('33','Hectare/Hectares  ','2015-01-31 21:44:25',0),('34','Hertz ','2015-01-31 21:44:25',0),('35','Inch/Inches ','2015-01-31 21:44:25',0),('36','Kiloampere/Kiloamperes ','2015-01-31 21:44:25',0),('37','Kilogram/Kilograms ','2015-01-31 21:44:25',0),('38','Kilohertz ','2015-01-31 21:44:25',0),('39','Kilometer/Kilometers ','2015-01-31 21:44:25',0),('4','40\' HQ Container ','2015-01-31 21:44:25',0),('40','Kiloohm/Kiloohms ','2015-01-31 21:44:25',0),('41','Kilovolt/Kilovolts ','2015-01-31 21:44:25',0),('42','Kilowatt/Kilowatts ','2015-01-31 21:44:25',0),('43','Liter/Liters ','2015-01-31 21:44:25',0),('44','Long Ton/Long Tons ','2015-01-31 21:44:25',0),('45','Megahertz ','2015-01-31 21:44:25',0),('46','Meter ','2015-01-31 21:44:25',0),('47','Metric Ton/Metric Tons ','2015-01-31 21:44:25',0),('48','Mile/Miles ','2015-01-31 21:44:25',0),('49','Milliampere/Milliamperes ','2015-01-31 21:44:25',0),('5','Acre/Acres ','2015-01-31 21:44:25',0),('50','Milligram/Milligrams ','2015-01-31 21:44:25',0),('51','Millihertz ','2015-01-31 21:44:25',0),('52','Milliliter/Milliliters ','2015-01-31 21:44:25',0),('53','Millimeter/Millimeters ','2015-01-31 21:44:25',0),('54','Milliohm/Milliohms ','2015-01-31 21:44:25',0),('55','Millivolt/Millivolts ','2015-01-31 21:44:25',0),('56','Milliwatt/Milliwatts ','2015-01-31 21:44:25',0),('57','Nautical Mile/Nautical Miles ','2015-01-31 21:44:25',0),('58','Ohm/Ohms ','2015-01-31 21:44:25',0),('59','Ounce/Ounces ','2015-01-31 21:44:25',0),('6','Ampere/Amperes ','2015-01-31 21:44:25',0),('60','Pack/Packs ','2015-01-31 21:44:25',0),('61','Pairs ','2015-01-31 21:44:25',0),('62','Pallet/Pallets ','2015-01-31 21:44:25',0),('63','Parcel/Parcels ','2015-01-31 21:44:25',0),('64','Perch/Perches ','2015-01-31 21:44:25',0),('65','Pint/Pints ','2015-01-31 21:44:25',0),('66','Plant/Plants ','2015-01-31 21:44:25',0),('67','Pole/Poles ','2015-01-31 21:44:25',0),('68','Pound/Pounds ','2015-01-31 21:44:25',0),('69','Quart/Quarts ','2015-01-31 21:44:25',0),('7','Bags ','2015-01-31 21:44:25',0),('70','Quarter/Quarters ','2015-01-31 21:44:25',0),('71','Reams ','2015-01-31 21:44:25',0),('72','Rod/Rods ','2015-01-31 21:44:25',0),('73','Rolls ','2015-01-31 21:44:25',0),('74','Sets ','2015-01-31 21:44:25',0),('75','Sheet/Sheets ','2015-01-31 21:44:25',0),('76','Short Ton/Short Tons ','2015-01-31 21:44:25',0),('77','Square Centimeter/Square Centimeters ','2015-01-31 21:44:25',0),('78','Square Feet ','2015-01-31 21:44:25',0),('79','Square Meters ','2015-01-31 21:44:25',0),('8','Barrel/Barrels ','2015-01-31 21:44:25',0),('80','Square Inch/Square Inches ','2015-01-31 21:44:25',0),('81','Square Mile/Square Miles ','2015-01-31 21:44:25',0),('82','Square Yard/Square Yards ','2015-01-31 21:44:25',0),('83','Stone/Stones ','2015-01-31 21:44:25',0),('84','Strand/Strands ','2015-01-31 21:44:25',0),('85','Tonne/Tonnes ','2015-01-31 21:44:25',0),('86','Tons ','2015-01-31 21:44:25',0),('87','Tray/Trays ','2015-01-31 21:44:25',0),('88','Unit/Units ','2015-01-31 21:44:25',0),('89','Volt/Volts ','2015-01-31 21:44:25',0),('9','Boxes ','2015-01-31 21:44:25',0),('90','Watt/Watts ','2015-01-31 21:44:25',0),('91','Wp ','2015-01-31 21:44:25',0),('92','Yard/Yards  ','2015-01-31 21:44:25',0),('d4d8a25e-93c8-51b5-9948-bc3ef3373b4e','asd','2015-02-07 16:43:31',1),('edb4741a-5821-504e-b2e0-b3d4ed9a9802','sekayol','2015-02-07 13:03:37',1),('fb9d9b06-7eb1-5002-9bb1-84d8e94e08d4','semato','2015-02-07 13:00:17',1);

/*Table structure for table `weekend` */

DROP TABLE IF EXISTS `weekend`;

CREATE TABLE `weekend` (
  `weekend_ID` char(36) NOT NULL,
  `weekend_day` varchar(15) DEFAULT NULL,
  `company_ID` char(36) DEFAULT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`weekend_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `weekend` */

insert  into `weekend`(`weekend_ID`,`weekend_day`,`company_ID`,`dateCreated`,`deleted`) values ('0eeacc4b-4f9a-52aa-8dea-72672466a601','Saturday','bf088a55-8d09-5780-b3df-20bbf121532e','2015-02-24 02:31:09',0),('75c7a44e-3266-531f-983f-8f5995c88b64','Sunday','bf088a55-8d09-5780-b3df-20bbf121532e','2015-02-24 02:31:04',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
