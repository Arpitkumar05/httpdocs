/*
SQLyog Community
MySQL - 5.7.21-0ubuntu0.16.04.1 : Database - fcs_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `easyflex_inner_page` */

DROP TABLE IF EXISTS `easyflex_inner_page`;

CREATE TABLE `easyflex_inner_page` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `show_header` enum('Y','N') NOT NULL,
  `title` varchar(500) NOT NULL,
  `parent_id` bigint(20) NOT NULL,
  `order` bigint(20) NOT NULL,
  `keyword` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `easyflex_inner_page` */

insert  into `easyflex_inner_page`(`id`,`name`,`slug`,`show_header`,`title`,`parent_id`,`order`,`keyword`,`description`,`status`) values 
(1,'Home','','Y','Easyflex',0,0,'Easyflex','Easyflex is an information technology service provider dedicated to serving schools, small and medium sized businesses and organizations.','Y'),
(2,'Result','result','Y','Result',0,0,'','','Y');

/*Table structure for table `fcs_about` */

DROP TABLE IF EXISTS `fcs_about`;

CREATE TABLE `fcs_about` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `created_date` varchar(32) NOT NULL,
  `updated_date` varchar(32) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `fcs_about` */

insert  into `fcs_about`(`id`,`image`,`content`,`created_date`,`updated_date`,`created_by`,`updated_by`,`status`) values 
(1,'http://localhost/fcs/./assets/about/thumb/1518250013in-about.png','<div class=\\\"a-about-h\\\">\r\n<h4>About Us</h4>\r\n</div>\r\n\r\n<div class=\\\"text-abo\\\">\r\n<p><strong>FORTABYTE CYBER SOLUTIONS</strong> is an information technology service provider dedicated to serving schools, small and medium sized businesses and organizations.</p>\r\n\r\n<p>FCS stands out from the rest because we are dedicated to providing the highest quality products and services to our customers. At FCS, we don\\\'t have clients, we have partnerships.</p>\r\n\r\n<h5>Business Philosophy</h5>\r\n\r\n<p>Fortabyte Cyber Solutions\\\' mission is to provide a full range of high quality solutions and the best support at affordable prices. The strategy for achieving this goal consists of four basic components:</p>\r\n\r\n<ul class=\\\"about-dot\\\">\r\n	<li>Give our customers more than they expect.</li>\r\n	<li>Provide a high quality, effective service.</li>\r\n	<li>Stand behind the service with a 100% satisfaction guarantee.</li>\r\n</ul>\r\n\r\n<h5>Experience</h5>\r\n\r\n<p>Since 1996, FCS has been delivering quality network services and custom applications. In this fast changing industry, FCS continues to keep abreast of the latest technologies and products, providing its clients with the best solutions.</p>\r\n</div>','2018-02-10 13:29:30','2018-02-10 13:36:55',1,1,'Y'),
(2,'http://localhost/fcs/./assets/about/thumb/1518250028in-about2.png','<h5>Quality </h5>\r\n                                <p>FCS network engineers have both extensive experience and professional certification. FCS engineers hold certifications from Microsoft, IBM, Hewlett Packard, Cisco, Safari Montage, Symantec, VMWare, SoniWALL and others. By combining the technical skill of its engineers, quality products, the proper technology solution and a truly caring attitude, FCS delivers the right solution and exceptional service ... at the right price. </p>\r\n                                <h5>Responsibility</h5>\r\n                                <p>Fortabyte Cyber Solutions takes responsibility for every aspect of the technology solution. Whether it is a software, hardware or a service issue, FCS will find the \r\nsolution. There is never any finger pointing, only a positive let\\\'s get it done \r\ncan-do attitude. </p>\r\n								<h5>Partnership </h5>\r\n                                <p>FCS will become your technology partner. As your needs change, Fortabyte Cyber Solutions will be there to provide technical advice, expertise and solutions \r\nevery step of the way.</p>\r\n                                <h5>Responsiveness </h5>\r\n                                <p>FCS engineers are available 24 hours a day to respond to your needs. You can always contact us by phone or online. We understand that you can\\\'t control when the system may crash or problems may occur. For this reason, we are available evenings and weekends, providing you with the emergency support you need when you need it.</p>\r\n                                <h5>Solutions </h5>\r\n                                <p>From the initial analysis and design, to installation, training, and support, our goal is to find the best solution for your specific situation. We pride ourselves in our ability to deliver solutions that are technologically sound and cost efficient. Whether its setting up a local area network, accessing the Internet, maintaining your network, developing a Web site, setting up e-mail, installing other line of business applications, providing acquisition support or just serving as your technology advisor; FCS is there with the correct solution for your specific needs.</p>','2018-02-10 13:38:10','',1,0,'Y');

/*Table structure for table `fcs_admin` */

DROP TABLE IF EXISTS `fcs_admin`;

CREATE TABLE `fcs_admin` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(64) NOT NULL,
  `mobile` varchar(16) NOT NULL,
  `address` varchar(512) NOT NULL,
  `password` varchar(256) NOT NULL,
  `admin_type` enum('superadmin','subadmin') NOT NULL,
  `image` varchar(512) NOT NULL,
  `create_date` varchar(32) NOT NULL,
  `update_date` varchar(32) NOT NULL,
  `last_login` varchar(32) NOT NULL,
  `last_ip` varchar(16) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `fcs_admin` */

