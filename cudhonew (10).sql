-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2023 at 12:34 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cudhonew`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_audit`
--

CREATE TABLE `tbl_audit` (
  `id` int(11) NOT NULL,
  `datecommit` datetime NOT NULL,
  `user_id` int(12) NOT NULL,
  `actiondone` varchar(100) NOT NULL,
  `subject` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_audit`
--

INSERT INTO `tbl_audit` (`id`, `datecommit`, `user_id`, `actiondone`, `subject`) VALUES
(1, '2023-07-04 10:20:17', 1, 'ADDED A MEMBER', 1),
(2, '2023-07-04 10:20:17', 1, 'ADDED A MEMBER', 1),
(3, '2023-07-04 10:20:17', 1, 'ADDED A MEMBER', 1),
(4, '2023-07-04 10:20:17', 1, 'Modified A MEMBER', 1),
(5, '2022-07-04 10:20:17', 1, 'Pogi ko', 2),
(6, '2023-07-26 18:19:10', 1, 'ADDED NEW USER', 2),
(7, '2023-07-26 18:29:21', 1, 'ADDED A USER', 33),
(8, '2023-07-26 18:35:10', 1, 'ADDED A USER', 34),
(9, '2023-07-26 18:36:28', 14, 'ADDED A USER', 35),
(10, '2023-07-26 18:39:02', 14, 'MODIFIED A USER', 14),
(11, '2023-07-26 18:39:35', 14, 'MODIFIED A USER', 26),
(12, '2023-07-26 18:40:59', 14, 'DELETED A USER', 26),
(13, '2023-07-27 15:04:43', 1, 'MODIFIED A USER', 1),
(14, '2023-07-27 15:13:29', 1, 'MODIFIED A HOUSEHOLD HEAD', 0),
(15, '2023-07-27 15:14:39', 1, 'MODIFIED A HOUSEHOLD HEAD', 54),
(16, '2023-07-27 15:20:04', 1, 'MODIFIED A SPOUSE', 1),
(17, '2023-07-27 15:20:50', 1, 'MODIFIED A SPOUSE', 9),
(18, '2023-07-27 15:23:27', 1, 'MODIFIED A HOUSEHOLD HEAD', 1),
(22, '2023-07-27 15:29:09', 1, 'MODIFIED A FACILITY', 1),
(23, '2023-07-27 15:32:08', 1, 'MODIFIED AN INTERVIEW', 5),
(24, '2023-07-27 16:57:51', 1, 'MODIFIED A WORKING CHILD', 19),
(25, '2023-07-27 17:01:27', 1, 'ADDED A WORKING CHILD', 23),
(26, '2023-07-27 17:03:39', 1, 'DELETED A WORKING CHILD', 23),
(27, '2023-07-27 17:26:37', 1, 'DELETED A MINOR CHILD', 15),
(28, '2023-07-27 17:27:05', 1, 'DELETED A MINOR CHILD', 27),
(29, '2023-07-27 17:31:58', 1, 'ADDED A MINOR CHILD', 0),
(30, '2023-07-27 17:34:17', 1, 'ADDED A MINOR CHILD', 0),
(31, '2023-07-27 17:35:16', 1, 'ADDED A MINOR CHILD', 35),
(32, '2023-07-27 17:35:24', 1, 'MODIFIED A MINOR CHILD', 35),
(33, '2023-07-27 17:35:27', 1, 'DELETED A MINOR CHILD', 35),
(34, '2023-07-27 17:36:26', 1, 'DELETED A MINOR CHILD', 1),
(35, '2023-07-27 18:28:22', 1, 'ADDED A SENIOR/PWD', 27),
(36, '2023-07-27 18:28:34', 1, 'MODIFIED A SENIOR/PWD', 27),
(37, '2023-07-27 18:28:40', 1, 'DELETED A SENIOR/PWD', 27),
(38, '2023-07-27 18:33:31', 1, 'ADDED A NEW MEMBER', 66);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_childminor`
--

CREATE TABLE `tbl_childminor` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `head_id` int(11) NOT NULL,
  `isdelete` int(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `extension` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `birthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_childminor`
--

INSERT INTO `tbl_childminor` (`id`, `user_id`, `head_id`, `isdelete`, `firstname`, `middlename`, `lastname`, `extension`, `gender`, `birthdate`) VALUES
(1, 1, 1, 1, 'IAN', 'BAUAN', 'PASCUAL', '', 'MALE', '2011-12-29'),
(15, 1, 1, 0, 'HADID', '', 'GG', '', 'FEMALE', '2021-01-22'),
(25, 1, 54, 0, 'ARRISTOPHER', 'CARANZA', 'CASIMIRO', 'JR', 'MALE', '2000-12-29'),
(26, 1, 54, 0, 'RAICEN JUSTIN', 'CARANZA', 'CASIMIRO', '', 'MALE', '2004-11-19'),
(27, 1, 1, 0, 'EARL', 'BAUAN', 'PASCUAL', '', 'MALE', '2014-12-12'),
(28, 1, 56, 0, 'JONATHAN', 'OLORVIDA', 'EVANGELIO', '', 'MALE', '2001-07-20'),
(29, 1, 56, 0, 'JOHN PAUL', 'OLORVIDA', 'EVANGELIO', '', 'MALE', '2006-06-17'),
(30, 1, 63, 0, 'JONATHAN', 'OLORVIDA', 'PASCUAL', 'JR', 'MALE', '2006-09-14'),
(31, 1, 63, 0, 'PRINCESS', 'OLORVIDA', 'PASCUAL', '', 'FEMALE', '2008-07-24'),
(32, 1, 63, 0, 'NENE', 'JUN', 'EVANGELIO', '', 'FEMALE', '2006-07-07'),
(33, 1, 64, 0, 'JONATHAN', 'OLORVIDA', 'EVANGELIO', 'JR', 'MALE', '2023-02-01'),
(34, 1, 65, 0, 'RAICEN JUSTIN', 'CARANZA', 'CASIMIRO', '', 'MALE', '2004-11-18'),
(35, 1, 1, 1, 'SDFSFD', 'SDSFD', 'KIL', 'DSF', 'MALE', '2011-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_childwork`
--

CREATE TABLE `tbl_childwork` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `head_id` int(11) NOT NULL,
  `isdelete` int(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `extension` varchar(50) NOT NULL,
  `maidenname` varchar(50) NOT NULL,
  `monthIncome` int(11) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `birthdate` date NOT NULL,
  `civilStatus` varchar(50) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `pagIbig` int(1) NOT NULL,
  `sss` int(1) NOT NULL,
  `other` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_childwork`
--

INSERT INTO `tbl_childwork` (`id`, `user_id`, `head_id`, `isdelete`, `firstname`, `middlename`, `lastname`, `extension`, `maidenname`, `monthIncome`, `gender`, `birthdate`, `civilStatus`, `occupation`, `pagIbig`, `sss`, `other`) VALUES
(1, 1, 1, 1, 'ALANN', 'BAUAN', 'PASQUAL', 'JUNIOR', '', 3000, 'MALE', '1998-01-01', 'SINGLE', 'BOUNCER', 1, 1, ''),
(5, 1, 1, 1, 'VIKTOR', 'MAG', 'TANGOL', '', '', 2000, 'FEMALE', '2001-12-11', 'MARRIED', 'SUPERHERO', 1, 0, 'POGI'),
(11, 1, 54, 0, 'CHRISTOPHER', 'CARANZA', 'CASIMIRO', '', '', 17000, 'MALE', '1999-11-18', 'SINGLE', 'PROGRAMMER', 1, 0, ''),
(12, 1, 56, 0, 'MARIA CELINE', 'OLORVIDA', 'EVANGELIO', '', 'EVANGELIO', 50000, 'FEMALE', '1998-02-14', 'SINGLE', 'BANK TELLER', 1, 1, ''),
(13, 1, 56, 0, 'JACINTO', 'OLORVIDA', 'EVANGELIO', 'JR', '', 30000, 'MALE', '1997-12-03', 'SINGLE', 'HUMAN RESOURSES STAFF', 1, 1, ''),
(14, 1, 63, 0, 'JAMES', 'HARDEN', 'PASCUAL', '', '', 200, 'MALE', '2002-06-27', 'SINGLE', 'BANK TELLER', 1, 0, ''),
(15, 1, 63, 0, 'JOMS', 'JONATHAN', 'EVANGELIO', 'JR', '', 20, 'MALE', '2003-06-06', 'SINGLE', 'TAGA TALI NG YELO', 0, 0, ''),
(16, 1, 64, 0, 'MARIA CELINE', 'OLORVIDA', 'PASCUAL', '', 'PASCUAL', 50000, 'FEMALE', '2023-01-31', 'SINGLE', 'BANK TELLER', 0, 0, ''),
(17, 1, 65, 0, 'CHRISTOPHER', 'CARANZA', 'CASIMIRO', '', '', 100, 'MALE', '1999-11-28', 'SINGLE', 'PROGRAMMER', 1, 1, ''),
(19, 1, 1, 0, 'TOTI', 'TOTI', 'TOTI', '', '', 12, 'MALE', '2000-12-29', 'SINGLE', 'TOTI', 0, 0, ''),
(20, 14, 1, 0, 'TIN', 'BAUAN', 'PASQUAL', '', '', 5, 'MALE', '2012-12-12', 'SINGLE', 'DRAWER', 0, 0, ''),
(21, 1, 2, 0, 'JONATHAN', 'LOL', 'EVANGELIO', 'dsf', '', 1, 'MALE', '2012-12-12', 'SINGLE', 'llol', 0, 0, ''),
(23, 1, 1, 1, 'EEREWW', 'EWRWRE', 'SDFDF', 'FDDF', '', 0, 'MALE', '2012-12-12', 'SINGLE', '334334', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_facility`
--

CREATE TABLE `tbl_facility` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `head_id` int(11) NOT NULL,
  `electricity` varchar(20) NOT NULL,
  `water` varchar(20) NOT NULL,
  `toilet` varchar(20) NOT NULL,
  `kitchen` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_facility`
--

INSERT INTO `tbl_facility` (`id`, `user_id`, `head_id`, `electricity`, `water`, `toilet`, `kitchen`) VALUES
(1, 1, 1, 'SUB-METER', 'DEEPWELL', 'SHARED', 'SHARED'),
(2, 1, 2, 'NONE', 'DEEPWELL', 'OWN', 'OWN'),
(5, 1, 54, 'OWN', 'DEEPWELL', 'OWN', 'OWN'),
(7, 1, 56, 'NONE', 'DEEPWELL', 'OWN', 'OWN'),
(8, 1, 57, 'OWN', 'LAGUNA WATERS', 'OWN', 'OWN'),
(9, 1, 58, 'OWN', 'LAGUNA WATERS', 'OWN', 'OWN'),
(10, 1, 59, 'OWN', 'LAGUNA WATERS', 'OWN', 'OWN'),
(11, 1, 60, 'OWN', 'LAGUNA WATERS', 'OWN', 'OWN'),
(12, 1, 61, 'OWN', 'LAGUNA WATERS', 'OWN', 'OWN'),
(13, 1, 62, 'OWN', 'LAGUNA WATERS', 'OWN', 'OWN'),
(14, 1, 63, 'OWN', 'DEEPWELL', 'SHARED', 'OWN'),
(15, 1, 64, 'OWN', 'DEEPWELL', 'OWN', 'SHARED'),
(16, 1, 65, 'OWN', 'LAGUNA WATERS', 'OWN', 'OWN'),
(17, 1, 66, 'OWN', 'LAGUNA WATERS', 'OWN', 'OWN');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_headinfo`
--

CREATE TABLE `tbl_headinfo` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `maidenname` varchar(50) NOT NULL,
  `extension` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `community` varchar(50) NOT NULL,
  `basicHouse` varchar(50) NOT NULL,
  `tag` varchar(20) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `civilStatus` varchar(20) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `monthIncome` int(11) NOT NULL,
  `pagIbig` int(1) NOT NULL,
  `sss` int(1) NOT NULL,
  `other` varchar(100) NOT NULL,
  `tenurStatus` varchar(50) NOT NULL,
  `origOwner` varchar(100) NOT NULL,
  `structure` varchar(50) NOT NULL,
  `yearStay` date NOT NULL,
  `relocUnavailable` varchar(50) NOT NULL,
  `relocated` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_headinfo`
--

INSERT INTO `tbl_headinfo` (`id`, `user_id`, `firstname`, `lastname`, `middlename`, `maidenname`, `extension`, `barangay`, `community`, `basicHouse`, `tag`, `birthdate`, `gender`, `civilStatus`, `occupation`, `monthIncome`, `pagIbig`, `sss`, `other`, `tenurStatus`, `origOwner`, `structure`, `yearStay`, `relocUnavailable`, `relocated`) VALUES
(1, 1, 'DOMINIC', 'PASCUAL', 'BAUAN', 'MAIDEN', 'EXTEND', 'TAGAPO', 'JORDAN1', '', '1A', '2000-12-11', 'MALE', 'MARRIED', 'DANCER', 10000, 1, 1, '', 'OWNER', 'DOMINIC BAUAN PASCUAL', 'CONCRETE', '2011-02-22', 'BALIK PROBISNYA PROGRAM', 'SUVB. MERCEDES BRGY. SINALHAN'),
(2, 1, 'JONATHAN', 'EVANGELIO', 'UTANE', 'GIRL', 'JR', 'TAGAPO', 'JORDAN1', '', '1A', '1985-11-11', 'MALE', 'SINGLE', 'PUSHER', 1000000, 0, 0, '', 'OWNER', '', 'CONCRETE', '2013-11-11', 'FINANCIAL ASSISTANCE', 'SUVB. MERCEDES SINALHAN'),
(54, 1, 'OLIVIA', 'CASIMIRO', 'TUMABACAL', 'CARANZA', '', 'SINALHAN', 'COMMUNITY3', 'FLOOD', '1A', '1970-12-12', 'FEMALE', 'MARRIED', 'HOUSEWIFE', 10000, 1, 1, '', 'OWNER', 'OLIVIA TUMABACAL CASIMIRO', 'CONCRETE', '2000-12-12', 'FINANCIAL ASSISTANCE', 'SUVB. MERCEDES'),
(56, 1, 'JACINTO', 'EVANGELIO', 'GARCIA', '', 'SR', 'SINALHAN', 'COMMUNITY3', 'FLOOD', '2A', '1990-07-20', 'MALE', 'MARRIED', 'GUARD', 10000, 1, 0, 'GSIS', 'OWNER', 'JACINTO GARCIA EVANGELIO', 'SEMI-CONCRETE', '2000-12-12', 'BALIK PROBISNYA PROGRAM', 'lol'),
(63, 1, 'DOMINI', 'PASCUA', 'CADATA', '', '', 'TAGAPO', 'COMMUNITY10', 'FLOOD', '1A', '2000-05-05', 'MALE', 'DIVORCED', 'GUAR', 100, 1, 1, '', 'OWNER', 'DOMINI CADATA PASCUA', 'CONCRETE', '2013-07-30', 'UNDECIDED', 'idk'),
(64, 1, 'JANE', 'EVANGELIO', 'OLORVIDA', 'GARCIA', '', 'DON JOSE', 'COMMUNITY11', 'SEA LEVEL RISE', 'A2', '2023-01-01', 'FEMALE', 'MARRIED', 'GUARD', 10000, 1, 0, '', 'OWNER', 'JANE OLORVIDA EVANGELIO', 'SEMI-CONCRETE', '2013-01-01', 'FINANCIAL ASSISTANCE', 'YES'),
(65, 1, 'ARRISTOPHER ', 'CASIMIRO', 'CACAO', '', 'SR', 'SINALHAN', 'COMMUNITY3', 'LANDSLIDE', '1A', '2001-10-10', 'MALE', 'SINGLE', 'GUARD', 10, 1, 1, '', 'OWNER', 'ARRISTOPHER  CACAO CASIMIRO', 'CONCRETE', '2000-12-11', 'FINANCIAL ASSISTANCE', 'MERCEDEZ'),
(66, 1, 'DFDSDF', 'DSFD', 'DSFFDDSFSFD', '', 'DSFDF', 'SDFSDFFSD', 'DSDFSD', 'DSFDFSDFds', 'DSFDSFDS', '2012-02-12', 'MALE', 'SINGLE', 'DSFSAFDSDF', 0, 0, 0, '', 'OWNER', 'DFDSDF DSFFDDSFSFD DSFD', 'CONCRETE', '2012-12-12', 'FINANCIAL ASSISTANCE', 'SDFDFDF');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_image`
--

CREATE TABLE `tbl_image` (
  `id` int(11) NOT NULL,
  `user_id` int(12) NOT NULL,
  `head_id` int(12) NOT NULL,
  `imagePath` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_image`
--

INSERT INTO `tbl_image` (`id`, `user_id`, `head_id`, `imagePath`) VALUES
(7, 1, 1, 'uploads/newd.png'),
(8, 1, 1, 'uploads/Untitled.png'),
(9, 1, 54, 'uploads/fam.jpg'),
(10, 1, 65, 'uploads/-1111.png'),
(11, 1, 64, 'uploads/-22222.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_interinfo`
--

CREATE TABLE `tbl_interinfo` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `head_id` int(11) NOT NULL,
  `res_Fname` varchar(50) NOT NULL,
  `res_Mname` varchar(50) NOT NULL,
  `res_Lname` varchar(50) NOT NULL,
  `relationship` varchar(50) NOT NULL,
  `int_Fname` varchar(50) NOT NULL,
  `int_Mname` varchar(50) NOT NULL,
  `int_Lname` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `remarks` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_interinfo`
--

INSERT INTO `tbl_interinfo` (`id`, `user_id`, `head_id`, `res_Fname`, `res_Mname`, `res_Lname`, `relationship`, `int_Fname`, `int_Mname`, `int_Lname`, `date`, `remarks`) VALUES
(1, 1, 1, 'DOMINIC', 'BAUAN', 'PASCUAL', 'PERSON LISTED IN MASTERLIST', 'JOMARI', 'ALBIONS', 'GALANGS', '2011-01-24', 'SI DOMINIC MAHILIG SA IMMERSIONS'),
(5, 1, 54, 'OLIVIA', 'CARANZA', 'CASIMIRO', 'PERSON LISTED IN MASTERLIST', 'JOMARI', 'ALBION', 'GALANG', '2010-12-12', 'MOVE OUT'),
(7, 1, 56, 'JANE', 'OLORVIDA', 'EVANGELIO', 'SPOUSE', 'JENNY', 'OMNI', 'LEON', '2023-11-01', ''),
(8, 1, 57, '', '', '', 'PERSON LISTED IN MASTERLIST', '', '', '', '0000-00-00', ''),
(9, 1, 58, '', '', '', 'PERSON LISTED IN MASTERLIST', '', '', '', '0000-00-00', ''),
(10, 1, 59, '', '', '', 'PERSON LISTED IN MASTERLIST', '', '', '', '0000-00-00', ''),
(11, 1, 60, '', '', '', 'PERSON LISTED IN MASTERLIST', '', '', '', '0000-00-00', ''),
(12, 1, 61, '', '', '', 'PERSON LISTED IN MASTERLIST', '', '', '', '0000-00-00', ''),
(13, 1, 62, '', '', '', 'PERSON LISTED IN MASTERLIST', '', '', '', '0000-00-00', ''),
(14, 1, 63, 'JAN', 'OLORVID', 'EVANG', 'SPOUSE', 'JENN', 'OMN', 'LEO', '2023-07-05', '??'),
(15, 1, 64, 'JANE', 'OLORVIDA', 'EVANGELIO', 'OTHERS', 'JENNY', 'OMNI', 'LEON', '2001-01-01', 'OK'),
(16, 1, 65, 'ARRISTOPHER ', 'CARANZA', 'CASIMIRO', 'PERSON LISTED IN MASTERLIST', 'JOMARI', 'ALBION', 'GALANG', '2010-12-10', 'MOVE IN'),
(17, 1, 66, 'SDFSDF', 'DSDFFDS', 'DSSDF', 'PERSON LISTED IN MASTERLIST', 'SDFFDSSFA', 'SDFSDF', 'SDFDSF', '2012-12-12', 'FDSSDFSD');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seniorpwd`
--

CREATE TABLE `tbl_seniorpwd` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `head_id` int(11) NOT NULL,
  `isdelete` int(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `extension` varchar(20) NOT NULL,
  `maidenname` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `birthdate` date NOT NULL,
  `senior` int(1) NOT NULL,
  `pwd` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_seniorpwd`
--

INSERT INTO `tbl_seniorpwd` (`id`, `user_id`, `head_id`, `isdelete`, `firstname`, `middlename`, `lastname`, `extension`, `maidenname`, `gender`, `birthdate`, `senior`, `pwd`) VALUES
(1, 1, 1, 1, 'LOLONG', 'BAUAN', 'PASCUAL', 'SR', '', 'MALE', '1965-09-01', 1, 0),
(2, 1, 1, 0, 'LALANG', 'BAUAN', 'PASCUAL', '', 'BAUAN', 'FEMALE', '1985-11-21', 1, 1),
(3, 1, 1, 0, 'LELENG', 'BAUAN', 'PASCUAL', 'JR', '', 'MALE', '1999-12-03', 0, 1),
(4, 1, 1, 0, 'MORPH', 'POMMY', 'POLLY', '', '', 'MALE', '1950-12-12', 0, 1),
(18, 1, 54, 0, 'LOLU', 'LOLE', 'LOLO', 'LOLA', '', 'MALE', '1970-01-01', 1, 1),
(20, 1, 54, 0, 'ANDENG', 'BAE', 'TUMABACAL', '', 'LOL', 'FEMALE', '1960-12-29', 1, 0),
(21, 1, 56, 0, 'LOLA', 'BEDOYA', 'OLORVIDA', '', 'BUSCOS', 'FEMALE', '1890-12-12', 1, 0),
(22, 1, 56, 0, 'JENNo', 'EVANGELIO', 'OLORVIDA', '', '', 'MALE', '1890-12-12', 1, 1),
(23, 1, 63, 0, 'LOLA', 'BEDOYA', 'OLORVIDA', '', 'BUSCOS', 'FEMALE', '1978-02-25', 0, 1),
(24, 1, 63, 0, 'JENNA', 'EVANGELIO', 'OLORVIDA', '', 'JONS', 'FEMALE', '1974-09-09', 0, 1),
(25, 1, 64, 0, 'LOLA', 'BEDOYA', 'OLORVIDA', '', 'BUSCOS', 'FEMALE', '1940-01-02', 1, 1),
(26, 1, 65, 0, 'LOLO', 'BAKAW', 'CASIMIRO', '', '', 'MALE', '1975-11-29', 1, 1),
(27, 1, 1, 1, '12', '12', 'MAMA', '1', '', 'MALE', '1212-12-12', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spouseinfo`
--

CREATE TABLE `tbl_spouseinfo` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `head_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `maidenname` varchar(50) NOT NULL,
  `extension` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `civilStatus` varchar(20) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `monthIncome` int(11) NOT NULL,
  `pagIbig` int(1) NOT NULL,
  `sss` int(1) NOT NULL,
  `other` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_spouseinfo`
--

INSERT INTO `tbl_spouseinfo` (`id`, `user_id`, `head_id`, `firstname`, `middlename`, `lastname`, `maidenname`, `extension`, `birthdate`, `gender`, `civilStatus`, `occupation`, `monthIncome`, `pagIbig`, `sss`, `other`) VALUES
(1, 1, 1, 'ALYANA', 'CRUZ', 'PASQUAL', 'CASTRILLO', '', '2000-12-29', 'FEMALE', 'MARRIED', 'CASHIER', 100, 1, 1, ''),
(2, 1, 2, 'BABA', 'JACQUI', 'POLY', 'CRUZ', '', '1999-02-16', 'FEMALE', 'MARRIED', 'TEACHER', 20, 1, 1, ''),
(9, 1, 54, 'ARRISTOPHER', 'CACAO', 'CASIMIRO', '', 'SR', '1985-08-01', 'MALE', 'SINGLE', 'GRAB DRIVER', 20000, 1, 0, ''),
(11, 1, 56, 'RACHEL', 'OLORVIDA', 'EVANGELIO', 'BEDOYA', '', '1990-12-12', 'FEMALE', 'MARRIED', 'HOUSEWIFE', 0, 1, 0, ''),
(18, 1, 63, 'YAN', 'BAUA', 'PASCUA', 'CASTRILL', '', '2000-07-27', 'FEMALE', 'WIDOWED', 'FULL STAC', 50, 0, 1, ''),
(19, 1, 64, 'JACK', 'OLORVIDA', 'EVANGELIO', '', 'SR', '0000-00-00', 'MALE', 'SINGLE', 'GUARD', 10000, 0, 0, ''),
(20, 1, 65, 'OLIVIA', 'TUMABACAL', 'CASIMIRO', 'CARANZA', '', '2000-01-01', 'FEMALE', 'MARRIED', 'HOUSEWIFE', 0, 1, 1, ''),
(21, 1, 66, 'SDFDS', 'DFSSDF', 'DSFFDS', '', 'DDFDS', '1211-12-12', 'MALE', 'SINGLE', 'DSFFDSF', 11, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(12) NOT NULL,
  `isdelete` int(1) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `contactno` varchar(50) NOT NULL,
  `memberof` varchar(50) NOT NULL,
  `isactive` varchar(20) NOT NULL,
  `ar_dashboard` int(2) NOT NULL,
  `ar_record` int(2) NOT NULL,
  `ar_report` int(2) NOT NULL,
  `ar_systman` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `isdelete`, `username`, `password`, `firstname`, `middlename`, `lastname`, `contactno`, `memberof`, `isactive`, `ar_dashboard`, `ar_record`, `ar_report`, `ar_systman`) VALUES
(1, 0, 'adminn', 'admin', 'Charice', 'Cruz', 'Martin', '09999999999', 'ADMINISTRATOR', 'ACTIVE', 1, 1, 1, 1),
(14, 0, 'arristopher', 'toti', 'Arris', 'caranza', 'Casimiro', '091', 'ENCODER', 'ACTIVE', 1, 1, 1, 1),
(26, 0, 'toti', 'toti', 'CARANZA', 'CASIMIRO', 'ARRISTOPHER', '8', 'ADMINISTRATOR', 'ACTIVE', 1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_audit`
--
ALTER TABLE `tbl_audit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_childminor`
--
ALTER TABLE `tbl_childminor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_childwork`
--
ALTER TABLE `tbl_childwork`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_facility`
--
ALTER TABLE `tbl_facility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_headinfo`
--
ALTER TABLE `tbl_headinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_image`
--
ALTER TABLE `tbl_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_interinfo`
--
ALTER TABLE `tbl_interinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_seniorpwd`
--
ALTER TABLE `tbl_seniorpwd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_spouseinfo`
--
ALTER TABLE `tbl_spouseinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_audit`
--
ALTER TABLE `tbl_audit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_childminor`
--
ALTER TABLE `tbl_childminor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_childwork`
--
ALTER TABLE `tbl_childwork`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_facility`
--
ALTER TABLE `tbl_facility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_headinfo`
--
ALTER TABLE `tbl_headinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tbl_image`
--
ALTER TABLE `tbl_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_interinfo`
--
ALTER TABLE `tbl_interinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_seniorpwd`
--
ALTER TABLE `tbl_seniorpwd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_spouseinfo`
--
ALTER TABLE `tbl_spouseinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
