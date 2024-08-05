-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2023 at 10:16 AM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `feedback`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_teacher`
--

CREATE TABLE IF NOT EXISTS `add_teacher` (
`t_id` int(80) NOT NULL,
  `t_name` varchar(255) NOT NULL,
  `t_department` varchar(255) NOT NULL,
  `t_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `add_teacher`
--

INSERT INTO `add_teacher` (`t_id`, `t_name`, `t_department`, `t_image`) VALUES
(1, 'Prof. A. K. Patil', 'Computer', NULL),
(2, 'Prof. V. S. Thakre', 'Computer', NULL),
(3, 'Prof. J. S. Sonewane', 'Computer', NULL),
(4, 'Prof. P. A. Agrawal', 'Computer', NULL),
(15, 'Prof. M. M. Sayyad', 'Computer', NULL),
(16, 'Lomesh Mahajan', 'Civil', NULL),
(18, 'kitten', 'Computer', 'kitten.png'),
(19, 'Dog', 'Computer', 'demo-image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `aid` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `department`, `password`) VALUES
('hodcomp', 'Computer', 'hodcomp'),
('admin', 'Admin User', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
('hodds', 'Data Science', 'hodds'),
('hodaiml', 'AI/ML', 'hodaiml'),
('hodentc', 'ENTC', 'hodentc'),
('hodmech', 'Mechanical', 'hodmech'),
('hodcivil', 'Civil', 'hodcivil'),
('hodfe', 'Applied Sciences and Humanities', 'hodfe'),
('hodelect', 'Electrical', 'hodelect'),
('hodmca', 'MCA', 'hodmca');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
`id` int(255) NOT NULL,
  `faculty_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=112 ;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `faculty_id`, `name`, `department`, `year`, `semester`, `subject`, `division`) VALUES
(100, '15', 'Prof. M. M. Sayyad', 'Computer', 'TY', '5', 'AI', 'C'),
(99, '15', 'Prof. M. M. Sayyad', 'Computer', 'TY', '5', 'AI', 'B'),
(98, '2', 'Prof. V. S. Thakre', 'Computer', 'TY', '6', 'IS', 'B'),
(95, '2', 'Prof. V. S. Thakre', 'Computer', 'TY', '5', 'POA', 'A'),
(96, '2', 'Prof. V. S. Thakre', 'Computer', 'TY', '5', 'POA', 'B'),
(97, '2', 'Prof. V. S. Thakre', 'Computer', 'TY', '6', 'IS', 'A'),
(94, '1', 'Prof. A. K. Patil', 'Computer', 'TY', '6', 'IOT', 'C'),
(93, '1', 'Prof. A. K. Patil', 'Computer', 'TY', '6', 'ML', 'B'),
(92, '1', 'Prof. A. K. Patil', 'Computer', 'TY', '5', 'Python', 'B'),
(106, '18', 'kitten', 'Computer', 'SY', '3', 'kitten', 'A'),
(103, '17', 'Prof. U M Patil', 'Computer', 'TY', '5', 'ADBMS', 'B'),
(111, '1', 'Prof. A. K. Patil', 'Computer', 'FY', '1', 'IOT', 'A'),
(101, '16', 'Lomesh Mahajan', 'Civil', 'SY', '3', 'copy', 'A'),
(107, '18', 'kitten', 'Computer', 'SY', '3', 'kitten', 'B'),
(108, '19', 'Dog', 'Computer', 'FY', '1', 'Dog', 'A'),
(109, '19', 'Dog', 'Computer', 'FY', '1', 'Dog', 'B'),
(110, '19', 'Dog', 'Computer', 'FY', '1', 'Dog', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `feeds`
--

CREATE TABLE IF NOT EXISTS `feeds` (
`id` int(255) NOT NULL,
  `faculty_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `q1` varchar(255) NOT NULL,
  `q2` varchar(255) NOT NULL,
  `q3` varchar(255) NOT NULL,
  `q4` varchar(255) NOT NULL,
  `q5` varchar(255) NOT NULL,
  `q6` varchar(255) NOT NULL,
  `q7` varchar(255) NOT NULL,
  `q8` varchar(255) NOT NULL,
  `q9` varchar(255) NOT NULL,
  `q10` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `percent` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

--
-- Dumping data for table `feeds`
--

INSERT INTO `feeds` (`id`, `faculty_id`, `name`, `department`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `total`, `percent`) VALUES
(55, '2', 'Prof. V. S. Thakre', 'Computer', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '10', '20'),
(56, '2', 'Prof. V. S. Thakre', 'Computer', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '30', '60'),
(46, '16', 'Lomesh Mahajan', 'Civil', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '50', '100'),
(53, '2', 'Prof. V. S. Thakre', 'Computer', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '50', '100'),
(57, '2', 'Prof. V. S. Thakre', 'Computer', '2', '4', '2', '4', '2', '4', '2', '4', '2', '4', '30', '60'),
(58, '2', 'Prof. V. S. Thakre', 'Computer', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '40', '80'),
(59, '1', 'Prof. A. K. Patil', 'Computer', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '40', '80'),
(60, '2', 'Prof. V. S. Thakre', 'Computer', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '50', '100'),
(61, '2', 'Prof. V. S. Thakre', 'Computer', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '50', '100'),
(62, '2', 'Prof. V. S. Thakre', 'Computer', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '50', '100'),
(63, '15', 'Prof. M. M. Sayyad', 'Computer', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '50', '100'),
(64, '2', 'Prof. V. S. Thakre', 'Computer', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '40', '80'),
(65, '1', 'Prof. A. K. Patil', 'Computer', '5', '4', '5', '5', '5', '5', '5', '5', '5', '5', '49', '98'),
(66, '1', 'Prof. A. K. Patil', 'Computer', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '50', '100'),
(67, '2', 'Prof. V. S. Thakre', 'Computer', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '50', '100'),
(68, '2', 'Prof. V. S. Thakre', 'Computer', '5', '4', '5', '5', '5', '5', '5', '5', '5', '5', '49', '98'),
(69, '1', 'Prof. A. K. Patil', 'Computer', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '50', '100'),
(70, '1', 'Prof. A. K. Patil', 'Computer', '2', '5', '3', '5', '5', '5', '5', '5', '5', '5', '45', '90'),
(71, '1', 'Prof. A. K. Patil', 'Computer', '2', '5', '3', '5', '5', '5', '5', '5', '5', '5', '45', '90'),
(72, '1', 'Prof. A. K. Patil', 'Computer', '2', '5', '3', '5', '5', '5', '5', '5', '5', '5', '45', '90'),
(73, '1', 'Prof. A. K. Patil', 'Computer', '2', '5', '3', '5', '5', '5', '5', '5', '5', '5', '45', '90'),
(74, '1', 'Prof. A. K. Patil', 'Computer', '2', '5', '3', '5', '5', '5', '5', '5', '5', '5', '45', '90'),
(75, '1', 'Prof. A. K. Patil', 'Computer', '2', '5', '3', '5', '5', '5', '5', '5', '5', '5', '45', '90'),
(76, '1', 'Prof. A. K. Patil', 'Computer', '2', '5', '3', '5', '5', '5', '5', '5', '5', '5', '45', '90'),
(77, '2', 'Prof. V. S. Thakre', 'Computer', '4', '4', '5', '5', '5', '5', '5', '5', '5', '5', '48', '96'),
(78, '2', 'Prof. V. S. Thakre', 'Computer', '4', '4', '5', '5', '5', '5', '5', '5', '5', '5', '48', '96'),
(79, '2', 'Prof. V. S. Thakre', 'Computer', '4', '4', '5', '5', '5', '5', '5', '5', '5', '5', '48', '96'),
(80, '2', 'Prof. V. S. Thakre', 'Computer', '4', '4', '5', '5', '5', '5', '5', '5', '5', '5', '48', '96'),
(81, '2', 'Prof. V. S. Thakre', 'Computer', '4', '4', '5', '5', '5', '5', '5', '5', '5', '5', '48', '96'),
(82, '1', 'Prof. A. K. Patil', 'Computer', '5', '4', '5', '5', '5', '5', '5', '5', '5', '5', '49', '98'),
(83, '1', 'Prof. A. K. Patil', 'Computer', '5', '4', '5', '5', '5', '5', '5', '5', '5', '5', '49', '98'),
(84, '1', 'Prof. A. K. Patil', 'Computer', '5', '4', '5', '5', '5', '5', '5', '5', '5', '5', '49', '98'),
(85, '15', 'Prof. M. M. Sayyad', 'Computer', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '20', '40'),
(86, '2', 'Prof. V. S. Thakre', 'Computer', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '50', '100'),
(87, '1', 'Prof. A. K. Patil', 'Computer', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '30', '60'),
(88, '15', 'Prof. M. M. Sayyad', 'Computer', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '40', '80'),
(89, '2', 'Prof. V. S. Thakre', 'Computer', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '50', '100'),
(90, '1', 'Prof. A. K. Patil', 'Computer', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '10', '20'),
(91, '15', 'Prof. M. M. Sayyad', 'Computer', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '30', '60'),
(93, '2', 'Prof. V. S. Thakre', 'Computer', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '40', '80'),
(95, '1', 'Prof. A. K. Patil', 'Computer', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '40', '80'),
(96, '15', 'Prof. M. M. Sayyad', 'Computer', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '50', '100'),
(97, '1', 'Prof. A. K. Patil', 'Computer', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '40', '80'),
(98, '1', 'Prof. A. K. Patil', 'Computer', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '40', '80'),
(99, '2', 'Prof. V. S. Thakre', 'Computer', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '40', '80'),
(101, '15', 'Prof. M. M. Sayyad', 'Computer', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '40', '80'),
(104, '1', 'Prof. A. K. Patil', 'Computer', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '19', '38'),
(103, '18', 'kitten', 'Computer', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '50', '100');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
`id` int(11) NOT NULL,
  `q1` varchar(255) NOT NULL,
  `q2` varchar(255) NOT NULL,
  `q3` varchar(255) NOT NULL,
  `q4` varchar(255) NOT NULL,
  `q5` varchar(255) NOT NULL,
  `q6` varchar(255) NOT NULL,
  `q7` varchar(255) NOT NULL,
  `q8` varchar(255) NOT NULL,
  `q9` varchar(255) NOT NULL,
  `q10` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`) VALUES
(1, 'Description of course objectives &amp; assignments', 'Communication of ideas &amp; information', 'Expression of expectations for performance', 'Availability to assist students in or out of class', 'Respect or concern for students', 'Stimulation of interest in course', 'Facilitation of learning', 'Enthusiasm for the subject', 'Encourage students to think independently, creatively &amp; critically', 'Overall rating');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_teacher`
--
ALTER TABLE `add_teacher`
 ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feeds`
--
ALTER TABLE `feeds`
 ADD PRIMARY KEY (`id`), ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_teacher`
--
ALTER TABLE `add_teacher`
MODIFY `t_id` int(80) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `feeds`
--
ALTER TABLE `feeds`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
