-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 13, 2018 at 05:44 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `animal_master`
--

CREATE TABLE `animal_master` (
  `id` int(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `type_id` varchar(20) NOT NULL,
  `age` varchar(10) NOT NULL,
  `diet` varchar(30) NOT NULL,
  `zoo_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animal_master`
--

INSERT INTO `animal_master` (`id`, `name`, `type_id`, `age`, `diet`, `zoo_id`) VALUES
(11, 'jkkkkkkk', '2', '4', 'kkkkkkkkk', 4),
(12, 'tttttt', '1', '6', 'ttt', 4),
(13, 'fjhj', '2', '50', 'hfffhh', 4),
(14, 'Black Bear', '1', '50', 'grass', 4),
(15, 'Deer', '1', '30', 'grass', 1),
(16, 'Tiger', '1', '21', 'beef', 6),
(18, 'asdfksj', '1', 'sadas', 'sadas', 1),
(19, 'fgfd', '2', '10', 'sdfs', 4),
(20, 'Tiger', '1', '20', 'Beef', 6),
(21, 'Bear', '1', '40', 'grass', 6),
(22, 'Deer', '1', '20', 'green grass', 7),
(23, 'Deer', '1', '30', 'grass', 8),
(24, 'lion', '1', '30', 'Beef', 8),
(25, 'peacoak', '1', '40', 'wheat', 8),
(26, 'Tiger', '1', '51', 'Beef', 8),
(27, 'dasd', '1', '48', 'xfsdf', 8);

-- --------------------------------------------------------

--
-- Table structure for table `animal_type`
--

CREATE TABLE `animal_type` (
  `id` int(10) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animal_type`
--

INSERT INTO `animal_type` (`id`, `type`) VALUES
(1, 'wild'),
(2, 'water');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `id` int(20) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `zip_code` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`id`, `fname`, `lname`, `email`, `address`, `zip_code`, `role`, `phone_no`, `password`, `status`) VALUES
(5, 'Shubham', 'Rana', 'shubhamrana@gmail.com', 'Nagrota, Kangra', '176001', 'Worker', '8888999921', '111', 1),
(12, 'Abhinav', 'Shah', 'abhinavkumar1136@gmail.com', 'Kangra HP', '176001', 'admin', '8366372828', '111', 1),
(13, 'Munish', 'Kumar', 'munish@gmail.com', 'Naduan Kangra', '176001', 'manager', '1234665533', '111', 1),
(19, 'Rahul', ' Choudhary', 'rahul123@gmail.com', 'jwalamuki, Kangra', '176001', 'manager', '2222222222', '111', 1),
(20, 'Rohan', 'Kumar', 'rohan@gmail.com', 'Kangra Himachal perdesh', '176001', 'manager', '8899776655', '111', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_zoo_map`
--

CREATE TABLE `user_zoo_map` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `zoo_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_zoo_map`
--

INSERT INTO `user_zoo_map` (`id`, `user_id`, `zoo_id`) VALUES
(13, 5, 1),
(14, 7, 4),
(15, 12, 5),
(17, 12, 6),
(18, 13, 6),
(19, 13, 4),
(20, 17, 1),
(21, 12, 7),
(22, 20, 8),
(23, 13, 7),
(24, 13, 6),
(25, 20, 8),
(26, 19, 9);

-- --------------------------------------------------------

--
-- Table structure for table `zoo_master`
--

CREATE TABLE `zoo_master` (
  `id` int(20) NOT NULL,
  `zoo_name` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zoo_master`
--

INSERT INTO `zoo_master` (`id`, `zoo_name`, `address`) VALUES
(6, 'Dharamshala1', 'Kangra Dharamshala'),
(7, 'KangraMain', 'Kangra Himachal perdesh'),
(8, 'Palampur', 'palampur Kangra'),
(9, 'Punjab', 'sdfkcjsldk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal_master`
--
ALTER TABLE `animal_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `animal_type`
--
ALTER TABLE `animal_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_zoo_map`
--
ALTER TABLE `user_zoo_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zoo_master`
--
ALTER TABLE `zoo_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal_master`
--
ALTER TABLE `animal_master`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `animal_type`
--
ALTER TABLE `animal_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `user_zoo_map`
--
ALTER TABLE `user_zoo_map`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `zoo_master`
--
ALTER TABLE `zoo_master`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
