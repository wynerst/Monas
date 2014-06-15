-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 15, 2014 at 09:46 PM
-- Server version: 5.5.37-0ubuntu0.12.04.1
-- PHP Version: 5.3.10-1ubuntu3.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_jkwjk`
--

-- --------------------------------------------------------

--
-- Table structure for table `belanja`
--

CREATE TABLE IF NOT EXISTS `belanja` (
  `id_belanja` int(11) NOT NULL AUTO_INCREMENT,
  `belanja` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nominal` decimal(20,2) DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `persetujuan` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `catatan` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id_belanja`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int(11) NOT NULL AUTO_INCREMENT,
  `berita` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `sumber` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tanggal` date NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id_chat` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `pesan` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_chat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `group_user`
--

CREATE TABLE IF NOT EXISTS `group_user` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE IF NOT EXISTS `hak_akses` (
  `id_modul` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `hak_akses` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_modul`,`id_group`),
  KEY `fk_hak_akses_user1_idx` (`id_group`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id_log` int(11) NOT NULL,
  `id_modul` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `message` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `waktu` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_log`,`id_modul`,`id_user`),
  KEY `fk_log_mst_modul1_idx` (`id_modul`),
  KEY `fk_log_user1_idx` (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mst_bank`
--

CREATE TABLE IF NOT EXISTS `mst_bank` (
  `id_bank` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_akun` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `atas_nama` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kel_penyumbang_id` int(11) NOT NULL,
  PRIMARY KEY (`id_bank`,`kel_penyumbang_id`),
  KEY `fk_mst_bank_mst_kel_penyumbang1_idx` (`kel_penyumbang_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `mst_kel_penyumbang`
--

CREATE TABLE IF NOT EXISTS `mst_kel_penyumbang` (
  `kel_penyumbang_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`kel_penyumbang_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `mst_modul`
--

CREATE TABLE IF NOT EXISTS `mst_modul` (
  `id_modul` int(11) NOT NULL AUTO_INCREMENT,
  `modul` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_modul`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `penyumbang`
--

CREATE TABLE IF NOT EXISTS `penyumbang` (
  `id_penyumbang` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bank_nama` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_akun` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jenis_id` enum('KTP','SIM','PASSPORT') COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `kontak` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kodepos` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hp` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `npwp` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `umur` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_penyumbang`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `app_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `versi` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sumbangan`
--

CREATE TABLE IF NOT EXISTS `sumbangan` (
  `id_sumbangan` int(11) NOT NULL AUTO_INCREMENT,
  `nominal` decimal(13,2) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `id_penyumbang` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `create` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_sumbangan`,`id_penyumbang`,`id_bank`),
  KEY `fk_sumbangan_penyumbang_idx` (`id_penyumbang`),
  KEY `fk_sumbangan_mst_bank1_idx` (`id_bank`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`,`username`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
