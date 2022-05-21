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
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `student_id` int(11) NOT NULL,
  `student_first_name` varchar(100) NOT NULL,
  `student_last_name` varchar(100) NOT NULL,
  `student_username` varchar(20) NOT NULL,
  `student_password` varchar(255) NOT NULL,
  `student_email_address` varchar(200) NOT NULL,
  `student_contact_number` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`student_id`, `student_first_name`, `student_last_name`, `student_username`, `student_password`, `student_email_address`, `student_contact_number`) VALUES
(1, 'Timmy', 'Turner', 'tturner', '$2y$10$0HzsCbo6ocudZhiwwkJPZ.Dh2iTx5GMaBzt2GpKSNFgLRn4MYbI5u', 'tturner01@qub.ac.uk', '07775601254'),
(2, 'Mary', 'Patterson', 'mpatterson', '$2y$10$4GWuSV/lutp41N0JplCKVuVuVhpiAE7cRfwgfMMo5RW693MNU8olq', 'mpatterson07@qub.ac.uk', '02890209343'),
(3, 'Claire ', 'Stewart', 'cstewart', '$2y$10$7O3kvm0DKt9oS.Sgs71uiePLJyiuEPn0QRr0KTomZuW5MgHoPbINO', 'cstewart09@qub.ac.uk', '07752239012'),
(4, 'Neil', 'Bell', 'nbell', '$2y$10$xfbxz.F7UOHqeBd1h9059OpchlvJnAKDwHQwR0xpgX/imhbBmUt3K', 'nbell04@qub.ac.uk', '07968921555');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
