-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2021 at 09:56 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `category_name`, `post`) VALUES
(14, 'Entertairnment', 2),
(16, 'Health', 1),
(28, 'Politics', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `category` varchar(255) NOT NULL,
  `post_date` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `post_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(289, 'Our Politics', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus deserunt rem recusandae debitis sit inventore molestiae necessitatibus. Cupiditate consectetur in, perferendis molestiae fuga aliquid error, dolorum saepe dolorem porro inventore?\r\n', '28', '05 Apr, 2021', '27', 'Untitled-4.png'),
(290, 'Our Politics', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus deserunt rem recusandae debitis sit inventore molestiae necessitatibus. Cupiditate consectetur in, perferendis molestiae fuga aliquid error, dolorum saepe dolorem porro inventore?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus deserunt rem recusandae debitis sit inventore molestiae necessitatibus. Cupiditate consectetur in, perferendis molestiae fuga aliquid error, dolorum saepe dolorem porro inventore?\r\n', '14', '05 Apr, 2021', '27', 'Untitled-5.png'),
(291, 'Our Health', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus deserunt rem recusandae debitis sit inventore molestiae necessitatibus. Cupiditate consectetur in, perferendis molestiae fuga aliquid error, dolorum saepe dolorem porro inventore?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus deserunt rem recusandae debitis sit inventore molestiae necessitatibus. Cupiditate consectetur in, perferendis molestiae fuga aliquid error, dolorum saepe dolorem porro inventore?\r\n', '16', '05 Apr, 2021', '27', 'Untitled-12.1.png'),
(292, 'Wajeeh', 'What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?\r\n\r\nWhat is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?\r\n\r\nWhat is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?\r\n\r\nWhat is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an', '14', '05 Apr, 2021', '28', 'Untitled-5.png');

-- --------------------------------------------------------

--
-- Table structure for table `user-table`
--

CREATE TABLE `user-table` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user-table`
--

INSERT INTO `user-table` (`user_id`, `name`, `last_name`, `username`, `password`, `role`) VALUES
(27, 'wajeeh', 'shah', 'wajeeh', '3b712de48137572f3849aabd5666a4e3', 1),
(28, 'Shan', 'Haider', 'shah', '3b712de48137572f3849aabd5666a4e3', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user-table`
--
ALTER TABLE `user-table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;

--
-- AUTO_INCREMENT for table `user-table`
--
ALTER TABLE `user-table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
