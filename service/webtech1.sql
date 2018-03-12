-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2018 at 05:09 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `role_id` varchar(2) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`user_name`, `password`, `role_id`, `profile`, `status`) VALUES
('admin0', '9999', 'Ad', 'admin0-profile.jpg', ''),
('banana', '$2y$10$d.YRSNTzNPvYCqTGt.MW/OVh4zumckk7tMyDOqjNgZ0CeJl0a7Vb.', 'A', '', 'Active'),
('bird', '$2y$10$OtJLHKlA/ZokQtKkwHzVyuK8Oa2d8DLuXfS84BTg83YDKapnG3OAa', 'A', '', 'Active'),
('bootsakorn', '$2y$10$Y6o5x9OSv2Skk22d3RPm1u40ut1CWFXibByOTi2Em4S0qPQ6wtRm6', 'O', '', 'Active'),
('chotika', '$2y$10$0VzWaeJhzWZy2q95WFE8quXkyHmZs1FQAimqCjOZElWLavhMSx9Iq', 'A', '', 'Active'),
('ittikorn', '$2y$10$0LQgdrQo7L3o7sw1kJfVEu6KI7zOG/wnxZLTlHG8cRXMZ6wMOZmOy', 'A', '', 'Active'),
('ittikorn1', '$2y$10$2G5HqB7dEAf30bQTdumxZ.oFYmKARrMTTviWzWgMHdKnAPObABcay', 'A', '', 'Active'),
('ktkitty', '$2y$10$Vtf1kf2pP9INcs1FF2cbjeuBBCcK3dPmaoyqYxMTvIepj4KvoS6Zi', 'Ad', '', 'Active'),
('kuromi', '$2y$10$Q1ukfjerjKFjK0hKkL4NVeW8OZjsNnjfaulsTiu26DHl6nI8y9.iW', 'A', '', 'Active'),
('mhee', '$2y$10$DRy/Psfts2utBgXlvPGNaeoI/L4v4YECaez8rYuAuZD8DhOJqd63a', 'A', '', 'Active'),
('natchaneeya', '$2y$10$sybR6r09.TZzxndNSvmHxeOlOc7fm0ZsBCSdl6zwPriCqb5MBxmWO', 'A', '', 'Active'),
('nattapach', '$2y$10$MvD8sDBIEOCQIj6PK.Q4ROJBSu2fGQnr44n.f0pjqXnb4tIAkDeNC', 'O', '', 'Active'),
('noinar', '$2y$10$LaXMaJMk9H9Lov1EN9AgW.jJpqXOd002Pv0ijJCn0lEYonF8ZVAsK', 'O', '', 'Active'),
('organizer01', '1234', 'O', 'organizer01-profile.jpg', ''),
('pooh', '$2y$10$Lx/eJW/cD2GpdyvrH6VmR.VXjSYOvFQI0rtOyvlcF9Rc4BvP.VLxK', 'A', '', 'Active'),
('sasithorn', '$2y$10$ptuGc4HhO3vWIAwh7jJfBeg1quqlYA/fRlzZ57tLSlBCML5W.LgUa', 'O', '', 'Active'),
('user1', '1234', 'A', 'user1-profile.jpg', ''),
('user2', '1234', 'A', 'user2-profile.png', ''),
('wiwadh', '$2y$10$V8IkqbspoJmbMaehVKarRuxDRMtXWcz86WgAGTKLJ3vqI0wNnokb6', 'O', '', 'Active');

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
(2, 'user1', 'Kitty', 'KiKi', 'female', 'kitty.k@ku.th', '0812345678', '01/23 address', '2015-03-12 00:00:00', '2018-02-23 16:05:48'),
(3, 'user2', 'Dream', 'hihi', 'female', 'dream@ku.th', '0812345678', 'firdge', '1996-08-09 00:00:00', '2018-03-07 05:29:45'),
(4, 'ktkitty', 'kitty', 'Sri', 'female', 'kitty@gmail.com', '0851119876', '122 à¸£à¹ˆà¸¡à¹€à¸à¸¥à¹‰à¸²19/9 à¹€à¸‚à¸•à¸¥à¸²à¸”à¸à¸£à¸°à¸šà¸±à¸‡ à¸à¸—à¸¡. 11100', '2018-03-12 00:00:00', '2018-03-12 12:55:46'),
(5, 'chotika', 'chotika', 'luarngorachorn', 'female', 'chotika@gmail.com', '0879272556', 'bangkok', '2000-06-19 00:00:00', '2018-03-12 15:25:53'),
(6, 'natchaneeya', 'natchaneeya', 'natchaneeya', 'female', 'natchaneeya@gmail.com', '0852234344', 'à¹€à¸Šà¸µà¸¢à¸‡à¹ƒà¸«à¸¡à¹ˆ', '2004-09-14 00:00:00', '2018-03-12 15:33:46'),
(7, 'banana', 'minion', 'yellow', 'male', 'banana@gmail.com', '0837998862', 'à¸¢à¸°à¸¥à¸² 19009', '2000-07-10 00:00:00', '2018-03-12 15:41:19'),
(8, 'mhee', 'mheemhee', 'kuku', 'male', 'mhee@gmail.com', '0815429299', 'à¸à¸—à¸¡.', '1995-08-26 00:00:00', '2018-03-12 15:49:09'),
(9, 'bird', 'worakorn', 'wora', 'male', 'bird@gmail.com', '0879926651', 'à¸šà¸²à¸‡à¸›à¸°à¸­à¸´à¸™ à¸à¸—à¸¡.', '1996-06-09 00:00:00', '2018-03-12 15:51:09'),
(10, 'kuromi', 'kuromi', 'kuromi', 'female', 'kuromi@gmail.com', '0879987564', 'à¸à¸—à¸¡.', '1984-06-11 00:00:00', '2018-03-12 15:53:28'),
(11, 'pooh', 'mheepooh', 'pooh', 'male', 'pooh@gmail.com', '0894762212', 'à¸šà¸²à¸‡à¹ƒà¸«à¸à¹ˆ à¸à¸—à¸¡.', '1999-12-18 00:00:00', '2018-03-12 16:00:39'),
(13, 'ittikorn1', 'ittikorn', 'ittikorn', 'male', 'ittikorn@gmail.com', '0896732821', 'à¸­à¹€à¸§à¸™à¸´à¸§ à¹€à¸à¸©à¸•à¸£à¸™à¸§à¸¡à¸´à¸™à¸—à¸£à¹Œ à¸à¸—à¸¡.', '1993-10-20 00:00:00', '2018-03-12 16:07:22');

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

