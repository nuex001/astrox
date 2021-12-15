-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2021 at 09:45 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `astrofx`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id` int(255) NOT NULL,
  `paypal` varchar(255) NOT NULL,
  `cashApp` varchar(255) NOT NULL,
  `bitcoin` varchar(255) NOT NULL,
  `etherum` varchar(255) NOT NULL,
  `litcoin` varchar(255) NOT NULL,
  `Amount` int(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNum` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `radio_selection` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `course`, `email`, `phoneNum`, `country`, `message`, `radio_selection`, `password`, `created_at`) VALUES
(1, 'Ani Stephen 1', '', 'makuochukwu042@gmail.com', '09024452025', '', 'this is header for index', 'email', '', '2021-10-17 20:58:29.267033'),
(2, 'Ani stephen 2', 'In Person', 'a@gmail.com', '090989098909890', 'United Kingdom', '', '', '', '2021-10-17 20:58:29.267033'),
(3, 'Ani Stephen 3', 'In Person', 'makuo@gmail.com', '09024452025', 'United Kingdom', 'sghsjsjjkm', 'email', '', '2021-10-17 20:58:29.267033'),
(5, 'Ani Stephen 4', 'Group Course', 'aaa@gmail.com', '0909875567890987', 'Turks and Caicos Islands', 'xcvbn  bvc', '2', '', '2021-10-17 20:58:29.267033'),
(6, 'Ani Stephen 5', 'Online Course', 'a@gmail.com', '', 'United Kingdom', 'oiuytetyu', 'email', 'secret', '2021-10-20 01:30:58.148111'),
(7, 'Ani Stephen 6', 'Fundamental course', 's@gmail.com', '', 'United Kingdom', 'ujzxilkxol', 'telephone', '', '2021-10-17 20:58:29.267033');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
