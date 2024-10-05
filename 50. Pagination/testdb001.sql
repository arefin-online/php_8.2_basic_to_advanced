-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 31, 2023 at 03:15 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testdb001`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstname`, `lastname`, `email`) VALUES
(1, 'Smith', 'Johnson', 'smith@example.com'),
(2, 'Ricardo', 'Andrews', 'ricardo@example.com'),
(3, 'Daniel', 'Hanna', 'daniel@example.com'),
(4, 'James', 'Gamble', 'james@example.com'),
(5, 'Ray', 'Johnson', 'ray@example.com'),
(6, 'Max', 'Swift', 'max@example.com'),
(7, 'Jessica', 'Bushman', 'jessica@example.com'),
(8, 'Bryan', 'Ruiz', 'bryan@example.com'),
(9, 'Alton', 'Williams', 'alton@example.com'),
(10, 'John', 'Pitts', 'john@example.com'),
(11, 'Elias', 'Roth', 'elias@example.com'),
(12, 'Alfie', 'Tucker', 'alfie@example.com'),
(13, 'Jordan', 'Barker', 'jordan@example.com'),
(14, 'Joel', 'Simmons', 'joel@example.com'),
(15, 'Tom', 'Bradshaw', 'tom@example.com'),
(16, 'Luke', 'Patterson', 'luke@example.com'),
(17, 'Lewis', 'Noble', 'lewis@example.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
