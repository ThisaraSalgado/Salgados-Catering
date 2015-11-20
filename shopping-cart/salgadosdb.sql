-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2015 at 01:37 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `salgadosdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bakeryproducts`
--

CREATE TABLE IF NOT EXISTS `bakeryproducts` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `price` float NOT NULL,
  `image` tinyblob NOT NULL,
  `description` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `bakeryproducts`
--

INSERT INTO `bakeryproducts` (`id`, `name`, `type`, `price`, `image`, `description`) VALUES
(1, 'Cutlets', 'Short Eats', 25, 0x496d616765732f42616b6572792f6375746c6574732e6a7067, 'Potato and Fish mixed'),
(2, 'Choclate Cake', 'Cake', 50, 0x496d616765732f42616b6572792f63686f6363616b652e6a7067, 'Highly choclate flavoured with two layers'),
(3, 'Fish Roll', 'Short Eats', 40, 0x496d616765732f42616b6572792f66697368726f6c6c2e6a7067, 'Newly tasted fish rolls with Garlic paste.'),
(6, '', '%', 0, 0x496d616765732f42616b6572792f63686f6363616b652e6a7067, ''),
(7, '', '%', 0, 0x496d616765732f42616b6572792f63686f6363616b652e6a7067, ''),
(8, '', '%', 0, 0x496d616765732f42616b6572792f63686f6363616b652e6a7067, ''),
(9, '', '%', 0, 0x496d616765732f42616b6572792f63686f6363616b652e6a7067, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
