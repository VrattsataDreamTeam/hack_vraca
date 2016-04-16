-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2016 at 06:03 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zones`
--

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
`id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `worker_id` int(11) NOT NULL,
  `photo_dir` varchar(1000) NOT NULL,
  `photo_name` varchar(200) NOT NULL,
  `photo_type` varchar(100) NOT NULL,
  `date` varchar(100) DEFAULT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `zone_id`, `worker_id`, `photo_dir`, `photo_name`, `photo_type`, `date`, `date_deleted`) VALUES
(35, 2, 1, 'DB/20160414_162854.jpg', '20160414_162854.jpg', 'image/jpeg', '16-April-2016, 1:54 pm', '2016-04-16'),
(36, 2, 1, 'DB/20160414_162836.jpg', '20160414_162836.jpg', 'image/jpeg', '16-April-2016, 2:58 pm', '2016-04-16'),
(37, 2, 1, 'DB/20160414_162816.jpg', '20160414_162816.jpg', 'image/jpeg', '16-April-2016, 3:42 pm', '2016-04-16'),
(38, 2, 1, 'DB/20160414_162500.jpg', '20160414_162500.jpg', 'image/jpeg', '16-April-2016, 4:28 pm', NULL),
(47, 2, 1, '', '', '', NULL, NULL),
(48, 2, 1, '', '', '', NULL, NULL),
(49, 2, 1, '', '', '', NULL, NULL),
(50, 2, 1, '', '', '', NULL, NULL),
(51, 2, 1, '', '', '', NULL, NULL),
(52, 2, 1, '', '', '', NULL, NULL),
(53, 2, 1, '', '', '', NULL, NULL),
(54, 2, 1, '', '', '', NULL, NULL),
(55, 2, 1, '', '', '', NULL, NULL),
(56, 2, 1, '', '', '', NULL, NULL),
(57, 2, 1, '', '', '', NULL, NULL),
(58, 2, 1, '', '', '', NULL, NULL),
(59, 2, 1, '', '', '', NULL, NULL),
(60, 2, 1, '', '', '', NULL, NULL),
(61, 2, 1, '', '', '', NULL, NULL),
(62, 2, 1, '', '', '', NULL, NULL),
(63, 2, 1, '', '', '', NULL, NULL),
(64, 2, 1, '', '', '', NULL, NULL),
(65, 2, 1, '', '', '', NULL, NULL),
(66, 2, 1, '', '', '', NULL, NULL),
(67, 2, 1, 'DB/c.jpeg', 'c.jpeg', 'image/jpeg', '16-April-2016, 6:18 pm', NULL),
(68, 2, 1, 'DB/a.jpg', 'a.jpg', 'image/jpeg', '16-April-2016, 6:21 pm', NULL),
(69, 2, 1, 'DB/c.jpeg', 'c.jpeg', 'image/jpeg', '16-April-2016, 6:24 pm', NULL),
(70, 1, 1, '', '', '', NULL, NULL),
(71, 1, 1, '', '', '', NULL, NULL),
(72, 1, 1, '', '', '', NULL, NULL),
(73, 1, 1, '', '', '', NULL, NULL),
(74, 1, 1, '', '', '', NULL, NULL),
(75, 1, 1, '', '', '', NULL, NULL),
(76, 1, 1, 'DB/Darth_Vader-128.png', 'Darth_Vader-128.png', 'image/png', '16-April-2016, 6:28 pm', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE IF NOT EXISTS `places` (
`place_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `price` decimal(4,2) NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`place_id`, `zone_id`, `status_id`, `price`, `time_start`, `time_end`, `date_deleted`) VALUES
(1, 1, 2, '2.00', '06:25:52', '09:25:52', NULL),
(2, 2, 1, '0.00', '00:00:12', '00:00:25', NULL),
(3, 1, 2, '0.00', '00:10:11', '00:00:26', NULL),
(4, 1, 2, '0.00', '00:00:15', '00:00:25', NULL),
(7, 1, 2, '0.00', '05:58:33', '00:00:25', NULL),
(8, 2, 2, '2.00', '06:06:19', '07:06:19', NULL),
(9, 1, 1, '0.00', '00:08:00', '00:00:17', NULL),
(10, 2, 1, '0.00', '00:10:00', '00:00:23', NULL),
(11, 2, 1, '0.00', '00:00:10', '00:00:25', NULL),
(12, 1, 1, '0.00', '00:10:00', '00:00:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
`status_id` int(11) NOT NULL,
  `status_name` varchar(100) NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`status_id`, `status_name`, `date_deleted`) VALUES
(1, 'Свободно', NULL),
(2, 'Заето', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE IF NOT EXISTS `workers` (
`worker_id` int(11) NOT NULL,
  `worker_name` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`worker_id`, `worker_name`, `password`, `date_deleted`) VALUES
(1, 'ivan', 'ivan', NULL),
(2, 'Мими', 'Мими', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE IF NOT EXISTS `zones` (
`zone_id` int(11) NOT NULL,
  `zone_address` varchar(500) NOT NULL,
  `zone_description` text NOT NULL,
  `zone_places` int(10) NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`zone_id`, `zone_address`, `zone_description`, `zone_places`, `date_deleted`) VALUES
(1, 'ул."Христо Ботев" 12', 'От паркинга зад площад "Христо Ботев" до пешеходната зона.', 10, NULL),
(2, 'ул."Иванка Ботева"', 'От "Пошенска банка" до кръгоеото на площад "Благоев".', 10, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
 ADD PRIMARY KEY (`id`), ADD KEY `zone_id` (`zone_id`,`worker_id`), ADD KEY `fk_worker_id` (`worker_id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
 ADD PRIMARY KEY (`place_id`), ADD KEY `zone_id` (`zone_id`), ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
 ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
 ADD PRIMARY KEY (`worker_id`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
 ADD PRIMARY KEY (`zone_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
MODIFY `worker_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
MODIFY `zone_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
ADD CONSTRAINT `fk_worker_id` FOREIGN KEY (`worker_id`) REFERENCES `workers` (`worker_id`);

--
-- Constraints for table `places`
--
ALTER TABLE `places`
ADD CONSTRAINT `fk_status_id` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`status_id`),
ADD CONSTRAINT `fk_zone_id` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`zone_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
