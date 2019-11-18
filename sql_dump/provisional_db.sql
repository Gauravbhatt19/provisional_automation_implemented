-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2019 at 06:44 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `provisional_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `buffer`
--

CREATE TABLE `buffer` (
  `ref_no` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `msg` varchar(2000) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `email_id` varchar(500) NOT NULL,
  `yearofadmin` int(5) NOT NULL DEFAULT '17',
  `type` enum('REG','BACK') NOT NULL DEFAULT 'BACK',
  `provisional_sem` int(5) NOT NULL DEFAULT '0',
  `last_modify` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buffer2_subjects`
--

CREATE TABLE `buffer2_subjects` (
  `ref_no` int(10) NOT NULL,
  `subjects` varchar(500) NOT NULL,
  `max_credit1` int(5) NOT NULL DEFAULT '100',
  `max_credit2` int(5) NOT NULL DEFAULT '50',
  `credit1` int(5) NOT NULL DEFAULT '0',
  `credit2` int(5) NOT NULL DEFAULT '0',
  `back_type` enum('REGULAR','INTERNAL','SPECIAL') DEFAULT NULL,
  `mnth_yr` varchar(200) NOT NULL DEFAULT '0',
  `last_modify` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `general`
--

CREATE TABLE `general` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `val` varchar(2000) NOT NULL,
  `status` int(11) DEFAULT '0',
  `last_modify` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general`
--

INSERT INTO `general` (`id`, `name`, `val`, `status`, `last_modify`) VALUES
(1, 'instructions', 'Kindly fill all your details in the form given in the portal. (Applying)\r\n<br>Once the details are filled, check the mail id which you provided. (Waiting Time)\r\n<br>You shall receive a copy of the provisional mark sheet on your mail-id. (Receiving Soft Copy)\r\n<br>Take a Print out of this and then get it signed from the Dy.Controller of Examination Division. (Validating)', 1, '2019-11-16 23:14:27'),
(2, 'status', 'Portal Down<br>Due to Maintenance Portal is temporary down, Sorry for Inconvinence, Will Active Very Soon', 1, '2019-11-18 04:27:24');

-- --------------------------------------------------------

--
-- Table structure for table `refer_table`
--

CREATE TABLE `refer_table` (
  `ref_no` int(10) NOT NULL,
  `name` varchar(300) NOT NULL,
  `branch` enum('CSE','CE','ECE','EE','ME') DEFAULT NULL,
  `roll_no` decimal(15,0) NOT NULL,
  `stat` enum('Success','Reject','Apply') DEFAULT NULL,
  `last_modify` datetime DEFAULT CURRENT_TIMESTAMP,
  `compile_time` datetime DEFAULT NULL,
  `gar_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subcode` varchar(7) NOT NULL,
  `name` varchar(300) NOT NULL,
  `branch` enum('CSE','CE','ECE','EE','ME') DEFAULT NULL,
  `sem` int(11) DEFAULT '1',
  `batch` int(11) DEFAULT '17',
  `id` int(11) NOT NULL,
  `credit1` int(5) NOT NULL DEFAULT '100',
  `credit2` int(5) NOT NULL DEFAULT '50'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subcode`, `name`, `branch`, `sem`, `batch`, `id`, `credit1`, `credit2`) VALUES