--
-- Dumping data for table `attendences`
--

INSERT INTO `attendences` (`attendant_id`, `event_id`, `attended_date`, `pay_proof_path`, `attentded_code`, `is_checkin`, `rate`, `status_id`) VALUES
(2, 1, '2018-03-12 07:13:10', '', '2-1', b'0', 0, 'C'),
(2, 4, '2018-03-07 16:00:30', '2-4.jpg', '2-4', b'0', 0, 'P'),
(3, 1, '2018-03-12 10:29:56', '3-1.jpg', '3-1', b'0', 0, 'R'),
(3, 5, '2018-03-12 10:25:50', '', '', b'0', 0, 'R'),
(3, 9, '2018-03-12 15:26:16', '', '', b'0', 0, 'W');

-- --------------------------------------------------------

--
-- Table structure for table `attendences_status`
--

CREATE TABLE `attendences_status` (
  `id` varchar(2) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendences_status`
--

INSERT INTO `attendences_status` (`id`, `name`) VALUES
('C', 'confirm'),
('P', 'paid'),
('R', 'cancle'),
('W', 'waiting');

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
('A', 'Art'),
('C', 'Concert'),
('Ct', 'Contest'),
('F', 'Festival'),
('H', 'Health'),
('Mu', 'Music'),
('S', 'Study'),
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

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user_name`, `event_id`, `comment_time`, `content`) VALUES
(1, 'organizer01', 1, '2018-03-12 08:42:27', 'hi'),
(2, 'organizer01', 1, '2018-03-12 08:43:44', 'hi');

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
(1, 1, 'ComSci Summit 2018', 'Seminar Topic\r\n- Everyday life in Computer Science\r\n- How to be survivor\r\n\r\nDate\r\n4 March 2018 9.00-18.00\r\n\r\nFree Launch!!', 'SCL-303 Kasetsart University ', '30 30', '2018-02-23 16:24:43', '2018-03-04 09:00:00', '2018-03-04 18:00:00', 200, '2018-02-27 12:00:00', '-', 20, 'Se', 25, 20),
(4, 1, 'Comp Prog Midterm Exam', 'Computer Programming Examination !!\r\n\r\nLet join this exam and get A\r\n\r\n', 'SCL, SC45', '250 40', '2018-03-06 11:51:58', '2018-03-01 14:30:00', '2018-03-01 17:30:00', 300, '2018-02-28 23:00:00', '-', 200, 'Ct', 25, 23),
(5, 1, 'ส่ง WebTech', 'ส่งงานกลุ่มเกี่ยวกับ เว็บevent', 'ภาควิทยาการคอมพิวเตอร์', '50 150', '2018-03-06 12:02:05', '2018-03-12 08:00:00', '2018-03-12 22:00:00', 0, '2018-03-11 00:00:00', '-', 40, 'Ct', 24, 20),
(6, 2, 'S2O SONGKRAN MUSIC FESTIVAL', 'Happy Songkrans day~~', 'Live park (Rama 9)', '13.7505078 100.60009309999998', '2018-03-12 12:27:24', '2018-04-13 00:00:00', '2018-04-15 00:00:00', 1700, '2018-04-12 00:00:00', '-', 2000, 'F', 60, 20),
(7, 3, 'Chang Music Songkranzonic 2018', 'The Ultimate Experience of Songkran Festival', 'Oasis Outdoor Arena', '13.7522274 100.57223479999993', '2018-03-12 12:53:29', '2018-04-12 00:00:00', '2018-04-15 00:00:00', 1500, '2018-04-11 00:00:00', '-', 1500, 'F', 70, 20),
(8, 4, 'KILORUN 2018', 'When running doesnt measure just Kilometre anymore, but also Kilogram. KILORUN, the new running festival, the only one that you can enjoy running, eating and travelling all in one.  Apart from having good health and joy, everyone can enjoy the best selected local dishes along with the unique route of the iconic city. As well as sharing race experiences with friends and families, no matter who you are or where you are from.', 'เสาชิงช้า', '13.752513 100.5020346', '2018-03-12 13:31:58', '2018-03-24 17:00:00', '2018-03-25 09:00:00', 349, '2018-03-24 12:00:00', '-', 1000, 'H', 90, 7),
(9, 5, 'ไปโยคะกัน #1', 'เพียงแค่หลงรัก โยคะ อยากรู้อยากเห็นหรือตั้งคำถาม หรืออยากทุ่มสุดตัวให้กับ โยคะ\nไม่ว่าจะเป็นผู้ฝึกมือใหม่ขั้นมาตรฐาน หรือมือโปรท่ายากขั้นแอดวานส์ Ma:D อยากชวนมา ไปโยคะกัน', '@Ma:D Club for Better Society เอกมัย 4', '13.724715 100.58734000000004', '2018-03-12 13:42:16', '2018-03-24 14:00:00', '2018-03-24 15:30:00', 0, '2018-03-23 00:00:00', '-', 30, 'H', 60, 15),
(10, 6, 'SONGKRAN SPLASH POOL PARTY 2018', 'The Most Happening Pool Party in Town is Back, Bigger, Louder and Wilder Than Ever!', 'WET® Deck, 6th floor - W Bangkok', '13.7221885 100.52860080000005', '2018-03-12 13:53:47', '2018-04-13 13:00:00', '2018-04-13 21:00:00', 10000, '2018-04-11 00:59:00', '-', 2000, 'F', 70, 25);

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
(1, 'organizer01', 'AE company', 'events@ae.com', '+66912345678', 'www.ae.com', 'AE company'),
(2, 'bootsakorn', 'google', 'bootsakorn@gmail.com', '0831123453', 'www.bootsakorn.com', 'boot'),
(3, 'wiwadh', 'JSICE', 'wiwadh@gmail.com', '0831112222', 'www.ktice.com', 'ktice'),
(4, 'sasithorn', 'MEAW COMPANY', 'sasithorn@gmail.com', '0896667711', 'www.sasithorn.com', 'sasithorn meaw'),
(5, 'nattapach', 'INDEX room', 'nattapach@gmail.com', '0875768444', 'www.nattapach.com', 'nattapach '),
(6, 'noinar', 'NN COMPANY', 'noinar@gmail.com', '0851836522', 'www.nn.com', 'nn noinar');

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `event_id` int(11) NOT NULL,
  `picture_number` int(11) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`event_id`, `picture_number`, `path`) VALUES
(1, 0, '1-1.jpg'),
(1, 1, '1-2.jpg'),
(4, 2, '4-1.png'),
(4, 4, '4-2.jpg'),
(5, 3, '5-1.jpg'),
(5, 5, '5-2.jpg'),
(6, 0, '6-0.jpg'),
(6, 1, '6-1.jpg'),
(6, 2, '6-2.jpg'),
(6, 3, '6-3.jpg'),
(7, 0, '7-0.jpg'),
(7, 1, '7-1.jpg'),
(7, 2, '7-2.jpg'),
(8, 0, '8-0.jpg'),
(8, 1, '8-1.jpg'),
(9, 0, '9-0.jpg'),
(9, 1, '9-1.jpg'),
(9, 2, '9-2.jpg'),
(10, 1, '10-1.jpg'),
(10, 2, '10-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pre_condition_event`
--

CREATE TABLE `pre_condition_event` (
  `event_id` int(11) NOT NULL,
  `pre_event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pre_condition_event`
--

INSERT INTO `pre_condition_event` (`event_id`, `pre_event_id`) VALUES
(5, 1),
(5, 4);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `organizer`
--
ALTER TABLE `organizer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
