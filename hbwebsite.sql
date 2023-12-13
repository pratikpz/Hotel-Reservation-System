-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2023 at 07:12 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hbwebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_cred`
--

CREATE TABLE `admin_cred` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_cred`
--

INSERT INTO `admin_cred` (`id`, `admin_name`, `admin_pass`) VALUES
(1, 'necro', '123');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(50) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `room_image` varchar(100) NOT NULL,
  `room_features1` varchar(150) NOT NULL,
  `room_features2` varchar(100) NOT NULL,
  `room_features3` varchar(100) NOT NULL,
  `room_facilities1` varchar(150) NOT NULL,
  `room_facilities2` varchar(100) NOT NULL,
  `room_facilities3` varchar(100) NOT NULL,
  `guests_adults` int(50) NOT NULL,
  `guests_children` int(50) NOT NULL,
  `room_price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_name`, `room_image`, `room_features1`, `room_features2`, `room_features3`, `room_facilities1`, `room_facilities2`, `room_facilities3`, `guests_adults`, `guests_children`, `room_price`) VALUES
(1, 'Super deluxe room', '', '2 rooms', '', '', 'wifi,ac', '', '', 19, 21, 21120),
(4, 'haha room', '', '2 rooms, 1 bathroom,no balcony', '', '', 'AC', '', '', 2, 1, 1999),
(5, 'thikai ko room', '', '2 rooms,Smoking Area', '', '', 'room service', '', '', 2, 2, 1599),
(6, 'babal kotha', '', '2 rooms', '2 sun facing balcony', '', 'room service', '', '', 4, 4, 44),
(8, 'macbook room', 'UML.png', 'ac', '', '', 'wifi', '', '', 1, 2, 999);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipCode` varchar(10) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `hashedPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contact`, `address`, `zipCode`, `dateOfBirth`, `hashedPassword`) VALUES
(7, 'Pratik Parazulee', 'pratikpj122@gmail.com', '9863188364', 'Gaindakot', '987', '0003-07-31', '$2y$10$3J0H9LvqZUIg.5qkk8q9Ou22DYKm5Ii3ofZI1NFXE31G6ksLjdKQO'),
(8, 'Prabhat Ghimire', 'prabhatghimire99@gmail.com', '9871778782718', 'Bbharatpur', '11156', '2023-06-17', '$2y$10$9mniuvRpdg6lrDAaCaeSb.WZ4iuP0XyBrV0RAAMrNl3kbH5ss.one'),
(10, 'Rajan Malla', 'rajan@gmail.com', '98545487545', 'gaidakato', '123', '1998-05-12', '$2y$10$ynuiACr7xHcDRWBfQ4UcPeMtfj99T4IxplrIUfmRMGnu/9dvxpRrG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_cred`
--
ALTER TABLE `admin_cred`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_cred`
--
ALTER TABLE `admin_cred`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
