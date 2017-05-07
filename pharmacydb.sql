-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 07, 2017 at 11:12 PM
-- Server version: 5.7.16
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `pass` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE `link` (
  `id` int(10) NOT NULL,
  `idDrug` int(10) NOT NULL,
  `idPharmacy` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`id`, `idDrug`, `idPharmacy`, `price`) VALUES
(1, 1, 1, 200),
(2, 1, 2, 200),
(6, 1, 8, 0),
(8, 3, 8, 0),
(9, 4, 8, 0),
(10, 5, 8, 0),
(11, 2, 5, 200);

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL DEFAULT '41.338524',
  `lng` float(10,6) NOT NULL DEFAULT '69.334534',
  `type` varchar(30) NOT NULL DEFAULT 'type'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES
(2, '', 'yunusobod', 41.338524, 69.334534, 'type'),
(3, '', 'yunusobod', 41.338524, 69.334534, 'type'),
(4, '', 'mirzo ulugbek', 41.338524, 69.334534, 'type'),
(5, 'pharmacy LLT', 'Tashkent', 41.338524, 69.334534, 'type'),
(8, 'test', 'Tashkent', 41.338524, 69.334534, 'type');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `UserId` int(10) NOT NULL,
  `UserName` varchar(500) NOT NULL DEFAULT 'Username',
  `UserAddress` varchar(500) NOT NULL DEFAULT 'Tashkent',
  `UserContact` varchar(500) NOT NULL DEFAULT '+998901234567',
  `UserEmail` varchar(60) NOT NULL,
  `UserPass` varchar(255) NOT NULL,
  `UserINN` varchar(100) NOT NULL,
  `UserINNpic` varchar(100) NOT NULL,
  `UserPhoto` varchar(100) NOT NULL DEFAULT 'img.png',
  `UserActivation` int(10) NOT NULL DEFAULT '0',
  `UserPharmacyName` varchar(300) NOT NULL,
  `UserWorkHours` varchar(200) NOT NULL DEFAULT '09:00 - 23:00',
  `lat` float(10,6) NOT NULL DEFAULT '41.338524',
  `lng` float(10,6) NOT NULL DEFAULT '69.334534'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacy`
--

INSERT INTO `pharmacy` (`UserId`, `UserName`, `UserAddress`, `UserContact`, `UserEmail`, `UserPass`, `UserINN`, `UserINNpic`, `UserPhoto`, `UserActivation`, `UserPharmacyName`, `UserWorkHours`, `lat`, `lng`) VALUES
(1, 'Ahad', 'Yunusobad', '+998941281166', 'ahad@gmail.com', 'password', '123456789', '', '', 1, 'Apteka LLC', '08:00 - 23:00', 41.338524, 70.334534),
(2, 'Jakhongir', 'Hamza', '+998941281166', 'joxa@gmail.com', 'password', '123456777', '', '', 1, 'Pharmacy LLT', '09:00 - 22:00', 40.338524, 69.334534),
(3, 'Azim', 'Chilonzor', '+998934573433', 'azim@gmail.com', 'password', '1234566666', '123456789.jpg', 'dsfdsfhghghg.jpeg', 1, 'Dorixona MLT', '08:00 - 23:00', 41.341869, 69.335716),
(4, 'Jamshid', 'Mirzo Ulugbek', '+998901371500', 'jamshid@mail.ru', 'password', '1234567887', '123456788.jpg', 'img.png', 0, 'INHA LLP', '09:00 - 23:00', 41.368618, 69.288666);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product` varchar(200) NOT NULL,
  `price` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product`, `price`) VALUES
(1, 'PROLOID	THYROGLOBULIN', '20000'),
(2, 'DIETHYLSTILBESTROL', '12657'),
(3, 'BETHANECHOL CHLORIDE', '26779'),
(4, 'ESTROGENS', '6500'),
(5, 'ALKAVERVIR', '12000'),
(6, 'AMINOPHYLLINE', '15000'),
(7, 'HEPARIN', '345'),
(8, 'METANDREN', '4500');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `link`
--
ALTER TABLE `link`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pharmacy`
--
ALTER TABLE `pharmacy`
  MODIFY `UserId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
