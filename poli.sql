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

/*Table structure for table `poli` */

DROP TABLE IF EXISTS `poli`;

CREATE TABLE `poli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_poli` varchar(50) DEFAULT NULL,
  `file_panggilan` varchar(50) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `lantai` int(11) DEFAULT NULL,
  `urut` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `poli` */

insert  into `poli`(`id`,`nama_poli`,`file_panggilan`,`pass`,`lantai`,`urut`,`is_active`) values 
(1,'UMUM','pelayanan-umum.mp3','12345',0,NULL,0),
(2,'GIGI','Poli-Gigi.mp3','12345',NULL,NULL,1),
(3,'KB','pelayanan-kb.mp3','12345',4,NULL,1),
(4,'KI','pelayanan-kesehatan-ibu.mp3','12345',2,NULL,1),
(5,'UP24 JAM','pelayanan-up24.mp3','12345',1,NULL,1),
(6,'MTBS','pelayanan-kesehatan-mtbs.mp3','12345',2,NULL,0),
(7,'TB','pelayanan-tb.mp3',NULL,1,NULL,1),
(8,'LANSIA','pelayanan-lansia.mp3',NULL,4,NULL,1),
(9,'GIZI','poli-gizi.mp3','12345',3,NULL,1),
(10,'IMUNISASI','pelayanan-imunisasi.mp3',NULL,2,NULL,1),
(11,'PTM',NULL,NULL,NULL,NULL,0),
(12,'PSIKOLOGI',NULL,NULL,NULL,NULL,1),
(13,'PKPR','pelayanan-kesehatan-pkpr.mp3','12345',2,NULL,0),
(14,'UBM',NULL,NULL,NULL,NULL,1),
(15,'LAVENDER',NULL,NULL,NULL,NULL,1),
(16,'SEROJA','poli-seroja.mp3','123456',0,NULL,0),
(17,'CATIN','pelayanan-catin.mp3',NULL,4,NULL,1),
(18,'HAJI',NULL,NULL,NULL,NULL,1),
(19,'KONSELING',NULL,NULL,NULL,NULL,1),
(20,'ISPA','pelayanan-ispa.mp3',NULL,1,NULL,1),
(21,'RUANG BERSALIN','pelayanan-kesehatan-ruang-bersalin.mp3',NULL,2,NULL,1),
(22,'APOTEK',NULL,NULL,NULL,NULL,1),
(23,'LOKET',NULL,NULL,NULL,NULL,1),
(24,'LAB',NULL,NULL,NULL,NULL,1),
(25,'DEWASA 1','pelayanan-dewasa1.mp3','1234',4,NULL,1),
(26,'DEWASA 2','pelayanan-dewasa2.mp3','1234',4,NULL,1),
(27,'DEWASA 3','pelayanan-dewasa3.mp3','1234',4,NULL,1),
(28,'KA','pelayanan-kesehatan-anak.mp3','1234',2,NULL,0),
(29,'ANAK 1','pelayanan-kesehatan-anak-satu.mp3','1234',2,NULL,1),
(30,'ANAK 2','pelayanan-kesehatan-anak-dua.mp3','1234',2,NULL,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
