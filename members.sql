-- phpMyAdmin SQL Dump
-- version 4.2.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Loomise aeg: Dets 11, 2014 kell 06:23 PM
-- Serveri versioon: 5.5.40-0ubuntu1
-- PHP versioon: 5.5.12-2ubuntu4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Andmebaas: `test`
--

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `members`
--

CREATE TABLE IF NOT EXISTS `members` (
`id` int(11) NOT NULL,
  `name` varchar(25) COLLATE utf8_estonian_ci NOT NULL,
  `surname` varchar(25) COLLATE utf8_estonian_ci NOT NULL,
  `email` varchar(25) COLLATE utf8_estonian_ci NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(6) COLLATE utf8_estonian_ci NOT NULL,
  `country` varchar(35) COLLATE utf8_estonian_ci NOT NULL,
  `city` varchar(25) COLLATE utf8_estonian_ci NOT NULL,
  `postcode` int(10) NOT NULL,
  `date_registered` date NOT NULL,
  `password` varchar(25) COLLATE utf8_estonian_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci AUTO_INCREMENT=0 ;

--
-- Indeksid tõmmistatud tabelitele
--

--
-- Indeksid tabelile `members`
--
ALTER TABLE `members`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT tõmmistatud tabelitele
--

--
-- AUTO_INCREMENT tabelile `members`
--
ALTER TABLE `members`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=0;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
