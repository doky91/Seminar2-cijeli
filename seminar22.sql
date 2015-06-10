-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 10, 2015 at 10:12 AM
-- Server version: 5.5.35
-- PHP Version: 5.4.4-14+deb7u8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `seminar22`
--

-- --------------------------------------------------------

--
-- Table structure for table `donatori`
--

CREATE TABLE IF NOT EXISTS `donatori` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Lozinka` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PrivatnoPravno` tinyint(1) NOT NULL,
  `Grad` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Anonimnost` tinyint(1) NOT NULL,
  `idUloga` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `idUloga` (`idUloga`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `donatori`
--

INSERT INTO `donatori` (`ID`, `Ime`, `Lozinka`, `PrivatnoPravno`, `Grad`, `Email`, `Anonimnost`, `idUloga`) VALUES
(1, 'da', '123', 0, '', '', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `popisdomova`
--

CREATE TABLE IF NOT EXISTS `popisdomova` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nazivDoma` text COLLATE utf8_unicode_ci NOT NULL,
  `adresa` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `korisnikIme` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `popisdomova`
--

INSERT INTO `popisdomova` (`id`, `nazivDoma`, `adresa`, `email`, `korisnikIme`) VALUES
(1, 'Dom za djecu Zagreb', 'Nazorova 49\r\n10000 Zagreb', 'nekisluzbenimail@net.hr', 'da'),
(2, 'Podružnica "A.G. Matoš"', 'Selska cesta 132\r\n10000 Zagreb', 'nekiistomail@net.hr', ''),
(3, 'Dom za djecu "Maestral" - Split', 'Jurja Šižgorića 4\r\n21000 Split', 'splitskisluzbenimail@net.hr', ''),
(4, 'Dom za djecu "I.Brlić Mažuranić" - Lovran	', 'Omladinska 1\r\n51415 Lovran', 'maillovran@net.hr', ''),
(5, 'Dom za djecu "Sveta Ana" - Vinkovci', 'Anina 2d\r\n32100 Vinkovci', 'mailvinkovci@net.hr', '');

-- --------------------------------------------------------

--
-- Table structure for table `porukeDonacije`
--

CREATE TABLE IF NOT EXISTS `porukeDonacije` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idTeme` int(11) NOT NULL,
  `idVrste` int(11) NOT NULL,
  `tekst` text COLLATE utf8_unicode_ci NOT NULL,
  `korisnikIme` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idTeme` (`idTeme`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `porukeDonacije`
--

INSERT INTO `porukeDonacije` (`id`, `idTeme`, `idVrste`, `tekst`, `korisnikIme`) VALUES
(16, 31, 3, 'Ukoliko je kome u domovima potrebno ', 'kor'),
(20, 37, 2, 'Ako je netko u mogućnosti donirati neka nas kontaktira.', 'da'),
(21, 37, 2, 'I to čim prije', 'da');

-- --------------------------------------------------------

--
-- Table structure for table `svi`
--

CREATE TABLE IF NOT EXISTS `svi` (
  `ime` text COLLATE utf8_bin NOT NULL,
  `lozinka` text COLLATE utf8_bin NOT NULL,
  `uloga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `svi`
--

INSERT INTO `svi` (`ime`, `lozinka`, `uloga`) VALUES
('admin', '202cb962ac59075b964b07152d234b70', 1),
('kor', '202cb962ac59075b964b07152d234b70	', 3),
('da', '202cb962ac59075b964b07152d234b70	', 2);

-- --------------------------------------------------------

--
-- Table structure for table `temeDonacija`
--

CREATE TABLE IF NOT EXISTS `temeDonacija` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idVrsta` int(11) NOT NULL,
  `naslov` text COLLATE utf8_unicode_ci NOT NULL,
  `vrijeme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=39 ;

--
-- Dumping data for table `temeDonacija`
--

INSERT INTO `temeDonacija` (`id`, `idVrsta`, `naslov`, `vrijeme`) VALUES
(31, 3, 'Nudim frizerske usluge domovima iz Zagreba', '2015-06-10 13:26:15'),
(32, 3, 'Nudim popravke vodoinstalacija u Zagrebu', '2015-06-10 13:26:57'),
(33, 3, 'Nudim odjeću za dječaka do 2 godine veoma očuvanu', '2015-06-10 13:27:17'),
(34, 3, 'Nudim donaciju ručka jednom tjedno u Splitu', '2015-06-10 13:37:33'),
(35, 2, 'Trebamo posteljinu u Splitu', '2015-06-10 13:41:15'),
(37, 2, 'Trebamo volontera za učenje engleskog jezika u Splitu', '2015-06-10 13:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `uloge`
--

CREATE TABLE IF NOT EXISTS `uloge` (
  `id_uloga` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_uloga`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `uloge`
--

INSERT INTO `uloge` (`id_uloga`, `naziv`) VALUES
(1, 'admin'),
(2, 'ustanova'),
(3, 'korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE IF NOT EXISTS `vijesti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vrijeme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sadrzaj` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `naslov`, `vrijeme`, `sadrzaj`) VALUES
(7, 'Nova vijest opet', '2015-06-06 18:17:07', 'Ovo je jako zanimljiva vijest'),
(8, 'Uspješne donacije 1', '2015-06-10 13:41:48', 'Neke jako uspješne donacije su ode opisane.');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donatori`
--
ALTER TABLE `donatori`
  ADD CONSTRAINT `donatori_ibfk_1` FOREIGN KEY (`idUloga`) REFERENCES `uloge` (`id_uloga`);

--
-- Constraints for table `porukeDonacije`
--
ALTER TABLE `porukeDonacije`
  ADD CONSTRAINT `porukeDonacije_ibfk_1` FOREIGN KEY (`idTeme`) REFERENCES `temeDonacija` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
