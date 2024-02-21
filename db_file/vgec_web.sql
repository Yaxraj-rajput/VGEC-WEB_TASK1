-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2024 at 07:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vgec_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expiry_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`id`, `email`, `token`, `expiry_time`) VALUES
(1, 'yaxrajdabhi@gmail.com', '198f7af56cd37e8e716950531556f9ec0d0bc29a', '2024-02-21 16:17:43'),
(2, 'yaxrajdabhi@gmail.com', 'fae4dd4ea1cb6082bd27520a9c629fbb56230577', '2024-02-21 16:18:27'),
(3, 'yaxrajdabhi@gmail.com', 'fbe864ff19f66866a48f306ef2b8768d9cc1c209', '2024-02-21 16:18:37'),
(4, 'yaxrajdabhi@gmail.com', '61db0fbb34599038152098a71e1401be0ca1273b', '2024-02-21 16:18:42'),
(5, 'yaxrajdabhi@gmail.com', '19ff536f28cf778b9d7c8656572e9d7716601d27', '2024-02-21 16:18:50'),
(6, 'yaxrajdabhi@gmail.com', '6f1e5915383be6e37016007d448568e89b62e2b7', '2024-02-21 16:19:00'),
(7, 'yaxrajdabhi@gmail.com', 'e4265e1523e24a641994a57b377e8b090f4dee54', '2024-02-21 16:21:12'),
(8, 'yaxrajdabhi@gmail.com', 'e5c86394f54fcc1873e7f901acaae5bcd8c24682', '2024-02-21 16:21:18'),
(9, 'yaxrajdabhi@gmail.com', '1189f5f263186cc13bdcca703282df07e6032b8b', '2024-02-21 16:22:22'),
(10, 'yaxrajd@gmail.com', '43456a8225ec1ac075bbc9dcbab3be2dfc9f3d95', '2024-02-21 16:22:24'),
(11, 'yaxrajd@gmail.com', 'c63cb1518969b61f7706cfa2963e509a760da625', '2024-02-21 16:22:45'),
(12, 'sdfdsf@fdf', 'dc72ecf00418cb12a2ddcd568ff88158c9703103', '2024-02-21 16:23:02'),
(13, 'yaxrajd@gmail.com', 'b84297e1d4b2609dda00d70892977166e9cff8be', '2024-02-21 16:23:06'),
(14, 'yaxrajd@gmail.com', '5c9a12ddc3a5d4a207e3c5065090481dd7df50e5', '2024-02-21 16:24:48'),
(15, 'yaxrajd@gmail.com', '18270c6d8dd78ab0dd37f7d7c4916e1e9a44702b', '2024-02-21 16:24:50'),
(16, 'yaxrajd@gmail.com', '619c4c4fb10c013b7603c27394d3b2aa46907ff4', '2024-02-21 16:29:40'),
(17, '6359281064@fdfdf', '7516f71fd8c72c7f0fe67af5e66db55acb8331a1', '2024-02-21 19:55:35'),
(18, 'sdfdsf@fdf', 'aca920e02bbed348a79111331b6f383a6da63d37', '2024-02-21 19:55:43'),
(19, 'yaxrajd@gmail.com', '6b422afc1b6f6cb3c9dffd3109a6c473fae50785', '2024-02-21 19:55:54'),
(20, 'yaxrajdabhi@gmail.com', 'd5b3ff3af0b7cddcbcecfe0e0b07822de706b0c3', '2024-02-21 20:04:25'),
(21, 'tsupperb@gmail.com', '3ab8ae7ff3c2a2908819394ae8091192995a504d', '2024-02-21 20:04:54'),
(22, 'yaxrajd@gmail.com', '4b5e5de6711f499d31cbf7142b890de3889b5ef9', '2024-02-21 20:05:10'),
(23, 'yaxrajd@gmail.com', 'cbf0b4d62573ce6fc5a925147389ff97911e8894', '2024-02-21 20:06:57'),
(24, 'yaxrajd@gmail.com', '57c7deb592d572c8e56a563adab6d553e4a4a442', '2024-02-21 20:07:15');

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL DEFAULT 'NO TITLE FOUND',
  `description` text NOT NULL DEFAULT 'NO DESCRIPTION',
  `time_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(18, 'yaxraj', 'yaxrajd@gmail.com', '3b6beb51e76816e632a40d440eab0097'),
(19, 'yax', 'yaxrajdabhi@gmail.com', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
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
-- AUTO_INCREMENT for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
