-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 31 okt 2016 om 11:32
-- Serverversie: 5.6.17
-- PHP-versie: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `am1b_2016_loginregistration_v2`
--
CREATE DATABASE IF NOT EXISTS `am1b_2016_loginregistration_v2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `am1b_2016_loginregistration_v2`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(200) NOT NULL,
  `infix` varchar(50) NOT NULL,
  `lastname` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(40) NOT NULL,
  `activate` enum('true','false') NOT NULL DEFAULT 'false',
  `userrole` enum('root','admin','customer') NOT NULL DEFAULT 'customer',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `firstname`, `infix`, `lastname`, `email`, `password`, `activate`, `userrole`) VALUES
(1, 'Arjan', 'de', 'Ruijter', 'adruijter@gmail.com', '906072001efddf3e11e6d2b5782f4777fe038739', 'true', 'customer'),
(2, 'Harrie', 'de', 'Bok', 'bokje@gmail.com', '906072001efddf3e11e6d2b5782f4777fe038739', 'true', 'root'),
(3, 'Customer', 'de', 'Customer', 'customer@gmail.com', '906072001efddf3e11e6d2b5782f4777fe038739', 'true', 'customer'),
(4, 'Admin', 'de', 'Admin', 'admin@gmail.com', '906072001efddf3e11e6d2b5782f4777fe038739', 'true', 'admin'),
(5, 'Root', 'de', 'Root', 'root@gmail.com', '906072001efddf3e11e6d2b5782f4777fe038739', 'true', 'root');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
