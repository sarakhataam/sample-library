-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2022 at 07:12 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libraries`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `author_name` varchar(200) NOT NULL,
  `edition` date NOT NULL,
  `submission_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `user_id`, `num`, `title`, `author_name`, `edition`, `submission_date`) VALUES
(1, 2, 735211299, 'Atomic Habits', 'James Clear', '2016-05-02', '2016-09-02'),
(2, 5, 735219109, 'Where the Crawdads Sing', 'Delia Owens', '2019-04-01', '2020-04-01'),
(3, 1, 62563661, 'Women in the Castle A Novel', 'Jessica Shattuck', '2018-11-06', '2021-11-06'),
(4, 0, 123456789, 'dream', 'sara', '2016-12-12', '2021-11-11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `num_of_password for only me` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `num_of_password for only me`) VALUES
(1, 'sara', 'sara@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456'),
(2, 'Ahmed', 'Ahmed@gmail.com', 'c4b5c86bd577da3d93fea7c89cba61c78b48e589', '0123'),
(3, 'Mariam', 'mariam@gmail.com', '229be39e04f960e46d8a64cadc8b4534e6bfc364', '1236'),
(4, 'Alaa', 'alaa@gmail.com', '23b23be9da2519c88f11c084310bcc0bf14417f8', '741'),
(5, 'Rewan', 'rewan@gmail.com', 'a2859c4b84f0826171946370100d6bf9f3fad000', '8520');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
