/*
SQLyog Community v12.4.3 (64 bit)
MySQL - 10.4.11-MariaDB : Database - nayeebraweb_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`nayeebraweb_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `nayeebraweb_db`;

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `ma_areas` */

insert  into `ma_areas`(`areaid`,`areadisplayid`,`areaname`,`areastatus`,`areacreatedat`,`areaupdatedat`,`areadeletedat`) values 
(1,'AREA2001','Andhra',1,NULL,NULL,NULL),
(2,'AREA2002','Telangana',1,NULL,NULL,NULL),
(3,'AREA2003','Rayalaseema',1,NULL,NULL,NULL);

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

/*Table structure for table `ma_bloodgroups` */

DROP TABLE IF EXISTS `ma_bloodgroups`;

CREATE TABLE `ma_bloodgroups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bggroupuqid` varchar(120) DEFAULT NULL,
  `bggroup` varchar(120) DEFAULT NULL,
  `status` tinyint(2) DEFAULT 1,
  `createdat` datetime DEFAULT current_timestamp(),
  `updatedat` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ma_bloodgroups` */

insert  into `ma_bloodgroups`(`id`,`bggroupuqid`,`bggroup`,`status`,`createdat`,`updatedat`) values 
(1,'BGROUP01','O-',1,'2020-12-23 10:11:48','2020-12-23 10:11:48'),
(2,'BGROUP02','O+',1,'2020-12-23 10:11:54','2020-12-23 10:11:54'),
(3,'BGROUP03','A-',1,'2020-12-23 10:11:56','2020-12-23 10:11:56'),
(4,'BGROUP04','A+',1,'2020-12-23 10:12:10','2020-12-23 10:12:10'),
(5,'BGROUP05','B-',1,'2020-12-23 10:12:17','2020-12-23 10:12:17'),
(6,'BGROUP06','B+',1,'2020-12-23 10:12:23','2020-12-23 10:12:23'),
(7,'BGROUP07','AB-',1,'2020-12-23 10:12:29','2020-12-23 10:12:29'),
(8,'BGROUP08','AB+',1,'2020-12-23 10:12:31','2020-12-23 10:12:31');

/*Table structure for table `ma_cities` */

DROP TABLE IF EXISTS `ma_cities`;

CREATE TABLE `ma_cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stateid` int(11) DEFAULT 36,
  `cityuqid` varchar(120) DEFAULT NULL,
  `cityname` varchar(120) DEFAULT NULL,
  `status` tinyint(2) DEFAULT 1,
  `createdat` datetime DEFAULT current_timestamp(),
  `updatedat` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ma_cities` */

insert  into `ma_cities`(`id`,`stateid`,`cityuqid`,`cityname`,`status`,`createdat`,`updatedat`) values 
(1,36,'CITY01','Adilabad',1,'2020-12-23 09:57:32','2020-12-23 09:57:36'),
(2,36,'CITY02','Bhadradri Kothagudem',1,'2020-12-23 09:58:47','2020-12-23 09:58:47'),
(3,36,'CITY03','Hyderabad',1,'2020-12-23 10:00:04','2020-12-23 10:00:04'),
(4,36,'CITY04','Jagtial',1,'2020-12-23 10:00:18','2020-12-23 10:00:18'),
(5,36,'CITY05','Jangaon',1,'2020-12-23 10:00:20','2020-12-23 10:00:20'),
(6,36,'CITY06','Jayashankar Bhoopalpally',1,'2020-12-23 10:00:30','2020-12-23 10:00:30'),
(7,36,'CITY07','Jogulamba Gadwal',1,'2020-12-23 10:00:42','2020-12-23 10:00:42'),
(8,36,'CITY08','Kamareddy',1,'2020-12-23 10:00:47','2020-12-23 10:00:47'),
(9,36,'CITY09','Karimnagar',1,'2020-12-23 10:00:55','2020-12-23 10:00:55'),
(10,36,'CITY10','Khammam',1,'2020-12-23 10:00:56','2020-12-23 10:00:56'),
(11,36,'CITY11','Komaram Bheem Asifabad',1,'2020-12-23 10:01:20','2020-12-23 10:01:20'),
(12,36,'CITY12','Mahabubabad',1,'2020-12-23 10:02:27','2020-12-23 10:02:27'),
(13,36,'CITY13','Mahabubnagar',1,'2020-12-23 10:02:39','2020-12-23 10:02:39'),
(14,36,'CITY14','Mancherial',1,'2020-12-23 10:02:45','2020-12-23 10:02:45'),
(15,36,'CITY15','Medak',1,'2020-12-23 10:02:50','2020-12-23 10:02:50'),
(16,36,'CITY16','Medchal',1,'2020-12-23 10:02:56','2020-12-23 10:02:56'),
(17,36,'CITY17','Nagarkurnool',1,'2020-12-23 10:03:02','2020-12-23 10:03:02'),
(18,36,'CITY18','Nalgonda',1,'2020-12-23 10:03:09','2020-12-23 10:03:09'),
(19,36,'CITY19','Nirmal',1,'2020-12-23 10:03:14','2020-12-23 10:03:14'),
(20,36,'CITY20','Nizamabad',1,'2020-12-23 10:03:20','2020-12-23 10:03:20'),
(21,36,'CITY21','Peddapalli',1,'2020-12-23 10:03:31','2020-12-23 10:03:31'),
(22,36,'CITY22','Rajanna Sircilla',1,'2020-12-23 10:03:37','2020-12-23 10:03:37'),
(23,36,'CITY23','Rangareddy',1,'2020-12-23 10:03:42','2020-12-23 10:03:42'),
(24,36,'CITY24','Sangareddy',1,'2020-12-23 10:03:48','2020-12-23 10:03:48'),
(25,36,'CITY25','Siddipet',1,'2020-12-23 10:03:53','2020-12-23 10:03:53'),
(26,36,'CITY26','Suryapet',1,'2020-12-23 10:03:59','2020-12-23 10:03:59'),
(27,36,'CITY27','Vikarabad',1,'2020-12-23 10:04:08','2020-12-23 10:04:08'),
(28,36,'CITY28','Wanaparthy',1,'2020-12-23 10:04:15','2020-12-23 10:04:15'),
(29,36,'CITY29','Warangal',1,'2020-12-23 10:04:26','2020-12-23 10:04:26'),
(30,36,'CITY30','Yadadri Bhuvanagiri',1,'2020-12-23 10:04:28','2020-12-23 10:04:28');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ma_community_subcastes` */

insert  into `ma_community_subcastes`(`subcasteid`,`subcastedisplayid`,`communityid`,`subcastename`,`subcasteseourl`,`subcasteimage`,`subcastestatus`,`subcastecreatedat`,`subcasteupdatedat`,`subcastedeletedat`) values 
(1,'SUBCASTE2001',1,'Kamsali','kamsali',NULL,2,'2020-09-19 08:47:05','2020-09-19 07:56:47','2020-12-15 09:47:23'),
(2,'SUBCASTE2002',1,'Vadrangi','vadrangi',NULL,1,'2020-09-19 08:56:34','2020-09-19 07:56:30',NULL),
(3,'SUBCASTE2003',1,'Shilpi','shilpi',NULL,2,'2020-09-19 16:49:53','2020-09-19 16:49:53','2020-09-19 12:20:12'),
(4,'SUBCASTE2004',1,'Kammari','kammari',NULL,1,'2020-10-12 04:27:21','2020-10-12 04:27:21',NULL),
(5,'SUBCASTE2005',1,'Kannchari','kannchari',NULL,1,'2020-10-12 04:27:35','2020-10-12 04:27:35',NULL),
(6,'SUBCASTE2006',1,'Konda','konda',NULL,1,'2020-12-15 03:47:34','2020-12-15 03:47:34',NULL);

/*Table structure for table `ma_family_members` */

DROP TABLE IF EXISTS `ma_family_members`;

CREATE TABLE `ma_family_members` (
  `fmid` int(11) NOT NULL AUTO_INCREMENT,
  `profile_registeredid` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_fullname` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_middlename` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_surname` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_fathername` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_mothername` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_occupation` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_gothram` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_marital_status` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_nri` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_community_status` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_dob` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_native_district` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_residence_type` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_present_address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_house_no` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_plot_no` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_street_no` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_land_mark` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_area` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_mandal` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_district` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_state` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_location_area` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_location_area_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_qualification` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_blood_group` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_phone` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_password` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_encrpted_password` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_status` tinyint(2) DEFAULT NULL,
  `profile_createdat` datetime DEFAULT NULL,
  `profile_updatedat` datetime DEFAULT NULL,
  `profile_deletedat` datetime DEFAULT NULL,
  PRIMARY KEY (`fmid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `ma_family_members` */

