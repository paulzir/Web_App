-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 27, 2015 at 06:32 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbase`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'Category A'),
(2, 'Category B'),
(3, 'Category C'),
(4, 'Category D'),
(5, 'Category E'),
(6, 'Category F');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customerid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `afm` int(11) NOT NULL,
  PRIMARY KEY (`customerid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerid`, `name`, `lastname`, `address`, `afm`) VALUES
(1, 'Vasilis', 'Xristou', 'Thess', 1224),
(2, 'Nikos', 'Nikolaou', 'Athens', 1556),
(3, 'Giannis', 'Andreou', 'Kaloxwri', 5456),
(4, 'Leonidas', 'Anastasiadhs', 'Kilkis', 6541),
(5, 'Stelios', 'Telios', 'Kavala', 7887),
(9, 'Irakliou', 'Tony', 'Rome', 9664);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `price` double(12,0) NOT NULL,
  `customer` int(11) NOT NULL,
  `date` date NOT NULL,
  `payment` varchar(50) NOT NULL,
  `details` text NOT NULL,
  PRIMARY KEY (`orderid`),
  KEY `customer` (`customer`),
  KEY `product` (`product`),
  KEY `category` (`category`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `category`, `product`, `price`, `customer`, `date`, `payment`, `details`) VALUES
(1, 1, 21, 250, 5, '2014-05-27', 'cash', 'nice'),
(2, 5, 29, 7800, 4, '2014-05-31', 'credit', 'yes'),
(4, 4, 28, 8960, 1, '2014-05-30', 'cash', 'ok'),
(5, 2, 24, 4896, 2, '2014-06-18', 'cash', 'tomorrow'),
(7, 5, 29, 8960, 3, '2014-06-20', 'cash', 'perfect'),
(8, 4, 27, 7500, 6, '2014-06-27', 'credit', 'nice'),
(9, 5, 30, 1800, 4, '2015-10-20', 'cash', ''),
(10, 0, 0, 50, 1, '0000-00-00', '', ''),
(11, 0, 0, 1000, 1, '0000-00-00', '', ''),
(12, 3, 26, 3201, 9, '2015-10-07', '?', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_cat` int(11) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `prod_det` text NOT NULL,
  PRIMARY KEY (`prod_id`),
  KEY `prod_cat` (`prod_cat`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_cat`, `prod_name`, `prod_det`) VALUES
(21, 1, 'Product A1', ''),
(22, 1, 'Product A2', ''),
(23, 2, 'Product B2', ''),
(24, 2, 'Product B2', ''),
(25, 3, 'Product C1', ''),
(26, 3, 'Product C2', 'new'),
(27, 4, 'Product D1', ''),
(28, 4, 'Product D2', ''),
(29, 5, 'Product E1', ''),
(30, 5, 'Product E2', ''),
(33, 6, 'Product F1', ''),
(34, 6, 'Product F2', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
