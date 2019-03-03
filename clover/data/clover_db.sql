-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 03, 2019 at 06:37 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clover_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `srl` bigint(9) NOT NULL AUTO_INCREMENT,
  `code` bigint(9) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`srl`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`srl`, `code`, `name`) VALUES
(1, 1, 'ELECTRONICS'),
(2, 2, 'GAMES'),
(3, 3, 'MOVIES');

-- --------------------------------------------------------

--
-- Table structure for table `offering_detail`
--

DROP TABLE IF EXISTS `offering_detail`;
CREATE TABLE IF NOT EXISTS `offering_detail` (
  `srl` bigint(9) NOT NULL AUTO_INCREMENT,
  `code` bigint(9) NOT NULL,
  `offcode` bigint(9) NOT NULL,
  `offname` varchar(100) NOT NULL,
  `header` varchar(300) NOT NULL,
  `para` varchar(500) NOT NULL,
  `highlight1` varchar(100) NOT NULL,
  `highlight2` varchar(100) NOT NULL,
  `highlight3` varchar(100) NOT NULL,
  `pprice1` varchar(100) NOT NULL,
  `pprice2` varchar(100) NOT NULL,
  `pprice3` varchar(100) NOT NULL,
  `pname1` varchar(100) NOT NULL,
  `pname2` varchar(100) NOT NULL,
  `pname3` varchar(100) NOT NULL,
  PRIMARY KEY (`srl`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offering_list`
--

DROP TABLE IF EXISTS `offering_list`;
CREATE TABLE IF NOT EXISTS `offering_list` (
  `srl` bigint(9) NOT NULL AUTO_INCREMENT,
  `srno` bigint(9) NOT NULL,
  `offcode` bigint(9) NOT NULL,
  `para` varchar(500) NOT NULL,
  PRIMARY KEY (`srl`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `passmain`
--

DROP TABLE IF EXISTS `passmain`;
CREATE TABLE IF NOT EXISTS `passmain` (
  `srl` bigint(9) NOT NULL AUTO_INCREMENT,
  `code` bigint(9) NOT NULL,
  `user` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`srl`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passmain`
--

INSERT INTO `passmain` (`srl`, `code`, `user`, `password`) VALUES
(1, 1, 'superadmin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `sr` bigint(9) NOT NULL AUTO_INCREMENT,
  `code` bigint(9) NOT NULL,
  `category` bigint(9) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` longtext NOT NULL,
  `price` double(10,2) NOT NULL,
  `image_url` varchar(250) NOT NULL,
  PRIMARY KEY (`sr`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`sr`, `code`, `category`, `name`, `description`, `price`, `image_url`) VALUES
(1, 1, 2, 'PlayStation 4', '4th generation console                                                                    ', 34000.00, 'MyImages/category/1.jpg'),
(2, 2, 1, 'Imac', 'Powered by MAC OSX                                                                    ', 200000.00, 'MyImages/category/2.jpg'),
(3, 3, 3, 'Django unchained', 'Slavery                                                                    ', 2500.00, 'MyImages/category/3.jpg'),
(4, 4, 1, 'iPhone X', '                                    Apple\'s radical new design  with ugly notch                                                                                             ', 100000.00, 'MyImages/category/4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

DROP TABLE IF EXISTS `purchase_order`;
CREATE TABLE IF NOT EXISTS `purchase_order` (
  `orderId` bigint(10) NOT NULL,
  `sr` bigint(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `addressType` varchar(10) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `landmark` varchar(250) NOT NULL,
  `town` varchar(250) NOT NULL,
  `userId` bigint(9) NOT NULL,
  PRIMARY KEY (`sr`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`orderId`, `sr`, `name`, `addressType`, `mobile`, `landmark`, `town`, `userId`) VALUES
(2509573999, 3, 'Yaser Kazi', 'Home', '9167768858', 'mazgaon', 'mumbai', 1),
(2156443139, 4, 'Yaser Kazi 2', 'Commercial', '9167768858', 'mazgaoon', 'mumbai', 1),
(6762220713, 5, 'Yaser Kazi 2', 'Commercial', '9167768858', 'mazgaoon', 'mumbai', 1),
(6490030440, 6, 'Yaser Kazi 2', 'Commercial', '9167768858', 'mazgaoon', 'mumbai', 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_details`
--

DROP TABLE IF EXISTS `purchase_order_details`;
CREATE TABLE IF NOT EXISTS `purchase_order_details` (
  `orderId` bigint(10) NOT NULL,
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `userId` bigint(9) NOT NULL,
  `category` bigint(9) NOT NULL,
  `productcode` bigint(9) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` longtext NOT NULL,
  `price` double(10,2) NOT NULL,
  `image_url` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order_details`
--

INSERT INTO `purchase_order_details` (`orderId`, `id`, `userId`, `category`, `productcode`, `name`, `description`, `price`, `image_url`) VALUES
(2509573999, 2, 1, 1, 2, 'Imac', 'Powered by MAC OSX                                                                    ', 200000.00, 'http://localhost/admin/MyImages/category/2.jpg'),
(6762220713, 3, 1, 1, 4, 'iPhone X', '', 100000.00, 'http://localhost/admin/MyImages/category/4.jpg'),
(6490030440, 4, 1, 1, 4, 'iPhone X', '                                    Apple\'s radical new design  with ugly notch                                                                                             ', 100000.00, 'http://localhost/admin/MyImages/category/4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `site_user_db`
--

DROP TABLE IF EXISTS `site_user_db`;
CREATE TABLE IF NOT EXISTS `site_user_db` (
  `id` bigint(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_user_db`
--

INSERT INTO `site_user_db` (`id`, `name`, `email`, `password`) VALUES
(1, 'yaser', 'kazi.yaser@gmail.com', '123456');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