insert  into `fcs_admin`(`id`,`name`,`email`,`mobile`,`address`,`password`,`admin_type`,`image`,`create_date`,`update_date`,`last_login`,`last_ip`,`created_by`,`updated_by`,`status`) values 
(1,'FCS','admin@fcs.com','9718740037','Rajat vihar','+NM3Bpcv99mIkkxQNEW6m8oAd6CXV9JreSaYCCJ3QYRkFpZYxloWIFgOqu7qALfrTtuGMlO5/0V28krcqfVzpg==','superadmin','http://localhost/fcs/./assets/sitelogo/thumb/1513755682logo.png','','2018-02-13 14:29:03','2018-02-15 00:24:09','192.168.1.100',0,0,'Y');

/*Table structure for table `fcs_banner` */

DROP TABLE IF EXISTS `fcs_banner`;

CREATE TABLE `fcs_banner` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `page_id` varchar(200) NOT NULL,
  `image` varchar(256) NOT NULL,
  `title` varchar(256) NOT NULL,
  `created_date` varchar(32) NOT NULL,
  `updated_date` varchar(32) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `fcs_banner` */

insert  into `fcs_banner`(`id`,`page_id`,`image`,`title`,`created_date`,`updated_date`,`created_by`,`updated_by`,`status`) values 
(1,'6','http://localhost/fcs/./assets/banner/thumb/1518172386servicebanner.png','simplify IT , secure IT','2018-02-09 16:08:53','2018-02-09 16:56:54',1,1,'Y'),
(2,'2','http://localhost/fcs/./assets/banner/thumb/1518172784about-banner.png','','2018-02-09 16:09:46','',1,0,'Y'),
(3,'3','http://localhost/fcs/./assets/banner/thumb/1518172871product.png','simplify IT , secure IT','2018-02-09 16:11:13','',1,0,'Y'),
(4,'4','http://localhost/fcs/./assets/banner/thumb/1518172917servicebanner.png','simplify IT , secure IT','2018-02-09 16:11:59','',1,0,'Y'),
(5,'5','http://localhost/fcs/./assets/banner/thumb/1518173056servicebanner.png','simplify IT , secure IT','2018-02-09 16:14:17','',1,0,'Y'),
(6,'7','http://localhost/fcs/./assets/banner/thumb/1518173161partner-banner.png','','2018-02-09 16:16:03','',1,0,'Y'),
(7,'8','http://localhost/fcs/./assets/banner/thumb/1518173230contact-banner.png','','2018-02-09 16:17:11','',1,0,'Y');

/*Table structure for table `fcs_clients` */

DROP TABLE IF EXISTS `fcs_clients`;

CREATE TABLE `fcs_clients` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `created_date` varchar(32) NOT NULL,
  `updated_date` varchar(32) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `fcs_clients` */

insert  into `fcs_clients`(`id`,`name`,`image`,`content`,`created_date`,`updated_date`,`created_by`,`updated_by`,`status`) values 
(1,'Education','','<p>FCS\\\' primary market is K-12 education. FCS provides technology products and services to many of the school districts in Maryland and to the DC Public School System. We also provide technology products and services to over 40 Public Charter Schools in DC and Baltimore and many private and parochial schools in the DC-Baltimore area. As many FCS engineers have taught or worked directly for schools over the years, FCS understands the unique issues and specialized products required by K-12 schools. FCS staffers are members of the International Society for Technology in Education as well as other Educational councils and associations. In addition to providing technology, FCS provides educational specific consulting for school infrastructure, security, classroom technologies, and administrative management tools. FCS has been an E- rate Service Provider since 2003. FCS also participates in many other grant programs.</p>','2017-12-28 16:48:04','2018-01-01 12:15:17',1,1,'Y'),
(2,'Business','','<p>FCS has many small to mid-sized clients who represent a wide range of businesses. Most FCS business clients have between 15 and 100 employees. FCS provides LANcare ™, networking, Internet, cabling, computers and servers on a project or contract basis.</p>','2017-12-28 16:50:46','',1,0,'Y'),
(3,'Non- Profit','','<p>FCS also supports many not for profit organizations. These include trade associations, unions, advocacy groups, synagogues and churches. FCS provides cost effective LANcare ™, networking, Internet, cabling, computers and servers on a project or contract basis. FCS also helps non-profits find funding and low cost solutions, as budgets are often tight.</p>','2017-12-28 16:51:16','',1,0,'Y');

/*Table structure for table `fcs_consulting` */

DROP TABLE IF EXISTS `fcs_consulting`;

CREATE TABLE `fcs_consulting` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `created_date` varchar(32) NOT NULL,
  `updated_date` varchar(32) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `fcs_consulting` */