('GP', 'General Proficiency', 'CSE', 2, 17, 20, 50, 50),
('PCS101', 'Fundamentals of Programming Lab', 'CSE', 1, 17, 8, 25, 25),
('PCS302', 'Computer Based Numerical & Statistical Techniques Lab', 'CSE', 3, 17, 27, 25, 25),
('PCS303', 'Data Structure Lab ', 'CSE', 3, 17, 28, 25, 25),
('PCS304', 'Object oriented programming using Java/C++', 'CSE', 3, 17, 30, 25, 25),
('PCS402', 'Unix & Shell Programming Lab', 'CSE', 4, 17, 38, 25, 25),
('PCS404', 'Database Management System Lab', 'CSE', 4, 17, 39, 25, 25),
('PCS405', 'Microprocessor Lab', 'CSE', 4, 17, 40, 25, 25),
('PCS407', 'Seminar', 'CSE', 4, 17, 41, 25, 25),
('PCS551', 'Computer Graphics Lab.', 'CSE', 5, 17, 49, 25, 25),
('PCS552', 'Computer Network Lab.', 'CSE', 5, 17, 50, 25, 25),
('PCS553', 'Algorithms Lab.', 'CSE', 5, 17, 51, 25, 25),
('PCS555', 'Adv. Java Lab.', 'CSE', 5, 17, 52, 25, 25),
('PCS651', 'Operating System Lab. ', 'CSE', 6, 17, 60, 25, 25),
('PCS652', 'Compiler Design Lab.', 'CSE', 6, 17, 61, 25, 25),
('PCS653', 'Artificial Intelligence Lab. ', 'CSE', 6, 17, 62, 25, 25),
('PCS655', 'Visual Programming Lab.', 'CSE', 6, 17, 63, 25, 25),
('PCS751', 'System Administration Lab', 'CSE', 7, 17, 70, 25, 25),
('PCS757', 'Project', 'CSE', 7, 17, 68, 50, 50),
('PCS758', 'Industrial Interaction/Seminar Term Paper', 'CSE', 7, 17, 69, 25, 25),
('PCS852', 'Web Technology Lab.', 'CSE', 8, 17, 75, 25, 25),
('PCS857', 'Project', 'CSE', 8, 17, 74, 200, 100),
('PCY201', 'Chemistry Lab', 'CSE', 2, 17, 16, 25, 25),
('PD III', '/GP III Personality Development/ General Proficiency', 'CSE', 3, 17, 31, 25, 25),
('PD IV', '/GP IV Personality Development/ General Proficiency', 'CSE', 4, 17, 42, 25, 25),
('PEC201', 'Fundamentals of Electronic Lab', 'CSE', 2, 17, 18, 25, 25),
('PEC350', 'Digital Electronics ', 'CSE', 3, 17, 29, 25, 25),
('PED201', 'Engineering Drawing', 'CSE', 2, 17, 19, 25, 25),
('PEE101', 'Basic Electrical & Electronics Lab', 'CSE', 1, 17, 7, 25, 25),
('PME201', 'Basic Mechanical Engineering Lab', 'CSE', 2, 17, 17, 25, 25),
('PPH101', 'Physics Lab', 'CSE', 1, 17, 6, 25, 25),
('PWS101', 'Workshop Practice', 'CSE', 1, 17, 9, 25, 25),
('TCS101', 'Fundamentals of Computer Programming', 'CSE', 1, 17, 5, 100, 50),
('TCS301', 'Discrete Structures', 'CSE', 3, 17, 21, 100, 50),
('TCS302', 'Computer Based Numerical & Statistical Techniques', 'CSE', 3, 17, 22, 50, 25),
('TCS303', 'Data Structures', 'CSE', 3, 17, 23, 100, 50),
('TCS304', 'Object Oriented Programming', 'CSE', 3, 17, 25, 100, 50),
('TCS401', 'Computer Organization', 'CSE', 4, 17, 32, 100, 50),
('TCS402', 'Unix & Shell Programming', 'CSE', 4, 17, 33, 50, 25),
('TCS403', 'Theory Of Automata & Formal Language', 'CSE', 4, 17, 34, 100, 50),
('TCS404', 'Database Management System', 'CSE', 4, 17, 35, 100, 50),
('TCS405', 'Microprocessor', 'CSE', 4, 17, 36, 100, 50),
('TCS406', 'Software Engineering', 'CSE', 4, 17, 37, 50, 25),
('TCS501', 'Computer Graphics', 'CSE', 5, 17, 43, 100, 50),
('TCS502', 'Computer Network', 'CSE', 5, 17, 44, 100, 50),
('TCS503', 'Design & Analysis of Algorithms', 'CSE', 5, 17, 45, 100, 50),
('TCS504', 'Principles of Programming Languages', 'CSE', 5, 17, 46, 50, 25),
('TCS505', 'Advance Java Programming', 'CSE', 5, 17, 47, 100, 50),
('TCS506', 'Modeling & Simulation', 'CSE', 5, 17, 48, 50, 25),
('TCS601', 'Operating System', 'CSE', 6, 17, 54, 100, 50),
('TCS602', 'Compiler Design ', 'CSE', 6, 17, 55, 100, 50),
('TCS603', 'Artificial Intelligence', 'CSE', 6, 17, 56, 100, 50),
('TCS604', 'Graph Theory', 'CSE', 6, 17, 57, 50, 25),
('TCS605', 'Visual Programming & DotNet Technologies', 'CSE', 6, 17, 58, 100, 50),
('TCS701', 'System Administration', 'CSE', 7, 17, 65, 100, 50),
('TCS702', 'Advance Computer Architecture', 'CSE', 7, 17, 66, 100, 50),
('TCS703', 'Data Warehousing & Mining\r\n', 'CSE', 7, 17, 67, 100, 50),
('TCS801', 'Distributed Computing', 'CSE', 8, 17, 72, 100, 50),
('TCS802', 'Web Technology', 'CSE', 8, 17, 73, 100, 50),
('TCY201', 'Engineering Chemistry', 'CSE', 2, 17, 11, 100, 50),
('TEC201', 'Fundamentals of Electronic Engineering', 'CSE', 2, 17, 14, 100, 50),
('TEC301', 'Digital Electronics & Design Aspect', 'CSE', 3, 17, 24, 100, 50),
('TEE101', 'Basic Electrical Engineering', 'CSE', 1, 17, 4, 100, 50),
('TES201', 'Environmental Studies', 'CSE', 2, 17, 15, 25, 25),
('THM101', 'Basic Technical Communication', 'CSE', 1, 17, 3, 100, 50),
('THM201', 'Advanced Technical Communication', 'CSE', 2, 17, 12, 100, 50),
('THU301', 'Engineering Economics & Costing', 'CSE', 3, 17, 26, 50, 25),
('THU608', 'Principles of Management', 'CSE', 6, 17, 59, 50, 25),
('TMA101', 'Engineering Mathematics-I', 'CSE', 1, 17, 1, 100, 50),
('TMA201', 'Engineering Mathematics-II', 'CSE', 2, 17, 10, 100, 50),
('TME201', 'Basic Mechanical Engineering', 'CSE', 2, 17, 13, 100, 50),
('TPH101', 'Engineering Physics', 'CSE', 1, 17, 2, 100, 50),
('_', 'Discipline', 'CSE', 7, 17, 71, 25, 25),
('_-', 'Discipline', 'CSE', 8, 17, 76, 25, 25),
('__', 'Discipline', 'CSE', 5, 17, 53, 25, 25),
('___', 'Discipline ', 'CSE', 6, 17, 64, 25, 25);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `type` enum('compiler','admin') DEFAULT NULL,
  `userid` varchar(300) NOT NULL,
  `pass` varchar(300) NOT NULL,
  `last_login` datetime DEFAULT CURRENT_TIMESTAMP,
  `last_logout` datetime DEFAULT CURRENT_TIMESTAMP,
  `no_of_systems` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`type`, `userid`, `pass`, `last_login`, `last_logout`, `no_of_systems`) VALUES
