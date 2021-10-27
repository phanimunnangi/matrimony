/*
SQLyog Community v12.4.3 (64 bit)
MySQL - 10.4.11-MariaDB : Database - nayeebra_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`nayeebra_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `nayeebra_db`;

/*Table structure for table `ma_adminlogins` */

DROP TABLE IF EXISTS `ma_adminlogins`;

CREATE TABLE `ma_adminlogins` (
  `adminloginid` int(11) NOT NULL AUTO_INCREMENT,
  `adminlogintype` varchar(100) DEFAULT NULL COMMENT 'Role',
  `adminloginname` varchar(130) DEFAULT NULL,
  `adminloginemail` varchar(150) DEFAULT NULL,
  `adminpassword` varchar(150) DEFAULT NULL,
  `admindisplaypassword` varchar(150) DEFAULT NULL,
  `admintrailperiodmode` tinyint(2) DEFAULT 0,
  `trailperiodfrom` date DEFAULT NULL,
  `trailperiodto` date DEFAULT NULL,
  `tottrailperioddays` int(11) DEFAULT 0,
  `adminstatus` smallint(2) DEFAULT 1,
  `admincreatedat` datetime DEFAULT current_timestamp(),
  `adminupdatedat` datetime DEFAULT current_timestamp(),
  `admindeletedat` datetime DEFAULT NULL,
  PRIMARY KEY (`adminloginid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ma_adminlogins` */

insert  into `ma_adminlogins`(`adminloginid`,`adminlogintype`,`adminloginname`,`adminloginemail`,`adminpassword`,`admindisplaypassword`,`admintrailperiodmode`,`trailperiodfrom`,`trailperiodto`,`tottrailperioddays`,`adminstatus`,`admincreatedat`,`adminupdatedat`,`admindeletedat`) values 
(1,'productadmin','Sainath Chillapuram','sainath.chillapuram@gmail.com','e10adc3949ba59abbe56e057f20f883e','MTIzNDU2',1,NULL,NULL,0,1,'2020-09-17 17:29:53','2020-09-17 17:29:53',NULL);

/*Table structure for table `ma_areas` */

DROP TABLE IF EXISTS `ma_areas`;

CREATE TABLE `ma_areas` (
  `areaid` int(11) NOT NULL AUTO_INCREMENT,
  `areadisplayid` varchar(200) DEFAULT NULL,
  `areaname` varchar(200) DEFAULT NULL,
  `areastatus` smallint(2) DEFAULT 1,
  `areacreatedat` datetime DEFAULT NULL,
  `areaupdatedat` datetime DEFAULT NULL,
  `areadeletedat` datetime DEFAULT NULL,
  PRIMARY KEY (`areaid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `ma_areas` */

insert  into `ma_areas`(`areaid`,`areadisplayid`,`areaname`,`areastatus`,`areacreatedat`,`areaupdatedat`,`areadeletedat`) values 
(1,'AREA2001','Andhra',1,NULL,NULL,NULL),
(2,'AREA2002','Telangana',1,NULL,NULL,NULL),
(3,'AREA2003','Rayalaseema',1,NULL,NULL,NULL),
(4,'AREA2004','Srikakulam',1,NULL,NULL,NULL);

/*Table structure for table `ma_banners` */

DROP TABLE IF EXISTS `ma_banners`;

CREATE TABLE `ma_banners` (
  `bannerid` int(11) NOT NULL AUTO_INCREMENT,
  `bannerdisplayid` varchar(120) DEFAULT NULL,
  `bannertitle` varchar(200) DEFAULT NULL,
  `bannerwebimage` varchar(200) DEFAULT NULL,
  `bannermobileimage` varchar(200) DEFAULT NULL,
  `bannerpriority` int(11) DEFAULT NULL,
  `bannerstatus` smallint(2) DEFAULT 1,
  `bannercreatedat` datetime DEFAULT current_timestamp(),
  `bannerupdatedat` datetime DEFAULT current_timestamp(),
  `bannerdeletedat` datetime DEFAULT NULL,
  PRIMARY KEY (`bannerid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ma_banners` */

insert  into `ma_banners`(`bannerid`,`bannerdisplayid`,`bannertitle`,`bannerwebimage`,`bannermobileimage`,`bannerpriority`,`bannerstatus`,`bannercreatedat`,`bannerupdatedat`,`bannerdeletedat`) values 
(1,'BANNER2001','Banner One','20092020110256banner.jpg','Mob_20092020110256banner.jpg',NULL,1,'2020-09-20 15:32:56','2020-09-20 15:32:56','2020-09-20 11:04:36');

/*Table structure for table `ma_community` */

DROP TABLE IF EXISTS `ma_community`;

CREATE TABLE `ma_community` (
  `communityid` int(11) NOT NULL AUTO_INCREMENT,
  `communitydisplayid` varchar(120) DEFAULT NULL,
  `communityname` varchar(200) DEFAULT NULL,
  `communitytagline` varchar(250) DEFAULT NULL,
  `communitywebimage` varchar(150) DEFAULT NULL,
  `communitymobileimage` varchar(150) DEFAULT NULL,
  `communitystatus` smallint(2) DEFAULT 1,
  `communitycreatedat` datetime DEFAULT current_timestamp(),
  `communityupdatedat` datetime DEFAULT current_timestamp(),
  `communitydeletedat` datetime DEFAULT NULL,
  PRIMARY KEY (`communityid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ma_community` */

insert  into `ma_community`(`communityid`,`communitydisplayid`,`communityname`,`communitytagline`,`communitywebimage`,`communitymobileimage`,`communitystatus`,`communitycreatedat`,`communityupdatedat`,`communitydeletedat`) values 
(1,'COMMUNITY2001','Vishwabrahmin Matrimony','Community Matrimony App','18092020145908logo.png','18092020145908logo.png',1,'2020-09-18 19:29:08','2020-09-18 19:29:08',NULL);

/*Table structure for table `ma_community_subcastes` */

DROP TABLE IF EXISTS `ma_community_subcastes`;

CREATE TABLE `ma_community_subcastes` (
  `subcasteid` int(11) NOT NULL AUTO_INCREMENT,
  `subcastedisplayid` varchar(120) DEFAULT NULL,
  `communityid` int(11) DEFAULT 0,
  `subcastename` varchar(120) DEFAULT NULL,
  `subcasteseourl` varchar(200) DEFAULT NULL,
  `subcasteimage` varchar(150) DEFAULT NULL,
  `subcastestatus` smallint(2) DEFAULT 1,
  `subcastecreatedat` datetime DEFAULT current_timestamp(),
  `subcasteupdatedat` datetime DEFAULT current_timestamp(),
  `subcastedeletedat` datetime DEFAULT NULL,
  PRIMARY KEY (`subcasteid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ma_community_subcastes` */

insert  into `ma_community_subcastes`(`subcasteid`,`subcastedisplayid`,`communityid`,`subcastename`,`subcasteseourl`,`subcasteimage`,`subcastestatus`,`subcastecreatedat`,`subcasteupdatedat`,`subcastedeletedat`) values 
(1,'SUBCASTE2001',1,'Kamsali','kamsali',NULL,1,'2020-09-19 08:47:05','2020-09-19 07:56:47','2020-09-19 05:52:42'),
(2,'SUBCASTE2002',1,'Vadrangi','vadrangi',NULL,1,'2020-09-19 08:56:34','2020-09-19 07:56:30',NULL),
(3,'SUBCASTE2003',1,'Shilpi','shilpi',NULL,2,'2020-09-19 16:49:53','2020-09-19 16:49:53','2020-09-19 12:20:12'),
(4,'SUBCASTE2004',1,'Kammari','kammari',NULL,1,'2020-10-12 04:27:21','2020-10-12 04:27:21',NULL),
(5,'SUBCASTE2005',1,'Kannchari','kannchari',NULL,1,'2020-10-12 04:27:35','2020-10-12 04:27:35',NULL),
(6,'SUBCASTE2006',1,'Shilpi','shilpi',NULL,1,'2020-11-02 22:18:53','2020-11-02 22:18:53',NULL),
(7,'SUBCASTE2007',1,'Konda','konda',NULL,2,'2020-11-03 01:32:18','2020-11-03 01:32:18','2020-11-06 13:48:31');

/*Table structure for table `ma_forgotpasswordstokens` */

DROP TABLE IF EXISTS `ma_forgotpasswordstokens`;

CREATE TABLE `ma_forgotpasswordstokens` (
  `ftid` int(11) NOT NULL AUTO_INCREMENT,
  `ftuserid` int(11) DEFAULT NULL,
  `fttokenid` varchar(200) DEFAULT NULL,
  `ftstatus` smallint(2) DEFAULT 1,
  `ftcreatedat` datetime DEFAULT NULL,
  `ftuodatedat` datetime DEFAULT NULL,
  PRIMARY KEY (`ftid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `ma_forgotpasswordstokens` */

/*Table structure for table `ma_heights` */

DROP TABLE IF EXISTS `ma_heights`;

CREATE TABLE `ma_heights` (
  `heightid` int(11) NOT NULL AUTO_INCREMENT,
  `heightdisplayid` varchar(120) DEFAULT NULL,
  `heightvalue` varchar(50) DEFAULT NULL,
  `heightinches` varchar(50) DEFAULT NULL,
  `heightstatus` smallint(2) DEFAULT 1,
  `heightcreatedat` datetime DEFAULT current_timestamp(),
  `heightupdatedat` datetime DEFAULT current_timestamp(),
  `heightdeletedat` datetime DEFAULT NULL,
  PRIMARY KEY (`heightid`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ma_heights` */

insert  into `ma_heights`(`heightid`,`heightdisplayid`,`heightvalue`,`heightinches`,`heightstatus`,`heightcreatedat`,`heightupdatedat`,`heightdeletedat`) values 
(1,'H01','4ft 1in - 121.95cm','121.95cm',1,'2020-09-17 21:55:38','2020-09-17 21:55:38',NULL),
(2,'H02','4ft 2in - 121.97cm','121.97cm',1,'2020-09-17 21:56:01','2020-09-17 21:56:01',NULL),
(3,'H03','4ft 3in - 122cm','122cm',1,'2020-09-17 21:56:28','2020-09-17 21:56:28',NULL),
(4,'H04','4ft 4in - 122.02cm','122.02cm',1,'2020-09-17 21:57:01','2020-09-17 21:57:01',NULL),
(5,'H05','4ft 5in - 134cm','134cm',1,'2020-09-17 21:58:42','2020-09-17 21:58:42',NULL),
(6,'H06','4ft 6in - 137cm','137cm',1,'2020-09-17 21:59:05','2020-09-17 21:59:05',NULL),
(7,'H07','4ft 7in - 139cm','139cm',1,'2020-09-17 21:59:24','2020-09-17 21:59:24',NULL),
(8,'H08','4ft 8in - 142cm','142cm',1,'2020-09-17 21:59:33','2020-09-17 21:59:33',NULL),
(9,'H09','4ft 9in - 144cm','144cm',1,'2020-09-17 21:59:41','2020-09-17 21:59:41',NULL),
(10,'H10','4ft 10in - 147cm','147cm',1,'2020-09-17 21:59:44','2020-09-17 21:59:44',NULL),
(11,'H11','4ft 11in - 149cm','149cm',1,'2020-09-17 21:59:58','2020-09-17 21:59:58',NULL),
(12,'H12','5ft 0in - 152cm','152cm',1,'2020-09-17 22:02:22','2020-09-17 22:02:22',NULL),
(13,'H13','5ft 1in - 154cm','154cm',1,'2020-09-17 22:02:32','2020-09-17 22:02:32',NULL),
(14,'H14','5ft 2in - 157cm','157cm',1,'2020-09-17 22:02:35','2020-09-17 22:02:35',NULL),
(15,'H15','5ft 3in - 160cm','160cm',1,'2020-09-17 22:03:07','2020-09-17 22:03:07',NULL),
(16,'H16','5ft 4in - 162cm','162cm',1,'2020-09-17 22:03:15','2020-09-17 22:03:15',NULL),
(17,'H17','5ft 5in - 165cm','165cm',1,'2020-09-17 22:03:22','2020-09-17 22:03:22',NULL),
(18,'H18','5ft 6in - 167cm','167cm',1,'2020-09-17 22:03:30','2020-09-17 22:03:30',NULL),
(19,'H19','5ft 7in - 170cm','170cm',1,'2020-09-17 22:03:33','2020-09-17 22:03:33',NULL),
(20,'H20','5ft 8in - 172cm','172cm',1,'2020-09-17 22:05:03','2020-09-17 22:05:03',NULL),
(21,'H21','5ft 9in - 175cm','175cm',1,'2020-09-17 22:05:31','2020-09-17 22:05:31',NULL),
(22,'H22','5ft 10in - 177cm','177cm',1,'2020-09-17 22:05:40','2020-09-17 22:05:40',NULL),
(23,'H23','5ft 11in - 180cm','180cm',1,'2020-09-17 22:06:33','2020-09-17 22:06:33',NULL),
(24,'H24','6ft 0in - 182cm','182cm',1,'2020-09-17 22:06:53','2020-09-17 22:06:53',NULL),
(25,'H25','6ft 1in - 185cm','185cm',1,'2020-09-17 22:07:00','2020-09-17 22:07:00',NULL),
(26,'H26','6ft 2in - 187cm','187cm',1,'2020-09-17 22:07:08','2020-09-17 22:07:08',NULL),
(27,'H27','6ft 3in - 190cm','190cm',1,'2020-09-17 22:07:16','2020-09-17 22:07:16',NULL),
(28,'H28','6ft 4in - 193cm','193cm',1,'2020-09-17 22:07:22','2020-09-17 22:07:22',NULL),
(29,'H29','6ft 5in - 195cm','195cm',1,'2020-09-17 22:07:41','2020-09-17 22:07:41',NULL),
(30,'H30','6ft 6in - 198cm','198cm',1,'2020-09-17 22:07:49','2020-09-17 22:07:49',NULL),
(31,'H31','6ft 7in - 200cm','200cm',1,'2020-09-17 22:07:56','2020-09-17 22:07:56',NULL),
(32,'H32','6ft 8in - 203cm','203cm',1,'2020-09-17 22:08:05','2020-09-17 22:08:05',NULL),
(33,'H33','6ft 9in - 205cm','205cm',1,'2020-09-17 22:08:14','2020-09-17 22:08:14',NULL),
(34,'H34','6ft 10in - 208cm','208cm',1,'2020-09-17 22:08:23','2020-09-17 22:08:23',NULL),
(35,'H35','6ft 11in - 210cm','210cm',1,'2020-09-17 22:08:27','2020-09-17 22:08:27',NULL),
(36,'H36','7ft 0in - 213cm','213cm',1,'2020-09-17 22:08:38','2020-09-17 22:08:38',NULL);

/*Table structure for table `ma_legs` */

DROP TABLE IF EXISTS `ma_legs`;

CREATE TABLE `ma_legs` (
  `legid` int(11) NOT NULL AUTO_INCREMENT,
  `legdisplayid` varchar(120) DEFAULT NULL,
  `legname` varchar(120) DEFAULT NULL,
  `legvalue` int(11) DEFAULT NULL,
  `legstatus` smallint(2) DEFAULT 1,
  `legcraetedat` datetime DEFAULT current_timestamp(),
  `legupdatedat` datetime DEFAULT current_timestamp(),
  `legdeletedat` datetime DEFAULT NULL,
  PRIMARY KEY (`legid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ma_legs` */

insert  into `ma_legs`(`legid`,`legdisplayid`,`legname`,`legvalue`,`legstatus`,`legcraetedat`,`legupdatedat`,`legdeletedat`) values 
(1,'L01',NULL,1,1,'2020-09-17 22:12:13','2020-09-17 22:12:13',NULL),
(2,'L02',NULL,2,1,'2020-09-17 22:12:14','2020-09-17 22:12:14',NULL),
(3,'L03',NULL,3,1,'2020-09-17 22:12:16','2020-09-17 22:12:16',NULL),
(4,'L04',NULL,4,1,'2020-09-17 22:12:18','2020-09-17 22:12:18',NULL);

/*Table structure for table `ma_professions` */

DROP TABLE IF EXISTS `ma_professions`;

CREATE TABLE `ma_professions` (
  `professionid` int(11) NOT NULL AUTO_INCREMENT,
  `professiondisplayid` varchar(150) DEFAULT NULL,
  `professionname` varchar(150) DEFAULT NULL,
  `professionstatus` smallint(2) DEFAULT 1,
  `professioncraetedat` datetime DEFAULT current_timestamp(),
  `professionupdatedat` datetime DEFAULT current_timestamp(),
  `professiondeletedat` datetime DEFAULT NULL,
  PRIMARY KEY (`professionid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ma_professions` */

insert  into `ma_professions`(`professionid`,`professiondisplayid`,`professionname`,`professionstatus`,`professioncraetedat`,`professionupdatedat`,`professiondeletedat`) values 
(1,'PROFESSION2001','Job',1,'2020-09-19 11:38:15','2020-09-19 07:28:56',NULL),
(2,'PROFESSION2002','Business',1,'2020-09-19 11:58:18','2020-09-19 11:58:18',NULL),
(3,'PROFESSION2003','Profession',1,'2020-11-02 23:13:37','2020-11-02 23:13:37',NULL),
(4,'PROFESSION2004','BBC',1,'2020-11-06 07:48:59','2020-11-06 07:48:59',NULL);

/*Table structure for table `ma_raasi` */

DROP TABLE IF EXISTS `ma_raasi`;

CREATE TABLE `ma_raasi` (
  `raasiid` int(11) NOT NULL AUTO_INCREMENT,
  `raasidisplayid` varchar(120) DEFAULT NULL,
  `raasiname` varchar(120) DEFAULT NULL,
  `raasistatus` smallint(2) DEFAULT 1,
  `raasicraetedat` datetime DEFAULT current_timestamp(),
  `raasiupdatedat` datetime DEFAULT current_timestamp(),
  `raasideletedat` datetime DEFAULT NULL,
  PRIMARY KEY (`raasiid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ma_raasi` */

insert  into `ma_raasi`(`raasiid`,`raasidisplayid`,`raasiname`,`raasistatus`,`raasicraetedat`,`raasiupdatedat`,`raasideletedat`) values 
(1,'R01','Mesha',1,'2020-09-17 22:23:20','2020-09-17 22:23:20',NULL),
(2,'R02','Vrishaba',1,'2020-09-17 22:23:29','2020-09-17 22:23:29',NULL),
(3,'R03','Mithuna',1,'2020-09-17 22:23:37','2020-09-17 22:23:37',NULL),
(4,'R04','Karkata',1,'2020-09-17 22:23:44','2020-09-17 22:23:44',NULL),
(5,'R05','Simha',1,'2020-09-17 22:23:50','2020-09-17 22:23:50',NULL),
(6,'R06','Kanya',1,'2020-09-17 22:23:56','2020-09-17 22:23:56',NULL),
(7,'R07','Tula',1,'2020-09-17 22:24:02','2020-09-17 22:24:02',NULL),
(8,'R08','Vrischika',1,'2020-09-17 22:24:10','2020-09-17 22:24:10',NULL),
(9,'R09','Dhanus',1,'2020-09-17 22:24:17','2020-09-17 22:24:17',NULL),
(10,'R10','Makara',1,'2020-09-17 22:24:24','2020-09-17 22:24:24',NULL),
(11,'R11','Kumbha',1,'2020-09-17 22:24:31','2020-09-17 22:24:31',NULL),
(12,'R12','Meena',1,'2020-09-17 22:24:33','2020-09-17 22:24:33',NULL);

/*Table structure for table `ma_servicemaster` */

DROP TABLE IF EXISTS `ma_servicemaster`;

CREATE TABLE `ma_servicemaster` (
  `servicemasterid` int(11) NOT NULL AUTO_INCREMENT,
  `servicemasterdisplayid` varchar(120) DEFAULT NULL,
  `servicemastername` varchar(120) DEFAULT NULL,
  `servicemasterwebimage` varchar(120) DEFAULT NULL,
  `servicemastermobileimage` varchar(120) DEFAULT NULL,
  `servicemasterseo` varchar(120) DEFAULT NULL,
  `servicemasterstatus` smallint(2) DEFAULT 1,
  `servicemastercreatedat` datetime DEFAULT current_timestamp(),
  `servicemasterupdatedat` datetime DEFAULT current_timestamp(),
  `servicemasterdeletedat` datetime DEFAULT NULL,
  PRIMARY KEY (`servicemasterid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ma_servicemaster` */

insert  into `ma_servicemaster`(`servicemasterid`,`servicemasterdisplayid`,`servicemastername`,`servicemasterwebimage`,`servicemastermobileimage`,`servicemasterseo`,`servicemasterstatus`,`servicemastercreatedat`,`servicemasterupdatedat`,`servicemasterdeletedat`) values 
(1,'SERVICE2001','Catering','15102020120712catering(3).png','mob_15102020120712catering(3).png','catering',1,'2020-09-19 20:13:36','2020-09-19 20:13:36',NULL),
(2,'SERVICE2002','Photo & Videography','15102020121708Camera-1.png','mob_15102020121708Camera-1.png','photo-amp-videography',1,'2020-10-01 23:27:11','2020-10-01 23:27:11',NULL),
(3,'SERVICE2003','Music','15102020122120Music.png','mob_15102020122120Music.png','music',1,'2020-10-11 12:29:44','2020-10-11 12:29:44',NULL),
(4,'SERVICE2004','Flower Decorators','15102020123800Flowers-Decoration.png','mob_15102020123800Flowers-Decoration.png','flower-decorators',1,'2020-10-11 12:30:02','2020-10-11 12:30:02',NULL),
(5,'SERVICE2005','Pandits','14102020143947users-icon.png','Mob_14102020143947users-icon.png','pandits',1,'2020-10-11 12:30:17','2020-10-11 12:30:17',NULL),
(6,'SERVICE2006','Bridal Mahendi','15102020122603Honeymoon.png','Mob_15102020122603Honeymoon.png','bridal-mahendi',1,'2020-10-11 12:30:34','2020-10-11 12:30:34',NULL),
(7,'SERVICE2007','Wedding Halls','15102020125753Weddng-Hall.png','mob_15102020125753Weddng-Hall.png','wedding-halls',1,'2020-10-11 12:30:54','2020-10-11 12:30:54',NULL),
(8,'SERVICE2008','Decorators','15102020123127Decoration.png','Mob_15102020123127Decoration.png','decorators',1,'2020-10-11 12:31:11','2020-10-11 12:31:11',NULL);

/*Table structure for table `ma_services` */

DROP TABLE IF EXISTS `ma_services`;

CREATE TABLE `ma_services` (
  `serviceid` int(11) NOT NULL AUTO_INCREMENT,
  `servicedisplayid` varchar(150) DEFAULT NULL,
  `servicemasterid` varchar(120) DEFAULT NULL,
  `serviceparentname` varchar(120) DEFAULT NULL,
  `servicename` varchar(200) DEFAULT NULL,
  `serviceaccessname` varchar(200) DEFAULT NULL,
  `serviceemailaddress` varchar(200) DEFAULT NULL,
  `serviceprimarycontactnumber` varchar(200) DEFAULT NULL,
  `servicesecondarycontactnumber` varchar(200) DEFAULT NULL,
  `servicelandlinenumber` varchar(200) DEFAULT NULL,
  `serviceaddress` text DEFAULT NULL,
  `servicewebsite` varchar(200) DEFAULT NULL,
  `servicewebimage` varchar(200) DEFAULT NULL,
  `servicemobileimage` varchar(200) DEFAULT NULL,
  `serviceskil1` varchar(200) DEFAULT NULL,
  `serviceskil2` varchar(200) DEFAULT NULL,
  `serviceskil3` varchar(200) DEFAULT NULL,
  `serviceskil4` varchar(200) DEFAULT NULL,
  `servicepriority` int(11) DEFAULT 0,
  `servicefeatured` int(11) DEFAULT NULL,
  `servicefromdate` date DEFAULT NULL,
  `servicetodate` date DEFAULT NULL,
  `servicevaliditydays` int(11) DEFAULT NULL,
  `servicestatus` smallint(2) DEFAULT 1,
  `servicecreatedat` datetime DEFAULT current_timestamp(),
  `serviceupdatedat` datetime DEFAULT current_timestamp(),
  `servicedeletedat` datetime DEFAULT NULL,
  PRIMARY KEY (`serviceid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ma_services` */

insert  into `ma_services`(`serviceid`,`servicedisplayid`,`servicemasterid`,`serviceparentname`,`servicename`,`serviceaccessname`,`serviceemailaddress`,`serviceprimarycontactnumber`,`servicesecondarycontactnumber`,`servicelandlinenumber`,`serviceaddress`,`servicewebsite`,`servicewebimage`,`servicemobileimage`,`serviceskil1`,`serviceskil2`,`serviceskil3`,`serviceskil4`,`servicepriority`,`servicefeatured`,`servicefromdate`,`servicetodate`,`servicevaliditydays`,`servicestatus`,`servicecreatedat`,`serviceupdatedat`,`servicedeletedat`) values 
(1,'USERSERVICE2001','SERVICE2002','Wedding Photography & Videography','Ramtantra Photography','ramtantra-photography','ramtantraphotos@gmail.com','9989789456','8877456321','040-40140199','Tricon Heights Apartment, Puppalaguda, Manikonda, Hyderabad - 500089, Near Kid Zee School.','https://www.ramantatraphotos.com','01102020200414ps-img1.png','Mob_01102020200414ps-img1.png','Wedding Photography','Candid Shoot','','',0,1,'2020-10-02','2021-10-02',365,1,'2020-10-02 00:34:14','2020-10-02 00:34:14',NULL),
(2,'USERSERVICE2002','SERVICE2008','Stage Decorators','Dileep stage and mandap ','dileep-stage-and-mandap','ramtantraphotos@gmail.com','9989789456','8877456321','040-40140199','Tricon Heights Apartment, Puppalaguda, Manikonda, Hyderabad - 500089, Near Kid Zee School.','https://www.ramantatraphotos.com','11102020174036ps-img1.png','Mob_11102020174036ps-img1.png','Decoration','','','',0,1,'2020-10-02','2021-10-02',365,1,'2020-10-11 12:40:36','2020-10-11 12:40:36',NULL),
(3,'USERSERVICE2003','SERVICE2002','Wedding Photography & Videography','Sri photography','sri-photography','ramtantraphotos@gmail.com','9989789456','8877456321','040 - 40140199','Tricon Heights Apartment, Puppalaguda, Manikonda, Hyderabad - 500089, Near Kid Zee School.','https://www.ramantatraphotos.com','11102020174400ps-img1.png','mob_11102020174400ps-img1.png','Wedding Photography','','','',0,NULL,'2020-10-02','2021-10-02',365,1,'2020-10-11 12:44:00','2020-10-11 12:44:00',NULL),
(4,'USERSERVICE2004','SERVICE2006','Honeymoon Packages','Kumar honeymoon packages','kumar-honeymoon-packages','ramtantraphotos@gmail.com','9989789456','8877456321','040 - 40140199','Tricon Heights Apartment, Puppalaguda, Manikonda, Hyderabad - 500089, Near Kid Zee School.','https://www.ramantatraphotos.com','11102020174655blc-img1.jpg','mob_11102020174655blc-img1.jpg','Candid Shoot','','','',0,NULL,'2020-10-02','2021-10-02',365,1,'2020-10-11 12:46:55','2020-10-11 12:46:55',NULL),
(5,'USERSERVICE2005','SERVICE2005','Pandits and Priest','Dileep Kumar','dileep-kumar','ramtantraphotos@gmail.com','9989789456','8877456321','040 - 40140199','Tricon Heights Apartment, Puppalaguda, Manikonda, Hyderabad - 500089, Near Kid Zee School.','https://www.ramantatraphotos.com','11102020175028blc-img1.jpg','mob_11102020175028blc-img1.jpg','Wedding Photography','Candid Shoot','','',0,NULL,'2020-10-02','2021-10-02',365,1,'2020-10-11 12:50:28','2020-10-11 12:50:28',NULL),
(6,'USERSERVICE2006','SERVICE2003','Music & Entertainment','Sudheer music Entertaiment','sudheer-music-entertaiment','ramtantraphotos@gmail.com','9989789456','8877456321','040 - 40140199','Tricon Heights Apartment, Puppalaguda, Manikonda, Hyderabad - 500089, Near Kid Zee School.','https://www.ramantatraphotos.com','11102020175405blc-img2.jpg','mob_11102020175405blc-img2.jpg','Wedding Photography','','','',0,NULL,'2020-10-02','2021-10-02',365,1,'2020-10-11 12:54:05','2020-10-11 12:54:05',NULL),
(7,'USERSERVICE2007','SERVICE2001','Wedding Hall','Ramya function hall','ramya-function-hall','ramtantraphotos@gmail.com','9989789456','8877456321','040 - 40140199','Tricon Heights Apartment, Puppalaguda, Manikonda, Hyderabad - 500089, Near Kid Zee School.','https://www.ramantatraphotos.com','11102020175730ps-img1.png','mob_11102020175730ps-img1.png','Wedding Photography','','','',0,NULL,'2020-10-02','2021-10-02',365,1,'2020-10-11 12:57:30','2020-10-11 12:57:30',NULL),
(8,'USERSERVICE2008','SERVICE2004','Florists & Flower Decorators','Sri flower Decorators','sri-flower-decorators','https://www.ramantatraphotos.com','9989789456','8877456321','040 - 40140199','Tricon Heights Apartment, Puppalaguda, Manikonda, Hyderabad - 500089, Near Kid Zee School.','https://www.ramantatraphotos.com','11102020180109ps-img1.png','mob_11102020180109ps-img1.png','Wedding Photography','Candid Shoot','','',0,NULL,'2020-10-02','2021-10-02',365,1,'2020-10-11 13:01:09','2020-10-11 13:01:09',NULL),
(9,'USERSERVICE2009','SERVICE2008','Stage / Mandap Decorators','Dileep Decorators','dileep-decorators','ramtantraphotos@gmail.com','9989789456','8877456321','040 - 40140199','Tricon Heights Apartment, Puppalaguda, Manikonda, Hyderabad - 500089, Near Kid Zee School.','https://www.ramantatraphotos.com','11102020180413blc-img2.jpg','mob_11102020180413blc-img2.jpg','Wedding Photography','Candid Shoot','','',0,NULL,'2020-10-02','2021-10-02',365,1,'2020-10-11 13:04:13','2020-10-11 13:04:13',NULL),
(10,'USERSERVICE2010','SERVICE2008','Stage Decorators','Dileep Stage Decorators','dileep-stage-decorators','dileepkumarkonda@gmail.com','08500222765','','','PLOT4,G2 GROUND FLOOR,VEDIRI TOWNSHIP\r\nHMT SWARANPURI COLONY, 14TH LINE','http://matrimonyapp.in/','25102020104054ps-img1.png',NULL,'Catering','Photography','','',0,NULL,'0000-00-00','0000-00-00',0,3,'2020-10-25 10:40:54','2020-10-25 10:40:54',NULL);

/*Table structure for table `ma_social_links` */

DROP TABLE IF EXISTS `ma_social_links`;

CREATE TABLE `ma_social_links` (
  `sl_id` int(11) unsigned NOT NULL,
  `sl_name` varchar(200) DEFAULT NULL,
  `sl_link` text DEFAULT NULL,
  `sl_link_target` smallint(2) DEFAULT 1,
  `sl_status` smallint(2) DEFAULT 1,
  `sl_createdat` datetime DEFAULT NULL,
  `sl_updatedat` datetime DEFAULT NULL,
  PRIMARY KEY (`sl_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ma_social_links` */

/*Table structure for table `ma_stars` */

DROP TABLE IF EXISTS `ma_stars`;

CREATE TABLE `ma_stars` (
  `starid` int(11) NOT NULL AUTO_INCREMENT,
  `stardisplayid` varchar(120) DEFAULT NULL,
  `starname` varchar(120) DEFAULT NULL,
  `starstatus` smallint(2) DEFAULT 1,
  `starcreatedat` datetime DEFAULT current_timestamp(),
  `starupdatedat` datetime DEFAULT current_timestamp(),
  `stardeletedat` datetime DEFAULT NULL,
  PRIMARY KEY (`starid`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ma_stars` */

insert  into `ma_stars`(`starid`,`stardisplayid`,`starname`,`starstatus`,`starcreatedat`,`starupdatedat`,`stardeletedat`) values 
(1,'S01','Ashwini',1,'2020-09-17 22:26:44','2020-09-17 22:26:44',NULL),
(2,'S02','Rohini',1,'2020-09-17 22:26:51','2020-09-17 22:26:51',NULL),
(3,'S03','Punarvasu',1,'2020-09-17 22:26:57','2020-09-17 22:26:57',NULL),
(4,'S04','Magha',1,'2020-09-17 22:27:03','2020-09-17 22:27:03',NULL),
(5,'S05','Hast',1,'2020-09-17 22:28:01','2020-09-17 22:28:01',NULL),
(6,'S06','Vishaka',1,'2020-09-17 22:28:08','2020-09-17 22:28:08',NULL),
(7,'S07','Moola',1,'2020-09-17 22:28:16','2020-09-17 22:28:16',NULL),
(8,'S08','Sravana',1,'2020-09-17 22:28:23','2020-09-17 22:28:23',NULL),
(9,'S09','Porvabhadra',1,'2020-09-17 22:28:30','2020-09-17 22:28:30',NULL),
(10,'S10','Bharni',1,'2020-09-17 22:28:36','2020-09-17 22:28:36',NULL),
(11,'S11','Mrigasira',1,'2020-09-17 22:28:42','2020-09-17 22:28:42',NULL),
(12,'S12','Pushya',1,'2020-09-17 22:28:43','2020-09-17 22:28:43',NULL),
(13,'S13','Poorvaphalguni',1,'2020-09-17 22:28:55','2020-09-17 22:28:55',NULL),
(14,'S14','Chitra',1,'2020-09-17 22:29:04','2020-09-17 22:29:04',NULL),
(15,'S15','Anuradha',1,'2020-09-17 22:29:14','2020-09-17 22:29:14',NULL),
(16,'S16','Poorvashada',1,'2020-09-17 22:29:22','2020-09-17 22:29:22',NULL),
(17,'S17','Dhanishta',1,'2020-09-17 22:29:27','2020-09-17 22:29:27',NULL),
(18,'S18','Uttarabhadra',1,'2020-09-17 22:29:34','2020-09-17 22:29:34',NULL),
(19,'S19','Kritika',1,'2020-09-17 22:29:43','2020-09-17 22:29:43',NULL),
(20,'S20','Ardra',1,'2020-09-17 22:29:49','2020-09-17 22:29:49',NULL),
(21,'S21','Ashlesha',1,'2020-09-17 22:29:55','2020-09-17 22:29:55',NULL),
(22,'S22','Uttaraphalguni',1,'2020-09-17 22:30:02','2020-09-17 22:30:02',NULL),
(23,'S23','Swati',1,'2020-09-17 22:30:08','2020-09-17 22:30:08',NULL),
(24,'S24','Jyeshtha',1,'2020-09-17 22:30:13','2020-09-17 22:30:13',NULL),
(25,'S25','Uttarashada',1,'2020-09-17 22:30:19','2020-09-17 22:30:19',NULL),
(26,'S26','Shatbhisha',1,'2020-09-17 22:30:25','2020-09-17 22:30:25',NULL),
(27,'S27','Revathi',1,'2020-09-17 22:30:31','2020-09-17 22:30:31',NULL),
(28,'S28','Pubba',1,'2020-09-17 22:30:40','2020-09-17 22:30:40',NULL);

/*Table structure for table `ma_subscribers` */

DROP TABLE IF EXISTS `ma_subscribers`;

CREATE TABLE `ma_subscribers` (
  `sbid` int(11) NOT NULL AUTO_INCREMENT,
  `sbipaddress` varchar(100) DEFAULT NULL,
  `sbemail` varchar(200) DEFAULT NULL,
  `sbstatus` smallint(11) DEFAULT 1,
  `sbcreatedat` datetime DEFAULT NULL,
  `sbupdatedat` datetime DEFAULT NULL,
  PRIMARY KEY (`sbid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ma_subscribers` */

/*Table structure for table `ma_success_stories` */

DROP TABLE IF EXISTS `ma_success_stories`;

CREATE TABLE `ma_success_stories` (
  `ssid` int(11) NOT NULL AUTO_INCREMENT,
  `ssdisplayid` varchar(120) DEFAULT NULL,
  `ssname` varchar(150) DEFAULT NULL,
  `sstext` text DEFAULT NULL,
  `ssimage` varchar(150) DEFAULT NULL,
  `ssstatus` smallint(2) DEFAULT 1,
  `sscreatedat` datetime DEFAULT current_timestamp(),
  `ssupdatedat` datetime DEFAULT current_timestamp(),
  `ssdeletedat` datetime DEFAULT NULL,
  PRIMARY KEY (`ssid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ma_success_stories` */

insert  into `ma_success_stories`(`ssid`,`ssdisplayid`,`ssname`,`sstext`,`ssimage`,`ssstatus`,`sscreatedat`,`ssupdatedat`,`ssdeletedat`) values 
(1,'SS2001','Dileep Kumar & Ramya Sri','Hello team Matrimonyapp.in, I am very thankful to you all for this platform, where i have found my better half\r\nand my love. It\'s been really great journey so far. We have came across each others profile and share.\r\nThanks to Matrimony team.',NULL,1,'2020-09-19 12:47:13','2020-10-25 05:56:26','2020-09-19 08:17:25'),
(2,'SS2002','Harish & Deepthi','We met on 14 Aug 20 and we got engaged on 19 Oct 20. Thank you Matrimonyapp.in to make us find each other so easily. You have brought true love to our life.',NULL,1,'2020-10-25 01:02:52','2020-10-25 01:02:52',NULL),
(3,'SS2003','Nithin & Ramya ','We met over Matrimonyapp.in which helped us find the right match. We exchanged our contacts and then further meetings happened and now we are happily married. Thanks to Matrimonyapp.in excellent services.',NULL,1,'2020-10-25 02:04:32','2020-10-25 02:04:32',NULL),
(4,'SS2004','Aravind & Swetha','Thanks to Matrimonyapp.in, we met over this website and we got our families in for further proceedings, they made it easy for us to get in touch and now we have our perfects halves. I would definitely recommend Matrimonyapp.in to my dear ones too.',NULL,1,'2020-10-25 02:10:59','2020-10-25 02:10:59',NULL);

/*Table structure for table `ma_user_educational_details` */

DROP TABLE IF EXISTS `ma_user_educational_details`;

CREATE TABLE `ma_user_educational_details` (
  `ued_id` int(11) NOT NULL AUTO_INCREMENT,
  `ued_user_id` int(11) DEFAULT 0,
  `ued_education_qualifications` varchar(200) DEFAULT NULL,
  `ued_profession_id` varchar(200) DEFAULT '0',
  `ued_profession_name` varchar(200) DEFAULT NULL,
  `ued_place_work` varchar(200) DEFAULT NULL,
  `ued_company_name` varchar(250) DEFAULT NULL,
  `ued_job_role` varchar(200) DEFAULT NULL,
  `ued_income` varchar(200) DEFAULT NULL,
  `ued_othersourceofincome` varchar(200) DEFAULT NULL,
  `ued_updatedat` datetime DEFAULT NULL,
  PRIMARY KEY (`ued_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ma_user_educational_details` */

/*Table structure for table `ma_user_family_details` */

DROP TABLE IF EXISTS `ma_user_family_details`;

CREATE TABLE `ma_user_family_details` (
  `upd_id` int(11) NOT NULL AUTO_INCREMENT,
  `upd_user_id` int(11) DEFAULT NULL,
  `upd_surname` varchar(200) DEFAULT NULL,
  `upd_fathername` varchar(200) DEFAULT NULL,
  `upd_father_profession` varchar(200) DEFAULT NULL,
  `upd_mothername` varchar(200) DEFAULT NULL,
  `upd_mother_profession` varchar(200) DEFAULT NULL,
  `upd_noofbrothers` int(11) DEFAULT 0,
  `upd_noofsisters` int(11) DEFAULT 0,
  `upd_elder_younger1` varchar(30) DEFAULT NULL,
  `upd_brothername1` varchar(200) DEFAULT NULL,
  `upd_marital_status1` varchar(200) DEFAULT NULL,
  `upd_brother1_profession` varchar(200) DEFAULT NULL,
  `upd_elder_younger2` varchar(30) DEFAULT NULL,
  `upd_brothername2` varchar(200) DEFAULT NULL,
  `upd_marital_status2` varchar(200) DEFAULT NULL,
  `upd_brother2_profession` varchar(200) DEFAULT NULL,
  `upd_elder_younger3` varchar(30) DEFAULT NULL,
  `upd_brothername3` varchar(200) DEFAULT NULL,
  `upd_marital_status3` varchar(200) DEFAULT NULL,
  `upd_brother3_profession` varchar(200) DEFAULT NULL,
  `upd_elder_younger4` varchar(30) DEFAULT NULL,
  `upd_brothername4` varchar(200) DEFAULT NULL,
  `upd_marital_status4` varchar(200) DEFAULT NULL,
  `upd_brother4_profession` varchar(200) DEFAULT NULL,
  `upd_elder_younger5` varchar(30) DEFAULT NULL,
  `upd_brothername5` varchar(200) DEFAULT NULL,
  `upd_marital_status5` varchar(200) DEFAULT NULL,
  `upd_brother5_profession` varchar(200) DEFAULT NULL,
  `upd_sister_elder_younger1` varchar(30) DEFAULT NULL,
  `upd_sistername1` varchar(200) DEFAULT NULL,
  `upd_sister_marital_status1` varchar(200) DEFAULT NULL,
  `upd_sister1_profession` varchar(200) DEFAULT NULL,
  `upd_sister_elder_younger2` varchar(30) DEFAULT NULL,
  `upd_sistername2` varchar(200) DEFAULT NULL,
  `upd_sister_marital_status2` varchar(200) DEFAULT NULL,
  `upd_sister2_profession` varchar(200) DEFAULT NULL,
  `upd_sister_elder_younger3` varchar(30) DEFAULT NULL,
  `upd_sistername3` varchar(200) DEFAULT NULL,
  `upd_sister_marital_status3` varchar(200) DEFAULT NULL,
  `upd_sister3_profession` varchar(200) DEFAULT NULL,
  `upd_sister_elder_younger4` varchar(30) DEFAULT NULL,
  `upd_sistername4` varchar(200) DEFAULT NULL,
  `upd_sister_marital_status4` varchar(200) DEFAULT NULL,
  `upd_sister4_profession` varchar(200) DEFAULT NULL,
  `upd_sister_elder_younger5` varchar(30) DEFAULT NULL,
  `upd_sistername5` varchar(200) DEFAULT NULL,
  `upd_sister_marital_status5` varchar(200) DEFAULT NULL,
  `upd_sister5_profession` varchar(200) DEFAULT NULL,
  `upd_any_other_requirements` text DEFAULT NULL,
  `upd_elder_brothers` smallint(2) DEFAULT 0,
  `upd_younger_brothers` smallint(2) DEFAULT 0,
  `upd_married_brothers` smallint(2) DEFAULT 0,
  `upd_elder_sisters` smallint(2) DEFAULT 0,
  `upd_younger_sisters` smallint(2) DEFAULT 0,
  `upd_married_sisters` smallint(2) DEFAULT 0,
  `upd_updatedat` datetime DEFAULT NULL,
  PRIMARY KEY (`upd_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ma_user_family_details` */

/*Table structure for table `ma_user_liked_profiles` */

DROP TABLE IF EXISTS `ma_user_liked_profiles`;

CREATE TABLE `ma_user_liked_profiles` (
  `ulp_id` int(11) NOT NULL AUTO_INCREMENT,
  `ulp_user_id_from` int(11) DEFAULT 0,
  `ulp_registered_from` varchar(200) DEFAULT NULL,
  `ulp_display_name_from` varchar(200) DEFAULT NULL,
  `ulp_user_id_to` int(11) DEFAULT NULL,
  `ulp_registered_to` varchar(200) DEFAULT NULL,
  `ulp_display_name_to` varchar(200) DEFAULT NULL,
  `ulp_status` smallint(2) DEFAULT 1,
  `ulp_createdat` datetime DEFAULT NULL,
  `ulp_updatedat` datetime DEFAULT NULL,
  PRIMARY KEY (`ulp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ma_user_liked_profiles` */

/*Table structure for table `ma_user_partner_prefered_details` */

DROP TABLE IF EXISTS `ma_user_partner_prefered_details`;

CREATE TABLE `ma_user_partner_prefered_details` (
  `uppd_id` int(11) NOT NULL AUTO_INCREMENT,
  `uppd_user_id` int(11) DEFAULT 0,
  `uppd_from_age` int(11) DEFAULT NULL,
  `uppd_to_age` int(11) DEFAULT NULL,
  `uppd_qualification` varchar(200) DEFAULT NULL,
  `uppd_profession` varchar(200) DEFAULT '0',
  `uppd_professionname` varchar(200) DEFAULT NULL,
  `uppd_eating_habits` varchar(200) DEFAULT NULL,
  `uppd_stateid` varchar(200) DEFAULT '0',
  `uppd_area` varchar(200) DEFAULT NULL,
  `uppd_other_requirement` text DEFAULT NULL,
  `uppd_from_height` varchar(200) DEFAULT NULL,
  `uppd_to_height` varchar(200) DEFAULT NULL,
  `uppd_updatedat` datetime DEFAULT NULL,
  PRIMARY KEY (`uppd_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ma_user_partner_prefered_details` */

/*Table structure for table `ma_user_personal_info` */

DROP TABLE IF EXISTS `ma_user_personal_info`;

CREATE TABLE `ma_user_personal_info` (
  `upi_id` int(11) NOT NULL AUTO_INCREMENT,
  `upi_user_id` int(11) DEFAULT 0,
  `upi_dateofbirth` varchar(200) DEFAULT NULL,
  `upi_age` varchar(200) DEFAULT NULL,
  `upi_birth_timings` varchar(200) DEFAULT NULL,
  `upi_birthplace` varchar(200) DEFAULT NULL,
  `upi_nri_living_country_name` varchar(200) DEFAULT NULL,
  `upi_country` varchar(200) DEFAULT '0',
  `upi_countryname` varchar(200) DEFAULT NULL,
  `upi_state` varchar(200) DEFAULT '0',
  `upi_statename` varchar(200) DEFAULT NULL,
  `upi_district` varchar(200) DEFAULT '0',
  `upi_districtname` varchar(200) DEFAULT NULL,
  `upi_gothram` varchar(200) DEFAULT NULL,
  `upi_caste` varchar(200) DEFAULT NULL,
  `upi_castename` varchar(200) DEFAULT NULL,
  `upi_star` varchar(200) DEFAULT '0',
  `upi_starname` varchar(200) DEFAULT NULL,
  `upi_rassi` varchar(200) DEFAULT '0',
  `upi_rassiname` varchar(200) DEFAULT NULL,
  `upi_leg` varchar(200) DEFAULT '0',
  `upi_legname` varchar(200) DEFAULT NULL,
  `upi_height` varchar(200) DEFAULT NULL,
  `upi_complexion` varchar(200) DEFAULT NULL,
  `upi_maritalstatus` varchar(200) DEFAULT 'Unmarried',
  `upi_manglik_status` varchar(200) DEFAULT 'No',
  `upi_physicaldisability` varchar(200) DEFAULT 'No',
  `upi_will_to_marry_widow` varchar(200) DEFAULT 'No',
  `upi_livingtogether` varchar(200) DEFAULT 'No',
  `upi_have_childerns` varchar(200) DEFAULT 'No',
  `upi_noofchilderns` smallint(2) DEFAULT 0,
  `upi_updateat` datetime DEFAULT NULL,
  PRIMARY KEY (`upi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ma_user_personal_info` */

/*Table structure for table `ma_user_restricted_details` */

DROP TABLE IF EXISTS `ma_user_restricted_details`;

CREATE TABLE `ma_user_restricted_details` (
  `urd_id` int(11) NOT NULL AUTO_INCREMENT,
  `urd_user_id` int(11) DEFAULT NULL,
  `urd_email` varchar(120) DEFAULT NULL,
  `urd_email_is_published` smallint(2) DEFAULT 1,
  `urd_profile_pic` varchar(120) DEFAULT NULL,
  `urd_profilepic_is_published` smallint(2) DEFAULT 1,
  `urd_primaryconactnumber` varchar(120) DEFAULT NULL,
  `urd_primarycontactnumber_is_published` smallint(2) DEFAULT 1,
  `urd_contactnumber` varchar(100) DEFAULT NULL,
  `urd_contactnumber_is_published` smallint(2) DEFAULT 1,
  `urd_landlinenumber` varchar(100) DEFAULT NULL,
  `urd_landinenumber_is_published` smallint(2) DEFAULT 1,
  `urd_native_district` varchar(200) DEFAULT NULL,
  `urd_communication_resident_type` varchar(200) DEFAULT NULL,
  `urd_communication_address` text DEFAULT NULL,
  `urd_communication_address_is_published` smallint(2) DEFAULT 1,
  `urd_present_address_resident_type` varchar(200) DEFAULT NULL,
  `urd_present_address` text DEFAULT NULL,
  `urd_present_address_is_published` smallint(2) DEFAULT 1,
  `urd_updatedat` datetime DEFAULT NULL,
  PRIMARY KEY (`urd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `ma_user_restricted_details` */

/*Table structure for table `ma_user_subscriptions` */

DROP TABLE IF EXISTS `ma_user_subscriptions`;

CREATE TABLE `ma_user_subscriptions` (
  `us_id` int(11) NOT NULL AUTO_INCREMENT,
  `us_user_id` int(11) DEFAULT 0,
  `us_fromdate` date DEFAULT NULL,
  `us_todate` date DEFAULT NULL,
  `us_paymentoption` smallint(2) DEFAULT 0,
  `us_paymentamount` float DEFAULT 0,
  `us_status` smallint(2) DEFAULT 1,
  `us_createdat` datetime DEFAULT NULL,
  `us_updatedat` datetime DEFAULT NULL,
  PRIMARY KEY (`us_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ma_user_subscriptions` */

/*Table structure for table `ma_users` */

DROP TABLE IF EXISTS `ma_users`;

CREATE TABLE `ma_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_registeredid` varchar(120) DEFAULT NULL COMMENT 'Search Term',
  `user_display_name` varchar(120) DEFAULT NULL COMMENT 'First Name + Middle Name',
  `user_email` varchar(120) DEFAULT NULL COMMENT 'Login Email',
  `user_mobile` varchar(120) DEFAULT NULL,
  `user_gender` varchar(100) DEFAULT NULL,
  `user_encrpted_password` varchar(120) DEFAULT NULL,
  `user_encodeed_password` varchar(120) DEFAULT NULL,
  `user_registered_thru` varchar(100) DEFAULT 'WebSite' COMMENT 'Registration from Google, FB, Site Registeration process',
  `user_provider` varchar(50) DEFAULT 'WebSite',
  `user_gmail_provider_id` varchar(120) DEFAULT NULL,
  `user_facebook_provider_id` varchar(120) DEFAULT NULL,
  `user_is_nri` smallint(2) DEFAULT 0,
  `user_is_secondmarriageprofile` smallint(2) DEFAULT 0,
  `user_is_featured` smallint(2) DEFAULT 0,
  `user_trailperiod_mode` smallint(2) DEFAULT 0,
  `user_trailperiod_fromdate` date DEFAULT NULL,
  `user_trailperiod_todate` date DEFAULT NULL,
  `user_tottrailperiod_days` int(11) DEFAULT 0,
  `user_profilepic` varchar(200) DEFAULT NULL,
  `user_settleted_status` smallint(2) DEFAULT 0 COMMENT 'User Match fixed from Our side Status mode.',
  `user_payment_status` smallint(2) DEFAULT 0,
  `user_payment_amount` float DEFAULT 0,
  `user_create_profile_for` varchar(30) DEFAULT NULL,
  `user_isagree` smallint(2) DEFAULT 0,
  `user_status` smallint(2) DEFAULT 0,
  `user_craetedat` datetime DEFAULT current_timestamp(),
  `user_updatedat` datetime DEFAULT current_timestamp(),
  `user_deletedat` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `ma_users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
