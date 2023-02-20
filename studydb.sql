-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2023 at 09:36 AM
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
-- Database: `studydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(255) NOT NULL,
  `foodName` varchar(1000) NOT NULL,
  `foodDescription` varchar(1000) NOT NULL,
  `foodPrice` varchar(1000) NOT NULL,
  `foodImg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `foodName`, `foodDescription`, `foodPrice`, `foodImg`) VALUES
(1, 'Krispy Kart', '3pcs Buffalo/Spicy Krisp + Monster Krisp Burger + Krunch Fries', '₱ 270.00', 'https://raw.githubusercontent.com/llnmmntbln/Web-Dev/main/wings%20(1).png'),
(2, 'Krispy Ala Carte', '6pcs Buffalo/Spicy Krisp + Krunch Fries', '₱185.00', 'https://raw.githubusercontent.com/llnmmntbln/Web-Dev/main/wings%20(2).png'),
(3, 'Krisp Burger', 'Regular Burger', '₱ 49.00', 'https://raw.githubusercontent.com/llnmmntbln/Web-Dev/main/Untitled-1.png'),
(4, 'Monster Krisp Burger', 'Double Patty Burger', '₱ 95.00', 'https://raw.githubusercontent.com/llnmmntbln/Web-Dev/main/burger3.png'),
(5, 'Overload Krisp Burger', 'Double Patty Burger And Krunch Fries', '₱ 130.00', 'https://raw.githubusercontent.com/llnmmntbln/Web-Dev/main/wings%20(4).png'),
(6, 'Krunch Fries', 'Regular French Fries', '₱ 49.00', 'https://raw.githubusercontent.com/llnmmntbln/Web-Dev/main/burger2%20(1).png'),
(7, 'Buffalo Krisp', 'Classic Buffalo Wings', '₱ 120.00', 'https://raw.githubusercontent.com/llnmmntbln/Web-Dev/main/wings.png'),
(8, 'Spicy Krisp', 'Crispy Wings In Chili Sauce', '₱ 130.00', 'https://raw.githubusercontent.com/llnmmntbln/Web-Dev/main/wings%20(3).png'),
(9, 'Krisp Donut', 'Classic Sugar Glazed Doughnut', '₱ 39.00', 'https://raw.githubusercontent.com/llnmmntbln/Web-Dev/main/donut.png'),
(10, 'CooKrisp', 'Crunchy And Chewy Chocolate Cookies', '₱ 85.00', 'https://raw.githubusercontent.com/llnmmntbln/Web-Dev/main/cookies.png'),
(11, 'NachoKrisp', 'Crispy Nachos With Cheese Sauce', '₱ 75.00', 'https://raw.githubusercontent.com/llnmmntbln/Web-Dev/main/nachos.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `user_id` bigint(100) NOT NULL,
  `firstName` varchar(1000) NOT NULL,
  `lastName` varchar(1000) NOT NULL,
  `mobileNumber` varchar(255) NOT NULL,
  `emailAddress` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `firstName`, `lastName`, `mobileNumber`, `emailAddress`, `password`) VALUES
(1, 669980678545, 'Karl Given', 'Reginaldo', '2147483647', 'pikuradezu@gmail.com', 'hahatesting'),
(8, 267029705354, 'asdf', 'asdf', '09454773754', 'boybalita10@gmail.com', 'xiBK5w=='),
(9, 37320682740, 'Jek', 'Burgos', '09123582912', 'angelcutie@gmail.com', 'lmEdtUA='),
(11, 746493654230343, 'Allen', 'Montalban', '09191232323', 'sojubae@gmail.com', 'lmEdtUD+');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emailAddress` (`emailAddress`) USING HASH,
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
