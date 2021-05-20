-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2019 at 11:28 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbt`
--

-- --------------------------------------------------------

--
-- Table structure for table `mst_admin`
--

CREATE TABLE `mst_admin` (
  `id` int(11) NOT NULL,
  `loginid` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_admin`
--

INSERT INTO `mst_admin` (`id`, `loginid`, `pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `mst_exam_time`
--

CREATE TABLE `mst_exam_time` (
  `id` int(255) NOT NULL,
  `time_start` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_exam_time`
--

INSERT INTO `mst_exam_time` (`id`, `time_start`) VALUES
(1, '50');

-- --------------------------------------------------------

--
-- Table structure for table `mst_logo`
--

CREATE TABLE `mst_logo` (
  `id_logo` int(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_logo`
--

INSERT INTO `mst_logo` (`id_logo`, `logo`) VALUES
(3, '../cbt/admin/img/server_data/clock.gif');

-- --------------------------------------------------------

--
-- Table structure for table `mst_question`
--

CREATE TABLE `mst_question` (
  `id` int(5) NOT NULL,
  `test_id` int(5) DEFAULT NULL,
  `que_desc` varchar(150) DEFAULT NULL,
  `ans1` varchar(75) DEFAULT NULL,
  `ans2` varchar(75) DEFAULT NULL,
  `ans3` varchar(75) DEFAULT NULL,
  `ans4` varchar(75) DEFAULT NULL,
  `true_ans` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_question`
--

INSERT INTO `mst_question` (`id`, `test_id`, `que_desc`, `ans1`, `ans2`, `ans3`, `ans4`, `true_ans`) VALUES
(1, 1, 'WHAT IS BIOLO', 'BIOLOGY IS A SUBJECT', 'BIOLOGY IS A COURSE', 'NO IDEA', 'All of the above', 1),
(2, 6, 'what is account?', 'account is  a course', 'account is a subject', 'account is a class', 'i dont know', 1),
(3, 3, 'what is physics', 'i dnt know', 'no idea', 'its a course', 'its a subject', 4),
(4, 2, '9hiojpoljpol;', 'uuhiojk', 'noilk', 'oiinol', 'ooolm3', 3),
(5, 8, 'WHAT IS COMUNICATION?', 'I dont knw', 'yes', 'no', 'ask me again', 1),
(6, 9, 'WHAT IS THE SQUARE ROOT OF 4', '2', '3', '4', '6', 1),
(7, 9, 'WHAT IS MATHEMATICS', 'MATHEMATICS IS A SCIENCE SUBJECT', 'MATHEMATICS IS A COMMERCIAL SUBJECT', 'MATHEMATICS IS A GEOGRAPHY SUBJECT', 'NONE OF THE ABOVE', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mst_result`
--

CREATE TABLE `mst_result` (
  `login` varchar(20) DEFAULT NULL,
  `test_id` int(5) DEFAULT NULL,
  `test_date` date DEFAULT NULL,
  `score` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_result`
--

INSERT INTO `mst_result` (`login`, `test_id`, `test_date`, `score`) VALUES
('1', 1, '0000-00-00', 0),
('1', 3, '0000-00-00', 1),
('1', 2, '0000-00-00', 1),
('1', 1, '0000-00-00', 1),
('1', 1, '0000-00-00', 1),
('1', 1, '0000-00-00', 1),
('1', 1, '0000-00-00', 1),
('1', 8, '0000-00-00', 1),
('3', 1, '0000-00-00', 0),
('1', 9, '0000-00-00', 1),
('4', 1, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mst_settings`
--

CREATE TABLE `mst_settings` (
  `id_sett` int(255) NOT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_settings`
--

INSERT INTO `mst_settings` (`id_sett`, `info`) VALUES
(1, 'MAKE SURE YOU VERIFY YOUR DETAIL BEFORE YOU START YOUR EXAM'),
(2, 'FINISH THE FIRST SUBJECT BEFORE CLICKING ON THE SECOND SUBJECT'),
(3, 'DO NOT FORGET TO CLICK ON SUBMIT AFTER YOU MIGHT HAVE FINISHED YOUR EXAM.'),
(4, 'IF YOU HAVE ANY QUESTION, KINDLY CALL ONE OF THE INSTRUCTOR.'),
(5, 'BEST OF LUCK'),
(6, 'hllo');

-- --------------------------------------------------------

--
-- Table structure for table `mst_subject`
--

CREATE TABLE `mst_subject` (
  `id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `sub_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_subject`
--

INSERT INTO `mst_subject` (`id`, `sub_id`, `sub_name`) VALUES
(1, 0, 'SCIENCE DEPARMENT'),
(2, 0, 'COMMERCIAL DEPARTMENT'),
(3, 0, 'ART DEPARTMENT'),
(4, 0, 'COMPUTER SCIENCE'),
(5, 0, 'MASS COMMUNICATION'),
(6, 0, 'MECHANICAL ENGINEERING');

-- --------------------------------------------------------

--
-- Table structure for table `mst_test`
--

CREATE TABLE `mst_test` (
  `id` int(11) NOT NULL,
  `sub_id` int(5) DEFAULT NULL,
  `test_name` varchar(30) DEFAULT NULL,
  `total_que` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_test`
--

INSERT INTO `mst_test` (`id`, `sub_id`, `test_name`, `total_que`) VALUES
(1, 1, 'BIOLOGY', '20'),
(2, 1, 'CHEMIS', '20'),
(3, 1, 'PHYSICS', '20'),
(4, 2, 'COMMERCE', '20'),
(5, 2, 'BIOLOGY', '20'),
(6, 2, 'ACC', '20'),
(7, 3, 'government', '20'),
(8, 5, 'PRINCIPLE OF MASS COMMUNICATIO', '20'),
(9, 6, 'MATHEMATICS', '25'),
(10, 6, 'ENGLISH LANGUAGE', '25'),
(11, 6, 'FURTHER MATHEMATICS', '25');

-- --------------------------------------------------------

--
-- Table structure for table `mst_timer`
--

CREATE TABLE `mst_timer` (
  `timer_id` int(255) NOT NULL,
  `remain_time` varchar(255) NOT NULL,
  `question_id` int(255) NOT NULL,
  `student_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_timer`
--

INSERT INTO `mst_timer` (`timer_id`, `remain_time`, `question_id`, `student_id`) VALUES
(1, '10', 1, 1),
(2, '8', 2, 1),
(3, '8', 3, 1),
(4, '50', 7, 1),
(5, '48', 8, 1),
(6, '49', 1, 3),
(7, '48', 9, 1),
(8, '0', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `mst_user`
--

CREATE TABLE `mst_user` (
  `user_id` int(5) NOT NULL,
  `login` varchar(20) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `depertment` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_user`
--

INSERT INTO `mst_user` (`user_id`, `login`, `pass`, `first_name`, `last_name`, `depertment`, `level`, `sex`) VALUES
(1, 'admin', 'admin', 'franco', 'ADMINISTRATOR', 'ADMINISTRATOR', 'ADMINISTRATOR', 'ADMINISTRATOR'),
(2, 'onoi', 'jpo', 'noinoin', 'oinn', 'oinoin', 'oinoink', 'ojol'),
(3, 'adex', '090909', 'Demola', 'Adetunji', 'science', 'ss3', 'male'),
(4, 'gbade@gmail.com', 'gbade@gmail.com', 'gbade@gmail.com', 'gbade@gmail.com', 'science', 'ss2', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `mst_useranswer`
--

CREATE TABLE `mst_useranswer` (
  `sess_id` varchar(80) DEFAULT NULL,
  `test_id` int(11) DEFAULT NULL,
  `que_des` varchar(200) DEFAULT NULL,
  `ans1` varchar(50) DEFAULT NULL,
  `ans2` varchar(50) DEFAULT NULL,
  `ans3` varchar(50) DEFAULT NULL,
  `ans4` varchar(50) DEFAULT NULL,
  `true_ans` int(11) DEFAULT NULL,
  `your_ans` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_useranswer`
--

INSERT INTO `mst_useranswer` (`sess_id`, `test_id`, `que_des`, `ans1`, `ans2`, `ans3`, `ans4`, `true_ans`, `your_ans`) VALUES
('d35upndmflht2ccae270qdui03', 1, 'WHAT IS BIOLOGY', 'BIOLOGY IS A SUBJECT', 'BIOLOGY IS A COURSE', 'NO IDEA', 'All of the above', 1, 3),
('v55f2715ubqsjhreo2uciqo492', 1, 'WHAT IS BIOLOGY', 'BIOLOGY IS A SUBJECT', 'BIOLOGY IS A COURSE', 'NO IDEA', 'All of the above', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mst_admin`
--
ALTER TABLE `mst_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_exam_time`
--
ALTER TABLE `mst_exam_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_logo`
--
ALTER TABLE `mst_logo`
  ADD PRIMARY KEY (`id_logo`);

--
-- Indexes for table `mst_question`
--
ALTER TABLE `mst_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_settings`
--
ALTER TABLE `mst_settings`
  ADD PRIMARY KEY (`id_sett`);

--
-- Indexes for table `mst_subject`
--
ALTER TABLE `mst_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_test`
--
ALTER TABLE `mst_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_timer`
--
ALTER TABLE `mst_timer`
  ADD PRIMARY KEY (`timer_id`);

--
-- Indexes for table `mst_user`
--
ALTER TABLE `mst_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mst_admin`
--
ALTER TABLE `mst_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mst_exam_time`
--
ALTER TABLE `mst_exam_time`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mst_logo`
--
ALTER TABLE `mst_logo`
  MODIFY `id_logo` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mst_question`
--
ALTER TABLE `mst_question`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `mst_settings`
--
ALTER TABLE `mst_settings`
  MODIFY `id_sett` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mst_subject`
--
ALTER TABLE `mst_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mst_test`
--
ALTER TABLE `mst_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `mst_timer`
--
ALTER TABLE `mst_timer`
  MODIFY `timer_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `mst_user`
--
ALTER TABLE `mst_user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
