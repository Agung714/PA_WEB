-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 03:24 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chiberto`
--

-- --------------------------------------------------------

--
-- Table structure for table `chart`
--

CREATE TABLE `chart` (
  `id` int(5) NOT NULL,
  `user` varchar(255) NOT NULL,
  `id_product` int(5) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chart`
--

INSERT INTO `chart` (`id`, `user`, `id_product`, `status`) VALUES
(7, 'a', 4, 1),
(8, 'a', 4, 1),
(9, 'a', 4, 0),
(10, 'a', 1, 1),
(11, 'b', 1, 0),
(12, 'a', 4, 0),
(13, 'a', 4, 0),
(14, 'a', 1, 0),
(15, 'a', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dash`
--

CREATE TABLE `dash` (
  `id` int(1) NOT NULL,
  `balance` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dash`
--

INSERT INTO `dash` (`id`, `balance`) VALUES
(1, 30471000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `type` enum('Keyboard','Headphone','Laptop','Mouse','Mousepad') NOT NULL,
  `price` int(11) NOT NULL,
  `image_path` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `type`, `price`, `image_path`) VALUES
(1, 'Headphone 22', 'Headphone', 11791000, 'assets/uploads/Headphone.png'),
(2, 'Keyboard', 'Keyboard', 2499000, 'assets/uploads/Keyboard.png'),
(3, 'Mouse', 'Mouse', 325000, 'assets/uploads/Mouse.png'),
(4, 'Laptop', 'Laptop', 17680000, 'assets/uploads/Laptop.jpg'),
(9, 'laptop2', 'Laptop', 2147483647, 'assets/uploads/2023-11-16 laptop2.jpg'),
(10, 'Mousepad', 'Mousepad', 1000000, 'assets/uploads/2023-11-16 Mousepad.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first` varchar(255) NOT NULL,
  `last` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `request` varchar(255) NOT NULL,
  `confirm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `first`, `last`, `tanggal`, `email`, `request`, `confirm`) VALUES
(2, 'cup', '$2y$10$hKoyQFGQbFwF3/Fy4MS0iOb4jop/GUP.l3l/bMzv7gNbj/m8.pn26', 'ucup', 'surucup', '2023-11-08', 'cup@gmail.com', '', ''),
(3, 'asep', '$2y$10$AlFjot2IpXnQVWCQbIVomehdXpYCI5V.nHn1qi4uAXgFrNWyWLk5m', 'asep', 'kasep', '0000-00-00', 'asep@gmail.com', '', ''),
(4, 'a', '$2y$10$wg5D4nuBudCHO9XPtAhbCuJs0yFIoG1IOTQTkxaIB2X8MbJNtZy3m', 'asep', 'kasep', '0000-00-00', 'cekap@gmail.com', '', ''),
(5, 'b', '$2y$10$zMbuiLZuhBBKeRXCjRg5IecqyMAfmpC2ljNzbcs54viRM6T7JJJoK', '', '', '0000-00-00', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chart`
--
ALTER TABLE `chart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dash`
--
ALTER TABLE `dash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chart`
--
ALTER TABLE `chart`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `dash`
--
ALTER TABLE `dash`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
