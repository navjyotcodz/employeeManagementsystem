-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 17, 2024 at 12:32 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `form`
--

-- --------------------------------------------------------

--
-- Table structure for table `actform`
--

DROP TABLE IF EXISTS `actform`;
CREATE TABLE IF NOT EXISTS `actform` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `act_category` varchar(50) NOT NULL,
  `short_title` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `applicability` int(10) NOT NULL,
  `wef` date NOT NULL,
  `state` varchar(100) NOT NULL,
  `act_industry` varchar(30) NOT NULL,
  `file_name` varchar(400) NOT NULL,
  `type_act` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actform`
--

INSERT INTO `actform` (`id`, `act_category`, `short_title`, `description`, `applicability`, `wef`, `state`, `act_industry`, `file_name`, `type_act`) VALUES
(15, '1', 'naba', 'sfswf', 1, '2024-01-01', '18', '2', 'nabo/1483.jpeghotel5.jpg', 'State'),
(35, '1', 'nabaajj', 'wefewre', 1, '2024-01-08', '19', '1,2,3', 'nabo/6857.jpegflag.jpg', 'National'),
(34, '4', 'dad', 'jyoti', 3, '2024-01-03', '7', '1', 'nabo/hotel10.jpg', 'State'),
(31, '4', 'dadd', 'sfsf', 1, '2024-01-04', '18', '1,2', 'nabo/chandrayan.jpg', 'State'),
(25, '1', 'drgd', 'drgdrgtdr', 1, '2024-01-02', '16', '1,2', 'nabo/chandrayan.jpg', 'National');

-- --------------------------------------------------------

--
-- Table structure for table `acts`
--

DROP TABLE IF EXISTS `acts`;
CREATE TABLE IF NOT EXISTS `acts` (
  `act_id` int(5) NOT NULL AUTO_INCREMENT,
  `act_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`act_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acts`
--

INSERT INTO `acts` (`act_id`, `act_name`) VALUES
(1, 'Contract Labour Act'),
(2, 'Payment of Wages'),
(3, 'Payment of Bonus'),
(4, 'Maternity act'),
(8, 'sdfsrfsr'),
(9, 'labour law');

-- --------------------------------------------------------

--
-- Table structure for table `act_industry`
--

DROP TABLE IF EXISTS `act_industry`;
CREATE TABLE IF NOT EXISTS `act_industry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `industry_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `act_industry`
--

INSERT INTO `act_industry` (`id`, `industry_name`) VALUES
(1, 'Building and other construction work'),
(2, 'factory'),
(3, 'shop or commercial establishment'),
(6, 'dgdgd');

-- --------------------------------------------------------

--
-- Table structure for table `act_master`
--

DROP TABLE IF EXISTS `act_master`;
CREATE TABLE IF NOT EXISTS `act_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(200) NOT NULL,
  `states_id` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `act_master`
--

INSERT INTO `act_master` (`id`, `category_name`, `states_id`) VALUES
(1, 'category1', 18),
(2, 'category2', 28),
(3, 'category3', 8),
(4, 'category4', 18);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(255) NOT NULL,
  `states_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city_name`, `states_id`) VALUES
(1, 'Gurugram', 8),
(2, 'faridabad', 8),
(3, 'routak', 8),
(4, 'hisar', 8),
(5, 'ambala', 8),
(6, 'varturs', 35),
(8, 'dgdr', 1),
(9, 'atunagar', 2),
(10, 'hisaar', 8),
(22, 'Zzasdsdf', 20),
(21, 'cccc', 8),
(23, 'sds', 19),
(24, 'hdhd', 18);

-- --------------------------------------------------------

--
-- Table structure for table `mapacts`
--

DROP TABLE IF EXISTS `mapacts`;
CREATE TABLE IF NOT EXISTS `mapacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `states` varchar(50) NOT NULL,
  `acts` varchar(255) NOT NULL,
  `mapdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapacts`
--