insert  into `fcs_consulting`(`id`,`name`,`image`,`content`,`created_date`,`updated_date`,`created_by`,`updated_by`,`status`) values 
(1,'IT Management','','<p>At FCS, we listen to find out what your business really needs, the challenges it faces, plus your goals and expectations.</p>\r\n\r\n<p>Our IT Project Management Professionals gather information from your enterprise to create a strategy that incorporates the best practices and best product and service solutions for your individual environment. We always pay attention to the details in planning and implementing a project, documenting each procedure, each phase to ensure accurate tracking and reproduction, if necessary.</p>\r\n\r\n<p>IT Consulting from Fortabyte Cyber Solutions helps to give you the best technology tools available so that you can focus your time and attention on daily business operations. Our IT consultants are well-versed in all areas of information technology and can provide you with the guidance and resources you need for a stable, reliable, and secure IT infrastructure.</p>','2017-12-28 15:54:30','2018-02-10 10:35:35',1,1,'Y'),
(2,'Security','','<p>The primary purpose of FCS is to provide our clients with security consultants who have the highest set of standards for professionalism and ethical conduct in the industry. We believe our assessments provide better value to the business manager. By understanding the business loss potential, pragmatic decisions can be made about :how to invest\\\" in making improvements.</p>\r\n\r\n<h3>Services Overview:</h3>\r\n\r\n<ul>\r\n	<li>Surveillance Systems</li>\r\n	<li>Security Audit and Planning</li>\r\n	<li>Firewalls, Web Filtering &amp; Proxies</li>\r\n	<li>Anti-X solutions and Appliance</li>\r\n</ul>\r\n\r\n<p>Our professionals can assist you in defining security policies that align with your business goals and making them operational with a robust architecture, relevant deployment procedures, and meaningful controls. We can also help you build a sustainable program with creative awareness and training solutions. We can also help you prepare for responding to security events as well as provide incident response forensics and analysis expertise. We are uniquely positioned to provide IT support for a full range of business needs in Washington DC Metropolitan area, using our wide range of vendor products, access to numerous service providers, and unique ability to assess and secure custom, high-end enterprise and operations applications.</p>','2017-12-28 15:55:51','2018-02-10 10:35:45',1,1,'Y'),
(3,'Network Design','','<p>FCS is a pioneer in Network Design and Implementation, including levels of redundancy, fault tolerance, and disaster recovery, scalable and interoperable network design and implementation based on budget unit business requirements.</p>\r\n\r\n<p>We can handle all of your needs when it comes to planning, building, or upgrading your network. We can design and implement networks ranging from connecting just a few PCs to share the internet to connecting multiple offices over wide area networks (WANs) using virtual private networks (VPNs).</p>\r\n\r\n<p>FCS offers the following services in consulting on your network design:</p>\r\n\r\n<h3>LAN Engineering and Services</h3>\r\n\r\n<ul>\r\n	<li>Network Administration</li>\r\n	<li>Switches, Access Points and VLANs</li>\r\n	<li>Router and Firewall configuration</li>\r\n	<li>Systems Integration &amp; Implementation</li>\r\n</ul>\r\n\r\n<h3>WAN Engineering and Services</h3>\r\n\r\n<ul>\r\n	<li>Internet Access Configuration</li>\r\n	<li>VPN &amp; PVC Connectivity</li>\r\n</ul>','2017-12-28 15:57:26','2018-02-10 10:35:53',1,1,'Y'),
(4,'Educational Technologies','','<p>FCS is composed of individuals with many years of experience working in schools on educational technology. These individuals share a common philosophy around the integration of technology which emphasizes project-based learning that is driven by curricular outcomes and national educational technology standards.</p>\r\n\r\n<p>Fortabytre Cyber Solutions has a resolution to the issues that organizations face when attempting to effectively integrate technology. We take on the role of an interpreter that can bridge the communications gap between the technology representative/sales person and the teacher. We make sure that you are equipped by providing the training, professional development, applications, and consulting services that allow your organization to maximize your effectiveness and meet your outcomes.</p>','2017-12-28 15:58:41','2018-02-10 10:36:01',1,1,'Y');

/*Table structure for table `fcs_footer` */

DROP TABLE IF EXISTS `fcs_footer`;

CREATE TABLE `fcs_footer` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `link_type` enum('manual','page_id') NOT NULL,
  `link` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `created_date` varchar(32) NOT NULL,
  `updated_date` varchar(32) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `fcs_footer` */

insert  into `fcs_footer`(`id`,`title`,`link_type`,`link`,`section`,`created_date`,`updated_date`,`created_by`,`updated_by`,`status`) values 
(1,'home','page_id','1','company','2017-12-27 11:21:07','2018-01-01 12:21:43',1,1,'Y'),
(2,'About Us','page_id','2','company','2017-12-27 11:37:23','',1,0,'Y'),
(3,'products','page_id','3','company','2017-12-27 11:38:17','',1,0,'Y'),
(4,'Services','page_id','4','company','2017-12-27 11:38:57','',1,0,'Y'),
(5,'Consulting','page_id','5','services','2017-12-27 11:39:48','',1,0,'Y'),
(7,'Technology For Schools','manual','http://www.bfi.org.uk/','services','2017-12-27 11:51:03','2018-01-02 15:03:43',1,1,'Y'),
(8,'Client | Partners','page_id','7','services','2017-12-27 12:39:06','',1,0,'Y'),
(9,'Site Map','manual','https://www.npr.org/','services','2017-12-27 12:40:32','',1,0,'Y');

/*Table structure for table `fcs_footer_contact` */

DROP TABLE IF EXISTS `fcs_footer_contact`;

CREATE TABLE `fcs_footer_contact` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fname` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_date` varchar(32) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

/*Data for the table `fcs_footer_contact` */

