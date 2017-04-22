-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 05, 2017 alle 00:20
-- Versione del server: 5.5.54-0+deb8u1
-- PHP Version: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hotspot_backend`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
`id` int(11) NOT NULL,
  `device` varchar(17) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `ap` varchar(17) NOT NULL,
  `lastlog` datetime NOT NULL,
  `expire` datetime NOT NULL,
  `remove` datetime NOT NULL,
  `browser` varchar(254) NOT NULL,
  `os` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `sessions`
--

INSERT INTO `sessions` (`id`, `device`, `ip`, `ap`, `lastlog`, `expire`, `remove`, `browser`, `os`, `user_id`) VALUES
(5, 'ee:ee:ee:ee:ee', '192.168.1.1', '192.168.2.65', '2017-03-09 10:00:00', '2017-03-23 10:04:00', '2018-06-26 00:12:00', 'Firefox', 'Linux', 1),
(7, 'ex:ed:ek:eu:ef', '192.168.1.3', '192.168.2.65', '2017-04-09 11:06:38', '2017-04-09 12:06:38', '2017-04-09 16:06:38', 'Safari', 'iOS', 2),
(8, 'ax:ad:ak:au:af', '192.168.1.4', '192.168.2.65', '2017-04-09 09:12:00', '2017-04-09 10:12:00', '2017-04-09 13:12:00', 'Firefox', 'Windows 7', 2),
(9, 'dd:de:de:de:de', '192.168.1.7', '192.168.2.65', '2017-04-09 15:00:00', '2017-04-09 16:00:00', '2017-04-09 20:00:00', 'Chrome', 'Mac OS X', 2),
(10, 'ae:ec:ee:fe:de', '192.168.1.12', '192.168.2.65', '2017-04-09 16:12:30', '2017-04-09 17:12:30', '2017-04-09 20:12:30', 'Chrome', 'Linux', 2),
(11, 'ee:aa:xe:ce:we', '192.168.1.15', '192.168.2.65', '2017-04-09 17:35:00', '2017-04-09 18:35:00', '2017-04-09 22:35:00', 'Chrome', 'Windows 7', 2),
(12, 'eb:bb:xe:cb:we', '192.168.1.16', '192.168.2.65', '2017-04-09 17:38:00', '2017-04-09 18:38:00', '2017-04-09 22:38:00', 'Chrome', 'iOS', 2),
(14, 'cb:bc:xe:cb:we', '192.168.1.18', '192.168.2.65', '2017-04-09 14:32:00', '2017-04-09 15:32:00', '2017-04-09 19:38:00', 'Safari', 'iOS', 2),
(15, 'ab:ac:ae:cb:we', '192.168.1.20', '192.168.2.65', '2017-04-10 15:32:00', '2017-04-10 16:32:00', '2017-04-10 20:32:00', 'Safari', 'iOS', 2),
(16, 'ab:ac:ae:cb:cc', '192.168.1.21', '192.168.2.65', '2017-04-10 15:32:15', '2017-04-10 16:32:15', '2017-04-10 20:32:15', 'Safari', 'Windows 7', 2),
(17, 'xx:xf:xs:av:we', '192.168.1.22', '192.168.2.65', '2017-04-10 15:35:00', '2017-04-10 16:35:00', '2017-04-10 20:35:00', 'Firefox', 'Linux', 2),
(19, 'ww:ed:rs:av:we', '192.168.1.23', '192.168.2.65', '2017-04-10 19:35:00', '2017-04-10 20:35:00', '2017-04-11 00:35:00', 'Chrome', 'Linux', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `device` (`device`), ADD KEY `user_key` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `sessions`
--
ALTER TABLE `sessions`
ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
