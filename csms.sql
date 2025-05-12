-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2025 at 02:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `Full_Name` varchar(100) NOT NULL,
  `User_Name` varchar(100) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Image_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `Full_Name`, `User_Name`, `Email`, `Password`, `Image_Name`) VALUES
(27, 'Raisul', 'RIM', 'raisul@gmail.com', '12345', 'Service_Category_579.jpg'),
(28, 'Mahima', 'mahima', 'mahima@gmai.com', '1', 'Profile_Category_326.jpg'),
(29, 'Nishat', 'nishat', 'nishat@gmail.com', '111', 'Service_Category_80.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `appointment_on` datetime NOT NULL,
  `measure` varchar(50) NOT NULL,
  `total` decimal(20,0) NOT NULL,
  `appointment_made` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `s_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `appointment_on`, `measure`, `total`, `appointment_made`, `status`, `u_id`, `s_id`) VALUES
(38, '1989-07-22 20:06:00', '10', 60, '2025-05-03 08:16:34', 'Appoint', 26, 40),
(61, '2011-11-10 05:43:00', '71', 11644, '2025-05-11 07:54:39', 'Completed', 26, 54);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Id` int(10) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Image_Name` varchar(255) NOT NULL,
  `Active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Id`, `Title`, `Image_Name`, `Active`) VALUES
(19, 'Home', 'Service_Category_420.jpg', 'Yes'),
(21, 'Laundry', 'Service_Category_444.png', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `Id` int(11) NOT NULL,
  `Title` varchar(150) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Price` decimal(10,0) NOT NULL,
  `Price_des` varchar(20) NOT NULL,
  `Image_Name` varchar(255) NOT NULL,
  `Category_Title` varchar(100) NOT NULL,
  `Active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`Id`, `Title`, `Description`, `Price`, `Price_des`, `Image_Name`, `Category_Title`, `Active`) VALUES
(40, 'Office Cleaning And Pest Control', 'Pest Control & Disinfecting', 6, '/sq.ft.', '', 'Office', 'Yes'),
(41, 'Car Wash', 'Inside And Outside Car Cleaning', 1500, 'Each', 'Service__12.jpg', ' ', 'Yes'),
(42, 'Dry Cleaning', 'Dry Cleaning Only', 150, 'Each', '', 'Laundry', 'Yes'),
(54, 'brac', 'Voluptate neque nost', 164, '75', '', 'Et eos consequatur', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `top_ser`
--

CREATE TABLE `top_ser` (
  `service_id` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `top_ser`
--

INSERT INTO `top_ser` (`service_id`, `count`) VALUES
(40, 1),
(41, 0),
(42, 0),
(43, 0),
(44, 0),
(50, 0),
(53, 0),
(54, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `full_name`, `username`, `password`, `email`, `address`, `phone`, `s_id`) VALUES
(26, 'Raisul', 'RIM', '12345', 'raisul@gmail.com', 'Quia eos dolorum cu', 1516547422, 54),
(42, 'Ahmed Shannon', 'tas', '11', 'cynuwo@mailinator.com', 'Reprehenderit incid', 1, 54),
(52, 'Owen Sexton', 'n', '1', 'mete@mailinator.com', 'Duis ab modi ut quis', 1, 42),
(53, 'Christen Galloway', 'lisev', 'Pa$$w0rd!', 'qybabij@mailinator.com', 'Nisi omnis obcaecati', 1, 42),
(54, 'Alana Diaz', 'd', '2', 'fopy@mailinator.com', 'In fugiat perferendi', 1, 42),
(55, 'Alana Diaz', 'd', '2', 'fopy@mailinator.com', 'In fugiat perferendi', 1, 42),
(56, 'Reuben Moore', 'gg', '1', 'tyroxupa@mailinator.com', 'Non irure ipsum adip', 1, 40),
(57, 'Miriam Joyner', 'm', '22', 'toqopyw@mailinator.com', 'Sequi eveniet autem', 1, 42);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Title_Unique` (`Title`) USING BTREE;

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Title` (`Title`),
  ADD KEY `Category_Title` (`Category_Title`);

--
-- Indexes for table `top_ser`
--
ALTER TABLE `top_ser`
  ADD UNIQUE KEY `service_id_2` (`service_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `s_id` (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `service` (`Id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `service` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
