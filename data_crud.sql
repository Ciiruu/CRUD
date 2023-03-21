-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 21, 2023 at 03:53 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpcrud`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_crud`
--

DROP TABLE IF EXISTS `data_crud`;
CREATE TABLE IF NOT EXISTS `data_crud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengirim` varchar(50) NOT NULL,
  `alamat_pg` varchar(50) NOT NULL,
  `nama_penerima` varchar(30) NOT NULL,
  `alamat_pn` varchar(50) NOT NULL,
  `berat_barang` varchar(255) NOT NULL,
  `harga_barang` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=793 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_crud`
--

INSERT INTO `data_crud` (`id`, `nama_pengirim`, `alamat_pg`, `nama_penerima`, `alamat_pn`, `berat_barang`, `harga_barang`) VALUES
(13, 'gunawan', 'dfashgasdg', 'hjkhgj', 'widosari', '84653148', '21349812'),
(10, 'ricardho', 'riau', 'titin', 'widosari', '0.3', '1000000'),
(792, 'ale', 'jateng', 'tek', 'riau', 'Kg 5', 'Rp. 1000000'),
(111, 'kmfgibjgfi', 'dfashgasdg', 'hjkhgj', 'widosari', '500', '2000000'),
(790, 'ricad', 'riau', 'osmdglhaei', 'salatiga', '0.3', '1000000');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
