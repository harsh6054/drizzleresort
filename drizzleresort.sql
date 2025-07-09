-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2024 at 06:52 PM
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
-- Database: `drizzleresort`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_room`
--

CREATE TABLE `admin_room` (
  `id` int(10) NOT NULL,
  `Room_No` int(10) NOT NULL,
  `Room_Type` varchar(11) NOT NULL,
  `Room_Des` text NOT NULL,
  `Room_Image` varchar(255) NOT NULL,
  `Room_Price` int(11) NOT NULL,
  `uploaded_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carbooking`
--

CREATE TABLE `carbooking` (
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `contact_address1` text NOT NULL,
  `contact_address2` text NOT NULL,
  `c_city` text NOT NULL,
  `c_zip_code` text NOT NULL,
  `car_license_no` text NOT NULL,
  `pancardno` text NOT NULL,
  `adharcard_no` text NOT NULL,
  `dstreet_address1` text NOT NULL,
  `dstreet_address2` text NOT NULL,
  `dcity` text NOT NULL,
  `dzip` text NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carbooking`
--

INSERT INTO `carbooking` (`name`, `email`, `phone`, `contact_address1`, `contact_address2`, `c_city`, `c_zip_code`, `car_license_no`, `pancardno`, `adharcard_no`, `dstreet_address1`, `dstreet_address2`, `dcity`, `dzip`, `notes`) VALUES
('Prathmesh Pawar', 'prathmesh56@gmail.com', '9356632834', 'Tadsar', 'near kokate mess', 'shivani', '43542', '836752755425', '1826763735', '87262534323', 'Kadegaon', 'Kadegaon', 'Sangli', '415305', 'Ok');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `Name` text NOT NULL,
  `Phone` text NOT NULL,
  `food_type` text NOT NULL,
  `food_item` varchar(30) NOT NULL,
  `Room_No` text NOT NULL,
  `status` varchar(4) NOT NULL,
  `cost` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`Name`, `Phone`, `food_type`, `food_item`, `Room_No`, `status`, `cost`) VALUES
('pawan', '883674672', 'Dinner', 'Pizza', '210', '', ''),
('pawan', '883674672', 'Dinner', 'Pizza', '210', '', ''),
('nikhil', '9397929793', 'Dinner', 'Pasta', '209', '0', ''),
('pratmesh', '435243542', 'Others', 'Beverages', '213', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `kate_point`
--

CREATE TABLE `kate_point` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `massage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kate_point`
--

INSERT INTO `kate_point` (`id`, `name`, `email`, `image`, `subject`, `massage`) VALUES
(1, 'Prasad Patil', 'patilguru649@gmail.com', 'Pratapgad.jpg', 'ddew', 'wefewewr');

-- --------------------------------------------------------

--
-- Table structure for table `pickupanddrop`
--

CREATE TABLE `pickupanddrop` (
  `Nameofcustomer` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `pickuploc` text NOT NULL,
  `dropoffloc` text NOT NULL,
  `pickupdate` text NOT NULL,
  `dropoffdate` text NOT NULL,
  `pickuptime` text NOT NULL,
  `dropofftime` text NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pickupanddrop`
--

INSERT INTO `pickupanddrop` (`Nameofcustomer`, `email`, `phone`, `pickuploc`, `dropoffloc`, `pickupdate`, `dropoffdate`, `pickuptime`, `dropofftime`, `notes`) VALUES
('Pratik Kolekar', 'pratik34@gmail.com', '9273878787', 'Madhavnagr', 'Khobre Vada', '2024-04-16', '2024-04-17', '13:57', '09:57', 'Ok');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`name`, `phone`, `email`, `pass`) VALUES
('Guruprasad Patil', '09146374522', 'admin123@gmail.com', 'admin123'),
('harsh', '9356636054', 'harshpatil6054@gmail.com', '1234'),
('Yash Inamdar', '847629973', 'yash12@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `room_booking`
--

CREATE TABLE `room_booking` (
  `c_name` text NOT NULL,
  `zip` text NOT NULL,
  `email` text NOT NULL,
  `c_address` text NOT NULL,
  `phone` text NOT NULL,
  `city` text NOT NULL,
  `c_state` text NOT NULL,
  `checkindate` text NOT NULL,
  `checkoutdate` text NOT NULL,
  `checkintime` text NOT NULL,
  `checkouttime` text NOT NULL,
  `adults` text NOT NULL,
  `children` text NOT NULL,
  `roomtype` text NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_booking`
--

INSERT INTO `room_booking` (`c_name`, `zip`, `email`, `c_address`, `phone`, `city`, `c_state`, `checkindate`, `checkoutdate`, `checkintime`, `checkouttime`, `adults`, `children`, `roomtype`, `notes`) VALUES
('Harsh Patil', '415409', 'harshpatil6054@gmail.com', 'islampur', '8028746473', 'sangli', 'maharastra', '2024-04-14', '2024-04-30', 'Morning', 'Afternoon', '3', '0', 'Rest Rooms', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `service1`
--

CREATE TABLE `service1` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `subtitle` text NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service1`
--

INSERT INTO `service1` (`id`, `title`, `subtitle`, `comments`) VALUES
(6, 'dsfdsfs', 'dsfdsfdsf', 'fdfsdfdsfsf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_room`
--
ALTER TABLE `admin_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kate_point`
--
ALTER TABLE `kate_point`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service1`
--
ALTER TABLE `service1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_room`
--
ALTER TABLE `admin_room`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kate_point`
--
ALTER TABLE `kate_point`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service1`
--
ALTER TABLE `service1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
