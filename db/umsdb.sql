-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2018 at 11:38 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ums_admin`
--

CREATE TABLE `ums_admin` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(256) NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `avatar` varchar(255) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT '2',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ums_admin`
--

INSERT INTO `ums_admin` (`id`, `username`, `name`, `email`, `password`, `avatar`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Super Admin', 'admin@admin.com', '$2y$10$ZFSFNXWUzDKwBDmerOTy2OJHjwsqhzyzdvJeewxSpL8NBlLURqCRu', '', 2, '2018-03-26 00:00:00', '2018-03-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ums_assign_subject_teacher`
--

CREATE TABLE `ums_assign_subject_teacher` (
  `id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ums_assign_subject_teacher`
--

INSERT INTO `ums_assign_subject_teacher` (`id`, `dept_id`, `batch_id`, `semester_id`, `subject_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 10, 1, 1, '2018-03-31 00:00:00', '2018-03-31 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ums_attendance`
--

CREATE TABLE `ums_attendance` (
  `id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `created_at` varchar(256) NOT NULL,
  `updated_at` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ums_attendance`
--

INSERT INTO `ums_attendance` (`id`, `shift_id`, `dept_id`, `batch_id`, `semester_id`, `subject_id`, `student_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 10, 1, 1, 0, '2018-04-02', '2018-04-02');

-- --------------------------------------------------------

--
-- Table structure for table `ums_batch`
--

CREATE TABLE `ums_batch` (
  `id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ums_batch`
--

INSERT INTO `ums_batch` (`id`, `dept_id`, `shift_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '45th', '2018-03-30 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 1, '45th', '2018-03-31 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ums_depertment`
--

CREATE TABLE `ums_depertment` (
  `id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ums_depertment`
--

INSERT INTO `ums_depertment` (`id`, `dept_id`, `name`, `username`, `password`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'cse', 'cse11', '$2y$10$BKRFWDn5U8rjhTBjURjR7.yPkRUDyVZuvEhrPQCVbfGj.dvHTe.YW', 'cse@gmail.com', 2, '2018-03-31 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ums_dept_list`
--

CREATE TABLE `ums_dept_list` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ums_dept_list`
--

INSERT INTO `ums_dept_list` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'CSE', '2018-03-26 00:00:00', '2018-03-26 00:00:00'),
(2, 'LAW', '2018-03-26 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ums_gender`
--

CREATE TABLE `ums_gender` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ums_gender`
--

INSERT INTO `ums_gender` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Male', '2018-04-01 00:00:00', '2018-04-01 00:00:00'),
(2, 'Female', '2018-04-01 00:00:00', '2018-04-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ums_notice`
--

CREATE TABLE `ums_notice` (
  `id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `file` varchar(256) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ums_notice`
--

INSERT INTO `ums_notice` (`id`, `dept_id`, `name`, `description`, `file`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'test', '<p>\r\n	this is test notice</p>\r\n', '', 2, '2018-03-31 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ums_semester`
--

CREATE TABLE `ums_semester` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ums_semester`
--

INSERT INTO `ums_semester` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '1', '2018-03-26 00:00:00', '0000-00-00 00:00:00'),
(2, '2', '2018-03-26 00:00:00', '0000-00-00 00:00:00'),
(3, '3', '2018-03-26 00:00:00', '0000-00-00 00:00:00'),
(4, '4', '2018-03-26 00:00:00', '0000-00-00 00:00:00'),
(5, '5', '2018-03-26 00:00:00', '0000-00-00 00:00:00'),
(6, '6', '2018-03-26 00:00:00', '0000-00-00 00:00:00'),
(7, '7', '2018-03-26 00:00:00', '0000-00-00 00:00:00'),
(8, '8', '2018-03-26 00:00:00', '0000-00-00 00:00:00'),
(9, '9', '2018-03-26 00:00:00', '0000-00-00 00:00:00'),
(10, '10', '2018-03-26 00:00:00', '0000-00-00 00:00:00'),
(11, '11', '2018-03-26 00:00:00', '0000-00-00 00:00:00'),
(12, '12', '2018-03-26 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ums_shift`
--

CREATE TABLE `ums_shift` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ums_shift`
--

INSERT INTO `ums_shift` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Day', '2018-03-26 00:00:00', '0000-00-00 00:00:00'),
(2, 'Evening', '2018-03-26 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ums_status`
--

CREATE TABLE `ums_status` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ums_status`
--

INSERT INTO `ums_status` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Active', '2018-03-26 00:00:00', '0000-00-00 00:00:00'),
(3, 'Inactive', '2018-03-26 00:00:00', '0000-00-00 00:00:00'),
(4, 'Finish', '2018-03-26 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ums_status2`
--

CREATE TABLE `ums_status2` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ums_status2`
--

INSERT INTO `ums_status2` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Active', '2018-03-26 00:00:00', '0000-00-00 00:00:00'),
(3, 'Inactive', '2018-03-26 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ums_student`
--

CREATE TABLE `ums_student` (
  `id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `batch_id` varchar(256) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `session` varchar(256) NOT NULL,
  `registration_no` varchar(256) NOT NULL,
  `roll` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `address` varchar(256) NOT NULL,
  `phone` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `avatar` varchar(256) NOT NULL,
  `cr` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ums_student`
--

INSERT INTO `ums_student` (`id`, `shift_id`, `dept_id`, `batch_id`, `semester_id`, `status`, `session`, `registration_no`, `roll`, `name`, `gender`, `address`, `phone`, `email`, `username`, `password`, `avatar`, `cr`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '1', 10, 2, '2014', '276393', '32', 'Rubel', '1', 'Dhaka', '01673106669', 'dpirubel@gmail.com', '276393', '$2y$10$TuGeZrq6yMxlN9AkIFfJ3OGvt7C008R82oBagqBzdBVbvooNLCOsi', 'de188-cropsuperman.jpg', 0, '2018-03-31 00:00:00', '2018-03-31 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ums_student_batch_notice`
--

CREATE TABLE `ums_student_batch_notice` (
  `id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ums_student_batch_notice`
--

INSERT INTO `ums_student_batch_notice` (`id`, `dept_id`, `batch_id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'test s11', '<p>\r\n	test s11</p>\r\n', '2018-03-31 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ums_student_report`
--

CREATE TABLE `ums_student_report` (
  `id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ums_student_report`
--

INSERT INTO `ums_student_report` (`id`, `dept_id`, `student_id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'test', '<p>\r\n	test</p>\r\n', '2018-03-31 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ums_subject`
--

CREATE TABLE `ums_subject` (
  `id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `subject_code` varchar(256) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ums_subject`
--

INSERT INTO `ums_subject` (`id`, `shift_id`, `dept_id`, `semester_id`, `name`, `subject_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 10, 'Compiler Design', 'CSE-401', 2, '2018-03-27 00:00:00', '2018-03-27 00:00:00'),
(2, 2, 1, 10, 'ECommerce', 'CSE-402', 2, '2018-03-31 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ums_teacher`
--

CREATE TABLE `ums_teacher` (
  `id` int(11) UNSIGNED NOT NULL,
  `dept_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(256) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `address` varchar(256) NOT NULL,
  `phone` int(12) NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `avatar` varchar(255) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ums_teacher`
--

INSERT INTO `ums_teacher` (`id`, `dept_id`, `username`, `name`, `gender`, `address`, `phone`, `email`, `password`, `avatar`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'teacher', 'tanvir', '1', 'dhaka', 1673106669, 'admin@admin.com', '$2y$10$qtUAzmxGHcZShqzomnldx.rV71DEmTNZ8OK9CFAbA4H0QmBsBUas6', 'e52cf-sumon.jpg', 2, '2018-03-30 00:00:00', '2018-04-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ums_teacher_assign_subject_notice`
--

CREATE TABLE `ums_teacher_assign_subject_notice` (
  `id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `file` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ums_teacher_assign_subject_notice`
--

INSERT INTO `ums_teacher_assign_subject_notice` (`id`, `dept_id`, `batch_id`, `subject_id`, `title`, `description`, `file`, `created_at`, `updated_at`) VALUES
(5, 1, 1, 1, 'Lecture 1', '<p>\r\n	Lecture 1</p>\r\n', '01713-cse.docx', '2018-03-31 00:00:00', '2018-03-31 00:00:00'),
(8, 1, 1, 1, 'test', '<p>\r\n	test</p>\r\n', '', '2018-03-31 00:00:00', '2018-03-31 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ums_teacher_report`
--

CREATE TABLE `ums_teacher_report` (
  `id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ums_teacher_report`
--

INSERT INTO `ums_teacher_report` (`id`, `dept_id`, `teacher_id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'test report teacher', '<p>\r\n	test report teacher</p>\r\n', '2018-03-31 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ums_admin`
--
ALTER TABLE `ums_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ums_assign_subject_teacher`
--
ALTER TABLE `ums_assign_subject_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ums_attendance`
--
ALTER TABLE `ums_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ums_batch`
--
ALTER TABLE `ums_batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ums_depertment`
--
ALTER TABLE `ums_depertment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ums_dept_list`
--
ALTER TABLE `ums_dept_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ums_gender`
--
ALTER TABLE `ums_gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ums_notice`
--
ALTER TABLE `ums_notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ums_semester`
--
ALTER TABLE `ums_semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ums_shift`
--
ALTER TABLE `ums_shift`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ums_status`
--
ALTER TABLE `ums_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ums_status2`
--
ALTER TABLE `ums_status2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ums_student`
--
ALTER TABLE `ums_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ums_student_batch_notice`
--
ALTER TABLE `ums_student_batch_notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ums_student_report`
--
ALTER TABLE `ums_student_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ums_subject`
--
ALTER TABLE `ums_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ums_teacher`
--
ALTER TABLE `ums_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ums_teacher_assign_subject_notice`
--
ALTER TABLE `ums_teacher_assign_subject_notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ums_teacher_report`
--
ALTER TABLE `ums_teacher_report`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ums_admin`
--
ALTER TABLE `ums_admin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ums_assign_subject_teacher`
--
ALTER TABLE `ums_assign_subject_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ums_attendance`
--
ALTER TABLE `ums_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ums_batch`
--
ALTER TABLE `ums_batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ums_depertment`
--
ALTER TABLE `ums_depertment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ums_dept_list`
--
ALTER TABLE `ums_dept_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ums_gender`
--
ALTER TABLE `ums_gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ums_notice`
--
ALTER TABLE `ums_notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ums_semester`
--
ALTER TABLE `ums_semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `ums_shift`
--
ALTER TABLE `ums_shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ums_status`
--
ALTER TABLE `ums_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ums_status2`
--
ALTER TABLE `ums_status2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ums_student`
--
ALTER TABLE `ums_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ums_student_batch_notice`
--
ALTER TABLE `ums_student_batch_notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ums_student_report`
--
ALTER TABLE `ums_student_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ums_subject`
--
ALTER TABLE `ums_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ums_teacher`
--
ALTER TABLE `ums_teacher`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ums_teacher_assign_subject_notice`
--
ALTER TABLE `ums_teacher_assign_subject_notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ums_teacher_report`
--
ALTER TABLE `ums_teacher_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
