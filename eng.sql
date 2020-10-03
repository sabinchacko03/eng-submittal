-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 03, 2020 at 12:36 AM
-- Server version: 10.1.46-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nadeer500_eng`
--

-- --------------------------------------------------------

--
-- Table structure for table `asbuilt_drawing`
--

CREATE TABLE `asbuilt_drawing` (
  `id` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `proposed_make` varchar(200) NOT NULL,
  `planned_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `is_approved` int(11) NOT NULL DEFAULT '0',
  `modified_by` int(11) NOT NULL,
  `modified_date` date NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `asbuilt_drawing_log`
--

CREATE TABLE `asbuilt_drawing_log` (
  `id` int(11) NOT NULL,
  `shop_drawing` int(11) NOT NULL,
  `revision` int(11) NOT NULL,
  `actual_submittal_date` date NOT NULL,
  `returned_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `location` varchar(50) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `departments` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `status`) VALUES
(1, 'Plumbing', 1),
(2, 'HVAC', 1),
(3, 'Electrical', 1),
(4, 'Fire Fighting', 1),
(5, 'MEP', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gmailuser`
--

CREATE TABLE `gmailuser` (
  `id` int(11) NOT NULL,
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
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `main_contractors`
--

CREATE TABLE `main_contractors` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `proposed_make` varchar(200) NOT NULL,
  `planned_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `is_approved` int(11) NOT NULL DEFAULT '0',
  `modified_by` int(11) NOT NULL,
  `modified_date` date NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `project`, `department`, `name`, `description`, `proposed_make`, `planned_date`, `status`, `is_approved`, `modified_by`, `modified_date`, `active`) VALUES
(1, 1, 1, 'MEP/MS/FF-01 A', ' Pre-Qualification for the Fire Protection System', '', '2020-09-29', 4, 0, 56, '2020-09-16', 1),
(2, 1, 2, 'MEP/MS/FF-01 ', 'Fire Fighting pipes & Fittings\r\n', '', '2020-09-24', 0, 0, 56, '2020-09-16', 1),
(3, 2, 1, 'MEP/MS/FF-03', 'Shield, Kennedy, Nibco, Grinnel\r\n ', '', '2020-09-30', 0, 0, 56, '2020-09-16', 1),
(4, 2, 2, 'MEP/MS/FF-04', ' vv', '', '2020-09-30', 5, 0, 56, '2020-09-16', 1),
(5, 4, 3, 'MEP/MS/FF-05', 'ddd', '', '2020-09-29', 2, 0, 56, '2020-09-16', 1),
(6, 4, 4, 'MEP/MS/FF-06', ' dd', '', '2020-09-24', 0, 0, 56, '2020-09-16', 1),
(7, 2, 1, 'MEP/MS/FF-051', ' dd', '', '2020-09-18', 3, 0, 56, '2020-09-16', 1),
(8, 1, 2, 'R476-ASEME-MT-MEP/AC-02', 'Trosten (UAE) , Trane,York,Euroclima,Mekar\r\n ', 'TROSTEN', '2020-09-30', 5, 0, 56, '2020-09-16', 1),
(9, 2, 2, 'PALM-HVAC-01', ' FAHU', 'JCI', '2020-09-25', 5, 0, 56, '2020-09-17', 1),
(10, 1, 2, 'J1677-HVAC-01', ' FAHU', 'JCI', '2020-09-24', 1, 1, 56, '2020-09-17', 1),
(11, 1, 3, 'J677-EL-001', ' LV SWITCHGEAR', 'L&T', '2020-09-17', 1, 1, 56, '2020-09-17', 1),
(12, 6, 2, 'PDLM-MT-AC-01', ' VRF Units\r\n', 'RHEEM', '2020-09-22', 5, 0, 56, '2020-09-21', 1),
(13, 6, 2, 'PDLM-MT-AC-02', ' DX UNITS', 'RHEEM', '2020-09-24', 5, 0, 56, '2020-09-23', 1),
(14, 6, 2, 'PDLM-MT-AC-03', ' Ventilation Fans', 'S&P', '2020-10-24', 0, 0, 56, '2020-09-23', 1),
(15, 6, 2, 'PDLM-MT-AC-04', ' FAHU', 'VTS', '2020-09-24', 5, 0, 56, '2020-09-23', 1),
(16, 6, 2, 'PDLM-MT-AC-05', ' Pre Insulated Duct for FCU\'s', 'EASY', '2020-10-11', 5, 0, 56, '2020-09-23', 1),
(17, 6, 2, 'PDLM-MT-AC-06', ' Refrigerant Copper Pipes and Fittings', '', '2020-10-29', 0, 0, 56, '2020-09-23', 1),
(18, 6, 2, 'PDLM-MT-AC-07', ' GI Fire rated ducts & Accessories incl Fire rated VCD', '', '2020-10-14', 0, 0, 56, '2020-09-23', 1),
(19, 6, 2, 'PDLM-MT-AC-08', ' Insulation for Refrigerant Pipes', '', '2020-10-19', 0, 0, 56, '2020-09-23', 1),
(20, 6, 2, 'PDLM-MT-AC-09', ' Volume Control Dampers, NRD & PRD', '', '2020-10-13', 0, 0, 56, '2020-09-23', 1),
(21, 6, 2, 'PDLM-MT-AC-10', ' MD, MFSD & MSD', '', '2020-10-18', 0, 0, 56, '2020-09-23', 1),
(22, 6, 2, 'PDLM-MT-AC-11', ' Fire Dampers', '', '2020-10-18', 0, 0, 56, '2020-09-23', 1),
(23, 6, 2, 'PDLM-MT-AC-12', ' Supports and Hangers for Ref. Pipes', '', '2020-10-21', 0, 0, 56, '2020-09-23', 1),
(24, 6, 2, 'PDLM-MT-AC-13', ' Acoustic Duct Lining', '', '2020-10-15', 0, 0, 56, '2020-09-23', 1),
(25, 6, 2, 'PDLM-MT-AC-14', ' Flexible Duct Connector', 'DURODYNE', '2020-10-08', 5, 0, 56, '2020-09-23', 1),
(26, 6, 2, 'PDLM-MT-AC-15', ' Vibration Isolators', '', '2020-10-29', 0, 0, 56, '2020-09-23', 1),
(27, 6, 2, 'PDLM-MT-AC-16', ' Coatings, Adhesives and Sealants', 'NAPCO', '2020-10-08', 5, 0, 56, '2020-09-23', 1),
(28, 6, 2, 'PDLM-MT-AC-17', ' Sound Attenuators', '', '2020-11-13', 0, 0, 56, '2020-09-23', 1),
(29, 6, 2, 'PDLM-MT-AC-18', ' Access Doors for Fire Dampers', '', '2020-10-18', 0, 0, 56, '2020-09-23', 1),
(30, 6, 2, 'PDLM-MT-AC-19', ' Flexible Round Insulated Ducts', '', '2020-10-20', 0, 0, 56, '2020-09-23', 1),
(31, 6, 2, 'PDLM-MT-AC-20', ' Grills, Diffusers and Louvers', '', '2020-11-13', 0, 0, 56, '2020-09-23', 1),
(32, 6, 2, 'PDLM-MT-AC-21', ' Air Curtain', '', '2020-10-14', 0, 0, 56, '2020-09-23', 1),
(33, 6, 2, 'PDLM-MT-AC-22', ' MCC Control Panels', '', '2020-11-24', 0, 0, 56, '2020-09-23', 1),
(34, 6, 2, 'PDLM-MT-AC-23', ' MEP Identification Labels', '', '2020-10-29', 0, 0, 56, '2020-09-23', 1),
(35, 6, 2, 'PDLM-MT-AC-24', ' Fire Stopping Sealant - MEP', '', '2020-11-19', 0, 0, 56, '2020-09-23', 1),
(36, 6, 2, 'PDLM-MT-AC-25', ' Aluminum Cladding', '', '2020-11-19', 0, 0, 56, '2020-09-23', 1),
(37, 6, 2, 'PDLM-MT-AC-26', ' MS Ducting', '', '2020-10-14', 0, 0, 56, '2020-09-23', 1),
(38, 6, 2, 'PDLM-MT-AC-27', ' ESP', '', '2020-10-19', 0, 0, 56, '2020-09-23', 1),
(39, 6, 2, 'PDLM-MT-AC-28', ' GI Duct', '', '2020-10-14', 0, 0, 56, '2020-09-23', 1),
(40, 6, 2, 'PDLM-MT-AC-29', ' MS Duct Insulation', '', '2020-10-19', 0, 0, 56, '2020-09-23', 1),
(41, 6, 2, 'PDLM-MT-AC-30', ' CO Monitoring System', '', '2020-10-30', 0, 0, 56, '2020-09-23', 1),
(42, 6, 3, 'PDLM-MT-EL-01', ' uPVC Duct Pipes & Fittings for EL & ELV Systems', 'COSMOPLAST', '2020-09-24', 5, 0, 56, '2020-09-23', 1),
(43, 6, 3, 'PDLM-MT-EL-02', ' PVC Conduits & Accessories', 'DECODUCT', '2020-09-29', 5, 0, 56, '2020-09-23', 1),
(44, 6, 3, 'PDLM-MT-EL-03', ' GI Conduit & Accessories', 'DELTA', '2020-09-30', 5, 0, 56, '2020-09-23', 1),
(45, 6, 3, 'PDLM-MT-EL-04', ' GI Boxes', 'DECODUCT', '2020-09-29', 5, 0, 56, '2020-09-23', 1),
(46, 6, 3, 'PDLM-MT-EL-05', ' GI Flexible Conduit', 'DELTA', '2020-09-30', 5, 0, 56, '2020-09-23', 1),
(47, 6, 3, 'PDLM-MT-EL-06', ' Cable Tray, Trunking & Accessories', 'DELTA', '2020-09-30', 5, 0, 56, '2020-09-23', 1),
(48, 6, 3, 'PDLM-MT-EL-07', ' Cables and Wires', 'OMAN CABLES', '2020-10-04', 5, 0, 56, '2020-09-23', 1),
(49, 6, 3, 'PDLM-MT-EL-08', ' Fire Proof Cable FP 400', 'OMAN CABLES', '2020-10-06', 5, 0, 56, '2020-09-23', 1),
(50, 6, 3, 'PDLM-MT-EL-09', ' Fire Resistant Cable', '', '2020-10-18', 0, 0, 56, '2020-09-23', 1),
(51, 6, 3, 'PDLM-MT-EL-10', ' Heat Resistant Cable', 'TEKAB', '2020-10-11', 5, 0, 56, '2020-09-23', 1),
(52, 6, 3, 'PDLM-MT-EL-11', ' Earthing & Lightning Control System', 'RAYCHEM', '2020-10-05', 5, 0, 56, '2020-09-23', 1),
(53, 6, 3, 'PDLM-MT-EL-12', ' Lighting Protection System', 'RAYCHEM', '2020-10-06', 5, 0, 56, '2020-09-23', 1),
(54, 6, 3, 'PDLM-MT-EL-13', ' Structured Cabling System', '', '2020-11-20', 0, 0, 56, '2020-09-23', 1),
(55, 6, 3, 'PDLM-MT-EL-14', ' Fire Alarm & Voice Evacuation System', '', '2020-11-05', 0, 0, 56, '2020-09-23', 1),
(56, 6, 3, 'PDLM-MT-EL-15', ' Emergency Lighting System', '', '2020-11-05', 0, 0, 56, '2020-09-23', 1),
(57, 6, 3, 'PDLM-MT-EL-16', 'Isolators ', 'ABB & GEWISS', '2020-10-29', 5, 0, 56, '2020-09-23', 1),
(58, 6, 3, 'PDLM-MT-EL-17', ' CCTV System Incl UPS', '', '2020-11-12', 0, 0, 56, '2020-09-23', 1),
(59, 6, 3, 'PDLM-MT-EL-18', ' Access Control System', '', '2020-11-19', 0, 0, 56, '2020-09-23', 1),
(60, 6, 3, 'PDLM-MT-EL-19', ' Audio Intercom System', '', '2020-11-19', 0, 0, 56, '2020-09-23', 1),
(61, 6, 3, 'PDLM-MT-EL-20', ' Lighting Control System (Standalone)', 'OLITE', '2020-10-12', 5, 0, 56, '2020-09-23', 1),
(62, 6, 3, 'PDLM-MT-EL-21', ' Cable Glands & Lugs', '', '2020-10-19', 0, 0, 56, '2020-09-23', 1),
(63, 6, 3, 'PDLM-MT-EL-22', ' LV Switchgear, Capacitor Bank, ATS', '', '2020-10-25', 0, 0, 56, '2020-09-23', 1),
(64, 6, 3, 'PDLM-MT-EL-23', ' Wiring Accessories Incl Floor Box, Ceiling Rose, Door Bell', '', '2020-11-10', 0, 0, 56, '2020-09-23', 1),
(65, 6, 3, 'PDLM-MT-EL-24', ' Diesel Generator Set (Standby)', '', '2020-11-20', 0, 0, 56, '2020-09-23', 1),
(66, 6, 3, 'PDLM-MT-EL-25', ' Gate Barrier System', '', '2020-11-30', 0, 0, 56, '2020-09-23', 1),
(67, 6, 3, 'PDLM-MT-EL-26', ' Disable Alarm System', '', '2020-11-25', 0, 0, 56, '2020-09-23', 1),
(68, 6, 1, 'PDLM-MT-PL-01', ' uPVC Under Ground Drainage Pipe & Fittings', 'MPI/FLOWTECH', '2020-09-22', 5, 0, 56, '2020-09-23', 1),
(69, 6, 1, 'PDLM-MT-PL-02', ' uPVC Above Ground Drainage Pipe & Fittings', '', '2020-10-19', 0, 0, 56, '2020-09-23', 1),
(70, 6, 1, 'PDLM-MT-PL-03', ' uPVC High Pressure Pipe & Fittings', 'COSMOPLAST', '2020-09-22', 5, 0, 56, '2020-09-23', 1),
(71, 6, 1, 'PDLM-MT-PL-04', ' Low Noise Pipe & Fittings', '', '2020-10-14', 0, 0, 56, '2020-09-23', 1),
(72, 6, 1, 'PDLM-MT-PL-05', ' GI Pipe & Fittings', '', '2020-10-19', 0, 0, 56, '2020-09-23', 1),
(73, 6, 1, 'PDLM-MT-PL-06', 'Pex Pipe & Fittings ', '', '2020-10-22', 0, 0, 56, '2020-09-23', 1),
(74, 6, 1, 'PDLM-MT-PL-07', ' PPR Pipe Fittings', '', '2020-10-15', 0, 0, 56, '2020-09-23', 1),
(75, 6, 1, 'PDLM-MT-PL-08', ' Hangers and Supports', 'DIAMOND', '2020-10-06', 5, 0, 56, '2020-09-23', 1),
(76, 6, 1, 'PDLM-MT-PL-09', ' Floor Drain, Balcony drain & Floor Cleanout', '', '2020-10-25', 0, 0, 56, '2020-09-23', 1),
(77, 6, 1, 'PDLM-MT-PL-10', ' Rain Water Outlets, Planter Drain, Funnel Drain', '', '2020-10-29', 0, 0, 56, '2020-09-23', 1),
(78, 6, 1, 'PDLM-MT-PL-11', ' Manhole/Gully Trap Covers/Catch Basin Cover/Channel Grating', 'MBBM', '2020-10-08', 5, 0, 56, '2020-09-23', 1),
(79, 6, 1, 'PDLM-MT-PL-12', ' Water Supply Pipe Insulation - Rubber Insulation', '', '2020-10-15', 0, 0, 56, '2020-09-23', 1),
(80, 6, 1, 'PDLM-MT-PL-13', ' Water Heater', '', '2020-10-24', 0, 0, 56, '2020-09-23', 1),
(81, 6, 1, 'PDLM-MT-PL-14', ' Water Hammer Arrestors', 'PPP-USA', '2020-10-08', 5, 0, 56, '2020-09-23', 1),
(82, 6, 1, 'PDLM-MT-PL-15', ' Water Supply Valves ', '', '2020-10-29', 0, 0, 56, '2020-09-23', 1),
(83, 6, 1, 'PDLM-MT-PL-16', ' Domestic Pumps', '', '2020-10-29', 0, 0, 56, '2020-09-23', 1),
(84, 6, 1, 'PDLM-MT-PL-17', ' Sump Pumps', '', '2020-10-29', 0, 0, 56, '2020-09-23', 1),
(85, 6, 1, 'PDLM-MT-PL-18', ' GRP Water Tanks', 'PIPECO', '2020-09-22', 5, 0, 56, '2020-09-23', 1),
(86, 6, 1, 'PDLM-MT-PL-19', ' Chlorination & Disinfection of PL System', '', '2020-11-12', 0, 0, 56, '2020-09-23', 1),
(87, 6, 1, 'PDLM-MT-PL-20', ' Gully Trap/Catch Basin', '', '2020-10-12', 0, 0, 56, '2020-09-23', 1),
(88, 6, 1, 'PDLM-MT-PL-21', ' Aluminum Cladding Sheets', '', '2020-11-19', 0, 0, 56, '2020-09-23', 1),
(89, 6, 1, 'PDLM-MT-PL-22', ' uPVC, High Pressure & Galvanized Puddle Flanges', '', '2020-10-14', 0, 0, 56, '2020-09-23', 1),
(90, 6, 1, 'PDLM-MT-PL-23', ' Flexible Pipe Connector for Water Heater & Angle Valve', '', '2020-10-15', 0, 0, 56, '2020-09-23', 1),
(91, 6, 4, 'PDLM-MT-FF-01', ' GI Pipes & Fittings', '', '2020-11-13', 0, 0, 56, '2020-09-23', 1),
(92, 6, 4, 'PDLM-MT-FF-02', ' Fire Fighting Hangers and Supports', '', '2020-11-13', 0, 0, 56, '2020-09-23', 1),
(93, 6, 4, 'PDLM-MT-FF-03', ' Fire Fighting Valves, PRV, Landing Valve & Acc', '', '2020-11-13', 0, 0, 56, '2020-09-23', 1),
(94, 6, 4, 'PDLM-MT-FF-04', ' Fire Hose Reel & Cabinet', '', '2020-11-13', 0, 0, 56, '2020-09-23', 1),
(95, 6, 4, 'PDLM-MT-FF-05', ' Fire Extinguisher', '', '2020-11-13', 0, 0, 56, '2020-09-23', 1),
(96, 6, 4, 'PDLM-MT-FF-06', ' Clean Agent System (FM 200)', '', '2020-11-13', 0, 0, 56, '2020-09-23', 1),
(97, 6, 4, 'PDLM-MT-FF-07', ' Sprinkler Heads', '', '2020-11-13', 0, 0, 56, '2020-09-23', 1),
(98, 6, 4, 'PDLM-MT-FF-08', ' Generator Foam System', '', '2020-11-13', 0, 0, 56, '2020-09-23', 1),
(99, 6, 4, 'PDLM-MT-FF-09', ' LPG Deluge System', '', '2020-11-13', 0, 0, 56, '2020-09-23', 1),
(100, 6, 4, 'PDLM-MT-FF-10', ' Fire Pump Set', '', '2020-11-13', 0, 0, 56, '2020-09-23', 1),
(101, 6, 1, 'PDLM-MT-LPG-01', ' LPG System', '', '2020-11-29', 0, 0, 56, '2020-09-23', 1),
(102, 1, 2, 'AAC/222/MAS/MEP/AC-001', 'Flexible round insulated ducts\r\n', 'DELTA', '2020-05-31', 2, 0, 56, '2020-09-29', 1),
(103, 1, 2, 'AAC/222/MAS/MEP/AC-002', 'Flexible Duct Connector\r\n', 'DELTA', '2020-05-31', 2, 0, 56, '2020-10-01', 1),
(104, 1, 2, 'AAC/222/MAS/MEP/AC-003', 'Acoustic Duct Lining\r\n', 'Kimmco /  Leminar', '2020-06-20', 2, 0, 56, '2020-10-01', 1),
(105, 1, 2, 'AAC/222/MAS/MEP/AC-004', 'AC Copper Pipes supports ( Hangers for Refrigerant Pipes) ', 'Hira Walraven / Diamond Walraven', '2020-06-30', 2, 0, 56, '2020-10-01', 1),
(106, 1, 2, 'AAC/222/MAS/MEP/AC-005', 'Air Curtains\r\n', 'S&P / Leminar', '2020-07-20', 5, 0, 56, '2020-10-01', 1),
(107, 1, 3, 'AAC/222/MAS/MEP/EL-001 ', 'PVC Conduits and Accessories\r\n ', 'Decoduct / Interplast', '2020-04-30', 2, 0, 56, '2020-10-01', 1),
(108, 1, 3, 'AAC/222/MAS/MEP/EL-002', 'GI  Conduit & Accessories\r\n', 'ITCC / Haji commericial Company', '2020-04-30', 2, 0, 56, '2020-10-01', 1),
(109, 1, 3, 'AAC/222/MAS/MEP/EL-003', 'UPVC Duct Pipes And Fittings', 'Hepworth Gulf Eternit, Terrain', '2020-04-30', 2, 0, 56, '2020-10-01', 1),
(110, 1, 3, 'AAC/222/MAS/MEP/EL-004', ' GI Flexible Conduit And Adaptors', 'Barton / BMTS', '2020-05-26', 2, 0, 56, '2020-10-01', 1),
(111, 1, 3, 'AAC/222/MAS/MEP/EL-005', 'Earthing & Lighting Protection System\r\n', 'Erico / Al Tayer Engineering L.L.C', '2020-05-05', 3, 0, 56, '2020-10-01', 1),
(112, 1, 1, 'AAC/222/MAS/MEP/PL-001 ', 'Upvc Drainage Pipes & Fittings- Below Ground (Non- Pressurized)', 'Flowtech / MPI', '2020-04-22', 2, 0, 56, '2020-10-01', 1),
(113, 1, 1, 'AAC/222/MAS/MEP/PL-002 ', 'Upvc Drainage Pipes & Fittings - Below Ground (Pressurized). Below Ground Sump Pump / Transfer Pump Discharge Piping (Pressurized) ', 'Atlas / MPI', '2020-04-22', 2, 0, 56, '2020-10-01', 1),
(114, 1, 1, 'AAC/222/MAS/MEP/PL-003 ', 'Gully Trap & Catch Basin\r\n', 'Flowtech/MPI', '2020-04-22', 2, 0, 56, '2020-10-01', 1),
(115, 1, 1, 'AAC/222/MAS/MEP/PL-004 ', 'Upvc, High pressure and Galvanized puddle flanges\r\n', 'Waterline ', '2020-04-30', 5, 0, 56, '2020-10-01', 1),
(116, 1, 1, 'AAC/222/MAS/MEP/PL-005', 'HDPE Pipe & Fittings for water supply\r\n', 'Technopro', '2020-05-10', 2, 0, 56, '2020-10-01', 1),
(117, 1, 4, 'AAC/222/MAS/MEP/PL/FF-001', 'Underground HDPE pipes and fittings for Fire fighting works', 'Technopro / BMTS', '2020-06-10', 2, 0, 56, '2020-10-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `material_status`
--

CREATE TABLE `material_status` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `material_submittal_log` (
  `id` int(11) NOT NULL,
  `material` int(11) NOT NULL,
  `revision` int(11) NOT NULL,
  `actual_submittal_date` date NOT NULL,
  `returned_date` date NOT NULL,
  `doc1` text NOT NULL,
  `doc2` text NOT NULL,
  `status` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material_submittal_log`
--

INSERT INTO `material_submittal_log` (`id`, `material`, `revision`, `actual_submittal_date`, `returned_date`, `doc1`, `doc2`, `status`, `modified_by`, `modified_date`) VALUES
(1, 5, 0, '2020-09-16', '2020-09-18', '', '', 4, 56, '2020-09-17 00:50:36'),
(2, 5, 1, '2020-09-16', '2020-09-23', '', '', 4, 56, '2020-09-17 00:53:50'),
(3, 5, 2, '2020-09-16', '2020-09-25', '', '', 4, 56, '2020-09-17 01:02:14'),
(4, 0, 0, '0000-00-00', '0000-00-00', '', '', 0, 56, '2020-09-16 00:00:00'),
(5, 5, 3, '2020-09-16', '2020-09-30', '', '', 2, 56, '2020-09-17 01:02:24'),
(6, 1, 0, '2020-09-16', '2020-09-23', '', '', 4, 56, '2020-09-17 01:00:57'),
(7, 7, 0, '2020-09-16', '2020-09-18', '', '', 3, 56, '2020-09-16 17:11:35'),
(8, 7, 1, '2020-09-16', '2020-09-18', '', '', 3, 56, '2020-09-16 17:11:54'),
(9, 8, 0, '2020-09-17', '0000-00-00', '', '', 5, 56, '2020-09-17 00:00:00'),
(10, 4, 0, '2020-09-17', '0000-00-00', '', '', 5, 56, '2020-09-17 00:00:00'),
(11, 9, 0, '2020-09-17', '2020-09-18', '', '', 4, 56, '2020-09-17 09:47:54'),
(12, 9, 1, '2020-09-19', '0000-00-00', '', '', 5, 56, '2020-09-17 00:00:00'),
(13, 10, 0, '2020-09-17', '2020-09-19', '', '', 3, 56, '2020-09-17 10:04:57'),
(14, 10, 1, '2020-09-18', '2020-09-20', '', '', 1, 56, '2020-09-17 10:06:14'),
(15, 11, 0, '2020-09-18', '2020-09-19', '', '', 3, 56, '2020-09-17 10:31:48'),
(16, 11, 1, '2020-09-17', '2020-09-18', '', '', 1, 56, '2020-09-17 10:34:18'),
(17, 12, 0, '2020-09-22', '0000-00-00', '', '', 5, 56, '2020-09-21 00:00:00'),
(18, 13, 0, '2020-09-23', '0000-00-00', '', '', 5, 56, '2020-09-23 00:00:00'),
(19, 15, 0, '2020-09-23', '0000-00-00', '', '', 5, 56, '2020-09-24 00:00:00'),
(20, 25, 0, '2020-09-23', '0000-00-00', '', '', 5, 56, '2020-09-24 00:00:00'),
(21, 27, 0, '2020-09-23', '0000-00-00', '', '', 5, 56, '2020-09-24 00:00:00'),
(22, 42, 0, '2020-09-22', '0000-00-00', '', '', 5, 56, '2020-09-24 00:00:00'),
(23, 68, 0, '2020-09-22', '0000-00-00', '', '', 5, 56, '2020-09-24 00:00:00'),
(24, 70, 0, '2020-09-22', '0000-00-00', '', '', 5, 56, '2020-09-24 00:00:00'),
(25, 75, 0, '2020-09-22', '0000-00-00', '', '', 5, 56, '2020-09-24 00:00:00'),
(26, 78, 0, '2020-09-24', '0000-00-00', '', '', 5, 56, '2020-09-24 00:00:00'),
(27, 81, 0, '2020-09-24', '0000-00-00', '', '', 5, 56, '2020-09-24 00:00:00'),
(28, 85, 0, '2020-09-22', '0000-00-00', '', '', 5, 56, '2020-09-24 00:00:00'),
(29, 43, 0, '2020-09-24', '0000-00-00', '', '', 5, 56, '2020-09-24 00:00:00'),
(30, 44, 0, '2020-09-24', '0000-00-00', '', '', 5, 56, '2020-09-24 00:00:00'),
(31, 45, 0, '2020-09-24', '0000-00-00', '', '', 5, 56, '2020-09-24 00:00:00'),
(32, 47, 0, '2020-09-24', '0000-00-00', '', '', 5, 56, '2020-09-24 00:00:00'),
(33, 48, 0, '2020-09-24', '0000-00-00', '', '', 5, 56, '2020-09-24 00:00:00'),
(34, 51, 0, '2020-09-24', '0000-00-00', '', '', 5, 56, '2020-09-24 00:00:00'),
(35, 52, 0, '2020-09-24', '0000-00-00', '', '', 5, 56, '2020-09-24 00:00:00'),
(36, 57, 0, '2020-09-24', '0000-00-00', '', '', 5, 56, '2020-09-24 00:00:00'),
(37, 61, 0, '2020-09-24', '0000-00-00', '', '', 5, 56, '2020-09-24 00:00:00'),
(38, 46, 0, '2020-09-24', '0000-00-00', '', '', 5, 56, '2020-09-24 00:00:00'),
(39, 49, 0, '2020-09-24', '0000-00-00', '', '', 5, 56, '2020-09-24 00:00:00'),
(40, 53, 0, '2020-09-24', '0000-00-00', '', '', 5, 56, '2020-09-24 00:00:00'),
(41, 53, 1, '2020-09-24', '0000-00-00', '', '', 5, 56, '2020-09-24 00:00:00'),
(42, 16, 0, '2020-09-27', '0000-00-00', '', '', 5, 56, '2020-09-27 00:00:00'),
(43, 102, 0, '2020-05-09', '2020-05-21', '', '', 3, 56, '2020-09-29 08:54:32'),
(44, 102, 1, '2020-05-21', '2020-06-07', '', '', 3, 56, '2020-09-29 08:55:30'),
(45, 102, 2, '2020-06-08', '2020-06-17', '', '', 2, 56, '2020-09-29 08:56:28'),
(46, 103, 0, '2020-05-13', '2020-05-28', '', '', 2, 56, '2020-10-01 07:23:14'),
(47, 104, 0, '2020-05-18', '2020-06-09', '', '', 2, 56, '2020-10-01 07:24:32'),
(48, 105, 0, '2020-05-27', '2020-06-10', '', '', 3, 56, '2020-10-01 07:27:14'),
(49, 105, 1, '2020-06-11', '2020-06-17', '', '', 2, 56, '2020-10-01 07:28:06'),
(50, 106, 0, '2020-05-28', '2020-06-07', '', '', 3, 56, '2020-10-01 07:30:55'),
(51, 106, 1, '2020-06-07', '2020-06-17', '', '', 2, 56, '2020-10-01 07:31:57'),
(52, 106, 2, '2020-08-19', '2020-09-02', '', '', 3, 56, '2020-10-01 07:32:47'),
(53, 106, 3, '2020-09-14', '0000-00-00', '', '', 5, 56, '2020-10-01 00:00:00'),
(54, 107, 0, '2020-04-28', '2020-05-09', '', '', 2, 56, '2020-10-01 07:44:41'),
(55, 108, 0, '2020-04-28', '2020-05-06', '', '', 2, 56, '2020-10-01 07:47:26'),
(56, 109, 0, '2020-04-28', '2020-06-02', '', '', 2, 56, '2020-10-01 07:54:04'),
(57, 110, 0, '2020-04-28', '2020-05-05', '', '', 4, 56, '2020-10-01 07:56:41'),
(58, 110, 1, '2020-05-17', '2020-05-21', '', '', 2, 56, '2020-10-01 07:57:26'),
(59, 111, 0, '2020-04-28', '2020-05-05', '', '', 3, 56, '2020-10-01 07:59:18'),
(60, 112, 0, '2020-04-22', '2020-05-06', '', '', 3, 56, '2020-10-01 08:12:48'),
(61, 113, 0, '2020-04-22', '2020-05-06', '', '', 3, 56, '2020-10-01 08:13:47'),
(62, 113, 1, '2020-05-09', '2020-05-17', '', '', 2, 56, '2020-10-01 08:14:44'),
(63, 112, 1, '2020-05-09', '2020-05-17', '', '', 2, 56, '2020-10-01 08:15:48'),
(64, 114, 0, '2020-04-22', '2020-05-06', '', '', 2, 56, '2020-10-01 08:19:06'),
(65, 115, 0, '2020-04-26', '0000-00-00', '', '', 5, 56, '2020-10-01 00:00:00'),
(66, 116, 0, '2020-05-04', '2020-05-28', '', '', 3, 56, '2020-10-01 08:59:30'),
(67, 116, 1, '2020-06-01', '2020-06-09', '', '', 2, 56, '2020-10-01 09:00:37'),
(68, 116, 2, '2020-06-11', '2020-06-21', '', '', 2, 56, '2020-10-01 09:01:49'),
(69, 117, 0, '2020-06-09', '2020-06-17', '', '', 3, 56, '2020-10-01 09:06:59'),
(70, 117, 1, '2020-06-20', '2020-06-25', '', '', 3, 56, '2020-10-01 09:08:33'),
(71, 117, 2, '2020-06-25', '2020-06-29', '', '', 3, 56, '2020-10-01 09:09:33'),
(72, 117, 3, '2020-06-30', '2020-07-06', '', '', 3, 56, '2020-10-01 09:10:39'),
(73, 117, 4, '2020-07-07', '2020-07-21', '', '', 2, 56, '2020-10-01 09:12:47');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `link` text NOT NULL,
  `parent` int(3) NOT NULL,
  `order_id` int(3) NOT NULL,
  `status` int(3) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `link`, `parent`, `order_id`, `status`) VALUES
(1, 'Projects', '#', 0, 1, 1),
(2, 'Project Management', 'projects', 1, 1, 1),
(3, 'Material', '#', 0, 2, 1),
(4, 'Material Submittal', 'material', 3, 1, 1),
(5, 'Account', '#', 0, 4, 1),
(6, 'Logout', 'login/logout', 5, 1, 1),
(7, 'Shop Drawing', '#', 0, 3, 1),
(8, 'Shop Drawing Submittals', 'shop_drawing', 7, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `user_type` int(3) NOT NULL,
  `menu` int(11) NOT NULL,
  `edit_role` int(2) NOT NULL DEFAULT '0',
  `delete_role` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
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
  `status` int(2) NOT NULL DEFAULT '1',
  `modified_by` int(3) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `variation_plumbing` int(11) NOT NULL,
  `variation_hvac` int(11) NOT NULL,
  `variation_electrical` int(11) NOT NULL,
  `variation_ff` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `project_id`, `start_date`, `end_date`, `client`, `m_contractor`, `consultant`, `project_value`, `location`, `plumbing_total`, `hvac_total`, `electrical_total`, `ff_total`, `variation`, `manager`, `status`, `modified_by`, `modified_date`, `variation_plumbing`, `variation_hvac`, `variation_electrical`, `variation_ff`) VALUES
(1, 'Proposed Four Residential & Commercial building', 'J1677', '2020-09-02', '2021-12-31', 4, 4, 'Golden Square Engineering Consultants', 0, 'OUD METHA', 8031000, 13715000, 16374000, 4630000, 0, '4', 1, 16, '2020-09-02 00:00:00', 0, 0, 1200000, 0),
(2, '(B+G+13+Roof)  3 Number of Residential Building ', 'S001', '2016-05-05', '2020-12-31', 3, 3, 'Al Asri Engineering Consultant. ', 0, 'PALM JUMEIRAH', 6169500, 19100000, 14500000, 3330500, 0, '2', 1, 56, '2020-09-02 00:00:00', 0, 0, 0, 0),
(4, 'Al Qusais Residential Development', 'J1671', '2020-09-03', '2021-05-31', 2, 2, 'Schuster Pechtold', 0, 'AL QUASIS', 18000000, 30000000, 25000000, 0, 0, '5', 1, 30, '2020-09-03 00:00:00', 0, 0, 0, 0),
(6, 'Port De La Mer', 'J1676', '2020-09-28', '2022-03-19', 2, 1, 'Schuster Pechtold', 0, 'LA MER', 800000, 1000000, 5000000, 6000000, 0, '2', 1, 56, '2020-09-28 00:00:00', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shop_drawing`
--

CREATE TABLE `shop_drawing` (
  `id` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `proposed_make` varchar(200) NOT NULL,
  `planned_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `is_approved` int(11) NOT NULL DEFAULT '0',
  `modified_by` int(11) NOT NULL,
  `modified_date` date NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_drawing`
--

INSERT INTO `shop_drawing` (`id`, `project`, `department`, `name`, `description`, `proposed_make`, `planned_date`, `status`, `is_approved`, `modified_by`, `modified_date`, `active`) VALUES
(1, 6, 2, 'MEP/SD/AC-01', 'BUILDING 1, 2 & 3 BASEMENT FLOOR PLAN - AIR CONDITIONING LAYOUT (OVERALL)', '', '2020-09-28', 5, 0, 56, '2020-09-24', 1),
(2, 6, 2, 'MEP/SD/AC-01A', 'BUILDING 1 & 2 BASEMENT FLOOR PLAN (1 OF 2) - AIR CONDITIONING LAYOUT', '', '2020-09-28', 5, 0, 56, '2020-09-24', 1),
(3, 6, 2, 'MEP/SD/AC-01B', 'BUILDING 3 BASEMENT FLOOR PLAN (2 OF 2) - AIR CONDITIONING LAYOUT', '', '2020-09-28', 5, 0, 56, '2020-09-28', 1),
(4, 6, 2, 'MEP/SD/AC-02', 'BUILDING 1, 2 & 3 GROUND FLOOR PLAN - AIR CONDITIONING LAYOUT (OVERALL)', '', '2020-10-25', 0, 0, 56, '2020-09-28', 1),
(5, 6, 2, 'MEP/SD/AC-02A', 'BUILDING 1 & 2 GROUND FLOOR PLAN (1 OF 2) - AIR CONDITIONING LAYOUT', '', '2020-10-25', 0, 0, 56, '2020-09-28', 1),
(6, 6, 2, 'MEP/SD/AC-02B', 'BUILDING 3 GROUND FLOOR PLAN (2 OF 2) - AIR CONDITIONING LAYOUT', '', '2020-10-25', 0, 0, 56, '2020-09-28', 1),
(7, 6, 2, 'MEP/SD/B01/AC-03', 'BUILDING 1 - 1ST FLOOR PLAN - AIR CONDITIONING LAYOUT', '', '2020-10-28', 0, 0, 56, '2020-09-28', 1),
(8, 6, 2, 'MEP/SD/B02/AC-03', 'BUILDING 2 - 1ST FLOOR PLAN - AIR CONDITIONING LAYOUT', '', '2020-11-01', 0, 0, 56, '2020-09-28', 1),
(9, 6, 2, 'MEP/SD/B03/AC-03', 'BUILDING 3 - 1ST FLOOR PLAN - AIR CONDITIONING LAYOUT', '', '2020-11-03', 0, 0, 56, '2020-09-28', 1),
(10, 6, 2, 'MEP/SD/B01/AC-04', 'BUILDING 1 – 2ND & 3RD FLOOR PLAN - AIR CONDITIONING LAYOUT', '', '2020-11-07', 0, 0, 56, '2020-09-28', 1),
(11, 6, 2, 'MEP/SD/B02/AC-04', 'BUILDING 2 - 2ND & 3RD FLOOR PLAN - AIR CONDITIONING LAYOUT', '', '2020-11-10', 0, 0, 56, '2020-09-28', 1),
(12, 6, 2, 'MEP/SD/B03/AC-04', 'BUILDING 3 - 2ND & 3RD FLOOR PLAN - AIR CONDITIONING LAYOUT', '', '2020-11-14', 0, 0, 56, '2020-09-28', 1),
(13, 6, 2, 'MEP/SD/B01/AC-05', 'BUILDING 1 – 4TH FLOOR PLAN - AIR CONDITIONING LAYOUT', '', '2020-11-17', 0, 0, 56, '2020-09-28', 1),
(14, 6, 2, 'MEP/SD/B02/AC-05', 'BUILDING 2 – 4TH FLOOR PLAN - AIR CONDITIONING LAYOUT', '', '2020-11-21', 0, 0, 56, '2020-09-28', 1),
(15, 6, 2, 'MEP/SD/B03/AC-05', 'BUILDING 3 - 4TH FLOOR PLAN - AIR CONDITIONING LAYOUT', '', '2020-11-24', 0, 0, 56, '2020-09-28', 1),
(16, 6, 2, 'MEP/SD/B01/AC-06', 'BUILDING 1 – 5TH FLOOR PLAN - AIR CONDITIONING LAYOUT', '', '2020-11-28', 0, 0, 56, '2020-09-28', 1),
(17, 6, 2, 'MEP/SD/B02/AC-06', 'BUILDING 2 – 5TH FLOOR PLAN - AIR CONDITIONING LAYOUT', '', '2020-12-01', 0, 0, 56, '2020-09-28', 1),
(18, 6, 2, 'MEP/SD/B03/AC-06', 'BUILDING 3 - 5TH FLOOR PLAN - AIR CONDITIONING LAYOUT', '', '2020-12-05', 0, 0, 56, '2020-09-28', 1),
(19, 6, 2, 'MEP/SD/B01/AC-07', 'BUILDING 1 – 6TH FLOOR PLAN - AIR CONDITIONING LAYOUT', '', '2020-12-08', 0, 0, 56, '2020-09-28', 1),
(20, 6, 2, 'MEP/SD/B02/AC-07', 'BUILDING 2 – 6TH FLOOR PLAN - AIR CONDITIONING LAYOUT', '', '2020-12-12', 0, 0, 56, '2020-09-28', 1),
(21, 6, 2, 'MEP/SD/B03/AC-07', 'BUILDING 3 - 6TH FLOOR PLAN - AIR CONDITIONING LAYOUT', '', '2020-12-15', 0, 0, 56, '2020-09-28', 1),
(22, 6, 2, 'MEP/SD/B01/AC-08', 'BUILDING 1 – 7TH FLOOR PLAN - AIR CONDITIONING LAYOUT', '', '2020-12-19', 0, 0, 56, '2020-09-28', 1),
(23, 6, 2, 'MEP/SD/B02/AC-08', 'BUILDING 2 – 7TH FLOOR PLAN - AIR CONDITIONING LAYOUT', '', '2020-12-22', 0, 0, 56, '2020-09-28', 1),
(24, 6, 2, 'MEP/SD/B03/AC-08', 'BUILDING 3 - 7TH FLOOR PLAN - AIR CONDITIONING LAYOUT', '', '2020-12-26', 0, 0, 56, '2020-09-28', 1),
(25, 6, 2, 'MEP/SD/B02/AC-09', 'BUILDING 2 – ROOF FLOOR PLAN - AIR CONDITIONING LAYOUT', '', '2020-12-29', 0, 0, 56, '2020-09-28', 1),
(26, 6, 2, 'MEP/SD/B03/AC-09', 'BUILDING 3 - ROOF FLOOR PLAN - AIR CONDITIONING LAYOUT', '', '2020-12-29', 0, 0, 56, '2020-09-28', 1),
(27, 6, 2, 'MEP/SD/VENT-01', 'BUILDING 1, 2 & 3 BASEMENT FLOOR PLAN - VENTILATION LAYOUT (OVERALL)', '', '2020-10-01', 5, 0, 56, '2020-09-28', 1),
(28, 6, 2, 'MEP/SD/VENT-01A', 'BUILDING 1 & 2 BASEMENT FLOOR PLAN (1 OF 2) - VENTILATION LAYOUT', '', '2020-10-01', 5, 0, 56, '2020-09-28', 1),
(29, 6, 2, 'MEP/SD/VENT-01B', 'BUILDING 3 BASEMENT FLOOR PLAN (2 OF 2) - VENTILATION LAYOUT', '', '2020-10-01', 5, 0, 56, '2020-09-28', 1),
(30, 6, 2, 'MEP/SD/VENT-02', 'BUILDING 1, 2 & 3 GROUND FLOOR PLAN - VENTILATION LAYOUT (OVERALL)', '', '2020-10-05', 0, 0, 56, '2020-09-28', 1),
(31, 6, 2, 'MEP/SD/VENT-02A', 'BUILDING 1 & 2 GROUND FLOOR PLAN (1 OF 2) - VENTILATION LAYOUT', '', '2020-10-05', 0, 0, 56, '2020-09-28', 1),
(32, 6, 2, 'MEP/SD/VENT-02B', 'BUILDING 3 GROUND FLOOR PLAN (2 OF 2) - VENTILATION LAYOUT', '', '2020-10-05', 0, 0, 56, '2020-09-28', 1),
(33, 6, 2, 'MEP/SD/B01/VENT-03', 'BUILDING 1 - 1ST FLOOR PLAN - VENTILATION LAYOUT', '', '2020-10-08', 0, 0, 56, '2020-09-28', 1),
(34, 6, 2, 'MEP/SD/B02/VENT-03', 'BUILDING 2 - 1ST FLOOR PLAN - VENTILATION LAYOUT', '', '2020-10-11', 0, 0, 56, '2020-09-28', 1),
(35, 6, 2, 'MEP/SD/B03/VENT-03', 'BUILDING 3 - 1ST FLOOR PLAN - VENTILATION LAYOUT', '', '2020-10-13', 0, 0, 56, '2020-09-28', 1),
(36, 6, 2, 'MEP/SD/B01/VENT-04', 'BUILDING 1 – 2ND & 3RD FLOOR PLAN - VENTILATION LAYOUT', '', '2020-10-15', 0, 0, 56, '2020-09-28', 1),
(37, 6, 2, 'MEP/SD/B02/VENT-04', 'BUILDING 2 - 2ND & 3RD FLOOR PLAN - VENTILATION LAYOUT', '', '2020-10-19', 0, 0, 56, '2020-09-28', 1),
(38, 6, 2, 'MEP/SD/B03/VENT-04', 'BUILDING 3 - 2ND & 3RD FLOOR PLAN - VENTILATION LAYOUT', '', '2020-10-22', 0, 0, 56, '2020-09-28', 1),
(39, 6, 2, 'MEP/SD/B01/VENT-05', 'BUILDING 1 – 4TH FLOOR PLAN - VENTILATION LAYOUT', '', '2020-10-25', 0, 0, 56, '2020-09-28', 1),
(40, 6, 2, 'MEP/SD/B02/VENT-05', 'BUILDING 2 – 4TH FLOOR PLAN - VENTILATION LAYOUT', '', '2020-10-28', 0, 0, 56, '2020-09-28', 1),
(41, 6, 2, 'MEP/SD/B03/VENT-05', 'BUILDING 3 - 4TH FLOOR PLAN - VENTILATION LAYOUT', '', '2020-10-31', 0, 0, 56, '2020-09-28', 1),
(42, 6, 2, 'MEP/SD/B01/VENT-06', 'BUILDING 1 – 5TH FLOOR PLAN - VENTILATION LAYOUT', '', '2020-11-02', 0, 0, 56, '2020-09-28', 1),
(43, 6, 2, 'MEP/SD/B02/VENT-06', 'BUILDING 2 – 5TH FLOOR PLAN - VENTILATION LAYOUT', '', '2020-11-05', 0, 0, 56, '2020-09-28', 1),
(44, 6, 2, 'MEP/SD/B03/VENT-06', 'BUILDING 3 - 5TH FLOOR PLAN - VENTILATION LAYOUT', '', '2020-11-08', 0, 0, 56, '2020-09-28', 1),
(45, 6, 2, 'MEP/SD/B01/VENT-07', 'BUILDING 1 – 6TH FLOOR PLAN - VENTILATION LAYOUT', '', '2020-11-10', 0, 0, 56, '2020-09-28', 1),
(46, 6, 2, 'MEP/SD/B02/VENT-07', 'BUILDING 2 – 6TH FLOOR PLAN - VENTILATION LAYOUT', '', '2020-11-12', 0, 0, 56, '2020-09-28', 1),
(47, 6, 2, 'MEP/SD/B03/VENT-07', 'BUILDING 3 - 6TH FLOOR PLAN - VENTILATION LAYOUT', '', '2020-11-16', 0, 0, 56, '2020-09-28', 1),
(48, 6, 2, 'MEP/SD/B01/VENT-08', 'BUILDING 1 – 7TH FLOOR PLAN - VENTILATION LAYOUT', '', '2020-11-19', 0, 0, 56, '2020-09-28', 1),
(49, 6, 2, 'MEP/SD/B02/VENT-08', 'BUILDING 2 – 7TH FLOOR PLAN - VENTILATION LAYOUT', '', '2020-11-22', 0, 0, 56, '2020-09-28', 1),
(50, 6, 2, 'MEP/SD/B03/VENT-08', 'BUILDING 3 - 7TH FLOOR PLAN - VENTILATION LAYOUT', '', '2020-11-24', 0, 0, 56, '2020-09-28', 1),
(51, 6, 2, 'MEP/SD/B02/VENT-09', 'BUILDING 2 – ROOF FLOOR PLAN - VENTILATION LAYOUT', '', '2020-11-26', 0, 0, 56, '2020-09-28', 1),
(52, 6, 2, 'MEP/SD/B01/VENT-10', 'BUILDING 1 VENTILATION SCHEMATIC RISER DIAGRAM', '', '2020-11-29', 0, 0, 56, '2020-09-28', 1),
(53, 6, 2, 'MEP/SD/B02/VENT-10', 'BUILDING 2 VENTILATION SCHEMATIC RISER DIAGRAM', '', '2020-12-01', 0, 0, 56, '2020-09-28', 1),
(54, 6, 2, 'MEP/SD/B03/VENT-10', 'BUILDING 3 VENTILATION SCHEMATIC RISER DIAGRAM', '', '2020-12-03', 0, 0, 56, '2020-09-28', 1),
(55, 6, 2, 'MEP/SD/SM-01', 'BUILDING 1, 2 & 3 BASEMENT FLOOR PLAN - SMOKE CONTROL LAYOUT (OVERALL)', '', '2020-11-02', 0, 0, 56, '2020-09-28', 1),
(56, 6, 2, 'MEP/SD/SM-01A', 'BUILDING 1 & 2 BASEMENT FLOOR PLAN (1 OF 2) - SMOKE CONTROL LAYOUT', '', '2020-11-04', 0, 0, 56, '2020-09-28', 1),
(57, 6, 2, 'MEP/SD/SM-01B', 'BUILDING 3 BASEMENT FLOOR PLAN (2 OF 2) - SMOKE CONTROL LAYOUT', '', '2020-11-05', 0, 0, 56, '2020-09-28', 1),
(58, 6, 2, 'MEP/SD/SM-02', 'BUILDING 1, 2 & 3 GROUND FLOOR PLAN - SMOKE CONTROL LAYOUT (OVERALL)', '', '2020-11-08', 0, 0, 56, '2020-09-28', 1),
(59, 6, 2, 'MEP/SD/SM-02A', 'BUILDING 1 & 2 GROUND FLOOR PLAN (1 OF 2) - SMOKE CONTROL LAYOUT', '', '2020-11-10', 0, 0, 56, '2020-09-28', 1),
(60, 6, 2, 'MEP/SD/SM-02B', 'BUILDING 3 GROUND FLOOR PLAN (2 OF 2) - SMOKE CONTROL LAYOUT', '', '2020-11-12', 0, 0, 56, '2020-09-28', 1),
(61, 6, 2, 'MEP/SD/B01/SM-03', ' BUILDING 1 - 1ST FLOOR PLAN - SMOKE CONTROL LAYOUT', '', '2020-11-14', 0, 0, 56, '2020-09-28', 1),
(62, 6, 2, 'MEP/SD/B02/SM-03', 'BUILDING 2 - 1ST FLOOR PLAN - SMOKE CONTROL LAYOUT', '', '2020-11-16', 0, 0, 56, '2020-09-28', 1),
(63, 6, 2, 'MEP/SD/B03/SM-03', 'BUILDING 3 - 1ST FLOOR PLAN - SMOKE CONTROL LAYOUT', '', '2020-11-18', 0, 0, 56, '2020-09-28', 1),
(64, 6, 2, 'MEP/SD/B01/SM-04', 'BUILDING 1 – 2ND & 3RD FLOOR PLAN - SMOKE CONTROL LAYOUT', '', '2020-11-20', 0, 0, 56, '2020-09-28', 1),
(65, 6, 2, 'MEP/SD/B02/SM-04', 'BUILDING 2 - 2ND & 3RD FLOOR PLAN - SMOKE CONTROL LAYOUT', '', '2020-11-22', 0, 0, 56, '2020-09-28', 1),
(66, 6, 2, 'MEP/SD/B03/SM-04', 'BUILDING 3 - 2ND & 3RD FLOOR PLAN - SMOKE CONTROL LAYOUT', '', '2020-11-24', 0, 0, 56, '2020-09-28', 1),
(67, 6, 2, 'MEP/SD/B01/SM-05', 'BUILDING 1 – 4TH FLOOR PLAN - SMOKE CONTROL LAYOUT', '', '2020-11-26', 0, 0, 56, '2020-09-28', 1),
(68, 6, 2, 'MEP/SD/B02/SM-05', 'BUILDING 2 – 4TH FLOOR PLAN - SMOKE CONTROL LAYOUT', '', '2020-11-28', 0, 0, 56, '2020-09-28', 1),
(69, 6, 2, 'MEP/SD/B03/SM-05', 'BUILDING 3 - 4TH FLOOR PLAN - SMOKE CONTROL LAYOUT', '', '2020-11-30', 0, 0, 56, '2020-09-28', 1),
(70, 6, 2, 'MEP/SD/B01/SM-06', 'BUILDING 1 – 5TH FLOOR PLAN - SMOKE CONTROL LAYOUT', '', '2020-12-02', 0, 0, 56, '2020-09-28', 1),
(71, 6, 2, 'MEP/SD/B02/SM-06', 'BUILDING 2 – 5TH FLOOR PLAN - SMOKE CONTROL LAYOUT', '', '2020-12-03', 0, 0, 56, '2020-09-28', 1),
(72, 6, 2, 'MEP/SD/B03/SM-06', 'BUILDING 3 - 5TH FLOOR PLAN - SMOKE CONTROL LAYOUT', '', '2020-12-06', 0, 0, 56, '2020-09-28', 1),
(73, 6, 2, 'MEP/SD/B01/SM-07', 'BUILDING 1 – 6TH FLOOR PLAN - SMOKE CONTROL LAYOUT', '', '2020-12-08', 0, 0, 56, '2020-09-28', 1),
(74, 6, 2, 'MEP/SD/B02/SM-07', 'BUILDING 2 – 6TH FLOOR PLAN - SMOKE CONTROL LAYOUT', '', '2020-12-10', 0, 0, 56, '2020-09-28', 1),
(75, 6, 2, 'MEP/SD/B03/SM-07', 'BUILDING 3 - 6TH FLOOR PLAN - SMOKE CONTROL LAYOUT', '', '2020-12-12', 0, 0, 56, '2020-09-28', 1),
(76, 6, 2, 'MEP/SD/B01/SM-08', 'BUILDING 1 – 7TH FLOOR PLAN - SMOKE CONTROL LAYOUT', '', '2020-12-14', 0, 0, 56, '2020-09-28', 1),
(77, 6, 2, 'MEP/SD/B02/SM-08', 'BUILDING 2 – 7TH FLOOR PLAN - SMOKE CONTROL LAYOUT', '', '2020-12-16', 0, 0, 56, '2020-09-28', 1),
(78, 6, 2, 'MEP/SD/B03/SM-08', 'BUILDING 3 - 7TH FLOOR PLAN - SMOKE CONTROL LAYOUT', '', '2020-12-17', 0, 0, 56, '2020-09-28', 1),
(79, 6, 2, 'MEP/SD/B01/SM-09', 'BUILDING 1 – ROOF FLOOR PLAN - SMOKE CONTROL LAYOUT', '', '2020-12-20', 0, 0, 56, '2020-09-28', 1),
(80, 6, 2, 'MEP/SD/B02/SM-09', 'BUILDING 2 – ROOF FLOOR PLAN - SMOKE CONTROL LAYOUT', '', '2020-12-22', 0, 0, 56, '2020-09-28', 1),
(81, 6, 2, 'MEP/SD/B03/SM-09', 'BUILDING 3 – ROOF FLOOR PLAN - SMOKE CONTROL LAYOUT', '', '2020-12-24', 0, 0, 56, '2020-09-28', 1),
(82, 6, 2, 'MEP/SD/B01/SM-10', ' BUILDING 1 SMOKE SCHEMATIC RISER DIAGRAM', '', '2020-12-26', 0, 0, 56, '2020-09-28', 1),
(83, 6, 2, 'MEP/SD/B02/SM-10', 'BUILDING 2 SMOKE SCHEMATIC RISER DIAGRAM', '', '2020-12-28', 0, 0, 56, '2020-09-28', 1),
(84, 6, 2, 'MEP/SD/B03/SM-10', 'BUILDING 3 SMOKE SCHEMATIC RISER DIAGRAM\r\n', '', '2020-12-30', 0, 0, 56, '2020-09-28', 1),
(85, 6, 3, 'MEP/SD/EP-01', 'BUILDING 1, 2 & 3 BASEMENT FLOOR PLAN - POWER LAYOUT (OVERALL)', '', '2020-09-28', 5, 0, 56, '2020-09-28', 1),
(86, 6, 3, 'MEP/SD/EP-01A', 'BUILDING 1 & 2 BASEMENT FLOOR PLAN (1 OF 2) - POWER LAYOUT', '', '2020-09-30', 5, 0, 56, '2020-09-28', 1),
(87, 6, 3, 'MEP/SD/EP-01B', 'BUILDING 3 BASEMENT FLOOR PLAN (2 OF 2) - POWER LAYOUT', '', '2020-10-04', 5, 0, 56, '2020-09-28', 1),
(88, 6, 3, 'MEP/SD/EP-02', 'BUILDING 1, 2 & 3 GROUND FLOOR PLAN - POWER LAYOUT (OVERALL)', '', '2020-10-06', 0, 0, 56, '2020-09-28', 1),
(89, 6, 3, 'MEP/SD/EP-02A', 'BUILDING 1 & 2 GROUND FLOOR PLAN (1 OF 2) - POWER LAYOUT', '', '2020-10-08', 0, 0, 56, '2020-09-28', 1),
(90, 6, 3, 'MEP/SD/EP-02B', 'BUILDING 3 GROUND FLOOR PLAN (2 OF 2) - POWER LAYOUT', '', '2020-10-11', 0, 0, 56, '2020-09-28', 1),
(91, 6, 3, 'MEP/SD/B01/EP-03', 'BUILDING 1 - 1ST FLOOR PLAN - POWER LAYOUT\r\n', '', '2020-10-13', 0, 0, 56, '2020-09-28', 1),
(92, 6, 3, 'MEP/SD/B02/EP-03', 'BUILDING 2 - 1ST FLOOR PLAN - POWER LAYOUT', '', '2020-10-15', 0, 0, 56, '2020-09-28', 1),
(93, 6, 3, 'MEP/SD/B03/EP-03', 'BUILDING 3 - 1ST FLOOR PLAN - POWER LAYOUT', '', '2020-10-19', 0, 0, 56, '2020-09-28', 1),
(94, 6, 3, 'MEP/SD/B01/EP-04', 'BUILDING 1 – 2ND TO 4TH FLOOR PLAN - POWER LAYOUT', '', '2020-10-20', 0, 0, 56, '2020-09-28', 1),
(95, 6, 3, 'MEP/SD/B02/EP-04', 'BUILDING 2 - 2ND TO 4TH FLOOR PLAN - POWER LAYOUT', '', '2020-10-22', 0, 0, 56, '2020-09-28', 1),
(96, 6, 3, 'MEP/SD/B03/EP-04', 'BUILDING 3 - 2ND TO 4TH FLOOR PLAN - POWER LAYOUT', '', '2020-11-20', 0, 0, 56, '2020-09-28', 1),
(97, 6, 3, 'MEP/SD/B01/EP-05', 'BUILDING 1 – 5TH FLOOR PLAN - POWER LAYOUT', '', '2020-10-27', 0, 0, 56, '2020-09-28', 1),
(98, 6, 3, 'MEP/SD/B02/EP-05', 'BUILDING 2 – 5TH FLOOR PLAN - POWER LAYOUT', '', '2020-10-29', 0, 0, 56, '2020-09-28', 1),
(99, 6, 3, 'MEP/SD/B03/EP-05', 'BUILDING 3 - 5TH FLOOR PLAN - POWER LAYOUT', '', '2020-11-22', 0, 0, 56, '2020-09-28', 1),
(100, 6, 3, 'MEP/SD/B01/EP-06', 'BUILDING 1 – 6TH FLOOR PLAN - POWER LAYOUT', '', '2020-11-04', 0, 0, 56, '2020-09-28', 1),
(101, 6, 3, 'MEP/SD/B02/EP-06', 'BUILDING 2 – 6TH FLOOR PLAN - POWER LAYOUT', '', '2020-11-08', 0, 0, 56, '2020-09-28', 1),
(102, 6, 3, 'MEP/SD/B03/EP-06', 'BUILDING 3 - 6TH FLOOR PLAN - POWER LAYOUT', '', '2020-11-24', 0, 0, 56, '2020-09-28', 1),
(103, 6, 3, 'MEP/SD/B01/EP-07', 'BUILDING 1 – 7TH FLOOR PLAN - POWER LAYOUT', '', '2020-11-12', 0, 0, 56, '2020-09-28', 1),
(104, 6, 3, 'MEP/SD/B02/EP-07', 'BUILDING 2 – 7TH FLOOR PLAN - POWER LAYOUT', '', '2020-11-15', 0, 0, 56, '2020-09-28', 1),
(105, 6, 3, 'MEP/SD/B03/EP-07', 'BUILDING 3 - 7TH FLOOR PLAN - POWER LAYOUT', '', '2020-11-24', 0, 0, 56, '2020-09-28', 1),
(106, 6, 3, 'MEP/SD/B01/EP-08', 'BUILDING 1 – ROOF FLOOR PLAN - POWER LAYOUT', '', '2020-11-19', 0, 0, 56, '2020-09-28', 1),
(107, 6, 3, 'MEP/SD/B02/EP-08', 'BUILDING 2 – ROOF FLOOR PLAN - POWER LAYOUT', '', '2020-11-22', 0, 0, 56, '2020-09-28', 1),
(108, 6, 3, 'MEP/SD/B03/EP-08', 'BUILDING 3 - ROOF FLOOR PLAN - POWER LAYOUT', '', '2020-11-30', 0, 0, 56, '2020-09-28', 1),
(109, 6, 3, 'MEP/SD/EP-09', 'BUILDING 1, 2 & 3 – ELECTRICAL SERVICE – SINGLE LINE DIAGRAM', '', '2020-12-24', 0, 0, 56, '2020-09-28', 1),
(110, 6, 3, 'MEP/SD/EP-10', 'POWER SETTING OUT LAYOUT\r\n', '', '2020-10-15', 0, 0, 56, '2020-09-28', 1),
(111, 6, 3, 'MEP/SD/EP-11', ' GENERATOR ROOM LAYOUT', '', '2020-12-30', 0, 0, 56, '2020-09-28', 1),
(112, 6, 3, 'MEP/SD/EP-12', 'LV ROOM DETAILS\r\n', '', '2020-12-30', 0, 0, 56, '2020-09-28', 1),
(113, 6, 3, 'MEP/SD/EP-13', 'ELECTRICAL ROOM DETAILS\r\n', '', '2020-12-30', 0, 0, 56, '2020-09-28', 1),
(114, 6, 3, 'MEP/SD/EL-01', 'BUILDING 1, 2 & 3 BASEMENT FLOOR PLAN - LIGHTING LAYOUT (OVERALL)', '', '2020-09-28', 0, 0, 56, '2020-09-28', 1),
(115, 6, 1, 'MEP/SD/PL/DR-01', 'BUILDING 1, 2 & 3 BASEMENT FLOOR PLAN - DRAINAGE LAYOUT (OVERALL)', '', '2020-10-28', 5, 0, 56, '2020-09-28', 1),
(116, 6, 1, 'MEP/SD/PL/DR-01A', 'BUILDING 1 & 2 BASEMENT FLOOR PLAN (1 OF 2) - DRAINAGE LAYOUT', '', '2020-10-28', 5, 0, 56, '2020-09-28', 1),
(117, 6, 1, 'MEP/SD/PL/DR-01B', 'BUILDING 3 BASEMENT FLOOR PLAN (2 OF 2) - DRAINAGE LAYOUT', '', '2020-10-28', 5, 0, 56, '2020-09-28', 1),
(118, 6, 1, 'MEP/SD/PL/DR-02', 'BUILDING 1, 2 & 3 GROUND FLOOR PLAN - DRAINAGE LAYOUT (OVERALL)', '', '2020-10-05', 0, 0, 56, '2020-09-29', 1),
(119, 6, 1, 'MEP/SD/PL/DR-02A', 'BUILDING 1 & 2 GROUND FLOOR PLAN (1 OF 2) - DRAINAGE LAYOUT', '', '2020-10-05', 0, 0, 56, '2020-09-29', 1),
(120, 6, 1, 'MEP/SD/PL/DR-02B', 'BUILDING 3 GROUND FLOOR PLAN (2 OF 2) - DRAINAGE LAYOUT', '', '2020-10-05', 0, 0, 56, '2020-09-29', 1),
(121, 6, 1, 'MEP/SD/B01/PL/DR-03', 'BUILDING 1 - 1ST FLOOR PLAN - DRAINAGE LAYOUT', '', '2020-10-08', 0, 0, 56, '2020-09-29', 1),
(122, 6, 1, 'MEP/SD/B02/PL/DR-03', 'BUILDING 2 - 1ST FLOOR PLAN - DRAINAGE LAYOUT', '', '2020-10-11', 0, 0, 56, '2020-09-29', 1),
(123, 6, 1, 'MEP/SD/B03/PL/DR-03', 'BUILDING 3 - 1ST FLOOR PLAN - DRAINAGE LAYOUT', '', '2020-10-13', 0, 0, 56, '2020-09-29', 1),
(124, 6, 1, 'MEP/SD/B01/PL/DR-04', 'BUILDING 1 – 2ND & 3RD FLOOR PLAN - DRAINAGE LAYOUT', '', '2020-10-15', 0, 0, 56, '2020-09-29', 1),
(125, 6, 1, 'MEP/SD/B02/PL/DR-04', 'BUILDING 2 - 2ND & 3RD FLOOR PLAN - DRAINAGE LAYOUT ', '', '2020-10-19', 0, 0, 56, '2020-09-29', 1),
(126, 6, 1, 'MEP/SD/B03/PL/DR-04', 'BUILDING 3 - 2ND & 3RD FLOOR PLAN - DRAINAGE LAYOUT', '', '2020-10-22', 0, 0, 56, '2020-09-29', 1),
(127, 6, 1, 'MEP/SD/B01/PL/DR-05', 'BUILDING 1 – 4TH FLOOR PLAN - DRAINAGE LAYOUT ', '', '2020-10-25', 0, 0, 56, '2020-09-29', 1),
(128, 6, 1, 'MEP/SD/B02/PL/DR-05', 'BUILDING 2 – 4TH FLOOR PLAN - DRAINAGE LAYOUT ', '', '2020-10-28', 0, 0, 56, '2020-09-29', 1),
(129, 6, 1, 'MEP/SD/B03/PL/DR-05', 'BUILDING 3 - 4TH FLOOR PLAN - DRAINAGE LAYOUT ', '', '2020-10-31', 0, 0, 56, '2020-09-29', 1),
(130, 6, 1, 'MEP/SD/B01/PL/DR-06', 'BUILDING 1 – 5TH FLOOR PLAN - DRAINAGE LAYOUT ', '', '2020-11-02', 0, 0, 56, '2020-09-29', 1),
(131, 6, 1, 'MEP/SD/B02/PL/DR-06', 'BUILDING 2 – 5TH FLOOR PLAN - DRAINAGE LAYOUT ', '', '2020-11-05', 0, 0, 56, '2020-09-29', 1),
(132, 6, 1, 'MEP/SD/B03/PL/DR-06', 'BUILDING 3 - 5TH FLOOR PLAN - DRAINAGE LAYOUT', '', '2020-11-08', 0, 0, 56, '2020-09-29', 1),
(133, 6, 1, 'MEP/SD/B01/PL/DR-07', 'BUILDING 1 – 6TH FLOOR PLAN - DRAINAGE LAYOUT', '', '2020-11-10', 0, 0, 56, '2020-09-29', 1),
(134, 6, 1, 'MEP/SD/B02/PL/DR-07', 'BUILDING 2 – 6TH FLOOR PLAN - DRAINAGE LAYOUT', '', '2020-11-12', 0, 0, 56, '2020-09-29', 1),
(135, 6, 1, 'MEP/SD/B03/PL/DR-07', 'BUILDING 3 - 6TH FLOOR PLAN - DRAINAGE LAYOUT', '', '2020-11-16', 0, 0, 56, '2020-09-29', 1),
(136, 6, 1, 'MEP/SD/B01/PL/DR-08', 'BUILDING 1 – 7TH FLOOR PLAN - DRAINAGE LAYOUT', '', '2020-11-19', 0, 0, 56, '2020-09-29', 1),
(137, 6, 1, 'MEP/SD/B02/PL/DR-08', 'BUILDING 2 – 7TH FLOOR PLAN - DRAINAGE LAYOUT ', '', '2020-11-22', 0, 0, 56, '2020-09-29', 1),
(138, 6, 1, 'MEP/SD/B03/PL/DR-08', 'BUILDING 3 - 7TH FLOOR PLAN - DRAINAGE LAYOUT ', '', '2020-11-24', 0, 0, 56, '2020-09-29', 1),
(139, 6, 1, 'MEP/SD/B01/PL/DR-09', 'BUILDING 1 – ROOF FLOOR PLAN - DRAINAGE LAYOUT ', '', '2020-11-26', 0, 0, 56, '2020-09-29', 1),
(140, 6, 1, 'MEP/SD/B02/PL/DR-09', 'BUILDING 2 – ROOF FLOOR PLAN - DRAINAGE LAYOUT', '', '2020-11-29', 0, 0, 56, '2020-09-29', 1),
(141, 6, 1, 'MEP/SD/B03/PL/DR-09', 'BUILDING 3 - ROOF FLOOR PLAN - DRAINAGE LAYOUT', '', '2020-12-01', 0, 0, 56, '2020-09-29', 1),
(142, 6, 1, 'MEP/SD/PL/DR-10', 'DRAINAGE RISER DIAGRAM\r\n', '', '2020-12-03', 0, 0, 56, '2020-09-29', 1),
(143, 6, 1, 'MEP/SD/PL/WS-01', 'BUILDING 1, 2 & 3 BASEMENT FLOOR PLAN - WATER SUPPLY LAYOUT (OVERALL) ', '', '2020-10-01', 5, 0, 56, '2020-09-29', 1),
(144, 6, 1, 'MEP/SD/PL/WS-01A', 'BUILDING 1 & 2 BASEMENT FLOOR PLAN (1 OF 2) - WATER SUPPLY LAYOUT', '', '2020-10-01', 5, 0, 56, '2020-09-29', 1),
(145, 6, 1, 'MEP/SD/PL/WS-01B', 'BUILDING 3 BASEMENT FLOOR PLAN (2 OF 2) - WATER SUPPLY LAYOUT', '', '2020-10-01', 5, 0, 56, '2020-09-29', 1),
(146, 6, 1, 'MEP/SD/PL/WS-02', 'BUILDING 1, 2 & 3 GROUND FLOOR PLAN - WATER SUPPLY LAYOUT (OVERALL) ', '', '2020-12-06', 0, 0, 56, '2020-09-29', 1),
(147, 6, 1, 'MEP/SD/PL/WS-02A', 'BUILDING 1 & 2 GROUND FLOOR PLAN (1 OF 2) - WATER SUPPLY LAYOUT ', '', '2020-12-06', 0, 0, 56, '2020-09-29', 1),
(148, 6, 1, 'MEP/SD/PL/WS-02B', 'BUILDING 3 GROUND FLOOR PLAN (2 OF 2) - WATER SUPPLY LAYOUT ', '', '2020-12-06', 0, 0, 56, '2020-09-29', 1),
(149, 6, 1, 'MEP/SD/B01/PL/WS-03', 'BUILDING 1 - 1ST FLOOR PLAN - WATER SUPPLY LAYOUT ', '', '2020-12-09', 0, 0, 56, '2020-09-29', 1),
(150, 6, 1, 'MEP/SD/B02/PL/WS-03', 'BUILDING 2 - 1ST FLOOR PLAN - WATER SUPPLY LAYOUT ', '', '2020-12-12', 0, 0, 56, '2020-09-29', 1),
(151, 6, 1, 'MEP/SD/B03/PL/WS-03', 'BUILDING 3 - 1ST FLOOR PLAN - WATER SUPPLY LAYOUT ', '', '2020-12-15', 0, 0, 56, '2020-09-29', 1),
(152, 6, 1, 'MEP/SD/B01/PL/WS-04', 'BUILDING 1 – 2ND & 3RD FLOOR PLAN - WATER SUPPLY LAYOUT', '', '2020-12-19', 0, 0, 56, '2020-09-29', 1),
(153, 6, 1, 'MEP/SD/B02/PL/WS-04', 'BUILDING 2 - 2ND & 3RD FLOOR PLAN - WATER SUPPLY LAYOUT', '', '2020-12-21', 0, 0, 56, '2020-09-29', 1),
(154, 6, 1, 'MEP/SD/B03/PL/WS-04', 'BUILDING 3 - 2ND & 3RD FLOOR PLAN - WATER SUPPLY LAYOUT ', '', '2020-12-24', 0, 0, 56, '2020-09-29', 1),
(155, 6, 1, 'MEP/SD/B01/PL/WS-05', 'BUILDING 1 – 4TH FLOOR PLAN - WATER SUPPLY LAYOUT', '', '2020-12-27', 0, 0, 56, '2020-09-29', 1),
(156, 6, 1, 'MEP/SD/B02/PL/WS-05', 'BUILDING 2 – 4TH FLOOR PLAN - WATER SUPPLY LAYOUT ', '', '2020-12-30', 0, 0, 56, '2020-09-29', 1),
(157, 6, 1, 'MEP/SD/B03/PL/WS-05', 'BUILDING 3 - 4TH FLOOR PLAN - WATER SUPPLY LAYOUT ', '', '2021-01-02', 0, 0, 56, '2020-09-29', 1),
(158, 6, 1, 'MEP/SD/B01/PL/WS-06', 'BUILDING 1 – 5TH FLOOR PLAN - WATER SUPPLY LAYOUT ', '', '2021-01-05', 0, 0, 56, '2020-09-29', 1),
(159, 6, 1, 'MEP/SD/B02/PL/WS-06', 'BUILDING 2 – 5TH FLOOR PLAN - WATER SUPPLY LAYOUT ', '', '2021-01-09', 0, 0, 56, '2020-09-29', 1),
(160, 6, 1, 'MEP/SD/B03/PL/WS-06', 'BUILDING 3 - 5TH FLOOR PLAN - WATER SUPPLY LAYOUT ', '', '2021-01-11', 0, 0, 56, '2020-09-29', 1),
(161, 6, 1, 'MEP/SD/B01/PL/WS-07', 'BUILDING 1 – 6TH FLOOR PLAN - WATER SUPPLY LAYOUT ', '', '2021-01-14', 0, 0, 56, '2020-09-29', 1),
(162, 6, 1, 'MEP/SD/B02/PL/WS-07', 'BUILDING 2 – 6TH FLOOR PLAN - WATER SUPPLY LAYOUT ', '', '2021-01-17', 0, 0, 56, '2020-09-29', 1),
(163, 6, 1, 'MEP/SD/B03/PL/WS-07', 'BUILDING 3 - 6TH FLOOR PLAN - WATER SUPPLY LAYOUT ', '', '2021-01-20', 0, 0, 56, '2020-09-29', 1),
(164, 6, 1, 'MEP/SD/B01/PL/WS-08', 'BUILDING 1 – 7TH FLOOR PLAN - WATER SUPPLY LAYOUT ', '', '2021-01-23', 0, 0, 56, '2020-09-29', 1),
(165, 6, 1, 'MEP/SD/B02/PL/WS-08', 'BUILDING 2 – 7TH FLOOR PLAN - WATER SUPPLY LAYOUT ', '', '2021-01-26', 0, 0, 56, '2020-09-29', 1),
(166, 6, 1, 'MEP/SD/B03/PL/WS-08', 'BUILDING 3 - 7TH FLOOR PLAN - WATER SUPPLY LAYOUT ', '', '2021-01-30', 0, 0, 56, '2020-09-29', 1),
(167, 6, 1, 'MEP/SD/B02/PL/WS-09', 'BUILDING 2 – ROOF FLOOR PLAN - WATER SUPPLY LAYOUT ', '', '2021-02-01', 0, 0, 56, '2020-09-29', 1),
(168, 6, 1, 'MEP/SD/PL/WS-10', 'WATER SUPPLY SCHEMATIC RISER DIAGRAM\r\n ', '', '2021-02-04', 0, 0, 56, '2020-09-29', 1),
(169, 6, 4, 'MEP/SD/PL/FP-01', 'BUILDING 1, 2 & 3 BASEMENT FLOOR PLAN - FIRE PROTECTION LAYOUT (OVERALL) ', '', '2020-10-25', 0, 0, 56, '2020-09-29', 1),
(170, 6, 4, 'MEP/SD/PL/FP-01A', 'BUILDING 1 & 2 BASEMENT FLOOR PLAN (1 OF 2) - FIRE PROTECTION LAYOUT', '', '2020-10-27', 0, 0, 56, '2020-09-29', 1),
(171, 6, 4, 'MEP/SD/PL/FP-01B', 'BUILDING 3 BASEMENT FLOOR PLAN (2 OF 2) - FIRE PROTECTION LAYOUT ', '', '2020-10-29', 0, 0, 56, '2020-09-29', 1),
(172, 6, 4, 'MEP/SD/PL/FP-02', 'BUILDING 1, 2 & 3 GROUND FLOOR PLAN - FIRE PROTECTION LAYOUT (OVERALL) ', '', '2020-10-31', 0, 0, 56, '2020-09-29', 1),
(173, 6, 4, 'MEP/SD/PL/FP-02A', 'BUILDING 1 & 2 GROUND FLOOR PLAN (1 OF 2) - FIRE PROTECTION LAYOUT ', '', '2020-11-02', 0, 0, 56, '2020-09-29', 1),
(174, 6, 4, 'MEP/SD/PL/FP-02B', 'BUILDING 3 GROUND FLOOR PLAN (2 OF 2) - FIRE PROTECTION LAYOUT ', '', '2020-11-04', 0, 0, 56, '2020-09-29', 1),
(175, 6, 4, 'MEP/SD/B01/PL/FP-03', 'BUILDING 1 - 1ST FLOOR PLAN - FIRE PROTECTION LAYOUT ', '', '2020-11-07', 0, 0, 56, '2020-09-29', 1),
(176, 6, 4, 'MEP/SD/B02/PL/FP-03', 'BUILDING 2 - 1ST FLOOR PLAN - FIRE PROTECTION LAYOUT ', '', '2020-11-08', 0, 0, 56, '2020-09-29', 1),
(177, 6, 1, 'MEP/SD/B03/PL/FP-03', 'BUILDING 3 - 1ST FLOOR PLAN - FIRE PROTECTION LAYOUT', '', '2020-11-10', 0, 0, 56, '2020-09-29', 1),
(178, 6, 4, 'MEP/SD/B01/PL/FP-04', 'BUILDING 1 – 2ND & 3RD FLOOR PLAN - FIRE PROTECTION LAYOUT', '', '2020-11-12', 0, 0, 56, '2020-09-29', 1),
(179, 6, 4, 'MEP/SD/B02/PL/FP-04', 'BUILDING 2 - 2ND & 3RD FLOOR PLAN - FIRE PROTECTION LAYOUT', '', '2020-11-14', 0, 0, 56, '2020-09-29', 1),
(180, 6, 4, 'MEP/SD/B03/PL/FP-04', 'BUILDING 3 - 2ND & 3RD FLOOR PLAN - FIRE PROTECTION LAYOUT ', '', '2020-11-16', 0, 0, 56, '2020-09-29', 1),
(181, 6, 4, 'MEP/SD/B01/PL/FP-05', 'BUILDING 1 – 4TH FLOOR PLAN - FIRE PROTECTION LAYOUT ', '', '2020-11-18', 0, 0, 56, '2020-09-29', 1),
(182, 6, 4, 'MEP/SD/B02/PL/FP-05', 'BUILDING 2 – 4TH FLOOR PLAN - FIRE PROTECTION LAYOUT', '', '2020-11-21', 0, 0, 56, '2020-09-29', 1),
(183, 6, 4, 'MEP/SD/B03/PL/FP-05', 'BUILDING 3 - 4TH FLOOR PLAN - FIRE PROTECTION LAYOUT ', '', '2020-11-22', 0, 0, 56, '2020-09-29', 1),
(184, 6, 4, 'MEP/SD/B01/PL/FP-06', 'BUILDING 1 – 5TH FLOOR PLAN - FIRE PROTECTION LAYOUT ', '', '2020-11-24', 0, 0, 56, '2020-09-29', 1),
(185, 6, 4, 'MEP/SD/B02/PL/FP-06', 'BUILDING 2 – 5TH FLOOR PLAN - FIRE PROTECTION LAYOUT ', '', '2020-11-26', 0, 0, 56, '2020-09-29', 1),
(186, 6, 4, 'MEP/SD/B03/PL/FP-06', 'BUILDING 3 - 5TH FLOOR PLAN - FIRE PROTECTION LAYOUT ', '', '2020-11-28', 0, 0, 56, '2020-09-29', 1),
(187, 6, 4, 'MEP/SD/B01/PL/FP-07', 'BUILDING 1 – 6TH FLOOR PLAN - FIRE PROTECTION LAYOUT ', '', '2020-11-30', 0, 0, 56, '2020-09-29', 1),
(188, 6, 4, 'MEP/SD/B02/PL/FP-07', 'BUILDING 2 – 6TH FLOOR PLAN - FIRE PROTECTION LAYOUT ', '', '2020-12-02', 0, 0, 56, '2020-09-29', 1),
(189, 6, 4, 'MEP/SD/B03/PL/FP-07', 'BUILDING 3 - 6TH FLOOR PLAN - FIRE PROTECTION LAYOUT ', '', '2020-12-05', 0, 0, 56, '2020-09-29', 1),
(190, 6, 4, 'MEP/SD/B01/PL/FP-08', 'BUILDING 1 – 7TH FLOOR PLAN - FIRE PROTECTION LAYOUT ', '', '2020-12-06', 0, 0, 56, '2020-09-29', 1),
(191, 6, 4, 'MEP/SD/B02/PL/FP-08', 'BUILDING 2 – 7TH FLOOR PLAN - FIRE PROTECTION LAYOUT ', '', '2020-12-08', 0, 0, 56, '2020-09-29', 1),
(192, 6, 4, 'MEP/SD/B03/PL/FP-08', 'BUILDING 3 - 7TH FLOOR PLAN - FIRE PROTECTION LAYOUT ', '', '2020-12-10', 0, 0, 56, '2020-09-29', 1),
(193, 6, 4, 'MEP/SD/B02/PL/FP-09', 'BUILDING 2 – ROOF FLOOR PLAN - FIRE PROTECTION LAYOUT ', '', '2020-12-12', 0, 0, 56, '2020-09-29', 1),
(194, 6, 4, 'MEP/SD/PL/FP-10', 'FIRE PROTECTION SCHEMATIC RISER DIAGRAM ', '', '2020-12-14', 0, 0, 56, '2020-09-29', 1),
(195, 6, 1, 'MEP/SD/PL/LPG-01', 'BUILDING 1, 2 & 3 BASEMENT FLOOR PLAN - LPG LAYOUT (OVERALL) ', '', '2020-10-25', 0, 0, 56, '2020-09-29', 1),
(196, 6, 1, 'MEP/SD/PL/LPG-01A', 'BUILDING 1 & 2 BASEMENT FLOOR PLAN (1 OF 2) - LPG LAYOUT ', '', '2020-10-27', 0, 0, 56, '2020-09-29', 1),
(197, 6, 1, 'MEP/SD/PL/LPG-01B', 'BUILDING 3 BASEMENT FLOOR PLAN (2 OF 2) - LPG LAYOUT ', '', '2020-10-29', 0, 0, 56, '2020-09-29', 1),
(198, 6, 1, 'MEP/SD/PL/LPG-02', 'BUILDING 1, 2 & 3 GROUND FLOOR PLAN - LPG LAYOUT (OVERALL) ', '', '2020-10-31', 0, 0, 56, '2020-09-29', 1),
(199, 6, 1, 'MEP/SD/PL/LPG-02A', 'BUILDING 1 & 2 GROUND FLOOR PLAN (1 OF 2) - LPG LAYOUT ', '', '2020-11-02', 0, 0, 56, '2020-09-29', 1),
(200, 6, 1, 'MEP/SD/PL/LPG-02B', 'BUILDING 3 GROUND FLOOR PLAN (2 OF 2) - LPG LAYOUT ', '', '2020-11-04', 0, 0, 56, '2020-09-29', 1),
(201, 6, 1, 'MEP/SD/B01/PL/LPG-03', 'BUILDING 1 - 1ST FLOOR PLAN - LPG LAYOUT\r\n ', '', '2020-11-05', 0, 0, 56, '2020-09-29', 1),
(202, 6, 1, 'MEP/SD/B02/PL/LPG-03', 'BUILDING 2 - 1ST FLOOR PLAN - LPG LAYOUT\r\n ', '', '2020-11-08', 0, 0, 56, '2020-09-29', 1),
(203, 6, 1, 'MEP/SD/B03/PL/LPG-03', 'BUILDING 3 - 1ST FLOOR PLAN - LPG LAYOUT\r\n ', '', '2020-11-10', 0, 0, 56, '2020-09-29', 1),
(204, 6, 1, 'MEP/SD/B01/PL/LPG-04', 'BUILDING 1 – 2ND & 3RD FLOOR PLAN - LPG LAYOUT ', '', '2020-11-12', 0, 0, 56, '2020-09-29', 1),
(205, 6, 1, 'MEP/SD/B02/PL/LPG-04', 'BUILDING 2 - 2ND & 3RD FLOOR PLAN - LPG LAYOUT ', '', '2020-11-14', 0, 0, 56, '2020-09-29', 1),
(206, 6, 1, 'MEP/SD/B03/PL/LPG-04', 'BUILDING 3 - 2ND & 3RD FLOOR PLAN - LPG LAYOUT ', '', '2020-11-16', 0, 0, 56, '2020-09-29', 1),
(207, 6, 1, 'MEP/SD/B01/PL/LPG-05', 'BUILDING 1 – 4TH FLOOR PLAN - LPG LAYOUT\r\n ', '', '2020-11-18', 0, 0, 56, '2020-09-29', 1),
(208, 6, 1, 'MEP/SD/B02/PL/LPG-05', 'BUILDING 2 – 4TH FLOOR PLAN - LPG LAYOUT ', '', '2020-11-19', 0, 0, 56, '2020-09-29', 1),
(209, 6, 1, 'MEP/SD/B03/PL/LPG-05', 'BUILDING 3 - 4TH FLOOR PLAN - LPG LAYOUT', '', '2020-11-22', 0, 0, 56, '2020-09-29', 1),
(210, 6, 1, 'MEP/SD/B01/PL/LPG-06', 'BUILDING 1 – 5TH FLOOR PLAN - LPG LAYOUT\r\n', '', '2020-11-24', 0, 0, 56, '2020-09-29', 1),
(211, 6, 1, 'MEP/SD/B02/PL/LPG-06', 'BUILDING 2 – 5TH FLOOR PLAN - LPG LAYOUT\r\n ', '', '2020-11-26', 0, 0, 56, '2020-09-29', 1),
(212, 6, 1, 'MEP/SD/B03/PL/LPG-06', 'BUILDING 3 - 5TH FLOOR PLAN - LPG LAYOUT\r\n ', '', '2020-11-28', 0, 0, 56, '2020-09-29', 1),
(213, 6, 1, 'MEP/SD/B01/PL/LPG-07', 'BUILDING 1 – 6TH FLOOR PLAN - LPG LAYOUT ', '', '2020-11-30', 0, 0, 56, '2020-09-29', 1),
(214, 6, 1, 'MEP/SD/B02/PL/LPG-07', 'BUILDING 2 – 6TH FLOOR PLAN - LPG LAYOUT\r\n ', '', '2020-12-02', 0, 0, 56, '2020-09-29', 1),
(215, 6, 1, 'MEP/SD/B03/PL/LPG-07', 'BUILDING 3 - 6TH FLOOR PLAN - LPG LAYOUT\r\n ', '', '2020-12-03', 0, 0, 56, '2020-09-29', 1),
(216, 6, 1, 'MEP/SD/B01/PL/LPG-08', 'BUILDING 1 – 7TH FLOOR PLAN - LPG LAYOUT\r\n ', '', '2020-12-06', 0, 0, 56, '2020-09-29', 1),
(217, 6, 1, 'MEP/SD/B02/PL/LPG-08', 'BUILDING 2 – 7TH FLOOR PLAN - LPG LAYOUT ', '', '2020-12-08', 0, 0, 56, '2020-09-29', 1),
(218, 6, 1, 'MEP/SD/B03/PL/LPG-08', 'BUILDING 3 - 7TH FLOOR PLAN - LPG LAYOUT ', '', '2020-12-10', 0, 0, 56, '2020-09-29', 1),
(219, 6, 1, 'MEP/SD/B02/PL/LPG-09', 'BUILDING 2 – ROOF FLOOR PLAN - LPG LAYOUT ', '', '2020-12-12', 0, 0, 56, '2020-09-29', 1),
(220, 6, 1, 'MEP/SD/B03/PL/LPG-09', 'BUILDING 3 – ROOF FLOOR PLAN - LPG LAYOUT ', '', '2020-12-14', 0, 0, 56, '2020-09-29', 1),
(221, 6, 1, 'MEP/SD/PL/LPG-10', 'LPG SCHEMATIC RISER DIAGRAM\r\n', '', '2020-12-16', 0, 0, 56, '2020-09-29', 1),
(222, 6, 3, 'MEP/SD/EL-01A', 'BUILDING 1 & 2 BASEMENT FLOOR PLAN (1 OF 2) - LIGHTING LAYOUT ', '', '2020-09-30', 0, 0, 56, '2020-09-29', 1),
(223, 6, 3, 'MEP/SD/EL-01B', 'BUILDING 3 BASEMENT FLOOR PLAN (2 OF 2) - LIGHTING LAYOUT ', '', '2020-10-04', 0, 0, 56, '2020-09-29', 1),
(224, 6, 3, 'MEP/SD/EL-02', 'BUILDING 1, 2 & 3 GROUND FLOOR PLAN - LIGHTING LAYOUT (OVERALL) ', '', '2020-10-06', 0, 0, 56, '2020-09-29', 1),
(225, 6, 3, 'MEP/SD/EL-02A', 'BUILDING 1 & 2 GROUND FLOOR PLAN (1 OF 2) - LIGHTING LAYOUT ', '', '2020-10-08', 0, 0, 56, '2020-09-29', 1),
(226, 6, 3, 'MEP/SD/EL-02B', 'BUILDING 3 GROUND FLOOR PLAN (2 OF 2) - LIGHTING LAYOUT ', '', '2020-10-11', 0, 0, 56, '2020-09-29', 1),
(227, 6, 3, 'MEP/SD/B01/EL-03', 'BUILDING 1 - 1ST FLOOR PLAN - LIGHTING LAYOUT ', '', '2020-10-13', 0, 0, 56, '2020-09-29', 1),
(228, 6, 1, 'MEL/SD/B02/EL-03', 'BUILDING 2 - 1ST FLOOR PLAN - LIGHTING LAYOUT ', '', '2020-10-15', 0, 0, 56, '2020-09-29', 1),
(229, 6, 3, 'MEP/SD/B02/EL-03', 'BUILDING 2 - 1ST FLOOR PLAN - LIGHTING LAYOUT', '', '2020-10-15', 0, 0, 56, '2020-09-29', 1),
(230, 6, 3, 'MEP/SD/B03/EL-03', 'BUILDING 3 - 1ST FLOOR PLAN - LIGHTING LAYOUT ', '', '2020-10-19', 0, 0, 56, '2020-09-29', 1),
(231, 6, 3, 'MEP/SD/B01/EL-04', 'BUILDING 1 – 2ND TO 4TH FLOOR PLAN - LIGHTING LAYOUT ', '', '2020-10-20', 0, 0, 56, '2020-09-29', 1),
(232, 6, 3, 'MEP/SD/B02/EL-04', 'BUILDING 2 - 2ND TO 4TH FLOOR PLAN - LIGHTING LAYOUT', '', '2020-10-22', 0, 0, 56, '2020-09-29', 1),
(233, 6, 3, 'MEP/SD/B03/EL-04', 'BUILDING 3 - 2ND TO 4TH FLOOR PLAN - LIGHTING LAYOUT', '', '2020-11-01', 0, 0, 56, '2020-09-29', 1),
(234, 6, 3, 'MEP/SD/B01/EL-05', 'BUILDING 1 – 5TH FLOOR PLAN - LIGHTING LAYOUT', '', '2020-10-27', 0, 0, 56, '2020-09-29', 1),
(235, 6, 3, 'MEP/SD/B02/EL-05', 'BUILDING 2 – 5TH FLOOR PLAN - LIGHTING LAYOUT ', '', '2020-10-29', 0, 0, 56, '2020-09-29', 1),
(236, 6, 3, 'MEP/SD/B03/EL-05', 'BUILDING 3 - 5TH FLOOR PLAN - LIGHTING LAYOUT', '', '2020-11-05', 0, 0, 56, '2020-09-29', 1),
(237, 6, 3, 'MEP/SD/B01/EL-06', 'BUILDING 1 – 6TH FLOOR PLAN - LIGHTING LAYOUT', '', '2020-11-04', 0, 0, 56, '2020-09-29', 1),
(238, 6, 3, 'MEP/SD/B02/EL-06', 'BUILDING 2 – 6TH FLOOR PLAN - LIGHTING LAYOUT', '', '2020-11-08', 0, 0, 56, '2020-09-29', 1),
(239, 6, 3, 'MEP/SD/B03/EL-06', 'BUILDING 3 - 6TH FLOOR PLAN - LIGHTING LAYOUT', '', '2020-11-08', 0, 0, 56, '2020-09-29', 1),
(240, 6, 3, 'MEP/SD/B01/EL-07', ' BUILDING 1 – 7TH FLOOR PLAN - LIGHTING LAYOUT', '', '2020-11-12', 0, 0, 56, '2020-09-29', 1),
(241, 6, 3, 'MEP/SD/B02/EL-07', 'BUILDING 2 – 7TH FLOOR PLAN - LIGHTING LAYOUT', '', '2020-11-15', 0, 0, 56, '2020-09-29', 1),
(242, 6, 3, 'MEP/SD/B03/EL-07', 'BUILDING 3 - 7TH FLOOR PLAN - LIGHTING LAYOUT', '', '2020-11-12', 0, 0, 56, '2020-09-29', 1),
(243, 6, 3, 'MEP/SD/B01/EL-08', 'BUILDING 1 – ROOF FLOOR PLAN - LIGHTING LAYOUT', '', '2020-11-19', 0, 0, 56, '2020-09-29', 1),
(244, 6, 3, 'MEP/SD/B02/EL-08', 'BUILDING 2 – ROOF FLOOR PLAN - LIGHTING LAYOUT', '', '2020-11-22', 0, 0, 56, '2020-09-29', 1),
(245, 6, 3, 'MEP/SD/B03/EL-08', 'BUILDING 3 - ROOF FLOOR PLAN - LIGHTING LAYOUT', '', '2020-11-15', 0, 0, 56, '2020-09-29', 1),
(246, 1, 2, 'AAC/222/SD/MEP/AC/0001', '\r\nBasement Floor Plan Pump Room A/C & Ventilation Layout', '', '2020-04-26', 3, 0, 56, '2020-09-29', 1),
(247, 6, 3, 'MEP/SD/EL/FA&EM-01', 'BUILDING 1, 2 & 3 BASEMENT FLOOR PLAN - FIRE ALARM & EMERGENCY LIGHTING LAYOUT (OVERALL) ', '', '2020-11-10', 0, 0, 56, '2020-09-29', 1),
(248, 6, 3, 'MEP/SD/EL/FA&EM-01A', 'BUILDING 1 & 2 BASEMENT FLOOR PLAN (1 OF 2) - FIRE ALARM & EMERGENCY LIGHTING LAYOUT', '', '2020-11-12', 0, 0, 56, '2020-09-30', 1),
(249, 6, 3, 'MEP/SD/EL/FA&EM-01B', 'BUILDING 3 BASEMENT FLOOR PLAN (2 OF 2) - FIRE ALARM & EMERGENCY LIGHTING LAYOUT ', '', '2020-11-14', 0, 0, 56, '2020-09-30', 1),
(250, 6, 3, 'MEP/SD/EL/FA&EM-02', 'BUILDING 1, 2 & 3 GROUND FLOOR PLAN - FIRE ALARM & EMERGENCY LIGHTING LAYOUT (OVERALL) ', '', '2020-11-16', 0, 0, 56, '2020-09-30', 1),
(251, 6, 3, 'MEP/SD/EL/FA&EM-02A', 'BUILDING 1 & 2 GROUND FLOOR PLAN (1 OF 2) - FIRE ALARM & EMERGENCY LIGHTING LAYOUT\r\n ', '', '2020-11-18', 0, 0, 56, '2020-09-30', 1),
(252, 6, 3, 'MEP/SD/EL/FA&EM-02B', 'BUILDING 3 GROUND FLOOR PLAN (2 OF 2) - FIRE ALARM & EMERGENCY LIGHTING LAYOUT\r\n ', '', '2020-11-19', 0, 0, 56, '2020-09-30', 1),
(253, 6, 3, 'MEP/SD/B01/EL/FA&EM-03', 'BUILDING 1 - 1ST FLOOR PLAN - FIRE ALARM & EMERGENCY LIGHTING LAYOUT\r\n', '', '2020-11-22', 0, 0, 56, '2020-09-30', 1),
(254, 6, 3, 'MEP/SD/B02/EL/FA&EM-03', 'BUILDING 2 - 1ST FLOOR PLAN - FIRE ALARM & EMERGENCY LIGHTING LAYOUT\r\n ', '', '2020-11-24', 0, 0, 56, '2020-09-30', 1),
(255, 6, 3, 'MEP/SD/B03/EL/FA&EM-03', 'BUILDING 3 - 1ST FLOOR PLAN - FIRE ALARM & EMERGENCY LIGHTING LAYOUT\r\n ', '', '2020-11-26', 0, 0, 56, '2020-09-30', 1),
(256, 6, 3, 'MEP/SD/B01/EL/FA&EM-04', 'BUILDING 1 – 2ND TO 4TH FLOOR PLAN - FIRE ALARM & EMERGENCY LIGHTING LAYOUT', '', '2020-11-28', 0, 0, 56, '2020-09-30', 1),
(257, 6, 3, 'MEP/SD/B02/EL/FA&EM-04', 'BUILDING 2 - 2ND TO 4TH FLOOR PLAN - FIRE ALARM & EMERGENCY LIGHTING LAYOUT ', '', '2020-11-30', 0, 0, 56, '2020-09-30', 1),
(258, 6, 3, 'MEP/SD/B03/EL/FA&EM-04', 'BUILDING 3 - 2ND TO 4TH FLOOR PLAN - FIRE ALARM & EMERGENCY LIGHTING LAYOUT ', '', '2020-12-01', 0, 0, 56, '2020-09-30', 1),
(259, 6, 3, 'MEP/SD/B01/EL/FA&EM-05', 'BUILDING 1 – 5TH FLOOR PLAN - FIRE ALARM & EMERGENCY LIGHTING LAYOUT ', '', '2020-12-03', 0, 0, 56, '2020-09-30', 1),
(260, 6, 3, 'MEP/SD/B02/EL/FA&EM-05', 'BUILDING 2 – 5TH FLOOR PLAN - FIRE ALARM & EMERGENCY LIGHTING LAYOUT ', '', '2020-12-05', 0, 0, 56, '2020-09-30', 1),
(261, 6, 3, 'MEP/SD/B03/EL/FA&EM-05', 'BUILDING 3 - 5TH FLOOR PLAN - FIRE ALARM & EMERGENCY LIGHTING LAYOUT', '', '2020-12-07', 0, 0, 56, '2020-09-30', 1),
(262, 6, 3, 'MEP/SD/B01/EL/FA&EM-06', 'BUILDING 1 – 6TH FLOOR PLAN - FIRE ALARM & EMERGENCY LIGHTING LAYOUT ', '', '2020-12-09', 0, 0, 56, '2020-09-30', 1),
(263, 6, 3, 'MEP/SD/B02/EL/FA&EM-06', 'BUILDING 2 – 6TH FLOOR PLAN - FIRE ALARM & EMERGENCY LIGHTING LAYOUT', '', '2020-12-10', 0, 0, 56, '2020-09-30', 1),
(264, 6, 3, 'MEP/SD/B03/EL/FA&EM-06', 'BUILDING 3 - 6TH FLOOR PLAN - FIRE ALARM & EMERGENCY LIGHTING LAYOUT ', '', '2020-12-13', 0, 0, 56, '2020-09-30', 1),
(265, 6, 3, 'MEP/SD/B01/EL/FA&EM-07', 'BUILDING 1 – 7TH FLOOR PLAN - FIRE ALARM & EMERGENCY LIGHTING LAYOUT ', '', '2020-12-15', 0, 0, 56, '2020-09-30', 1),
(266, 6, 3, 'MEP/SD/B02/EL/FA&EM-07', 'BUILDING 2 – 7TH FLOOR PLAN - FIRE ALARM & EMERGENCY LIGHTING LAYOUT ', '', '2020-12-17', 0, 0, 56, '2020-09-30', 1),
(267, 6, 3, 'MEP/SD/B03/EL/FA&EM-07', 'BUILDING 3 - 7TH FLOOR PLAN - FIRE ALARM & EMERGENCY LIGHTING LAYOUT ', '', '2020-12-19', 0, 0, 56, '2020-09-30', 1),
(268, 6, 3, 'MEP/SD/B01/EL/FA&EM-08', 'BUILDING 2 – ROOF FLOOR PLAN - FIRE ALARM & EMERGENCY LIGHTING LAYOUT ', '', '2020-12-21', 0, 0, 56, '2020-09-30', 1),
(269, 6, 3, 'MEP/SD/B02/EL/FA&EM-08', 'BUILDING 3 - ROOF FLOOR PLAN - FIRE ALARM & EMERGENCY LIGHTING LAYOUT ', '', '2020-12-23', 0, 0, 56, '2020-09-30', 1),
(270, 6, 3, 'MEP/SD/B03/EL/FA&EM-08', 'FIRE ALARM & VOICE EVACUATION SYSTEM SCHEMATIC RISER DIAGRAM ', '', '2020-12-24', 0, 0, 56, '2020-09-30', 1),
(271, 6, 3, 'MEP/SD/EL/FA-09', 'CENTRAL MONITORING SYSTEM SCHEMATIC RISER DIAGRAM ', '', '2020-12-27', 0, 0, 56, '2020-09-30', 1),
(272, 6, 3, 'MEP/SD/EL/LC-01', 'BUILDING 1, 2 & 3 BASEMENT FLOOR PLAN - LOW CURRENT LAYOUT (OVERALL) ', '', '2020-11-10', 0, 0, 56, '2020-09-30', 1),
(273, 6, 3, 'MEP/SD/EL/LC-01A', 'BUILDING 1 & 2 BASEMENT FLOOR PLAN (1 OF 2) - LOW CURRENT LAYOUT ', '', '2020-11-12', 0, 0, 56, '2020-09-30', 1),
(274, 6, 3, 'MEP/SD/EL/LC-01B', 'BUILDING 3 BASEMENT FLOOR PLAN (2 OF 2) - LOW CURRENT LAYOUT ', '', '2020-11-14', 0, 0, 56, '2020-09-30', 1),
(275, 6, 3, 'MEP/SD/EL/LC-02', 'BUILDING 1, 2 & 3 GROUND FLOOR PLAN - LOW CURRENT LAYOUT (OVERALL) ', '', '2020-11-16', 0, 0, 56, '2020-09-30', 1),
(276, 6, 3, 'MEP/SD/EL/LC-02A', 'BUILDING 1 & 2 GROUND FLOOR PLAN (1 OF 2) - LOW CURRENT LAYOUT ', '', '2020-11-18', 0, 0, 56, '2020-09-30', 1),
(277, 6, 3, 'MEP/SD/EL/LC-02B', 'BUILDING 3 GROUND FLOOR PLAN (2 OF 2) - LOW CURRENT LAYOUT ', '', '2020-11-19', 0, 0, 56, '2020-09-30', 1),
(278, 6, 3, 'MEP/SD/B01/EL/LC-03', 'BUILDING 1 - 1ST FLOOR PLAN - LOW CURRENT LAYOUT ', '', '2020-11-22', 0, 0, 56, '2020-09-30', 1),
(279, 6, 3, 'MEP/SD/B02/EL/LC-03', 'BUILDING 2 - 1ST FLOOR PLAN - LOW CURRENT LAYOUT ', '', '2020-11-24', 0, 0, 56, '2020-09-30', 1),
(280, 6, 3, 'MEP/SD/B03/EL/LC-03', 'BUILDING 3 - 1ST FLOOR PLAN - LOW CURRENT LAYOUT ', '', '2020-11-26', 0, 0, 56, '2020-09-30', 1),
(281, 6, 3, 'MEP/SD/B01/EL/LC-04', ' BUILDING 1 – 2ND TO 4TH FLOOR PLAN - LOW CURRENT LAYOUT', '', '2020-11-28', 0, 0, 56, '2020-09-30', 1),
(282, 6, 3, 'MEP/SD/B02/EL/LC-04', 'BUILDING 2 - 2ND TO 4TH FLOOR PLAN - LOW CURRENT LAYOUT ', '', '2020-11-30', 0, 0, 56, '2020-09-30', 1),
(283, 6, 3, 'MEP/SD/B03/EL/LC-04', 'BUILDING 3 - 2ND TO 4TH FLOOR PLAN - LOW CURRENT LAYOUT ', '', '2020-12-01', 0, 0, 56, '2020-09-30', 1),
(284, 6, 3, 'MEP/SD/B01/EL/LC-05', 'BUILDING 1 – 5TH FLOOR PLAN - LOW CURRENT LAYOUT', '', '2020-12-03', 0, 0, 56, '2020-09-30', 1),
(285, 6, 3, 'MEP/SD/B02/EL/LC-05', 'BUILDING 2 – 5TH FLOOR PLAN - LOW CURRENT LAYOUT ', '', '2020-12-05', 0, 0, 56, '2020-09-30', 1),
(286, 6, 3, 'MEP/SD/B03/EL/LC-05', 'BUILDING 3 - 5TH FLOOR PLAN - LOW CURRENT LAYOUT ', '', '2020-12-07', 0, 0, 56, '2020-09-30', 1),
(287, 6, 3, 'MEP/SD/B01/EL/LC-06', 'BUILDING 1 – 6TH FLOOR PLAN - LOW CURRENT LAYOUT', '', '2020-12-09', 0, 0, 56, '2020-09-30', 1),
(288, 6, 3, 'MEP/SD/B02/EL/LC-06', 'BUILDING 2 – 6TH FLOOR PLAN - LOW CURRENT LAYOUT', '', '2020-12-10', 0, 0, 56, '2020-09-30', 1),
(289, 6, 3, 'MEP/SD/B03/EL/LC-06', 'BUILDING 3 - 6TH FLOOR PLAN - LOW CURRENT LAYOUT ', '', '2020-12-13', 0, 0, 56, '2020-09-30', 1),
(290, 6, 3, 'MEP/SD/B01/EL/LC-07', 'BUILDING 1 – 7TH FLOOR PLAN - LOW CURRENT LAYOUT ', '', '2020-12-15', 0, 0, 56, '2020-09-30', 1),
(291, 6, 3, 'MEP/SD/B02/EL/LC-07', 'BUILDING 2 – 7TH FLOOR PLAN - LOW CURRENT LAYOUT ', '', '2020-12-17', 0, 0, 56, '2020-09-30', 1),
(292, 6, 3, 'MEP/SD/B03/EL/LC-07', 'BUILDING 3 - 7TH FLOOR PLAN - LOW CURRENT LAYOUT ', '', '2020-12-19', 0, 0, 56, '2020-09-30', 1),
(293, 6, 3, 'MEP/SD/B01/EL/LC-08', 'BUILDING 2 – ROOF FLOOR PLAN - LOW CURRENT LAYOUT ', '', '2020-12-21', 0, 0, 56, '2020-09-30', 1),
(294, 6, 3, 'MEP/SD/B02/EL/LC-08', 'BUILDING 1 – CCTV SYSTEM SCHEMATIC RISER DIAGRAM ', '', '2020-12-23', 0, 0, 56, '2020-09-30', 1),
(295, 6, 3, 'MEP/SD/B03/EL/LC-08', 'BUILDING 2 – CCTV SYSTEM SCHEMATIC RISER DIAGRAM ', '', '2020-12-26', 0, 0, 56, '2020-09-30', 1),
(296, 6, 3, 'MEP/SD/B02/EL/LC-09', 'BUILDING 3 – CCTV SYSTEM SCHEMATIC RISER DIAGRAM ', '', '2020-12-27', 0, 0, 56, '2020-09-30', 1),
(297, 6, 3, 'MEP/SD/B01/EL/LC-10', 'BUILDING 1 – ACCESS CONTROL SYSTEM SCHEMATIC RISER DIAGRAM ', '', '2020-12-29', 0, 0, 56, '2020-09-30', 1),
(298, 6, 3, 'MEP/SD/B02/EL/LC-10', 'BUILDING 2 – ACCESS CONTROL SYSTEM SCHEMATIC RISER DIAGRAM ', '', '2020-11-21', 0, 0, 56, '2020-09-30', 1),
(299, 6, 3, 'MEP/SD/B03/EL/LC-10', 'BUILDING 3 – ACCESS CONTROL SYSTEM SCHEMATIC RISER DIAGRAM', '', '2020-11-21', 0, 0, 56, '2020-09-30', 1),
(300, 6, 3, 'MEP/SD/B01/EL/LC-11', 'BUILDING 1 – AUDIO INTERCOM SYSTEM SCHEMATIC RISER DIAGRAM ', '', '2020-11-21', 0, 0, 56, '2020-09-30', 1),
(301, 6, 3, 'MEP/SD/B02/EL/LC-11', 'BUILDING 2 – AUDIO INTERCOM SYSTEM SCHEMATIC RISER DIAGRAM ', '', '2020-11-21', 0, 0, 56, '2020-09-30', 1),
(302, 6, 3, 'MEP/SD/B03/EL/LC-11', 'BUILDING 3 – AUDIO INTERCOM SYSTEM SCHEMATIC RISER DIAGRAM ', '', '2020-11-21', 0, 0, 56, '2020-09-30', 1),
(303, 6, 3, 'MEP/SD/EL/LC-12', 'CCTV CONTROL ROOM DETAIL DRAWING\r\n', '', '2020-12-30', 0, 0, 56, '2020-09-30', 1),
(304, 6, 3, 'MEP/SD/EL/T-01', 'BUILDING 1, 2 & 3 BASEMENT FLOOR PLAN - TELEPHONE LAYOUT (OVERALL)', '', '2020-11-10', 0, 0, 56, '2020-09-30', 1),
(305, 6, 3, 'MEP/SD/EL/T-01A', 'BUILDING 1 & 2 BASEMENT FLOOR PLAN (1 OF 2) - TELEPHONE LAYOUT ', '', '2020-11-12', 0, 0, 56, '2020-09-30', 1),
(306, 6, 3, 'MEP/SD/EL/T-01B', 'BUILDING 3 BASEMENT FLOOR PLAN (2 OF 2) - TELEPHONE LAYOUT', '', '2020-11-14', 0, 0, 56, '2020-09-30', 1),
(307, 6, 3, 'MEP/SD/EL/T-02', 'BUILDING 1, 2 & 3 GROUND FLOOR PLAN - TELEPHONE LAYOUT (OVERALL) ', '', '2020-11-16', 0, 0, 56, '2020-09-30', 1),
(308, 6, 3, 'MEP/SD/EL/T-02A', 'BUILDING 1 & 2 GROUND FLOOR PLAN (1 OF 2) - TELEPHONE LAYOUT ', '', '2020-11-18', 0, 0, 56, '2020-09-30', 1),
(309, 6, 3, 'MEP/SD/EL/T-02B', 'BUILDING 3 GROUND FLOOR PLAN (2 OF 2) - TELEPHONE LAYOUT ', '', '2020-11-21', 0, 0, 56, '2020-09-30', 1),
(310, 6, 3, 'MEP/SD/B01/EL/T-03', 'BUILDING 1 - 1ST FLOOR PLAN - TELEPHONE LAYOUT ', '', '2020-11-22', 0, 0, 56, '2020-09-30', 1),
(311, 6, 3, 'MEP/SD/B02/EL/T-03', 'BUILDING 2 - 1ST FLOOR PLAN - TELEPHONE LAYOUT ', '', '2020-11-24', 0, 0, 56, '2020-09-30', 1),
(312, 6, 3, 'MEP/SD/B03/EL/T-03', 'BUILDING 3 - 1ST FLOOR PLAN - TELEPHONE LAYOUT ', '', '2020-11-26', 0, 0, 56, '2020-09-30', 1),
(313, 6, 3, 'MEP/SD/B01/EL/T-04', 'BUILDING 1 – 2ND TO 4TH FLOOR PLAN - TELEPHONE LAYOUT ', '', '2020-11-28', 0, 0, 56, '2020-10-01', 1),
(314, 6, 3, 'MEP/SD/B02/EL/T-04', 'BUILDING 2 - 2ND TO 4TH FLOOR PLAN - TELEPHONE LAYOUT ', '', '2020-11-30', 0, 0, 56, '2020-10-01', 1),
(315, 6, 3, 'MEP/SD/B03/EL/T-04', 'BUILDING 3 - 2ND TO 4TH FLOOR PLAN - TELEPHONE LAYOUT ', '', '2020-12-01', 0, 0, 56, '2020-10-01', 1),
(316, 6, 3, 'MEP/SD/B01/EL/T-05', 'BUILDING 1 – 5TH FLOOR PLAN - TELEPHONE LAYOUT', '', '2020-12-03', 0, 0, 56, '2020-10-01', 1),
(317, 6, 3, 'MEP/SD/B02/EL/T-05', 'BUILDING 2 – 5TH FLOOR PLAN - TELEPHONE LAYOUT ', '', '2020-12-05', 0, 0, 56, '2020-10-01', 1),
(318, 6, 3, 'MEP/SD/B03/EL/T-05', 'BUILDING 3 - 5TH FLOOR PLAN - TELEPHONE LAYOUT ', '', '2020-12-07', 0, 0, 56, '2020-10-01', 1),
(319, 6, 3, 'MEP/SD/B01/EL/T-06', 'BUILDING 1 – 6TH FLOOR PLAN - TELEPHONE LAYOUT ', '', '2020-12-09', 0, 0, 56, '2020-10-01', 1),
(320, 6, 3, 'MEP/SD/B02/EL/T-06', 'BUILDING 2 – 6TH FLOOR PLAN - TELEPHONE LAYOUT ', '', '2020-12-12', 0, 0, 56, '2020-10-01', 1),
(321, 6, 3, 'MEP/SD/B03/EL/T-06', 'BUILDING 3 - 6TH FLOOR PLAN - TELEPHONE LAYOUT ', '', '2020-12-13', 0, 0, 56, '2020-10-01', 1),
(322, 6, 3, 'MEP/SD/B01/EL/T-07', 'BUILDING 1 – 7TH FLOOR PLAN - TELEPHONE LAYOUT ', '', '2020-12-15', 0, 0, 56, '2020-10-01', 1),
(323, 6, 3, 'MEP/SD/B02/EL/T-07', 'BUILDING 2 – 7TH FLOOR PLAN - TELEPHONE LAYOUT ', '', '2020-12-17', 0, 0, 56, '2020-10-01', 1),
(324, 6, 3, 'MEP/SD/B03/EL/T-07', 'BUILDING 3 - 7TH FLOOR PLAN - TELEPHONE LAYOUT ', '', '2020-12-19', 0, 0, 56, '2020-10-01', 1),
(325, 6, 3, 'MEP/SD/B01/EL/T-08', 'BUILDING 2 – ROOF FLOOR PLAN - TELEPHONE LAYOUT', '', '2020-12-21', 0, 0, 56, '2020-10-01', 1),
(326, 6, 3, 'MEP/SD/B02/EL/T-08', 'BUILDING 1 – STRUCTURED CABLING SYSTEM SCHEMATIC RISER DIAGRAM ', '', '2020-12-23', 0, 0, 56, '2020-10-01', 1),
(327, 6, 3, 'MEP/SD/B03/EL/T-08', 'BUILDING 2 – STRUCTURED CABLING SYSTEM SCHEMATIC RISER DIAGRAM ', '', '2020-12-26', 0, 0, 56, '2020-10-01', 1),
(328, 6, 3, 'MEP/SD/B02/EL/T-09', 'BUILDING 3 – STRUCTURED CABLING SYSTEM SCHEMATIC RISER DIAGRAM ', '', '2020-12-27', 0, 0, 56, '2020-10-01', 1),
(329, 6, 3, 'MEP/SD/EL/T-10', 'MTR ROOM DETAILS\r\n ', '', '2020-12-29', 0, 0, 56, '2020-10-01', 1),
(330, 6, 3, 'MEP/SD/EL/T-11', 'TELEPHONE SETTING OUT LAYOUT\r\n', '', '2020-09-27', 0, 0, 56, '2020-10-01', 1),
(331, 6, 3, 'MEP/SD/EL/E&LP-01', 'BUILDING 1, 2 & 3 GROUND FLOOR PLAN – EARTHING & LIGHTNING PROTECTION SYSTEM (OVERALL)', '', '2020-10-10', 0, 0, 56, '2020-10-01', 1),
(332, 6, 3, 'MEP/SD/EL/E&LP-01A', 'BUILDING 1 & 2 GROUND FLOOR PLAN (1 OF 2) - EARTHING & LIGHTNING PROTECTION SYSTEM ', '', '2020-10-12', 0, 0, 56, '2020-10-01', 1),
(333, 6, 3, 'MEP/SD/EL/E&LP-01B', 'BUILDING 3 GROUND FLOOR PLAN (2 OF 2) - EARTHING & LIGHTNING PROTECTION SYSTEM ', '', '2020-10-14', 0, 0, 56, '2020-10-01', 1),
(334, 6, 3, 'MEP/SD/B01/EL/LP-02', 'BUILDING 1 – ROOF FLOOR PLAN - LIGHTNING PROTECTION SYSTEM ', '', '2020-10-17', 0, 0, 56, '2020-10-01', 1),
(335, 6, 3, 'MEP/SD/B02/EL/LP-02', 'BUILDING 2 – ROOF FLOOR PLAN - LIGHTNING PROTECTION SYSTEM ', '', '2020-10-18', 0, 0, 56, '2020-10-01', 1),
(336, 6, 3, 'MEP/SD/B03/EL/LP-02', 'BUILDING 3 - ROOF FLOOR PLAN - LIGHTNING PROTECTION SYSTEM ', '', '2020-10-20', 0, 0, 56, '2020-10-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shop_drawing_log`
--

CREATE TABLE `shop_drawing_log` (
  `id` int(11) NOT NULL,
  `shop_drawing` int(11) NOT NULL,
  `revision` int(11) NOT NULL,
  `actual_submittal_date` date NOT NULL,
  `returned_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_drawing_log`
--

INSERT INTO `shop_drawing_log` (`id`, `shop_drawing`, `revision`, `actual_submittal_date`, `returned_date`, `status`, `modified_by`, `modified_date`) VALUES
(1, 115, 0, '2020-09-29', '0000-00-00', 5, 56, '2020-09-28 00:00:00'),
(2, 116, 0, '2020-09-29', '0000-00-00', 5, 56, '2020-09-28 00:00:00'),
(3, 117, 0, '2020-09-29', '0000-00-00', 5, 56, '2020-09-28 00:00:00'),
(4, 246, 0, '2020-09-26', '2020-09-26', 3, 56, '2020-09-29 08:50:53'),
(5, 85, 0, '2020-09-30', '0000-00-00', 5, 56, '2020-09-30 00:00:00'),
(6, 86, 0, '2020-09-30', '0000-00-00', 5, 56, '2020-09-30 00:00:00'),
(7, 87, 0, '2020-09-30', '0000-00-00', 5, 56, '2020-09-30 00:00:00'),
(8, 27, 0, '2020-10-01', '0000-00-00', 5, 56, '2020-10-01 00:00:00'),
(9, 28, 0, '2020-10-01', '0000-00-00', 5, 56, '2020-10-01 00:00:00'),
(10, 29, 0, '2020-10-01', '0000-00-00', 5, 56, '2020-10-01 00:00:00'),
(11, 143, 0, '2020-10-01', '0000-00-00', 5, 56, '2020-10-01 00:00:00'),
(12, 144, 0, '2020-10-01', '0000-00-00', 5, 56, '2020-10-01 00:00:00'),
(13, 145, 0, '2020-10-01', '0000-00-00', 5, 56, '2020-10-01 00:00:00'),
(14, 1, 0, '2020-10-03', '0000-00-00', 5, 56, '2020-10-01 00:00:00'),
(15, 2, 0, '2020-10-03', '0000-00-00', 5, 56, '2020-10-01 00:00:00'),
(16, 3, 0, '2020-10-03', '0000-00-00', 5, 56, '2020-10-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '1',
  `user_type` int(2) NOT NULL,
  `designation` int(11) NOT NULL,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `user_designations` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `label` varchar(100) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `modified_by` int(11) NOT NULL DEFAULT '56',
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `user_projects` (
  `id` int(11) NOT NULL,
  `user` int(5) NOT NULL,
  `project` int(5) NOT NULL,
  `added_by` int(5) NOT NULL,
  `added_date` datetime NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `edit` int(2) NOT NULL DEFAULT '0',
  `label` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `type`, `edit`, `label`) VALUES
(1, 'manager', 0, 'Manager'),
(2, 'engineer', 0, 'Engineer'),
(3, 'admin', 0, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asbuilt_drawing`
--
ALTER TABLE `asbuilt_drawing`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `asbuilt_drawing_log`
--
ALTER TABLE `asbuilt_drawing_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gmailuser`
--
ALTER TABLE `gmailuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_contractors`
--
ALTER TABLE `main_contractors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `material_status`
--
ALTER TABLE `material_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_submittal_log`
--
ALTER TABLE `material_submittal_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `project_id` (`project_id`);

--
-- Indexes for table `shop_drawing`
--
ALTER TABLE `shop_drawing`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `shop_drawing_log`
--
ALTER TABLE `shop_drawing_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_designations`
--
ALTER TABLE `user_designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_projects`
--
ALTER TABLE `user_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asbuilt_drawing`
--
ALTER TABLE `asbuilt_drawing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `asbuilt_drawing_log`
--
ALTER TABLE `asbuilt_drawing_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gmailuser`
--
ALTER TABLE `gmailuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_contractors`
--
ALTER TABLE `main_contractors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `material_status`
--
ALTER TABLE `material_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `material_submittal_log`
--
ALTER TABLE `material_submittal_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shop_drawing`
--
ALTER TABLE `shop_drawing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=337;

--
-- AUTO_INCREMENT for table `shop_drawing_log`
--
ALTER TABLE `shop_drawing_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `user_designations`
--
ALTER TABLE `user_designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_projects`
--
ALTER TABLE `user_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
