-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4307
-- Generation Time: May 09, 2023 at 01:28 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `confirmpassword` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `confirmpassword`, `address`, `phone`, `dob`, `gender`) VALUES
(1, 'masu', 'masu@gmail.com', 'wA8LV6zT', '1122', 'nepal', '9841352894', '2023-03-01', 'male'),
(2, 'Daniels', '', 'tdyAYEkg', 'Daniels', 'Bafal', '9874561230', '2023-03-28', 'male'),
(3, 'sweekar', '', '0T69uSIz', '123', 'Bafal', '9874561234', '2023-03-01', 'female'),
(4, 'scfaca', '', '12344', '74851', 'sadaw', '7894561230', '2023-03-14', 'female'),
(5, 'amod', 'np03cs4s220027@heraldcollege.edu.np', 'ky39aFZ0', '1234', 'nepal', '9861889976', '2023-03-16', 'male'),
(6, 'anmol', '', 'anmol123', 'anmol123', 'baneshwor', '987665432', '2023-05-02', 'male'),
(7, 'masu', '', 'masu', 'masu', 'baneshwor', '1234567890', '2023-05-08', 'male'),
(8, 'masu', '', 'masu', 'masu', 'baneshwor', '1234567890', '2023-05-08', 'male'),
(9, 'admin', 'amod.pradhan1122@gmail.com', 'admin', 'admin', 'ktm', '9861889976', '2001-09-03', 'male'),
(10, 'doctor', 'doctor@gmail.com', 'doctor', 'doctor', 'kathmandu', '984135289', '2023-05-09', 'male'),
(11, 'Abhinav', 'niraulaabhinav@gmail.com', 'abhinav123', 'abhinav123', 'Jorpati', '9861607604', '2023-05-11', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_form`
--

CREATE TABLE `appointment_form` (
  `appointment_id` int(100) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `appointment_date` datetime(6) NOT NULL,
  `Symptoms` varchar(1000) DEFAULT NULL,
  `Tooth(Injured)` varchar(10000) DEFAULT NULL,
  `Diagnosis Report` longtext DEFAULT NULL,
  `Preferred_doctor` varchar(100) NOT NULL,
  `Doctor Assigned` varchar(100) DEFAULT NULL,
  `Status` varchar(100) NOT NULL,
  `Payment Status` varchar(100) DEFAULT NULL,
  `Fee` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment_form`
--

INSERT INTO `appointment_form` (`appointment_id`, `first_name`, `last_name`, `email`, `phone`, `appointment_date`, `Symptoms`, `Tooth(Injured)`, `Diagnosis Report`, `Preferred_doctor`, `Doctor Assigned`, `Status`, `Payment Status`, `Fee`) VALUES
(1, 'adawd', 'ada', 'np03cs4s220027@heraldcollege.edu.np', '12132', '2023-05-02 05:10:07.000000', NULL, NULL, NULL, '', NULL, 'booked', NULL, NULL),
(2, '', 'Ghimire', 'np03cs4s220027@heraldcollege.edu.np', '9841352894', '2023-05-11 14:40:00.000000', NULL, NULL, NULL, 'Dr. Shreeya Arya', NULL, 'booked', NULL, NULL),
(3, '', 'Thapa', 'np03cs4s220210@heraldcollege.edu.np', '99886785675674', '2023-05-31 11:51:00.000000', NULL, NULL, NULL, 'Dr. Kushal Bimb', NULL, 'booked', NULL, NULL),
(4, '', 'pradhan', 'np03cs4s220027@heraldcollege.edu.np', '', '2023-05-09 08:02:00.000000', NULL, NULL, NULL, 'Dr. Sama Pradhan', 'Dr. Sama Pradhan', 'booked', NULL, NULL),
(5, '', 'pradhan', 'np03cs4s220027@heraldcollege.edu.np', '9841352894', '2023-05-16 04:12:00.000000', NULL, NULL, NULL, 'Dr. Sama Pradhan', 'Dr. Shreeya Aryal', 'booked', NULL, NULL),
(6, '', 'him', 'np03cs4s220027@heraldcollege.edu.np', '', '2023-05-09 08:12:00.000000', NULL, NULL, NULL, 'Dr. Sama Pradhan', 'Dr. Saloni Shilpi', 'booked', NULL, NULL),
(7, '', 'Shrestha', 'np03cs4s220027@heraldcollege.edu.np', '9841352894', '2023-05-08 13:37:00.000000', NULL, NULL, NULL, 'Dr. Sama Pradhan', 'Dr.Kushal Bimb', 'booked', NULL, NULL),
(8, '', 'kc', 'np03cs4s220027@heraldcollege.edu.np', '9841352894', '2023-05-10 11:12:00.000000', NULL, NULL, NULL, 'Dr. Sama Pradhan', 'Dr.Sama Pradhan', 'booked', NULL, NULL),
(9, '', 'Pradhan', 'np03cs4s220027@heraldcollege.edu.np', '9841352894', '2023-05-09 13:37:00.000000', NULL, NULL, NULL, 'Dr. Sama Pradhan', 'Dr.Saloni Shilpi', 'booked', NULL, NULL),
(10, '', 'xota', 'niraulaabhinav@gmail.com', '', '2023-05-08 20:28:00.000000', NULL, NULL, NULL, 'Dr. Kushal Bimb', 'Dr.Shreeya Aryal ', 'booked', NULL, NULL),
(11, '', 'gautam', 'gautamsunil917@gmail.com', '9841352894', '2023-05-09 14:34:00.000000', NULL, NULL, NULL, 'Dr. Sama Pradhan', NULL, 'booked', NULL, NULL),
(12, 'Amod', 'Pradhan', 'np03cs4s220027@heraldcollege.edu.np', '9841453845', '2023-05-26 16:22:00.000000', NULL, NULL, NULL, '', NULL, 'booked', NULL, NULL),
(13, 'Amod', 'him', 'amod.pradhan1122@gmail.com', '9861889976', '2023-05-20 08:25:00.000000', NULL, NULL, NULL, '', NULL, 'booked', NULL, NULL),
(14, 'Amod', 'Pradhan', 'shahidoma3@gmail.com', '1312313', '2023-05-24 00:00:00.000000', NULL, NULL, NULL, '', NULL, 'booked', NULL, NULL),
(15, 'him', 'him', 'np03cs4s220027@heraldcollege.edu.np', '9861889976', '2023-05-18 16:47:00.000000', NULL, NULL, NULL, 'Dr. Sama Pradhan', NULL, 'booked', NULL, NULL),
(16, 'ahsavxka', 'pradhan', 'np03cs4s220027@heraldcollege.edu.np', '9861889976', '2023-05-16 00:00:00.000000', NULL, NULL, NULL, 'Dr. Saloni Shilphi', NULL, 'booked', NULL, NULL),
(17, 'Amod', 'pradhan', 'amod.pradhan1122@gmail.com', '9861889976', '2023-05-09 21:55:00.000000', NULL, NULL, NULL, 'Dr. Sama Pradhan', NULL, 'booked', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(255) NOT NULL,
  `user_name` varchar(225) NOT NULL,
  `user_rating` int(50) NOT NULL,
  `user_review` varchar(225) NOT NULL,
  `datetime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`review_id`, `user_name`, `user_rating`, `user_review`, `datetime`) VALUES
(1, 'asda', 4, 'jhgig', '0000-00-00'),
(2, 'pradhanaacaa', 4, 'sabawas', '0000-00-00'),
(3, 'pradhanaacaa', 4, 'sabawas', '0000-00-00'),
(4, 'ramu', 5, 'hiiiiii', '0000-00-00'),
(5, 'ramu', 5, 'hiiiiii', '2023-04-30'),
(6, 'abhinav', 4, 'hello ahsdoua', '2023-04-30'),
(7, 'nick', 4, 'asfavawva', '2023-04-30'),
(8, 'dikesh', 2, 'skdhpaheva', '2023-04-30'),
(9, 'dikesh', 2, 'skdhpaheva', '2023-04-30'),
(10, 'sdafa', 1, 'sa;khd[ahn', '2023-04-30'),
(11, 'sdafa', 5, 'sa;khd[ahn', '2023-04-30'),
(12, 'anil', 2, 'asgdoacawcav', '2023-04-30'),
(13, 'jubin', 4, 'hello', '2023-04-30'),
(14, 'ramchadra', 5, 'jayshreeram', '2023-05-01'),
(15, 'chandra', 5, 'pradhan', '2023-05-01'),
(16, 'asda', 5, 'wdadwadawd', '2023-05-01'),
(17, 'britika', 4, 'sdavaadkasfpawd', '2023-05-01'),
(18, 'britika', 4, 'sdavaadkasfpawd', '2023-05-01'),
(19, 'britika', 5, 'aknapdnapwdnawd', '2023-05-01'),
(20, 'amid', 4, 'askdapwd', '2023-05-01'),
(21, 'amod', 2, 'khai ta', '2023-05-02'),
(22, 'babu', 5, 'nanu', '2023-05-03'),
(23, 'mukesh', 1, 'mera naam mukesh haii\n', '2023-05-03'),
(24, 'kaji', 1, 'kaji paji', '2023-05-03'),
(25, 'paji', 3, 'kajivai', '2023-05-03'),
(26, 'britika', 3, 'thikai xa vanum', '2023-05-03'),
(27, 'amod', 5, 'nice one', '2023-05-03'),
(28, 'kali', 1, 'ok', '2023-05-03'),
(29, 'masu', 1, 'k xa dost', '2023-05-08'),
(30, 'Someone', 3, 'Decent', '2023-05-08'),
(31, 'Abhinav Niraula', 4, 'quite friendly in nature', '2023-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `review_table1`
--

CREATE TABLE `review_table1` (
  `review_id` int(225) NOT NULL,
  `user_name` varchar(225) NOT NULL,
  `user_rating` int(50) NOT NULL,
  `user_review` varchar(225) NOT NULL,
  `datetime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `review_table1`
--

INSERT INTO `review_table1` (`review_id`, `user_name`, `user_rating`, `user_review`, `datetime`) VALUES
(1, 'abhaeflujgauosj', 4, 'asjhdaipwhd', '2023-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `review_table2`
--

CREATE TABLE `review_table2` (
  `review_id` int(225) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_rating` int(50) NOT NULL,
  `user_review` varchar(225) NOT NULL,
  `datetime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `review_table2`
--

INSERT INTO `review_table2` (`review_id`, `user_name`, `user_rating`, `user_review`, `datetime`) VALUES
(1, 'mani', 1, 'thikai xa', '2023-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `review_table3`
--

CREATE TABLE `review_table3` (
  `review_id` int(225) NOT NULL,
  `user_name` varchar(225) NOT NULL,
  `user_rating` int(50) NOT NULL,
  `user_review` varchar(225) NOT NULL,
  `datetime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `review_table3`
--

INSERT INTO `review_table3` (`review_id`, `user_name`, `user_rating`, `user_review`, `datetime`) VALUES
(1, 'aiwhdaw', 1, 'asdljhawd', '2023-05-05'),
(2, 'Jubin', 3, 'Good', '2023-05-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment_form`
--
ALTER TABLE `appointment_form`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `review_table1`
--
ALTER TABLE `review_table1`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `review_table2`
--
ALTER TABLE `review_table2`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `review_table3`
--
ALTER TABLE `review_table3`
  ADD PRIMARY KEY (`review_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `appointment_form`
--
ALTER TABLE `appointment_form`
  MODIFY `appointment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `review_table1`
--
ALTER TABLE `review_table1`
  MODIFY `review_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `review_table2`
--
ALTER TABLE `review_table2`
  MODIFY `review_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `review_table3`
--
ALTER TABLE `review_table3`
  MODIFY `review_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