insert  into `fcs_footer_contact`(`id`,`fname`,`email`,`message`,`created_date`,`status`) values 
(1,'cc','yogesh.dixit@algosoftech.in','','2018-02-13 20:24:38','N'),
(2,'cc','yogesh.dixit@algosoftech.in','','2018-02-13 20:25:24','N'),
(3,'rrr','yogesh.dixit@algosoftech.in','','2018-02-13 20:27:53','N'),
(4,'tt','yogesh.dixit@algosoftech.in','','2018-02-13 20:29:30','N'),
(5,'sadas','yogesh.dixit@algosoftech.in','','2018-02-13 20:34:25','N'),
(6,'sadas','yogesh.dixit@algosoftech.in','','2018-02-13 20:34:46','N'),
(7,'Yogesh','yogesh.dixit@algosoftech.in','','2018-02-13 20:34:53','N'),
(8,'Yogesh','yogesh.dixit@algosoftech.in','','2018-02-13 20:35:39','N'),
(9,'Yogesh','yogesh.dixit@algosoftech.in','','2018-02-13 20:35:50','N'),
(10,'Yogesh','shveta@algosoftech.in','','2018-02-13 20:37:25','N'),
(11,'Yogesh','yogesh.dixit@algosoftech.in','','2018-02-13 20:37:35','N'),
(12,'Yogesh','yogesh.dixit@algosoftech.in','yy','2018-02-13 20:38:52','N'),
(13,'Yogesh','yogesh.dixit@algosoftech.in','dsd','2018-02-13 20:39:16','N'),
(14,'Yogesh','yogesh.dixit@algosoftech.in','ss','2018-02-13 21:01:05','N'),
(15,'Yogesh','DSADAS@gmail.com','dsad','2018-02-13 21:02:07','N'),
(16,'Yogesh','yogesh.dixit@algosoftech.in','sadsa','2018-02-13 21:02:20','N'),
(17,'Yogesh','shveta@algosoftech.in','ss','2018-02-13 21:05:32','N'),
(18,'Yogesh','yogesh.dixit@algosoftech.in','dsd','2018-02-13 21:05:39','N'),
(19,'Yogesh','yogesh.dixit@algosoftech.in','ss','2018-02-13 21:09:57','N'),
(20,'Yogesh','yogesh.dixit@algosoftech.in','JJ','2018-02-13 21:25:22','Y'),
(21,'Yogesh','yogesh.dixit@algosoftech.in','SSS','2018-02-13 21:28:45','Y'),
(22,'Yogesh','yogesh.dixit@algosoftech.in','ASDAS','2018-02-13 21:29:07','Y'),
(23,'dsad','yogesh.dixit@algosoftech.in','dasd','2018-02-14 13:07:16','Y'),
(24,'Yogesh','yogesh.dixit@algosoftech.in','sdas','2018-02-14 13:07:29','Y'),
(25,'Yogesh','yogesh.dixit@algosoftech.in','dasdas','2018-02-14 13:10:19','Y'),
(26,'Yogesh','yogesh.dixit@algosoftech.in','c','2018-02-14 13:15:58','Y'),
(27,'yogeshdf','yorgi@gmail.com','fsd','2018-02-14 13:16:15','Y'),
(28,'Yogesh','yogesh.dixit@algosoftech.in','11111','2018-02-14 13:16:39','Y'),
(29,'Yogesh','yogesh.dixit@algosoftech.in','yy','2018-02-14 14:54:27','Y'),
(30,'Yogesh','yogesh.dixit@algosoftech.in','dsffdsf','2018-02-15 10:00:17','Y'),
(31,'Yogesh','dixit@gmail.com','dsdsd','2018-02-15 10:00:24','Y');

/*Table structure for table `fcs_general_data` */

DROP TABLE IF EXISTS `fcs_general_data`;

CREATE TABLE `fcs_general_data` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `type` varchar(100) NOT NULL,
  `created_date` varchar(32) NOT NULL,
  `updated_date` varchar(32) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `fcs_general_data` */

insert  into `fcs_general_data`(`id`,`title`,`content`,`type`,`created_date`,`updated_date`,`created_by`,`updated_by`,`status`) values 
(1,'Site logo','<p><img alt=\\\"\\\" src=\\\"http://localhost/fcs/assets/editor_upload_images/logo(2).png\\\"></p>','Sitelogo','2017-12-27 13:38:01','2018-02-08 15:27:55',1,1,'Y'),
(2,'contact number','301-770-7000','contact-no','2017-12-27 14:40:09','2018-01-01 12:25:59',1,1,'Y'),
(3,'Sender Mail id','algosoft.apps@gmail.com','senderMail','2017-12-27 14:41:19','',1,0,'Y'),
(4,'facebook link','https://www.facebook.com/','facebook','2017-12-27 14:43:17','2017-12-27 14:45:12',1,1,'Y'),
(5,'Twitter link','https://twitter.com/','twitter','2017-12-27 14:44:04','2017-12-27 14:45:03',1,1,'Y'),
(6,'google+ link','https://plus.google.com/discover','googlePlus','2017-12-27 14:44:55','',1,0,'Y'),
(7,'Pinterest link','https://in.pinterest.com/','pinterest','2017-12-27 14:47:53','2017-12-27 14:48:46',1,1,'Y'),
(8,'Email id','info@fcs.com','email','2017-12-27 14:49:51','',1,0,'Y'),
(9,'Fax','301-770-7024','fax','2017-12-27 14:50:39','2018-01-07 21:27:01',1,1,'Y'),
(10,'Address','1803 Research Blvd.  Suite 206  Rockville, Maryland 20850','address','2017-12-27 14:51:44','2018-01-07 21:26:56',1,1,'Y');

/*Table structure for table `fcs_home_about` */

DROP TABLE IF EXISTS `fcs_home_about`;

CREATE TABLE `fcs_home_about` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `show_type` enum('left','right') NOT NULL,
  `created_date` varchar(32) NOT NULL,
  `updated_date` varchar(32) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `fcs_home_about` */

insert  into `fcs_home_about`(`id`,`content`,`image`,`designation`,`show_type`,`created_date`,`updated_date`,`created_by`,`updated_by`,`status`) values 
(1,'<h3>FORTABYTE CYBER SOLUTIONS</h3>\r\n\r\n<p>is an information technology service provider dedicated to serving schools, small and medium sized businesses and organizations.</p>\r\n\r\n<p>FCS stands out from the rest because we are dedicated to providing the highest quality products and services to our customers. At FCS, we don\\\'t have clients, we have partnership Fortabyte Cyber Solutions\\\' mission is to provide a full range of high quality solutions and the best support at affordable prices.</p>','http://localhost/fcs/./assets/home_about/thumb/1518089339about2.png','','left','2017-12-28 12:13:13','2018-02-08 16:59:01',1,1,'Y');

