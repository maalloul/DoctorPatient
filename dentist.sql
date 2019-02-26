-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 25, 2019 at 11:34 PM
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
-- Database: `dentist`
--

-- --------------------------------------------------------

--
-- Table structure for table `patientinfo`
--

DROP TABLE IF EXISTS `patientinfo`;
CREATE TABLE IF NOT EXISTS `patientinfo` (
  `firstname` varchar(1000) NOT NULL,
  `phonenumber` varchar(1000) NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patientinfo`
--

INSERT INTO `patientinfo` (`firstname`, `phonenumber`, `id`) VALUES
('MohammadAlloul', '76866786', 1),
('Doha', '70852427', 2),
('Ali', '76555444', 3),
('Simon', '76666666', 4),
('', '', 5),
('Hasan', '22', 6),
('sasa', '1111', 7),
('mehsen', '3', 8),
('Simon', '99', 9);

-- --------------------------------------------------------

--
-- Table structure for table `patientstatus`
--

DROP TABLE IF EXISTS `patientstatus`;
CREATE TABLE IF NOT EXISTS `patientstatus` (
  `id` int(100) NOT NULL,
  `status` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patientstatus`
--

INSERT INTO `patientstatus` (`id`, `status`) VALUES
(4, 'admit');

-- --------------------------------------------------------

--
-- Table structure for table `patientvisitsdoctor`
--

DROP TABLE IF EXISTS `patientvisitsdoctor`;
CREATE TABLE IF NOT EXISTS `patientvisitsdoctor` (
  `patientid` int(255) NOT NULL,
  `date` varchar(1000) NOT NULL,
  `iddesc` int(255) NOT NULL AUTO_INCREMENT,
  `medicaldescription` varchar(1000) NOT NULL,
  `price` varchar(1000) NOT NULL,
  `paid` varchar(100) NOT NULL,
  PRIMARY KEY (`iddesc`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patientvisitsdoctor`
--

INSERT INTO `patientvisitsdoctor` (`patientid`, `date`, `iddesc`, `medicaldescription`, `price`, `paid`) VALUES
(1, '25/2/2019', 1, 'headache and stomach', '200', 'no'),
(1, '25/2/2019', 2, 'head and stomach and leg and pancreas and everything in his body', '20000$', 'no'),
(4, '25/2/2019', 3, 'headache', '2000$', 'no'),
(4, '26/2/2019', 4, 'jj', '1000$', 'no');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
