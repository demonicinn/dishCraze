-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 17, 2017 at 05:05 AM
-- Server version: 5.6.36-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `getdishcraze`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `uid`, `name`, `slug`, `status`, `created`, `updated`) VALUES
(1, 1, 'Appetizers', 'appetizers', 1, '2017-11-03 11:11:23', '2017-11-03 11:11:23'),
(2, 1, 'Chicken', 'chicken', 1, '2017-11-03 11:11:31', '2017-11-03 11:11:52'),
(3, 1, 'Seafood', 'seafood', 1, '2017-11-03 11:11:46', '2017-11-03 11:11:46'),
(4, 1, 'Beef', 'beef', 1, '2017-11-03 11:11:04', '2017-11-03 11:11:04'),
(5, 1, 'Kids', 'kids', 1, '2017-11-03 11:11:15', '2017-11-03 11:11:15'),
(6, 1, 'Salads', 'salads', 1, '2017-11-03 11:11:24', '2017-11-03 17:11:29'),
(7, 1, 'Brunch', 'brunch', 1, '2017-11-04 00:11:08', '2017-11-04 00:11:08');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `hot` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `uid`, `title`, `price`, `description`, `image`, `category`, `slug`, `hot`, `status`, `created`, `updated`) VALUES
(1, 1, 'TACOS', '8', 'Delicious and juicy shredded chicken breast served in a tortilla. With beans and rice on the side.', 'img-3SXANWCXzz.jpg', '["1","5"]', 'tacos', '', 1, '2017-11-03 11:11:46', '2017-11-03 11:11:46'),
(2, 1, 'PHILLY', '10', 'Choice of beef or chicken, smothered with grilled onions, mushrooms, and provolone cheese on french bread', 'img-OBQ3R7U084.jpg', '["2"]', 'philly', '', 1, '2017-11-03 11:11:17', '2017-11-03 11:11:17'),
(3, 1, 'BURGER', '9', 'Delicious grass fed steak served with organic eggs. Both served to taste.', 'img-MAyck6tzLf.jpg', '["2"]', 'burger', '', 1, '2017-11-03 11:11:35', '2017-11-03 11:11:35'),
(4, 1, 'STEAK & EGGS', '15', 'Delicious grass fed steak served with organic eggs. Both served to taste.', 'img-9LX8saoV39.jpg', '["4"]', 'steak-eggs', '', 1, '2017-11-03 11:11:06', '2017-11-03 11:11:06'),
(5, 1, 'CHICKEN', '9', 'Housemade Buttermilk Biscuit, Sausage Gravy served with a side of smoked sausage', 'img-g5Cu5eR78o.jpg', '["4"]', 'chicken', '', 1, '2017-11-03 11:11:32', '2017-11-03 11:11:32'),
(7, 1, 'STUFFED DEEP DISH', '22', 'Italian sausage, pepperoni, green pepper & sautéed onion', 'img-9T1Z4Z8ZjS.jpg', '["4"]', 'stuffed-deep-dish', 'on', 1, '2017-11-04 00:11:51', '2017-11-04 00:11:05'),
(8, 1, 'Garlic Crab Plate', '15', 'Three large snow crab legs with corn, potatoes and sausage', 'img-4frbKmdM6x.jpg', '["3"]', 'garlic-crab-plate', 'on', 1, '2017-11-04 00:11:21', '2017-11-04 12:11:07'),
(9, 1, 'Chicken & Waffles', '13', 'Delicious breaded chicken served between two fluffy waffles.', 'img-p2uYwyyHye.jpg', '["7"]', 'chicken-waffles', 'on', 1, '2017-11-04 17:11:06', '2017-11-09 02:11:44'),
(11, 1, 'Seasoned Fries', '9', 'Garlic seasoned fries with cheese', 'img-OT0520Z3R4.png', '["1"]', 'seasoned-fries', 'on', 1, '2017-11-06 21:11:43', '2017-11-07 15:11:07'),
(12, 1, 'Cheese Steak', '9', 'Delicious original philly cheesesteak', 'img-RoJ5ctu3SV.png', '["4"]', 'cheese-steak', 'off', 1, '2017-11-11 22:11:22', '2017-11-11 22:11:22');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cookie` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `cookie`, `pid`, `rating`, `created`) VALUES
(1, '3kfF0yINC6X8ULh1CoHbnZ1LB8DX1Z1kR0KPU0rm', 5, 4, '2017-11-08 10:11:29'),
(2, '3kfF0yINC6X8ULh1CoHbnZ1LB8DX1Z1kR0KPU0rm', 9, 4, '2017-11-08 22:11:00'),
(3, '3kfF0yINC6X8ULh1CoHbnZ1LB8DX1Z1kR0KPU0rm', 7, 5, '2017-11-09 02:11:13'),
(4, 'oSnewoi0P6JDxrDmlpauhWrO8V1b2G9LxqT2FJSk', 11, 4, '2017-11-09 03:11:59'),
(5, '3kfF0yINC6X8ULh1CoHbnZ1LB8DX1Z1kR0KPU0rm', 4, 5, '2017-11-10 03:11:58'),
(6, '3kfF0yINC6X8ULh1CoHbnZ1LB8DX1Z1kR0KPU0rm', 3, 5, '2017-11-10 03:11:03'),
(7, '3kfF0yINC6X8ULh1CoHbnZ1LB8DX1Z1kR0KPU0rm', 8, 2, '2017-11-10 03:11:35'),
(8, 'oSnewoi0P6JDxrDmlpauhWrO8V1b2G9LxqT2FJSk', 9, 5, '2017-11-10 14:11:46');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `footer_text` varchar(255) NOT NULL,
  `admin_text` varchar(255) NOT NULL,
  `pagi_front` int(11) NOT NULL,
  `pagi_admin` int(11) NOT NULL,
  `favicon` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `address`, `footer_text`, `admin_text`, `pagi_front`, `pagi_admin`, `favicon`) VALUES
(1, 'Live Demo Menu', '1234 Example Ave. NE Atlanta, GA 30303', 'designed by dishCRAZE', 'Admin', 12, 10, 'fav-5rdZCjVm0d.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `image` varchar(100) NOT NULL,
  `verify` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `fname`, `lname`, `email`, `password`, `image`, `verify`, `status`, `updated`, `created`) VALUES
(1, 'admin', 'Dish', 'Craze', 'darnelldugger@gmail.com', 'aa47f8215c6f30a0dcdb2a36a9f4168e', 'img-ifFJuwoTT5.png', '', 1, '2017-11-15 23:11:08', '2016-09-08 02:07:04');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