insert  into `ma_family_members`(`fmid`,`profile_registeredid`,`profile_fullname`,`profile_middlename`,`profile_surname`,`profile_fathername`,`profile_mothername`,`profile_occupation`,`profile_gothram`,`profile_marital_status`,`profile_nri`,`profile_community_status`,`profile_dob`,`profile_native_district`,`profile_residence_type`,`profile_present_address`,`profile_house_no`,`profile_plot_no`,`profile_street_no`,`profile_land_mark`,`profile_area`,`profile_mandal`,`profile_district`,`profile_state`,`profile_location_area`,`profile_location_area_name`,`profile_qualification`,`profile_blood_group`,`profile_phone`,`profile_email`,`profile_password`,`profile_encrpted_password`,`profile_status`,`profile_createdat`,`profile_updatedat`,`profile_deletedat`) values 
(1,'PROFILE01','PANDURANGARAO','Kumar','Konda','Pandurangarao','Balaswarathi','PROFESSION2008','MHello','married','India','konda','1997-11-18','Hyderabad','own',NULL,'PLOT4,G2 G','PLOT4,G2 G','PLOT4,G2 GROUND FLOOR,VEDIRI TOWNSHIP','PLOT4,G2 G','PLOT4,G2 G','PLOT4,G2 G','PLOT4,G2 G','Telangana','CITY20','Nizamabad','','','8500222765','dileepkumarkonda@gmail.com','e10adc3949ba59abbe56e057f20f883e','MTIzNDU2',1,'2020-12-19 06:41:34','2021-01-25 20:41:18',NULL),
(2,'PROFILE02','Dileepkumarkonda@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'6045021111','jag449@hotmail.com','fcea920f7412b5da7be0cf42b8c93759','MTIzNDU2Nw==',3,'2020-12-19 07:05:05','2020-12-19 07:05:05',NULL),
(3,'PROFILE03','Dileepkumarkonda1@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'08500222765','dileepkumarkonda1@gmail.com','7cec85c75537840dad40251576e5b757','MTIzNTY=',3,'2020-12-19 07:05:58','2020-12-19 07:05:58',NULL),
(4,'PROFILE04','Dileep',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'9500222765','dileepkumarkonda123@gmail.com','e10adc3949ba59abbe56e057f20f883e','MTIzNDU2',3,'2020-12-19 07:08:33','2020-12-19 07:08:33',NULL),
(5,'PROFILE05','Testing',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1234567891','jag449123@hotmail.com','e10adc3949ba59abbe56e057f20f883e','MTIzNDU2',3,'2020-12-19 13:05:14','2020-12-19 13:05:14',NULL),
(6,'PROFILE06','Testing',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1212122123','dile@gmail.com','e10adc3949ba59abbe56e057f20f883e','MTIzNDU2',3,'2020-12-19 13:18:37','2020-12-19 13:18:37',NULL),
(7,'PROFILE07','Naveen.beloori@kelltontech.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'8888888888','retry@gmail.com','e10adc3949ba59abbe56e057f20f883e','MTIzNDU2',3,'2020-12-22 05:06:21','2020-12-22 05:06:21',NULL),
(8,'PROFILE08','Dileep',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'8888881232','dileepkumarkonda1234@gmail.com','25d55ad283aa400af464c76d713c07ad','MTIzNDU2Nzg=',3,'2021-01-23 07:21:26','2021-01-23 07:21:26',NULL),
(9,'PROFILE09','Dileep',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'9052890234','dkonda@gmail.com','e10adc3949ba59abbe56e057f20f883e','MTIzNDU2',3,'2021-01-25 11:32:29','2021-01-25 11:32:29',NULL);

/*Table structure for table `ma_family_members_bloods` */

DROP TABLE IF EXISTS `ma_family_members_bloods`;

CREATE TABLE `ma_family_members_bloods` (
  `pmmid` int(11) NOT NULL AUTO_INCREMENT,
  `profile_parentid` int(11) DEFAULT 0,
  `profile_partner_member_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_partner_realtion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_partner_marital_status` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_partner_qualification_profession` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_partner_profession` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_partner_dob_date` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`pmmid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `ma_family_members_bloods` */

insert  into `ma_family_members_bloods`(`pmmid`,`profile_parentid`,`profile_partner_member_name`,`profile_partner_realtion`,`profile_partner_marital_status`,`profile_partner_qualification_profession`,`profile_partner_profession`,`profile_partner_dob_date`) values 
(1,1,'testing','son','single',NULL,'PROFESSION2003','1997-10-1'),
(2,1,'testing','daughter','married',NULL,'PROFESSION2002','1996-10-19'),
(3,1,'testing','son','single','QUALIFICATION04','PROFESSION2003','1997-10-1'),
(4,1,'testing','daughter','married','QUALIFICATION02','PROFESSION2002','1996-10-19');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ma_professions` */

insert  into `ma_professions`(`professionid`,`professiondisplayid`,`professionname`,`professionstatus`,`professioncraetedat`,`professionupdatedat`,`professiondeletedat`) values 
(1,'PROFESSION2001','Private Job',1,'2020-09-19 11:38:15','2020-09-19 07:28:56',NULL),
(2,'PROFESSION2002','Business',1,'2020-09-19 11:58:18','2020-09-19 11:58:18',NULL),
(3,'PROFESSION2003','Doctor',1,'2020-12-15 03:48:08','2020-12-15 03:48:08',NULL),
(4,'PROFESSION2004','Govt Job',1,'2020-12-23 10:43:25','2020-12-23 10:43:25',NULL),
(5,'PROFESSION2005','Advocate',1,'2020-12-23 10:43:49','2020-12-23 10:43:49',NULL),
(6,'PROFESSION2006','Accountant',1,'2020-12-23 10:45:03','2020-12-23 10:45:03',NULL),
(7,'PROFESSION2007','Industrialist',1,'2020-12-23 10:45:07','2020-12-23 10:45:07',NULL),
(8,'PROFESSION2008','Musician',1,'2020-12-23 10:45:12','2020-12-23 10:45:12',NULL),
(9,'PROFESSION2009','Software',1,'2020-12-23 10:45:17','2020-12-23 10:45:17',NULL),
(10,'PROFESSION2010','Mechanical',1,'2020-12-23 10:45:19','2020-12-23 10:45:19',NULL);

/*Table structure for table `ma_qualification` */

DROP TABLE IF EXISTS `ma_qualification`;

CREATE TABLE `ma_qualification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qualificationuqid` varchar(200) DEFAULT NULL,
  `qualificationname` varchar(200) DEFAULT NULL,
  `status` tinyint(2) DEFAULT 1,
  `createdat` datetime DEFAULT current_timestamp(),
  `updatedat` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ma_qualification` */

insert  into `ma_qualification`(`id`,`qualificationuqid`,`qualificationname`,`status`,`createdat`,`updatedat`) values 
(1,'QUALIFICATION01','Secondary School',1,'2020-12-23 10:52:04','2020-12-23 10:52:04'),
(2,'QUALIFICATION02','Intermediate',1,'2020-12-23 10:52:14','2020-12-23 10:52:14'),
(3,'QUALIFICATION03','Degree',1,'2020-12-23 10:52:29','2020-12-23 10:52:29'),
(4,'QUALIFICATION04','Post Graduation ',1,'2020-12-23 10:52:30','2020-12-23 10:52:30'),
(5,'QUALIFICATION05','PHD',1,'2020-12-23 10:52:39','2020-12-23 10:52:39');

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

/*Table structure for table `ma_referal_codes` */

DROP TABLE IF EXISTS `ma_referal_codes`;

CREATE TABLE `ma_referal_codes` (
  `rfid` int(11) NOT NULL AUTO_INCREMENT,
  `rfuqid` varchar(120) DEFAULT NULL,
  `rfuserid` int(11) DEFAULT 0,
  `rfname` varchar(150) DEFAULT NULL,
  `rfusedcount` int(11) DEFAULT 0,
  `rfstatus` tinyint(2) DEFAULT 1,
  `rfcreatedat` datetime DEFAULT NULL,
  `rfupdatedat` datetime DEFAULT NULL,
  `rfdeletedat` datetime DEFAULT NULL,
  PRIMARY KEY (`rfid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ma_referal_codes` */

insert  into `ma_referal_codes`(`rfid`,`rfuqid`,`rfuserid`,`rfname`,`rfusedcount`,`rfstatus`,`rfcreatedat`,`rfupdatedat`,`rfdeletedat`) values 
(1,'nayeebrahmin01',0,'NAYEEBRAHMIN01',7,1,'2020-12-18 09:32:24','2020-12-18 09:32:28',NULL),
(3,'uwkgpradik02',2,'UWKGPRADIK02',2,1,'2020-12-19 07:05:05','2020-12-19 07:05:05',NULL),
(4,'ie6flubdh803',3,'IE6FLUBDH803',0,1,'2020-12-19 07:05:58','2020-12-19 07:05:58',NULL),
(5,'cfov5clu4g04',4,'CFOV5CLU4G04',0,1,'2020-12-19 07:08:33','2020-12-19 07:08:33',NULL),
(6,'40m9tc3ju805',5,'40M9TC3JU805',0,1,'2020-12-19 13:05:14','2020-12-19 13:05:14',NULL),
(7,'fphkzrx5ui06',6,'FPHKZRX5UI06',0,1,'2020-12-19 13:18:37','2020-12-19 13:18:37',NULL),
(8,'tgntvjklco07',7,'TGNTVJKLCO07',0,1,'2020-12-22 05:06:21','2020-12-22 05:06:21',NULL),
(9,'wy5vcijfmq08',8,'WY5VCIJFMQ08',0,1,'2021-01-23 07:21:26','2021-01-23 07:21:26',NULL),
(10,'dfma30zpso09',9,'DFMA30ZPSO09',0,1,'2021-01-25 11:32:30','2021-01-25 11:32:30',NULL);

/*Table structure for table `ma_referal_used_users` */

DROP TABLE IF EXISTS `ma_referal_used_users`;

CREATE TABLE `ma_referal_used_users` (
  `ruuid` int(11) NOT NULL AUTO_INCREMENT,
  `refferalid` int(11) DEFAULT 0,
  `refferalcode` varchar(150) DEFAULT NULL,
  `userid` int(11) DEFAULT 0,
  `username` varchar(150) DEFAULT NULL,
  `refferal_userid` int(11) DEFAULT 0,
  `refferal_username` varchar(150) DEFAULT NULL,
  `status` tinyint(2) DEFAULT 1,
  `createdat` datetime DEFAULT NULL,
  `updatedat` datetime DEFAULT NULL,
  PRIMARY KEY (`ruuid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ma_referal_used_users` */

insert  into `ma_referal_used_users`(`ruuid`,`refferalid`,`refferalcode`,`userid`,`username`,`refferal_userid`,`refferal_username`,`status`,`createdat`,`updatedat`) values 
(1,1,'NAYEEBRAHMIN01',1,'Dileep',0,NULL,1,'2020-12-19 06:41:34','2020-12-19 06:41:34'),
(2,1,'NAYEEBRAHMIN01',2,'Dileepkumarkonda@gmail.com',0,NULL,1,'2020-12-19 07:05:05','2020-12-19 07:05:05'),
(3,1,'NAYEEBRAHMIN01',3,'Dileepkumarkonda1@gmail.com',0,NULL,1,'2020-12-19 07:05:58','2020-12-19 07:05:58'),
(4,1,'NAYEEBRAHMIN01',4,'Dileep',0,NULL,1,'2020-12-19 07:08:33','2020-12-19 07:08:33'),
(5,1,'NAYEEBRAHMIN01',5,'Testing',0,NULL,1,'2020-12-19 13:05:14','2020-12-19 13:05:14'),
(6,3,'UWKGPRADIK02',6,'Testing',2,NULL,1,'2020-12-19 13:18:37','2020-12-19 13:18:37'),
(7,3,'UWKGPRADIK02',7,'Naveen.beloori@kelltontech.com',2,NULL,1,'2020-12-22 05:06:21','2020-12-22 05:06:21'),
(8,1,'NAYEEBRAHMIN01',8,'Dileep',0,NULL,1,'2021-01-23 07:21:26','2021-01-23 07:21:26'),
(9,1,'NAYEEBRAHMIN01',9,'Dileep',0,NULL,1,'2021-01-25 11:32:30','2021-01-25 11:32:30');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ma_servicemaster` */

insert  into `ma_servicemaster`(`servicemasterid`,`servicemasterdisplayid`,`servicemastername`,`servicemasterwebimage`,`servicemastermobileimage`,`servicemasterseo`,`servicemasterstatus`,`servicemastercreatedat`,`servicemasterupdatedat`,`servicemasterdeletedat`) values 
(1,'SERVICE2001','Jobs','15102020120712catering(3).png','Mob_15102020120712catering(3).png','jobs',1,'2020-09-19 20:13:36','2020-09-19 20:13:36',NULL),
(2,'SERVICE2002','Photo & Videography','15102020121708Camera-1.png','mob_15102020121708Camera-1.png','photo-amp-videography',1,'2020-10-01 23:27:11','2020-10-01 23:27:11',NULL),
(3,'SERVICE2003','Music','15102020122120Music.png','mob_15102020122120Music.png','music',1,'2020-10-11 12:29:44','2020-10-11 12:29:44',NULL),
(4,'SERVICE2004','Flower Decorators','15102020123800Flowers-Decoration.png','mob_15102020123800Flowers-Decoration.png','flower-decorators',1,'2020-10-11 12:30:02','2020-10-11 12:30:02',NULL),
(5,'SERVICE2005','Pandits','14102020143947users-icon.png','Mob_14102020143947users-icon.png','pandits',1,'2020-10-11 12:30:17','2020-10-11 12:30:17',NULL),
(6,'SERVICE2006','Honeymoon Packages','15102020122603Honeymoon.png','mob_15102020122603Honeymoon.png','honeymoon-packages',1,'2020-10-11 12:30:34','2020-10-11 12:30:34',NULL),
(7,'SERVICE2007','Wedding Halls','15102020125753Weddng-Hall.png','mob_15102020125753Weddng-Hall.png','wedding-halls',1,'2020-10-11 12:30:54','2020-10-11 12:30:54',NULL),
(8,'SERVICE2008','Stage Decorators','15102020123127Decoration.png','mob_15102020123127Decoration.png','stage-decorators',1,'2020-10-11 12:31:11','2020-10-11 12:31:11',NULL),
(9,'SERVICE2009','Job','15122020095103SSGraphics.jpg',NULL,'job',2,'2020-12-15 03:51:03','2020-12-15 03:51:03','2020-12-15 09:51:11');

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
(9,'USERSERVICE2009','SERVICE2008','Stage / Mandap Decorators','Dileep Decorators','dileep-decorators','ramtantraphotos@gmail.com','9989789456','8877456321','040 - 40140199','Tricon Heights Apartment, Puppalaguda, Manikonda, Hyderabad - 500089, Near Kid Zee School.','https://www.ramantatraphotos.com','11102020180413blc-img2.jpg','mob_11102020180413blc-img2.jpg','Wedding Photography','Candid Shoot','','',0,NULL,'2020-10-02','2021-10-02',365,2,'2020-10-11 13:04:13','2020-10-11 13:04:13','2020-12-15 09:56:00'),
(10,'USERSERVICE2010','SERVICE2008','Stage Decorators','Dileep Stage Decorators','dileep-stage-decorators','dileepkumarkonda@gmail.com','08500222765','','','PLOT4,G2 GROUND FLOOR,VEDIRI TOWNSHIP\r\nHMT SWARANPURI COLONY, 14TH LINE','http://matrimonyapp.in/','25102020104054ps-img1.png',NULL,'Catering','Photography','','',0,1,'0000-00-00','0000-00-00',0,3,'2020-10-25 10:40:54','2020-10-25 10:40:54',NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `ma_subscribers` */

insert  into `ma_subscribers`(`sbid`,`sbipaddress`,`sbemail`,`sbstatus`,`sbcreatedat`,`sbupdatedat`) values 
(1,'160.238.75.210','dileepkumarkonda@gmail.com',1,'2020-10-24 14:42:08','2020-10-24 14:42:08');

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
) ENGINE=MyISAM AUTO_INCREMENT=347 DEFAULT CHARSET=latin1;

/*Data for the table `ma_user_educational_details` */

insert  into `ma_user_educational_details`(`ued_id`,`ued_user_id`,`ued_education_qualifications`,`ued_profession_id`,`ued_profession_name`,`ued_place_work`,`ued_company_name`,`ued_job_role`,`ued_income`,`ued_othersourceofincome`,`ued_updatedat`) values 
(36,14,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-13 08:17:05'),
(340,5,'B.Ed','PROFESSION2001','Job','Hyderabad','Oakridge International School','Teacher','60,000','20,000','2020-10-25 08:04:12'),
(339,6,'BA','PROFESSION2001','Job','Hyderabad','Park Hyatt','Receptionist','50,000','15,000','2020-10-25 08:03:40'),
(337,8,'B.A (cinematography)','PROFESSION2001','Job','Hyderabad','','Cinematographer','2,00,000','','2020-10-25 08:03:02'),
(336,9,'B.A (Honours)','PROFESSION2001','Job','Hyderabad','','Actor','2,00,000','15,000','2020-10-25 08:02:37'),
(27,10,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-13 07:19:33'),
(335,11,'MBA','PROFESSION2001','Job','Hitech City ','Tata Consultancy Services','Software Engineer','95000','35000','2020-10-25 08:01:21'),
(247,12,'B.Ed','PROFESSION2001','Job','Hyderabad','Cambridge International School','Teacher','30,000','','2020-10-17 08:48:20'),
(334,13,'B.Tech','PROFESSION2002','Business','Hyderabad','Niharika Enterprises','Owner','1,00,000','','2020-10-25 07:55:31'),
(41,15,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-13 08:57:51'),
(42,16,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-13 08:59:00'),
(343,2,'B.Tech','PROFESSION2001','Job','Bangalore','Dell','Hardware Engineer','120000','15000','2020-10-25 08:11:50'),
(333,17,'Dip.Mech','PROFESSION2001','Job','Hitech City','Tata Consultancy','Software Engineer','75,000','20,000','2020-10-25 07:55:15'),
(330,20,'MBA','PROFESSION2001','Job','Hitech City','IBM','Software Engineer','1,50,000','20,000','2020-10-25 07:53:38'),
(329,21,'B.Arch','PROFESSION2001','Job','Hitech City','L&T','Sr. Engineer','1,00,000','10,000','2020-10-25 07:53:21'),
(327,23,'B.Tech','PROFESSION2001','Job','Hitech City','DXC Company','Software Engineer','60,000','','2020-10-25 07:46:53'),
(325,25,'B.Tech','PROFESSION2001','Job','Hitech City','Google','Software Engineer','60,000','20,000','2020-10-25 07:38:56'),
(324,26,'MS','PROFESSION2001','Job','Hyderabad','Paraxel','Software Engineer','1,60,000','20,000','2020-10-25 07:38:38'),
(323,27,'MBBS','PROFESSION2001','Job','Hyderabad','','Doctor','80,000','30,000','2020-10-25 07:38:21'),
(322,28,'MBA','PROFESSION2001','Job','Hyderabad','Cognizent','Software Engineer','90,000','15,000','2020-10-25 07:38:00'),
(321,29,'B.Arch','PROFESSION2001','Job','Hyderabad','','Sr. Engineer','80,000','30,000','2020-10-25 07:37:42'),
(319,31,'MS','PROFESSION2001','Job','Hitech City','L&T','Sr.Engineer','1,50,000','60,000','2020-10-25 07:36:51'),
(318,32,'B.Tech','','','Hyderabad','Cognizent','Software Engineer','80,000','50,000','2020-10-25 07:36:31'),
(92,34,'MBA','0','Business','toronto','','','1,00,000','','2020-10-13 12:28:58'),
(94,35,'M.Tech','0','Job','','Apple','Software Engineer','2,00,000','','2020-10-13 12:36:04'),
(316,36,'MBA','','','toronto','DXC Solutions','Manager','2,00,000','50,000','2020-10-25 07:35:29'),
(313,39,'LLB','PROFESSION2001','Job','Hyderabad','High Court','Lawyer','50,000','20,000','2020-10-25 07:34:11'),
(312,40,'MBBS','PROFESSION2001','Job','Hyderabad','Yashoda Hospital','Doctor','60,000','30,000','2020-10-25 07:33:52'),
(309,43,'Diploma','PROFESSION2002','Business','Hitech City','Royal Enfield','Automation Engineer','80,000','20,000','2020-10-25 07:32:39'),
(332,18,'B.Tech','PROFESSION2001','Job','Hyderabad','Cognizent','Software Engineer','60,000','20,000','2020-10-25 07:54:58'),
(326,24,'B.Tech/MCA','PROFESSION2001','Job','Hitech City','Cognizant','Software Engineer','1,60,000','30,000','2020-10-25 07:46:32'),
(311,41,'B.Arch','PROFESSION2001','Job','Hyderabad','Prashanth Constructions','Architect','1,00,000','30,000','2020-10-25 07:33:24'),
(310,42,'B.Tech','PROFESSION2001','Job','Hyderabad','BSNL','Software Engineer','75,000','15,000','2020-10-25 07:33:08'),
(320,30,'MBA','PROFESSION2001','Job','California','Apple','Developer','2,00,000','50,000','2020-10-25 07:37:09'),
(346,37,'M.Tech','PROFESSION2001','Job','California','Apple','Developer','2,00,000','30,000','2020-12-15 09:43:08'),
(314,38,'B.Arch','PROFESSION2002','Business','Paris','','Architect','2,00,000','','2020-10-25 07:34:34'),
(308,44,'MBA','PROFESSION2002','Business','Hyderabad','Rohit Enterprises','Owner','80,000','40,000','2020-10-25 07:31:43'),
(328,22,'B.Tech','PROFESSION2001','Job','Hyderabad','GDK Global','','70,000','15,000','2020-10-25 07:52:57'),
(331,19,'B.Tech','PROFESSION2002','Business','Bangalore','Restaurant','','1,00,000','10,000','2020-10-25 07:54:38'),
(338,7,'B.Tech/MCA','PROFESSION2001','Job','Hitech City','DXC Company','Software Engineer','80,000','30,000','2020-10-25 08:03:21'),
(341,4,'LLB','PROFESSION2001','Job','Hyderabad','High Court','Lawyer','40,000','20,000','2020-10-25 08:04:42'),
(342,3,'MBA','PROFESSION2002','Business','Guntur','Super Market','Owner','85000','10000','2020-10-25 08:05:10'),
(345,1,'M.com','PROFESSION2001','Job','Hyderabad','DLF','Software Engineer','45000','10000','2020-10-25 08:25:01'),
(267,45,'B.tech','PROFESSION2001','Job','Hitech City','TCS','Software Engineer','80,000','20,000','2020-10-21 10:49:00'),
(274,46,'B.tech','PROFESSION2001','Job','Hitech City','TCS','Software Engineer','80,000','20,000','2020-10-21 11:28:30'),
(275,47,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-21 11:31:47'),
(291,48,'B.Tech','PROFESSION2002','Business','Hyderabad','Spicy Hut','Owner','1,00,000','20,000','2020-10-22 17:31:04'),
(317,33,'B.Tech','PROFESSION2001','Job','Hyderabad','Google','Software Engineer','1,50,000','30,000','2020-10-25 07:35:52');

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
  `upd_elder_younger1` smallint(2) DEFAULT 0,
  `upd_brothername1` varchar(200) DEFAULT NULL,
  `upd_marital_status1` varchar(200) DEFAULT NULL,
  `upd_brother1_profession` varchar(200) DEFAULT NULL,
  `upd_elder_younger2` smallint(2) DEFAULT 0,
  `upd_brothername2` varchar(200) DEFAULT NULL,
  `upd_marital_status2` varchar(200) DEFAULT NULL,
  `upd_brother2_profession` varchar(200) DEFAULT NULL,
  `upd_elder_younger3` smallint(2) DEFAULT 0,
  `upd_brothername3` varchar(200) DEFAULT NULL,
  `upd_marital_status3` varchar(200) DEFAULT NULL,
  `upd_brother3_profession` varchar(200) DEFAULT NULL,
  `upd_elder_younger4` smallint(2) DEFAULT 0,
  `upd_brothername4` varchar(200) DEFAULT NULL,
  `upd_marital_status4` varchar(200) DEFAULT NULL,
  `upd_brother4_profession` varchar(200) DEFAULT NULL,
  `upd_elder_younger5` smallint(2) DEFAULT 0,
  `upd_brothername5` varchar(200) DEFAULT NULL,
  `upd_marital_status5` varchar(200) DEFAULT NULL,
  `upd_brother5_profession` varchar(200) DEFAULT NULL,
  `upd_sister_elder_younger1` smallint(2) DEFAULT 0,
  `upd_sistername1` varchar(200) DEFAULT NULL,
  `upd_sister_marital_status1` varchar(200) DEFAULT NULL,
  `upd_sister1_profession` varchar(200) DEFAULT NULL,
  `upd_sister_elder_younger2` smallint(2) DEFAULT 0,
  `upd_sistername2` varchar(200) DEFAULT NULL,
  `upd_sister_marital_status2` varchar(200) DEFAULT NULL,
  `upd_sister2_profession` varchar(200) DEFAULT NULL,
  `upd_sister_elder_younger3` smallint(2) DEFAULT 0,
  `upd_sistername3` varchar(200) DEFAULT NULL,
  `upd_sister_marital_status3` varchar(200) DEFAULT NULL,
  `upd_sister3_profession` varchar(200) DEFAULT NULL,
  `upd_sister_elder_younger4` smallint(2) DEFAULT 0,
  `upd_sistername4` varchar(200) DEFAULT NULL,
  `upd_sister_marital_status4` varchar(200) DEFAULT NULL,
  `upd_sister4_profession` varchar(200) DEFAULT NULL,
  `upd_sister_elder_younger5` smallint(2) DEFAULT 0,
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
) ENGINE=MyISAM AUTO_INCREMENT=347 DEFAULT CHARSET=latin1;

/*Data for the table `ma_user_family_details` */

insert  into `ma_user_family_details`(`upd_id`,`upd_user_id`,`upd_surname`,`upd_fathername`,`upd_father_profession`,`upd_mothername`,`upd_mother_profession`,`upd_noofbrothers`,`upd_noofsisters`,`upd_elder_younger1`,`upd_brothername1`,`upd_marital_status1`,`upd_brother1_profession`,`upd_elder_younger2`,`upd_brothername2`,`upd_marital_status2`,`upd_brother2_profession`,`upd_elder_younger3`,`upd_brothername3`,`upd_marital_status3`,`upd_brother3_profession`,`upd_elder_younger4`,`upd_brothername4`,`upd_marital_status4`,`upd_brother4_profession`,`upd_elder_younger5`,`upd_brothername5`,`upd_marital_status5`,`upd_brother5_profession`,`upd_sister_elder_younger1`,`upd_sistername1`,`upd_sister_marital_status1`,`upd_sister1_profession`,`upd_sister_elder_younger2`,`upd_sistername2`,`upd_sister_marital_status2`,`upd_sister2_profession`,`upd_sister_elder_younger3`,`upd_sistername3`,`upd_sister_marital_status3`,`upd_sister3_profession`,`upd_sister_elder_younger4`,`upd_sistername4`,`upd_sister_marital_status4`,`upd_sister4_profession`,`upd_sister_elder_younger5`,`upd_sistername5`,`upd_sister_marital_status5`,`upd_sister5_profession`,`upd_any_other_requirements`,`upd_elder_brothers`,`upd_younger_brothers`,`upd_married_brothers`,`upd_elder_sisters`,`upd_younger_sisters`,`upd_married_sisters`,`upd_updatedat`) values 
(346,37,'konidela','K.Seetha Ram','Retd. Bank Employee','K.Vijaya Lakshmi','Retd. Bank Employee',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-12-15 09:43:08'),
(267,45,'Sambhoju','Srinivas','CA','Ratna Prabha','Housewife',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-21 10:49:00'),
(342,3,'ramama','Padma rao','Job','Govardna','Home Maker',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 08:05:10'),
(340,5,'Dendukuri','D.Suresh','Central Govt. Employee','D.Hema','Business',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 08:04:12'),
(42,16,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-13 08:59:00'),
(339,6,'Kuntala','K.Harish Rao','Business','K.Suvarna','Housemaker',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 08:03:40'),
(335,11,'Narayanapuram','Satyanarayana','Job','Rama Devi','job',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 08:01:21'),
(41,15,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-13 08:57:51'),
(337,8,'pullela','Rajashekhar','Business','Akhilandeshwari','Housemaker',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 08:03:02'),
(27,10,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-13 07:19:33'),
(247,12,'Vemulapalli','V.Srinivas','Business','V.Saroja','Housemaker',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-17 08:48:20'),
(36,14,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-13 08:17:05'),
(334,13,'kajana','Satyanarayana','Business','lakshmi','Housemaker',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 07:55:31'),
(333,17,'Devarakonda','D.Theerthanand','Retd.Govt.Teacher',' D.Satya Kumari','Housemaker',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 07:55:15'),
(332,18,'Pudipeddi','Sudarshan','Business','Jyothi','Retd. Bank Employee',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 07:54:58'),
(331,19,'Nellutla','N.Brahmanandam','Business','N.Uma Rani','Housemaker',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 07:54:38'),
(330,20,'Thimmapur','T.Rama Krishna Rao','Business','T.Suguna Kumari','Business',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 07:53:38'),
(329,21,'Nara','N.Vishwarupa Chary','Job','N.Vineetha','Housemaker',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 07:53:21'),
(328,22,'Alluri','A.Ramalinga Chary','Retd.Govt.Teacher','A.Prema Kumari','Housemaker',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 07:52:57'),
(327,23,'Nara','N.Raju','Business','B.Lalitha','Housemaker',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 07:46:53'),
(326,24,'Veeram','V.Chandrasekhar Achari ','Business','V.Vijayalaxmi ','Business',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 07:46:32'),
(325,25,'Sambhoju','S.Rama Krishna Rao','Retd. Bank Employee','S.Suguna Kumari','Housemaker',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 07:38:56'),
(324,26,'Marada','M.Vishwarupa Chary','Business','M.Vineetha','Business',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 07:38:38'),
(323,27,'Tadi','T.Bhaskara Chary','Business','T.Hymavathi','Business',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 07:38:21'),
(322,28,'Kota','K.Srinivas Chary','Retd. Bank Employee','K.Vijaya Lakshmi','Retd. Bank Employee',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 07:38:00'),
(321,29,'Diddi','D.Rajeshwar Rao','Business','D.Kavitha','Housemaker',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 07:37:42'),
(320,30,'Daggubati','D.Venkatesh','Business','D.Sujatha','Housemaker',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 07:37:09'),
(318,32,'Pothkunuri','P.Srihari','Business','P.Susheela','Business',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 07:36:31'),
(317,33,'Madabhushi','M.Raghava Chary','Business','M.Sri Lakshmi','Business',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 07:35:52'),
(92,34,'Kona','K.Venkat','Business','K.Srivalli','Business',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-13 12:28:58'),
(94,35,'Konidela','K.Seetha Ram','Business','K.Krishnaveni','Business',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-13 12:36:04'),
(316,36,'kona','K.Venkat','Business','K.Krishnaveni','Business',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 07:35:29'),
(314,38,'malineni','M.Someshwar','Business','M.Bhagya','Housemaker',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 07:34:34'),
(312,40,'Bandla','B.Manik Chary','Retd.Govt. Employee','B.Shakuntala','Retd. Bank Employee',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 07:33:52'),
(311,41,'Kondla','K.Hanumanth Rao','Business','K.Saroja','Housemaker',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 07:33:24'),
(310,42,'Valabhoju','V.Padma Rao','Business','V.Varalakshmi','Housemaker',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 07:33:08'),
(319,31,'Thota','T.Ranga Rao','Business','T.Suguna Kumari','Housemaker',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 07:36:51'),
(338,7,'Vedala','V.Chandrasekhar','Retd. Bank Employee','V.Geetha','Retd. Bank Employee',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 08:03:21'),
(345,1,'Lingam','Ramesh','Govt Job','Swaroopa','Home maker',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 08:25:01'),
(336,9,'Paidipalli','Veera Shankar','Business','Swarna','Housemaker',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 08:02:37'),
(309,43,'Aila','A.Somaraju','Business','A.Jyothi','Housemaker',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 07:32:39'),
(308,44,'Abker','A.Subodh','Architect','A.Ratna','Housemaker',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 07:31:43'),
(313,39,'Rekula','R.Ravi Shankar','Retd. Army General','R.Rajini','Housemaker',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 07:34:11'),
(275,47,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-21 11:31:47'),
(274,46,'Sambhoju','Srinivas','CA','Ratna Prabha','Housewife',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-21 11:28:30'),
(343,2,'Kavalakuntala','Satyam Rao','State Gov Job','veeramani','Teacher',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 08:11:50'),
(341,4,'Mittapalli','M.Raghava Rao','Police','M.Sujatha','Housemaker',0,0,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,0,NULL,NULL,NULL,'',0,0,0,0,0,0,'2020-10-25 08:04:42'),
(291,48,'sambhoju','Srinivas','CA','Ratna Prabha','Housemaker',1,1,0,'Nikhil','Married','Job',0,'','','',0,'','','',0,'','','',0,'','','',0,'Meghna','Unmarried','Business',0,'','','',0,'','','',0,'','','',0,'','','','',0,0,0,0,0,0,'2020-10-22 17:31:04');

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `ma_user_liked_profiles` */

insert  into `ma_user_liked_profiles`(`ulp_id`,`ulp_user_id_from`,`ulp_registered_from`,`ulp_display_name_from`,`ulp_user_id_to`,`ulp_registered_to`,`ulp_display_name_to`,`ulp_status`,`ulp_createdat`,`ulp_updatedat`) values 
(3,19,NULL,NULL,6,NULL,NULL,1,'2020-10-25 06:39:45','2020-10-25 06:39:45'),
(4,19,NULL,NULL,42,NULL,NULL,1,'2020-10-25 07:18:45','2020-10-25 07:18:45');

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
) ENGINE=MyISAM AUTO_INCREMENT=347 DEFAULT CHARSET=latin1;

/*Data for the table `ma_user_partner_prefered_details` */

insert  into `ma_user_partner_prefered_details`(`uppd_id`,`uppd_user_id`,`uppd_from_age`,`uppd_to_age`,`uppd_qualification`,`uppd_profession`,`uppd_professionname`,`uppd_eating_habits`,`uppd_stateid`,`uppd_area`,`uppd_other_requirement`,`uppd_from_height`,`uppd_to_height`,`uppd_updatedat`) values 
(341,4,18,25,'Graduation','PROFESSION2002','Business','Non Vegetarian','AREA2003','Rayalaseema','Good person',NULL,NULL,'2020-10-25 08:04:42'),
(339,6,25,30,'Graduation','PROFESSION2001','Job','Egg','AREA2002','Telangana','Good person\r\n',NULL,NULL,'2020-10-25 08:03:40'),
(337,8,18,27,'Graduation','PROFESSION2001','Job','Non Vegetarian','AREA2002','Telangana','Well Educated',NULL,NULL,'2020-10-25 08:03:02'),
(27,10,NULL,NULL,NULL,'0',NULL,NULL,'0',NULL,NULL,NULL,NULL,'2020-10-13 07:19:33'),
(247,12,23,31,'Graduation','PROFESSION2001','Job','Non Vegetarian','AREA2002','Telangana','Well Educated\r\n',NULL,NULL,'2020-10-17 08:48:20'),
(334,13,18,22,'Graduation','PROFESSION2001','Job','Non Vegetarian','AREA2002','Telangana','Well Educated',NULL,NULL,'2020-10-25 07:55:31'),
(332,18,18,24,'Graduation','PROFESSION2001','Job','Non Vegetarian','AREA2002','Telangana','Well Educated',NULL,NULL,'2020-10-25 07:54:58'),
(36,14,NULL,NULL,NULL,'0',NULL,NULL,'0',NULL,NULL,NULL,NULL,'2020-10-13 08:17:05'),
(41,15,NULL,NULL,NULL,'0',NULL,NULL,'0',NULL,NULL,NULL,NULL,'2020-10-13 08:57:51'),
(42,16,NULL,NULL,NULL,'0',NULL,NULL,'0',NULL,NULL,NULL,NULL,'2020-10-13 08:59:00'),
(331,19,23,28,'Graduation','PROFESSION2001','Job','Vegetarian','AREA2002','Telangana','Good person\r\n',NULL,NULL,'2020-10-25 07:54:38'),
(323,27,22,32,'Graduation','PROFESSION2001','Job','Non Vegetarian','AREA2003','Rayalaseema','Fair, Tall',NULL,NULL,'2020-10-25 07:38:21'),
(321,29,22,30,'Graduation','PROFESSION2001','Job','Non Vegetarian','AREA2002','Telangana','Tall, Fair',NULL,NULL,'2020-10-25 07:37:42'),
(92,34,28,35,'','0','Business','Non Vegetarian','AREA2002','Telangana','Good person',NULL,NULL,'2020-10-13 12:28:58'),
(94,35,24,30,'','0','Job','Non Vegetarian','AREA2002','Telangana','Fair, Tall',NULL,NULL,'2020-10-13 12:36:04'),
(329,21,18,27,'Graduation','PROFESSION2001','Job','Non Vegetarian','AREA2002','Telangana','Good person',NULL,NULL,'2020-10-25 07:53:21'),
(310,42,33,40,'Graduation','PROFESSION2001','Job','Non Vegetarian','AREA2002','Telangana','Fair, Tall, Understanding',NULL,NULL,'2020-10-25 07:33:08'),
(319,31,23,30,'Graduation','PROFESSION2001','Job','Non Vegetarian','AREA2001','Andhra','Fair, Short',NULL,NULL,'2020-10-25 07:36:51'),
(327,23,22,29,'Graduation','PROFESSION2001','Job','Non Vegetarian','AREA2001','Andhra','Tall, Fair, Good Person',NULL,NULL,'2020-10-25 07:46:53'),
(333,17,18,29,'','','','Non Vegetarian','AREA2002','Telangana','Good person',NULL,NULL,'2020-10-25 07:55:15'),
(343,2,19,24,'B.Tech','PROFESSION2001','Job','Non Vegetarian','AREA2001','Andhra','Good',NULL,NULL,'2020-10-25 08:11:50'),
(338,7,21,27,'Graduation','PROFESSION2001','Job','Non Vegetarian','AREA2002','Telangana','Well Educated',NULL,NULL,'2020-10-25 08:03:21'),
(345,1,23,28,'Graduation','PROFESSION2001','Job','Vegetarian','AREA2003','Rayalaseema','Fair',NULL,NULL,'2020-10-25 08:25:01'),
(336,9,19,29,'Graduation','PROFESSION2002','Business','Non Vegetarian','AREA2002','Telangana','Fair, Tall',NULL,NULL,'2020-10-25 08:02:37'),
(314,38,22,29,'graduate','PROFESSION2001','Job','Non Vegetarian','AREA2002','Telangana','Fair, Short',NULL,NULL,'2020-10-25 07:34:34'),
(309,43,20,25,'Ph.D','PROFESSION2001','Job','Non Vegetarian','AREA2002','Telangana','Fair, Well Educated',NULL,NULL,'2020-10-25 07:32:39'),
(318,32,22,28,'Graduation','PROFESSION2001','Job','Non Vegetarian','AREA2002','Telangana','Good person',NULL,NULL,'2020-10-25 07:36:31'),
(317,33,26,32,'Graduation','PROFESSION2001','Job','Non Vegetarian','AREA2001','Andhra','Good person',NULL,NULL,'2020-10-25 07:35:52'),
(308,44,18,28,'Graduation','PROFESSION2001','Job','Vegetarian','AREA2001','Andhra','Well Educated',NULL,NULL,'2020-10-25 07:31:43'),
(330,20,23,28,'Degree','PROFESSION2001','Job','Egg','AREA2003','Rayalaseema','Good person',NULL,NULL,'2020-10-25 07:53:38'),
(316,36,24,30,'Graduation','PROFESSION2001','Job','Non Vegetarian','AREA2002','Telangana','Fari, tall',NULL,NULL,'2020-10-25 07:35:29'),
(322,28,21,30,'Graduation','PROFESSION2001','Job','Egg','AREA2002','Telangana','Fair, Medium Height',NULL,NULL,'2020-10-25 07:38:00'),
(325,25,23,30,'Graduation','PROFESSION2001','Job','Non Vegetarian','AREA2003','Rayalaseema','Good Person',NULL,NULL,'2020-10-25 07:38:56'),
(324,26,22,28,'Graduation','PROFESSION2001','Job','Non Vegetarian','AREA2002','Telangana','Good person, Tall, Fair',NULL,NULL,'2020-10-25 07:38:38'),
(340,5,18,24,'Graduation','PROFESSION2001','Job','Non Vegetarian','AREA2002','Telangana','Fair, Tall, Lean',NULL,NULL,'2020-10-25 08:04:12'),
(335,11,18,23,'Degree','PROFESSION2001','Job','Non Vegetarian','AREA2002','Telangana','Good Man needed',NULL,NULL,'2020-10-25 08:01:21'),
(326,24,23,30,'Graduation','PROFESSION2001','Job','Non Vegetarian','AREA2002','Telangana','Fair, Good Person',NULL,NULL,'2020-10-25 07:46:32'),
(313,39,18,28,'Graduation','PROFESSION2001','Job','Non Vegetarian','AREA2002','Telangana','Well educated',NULL,NULL,'2020-10-25 07:34:11'),
(311,41,25,37,'Graduation','PROFESSION2001','Job','Non Vegetarian','AREA2002','Telangana','Tall, Understanding and Good person',NULL,NULL,'2020-10-25 07:33:24'),
(320,30,23,30,'Graduation','PROFESSION2001','Job','Vegetarian','AREA2002','Telangana','Good Person',NULL,NULL,'2020-10-25 07:37:09'),
(346,37,24,31,'Graduation','PROFESSION2001','Job','Egg','AREA2002','Telangana','tall, fair',NULL,NULL,'2020-12-15 09:43:08'),
(312,40,25,35,'Graduation','PROFESSION2001','Job','Non Vegetarian','AREA2003','Rayalaseema','Understanding person\r\n',NULL,NULL,'2020-10-25 07:33:52'),
(328,22,23,30,'Graduation','PROFESSION2001','Job','Vegetarian','AREA2002','Telangana','Tall, Good person',NULL,NULL,'2020-10-25 07:52:57'),
(342,3,21,26,'Graduation','PROFESSION2002','Business','Vegetarian','AREA2001','Andhra','Tall, Fair',NULL,NULL,'2020-10-25 08:05:10'),
(267,45,21,26,'Graduation','PROFESSION2001','Job','Non Vegetarian','AREA2001','Andhra','Well Educated',NULL,NULL,'2020-10-21 10:49:00'),
(274,46,21,27,'Graduation','PROFESSION2001','Job','Non Vegetarian','AREA2002','Telangana','Well educated',NULL,NULL,'2020-10-21 11:28:30'),
(275,47,NULL,NULL,NULL,'0',NULL,NULL,'0',NULL,NULL,NULL,NULL,'2020-10-21 11:31:47'),
(291,48,18,27,'Graduation','PROFESSION2001','Job','Non Vegetarian','AREA2002','Telangana','Well Educated',NULL,NULL,'2020-10-22 17:31:04');

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
) ENGINE=MyISAM AUTO_INCREMENT=347 DEFAULT CHARSET=latin1;

/*Data for the table `ma_user_personal_info` */

insert  into `ma_user_personal_info`(`upi_id`,`upi_user_id`,`upi_dateofbirth`,`upi_age`,`upi_birth_timings`,`upi_birthplace`,`upi_nri_living_country_name`,`upi_country`,`upi_countryname`,`upi_state`,`upi_statename`,`upi_district`,`upi_districtname`,`upi_gothram`,`upi_caste`,`upi_castename`,`upi_star`,`upi_starname`,`upi_rassi`,`upi_rassiname`,`upi_leg`,`upi_legname`,`upi_height`,`upi_complexion`,`upi_maritalstatus`,`upi_manglik_status`,`upi_physicaldisability`,`upi_will_to_marry_widow`,`upi_livingtogether`,`upi_have_childerns`,`upi_noofchilderns`,`upi_updateat`) values 
(342,3,'1994-06-10','26','14-52','Guntur','India','0',NULL,'0',NULL,'0',NULL,'Kondilya','SUBCASTE2002','Vadrangi','S18','Uttarabhadra','R03','Mithuna','L01','1','5ft 7in - 170cm','Fair','Unmarried','No','No','No','No','No',0,'2020-10-25 08:05:10'),
(36,14,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,'No','No','No','No',0,'2020-10-13 08:17:05'),
(341,4,'1995-02-08','25','14-25','Hyderabad','India','0',NULL,'0',NULL,'0',NULL,'Vishwagna Brahmarshi','SUBCASTE2002','Vadrangi','S20','Ardra','R09','Dhanus','L01','1','5ft 7in - 170cm','Fair','Unmarried','No','No','No','No','No',0,'2020-10-25 08:04:42'),
(340,5,'1996-01-26','24','9-40','Hyderabad','India','0',NULL,'0',NULL,'0',NULL,'Gardhamarushi','SUBCASTE2004','Kammari','S21','Ashlesha','R11','Kumbha','L02','2','5ft 5in - 165cm','Fair','Unmarried','No','No','No','No','No',0,'2020-10-25 08:04:12'),
(331,19,'1992-09-9','28','13-30','Hyderabad','India','0',NULL,'0',NULL,'0',NULL,'Kashyapa Brahmarshi','SUBCASTE2005','Kannchari','S17','Dhanishta','R03','Mithuna','L01','1','5ft 3in - 160cm','Fair','Unmarried','No','No','No','No','No',0,'2020-10-25 07:54:38'),
(337,8,'1993-06-19','27','13-30','Vizag','India','0',NULL,'0',NULL,'0',NULL,'Vishwagna Brahmarshi','SUBCASTE2005','Kannchari','S28','Pubba','R12','Meena','L01','1','6ft 1in - 185cm','Fair','Unmarried','No','No','No','No','No',0,'2020-10-25 08:03:02'),
(332,18,'1996-06-12','24','8-10','Warangal','India','0',NULL,'0',NULL,'0',NULL,'Supernasa Brahmrshi','SUBCASTE2005','Kannchari','S28','Pubba','R12','Meena','L01','1','5ft 3in - 160cm','Fair','Unmarried','No','No','No','No','No',0,'2020-10-25 07:54:58'),
(42,16,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,'No','No','No','No',0,'2020-10-13 08:59:00'),
(339,6,'1995-09-08','25','13-15','Warangal','India','0',NULL,'0',NULL,'0',NULL,'Vishwagna Brahmarshi','SUBCASTE2004','Kammari','S26','Shatbhisha','R10','Makara','L01','1','5ft 3in - 160cm','Fair','Unmarried','No','No','No','No','No',0,'2020-10-25 08:03:40'),
(27,10,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,'No','No','No','No',0,'2020-10-13 07:19:33'),
(247,12,'1997-07-10','23','15-15','Hyderabad','India','0',NULL,'0',NULL,'0',NULL,'Gardhamarushi','SUBCASTE2005','Kannchari','S28','Pubba','R12','Meena','L01','1','5ft 2in - 157cm','Fair','Unmarried','No','No','No','No','No',0,'2020-10-17 08:48:20'),
(41,15,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,'No','No','No','No',0,'2020-10-13 08:57:51'),
(345,1,'1991-12-11','28','5-6','Hyderabad','India','0',NULL,'0',NULL,'0',NULL,'sanathana','SUBCASTE2004','Kammari','S26','Shatbhisha','R10','Makara','L02','2','5ft 3in - 160cm','Fair','Unmarried','No','No','No','No','No',0,'2020-10-25 08:25:01'),
(334,13,'1997-12-10','22','11-0','Hyderabad','India','0',NULL,'0',NULL,'0',NULL,'Vishwagna Brahmarshi','SUBCASTE2004','Kammari','S28','Pubba','R12','Meena','L01','1','5ft 8in - 172cm','Fair','Unmarried','No','No','No','No','No',0,'2020-10-25 07:55:31'),
(326,24,'1994-05-30','26','15-50','Hyderabad','India','0',NULL,'0',NULL,'0',NULL,'Supernasa Brahmrshi','SUBCASTE2004','Kammari','S14','Chitra','R02','Vrishaba','L01','1','5ft 2in - 157cm','Fair','Unmarried','No','No','No','No','No',0,'2020-10-25 07:46:32'),
(321,29,'1993-08-31','','21-10','Hyderabad','India','0',NULL,'0',NULL,'0',NULL,'Vishwagna Brahmarshi','SUBCASTE2004','Kammari','S20','Ardra','R03','Mithuna','L02','2','5ft 4in - 162cm','Fair','Unmarried','No','No','No','No','No',0,'2020-10-25 07:37:42'),
(320,30,'1991-06-20','29','18-30','Hyderabad','Canada','0',NULL,'0',NULL,'0',NULL,'Vishwagna Brahmarshi','SUBCASTE2005','Kannchari','S27','Revathi','R01','Mesha','L01','1','5ft 4in - 162cm','Fair','Unmarried','No','No','No','No','No',0,'2020-10-25 07:37:09'),
(319,31,'1995-03-15','','11-20','Hyderabad','India','0',NULL,'0',NULL,'0',NULL,'Vishwagna Brahmarshi','SUBCASTE2004','Kammari','S13','Poorvaphalguni','R04','Karkata','L02','2','6ft 1in - 185cm','Fair','Unmarried','No','No','No','No','No',0,'2020-10-25 07:36:51'),
(318,32,'1992-03-05','28','14-10','Hyderabad','India','0',NULL,'0',NULL,'0',NULL,'Vishwagna Brahmarshi','SUBCASTE2004','Kammari','S24','Jyeshtha','R10','Makara','L01','1','5ft 2in - 157cm','Fair','Unmarried','No','No','No','No','No',0,'2020-10-25 07:36:31'),
(317,33,'1994-05-03','26','15-20','Hyderabad','India','0',NULL,'0',NULL,'0',NULL,'Vishwagna Brahmarshi','SUBCASTE2004','Kammari','S22','Uttaraphalguni','R08','Vrischika','L01','1','5ft 9in - 175cm','Fair','Divorced','No','No','No','No','No',0,'2020-10-25 07:35:52'),
(330,20,'1992-04-16','28','10-10','Hyderabad','India','0',NULL,'0',NULL,'0',NULL,'Kashyapa Brahmarshi','SUBCASTE2005','Kannchari','S28','Pubba','','','L01','1','5ft 4in - 162cm','Fair','Unmarried','No','No','No','No','No',0,'2020-10-25 07:53:38'),
(92,34,'1992-04-02','28','15-20','Toronto','Canada','0',NULL,'0',NULL,'0',NULL,'Vishwagna Brahmarshi','SUBCASTE2004','Kammari','S24','Jyeshtha','R10','Makara','L01','1','5ft 2in - 157cm','Medium','Unmarried','No','No','No','No','No',0,'2020-10-13 12:28:58'),
(94,35,'1996-04-12','24','18-40','Toronto','Canada','0',NULL,'0',NULL,'0',NULL,'Shruthi Vardhana','SUBCASTE2004','Kammari','S26','Shatbhisha','R10','Makara','L01','1','5ft 2in - 157cm','Fair','Unmarried','No','No','No','No','No',0,'2020-10-13 12:36:04'),
(316,36,'1996-06-07','24','19-15','Toronto','Canada','0',NULL,'0',NULL,'0',NULL,'Shruthi Vardhana','SUBCASTE2004','Kammari','S27','Revathi','R11','Kumbha','L01','1','5ft 3in - 160cm','Fair','Unmarried','No','No','No','No','No',0,'2020-10-25 07:35:29'),
(346,37,'1998-05-16','22','16-54','Toronto','Canada','0',NULL,'0',NULL,'0',NULL,'Shruthi Vardhana','SUBCASTE2004','Kammari','S27','Revathi','R09','Dhanus','L01','1','5ft 2in - 157cm','Fair','Unmarried','No','No','No','No','No',0,'2020-12-15 09:43:08'),
(314,38,'1993-02-02','27','7-10','Paris','France','0',NULL,'0',NULL,'0',NULL,'Shruthi Vardhana','SUBCASTE2004','Kammari','S28','Pubba','R11','Kumbha','L01','1','6ft 1in - 185cm','Fair','Unmarried','No','No','No','No','No',0,'2020-10-25 07:34:34'),
(312,40,'1985-08-15','35','18-15','Hyderabad','India','0',NULL,'0',NULL,'0',NULL,'Vishwagna Brahmarshi','SUBCASTE2004','Kammari','S02','Rohini','R07','Tula','L01','1','6ft 2in - 187cm','Fair','Divorced','No','No','No','No','No',0,'2020-10-25 07:33:52'),
(311,41,'1983-03-15','37','12-30','Hyderabad','India','0',NULL,'0',NULL,'0',NULL,'Sanathana Brahmarshi','SUBCASTE2002','Vadrangi','S08','Sravana','R06','Kanya','L02','2','6ft 0in - 182cm','Fair','Divorced','No','No','No','No','No',0,'2020-10-25 07:33:24'),
(329,21,'1990-10-23','','17-16','Hyderabad','India','0',NULL,'0',NULL,'0',NULL,'Vishwagna Brahmarshi','SUBCASTE2005','Kannchari','S26','Shatbhisha','R09','Dhanus','L03','3','5ft 4in - 162cm','Fair','Unmarried','No','No','No','No','No',0,'2020-10-25 07:53:21'),
(310,42,'1987-07-21','33','10-15','Hyderabad','India','0',NULL,'0',NULL,'0',NULL,'Shruthi Vardhana','SUBCASTE2004','Kammari','S22','Uttaraphalguni','R08','Vrischika','L02','2','5ft 3in - 160cm','Whitish','Divorced','No','No','No','No','No',0,'2020-10-25 07:33:08'),
(327,23,'1992-01-14','','7-10','Hyderabad','India','0',NULL,'0',NULL,'0',NULL,'Sanathana Brahmarshi','SUBCASTE2005','Kannchari','S11','Mrigasira','R03','Mithuna','L02','2','5ft 1in - 154cm','Fair','Unmarried','No','No','No','No','No',0,'2020-10-25 07:46:53'),
(328,22,'1993-11-26','26','11-40','Hyderabad','India','0',NULL,'0',NULL,'0',NULL,'Shruthi Vardhana','SUBCASTE2005','Kannchari','S25','Uttarashada','R09','Dhanus','L02','2','5ft 3in - 160cm','Fair','Unmarried','No','No','No','No','No',0,'2020-10-25 07:52:57'),
(333,17,'1991-06-12','','9-15','Hyderabad','India','0',NULL,'0',NULL,'0',NULL,'Kashyapa Brahmarshi','SUBCASTE2005','Kannchari','S25','Uttarashada','R09','Dhanus','L02','2','5ft 5in - 165cm','Fair','Unmarried','No','No','No','No','No',0,'2020-10-25 07:55:15'),
(343,2,'1996-07-11','','16-19','Kammam','India','0',NULL,'0',NULL,'0',NULL,'Suparnasa','SUBCASTE2004','Kammari','S25','Uttarashada','R08','Vrischika','L02','2','5ft 5in - 165cm','Fair','Unmarried','No','No','No','No','No',0,'2020-10-25 08:11:50'),
(338,7,'1993-09-28','27','16-15','Warangal','India','0',NULL,'0',NULL,'0',NULL,'Sanathana Brahmarshi','SUBCASTE2004','Kammari','S28','Pubba','R11','Kumbha','L01','1','5ft 1in - 154cm','Fair','Unmarried','No','No','No','No','No',0,'2020-10-25 08:03:21'),
(335,11,'1996-12-12','23','7-11','Hyderabad','India','0',NULL,'0',NULL,'0',NULL,'sanathana','SUBCASTE2005','Kannchari','S15','Anuradha','R03','Mithuna','L01','1','5ft 6in - 167cm','Fair','Unmarried','No','No','No','No','No',0,'2020-10-25 08:01:21'),
(323,27,'1992-02-14','','16-15','Hyderabad','India','0',NULL,'0',NULL,'0',NULL,'Shruthi Vardhana','SUBCASTE2005','Kannchari','S26','Shatbhisha','R10','Makara','L04','4','5ft 6in - 167cm','Fair','Unmarried','No','No','No','No','No',0,'2020-10-25 07:38:21'),
(336,9,'1991-03-13','29','15-5','Hyderabad','India','0',NULL,'0',NULL,'0',NULL,'Vishwagna Brahmarshi','SUBCASTE2005','Kannchari','S28','Pubba','R10','Makara','L01','1','6ft 3in - 190cm','Fair','Unmarried','No','No','No','No','No',0,'2020-10-25 08:02:37'),
(309,43,'1995-09-24','25','12-0','Hyderabad','India','0',NULL,'0',NULL,'0',NULL,'Shruthi Vardhana','SUBCASTE2001','Kamsali','S27','Revathi','R11','Kumbha','L02','2','5ft 10in - 177cm','Whitish','Unmarried','No','No','No','No','No',0,'2020-10-25 07:32:39'),
(322,28,'1993-07-08','','18-15','Hyderabad','India','0',NULL,'0',NULL,'0',NULL,'Vishwagna Brahmarshi','SUBCASTE2005','Kannchari','S12','Pushya','R02','Vrishaba','L02','2','5ft 3in - 160cm','Fair','Unmarried','No','No','No','No','No',0,'2020-10-25 07:38:00'),
(325,25,'1992-05-26','','14-15','Hyderabad','India','0',NULL,'0',NULL,'0',NULL,'Supernasa Brahmrshi','SUBCASTE2005','Kannchari','S16','Poorvashada','R03','Mithuna','L03','3','5ft 2in - 157cm','Fair','Unmarried','No','No','No','No','No',0,'2020-10-25 07:38:56'),
(324,26,'1993-10-23','','18-10','Hyderabad','India','0',NULL,'0',NULL,'0',NULL,'Supernasa Brahmrshi','SUBCASTE2001','Kamsali','S15','Anuradha','R02','Vrishaba','L02','2','5ft 3in - 160cm','Fair','Unmarried','No','No','No','No','No',0,'2020-10-25 07:38:38'),
(313,39,'1992-08-14','28','14-15','Hyderabad','India','0',NULL,'0',NULL,'0',NULL,'Vishwagna Brahmarshi','SUBCASTE2005','Kannchari','S27','Revathi','R11','Kumbha','L01','1','5ft 8in - 172cm','Fair','Unmarried','No','No','No','No','No',0,'2020-10-25 07:34:11'),
(308,44,'1992-12-31','27','10-10','Hyderabad','India','0',NULL,'0',NULL,'0',NULL,'Abhonasa','SUBCASTE2001','Kamsali','S28','Pubba','R12','Meena','L01','1','5ft 9in - 175cm','Whitish','Unmarried','No','No','No','No','No',0,'2020-10-25 07:31:43'),
(267,45,'1994-07-08','26','12-15','Hyderabad','India','0',NULL,'0',NULL,'0',NULL,'Kashyapa','SUBCASTE2001','Kamsali','S24','Jyeshtha','R05','Simha','L02','2','5ft 7in - 170cm','Medium','Unmarried','No','No','No','No','No',0,'2020-10-21 10:49:00'),
(274,46,'1993-07-08','27','15-15','Hyderabad','India','0',NULL,'0',NULL,'0',NULL,'Kashyapa','SUBCASTE2001','Kamsali','S18','Uttarabhadra','R06','Kanya','L02','2','5ft 11in - 180cm','Medium','Unmarried','No','No','No','No','No',0,'2020-10-21 11:28:30'),
(275,47,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'0',NULL,NULL,NULL,NULL,NULL,'No','No','No','No',0,'2020-10-21 11:31:47'),
(291,48,'1993-07-08','27','15-15','Hyderabad','India','0',NULL,'0',NULL,'0',NULL,'Kashyapa Brahmarshi','SUBCASTE2001','Kamsali','S27','Revathi','R09','Dhanus','L01','1','5ft 6in - 167cm','Medium','Unmarried','No','No','No','No','No',0,'2020-10-22 17:31:04');

/*Table structure for table `ma_user_restricted_details` */

DROP TABLE IF EXISTS `ma_user_restricted_details`;

CREATE TABLE `ma_user_restricted_details` (
  `urd_id` int(11) NOT NULL AUTO_INCREMENT,
  `urd_user_id` int(11) DEFAULT NULL,
  `urd_email` varchar(120) DEFAULT NULL,
  `urd_email_is_published` smallint(2) DEFAULT 0,
  `urd_profile_pic` varchar(120) DEFAULT NULL,
  `urd_profilepic_is_published` smallint(2) DEFAULT 0,
  `urd_primaryconactnumber` varchar(120) DEFAULT NULL,
  `urd_primarycontactnumber_is_published` smallint(2) DEFAULT 0,
  `urd_contactnumber` varchar(100) DEFAULT NULL,
  `urd_contactnumber_is_published` smallint(2) DEFAULT 0,
  `urd_landlinenumber` varchar(100) DEFAULT NULL,
  `urd_landinenumber_is_published` smallint(2) DEFAULT 0,
  `urd_native_district` varchar(200) DEFAULT NULL,
  `urd_communication_resident_type` varchar(200) DEFAULT NULL,
  `urd_communication_address` text DEFAULT NULL,
  `urd_communication_address_is_published` smallint(2) DEFAULT 0,
  `urd_present_address_resident_type` varchar(200) DEFAULT NULL,
  `urd_present_address` text DEFAULT NULL,
  `urd_present_address_is_published` smallint(2) DEFAULT 0,
  `urd_updatedat` datetime DEFAULT NULL,
  PRIMARY KEY (`urd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=347 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ma_user_restricted_details` */

insert  into `ma_user_restricted_details`(`urd_id`,`urd_user_id`,`urd_email`,`urd_email_is_published`,`urd_profile_pic`,`urd_profilepic_is_published`,`urd_primaryconactnumber`,`urd_primarycontactnumber_is_published`,`urd_contactnumber`,`urd_contactnumber_is_published`,`urd_landlinenumber`,`urd_landinenumber_is_published`,`urd_native_district`,`urd_communication_resident_type`,`urd_communication_address`,`urd_communication_address_is_published`,`urd_present_address_resident_type`,`urd_present_address`,`urd_present_address_is_published`,`urd_updatedat`) values 
(27,10,'test10@matrimonyapp.in.',0,NULL,0,'9849984920',0,NULL,0,NULL,0,NULL,NULL,NULL,0,NULL,NULL,0,'2020-10-13 07:19:33'),
(36,14,'test14@matrimonyapp.in.',0,NULL,0,'9849984924',0,NULL,0,NULL,0,NULL,NULL,NULL,0,NULL,NULL,0,'2020-10-13 08:17:05'),
(41,15,'test15@matrimonyapp.in.',0,NULL,0,'9849984925',0,NULL,0,NULL,0,NULL,NULL,NULL,0,NULL,NULL,0,'2020-10-13 08:57:51'),
(42,16,'test14@matrimonyapp.in',0,NULL,0,'9849984924',0,NULL,0,NULL,0,NULL,NULL,NULL,0,NULL,NULL,0,'2020-10-13 08:59:00'),
(92,34,'test31@matrimonyapp.in',0,'13102020122858b2.jpg',0,'9849984941',0,'9865986532',0,'040-32542198',0,'Guntur','Own House','No 54, ECIL, Hyderabad - 500062, Thyagaraya Nagar, A S Rao Nagar',0,NULL,NULL,0,'2020-10-13 12:28:58'),
(94,35,'test32@matrimonyapp.in',0,'13102020123604b6.jpg',1,'9849984942',0,'8754213265',0,'040-21548765',0,'Nalgonda','Own House','Plot No 8/9-G, Vijaya Towers, A S Rao Nagar Main Road, AS Rao Nagar, Hyderabad - 500062, Opposite Poulomi Hospitals',0,NULL,NULL,0,'2020-10-13 12:36:04'),
(247,12,'test12@matrimonyapp.in',0,'14102020113351b2.jpg',1,'9849984922',0,'9821746352',0,'040-27120205',0,'Warangal','Own House','Door No 1-10-28, Plot No 4 & 5, Kushaiguda, Hyderabad - 500062, Near Nagarjuna Nagar Colony Bus Stop\r\n',0,NULL,NULL,0,'2020-10-17 08:48:20'),
(267,45,'ailavineeth@gmail.com',0,'21102020104900g2.jpg',1,'7901006651',0,'9573942926',0,'040-27126431',0,'E.Godavari','Rent House','Old Safilguda',0,NULL,NULL,0,'2020-10-21 10:49:00'),
(274,46,'ailavineeth@gmail.com',0,'21102020112649g3.jpg',1,'7901006651',0,'8121612660',0,'040-27124631',0,'E.Godavari','Own House','Old Safilguda',0,NULL,NULL,0,'2020-10-21 11:28:30'),
(275,47,'shushank.skrillex@gmail.com',0,NULL,0,'9177867587',0,NULL,0,NULL,0,NULL,NULL,NULL,0,NULL,NULL,0,'2020-10-21 11:31:47'),
(291,48,'ailavineeth@gmail.com',0,'22102020173104g12.jpg',1,'7901006651',0,'9676942926',0,'040-27121121',0,'E.Godavari','Own House','Old Safilguda',0,NULL,NULL,0,'2020-10-22 17:31:04'),
(308,44,'rohithakber@gmail.com',1,'14102020155635g13.jpg',0,'9573942926',1,'9177867587',1,'040-27124636',1,'Medchal','Own House','Flat no.101 ,Sai Krupa Apartments, Plot no 307, Dr AS Rao Nagar, Hyderabad ',1,NULL,NULL,0,'2020-10-25 07:31:43'),
(309,43,'sainath.chillapuram@gmail.com',1,'14102020153036g2.jpg',0,'8121612660',1,'9291370811',1,'040-27120000',1,'Medchal','Own House','LIG-A-10, Dr AS Rao Nagar, ECIL-Post, Hyderabad, 500062',1,NULL,NULL,0,'2020-10-25 07:32:39'),
(310,42,'test37@matrimonyapp.in',1,'14102020092945b4.jpg',0,'9849984947',1,'9887325421',1,'040-28745698',1,'Karimnagar','Own House','Door No 1-10-28, Plot No 4 & 5, Kushaiguda, Hyderabad - 500062, Near Nagarjuna Nagar Colony Bus Stop',1,NULL,NULL,0,'2020-10-25 07:33:08'),
(311,41,'test36@matrimonyapp.in',1,'14102020091712g4.jpg',0,'9849984946',1,'9887322165',1,'040-27139876',1,'Nalgonda','Own House','Plot no 81, Phase 1, Saket, Hyderabad - 500062',1,NULL,NULL,0,'2020-10-25 07:33:24'),
(312,40,'test35@matrimonyapp.in',1,'14102020102336g8.jpg',0,'9849984945',1,'87574213265',1,'040-21548754',1,'Khammam','Own House','Plot No 42-22-6, Plot No 4, Laxmi Arcade, Gayathri Nagar, Ecil, Hyderabad - 500062, Radhika Theatre Lane ',1,NULL,NULL,0,'2020-10-25 07:33:52'),
(313,39,'test34@matrimonyapp.in',1,'14102020163121g2.jpg',0,'9849984944',1,'8754219636',1,'040-27125319',1,'Nalgonda','Own House','Plot no 4/A, Padmarao nagar colony, Yellareddyguda, Kapra, Hyderabad - 500062, Opp Mallareddy Gardens',1,NULL,NULL,0,'2020-10-25 07:34:11'),
(314,38,'test33@matrimonyapp.in',1,'14102020145302g1.jpg',0,'9849984943',1,'2154873265',1,'040-21548754',1,'Yalamanchili','Own House','Door No G 11 & 12, Vertex Pearl, Srinivasa Nagar Colony, As Rao Nagar, Hyderabad - 500062, Near Radhika Theatre\r\n',1,NULL,NULL,0,'2020-10-25 07:34:34'),
(316,36,'test31@matrimonyapp.in',1,'14102020160402b6.jpg',0,'9849984941',1,'3221546598',1,'040-32215465',1,'Guntur','Own House','Plot No 8/9-G, Vijaya Towers, A S Rao Nagar Main Road, AS Rao Nagar, Hyderabad - 500062, Opposite Poulomi Hospitals',1,NULL,NULL,0,'2020-10-25 07:35:29'),
(317,33,'test30@matrimonyapp.in',1,'14102020152656b4.jpg',0,'9849984940',1,'9887546532',1,'040-27125893',1,'Nalgonda','Own House','No 54, ECIL, Hyderabad - 500062, Thyagaraya Nagar, A S Rao Nagar',1,NULL,NULL,0,'2020-10-25 07:35:52'),
(318,32,'test29@matrimonyapp.in',1,'14102020152446g12.jpg',0,'9849984939',1,'9887546532',1,'040-27875698',1,'Nalgonda','Own House','Plot No 8/9-G, Vijaya Towers, A S Rao Nagar Main Road, AS Rao Nagar, Hyderabad - 500062, Opposite Poulomi Hospitals',1,NULL,NULL,0,'2020-10-25 07:36:31'),
(319,31,'test28@matrimonyapp.in',1,'14102020093353g9.jpg',0,'9849984938',1,'9848326512',1,'040-65986598',1,'Warangal','Own House','Door No 1-256/91, Plot No 290, As Rao Nagar, Hyderabad - 500062, Near Radhika Multiplex',1,NULL,NULL,0,'2020-10-25 07:36:51'),
(320,30,'test27@matrimonyapp.in',1,'14102020133123b10.jpg',0,'9849984937',1,'6325541289',1,'040-65986598',1,'Warangal','Rent House','No 54, ECIL, Hyderabad - 500062, Thyagaraya Nagar, A S Rao Nagar',1,NULL,NULL,0,'2020-10-25 07:37:09'),
(321,29,'test25@matrimonyapp.in',1,'14102020093935b10.jpg',0,'9849984935',1,'9878654532',1,'040-98786545',1,'Warangal','Own House','Plot No 1, Sri Chakripuram X Road, Chakripuram-Kushaiguda, Hyderabad - 500062, Beside Chakri High School ',1,NULL,NULL,0,'2020-10-25 07:37:42'),
(322,28,'test26@matrimonyapp.in',1,'14102020160523b13.jpg',0,'9849984936',1,'8978456598',1,'040-23124565',1,'Karimnagar','Own House','Door No G 11 & 12, Vertex Pearl, Srinivasa Nagar Colony, As Rao Nagar, Hyderabad - 500062, Near Radhika Theatre\r\n',1,NULL,NULL,0,'2020-10-25 07:38:00'),
(323,27,'test24@matrimonyapp.in',1,'14102020131726b8.jpg',0,'9849984934',1,'8798654532',1,'040-21548798',1,'Karimnagar','Own House','Plot No 1, Sri Chakripuram X Road, Chakripuram-Kushaiguda, Hyderabad - 500062, Beside Chakri High School ',1,NULL,NULL,0,'2020-10-25 07:38:21'),
(324,26,'test23@matrimonyapp.in',1,'14102020160802b5.jpg',0,'9849984933',1,'9849756523',1,'040-27128659',1,'Karimnagar','Own House','Plot No 8/9-G, Vijaya Towers, A S Rao Nagar Main Road, AS Rao Nagar, Hyderabad - 500062, Opposite Poulomi Hospitals ',1,NULL,NULL,0,'2020-10-25 07:38:38'),
(325,25,'test22@matrimonyapp.in',1,'14102020160640b2.jpg',0,'9849984932',1,'8978242526',1,'040-27129966',1,'Karimnagar','Own House','Door No 1-256/91, Plot No 290, As Rao Nagar, Hyderabad - 500062, Near Radhika Multiplex',1,NULL,NULL,0,'2020-10-25 07:38:56'),
(326,24,'test21@matrimonyapp.in',1,'13102020100040b8.jpg',0,'9849984931',1,'9878654533',1,'040-27124532',1,'Medhak','Own House','No 54, ECIL, Hyderabad - 500062, Thyagaraya Nagar, A S Rao Nagar',1,NULL,NULL,0,'2020-10-25 07:46:32'),
(327,23,'test20@matrimonyapp.in',1,'14102020102817b6.jpg',0,'9849984930',1,'9849956212',1,'040-27124231',1,'Khammam','Rent House','Door No G 11 & 12, Vertex Pearl, Srinivasa Nagar Colony, As Rao Nagar, Hyderabad - 500062, Near Radhika Theatre\r\n',1,NULL,NULL,0,'2020-10-25 07:46:53'),
(328,22,'test19@matrimonyapp.in',1,'14102020110452b7.jpg',0,'9849984929',1,'7845123692',1,'',1,'Nalgonda','Own House','Plot No 1, Sri Chakripuram X Road, Chakripuram-Kushaiguda, Hyderabad - 500062, Beside Chakri High School ',1,NULL,NULL,0,'2020-10-25 07:52:57'),
(329,21,'test18@matrimonyapp.in',1,'14102020091651b13.jpg',0,'9849984928',1,'9887655432',1,'040-21658732',1,'Nalgonda','Rent House','Plot No 8/9-G, Vijaya Towers, A S Rao Nagar Main Road, AS Rao Nagar, Hyderabad - 500062, Opposite Poulomi Hospitals ',1,NULL,NULL,0,'2020-10-25 07:53:21'),
(330,20,'test17@matrimonyapp.in',1,'14102020160147g7.jpg',0,'9849984927',1,'9865329865',1,'040-21326545',1,'Nalgonda','Own House','Door No 1-256/91, Plot No 290, As Rao Nagar, Hyderabad - 500062, Near Radhika Multiplex\r\n',1,NULL,NULL,0,'2020-10-25 07:53:38'),
(331,19,'test16@matrimonyapp.in',1,'23102020182247g10.jpg',0,'9849984926',1,'9676942926',1,'',1,'Khammam','Own House','No 54, ECIL, Hyderabad - 500062, Thyagaraya Nagar, A S Rao Nagar',1,NULL,NULL,0,'2020-10-25 07:54:38'),
(332,18,'test15@matrimonyapp.in',1,'14102020162523b9.jpg',0,'9849984925',1,'8754693214',1,'040-87542132',1,'Warangal','Own House','Plot no 4/A, Padmarao nagar colony, Yellareddyguda, Kapra, Hyderabad - 500062, Opp Mallareddy Gardens',1,NULL,NULL,0,'2020-10-25 07:54:58'),
(333,17,'test14@matrimonyapp.in',1,'14102020094916b3.jpg',0,'9849984924',1,'6545879836',1,'040-23262524',1,'Nalgonda','Rent House','Old city\r\n',1,NULL,NULL,0,'2020-10-25 07:55:14'),
(334,13,'test13@matrimonyapp.in',1,'14102020112635g10.jpg',0,'9849984923',1,'8765213496',1,'040-27120206',1,'Medhak','Rent House','Plot no 81, Phase 1, Saket, Hyderabad - 500062',1,NULL,NULL,0,'2020-10-25 07:55:31'),
(335,11,'test11@matrimonyapp.in',1,'14102020162212g7.jpg',0,'9849984921',1,'8877445566',1,'040-88774455',1,'Nalgonda','Own House','No 3 Kiriti Complex, Father Balaiah Nagar, Old Alwal-Alwal, Hyderabad - 500010, Besides Narayana Management ',1,NULL,NULL,0,'2020-10-25 08:01:21'),
(336,9,'test9@matrimonyapp.in',1,'14102020144659g1.jpg',0,'9849984919',1,'9849948991',1,'040-27120201',1,'Warangal','Own House','Plot no 4/A, Padmarao nagar colony, Yellareddyguda, Kapra, Hyderabad - 500062, Opp Mallareddy Gardens',1,NULL,NULL,0,'2020-10-25 08:02:37'),
(337,8,'test8@matrimonyapp.in',1,'14102020120352g8.jpg',0,'9849984918',1,'8721546936',1,'040-21720204',1,'Nalgonda','Own House','Door No 1-10-28, Plot No 4 & 5, Kushaiguda, Hyderabad - 500062, Near Nagarjuna Nagar Colony Bus Stop',1,NULL,NULL,0,'2020-10-25 08:03:02'),
(338,7,'test7@matrimonyapp.in',1,'14102020161130g6.jpg',0,'9849984917',1,'9814253678',1,'040-27120204',1,'Warangal','Own House','Door No 1-10-28, Plot No 4 & 5, Kushaiguda, Hyderabad - 500062, Near Nagarjuna Nagar Colony Bus Stop',1,NULL,NULL,0,'2020-10-25 08:03:21'),
(339,6,'test6@matrimonyapp.in',1,'14102020110359b12.jpg',0,'9849984916',1,'9887164525',1,'040-27163492',1,'Warangal','Own House','Plot no 81, Phase 1, Saket, Warangal - 506001',1,NULL,NULL,0,'2020-10-25 08:03:40'),
(340,5,'test5@matrimonyapp.in',1,'14102020160950g12.jpg',0,'9849984915',1,'9854328712',1,'040-27154937',1,'Warangal','Own House','Shop No 42-22-6, Plot No 4, Laxmi Arcade, Gayathri Nagar, Ecil, Hyderabad - 500062, Radhika Theatre Lane \r\n',1,NULL,NULL,0,'2020-10-25 08:04:12'),
(341,4,'test4@matrimonyapp.in',1,'14102020115747g2.jpg',0,'9849984914',1,'8732542198',1,'040-27185436',1,'Karimnagar','Own House','Plot no 4/A, Padmarao nagar colony, Yellareddyguda, Kapra, Hyderabad - 500062, Opp Mallareddy Gardens\r\n',1,NULL,NULL,0,'2020-10-25 08:04:42'),
(342,3,'test3@matrimonyapp.in',1,'14102020115648g10.jpg',0,'9849984913',1,'5487215465',1,'040-27121593',1,'Ramagundam','Own House','Tricon Heights Appartment, Puppalaguda, Manikonda, Hyderabad - 500089, Near Kid Zee School',1,NULL,NULL,0,'2020-10-25 08:05:10'),
(343,2,'test2@matrimonyapp.in',1,'14102020104553g6.jpg',0,'9849984912',1,'9865147235',1,'040-27126439',1,'Kamamm','Own House','Plot No 60, Tanasha Nagar, Manikonda, Hyderabad - 500089, Near Circle',1,NULL,NULL,0,'2020-10-25 08:11:50'),
(345,1,'test1@matrimonyapp.in',1,'14102020145058g3.jpg',0,'9849984910',1,'8745123664',1,'040-40140140',1,'Hyderabad','Own House','No 30-265/18B/3, Sainathapuram Main Road, Sainathapuram-As Rao Nagar, Hyderabad - 500062',1,NULL,NULL,0,'2020-10-25 08:25:01'),
(346,37,'test32@matrimonyapp.in',0,'14102020103557b5.jpg',0,'9849984942',0,'3265542132',1,'040-21548765',1,'Nalgonda','Own House','Plot No 1, Sri Chakripuram X Road, Chakripuram-Kushaiguda, Hyderabad - 500062, Beside Chakri High School',1,NULL,NULL,0,'2020-12-15 09:43:08');

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
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ma_users` */

insert  into `ma_users`(`user_id`,`user_registeredid`,`user_display_name`,`user_email`,`user_mobile`,`user_gender`,`user_encrpted_password`,`user_encodeed_password`,`user_registered_thru`,`user_provider`,`user_gmail_provider_id`,`user_facebook_provider_id`,`user_is_nri`,`user_is_secondmarriageprofile`,`user_is_featured`,`user_trailperiod_mode`,`user_trailperiod_fromdate`,`user_trailperiod_todate`,`user_tottrailperiod_days`,`user_profilepic`,`user_settleted_status`,`user_payment_status`,`user_payment_amount`,`user_create_profile_for`,`user_isagree`,`user_status`,`user_craetedat`,`user_updatedat`,`user_deletedat`) values 
(1,'G201001','L Rajashekar','test1@matrimonyapp.in','9849984910','male','','','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-13','2020-11-30',48,'14102020145058g3.jpg',0,1,100,'self',0,1,'2020-10-25 08:25:01','2020-10-25 08:25:01',NULL),
(2,'G201002','Deepesh Kumar','test2@matrimonyapp.in','9849984912','male','','','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-13','2020-11-30',48,'14102020104553g6.jpg',0,1,100,'self',0,1,'2020-10-25 08:11:50','2020-10-25 08:11:50',NULL),
(3,'G201003','R.Ganga Ram','test3@matrimonyapp.in','9849984913','male','','','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-13','2020-11-30',48,'14102020115648g10.jpg',0,1,100,'self',0,1,'2020-10-25 08:05:10','2020-10-25 08:05:10',NULL),
(4,'G201004','M.Anurag','test4@matrimonyapp.in','9849984914','male','','','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-14','2020-11-28',45,'14102020115747g2.jpg',0,1,100,'self',0,1,'2020-10-25 08:04:42','2020-10-25 08:04:42',NULL),
(5,'G201005','D.Lakshman','test5@matrimonyapp.in','9849984915','male','','','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-13','2020-11-18',36,'14102020160950g12.jpg',0,1,100,'self',0,1,'2020-10-25 08:04:12','2020-10-25 08:04:12',NULL),
(6,'B201006','K.Sravani','test6@matrimonyapp.in','9849984916','female','','','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-13','2020-11-13',31,'14102020110359b12.jpg',0,1,100,'self',0,1,'2020-10-25 08:03:40','2020-10-25 08:03:40',NULL),
(7,'G201007','V.Kiran','test7@matrimonyapp.in','9849984917','male','','','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-13','2020-11-25',43,'14102020161130g6.jpg',0,1,500,'self',0,1,'2020-10-25 08:03:21','2020-10-25 08:03:21',NULL),
(8,'G201008','Gopichand','test8@matrimonyapp.in','9849984918','male','','','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-13','2020-11-19',37,'14102020120352g8.jpg',0,1,1000,'self',0,1,'2020-10-25 08:03:02','2020-10-25 08:03:02',NULL),
(9,'G201009','Vamshi','test9@matrimonyapp.in','9849984919','male','','','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-13','2020-11-26',44,'14102020144659g1.jpg',0,1,500,'self',0,1,'2020-10-25 08:02:37','2020-10-25 08:02:37',NULL),
(10,'G201010','Test10','test10@matrimonyapp.in.','9849984920','male','','','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-13','2020-11-03',21,NULL,0,1,500,'self',0,2,'2020-10-12 20:41:53','2020-10-13 07:19:33','2020-10-25 08:01:51'),
(11,'G201011','N.Darshan','test11@matrimonyapp.in','9849984921','male','','','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-13','2020-11-27',45,'14102020162212g7.jpg',0,1,1000,'self',0,1,'2020-10-25 08:01:21','2020-10-25 08:01:21',NULL),
(12,'B201012','V.Varshini','test12@matrimonyapp.in','9849984922','female','','','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-13','2020-11-18',36,'14102020113351b2.jpg',0,1,1000,'self',0,1,'2020-10-17 08:48:20','2020-10-17 08:48:20',NULL),
(13,'G201013','Kalyan','test13@matrimonyapp.in','9849984923','male','','','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-14','2020-11-26',43,'14102020112635g10.jpg',0,1,1000,'self',0,1,'2020-10-25 07:55:31','2020-10-25 07:55:31',NULL),
(14,'G201014','Test14','test14@matrimonyapp.in.','9849984924','male','','','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-13','2020-11-30',48,NULL,0,1,500,'self',0,2,'2020-10-13 08:15:08','2020-10-13 08:17:05','2020-10-13 08:47:57'),
(15,'B201015','Test15','test15@matrimonyapp.in.','9849984925','female','','','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-13','2020-11-13',31,NULL,0,1,500,'self',0,2,'2020-10-13 08:57:21','2020-10-13 08:57:51','2020-10-13 09:00:05'),
(16,'B201016','Test14','test14@matrimonyapp.in','9849984924','female','','','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-13','2020-11-13',31,NULL,0,1,500,'self',0,2,'2020-10-13 08:58:27','2020-10-13 08:59:00','2020-10-13 09:00:00'),
(17,'B201017','Keerthi Surya','test14@matrimonyapp.in','9849984924','female','','','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-13','2020-11-13',31,'14102020094916b3.jpg',0,1,100,'self',0,1,'2020-10-25 07:55:14','2020-10-25 07:55:14',NULL),
(18,'B201018','Deepthi','test15@matrimonyapp.in','9849984925','female','29a743ed48d6f6970231c4782eeab018','OTg0OTk4NDkyNA==','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-13','2020-12-15',63,'14102020162523b9.jpg',0,1,1000,'daughter',0,1,'2020-10-25 07:54:58','2020-10-25 07:54:58',NULL),
(19,'G201019','N.Brahma Kumar','test16@matrimonyapp.in','9849984926','male','1a65e4c363d84e53d507e78b152847a2','UmVzZXQwMDA=','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-13','2020-12-16',64,'23102020182247g10.jpg',0,1,1000,'self',1,1,'2020-10-25 07:54:38','2020-10-25 07:54:38',NULL),
(20,'G201020','Ramu','test17@matrimonyapp.in','9849984927','male','','','WebSite','WebSite',NULL,NULL,1,1,0,0,'2020-10-13','2020-11-13',31,'14102020160147g7.jpg',0,1,1000,'self',0,1,'2020-10-25 07:53:38','2020-10-25 07:53:38',NULL),
(21,'B201021','N.Anusha','test18@matrimonyapp.in','9849984928','female','','','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-13','2020-12-13',61,'14102020091651b13.jpg',0,1,1000,'self',0,1,'2020-10-25 07:53:21','2020-10-25 07:53:21',NULL),
(22,'B201022','A.Arpitha','test19@matrimonyapp.in','9849984929','female','e10adc3949ba59abbe56e057f20f883e','MTIzNDU2','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-13','2020-11-13',31,'14102020110452b7.jpg',0,1,500,'self',1,1,'2020-10-25 07:52:57','2020-10-25 07:52:57',NULL),
(23,'B201023','N.Anisha','test20@matrimonyapp.in','9849984930','female','','','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-13','2020-11-13',31,'14102020102817b6.jpg',0,1,100,'self',0,1,'2020-10-25 07:46:53','2020-10-25 07:46:53',NULL),
(24,'B201024','V.Nandini','test21@matrimonyapp.in','9849984931','female','','','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-13','2020-11-13',31,'13102020100040b8.jpg',0,1,500,'self',0,1,'2020-10-25 07:46:32','2020-10-25 07:46:32',NULL),
(25,'B201025','S.Bhavana','test22@matrimonyapp.in','9849984932','female','','','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-13','2020-12-13',61,'14102020160640b2.jpg',0,1,1000,'self',0,1,'2020-10-25 07:38:56','2020-10-25 07:38:56',NULL),
(26,'B201026','M.Priya','test23@matrimonyapp.in','9849984933','female','','','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-13','2020-12-13',61,'14102020160802b5.jpg',0,1,500,'self',0,1,'2020-10-25 07:38:38','2020-10-25 07:38:38',NULL),
(27,'B201027','T.Pallavi','test24@matrimonyapp.in','9849984934','female','','','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-13','2021-01-13',92,'14102020131726b8.jpg',0,1,1000,'self',0,1,'2020-10-25 07:38:21','2020-10-25 07:38:21',NULL),
(28,'B201028','K.Pooja','test26@matrimonyapp.in','9849984936','female','','','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-13','2020-11-13',31,'14102020160523b13.jpg',0,1,500,'self',0,1,'2020-10-25 07:38:00','2020-10-25 07:38:00',NULL),
(29,'B201029','D.Chanchala','test25@matrimonyapp.in','9849984935','female','','','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-13','2020-11-13',31,'14102020093935b10.jpg',0,1,1000,'self',0,1,'2020-10-25 07:37:42','2020-10-25 07:37:42',NULL),
(30,'B201030','D.Niharika','test27@matrimonyapp.in','9849984937','female','','','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-13','2021-01-12',91,'14102020133123b10.jpg',0,1,1000,'self',0,1,'2020-10-25 07:37:09','2020-10-25 07:37:09',NULL),
(31,'G201031','T.Rakesh','test28@matrimonyapp.in','9849984938','male','','','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-13','2021-01-11',90,'14102020093353g9.jpg',0,1,1000,'self',0,1,'2020-10-25 07:36:51','2020-10-25 07:36:51',NULL),
(32,'G201032','P.Suhas','test29@matrimonyapp.in','9849984939','male','','','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-13','2020-11-12',30,'14102020152446g12.jpg',0,1,500,'self',0,1,'2020-10-25 07:36:31','2020-10-25 07:36:31',NULL),
(33,'B201033','M.Sakshi','test30@matrimonyapp.in','9849984940','female','','','WebSite','WebSite',NULL,NULL,0,1,0,0,'2020-10-13','2020-11-12',30,'14102020152656b4.jpg',0,1,500,'self',0,1,'2020-10-25 07:35:52','2020-10-25 07:35:52',NULL),
(34,'B201034','K.neeraja','test31@matrimonyapp.in','9849984941','female','','','WebSite','WebSite',NULL,NULL,1,0,1,0,'2020-10-13','2021-01-11',90,'13102020122858b2.jpg',0,1,1000,'self',0,2,'2020-10-13 12:28:58','2020-10-13 12:28:58','2020-10-13 12:39:53'),
(35,'B201035','K.Swetha','test32@matrimonyapp.in','9849984942','female','','','WebSite','WebSite',NULL,NULL,1,0,0,0,'2020-10-13','2021-01-11',90,'13102020123604b6.jpg',0,1,1000,'self',0,2,'2020-10-13 12:36:04','2020-10-13 12:36:04','2020-10-13 12:39:42'),
(36,'B201036','K.neeraja','test31@matrimonyapp.in','9849984941','female','','','WebSite','WebSite',NULL,NULL,1,0,0,0,'2020-10-13','2020-11-12',30,'14102020160402b6.jpg',0,1,500,'self',0,1,'2020-10-25 07:35:29','2020-10-25 07:35:29',NULL),
(37,'B201037','K.Sravanthi','test32@matrimonyapp.in','9849984942','female','','','WebSite','WebSite',NULL,NULL,1,0,0,0,'2020-10-13','2020-12-12',60,'14102020103557b5.jpg',0,1,500,'self',0,1,'2020-10-25 07:34:54','2020-12-15 09:43:08',NULL),
(38,'G201038','M.Sekhar','test33@matrimonyapp.in','9849984943','male','','','WebSite','WebSite',NULL,NULL,1,0,0,0,'2020-10-13','2021-01-11',90,'14102020145302g1.jpg',0,1,1000,'self',0,1,'2020-10-25 07:34:34','2020-10-25 07:34:34',NULL),
(39,'G201039','R.Ajay','test34@matrimonyapp.in','9849984944','male','','','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-13','2020-12-12',60,'14102020163121g2.jpg',0,1,1000,'self',0,1,'2020-10-25 07:34:11','2020-10-25 07:34:11',NULL),
(40,'G201040','B.Srikanth','test35@matrimonyapp.in','9849984945','male','','','WebSite','WebSite',NULL,NULL,0,1,0,0,'2020-10-14','2020-12-13',60,'14102020102336g8.jpg',0,1,1000,'self',0,1,'2020-10-25 07:33:52','2020-10-25 07:33:52',NULL),
(41,'G201041','K.Prashanth','test36@matrimonyapp.in','9849984946','male','','','WebSite','WebSite',NULL,NULL,0,1,0,0,'2020-10-14','2020-12-12',59,'14102020091712g4.jpg',0,1,1000,'self',0,1,'2020-10-25 07:33:24','2020-10-25 07:33:24',NULL),
(42,'B201042','V.Tulasi','test37@matrimonyapp.in','9849984947','female','','','WebSite','WebSite',NULL,NULL,0,1,0,0,'2020-10-14','2020-12-13',60,'14102020092945b4.jpg',0,1,500,'self',0,1,'2020-10-25 07:33:08','2020-10-25 07:33:08',NULL),
(43,'B201043','A.Vineeth','sainath.chillapuram@gmail.com','8121612660','male','','','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-14','2020-11-13',30,'14102020153036g2.jpg',0,1,1000,'self',0,1,'2020-10-25 07:32:39','2020-10-25 07:32:39',NULL),
(44,'G201044','A.Rohit','rohithakber@gmail.com','9573942926','male','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,'14102020155635g13.jpg',0,0,0,NULL,0,1,'2020-10-25 07:31:43','2020-10-25 07:31:43',NULL),
(45,'B201045','Nikshith','ailavineeth@gmail.com','7901006651','male','','','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-21','2020-11-21',31,'21102020104900g2.jpg',0,1,500,'self',0,2,'2020-10-21 10:49:00','2020-10-21 10:49:00','2020-10-21 11:17:41'),
(46,'B201046','Nikshith','ailavineeth@gmail.com','7901006651','male','588c30699784990b0304c44384950cc7','UmVzZXQ5OTk=','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-21','2020-11-20',30,'21102020112649g3.jpg',0,1,500,'self',0,2,'2020-10-21 11:28:30','2020-10-21 11:28:30','2020-10-22 16:19:38'),
(47,'B201047','Manideep','shushank.skrillex@gmail.com','9177867587','male','','','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-21','2020-11-20',30,NULL,0,1,500,'self',0,2,'2020-10-21 11:31:10','2020-10-21 11:31:47','2020-10-21 11:32:02'),
(48,'B201048','Nikshith','ailavineeth@gmail.com','7901006651','male','','','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-10-22','2020-11-21',30,'22102020173104g12.jpg',0,1,1000,'self',0,2,'2020-10-22 17:31:04','2020-10-22 17:31:04','2020-10-22 17:50:16'),
(49,'G201049','Dileep Kumar','dileepkumarkonda1@gmail.com','85002227655','male','25d55ad283aa400af464c76d713c07ad','MTIzNDU2Nzg=','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'self',0,3,'2020-10-25 12:01:53','2020-10-25 12:01:53',NULL),
(50,'B201050','Berowest2018@gmail.com','berowest2018@gmail.com','5342800629','female','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'daughter',0,3,'2020-10-30 23:22:59','2020-10-30 23:22:59',NULL),
(51,'G201051','Raelynn harris','raelynnharris.sc.63697640@mojorage.life','raelynn harris','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-01 20:59:54','2020-11-01 20:59:54',NULL),
(52,'G201052','Riya key','perlajp89@gmail.com','riya key','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-02 03:54:59','2020-11-02 03:54:59',NULL),
(53,'G201053','Reagan flowers','lemichaels91@gmail.com','reagan flowers','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-02 05:11:38','2020-11-02 05:11:38',NULL),
(54,'G201054','Laurel cowan','atouchoflove190@yahoo.com','laurel cowan','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-02 15:22:11','2020-11-02 15:22:11',NULL),
(55,'G201055','Rylie snyder','geargializ.lizano@gmail.com','rylie snyder','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-03 00:57:25','2020-11-03 00:57:25',NULL),
(56,'G201056','Alena mcpherson','andrea.madigan@gmail.com','alena mcpherson','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-03 01:03:49','2020-11-03 01:03:49',NULL),
(57,'G201057','Cheyanne li','saraaiandrade@gmail.com','cheyanne li','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-03 02:42:30','2020-11-03 02:42:30',NULL),
(58,'G201058','Zackary villarreal','kcyoung13@yahoo.com','zackary villarreal','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-03 02:52:49','2020-11-03 02:52:49',NULL),
(59,'G201059','Reagan villarreal','haveritt661@gmail.com','reagan villarreal','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-03 03:40:19','2020-11-03 03:40:19',NULL),
(60,'G201060','Laurel wu','medabae01@gmail.com','laurel wu','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-03 04:13:22','2020-11-03 04:13:22',NULL),
(61,'G201061','Alena james','eudeze15@gmail.com','alena james','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-03 04:42:08','2020-11-03 04:42:08',NULL),
(62,'G201062','Reagan dixon','www.nataliamarquez5@gmail.com','reagan dixon','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-03 07:40:52','2020-11-03 07:40:52',NULL),
(63,'G201063','Deangelo dixon','mominmustak@sbcglobal.net','deangelo dixon','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-03 12:17:56','2020-11-03 12:17:56',NULL),
(64,'G201064','Reuben savage','jnajjar@joyofgarlic.com','reuben savage','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-03 14:40:04','2020-11-03 14:40:04',NULL),
(65,'G201065','Hudson orr','matt_hunter_2000@yahoo.com','hudson orr','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-03 14:56:20','2020-11-03 14:56:20',NULL),
(66,'G201066','Riya li','bmaschler@gmail.com','riya li','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-03 15:10:08','2020-11-03 15:10:08',NULL),
(67,'G201067','Layla frazier','molina.mariola@gmail.com','layla frazier','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-03 15:14:04','2020-11-03 15:14:04',NULL),
(68,'G201068','Gloria ballard','ef4ms@comcast.net','gloria ballard','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-03 17:19:59','2020-11-03 17:19:59',NULL),
(69,'G201069','Elsa hale','gracie.h9@icloud.com','elsa hale','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-03 21:31:25','2020-11-03 21:31:25',NULL),
(70,'G201070','Kolten michael','jgieka@gmail.com','kolten michael','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-04 05:16:02','2020-11-04 05:16:02',NULL),
(71,'G201071','Krystal jennings','sominie@g.ucla.edu','krystal jennings','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-04 08:07:14','2020-11-04 08:07:14',NULL),
(72,'G201072','Esme key','shenameachem1@gmail.com','esme key','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-04 10:07:01','2020-11-04 10:07:01',NULL),
(73,'G201073','Arlo thomas','reception@sapir.com','arlo thomas','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-04 13:53:56','2020-11-04 13:53:56',NULL),
(74,'G201074','Amelie savage','hkiest@yahoo.com','amelie savage','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-04 17:50:13','2020-11-04 17:50:13',NULL),
(75,'G201075','Ally short','rolfesjp@yahoo.com','ally short','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-04 23:09:46','2020-11-04 23:09:46',NULL),
(76,'G201076','Ally chambers','michael@inecta.com','ally chambers','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-05 01:37:02','2020-11-05 01:37:02',NULL),
(77,'G201077','Madyson james','jamieandleeh@gmail.com','madyson james','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-05 04:40:24','2020-11-05 04:40:24',NULL),
(78,'G201078','Mary caldwell','tamiah308@gmail.com','mary caldwell','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-05 04:52:05','2020-11-05 04:52:05',NULL),
(79,'G201079','Ally riley','errol.a.jones@nasa.gov','ally riley','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-05 05:34:43','2020-11-05 05:34:43',NULL),
(80,'G201080','Mary wu','jt21son@yahoo.com','mary wu','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-05 10:26:59','2020-11-05 10:26:59',NULL),
(81,'G201081','Jerry harris','tom@pegasushobbies.com','jerry harris','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-05 14:17:24','2020-11-05 14:17:24',NULL),
(82,'G201082','Maritza harris','ryanrobinson.life@gmail.com','maritza harris','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-05 15:16:52','2020-11-05 15:16:52',NULL),
(83,'G201083','Zackary li','wade_lee@yahoo.com','zackary li','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-05 18:08:07','2020-11-05 18:08:07',NULL),
(84,'G201084','Laurel james','tenderloin.kseven.1985@gmail.com','laurel james','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-05 18:28:04','2020-11-05 18:28:04',NULL),
(85,'G201085','Jaylene pennington','tedw@sea-kind.com','jaylene pennington','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-05 19:53:40','2020-11-05 19:53:40',NULL),
(86,'G201086','Esme michael','daniellelee454@yahoo.com','esme michael','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-05 21:55:48','2020-11-05 21:55:48',NULL),
(87,'G201087','Ally hale','office@jackstockwell.com','ally hale','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-06 03:38:08','2020-11-06 03:38:08',NULL),
(88,'G201088','Mary villarreal','info@ipagroup.org','mary villarreal','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-06 15:24:43','2020-11-06 15:24:43',NULL),
(89,'G201089','Gloria savage','isabellascott2005@gmail.com','gloria savage','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-06 19:40:44','2020-11-06 19:40:44',NULL),
(90,'G201090','Reuben page','fgsippey@gmail.com','reuben page','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-06 22:52:30','2020-11-06 22:52:30',NULL),
(91,'G201091','Jaylene flowers','mollywat15@yahoo.com','jaylene flowers','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-07 01:02:25','2020-11-07 01:02:25',NULL),
(92,'G201092','Cheyanne snyder','elan.mayhew@fexy.com','cheyanne snyder','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-07 02:25:13','2020-11-07 02:25:13',NULL),
(93,'G201093','Marie weber','pitmaster.lk@gmail.com','marie weber','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-07 03:54:05','2020-11-07 03:54:05',NULL),
(94,'G201094','Jayda li','clanaaaad1998@googlemail.com','jayda li','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-07 11:24:36','2020-11-07 11:24:36',NULL),
(95,'G201095','Leila savage','info@archaniaworkshop.com','leila savage','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-09 20:59:41','2020-11-09 20:59:41',NULL),
(96,'G201096','Averi shannon','nicole.roder@gmail.com','averi shannon','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-09 22:17:45','2020-11-09 22:17:45',NULL),
(97,'G201097','Deangelo weber','office@verticalconstruction.com','deangelo weber','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-09 23:52:48','2020-11-09 23:52:48',NULL),
(98,'G201098','Rylie villarreal','mlsssaucedo@aol.com','rylie villarreal','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-10 21:51:30','2020-11-10 21:51:30',NULL),
(99,'G201099','Jaylene mcdaniel','mliles324@gmail.com','reuben humphrey','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-11 07:19:06','2020-11-11 07:19:06',NULL),
(100,'G2010100','Raelynn wu','torotoro63@aol.com','raelynn wu','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-11 11:51:33','2020-11-11 11:51:33',NULL),
(101,'G2010101','Finnegan short','natesimson@yahoo.com','finnegan short','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-11 16:44:18','2020-11-11 16:44:18',NULL),
(102,'G2010102','Hudson weber','chrisalanmusic89@gmail.com','hudson weber','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-11 17:38:53','2020-11-11 17:38:53',NULL),
(103,'G2010103','Reagan caldwell','ngoodlin@gmail.com','reagan caldwell','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-11 19:56:26','2020-11-11 19:56:26',NULL),
(104,'G2010104','Carley dixon','mommaonamission@hotmail.com','carley dixon','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-12 02:24:38','2020-11-12 02:24:38',NULL),
(105,'G2010105','Reagan shannon','sethdlittle@gmail.com','reagan shannon','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-12 02:36:55','2020-11-12 02:36:55',NULL),
(106,'G2010106','Karissa elliott','shye.wiese1444@gmail.com','karissa elliott','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-12 04:52:31','2020-11-12 04:52:31',NULL),
(107,'G2010107','Krystal dixon','mrwonderful4444@aol.com','krystal dixon','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-12 11:01:28','2020-11-12 11:01:28',NULL),
(108,'G2010108','Marie shannon','mzbraz2009@yahoo.com','marie shannon','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-12 18:46:10','2020-11-12 18:46:10',NULL),
(109,'G2010109','Elsa pennington','nsasser46@gmail.com','elsa pennington','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-12 19:08:55','2020-11-12 19:08:55',NULL),
(110,'G2010110','Karissa thomas','carla@roll-aid.net','karissa thomas','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-12 21:36:57','2020-11-12 21:36:57',NULL),
(111,'G2010111','Jaliyah bush','kirby9900@gmail.com','jaliyah bush','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-13 06:22:39','2020-11-13 06:22:39',NULL),
(112,'G2010112','Amelie navarro','kicksve54@yahoo.com','amelie navarro','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-13 06:26:22','2020-11-13 06:26:22',NULL),
(113,'G2010113','Jayda james','stevenrshafer@hotmail.com','jayda james','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-13 08:39:21','2020-11-13 08:39:21',NULL),
(114,'G2010114','Kolten pennington','cmkdetail@hotmail.com','kolten pennington','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-13 09:21:38','2020-11-13 09:21:38',NULL),
(115,'G2010115','Riya pennington','kevinffrench1@gmail.com','riya pennington','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-13 14:46:18','2020-11-13 14:46:18',NULL),
(116,'G2010116','Madyson walters','kiserraci@gmail.com','madyson walters','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-13 18:18:01','2020-11-13 18:18:01',NULL),
(117,'G2010117','Averi riley','nycfour@gmail.com','averi riley','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-14 03:00:21','2020-11-14 03:00:21',NULL),
(118,'G2010118','Mary bush','rprice1231@gmail.com','mary bush','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-14 08:49:13','2020-11-14 08:49:13',NULL),
(119,'B2010119','Futetsugerui@gmail.com','futetsugerui@gmail.com','9613732276','female','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'daughter',0,3,'2020-11-14 18:46:07','2020-11-14 18:46:07',NULL),
(120,'G2010120','Maritza bruce','ucfcourtney06@hotmail.com','maritza bruce','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-15 12:15:07','2020-11-15 12:15:07',NULL),
(121,'G2010121','Riya frazier','albany022@gmail.com','riya frazier','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-16 00:55:19','2020-11-16 00:55:19',NULL),
(122,'G2010122','Gloria harris','l.kinsey@soundenergysystems.com','gloria harris','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-16 00:55:58','2020-11-16 00:55:58',NULL),
(123,'G2010123','Alicia walters','layinlo_usmc@yahoo.com','alicia walters','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-16 01:51:15','2020-11-16 01:51:15',NULL),
(124,'G2010124','Jaylene snyder','salisa3men@yahoo.com','jaylene snyder','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-16 02:11:28','2020-11-16 02:11:28',NULL),
(125,'G2010125','Arlo jordan','shean_lauing@hotmail.com','arlo jordan','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-16 02:14:44','2020-11-16 02:14:44',NULL),
(126,'G2010126','Roselyn orr','lindaclarke70@gmail.com','roselyn orr','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-16 05:08:33','2020-11-16 05:08:33',NULL),
(127,'G2010127','Hudson li','hudsonli.re.7073409@mojorage.life','hudson li','','','','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-11-16 07:09:11','2020-11-16 07:09:11',NULL),
(128,'B2010128','Tairiblo99@gmail.com','tairiblo99@gmail.com','2804876518','female','33aa66a73050f4672c51b6e2088b6ec1','NEkwdURqRmdFVUpDIQ==','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'daughter',0,3,'2020-12-02 04:18:50','2020-12-02 04:18:50',NULL),
(129,'G2010129','Finnegan dixon','finnegandixon.sc.17127391@mojorage.life','finnegan dixon','','463c25551b796d19eed499dedf0958d0','ZmlubmVnYW4gZGl4b24=','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'',0,3,'2020-12-11 19:45:06','2020-12-11 19:45:06',NULL),
(130,'G2010130','Srinivas','ssgrafics@gmail.com','9246333221','male','e10adc3949ba59abbe56e057f20f883e','MTIzNDU2','WebSite','WebSite',NULL,NULL,0,0,0,0,'2020-12-15','2020-12-18',3,NULL,0,1,500,'self',0,1,'2020-12-15 09:37:43','2020-12-15 09:39:04',NULL),
(131,'G2010131','Dileep Kumar Konda','dileepkumarkonda@gmail.com','08555881572','male','e10adc3949ba59abbe56e057f20f883e','MTIzNDU2','WebSite','WebSite',NULL,NULL,0,0,0,0,NULL,NULL,0,NULL,0,0,0,'self',0,3,'2020-12-22 04:53:15','2020-12-22 04:53:15',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