/*Table structure for table `fcs_inner_page` */

DROP TABLE IF EXISTS `fcs_inner_page`;

CREATE TABLE `fcs_inner_page` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `show_header` enum('Y','N') NOT NULL,
  `title` varchar(500) NOT NULL,
  `parent_id` bigint(20) NOT NULL,
  `order` bigint(20) NOT NULL,
  `keyword` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `fcs_inner_page` */

insert  into `fcs_inner_page`(`id`,`name`,`slug`,`show_header`,`title`,`parent_id`,`order`,`keyword`,`description`,`status`) values 
(1,'Home','','Y','Welcome to  Fortabyte Cyber Solutionsss',0,0,'Fortabyte,Cyberr, IOT Developer, Solutions,ss','Fortabyte Cyber Solutions is an information technology service provider dedicated to serving schools, small and medium sized businesses and organizations.ss','Y'),
(2,'About Us','about-us','Y','About  Fortabyte Cyber Solutions',0,0,'','','Y'),
(3,'Product','product','Y','Product of Fortabyte Cyber Solutions',0,0,'','','Y'),
(4,'Services','services','Y','Services at Fortabyte Cyber Solutions',0,0,'','','Y'),
(5,'Consulting','consulting','Y','Consulting at Fortabyte Cyber Solutions',0,0,'','','Y'),
(6,'Clients','clients','Y','Clients of Fortabyte Cyber Solutions',0,0,'','','Y'),
(7,'Partners','partners','Y','Partners of Fortabyte Cyber Solutions',0,0,'','','Y'),
(8,'Contact Us','contact','Y','Contact Us Fortabyte Cyber Solutions',0,0,'','','Y'),
(9,'Help Desk','helpdesk','Y','Contact Us Fortabyte Cyber Solutions',0,0,'Fortabyte,Cyberr, IOT Developer, Solutions','Fortabyte Cyber Solutions is an information technology service provider dedicated to serving schools, small and medium sized businesses and organizations.','Y');

/*Table structure for table `fcs_page_heading` */

DROP TABLE IF EXISTS `fcs_page_heading`;

CREATE TABLE `fcs_page_heading` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `page_id` bigint(20) NOT NULL,
  `heading` varchar(1000) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `fcs_page_heading` */

insert  into `fcs_page_heading`(`id`,`page_id`,`heading`,`status`) values 
(23,1,'<h1>Our Services</h1>','Y'),
(24,1,'<h1>Products</h1>','Y'),
(25,1,'<h1>Happy Customers</h1>\r\n                    <p>Welcome, please click on the following links to learn  about Internet security <br>\r\nissues from research  centers around the world.</p>','Y'),
(26,1,'<h1>Partners </h1>','Y'),
(27,6,'<h2>Clients</h2>\r\n                    <p>FORTABYTE CYBER SOLUTIONS (FCS) would like to be your IT partner. FCS has been providing IT services to the Baltimore-Washington<br> \r\nmetropolitan area since 1996. We offer a full range of IT services and products. </p>','Y'),
(28,4,'<h2>Services</h2>\r\n                    <p>FORTABYTE CYBER SOLUTIONS (FCS) would like to be your IT partner. FCS has been providing IT services to the Baltimore-Washington<br> \r\nmetropolitan area since 1996. We offer a full range of IT services and products. </p>','Y'),
(29,5,'<h2>Consulting</h2>\r\n                    <p>FORTABYTE CYBER SOLUTIONS (FCS) would like to be your IT partner. FCS has been providing IT services to the Baltimore-Washington<br> \r\nmetropolitan area since 1996. We offer a full range of IT services and products. </p>','Y'),
(30,7,'<h2>Partners</h2>\r\n                    <p>Fortabyte Cyber Solutions works with industry vendors to provide a wide range of services to our customers. We believe our strong commitment to our customers and collaboration with clients, partners and leading organizations helps create an environment for sharing ideas and fostering innovation. </p>','Y');

/*Table structure for table `fcs_partners` */

DROP TABLE IF EXISTS `fcs_partners`;

CREATE TABLE `fcs_partners` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `order` varchar(100) NOT NULL,
  `show_on` enum('home','partner','both') NOT NULL,
  `created_date` varchar(32) NOT NULL,
  `updated_date` varchar(32) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `fcs_partners` */

