-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2024 at 10:56 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todolist`
--

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `deadline` date NOT NULL,
  `priority` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `created_by` int(11) NOT NULL,
  `assigned_to` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `title`, `description`, `deadline`, `priority`, `status`, `created_by`, `assigned_to`) VALUES
(1, ' Qui quos rem placeat architecto voluptatum', '  Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, sapiente iusto? Veritatis\r\n                                fuga dolorum inventore? Qui quos rem placeat architecto voluptatum, maiores, ipsa odit similique\r\n                                aperiam nesciunt iste quidem quia? Quia assumenda reiciendis dolore pariatur officiis fuga sed\r\n                                perferendis fugit?', '2024-03-23', 0, 'done', 5, 0),
(2, 'hello', '', '4689-03-04', 1, 'pending', 0, 1),
(3, 'hey', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, sapiente iusto? Veritatis fuga dolorum inventore? Qui quos rem placeat architecto voluptatum, maiores, ipsa odit similique aperiam nesciunt iste quidem quia? Quia assumenda reiciendis dolore pariatur officiis fuga sed perferendis fugit?', '5665-03-04', 2, 'done', 0, 4),
(5, 'Title', 'Decription', '2024-11-17', 3, 'done', 4, 2),
(6, 'company painting', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim, a?', '2024-12-19', 3, 'pending', 4, 0),
(7, 'company cleanning', 'company cleanning company cleanning company cleanning', '2024-02-22', 2, 'pending', 4, 0),
(8, 'company cleanning', 'company cleanningcompany cleanningcompany cleanning', '2024-11-18', 1, 'pending', 4, 5),
(9, 'company cleanning', 'company cleanningcompany cleanningcompany cleanning', '0024-02-04', 3, 'pending', 5, 0),
(10, 'udechukwuakachukwu@gmail.com', '', '2024-03-31', 0, 'pending', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Chioke Damara', 'favourchioke11@gmail.com', '$2y$10$cW8g/iqKwqQTAqkf5mR/u.E0FcoOBsX4vT91mpNZPaR4no3RRP6bu', 'admin'),
(2, 'Chioke Favour', 'favourchioke01@gmail.com', '$2y$10$WQnMTi5BGEaSt/y5GLg6LO7sHf0Te.Yh5JhGgrpE086IjU5iO9oSm', 'user'),
(3, 'naza', 'naza@gmail.com', '$2y$10$Q3Kw3VqwXUgHGzrt8I06DeO0BFJP7GKQliyVs5IqMadPZapP9Hb86', 'manager'),
(4, 'Akachukwu', 'udechukwuakachukwu@gmail.com', '$2y$10$X28As9vu7lQLlstf7XmLY.EgfEbGNAbEIpm7mcMAhdAn0jWgoxq9.', 'manager'),
(5, 'favour', 'favourchioke@gmail.com', '$2y$10$taEiMDoIPDlX1GU8rLgLwOex4eZ9IJdBEuAVUlAozGasYccU2Apjm', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
