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
-- Table structure for table `appointment_bookings`
--

CREATE TABLE `appointment_bookings` (
  `appointment_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment_bookings`
--

INSERT INTO `appointment_bookings` (`appointment_id`, `student_id`, `schedule_id`) VALUES
(1, 1, 1),
(2, 2, 5),
(3, 1, 4),
(4, 1, 8),
(5, 2, 2),
(6, 3, 13),
(7, 2, 15),
(8, 4, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment_bookings`
--
ALTER TABLE `appointment_bookings`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `schedule_id` (`schedule_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment_bookings`
--
ALTER TABLE `appointment_bookings`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment_bookings`
--
ALTER TABLE `appointment_bookings`
  ADD CONSTRAINT `appointment_bookings_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student_details` (`student_id`),
  ADD CONSTRAINT `appointment_bookings_ibfk_3` FOREIGN KEY (`schedule_id`) REFERENCES `lecturer_schedule` (`schedule_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
