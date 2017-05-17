-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2017 at 01:02 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ongc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `ID` int(11) NOT NULL,
  `Solution` varchar(1000) DEFAULT NULL,
  `Sol_Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Solution`, `Sol_Date`) VALUES
(1000, 'when trying to submit the job from GUI its running fine.\r\nbut job need some parameter which is not available through GUI so user need to update the script and run the job.\r\nJob is giving i.o error in logs but giving message spy process died. asked user to test run the script without parameter updation.', '2017-05-17 12:59:01'),
(1001, 'after the abrupt shutdown on 31-12-2015 system was powered on 1-1-2015. PNS server was up and running but client were not able to connect to it. when tried pos_config it also gave message that no pns server is running but process was shown in the ps -ef command.', '2016-10-08 13:48:14'),
(1002, 'license file updated at pg31ms server', '2016-01-21 13:29:26'),
(1003, 'by removing .ssh file and re-configuring system for ssh solved the problem.', '2016-01-15 11:55:17'),
(1004, 'this job was running....', '2016-01-15 12:06:03'),
(1011, 'this is solution.......', '2016-01-15 12:10:30'),
(1016, 'attachment process okay', '2016-01-21 12:47:35');

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

CREATE TABLE IF NOT EXISTS `attachment` (
  `ID` int(11) NOT NULL,
  `file_loc` varchar(100) NOT NULL,
  `file_size` int(11) NOT NULL,
  `file_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attachment`
--

INSERT INTO `attachment` (`ID`, `file_loc`, `file_size`, `file_type`) VALUES
(1016, 'http://localhost/ongc/attachments/images.jpg', 13214, 'image/jpeg'),
(1018, 'http://localhost/ongc/attachments/Marksheet Sat.pdf', 129383, 'application/pdf'),
(1019, 'http://localhost/ongc/attachments/log.txt', 34, 'text/plain');

-- --------------------------------------------------------

--
-- Table structure for table `database`
--

CREATE TABLE IF NOT EXISTS `database` (
  `ID` int(11) NOT NULL,
  `Issue` varchar(1000) NOT NULL,
  `Issue_date` datetime NOT NULL,
  `Issue_stat` varchar(8) NOT NULL DEFAULT 'Unsolved'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `database`
--

INSERT INTO `database` (`ID`, `Issue`, `Issue_date`, `Issue_stat`) VALUES
(1000, 'when submitting CRAM job giving error :spy execution process died.', '2016-01-11 12:14:25', 'Solved'),
(1001, 'while trying to launch PPM,giving error None of &quot;dda0331&quot; PNS host(s) can run Epos services.', '2016-01-11 12:16:31', 'Solved'),
(1002, 'New license file updated for CRAM &amp; TOMOFACIL', '2016-01-11 12:17:41', 'Solved'),
(1003, 'while submitting echos job from pg3ws6 giving error for ssh.', '2016-01-11 12:21:25', 'Solved'),
(1004, 'SRME job abend abnormally.\r\n\r\n*E*SRMA* Error writing traces to local disk (/users/gdadmin/2015/project/src/subsystem/Echos/sma/WriteAsubline2DISK.cc:262)!!!\r\n*E*SRMA*Task#1 Error reading seismic from PDS file and writing to local disk (/users/gdadmin/2015/project/src/subsystem/EC&gt;hos/sma/GetASubline.cc:262)!!!\r\n*E*SRMA*MultiplePredict Error Exit() (/users/gdadmin/2015/project/src/subsystem/Echos/sma/Loop.cc:294)!!!', '2016-01-11 12:26:02', 'Unsolved'),
(1005, 'new system need to be configured', '2016-01-11 12:27:43', 'Unsolved'),
(1006, 'while launching echos giving error no pns running', '2016-01-11 12:28:10', 'Unsolved'),
(1007, 'application mvp of lv5000 is needed for velocity analysis . But when run,it gives error selecting the velocity cst file.', '2016-01-11 12:29:43', 'Unsolved'),
(1008, 'module windows do not open in jxjob', '2016-01-11 12:30:57', 'Unsolved'),
(1009, 'application opening is taking time', '2016-01-11 12:31:21', 'Unsolved'),
(1010, 'P2V for two servers.', '2016-01-11 12:31:38', 'Unsolved'),
(1011, 'this is issue.......', '2016-01-15 12:09:20', 'Solved'),
(1016, 'attachment....', '2016-01-18 10:49:36', 'Solved'),
(1017, 'without attachment', '2016-01-18 11:10:52', 'Unsolved'),
(1018, 'PDF FILE', '2016-01-18 11:20:06', 'Unsolved'),
(1019, 'new ttach,enmt', '2016-01-18 12:07:21', 'Unsolved'),
(1020, 'This is an issue to be submitted.', '2016-01-20 15:05:08', 'Unsolved'),
(1021, 'sfds', '2016-09-14 16:20:04', 'Unsolved'),
(1022, 'aaaa', '2017-05-17 12:59:23', 'Unsolved');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Name` varchar(50) NOT NULL,
  `mygroup` varchar(50) NOT NULL,
`ID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1023 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Name`, `mygroup`, `ID`) VALUES
('Anil Kumar', 'PDGM', 1000),
('Anil Kumar', 'PDGM', 1001),
('System', 'PDGM', 1002),
('R Pathak', 'PDGM', 1003),
('R Pathak', 'PDGM', 1004),
('R Pathak', 'PDGM', 1005),
('mamta jain', 'PDGM', 1006),
('pgsnath', 'CGG', 1007),
('pgsnath', 'CGG', 1008),
('pgjnath', 'CGG', 1009),
('msb', 'CGG', 1010),
('Satyam Sangal', 'new', 1011),
('Satyam Sangal', 'new', 1016),
('Satyam Sangal', 'new', 1017),
('Satyam Sangal', 'new', 1018),
('Satyam Sangal', 'new', 1019),
('Satyam Sangal', 'new', 1020),
('dfsf', 'SYSTEM', 1021),
('aaa', 'aaaa', 1022);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `attachment`
--
ALTER TABLE `attachment`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `database`
--
ALTER TABLE `database`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1023;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `attachment`
--
ALTER TABLE `attachment`
ADD CONSTRAINT `attachment_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `database`
--
ALTER TABLE `database`
ADD CONSTRAINT `database_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
