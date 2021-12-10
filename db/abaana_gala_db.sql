-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2021 at 12:03 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abaana_gala_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` bigint(20) NOT NULL,
  `url_address` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `url_address`, `title`, `image`, `description`, `date`) VALUES
(1, 'HqdP97RKnnRjssgE3uYuegYMEO', 'Image Title', 'uploads/testingimage.jpg', 'Image Description.', '2021-12-08 13:07:22'),
(2, 'llkMKvtGuXk6o9eJBHrL4fICm7Z5VyCoSVWv5oXFTzNgPp1XWk', 'Another image', 'uploads/anotherimage.jpg', 'This a description of another image', '2021-12-08 13:45:46'),
(3, 'iMjVO48mrouPSFlgiayOlTVjFeo8MDu', 'Happy children', 'uploads/childrenphotos.jpg', 'Another Happy Children photo', '2021-12-08 13:58:54'),
(4, 'Sv2ywL4M9F', 'Organization logo', 'uploads/logo.jpg', 'This is the real deal', '2021-12-08 14:00:51'),
(5, 'T6zV4zt9VowvSLInchtUpDutqtWaOhM9h2kOITrI0O8XDX9b', 'Computer Dogs', 'uploads/dog.jpg', 'Computer Labs', '2021-12-08 15:26:43');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` bigint(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `url_address` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `email`, `password`, `url_address`, `date_created`) VALUES
(2, 'ecurut', 'ecurut.andre@gmail.com', 'password', 'JOFWpFAVH6H', '2021-12-02 08:32:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `url_address` (`url_address`),
  ADD KEY `title` (`title`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `url_address` (`url_address`),
  ADD KEY `username` (`username`),
  ADD KEY `password` (`password`),
  ADD KEY `date_created` (`date_created`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
