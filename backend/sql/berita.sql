# Host: localhost  (Version: 5.0.37-community-nt)
# Date: 2014-06-26 10:58:58
# Generator: MySQL-Front 5.3  (Build 4.75)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "berita"
#

DROP TABLE IF EXISTS `berita`;
CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL auto_increment,
  `id_user` int(11) NOT NULL,
  `berita` text,
  `sumber` varchar(100) default NULL,
  `url` varchar(200) default NULL,
  `create` timestamp NULL default NULL,
  `judul` varchar(255) default 'Tanpa Judul',
  PRIMARY KEY  (`id_berita`),
  KEY `fk_berita_user1_idx` (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "berita"
#

ALTER TABLE `user` ADD `forgot_key` VARCHAR( 50 ) NULL ;

/*!40000 ALTER TABLE `berita` DISABLE KEYS */;
/*!40000 ALTER TABLE `berita` ENABLE KEYS */;
