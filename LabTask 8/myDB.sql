-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 26, 2023 at 06:13 AM
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
-- Database: `myDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_mail` varchar(70) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `admin_phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_mail`, `password`, `admin_name`, `admin_phone`) VALUES
(1, 'admin@gmail.com', 'Admin@123', 'MOHAMMAD SUMON', '01731057540');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `donor_id` int(10) NOT NULL,
  `donor_mail` varchar(50) NOT NULL,
  `password` varchar(90) NOT NULL,
  `donor_name` varchar(50) NOT NULL,
  `donor_phone` varchar(50) NOT NULL,
  `donor_image` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`donor_id`, `donor_mail`, `password`, `donor_name`, `donor_phone`, `donor_image`) VALUES
(1, 'shohan@gmail.com', 'Sumu98971@', 'MD SUMON Khan', '01731057540', 'N/A'),
(2, 'mohammad.sumon9897@gmail.com', 'Sumu9897@', 'MOHAMMAD SUMON', '01531057540', 'N/A'),
(3, 'sumon.bncd@gmail.com', 'Sumu98971@', 'MD SUMON', '0173105754', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `ID` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `person` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`ID`, `name`, `description`, `date`, `address`, `person`, `phone`, `image`) VALUES
(8, 'Hilsha', 'Good', '2023-04-23', 'Shahajadpur, Gulshan', 'MD SUMON', '01731057540', ''),
(9, 'Rice, Dal , Chingri', 'Good', '2023-04-24', 'Basundara', 'Rahim', '01987657652', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_mail` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_phone` varchar(15) NOT NULL,
  `user_image` varchar(50) DEFAULT NULL,
  `user_gender` varchar(50) NOT NULL,
  `user_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_mail`, `password`, `user_name`, `user_phone`, `user_image`, `user_gender`, `user_address`) VALUES
(1, 'sumon.bncd@gmail.com', 'Sumu9897@', 'Md Sumon', '01831057540', NULL, 'male', 'Dhaka'),
(2, 'sumon.bncd@gmail.com', 'Sumu98971@', 'MD SUMON', '01731057540', 'N/A', 'Male', 'Shahajadpur, Gulshan'),
(3, 'maimona@gmail.com', 'Maimona@12', 'Maimona Rahman', '01756616245', 'N/A', 'Female', 'Tangail');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `ID` int(11) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Message` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`ID`, `fName`, `lName`, `Phone`, `Email`, `Message`) VALUES
(1, 'MD', 'SUMON', '01731057540', 'sumon.bncd@gmail.com', 'hello'),
(2, 'MOHAMMAD', 'JIBON', '01903846166', 'mohammad@gmail.com', 'Nice word'),
(3, 'MD', 'SHAKIL', '0171032828', 'shakil.bncd@gmail.com', 'Thank you'),
(4, '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`donor_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `donor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
