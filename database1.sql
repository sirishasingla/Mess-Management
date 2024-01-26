-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2024 at 05:31 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database1`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `sno` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `tstamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`sno`, `message`, `tstamp`) VALUES
(1, 'tomorrow breakfast timings are 8:30 to 9:30', '2023-11-10 11:56:27'),
(2, 'tomorrow lunch time 1 to 2:30pm', '2023-11-17 16:56:17'),
(16, 'Tmrw mess timings:\r\nBreakfast- 8:00 -9:00 am\r\nLunch-12:30-2:00 pm\r\nDinner- 8-9pm', '2023-11-10 16:25:32'),
(17, 'tomorrow mess will remain close', '2023-11-17 16:55:25');

-- --------------------------------------------------------

--
-- Table structure for table `foodwastage`
--

CREATE TABLE `foodwastage` (
  `tstamp` time NOT NULL DEFAULT current_timestamp(),
  `Amount` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foodwastage`
--

INSERT INTO `foodwastage` (`tstamp`, `Amount`) VALUES
('00:00:00', '50Kg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('sirisha', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `login2`
--

CREATE TABLE `login2` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login2`
--

INSERT INTO `login2` (`id`, `username`, `password`, `usertype`) VALUES
(2, 'admin', 'admin123', 'admin'),
(3, 'user', 'user123', 'user'),
(4, 'sirisha', 'sirisha', 'user'),
(5, 'tushani', 'tushani', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `sno` int(2) NOT NULL,
  `Day` varchar(10) NOT NULL,
  `Meal` varchar(15) NOT NULL,
  `Food` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`sno`, `Day`, `Meal`, `Food`) VALUES
(1, 'Monday', 'Breakfast', 'Dal Parantha, Aloo Pyaaz sandwich, Poha, eggs'),
(2, 'Monday', 'Lunch', 'Matar Paneer, Moongidhuli dal, \r\nCucumber raita, Rice, Salad'),
(3, 'Monday', 'Dinner', 'Malai Kofta/ Dum aloo,\r\nPanchratan dal, \r\nDrycake'),
(4, 'Tuesday', 'Breakfast', 'Aloo Pyaaz Parantha, Paneer Sandwich, \r\nSweet and Sour corn, Boiled Eggs'),
(5, 'Tuesday', 'Lunch', 'Stuffed Kulcha/Pav Bhaji, \r\nVadapav, Dal, Rice, Chutney'),
(6, 'Tuesday', 'Dinner', 'Mix Veg/Bhindi, Moongi Masari dal, \r\nKheer/Seviyan'),
(7, 'Wednesday', 'Breakfast', 'Mix Parantha, Corn Sandwich, Daliya'),
(8, 'Wednesday', 'Lunch', 'Rajmah Rice, salad'),
(9, 'Wednesday', 'Dinner', 'Shahi Paneer,Naan/ Paneer Bhurji,  Rasgulla'),
(10, 'Thursday', 'Breakfast', 'Paneer Parantha, Upma'),
(11, 'Thursday', 'Lunch', 'Dal makhani, salad'),
(12, 'Thursday', 'Dinner', 'Chana Masala, Sooji Halwa'),
(13, 'Friday', 'Breakfast', 'Aloo Parantha, Sweet Corn, Macroni'),
(14, 'Friday', 'Lunch', 'Arhar dal, Aloo Gobhi, Rice'),
(15, 'Friday', 'Dinner', 'Sookhe aloo matar, Gulab Jamun'),
(16, 'Saturday', 'Breakfast', 'Bread Pakora/Bread Roll, Cutlet, Imli Chutney'),
(17, 'Saturday', 'Lunch', 'Roongi/Blackchana, Baingan, salad'),
(18, 'Saturday', 'Dinner', 'Saag, makki roti/Palak Paneer, Moti chur ladoo'),
(19, 'Sunday', 'Breakfast', 'Paneer Parantha, Mix Veg Sandwich, Pasta'),
(20, 'Sunday', 'Lunch', 'Aloo puri/ Channe Bhature, Boondi Raita, Rice, Chutney'),
(21, 'Sunday', 'Dinner', 'Veg Biryani, Soya champ Masala+fried rice, Jalebi');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `sno` int(11) NOT NULL,
  `title` varchar(5) NOT NULL,
  `description` text NOT NULL,
  `location` text NOT NULL,
  `tstamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`sno`, `title`, `description`, `location`, `tstamp`) VALUES
(1, 'Found', 'samsung phone', 'mess table', '2023-11-05 15:35:10'),
(8, 'Lost', '80W charger', 'common room', '2023-11-05 18:22:36'),
(9, 'Found', 'white coloured cello water bottle', 'Hostel garden', '2023-11-05 18:23:07'),
(10, 'Lost', 'blue coloured spectacles', 'Hostel Mess', '2023-11-05 18:23:58'),
(11, 'Found', 'testing', 'testing12345', '2023-11-05 18:24:45');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `sno` int(11) NOT NULL,
  `rollno` int(10) NOT NULL,
  `request` varchar(70) NOT NULL,
  `date` date NOT NULL,
  `tstamp` datetime NOT NULL DEFAULT current_timestamp(),
  `username` varchar(25) NOT NULL,
  `status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`sno`, `rollno`, `request`, `date`, `tstamp`, `username`, `status`) VALUES
(1, 123123123, 'khichdi in dinner', '2023-11-11', '2023-11-10 22:24:01', 'sirisha', 'accepted'),
(2, 12121212, 'daal in lunch', '2023-11-12', '2023-11-11 14:14:48', 'user', 'accepted'),
(10, 1212, 'sfs', '0000-00-00', '2023-11-11 14:49:39', '', 'rejected'),
(11, 49, 'random', '2023-11-12', '2023-11-11 15:00:14', 'sirisha', 'rejected'),
(12, 50, 'random message form user', '2023-11-13', '2023-11-11 15:01:04', 'user', 'rejected'),
(13, 704, 'request from tushani', '2023-11-12', '2023-11-11 15:02:01', 'tushani', 'Pending'),
(16, 123, 'need khichdi in lunch', '2023-11-18', '2023-11-17 16:58:13', 'user', 'accepted'),
(17, 123, 'need khichdi in lunch', '2023-11-18', '2023-11-17 17:03:57', 'user', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `unavailability`
--

CREATE TABLE `unavailability` (
  `sno` int(11) NOT NULL,
  `username` varchar(37) NOT NULL,
  `rollno` int(10) NOT NULL,
  `meal` varchar(9) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unavailability`
--

INSERT INTO `unavailability` (`sno`, `username`, `rollno`, `meal`, `date`) VALUES
(1, 'sirisha', 102102012, 'Breakfast', '2023-11-14'),
(10, 'sirisha', 1212, 'Lunch', '2023-11-15'),
(11, 'sirisha', 1212, 'Lunch', '2023-11-15'),
(12, 'user', 103103013, 'Dinner', '2023-11-14'),
(13, 'user', 123456, 'Lunch', '2023-11-29'),
(14, 'user', 123456, 'Lunch', '2023-11-29'),
(15, 'user', 3333, 'Breakfast', '2023-11-28'),
(16, 'user', 44444, 'Dinner', '2023-11-28'),
(17, 'user', 222, 'Dinner', '2023-11-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `login2`
--
ALTER TABLE `login2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `unavailability`
--
ALTER TABLE `unavailability`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `login2`
--
ALTER TABLE `login2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `sno` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `unavailability`
--
ALTER TABLE `unavailability`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
