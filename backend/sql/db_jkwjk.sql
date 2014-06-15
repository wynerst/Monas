# Host: localhost  (Version: 5.0.37-community-nt)
# Date: 2014-06-15 08:49:04
# Generator: MySQL-Front 5.3  (Build 4.75)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "belanja"
#

DROP TABLE IF EXISTS `belanja`;
CREATE TABLE `belanja` (
  `id_belanja` int(11) NOT NULL auto_increment,
  `belanja` varchar(45) collate utf8_unicode_ci default NULL,
  `nominal` decimal(20,2) default NULL,
  `tgl_keluar` date default NULL,
  `persetujuan` varchar(45) collate utf8_unicode_ci default NULL,
  `catatan` text collate utf8_unicode_ci,
  PRIMARY KEY  (`id_belanja`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "belanja"
#

/*!40000 ALTER TABLE `belanja` DISABLE KEYS */;
INSERT INTO `belanja` VALUES (1,'Pembuatan Spanduk',1000000.00,'2014-06-01','0','Mockup Belum Ada');
/*!40000 ALTER TABLE `belanja` ENABLE KEYS */;

#
# Structure for table "hak_akses"
#

DROP TABLE IF EXISTS `hak_akses`;
CREATE TABLE `hak_akses` (
  `mst_modul_id_modul` int(11) NOT NULL,
  `user_id_user` int(11) NOT NULL,
  `hak_akses` int(2) default NULL,
  PRIMARY KEY  (`mst_modul_id_modul`,`user_id_user`),
  KEY `fk_hak_akses_user1_idx` (`user_id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "hak_akses"
#

/*!40000 ALTER TABLE `hak_akses` DISABLE KEYS */;
/*!40000 ALTER TABLE `hak_akses` ENABLE KEYS */;

#
# Structure for table "log"
#

DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `id_modul` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `message` varchar(100) collate utf8_unicode_ci default NULL,
  `waktu` timestamp NULL default NULL,
  PRIMARY KEY  (`id_log`,`id_modul`,`id_user`),
  KEY `fk_log_mst_modul1_idx` (`id_modul`),
  KEY `fk_log_user1_idx` (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "log"
#

/*!40000 ALTER TABLE `log` DISABLE KEYS */;
/*!40000 ALTER TABLE `log` ENABLE KEYS */;

#
# Structure for table "mst_bank"
#

DROP TABLE IF EXISTS `mst_bank`;
CREATE TABLE `mst_bank` (
  `id_bank` int(11) NOT NULL auto_increment,
  `nama` varchar(255) collate utf8_unicode_ci NOT NULL,
  `no_akun` varchar(45) collate utf8_unicode_ci default NULL,
  `atas_nama` varchar(45) collate utf8_unicode_ci default NULL,
  `kel_penyumbang_id` int(11) NOT NULL,
  PRIMARY KEY  (`id_bank`,`kel_penyumbang_id`),
  KEY `fk_mst_bank_mst_kel_penyumbang1_idx` (`kel_penyumbang_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "mst_bank"
#

/*!40000 ALTER TABLE `mst_bank` DISABLE KEYS */;
INSERT INTO `mst_bank` VALUES (1,'BRI KC Mall Ambassador','122301000172309','Joko Widodo Jusuf Kalla',1),(2,'MANDIRI ','0700009090956','Joko Widodo Jusuf Kalla',2),(3,'BCA','5015500015','Joko Widodo Jusuf Kalla',1);
/*!40000 ALTER TABLE `mst_bank` ENABLE KEYS */;

#
# Structure for table "mst_kel_penyumbang"
#

DROP TABLE IF EXISTS `mst_kel_penyumbang`;
CREATE TABLE `mst_kel_penyumbang` (
  `kel_penyumbang_id` int(11) NOT NULL auto_increment,
  `nama` varchar(255) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`kel_penyumbang_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "mst_kel_penyumbang"
#

/*!40000 ALTER TABLE `mst_kel_penyumbang` DISABLE KEYS */;
INSERT INTO `mst_kel_penyumbang` VALUES (1,'Pribadi'),(2,'Korporat');
/*!40000 ALTER TABLE `mst_kel_penyumbang` ENABLE KEYS */;

#
# Structure for table "mst_modul"
#

DROP TABLE IF EXISTS `mst_modul`;
CREATE TABLE `mst_modul` (
  `id_modul` int(11) NOT NULL auto_increment,
  `modul` varchar(45) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id_modul`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "mst_modul"
#

/*!40000 ALTER TABLE `mst_modul` DISABLE KEYS */;
/*!40000 ALTER TABLE `mst_modul` ENABLE KEYS */;

#
# Structure for table "penyumbang"
#

DROP TABLE IF EXISTS `penyumbang`;
CREATE TABLE `penyumbang` (
  `id_penyumbang` int(11) NOT NULL auto_increment,
  `nama` varchar(50) collate utf8_unicode_ci NOT NULL,
  `bank_nama` varchar(45) collate utf8_unicode_ci default NULL,
  `bank_akun` varchar(45) collate utf8_unicode_ci default NULL,
  `no_id` varchar(45) collate utf8_unicode_ci default NULL,
  `jenis_id` enum('KTP','SIM','PASSPORT') collate utf8_unicode_ci default NULL,
  `status` int(2) default NULL,
  `alamat` varchar(100) collate utf8_unicode_ci default NULL,
  `kodepos` varchar(10) collate utf8_unicode_ci default NULL,
  `hp` varchar(15) collate utf8_unicode_ci default NULL,
  `email` varchar(45) collate utf8_unicode_ci default NULL,
  `umur` varchar(45) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id_penyumbang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "penyumbang"
#

/*!40000 ALTER TABLE `penyumbang` DISABLE KEYS */;
INSERT INTO `penyumbang` VALUES (1,'Danang Syaifullah','BCA','123-123-123','32100202912381912312','KTP',NULL,'Jakarta','123456','123456','dan.ang@mail.com','32');
/*!40000 ALTER TABLE `penyumbang` ENABLE KEYS */;

#
# Structure for table "settings"
#

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `app_name` varchar(45) collate utf8_unicode_ci default NULL,
  `versi` varchar(45) collate utf8_unicode_ci default NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "settings"
#

/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

#
# Structure for table "sumbangan"
#

DROP TABLE IF EXISTS `sumbangan`;
CREATE TABLE `sumbangan` (
  `id_sumbangan` int(11) NOT NULL auto_increment,
  `nominal` decimal(13,2) default NULL,
  `tgl` date default NULL,
  `id_penyumbang` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `create` timestamp NULL default NULL,
  PRIMARY KEY  (`id_sumbangan`,`id_penyumbang`,`id_bank`),
  KEY `fk_sumbangan_penyumbang_idx` (`id_penyumbang`),
  KEY `fk_sumbangan_mst_bank1_idx` (`id_bank`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "sumbangan"
#

/*!40000 ALTER TABLE `sumbangan` DISABLE KEYS */;
/*!40000 ALTER TABLE `sumbangan` ENABLE KEYS */;

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL auto_increment,
  `username` varchar(16) collate utf8_unicode_ci NOT NULL,
  `nama` varchar(45) collate utf8_unicode_ci default NULL,
  `email` varchar(255) collate utf8_unicode_ci default NULL,
  `password` varchar(32) collate utf8_unicode_ci NOT NULL,
  `create_time` timestamp NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id_user`,`username`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "user"
#

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
