-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 26, 2018 at 03:38 PM
-- Server version: 5.7.18
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digital_classroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `pass`, `status`) VALUES
(1, 'Arif Un', 'arifunctg@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_notice`
--

CREATE TABLE `admin_notice` (
  `id` int(11) NOT NULL,
  `uploader_id` varchar(100) NOT NULL,
  `title` varchar(250) NOT NULL,
  `notice` longtext NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_notice`
--

INSERT INTO `admin_notice` (`id`, `uploader_id`, `title`, `notice`, `time`, `status`) VALUES
(1, '1', 'kndkjvfnnk', 'lwkrsnfxkvkkljm', '2018-05-08 12:17:49', 0);

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `id` int(11) NOT NULL,
  `uploader_id` varchar(100) NOT NULL,
  `sub_id` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `resource` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id`, `uploader_id`, `sub_id`, `title`, `resource`, `time`, `status`) VALUES
(1, '2', '1', 'dsfldsj', '1525782686studentInfo.xlsx', '2018-05-08 12:31:26', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `assigntch_by_sub`
-- (See below for the actual view)
--
CREATE TABLE `assigntch_by_sub` (
`id` int(11)
,`name` varchar(100)
,`dpt_name` varchar(100)
,`subject_name` varchar(100)
,`session_name` varchar(100)
,`batch_name` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `assign_tcr`
--

CREATE TABLE `assign_tcr` (
  `id` int(11) NOT NULL,
  `tcr_id` int(11) NOT NULL,
  `dpt_id` int(100) NOT NULL,
  `session_id` int(100) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `over_valid` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_tcr`
--

INSERT INTO `assign_tcr` (`id`, `tcr_id`, `dpt_id`, `session_id`, `batch_id`, `subject_id`, `status`, `over_valid`) VALUES
(1, 1, 1, 1, 1, 1, 0, '2018-09-05 18:17:28');

-- --------------------------------------------------------

--
-- Table structure for table `attendence_details`
--

CREATE TABLE `attendence_details` (
  `id` int(11) NOT NULL,
  `master_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `std_id` varchar(100) NOT NULL,
  `attened` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendence_master`
--

CREATE TABLE `attendence_master` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tcr_id` varchar(100) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `dpt_id` int(11) NOT NULL,
  `total_attendence` int(11) NOT NULL,
  `total_absence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `id` int(11) NOT NULL,
  `dpt_id` int(11) NOT NULL,
  `batch_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `dpt_id`, `batch_name`) VALUES
(1, 1, 'CSE 4 Day'),
(2, 2, 'C12');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `dpt_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dpt_name`) VALUES
(1, 'Department of Computer Science and Engineering'),
(2, 'Civil Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `head_of_the_dpt`
--

CREATE TABLE `head_of_the_dpt` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(300) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `info` varchar(300) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `dpt_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `head_of_the_dpt`
--

INSERT INTO `head_of_the_dpt` (`id`, `name`, `teacher_id`, `email`, `pass`, `mobile`, `info`, `photo`, `dpt_id`, `status`) VALUES
(1, 'mamun', 'DH1525781435', 'bromamun@gmail.com', '202cb962ac59075b964b07152d234b70', '01772040475', 'Lecturer', NULL, 1, 0),
(2, 'exaple', 'DH1532612337', 'example@mailsac.com', '202cb962ac59075b964b07152d234b70', '0180000000', 'Professor', NULL, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lecture_details`
--

CREATE TABLE `lecture_details` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_id` varchar(255) NOT NULL,
  `lec_file` varchar(255) NOT NULL,
  `uploader_id` varchar(255) NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `teachers_id` varchar(50) DEFAULT '1',
  `title` varchar(200) NOT NULL,
  `notice` text NOT NULL,
  `as_Dpt_id` int(11) NOT NULL,
  `as_Batch_id` int(11) NOT NULL,
  `as_Session_id` int(11) NOT NULL,
  `as_Subject_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `teachers_id`, `title`, `notice`, `as_Dpt_id`, `as_Batch_id`, `as_Session_id`, `as_Subject_id`, `time`, `status`) VALUES
(1, '1', 'nnnn', ',mmmm', 1, 1, 1, 1, '2018-05-08 12:20:34', 0),
(2, '1', 'terdfcv', 'tfhgdf', 1, 1, 1, 1, '2018-05-08 12:21:05', 0),
(3, '1', 'sdfdsf', 'sdfsdf ds fds', 1, 1, 1, 1, '2018-05-08 12:28:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `notify_id` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `as_batch` int(11) NOT NULL,
  `as_department` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `notify_id`, `message`, `time`, `as_batch`, `as_department`, `status`) VALUES
(1, 'Notice', 'You have a Notice', '2018-05-08 12:20:34', 1, 1, 0),
(2, 'Notice', 'You have a Notice', '2018-05-08 12:21:05', 1, 1, 0),
(3, 'Notice', 'You have a Notice', '2018-05-08 12:28:43', 1, 1, 1),
(4, 'result', 'Your Final result has published', '2018-05-12 14:40:55', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `result_details`
--

CREATE TABLE `result_details` (
  `id` int(11) NOT NULL,
  `master_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `std_id` varchar(100) NOT NULL,
  `ct_mrk` varchar(20) NOT NULL,
  `ass_mrk` varchar(20) NOT NULL,
  `mid_mrk` varchar(100) DEFAULT '0',
  `final_mrk` varchar(100) DEFAULT '0',
  `atnd_mrk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result_details`
--

INSERT INTO `result_details` (`id`, `master_id`, `name`, `std_id`, `ct_mrk`, `ass_mrk`, `mid_mrk`, `final_mrk`, `atnd_mrk`) VALUES
(1, 3, 'Sheik Farzana Smrity', 'CSE-1012', '10', '20', '30', '40', 5),
(2, 3, 'Piyal Barua', 'CSE-1007', '1', '2', '30', '40', 5),
(3, 3, 'Parvin Akter Nodhi', 'CSE-1013', '0', '0', '0', '0', 5),
(4, 3, 'Nobi Hossen Bappa', 'CSE-1018', '0', '0', '0', '0', 5),
(5, 3, 'Nishat Rahman', 'CSE-1005', '0', '0', '0', '0', 5),
(6, 3, 'Name', 'Student ID', '0', '0', '0', '0', 5),
(7, 3, 'Monsurul alam', 'CSE-1015', '0', '0', '0', '0', 5),
(8, 3, 'Mohi Uddin', 'CSE-1017', '0', '0', '0', '0', 5),
(9, 3, 'Mizanur Rahman', 'CSE-1010', '0', '0', '0', '0', 5),
(10, 3, 'Md Tareq(khor)', 'CSE-1001', '0', '0', '0', '0', 5),
(11, 3, 'Md Sukkur Ali', 'CSE-1004', '0', '0', '0', '0', 5),
(12, 3, 'Md Mazharul Islam', 'CSE-1016', '0', '0', '0', '0', 5),
(13, 3, 'Md Fardin Ahsan', 'CSE-1003', '0', '0', '0', '0', 5),
(14, 3, 'Md Arif Uddin', 'CSE-1002', '0', '0', '0', '0', 5),
(15, 3, 'Md Al-Amin', 'CSE-1019', '0', '0', '0', '0', 5),
(16, 3, 'Jasim Uddin Parves', 'CSE-1006', '0', '0', '0', '0', 5),
(17, 3, 'Ismail Hossen', 'CSE-1011', '0', '0', '0', '0', 5),
(18, 3, 'Dalower hossen', 'CSE-1009', '0', '0', '0', '0', 5),
(19, 3, 'Arju Akter', 'CSE-1014', '0', '0', '0', '0', 5);

-- --------------------------------------------------------

--
-- Table structure for table `result_master`
--

CREATE TABLE `result_master` (
  `id` int(11) NOT NULL,
  `tcr_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `dpt_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result_master`
--

INSERT INTO `result_master` (`id`, `tcr_id`, `sub_id`, `session_id`, `batch_id`, `dpt_id`, `status`) VALUES
(1, 1, 1, 1, 1, 1, 0),
(2, 1, 1, 1, 1, 1, 0),
(3, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `session_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `session_name`) VALUES
(1, 'Spring 2018');

-- --------------------------------------------------------

--
-- Table structure for table `students_details`
--

CREATE TABLE `students_details` (
  `id` int(11) NOT NULL,
  `std_master_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `session_id` varchar(100) NOT NULL,
  `dpt_id` varchar(50) NOT NULL,
  `batch_id` varchar(30) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students_details`
--

INSERT INTO `students_details` (`id`, `std_master_id`, `name`, `student_id`, `email`, `pass`, `session_id`, `dpt_id`, `batch_id`, `photo`, `status`) VALUES
(1, 1, 'Sheik Farzana Smrity', 'CSE-1012', 'smrity7289@gmail.com', '202cb962ac59075b964b07152d234b70', '1', '1', '1', NULL, 0),
(2, 1, 'Piyal Barua', 'CSE-1007', 'piyal12@gmail.com', '202cb962ac59075b964b07152d234b70', '1', '1', '1', NULL, 0),
(3, 1, 'Parvin Akter Nodhi', 'CSE-1013', 'nodhi9829@gmail.com', '202cb962ac59075b964b07152d234b70', '1', '1', '1', NULL, 0),
(4, 1, 'Nobi Hossen Bappa', 'CSE-1018', 'nhb455676@gmail.com', '202cb962ac59075b964b07152d234b70', '1', '1', '1', NULL, 0),
(5, 1, 'Nishat Rahman', 'CSE-1005', 'akcentnishat@gmail.com', '202cb962ac59075b964b07152d234b70', '1', '1', '1', NULL, 0),
(6, 1, 'Name', 'Student ID', 'Email', '202cb962ac59075b964b07152d234b70', '1', '1', '1', NULL, 0),
(7, 1, 'Monsurul alam', 'CSE-1015', 'neshantuhin@gmail.com', '202cb962ac59075b964b07152d234b70', '1', '1', '1', NULL, 0),
(8, 1, 'Mohi Uddin', 'CSE-1017', 'mohiuddin@gmail.com', '202cb962ac59075b964b07152d234b70', '1', '1', '1', NULL, 0),
(9, 1, 'Mizanur Rahman', 'CSE-1010', 'mrm245@gmail.com', '202cb962ac59075b964b07152d234b70', '1', '1', '1', NULL, 0),
(10, 1, 'Md Tareq(khor)', 'CSE-1001', 'tareqaziz295@gmail.com', '202cb962ac59075b964b07152d234b70', '1', '1', '1', NULL, 0),
(11, 1, 'Md Sukkur Ali', 'CSE-1004', 'student_example@gmail.com', '202cb962ac59075b964b07152d234b70', '1', '1', '1', NULL, 0),
(12, 1, 'Md Mazharul Islam', 'CSE-1016', 'md.mazed43@gmail.com', '202cb962ac59075b964b07152d234b70', '1', '1', '1', NULL, 0),
(13, 1, 'Md Fardin Ahsan', 'CSE-1003', 'fardinahsan25@gmail.com', '202cb962ac59075b964b07152d234b70', '1', '1', '1', NULL, 0),
(14, 1, 'Md Arif Uddin', 'CSE-1002', 'arifun12@gmail.com', '202cb962ac59075b964b07152d234b70', '1', '1', '1', NULL, 0),
(15, 1, 'Md Al-Amin', 'CSE-1019', 'alamin295@gmail.com', '202cb962ac59075b964b07152d234b70', '1', '1', '1', NULL, 0),
(16, 1, 'Jasim Uddin Parves', 'CSE-1006', 'parvespl@gmail.com', '202cb962ac59075b964b07152d234b70', '1', '1', '1', NULL, 0),
(17, 1, 'Ismail Hossen', 'CSE-1011', 'hridoy23456@gmail.com', '202cb962ac59075b964b07152d234b70', '1', '1', '1', NULL, 0),
(18, 1, 'Dalower hossen', 'CSE-1009', 'stakeholdersayed@gmail.com', '202cb962ac59075b964b07152d234b70', '1', '1', '1', NULL, 0),
(19, 1, 'Arju Akter', 'CSE-1014', 'arjui892@gmail.com', '202cb962ac59075b964b07152d234b70', '1', '1', '1', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `students_master`
--

CREATE TABLE `students_master` (
  `id` int(11) NOT NULL,
  `department_id` varchar(100) NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `batch_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students_master`
--

INSERT INTO `students_master` (`id`, `department_id`, `session_id`, `batch_id`) VALUES
(1, '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `dpt_id` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `dpt_id`, `subject_name`) VALUES
(1, 1, 'DLD');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(300) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `info` varchar(300) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `dpt_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `teacher_id`, `email`, `pass`, `mobile`, `info`, `photo`, `dpt_id`, `status`) VALUES
(1, 'mamun', 'LEC1525781797', 'bromamun@gmail.com', '202cb962ac59075b964b07152d234b70', '01772040475', 'Lhjfbcdjkbhj', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Structure for view `assigntch_by_sub`
--
DROP TABLE IF EXISTS `assigntch_by_sub`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `assigntch_by_sub`  AS  select `assign_tcr`.`id` AS `id`,`teachers`.`name` AS `name`,`department`.`dpt_name` AS `dpt_name`,`subject`.`subject_name` AS `subject_name`,`session`.`session_name` AS `session_name`,`batch`.`batch_name` AS `batch_name` from (((((`assign_tcr` join `teachers`) join `department`) join `subject`) join `session`) join `batch`) where ((`assign_tcr`.`tcr_id` = `teachers`.`id`) and (`assign_tcr`.`dpt_id` = `department`.`id`) and (`assign_tcr`.`session_id` = `session`.`id`) and (`assign_tcr`.`batch_id` = `batch`.`id`) and (`assign_tcr`.`subject_id` = `subject`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_notice`
--
ALTER TABLE `admin_notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_tcr`
--
ALTER TABLE `assign_tcr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendence_details`
--
ALTER TABLE `attendence_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `master_id` (`master_id`);

--
-- Indexes for table `attendence_master`
--
ALTER TABLE `attendence_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `head_of_the_dpt`
--
ALTER TABLE `head_of_the_dpt`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `lecture_details`
--
ALTER TABLE `lecture_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_details`
--
ALTER TABLE `result_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_master`
--
ALTER TABLE `result_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_details`
--
ALTER TABLE `students_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_master`
--
ALTER TABLE `students_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_notice`
--
ALTER TABLE `admin_notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assign_tcr`
--
ALTER TABLE `assign_tcr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendence_details`
--
ALTER TABLE `attendence_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendence_master`
--
ALTER TABLE `attendence_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `head_of_the_dpt`
--
ALTER TABLE `head_of_the_dpt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lecture_details`
--
ALTER TABLE `lecture_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `result_details`
--
ALTER TABLE `result_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `result_master`
--
ALTER TABLE `result_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students_details`
--
ALTER TABLE `students_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `students_master`
--
ALTER TABLE `students_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendence_details`
--
ALTER TABLE `attendence_details`
  ADD CONSTRAINT `attendence_details_ibfk_1` FOREIGN KEY (`master_id`) REFERENCES `attendence_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
