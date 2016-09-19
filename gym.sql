-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2016 at 11:21 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'sraboni', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE IF NOT EXISTS `instructor` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `package_id` int(11) NOT NULL,
  `qualification` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`id`, `name`, `package_id`, `qualification`) VALUES
(1, 'Rayhana Khatun', 3, 'Expert Power yoga instructor with 10 years of experience'),
(2, 'Shumi Khan', 3, 'Acclaimed Yogi & experienced power yoga consultant with 7 years experience'),
(3, 'Jihad Ahmed', 2, 'Body-building expert. Experienced in working with celebratory & sports personalities'),
(4, 'Rayhan Kabir', 2, 'Champion body-builder & muscle building expert. Experienced with wide acclaim & recognition');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `registration_id` int(10) NOT NULL,
  `package_id` int(10) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `diet_plan` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`registration_id`, `package_id`, `instructor_id`, `diet_plan`) VALUES
(1, 3, 3, 'BREAKFAST\r\nGerman Apple Pancake\r\nStrawberries (1 cup)\r\nSkim Milk\r\nLUNCH\r\nLeek, Asparagus & Herb Soup\r\n or \r\nTriple Celery Bisque\r\nAquino & Black Beans\r\nOrange (1 large)\r\n'),
(2, 2, 3, 'BREAKFAST\r\nGerman Apple Pancake\r\nStrawberries (1 cup)\r\nSkim Milk\r\n\r\nLUNCH\r\nLeek, Asparagus & Herb Soup\r\n or \r\nTriple Celery Bisque\r\nQuinoa & Black Beans\r\nOrange (1 large)\r\n\r\nDINNER\r\nApple\r\nSkim Milk   '),
(3, 1, 0, 'BREAKFAST\r\nGerman Apple Pancake\r\nStrawberries (1 cup)\r\nSkim Milk\r\nLUNCH\r\nLeek, Asparagus & Herb Soup\r\n or \r\nTriple Celery Bisque\r\nAquino & Black Beans\r\nOrange (1 large)\r\n'),
(4, 3, 4, 'BREAKFAST\r\nGerman Apple Pancake\r\nStrawberries (1 cup)\r\nSkim Milk\r\nLUNCH\r\nLeek, Asparagus & Herb Soup\r\n or \r\nTriple Celery Bisque\r\nAquino & Black Beans\r\nOrange (1 large)\r\n'),
(7, 1, 0, 'you have no diet plan yet'),
(8, 3, 1, 'you have no diet plan yet');

-- --------------------------------------------------------

--
-- Table structure for table `member_query`
--

CREATE TABLE IF NOT EXISTS `member_query` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `problem` varchar(255) NOT NULL,
  `problem_date` date NOT NULL,
  `solution` varchar(255) NOT NULL,
  `solution_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_query`
--

INSERT INTO `member_query` (`id`, `member_id`, `problem`, `problem_date`, `solution`, `solution_date`) VALUES
(1, 1, 'I am confused about the package choice process.', '2016-02-03', 'Just select your desired package from the package list and press choose button.', '2016-02-03'),
(2, 1, 'Will the gym be closed during Sharashwati Puja?', '2016-02-03', 'Yes', '2016-02-03'),
(10, 2, 'I want to know the address of your gym', '2016-02-15', 'Pending', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `fee` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `name`, `description`, `gender`, `schedule`, `fee`) VALUES
(1, 'Machine Exercise', 'Daily machine exercise with equipment like treadmill, dumbbell, weights etc.', 'Male & Female', 'Everyday\r\n10.00am-6.00pm', 500),
(2, 'Muscle-Building Exercises ', 'Train under our expert in-house muscle building training experts and gain the muscle tone you desire', 'Male', 'Saturday : 4.00pm-6.00pm ', 2000),
(3, 'Power Yoga ', 'Power Yoga to strengthen your core and rejuvenate your soul', 'Female', 'Wednesday\r\n4.00pm-6.00pm', 1200);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admin_confirmation` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `phone_no`, `email_id`, `gender`, `password`, `admin_confirmation`) VALUES
(1, 'Nusrat Mojumder', 1738451065, 'mojumdernusrat7@gmail.com', 'Gender', '123', 1),
(2, 'Nabid Alam', 1912094176, 'msa.nabid007@gmail.com', 'Male', '1234', 1),
(3, 'Nawshin Ahmed', 1716787678, 'nawshinahmed@gmail.com', 'Female', '123456', 1),
(4, 'Ridwana Karim', 1764667685, 'ridwanatuli@gmail.com', 'Female', '123456', 1),
(8, 'Natasha Tahsin Shorna', 1687876789, 'natasha@gmail.com', 'Female', '123', 1),
(9, 'Rakib Ahmed', 1734567879, 'rakib@yahoo.com', 'Male', '1234', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`registration_id`);

--
-- Indexes for table `member_query`
--
ALTER TABLE `member_query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `registration_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `member_query`
--
ALTER TABLE `member_query`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
