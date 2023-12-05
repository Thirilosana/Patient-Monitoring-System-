-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2020 at 04:26 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_acc`
--

CREATE TABLE `doctor_acc` (
  `username` varchar(25) NOT NULL,
  `mailid` varchar(45) NOT NULL,
  `pswd` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_acc`
--

INSERT INTO `doctor_acc` (`username`, `mailid`, `pswd`) VALUES
('brindha15', 'brindha15@gmail.com', 'Brindha15'),
('danish', 'danish@gmail.com', 'Danish7'),
('geetha', 'geetha5@gmail.com', 'Geetha6'),
('karishma', 'karish3@gmail.com', 'Karish3'),
('kaviya', 'kaviya15@gmail.com', 'Kaviya15'),
('nayagam', 'nayagam6@gmail.com', 'Nayagam6'),
('radha15', 'radha@gmail.com', 'Radha6'),
('sai', 'sai8@gmail.com', 'Sai78');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_reg`
--

CREATE TABLE `doctor_reg` (
  `fname` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  `dob` varchar(25) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `speciality` varchar(25) NOT NULL,
  `place` varchar(255) NOT NULL,
  `approval` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_reg`
--

INSERT INTO `doctor_reg` (`fname`, `username`, `mobileno`, `dob`, `gender`, `speciality`, `place`, `approval`) VALUES
('Brindha', 'brindha15', '6369456783', '07/09/1983', 'Female', 'physician', 'vj hospital,tirunelveli', 1),
('geetha', 'geetha', '6789567896', '25/08/1989', 'female', 'pulmonologist', 'kuniamuthur,coimbatore', 1),
('Kaviya', 'kaviya', '6789567899', '10/04/1991', 'Female', 'Pulmonologist', 'Galaxy Hospital,tirunelveli', 1),
('sairam', 'sai', '7864783451', '08/01/1986', 'Male', 'physician', 'galaxy hospital,tirunelveli', 0),
('karishma', 'karishma', '9442064785', '03/09/1989', 'Female', 'pulmonologist', 'KMCH hospital,coimbatore', 0),
('Radha', 'radha15', '9442315634', '23/06/1989', 'Female', 'physician', 'Galaxy hospital,tirunelveli', 1),
('Gomathinayagam', 'nayagam', '9443287563', '23/02/1978', 'Male', 'pulmonologist', 'KMCH hospital, coimbatore', 0);

-- --------------------------------------------------------

--
-- Table structure for table `patientdata`
--

