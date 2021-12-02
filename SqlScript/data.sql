-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 02, 2021 at 10:37 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dating`
--
CREATE DATABASE IF NOT EXISTS `dating` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dating`;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `FirstName` varchar(30) DEFAULT NULL,
  `LastName` varchar(30) DEFAULT NULL,
  `City` varchar(15) DEFAULT NULL,
  `Age` varchar(10) NOT NULL,
  `Sex` varchar(6) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `AboutMe` text NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `Email`, `FirstName`, `LastName`, `City`, `Age`, `Sex`, `DateOfBirth`, `AboutMe`, `Password`) VALUES
(1, 'anuj161996@gmail.com', 'Anuj', 'Narang', 'Montreal', '25', 'Male', '1996-09-16', 'Hello There i am using Dating', 'Admin@123'),
(2, 'Chandler@gmail.com', 'Chandler', 'Tribbani', 'Ontario', '50', 'Male', '1996-12-12', 'Hello There i was on a sitcom show', 'Admin@123'),
(3, 'Jennifer@gmail.com', 'Jennifer', 'Cody', 'Toronto', '35', 'Female', '1990-10-10', 'Hello There', 'Admin@123'),
(4, 'Raquel@gmail.com', 'Raquel', 'Essabele', 'Montreal', '30', 'Female', '1990-06-16', 'Hey i am not here for hookcups', 'Admin@123'),
(5, 'Cobbie@gmail.com', 'Rauel', 'Yes', 'Montreal', '30', 'Female', '1990-06-16', 'Hey', 'Admin@123'),
(6, 'Chan@gmail.com', 'Jacky', 'Chan', 'Montreal', '35', 'Male', '1990-06-16', 'Hey i am also a bot', 'Admin@123'),
(7, 'han@gmail.com', 'han', 'Chuan', 'Montreal', '30', 'Male', '1990-06-16', 'Hey i am just a bot so all the best', 'Admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `customerprefrence`
--

DROP TABLE IF EXISTS `customerprefrence`;
CREATE TABLE `customerprefrence` (
  `CustomerPrefrence` int(11) NOT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `Like1` varchar(100) DEFAULT NULL,
  `Like2` varchar(100) DEFAULT NULL,
  `Like3` varchar(100) DEFAULT NULL,
  `IntrestedIn` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customerprefrence`
--

INSERT INTO `customerprefrence` (`CustomerPrefrence`, `CustomerID`, `Like1`, `Like2`, `Like3`, `IntrestedIn`) VALUES
(1, 1, 'Chess', 'Swimming', 'Coding', 'Female'),
(2, 2, 'Swimmimg', 'Chess', 'Coding', 'Male'),
(3, 3, 'Swimmimg', 'Chess', 'Coding', 'Male'),
(4, 4, 'Swimmimg', 'Chess', 'Coding', 'Male'),
(5, 5, 'Swimmimg', 'Chess', 'Coding', 'Male'),
(6, 6, 'Swimmimg', 'Chess', 'Coding', 'Male'),
(7, 7, 'Swimmimg', 'Chess', 'Coding', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

DROP TABLE IF EXISTS `favorite`;
CREATE TABLE `favorite` (
  `favorite` int(11) NOT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `ParnerId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`favorite`, `CustomerID`, `ParnerId`) VALUES
(1, 1, 2),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 2),
(8, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `ImageID` int(11) NOT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `ImageName` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`ImageID`, `CustomerID`, `ImageName`) VALUES
(1, 1, 'anuj161996@gmail.com.jpg'),
(2, 2, 'Chandler@gmail.com.jpg'),
(3, 3, 'Jennifer@gmail.com.jpg'),
(4, 4, 'Raquel@gmail.com.jpg'),
(5, 5, 'Cobbie@gmail.com.jpg'),
(6, 6, 'Chan@gmail.com.jpg'),
(7, 7, 'han@gmail.com.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `MessageID` int(11) NOT NULL,
  `SenderID` int(11) DEFAULT NULL,
  `ReciverID` int(11) DEFAULT NULL,
  `MESSAGE` varchar(255) DEFAULT NULL,
  `Time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`MessageID`, `SenderID`, `ReciverID`, `MESSAGE`, `Time`) VALUES
(1, 1, 5, '                     Hii\r\n', 'Thu Dec 2 22:31:22 CET 2021'),
(2, 1, 5, '                     You there', 'Thu Dec 2 22:31:27 CET 2021');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `customerprefrence`
--
ALTER TABLE `customerprefrence`
  ADD PRIMARY KEY (`CustomerPrefrence`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`favorite`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `ParnerId` (`ParnerId`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`ImageID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`MessageID`),
  ADD KEY `SenderID` (`SenderID`),
  ADD KEY `ReciverID` (`ReciverID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customerprefrence`
--
ALTER TABLE `customerprefrence`
  MODIFY `CustomerPrefrence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `favorite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `ImageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customerprefrence`
--
ALTER TABLE `customerprefrence`
  ADD CONSTRAINT `customerprefrence_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`);

--
-- Constraints for table `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`),
  ADD CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`ParnerId`) REFERENCES `customer` (`CustomerID`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`SenderID`) REFERENCES `customer` (`CustomerID`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`ReciverID`) REFERENCES `customer` (`CustomerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
