-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2024 at 08:50 PM
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
-- Database: `getdetails`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `manuf` (IN `n` VARCHAR(50), IN `ad` VARCHAR(100), IN `cont` VARCHAR(50))   BEGIN
INSERT INTO manufacture SET id=null, name=n, address=ad, contact=cont;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `productf` (IN `n` VARCHAR(100), IN `p` INT(10), IN `mid` INT(10))   BEGIN
    INSERT INTO product SET id=null, name=n, price=p, manufactur_id=mid;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `manufacture`
--

CREATE TABLE `manufacture` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manufacture`
--

INSERT INTO `manufacture` (`id`, `name`, `address`, `contact`) VALUES
(4, 'asua', 'usa', '1+954+9'),
(5, 'mac', 'usa', '48648'),
(7, 'galib', 'dhaka', '14120564'),
(8, 'admin', 'bogura', '2589631');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(5) NOT NULL,
  `manufactur_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `manufactur_id`) VALUES
(1, 'dell e69', 256314, 1),
(2, 'dell e69', 125000, 1),
(3, 'x441ua', 42000, 4);

--
-- Triggers `product`
--
DELIMITER $$
CREATE TRIGGER `del_pr` AFTER DELETE ON `product` FOR EACH ROW DELETE FROM product WHERE manufacture_id = old.id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `product_details`
-- (See below for the actual view)
--
CREATE TABLE `product_details` (
`name` varchar(50)
,`price` int(5)
,`manufactur_id` int(10)
,`manuN` varchar(50)
,`address` varchar(100)
,`contact` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `product_details`
--
DROP TABLE IF EXISTS `product_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_details`  AS SELECT `product`.`name` AS `name`, `product`.`price` AS `price`, `product`.`manufactur_id` AS `manufactur_id`, `manufacture`.`name` AS `manuN`, `manufacture`.`address` AS `address`, `manufacture`.`contact` AS `contact` FROM (`product` join `manufacture`) WHERE `product`.`manufactur_id` = `manufacture`.`id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manufacture`
--
ALTER TABLE `manufacture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manufacture`
--
ALTER TABLE `manufacture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