insert  into `fcs_partners`(`id`,`name`,`content`,`image`,`order`,`show_on`,`created_date`,`updated_date`,`created_by`,`updated_by`,`status`) values 
(1,'Microsoft Gold Partner','<p>As a Microsoft Authorized Education Reseller, FCS is one of the few smaller companies authorized to sell Microsoft academic software and educational licensing. This includes volume licenses through the Academic Open License program, Campus Agreements, and School Agreements, as well as Academic Edition Full Packaged Products and Cloud Based Applications. Being authorized to resell and support Microsoft academic enables FCS to provide lower pricing and better service to our school clients.</p>','http://localhost/fcs/./assets/partners/thumb/1518427770partner1.png','','both','2017-12-27 16:56:52','2018-02-12 15:07:45',1,1,'Y'),
(2,'Microsoft Authorized Education Reseller','<p>As a Microsoft Authorized Education Reseller, Tech Enterprises sells academically-priced Microsoft products to qualified educational users. This includes volume licenses through the Academic Open License, Campus Agreement, and School Agreement programs, as well as Academic Edition Full Packaged Products.</p>','http://localhost/fcs/./assets/partners/thumb/1518427784partner2.png','','both','2017-12-27 16:57:26','2018-02-12 15:07:54',1,1,'Y'),
(3,'Cisco Premier Partner','<p>As a leading Certified Cisco Partner, FCS and FCS engineers have obtained the certifications required to install and support Cisco switches, routers, security appliances, wireless networking and VoIP Phone Systems. Additionally, FCS is authorized to purchase Cisco equipment directly from Cisco enabling FCS to provide top rated Cisco networking equipment at the best prices to FCS clients.</p>','http://localhost/fcs/./assets/partners/thumb/1518427794partner3.png','','both','2017-12-27 16:58:11','2018-02-12 14:59:56',1,1,'Y'),
(4,'IBM Partner','<p>Year after year, IBM has earned the industry’s recognition for the most reliable and highest performing servers. As an IBM partner, FCS has the training and authorization to install and support these servers including IBM xSeries Servers, Blade servers and Storage. Most service providers are not even authorized to sell or support IBM servers. FCS has been recognized by IBM for its excellent sales and service, enabling FCS to have direct contact with IBM engineers and purchase at the lowest pricing which FCS passes on to its clients.</p>','http://localhost/fcs/./assets/partners/thumb/1518427805partner4.png','','both','2017-12-27 16:58:31','2018-02-12 15:00:07',1,1,'Y'),
(5,'HP Partner','<p>HP and FCS have teamed for more than ten years to deliver effective solutions to FCS clients. We combine the HP industry-leading technology portfolio with FCS’ excellent services to offer FCS clients the most cost effective, quality solutions using the full range of HP products including PCs, servers, thin clients, printers and ProCurve switches. Using HP, FCS has helped clients upgrade their computers and network with excellent and cost effective HP products.</p>','http://localhost/fcs/./assets/partners/thumb/1518427815partner5.png','','both','2017-12-27 16:58:58','2018-02-12 15:30:14',1,1,'Y'),
(6,'Dell Authorized','<p>FCS has been authorized to purchase directly from Dell and to provide Dell authorized user support for over ten years. Dell provides quality PCs, laptops, servers and service at excellent price points. FCS and Dell have teamed up to consistently deliver innovative and robust solutions to FCS clients.</p>','http://localhost/fcs/./assets/partners/thumb/1518427824partner6.png','','both','2017-12-27 17:01:49','2018-02-12 15:00:26',1,1,'Y'),
(7,'SonicWALL Partner','<p>As a SonicWALL Partner, FCS is trained and authorized to sell, install and support the full line of state of the art SonicWALL security products. These products include firewalls, intrusion detection, web filtering, anti-virus and anti-span. Our highly-qualified engineers know how to configure, deploy and maintain these complex and sophisticated security devices. And, our partnership with SonicWALL gives us direct access to their best engineers who are available to assist us complex issues or custom security designs.</p>','http://localhost/fcs/./assets/partners/thumb/1518427859partner10.png','','both','2017-12-27 17:02:49','2018-02-12 15:01:00',1,1,'Y'),
(8,'VMWARE Partner','<p>VMware is the leading provider of virtualization solutions in the world and FCS is honored to have earned the certifications necessary to be a certified VMWARE partner. The FCS and VMWARE partnership brings the best server virtualization, desktop virtualization, cloud computing, and disaster recovery solutions to our clients, allowing them to realize cost savings, better performance and improved reliability on IT infrastructure.</p>','http://localhost/fcs/./assets/partners/thumb/1518427918l7.png','','both','2017-12-27 17:03:21','2018-02-12 15:02:00',1,1,'Y'),
(9,'LENOVO PARTNER','<p>FCS has been a certified partner of Lenovo since Lenovo become a spin-off company from IBM for the IBM line of PCs and laptops. Lenovo continues to offer the award winning line of ThinkPad laptops and tablets and Think Centre PCs, which FCS is proud to offer and support.</p>','http://localhost/fcs/./assets/partners/thumb/1518428013partner7.png','','both','2018-02-09 09:56:42','2018-02-12 15:03:46',1,1,'Y'),
(10,'SAFARI MONTAGE PARTNER','<p>SAFARI Montage is the leading provider of video distribution, distance learning and creative curriculum management to K-12 schools. FCS is proud to have been selected as a certified partner to sell, install and support this amazing system.</p>','http://localhost/fcs/./assets/partners/thumb/1518428101partner9.png','','both','2018-02-12 15:05:26','',1,0,'Y'),
(11,'SYMANTEC PARTNER','<p>As a Symantec Partner, FCS has access to specialized Symantec resources and support. FCS partners with Symantec to bring clients value and have collaborated on numerous client projects. Symantec products include Backup Exec, Netbackup, Backup System Recovery, Symantec End Point and others products.</p>','http://localhost/fcs/./assets/partners/thumb/1518428191partner11.png','','both','2018-02-12 15:06:33','',1,0,'Y'),
(12,'BARRACUDA PARTNER','<p>Barracuda Networks is the leader in Anti-Spam, Email Archiving, Backup and Web security appliances. As a certified Barracuda Partner, FCS is trained and authorized to sell, install and support all Barracuda products and receive direct factory support.</p>','http://localhost/fcs/./assets/partners/thumb/1518428221partner12.png','','both','2018-02-12 15:07:15','',1,0,'Y');

/*Table structure for table `fcs_product_section` */

DROP TABLE IF EXISTS `fcs_product_section`;

CREATE TABLE `fcs_product_section` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `created_date` varchar(32) NOT NULL,
  `updated_date` varchar(32) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `fcs_product_section` */

