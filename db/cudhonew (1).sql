-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2023 at 01:29 PM
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
-- Table structure for table `tbl_childminor`
--

CREATE TABLE `tbl_childminor` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `head_id` int(11) NOT NULL,
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

INSERT INTO `tbl_childminor` (`id`, `user_id`, `head_id`, `firstname`, `middlename`, `lastname`, `extension`, `gender`, `birthdate`) VALUES
(1, 1, 1, 'IAN', 'BAUAN', 'PASCUAL', 'JR', 'MALE', '2000-01-01'),
(2, 1, 1, 'HAPPY', 'BAUAN', 'PASCUAL', '', 'MALE', '2001-11-01'),
(3, 1, 1, 'ANGEL', 'BAUAN', 'PASCUAL', '', 'FEMALE', '2010-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_childwork`
--

CREATE TABLE `tbl_childwork` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `head_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `monthIncome` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 1, 1, 'OWN', 'LAGUNA WATERS', 'OWN', 'OWN'),
(2, 1, 2, 'OWN', 'DEEPWELL', 'OWN', 'OWN');

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
  `tag` varchar(20) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `civilStatus` varchar(20) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `monthIncome` int(11) NOT NULL,
  `membership` varchar(50) NOT NULL,
  `tenurStatus` varchar(50) NOT NULL,
  `structure` varchar(50) NOT NULL,
  `yearStay` varchar(20) NOT NULL,
  `lengthStay` varchar(20) NOT NULL,
  `relocUnavailable` varchar(20) NOT NULL,
  `relocated` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_headinfo`
--

INSERT INTO `tbl_headinfo` (`id`, `user_id`, `firstname`, `lastname`, `middlename`, `maidenname`, `extension`, `barangay`, `community`, `tag`, `birthdate`, `gender`, `civilStatus`, `occupation`, `monthIncome`, `membership`, `tenurStatus`, `structure`, `yearStay`, `lengthStay`, `relocUnavailable`, `relocated`) VALUES
(1, 1, 'DOMINIC', 'PASCUAL', 'BAUAN', 'MAIDEN', 'EXTEND', 'TAGAPO', 'JORDAN1', '1A', '1990-12-28', 'MALE', 'MARRIED', 'DANCER', 100000, 'PAG-IBIG', 'OWNER', 'CONCRETE', '2019', '50', 'BALIK PROBINSYA PROG', 'SUVB. MERCEDES SINALHAN jijijiji'),
(2, 1, 'JONATHAN', 'EVANGELIO', 'UTANE', 'GIRL', 'JR', 'TAGAPO', 'JORDAN1', '1A', '1985-11-11', 'MALE', 'SINGLE', 'MACHO DANCER', 1, 'PAG-IBIG', 'OWNER', 'CONCRETE', '2000', '23', 'BALIK PROBISNYA PROG', 'SUVB. MERCEDES SINALHAN');

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
  `res_maiden` varchar(50) NOT NULL,
  `res_extension` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
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

INSERT INTO `tbl_interinfo` (`id`, `user_id`, `head_id`, `res_Fname`, `res_Mname`, `res_Lname`, `res_maiden`, `res_extension`, `gender`, `relationship`, `int_Fname`, `int_Mname`, `int_Lname`, `date`, `remarks`) VALUES
(1, 1, 1, 'KAYE ', 'KAMILLE', 'BAUTISTAA', '', '', 'MALE', 'SPOUSE', 'JOMARI', 'ALBION', 'GALANG', '2007-01-01', 'SI DOMINIC MAHILIG SA IMMERSION'),
(2, 1, 2, '', '', '', '', '', '', '', '', '', '', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seniorpwd`
--

CREATE TABLE `tbl_seniorpwd` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `head_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `membership` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_spouseinfo`
--

INSERT INTO `tbl_spouseinfo` (`id`, `user_id`, `head_id`, `firstname`, `middlename`, `lastname`, `maidenname`, `extension`, `birthdate`, `gender`, `civilStatus`, `occupation`, `monthIncome`, `membership`) VALUES
(1, 1, 1, 'ALYANA', 'CRUZ', 'PASQUAL', 'CASTRILLO', '', '2000-12-29', 'FEMALE', 'DIVORCED', 'OCCUPATION', 100, 'HDMI'),
(2, 1, 2, 'BABA', 'JACQUI', 'POLY', 'CRUZ', '', '1999-02-16', 'FEMALE', 'MARRIED', 'TEACHER', 20, 'RIOT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` int(11) NOT NULL,
  `middlename` int(11) NOT NULL,
  `lastname` int(11) NOT NULL,
  `contactno` varchar(20) NOT NULL,
  `memberof` varchar(20) NOT NULL,
  `isactive` int(11) NOT NULL,
  `ar_dashboard` int(11) NOT NULL,
  `ar_record` int(11) NOT NULL,
  `ar_report` int(11) NOT NULL,
  `ar_systman` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `tbl_childminor`
--
ALTER TABLE `tbl_childminor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_childwork`
--
ALTER TABLE `tbl_childwork`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_facility`
--
ALTER TABLE `tbl_facility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_headinfo`
--
ALTER TABLE `tbl_headinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_interinfo`
--
ALTER TABLE `tbl_interinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_seniorpwd`
--
ALTER TABLE `tbl_seniorpwd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_spouseinfo`
--
ALTER TABLE `tbl_spouseinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
