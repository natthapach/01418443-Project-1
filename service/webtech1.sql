-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2018 at 05:29 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webtech1`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `user_name` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`user_name`, `password`, `role_id`) VALUES
('admin0', '9999', 'Ad'),
('user1', '1234', 'A'),
('user2', '1234', 'O');

-- --------------------------------------------------------

--
-- Table structure for table `attendants`
--

CREATE TABLE `attendants` (
  `id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birth_date` datetime NOT NULL,
  `regis_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendants`
--

INSERT INTO `attendants` (`id`, `user_name`, `first_name`, `last_name`, `gender`, `email`, `phone`, `address`, `birth_date`, `regis_date`) VALUES
(2, 'user1', 'Kitty', 'KiKi', 'female', 'kitty.k@ku.th', '0812345678', '01/23 address', '2015-03-12 00:00:00', '2018-02-23 16:05:48');

-- --------------------------------------------------------

--
-- Table structure for table `attendences`
--

CREATE TABLE `attendences` (
  `attendant_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `attended_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pay_proof_path` varchar(255) NOT NULL,
  `attentded_code` varchar(255) NOT NULL,
  `is_checkin` bit(1) NOT NULL DEFAULT b'0',
  `rate` float NOT NULL,
  `status_id` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `attendences_status`
--

CREATE TABLE `attendences_status` (
  `id` varchar(2) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` varchar(3) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
('Se', 'Seminar');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `event_id` int(11) NOT NULL,
  `comment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `organizer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `information` text NOT NULL,
  `place` varchar(255) NOT NULL,
  `google_map_link` varchar(255) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `event_start_date` datetime NOT NULL,
  `event_finish_date` datetime NOT NULL,
  `price` double NOT NULL,
  `close_date` datetime NOT NULL,
  `google_form` varchar(255) NOT NULL,
  `max_attendents` int(11) NOT NULL,
  `category_id` varchar(3) NOT NULL,
  `max_age` int(11) NOT NULL,
  `min_age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `organizer_id`, `name`, `information`, `place`, `google_map_link`, `create_date`, `event_start_date`, `event_finish_date`, `price`, `close_date`, `google_form`, `max_attendents`, `category_id`, `max_age`, `min_age`) VALUES
(1, 1, 'ComSci Summit 2018', 'Seminar Topic\r\n- Everyday life in Computer Science\r\n- How to be survivor\r\n\r\nDate\r\n4 March 2018 9.00-18.00\r\n\r\nFree Launch!!', 'SCL-303 Kasetsart University ', '-', '2018-02-23 16:24:43', '2018-03-04 09:00:00', '2018-03-04 18:00:00', 200, '2018-02-27 12:00:00', '-', 20, 'Se', 25, 20);

-- --------------------------------------------------------

--
-- Table structure for table `organizer`
--

CREATE TABLE `organizer` (
  `id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `website` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organizer`
--

INSERT INTO `organizer` (`id`, `user_name`, `name`, `email`, `phone`, `website`, `facebook`) VALUES
(1, 'user2', 'AE company', 'events@ae.com', '+66912345678', 'www.ae.com', 'AE company');

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `event_id` int(11) NOT NULL,
  `picture_number` int(11) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pre_condition_event`
--

CREATE TABLE `pre_condition_event` (
  `event_id` int(11) NOT NULL,
  `pre_event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` varchar(2) NOT NULL,
  `name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
('A', 'Attendants'),
('Ad', 'Admin'),
('O', 'Organizer');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `event_id` int(11) NOT NULL,
  `video_number` int(11) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`user_name`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `attendants`
--
ALTER TABLE `attendants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_name` (`user_name`),
  ADD KEY `user_name_2` (`user_name`);

--
-- Indexes for table `attendences`
--
ALTER TABLE `attendences`
  ADD PRIMARY KEY (`attendant_id`,`event_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `attendences_status`
--
ALTER TABLE `attendences_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_name` (`user_name`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organizer_id` (`organizer_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `organizer`
--
ALTER TABLE `organizer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_name` (`user_name`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`event_id`,`picture_number`);

--
-- Indexes for table `pre_condition_event`
--
ALTER TABLE `pre_condition_event`
  ADD PRIMARY KEY (`event_id`,`pre_event_id`),
  ADD KEY `pre_event_id` (`pre_event_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`event_id`,`video_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendants`
--
ALTER TABLE `attendants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `organizer`
--
ALTER TABLE `organizer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Constraints for table `attendants`
--
ALTER TABLE `attendants`
  ADD CONSTRAINT `attendants_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `account` (`user_name`);

--
-- Constraints for table `attendences`
--
ALTER TABLE `attendences`
  ADD CONSTRAINT `attendences_ibfk_1` FOREIGN KEY (`attendant_id`) REFERENCES `attendants` (`id`),
  ADD CONSTRAINT `attendences_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  ADD CONSTRAINT `attendences_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `attendences_status` (`id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `account` (`user_name`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`organizer_id`) REFERENCES `organizer` (`id`),
  ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `organizer`
--
ALTER TABLE `organizer`
  ADD CONSTRAINT `organizer_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `account` (`user_name`);

--
-- Constraints for table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `picture_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`);

--
-- Constraints for table `pre_condition_event`
--
ALTER TABLE `pre_condition_event`
  ADD CONSTRAINT `pre_condition_event_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  ADD CONSTRAINT `pre_condition_event_ibfk_2` FOREIGN KEY (`pre_event_id`) REFERENCES `event` (`id`);

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
