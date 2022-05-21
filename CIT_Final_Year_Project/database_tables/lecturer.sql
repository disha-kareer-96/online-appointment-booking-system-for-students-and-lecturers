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
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `lecturer_id` int(11) NOT NULL,
  `lecturer_first_name` varchar(100) NOT NULL,
  `lecturer_last_name` varchar(100) NOT NULL,
  `lecturer_username` varchar(20) NOT NULL,
  `lecturer_password` varchar(255) NOT NULL,
  `lecturer_email_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`lecturer_id`, `lecturer_first_name`, `lecturer_last_name`, `lecturer_username`, `lecturer_password`, `lecturer_email_address`) VALUES
(1, 'Bert', 'Wilson', 'bwilson', '$2y$10$1f0LGwhI6Y/a/nlQLpwHdOuv4J5TRS1N8m8GGQj3P3aSpzy1M4D/G', 'bwilson01@qub.ac.uk'),
(2, 'Sarah', 'Smith', 'ssmith', '$2y$10$uxTFHr0MxZMjR8OWRrsFI.U7Yk62h2fNFrTxGSYSNp8zE7ZYDTWom', 'ssmith03@qub.ac.uk'),
(3, 'Sarah', 'Wilson', 'swilson', '$2y$10$o0hEK.vrgwsSUFvBf6XO/.T3tCAV01P/d2zSqQnGf6mN22hO1Fshq', 'swilson05@qub.ac.uk'),
(4, 'David', 'Cutting', 'dcutting', '$2y$10$tKu4U09q7xh093cq0pSP8OiN2/M2cqui0HjSfXLQh4bBs7pe5J.em', 'dcutting07@qub.ac.uk'),
(6, 'Peter', 'Burns', 'pburns', '$2y$10$QtmhpQ2f5zb.9ufH/mG0bOZnLG.XwoUhnYuepz7uf7g1yRG4bj29a', 'pburns09@qub.ac.uk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`lecturer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lecturer`
--
ALTER TABLE `lecturer`
  MODIFY `lecturer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
