-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2023 at 10:26 PM
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
(64, 23, '2023-10-12', '02:36:24', '02:36:31', 0.00, '2023-10-11 18:36:31'),
(65, 32, '2023-10-12', '03:10:37', '03:10:42', 0.00, '2023-10-11 19:10:42'),
(66, 33, '2023-10-12', '03:24:57', '03:25:08', 0.00, '2023-10-11 19:25:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employees`
--

CREATE TABLE `tbl_employees` (
  `emp_id` int(11) NOT NULL,
  `emp_image` varchar(256) NOT NULL,
  `emp_fname` varchar(30) NOT NULL,
  `emp_mname` varchar(20) DEFAULT NULL,
  `emp_lname` varchar(30) NOT NULL,
  `emp_gender` varchar(21) NOT NULL,
  `emp_dateofbirth` date NOT NULL,
  `emp_fingerprint` varchar(256) NOT NULL,
  `emp_status` varchar(8) NOT NULL,
  `role_id` int(11) NOT NULL,
  `processed_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_employees`
--

INSERT INTO `tbl_employees` (`emp_id`, `emp_image`, `emp_fname`, `emp_mname`, `emp_lname`, `emp_gender`, `emp_dateofbirth`, `emp_fingerprint`, `emp_status`, `role_id`, `processed_by`, `created_at`) VALUES
(23, '356745510_1232702817384758_3252894390942289197_n.jpg', 'Eleazar', 'Tulio', 'Sumaoi      ', 'Male', '2000-12-27', 'qwerasdfzcv', 'Active', 1, 'Eleazar Tulio Sumaoi      ', '2023-10-11 18:42:35'),
(32, 'wallpaperflare.com_wallpaper.jpg', 'Neil John', 'Ohayo', 'Baril', 'Prefer Not To Mention', '2001-03-15', 'Baril123', 'Active', 1, 'Eleazar Tulio Sumaoi      ', '2023-10-11 07:46:56'),
(33, 'wallpaperflare.com_wallpaper (1).jpg', 'Ralf Rudy Phil', 'Chuck', 'Batallones', 'Male', '1900-12-25', 'chuckie123', 'Active', 1, 'Eleazar Tulio Sumaoi      ', '2023-10-11 19:26:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `log_id` int(11) NOT NULL,
  `action` varchar(50) NOT NULL,
  `processed_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_logs`
--

INSERT INTO `tbl_logs` (`log_id`, `action`, `processed_by`, `created_at`) VALUES
(84, 'Added Employee :  Neil John Baril', 'Eleazar Tulio Sumaoi      ', '2023-10-11 06:40:22'),
(85, 'Updated Employee :  Neil John Baril', 'Eleazar Tulio Sumaoi      ', '2023-10-11 07:27:27'),
(86, 'Updated Employee :  Neil John Baril', 'Eleazar Tulio Sumaoi      ', '2023-10-11 07:28:57'),
(87, 'Updated Employee :  Neil John Baril', 'Eleazar Tulio Sumaoi      ', '2023-10-11 07:36:50'),
(88, 'Updated Employee :  Neil John Baril', 'Eleazar Tulio Sumaoi      ', '2023-10-11 07:37:44'),
(89, 'Updated Employee :  Neil John Baril', 'Eleazar Tulio Sumaoi      ', '2023-10-11 07:38:24'),
(90, 'Updated Employee :  Eleazar Sumaoi      ', 'Eleazar Tulio Sumaoi      ', '2023-10-11 07:38:30'),
(91, 'Updated Employee :  Neil John Baril', 'Eleazar Tulio Sumaoi      ', '2023-10-11 07:41:21'),
(92, 'Updated Employee :  Neil John Baril', 'Eleazar Tulio Sumaoi      ', '2023-10-11 07:43:02'),
(93, 'Updated Employee :  Neil John Baril', 'Eleazar Tulio Sumaoi      ', '2023-10-11 07:46:56'),
(94, 'Updated Employee :  Eleazar Sumaoi      ', 'Eleazar Tulio Sumaoi      ', '2023-10-11 07:47:07'),
(95, 'Updated Employee :  Eleazar Sumaoi      ', 'Eleazar Tulio Sumaoi      ', '2023-10-11 08:04:13'),
(96, 'Updated Employee :  Eleazar Sumaoi      ', 'Eleazar Tulio Sumaoi      ', '2023-10-11 08:09:43'),
(97, 'Updated Employee :  Eleazar Sumaoi      ', 'Eleazar Tulio Sumaoi      ', '2023-10-11 18:42:35'),
(98, 'Added User :  baril123 Employee ID:32', 'Eleazar Tulio Sumaoi      ', '2023-10-11 19:10:13'),
(99, 'Added Employee :  Ralf Rudy Phil Batallones', 'Eleazar Tulio Sumaoi      ', '2023-10-11 19:24:41'),
(100, 'Updated Employee :  Ralf Rudy Phil Batallones', 'Eleazar Tulio Sumaoi      ', '2023-10-11 19:26:45');

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
(1, 'Admin', 999.99, 125.00, 'Eleazar Igop Sumaoi', '2023-10-07 16:43:33');

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
(14, 23, 'eleazar123', '$2y$10$eEFOiD4KUW1s/pO4XbspEuW0D4Q7gdAjbZSU7ApQbgxYcm3t1Mv1y', 'Ralf Rudy Phil Chuck Batallones', '2023-10-11 01:58:35'),
(18, 32, 'baril123', '$2y$10$0NjAjuRNYiqZt8hiLFU5bewnH1zf5ukswKTFFj.RccWsx6EqNFofa', 'Eleazar Tulio Sumaoi      ', '2023-10-11 19:10:13');

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
-- Indexes for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  ADD PRIMARY KEY (`log_id`);

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
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
