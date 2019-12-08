-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2019 at 03:45 AM
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
-- Database: `gadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cw`
--

CREATE TABLE `cw` (
  `cwid` int(11) NOT NULL,
  `cwtitle` varchar(45) NOT NULL,
  `modid` int(11) NOT NULL,
  `hidate` date NOT NULL,
  `creditw` int(11) NOT NULL,
  `fdd` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cw`
--

INSERT INTO `cw` (`cwid`, `cwtitle`, `modid`, `hidate`, `creditw`, `fdd`, `status`) VALUES
(222, 'HCI CW1', 444, '2019-12-11', 50, '2019-12-31', 0),
(223, 'AI CW2', 445, '2019-12-23', 25, '2020-01-31', 0),
(224, 'HCI CW2', 444, '2019-12-18', 50, '2020-01-31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `modid` int(11) NOT NULL,
  `mtitle` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`modid`, `mtitle`) VALUES
(444, 'Human Computer Interaction'),
(445, 'Artificial Intelligence');

-- --------------------------------------------------------

--
-- Table structure for table `scw`
--

CREATE TABLE `scw` (
  `sid` int(11) NOT NULL,
  `cwid` int(11) NOT NULL,
  `tsid` int(11) NOT NULL,
  `md` int(11) NOT NULL,
  `ma` int(11) NOT NULL,
  `comments` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scw`
--

INSERT INTO `scw` (`sid`, `cwid`, `tsid`, `md`, `ma`, `comments`) VALUES
(111, 222, 555, 55, 55, 'Could do better'),
(111, 223, 555, 90, 90, 'Excellent'),
(111, 224, 556, 80, 80, 'VG'),
(112, 222, 555, 50, 50, ''),
(112, 223, 555, 60, 60, ''),
(112, 224, 556, 70, 70, ''),
(113, 222, 555, 85, 85, 'VG'),
(113, 223, 555, 60, 60, ''),
(113, 224, 556, 90, 90, '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `sid` int(11) NOT NULL,
  `sfn` varchar(45) NOT NULL,
  `sln` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`sid`, `sfn`, `sln`) VALUES
(111, 'John', 'Smith'),
(112, 'Jane', 'Green'),
(113, 'Mo', 'Bathgate');

-- --------------------------------------------------------

--
-- Table structure for table `teachingstaff`
--

CREATE TABLE `teachingstaff` (
  `tsid` int(11) NOT NULL,
  `tsfn` varchar(45) NOT NULL,
  `tsln` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachingstaff`
--

INSERT INTO `teachingstaff` (`tsid`, `tsfn`, `tsln`) VALUES
(555, 'Frank', 'Smith'),
(556, 'Alice', 'Green');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cw`
--
ALTER TABLE `cw`
  ADD PRIMARY KEY (`cwid`),
  ADD KEY `modid` (`modid`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`modid`);

--
-- Indexes for table `scw`
--
ALTER TABLE `scw`
  ADD KEY `sid` (`sid`),
  ADD KEY `cwid` (`cwid`),
  ADD KEY `tsid` (`tsid`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `teachingstaff`
--
ALTER TABLE `teachingstaff`
  ADD PRIMARY KEY (`tsid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cw`
--
ALTER TABLE `cw`
  MODIFY `cwid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `modid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=446;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `teachingstaff`
--
ALTER TABLE `teachingstaff`
  MODIFY `tsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=557;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cw`
--
ALTER TABLE `cw`
  ADD CONSTRAINT `cw_ibfk_1` FOREIGN KEY (`modid`) REFERENCES `modules` (`modid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `scw`
--
ALTER TABLE `scw`
  ADD CONSTRAINT `scw_ibfk_1` FOREIGN KEY (`cwid`) REFERENCES `cw` (`cwid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `scw_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `students` (`sid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `scw_ibfk_3` FOREIGN KEY (`tsid`) REFERENCES `teachingstaff` (`tsid`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
