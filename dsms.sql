-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2020 at 02:59 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dsms`
--

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE `charges` (
  `id` int(11) UNSIGNED NOT NULL,
  `amount` int(11) UNSIGNED DEFAULT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`id`, `amount`, `class`, `date`) VALUES
(1, 40, 'Class 2', '2019-12-04'),
(2, 41, 'Class 4', '2019-12-04');

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` int(11) UNSIGNED NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pnumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `users_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `fname`, `sname`, `idno`, `pnumber`, `class`, `date`, `users_id`) VALUES
(1, 'Madzudzo', 'Madzudzo', '23-8228828H23', '0773629299', 2, '2019-11-18 01:16:15', 4);

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) UNSIGNED NOT NULL,
  `student` int(11) UNSIGNED DEFAULT NULL,
  `instructor` int(11) UNSIGNED DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) UNSIGNED DEFAULT NULL,
  `cancel_status` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_recorded` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `student`, `instructor`, `date`, `time`, `status`, `cancel_status`, `date_recorded`) VALUES
(1, 3, 4, '2020-01-31', '12:30 - 13:00', 1, 'no', '2019-11-18 03:14:23'),
(2, 5, 4, '2020-02-14', '14:00 - 14:30', 0, '', '2020-01-28 11:25:41'),
(3, 3, 4, '2020-02-12', '15:00 - 15:30', 0, '', '2020-02-10 12:55:35');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) UNSIGNED NOT NULL,
  `amount` int(11) UNSIGNED DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `amount`, `user_id`, `date`) VALUES
(1, 122222, 3, '2019-12-04'),
(2, 800, 3, '2020-01-18'),
(3, 700, 3, '2020-01-18'),
(4, 300, 5, '2020-01-28'),
(5, 400, 5, '2020-01-28');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) UNSIGNED NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pnumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lnumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `users_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fname`, `sname`, `idno`, `pnumber`, `lnumber`, `class`, `email`, `password`, `date`, `users_id`) VALUES
(1, 'gabriel', 'Musodza', '48-134787V48', '0772629299', '051278LD', '2', 'gabrielmusodza@gmail.com', '0192023a7bbd73250516f069df18b500', '2019-11-17 23:47:16', 1),
(3, 'Amos', 'Musodza', '48-134787V48', '0772629299', '051278LD', '4', 'amo@gmail.com', '0192023a7bbd73250516f069df18b500', '2019-11-18 01:07:38', 3),
(4, 'Tendai', 'Musodza', '48-134787V48', '0772629299', '051278LD', '2', 'tm@gmail.com', '0192023a7bbd73250516f069df18b500', '2020-01-28 10:42:08', 5),
(5, 'hdhdhdsh', 'hshshs', '48-134787V48', '0773629299', 'ns747473', '4', 'try@gmail.com', '0192023a7bbd73250516f069df18b500', '2020-01-28 13:42:46', 6),
(6, 'dshdshdsdhsb', 'dsmk.dsj', '4535jkbvjidlvb', '07726292992', '434343gt', '2', 'qw@gmail.com', '0192023a7bbd73250516f069df18b500', '2020-01-28 13:44:57', NULL),
(7, 'jfdjdfjfd', 'jhdjdbsuld', '17-34-df', '45454545', '54hthrt', '4', 'jj@gmail.com', '0192023a7bbd73250516f069df18b500', '2020-01-28 13:46:32', 8),
(8, 'dsdsdss', 'dhdhdshsd', '7839349304', '0773629299', '051278LD', '2', 'eg@gmail.com', '0192023a7bbd73250516f069df18b500', '2020-02-08 17:07:27', 9),
(9, '', '', '', '', '', 'Select Class', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-02-09 05:46:55', 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`) VALUES
(1, 'gabrielmusodza@gmail.com', '0192023a7bbd73250516f069df18b500', 'student'),
(2, 'admin@admin.com', '0192023a7bbd73250516f069df18b500', 'admin'),
(3, 'amo@gmail.com', '0192023a7bbd73250516f069df18b500', 'student'),
(4, 'mm@dsms.com', '0192023a7bbd73250516f069df18b500', 'instructor'),
(5, 'tm@gmail.com', '0192023a7bbd73250516f069df18b500', 'student'),
(6, 'try@gmail.com', '0192023a7bbd73250516f069df18b500', 'student'),
(8, 'jj@gmail.com', '0192023a7bbd73250516f069df18b500', 'student'),
(9, 'eg@gmail.com', '0192023a7bbd73250516f069df18b500', 'student'),
(10, '', 'd41d8cd98f00b204e9800998ecf8427e', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `user_subscriptions`
--

CREATE TABLE `user_subscriptions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `payment_method` enum('stripe') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'stripe',
  `stripe_subscription_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `stripe_customer_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `stripe_plan_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `plan_amount` float(10,2) NOT NULL,
  `plan_amount_currency` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `plan_interval` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `plan_interval_count` tinyint(2) NOT NULL,
  `payer_email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `plan_period_start` datetime NOT NULL,
  `plan_period_end` datetime NOT NULL,
  `status` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_instructors_users` (`users_id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_payments_user` (`user_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_students_users` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `charges`
--
ALTER TABLE `charges`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `instructors`
--
ALTER TABLE `instructors`
  ADD CONSTRAINT `c_fk_instructors_users_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `c_fk_students_users_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
