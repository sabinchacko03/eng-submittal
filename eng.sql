-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 16, 2020 at 09:19 PM
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
-- Database: `eng`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `location` varchar(50) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `phone`, `email`, `location`, `status`) VALUES
(1, 'American School of Dubai', '04564561', 'americanschool@mail.com', '', 1),
(2, 'AL WASL', '', '', '', 1),
(3, 'Ali Abdulla Ali Al Shafar', '', '', '', 1),
(4, 'Al Nasr Club Investment Co. LLC', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `status`) VALUES
(1, 'Plumbing', 1),
(2, 'HVAC', 1),
(3, 'Electrical', 1),
(4, 'Fire Fighting', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gmailuser`
--

DROP TABLE IF EXISTS `gmailuser`;
CREATE TABLE IF NOT EXISTS `gmailuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oauth_provider` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `main_contractors`
--

DROP TABLE IF EXISTS `main_contractors`;
CREATE TABLE IF NOT EXISTS `main_contractors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_contractors`
--

INSERT INTO `main_contractors` (`id`, `name`, `phone`, `email`, `status`) VALUES
(1, 'Al Tayer Stocks LLC', '', '', 1),
(2, 'Naresco Contracting LLC.', '', '', 1),
(3, 'Al Shafar Contracting Co L.L.C.', '', '', 1),
(4, 'Al Ashram Contracting L.L.C.', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
CREATE TABLE IF NOT EXISTS `material` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `proposed_make` varchar(200) NOT NULL,
  `planned_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `is_approved` int(11) NOT NULL DEFAULT 0,
  `modified_by` int(11) NOT NULL,
  `modified_date` date NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `project`, `department`, `name`, `description`, `proposed_make`, `planned_date`, `status`, `is_approved`, `modified_by`, `modified_date`, `active`) VALUES
(1, 1, 1, 'MEP/MS/FF-01 A', ' Pre-Qualification for the Fire Protection System', '', '2020-09-29', 4, 0, 56, '2020-09-16', 1),
(2, 1, 2, 'MEP/MS/FF-01 ', 'Fire Fighting pipes & Fittings\r\n', '', '2020-09-24', 1, 0, 56, '2020-09-16', 1),
(3, 2, 1, 'MEP/MS/FF-03', 'Shield, Kennedy, Nibco, Grinnel\r\n ', '', '2020-09-30', 1, 0, 56, '2020-09-16', 1),
(4, 2, 2, 'MEP/MS/FF-04', ' vv', '', '2020-09-30', 1, 0, 56, '2020-09-16', 1),
(5, 4, 3, 'MEP/MS/FF-05', 'ddd', '', '2020-09-29', 2, 0, 56, '2020-09-16', 1),
(6, 4, 4, 'MEP/MS/FF-06', ' dd', '', '2020-09-24', 1, 0, 56, '2020-09-16', 1),
(7, 2, 1, 'MEP/MS/FF-051', ' dd', '', '2020-09-18', 1, 0, 56, '2020-09-16', 1),
(8, 2, 2, 'R476-ASEME-MT-MEP/EL-01', 'Furse, BICC, A.N Wallis, Cupra, Franklin\r\n ', 'WALLIS', '2020-09-30', 1, 0, 56, '2020-09-16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `material_status`
--

DROP TABLE IF EXISTS `material_status`;
CREATE TABLE IF NOT EXISTS `material_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material_status`
--

INSERT INTO `material_status` (`id`, `name`, `description`, `status`) VALUES
(1, 'A', 'Approved', 1),
(2, 'B', 'Approved as Noted', 1),
(3, 'C', 'Not Approved, Revise & Resubmit', 1),
(4, 'D', 'Rejected, For Records', 1),
(5, 'UR', 'Under Review', 1);

-- --------------------------------------------------------

--
-- Table structure for table `material_submittal_log`
--

DROP TABLE IF EXISTS `material_submittal_log`;
CREATE TABLE IF NOT EXISTS `material_submittal_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `material` int(11) NOT NULL,
  `revision` int(11) NOT NULL,
  `actual_submittal_date` date NOT NULL,
  `returned_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material_submittal_log`
--

INSERT INTO `material_submittal_log` (`id`, `material`, `revision`, `actual_submittal_date`, `returned_date`, `status`, `modified_by`, `modified_date`) VALUES
(1, 5, 0, '2020-09-16', '2020-09-18', 4, 56, '2020-09-17 00:50:36'),
(2, 5, 1, '2020-09-16', '2020-09-23', 4, 56, '2020-09-17 00:53:50'),
(3, 5, 2, '2020-09-16', '2020-09-25', 4, 56, '2020-09-17 01:02:14'),
(4, 0, 0, '0000-00-00', '0000-00-00', 0, 56, '2020-09-16 00:00:00'),
(5, 5, 3, '2020-09-16', '2020-09-30', 2, 56, '2020-09-17 01:02:24'),
(6, 1, 0, '2020-09-16', '2020-09-23', 4, 56, '2020-09-17 01:00:57');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `link` text NOT NULL,
  `parent` int(3) NOT NULL,
  `order_id` int(3) NOT NULL,
  `status` int(3) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `link`, `parent`, `order_id`, `status`) VALUES
(1, 'Projects', '#', 0, 1, 1),
(2, 'Project Management', 'projects', 1, 1, 1),
(3, 'Material', '#', 0, 2, 1),
(4, 'Material Submittal', 'material', 3, 1, 1),
(5, 'Account', '#', 0, 3, 1),
(6, 'Logout', 'login/logout', 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` int(3) NOT NULL,
  `menu` int(11) NOT NULL,
  `edit_role` int(2) NOT NULL DEFAULT 0,
  `delete_role` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `user_type`, `menu`, `edit_role`, `delete_role`) VALUES
