-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Aug 22, 2020 at 07:02 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventoryassignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_data`
--

CREATE TABLE `admin_data` (
  `sno.` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_data`
--

INSERT INTO `admin_data` (`sno.`, `username`, `password`) VALUES
(1, 'user1', 'user123');

-- --------------------------------------------------------

--
-- Table structure for table `device_data`
--

CREATE TABLE `device_data` (
  `device_id` int(11) NOT NULL,
  `device_name` varchar(20) DEFAULT NULL,
  `total_inventory` int(10) DEFAULT NULL,
  `available_inventory` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `device_data`
--

INSERT INTO `device_data` (`device_id`, `device_name`, `total_inventory`, `available_inventory`) VALUES
(1, 'Redmi', 12, 8),
(9, 'Samsung A21', 8, 7),
(28, 'Iphone 6s', 2, 1),
(31, 'Iphone X', 2, 2),
(32, 'One plus', 5, 5),
(33, 'xyz', 5, 5),
(34, 'Oppo', 10, 10),
(37, 'Realme', 3, 2),
(39, 'Google Nexus', 2, 1),
(40, 'Google Pixel2', 1, 1),
(41, 'Device1', 1, 1),
(42, 'device2', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `employee_data`
--

CREATE TABLE `employee_data` (
  `Employee_ID` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `E-mail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_data`
--

INSERT INTO `employee_data` (`Employee_ID`, `Name`, `E-mail`) VALUES
(12, 'Employee1', 'Employee1@xyz.com'),
(13, 'Employee2', 'Employee2@xyz.com'),
(12211, 'Alpha', 'alpha@a.com'),
(12233, 'Beta', 'beta@b.com'),
(56565, 'Gamma', 'gamma@g.com'),
(12424, 'Delta', 'delta@d.com'),
(32, 'Asdf', 'asdf@gmail.com'),
(121, 'sasa', 'sasa@gmail.com'),
(12, 'rahul', 'caldla@gmail.com'),
(7, 'Vishal', 'vks@gmail.com'),
(12345, 'employee3', 'e@gma'),
(100, 'qwerty', 'fgh@gmail.com'),
(101, 'emp1', 'emp1@gmail.com'),
(101, 'emp2', 'kkkk@ff.com'),
(110, 'dev', 'dev@g.com'),
(111, 'all', 'all@dma.com'),
(112, 'vcvc', 'vcvc@f.com');

-- --------------------------------------------------------

--
-- Table structure for table `welcome`
--

CREATE TABLE `welcome` (
  `id` int(10) NOT NULL,
  `deviceId` int(10) NOT NULL,
  `empID` int(10) NOT NULL,
  `issuedate` datetime NOT NULL DEFAULT current_timestamp(),
  `returndate` date NOT NULL DEFAULT current_timestamp(),
  `devstatus` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `welcome`
--

INSERT INTO `welcome` (`id`, `deviceId`, `empID`, `issuedate`, `returndate`, `devstatus`) VALUES
(39, 34, 56565, '2020-08-22 14:07:34', '2020-09-03', 'returned'),
(40, 1, 12211, '2020-08-22 14:12:20', '2020-08-21', 'returned'),
(41, 1, 12, '2020-08-22 16:10:46', '2020-08-27', 'pending'),
(42, 1, 12, '2020-08-22 16:17:39', '2020-08-27', 'returned'),
(43, 1, 121, '2020-08-22 17:14:43', '2020-08-27', 'returned'),
(44, 1, 12, '2020-08-22 18:34:16', '2020-08-28', 'returned'),
(45, 1, 12, '2020-08-22 18:34:35', '2020-08-28', 'returned'),
(46, 1, 12, '2020-08-22 18:34:54', '2020-08-28', 'returned'),
(48, 1, 12, '2020-08-22 18:41:34', '2020-08-28', 'pending'),
(49, 32, 32, '2020-08-22 18:46:37', '2020-08-28', 'returned'),
(50, 33, 13, '2020-08-22 18:53:27', '2020-08-25', 'returned'),
(51, 28, 12211, '2020-08-22 18:55:52', '2020-08-25', 'pending'),
(52, 1, 12, '2020-08-22 18:58:43', '2020-08-27', 'pending'),
(53, 1, 12, '2020-08-22 18:58:58', '2020-08-28', 'pending'),
(54, 1, 32, '2020-08-22 18:59:16', '2020-08-23', 'returned'),
(55, 32, 121, '2020-08-22 19:03:06', '2020-08-26', 'returned'),
(56, 37, 7, '2020-08-22 19:06:09', '2020-09-30', 'returned'),
(57, 37, 32, '2020-08-22 19:09:34', '2020-08-27', 'returned'),
(58, 1, 12, '2020-08-22 19:22:12', '0000-00-00', 'returned'),
(59, 9, 7, '2020-08-22 19:23:33', '2020-08-20', 'pending'),
(60, 37, 12233, '2020-08-22 19:25:00', '2020-09-03', 'pending'),
(61, 39, 12345, '2020-08-22 20:00:01', '2020-08-28', 'pending'),
(62, 1, 12, '2020-08-22 20:01:17', '0000-00-00', 'returned'),
(63, 1, 12, '2020-08-22 20:02:09', '0000-00-00', 'returned'),
(64, 34, 101, '2020-08-22 22:02:10', '2020-08-29', 'returned');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_data`
--
ALTER TABLE `admin_data`
  ADD PRIMARY KEY (`sno.`);

--
-- Indexes for table `device_data`
--
ALTER TABLE `device_data`
  ADD PRIMARY KEY (`device_id`);

--
-- Indexes for table `welcome`
--
ALTER TABLE `welcome`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_data`
--
ALTER TABLE `admin_data`
  MODIFY `sno.` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `device_data`
--
ALTER TABLE `device_data`
  MODIFY `device_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `welcome`
--
ALTER TABLE `welcome`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
