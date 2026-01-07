-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2026 at 05:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elderaid`
--

-- --------------------------------------------------------

--
-- Table structure for table `elder_family`
--

CREATE TABLE `elder_family` (
  `id` int(11) NOT NULL,
  `elder_id` int(11) NOT NULL,
  `family_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contacts`
--

CREATE TABLE `emergency_contacts` (
  `id` int(11) NOT NULL,
  `elder_id` int(11) NOT NULL,
  `family_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `helper_profiles`
--

CREATE TABLE `helper_profiles` (
  `helper_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `services` text DEFAULT NULL,
  `govt_id_image` varchar(255) DEFAULT NULL,
  `approval_status` enum('pending','approved','rejected') DEFAULT 'pending',
  `karma_points` int(11) DEFAULT 0,
  `avg_rating` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `helper_profiles`
--

INSERT INTO `helper_profiles` (`helper_id`, `description`, `services`, `govt_id_image`, `approval_status`, `karma_points`, `avg_rating`) VALUES
(5, NULL, NULL, NULL, 'approved', 0, 0),
(12, NULL, NULL, NULL, 'rejected', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `karma_history`
--

CREATE TABLE `karma_history` (
  `id` int(11) NOT NULL,
  `helper_id` int(11) NOT NULL,
  `points` int(11) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `user_id` int(11) NOT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `is_sharing` tinyint(1) DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `message`, `created_at`) VALUES
(1, 1, 2, 'Hello, I need help!', '2025-12-31 13:33:51');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(11) NOT NULL,
  `elder_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `reminder_time` time DEFAULT NULL,
  `repeat_type` enum('once','daily','weekly','monthly') DEFAULT NULL,
  `missed_count` int(11) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`id`, `elder_id`, `title`, `reminder_time`, `repeat_type`, `missed_count`, `is_active`) VALUES
(1, 2, 'medical pill', '00:00:00', '', 0, 1),
(2, 11, 'tr', '00:00:00', '', 0, 1),
(3, 11, 't', '00:00:00', '', 0, 1),
(4, 2, 'daily walk', '00:00:00', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `elder_id` int(11) NOT NULL,
  `helper_id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` between 1 and 5),
  `review` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_requests`
--

CREATE TABLE `service_requests` (
  `id` int(11) NOT NULL,
  `elder_id` int(11) NOT NULL,
  `helper_id` int(11) NOT NULL,
  `service_type` varchar(100) DEFAULT NULL,
  `status` enum('pending','accepted','rejected','completed') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_requests`
--

INSERT INTO `service_requests` (`id`, `elder_id`, `helper_id`, `service_type`, `status`, `created_at`) VALUES
(2, 2, 5, 'Doctor Visit', 'pending', '2025-12-31 13:17:17');

-- --------------------------------------------------------

--
-- Table structure for table `sos_logs`
--

