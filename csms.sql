-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2025 at 04:00 PM
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
(64, '2025-05-27 19:11:00', '1200', 6000, '2025-05-12 03:12:04', 'Completed', 60, 42),
(65, '2025-05-27 19:13:00', '2', 400, '2025-05-12 03:14:05', 'Appoint', 61, 57),
(68, '2025-05-21 19:29:00', '1', 1500, '2025-05-12 03:29:27', 'Completed', 63, 41),
(70, '2025-05-16 19:53:00', '2', 400, '2025-05-12 03:53:31', 'Appoint', 64, 57);

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
(19, 'Home', 'Profile_Category_495.jpg', 'Yes'),
(21, 'Laundry', 'Profile_Category_500.jpg', 'Yes'),
(22, 'Office', 'Profile_Category_307.jpg', 'Yes'),
(23, 'Car', 'Profile_Category_358.jpg', 'Yes'),
(24, 'University', 'Profile_Category_442.jpg', 'Yes'),
(25, 'Hospital And HealthCare', 'Profile_Category_240.jpg', 'Yes'),
(26, 'Shopping Mall', 'Service_Category_418.jpg', 'Yes');

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
(40, 'Office Pest Control', 'Pest Control & Disinfecting', 35, '/sq.ft.', 'Service__99.jpg', 'Office      ', 'Yes'),
(41, 'Car Wash', 'Inside And Outside Car Cleaning', 1500, 'Each', 'Service__685.jpg', 'Car  ', 'Yes'),
(42, 'House Cleaning And Pest Control', 'Dusting, Booming, Pest Control & Disinfecting', 5, '/sq.ft.', 'Service__804.jpg', 'Home  ', 'Yes'),
(54, 'University Cleaning And Pest Control', 'Dusting, Booming, Pest Control & Disinfecting', 25, '/sq.ft.', 'Service__587.jpg', 'University  ', 'Yes'),
(55, 'Dry Cleaning', 'Dry Cleaning Only', 250, 'Each', 'Service__987.jpg', 'Laundry  ', 'Yes'),
(57, 'Laundry Wash', 'Machine Wash with Fabric & Color Guard', 200, 'Each', 'Service__578.jpg', 'Laundry ', 'Yes'),
(58, 'Laundry Iron', 'Iron & Fold Laundry', 10, 'Each', 'Service__409.jpg', 'Laundry ', 'Yes'),
(59, 'Wash & Iron', 'Machine Wash,Iron & Fold Laundry', 30, 'Each', 'Service__780.jpg', 'Laundry ', 'Yes'),
(60, 'House Cleaning', 'Dusting, Booming & Disinfecting', 15, '/sq.ft.', 'Service__859.jpg', 'Home ', 'Yes'),
(61, 'Office Cleaning', 'Dusting,Brooming,Glass cleaning & Disinfecting', 25, '/sq.ft.', 'Service__34.jpg', 'Office   ', 'Yes'),
(64, 'Hospital Cleaning And Laundry', 'Dusting, booming, pest control, disinfecting & laundry ', 25, '/sq.ft.', 'Service__942.jpg', 'Hospital And HealthCare  ', 'Yes'),
(65, 'Shopping Mall Cleaning', 'Dusting,Glass ceaning,Pest control & Disinfecting', 25, '/sq.ft.', 'Service_882.jpg', 'Shopping Mall', 'Yes');

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
(40, 0),
(41, 1),
(42, 1),
(54, 0),
(55, 0),
(57, 2),
(58, 0),
(59, 0),
(60, 0),
(61, 0),
(64, 0),
(65, 0);

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
(60, 'Reyna', 'reyna', '123', 'reyna@gmail.com', 'Bind', 1, 42),
(61, 'Phoenix', 'phoenix', '123', 'phoenix@gmail.com', 'Fracture', 0, 57),
(63, 'Omen', 'omen', '123', 'omen@gmail.com', 'Lotus', 132, 41),
(64, 'Jett', 'jett', '123', 'jett@gmail.com', 'Pearl', 553, 57);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

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
