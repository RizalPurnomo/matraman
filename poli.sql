/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.28-MariaDB : Database - dbmatraman
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbmatraman` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `dbmatraman`;

/*Data for the table `poli` */

insert  into `poli`(`id`,`nama_poli`,`file_panggilan`,`pass`,`lantai`,`urut`) values 
(1,'UMUM','pelayanan-umum.mp3','12345',0,NULL),
(2,'GIGI','Poli-Gigi.mp3','12345',NULL,NULL),
(3,'KB','pelayanan-kb.mp3','12345',4,NULL),
(4,'KIA','Poli-PKPR.mp3','12345',2,NULL),
(5,'UP24 JAM','pelayanan-up24.mp3','12345',1,NULL),
(6,'MTBS','mtbs.mp3','12345',2,NULL),
(7,'TB','pelayanan-tb.mp3',NULL,1,NULL),
(8,'LANSIA','pelayanan-lansia.mp3',NULL,4,NULL),
(9,'GIZI','poli-gizi.mp3','12345',3,NULL),
(10,'IMUNISASI',NULL,NULL,2,NULL),
(11,'PTM',NULL,NULL,NULL,NULL),
(12,'PSIKOLOGI',NULL,NULL,NULL,NULL),
(13,'PKPR','pkpr.mp3','12345',2,NULL),
(14,'UBM',NULL,NULL,NULL,NULL),
(15,'LAVENDER',NULL,NULL,NULL,NULL),
(16,'SEROJA','poli-seroja.mp3','123456',0,NULL),
(17,'CATIN','pelayanan-catin.mp3',NULL,4,NULL),
(18,'HAJI',NULL,NULL,NULL,NULL),
(19,'KONSELING',NULL,NULL,NULL,NULL),
(20,'ISPA','pelayanan-ispa.mp3',NULL,1,NULL),
(21,'RUANG BERSALIN',NULL,NULL,NULL,NULL),
(22,'APOTEK',NULL,NULL,NULL,NULL),
(23,'LOKET',NULL,NULL,NULL,NULL),
(24,'LAB',NULL,NULL,NULL,NULL),
(25,'DEWASA 1','pelayanan-dewasa1.mp3','1234',4,NULL),
(26,'DEWASA 2','pelayanan-dewasa2.mp3','1234',4,NULL),
(27,'DEWASA 3','pelayanan-dewasa3.mp3','1234',4,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
