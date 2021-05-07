-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2021 at 02:30 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skylink_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(128) NOT NULL,
  `admin_password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_password`) VALUES
(1, 'admin', '$2y$10$YjaGu0Ss7UNTuEoGLNgqK.QyUKhQHAVaEoA.QQRUP8cHlkuVOQdKa');

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `flight_id` int(11) NOT NULL,
  `flight_type` varchar(128) NOT NULL,
  `flight_origin` varchar(128) NOT NULL,
  `flight_destination` varchar(128) NOT NULL,
  `flight_departure_time` datetime NOT NULL,
  `flight_return_time` datetime DEFAULT NULL,
  `flight_price` int(11) NOT NULL,
  `flight_seats` int(11) NOT NULL,
  `flight_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `flight_updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`flight_id`, `flight_type`, `flight_origin`, `flight_destination`, `flight_departure_time`, `flight_return_time`, `flight_price`, `flight_seats`, `flight_created_at`, `flight_updated_at`) VALUES
(7, 'Round Trip', 'HND - Tokyo Intl - Tokyo', 'KIX - Kansai - Osaka', '2021-05-07 12:11:00', '2021-05-14 12:11:00', 100, 0, '2021-05-07 00:11:16', '2021-05-07 00:28:21');

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

CREATE TABLE `passengers` (
  `passengers_id` int(11) NOT NULL,
  `reserv_id` int(11) NOT NULL,
  `passengers_firstname` varchar(128) NOT NULL,
  `passengers_lastname` varchar(128) NOT NULL,
  `passengers_dateofbirth` date NOT NULL,
  `passengers_country` varchar(128) NOT NULL,
  `passengers_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passengers`
--

INSERT INTO `passengers` (`passengers_id`, `reserv_id`, `passengers_firstname`, `passengers_lastname`, `passengers_dateofbirth`, `passengers_country`, `passengers_created_at`) VALUES
(8, 9, 'Alex', 'Legends', '1995-01-01', 'Mexico', '2021-05-07 00:15:20'),
(9, 9, 'Johnny', 'Moe', '1993-03-03', 'China', '2021-05-07 00:15:20'),
(10, 10, 'Alex', 'Legends', '1995-01-01', 'Mexico', '2021-05-07 00:15:21'),
(11, 10, 'Johnny', 'Moe', '1993-03-03', 'China', '2021-05-07 00:15:21');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reserv_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `reserv_type` varchar(128) NOT NULL,
  `reserv_origin` varchar(128) NOT NULL,
  `reserv_destination` varchar(128) NOT NULL,
  `reserv_departure_time` datetime NOT NULL,
  `reserv_status` varchar(128) NOT NULL,
  `reserv_seats` int(11) NOT NULL,
  `reserv_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `reserv_updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reserv_id`, `users_id`, `flight_id`, `reserv_type`, `reserv_origin`, `reserv_destination`, `reserv_departure_time`, `reserv_status`, `reserv_seats`, `reserv_created_at`, `reserv_updated_at`) VALUES
(9, 3, 7, 'Round Trip', 'HND - Tokyo Intl - Tokyo', 'KIX - Kansai - Osaka', '2021-05-07 12:11:00', 'Cancelled', 0, '2021-05-07 00:14:38', '2021-05-07 00:15:28'),
(10, 3, 7, 'Round Trip', 'KIX - Kansai - Osaka', 'HND - Tokyo Intl - Tokyo', '2021-05-14 12:11:00', 'Cancelled', 0, '2021-05-07 00:14:38', '2021-05-07 00:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `users_firstname` varchar(128) NOT NULL,
  `users_lastname` varchar(128) NOT NULL,
  `users_email` varchar(128) NOT NULL,
  `users_password` varchar(128) NOT NULL,
  `users_dateofbirth` date NOT NULL,
  `users_country` varchar(128) NOT NULL,
  `users_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `users_firstname`, `users_lastname`, `users_email`, `users_password`, `users_dateofbirth`, `users_country`, `users_created_at`) VALUES
(3, 'John', 'Doe', 'johndoe@email.com', '$2y$10$GkxraOxMsoK0rG8nXzwre.D6bIIRFmy7hjs1IOFK8jr0qTVaLlyVu', '1999-01-01', 'USA', '2021-05-07 00:14:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`flight_id`);

--
-- Indexes for table `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`passengers_id`),
  ADD KEY `reserv_id` (`reserv_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reserv_id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `flight_id` (`flight_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `users_email` (`users_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `flight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `passengers`
--
ALTER TABLE `passengers`
  MODIFY `passengers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reserv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `passengers`
--
ALTER TABLE `passengers`
  ADD CONSTRAINT `passengers_ibfk_1` FOREIGN KEY (`reserv_id`) REFERENCES `reservations` (`reserv_id`) ON DELETE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`flight_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
