-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2024 at 08:12 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learnsync`
--

-- --------------------------------------------------------

--
-- Table structure for table `content_sharing`
--

CREATE TABLE `content_sharing` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `content_sharing`
--

INSERT INTO `content_sharing` (`id`, `username`, `description`, `type`, `address`) VALUES
(1, 'gamer', 'Engineering Quote....', 'photo', 'engineering-quotes-5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mod_reg`
--

CREATE TABLE `mod_reg` (
  `username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `contact` int(100) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mod_reg`
--

INSERT INTO `mod_reg` (`username`, `name`, `email`, `password`, `contact`, `birthday`, `gender`, `address`) VALUES
('test123', 'test', 'test@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 2147483647, '2001-03-21', 'Male', 'Fatorda');

-- --------------------------------------------------------

--
-- Table structure for table `notes_table`
--

CREATE TABLE `notes_table` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_title` varchar(60) NOT NULL,
  `description` varchar(200) NOT NULL,
  `subject` varchar(60) NOT NULL,
  `user_image` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes_table`
--

INSERT INTO `notes_table` (`id`, `username`, `user_title`, `description`, `subject`, `user_image`) VALUES
(1, 'test123', 'AI notes', '          These are AI notes', 'Artificial Intelligence', 'Research Doc (KS3).docx.pdf'),
(9, 'gamer', 'dsa', '          for begginers', 'FLAT', 'science6.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `contact` int(100) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`username`, `name`, `email`, `password`, `contact`, `birthday`, `gender`, `address`) VALUES
('aaron34', 'Aaron', 'test@gmail.com', '202cb962ac59075b964b07152d234b70', 2147483647, '2001-01-21', 'Male', 'Fatorda'),
('aaron3400', 'Aaron', 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 2147483647, '2001-09-21', 'Male', 'Fatorda'),
('gamer', 'FAHEEM THAKUR', 'faheem.thakur@gmaill.com', '900150983cd24fb0d6963f7d28e17f72', 2147483647, '2000-01-29', 'Male', 'abcd'),
('shub', 'Shubham Bhat', 'shubhambhatmargao@gmail.com', 'f899139df5e1059396431415e770c6dd', 2147483647, '2000-01-10', 'Male', 'A-20,Rainbow Villas, C.D countryside, Murida, Fatorda'),
('test123', 'test', 'test@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 2147483647, '2001-01-21', 'Male', 'Fatorda');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content_sharing`
--
ALTER TABLE `content_sharing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `mod_reg`
--
ALTER TABLE `mod_reg`
  ADD PRIMARY KEY (`username`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `notes_table`
--
ALTER TABLE `notes_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`username`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content_sharing`
--
ALTER TABLE `content_sharing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notes_table`
--
ALTER TABLE `notes_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `content_sharing`
--
ALTER TABLE `content_sharing`
  ADD CONSTRAINT `content_sharing_ibfk_1` FOREIGN KEY (`username`) REFERENCES `registration` (`username`);

--
-- Constraints for table `notes_table`
--
ALTER TABLE `notes_table`
  ADD CONSTRAINT `notes_table_ibfk_1` FOREIGN KEY (`username`) REFERENCES `registration` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
