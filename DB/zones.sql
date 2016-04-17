-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Версия на сървъра: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zones`
--

-- --------------------------------------------------------

--
-- Структура на таблица `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `worker_id` int(11) NOT NULL,
  `photo_dir` varchar(1000) NOT NULL,
  `photo_name` varchar(200) NOT NULL,
  `photo_type` varchar(100) NOT NULL,
  `reg_number` varchar(15) NOT NULL,
  `date` varchar(100) DEFAULT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `photos`
--

INSERT INTO `photos` (`id`, `zone_id`, `worker_id`, `photo_dir`, `photo_name`, `photo_type`, `reg_number`, `date`, `date_deleted`) VALUES
(35, 2, 1, 'DB/20160414_162854.jpg', '20160414_162854.jpg', 'image/jpeg', '', '16-April-2016, 1:54 pm', '2016-04-16'),
(36, 2, 1, 'DB/20160414_162836.jpg', '20160414_162836.jpg', 'image/jpeg', '', '16-April-2016, 2:58 pm', '2016-04-16'),
(37, 2, 1, 'DB/20160414_162816.jpg', '20160414_162816.jpg', 'image/jpeg', '', '16-April-2016, 3:42 pm', NULL),
(38, 2, 1, 'DB/20160414_162500.jpg', '20160414_162500.jpg', 'image/jpeg', '', '16-April-2016, 4:28 pm', NULL),
(39, 2, 1, 'DB/20160414_162816.jpg', '20160414_162816.jpg', 'image/jpeg', '', '16-April-2016, 10:29 pm', NULL),
(40, 1, 1, '', '', '', '', NULL, NULL),
(41, 1, 1, '', '', '', '', NULL, NULL),
(42, 1, 1, '', '', '', '', NULL, NULL),
(43, 1, 1, '', '', '', '', NULL, NULL),
(44, 1, 1, '', '', '', '', NULL, NULL),
(45, 1, 1, '', '', '', '', NULL, NULL),
(46, 1, 1, '', '', '', '', NULL, NULL),
(47, 1, 1, '', '', '', '', NULL, NULL),
(48, 1, 1, '', '', '', '', NULL, NULL),
(49, 1, 1, '', '', '', '', NULL, NULL),
(50, 1, 1, '', '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура на таблица `places`
--

CREATE TABLE `places` (
  `place_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `price` decimal(4,2) NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `places`
--

INSERT INTO `places` (`place_id`, `zone_id`, `status_id`, `price`, `time_start`, `time_end`, `date_deleted`) VALUES
(1, 1, 1, '0.00', '00:00:00', '00:00:00', NULL),
(2, 2, 2, '0.00', '00:00:12', '00:00:25', NULL),
(3, 1, 2, '0.00', '00:10:11', '00:00:26', NULL),
(4, 1, 2, '0.00', '00:00:15', '00:00:25', NULL),
(7, 1, 2, '0.00', '12:14:44', '00:00:25', NULL),
(8, 2, 1, '0.00', '00:12:00', '00:00:26', NULL),
(9, 1, 1, '0.00', '00:08:00', '00:00:17', NULL),
(10, 2, 1, '0.00', '00:10:00', '00:00:23', NULL),
(11, 2, 1, '0.00', '00:00:10', '00:00:25', NULL),
(12, 1, 1, '0.00', '00:10:00', '00:00:29', NULL),
(13, 3, 1, '0.00', '00:00:06', '00:00:10', NULL),
(14, 3, 2, '0.00', '00:00:05', '00:00:07', NULL),
(15, 2, 1, '0.00', '00:00:02', '00:00:08', NULL);

-- --------------------------------------------------------

--
-- Структура на таблица `statuses`
--

CREATE TABLE `statuses` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(100) NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `statuses`
--

INSERT INTO `statuses` (`status_id`, `status_name`, `date_deleted`) VALUES
(1, 'Свободно', NULL),
(2, 'Заето', NULL);

-- --------------------------------------------------------

--
-- Структура на таблица `workers`
--

CREATE TABLE `workers` (
  `worker_id` int(11) NOT NULL,
  `worker_name` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `workers`
--

INSERT INTO `workers` (`worker_id`, `worker_name`, `password`, `date_deleted`) VALUES
(1, 'Ivan', 'Ivan', NULL),
(2, 'Мими', 'Мими', NULL);

-- --------------------------------------------------------

--
-- Структура на таблица `zones`
--

CREATE TABLE `zones` (
  `zone_id` int(11) NOT NULL,
  `zone_address` varchar(500) NOT NULL,
  `zone_description` text NOT NULL,
  `zone_places` int(10) NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `zones`
--

INSERT INTO `zones` (`zone_id`, `zone_address`, `zone_description`, `zone_places`, `date_deleted`) VALUES
(1, 'ул."Христо Ботев" 12', 'От паркинга зад площад "Христо Ботев" до пешеходната зона.', 10, NULL),
(2, 'ул."Иванка Ботева"', 'От "Пошенска банка" до кръгоеото на площад "Благоев".', 10, NULL),
(3, 'пл."Родина"', 'Площад "Родина"', 21, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zone_id` (`zone_id`,`worker_id`),
  ADD KEY `fk_worker_id` (`worker_id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`place_id`),
  ADD KEY `zone_id` (`zone_id`),
  ADD KEY `status_id` (`status_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `worker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `zone_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `fk_worker_id` FOREIGN KEY (`worker_id`) REFERENCES `workers` (`worker_id`);

--
-- Ограничения за таблица `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `fk_status_id` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`status_id`),
  ADD CONSTRAINT `fk_zone_id` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`zone_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
