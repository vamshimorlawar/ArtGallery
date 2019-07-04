-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2017 at 05:28 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artgallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'default',
  `bio` text NOT NULL,
  `gender` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `pinterest` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`id`, `email`, `password`, `fullname`, `username`, `avatar`, `bio`, `gender`, `country`, `facebook`, `twitter`, `pinterest`) VALUES
(1, 'thetechnolover7@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Piyush Bendale', 'admin', 'default', '', 'M', 'India', 'Sample', 'PIyushVB7399', 'PIyushVB7399');

-- --------------------------------------------------------

--
-- Table structure for table `arts`
--

CREATE TABLE `arts` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `artistid` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `arts`
--

INSERT INTO `arts` (`id`, `image`, `alt`, `artistid`, `price`, `description`) VALUES
(1, '1', 'Dancing Colors', 0, 39, 'Renaissance painter, scientist, inventor, and more. Da Vinci is one of most famous painters.'),
(2, '2', 'Fluid Paint', 0, 39, 'Renaissance painter, scientist, inventor, and more. Da Vinci is one of most famous painters.'),
(3, '3', 'Fluid Paint', 0, 39, 'Renaissance painter, scientist, inventor, and more. Da Vinci is one of most famous painters.'),
(4, '1', 'Dancing Colors', 0, 39, 'Renaissance painter, scientist, inventor, and more. Da Vinci is one of most famous painters.'),
(5, '2', 'Fluid Paint', 0, 39, 'Renaissance painter, scientist, inventor, and more. Da Vinci is one of most famous painters.'),
(6, '1', 'Fluid Paint', 0, 39, 'Renaissance painter, scientist, inventor, and more. Da Vinci is one of most famous painters.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arts`
--
ALTER TABLE `arts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `arts`
--
ALTER TABLE `arts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
