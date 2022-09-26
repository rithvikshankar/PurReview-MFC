-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2022 at 03:20 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mfc_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `userid` bigint(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`userid`, `fname`, `lname`, `dob`, `email`, `password`) VALUES
(102, 'Testing', 'Kumar', '1979-10-03', 'testingkumar999@gmail.com', '$2b$10$A.yWkXTSHCXQje4rarX0XOaHBOG7i89l770fgCYUxBgdCsaQM54Na'),
(105, 'Silver', 'Wing', '2002-02-02', 'silverwing@gmail.com', '$2y$10$ZOSwG.3dA3aKkLWOYfXUOe4OkfKIhR2cA8RtcAOgKMM1ck6sCB70i'),
(108, 'Rithvik', 'Shankar', '2001-04-20', 'rith@gmail.com', '$2y$10$Wzc8LUetWCgjDSEAmJ7asOPHWRm65LlyAaw5XPsi1VOZs.bOhzWnS'),
(109, 'Anuj', 'Agrawal', '2000-08-28', 'anuj@gmail.com', '$2y$10$pwn5KXyo7ew1GNwP5fFBbOUaARwuTrMf8rHjjSpe2yWCmLBzYhRPW');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `postid` bigint(100) NOT NULL,
  `userid` bigint(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `image_name` varchar(100) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postid`, `userid`, `title`, `content`, `image_name`, `date`) VALUES
(100, 101, 'WALL E', 'A robot who is responsible for cleaning a waste-covered Earth.', 'walle.jpeg', '2021-12-02 02:38:39'),
(107, 108, 'Samsung Galaxy S22 Ultra', 'Hi all! I bought this phone 3 months ago and I have a lot of thoughts...', 'phoneImage.jpg', '2022-04-29 20:51:45');

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `userid` bigint(100) NOT NULL,
  `postid` bigint(100) NOT NULL,
  `commentid` bigint(100) NOT NULL,
  `comment` varchar(10000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_comments`
--

INSERT INTO `post_comments` (`userid`, `postid`, `commentid`, `comment`, `date`) VALUES
(102, 100, 100, 'I have this cute cleaning robot and it does its job very well! Definitely recommend it.', '2021-12-01 21:15:24'),
(102, 101, 101, 'Interesting review', '2021-12-02 02:49:28'),
(101, 101, 102, 'Testing', '2022-04-26 09:17:56'),
(101, 104, 103, 'it works', '2022-04-26 09:27:13'),
(101, 105, 104, 'Diluc is awesome', '2022-04-26 09:31:03'),
(106, 105, 105, 'I like grape juice', '2022-04-26 09:34:58'),
(101, 103, 106, 'Lovely wallpaper!', '2022-04-26 09:58:14'),
(101, 105, 107, 'hello\r\n', '2022-04-27 07:37:25'),
(108, 107, 115, 'Wow, I have wanted to buy this phone for a while. This was very\r\nuseful, thanks a lot!', '2022-04-29 15:39:20'),
(109, 107, 116, 'I was also considering getting one, this might just help my decision.', '2022-04-29 15:44:08');

-- --------------------------------------------------------

--
-- Table structure for table `upvotes`
--

CREATE TABLE `upvotes` (
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `action` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upvotes`
--

INSERT INTO `upvotes` (`userid`, `postid`, `action`) VALUES
(101, 100, 'UP'),
(101, 105, 'DOWN'),
(102, 100, 'UP'),
(103, 100, 'DOWN'),
(104, 100, 'UP'),
(107, 100, 'UP');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postid`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `upvotes`
--
ALTER TABLE `upvotes`
  ADD PRIMARY KEY (`userid`,`postid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `userid` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `postid` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `commentid` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
