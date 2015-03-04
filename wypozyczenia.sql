-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2015 at 05:02 PM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `1`
--

-- --------------------------------------------------------

-- Table structure for table `film`
--

CREATE TABLE IF NOT EXISTS `film` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `tytul` varchar(100) NOT NULL,
  `gatunek` varchar(100) NOT NULL,
  `okladka` varchar(100) NOT NULL,
  `opis` text NOT NULL,
  `cena_wypozyczenia` int(3) NOT NULL,
  `url` varchar(500) NOT NULL,
  `rezerwacja` int(1) NOT NULL,
  `data_wygasniecia_rezerwacji` date NOT NULL,
  `aktorzy` varchar(500) NOT NULL,
  `wypozyczen_ilosc` int(4) NOT NULL,
  UNIQUE KEY `tytul` (`tytul`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--

--
-- Table structure for table `gatunek`
--

CREATE TABLE IF NOT EXISTS `gatunek` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `gatunek` varchar(100) NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--


--
-- Table structure for table `recenzja`
--

CREATE TABLE IF NOT EXISTS `recenzja` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `id_filmu` int(4) NOT NULL,
  `recenzja` varchar(1200) NOT NULL,
  `dodana_przez_usera` varchar(100) NOT NULL,
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `imie` varchar(20) CHARACTER SET latin2 NOT NULL,
  `nazwisko` varchar(40) CHARACTER SET latin2 NOT NULL,
  `mail` varchar(40) CHARACTER SET latin2 NOT NULL,
  `haslo` varchar(40) CHARACTER SET latin2 NOT NULL,
  `login` varchar(30) CHARACTER SET latin2 NOT NULL,
  `data_rej` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=240 ;

--


--
-- Table structure for table `wypozyczenia`
--

CREATE TABLE IF NOT EXISTS `wypozyczenia` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_filmu` int(5) NOT NULL,
  `id_usera` varchar(70) NOT NULL,
  `data_wyp` date NOT NULL,
  `status_platnosci` varchar(50) NOT NULL,
  `data_zwrotu` date NOT NULL,
  `status_ogolny` varchar(50) NOT NULL,
  UNIQUE KEY `id_3` (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;






