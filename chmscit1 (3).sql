-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2021 at 04:30 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chmscit1`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer_key`
--

CREATE TABLE `answer_key` (
  `key_id` int(11) NOT NULL,
  `question_number` int(2) NOT NULL,
  `key_answer` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer_key`
--

INSERT INTO `answer_key` (`key_id`, `question_number`, `key_answer`) VALUES
(1, 1, 'A'),
(2, 2, 'A'),
(3, 3, 'A'),
(4, 4, 'B'),
(5, 5, 'B'),
(6, 6, 'A'),
(7, 7, 'D'),
(8, 8, 'A'),
(9, 9, 'C'),
(10, 10, 'C'),
(11, 11, 'C'),
(12, 12, 'B'),
(13, 13, 'B'),
(14, 14, 'A'),
(15, 15, 'D'),
(16, 16, 'C'),
(17, 17, 'C'),
(18, 18, 'B'),
(19, 19, 'C'),
(20, 20, 'A'),
(21, 21, 'A'),
(22, 22, 'D'),
(23, 23, 'D'),
(24, 24, 'D'),
(25, 25, 'A'),
(26, 26, 'A'),
(27, 27, 'A'),
(28, 28, 'A'),
(29, 29, 'D'),
(30, 30, 'D'),
(31, 31, 'B'),
(32, 32, 'C'),
(33, 33, 'B'),
(34, 34, 'B'),
(35, 35, 'C'),
(36, 36, 'A'),
(37, 37, 'D'),
(38, 38, 'A'),
(39, 39, 'D'),
(40, 40, 'A'),
(41, 41, 'A'),
(42, 42, 'B'),
(43, 43, 'B'),
(44, 44, 'B'),
(45, 45, 'C'),
(46, 46, 'C'),
(47, 47, 'C'),
(48, 48, 'D'),
(49, 49, 'A'),
(50, 50, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
--

CREATE TABLE `criteria` (
  `creteria_id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `creteria` varchar(30) NOT NULL,
  `creteria_whole` varchar(30) NOT NULL,
  `sy_id` int(11) NOT NULL,
  `is_default` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `criteria`
--

INSERT INTO `criteria` (`creteria_id`, `title`, `creteria`, `creteria_whole`, `sy_id`, `is_default`) VALUES
(1, 'Interview', '.40', '40', 2, 'Yes'),
(3, 'Entrance Score', '.40', '40', 2, 'Yes'),
(4, 'General Average', '.20', '20', 2, 'Yes'),
(6, 'Entrance Score', '.30', '30', 3, 'No'),
(7, 'General Average', '.30', '30', 3, 'No'),
(8, 'Interview', '.40', '30', 3, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `exam_schedule`
--

CREATE TABLE `exam_schedule` (
  `sched_id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `dateofexam` varchar(30) NOT NULL,
  `timeofexam` varchar(30) NOT NULL,
  `examinee_code` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_schedule`
--

INSERT INTO `exam_schedule` (`sched_id`, `stud_id`, `dateofexam`, `timeofexam`, `examinee_code`, `status`) VALUES
(10, 11, '2021-02-17', '10:05', '111111', 'Confirmed'),
(11, 12, '2021-02-17', '8:00 AM', '2122122', 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `idnumber`
--

CREATE TABLE `idnumber` (
  `auto_id` int(11) NOT NULL,
  `auto_start` int(11) NOT NULL,
  `auto_end` int(11) NOT NULL,
  `increment` int(11) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `idnumber`
--

INSERT INTO `idnumber` (`auto_id`, `auto_start`, `auto_end`, `increment`, `description`) VALUES
(1, 100, 3, 1, 'STUD');

-- --------------------------------------------------------

--
-- Table structure for table `schoolyear`
--

CREATE TABLE `schoolyear` (
  `sy_id` int(11) NOT NULL,
  `school_year` varchar(30) NOT NULL,
  `is_default` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schoolyear`
--

INSERT INTO `schoolyear` (`sy_id`, `school_year`, `is_default`) VALUES
(2, '2020-2021', 'Yes'),
(3, '2021-2022', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stud_id` int(11) NOT NULL,
  `examinee_code` varchar(30) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `dateoftest` varchar(30) NOT NULL,
  `raw_score` varchar(30) NOT NULL,
  `stanine` int(11) NOT NULL,
  `picture` text NOT NULL,
  `gender` varchar(30) NOT NULL,
  `b_date` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_id`, `examinee_code`, `fname`, `lname`, `dateoftest`, `raw_score`, `stanine`, `picture`, `gender`, `b_date`, `email`, `username`, `password`) VALUES
(11, '111111', 'jane', 'mabasa', '2021-02-11', '25', 3, '20210209employee.png', 'Female', '2021-02-10', 'jane@yahoo.com', 'jane', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(12, '2122122', 'angel jude', 'suarez', '2021-02-16', '30', 25, '20210216Picture1.png', 'Male', '2021-02-11', 'jude@gmail.com', 'jude', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(13, 'STUD-100', 'james', 'bond', '2021-02-18', '45', 8, '20210218addappointment.png', 'Male', '2021-02-26', 'james@yahoo.com', 'james', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(14, 'STUD-101', 'adrian', 'mercurio', '2021-02-19', '30', 4, '20210218download.jpg', 'Male', '2021-02-17', 'jude@yahoo.com', 'judes', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(15, 'STUD-102', 'angel jude', 'we', '2021-02-19', '25', 3, '20210218hospital.png', 'Male', '2021-02-18', 'ewe', 'jude', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Table structure for table `student_answer`
--

CREATE TABLE `student_answer` (
  `ans_id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `question_number` int(2) NOT NULL,
  `answer` varchar(2) NOT NULL,
  `date_taken` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_answer`
--

INSERT INTO `student_answer` (`ans_id`, `stud_id`, `question_number`, `answer`, `date_taken`) VALUES
(365, 11, 1, 'A', '2021-02-11'),
(366, 11, 2, 'A', '2021-02-11'),
(367, 11, 3, 'A', '2021-02-11'),
(395, 12, 1, 'A', '2021-02-18'),
(396, 12, 2, 'A', '2021-02-18'),
(397, 12, 3, 'A', '2021-02-18');

-- --------------------------------------------------------

--
-- Table structure for table `summary`
--

CREATE TABLE `summary` (
  `sum_id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `entrance_score` varchar(30) NOT NULL,
  `general_ave` varchar(30) NOT NULL,
  `qualifying_result` varchar(30) NOT NULL,
  `interview` varchar(30) NOT NULL,
  `total` varchar(30) NOT NULL,
  `sy_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `summary`
--

INSERT INTO `summary` (`sum_id`, `stud_id`, `entrance_score`, `general_ave`, `qualifying_result`, `interview`, `total`, `sy_id`) VALUES
(13, 11, '10', '7.6', '3', '8.4', '26', 2),
(57, 12, '32', '17.2', '3', '33.6', '82.8', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `username`, `password`) VALUES
(1, 'Admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer_key`
--
ALTER TABLE `answer_key`
  ADD PRIMARY KEY (`key_id`);

--
-- Indexes for table `criteria`
--
ALTER TABLE `criteria`
  ADD PRIMARY KEY (`creteria_id`);

--
-- Indexes for table `exam_schedule`
--
ALTER TABLE `exam_schedule`
  ADD PRIMARY KEY (`sched_id`);

--
-- Indexes for table `idnumber`
--
ALTER TABLE `idnumber`
  ADD PRIMARY KEY (`auto_id`);

--
-- Indexes for table `schoolyear`
--
ALTER TABLE `schoolyear`
  ADD PRIMARY KEY (`sy_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `student_answer`
--
ALTER TABLE `student_answer`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `summary`
--
ALTER TABLE `summary`
  ADD PRIMARY KEY (`sum_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer_key`
--
ALTER TABLE `answer_key`
  MODIFY `key_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
  MODIFY `creteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `exam_schedule`
--
ALTER TABLE `exam_schedule`
  MODIFY `sched_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `idnumber`
--
ALTER TABLE `idnumber`
  MODIFY `auto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schoolyear`
--
ALTER TABLE `schoolyear`
  MODIFY `sy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `student_answer`
--
ALTER TABLE `student_answer`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=398;

--
-- AUTO_INCREMENT for table `summary`
--
ALTER TABLE `summary`
  MODIFY `sum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
