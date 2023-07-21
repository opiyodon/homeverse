-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 09, 2023 at 11:57 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homeverse`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `backgroundName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `propertyName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `propertyPrice` decimal(10,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `backgroundName`, `propertyName`, `propertyPrice`, `status`, `full_name`, `phone`, `email`) VALUES
(8, 'Background-Name-6448.jpg', 'Germane Flynn', '59200.00', 'Cancelled', 'Miles Morales', 712545335, 'milesmorales@mailinator.com'),
(9, 'Background-Name-9370.jpg', 'Adrienne Villa', '57000.00', 'Bought', 'Mr Shelby', 754060142, 'shelbyreals@hotmail.com'),
(10, 'Background-Name-2263.jpg', 'Yael Flats', '29500.00', 'Ordered', 'Clyde Artz', 740965535, 'clydeartz@mailinator.com'),
(11, 'Background-Name-6448.jpg', 'Germane Flynn', '59200.00', 'Bought', 'Chris Baaru', 714203994, 'baaru@mailinator.com');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

DROP TABLE IF EXISTS `property`;
CREATE TABLE IF NOT EXISTS `property` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `backgroundName` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `pictureName` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `pictureName2` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `oldPrice` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discountPercent` int NOT NULL,
  `bedrooms` int NOT NULL,
  `bathrooms` int NOT NULL,
  `squareFt` int NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `featured` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `active` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` int NOT NULL,
  `whatsapp` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `blog` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `featured_blog` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `active_blog` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `name`, `type`, `status`, `city`, `backgroundName`, `pictureName`, `pictureName2`, `oldPrice`, `discount`, `price`, `discountPercent`, `bedrooms`, `bathrooms`, `squareFt`, `description`, `featured`, `active`, `owner`, `phone`, `whatsapp`, `email`, `blog`, `comment`, `featured_blog`, `active_blog`, `date`) VALUES
(27, 'Artkins Key House', 'House', 'For Rent', 'Nakuru', 'Background-Name-5041.jpg', 'Picture-Name-5606.jpg', 'Picture-Name2-2508.jpg', '50000.00', '500.00', '49500.00', 1, 10, 5, 3652, 'Comfortable House for Family Vacation', 'Yes', 'Yes', 'Artkins', 757451020, 757451020, 'artkins@hotmail.com', 'Yes', 'Best House of 2022', 'Yes', 'Yes', '2022-06-09'),
(28, 'Artcorp Complex', 'Office', 'For Sale', 'Nairobi', 'Background-Name-3586.jpeg', 'Picture-Name-6363.jpg', 'Picture-Name2-4863.jpg', '100000.00', '1000.00', '99000.00', 1, 0, 100, 5065, 'Luxury 5Star Office', 'Yes', 'Yes', 'Whitney', 714230692, 714230692, 'whitneyartkins@hotmail.com', 'Yes', 'Most Luxurios Office of 2022', 'No', 'Yes', '2022-01-02'),
(29, 'Wilkinson Apartments', 'Apartment', 'For Rent', 'Naivasha', 'Background-Name-6653.jpg', 'Picture-Name-2126.jpg', 'Picture-Name2-5944.jpg', '9000.00', '1000.00', '8000.00', 11, 1, 1, 3280, 'Cool Apartments for Students', 'Yes', 'Yes', 'Shaun', 783784054, 783784054, 'shaunartkins@hotmail.com', 'Yes', 'Cheapest Apartments of 2021', 'Yes', 'Yes', '2021-09-16'),
(30, 'Franklin Holdings', 'Building', 'For Sale', 'Mombasa', 'Background-Name-9170.jpg', 'Picture-Name-6386.jpg', 'Picture-Name2-9139.jpg', '50000.00', '2000.00', '48000.00', 4, 3, 5, 2045, 'Unique Building for Business', 'Yes', 'Yes', 'Franklin', 783784054, 783784054, 'franklinholdings@gmailcom', 'No', '', '', '', '0000-00-00'),
(31, 'Yael Flats', 'Flat', 'For Rent', 'Kisumu', 'Background-Name-2263.jpg', 'Picture-Name-698.jpg', 'Picture-Name2-9287.jpg', '30000.00', '500.00', '29500.00', 2, 8, 4, 3524, 'Luxurious Flats for Family', 'Yes', 'Yes', 'Livia', 714230692, 714230692, 'liviaartkins@hotmail.com', 'Yes', 'Coolest Flats of 2023', 'No', 'Yes', '2023-02-09'),
(32, 'Adrienne Villa', 'Villa', 'For Sale', 'Nakuru', 'Background-Name-9370.jpg', 'Picture-Name-7928.jpg', 'Picture-Name2-1095.jpg', '60000.00', '3000.00', '57000.00', 5, 10, 5, 3542, 'Comfortable Villa', 'Yes', 'Yes', 'Miles', 720421570, 714230692, 'milesmorales@mailinator.com', 'No', '', '', '', '0000-00-00'),
(33, 'Germane Flynn', 'House', 'For Rent', 'Nairobi', 'Background-Name-6448.jpg', 'Picture-Name-3412.jpg', 'Picture-Name2-7547.jpg', '60000.00', '800.00', '59200.00', 1, 12, 5, 3540, 'Luxurious House', 'Yes', 'Yes', 'Whitney', 712545335, 712545335, 'whitneyartkins@hotmail.com', 'Yes', 'Most Luxurious House I have ever seen', 'Yes', 'Yes', '2023-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `property_id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `profileName` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `review` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `active` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `property_id`, `username`, `profileName`, `review`, `active`) VALUES
(30, 33, 'Miles Morales', 'Profile-Name-3435.jpeg', 'Best House. I like it. Thanks Homeverse', 'Yes'),
(31, 32, 'Mr Shelby', 'Profile-Name-1441.jpeg', 'This is the best place to feel at home. Coolest Vila have ever lived in.', 'Yes'),
(32, 31, 'Clyde Artz', 'Profile-Name-3730.jpg', 'Yea man I really like this flat. Thanks homverse', 'Yes'),
(33, 33, 'Baaru', 'Profile-Name-4332.jpg', 'Most Luxurious House I have ever seen', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `userProfile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` int NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `admin` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `full_name`, `username`, `userProfile`, `email`, `phone`, `password`, `admin`) VALUES
(1, 'Don Artkins', 'Artkins', 'User-Profile-8462.jpg', 'bellachao@hotmail.com', 757451020, '21232f297a57a5a743894a0e4a801fc3', 'Yes'),
(2, 'Whitney Artkins', 'Whitney', 'User-Profile-8462.jpg', 'whitney254@hotmail.com', 757451020, '21232f297a57a5a743894a0e4a801fc3', 'Yes'),
(9, 'Emmanuel Oketch', 'Manu', 'User-Profile-8462.jpg', 'manu@hotmail.com', 729227872, '9de4a97425678c5b1288aa70c1669a64', 'No'),
(17, 'Chris Baaru', 'Baaru', 'User-Profile-8262.jpeg', 'baaru@mailinator.com', 712545335, 'a765884f4d99cc66fb7e2abc9ffe4156', 'No'),
(19, 'Livia Artkins', 'Livia', 'User-Profile-1602.jpg', 'liviaartkins@hotmail.com', 757451020, 'd6a6bc0db10694a2d90e3a69648f3a03', 'No'),
(20, 'Shaun Artkins', 'Shaun', '', 'shaunartkins@hotmail.com', 712545335, 'd6a6bc0db10694a2d90e3a69648f3a03', 'No');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
