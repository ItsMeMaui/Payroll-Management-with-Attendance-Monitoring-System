-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2023 at 05:47 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendances`
--

CREATE TABLE `tbl_attendances` (
  `attendance_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `attendance_date` date NOT NULL,
  `attendance_timein` time NOT NULL,
  `attendance_timeout` time NOT NULL,
  `attendance_hour` decimal(5,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_attendances`
--

INSERT INTO `tbl_attendances` (`attendance_id`, `emp_id`, `attendance_date`, `attendance_timein`, `attendance_timeout`, `attendance_hour`, `created_at`) VALUES
(46, 3, '2023-09-23', '06:38:27', '07:38:19', 0.98, '2023-10-04 23:45:59'),
(47, 3, '2023-09-24', '08:00:23', '04:30:23', 8.00, '2023-10-04 23:45:53'),
(48, 3, '2023-09-25', '08:00:23', '04:30:23', 8.00, '2023-10-04 23:45:49'),
(49, 3, '2023-09-26', '08:00:23', '04:30:23', 8.00, '2023-10-04 23:45:45'),
(50, 3, '2023-09-27', '08:00:23', '04:30:23', 8.00, '2023-10-04 23:45:41'),
(51, 3, '2023-09-28', '08:00:23', '04:30:23', 8.00, '2023-10-04 23:45:37'),
(52, 3, '2023-09-29', '08:00:23', '04:30:23', 8.00, '2023-10-04 23:45:22'),
(53, 3, '2023-09-30', '08:00:23', '04:30:23', 8.00, '2023-10-04 23:45:17'),
(54, 3, '2023-10-01', '08:00:23', '04:30:23', 8.00, '2023-10-04 23:45:09'),
(55, 3, '2023-10-02', '08:00:23', '04:30:23', 8.00, '2023-10-04 23:45:06'),
(56, 3, '2023-10-03', '08:00:23', '04:30:23', 8.00, '2023-10-04 23:45:03'),
(57, 3, '2023-10-04', '08:00:23', '04:30:23', 8.00, '2023-10-04 23:44:12'),
(58, 3, '2023-10-05', '08:00:23', '04:30:23', 8.00, '2023-10-04 23:44:58'),
(59, 4, '2023-09-01', '09:00:00', '14:00:00', 5.00, '2023-10-05 03:32:07'),
(60, 4, '2023-09-02', '09:00:00', '14:00:00', 5.00, '2023-10-05 03:32:07'),
(61, 4, '2023-09-03', '09:00:00', '14:00:00', 5.00, '2023-10-05 03:32:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employees`
--

CREATE TABLE `tbl_employees` (
  `emp_id` int(11) NOT NULL,
  `emp_fname` varchar(30) NOT NULL,
  `emp_mname` varchar(20) DEFAULT NULL,
  `emp_lname` varchar(30) NOT NULL,
  `emp_fingerprint` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `processed_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_employees`
--

INSERT INTO `tbl_employees` (`emp_id`, `emp_fname`, `emp_mname`, `emp_lname`, `emp_fingerprint`, `role_id`, `processed_by`, `created_at`) VALUES
(3, '  Eleazar', 'Igop', 'Sumaoi  ', 'qwerty321', 1, 'eleazar sumaoi', '2023-10-03 16:50:13'),
(4, '  Ralf', '  Ebut', 'Battalones  ', ' ebut123', 2, 'eleazar sumaoi', '2023-10-04 02:48:19'),
(8, ' Neil John', 'Deew', 'Baril ', ' qwerty123', 2, 'eleazar sumaoi', '2023-10-03 16:02:11'),
(10, 'Jomer', 'Dika', 'Rapisot', 'ijwefijsdijvisjdvisjd', 2, 'eleazar sumaoi', '2023-10-03 16:12:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(20) NOT NULL,
  `role_rate` decimal(5,2) NOT NULL,
  `role_rate_per_hour` decimal(5,2) NOT NULL,
  `processed_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`role_id`, `role_name`, `role_rate`, `role_rate_per_hour`, `processed_by`, `created_at`) VALUES
(1, 'admin', 400.00, 50.00, 'eleazar sumaoi', '2023-10-04 17:10:25'),
(2, 'employee', 300.00, 37.50, 'eleazar sumaoi', '2023-10-04 17:10:44'),
(3, 'Driver', 300.00, 37.50, 'eleazar sumaoi', '2023-10-04 17:10:52'),
(4, 'Engineer', 450.00, 56.25, 'eleazar sumaoi', '2023-10-04 17:14:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `user_username` varchar(20) NOT NULL,
  `user_password` varchar(256) NOT NULL,
  `processed_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `emp_id`, `user_username`, `user_password`, `processed_by`, `created_at`) VALUES
(9, 3, 'eleazar', '$2y$10$eu94OJB6bpemUnXC2G6mNOrcO2SZESSygooVqav9nBRGgmYhbq3qi', 'eleazar sumaoi', '2023-10-04 22:25:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_attendances`
--
ALTER TABLE `tbl_attendances`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `FK_empID_empID` (`emp_id`);

--
-- Indexes for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `FK_roles_roles` (`role_id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `FK_id_id` (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_attendances`
--
ALTER TABLE `tbl_attendances`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_attendances`
--
ALTER TABLE `tbl_attendances`
  ADD CONSTRAINT `FK_empID_empID` FOREIGN KEY (`emp_id`) REFERENCES `tbl_employees` (`emp_id`);

--
-- Constraints for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  ADD CONSTRAINT `FK_roles_roles` FOREIGN KEY (`role_id`) REFERENCES `tbl_roles` (`role_id`);

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `FK_id_id` FOREIGN KEY (`emp_id`) REFERENCES `tbl_employees` (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
