-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2024 at 11:36 AM
-- Server version: 8.0.40
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int primary key AUTO_INCREMENT,
  `app_date` date DEFAULT CURRENT_DATE,
  `pid` int NOT NULL,
  `did` int NOT NULL,
  `issue` text,
  `symptomps` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Table structure for table `booked_test`
--

CREATE TABLE `booked_test` (
  `pid` int NOT NULL,
  `tid` int NOT NULL,
  `t_date` date DEFAULT CURRENT_DATE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Table structure for table `can_take`
--

CREATE TABLE `can_take` (
  `pid` int NOT NULL,
  `mid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `did` int NOT NULL,
  `specialisation` varchar(100) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `eid` int primary key AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `age` int DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `contact_no` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `work_experience` int DEFAULT NULL,
  `e_type` varchar(50) DEFAULT NULL,
  `pass_wrd` varchar(50) DEFAULT NULL,
  `availability` varchar(100) DEFAULT NULL,
  `joining_date` date DEFAULT CURRENT_DATE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `mid` int primary key AUTO_INCREMENT,
  `med_name` varchar(100) NOT NULL,
  `med_cost` decimal(10,2) DEFAULT NULL,
  `company` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `nid` int NOT NULL,
  `specialisation` varchar(100) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `pid` int primary key AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `age` int DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `phone_no` varchar(15) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `dob` date DEFAULT NULL,
  `blood_group` varchar(3) DEFAULT NULL,
  `course` varchar(100) DEFAULT NULL,
  `hostel` varchar(100) DEFAULT NULL,
  `pass_wrd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `pres_id` int primary key AUTO_INCREMENT,
  `date` date DEFAULT CURRENT_DATE,
  `pid` int DEFAULT NULL,
  `did` int DEFAULT NULL,
  `issue` text,
  `pres` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `sid` int NOT NULL,
  `type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `tid` int primary key AUTO_INCREMENT,
  `t_name` varchar(100) NOT NULL,
  `t_cost` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD UNIQUE KEY (`pid`,`did`,`app_date`),
  ADD KEY `did` (`did`);

--
-- Indexes for table `booked_test`
--
ALTER TABLE `booked_test`
  ADD PRIMARY KEY (`pid`,`tid`,`t_date`),
  ADD KEY `tid` (`tid`);

--
-- Indexes for table `can_take`
--


--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD UNIQUE KEY (`email`, `pass_wrd`);

--
-- Indexes for table `medicine`
--
-- ALTER TABLE `medicine`
--   ADD PRIMARY KEY (`mid`);

ALTER TABLE `medicine`
  ADD UNIQUE KEY (`med_name`,`med_cost`,`company`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD UNIQUE KEY `Email` (`Email`, `pass_wrd`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD KEY `pid` (`pid`),
  ADD KEY `did` (`did`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `test`
--
-- ALTER TABLE `test`
--   ADD PRIMARY KEY (`tid`);

ALTER TABLE `test`
  ADD UNIQUE KEY (`t_name`,`t_cost`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
-- ALTER TABLE `employee`
--   MODIFY `eid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicine`
--
-- ALTER TABLE `medicine`
--   MODIFY `mid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescription`
--
-- ALTER TABLE `prescription`
--   MODIFY `Pres_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test`
--
-- ALTER TABLE `test`
--   MODIFY `tid` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--


--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `patient` (`pid`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`did`) REFERENCES `doctor` (`did`);

--
-- Constraints for table `booked_test`
--
ALTER TABLE `booked_test`
  ADD CONSTRAINT `booked_test_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `patient` (`pid`),
  ADD CONSTRAINT `booked_test_ibfk_2` FOREIGN KEY (`tid`) REFERENCES `test` (`tid`);

--
-- Constraints for table `can_take`
--
ALTER TABLE `can_take`
  ADD CONSTRAINT `can_take_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `patient` (`pid`),
  ADD CONSTRAINT `can_take_ibfk_2` FOREIGN KEY (`mid`) REFERENCES `medicine` (`mid`);

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`did`) REFERENCES `employee` (`eid`);

--
-- Constraints for table `nurse`
--
ALTER TABLE `nurse`
  ADD CONSTRAINT `nurse_ibfk_1` FOREIGN KEY (`nid`) REFERENCES `employee` (`eid`);

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `prescription_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `patient` (`pid`),
  ADD CONSTRAINT `prescription_ibfk_2` FOREIGN KEY (`did`) REFERENCES `doctor` (`did`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `employee` (`eid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;







ALTER TABLE `can_take`
  ADD PRIMARY KEY (`pid`,`mid`),
  ADD KEY `mid` (`mid`);