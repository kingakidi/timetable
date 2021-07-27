-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2021 at 10:21 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timetable`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
(13, 'B.tech'),
(14, 'M.Tech'),
(15, 'BCA'),
(16, 'MCA');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `sem_id` int(11) NOT NULL,
  `semester_name` varchar(20) DEFAULT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`sem_id`, `semester_name`, `department_id`) VALUES
(1, '1st', 13),
(2, '2nd', 13),
(3, '3rd', 13),
(4, '4th', 13),
(6, '2nd', 14),
(7, '1st', 15),
(8, '2nd', 15),
(9, '3rd', 15),
(10, '4th', 15),
(11, '1st', 16),
(12, '2nd', 16);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(20) DEFAULT NULL,
  `sem_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `course_duration` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `lecturer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`, `sem_id`, `department_id`, `course_duration`, `type`, `course_code`, `lecturer_id`) VALUES
(1, 'PHP', 1, 13, 0, '', '', 0),
(2, 'Core PHP', 2, 13, 0, '', '', 0),
(3, 'Advance PHP', 3, 13, 0, '', '', 0),
(4, 'Cake PHP', 4, 13, 0, '', '', 0),
(5, 'Codeginter', 6, 14, 0, '', '', 0),
(6, 'Java', 7, 15, 0, '', '', 0),
(7, 'Advance Java', 8, 15, 0, '', '', 0),
(8, 'Core Java', 9, 15, 0, '', '', 0),
(9, 'OOPS', 10, 15, 0, '', '', 0),
(10, 'Wordpress', 11, 16, 0, '', '', 0),
(11, 'Joomla', 12, 16, 0, '', '', 0),
(12, 'Mgento', 1, 13, 0, '', '', 0),
(13, 'Data Structure', 1, 13, 0, '', '', 0),
(14, 'Discrete', 1, 13, 0, '', '', 0),
(15, 'asdfg', 1, 13, 2, 'lecture', 'asdr', 17),
(16, 'asdfgf', 1, 13, 3, 'lab', 'asdrw', 18);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `name`, `date`) VALUES
(16, 'Kamal', '2016-05-22'),
(17, 'Manu', '2016-05-22'),
(18, 'Rahul', '2016-05-22'),
(19, 'Ravi', '2016-05-22'),
(20, 'Ali', '2016-05-22'),
(21, 'Sanjay', '2016-05-22'),
(22, 'Himanshu', '2016-05-22'),
(23, 'Deepak', '2016-05-22'),
(24, 'Jassi', '2016-05-22'),
(25, 'Shavir', '2016-05-22'),
(26, 'Sandeep', '2016-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `timeschedule`
--

CREATE TABLE `timeschedule` (
  `timeschedule_id` int(11) NOT NULL,
  `department_name` varchar(20) DEFAULT NULL,
  `semester_name` varchar(20) DEFAULT NULL,
  `subject_name` varchar(20) DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  `date` varchar(40) DEFAULT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeschedule`
--

INSERT INTO `timeschedule` (`timeschedule_id`, `department_name`, `semester_name`, `subject_name`, `time`, `date`, `teacher_id`) VALUES
(1, '13', '1', '1', '01:00', '2016-12-01', 16),
(2, '13', '2', '2', '02:00', '2016-12-01', 17),
(3, '13', '3', '3', '03:00', '2016-12-01', 18),
(4, '13', '4', '4', '04:00', '2016-12-01', 19),
(5, '14', '6', '6', '02:00', '2016-12-01', 16),
(6, '15', '7', '7', '03:00', '2016-12-02', 16),
(7, '15', '8', '8', '03:00', '2016-12-02', 17),
(8, '16', '11', '11', '10:00', '2016-12-01', 16),
(9, '13', '1', '12', '09:00', '2016-12-02', 16),
(10, '13', '1', '13', '02:00', '2016-11-02', 16),
(11, '13', '1', '14', '04:00', '2016-11-03', 16);

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`id`, `name`) VALUES
(1, 'kakdjfj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);
ALTER TABLE `department` ADD FULLTEXT KEY `course_name` (`department_name`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`sem_id`),
  ADD KEY `course_id` (`department_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `course_id` (`department_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);
ALTER TABLE `teacher` ADD FULLTEXT KEY `name` (`name`);

--
-- Indexes for table `timeschedule`
--
ALTER TABLE `timeschedule`
  ADD PRIMARY KEY (`timeschedule_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `sem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `timeschedule`
--
ALTER TABLE `timeschedule`
  MODIFY `timeschedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `semester`
--
ALTER TABLE `semester`
  ADD CONSTRAINT `semester_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE;

--
-- Constraints for table `timeschedule`
--
ALTER TABLE `timeschedule`
  ADD CONSTRAINT `timeschedule_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
