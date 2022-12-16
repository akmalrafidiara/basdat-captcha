-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2022 at 03:52 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2022_basdat_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `message`, `created_at`) VALUES
(1, 2, 'The way to get started is to quit talking and begin doing', '2022-12-08 21:08:15'),
(2, 2, 'Do not go where the path may lead, go instead where there is no path and leave a trail.', '2022-12-08 21:08:34'),
(3, 3, 'Life is never fair, and perhaps it is a good thing for most of us that it is not.', '2022-12-08 21:53:52'),
(4, 4, 'Life is either a daring adventure or nothing at all.', '2022-12-09 02:18:19'),
(19, 1, 'è™Žç©´ã«å…¥ã‚‰ãšã‚“ã°è™Žå­ã‚’å¾—ãš', '2022-12-15 11:21:02'),
(21, 6, 'Awikwok', '2022-12-15 20:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `birth_of_date` date NOT NULL,
  `gender` varchar(100) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `f_name`, `l_name`, `birth_of_date`, `gender`, `create_at`) VALUES
(1, 'akmalrafidiara', 'akmalrafidiara@gmail.com', '$2y$10$4zgCjQOYjV3LbvbeZ19WBedzPl6IR6SXwvzsaFuQ.KL4OFjdj/5JO', 'Akmal', 'Rafi', '2003-10-18', 'male', '2022-12-08 12:53:54'),
(2, 'takemikazuchi', 'takemikazuchi@gmail.com', '$2y$10$yo8xslkFmG3/DjfrDQJMkOn2lp30vm/O/D/MStAprdyVQ6eLwrdEm', 'Take', 'Moal', '2022-12-02', 'male', '2022-12-08 13:05:09'),
(3, 'mizzata', 'ijat@gmail.com', '$2y$10$CrdQJl1yrNGQo2DZs7a6mei6RJpJHMZLJnvp21M5CzMI0hsKQWh1a', 'Izzat', 'Azizan', '2022-11-09', 'male', '2022-12-09 04:52:50'),
(4, 'hanaulfia', 'hanaulfia@gmail.com', '$2y$10$K9nuNGwJ8w2Qncvq4QwZBOKA5LK.RQD/plrRaOg3tDI3tg19yWclK', 'Hana', 'Ulfia', '2002-09-26', 'male', '2022-12-09 09:14:37'),
(5, 'rasyad', 'rasyad@gmail.com', '$2y$10$oGWvDLftMv5vSASwxpzQSeo4dzKMWpZatzVKoX2e0sxb2Rv5EHBu.', 'Rasyaad', 'Khandias', '2022-12-01', 'male', '2022-12-11 10:09:31'),
(6, 'rawwrrr', 'rawdomadina_1313621028@mhs.unj.ac.id', '$2y$10$wT8UOh7Lyd/tEmlWAzGp9.C..MwFRb4IDU8dUbZCIsU0/.MHQy.s6', 'Rawdo', 'Madina', '2026-06-26', 'male', '2022-12-16 03:45:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