insert  into `fcs_product_section`(`id`,`name`,`image`,`content`,`product_id`,`created_date`,`updated_date`,`created_by`,`updated_by`,`status`) values 
(2,'Project Management','http://localhost/fcs/./assets/products/thumb/1514535660cabling1.png','<p>FCS has extensive experience with iSCSI, DAS and Fiber Channel SAN and NAS storage devices. Let FCS design a cost effective storage solution and demystify the confusion surrounding storage.</p>',1,'2017-12-29 13:51:17','',1,0,'Y'),
(3,'Cable Types','http://localhost/fcs/./assets/products/thumb/1514788331cabling2.png','<p>FCS is expert in helping its client select the correct solution and then expertly installing the cable. FCS works with all types of fiber (single mode, multi-mode, 50um, 62.5um, armor, plenum, multi-stand, etc.) We understand what the most cost-effective correct fiber solution is. FCS is also expert in working with CAT5e, CAT6, CAT6+ and coaxial cable. We strictly adhere to the IEEE standards and best practices.</p>',1,'2018-01-01 12:02:21','2018-01-01 12:05:06',1,1,'N'),
(4,'Warranty','http://localhost/fcs/./assets/products/thumb/1514788574cabling3.png','<p>All FCS cable projects, no matter how small, are guaranteed to be done right with the right materials. We warranty all labor and material for one year and will repair or replace without question or cost.</p>',1,'2018-01-01 12:06:16','',1,0,'Y'),
(5,'Lenovo: Thinkpads and Thinkcentre:','http://localhost/fcs/./assets/products/thumb/1514788641cabling1.png','<p>From its business-savvy Latitude laptops to its powerhouse XPS models and Alienware desktops, Dell has made its mark on the PC landscape. Dells PCs and laptops offer a combination of design and perfornace, everyday esentials, ultra mobility and space saving, which lets schools, businesses and non-profit achieve the most success. Dell empowers countries, communities, customers and people everywhere to use technology to realize their dreams.</p>',2,'2018-01-01 12:08:10','',1,0,'Y');

/*Table structure for table `fcs_products` */

DROP TABLE IF EXISTS `fcs_products`;

CREATE TABLE `fcs_products` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `created_date` varchar(32) NOT NULL,
  `updated_date` varchar(32) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `fcs_products` */

insert  into `fcs_products`(`id`,`name`,`image`,`content`,`created_date`,`updated_date`,`created_by`,`updated_by`,`status`) values 
(1,'Cabling','http://localhost/fcs/./assets/products/thumb/1518101937p1.png','FCS cabling division has the expertise and experience to handle virtually any type and size of cabling project for a very large office building to a few extra drops','2017-12-29 10:18:26','2018-02-08 20:28:59',1,1,'Y'),
(2,'Computers','http://localhost/fcs/./assets/products/thumb/1518095434p2.png','All computer components purchased from FCS include a guarantee that they are the correct product for the job and all warranty repair or replacement service.','2017-12-29 10:23:48','2018-02-08 18:40:36',1,1,'Y'),
(3,'Disaster Recovery & Backup','http://localhost/fcs/./assets/products/thumb/1514523418p3.png','FCS cabling division has the expertise and experience to handle virtually any type and size of cabling project for a very large office building to a few extra drops','2017-12-29 10:25:29','2018-02-08 20:27:45',1,1,'Y'),
(4,'Servers','http://localhost/fcs/./assets/products/thumb/1514523490p4.png','FCS is certified to sell and service the top three midrange computer servers and storage servers in rack mount, tower and blade configuration.','2017-12-29 10:28:12','',1,0,'Y'),
(5,'Security','http://localhost/fcs/./assets/products/thumb/1514523541p5.png','FCS will perform a complete security audit, make recommendations for improving you network security and implement the approved recommendations.','2017-12-29 10:29:46','',1,0,'Y'),
(6,'Networking','http://localhost/fcs/./assets/products/thumb/1514523640p6.png','FCS has been providing secure, reliable and fast IP network infrastructure since its beginning. FCS engineers have been trained in HP and Cisco switch design and configuration.','2017-12-29 10:30:41','',1,0,'Y');

/*Table structure for table `fcs_services` */

DROP TABLE IF EXISTS `fcs_services`;

CREATE TABLE `fcs_services` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `home_page_content` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `created_date` varchar(32) NOT NULL,
  `updated_date` varchar(32) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `fcs_services` */

