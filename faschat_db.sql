-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2024 at 11:29 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faschat_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `connections_solo`
--

CREATE TABLE `connections_solo` (
  `id` int(255) NOT NULL,
  `users` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`users`)),
  `to_handshake` varchar(255) NOT NULL,
  `handshake` tinyint(1) NOT NULL DEFAULT 0,
  `initiator` varchar(255) NOT NULL,
  `date_created` datetime(2) NOT NULL DEFAULT current_timestamp(2)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `connections_solo`
--

INSERT INTO `connections_solo` (`id`, `users`, `to_handshake`, `handshake`, `initiator`, `date_created`) VALUES
(25, '[\"useraccount1\",\"lemon8de\"]', 'lemon8de', 1, 'useraccount1', '2024-08-02 11:52:43.73'),
(26, '[\"ally\",\"lemon8de\"]', 'lemon8de', 1, 'ally', '2024-08-02 11:55:22.87'),
(28, '[\"useraccount4\",\"lemon8de\"]', 'lemon8de', 0, 'useraccount4', '2024-08-02 15:50:43.19'),
(31, '[\"useraccount3\",\"lemon8de\"]', 'lemon8de', 1, 'useraccount3', '2024-08-02 15:59:28.40'),
(32, '[\"useraccount1\",\"ally\"]', 'ally', 1, 'useraccount1', '2024-08-02 16:41:04.83'),
(33, '[\"sen\",\"lemon8de\"]', 'lemon8de', 0, 'sen', '2024-08-02 16:43:46.68'),
(34, '[\"sen\",\"useraccount1\"]', 'useraccount1', 1, 'sen', '2024-08-02 16:44:59.04');

-- --------------------------------------------------------

--
-- Table structure for table `messages_solo`
--