(1, 2, 2, 1, 0),
(2, 2, 18, 0, 0),
(3, 1, 18, 0, 0),
(6, 2, 7, 1, 0),
(5, 2, 8, 0, 0),
(7, 1, 2, 0, 0),
(9, 1, 7, 0, 0),
(10, 2, 19, 1, 0),
(11, 2, 20, 1, 1),
(12, 2, 21, 1, 0),
(13, 2, 10, 1, 0),
(14, 2, 24, 1, 0),
(15, 2, 25, 1, 0),
(16, 2, 11, 1, 0),
(17, 2, 12, 1, 0),
(18, 2, 26, 1, 1),
(19, 2, 13, 1, 1),
(20, 2, 14, 1, 1),
(21, 2, 27, 1, 1),
(22, 2, 28, 1, 1),
(23, 2, 29, 1, 1),
(24, 2, 30, 1, 1),
(25, 2, 31, 1, 1),
(27, 2, 32, 1, 1),
(28, 1, 10, 0, 0),
(29, 1, 13, 0, 0),
(30, 2, 34, 1, 1),
(31, 2, 35, 1, 1),
(32, 1, 11, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `project_id` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `client` int(11) NOT NULL,
  `m_contractor` int(11) NOT NULL,
  `consultant` varchar(100) NOT NULL,
  `project_value` int(11) NOT NULL,
  `location` varchar(50) NOT NULL,
  `plumbing_total` int(5) NOT NULL,
  `hvac_total` int(5) NOT NULL,
  `electrical_total` int(5) NOT NULL,
  `ff_total` int(5) NOT NULL,
  `variation` int(5) NOT NULL,
  `manager` varchar(100) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `modified_by` int(3) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `variation_plumbing` int(11) NOT NULL,
  `variation_hvac` int(11) NOT NULL,
  `variation_electrical` int(11) NOT NULL,
  `variation_ff` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `project_id` (`project_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `project_id`, `start_date`, `end_date`, `client`, `m_contractor`, `consultant`, `project_value`, `location`, `plumbing_total`, `hvac_total`, `electrical_total`, `ff_total`, `variation`, `manager`, `status`, `modified_by`, `modified_date`, `variation_plumbing`, `variation_hvac`, `variation_electrical`, `variation_ff`) VALUES
(1, 'Proposed Four Residential & Commercial building', 'J1677', '2020-09-02', '2021-12-31', 4, 4, 'Golden Square Engineering Consultants', 0, 'OUD METHA', 8031000, 13715000, 16374000, 4630000, 0, '4', 1, 16, '2020-09-02 00:00:00', 0, 0, 1200000, 0),
(2, '(B+G+13+Roof)  3 Number of Residential Building ', 'S001', '2016-05-05', '2020-12-31', 3, 3, 'Al Asri Engineering Consultant. ', 0, 'PALM JUMEIRAH', 6169500, 19100000, 14500000, 3330500, 0, '2', 1, 56, '2020-09-02 00:00:00', 0, 0, 0, 0),
(4, 'Al Qusais Residential Development', 'J1671', '2020-09-03', '2021-05-31', 2, 2, 'Schuster Pechtold', 0, 'AL QUASIS', 18000000, 30000000, 25000000, 0, 0, '5', 1, 30, '2020-09-03 00:00:00', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 1,
  `user_type` int(2) NOT NULL,
  `designation` int(11) NOT NULL,
  `updated_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `status`, `user_type`, `designation`, `updated_date`) VALUES
(1, 'ahmed.emish@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'ahmed.emish@alshirawimep.com', 1, 1, 1, '2020-08-30 10:02:27'),
(2, 'emad.mohammed@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'emad.mohammed@alshirawimep.com', 1, 1, 2, '2020-08-30 10:02:27'),
(3, 'girish.veetil@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'girish.veetil@alshirawimep.com', 1, 1, 2, '2020-08-30 10:02:27'),
(4, 'sharanjit.saini@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'sharanjit.saini@alshirawimep.com', 1, 1, 2, '2020-08-30 10:02:27'),
(5, 'ramnath.pai@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'ramnath.pai@alshirawimep.com', 1, 1, 2, '2020-08-30 10:02:27'),
(6, 'dennis.daniel@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'dennis.daniel@alshirawimep.com', 1, 1, 2, '2020-08-30 10:02:27'),
(7, 'muhunthan.parasuram@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'muhunthan.parasuram@alshirawimep.com', 1, 1, 2, '2020-08-30 10:02:27'),
(8, 'najeebuddin.mohammed@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'najeebuddin.mohammed@alshirawimep.com', 1, 1, 3, '2020-08-30 10:02:27'),
(9, 'arun.abraham@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'arun.abraham@alshirawimep.com', 1, 1, 3, '2020-08-30 10:02:27'),
(10, 'shenraj.rengasamy@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'shenraj.rengasamy@alshirawimep.com', 1, 1, 3, '2020-08-30 10:02:27'),
(11, 'jaclyn.pahayahay@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'jaclyn.pahayahay@alshirawimep.com', 1, 1, 2, '2020-08-30 10:02:27'),
(12, 'rajeshbs@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'rajeshbs@alshirawimep.com', 1, 1, 4, '2020-08-30 10:02:27'),
(13, 'jerin.joy@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'jerin.joy@alshirawimep.com', 1, 1, 4, '2020-08-30 10:02:27'),
(14, 'aasif.dilbag@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'aasif.dilbag@alshirawimep.com', 1, 1, 4, '2020-08-30 10:02:27'),
(15, 'balan.krishnan@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'balan.krishnan@alshirawimep.com', 1, 1, 5, '2020-08-30 10:02:27'),
(16, 'prabhu.kasinathan@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'prabhu.kasinathan@alshirawimep.com', 1, 2, 1, '2020-08-30 10:02:27'),
(17, 'shijo.joseph@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'shijo.joseph@alshirawimep.com', 1, 1, 5, '2020-08-30 10:02:27'),
(18, 'imran.kamaltheen@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'imran.kamaltheen@alshirawimep.com', 1, 1, 5, '2020-08-30 10:02:27'),
(19, 'ponnalagu.palanikumar@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'ponnalagu.palanikumar@alshirawimep.com', 1, 1, 5, '2020-08-30 10:02:27'),
(20, 'rafi.ahmed@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'rafi.ahmed@alshirawimep.com', 1, 1, 5, '2020-08-30 10:02:27'),
(21, 'karnan.periyasamy@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'karnan.periyasamy@alshirawimep.com', 1, 1, 5, '2020-08-30 10:02:28'),
(22, 'salu.george@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'salu.george@alshirawimep.com', 1, 2, 6, '2020-08-30 10:02:28'),
(23, 'syed.ahmed@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'syed.ahmed@alshirawimep.com', 1, 2, 6, '2020-08-30 10:02:28'),
(24, 'alfred.thomas@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'alfred.thomas@alshirawimep.com', 1, 2, 6, '2020-08-30 10:02:28'),
(25, 'ankit.bajpayee@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'ankit.bajpayee@alshirawimep.com', 1, 2, 6, '2020-08-30 10:02:28'),
(26, 'venkata.keshavarapu@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'venkata.keshavarapu@alshirawimep.com', 1, 2, 6, '2020-08-30 10:02:28'),
(27, 'sony.baby@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'sony.baby@alshirawimep.com', 1, 2, 6, '2020-08-30 10:02:28'),
(28, 'ramesh.subburaj@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'ramesh.subburaj@alshirawimep.com', 1, 2, 6, '2020-08-30 10:02:28'),
(29, 'krishnaraj.alagu@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'krishnaraj.alagu@alshirawimep.com', 1, 2, 6, '2020-08-30 10:02:28'),
(30, 'manoj.kumar@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'manoj.kumar@alshirawimep.com', 1, 2, 6, '2020-08-30 10:02:28'),
(31, 'mithun.kp@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'mithun.kp@alshirawimep.com', 1, 2, 6, '2020-08-30 10:02:28'),
(32, 'tharik.kamaludeen@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'tharik.kamaludeen@alshirawimep.com', 1, 2, 6, '2020-08-30 10:02:28'),
(33, 'shahed.hussain@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'shahed.hussain@alshirawimep.com', 1, 2, 6, '2020-08-30 10:02:28'),
(34, 'aditya.narayanan@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'aditya.narayanan@alshirawimep.com', 1, 2, 6, '2020-08-30 10:02:28'),
(35, 'haris.mohammed@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'haris.mohammed@alshirawimep.com', 1, 2, 6, '2020-08-30 10:02:28'),
(36, 'suresh.chattikkal@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'suresh.chattikkal@alshirawimep.com', 1, 2, 6, '2020-08-30 10:02:28'),
(37, 'mohamed.shakeeb@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'mohamed.shakeeb@alshirawimep.com', 1, 2, 6, '2020-08-30 10:02:28'),
(38, 'john.bandayrel@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'john.bandayrel@alshirawimep.com', 1, 2, 7, '2020-08-30 10:02:28'),
(39, 'syed.gufran@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'syed.gufran@alshirawimep.com', 1, 2, 7, '2020-08-30 10:02:28'),
(40, 'mohamed.asif@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'mohamed.asif@alshirawimep.com', 1, 2, 7, '2020-08-30 10:02:28'),
(41, 'raju.lama@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'raju.lama@alshirawimep.com', 1, 2, 7, '2020-08-30 10:02:28'),
(42, 'lijo.james@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'lijo.james@alshirawimep.com', 1, 1, 8, '2020-08-30 10:02:28'),
(43, 'saqeeb.chougule@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'saqeeb.chougule@alshirawimep.com', 1, 1, 8, '2020-08-30 10:02:29'),
(44, 'praveen.k@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'praveen.k@alshirawimep.com', 1, 1, 8, '2020-08-30 10:02:29'),
(45, 'nandu.krishnan@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'nandu.krishnan@alshirawimep.com', 1, 1, 8, '2020-08-30 10:02:29'),
(46, 'wasif.khan@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'wasif.khan@alshirawimep.com', 1, 1, 8, '2020-08-30 10:02:29'),
(47, 'kanchi.rajendran@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'kanchi.rajendran@alshirawimep.com', 1, 1, 8, '2020-08-30 10:02:29'),
(48, 'keyur.thakore@alshirawimep.ae', 'e10adc3949ba59abbe56e057f20f883e', 'keyur.thakore@alshirawimep.ae', 1, 1, 9, '2020-08-30 10:02:29'),
(49, 'avatar.singh@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'avatar.singh@alshirawimep.com', 1, 1, 9, '2020-08-30 10:02:29'),
(50, 'sidhesh.nadkarni@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'sidhesh.nadkarni@alshirawimep.com', 1, 1, 10, '2020-08-30 10:02:29'),
(51, 'anwar.basha@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'anwar.basha@alshirawimep.com', 1, 2, 10, '2020-08-30 10:02:29'),
(52, 'gaurav.patel@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'gaurav.patel@alshirawimep.com', 1, 1, 10, '2020-08-30 10:02:29'),
(53, 'nizam.khan@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'nizam.khan@alshirawimep.com', 1, 1, 10, '2020-08-30 10:02:29'),
(54, 'wasim.akram@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'wasim.akram@alshirawimep.com', 1, 1, 10, '2020-08-30 10:02:29'),
(55, 'milind.vaidya@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'milind.vaidya@alshirawimep.com', 1, 1, 10, '2020-08-30 10:02:29'),
(56, 'admin', '0192023a7bbd73250516f069df18b500', 'sabinonweb@gmail.com', 1, 3, 1, '2020-08-30 10:03:56'),
(57, 'anand', 'e10adc3949ba59abbe56e057f20f883e', 'anand.mohankumar@alshirawimep.com', 1, 2, 7, '2020-08-30 10:05:44'),
(58, 'engineer', 'e10adc3949ba59abbe56e057f20f883e', 'sabinchacko03@gmail.com', 1, 2, 6, '2020-08-30 11:58:32'),
(59, 'manager', 'e10adc3949ba59abbe56e057f20f883e', 'sabin.chacko@yahoo.in', 1, 1, 1, '2020-08-30 11:58:50');

-- --------------------------------------------------------

--
-- Table structure for table `user_designations`
--

DROP TABLE IF EXISTS `user_designations`;
CREATE TABLE IF NOT EXISTS `user_designations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `label` varchar(100) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `modified_by` int(11) NOT NULL DEFAULT 56,
  `modified_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_designations`
--

INSERT INTO `user_designations` (`id`, `name`, `label`, `status`, `modified_by`, `modified_date`) VALUES
(1, 'Sr.Project Manager', 'sr_project_manager', 1, 56, '2020-09-01 22:41:33'),
(2, 'Project Manager', 'project_manager', 1, 56, '2020-09-01 22:41:33'),
(3, 'Planning Dept.', 'planning', 1, 56, '2020-09-01 22:41:33'),
(4, 'Estimation Dept.', 'estimation', 1, 56, '2020-09-01 22:41:33'),
(5, 'Sr.Engineer', 'sr_engineer', 1, 56, '2020-09-01 22:41:33'),
(6, 'Engineer', 'engineer', 1, 56, '2020-09-01 22:41:33'),
(7, 'MEP ADMIN', 'mep_admin', 1, 56, '2020-09-01 22:41:33'),
(8, 'Drafting', 'drafting', 1, 56, '2020-09-01 22:41:33'),
(9, 'Lead Supervisor', 'lead_supervisor', 1, 56, '2020-09-01 22:41:33'),
(10, 'CC', 'cc', 1, 56, '2020-09-01 22:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `user_projects`
--

DROP TABLE IF EXISTS `user_projects`;
CREATE TABLE IF NOT EXISTS `user_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(5) NOT NULL,
  `project` int(5) NOT NULL,
  `added_by` int(5) NOT NULL,
  `added_date` datetime NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_projects`
--

INSERT INTO `user_projects` (`id`, `user`, `project`, `added_by`, `added_date`, `status`) VALUES
(1, 58, 1, 56, '2020-09-01 00:00:00', 1),
(2, 58, 2, 56, '2020-09-01 00:00:00', 1),
(3, 60, 2, 56, '2020-09-02 00:00:00', 1),
(4, 32, 4, 56, '2020-09-02 00:00:00', 1),
(5, 30, 4, 56, '2020-09-02 00:00:00', 1),
(6, 29, 3, 56, '2020-09-02 00:00:00', 1),
(7, 34, 3, 56, '2020-09-02 00:00:00', 1),
(8, 16, 1, 56, '2020-09-02 00:00:00', 1),
(9, 27, 1, 56, '2020-09-02 00:00:00', 1),
(10, 29, 2, 56, '2020-09-02 00:00:00', 1),
(11, 34, 2, 56, '2020-09-02 00:00:00', 1),
(12, 58, 4, 56, '2020-09-02 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

DROP TABLE IF EXISTS `user_type`;
CREATE TABLE IF NOT EXISTS `user_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `edit` int(2) NOT NULL DEFAULT 0,
  `label` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `type`, `edit`, `label`) VALUES
(1, 'manager', 0, 'Manager'),
(2, 'engineer', 0, 'Engineer'),
(3, 'admin', 0, 'Admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
