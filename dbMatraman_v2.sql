
USE `ci3db`;

/*Table structure for table `aauth_group_to_group` */

DROP TABLE IF EXISTS `aauth_group_to_group`;

CREATE TABLE `aauth_group_to_group` (
  `group_id` int unsigned NOT NULL,
  `subgroup_id` int unsigned NOT NULL,
  PRIMARY KEY (`group_id`,`subgroup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

/*Data for the table `aauth_group_to_group` */

/*Table structure for table `aauth_groups` */

DROP TABLE IF EXISTS `aauth_groups`;

CREATE TABLE `aauth_groups` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `definition` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

/*Data for the table `aauth_groups` */

insert  into `aauth_groups`(`id`,`name`,`definition`) values 
(1,'Admin','Super Admin Group'),
(2,'Public','Public Access Group'),
(3,'Default','Default Access Group');

/*Table structure for table `aauth_login_attempts` */

DROP TABLE IF EXISTS `aauth_login_attempts`;

CREATE TABLE `aauth_login_attempts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(39) DEFAULT '0',
  `timestamp` datetime DEFAULT NULL,
  `login_attempts` tinyint DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `aauth_login_attempts` */

insert  into `aauth_login_attempts`(`id`,`ip_address`,`timestamp`,`login_attempts`) values 
(1,'192.168.101.178','2023-11-09 02:13:15',1),
(3,'192.168.101.134','2024-10-08 08:41:07',3),
(4,'192.168.101.134','2024-10-08 09:18:54',1);

/*Table structure for table `aauth_perm_to_group` */

DROP TABLE IF EXISTS `aauth_perm_to_group`;

CREATE TABLE `aauth_perm_to_group` (
  `perm_id` int unsigned NOT NULL,
  `group_id` int unsigned NOT NULL,
  PRIMARY KEY (`perm_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

/*Data for the table `aauth_perm_to_group` */

/*Table structure for table `aauth_perm_to_user` */

DROP TABLE IF EXISTS `aauth_perm_to_user`;

CREATE TABLE `aauth_perm_to_user` (
  `perm_id` int unsigned NOT NULL,
  `user_id` int unsigned NOT NULL,
  PRIMARY KEY (`perm_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

/*Data for the table `aauth_perm_to_user` */

/*Table structure for table `aauth_perms` */

DROP TABLE IF EXISTS `aauth_perms`;

CREATE TABLE `aauth_perms` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `definition` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

/*Data for the table `aauth_perms` */

/*Table structure for table `aauth_pms` */

DROP TABLE IF EXISTS `aauth_pms`;

CREATE TABLE `aauth_pms` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `sender_id` int unsigned NOT NULL,
  `receiver_id` int unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text,
  `date_sent` datetime DEFAULT NULL,
  `date_read` datetime DEFAULT NULL,
  `pm_deleted_sender` int DEFAULT NULL,
  `pm_deleted_receiver` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `full_index` (`id`,`sender_id`,`receiver_id`,`date_read`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

/*Data for the table `aauth_pms` */

/*Table structure for table `aauth_user_to_group` */

DROP TABLE IF EXISTS `aauth_user_to_group`;

CREATE TABLE `aauth_user_to_group` (
  `user_id` int unsigned NOT NULL,
  `group_id` int unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

/*Data for the table `aauth_user_to_group` */

insert  into `aauth_user_to_group`(`user_id`,`group_id`) values 
(1,1),
(1,3),
(2,3),
(3,3);

/*Table structure for table `aauth_user_variables` */

DROP TABLE IF EXISTS `aauth_user_variables`;

CREATE TABLE `aauth_user_variables` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `data_key` varchar(100) NOT NULL,
  `value` text,
  PRIMARY KEY (`id`),
  KEY `user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

/*Data for the table `aauth_user_variables` */

/*Table structure for table `aauth_users` */

DROP TABLE IF EXISTS `aauth_users`;

CREATE TABLE `aauth_users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `banned` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `forgot_exp` text,
  `remember_time` datetime DEFAULT NULL,
  `remember_exp` text,
  `verification_code` text,
  `totp_secret` varchar(16) DEFAULT NULL,
  `ip_address` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

/*Data for the table `aauth_users` */

insert  into `aauth_users`(`id`,`email`,`pass`,`username`,`banned`,`last_login`,`last_activity`,`date_created`,`forgot_exp`,`remember_time`,`remember_exp`,`verification_code`,`totp_secret`,`ip_address`) values 
(1,'admin@example.com','dd5073c93fb477a167fd69072e95455834acd93df8fed41a2c468c45b394bfe3','Admin',0,'2025-10-13 02:14:06','2025-10-13 02:14:06',NULL,NULL,NULL,NULL,NULL,NULL,'::1'),
(2,'rizal@admin.com','85331630fca2b67c234b6b57e7affc9403d62cf186989c71675956e3ccc2a20d','rizal',0,'2023-07-06 13:59:31','2023-07-06 13:59:31','2023-06-21 12:01:15',NULL,NULL,NULL,NULL,NULL,'::1'),
(3,'haji@gmail.com','fbbd0093534d38e9af8acb9e3264b457c7250cef7135c9462ba0f19385b25a12','haji',0,'2023-07-20 11:41:14','2023-07-20 11:41:14','2023-07-20 11:26:54',NULL,NULL,NULL,NULL,NULL,'::1');

/*Table structure for table `antrian` */

DROP TABLE IF EXISTS `antrian`;

CREATE TABLE `antrian` (
  `id` int NOT NULL AUTO_INCREMENT,
  `no_antrian` int DEFAULT NULL,
  `poli` varchar(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `antrian` */

insert  into `antrian`(`id`,`no_antrian`,`poli`,`tanggal`) values 
(1,1,'Poli-Psikiatri.mp3','2022-10-31'),
(2,1,'Poli-Gizi.mp3','2022-10-31'),
(3,2,'Poli-Gizi.mp3','2022-10-31'),
(4,1,'Poli-PKPR.mp3','2022-10-31');

/*Table structure for table `antrian_farmasi` */

DROP TABLE IF EXISTS `antrian_farmasi`;

CREATE TABLE `antrian_farmasi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `no_antrian` int DEFAULT NULL,
  `prioritas` varchar(1) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `panggil` varchar(1) DEFAULT NULL,
  `id_poli` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `antrian_farmasi` */

insert  into `antrian_farmasi`(`id`,`no_antrian`,`prioritas`,`tanggal`,`panggil`,`id_poli`,`created_at`) values 
(1,1,'1','2025-10-14','0',2,'2025-10-14 13:44:49'),
(2,2,'1','2025-10-14','0',2,'2025-10-14 13:44:49'),
(3,3,'1','2025-10-14','0',2,'2025-10-14 13:58:10');

/*Table structure for table `antrian_poli` */

DROP TABLE IF EXISTS `antrian_poli`;

CREATE TABLE `antrian_poli` (
  `id_antrian` int NOT NULL AUTO_INCREMENT,
  `no_antrian` int DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `poli` int DEFAULT NULL,
  `prefix_dokter` varchar(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) DEFAULT NULL,
  `is_panggil` int DEFAULT NULL,
  PRIMARY KEY (`id_antrian`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

/*Data for the table `antrian_poli` */

insert  into `antrian_poli`(`id_antrian`,`no_antrian`,`tanggal`,`poli`,`prefix_dokter`,`created_at`,`status`,`is_panggil`) values 
(1,1,'2025-10-07',5,'A','2025-10-07 09:46:02','next',1),
(2,2,'2025-10-07',5,'A','2025-10-07 09:46:12','next',1),
(3,2,'2025-10-07',5,'A','2025-10-07 09:46:20','manual',NULL),
(4,3,'2025-10-07',5,'A','2025-10-07 09:46:30','manual',NULL),
(5,5,'2025-10-07',5,'A','2025-10-07 09:46:40','manual',NULL),
(6,6,'2025-10-07',5,'A','2025-10-07 14:48:47','manual',NULL),
(7,0,'2025-10-07',5,'A','2025-10-07 15:23:28','manual',NULL),
(8,0,'2025-10-07',5,'A','2025-10-07 15:26:11','manual',NULL),
(9,0,'2025-10-07',5,'A','2025-10-07 15:27:19','manual',NULL),
(10,0,'2025-10-07',5,'A','2025-10-07 15:28:45','manual',NULL),
(11,0,'2025-10-07',5,'A','2025-10-07 15:29:14','manual',NULL),
(12,1,'2025-10-07',5,'A','2025-10-07 15:34:29','next',1),
(13,1,'2025-10-07',5,'A','2025-10-07 15:34:49','reply',NULL),
(14,2,'2025-10-07',5,'A','2025-10-07 15:35:09','next',1),
(15,2,'2025-10-07',5,'A','2025-10-07 15:35:24','reply',NULL),
(16,3,'2025-10-07',5,'A','2025-10-07 15:41:47','next',1),
(17,0,'2025-10-07',5,'A','2025-10-07 15:43:21','manual',1),
(18,0,'2025-10-07',5,'A','2025-10-07 15:43:51','manual',1),
(19,0,'2025-10-07',5,'A','2025-10-07 15:47:47','panggil_na',1),
(20,0,'2025-10-07',5,'A','2025-10-07 15:49:58','pgl_nama',1),
(21,0,'2025-10-07',5,'A','2025-10-07 15:50:43','pgl_nama',1),
(22,0,'2025-10-07',5,'A','2025-10-07 15:50:43','pgl_nama',1),
(23,0,'2025-10-07',5,'A','2025-10-07 15:59:06','pgl_nama',0),
(24,0,'2025-10-07',5,'A','2025-10-07 16:02:15','pgl_nama',0),
(25,1,'2025-10-08',5,'A','2025-10-08 10:37:37','next',1),
(26,1,'2025-11-04',25,'A','2025-11-04 10:34:55','next',0),
(27,1,'2025-11-05',31,'A','2025-11-05 12:53:46','next',1),
(28,2,'2025-11-05',31,'A','2025-11-05 12:54:25','next',1),
(29,2,'2025-11-05',31,'A','2025-11-05 12:56:54','reply',NULL),
(30,3,'2025-11-05',31,'A','2025-11-05 12:57:33','next',1),
(31,3,'2025-11-05',31,'A','2025-11-05 12:57:40','reply',NULL),
(32,1,'2025-11-05',32,'A','2025-11-05 12:58:18','next',0);

/*Table structure for table `poli` */

DROP TABLE IF EXISTS `poli`;

CREATE TABLE `poli` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_poli` varchar(50) DEFAULT NULL,
  `alias` varchar(50) DEFAULT NULL,
  `file_panggilan` varchar(50) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `lantai` int DEFAULT NULL,
  `urut` int DEFAULT NULL,
  `prefix_poli` varchar(10) DEFAULT NULL,
  `is_active` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

/*Data for the table `poli` */

insert  into `poli`(`id`,`nama_poli`,`alias`,`file_panggilan`,`pass`,`lantai`,`urut`,`prefix_poli`,`is_active`) values 
(1,'UMUM',NULL,'pelayanan-umum','12345',0,NULL,'A',0),
(2,'GIGI','gigi','Poli-Gigi','12345',NULL,NULL,'B',1),
(3,'KB','kb','pelayanan-kb','12345',4,NULL,'C',1),
(4,'KI','ki','pelayanan-kesehatan-ibu','12345',2,NULL,'D',1),
(5,'U P 24 JAM','up24jam','pelayanan-up24','12345',1,NULL,'E',1),
(6,'MTBS',NULL,'pelayanan-kesehatan-mtbs','12345',2,NULL,'F',0),
(7,'TB','tb','pelayanan-tb',NULL,1,NULL,'G',1),
(8,'LANSIA','lansia','pelayanan-lansia',NULL,4,NULL,'H',1),
(9,'GIZI','gizi','poli-gizi','12345',3,NULL,'I',1),
(10,'IMUNISASI','imunisasi','pelayanan-imunisasi',NULL,2,NULL,'K',1),
(11,'PTM',NULL,NULL,NULL,NULL,NULL,'P',0),
(12,'PSIKOLOGI','psikologi',NULL,NULL,NULL,NULL,'M',1),
(13,'PKPR',NULL,'pelayanan-kesehatan-pkpr','12345',2,NULL,'Q',0),
(14,'UBM','ubm',NULL,NULL,NULL,NULL,'S',1),
(15,'LAVENDER','lavender',NULL,NULL,NULL,NULL,'T',1),
(16,'SEROJA',NULL,'poli-seroja','123456',0,NULL,'U',0),
(17,'CATIN','catin','pelayanan-catin',NULL,4,NULL,'AB',1),
(18,'HAJI','haji',NULL,NULL,NULL,NULL,'AC',1),
(19,'KONSELING','konseling',NULL,NULL,NULL,NULL,'Z',1),
(20,'ISPA','ispa','pelayanan-ispa',NULL,1,NULL,'AD',1),
(21,'RUANG BERSALIN','rb','pelayanan-kesehatan-ruang-bersalin',NULL,2,NULL,'AP',0),
(22,'APOTEK','apotek',NULL,NULL,NULL,NULL,NULL,1),
(23,'LOKET','loket',NULL,NULL,NULL,NULL,NULL,1),
(24,'LAB','lab',NULL,NULL,NULL,NULL,NULL,1),
(25,'DEWASA 1','dewasa1','pelayanan-dewasa1','1234',4,NULL,'AO',1),
(26,'DEWASA 2','dewasa2','pelayanan-dewasa2','1234',4,NULL,'AO',1),
(27,'DEWASA 3','dewasa3','pelayanan-dewasa3','1234',4,NULL,'AO',1),
(28,'KA',NULL,'pelayanan-kesehatan-anak','1234',2,NULL,NULL,0),
(29,'ANAK 1','anak1','pelayanan-kesehatan-anak-satu','1234',2,NULL,'AN',1),
(30,'ANAK 2','anak2','pelayanan-kesehatan-anak-dua','1234',2,NULL,'AN',1),
(31,'RUANG 1','ruang1','ruang1','123',1,NULL,'A',1),
(32,'RUANG 2','ruang2','ruang2','123',1,NULL,'B',1);

/*Table structure for table `skp` */

DROP TABLE IF EXISTS `skp`;

CREATE TABLE `skp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `id_poli` int DEFAULT NULL,
  `id_status` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=159652 DEFAULT CHARSET=latin1;

/*Data for the table `skp` */

insert  into `skp`(`id`,`tanggal`,`id_poli`,`id_status`,`created_at`) values 
(1,'2023-03-27',1,1,'2023-03-31 11:08:06'),
(2,'2023-03-27',5,1,'2023-03-31 11:08:06'),
(3,'2023-03-27',5,1,'2023-03-31 11:08:06'),
(4,'2023-03-27',5,3,'2023-03-31 11:08:06'),
(5,'2023-03-27',5,2,'2023-03-31 11:08:06'),
(6,'2023-03-27',5,1,'2023-03-31 11:08:06'),
(7,'2023-03-27',5,1,'2023-03-31 11:08:06'),
(8,'2023-03-27',5,1,'2023-03-31 11:08:06');

/*Table structure for table `skp_summary` */

DROP TABLE IF EXISTS `skp_summary`;

CREATE TABLE `skp_summary` (
  `id_skp_sum` int NOT NULL AUTO_INCREMENT,
  `tahun` varchar(4) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `jan` float DEFAULT NULL,
  `feb` float DEFAULT NULL,
  `mar` float DEFAULT NULL,
  `apr` float DEFAULT NULL,
  `mei` float DEFAULT NULL,
  `jun` float DEFAULT NULL,
  `jul` float DEFAULT NULL,
  `agu` float DEFAULT NULL,
  `sep` float DEFAULT NULL,
  `okt` float DEFAULT NULL,
  `nov` float DEFAULT NULL,
  `des` float DEFAULT NULL,
  PRIMARY KEY (`id_skp_sum`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `skp_summary` */

insert  into `skp_summary`(`id_skp_sum`,`tahun`,`jenis`,`jan`,`feb`,`mar`,`apr`,`mei`,`jun`,`jul`,`agu`,`sep`,`okt`,`nov`,`des`) values 
(4,'2023','Target',90,90,90,90,90,90,90,90,90,90,90,90),
(5,'2023','Realisasi',0,0,96.8492,97.1241,97.1581,97.392,97.2362,97.4113,97.0876,97.9522,97.2924,97.2904),
(6,'2023','Capaian',0,0,107.61,107.916,107.953,108.213,108.04,108.235,107.875,108.836,108.103,108.1),
(7,'2024','Target',90,90,90,90,90,90,90,90,NULL,NULL,NULL,NULL),
(8,'2024','Realisasi',97.0806,96.2206,95.9429,97.124,96.8152,96.8541,97.3297,97.6444,NULL,NULL,NULL,NULL),
(9,'2024','Capaian',107.867,106.912,106.603,107.916,107.572,107.616,108.144,108.494,NULL,NULL,NULL,NULL);

/*Table structure for table `speaker` */

DROP TABLE IF EXISTS `speaker`;

CREATE TABLE `speaker` (
  `id_speaker` int NOT NULL AUTO_INCREMENT,
  `nama_event` varchar(50) DEFAULT NULL,
  `audio` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_speaker`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `speaker` */

insert  into `speaker`(`id_speaker`,`nama_event`,`audio`) values 
(1,'Menyanyikan Indonesia Raya','60-indonesia_raya_dan_lagu_vocal.mp3'),
(2,'Membaca Text Pancasila','60-pancasila.mp3'),
(3,'Senam Peregangan','Instruksi_Peregangan_Kemenkes.mp3'),
(4,'Pengumuman ILP','pengumuman-ilp.mp3'),
(5,'Pengumuman UP24','pengumuman-up24.mp3'),
(6,'Pengingat Sholat Dzuhur','pengingat-sholat-dzuhur.mp3'),
(7,'Pengingat Sholat Jumat','pengingat_sholat_jumat.mp3'),
(8,'Pengingat Sholat Ashar','pengingat-sholat-ashar.mp3'),
(9,'Pengingat Sholat Maghrib','pengingat-sholat-maghrib.mp3'),
(10,'Pengingat Sholat Isya','pengingat-sholat-isya.mp3'),
(11,'Pengingat Sholat Subuh','pengingat-sholat-subuh.mp3');

/*Table structure for table `speaker_detail` */

DROP TABLE IF EXISTS `speaker_detail`;

CREATE TABLE `speaker_detail` (
  `id_speaker_detail` int NOT NULL AUTO_INCREMENT,
  `id_speaker` int DEFAULT NULL,
  `hari` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jam` time DEFAULT NULL,
  PRIMARY KEY (`id_speaker_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `speaker_detail` */

insert  into `speaker_detail`(`id_speaker_detail`,`id_speaker`,`hari`,`jam`) values 
(1,1,'Selasa,Kamis,Jumat','16:27:00'),
(2,2,'Rabu,Jumat','10:00:00'),
(3,3,'Senin,Selasa,Rabu,Kamis,Jumat','15:45:20'),
(4,3,'Senin,Selasa,Rabu,Kamis,Jumat','14:00:00'),
(5,4,'Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu','15:00:00'),
(6,4,'Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu','09:00:00'),
(7,4,'Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu','11:00:00'),
(8,4,'Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu','13:00:00'),
(9,4,'Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu','14:10:00'),
(10,5,'Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu','14:30:00'),
(11,5,'Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu','15:30:00'),
(12,5,'Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu','16:30:00'),
(13,5,'Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu','17:30:00'),
(14,5,'Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu','18:30:00'),
(15,5,'Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu','19:30:00'),
(16,5,'Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu','20:30:00'),
(17,5,'Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu','21:30:00'),
(18,5,'Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu','22:30:00'),
(19,6,'Senin,Selasa,Rabu,Kamis,Sabtu,Minggu','11:30:00'),
(20,7,'Jumat','11:30:00'),
(21,8,'Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu','14:50:00'),
(22,9,'Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu','17:45:00'),
(23,10,'Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu','18:55:00'),
(24,11,'Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu','04:05:00');

/*Table structure for table `status` */

DROP TABLE IF EXISTS `status`;

CREATE TABLE `status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `status` */

insert  into `status`(`id`,`status`) values 
(1,'Sangat Puas'),
(2,'Puas'),
(3,'Cukup'),
(4,'Kurang');

/*Table structure for table `tanggal` */

DROP TABLE IF EXISTS `tanggal`;

CREATE TABLE `tanggal` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2001 DEFAULT CHARSET=latin1;

/*Data for the table `tanggal` */

insert  into `tanggal`(`id`,`tanggal`) values 
(1,'2022-01-02'),
(2,'2022-01-03'),
(3,'2022-01-04'),
(4,'2022-01-05'),
(5,'2022-01-06'),
(6,'2022-01-07'),
(7,'2022-01-08');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`password`,`last_login`) values 
(2,'rizal','c6318323cc5693ce1f8d220cc9a5030e','2023-09-13 08:48:42'),
(3,'husnul','a6870fd395279883571ee16d0c8a0960','2023-03-16 08:30:26'),
(4,'yoppa','a6870fd395279883571ee16d0c8a0960','2023-09-12 08:15:05');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