CREATE TABLE `patientdata` (
  `temperature` int(11) NOT NULL,
  `heart_rate` int(11) NOT NULL,
  `sugar` int(11) NOT NULL,
  `bp_diastolic` int(11) NOT NULL,
  `bp_systolic` int(11) NOT NULL,
  `patusername` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patientdata`
--

INSERT INTO `patientdata` (`temperature`, `heart_rate`, `sugar`, `bp_diastolic`, `bp_systolic`, `patusername`) VALUES
(101, 58, 180, 60, 90, 'jack15'),
(97, 89, 78, 78, 70, 'ram4');

-- --------------------------------------------------------

--
-- Table structure for table `patient_acc`
--

CREATE TABLE `patient_acc` (
  `fname` varchar(15) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `uniqueid` int(11) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `pswd` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_acc`
--

INSERT INTO `patient_acc` (`fname`, `email`, `uniqueid`, `username`, `pswd`) VALUES
('brinda', 'brindha23@gmail.com', 953, 'Brindha23', 'Brind23'),
('ganesh', 'ganesh@gmail.com', 731, 'ganesh', 'Ganesh6'),
('jack', 'jack@gmail.com', 1, 'jack15', 'Jack15'),
('Kaviya', 'kaviya15@gmail.com', 86, 'kaviya15', 'Kaviya15'),
('sriram', 'ram12@gamil.com', 408, 'ram', 'Ram45'),
('sree', 'sree4@gmail.com', 600, 'sree3', 'Sree34'),
('srimathi', 'srimathi@gmail.com', 464, 'srimathi', 'Brind45'),
('sumi', 'sumi@gmail.com', 830, 'sumi8', 'Sumi3');

-- --------------------------------------------------------

--
-- Table structure for table `patient_reg`
--

CREATE TABLE `patient_reg` (
  `fname` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `mobileno` varchar(11) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `bloodgrp` varchar(15) NOT NULL,
  `height` int(11) NOT NULL,
  `weigh` int(11) NOT NULL,
  `admindate` varchar(15) NOT NULL,
  `carephno` varchar(12) NOT NULL,
  `surgery` varchar(100) NOT NULL,
  `medicalhis` varchar(100) NOT NULL,
  `loc` varchar(255) NOT NULL,
  `approval` int(11) NOT NULL DEFAULT 0,
  `doctorname` varchar(45) NOT NULL,
  `checkuptime` varchar(25) NOT NULL,
  `videolink` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_reg`
--

INSERT INTO `patient_reg` (`fname`, `username`, `mobileno`, `dob`, `gender`, `bloodgrp`, `height`, `weigh`, `admindate`, `carephno`, `surgery`, `medicalhis`, `loc`, `approval`, `doctorname`, `checkuptime`, `videolink`) VALUES
('Brindha', 'brindha23', '7867589765', '06/09/1988', 'female', 'b+ve', 170, 70, '07/09/2020', '7896741245', 'no', 'heart disease', 'perumalpuram,tirunelveli', 0, '', '', ''),
('jack', 'jack15', '6456345678', '17/06/1994', 'male', 'b+ve', 160, 70, '01/09/2020', '7856745678', 'no', 'heart disease', 'perumalpuram,tirunelveli', 1, 'Brindha', '4pm', 'https://meet.google.com/cft-hbhj-sst'),
('sriram', 'ram', '8978656786', '17/03/1989', 'male', 'b-ve', 178, 67, '01/09/2020', '6789876567', 'yes', 'Diabetes', 'kovaipudur,coimbatore', 1, 'Radha', '6pm', 'https://meet.google.com/cft-hbhj-sst'),
('sree', 'sree3', '6456345667', '14/07/1988', 'female', 'b+ve', 157, 60, '03/09/2020', '7856745656', 'no', 'others', 'palayamkotai,tirunelveli', 0, '', '', ''),
('subha', 'sumi8', '6456345689', '11/09/1997', 'female', 'a+ve', 157, 60, '03/09/2020', '7676745656', 'no', 'diabetes', 'palayamkotai,tirunelveli', 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `patient_unique`
--

CREATE TABLE `patient_unique` (
  `userid` int(11) NOT NULL,
  `validno` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_unique`
--

INSERT INTO `patient_unique` (`userid`, `validno`) VALUES
(1, 1),
(2, 1),
(86, 1),
(408, 1),
(464, 1),
(600, 1),
(731, 1),
(768, 0),
(770, 0),
(830, 1),
(894, 0),
(953, 1),
(1214, 0),
(1437, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `admin` (`password`);

--
-- Indexes for table `doctor_acc`
--
ALTER TABLE `doctor_acc`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `mailid` (`mailid`);

--
-- Indexes for table `doctor_reg`
--
ALTER TABLE `doctor_reg`
  ADD PRIMARY KEY (`mobileno`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `patientdata`
--
ALTER TABLE `patientdata`
  ADD PRIMARY KEY (`patusername`);

--
-- Indexes for table `patient_acc`
--
ALTER TABLE `patient_acc`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `name` (`fname`),
  ADD UNIQUE KEY `unique_id` (`uniqueid`),
  ADD UNIQUE KEY `mail_id` (`email`);

--
-- Indexes for table `patient_reg`
--
ALTER TABLE `patient_reg`
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `mobileno` (`mobileno`);

--
-- Indexes for table `patient_unique`
--
ALTER TABLE `patient_unique`
  ADD PRIMARY KEY (`userid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctor_reg`
--
ALTER TABLE `doctor_reg`
  ADD CONSTRAINT `doctor_reg_ibfk_1` FOREIGN KEY (`username`) REFERENCES `doctor_acc` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient_reg`
--
ALTER TABLE `patient_reg`
  ADD CONSTRAINT `patient_reg_ibfk_1` FOREIGN KEY (`username`) REFERENCES `patient_acc` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
