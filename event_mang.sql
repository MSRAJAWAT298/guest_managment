-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2020 at 11:02 AM
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
-- Database: `event_mang`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_name` varchar(50) NOT NULL,
  `total_expensive` varchar(50) NOT NULL,
  `event_desc` varchar(1000) NOT NULL,
  `invited_person` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `status` enum('0','1') NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `event_name`, `total_expensive`, `event_desc`, `invited_person`, `date`, `status`, `event_id`) VALUES
(4, 1, 'weddings', '50000', 'India', '1000', '2020-07-10', '0', 0),
(5, 2, 'New year party', '100000', 'gwalior', '50', '2021-01-01', '1', 0),
(6, 1, 'Birtday party', '50000', 'Gwalior								', '20', '2020-06-23', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `event_list`
--

CREATE TABLE `event_list` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_list`
--

INSERT INTO `event_list` (`event_id`, `event_name`) VALUES
(1, 'Birtday party'),
(3, 'weddings'),
(4, 'New year party'),
(5, 'Wedding reception'),
(6, 'Retirement party'),
(7, 'Farewell party'),
(8, 'Freshers party'),
(9, 'Engagement ceremony');

-- --------------------------------------------------------

--
-- Table structure for table `gifts_receive`
--

CREATE TABLE `gifts_receive` (
  `id` int(11) NOT NULL,
  `event_id` varchar(50) NOT NULL,
  `gift_name` varchar(50) NOT NULL,
  `guest_address` varchar(500) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upadate_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `gift_given_by` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gifts_receive`
--

INSERT INTO `gifts_receive` (`id`, `event_id`, `gift_name`, `guest_address`, `date`, `upadate_date`, `gift_given_by`, `mobile`, `user_id`) VALUES
(2, '3', '500 Rs.', 'Gwalior', '2020-04-04 22:43:42', '2020-04-04 17:13:42', 'Pankaj', '7047353676', 1),
(3, '1', '1000 Rs.', 'Gwalior', '2020-04-04 22:53:07', '2020-04-04 17:23:07', 'Mayank', '7047353676', 1),
(4, '3', 'Gold chain', 'Gwalior', '2020-04-04 22:56:39', '2020-04-04 17:26:39', 'sachin', '8871155430', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gifts_sent`
--

CREATE TABLE `gifts_sent` (
  `id` int(11) NOT NULL,
  `event_id` varchar(50) NOT NULL,
  `gift_name` varchar(50) NOT NULL,
  `guest_address` varchar(500) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upadate_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `gift_given_by` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gifts_sent`
--

INSERT INTO `gifts_sent` (`id`, `event_id`, `gift_name`, `guest_address`, `date`, `upadate_date`, `gift_given_by`, `mobile`, `user_id`) VALUES
(2, '3', '500 Rs.', 'Gwalior', '2020-04-04 22:43:42', '2020-04-04 11:43:42', 'Pankaj', '7047353676', 1),
(3, '3', '500 Rs.', 'Gwalior', '2020-04-04 22:53:07', '2020-04-05 19:29:19', 'Pankaj', '7047353670', 1),
(4, '3', 'Gold chain', 'Gwalior', '2020-04-04 22:56:39', '2020-04-04 11:56:39', 'sachin', '8871155430', 1);

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(10) NOT NULL,
  `pic` varchar(100) DEFAULT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id`, `user_id`, `name`, `email`, `mobile`, `pic`, `address`) VALUES
(3, 1, 'Mayank ', NULL, '9988772233', NULL, 'Gwalior'),
(4, 2, 'Panakj', NULL, '7047353676', NULL, 'gwalior'),
(5, 1, 'Mayank singh kushwah', NULL, '9691011758', NULL, 'Guda Gudi Ka Naka Nadriya Ki Mata Road Pipari'),
(6, 1, 'mayank', NULL, '1234567890', NULL, 'Guda gudi ka naka nadriya ki mata road pipari lashkar Gwalior'),
(7, 1, 'Pankaj saini', NULL, '7047353676', NULL, 'Gwalior');

-- --------------------------------------------------------

--
-- Table structure for table `invition`
--

CREATE TABLE `invition` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `guest_name` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invition`
--

INSERT INTO `invition` (`id`, `user_id`, `event_name`, `guest_name`, `status`, `mobile`, `address`, `date`) VALUES
(2, 1, 'weddings', 'mayank', '1', '9691011758', 'Guda gudi ka naka nadriya ki mata road pipari lashkar Gwalior', '2020-10-10'),
(3, 1, 'weddings', 'Mayank singh kushwah', '0', '1234567890', 'Guda gudi ka naka nadriya ki mata road pipari lashkar Gwalior', '2020-10-10'),
(4, 1, 'New year party', 'Mayank singh kushwah', '0', '1234567890', 'Guda gudi ka naka nadriya ki mata road pipari lashkar Gwalior', '2021-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `password`) VALUES
(1, 'Mayank singh', 'msrajawat298@gmail.com', '7000636149', '123456'),
(2, 'Mayank singh kushwah', 'amanbaj1230@gmail.com', '7047353676', '33333');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_list`
--
ALTER TABLE `event_list`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `gifts_receive`
--
ALTER TABLE `gifts_receive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invition`
--
ALTER TABLE `invition`
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
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `event_list`
--
ALTER TABLE `event_list`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gifts_receive`
--
ALTER TABLE `gifts_receive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `invition`
--
ALTER TABLE `invition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