CREATE TABLE `messages_solo` (
  `id` int(255) NOT NULL,
  `chat_id` int(255) NOT NULL,
  `message` text NOT NULL,
  `date_created` datetime(2) NOT NULL DEFAULT current_timestamp(2),
  `from_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages_solo`
--

INSERT INTO `messages_solo` (`id`, `chat_id`, `message`, `date_created`, `from_user`) VALUES
(1, 25, '', '2024-08-02 14:13:17.22', 'lemon8de'),
(2, 25, '', '2024-08-02 14:13:55.57', 'lemon8de'),
(3, 25, '', '2024-08-02 14:14:26.87', 'lemon8de'),
(4, 25, '', '2024-08-02 14:14:58.48', 'lemon8de'),
(5, 25, 'asdfasdf', '2024-08-02 14:17:00.60', 'lemon8de'),
(6, 25, 'asf', '2024-08-02 14:18:38.65', 'lemon8de'),
(7, 25, 'asfasdf', '2024-08-02 14:19:53.07', 'lemon8de'),
(8, 25, 'asdfasdf', '2024-08-02 14:21:09.63', 'lemon8de'),
(9, 25, 'asdfasdf', '2024-08-02 14:21:13.70', 'lemon8de'),
(10, 25, 'asdfasdf', '2024-08-02 14:21:15.73', 'lemon8de'),
(11, 25, 'asdfasdf', '2024-08-02 14:21:17.17', 'lemon8de'),
(12, 25, 'this is a message', '2024-08-02 14:21:34.83', 'lemon8de'),
(13, 25, 'this is a message', '2024-08-02 14:23:53.96', 'lemon8de'),
(14, 25, 'this is a message', '2024-08-02 14:23:55.51', 'lemon8de'),
(15, 25, 'this is a message hahaha', '2024-08-02 14:24:01.30', 'lemon8de'),
(16, 25, 'this is another mssage', '2024-08-02 14:25:35.75', 'lemon8de'),
(18, 25, 'message sent?', '2024-08-02 14:26:31.82', 'lemon8de'),
(19, 25, 'asfasdf', '2024-08-02 14:38:23.77', 'lemon8de'),
(20, 25, 'test ', '2024-08-02 14:38:51.28', 'lemon8de'),
(21, 25, 'message_1', '2024-08-02 14:39:39.62', 'lemon8de'),
(22, 25, 'liv edemo asdf asdfk', '2024-08-02 14:49:44.58', 'lemon8de'),
(23, 25, 'demo asdofahsdfasdfa hi', '2024-08-02 14:50:04.89', 'useraccount1'),
(24, 26, 'chatting in a different window test', '2024-08-02 14:53:49.26', 'lemon8de'),
(25, 31, 'hello', '2024-08-02 15:59:59.82', 'useraccount3'),
(26, 25, 'this is a chat', '2024-08-02 16:31:14.42', 'lemon8de'),
(27, 25, 'this is another chat', '2024-08-02 16:32:31.64', 'lemon8de'),
(28, 25, 'hello is this working', '2024-08-02 16:39:33.08', 'lemon8de'),
(29, 25, 'anla nagana na nga', '2024-08-02 16:39:42.43', 'useraccount1'),
(30, 32, 'adik HAHAHA', '2024-08-02 16:41:29.54', 'useraccount1'),
(31, 32, 'astig', '2024-08-02 16:41:36.83', 'ally'),
(32, 34, 'hifasdf', '2024-08-02 16:45:39.31', 'sen'),
(33, 34, 'hifasdfasdf', '2024-08-02 16:45:39.62', 'sen'),
(34, 34, 'sd', '2024-08-02 16:45:39.83', 'sen'),
(35, 34, 'sdf', '2024-08-02 16:45:40.02', 'sen'),
(36, 34, '', '2024-08-02 16:45:40.41', 'sen'),
(37, 34, 'fas', '2024-08-02 16:45:40.71', 'sen'),
(38, 34, 'k', '2024-08-02 16:45:46.17', 'sen'),
(39, 34, 'asdfjhasldkfjhasdf', '2024-08-02 16:45:49.89', 'useraccount1'),
(40, 34, 'hgj', '2024-08-02 16:45:52.47', 'sen'),
(41, 34, 'hgj', '2024-08-02 16:45:52.67', 'sen'),
(42, 34, 'sd', '2024-08-02 16:46:34.39', 'sen'),
(43, 34, 'sdds', '2024-08-02 16:46:34.68', 'sen'),
(44, 34, 'ds', '2024-08-02 16:46:34.87', 'sen'),
(45, 34, 'ds', '2024-08-02 16:46:35.11', 'sen'),
(46, 34, 'dsf', '2024-08-02 16:46:35.31', 'sen'),
(47, 34, 'ds', '2024-08-02 16:46:35.50', 'sen'),
(48, 34, '', '2024-08-02 16:46:35.64', 'sen'),
(49, 34, 'f', '2024-08-02 16:46:35.83', 'sen'),
(50, 34, 'ds', '2024-08-02 16:46:36.02', 'sen'),
(51, 34, '', '2024-08-02 16:46:36.19', 'sen'),
(52, 34, 'f', '2024-08-02 16:46:36.41', 'sen'),
(53, 34, 'ds', '2024-08-02 16:46:36.62', 'sen'),
(54, 34, 'fds', '2024-08-02 16:46:36.82', 'sen'),
(55, 34, 'f', '2024-08-02 16:46:37.01', 'sen'),
(56, 34, 'ds', '2024-08-02 16:46:37.23', 'sen'),
(57, 34, 'f', '2024-08-02 16:46:37.41', 'sen'),
(58, 34, 'f', '2024-08-02 16:46:37.57', 'sen'),
(59, 34, 'ds', '2024-08-02 16:46:37.75', 'sen'),
(60, 34, 'f', '2024-08-02 16:46:37.96', 'sen'),
(61, 34, 'ds', '2024-08-02 16:46:38.11', 'sen'),
(62, 34, '', '2024-08-02 16:46:38.31', 'sen'),
(63, 34, 'f', '2024-08-02 16:46:38.52', 'sen'),
(64, 34, 'sdfdsf', '2024-08-02 16:46:52.10', 'sen'),
(65, 34, 'sdfdsfdsfds', '2024-08-02 16:46:52.42', 'sen'),
(66, 34, 'f', '2024-08-02 16:46:52.60', 'sen'),
(67, 34, 'fdsf', '2024-08-02 16:46:52.80', 'sen'),
(68, 34, 'ds', '2024-08-02 16:46:53.00', 'sen'),
(69, 34, 'f', '2024-08-02 16:46:53.18', 'sen'),
(70, 34, 'dsf', '2024-08-02 16:46:53.38', 'sen'),
(71, 34, 'ds', '2024-08-02 16:46:53.56', 'sen'),
(72, 34, 'f', '2024-08-02 16:46:53.73', 'sen'),
(73, 34, 'sd', '2024-08-02 16:46:53.90', 'sen'),
(74, 34, '', '2024-08-02 16:46:54.06', 'sen'),
(75, 34, 'f', '2024-08-02 16:46:54.25', 'sen'),
(76, 34, 'ds', '2024-08-02 16:46:54.42', 'sen'),
(77, 34, 'f', '2024-08-02 16:46:54.60', 'sen'),
(78, 34, 'f', '2024-08-02 16:46:54.77', 'sen'),
(79, 34, 'ds', '2024-08-02 16:46:54.96', 'sen'),
(80, 34, 'f', '2024-08-02 16:46:55.10', 'sen'),
(81, 34, 'sd', '2024-08-02 16:46:55.28', 'sen'),
(82, 34, '', '2024-08-02 16:46:55.45', 'sen'),
(83, 34, 'f', '2024-08-02 16:46:55.60', 'sen'),
(84, 34, 's', '2024-08-02 16:46:55.78', 'sen'),
(85, 34, '', '2024-08-02 16:46:55.97', 'sen'),
(86, 34, 'df', '2024-08-02 16:46:56.15', 'sen'),
(87, 34, 'ds', '2024-08-02 16:46:56.33', 'sen'),
(88, 34, 'asdfasdf', '2024-08-02 16:47:05.43', 'useraccount1');

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `site_role` varchar(255) NOT NULL DEFAULT 'USER',
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `reset_password` tinyint(1) NOT NULL DEFAULT 0,
  `reset_password_approved` tinyint(1) NOT NULL DEFAULT 0,
  `exposed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`id`, `username`, `password`, `site_role`, `approved`, `reset_password`, `reset_password_approved`, `exposed`) VALUES
(7, 'jayandrew', 'humberthumbert', 'ADMIN', 1, 0, 0, 0),
(8, 'useraccount1', '1234', 'USER', 1, 1, 0, 1),
(9, 'sen', '1', 'USER', 1, 0, 0, 0),
(10, 'ally', 'ally', 'USER', 1, 0, 0, 0),
(11, 'useraccount3', '1234', 'USER', 1, 0, 0, 1),
(12, 'useraccount4', '1234', 'USER', 1, 0, 0, 1),
(13, 'deker', 'deker', 'USER', 1, 0, 0, 0),
(14, 'lemon8de', 'humberthumbert', 'USER', 1, 0, 0, 1),
(15, 'jayandrew_it-system', 'humberthumbert', 'USER', 1, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `connections_solo`
--
ALTER TABLE `connections_solo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages_solo`
--
ALTER TABLE `messages_solo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `connections_solo`
--
ALTER TABLE `connections_solo`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `messages_solo`
--
ALTER TABLE `messages_solo`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
