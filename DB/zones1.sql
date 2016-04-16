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
  `photo_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `worker_id` int(11) NOT NULL,
  `photo` longblob,
  `name_photo` varchar(500) NOT NULL,
  `type_photo` varchar(300) NOT NULL,
  `size_photo` int(20) NOT NULL,
  `date` varchar(100) NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 1, 2, '0.00', '00:00:16', '00:00:18', NULL),
(2, 2, 2, '0.00', '00:00:12', '00:00:25', NULL),
(3, 1, 2, '0.00', '00:10:11', '00:00:26', NULL),
(4, 1, 2, '0.00', '00:00:15', '00:00:25', NULL),
(7, 1, 1, '0.00', '00:12:00', '00:00:25', NULL),
(8, 2, 1, '0.00', '00:12:00', '00:00:26', NULL),
(9, 1, 1, '0.00', '00:08:00', '00:00:17', NULL),
(10, 2, 1, '0.00', '00:10:00', '00:00:23', NULL),
(11, 2, 1, '0.00', '00:00:10', '00:00:25', NULL),
(12, 1, 1, '0.00', '00:10:00', '00:00:29', NULL);

-- --------------------------------------------------------

--
-- Структура на таблица `statuses`
--

CREATE TABLE `statuses` (
  `status_id` int(11) NOT NULL,
  `status_name` int(1) NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `statuses`
--

INSERT INTO `statuses` (`status_id`, `status_name`, `date_deleted`) VALUES
(1, 0, NULL),
(2, 1, NULL);

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
(1, 'Иван', 'Иван', NULL),
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
(2, 'ул."Иванка Ботева"', 'От "Пошенска банка" до кръгоеото на площад "Благоев".', 10, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `worker_id` (`worker_id`),
  ADD KEY `zone_id` (`zone_id`);

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
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
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
  MODIFY `zone_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `fk_worker_id` FOREIGN KEY (`worker_id`) REFERENCES `workers` (`worker_id`),
  ADD CONSTRAINT `fk_zone2_id` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`zone_id`);

--
-- Ограничения за таблица `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `fk_status_id` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`status_id`),
  ADD CONSTRAINT `fk_zone_id` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`zone_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
