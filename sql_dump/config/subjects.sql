-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2019 at 06:46 AM
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
('TMA101', 'Engineering Mathematics-I', 'CSE', 1, 17, 1, 100, 50),
('TPH101', 'Engineering Physics', 'CSE', 1, 17, 2, 100, 50),
('THM101', 'Basic Technical Communication', 'CSE', 1, 17, 3, 100, 50),
('TEE101', 'Basic Electrical Engineering', 'CSE', 1, 17, 4, 100, 50),
('TCS101', 'Fundamentals of Computer Programming', 'CSE', 1, 17, 5, 100, 50),
('PPH101', 'Physics Lab', 'CSE', 1, 17, 6, 25, 25),
('PEE101', 'Basic Electrical & Electronics Lab', 'CSE', 1, 17, 7, 25, 25),
('PCS101', 'Fundamentals of Programming Lab', 'CSE', 1, 17, 8, 25, 25),
('PWS101', 'Workshop Practice', 'CSE', 1, 17, 9, 25, 25),
('TMA201', 'Engineering Mathematics-II', 'CSE', 2, 17, 10, 100, 50),
('TCY201', 'Engineering Chemistry', 'CSE', 2, 17, 11, 100, 50),
('THM201', 'Advanced Technical Communication', 'CSE', 2, 17, 12, 100, 50),
('TME201', 'Basic Mechanical Engineering', 'CSE', 2, 17, 13, 100, 50),
('TEC201', 'Fundamentals of Electronic Engineering', 'CSE', 2, 17, 14, 100, 50),
('TES201', 'Environmental Studies', 'CSE', 2, 17, 15, 25, 25),
('PCY201', 'Chemistry Lab', 'CSE', 2, 17, 16, 25, 25),
('PME201', 'Basic Mechanical Engineering Lab', 'CSE', 2, 17, 17, 25, 25),
('PEC201', 'Fundamentals of Electronic Lab', 'CSE', 2, 17, 18, 25, 25),
('PED201', 'Engineering Drawing', 'CSE', 2, 17, 19, 25, 25),
('GP', 'General Proficiency', 'CSE', 2, 17, 20, 50, 50),
('TCS301', 'Discrete Structures', 'CSE', 3, 17, 21, 100, 50),
('TCS302', 'Computer Based Numerical & Statistical Techniques', 'CSE', 3, 17, 22, 50, 25),
('TCS303', 'Data Structures', 'CSE', 3, 17, 23, 100, 50),
('TEC301', 'Digital Electronics & Design Aspect', 'CSE', 3, 17, 24, 100, 50),
('TCS304', 'Object Oriented Programming', 'CSE', 3, 17, 25, 100, 50),
('THU301', 'Engineering Economics & Costing', 'CSE', 3, 17, 26, 50, 25),
('PCS302', 'Computer Based Numerical & Statistical Techniques Lab', 'CSE', 3, 17, 27, 25, 25),
('PCS303', 'Data Structure Lab ', 'CSE', 3, 17, 28, 25, 25),
('PEC350', 'Digital Electronics ', 'CSE', 3, 17, 29, 25, 25),
('PCS304', 'Object oriented programming using Java/C++', 'CSE', 3, 17, 30, 25, 25),
('PD III', '/GP III Personality Development/ General Proficiency', 'CSE', 3, 17, 31, 25, 25),
('TCS401', 'Computer Organization', 'CSE', 4, 17, 32, 100, 50),
('TCS402', 'Unix & Shell Programming', 'CSE', 4, 17, 33, 50, 25),
('TCS403', 'Theory Of Automata & Formal Language', 'CSE', 4, 17, 34, 100, 50),
('TCS404', 'Database Management System', 'CSE', 4, 17, 35, 100, 50),
('TCS405', 'Microprocessor', 'CSE', 4, 17, 36, 100, 50),
('TCS406', 'Software Engineering', 'CSE', 4, 17, 37, 50, 25),
('PCS402', 'Unix & Shell Programming Lab', 'CSE', 4, 17, 38, 25, 25),
('PCS404', 'Database Management System Lab', 'CSE', 4, 17, 39, 25, 25),
('PCS405', 'Microprocessor Lab', 'CSE', 4, 17, 40, 25, 25),
('PCS407', 'Seminar', 'CSE', 4, 17, 41, 25, 25),
('PD IV', '/GP IV Personality Development/ General Proficiency', 'CSE', 4, 17, 42, 25, 25),
('TCS501', 'Computer Graphics', 'CSE', 5, 17, 43, 100, 50),
('TCS502', 'Computer Network', 'CSE', 5, 17, 44, 100, 50),
('TCS503', 'Design & Analysis of Algorithms', 'CSE', 5, 17, 45, 100, 50),
('TCS504', 'Principles of Programming Languages', 'CSE', 5, 17, 46, 50, 25),
('TCS505', 'Advance Java Programming', 'CSE', 5, 17, 47, 100, 50),
('TCS506', 'Modeling & Simulation', 'CSE', 5, 17, 48, 50, 25),
('PCS551', 'Computer Graphics Lab.', 'CSE', 5, 17, 49, 25, 25),
('PCS552', 'Computer Network Lab.', 'CSE', 5, 17, 50, 25, 25),
('PCS553', 'Algorithms Lab.', 'CSE', 5, 17, 51, 25, 25),
('PCS555', 'Adv. Java Lab.', 'CSE', 5, 17, 52, 25, 25),
('__', 'Discipline', 'CSE', 5, 17, 53, 25, 25),
('TCS601', 'Operating System', 'CSE', 6, 17, 54, 100, 50),
('TCS602', 'Compiler Design ', 'CSE', 6, 17, 55, 100, 50),
('TCS603', 'Artificial Intelligence', 'CSE', 6, 17, 56, 100, 50),
('TCS604', 'Graph Theory', 'CSE', 6, 17, 57, 50, 25),
('TCS605', 'Visual Programming & DotNet Technologies', 'CSE', 6, 17, 58, 100, 50),
('THU608', 'Principles of Management', 'CSE', 6, 17, 59, 50, 25),
('PCS651', 'Operating System Lab. ', 'CSE', 6, 17, 60, 25, 25),
('PCS652', 'Compiler Design Lab.', 'CSE', 6, 17, 61, 25, 25),
('PCS653', 'Artificial Intelligence Lab. ', 'CSE', 6, 17, 62, 25, 25),
('PCS655', 'Visual Programming Lab.', 'CSE', 6, 17, 63, 25, 25),
('___', 'Discipline ', 'CSE', 6, 17, 64, 25, 25),
('TCS701', 'System Administration', 'CSE', 7, 17, 65, 100, 50),
('TCS702', 'Advance Computer Architecture', 'CSE', 7, 17, 66, 100, 50),
('TCS703', 'Data Warehousing & Mining\r\n', 'CSE', 7, 17, 67, 100, 50),
('PCS757', 'Project', 'CSE', 7, 17, 68, 50, 50),
('PCS758', 'Industrial Interaction/Seminar Term Paper', 'CSE', 7, 17, 69, 25, 25),
('PCS751', 'System Administration Lab', 'CSE', 7, 17, 70, 25, 25),
('_', 'Discipline', 'CSE', 7, 17, 71, 25, 25),
('TCS801', 'Distributed Computing', 'CSE', 8, 17, 72, 100, 50),
('TCS802', 'Web Technology', 'CSE', 8, 17, 73, 100, 50),
('PCS857', 'Project', 'CSE', 8, 17, 74, 200, 100),
('PCS852', 'Web Technology Lab.', 'CSE', 8, 17, 75, 25, 25),
('_-', 'Discipline', 'CSE', 8, 17, 76, 25, 25),
('TEC401', 'Electromagnetic Field Theory', 'ECE', 4, 17, 100, 100, 50),
('TEC402', 'Analog Integrated Circuits', 'ECE', 4, 17, 101, 100, 50),
('TCS401', 'Computer Organisation', 'ECE', 4, 17, 102, 75, 25),
('TEC404', 'Signals And Systems', 'ECE', 4, 17, 103, 100, 50),
('TEC405', 'Analog Communication', 'ECE', 4, 17, 104, 100, 50),
('TEC406', 'Solid State Devices And Semiconductors', 'ECE', 4, 17, 105, 75, 25),
('PEC451', 'Analog Integrated Circuits Lab', 'ECE', 4, 17, 106, 25, 25),
('PEC452', 'Circuits Design On PCB', 'ECE', 4, 17, 107, 25, 25),
('PEC453', 'Analog Communication Lab', 'ECE', 4, 17, 108, 25, 25),
('GP401', 'General Proficiency', 'ECE', 4, 17, 109, 0, 50),
('TME401', 'Kinematics Of machines', 'ME', 4, 17, 111, 100, 50),
('TME402', 'Manufacturing Science-1', 'ME', 4, 17, 112, 100, 50),
('TME403', 'Mechanical measurement and control', 'ME', 4, 17, 113, 100, 50),
('TME404', 'Applied Thermodynamics', 'ME', 4, 17, 114, 100, 50),
('TME405', 'Industrial Engineering', 'ME', 4, 17, 115, 50, 25),
('TEE405', 'Electro Mechanical Energy Conservation-II', 'ME', 4, 17, 116, 50, 25),
('PME451', 'KInamatics of machines lab', 'ME', 4, 17, 117, 25, 25),
('PME452', 'Manufacturing Science Lab-1', 'ME', 4, 17, 118, 25, 25),
('PME453', 'measurement And metrology Lab', 'ME', 4, 17, 119, 25, 25),
('PEE454', 'Electromechanical energy conversion lab', 'ME', 4, 17, 120, 25, 25),
('GP401', 'General Proficiency', 'ECE', 4, 17, 121, 0, 50),
('TEE401', 'Electromechanical Energy conversion-I', 'EE', 4, 17, 122, 100, 50),
('TEE402', 'Network Analysis and Synthesis', 'EE', 4, 17, 123, 100, 50),
('TEE403', 'Electrical and Electronics Engineering Materials', 'EE', 4, 17, 124, 50, 25),
('TEE404', 'Microprocessors and its applications', 'EE', 4, 17, 125, 100, 50),
('TEC401', 'Electromagnetic Field Theory', 'EE', 4, 17, 126, 100, 50),
('THU401', 'Industrial Economics', 'EE', 4, 17, 127, 50, 25),
('PEE451', 'Electromechanical Energy Conversion Lab', 'EE', 4, 17, 128, 50, 50),
('PEE452', 'Microprocessors Lab', 'EE', 4, 17, 129, 25, 25),
('PEE453', 'Network Lab', 'EE', 4, 17, 130, 25, 25),
('GP401', 'General Proficiency', 'ECE', 4, 17, 131, 0, 50),
('TCE401', 'Hydraulics and Hydraulic machines', 'CE', 4, 17, 132, 100, 50),
('TCE402', 'Structural Analysis', 'CE', 4, 17, 133, 100, 50),
('TCE403', 'Advanced Surveying', 'CE', 4, 17, 134, 100, 50),
('TCE404', 'Engineering Geology', 'CE', 4, 17, 135, 50, 25),
('TCE405', 'Environmental Engineering', 'CE', 4, 17, 136, 50, 25),
('TCE406', 'concrete Technology', 'CE', 4, 17, 137, 100, 50),
('PCE451', 'Hydraulics and Hydraulic Lab', 'CE', 4, 17, 138, 25, 25),
('PCE452', 'Advanced Survey Field Work', 'CE', 4, 17, 139, 25, 25),
('PCE453', 'Geology lab', 'CE', 4, 17, 140, 25, 25),
('PCE454', 'Concrete Lab', 'CE', 4, 17, 141, 25, 25),
('GP401', 'General Proficiency', 'CE', 4, 17, 142, 0, 50),
('TCS301', 'Computer Based Numerical Techniques', 'ECE', 3, 17, 201, 75, 25),
('TEC301', 'Electronics and Devices and Circuits', 'ECE', 3, 17, 202, 100, 50),
('TEC302', 'Digital Electronics and Design Aspects', 'ECE', 3, 17, 203, 100, 50),
('TEC303', 'Electronic measurement and Instrumentation', 'ECE', 3, 17, 204, 100, 50),
('TEE301', 'NEtwork Analysis and Synthesis', 'ECE', 3, 17, 205, 100, 50),
('THM301', 'Engineering Economics', 'ECE', 3, 17, 206, 75, 25),
('PEC351', 'Electronic devices and circuit lab', 'ECE', 3, 17, 207, 100, 50),
('TEC352', 'digital Electronics lab', 'ECE', 3, 17, 208, 100, 50),
('PEE353', 'measurement lab', 'ECE', 3, 17, 209, 100, 50),
('PD', 'Personality Development', 'ECE', 3, 17, 210, 0, 50),
('TMA301', 'Mathematics-III', 'ME', 3, 17, 211, 100, 50),
('THU301', 'Engineering Economics & costing', 'ME', 3, 17, 212, 50, 25),
('TME301', 'Material Science', 'ME', 3, 17, 213, 100, 50),
('TME302', 'Engineering Thermodynamics', 'ME', 3, 17, 214, 50, 25),
('TCE301', 'Fluid Mechanics', 'ME', 3, 17, 215, 100, 50),
('TME303', 'Solid Mechanics', 'ME', 3, 17, 216, 100, 50),
('PME351', 'Material Science Lab', 'ME', 3, 17, 217, 25, 25),
('PME352', 'Machine Drawing ', 'ME', 3, 17, 218, 25, 25),
('PCE351', 'Fluid Mechanics lab', 'ME', 3, 17, 219, 25, 25),
('GP301', 'General Proficiency', 'ME', 3, 17, 220, 0, 50),
('TMA301', 'Mathematics-III', 'EE', 3, 17, 221, 100, 50),
('TEE301', 'Basic Network Analysis', 'EE', 3, 17, 222, 100, 50),
('TEC305', 'Digital Electronics', 'EE', 3, 17, 223, 50, 25),
('TEC304', 'Solid state devices and Circuits', 'EE', 3, 17, 224, 100, 50),
('TEE302', 'Electrical measurement and Instrument', 'EE', 3, 17, 225, 100, 50),
('TME304', 'Thermal and fluid Mechanics', 'EE', 3, 17, 226, 50, 25),
('PEE351', 'Simulation lab', 'EE', 3, 17, 227, 25, 25),
('PEE352', 'Electrical measurement Lab', 'EE', 3, 17, 228, 25, 25),
('PEC353', 'Analog and Digital Electronics Lab', 'EE', 3, 17, 229, 25, 25),
('GP301', 'General Proficiency', 'EE', 3, 17, 230, 0, 50),
('TMA301', 'Mathematics-III', 'CE', 3, 17, 231, 100, 50),
('THU301', 'Engineering Economics and Costing', 'CE', 3, 17, 232, 50, 25),
('TCE301', 'Fluid Mechanics', 'CE', 3, 17, 233, 100, 50),
('TME303', 'Solid Mechanics', 'CE', 3, 17, 234, 100, 50),
('TCE302', 'Building Material and Construction', 'CE', 3, 17, 235, 100, 50),
('TCE303', 'Basic Surveying', 'CE', 3, 17, 236, 50, 25),
('PCE351', 'Fluid Mechanics lab', 'CE', 3, 17, 237, 100, 50),
('PCE352', 'Building Materials Lab', 'CE', 3, 17, 238, 100, 50),
('PCE353', 'Surveying Lab', 'CE', 3, 17, 239, 100, 50),
('PCE354', 'Building Planning and Drawing', 'CE', 3, 17, 240, 100, 50),
('GP301', 'General Proficiency', 'CE', 3, 17, 241, 0, 50),
('TMA101', 'Mathematics-I', 'EE', 1, 17, 300, 100, 50),
('TPH101', 'Engineering Physics', 'EE', 1, 17, 301, 100, 50),
('THM 101', 'Basic Technical Communication-I', 'EE', 1, 17, 302, 100, 50),
('TEE101', 'Basic Electrical Engineering', 'EE', 1, 17, 303, 100, 50),
('TCS101', 'Fundamentals of Computer & Programming', 'EE', 1, 17, 304, 100, 50),
('PPH101', 'Physics', 'EE', 1, 17, 305, 25, 25),
('PEE101', 'Basic Electrical Engineering', 'EE', 1, 17, 306, 25, 25),
('PCS101', 'Fundamentals of Computer Programming', 'EE', 1, 17, 307, 25, 25),
('PWS101', 'Workshop Practice', 'EE', 1, 17, 308, 25, 25),
('TMA101', 'Mathematics-I', 'ECE', 1, 17, 309, 100, 50),
('TPH101', 'Engineering Physics', 'ECE', 1, 17, 310, 100, 50),
('THM 101', 'Basic Technical Communication-I', 'ECE', 1, 17, 311, 100, 50),
('TEE101', 'Basic Electrical Engineering', 'ECE', 1, 17, 312, 100, 50),
('TCS101', 'Fundamentals of Computer & Programming', 'ECE', 1, 17, 313, 100, 50),
('PPH101', 'Physics', 'ECE', 1, 17, 314, 25, 25),
('PEE101', 'Basic Electrical Engineering', 'ECE', 1, 17, 315, 25, 25),
('PCS101', 'Fundamentals of Computer Programming', 'ECE', 1, 17, 316, 25, 25),
('PWS101', 'Workshop Practice', 'EE', 1, 17, 317, 25, 25),
('TMA101', 'Mathematics-I', 'ME', 1, 17, 318, 100, 50),
('TCY101', 'Engineering Chemistry', 'ME', 1, 17, 319, 100, 50),
('THM 101', 'Basic Technical Communication-I', 'ME', 1, 17, 320, 100, 50),
('TME101', 'Basic Mechanical Engineering', 'ME', 1, 17, 321, 100, 50),
('TEC101', 'Fundamentals of Electronics Engineering', 'ME', 1, 17, 322, 100, 50),
('TES101', 'Environmental Studies', 'ME', 1, 17, 323, 0, 50),
('PCY101', 'Chemistry', 'ME', 1, 17, 324, 25, 25),
('PME101', 'Basic Mechanical Engineering', 'ME', 1, 17, 325, 25, 25),
('PEC101', 'Fundamentals of Electronics Engineering', 'ME', 1, 17, 326, 25, 25),
('PED101', 'Engineering Drawing', 'ME', 1, 17, 327, 25, 25),
('TMA101', 'Mathematics-I', 'CE', 1, 17, 328, 100, 50),
('TCY101', 'Engineering Chemistry', 'CE', 1, 17, 329, 100, 50),
('THM 101', 'Basic Technical Communication-I', 'CE', 1, 17, 330, 100, 50),
('TME101', 'Basic Mechanical Engineering', 'CE', 1, 17, 331, 100, 50),
('TEC101', 'Fundamentals of Electronics Engineering', 'CE', 1, 17, 332, 100, 50),
('TES101', 'Environmental Studies', 'CE', 1, 17, 333, 0, 50),
('PCY101', 'Chemistry', 'CE', 1, 17, 334, 25, 25),
('PME101', 'Basic Mechanical Engineering', 'CE', 1, 17, 335, 25, 25),
('PEC101', 'Fundamentals of Electronics Engineering', 'CE', 1, 17, 336, 25, 25),
('PED101', 'Engineering Drawing', 'CE', 1, 17, 337, 25, 25),
('TMA201', 'Mathematics-II', 'EE', 2, 17, 338, 100, 50),
('TCY201', 'Engineering Chemistry', 'EE', 2, 17, 339, 100, 50),
('THM 201', 'Advanced Technical Communication', 'EE', 2, 17, 340, 100, 50),
('TME201', 'Basic Mechanical Engineering', 'EE', 2, 17, 341, 100, 50),
('TEC201', 'Fundamentals of Electronics Engineering', 'EE', 2, 17, 342, 100, 50),
('TES201', 'Environmental Studies', 'EE', 2, 17, 343, 0, 50),
('PCY201', 'Chemistry', 'EE', 2, 17, 344, 25, 25),
('PME201', 'Basic Mechanical Engineering', 'EE', 2, 17, 345, 25, 25),
('PEC201', 'Fundamentals of Electronics Engineering', 'EE', 2, 17, 346, 25, 25),
('PED201', 'Engineering Drawing', 'EE', 2, 17, 347, 25, 25),
('TMA201', 'Mathematics-II', 'ECE', 2, 17, 348, 100, 50),
('TCY201', 'Engineering Chemistry', 'ECE', 2, 17, 349, 100, 50),
('THM 201', 'Advanced Technical Communication', 'ECE', 2, 17, 350, 100, 50),
('TME201', 'Basic Mechanical Engineering', 'ECE', 2, 17, 351, 100, 50),
('TEC201', 'Fundamentals of Electronics Engineering', 'ECE', 2, 17, 352, 100, 50),
('TES201', 'Environmental Studies', 'ECE', 2, 17, 353, 0, 50),
('PCY201', 'Chemistry', 'ECE', 2, 17, 354, 25, 25),
('PME201', 'Basic Mechanical Engineering', 'ECE', 2, 17, 355, 25, 25),
('PEC201', 'Fundamentals of Electronics Engineering', 'ECE', 2, 17, 356, 25, 25),
('PED201', 'Engineering Drawing', 'ECE', 2, 17, 357, 25, 25),
('TMA201', 'Mathematics-II', 'ME', 2, 17, 358, 100, 50),
('TPH201', 'Engineering Physics', 'ME', 2, 17, 359, 100, 50),
('THM 201', 'Advance Technical Communication', 'ME', 2, 17, 360, 100, 50),
('TEE201', 'Basic Electrical Engineering', 'ME', 2, 17, 361, 100, 50),
('TCS201', 'Fundamentals of Computer & Programming', 'ME', 2, 17, 362, 100, 50),
('PPH201', 'Physics', 'ME', 2, 17, 363, 25, 25),
('PEE201', 'Basic Electrical Engineering', 'ME', 2, 17, 364, 25, 25),
('PCS201', 'Fundamentals of Computer Programming', 'ME', 2, 17, 365, 25, 25),
('PWS201', 'Workshop Practice', 'ME', 2, 17, 366, 25, 25),
('TMA201', 'Mathematics-II', 'CE', 2, 17, 367, 100, 50),
('TPH201', 'Engineering Physics', 'CE', 2, 17, 368, 100, 50),
('THM 201', 'Advance Technical Communication', 'CE', 2, 17, 369, 100, 50),
('TEE201', 'Basic Electrical Engineering', 'CE', 2, 17, 370, 100, 50),
('TCS201', 'Fundamentals of Computer & Programming', 'CE', 2, 17, 371, 100, 50),
('PPH201', 'Physics', 'CE', 2, 17, 372, 25, 25),
('PEE201', 'Basic Electrical Engineering', 'CE', 2, 17, 373, 25, 25),
('PCS201', 'Fundamentals of Computer Programming', 'CE', 2, 17, 374, 25, 25),
('PWS201', 'Workshop Practice', 'CE', 2, 17, 375, 25, 25),
('_', 'Discipline', 'CSE', 7, 17, 376, 25, 25),
('_-', 'Discipline', 'CSE', 8, 17, 377, 25, 25),
('__', 'Discipline', 'CSE', 5, 17, 378, 25, 25),
('___', 'Discipline ', 'CSE', 6, 17, 379, 25, 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=380;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
