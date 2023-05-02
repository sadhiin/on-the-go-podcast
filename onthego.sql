-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2023 at 05:38 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onthego`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

CREATE TABLE `episodes` (
  `episode_id` int(11) NOT NULL,
  `podcast_id` int(11) NOT NULL,
  `title` int(11) NOT NULL,
  `description` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `user_id` int(11) NOT NULL,
  `podcast_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`user_id`, `podcast_id`) VALUES
(1, 5),
(1, 5),
(1, 7),
(1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `podcasts`
--

CREATE TABLE `podcasts` (
  `podcast_id` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `post_path` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `podcasts`
--

INSERT INTO `podcasts` (`podcast_id`, `title`, `description`, `image`, `date`, `post_path`, `user_id`) VALUES
(2, 'new podcast', 'dkskdslkdfs', 'thumbnail/img2.jpg.jpg', '2023-04-28', 'audio_files/Every Indian Podcast Ever ft Dostcast  Salonayyy  Saloni Gaur.mp3.mp3', 1),
(3, 'dfsfds', 'sdfdsfdsf', 'thumbnail/img1.jpg', '2023-04-28', 'audio_files/Every Indian Podcast Ever ft Dostcast  Salonayyy  Saloni Gaur.mp3', 1),
(5, 'Another from temp user', 'some description about the podcast. some description about the podcast. some description about the podcast.', 'thumbnail/img6.jpg', '2023-04-28', 'audio_files/Suniel Shettys Advice To His SonInLaw KL Rahul shorts.mp3', 2),
(6, 'Giving the advice for Pakistan ', 'Advice for Pakistan Advice for Pakistan Advice for Pakistan Advice for Pakistan Advice for Pakistan Advice for Pakistan Advice for Pakistan Advice for Pakistan', 'thumbnail/img3.jpg', '2023-04-28', 'audio_files/Pakistans REAL Situation Declining Economy  Terrorism.mp3', 1),
(7, 'Suniel Shettys Advice', 'Suniel Shettys Advice ', 'thumbnail/img1.jpg', '2023-04-28', 'audio_files/Suniel Shettys Advice To His SonInLaw KL Rahul shorts.mp3', 1),
(9, 'Talking about her X Factor', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla magni dignissimos tempora earum officia mollitia ratione deleniti laboriosam, expedita quam repudiandae minima nisi reprehenderit temporibus doloremque. Repellat voluptates dicta sequi!\r\nLorem', 'thumbnail/img (22).webp', '2023-04-29', 'audio_files/Barkha Singhs X Factor  BeerBiceps Shorts.mp3', 1),
(10, 'Her Worst Interview', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla magni dignissimos tempora earum officia mollitia ratione deleniti laboriosam, expedita quam repudiandae minima nisi reprehenderit temporibus doloremque. Repellat voluptates dicta sequi!\r\nLorem', 'thumbnail/img (23).webp', '2023-04-29', 'audio_files/Truth Behind Pervez Musharraf  Her Worst Interview Was.mp3', 1),
(11, 'Is Physical Attraction Really Important', 'Here is the description  Here is the description   Here is the description   Here is the description   Here is the description Here is the description .', 'thumbnail/img (10).webp', '2023-04-30', 'audio_files/Is Physical Attraction Really Important .mp3', 1),
(12, 'Indian Believes in The Raj Sahmani', 'Here is the description  Here is the description  Here is the description Here is the description  Here is the description Here is the description ', 'thumbnail/img (22).webp', '2023-04-30', 'audio_files/India Believes in This  Raj Shamani shorts.mp3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `podcast_categories`
--

CREATE TABLE `podcast_categories` (
  `podcast_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(8) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `profilepicpath` varchar(255) NOT NULL,
  `user_about` varchar(255) NOT NULL DEFAULT 'tell others about yourself'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `name`, `profilepicpath`, `user_about`) VALUES
(1, 'sadhin', '1q2w3eQ!', 'mydummymail66@gmail.com', 'SADHIN', 'upload/1681494573.webp', 'tell others about your self'),
(2, 'temp', '123Asd!@#', 'mydummymail66@gmail.com', 'Temp User', 'upload/profile.png', 'tell others about yourself'),
(3, 'siddik', '1q2w3eQ!', 'siddik@mail.com', 'Siddik Abubakar', 'upload/1682824431.png', 'tell others about yourself');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`episode_id`),
  ADD KEY `podcast_id` (`podcast_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`podcast_id`);

--
-- Indexes for table `podcasts`
--
ALTER TABLE `podcasts`
  ADD PRIMARY KEY (`podcast_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `podcast_categories`
--
ALTER TABLE `podcast_categories`
  ADD KEY `podcast_id` (`podcast_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `episode_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `podcasts`
--
ALTER TABLE `podcasts`
  MODIFY `podcast_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `episodes`
--
ALTER TABLE `episodes`
  ADD CONSTRAINT `episodes_ibfk_1` FOREIGN KEY (`podcast_id`) REFERENCES `podcasts` (`podcast_id`);

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `history_ibfk_2` FOREIGN KEY (`podcast_id`) REFERENCES `podcasts` (`podcast_id`);

--
-- Constraints for table `podcasts`
--
ALTER TABLE `podcasts`
  ADD CONSTRAINT `podcasts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `podcast_categories`
--
ALTER TABLE `podcast_categories`
  ADD CONSTRAINT `podcast_categories_ibfk_1` FOREIGN KEY (`podcast_id`) REFERENCES `podcasts` (`podcast_id`),
  ADD CONSTRAINT `podcast_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
