-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 09, 2022 at 11:40 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dkareer01`
--

-- --------------------------------------------------------

--
-- Table structure for table `lecturer_schedule`
--

CREATE TABLE `lecturer_schedule` (
  `schedule_id` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `duration` varchar(10) NOT NULL,
  `booked_notbooked` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturer_schedule`
--

INSERT INTO `lecturer_schedule` (`schedule_id`, `lecturer_id`, `appointment_date`, `appointment_time`, `duration`, `booked_notbooked`) VALUES
(1, 1, '2022-03-18', '09:00:00', '30 minutes', 'True'),
(2, 2, '2022-03-21', '09:00:00', '30 minutes', 'True'),
(3, 1, '2022-03-18', '09:30:00', '15 minutes', 'False'),
(4, 2, '2022-03-21', '10:00:00', '30 minutes', 'True'),
(5, 1, '2022-03-18', '10:00:00', '30 minutes', 'True'),
(6, 3, '2022-03-22', '10:00:00', '30 minutes', 'False'),
(7, 2, '2022-03-22', '10:00:00', '30 minutes', 'False'),
(8, 3, '2022-03-23', '09:00:00', '30 minutes', 'True'),
(9, 1, '2022-03-21', '10:00:00', '30 minutes', 'False'),
(10, 1, '2022-03-21', '10:30:00', '30 minutes', 'True'),
(11, 1, '2022-03-23', '09:00:00', '15 minutes', 'False'),
(12, 1, '2022-03-23', '09:30:00', '30 minutes', 'False'),
(13, 4, '2022-05-11', '12:00:00', '30 minutes', 'True'),
(14, 4, '2022-05-11', '12:30:00', '30 minutes', 'False'),
(15, 4, '2022-05-11', '13:00:00', '30 minutes', 'True'),
(16, 6, '2022-05-13', '10:00:00', '30 minutes', 'False');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lecturer_schedule`
--
ALTER TABLE `lecturer_schedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `lecturer_id` (`lecturer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lecturer_schedule`
--
ALTER TABLE `lecturer_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lecturer_schedule`
--
ALTER TABLE `lecturer_schedule`
  ADD CONSTRAINT `lecturer_schedule_ibfk_1` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturer` (`lecturer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
