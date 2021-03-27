-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 25, 2021 at 12:51 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `gs_an_table`
--

CREATE TABLE `gs_an_table` (
  `id` int(11) NOT NULL,
  `email` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gs_an_table`
--

INSERT INTO `gs_an_table` (`id`, `email`, `password`, `indate`) VALUES
(56, 'r@r', '$2y$10$MsFuAKkchwDPdXXY/8HaRelzR0qM5HNH27yxY.Qi/DMiwYlE.btf2', '2021-03-22 23:44:21'),
(57, 'h@h', '$2y$10$fM5XDnc0zE6Mm6n11Zq28u/J2dOIUg86cdqBtULBDG01YjGtA5TaO', '2021-03-22 23:44:56'),
(58, 't@t', '$2y$10$Qg/t4pjrk.I/8TrsKL9IceiNvlp9ZG7FSfhRk0yYnbZQgAL/r/GTa', '2021-03-22 23:50:49'),
(59, 'test@test', '$2y$10$gLvXVEul1SeWi.syF4qyvOZq2ksZQMg3f96S3iinDIYVtyiEKnomC', '2021-03-23 07:55:58'),
(60, 'g@g', '$2y$10$FDILMqSsM7bXDo/GMMrL7uKvEF7iuzV0j7.o7JEBkaPpO03xlxC5u', '2021-03-23 08:00:59'),
(61, 'l@l', '$2y$10$/6rgkZoDjTQfalbdAs1.xu.f0GfEIEZMcDfNeYwYcfA5E9WXEmdry', '2021-03-23 19:52:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_an_table`
--
ALTER TABLE `gs_an_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_an_table`
--
ALTER TABLE `gs_an_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