CREATE TABLE `sos_logs` (
  `id` int(11) NOT NULL,
  `elder_id` int(11) NOT NULL,
  `triggered_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sos_logs`
--

INSERT INTO `sos_logs` (`id`, `elder_id`, `triggered_at`) VALUES
(1, 2, '2026-01-04 08:14:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` enum('elder','helper','family','admin') NOT NULL,
  `is_approved` tinyint(1) DEFAULT 0,
  `karma` int(11) DEFAULT 0,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `govt_id` varchar(255) DEFAULT NULL,
  `last_active` datetime DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `is_approved`, `karma`, `name`, `email`, `phone`, `password`, `profile_image`, `govt_id`, `last_active`, `created_at`) VALUES
(1, 'admin', 1, 0, 'Admin User', 'admin@elderaid.com', NULL, '$2y$10$24keVqFd8gNKk3OeXwL5AOneWXRZxueteu.B1ZRP3Z4Ucw9pFlZv2', NULL, NULL, '2025-12-31 18:17:10', '2025-12-31 12:47:10'),
(2, 'elder', 1, 0, 'Elder One', 'elder@test.com', NULL, '$2y$10$ZBi2ZiPD0J5o6dL3GU.KkeCoM7fdT7xoCbSlvVXy8Zh8mISRtvdbW', NULL, NULL, '2025-12-31 18:17:21', '2025-12-31 12:47:21'),
(5, 'helper', 1, 0, 'Helper One', 'helper@test.com', NULL, '$2y$10$OquHDnj5oraps8cbJZmngOm0DarSryndv5ZRaEPjhyZrCLDx7a0x2', NULL, NULL, '2025-12-31 18:42:42', '2025-12-31 13:12:42'),
(11, 'elder', 1, 0, 'Elder One', 'elder@mail.com', NULL, '$2y$10$oxZvZSexwIfXmFjj3haCEuUQuG4dGNfSRie7KsPamDtfjqC.pq8Hy', NULL, NULL, '2026-01-02 10:33:15', '2026-01-02 05:03:15'),
(12, 'helper', 0, 0, 'Mani', 'helper@mail.com', NULL, '$2y$10$cFmQOByrRCKns833bk9C4u/kgx/nGbJ38UAK76EH9/YtS9laJf0ZC', NULL, NULL, '2026-01-05 00:52:04', '2026-01-04 19:22:04'),
(13, 'family', 1, 0, 'Family Member', 'family@test.com', NULL, '$2y$10$Qko80T9pwQ5lNmG6K.O0vezun30MNSG9HF1UbFliMP9OoHFlNSKtG', NULL, NULL, '2026-01-05 02:13:46', '2026-01-04 20:43:46');

-- --------------------------------------------------------

--
-- Table structure for table `user_otps`
--

CREATE TABLE `user_otps` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `otp` varchar(6) NOT NULL,
  `expires_at` datetime NOT NULL,
  `is_verified` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_otps`
--

INSERT INTO `user_otps` (`id`, `user_id`, `otp`, `expires_at`, `is_verified`) VALUES
(6, 11, '205379', '2026-01-02 05:20:15', 1),
(7, 12, '162838', '2026-01-04 19:32:04', 1),
(8, 13, '190630', '2026-01-04 20:53:46', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `elder_family`
--
ALTER TABLE `elder_family`
  ADD PRIMARY KEY (`id`),
  ADD KEY `elder_id` (`elder_id`),
  ADD KEY `family_id` (`family_id`);

--
-- Indexes for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `elder_id` (`elder_id`),
  ADD KEY `family_id` (`family_id`);

--
-- Indexes for table `helper_profiles`
--
ALTER TABLE `helper_profiles`
  ADD PRIMARY KEY (`helper_id`),
  ADD KEY `idx_helper_status` (`approval_status`),
  ADD KEY `idx_helper_karma` (`karma_points`);

--
-- Indexes for table `karma_history`
--
ALTER TABLE `karma_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `helper_id` (`helper_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `elder_id` (`elder_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `elder_id` (`elder_id`),
  ADD KEY `helper_id` (`helper_id`);

--
-- Indexes for table `service_requests`
--
ALTER TABLE `service_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `elder_id` (`elder_id`),
  ADD KEY `helper_id` (`helper_id`),
  ADD KEY `idx_service_status` (`status`);

--
-- Indexes for table `sos_logs`
--
ALTER TABLE `sos_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `elder_id` (`elder_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idx_users_role` (`role`);

--
-- Indexes for table `user_otps`
--
ALTER TABLE `user_otps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `elder_family`
--
ALTER TABLE `elder_family`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `karma_history`
--
ALTER TABLE `karma_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_requests`
--
ALTER TABLE `service_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sos_logs`
--
ALTER TABLE `sos_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_otps`
--
ALTER TABLE `user_otps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `elder_family`
--
ALTER TABLE `elder_family`
  ADD CONSTRAINT `elder_family_ibfk_1` FOREIGN KEY (`elder_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `elder_family_ibfk_2` FOREIGN KEY (`family_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  ADD CONSTRAINT `emergency_contacts_ibfk_1` FOREIGN KEY (`elder_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `emergency_contacts_ibfk_2` FOREIGN KEY (`family_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `helper_profiles`
--
ALTER TABLE `helper_profiles`
  ADD CONSTRAINT `helper_profiles_ibfk_1` FOREIGN KEY (`helper_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `karma_history`
--
ALTER TABLE `karma_history`
  ADD CONSTRAINT `karma_history_ibfk_1` FOREIGN KEY (`helper_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reminders`
--
ALTER TABLE `reminders`
  ADD CONSTRAINT `reminders_ibfk_1` FOREIGN KEY (`elder_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`elder_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`helper_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `service_requests`
--
ALTER TABLE `service_requests`
  ADD CONSTRAINT `service_requests_ibfk_1` FOREIGN KEY (`elder_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `service_requests_ibfk_2` FOREIGN KEY (`helper_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sos_logs`
--
ALTER TABLE `sos_logs`
  ADD CONSTRAINT `sos_logs_ibfk_1` FOREIGN KEY (`elder_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_otps`
--
ALTER TABLE `user_otps`
  ADD CONSTRAINT `user_otps_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
