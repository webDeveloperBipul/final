-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2019 at 03:50 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `torun`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_member_form_data`
--

CREATE TABLE `all_member_form_data` (
  `id` int(10) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `loan_date` varchar(20) NOT NULL,
  `phone_no` varchar(11) NOT NULL,
  `profesion` varchar(50) NOT NULL,
  `refer_name` varchar(100) NOT NULL,
  `refer_addr` varchar(100) NOT NULL,
  `refer_phone` varchar(11) NOT NULL,
  `about_work` varchar(100) NOT NULL,
  `present_addr` varchar(200) NOT NULL,
  `details` varchar(200) NOT NULL,
  `permanent_addr` int(200) NOT NULL,
  `loan_sirial` int(20) NOT NULL,
  `loan_amount` varchar(20) NOT NULL,
  `profit_amount` int(20) NOT NULL,
  `total_amount` int(20) NOT NULL,
  `premier` int(12) NOT NULL,
  `nid` int(30) NOT NULL,
  `add_cost` int(12) NOT NULL,
  `others_cost` int(12) NOT NULL,
  `premier_amount` int(20) NOT NULL,
  `savings_amount` int(20) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_member_form_data`
--

INSERT INTO `all_member_form_data` (`id`, `m_name`, `f_name`, `loan_date`, `phone_no`, `profesion`, `refer_name`, `refer_addr`, `refer_phone`, `about_work`, `present_addr`, `details`, `permanent_addr`, `loan_sirial`, `loan_amount`, `profit_amount`, `total_amount`, `premier`, `nid`, `add_cost`, `others_cost`, `premier_amount`, `savings_amount`, `image`) VALUES
(327, 'a', 'a', '06-11-2019', 'a', 'a', '', '', '', '', '', '', 0, 0, '1', 1, 2, 0, 14, 0, 0, 0, 0, ''),
(328, 'a', 'a', '25-11-2019', 'a', 'a', '', '', '', '', '', '', 0, 0, '20', 14, 34, 0, 0, 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `comity`
--

CREATE TABLE `comity` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `others_info` varchar(200) NOT NULL,
  `podobi` varchar(100) NOT NULL,
  `savings` int(12) NOT NULL,
  `image` varchar(100) NOT NULL,
  `date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comity`
--

INSERT INTO `comity` (`id`, `name`, `f_name`, `phone`, `address`, `others_info`, `podobi`, `savings`, `image`, `date`) VALUES
(1, '011', '11', '1', '11', '                        ', '00', 11, 'Lighthouse.jpg', '29-11-2019');

-- --------------------------------------------------------

--
-- Table structure for table `comity_data`
--

CREATE TABLE `comity_data` (
  `id` int(11) NOT NULL,
  `date` varchar(11) NOT NULL,
  `savings` int(12) NOT NULL,
  `others_fee` int(12) NOT NULL,
  `current_id` int(100) NOT NULL,
  `others_info` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comity_data`
--

INSERT INTO `comity_data` (`id`, `date`, `savings`, `others_fee`, `current_id`, `others_info`) VALUES
(1, '05-11-2019', 20, 1010, 1, ''),
(2, '04-11-2019', 100, 10, 1, ''),
(3, '06-11-2019', 10000, 500, 1, ''),
(4, '06-11-2019', 10, 10, 1, ''),
(5, '06-11-2019', 1, 100, 1, ''),
(6, '07-11-2019', 40, 10, 1, ''),
(7, '06-11-2019', 10, 410, 1, ''),
(8, '07-11-2019', 10, 10, 1, ''),
(9, '11/07/2019', 21, 24, 1, ''),
(10, '11/09/2019', 210, 10, 1, ''),
(11, '10/10/2019', 1, 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `member_premier_data`
--

CREATE TABLE `member_premier_data` (
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `id` int(100) NOT NULL,
  `premier_date` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `test` varchar(100) NOT NULL,
  `joma` int(100) NOT NULL,
  `current_id` int(10) NOT NULL,
  `savings` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_premier_data`
--

INSERT INTO `member_premier_data` (`first_name`, `last_name`, `id`, `premier_date`, `name`, `test`, `joma`, `current_id`, `savings`) VALUES
('', '', 93, '05-11-2019', 'a', '', 5420, 328, 240),
('', '', 94, '14-11-2019', 'a', '', 10, 327, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`) VALUES
(1, 'a', 'a', 'a', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_member_form_data`
--
ALTER TABLE `all_member_form_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comity`
--
ALTER TABLE `comity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comity_data`
--
ALTER TABLE `comity_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_premier_data`
--
ALTER TABLE `member_premier_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_member_form_data`
--
ALTER TABLE `all_member_form_data`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;

--
-- AUTO_INCREMENT for table `comity`
--
ALTER TABLE `comity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comity_data`
--
ALTER TABLE `comity_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `member_premier_data`
--
ALTER TABLE `member_premier_data`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
