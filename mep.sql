-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2020 at 07:01 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mep`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_depts`
--

CREATE TABLE `auth_depts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_depts`
--

INSERT INTO `auth_depts` (`id`, `name`, `status`) VALUES
(1, 'DEWA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_insp_status`
--

CREATE TABLE `auth_insp_status` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_insp_status`
--

INSERT INTO `auth_insp_status` (`id`, `name`, `status`) VALUES
(1, 'Approved', 1);

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id` int(10) NOT NULL,
  `project` int(10) NOT NULL,
  `department` int(10) NOT NULL,
  `projected` int(10) NOT NULL,
  `actual` int(10) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  `date` datetime NOT NULL,
  `user` int(10) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `project`, `department`, `projected`, `actual`, `month`, `year`, `date`, `user`, `modified_by`, `modified_date`) VALUES
(1, 2, 1, 11111, 0, '9', '2020', '2020-09-02 06:33:29', 56, 0, '0000-00-00'),
(2, 2, 2, 12222, 0, '9', '2020', '2020-09-02 06:33:46', 56, 0, '0000-00-00'),
(3, 3, 1, 12333, 0, '9', '2020', '2020-09-02 06:34:02', 56, 0, '0000-00-00');

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
-- Table structure for table `critical_issue`
--

CREATE TABLE `critical_issue` (
  `id` int(11) NOT NULL,
  `project` int(5) NOT NULL,
  `department` int(5) NOT NULL,
  `issue` int(11) NOT NULL,
  `description` text NOT NULL,
  `date_added` date NOT NULL,
  `open_date` date NOT NULL,
  `assigned_date` date NOT NULL,
  `completed_date` date NOT NULL,
  `closed_date` date NOT NULL,
  `status` int(3) DEFAULT '1',
  `remark` text NOT NULL,
  `user` int(5) NOT NULL,
  `issue_owner` int(5) NOT NULL,
  `assignee` int(11) NOT NULL,
  `email_sent_date` date NOT NULL,
  `reminder_email_flag` int(11) NOT NULL,
  `modified_by` int(5) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `critical_issue`
--

INSERT INTO `critical_issue` (`id`, `project`, `department`, `issue`, `description`, `date_added`, `open_date`, `assigned_date`, `completed_date`, `closed_date`, `status`, `remark`, `user`, `issue_owner`, `assignee`, `email_sent_date`, `reminder_email_flag`, `modified_by`, `modified_date`) VALUES
(1, 2, 1, 1, ' q', '2020-08-31', '2020-08-31', '2020-08-31', '0000-00-00', '0000-00-00', 2, '', 0, 58, 59, '0000-00-00', 0, 56, '0000-00-00 00:00:00'),
(2, 2, 2, 1, ' Checking the issue email', '2020-09-01', '2020-09-01', '0000-00-00', '0000-00-00', '0000-00-00', 1, '', 0, 56, 0, '0000-00-00', 0, 56, '0000-00-00 00:00:00'),
(3, 3, 1, 1, ' Checking email SendGrid From Localhost ', '2020-09-01', '2020-09-01', '0000-00-00', '0000-00-00', '0000-00-00', 1, '', 0, 56, 60, '0000-00-00', 0, 56, '2020-09-02 08:47:12'),
(4, 2, 1, 1, '  222', '2020-09-01', '2020-09-01', '2020-09-01', '0000-00-00', '0000-00-00', 2, '', 0, 56, 58, '0000-00-00', 0, 56, '2020-09-02 00:03:09'),
(5, 0, 0, 0, '', '2020-09-01', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, '', 0, 0, 0, '0000-00-00', 0, 56, '0000-00-00 00:00:00'),
(6, 2, 1, 2, '  sdsd', '2020-09-01', '2020-09-01', '2020-09-01', '0000-00-00', '0000-00-00', 2, '', 0, 56, 58, '0000-00-00', 0, 56, '2020-09-02 00:02:23'),
(7, 2, 2, 3, ' sdsdsd', '2020-09-01', '2020-09-01', '0000-00-00', '0000-00-00', '0000-00-00', 1, '', 0, 56, 0, '0000-00-00', 0, 56, '0000-00-00 00:00:00'),
(8, 2, 2, 2, ' sdsdsd', '2020-09-01', '2020-09-01', '0000-00-00', '0000-00-00', '0000-00-00', 1, '', 0, 56, 0, '0000-00-00', 0, 56, '0000-00-00 00:00:00'),
(9, 2, 2, 4, '  xsdsds', '2020-09-01', '2020-09-01', '2020-09-01', '0000-00-00', '0000-00-00', 2, '', 0, 56, 58, '0000-00-00', 0, 56, '2020-09-02 00:10:51'),
(10, 2, 3, 1, ' sdsdsdsd', '2020-09-01', '2020-09-01', '0000-00-00', '0000-00-00', '0000-00-00', 1, '', 0, 56, 0, '0000-00-00', 0, 56, '0000-00-00 00:00:00'),
(11, 2, 3, 2, ' sdsdsdsd', '2020-09-01', '2020-09-01', '0000-00-00', '0000-00-00', '0000-00-00', 1, '', 0, 56, 0, '0000-00-00', 0, 56, '0000-00-00 00:00:00'),
(12, 2, 3, 2, ' sdsdsdsd', '2020-09-01', '2020-09-01', '0000-00-00', '0000-00-00', '0000-00-00', 1, '', 0, 56, 0, '0000-00-00', 0, 56, '0000-00-00 00:00:00'),
(13, 2, 3, 3, ' sdsdsdsd', '2020-09-01', '2020-09-01', '0000-00-00', '0000-00-00', '0000-00-00', 1, '', 0, 56, 0, '0000-00-00', 0, 56, '0000-00-00 00:00:00'),
(14, 2, 4, 1, ' sdsdsds', '2020-09-01', '2020-09-01', '0000-00-00', '0000-00-00', '0000-00-00', 1, '', 0, 56, 0, '0000-00-00', 0, 56, '0000-00-00 00:00:00'),
(15, 2, 4, 2, '    sdsdsds', '2020-09-01', '2020-09-01', '2020-09-02', '0000-00-00', '0000-00-00', 2, '', 0, 56, 60, '0000-00-00', 0, 56, '2020-09-02 08:45:13'),
(16, 3, 1, 2, '  sdsdsd', '2020-09-01', '2020-09-01', '2020-09-02', '0000-00-00', '0000-00-00', 2, '', 0, 58, 58, '0000-00-00', 0, 56, '2020-09-02 08:51:09'),
(17, 3, 1, 4, '  sdsdsd', '2020-09-01', '2020-09-01', '2020-09-01', '0000-00-00', '0000-00-00', 2, '', 0, 58, 58, '0000-00-00', 0, 56, '2020-09-02 00:56:17');

-- --------------------------------------------------------

--
-- Table structure for table `critical_issue_master`
--

CREATE TABLE `critical_issue_master` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `added_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `added_by` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `critical_issue_master`
--

INSERT INTO `critical_issue_master` (`id`, `name`, `status`, `added_date`, `added_by`) VALUES
(1, 'FINANCIAL ISSUE', 1, '2020-08-24 00:00:00', 9),
(2, 'DESIGN ISSUE', 1, '2020-08-24 00:00:00', 9),
(3, 'HR ISSUE', 1, '2020-08-24 00:00:00', 9),
(4, 'ENGINEERING ISSUE', 1, '2020-08-24 00:00:00', 9);

-- --------------------------------------------------------

--
-- Table structure for table `daily_manpower`
--

CREATE TABLE `daily_manpower` (
  `id` int(11) NOT NULL,
  `activity` varchar(200) NOT NULL,
  `technician` int(5) NOT NULL,
  `helper` int(5) NOT NULL,
  `project` int(5) NOT NULL,
  `department` int(5) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daily_manpower`
--

INSERT INTO `daily_manpower` (`id`, `activity`, `technician`, `helper`, `project`, `department`, `date`) VALUES
(1, 'Water Supply PPR Piping', 6, 4, 1, 1, '2020-05-30 00:00:00'),
(2, 'Water Supply Testing', 3, 4, 1, 2, '2020-05-30 22:35:31'),
(3, 'Water Supply Insulation', 3, 1, 1, 1, '2020-05-31 10:06:11');

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
(4, 'Fire Fighting', 1);

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
-- Table structure for table `inspections`
--

CREATE TABLE `inspections` (
  `id` int(11) NOT NULL,
  `inspection` int(5) NOT NULL,
  `project` int(5) NOT NULL,
  `milestone` int(5) NOT NULL,
  `auth_dept` int(5) NOT NULL,
  `description` text NOT NULL,
  `planned_date` date NOT NULL,
  `amended_date` date NOT NULL,
  `inspection_no` int(5) NOT NULL,
  `inspection_date` date NOT NULL,
  `completed_flag` int(11) NOT NULL,
  `date_added` date NOT NULL,
  `status` int(11) NOT NULL,
  `modified_by` int(3) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inspections`
--

INSERT INTO `inspections` (`id`, `inspection`, `project`, `milestone`, `auth_dept`, `description`, `planned_date`, `amended_date`, `inspection_no`, `inspection_date`, `completed_flag`, `date_added`, `status`, `modified_by`, `modified_date`) VALUES
(1, 1, 2, 1, 0, ' Qwer', '2020-09-02', '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 0, 56, '2020-09-02 00:00:00'),
(2, 2, 3, 2, 0, ' qas', '2020-09-12', '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 0, 56, '2020-09-02 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `inspection_history`
--

CREATE TABLE `inspection_history` (
  `id` int(11) NOT NULL,
  `inspection` int(11) NOT NULL,
  `number` int(5) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL,
  `remark` text NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inspection_history`
--

INSERT INTO `inspection_history` (`id`, `inspection`, `number`, `date`, `status`, `remark`, `modified_date`, `modified_by`) VALUES
(1, 2, 1, '2020-09-01', 2, ' Qwwr', '2020-09-02 00:00:00', 56),
(2, 1, 1, '2020-09-02', 2, ' ert', '2020-09-02 00:00:00', 56);

-- --------------------------------------------------------

--
-- Table structure for table `inspection_master`
--

CREATE TABLE `inspection_master` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `added_by` int(5) NOT NULL,
  `added_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inspection_master`
--

INSERT INTO `inspection_master` (`id`, `name`, `status`, `added_by`, `added_date`) VALUES
(1, 'DCD', 1, 9, '2020-08-24'),
(2, 'DEWA', 1, 9, '2020-08-24'),
(3, 'DM', 1, 9, '2020-08-24'),
(4, 'SIRA', 1, 9, '2020-08-24'),
(6, 'INSPECTION TEST', 1, 7, '2020-08-26');

-- --------------------------------------------------------

--
-- Table structure for table `inspection_status`
--

CREATE TABLE `inspection_status` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inspection_status`
--

INSERT INTO `inspection_status` (`id`, `name`) VALUES
(1, 'Approved'),
(2, 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `issue_status`
--

CREATE TABLE `issue_status` (
  `id` int(3) NOT NULL,
  `name` varchar(20) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_status`
--

INSERT INTO `issue_status` (`id`, `name`, `status`) VALUES
(1, 'Open', 1),
(2, 'Assigned', 1),
(3, 'Completed', 1),
(4, 'Closed', 1);

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
-- Table structure for table `mat_sub_log`
--

CREATE TABLE `mat_sub_log` (
  `id` int(11) NOT NULL,
  `project_id` int(10) NOT NULL,
  `dept_id` int(10) NOT NULL,
  `material_desc` varchar(100) NOT NULL,
  `planned_sub_date` date NOT NULL DEFAULT '2019-04-01',
  `manufacturer` varchar(100) NOT NULL,
  `PFA_status` varchar(10) NOT NULL,
  `act_sub_date` date NOT NULL DEFAULT '2019-04-05',
  `appr_req_date` date NOT NULL DEFAULT '2019-04-10',
  `appr_date` date NOT NULL DEFAULT '2019-04-15',
  `appr_status` varchar(10) NOT NULL,
  `rev1_date` date NOT NULL DEFAULT '2019-04-20',
  `rev1_appr_date` date NOT NULL DEFAULT '2019-04-22',
  `rev1_appr_status` varchar(10) NOT NULL,
  `rev2_date` date NOT NULL DEFAULT '2019-04-25',
  `rev2_appr_date` date NOT NULL DEFAULT '2019-04-30',
  `rev2_appr_status` varchar(10) NOT NULL,
  `final_status` varchar(10) NOT NULL,
  `delivery_period` varchar(10) NOT NULL,
  `remark` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mat_sub_log`
--

INSERT INTO `mat_sub_log` (`id`, `project_id`, `dept_id`, `material_desc`, `planned_sub_date`, `manufacturer`, `PFA_status`, `act_sub_date`, `appr_req_date`, `appr_date`, `appr_status`, `rev1_date`, `rev1_appr_date`, `rev1_appr_status`, `rev2_date`, `rev2_appr_date`, `rev2_appr_status`, `final_status`, `delivery_period`, `remark`) VALUES
(1, 1, 1, 'UPVC DRAINAGE PIPES & FITTINGS (ABOVE GROUND)', '2019-04-01', 'MPI Flowtech \nModern plasticc', 'AAN', '2019-04-05', '2019-04-10', '2019-04-15', 'A', '2019-04-20', '2019-04-22', '', '2019-04-25', '2019-04-30', '', 'A', '', ''),
(2, 1, 1, 'UPVC DRAINAGE PIPES & FITTINGS (UNDER GROUND)', '2019-04-01', 'MPI Flowtech \nModern plasticc', 'AAN', '2019-04-05', '2019-04-10', '2019-04-15', 'A', '2019-04-20', '2019-04-22', '', '2019-04-25', '2019-04-30', '', 'A', '', ''),
(3, 1, 1, 'UPVC HIGH PRESSURE PIPES & FITTINGS ', '2019-04-01', 'MPI Atlas', 'AAN', '2019-04-05', '2019-04-10', '2019-04-15', 'B', '2019-04-20', '2019-04-22', '', '2019-04-25', '2019-04-30', '', 'B', '', ''),
(4, 1, 1, 'HDPE PIPE & FITTING', '2019-04-01', 'Cancelled', '', '2019-04-05', '2019-04-10', '2019-04-15', 'closed', '2019-04-20', '2019-04-22', '', '2019-04-25', '2019-04-30', '', '0', '', ''),
(5, 1, 1, '(PP-R) POLYPROPYLENE PLUMBING PIPING', '2019-04-01', 'Cosmoplast', 'AAN', '2019-04-05', '2019-04-10', '2019-04-15', 'B', '2019-04-20', '2019-04-22', '', '2019-04-25', '2019-04-30', '', 'B', '', ''),
(6, 1, 1, 'PEX PIPE AND FITTINGS', '2019-04-01', 'Cosmoplast', 'AAN', '2019-04-05', '2019-04-10', '2019-04-15', 'RR', '2019-04-20', '2019-04-22', 'B', '2019-04-25', '2019-04-30', '', 'B', '', ''),
(7, 1, 1, 'MANHOLE & SUMP COVERS ', '2019-04-01', 'RSI \n', 'AAN', '2019-04-05', '2019-04-10', '2019-04-15', 'B', '2019-04-20', '2019-04-22', '', '2019-04-25', '2019-04-30', '', 'B', '', ''),
(8, 1, 1, 'WATER HAMMER ARRESTORS ', '2019-04-01', 'Watts', 'AAN', '2019-04-05', '2019-04-10', '2019-04-15', 'AA', '2019-04-20', '2019-04-22', '', '2019-04-25', '2019-04-30', '', 'A', '', ''),
(9, 1, 1, 'PIPE  HANGERS & SUPPORTS', '2019-04-01', 'Weicco', 'AAN', '2019-04-05', '2019-04-10', '2019-04-15', 'B', '2019-04-20', '2019-04-22', '', '2019-04-25', '2019-04-30', '', 'B', '', ''),
(10, 1, 1, 'GATE VALVES,GLOBE VALVES,DFV\'S,FLOAT VALVES,PRV', '2019-04-01', 'Hattersly', 'AAN', '2019-04-05', '2019-04-10', '2019-04-15', 'B', '2019-04-20', '2019-04-22', '', '2019-04-25', '2019-04-30', '', 'B', '', ''),
(11, 1, 1, 'FLOOR DRAINS ,FLOOR/WALL CLEAN OUTS,', '2019-04-01', 'Aqua - India', 'AAN', '2019-04-05', '2019-04-10', '2019-04-15', 'RR', '2019-04-20', '2019-04-22', 'B', '2019-04-25', '2019-04-30', '', 'B', '', 'Sample submitted on 07/01/2020  and approved on 12/01/2020 (Aqua brand only) & Rain water flapper outlet submitted on 03-02-2020 sample  \"A\"'),
(12, 1, 1, 'ROOF RAIN WATER OUTLET', '2019-04-01', 'Aqua ', 'AAN', '2019-04-05', '2019-04-10', '2019-04-15', 'A', '2019-04-20', '2019-04-22', '', '2019-04-25', '2019-04-30', '', 'A', '', ''),
(13, 1, 1, 'DOMESTIC PUMPS (Booster & Circulation pump)', '2019-04-01', 'XYLEM', 'RR', '2019-04-05', '2019-04-10', '2019-04-15', 'RR', '2019-04-20', '2019-04-22', 'B', '2019-04-25', '2019-04-30', '', 'A', '', ''),
(14, 1, 1, 'SEWAGE PUMP SETS', '2019-04-01', 'GENERAL Pumps', 'AAN', '2019-04-05', '2019-04-10', '2019-04-15', 'B', '2019-04-20', '2019-04-22', 'B', '2019-04-25', '2019-04-30', '', 'A', '', ''),
(15, 1, 1, 'GREASE TRAP', '2019-04-01', 'Waterline', 'AAN', '2019-04-05', '2019-04-10', '2019-04-15', 'B', '2019-04-20', '2019-04-22', '', '2019-04-25', '2019-04-30', '', 'B', '', ''),
(16, 1, 1, 'ACOUSTIC LAGGING', '2019-04-01', 'Kinetics', 'AAN', '2019-04-05', '2019-04-10', '2019-04-15', 'A', '2019-04-20', '2019-04-22', '', '2019-04-25', '2019-04-30', '', 'A', '', ''),
(17, 2, 1, 'SOLAR WATER HEATER', '2019-04-01', 'Kodsan', 'RR', '2019-04-05', '2019-04-10', '2019-04-15', 'RR', '2019-04-20', '2019-04-22', 'B', '2019-04-25', '2019-04-30', '', 'B', '', ''),
(18, 2, 1, 'ELECTRICAL WATER HEATER', '2019-04-01', 'Ariston - China', 'AAN', '2019-04-05', '2019-04-10', '2019-04-15', 'A', '2019-04-20', '2019-04-22', '', '2019-04-25', '2019-04-30', '', 'A', '', ''),
(19, 2, 1, 'GRP WATER TANK', '2019-04-01', 'Advanced Fiberglass LLC/ BK-Korea', 'AAN', '2019-04-05', '2019-04-10', '2019-04-15', 'B', '2019-04-20', '2019-04-22', '', '2019-04-25', '2019-04-30', '', 'B', '', ''),
(20, 2, 1, 'PUDDLE FLANGES', '2019-04-01', 'WATERLINE', '', '2019-04-05', '2019-04-10', '2019-04-15', 'B', '2019-04-20', '2019-04-22', '', '2019-04-25', '2019-04-30', '', 'B', '', ''),
(21, 2, 1, 'COPEER SILVER LONIZATION UNIT ALONG WITH CIRCUATION PUMP SET', '2019-04-01', 'WATERBIRD', '', '2019-04-05', '2019-04-10', '2019-04-15', 'RR', '2019-04-20', '2019-04-22', 'B', '2019-04-25', '2019-04-30', '', 'B', '', ''),
(22, 2, 1, 'ELASTOMERIC RUBBER INSULATION', '2019-04-01', 'ARMACELL', '', '2019-04-05', '2019-04-10', '2019-04-15', 'B', '2019-04-20', '2019-04-22', '', '2019-04-25', '2019-04-30', '', 'B', '', ''),
(23, 3, 1, 'UPVC DRAINAGE PIPES & FITTINGS (ABOVE GROUND)', '2020-05-06', 'Watts', 'AAN', '2020-05-03', '2020-05-19', '2020-05-09', 'A', '2020-05-04', '2020-05-04', 'B', '2020-05-04', '2020-05-29', '', 'A', '111', 'test'),
(24, 1, 1, 'UPVC DRAINAGE PIPES & FITTINGS (UNDER GROUND)', '0000-00-00', 'MPI Atlas', 'AAN', '0000-00-00', '0000-00-00', '0000-00-00', 'A', '0000-00-00', '0000-00-00', 'B', '0000-00-00', '0000-00-00', '', 'A', '11', 'testwww'),
(25, 2, 2, 'UPVC DRAINAGE PIPES & FITTINGS (UNDER GROUND)', '0000-00-00', 'Watts', 'AAN', '0000-00-00', '0000-00-00', '0000-00-00', 'RR', '0000-00-00', '0000-00-00', 'B', '0000-00-00', '0000-00-00', '', 'B', '11', 'WWWWWW');

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
(3, 'Milestones', '#', 0, 2, 1),
(4, 'Billing', '#', 0, 3, 1),
(5, 'Authority Approvals', '#', 0, 4, 1),
(6, 'Critical Issue', '#', 0, 5, 1),
(7, 'Project Milestones', 'milestone', 3, 1, 1),
(8, 'Milestone Achievements', 'milestone/view_milestone_overall', 3, 2, 1),
(9, 'Project Milestones', 'milestone/view_milestone_by_project', 3, 3, 1),
(10, 'Billing Management', 'billing', 4, 1, 1),
(11, 'Inspections', 'inspections', 5, 1, 1),
(12, 'Add Master', 'inspections/add_master', 5, 2, 1),
(13, 'Issues', 'critical_issue', 6, 1, 1),
(14, 'Add Master', 'critical_issue/add_master', 6, 2, 1),
(15, 'Users', '#', 0, 6, 1),
(16, 'User Management', 'user/manage', 15, 1, 1),
(17, 'Account', '#', 0, 7, 1),
(18, 'Logout', 'login/logout', 17, 1, 1),
(19, 'Update Project', 'projects/AJAXupdateProject', 1, 3, 0),
(20, 'Project Milestone Ajax', 'milestone/AJAXgetMilestoneProject', 3, 3, 0),
(21, 'Overall Milestone', 'milestone/AJAXshowOverallMilestones', 3, 3, 0),
(24, 'Get Billing Project Ajax', 'billing/AJAXgetBillingProject', 4, 3, 0),
(25, 'Edit Billing Ajax', 'billing/AJAXUpdateBilling', 4, 4, 0),
(26, 'Inspection Project Ajax', 'inspections/AJAXgetInspectionProject', 5, 3, 0),
(27, 'Issue By Project Ajax', 'critical_issue/AJAXgetIssueProject', 6, 3, 0),
(28, 'Issu Summary Ajax', 'critical_issue/AJAXgetIssueSummary', 6, 3, 0),
(29, 'Add inspection Ajax', 'inspections/AJAXAddInspection', 5, 3, 0),
(30, 'Add Inspection History Ajax', 'inspections/AJAXaddInspectionHistory', 5, 4, 0),
(31, 'Add Issue Ajax', 'critical_issue/AJAXaddCriticalIssue', 6, 4, 0),
(32, 'Issue Update Ajax', 'critical_issue/AJAXupdateForm', 6, 3, 0),
(34, 'Add Billing Ajax', 'billing/AJAXaddBilling', 4, 5, 0),
(35, 'Add Project Ajax', 'projects/AJAXaddProject', 1, 3, 0),
(36, 'Allocate Project', 'user/add_project_user', 15, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `milestones_master`
--

CREATE TABLE `milestones_master` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `added_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `added_by` int(5) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `milestones_master`
--

INSERT INTO `milestones_master` (`id`, `name`, `added_date`, `modified_date`, `added_by`, `status`) VALUES
(1, 'COMPLETION OF DRAWING', '2020-08-24 00:00:00', '0000-00-00 00:00:00', 9, 1),
(2, 'COMPLETION OF MST', '2020-08-24 00:00:00', '0000-00-00 00:00:00', 9, 1),
(4, 'MILESTONE TEST', '2020-08-26 00:00:00', '0000-00-00 00:00:00', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `milestones_master_status`
--

CREATE TABLE `milestones_master_status` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `milestones_master_status`
--

INSERT INTO `milestones_master_status` (`id`, `name`) VALUES
(1, 'active'),
(2, 'Inactive');

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
(1, 'R1083 - Al Qusais Residential Development', 'J1671', '2020-09-01', '2020-08-31', 2, 2, 'Schuster Pechtold', 0, 'Al Qusais', 10000, 10000, 10000, 10000, 0, '5', 1, 56, '2020-09-01 21:42:16', 0, 0, 0, 0),
(2, 'Palm Jumeirah', 'S001', '2020-08-30', '2021-08-01', 3, 3, 'Al Asri Engineering Consultant.', 0, 'Palm Jumeirah', 10000, 10000, 20000, 10000, 0, '2', 1, 56, '2020-08-30 00:00:00', 0, 0, 0, 0),
(3, 'Proposed Four Residential & Commercial building', 'J1677', '2020-04-02', '2021-12-28', 4, 4, 'Golden Square Engineering Consultants', 0, 'Oud Metha', 10000, 10000, 10000, 10000, 0, '4', 1, 56, '2020-08-30 00:00:00', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_milestones`
--

CREATE TABLE `project_milestones` (
  `id` int(11) NOT NULL,
  `project` int(5) NOT NULL,
  `milestone` text NOT NULL,
  `sequence` int(5) NOT NULL,
  `description` text NOT NULL,
  `planned_date` date NOT NULL,
  `actual_date` date NOT NULL,
  `amended_date` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `active_status` int(3) NOT NULL DEFAULT '1',
  `added_date` datetime NOT NULL,
  `modified_by` int(5) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_milestones`
--

INSERT INTO `project_milestones` (`id`, `project`, `milestone`, `sequence`, `description`, `planned_date`, `actual_date`, `amended_date`, `status`, `active_status`, `added_date`, `modified_by`, `modified_date`) VALUES
(1, 2, '1', 1, 'Wer', '2020-09-02', '0000-00-00', '0000-00-00', '', 1, '2020-09-02 00:00:00', 56, '0000-00-00 00:00:00'),
(2, 3, '1', 1, 'Qwe', '2020-09-12', '0000-00-00', '0000-00-00', '', 1, '2020-09-02 00:00:00', 56, '0000-00-00 00:00:00');

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
(1, 'ahmed.emish@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'ahmed.emish@alshirawimep.com', 0, 1, 1, '2020-08-30 10:02:27'),
(2, 'emad.mohammed@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'emad.mohammed@alshirawimep.com', 0, 1, 2, '2020-08-30 10:02:27'),
(3, 'girish.veetil@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'girish.veetil@alshirawimep.com', 0, 1, 2, '2020-08-30 10:02:27'),
(4, 'sharanjit.saini@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'sharanjit.saini@alshirawimep.com', 0, 1, 2, '2020-08-30 10:02:27'),
(5, 'ramnath.pai@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'ramnath.pai@alshirawimep.com', 0, 1, 2, '2020-08-30 10:02:27'),
(6, 'dennis.daniel@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'dennis.daniel@alshirawimep.com', 0, 1, 2, '2020-08-30 10:02:27'),
(7, 'muhunthan.parasuram@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'muhunthan.parasuram@alshirawimep.com', 0, 1, 2, '2020-08-30 10:02:27'),
(8, 'najeebuddin.mohammed@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'najeebuddin.mohammed@alshirawimep.com', 0, 1, 3, '2020-08-30 10:02:27'),
(9, 'arun.abraham@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'arun.abraham@alshirawimep.com', 0, 1, 3, '2020-08-30 10:02:27'),
(10, 'shenraj.rengasamy@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'shenraj.rengasamy@alshirawimep.com', 0, 1, 3, '2020-08-30 10:02:27'),
(11, 'jaclyn.pahayahay@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'jaclyn.pahayahay@alshirawimep.com', 0, 1, 2, '2020-08-30 10:02:27'),
(12, 'rajeshbs@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'rajeshbs@alshirawimep.com', 0, 1, 4, '2020-08-30 10:02:27'),
(13, 'jerin.joy@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'jerin.joy@alshirawimep.com', 0, 1, 4, '2020-08-30 10:02:27'),
(14, 'aasif.dilbag@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'aasif.dilbag@alshirawimep.com', 0, 1, 4, '2020-08-30 10:02:27'),
(15, 'balan.krishnan@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'balan.krishnan@alshirawimep.com', 0, 1, 5, '2020-08-30 10:02:27'),
(16, 'prabhu.kasinathan@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'prabhu.kasinathan@alshirawimep.com', 0, 1, 5, '2020-08-30 10:02:27'),
(17, 'shijo.joseph@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'shijo.joseph@alshirawimep.com', 0, 1, 5, '2020-08-30 10:02:27'),
(18, 'imran.kamaltheen@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'imran.kamaltheen@alshirawimep.com', 0, 1, 5, '2020-08-30 10:02:27'),
(19, 'ponnalagu.palanikumar@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'ponnalagu.palanikumar@alshirawimep.com', 0, 1, 5, '2020-08-30 10:02:27'),
(20, 'rafi.ahmed@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'rafi.ahmed@alshirawimep.com', 0, 1, 5, '2020-08-30 10:02:27'),
(21, 'karnan.periyasamy@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'karnan.periyasamy@alshirawimep.com', 0, 1, 5, '2020-08-30 10:02:28'),
(22, 'salu.george@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'salu.george@alshirawimep.com', 0, 2, 6, '2020-08-30 10:02:28'),
(23, 'syed.ahmed@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'syed.ahmed@alshirawimep.com', 0, 2, 6, '2020-08-30 10:02:28'),
(24, 'alfred.thomas@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'alfred.thomas@alshirawimep.com', 0, 2, 6, '2020-08-30 10:02:28'),
(25, 'ankit.bajpayee@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'ankit.bajpayee@alshirawimep.com', 0, 2, 6, '2020-08-30 10:02:28'),
(26, 'venkata.keshavarapu@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'venkata.keshavarapu@alshirawimep.com', 0, 2, 6, '2020-08-30 10:02:28'),
(27, 'sony.baby@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'sony.baby@alshirawimep.com', 0, 2, 6, '2020-08-30 10:02:28'),
(28, 'ramesh.subburaj@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'ramesh.subburaj@alshirawimep.com', 0, 2, 6, '2020-08-30 10:02:28'),
(29, 'krishnaraj.alagu@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'krishnaraj.alagu@alshirawimep.com', 0, 2, 6, '2020-08-30 10:02:28'),
(30, 'manoj.kumar@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'manoj.kumar@alshirawimep.com', 0, 2, 6, '2020-08-30 10:02:28'),
(31, 'mithun.kp@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'mithun.kp@alshirawimep.com', 0, 2, 6, '2020-08-30 10:02:28'),
(32, 'tharik.kamaludeen@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'tharik.kamaludeen@alshirawimep.com', 0, 2, 6, '2020-08-30 10:02:28'),
(33, 'shahed.hussain@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'shahed.hussain@alshirawimep.com', 0, 2, 6, '2020-08-30 10:02:28'),
(34, 'aditya.narayanan@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'aditya.narayanan@alshirawimep.com', 0, 2, 6, '2020-08-30 10:02:28'),
(35, 'haris.mohammed@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'haris.mohammed@alshirawimep.com', 0, 2, 6, '2020-08-30 10:02:28'),
(36, 'suresh.chattikkal@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'suresh.chattikkal@alshirawimep.com', 0, 2, 6, '2020-08-30 10:02:28'),
(37, 'mohamed.shakeeb@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'mohamed.shakeeb@alshirawimep.com', 0, 2, 6, '2020-08-30 10:02:28'),
(38, 'john.bandayrel@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'john.bandayrel@alshirawimep.com', 0, 3, 7, '2020-08-30 10:02:28'),
(39, 'syed.gufran@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'syed.gufran@alshirawimep.com', 0, 3, 7, '2020-08-30 10:02:28'),
(40, 'mohamed.asif@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'mohamed.asif@alshirawimep.com', 0, 3, 7, '2020-08-30 10:02:28'),
(41, 'raju.lama@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'raju.lama@alshirawimep.com', 0, 3, 7, '2020-08-30 10:02:28'),
(42, 'lijo.james@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'lijo.james@alshirawimep.com', 0, 1, 8, '2020-08-30 10:02:28'),
(43, 'saqeeb.chougule@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'saqeeb.chougule@alshirawimep.com', 0, 1, 8, '2020-08-30 10:02:29'),
(44, 'praveen.k@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'praveen.k@alshirawimep.com', 0, 1, 8, '2020-08-30 10:02:29'),
(45, 'nandu.krishnan@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'nandu.krishnan@alshirawimep.com', 0, 1, 8, '2020-08-30 10:02:29'),
(46, 'wasif.khan@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'wasif.khan@alshirawimep.com', 0, 1, 8, '2020-08-30 10:02:29'),
(47, 'kanchi.rajendran@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'kanchi.rajendran@alshirawimep.com', 0, 1, 8, '2020-08-30 10:02:29'),
(48, 'keyur.thakore@alshirawimep.ae', 'e10adc3949ba59abbe56e057f20f883e', 'keyur.thakore@alshirawimep.ae', 0, 1, 9, '2020-08-30 10:02:29'),
(49, 'avatar.singh@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'avatar.singh@alshirawimep.com', 0, 1, 9, '2020-08-30 10:02:29'),
(50, 'sidhesh.nadkarni@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'sidhesh.nadkarni@alshirawimep.com', 0, 1, 10, '2020-08-30 10:02:29'),
(51, 'anwar.basha@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'anwar.basha@alshirawimep.com', 0, 3, 10, '2020-08-30 10:02:29'),
(52, 'gaurav.patel@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'gaurav.patel@alshirawimep.com', 0, 1, 10, '2020-08-30 10:02:29'),
(53, 'nizam.khan@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'nizam.khan@alshirawimep.com', 0, 1, 10, '2020-08-30 10:02:29'),
(54, 'wasim.akram@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'wasim.akram@alshirawimep.com', 0, 1, 10, '2020-08-30 10:02:29'),
(55, 'milind.vaidya@alshirawimep.com', 'e10adc3949ba59abbe56e057f20f883e', 'milind.vaidya@alshirawimep.com', 0, 1, 10, '2020-08-30 10:02:29'),
(56, 'admin', '0192023a7bbd73250516f069df18b500', 'sabinonweb@gmail.com', 1, 3, 7, '2020-08-30 10:03:56'),
(57, 'anand', 'e10adc3949ba59abbe56e057f20f883e', 'anand.mohankumar@alshirawimep.com', 0, 3, 7, '2020-08-30 10:05:44'),
(58, 'engineer', 'e10adc3949ba59abbe56e057f20f883e', 'sabinchacko03@gmail.com', 1, 2, 6, '2020-08-30 11:58:32'),
(59, 'manager', 'e10adc3949ba59abbe56e057f20f883e', 'sabin.chacko@yahoo.in', 1, 3, 1, '2020-08-30 11:58:50'),
(60, 'test', 'e10adc3949ba59abbe56e057f20f883e', 'test@gmail.com', 1, 2, 7, '2020-09-02 08:30:46');

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
(3, 60, 2, 56, '2020-09-02 00:00:00', 1);

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
-- Indexes for table `auth_depts`
--
ALTER TABLE `auth_depts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_insp_status`
--
ALTER TABLE `auth_insp_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `critical_issue`
--
ALTER TABLE `critical_issue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `critical_issue_master`
--
ALTER TABLE `critical_issue_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_manpower`
--
ALTER TABLE `daily_manpower`
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
-- Indexes for table `inspections`
--
ALTER TABLE `inspections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inspection_history`
--
ALTER TABLE `inspection_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inspection_master`
--
ALTER TABLE `inspection_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inspection_status`
--
ALTER TABLE `inspection_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_status`
--
ALTER TABLE `issue_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_contractors`
--
ALTER TABLE `main_contractors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mat_sub_log`
--
ALTER TABLE `mat_sub_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `milestones_master`
--
ALTER TABLE `milestones_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `milestones_master_status`
--
ALTER TABLE `milestones_master_status`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_milestones`
--
ALTER TABLE `project_milestones`
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
-- AUTO_INCREMENT for table `auth_depts`
--
ALTER TABLE `auth_depts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_insp_status`
--
ALTER TABLE `auth_insp_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `critical_issue`
--
ALTER TABLE `critical_issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `critical_issue_master`
--
ALTER TABLE `critical_issue_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `daily_manpower`
--
ALTER TABLE `daily_manpower`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gmailuser`
--
ALTER TABLE `gmailuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inspections`
--
ALTER TABLE `inspections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inspection_history`
--
ALTER TABLE `inspection_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inspection_master`
--
ALTER TABLE `inspection_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inspection_status`
--
ALTER TABLE `inspection_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `issue_status`
--
ALTER TABLE `issue_status`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `main_contractors`
--
ALTER TABLE `main_contractors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mat_sub_log`
--
ALTER TABLE `mat_sub_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `milestones_master`
--
ALTER TABLE `milestones_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `milestones_master_status`
--
ALTER TABLE `milestones_master_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_milestones`
--
ALTER TABLE `project_milestones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `user_designations`
--
ALTER TABLE `user_designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_projects`
--
ALTER TABLE `user_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `milestones_master`
--
ALTER TABLE `milestones_master`
  ADD CONSTRAINT `milestones_master_ibfk_1` FOREIGN KEY (`status`) REFERENCES `milestones_master_status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
