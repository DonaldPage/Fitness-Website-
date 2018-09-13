-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2017 at 11:11 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitnessv3`
--

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` int(11) NOT NULL,
  `Username` varchar(15) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `UserLevel` int(1) NOT NULL,
  `Forename` varchar(20) NOT NULL,
  `Surname` varchar(20) NOT NULL,
  `User_image` varchar(30) DEFAULT NULL,
  `Location` varchar(20) NOT NULL,
  `SpecialtyOne` varchar(20) NOT NULL,
  `SpecialtyTwo` int(11) DEFAULT NULL,
  `SpecialtyThree` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `Username`, `Password`, `UserLevel`, `Forename`, `Surname`, `User_image`, `Location`, `SpecialtyOne`, `SpecialtyTwo`, `SpecialtyThree`) VALUES
(1, 'ChrisFoyers06', '1234', 2, 'Chris', 'Foyers', NULL, 'Bideford', 'Tone Up', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `Caption` varchar(25) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `Filename` varchar(25) NOT NULL,
  `Alternate_text` varchar(40) DEFAULT NULL,
  `Description` varchar(250) DEFAULT NULL,
  `Date` varchar(50) NOT NULL,
  `Type` varchar(12) NOT NULL,
  `Size` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `Caption`, `UserID`, `Filename`, `Alternate_text`, `Description`, `Date`, `Type`, `Size`) VALUES
(25, 'Caption', 18, 'IMG_20160104_172245.jpg', 'Alt text', '', '2017-04-15', 'image/jpeg', 2513043),
(26, 'Caption', 18, 'IMG_20160325_171032.jpg', 'Alt text', '', '2017-04-25', 'image/jpeg', 1769804),
(27, 'Caption', 1, 'IMG_20160330_144220.jpg', 'Alt text', '', '2017-04-25', 'image/jpeg', 1406150);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Username` varchar(12) NOT NULL,
  `UserLevel` int(1) NOT NULL,
  `Forename` varchar(20) NOT NULL,
  `Surname` varchar(20) NOT NULL,
  `User_image` varchar(30) DEFAULT NULL,
  `Password` varchar(500) NOT NULL,
  `DoB` date NOT NULL,
  `Height` varchar(5) NOT NULL,
  `Weight` varchar(5) NOT NULL,
  `BMI` varchar(20) NOT NULL,
  `Goal` varchar(20) NOT NULL,
  `Location` varchar(15) NOT NULL,
  `InstructorID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Username`, `UserLevel`, `Forename`, `Surname`, `User_image`, `Password`, `DoB`, `Height`, `Weight`, `BMI`, `Goal`, `Location`, `InstructorID`) VALUES
(18, 'DrumMunky78', 1, 'Donald', 'Page', 'iphone pix 004.JPG', '1234', '1978-08-23', '6ft3', '95kg', '123', 'Weight Loss', 'Barnstaple', 1),
(19, 'LukeShen', 1, 'Luke', 'Shenton', 'luke.jpeg', '1234', '2017-04-12', '6ft2', '82kg', '123', 'Tone Up', 'Comb Martin', NULL),
(20, 'Megan84', 1, 'Megan', 'Page', 'Meg.jpg-large', '1234', '1984-07-14', '5ft5', '75kg', '123', 'Tone Up', 'Barnstaple', 1),
(26, 'bboxy', 1, 'Ian', 'Boxell', '', '1234', '1983-06-15', '1.85', '90', '26.3', 'Weight Loss', 'Barnstaple', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `workouts`
--

CREATE TABLE `workouts` (
  `id` int(11) NOT NULL,
  `Name` varchar(15) NOT NULL,
  `pdfLocation` varchar(25) NOT NULL,
  `WeightLoss` tinyint(1) NOT NULL,
  `Cardio` tinyint(1) NOT NULL,
  `WeightGain` tinyint(1) NOT NULL,
  `Location` varchar(7) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workouts`
--
ALTER TABLE `workouts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `workouts`
--
ALTER TABLE `workouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
