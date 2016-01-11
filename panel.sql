-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2016 at 04:34 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `panel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id_user` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `full_name` varchar(40) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_user`, `username`, `password`, `full_name`, `alamat`, `tgl_lahir`, `aktif`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'Alus', '2016-01-07', 1, 1),
(17, 'maulana', '21232f297a57a5a743894a0e4a801fc3', 'Maulana Rahman', 'Bogor', '2016-01-31', 1, 2),
(18, 'master', '21232f297a57a5a743894a0e4a801fc3', 'MAster', 'Bogor', '2016-01-01', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_demografi`
--

CREATE TABLE IF NOT EXISTS `jawaban_demografi` (
`id_jawaban` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pertanyaan_demografi` int(11) NOT NULL,
  `jawaban_demografi` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban_demografi`
--

INSERT INTO `jawaban_demografi` (`id_jawaban`, `id_user`, `id_pertanyaan_demografi`, `jawaban_demografi`) VALUES
(1, 1, 5, '1'),
(2, 1, 6, 'iya'),
(4, 1, 3, '2016-01-22'),
(5, 1, 0, 'kamurang'),
(6, 1, 6, 'asd'),
(7, 1, 4, '1'),
(8, 17, 7, 'jonggol'),
(9, 17, 6, 'asdasdas');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_survei`
--

CREATE TABLE IF NOT EXISTS `jawaban_survei` (
`id_jawaban` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pertanyaan_survei` int(11) NOT NULL,
  `jawaban_survei` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban_survei`
--

INSERT INTO `jawaban_survei` (`id_jawaban`, `id_user`, `id_pertanyaan_survei`, `jawaban_survei`) VALUES
(1, 17, 10, '1'),
(2, 17, 10, '1'),
(3, 17, 4, 'asdasd'),
(4, 17, 3, 'asdasdas'),
(5, 17, 8, '1');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_jawaban`
--

CREATE TABLE IF NOT EXISTS `jenis_jawaban` (
`id_jenis_jawaban` int(11) NOT NULL,
  `jenis_jawaban` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_jawaban`
--

INSERT INTO `jenis_jawaban` (`id_jenis_jawaban`, `jenis_jawaban`) VALUES
(1, 'boolean'),
(2, 'text'),
(3, 'Date'),
(4, 'pilihan');

-- --------------------------------------------------------

--
-- Table structure for table `option_demografi`
--

CREATE TABLE IF NOT EXISTS `option_demografi` (
`id_option` int(11) NOT NULL,
  `id_pertanyaan_demografi` int(11) NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `option_demografi`
--

INSERT INTO `option_demografi` (`id_option`, `id_pertanyaan_demografi`, `option1`, `option2`, `option3`, `option4`) VALUES
(1, 18, 's', 'asd', 'asd', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `panelis`
--

CREATE TABLE IF NOT EXISTS `panelis` (
  `id_panelis` int(11) NOT NULL,
  `id_pertanyaan_demografi` int(11) NOT NULL,
  `jawaban_demografi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panelis`
--

INSERT INTO `panelis` (`id_panelis`, `id_pertanyaan_demografi`, `jawaban_demografi`) VALUES
(1, 1, 'Rizki'),
(1, 2, 'Bogor'),
(1, 3, '01/01/1997'),
(2, 1, 'Budi'),
(2, 2, 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan_demografi`
--

CREATE TABLE IF NOT EXISTS `pertanyaan_demografi` (
`id_pertanyaan_demografi` int(11) NOT NULL,
  `pertanyaan_demografi` varchar(255) NOT NULL,
  `id_jenis_jawaban` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertanyaan_demografi`
--

INSERT INTO `pertanyaan_demografi` (`id_pertanyaan_demografi`, `pertanyaan_demografi`, `id_jenis_jawaban`) VALUES
(1, 'Nama lu', 2),
(2, 'Alamat', 4),
(3, 'Tanggal Lahir', 3),
(4, 'Dumbledore?', 1),
(5, 'Serial apakah ini', 1),
(6, 'Dumbledore kah?', 2),
(7, 'asd ?', 2),
(8, 'as', 4),
(9, 'Maulana?', 1),
(18, 'aaaa', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan_survei`
--

CREATE TABLE IF NOT EXISTS `pertanyaan_survei` (
`id_pertanyaan_survei` int(11) NOT NULL,
  `pertanyaan_survei` varchar(255) NOT NULL,
  `id_jenis_jawaban` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertanyaan_survei`
--

INSERT INTO `pertanyaan_survei` (`id_pertanyaan_survei`, `pertanyaan_survei`, `id_jenis_jawaban`) VALUES
(3, 'Pendapat tentang 1', 2),
(4, 'Pendapat tentang 2', 2),
(5, 'hari apa?', 3),
(8, 'tanggal', 1),
(9, 'tanggal berapa', 3),
(10, 'berapa jumlah', 1),
(11, 'Hari rabu?', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `jawaban_demografi`
--
ALTER TABLE `jawaban_demografi`
 ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `jawaban_survei`
--
ALTER TABLE `jawaban_survei`
 ADD PRIMARY KEY (`id_jawaban`,`id_user`);

--
-- Indexes for table `jenis_jawaban`
--
ALTER TABLE `jenis_jawaban`
 ADD PRIMARY KEY (`id_jenis_jawaban`);

--
-- Indexes for table `option_demografi`
--
ALTER TABLE `option_demografi`
 ADD PRIMARY KEY (`id_option`);

--
-- Indexes for table `panelis`
--
ALTER TABLE `panelis`
 ADD PRIMARY KEY (`id_panelis`,`id_pertanyaan_demografi`), ADD KEY `rel2` (`id_pertanyaan_demografi`), ADD KEY `id_panelis` (`id_panelis`);

--
-- Indexes for table `pertanyaan_demografi`
--
ALTER TABLE `pertanyaan_demografi`
 ADD PRIMARY KEY (`id_pertanyaan_demografi`), ADD KEY `rel4` (`id_jenis_jawaban`);

--
-- Indexes for table `pertanyaan_survei`
--
ALTER TABLE `pertanyaan_survei`
 ADD PRIMARY KEY (`id_pertanyaan_survei`), ADD KEY `rel3` (`id_jenis_jawaban`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `jawaban_demografi`
--
ALTER TABLE `jawaban_demografi`
MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `jawaban_survei`
--
ALTER TABLE `jawaban_survei`
MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jenis_jawaban`
--
ALTER TABLE `jenis_jawaban`
MODIFY `id_jenis_jawaban` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `option_demografi`
--
ALTER TABLE `option_demografi`
MODIFY `id_option` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pertanyaan_demografi`
--
ALTER TABLE `pertanyaan_demografi`
MODIFY `id_pertanyaan_demografi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `pertanyaan_survei`
--
ALTER TABLE `pertanyaan_survei`
MODIFY `id_pertanyaan_survei` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `panelis`
--
ALTER TABLE `panelis`
ADD CONSTRAINT `rel2` FOREIGN KEY (`id_pertanyaan_demografi`) REFERENCES `pertanyaan_demografi` (`id_pertanyaan_demografi`);

--
-- Constraints for table `pertanyaan_demografi`
--
ALTER TABLE `pertanyaan_demografi`
ADD CONSTRAINT `rel4` FOREIGN KEY (`id_jenis_jawaban`) REFERENCES `jenis_jawaban` (`id_jenis_jawaban`);

--
-- Constraints for table `pertanyaan_survei`
--
ALTER TABLE `pertanyaan_survei`
ADD CONSTRAINT `rel3` FOREIGN KEY (`id_jenis_jawaban`) REFERENCES `jenis_jawaban` (`id_jenis_jawaban`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