INSERT INTO `mapacts` (`id`, `states`, `acts`, `mapdate`) VALUES
(23, '18', '1,2,3', '2023-12-01'),
(22, '18', '1,2', '2023-12-04'),
(19, '19', '1,4', '2023-12-01'),
(20, '7', '4', '2023-11-27'),
(27, '1', '1', '2024-01-02'),
(26, '1', '1,2', '2023-11-30'),
(25, '2', '1', '2023-12-01'),
(24, '3', '1,2,3,4', '2023-12-01'),
(12, '1', '1,2,3,4', '2023-12-04');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) NOT NULL,
  `menu_action` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu_name`, `menu_action`, `parent_id`) VALUES
(1, 'master', NULL, 0),
(2, 'transaction', NULL, 0),
(3, 'reports', NULL, 0),
(4, 'qualification', 'qualification.php', 1),
(5, 'acts', 'acts.php', 1),
(6, 'state', 'state.php', 1),
(7, 'city', 'city.php', 1),
(8, 'industry', 'industry.php', 1),
(9, 'category', 'category.php', 1),
(10, 'addmission', 'nav_first.php', 2),
(11, 'mapacts', 'mapacts.php', 2),
(12, 'actform', 'actform.php', 2),
(13, 'studentsview', 'nav_display.php', 3),
(14, 'statesview', 'state_master.php', 3),
(15, 'formactview', 'actform_display.php', 3),
(16, 'mapactview', 'mapact_display.php', 3),
(18, 'addmenu', 'menu_add.php', 1),
(21, 'AssignMenuView', 'assign_display.php', 3),
(22, 'AssignMenuForm', 'assign_menu.php', 2);

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

DROP TABLE IF EXISTS `qualification`;
CREATE TABLE IF NOT EXISTS `qualification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quali_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`id`, `quali_name`) VALUES
(1, 'ug'),
(2, 'pg'),
(3, 'diploma'),
(4, 'masters'),
(5, 'btech'),
(6, 'bcom'),
(14, 'mcom'),
(16, 'bca'),
(15, 'bca'),
(13, 'mcom'),
(25, 'dfgdf'),
(24, 'ertretre'),
(23, 'htfhfhfh'),
(22, 'qrwrwr'),
(21, 'ghgfhf'),
(26, 'dfgdf'),
(27, 'dfgtgrtfhrtfh'),
(28, 'dfgtgrtfhrtfh'),
(29, 'gfsfsfs'),
(30, 'gfsfsfs'),
(31, 'sfdertre'),
(32, 'sfdertre'),
(33, 'sfs'),
(34, 'sfs');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `states_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `states_name`) VALUES
(2, 'Arunachal Pradesh'),
(3, 'Assam'),
(4, 'Bihar'),
(5, 'Chhattisgard'),
(7, 'Gujarat'),
(8, 'Haryana'),
(9, 'Himachal Pradesh'),
(10, 'Jharkhand'),
(11, 'Karnataka'),
(12, 'Kerala'),
(13, 'Madhya Pradesh'),
(14, 'Maharashtra'),
(15, 'Mainipur'),
(16, 'Meghalaya'),
(17, 'Mizoram'),
(18, 'Nagaland'),
(19, 'Odisha'),
(20, 'Punjab'),
(21, 'Rajasthan'),
(22, 'Sikkim'),
(24, 'Telangana'),
(25, 'tripura'),
(26, 'Uttar Pradesh'),
(27, 'Uttarakhand'),
(56, 'west bengal'),
(57, 'sdfsf'),
(58, 'ergrg'),
(59, 'vxdsvdsg');

-- --------------------------------------------------------

--
-- Table structure for table `stud_table`
--

DROP TABLE IF EXISTS `stud_table`;
CREATE TABLE IF NOT EXISTS `stud_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `qualification` varchar(10) NOT NULL,
  `certificate` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=153 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stud_table`
--

INSERT INTO `stud_table` (`id`, `firstname`, `lastname`, `dob`, `gender`, `qualification`, `certificate`, `file_name`, `city`) VALUES
(151, 'ahmed', 'idrisi', '2024-01-06', 'male', '28', '', 'nav/chandrayan.jpg', '23'),
(125, 'shovodretg', 'saha', '2012-12-08', 'female', '3', 'nav/c3.jpg', 'nav/5000.jpeghotel5.jpg', '5'),
(131, 'priyanka', 'sah', '1999-12-02', 'female', '2', 'nav/c2.jpg', 'nav/6350.jpegchandrayan.jpg', '4'),
(141, 'suhana', 'khan', '2023-12-01', 'female', '2', '', 'nav/1571.jpeghotel8.jpg', '1'),
(150, 'rahul', 'saha', '2024-01-03', 'male', '3', '', 'nav/chandrayan.jpg', '2'),
(145, 'rajan', 'das', '2000-12-12', 'male', '1', '', 'nav/img.jpg', '3'),
(152, 'sfeesfsf', 'sfsfsfsfs', '2024-01-05', 'male', '4', '', 'nav/flag.jpg', '2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
(54, 'geeta', 'geeta@12', 'geeta@gmail.com'),
(53, 'minakshi', 'afsfsfa', 'minak@gmail.com'),
(48, 'nabajyoti', '44cgcg', 'nk@gmail.com'),
(51, 'ahmed', '123', 'ov@gmail.com'),
(52, 'nabajyotikarmakar', 'nb12@', 'karma@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

DROP TABLE IF EXISTS `user_menu`;
CREATE TABLE IF NOT EXISTS `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `menu_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=117 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `user_id`, `menu_id`) VALUES
(82, '53', '5'),
(81, '53', '4'),
(80, '53', '13'),
(79, '53', '10'),
(78, '53', '5'),
(77, '53', '4'),
(87, '53', '4'),
(111, '53', '6'),
(112, '51', '4');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
