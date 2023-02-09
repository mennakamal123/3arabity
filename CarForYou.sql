-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 21, 2022 at 07:05 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `3arabity`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

DROP TABLE IF EXISTS `billing`;
CREATE TABLE IF NOT EXISTS `billing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rent_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rent_id` (`rent_id`),
  KEY `payment_method_id` (`payment_method_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.png',
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `image`, `name`, `active`) VALUES
(1, 'hyundai-logo.png', 'Hyundai', 1),
(2, 'bmw-logo.png', 'BMW', 1),
(3, 'range-rover-logo.png', 'Range Rover', 1),
(4, 'mercedes-logo.png', 'Mercedes', 1),
(5, 'toyota-logo.png', 'Toyota', 1),
(6, 'jac-logo.png', 'JAC', 1),
(7, 'opel-logo.png', 'Opel', 1),
(8, 'jaguar-logo.png', 'Jaguar', 1),
(13, 'dodge-logo.png', 'Dodge', 1),
(14, 'mg-logo.png', 'MG', 1),
(15, 'peugeot-logo.png', 'Peugeot', 1),
(16, 'kia-logo.png', 'KIA', 1),
(18, 'alfa-romeo-logo.png', 'Alfa Romeo', 1),
(19, 'renault-logo.png', 'Renault', 1),
(21, 'citroen-logo.png', 'Citroen', 1),
(22, 'chery-logo.png', 'Chery', 1),
(23, 'nissan-logo.png', 'Nissan', 1),
(24, 'chevrolet-logo.png', 'Chevrolet', 1),
(32, 'suzuki-logo.png', 'Suzuki', 1),
(36, 'subaru-logo.png', 'Subaru', 1),
(39, 'jeep-logo.png', 'Jeep', 1),
(40, 'tesla-logo.png', 'Tesla', 0),
(41, 'tesla-logo.png', 'Tesla', 1),
(42, 'skoda-logo.png', 'Skoda', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
CREATE TABLE IF NOT EXISTS `cars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.png',
  `model_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `plate_number` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `year_id` int(11) NOT NULL,
  `price_per_hour` float NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `model_id` (`model_id`),
  KEY `color_d` (`color_id`),
  KEY `year_id` (`year_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `image`, `model_id`, `color_id`, `plate_number`, `year_id`, `price_per_hour`, `active`) VALUES
(8, '123fff-photo.png', 2, 3, '123fff', 5, 3653, 1),
(10, '987jjj-photo.png', 6, 2, '987jjj', 2, 300, 1),
(12, '123ggg-photo.png', 5, 2, '123ggg', 1, 900, 1),
(13, '123lll-photo.png', 3, 1, '123lll', 6, 150, 1),
(14, '123jgg-photo.png', 9, 8, '123jgg', 1, 365, 1),
(15, '235dew-photo.png', 7, 6, '235dew', 1, 900, 1),
(16, '999lll-photo.png', 8, 6, '999lll', 1, 900, 1),
(17, '777hhh-photo.png', 4, 1, '777hhh', 1, 900, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.png',
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `image`, `name`, `active`) VALUES
(1, 'default.png', 'Cairo', 1),
(2, 'default.png', 'Alex', 1),
(3, 'default.png', 'Sharm El Sheikh', 1),
(4, 'default.png', 'Giza', 1),
(9, 'default.png', 'Luxor', 1),
(10, 'default.png', 'Matrouh', 1),
(11, 'default.png', 'Aswan', 1),
(12, 'default.png', 'Hurghada', 1),
(13, 'default.png', 'Marsa Alam', 1),
(14, 'monofia-logo.png', 'Monofia', 1),
(22, 'new-cairo-logo.png', 'Great Cairo', 1),
(24, 'suhag-logo.png', 'Suhag', 1),
(28, 'tanta-logo.png', 'Tanta', 0),
(29, 'default.png', 'Tanta', 1);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

DROP TABLE IF EXISTS `colors`;
CREATE TABLE IF NOT EXISTS `colors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `code` char(7) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `active`) VALUES
(1, 'White', '#FFFFFF', 1),
(2, 'Black', '#000000', 1),
(3, 'Blue', '#0000FF', 1),
(4, 'Green', '#008000', 1),
(5, 'Yellow', '#FFFF00', 1),
(6, 'Grey', '#808080', 1),
(7, 'Red', '#FF0000', 1),
(8, 'Brown', '#8B4513', 1),
(9, 'Silver', '#C0C0C0', 1),
(10, 'Gold', 'CA6F1E', 0),
(11, 'Navy Blue', '#000080', 1),
(12, 'Teal', '#008080', 1),
(13, 'Gold', '#FFD700', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'default.png',
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `phone` char(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bdate` date NOT NULL,
  `id_number` char(14) COLLATE utf8_unicode_ci NOT NULL,
  `id_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.png',
  `city_id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `city_id` (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `image`, `name`, `phone`, `address`, `email`, `bdate`, `id_number`, `id_image`, `city_id`, `active`) VALUES
