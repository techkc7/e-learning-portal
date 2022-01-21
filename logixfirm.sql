-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2020 at 05:25 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logixfirm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `pass`) VALUES
(2, 'lgx@gmail.com', '7ed0ce7613bc7d446f04768908b5c479');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `course_id` int(15) NOT NULL,
  `userid` int(15) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `course_id`, `userid`, `price`) VALUES
(17, 35, 1, 5999);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `title`) VALUES
(47, 'java'),
(48, 'java advanced'),
(49, 'php'),
(50, 'css'),
(51, 'python');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(15) NOT NULL,
  `name` varchar(200) NOT NULL,
  `cat_id` int(15) NOT NULL,
  `prev_img` varchar(255) NOT NULL,
  `prev_video` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `cat_id`, `prev_img`, `prev_video`, `price`, `date`) VALUES
(35, 'java', 47, 'courses/img/java.jpg', 'courses/previews/1.mp4', 5999, '2020-12-19 20:16:50'),
(36, 'php beginner', 49, 'courses/img/java3.jpg', 'courses/previews/2.mp4', 999, '2020-12-19 20:17:44'),
(37, 'java', 47, 'courses/img/java.jpg', 'courses/previews/1.mp4', 5999, '2020-12-19 20:18:30'),
(38, 'java', 47, 'courses/img/java.jpg', 'courses/previews/1.mp4', 4999, '2020-12-19 20:18:46'),
(39, 'java', 47, 'courses/img/java.jpg', 'courses/previews/1.mp4', 2999, '2020-12-19 20:19:00'),
(40, 'java', 47, 'courses/img/java.jpg', 'courses/previews/1.mp4', 1999, '2020-12-19 20:19:20'),
(41, 'java se', 48, 'courses/img/java.jpg', 'courses/previews/1.mp4', 12999, '2020-12-19 20:20:09'),
(42, 'java se', 48, 'courses/img/java.jpg', 'courses/previews/1.mp4', 12999, '2020-12-19 20:20:41'),
(43, 'java se', 48, 'courses/img/java.jpg', 'courses/previews/1.mp4', 6999, '2020-12-19 20:21:05'),
(44, 'java introduction', 47, 'courses/img/java.jpg', 'courses/previews/1.mp4', 6999, '2020-12-19 20:21:42'),
(45, 'python', 51, 'courses/img/java4.jpg', 'courses/previews/3.mp4', 1999, '2020-12-19 20:22:56'),
(46, 'python', 51, 'courses/img/java4.jpg', 'courses/previews/3.mp4', 1999, '2020-12-19 20:23:04'),
(47, 'python', 51, 'courses/img/java4.jpg', 'courses/previews/3.mp4', 3999, '2020-12-19 20:23:16'),
(48, 'php beginner', 49, 'courses/img/java5.jpg', 'courses/previews/3.mp4', 3999, '2020-12-19 20:24:06'),
(49, 'Css beginner', 50, 'courses/img/java5.jpg', 'courses/previews/3.mp4', 499, '2020-12-19 20:25:34'),
(50, 'php advance', 49, 'courses/img/k2.gif', 'courses/previews/6.mp4', 4999, '2020-12-22 21:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `amt` int(10) NOT NULL,
  `userid` int(15) NOT NULL,
  `course_id` int(10) NOT NULL,
  `status` enum('pending','accepted') NOT NULL DEFAULT 'pending',
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `amt`, `userid`, `course_id`, `status`, `date`) VALUES
(6, 4999, 1, 48, 'accepted', '2020-12-19 15:06:38');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(50) NOT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `amt` int(10) DEFAULT NULL,
  `userid` int(15) DEFAULT NULL,
  `signature_hash` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_id`, `order_id`, `amt`, `userid`, `signature_hash`, `date`) VALUES
(8, '1', '1', 1000, 72, '11ydyqduhisiqwu', '2020-12-16 07:28:36'),
(9, '2', '2', 1200, 2, '2shdas', '2020-12-09 08:11:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `phone` int(15) DEFAULT NULL,
  `course` varchar(100) DEFAULT NULL,
  `school` varchar(255) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `name`, `username`, `email`, `pass`, `phone`, `course`, `school`, `reg_date`) VALUES
(1, 'Kishan', 'kishan', 'kcr@gmail.com', 'aed2cf5aadc14360eebe32f03e98937c5091100294835a6eec471c7b1124b0124ac64f5e67df84da2250997a09989ff27eee41524c2360fe866b9c1c0a128724', 1456578899, 'Mca', 'iit dwarka', '2020-12-04 22:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `video_id` int(15) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `duration` varchar(10) DEFAULT NULL,
  `views` int(11) DEFAULT 0,
  `course_id` int(11) NOT NULL,
  `upload_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`video_id`, `title`, `description`, `filepath`, `notes`, `duration`, `views`, `course_id`, `upload_date`) VALUES
(14, 'java introduction', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content', 'courses/videos/1.mp4', 'courses/videos/notes/my.pdf', NULL, 0, 35, '2020-12-19 20:30:05'),
(15, 'java introduction 1', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content', 'courses/videos/1.mp4', 'courses/videos/notes/my.pdf', NULL, 0, 35, '2020-12-19 20:30:31'),
(16, 'java introduction part 3', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content', 'courses/videos/1.mp4', 'courses/videos/notes/my.pdf', NULL, 0, 35, '2020-12-19 20:30:53'),
(17, 'java introduction part 4', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content', 'courses/videos/1.mp4', 'courses/videos/notes/my.pdf', NULL, 0, 35, '2020-12-19 20:31:01'),
(18, 'java introduction part 1', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content', 'courses/videos/1.mp4', 'courses/videos/notes/my.pdf', NULL, 0, 37, '2020-12-19 20:31:27'),
(19, 'java introduction part 2', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content', 'courses/videos/1.mp4', 'courses/videos/notes/my.pdf', NULL, 0, 37, '2020-12-19 20:31:37'),
(20, 'java introduction part 1', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content', 'courses/videos/1.mp4', 'courses/videos/notes/my.pdf', NULL, 0, 38, '2020-12-19 20:31:54'),
(21, 'java introduction part 2', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content', 'courses/videos/1.mp4', 'courses/videos/notes/my.pdf', NULL, 0, 38, '2020-12-19 20:32:31'),
(22, 'php introduction part 1', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content', 'courses/videos/1.mp4', 'courses/videos/notes/my.pdf', NULL, 1, 48, '2020-12-19 20:32:52'),
(23, 'php introduction part 1', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content', 'courses/videos/1.mp4', 'courses/videos/notes/my.pdf', NULL, 0, 48, '2020-12-19 20:32:57'),
(24, 'php introduction part 3', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content', 'courses/videos/1.mp4', 'courses/videos/notes/my.pdf', NULL, 0, 48, '2020-12-19 20:33:04'),
(25, 'python introduction part 1', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content', 'courses/videos/1.mp4', 'courses/videos/notes/my.pdf', NULL, 0, 45, '2020-12-19 20:33:22'),
(26, 'python introduction part 6', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful c', 'courses/videos/1.mp4', 'courses/videos/notes/my.pdf', NULL, 0, 45, '2020-12-19 20:33:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ref_no` (`signature_hash`),
  ADD UNIQUE KEY `payment_id` (`payment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `video_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
