-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 06, 2012 at 08:03 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gupt0040`
--

-- --------------------------------------------------------

--
-- Table structure for table `movie_database`
--

CREATE TABLE IF NOT EXISTS `movie_database` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_title` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `release_date` date NOT NULL,
  `director` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `movie_database`
--

INSERT INTO `movie_database` (`id`, `movie_title`, `release_date`, `director`) VALUES
(1, 'Spirited Away', '2001-07-20', 'Hayao Miyazaki'),
(2, 'Gone with the Wind', '1940-01-17', 'Victor Fleming'),
(3, 'Mughal-E-Azam', '0000-00-00', 'K. Asif'),
(4, 'The Guns of Navarone', '1961-06-22', 'J. Lee Thompson'),
(5, 'Kung Fu Hustle', '2011-05-26', 'Stephen Chow');