('admin', 'admin', '$2y$10$Q.eN41TEop0/1jw.Y6018eYpIMTtsLenVL4nxADQYHPCl./WPqCQS', '2019-11-18 10:56:21', '2019-11-18 04:55:08', 2),
('compiler', 'Compiler1', '$2y$10$F4XayJA4TelYCJGMglLF3ud1UqMid4azd.h7Fqc6yfC8AcMg6kuyC', '2019-11-18 10:57:57', '2019-11-18 04:06:31', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buffer`
--
ALTER TABLE `buffer`
  ADD KEY `ref_no` (`ref_no`);

--
-- Indexes for table `buffer2_subjects`
--
ALTER TABLE `buffer2_subjects`
  ADD KEY `ref_no` (`ref_no`);

--
-- Indexes for table `general`
--
ALTER TABLE `general`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refer_table`
--
ALTER TABLE `refer_table`
  ADD PRIMARY KEY (`ref_no`),
  ADD UNIQUE KEY `gar_id` (`gar_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subcode`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `general`
--
ALTER TABLE `general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `refer_table`
--
ALTER TABLE `refer_table`
  MODIFY `ref_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buffer`
--
ALTER TABLE `buffer`
  ADD CONSTRAINT `buffer_ibfk_1` FOREIGN KEY (`ref_no`) REFERENCES `refer_table` (`ref_no`);

--
-- Constraints for table `buffer2_subjects`
--
ALTER TABLE `buffer2_subjects`
  ADD CONSTRAINT `buffer2_subjects_ibfk_1` FOREIGN KEY (`ref_no`) REFERENCES `refer_table` (`ref_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
