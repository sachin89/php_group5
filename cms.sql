-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2016 at 06:25 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(6) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(40) NOT NULL,
  `contents` text NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `image`, `contents`, `category`) VALUES
(1, 'Courses ', 'courses.png', 'New courses are available at NISS.', 'Courses'),
(2, 'Diploma in Sports Science', 'courses.png', 'This course has been conducted for more than 3 decades and has a reputation in Sri Lankan sports field. Our past students serve as sports officers, physical training instructors in government and private sector organizations throughout the country. This Diploma is a requisite for recruitment and promotion of government sector employments. Candidates to follow this programs are selected on competitive selection process by a written examination followed by a practical test. Notice calling for applications appears in Government Gazette Notification annually. ', 'Courses');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category`) VALUES
('Courses');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `trn_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `trn_date`) VALUES
(4, 'sachin', 'sachin.sprk@gmail.com', '15285722f9def45c091725aee9c387cb', '2016-11-07 17:56:45'),
(5, 'reus', 'reus@outlook.com', 'abc76765bf30216f9964d72f20b0aabb', '2016-11-07 18:31:14'),
(6, 'shane', 'shane@yahoo.com', '7790ffbb26cf6409e707105e92cde91e', '2016-11-07 18:35:45'),
(7, 'bale', 'bale@yahoo.com', 'c0ef99bb77c1ddc9c95ad07d641a3a4b', '2016-11-07 18:41:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`,`title`,`category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
