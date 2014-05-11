-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 12, 2014 at 05:06 AM
-- Server version: 5.5.34-0ubuntu0.13.04.1
-- PHP Version: 5.4.9-4ubuntu2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `facebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `buffer`
--

CREATE TABLE IF NOT EXISTS `buffer` (
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='many to many buffer for friend req.';

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `commid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `content` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`commid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commid`, `uid`, `postid`, `content`, `time`) VALUES
(2, 2, 5, 'this is comment 1', '2014-04-29 19:02:01'),
(3, 8, 9, 'this is comment 2', '2014-04-29 19:02:01'),
(5, 2, 2, 'this is comment 4', '2014-04-29 19:02:01'),
(6, 8, 10, 'this is comment 5', '2014-04-29 19:02:01'),
(7, 10, 5, 'this is comment 6', '2014-04-29 19:02:01'),
(8, 3, 8, 'this is comment 7', '2014-04-29 19:02:01'),
(9, 10, 7, 'this is comment 8', '2014-04-29 19:02:01'),
(10, 4, 3, 'ho ho', '2014-05-11 21:05:01'),
(11, 6, 5, 'this is comment 10', '2014-04-29 19:02:01'),
(13, 2, 9, 'this is comment 12', '2014-04-29 19:02:01'),
(14, 2, 5, 'this is comment 13', '2014-04-29 19:02:02'),
(15, 2, 7, 'this is comment 14', '2014-04-29 19:02:02'),
(16, 5, 7, 'this is comment 15', '2014-04-29 19:02:02'),
(17, 10, 10, 'this is comment 16', '2014-04-29 19:02:02'),
(18, 8, 9, 'this is comment 17', '2014-04-29 19:02:02'),
(19, 4, 9, 'this is comment 18', '2014-04-29 19:02:02'),
(20, 7, 1, 'this is comment 19', '2014-04-29 19:02:02'),
(22, 2, 4, 'jo bhi main ... kehna chahu ''''', '2014-05-01 18:35:02'),
(24, 2, 4, 'idk', '2014-05-01 20:36:23'),
(28, 5, 3, 'he he', '2014-05-11 21:04:42'),
(29, 2, 3, 'ha ha', '2014-05-11 21:05:21');

-- --------------------------------------------------------

--
-- Table structure for table `edgelist`
--

CREATE TABLE IF NOT EXISTS `edgelist` (
  `uid1` int(11) NOT NULL,
  `uid2` int(11) NOT NULL,
  `aff12` float DEFAULT NULL,
  `aff21` float DEFAULT NULL,
  PRIMARY KEY (`uid1`,`uid2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `edgelist`
--

INSERT INTO `edgelist` (`uid1`, `uid2`, `aff12`, `aff21`) VALUES
(2, 4, NULL, NULL),
(2, 5, NULL, NULL),
(2, 7, NULL, NULL),
(2, 8, NULL, NULL),
(2, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item-id` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `dislikes` int(11) NOT NULL,
  `ip` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `item-id`, `likes`, `dislikes`, `ip`) VALUES
(1, 4, 1, 0, '123.123.1.323'),
(2, 3, 1, 0, '123.123.1.323'),
(3, 6, 1, 0, '123.123.1.323'),
(4, 10, 1, 0, '123.123.1.323');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `content` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL COMMENT 'json',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `readstatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `postid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `content` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`postid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postid`, `uid`, `content`, `time`) VALUES
(1, 3, 'this is post 0', '2014-04-29 05:35:28'),
(2, 1, 'this is post 1', '2014-05-08 18:20:28'),
(3, 4, 'this is post 2', '2014-01-05 07:55:08'),
(4, 9, 'this is post 3', '2014-04-29 18:20:28'),
(5, 10, 'this is post 4', '2014-07-17 03:41:16'),
(6, 7, 'this is post 5', '2013-08-14 02:49:19'),
(7, 6, 'this is post 6', '2013-08-12 23:45:33'),
(8, 10, 'this is post 7', '2014-01-12 22:42:36'),
(9, 2, 'this is post 8', '2014-04-29 22:40:36'),
(10, 8, 'this is post 9', '2014-09-12 02:56:10');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_text` varchar(140) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_on` int(11) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tz_todo`
--

CREATE TABLE IF NOT EXISTS `tz_todo` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dt_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `position` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=38 ;

--
-- Dumping data for table `tz_todo`
--

INSERT INTO `tz_todo` (`id`, `text`, `dt_added`, `position`) VALUES
(35, 'hII', '2014-04-29 21:14:08', 1),
(36, '.....', '2014-04-29 21:31:57', 2),
(37, '.....', '2014-05-01 08:14:20', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) DEFAULT NULL,
  `about` text,
  `password` varchar(1000) NOT NULL,
  `dob` date DEFAULT NULL,
  `dp` text,
  `verified` tinyint(1) NOT NULL,
  `username` varchar(30) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `email`, `firstname`, `lastname`, `about`, `password`, `dob`, `dp`, `verified`, `username`) VALUES
(1, 'abc@gmail.com', 'Sachin', 'Tendulkar', 'God of cricket', '12345678', NULL, NULL, 1, 'drv47'),
(2, 'shubham@gmail.com', 'Shubham ', 'Desale', 'Aam Aadmi', '12345678', NULL, NULL, 1, 'shubhamd'),
(3, 'arravi@gmail.com', 'Ravi ', 'Verma', 'Painter', '12345678', NULL, NULL, 1, 'architv'),
(4, 'bittu@gmail.com', 'Subham ', 'Mishra', 'Spojer', '12345678', NULL, NULL, 1, 'Bittu1234'),
(5, 'prateeknarang111@gmail.com', 'Narendra ', 'Narang', 'Politician', '12345678', NULL, NULL, 1, 'modi5pm'),
(6, 'modi456pm@gmail.com', 'Prateek ', 'Modi', 'Neta', '12345678', NULL, NULL, 1, 'Modi4pm'),
(7, 'mebjas@gmail.com', 'Minhaz', 'Kejriwal', 'Gsocer', '12345678', NULL, NULL, 1, 'minAV'),
(8, 'honey@gmail.com', 'Honey', 'Singh', 'Singer', '12345678', NULL, NULL, 1, 'Honey'),
(9, 'stt@gmail.com', 'Sahil  ', 'Tevtiya', 'Study Study', '12345678', NULL, NULL, 0, 'Sahilt'),
(10, 'abcd@gmail.com', 'Purby', 'Lohia', 'Study Study Study Study', '12345678', NULL, NULL, 0, 'Purby');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
