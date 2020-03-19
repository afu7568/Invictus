-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 19, 2020 at 12:52 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devota`
--

-- --------------------------------------------------------

--
-- Table structure for table `resident`
--

CREATE TABLE `resident` (
  `residentID` int(6) NOT NULL,
  `resthomeID` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `latCord` float NOT NULL,
  `lonCord` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resident`
--

INSERT INTO `resident` (`residentID`, `resthomeID`, `name`, `latCord`, `lonCord`) VALUES
(1, 1, 'Alan DumbDumb', 70, 70.01),
(2, 1, 'Jordan BigBrain', 70.01, 70),
(3, 2, 'steven', -70, -70.01),
(4, 2, 'omri', -70.01, -70);

-- --------------------------------------------------------

--
-- Table structure for table `resthome`
--

CREATE TABLE `resthome` (
  `userID` int(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(300) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `latCord` float NOT NULL,
  `lonCord` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resthome`
--

INSERT INTO `resthome` (`userID`, `username`, `password`, `admin`, `latCord`, `lonCord`) VALUES
(1, 'user', '$2y$10$d.9YvU8YpYFrbhSW1Nw9MOq4i8QkymDfAgygkw9KwBDD1CJbJH5yO', 0, 70, 70),
(2, 'admin', '$2y$10$pctWvPYkMkHlNPgaoPhGs.Csh83SwSgShPfuxZFGGj4lpVfieOHNm', 1, -70, -70);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `resident`
--
ALTER TABLE `resident`
  ADD PRIMARY KEY (`residentID`);

--
-- Indexes for table `resthome`
--
ALTER TABLE `resthome`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `resident`
--
ALTER TABLE `resident`
  MODIFY `residentID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `resthome`
--
ALTER TABLE `resthome`
  MODIFY `userID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
