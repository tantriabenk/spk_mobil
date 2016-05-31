-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 31 Mei 2016 pada 18.10
-- Versi Server: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cars`
--

CREATE TABLE IF NOT EXISTS `cars` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT,
  `car_name` varchar(45) NOT NULL,
  `seat_cap` int(11) NOT NULL,
  `engine_cap` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `color_id` int(10) NOT NULL,
  `price_high` int(11) NOT NULL,
  `price_low` int(11) NOT NULL,
  `models_id` int(11) NOT NULL,
  `fuels_id` int(11) NOT NULL,
  `transmissions_id` int(11) NOT NULL,
  PRIMARY KEY (`car_id`,`models_id`,`fuels_id`,`transmissions_id`),
  KEY `fk_cars_models1_idx` (`models_id`),
  KEY `fk_cars_fuels1_idx` (`fuels_id`),
  KEY `fk_cars_transmissions1_idx` (`transmissions_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `cars`
--

INSERT INTO `cars` (`car_id`, `car_name`, `seat_cap`, `engine_cap`, `year`, `color_id`, `price_high`, `price_low`, `models_id`, `fuels_id`, `transmissions_id`) VALUES
(1, 'Test1', 1231, 1231, 2020, 3, 1231, 1231, 2, 3, 3),
(2, 'Asdasd', 1231, 123213, 2012, 2, 1231, 123213, 2, 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `colors`
--

CREATE TABLE IF NOT EXISTS `colors` (
  `color_id` int(10) NOT NULL AUTO_INCREMENT,
  `color_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`color_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `colors`
--

INSERT INTO `colors` (`color_id`, `color_name`) VALUES
(2, 'Color 1'),
(3, 'Color 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fuels`
--

CREATE TABLE IF NOT EXISTS `fuels` (
  `fuels_id` int(11) NOT NULL AUTO_INCREMENT,
  `fuels_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`fuels_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `fuels`
--

INSERT INTO `fuels` (`fuels_id`, `fuels_name`) VALUES
(2, 'Fuels 1'),
(3, 'Fuel 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `models`
--

CREATE TABLE IF NOT EXISTS `models` (
  `models_id` int(11) NOT NULL AUTO_INCREMENT,
  `models_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`models_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `models`
--

INSERT INTO `models` (`models_id`, `models_name`) VALUES
(2, 'Models 1'),
(3, 'Models 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transmissions`
--

CREATE TABLE IF NOT EXISTS `transmissions` (
  `transmissions_id` int(11) NOT NULL AUTO_INCREMENT,
  `transmissions_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`transmissions_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `transmissions`
--

INSERT INTO `transmissions` (`transmissions_id`, `transmissions_name`) VALUES
(2, 'Transmission 1'),
(3, 'Transmissions 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_roles_idx` (`admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `address`, `admin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator', 'surabaya', 1);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `fk_cars_fuels1` FOREIGN KEY (`fuels_id`) REFERENCES `fuels` (`fuels_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cars_models1` FOREIGN KEY (`models_id`) REFERENCES `models` (`models_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cars_transmissions1` FOREIGN KEY (`transmissions_id`) REFERENCES `transmissions` (`transmissions_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
