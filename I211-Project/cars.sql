
-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2019 at 04:50 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_inventory_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `make` varchar(60) NOT NULL,
  `model` varchar(60) NOT NULL,
  `price` int(60) NOT NULL,
  `year` int(4) NOT NULL,
  `color` varchar(40) NOT NULL,
  `mileage` int(21) NOT NULL,
  `image` varchar(200) NOT NULL,
  `rating_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `make`, `model`, `price`, `year`, `color`, `mileage`, `image`, `rating_id`) VALUES
(1, 'Ford', 'Taurus', 14999, 2009, 'Black', 31321, 'black_ford_taurus.jpg', 0),
(3, 'Mitsubishi', 'Eclipse', 4350, 1999, 'Orange', 13133, 'orange_mitsubishi_eclipse.jpg', 0),
(4, 'Dodge', 'Charger', 23999, 2014, 'Red', 15901, 'red_dodge_charger.jpg', 0),
(5, 'Chevrolet', 'Cruze', 12500, 2016, 'Blue', 63409, 'blue_chevrolet_cruze.jpg', 0),
(6, 'Porsche', 'Cayenne', 57900, 2016, 'Black', 13432, 'black_porsche_cayenne.jpg', 0),
(7, 'Mitsubishi', '3000GT', 8999, 1996, 'Red', 154000, 'red_mitsubishi_3000GT', 0),
(11, 'Ford', 'Fusion', 14995, 2015, 'Silver', 31232, 'silver_ford_fusion.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `car_ratings`
--

CREATE TABLE `car_ratings` (
  `id` int(11) NOT NULL,
  `num_stars` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_ratings`
--

INSERT INTO `car_ratings` (`id`, `num_stars`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rating_id` (`rating_id`);

--
-- Indexes for table `car_ratings`
--
ALTER TABLE `car_ratings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `car_ratings`
--
ALTER TABLE `car_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