(1, 'alice-logo.png', 'Alice', '01001234567', 'El-Maadi', 'alice@gmail.com', '1990-01-01', '11111', 'alice-id.png', 1, 1),
(2, 'jack-logo.png', 'Jack', '0122123456', 'Montazah', 'jack@gmail.com', '1999-02-05', '2222', 'jack-id.png', 2, 1),
(3, 'amir-logo.png', 'Amir', '0111233645', 'El-Zamalek', 'amir@gmail.com', '1995-02-06', '999999', 'amir-id.png', 1, 1),
(8, 'maria-logo.png', 'Maria', '0111233645', 'Nasr City', 'maria@gmail.com', '1999-05-02', '11111', 'maria-id.png', 1, 1),
(9, 'nagham-logo.png', 'Nagham', '012123456', 'El-Maadi', 'nagham@gmail.com', '1998-05-26', '6945', 'nagham-id.png', 1, 1),
(10, 'alice-logo.png', 'Alice', '01201234567', 'Neama Bay', 'alice@gmail.com', '1987-02-14', '269996', 'alice-id.png', 3, 1),
(11, 'default.png', 'Ali', '0111233645', 'El-Maadi', 'ali@gmail.com', '2222-02-22', '11111', 'default.png', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `active`) VALUES
(1, 'Sales', 1),
(2, 'IT', 1),
(3, 'Management', 1),
(4, 'Marketing', 1),
(5, 'Accounting', 1),
(6, 'HR', 1),
(7, 'R&D', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `phone` char(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  `basic_salary` float NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `department_id` (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `image`, `name`, `phone`, `address`, `email`, `department_id`, `basic_salary`, `active`) VALUES
(6, 'hazem-photo.png', 'Hazem', '01001234567', 'El-Zamalek', 'hazem@gmail.com', 5, 6000, 1),
(7, 'ali-photo.png', 'Ali', '0122123456', 'El-Maadi', 'ali@gmail.com', 3, 4000, 1),
(8, 'tarek-photo.png', 'Tarek', '01000', 'El-Giza', 'tarek@gmail.com', 3, 6000, 1),
(9, 'andy-photo.png', 'Andy', '01201234567', 'El-Maadi', 'andy@gmail.com', 3, 6000, 1),
(10, 'default.png', 'Hanan', '01001234567', 'ngerver', 'hanan@gmail.com', 5, 3000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

DROP TABLE IF EXISTS `model`;
CREATE TABLE IF NOT EXISTS `model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `brand_id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `brand_id` (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `name`, `brand_id`, `active`) VALUES
(2, 'Getz', 1, 1),
(3, 'Verna', 1, 1),
(4, 'Bayon', 1, 1),
(5, 'X6', 2, 1),
(6, 'Astra', 7, 1),
(7, 'X3', 2, 1),
(8, '301', 15, 1),
(9, 'S2', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

DROP TABLE IF EXISTS `payment_method`;
CREATE TABLE IF NOT EXISTS `payment_method` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id`, `name`, `active`) VALUES
(1, 'Debit Card', 1),
(2, 'Cash', 1),
(3, 'Credit Card', 1),
(4, 'Visa', 1),
(5, 'check', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rents`
--

DROP TABLE IF EXISTS `rents`;
CREATE TABLE IF NOT EXISTS `rents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `s_date` date NOT NULL,
  `e_date` date NOT NULL,
  `insurance_value` float NOT NULL,
  `total_value` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`) VALUES
(1, 'Hany Ali', 'hany-ali', '123'),
(2, 'Adel Ahmed', 'adel-ahmed', '123'),
(3, 'Ali', 'ali', '$2y$10$6e8hOX.uAffTHjZXnpXZ3.epkz28/E1vvyeYyM5.1Gq3gRu66qIoK');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

DROP TABLE IF EXISTS `years`;
CREATE TABLE IF NOT EXISTS `years` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `name`, `active`) VALUES
(1, '2022', 1),
(2, '2021', 1),
(4, '2020', 1),
(5, '2019', 1),
(6, '2018', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing`
--
ALTER TABLE `billing`
  ADD CONSTRAINT `billing_ibfk_1` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_method` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `billing_ibfk_2` FOREIGN KEY (`id`) REFERENCES `rents` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cars_ibfk_3` FOREIGN KEY (`year_id`) REFERENCES `years` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `model_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `rents`
--
ALTER TABLE `rents`
  ADD CONSTRAINT `rents_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rents_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
