-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2024 at 02:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `roll` varchar(15) DEFAULT NULL,
  `class` varchar(10) NOT NULL,
  `city` varchar(15) NOT NULL,
  `pcontact` varchar(11) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `name`, `roll`, `class`, `city`, `pcontact`, `photo`, `datetime`, `status`) VALUES
(1, 'dex timoteo', '2024-G10-001', '10th', 'taguig city', '09517272531', '2024-G10-0012024-12-14-10-10-37.jpg', '2024-12-14 09:10:37', 'pending'),
(2, 'dex timoteo', '2024-G9-001', '9th', 'taguig city', '09517272531', '2024-G9-0012024-12-14-10-11-19.jpg', '2024-12-14 09:11:19', 'pending'),
(3, 'EGINA', '2024-G10-002', '10th', 'taguig city', '09517272521', '2024-G10-0022024-12-14-16-57-57.jpg', '2024-12-14 15:57:57', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `status` varchar(12) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `photo`, `status`, `datetime`) VALUES
(1, 'danmichaelentiq', 'danmichaelantiquina9@gmail.com', 'danmichael', '3d529593b142fce6998d081c7ea3174ef2fe3c60', 'danmichael.png', 'Active', '2024-12-08 12:43:50'),
(2, 'john carlo dote', 'dotelangmalakas@gmail.com', 'dotelang', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'dotelang.png', 'Inactive', '2024-12-08 12:47:05'),
(3, 'leoereno', 'leoerenol09@gmail.com', 'leoerenous', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'leoerenous.png', 'Inactive', '2024-12-09 07:19:20'),
(4, 'leoereno09', 'leoerenol08@gmail.com', 'leoereno08', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'leoereno08.jpg', 'Inactive', '2024-12-14 16:04:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roll` (`roll`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
