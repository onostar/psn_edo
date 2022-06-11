-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2022 at 08:39 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psn`
--

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `media_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_id`, `title`, `photo`, `post_date`) VALUES
(8, 'National Members', 'pharma-6.jpg', '2022-05-29 00:22:15'),
(9, 'PSN Nationa', 'Foun-3.jpg', '2022-05-29 00:22:39'),
(10, 'Innauguration', 'pharma-15.jpg', '2022-05-29 00:23:04'),
(11, 'PSN National 2', 'pharma-7.jpg', '2022-05-29 00:23:28'),
(12, 'PSN Family', 'psn2.jpg', '2022-05-29 00:24:03'),
(13, 'PSN Inauguration 2', 'PSN3.jpeg', '2022-05-29 00:24:23');

-- --------------------------------------------------------

--
-- Table structure for table `news_events`
--

CREATE TABLE `news_events` (
  `article_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_date` date NOT NULL,
  `post_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_events`
--

INSERT INTO `news_events` (`article_id`, `title`, `details`, `photo`, `event_date`, `post_date`) VALUES
(2, 'Admin About To Start', 'We Are About To See If We Can Worki On Frnt Spqp', 'akpu-egusi.jpg', '0000-00-00', '2022-03-16 13:30:34'),
(3, 'Studying And Treating Covid-19\'s Long Term Impact', 'While Much Has Been Learned About Covid-19 In The Year Since It Was First Detected, Its Long-term Effects On The Health Of Its Survivors May Take Years To Understand. A Major Effort To Gain That Understanding Is About To Begin\r\n\r\nWhile Much Has Been Learned About Covid-19 In The Year Since It Was First Detected, Its Long-term Effects On The Health Of Its Survivors May Take Years To Understand. A Major Effort To Gain That Understanding Is About To Begin\r\n', 'chicken_republic.png', '0000-00-00', '2022-03-16 15:59:37'),
(4, 'PSn Biannual Meeting', 'This Month Biennial Meeting Is Going To Be Held At The HMB Board At Ring Road Close The State House Of Assembly. The Time For The Meeting Is @:00pm', 'omo_one.jpeg', '2022-05-29', '2022-05-28 14:22:46'),
(5, 'Pharmacist Day', 'Watch Out For The Worlds Pharmacist Day.\r\nIts Gonna Be Fun Filled\r\n\r\nAlot Of Presentation', 'acpn2.jpg', '2022-06-01', '2022-05-30 11:33:52');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `not_subject` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `not_message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `not_status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `not_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `not_subject`, `not_message`, `not_status`, `user_id`, `not_date`) VALUES
(11, 'meeeting notice', 'Thisis a notice to see if it works', 0, 76, '2022-03-16 09:20:13'),
(12, 'meeeting notice', 'Thisis a notice to see if it works', 1, 78, '2022-03-16 09:20:13'),
(13, 'general test', 'is this still working?', 1, 78, '2022-03-16 09:56:03'),
(14, 'general test', 'is this still working?', 1, 78, '2022-03-16 09:56:46'),
(15, 'for you kelly', 'are u getting this?', 1, 78, '2022-03-16 09:57:35'),
(16, 'Got this?', 'Kelly did you get this?', 1, 78, '2022-03-16 09:58:02'),
(17, 'TEST MESSAGE', 'BLJA JKHAJH J;K', 1, 78, '2022-03-16 13:05:52'),
(18, 'Testing News', 'A new article has been posted. Visit the link below to view \n\r https://psnedo.com/news', 1, 78, '2022-03-16 13:25:49'),
(19, 'Admin About To Start', 'A new article has been posted. Visit the link below to view \n\r https://psnedo.com/news', 1, 78, '2022-03-16 13:30:34'),
(20, 'did u get', 'ksdjkfj alckl;kl', 1, 78, '2022-03-16 13:31:10'),
(21, 'Studying And Treating Covid-19\'s Long Term Impact', 'A new article has been posted. Visit the link below to view \n\r https://psnedo.com/news', 1, 78, '2022-03-16 15:59:37'),
(22, 'PSn Biannual Meeting', 'A new article has been posted. Visit the link below to view \n\r https://psnedo.com/news', 1, 78, '2022-05-28 14:22:47'),
(23, 'Pharmacist Day', 'A new article has been posted. Visit the link below to view \n\r <a href=\'https://psnedo.com/events_news.php\'>View</a>', 1, 78, '2022-05-30 11:33:52');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `tdate` datetime NOT NULL DEFAULT current_timestamp(),
  `pcn_number` int(11) NOT NULL,
  `payment_evidence` varchar(100) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `receipt_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `tdate`, `pcn_number`, `payment_evidence`, `payment_status`, `receipt_number`) VALUES
(349, '2022-03-15 10:11:04', 425716, 'beddings7.jpg', 1, 'PSN/2022/391/349');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pcn_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pharmacy_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pharmacy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pharmacy_address` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp(),
  `dob` date NOT NULL,
  `pharmacist_class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `pcn_number`, `pharmacy_location`, `phone_number`, `pharmacy`, `user_email`, `passport`, `pharmacy_address`, `reg_number`, `reg_date`, `dob`, `pharmacist_class`, `gender`) VALUES
(76, '', 'Admin', '12345', '', 'admin', '', '', '', '', '', '2022-03-14 08:54:45', '0000-00-00', '0', ''),
(78, 'Kelly', 'Ikpefua', '425716', 'Esan South East', '07068897068', 'Onostar Pharmacy', 'Onostarkels@gmail.com', 'chef pee.png', 'Ohordua Town', '2022219778', '2022-03-14 21:59:25', '1989-05-15', 'Superintendent Pharmacist', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`);

--
-- Indexes for table `news_events`
--
ALTER TABLE `news_events`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `news_events`
--
ALTER TABLE `news_events`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=350;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
