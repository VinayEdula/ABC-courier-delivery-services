-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3399
-- Generation Time: Nov 18, 2021 at 08:32 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iwp_da`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `Compid` int(10) NOT NULL,
  `CompType` varchar(20) NOT NULL,
  `CompDesc` varchar(100) NOT NULL,
  `Solution` varchar(100) DEFAULT NULL,
  `CompStatus` varchar(20) NOT NULL,
  `Custid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`Compid`, `CompType`, `CompDesc`, `Solution`, `CompStatus`, `Custid`) VALUES
(1, 'Mails', 'Not received', 'File a complaint against Courier Company in District Consumer Tribunal for deficiency in service and', 'Closed', 'C121'),
(2, 'Parcel', 'Opened', 'The parcel is not packed properly', 'Closed', 'C122'),
(3, 'Mails', 'Not received', '-----------------', 'New', 'C121');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`Compid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