insert  into `fcs_services`(`id`,`name`,`home_page_content`,`image`,`content`,`created_date`,`updated_date`,`created_by`,`updated_by`,`status`) values 
(1,'Training','FCS is a full service engineering and consulting firm whose mission is to provide creative and innovative solutions to its customers. Our expertise lies in Manufacturing IT software  solutions.','http://localhost/fcs/./assets/services/thumb/1518092089s1.png','<p>FCS is a full service engineering and consulting firm whose mission is to provide creative and innovative solutions to its customers. Our expertise lies in \\\"Manufacturing IT\\\", delivering state of the art, PC based software intelligence solutions for industrial applications.</p>\r\n\r\n<p>Our ability to understand the needs of large scale projects on both an IT and Business perspective allows us to provide solutions widely accepted by all members of the team.</p>','2017-12-28 15:26:10','2018-02-08 17:44:50',1,1,'Y'),
(2,'IT Alerts','Welcome, please click on the following links to learn about Internet security issues from research centers around the world.','http://localhost/fcs/./assets/services/thumb/1518091788s2.png','<p>As a professional IT support services company, FCS provides computer maintenance services and network maintenance services in Washington DC Metropolitan Area and surrounding areas. FCS helps you create a computer maintenance service package to fit your needs at an affordable rate! We will customize your maintenance contract to match your specific desires.&nbsp;<br>\r\n<br>\r\nOur computer maintenance customers receive top priority with telephone and email support, same-day support, remote support, priority over non-maintenance clients. We make it our priority to deliver you the best service.</p>','2017-12-28 15:28:31','2018-02-08 17:39:50',1,1,'Y'),
(3,'Technologies For Schools','FCS offers an important aspect of a technology professional development programs for 21st Century Classrooms.','http://localhost/fcs/./assets/services/thumb/1518090290s3.png','<ul>\r\n	<li><strong>Managed Services -</strong>monitor your systems to spot equipment or software problems before they become your problems. This is accomplished using online support tools that troubleshoot, fix, and maintain all systems instead of costly onsite support.</li>\r\n	<li><strong>Desktop, Server Support –</strong>support your critical technology resources around the clock to make sure they are operational and limit possible downtime.</li>\r\n	<li><strong>Network Support –</strong>evaluate current configuration and improve it for better stability and productivity.</li>\r\n	<li><strong>Phone Support – </strong>assist with configuration and issue resolution to keep your telecomunication equipment running.</li>\r\n</ul>','2017-12-28 15:31:56','2018-02-08 17:16:13',1,1,'Y'),
(4,'Help Desk','FCS offers an important aspect of a technology professional development programs for 21st Century Classrooms. Emphases are placed on helping','http://localhost/fcs/./assets/services/thumb/1518090417s4.png','<p>Our remote Help Desk provides an efficient way to provide immediate support to our customers. It\\\'s convenient and fast. We\\\'ve found that the vast majority of our customer\\\'s technical problems can be resolved over the phone or with an online chat.</p>','2017-12-28 15:33:59','2018-02-08 17:16:59',1,1,'Y'),
(5,'Training','Welcome, please click on the following links to learn about Internet security issues from research centers around the world.','http://localhost/fcs/./assets/services/thumb/1518090475s5.png','<p>Our remote Help Desk provides an efficient way to provide immediate support to our customers. It\\\'s convenient and fast. We\\\'ve found that the vast majority of our customer\\\'s technical problems can be resolved over the phone or with an online chat.</p>','2017-12-28 15:35:38','2018-02-08 17:18:18',1,1,'Y'),
(6,'Engineering','FCS offers an important aspect of a technology professional development programs for 21st Century Classrooms. Emphases are placed','http://localhost/fcs/./assets/services/thumb/1518090540s6.png','<p>FCS offers an important aspect of a technology professional development programs for 21st Century Classrooms. Emphases are placed on helping teachers to develop skills and knowledge in technical areas</p>','2017-12-28 15:38:45','2018-02-08 17:19:02',1,1,'Y');

/*Table structure for table `fcs_slider` */

DROP TABLE IF EXISTS `fcs_slider`;

CREATE TABLE `fcs_slider` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `content` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL,
  `image_alt` varchar(256) NOT NULL,
  `orders` tinyint(4) NOT NULL,
  `linktitle` varchar(256) NOT NULL,
  `linkcontent` varchar(256) NOT NULL,
  `created_date` varchar(32) NOT NULL,
  `updated_date` varchar(32) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `fcs_slider` */

insert  into `fcs_slider`(`id`,`title`,`content`,`image`,`image_alt`,`orders`,`linktitle`,`linkcontent`,`created_date`,`updated_date`,`created_by`,`updated_by`,`status`) values 
(1,'','','http://localhost/fcs/./assets/slider/thumb/1518085685banner2.png','',0,'','','2017-12-27 18:39:59','2018-02-08 16:09:09',1,1,'Y'),
(2,'simplify IT , secure IT','','http://localhost/fcs/./assets/slider/thumb/1518086112banner.png','',0,'','','2017-12-27 18:40:21','2018-02-08 16:09:30',1,1,'Y');

/*Table structure for table `fcs_testimonial` */

DROP TABLE IF EXISTS `fcs_testimonial`;

CREATE TABLE `fcs_testimonial` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `order` varchar(100) NOT NULL,
  `created_date` varchar(32) NOT NULL,
  `updated_date` varchar(32) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `fcs_testimonial` */

insert  into `fcs_testimonial`(`id`,`name`,`content`,`image`,`designation`,`order`,`created_date`,`updated_date`,`created_by`,`updated_by`,`status`) values 
(1,'Syed Ekram','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s,when an unknown printer took a galley.','http://localhost/fcs/./assets/testimonial/thumb/1514377961c1.png','Web Developer','','2017-12-27 17:44:53','2018-01-02 12:26:58',1,1,'Y'),
(2,'Syed Ekram','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\\\\\'s standard dummy text ever since the 1500s,when an unknown printer took a galley.','http://localhost/fcs/./assets/testimonial/thumb/1514378014c2.png','Web Developer','','2017-12-27 18:03:54','',1,0,'Y'),
(3,'Syed Ekram','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\\\\\'s standard dummy text ever since the 1500s,when an unknown printer took a galley.','http://localhost/fcs/./assets/testimonial/thumb/1514378102c1.png','Web Developer','','2017-12-27 18:05:04','',1,0,'Y'),
(4,'Syed Ekram','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\\\\\\\\\\\\\'s standard dummy text ever since the 1500s,when an unknown printer took a galley.','http://localhost/fcs/./assets/testimonial/thumb/1514378134c2.png','Web Developer','','2017-12-27 18:05:35','',1,0,'Y'),
(5,'zxczx','czxcz','http://localhost/fcs/./assets/testimonial/thumb/1514789132l1.png','czxcz','','2018-01-01 12:15:33','2018-01-01 12:15:42',1,1,'N');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
