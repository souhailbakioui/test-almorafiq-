-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2021 at 07:49 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test2`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `nom` varchar(15) DEFAULT NULL,
  `prenom` varchar(15) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  INSERT INTO `student` (`id`, `nom`, `prenom`, `gender`, `age`) VALUES
(2, 'Dr. Elinore Hudson IV', 'Mr. Carson Koss', 'masculine', 18),
(3, 'Nick Kling', 'Casimir Turcotte', 'masculine', 19),
(4, 'Mrs. Matilda Brekke Jr.', 'Kay Brekke', 'masculine', 20),
(5, 'Dr. Mathew Green III', 'Geovanni Stracke', 'masculine', 15),
(6, 'Dan Windler', 'Jaylon Hartmann I', 'masculine', 17),
(7, 'Prof. Gudrun Lehner', 'Prof. Oma Sporer DVM', 'masculine', 17),
(8, 'Jared Price Jr.', 'Kraig Ankunding', 'masculine', 16),
(9, 'Karlee Morar I', 'Prof. Maude Hudson II', 'masculine', 18),
(10, 'Mr. Waylon Johns III', 'Mr. Isaac Fritsch', 'masculine', 18);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
