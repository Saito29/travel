-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 04:26 PM
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
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categName` varchar(255) DEFAULT NULL,
  `categDesc` varchar(255) DEFAULT NULL,
  `categCreated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `categUpt_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `Is_Active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categName`, `categDesc`, `categCreated_at`, `categUpt_at`, `Is_Active`) VALUES
(1, 'Atimonan', 'All tourist spot here in Atimonan, Quezon. ', '2024-05-03 17:14:42', '2024-05-04 08:01:51', 1),
(8, 'Lucban', 'All Tourist spot of Lucban, Quezon.', '2024-05-06 15:08:00', '2024-05-06 23:22:53', 1),
(9, 'Tayabas', 'All Tourist spot here in in Tayabas, Quezon.', '2024-05-09 15:33:00', '2024-05-10 22:44:43', 1),
(10, 'Pagbilao', 'All tourist spot here in Pagbilao, Quezon province.', '2024-05-10 23:34:00', '0000-00-00 00:00:00', 1),
(11, 'Luciana', 'Luciana quezon province', '2024-05-13 21:57:00', '0000-00-00 00:00:00', 1),
(12, 'Dolores', 'Dolores', '2024-05-23 14:11:00', '0000-00-00 00:00:00', 1),
(13, 'Sariaya', 'Sariaya', '2024-05-23 14:11:00', '0000-00-00 00:00:00', 1),
(14, 'Padre Burgos', 'Padre Burgos', '2024-05-23 14:12:00', '0000-00-00 00:00:00', 1),
(15, 'Agdangan', 'Agdangan', '2024-05-23 14:13:00', '0000-00-00 00:00:00', 1),
(16, 'Candelaria', 'Candelaria', '2024-05-23 14:13:00', '0000-00-00 00:00:00', 1),
(17, 'Tiaong', 'Tiaong', '2024-05-23 14:15:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `details`, `contact`, `email`, `created_at`, `updated_at`) VALUES
(1, 'About Us', '<p>About us sample to edit</p>', '', '', '2024-05-21', '2024-05-21'),
(2, 'Terms and Conditions', '<p>Terms and Conditions of website travel</p>', '', '', '2024-05-21', '0000-00-00'),
(3, 'About Page', '<p>Travel is a capstone project that researchers propose a web-app system for educational blog with category for user interest. However it is still in a development to be reviewed by other end users and only had a limit of end user to be tester of the web-app project.</p>', '+639092308202', 'message.travel.com@gmail.com', '2024-05-21', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `postedBy` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `subcategory` int(11) DEFAULT NULL,
  `status` enum('published','unpublished') DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `googleWidget` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `viewer` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `is_Active` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `postedBy`, `title`, `category`, `subcategory`, `status`, `description`, `googleWidget`, `image`, `viewer`, `created_at`, `updated_at`, `is_Active`) VALUES
(2, 2, 'Hike Through History: Unveiling the Beauty of Mt. Pinagbanderahan in Atimonan, Quezon', 1, 1, 'published', '<p style=\"text-align: justify;\" data-sourcepos=\"3:1-3:53\">Nestled in the embrace of Quezon National Forest Park lies Mt. Pinagbanderahan, a mountain not just known for its breathtaking views but also its rich history. For those seeking an adventure steeped in the past, Mt. Pinagbanderahan offers a unique blend of historical exploration and stunning natural beauty.</p>\r\n<p style=\"text-align: justify;\" data-sourcepos=\"5:1-5:24\"><strong>A Walk Through Time:</strong></p>\r\n<p style=\"text-align: justify;\" data-sourcepos=\"7:1-7:15\">The name \"Pinagbanderahan\" translates to \"place of flags,\" a testament to the mountain\'s role during World War II. Guerilla fighters used the mountain\'s caves, like the revered Kuwebang Santa, as hideouts from Japanese forces [OpinYon News]. Imagine yourself trekking through the same paths once tread by brave resistors.</p>\r\n<p style=\"text-align: justify;\" data-sourcepos=\"9:1-9:30\"><strong>Natural Splendor Unveiled:</strong></p>\r\n<p style=\"text-align: justify;\" data-sourcepos=\"11:1-11:126\">The challenging yet rewarding trek to the summit is rewarded with panoramic views of the surrounding Quezon province. Imagine the feeling of accomplishment as you gaze upon lush forests, rolling hills, and perhaps even a glimpse of the distant coastline [YouTube (MT.PINAGBANDERAHAN KITA ANG GANDA NG BUONG QUEZON PINAKAMATAAS NA BUNDOK SA ATIMONAN QUEZON)].</p>\r\n<p style=\"text-align: justify;\" data-sourcepos=\"13:1-13:22\"><strong>Adventure Awaits:</strong></p>\r\n<p style=\"text-align: justify;\" data-sourcepos=\"15:1-15:437\">Mt. Pinagbanderahan caters to trekkers of varying experience levels. The well-maintained trails [AllTrails (Pinagbanderahan Trail, Quezon, Philippines)] are perfect for beginners, while the more adventurous can explore the caves hidden within the mountain. Don\'t forget to take a refreshing dip in the nearby Bantakay Falls after your climb [Pinoy Mountaineer (Mt. Pinagbanderahan, Bantakay Falls, and Quezon National Forest Park)].</p>\r\n<p style=\"text-align: justify;\" data-sourcepos=\"17:1-17:23\"><strong>Planning Your Trip:</strong></p>\r\n<p style=\"text-align: justify;\" data-sourcepos=\"19:1-19:271\">For a truly unforgettable experience, consider hiring a local guide who can share the mountain\'s history and hidden gems. Remember to pack comfortable hiking shoes, breathable clothing, and plenty of water. Responsible tourism is key, so be sure to leave no trace behind and respect the natural beauty of Mt. Pinagbanderahan.</p>\r\n<p style=\"text-align: justify;\" data-sourcepos=\"21:1-21:207\"><strong>Mt. Pinagbanderahan beckons those seeking a unique blend of history, adventure, and breathtaking scenery. So lace up your boots, pack your bags, and prepare to be awestruck by this hidden gem of Quezon.</strong></p>', '<p>&lt;iframe src=\"https://www.google.com/maps/embed?pb=!4v1716382808055!6m8!1m7!1sCAoSLEFGMVFpcE44c2tibXJCRnRoeHpJdnJoY1VrSTBhbTZyemhFVzFQRUpoLW5y!2m2!1d13.99581128727167!2d121.8106086619177!3f140!4f0!5f0.7820865974627469\" width=\"370\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"&gt;&lt;/iframe&gt;</p>', 'Thumbnail-664f58d30637e.webp', 0, '2024-05-22', '2024-05-23', 1),
(3, 2, 'Unveiling the Ecological Paradise: A Guide to Baypark in Atimonan, Quezon', 1, 1, 'published', '<p style=\"text-align: justify;\" data-sourcepos=\"3:1-3:53\">The coastal town of Atimonan, Quezon, boasts not only historical significance but also a hidden gem for nature lovers: Baypark. This ecological park offers a unique blend of educational experiences and outdoor recreation, making it the perfect destination for a family outing or a solo adventure focused on learning about the environment.</p>\r\n<p style=\"text-align: justify;\" data-sourcepos=\"5:1-5:25\"><strong>A Haven for Learning:</strong></p>\r\n<p style=\"text-align: justify;\" data-sourcepos=\"7:1-7:58\">Baypark serves as an educational haven for visitors of all ages. Interactive exhibits showcase the rich biodiversity of the region, from the diverse marine life teeming in the coral reefs to the various bird species that call the park home [Baypark Atimonan website (if available) / Atimonan Local Tourism Office]. Imagine learning about the delicate balance of the ecosystem and the importance of conservation efforts through engaging displays.</p>\r\n<p style=\"text-align: justify;\" data-sourcepos=\"9:1-9:27\"><strong>Exploring the Outdoors:</strong></p>\r\n<p style=\"text-align: justify;\" data-sourcepos=\"11:1-11:435\">Beyond the educational aspect, Baypark offers a variety of outdoor activities to enjoy. Take a leisurely stroll along the scenic walkways, breathing in the fresh ocean air and enjoying the calming sound of waves lapping at the shore. For the more adventurous, kayaking tours are available, allowing you to explore the nearby mangroves and observe the unique flora and fauna that thrive in this ecosystem [Baypark Atimonan website (if available) / Atimonan Local Tourism Office].</p>\r\n<p style=\"text-align: justify;\" data-sourcepos=\"13:1-13:25\"><strong>Learning Through Fun:</strong></p>\r\n<p style=\"text-align: justify;\" data-sourcepos=\"15:1-15:525\">Learning doesn\'t have to be confined to classrooms at Baypark. The park incorporates fun activities that make environmental education engaging, especially for younger visitors. Imagine participating in a guided birdwatching session, where you can spot a variety of colorful avian species flitting amongst the trees. Picnic areas are also available, making it the perfect spot to relax and enjoy a meal surrounded by nature after a day of exploration [Baypark Atimonan website (if available) / Atimonan Local Tourism Office].</p>\r\n<p style=\"text-align: justify;\" data-sourcepos=\"17:1-17:24\"><strong>Planning Your Visit:</strong></p>\r\n<p style=\"text-align: justify;\" data-sourcepos=\"19:1-19:441\">Baypark is open to the public year-round, making it a flexible destination for your itinerary. To make the most of your visit, consider contacting the Atimonan Local Tourism Office or checking the Baypark website (if available) for information on guided tours, schedules, and any applicable fees. Remember to dress comfortably for the outdoors, wear sunscreen, and bring a reusable water bottle to stay hydrated throughout your exploration.</p>\r\n<p style=\"text-align: justify;\" data-sourcepos=\"21:1-21:60\"><strong>Baypark in Atimonan, Quezon, is more than just a park; it\'s an educational sanctuary that fosters a connection with nature. So, pack your bags, grab your sense of adventure, and embark on a journey of learning and discovery at this one-of-a-kind ecological gem.</strong></p>', '<p>&lt;iframe src=\"https://www.google.com/maps/embed?pb=!4v1716480890551!6m8!1m7!1sv568JG5gE5eY-1FvbXAohw!2m2!1d14.00224428243575!2d121.9258422075901!3f38.710503!4f0!5f0.7820865974627469\" width=\"370\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"&gt;&lt;/iframe&gt;</p>', 'Thumbnail-664f6ba4d2555.jpg', 0, '2024-05-24', '2024-05-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `url` varchar(1000) DEFAULT NULL,
  `fb` varchar(1000) DEFAULT NULL,
  `instagram` varchar(1000) DEFAULT NULL,
  `tiktok` varchar(1000) DEFAULT NULL,
  `youtube` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `favicon`, `logo`, `url`, `fb`, `instagram`, `tiktok`, `youtube`) VALUES
(1, 'favicon-664f4a7386034.png', 'Logo-664f4a73863da.png', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `is_Active` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `name`, `description`, `created_at`, `updated_at`, `is_Active`) VALUES
(1, 'Tourist Spot', 'This sub category about tourist spot ', '2024-05-11 16:13:00', '0000-00-00 00:00:00', 1),
(2, 'Food', 'This sub-category is all about food to some places.', '2024-05-11 16:14:00', '2024-05-11 16:29:00', 1),
(3, 'Entertaintment', 'Entertainment', '2024-05-11 16:15:00', '2024-05-20 15:27:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` enum('admin','sub-admin','editor','user') DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `profileImage` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `account_activation_hash` varchar(64) DEFAULT NULL,
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `firstName`, `lastName`, `username`, `email`, `password`, `profileImage`, `created_at`, `updated_at`, `account_activation_hash`, `reset_token_hash`, `reset_token_expires_at`) VALUES
(1, 'admin', 'Admin', 'Admin', 'Admin', 'admin@gmail.com', '$2y$10$lMEzInpxPLBUS0Fzj3Ba2OOwx3LrMrroeTztugZSqkPn3mrUEc5m.', 'IMG-664d9a3b8309f-Admin.png', '2024-05-22 15:09:00', '2024-05-31 16:05:09', NULL, NULL, NULL),
(2, 'admin', 'Mark kinnedy', 'Anda', 'Saito29', 'markkinnedyanda@gmail.com', '$2y$10$zDm826wmos4sO383rHG1v.tcsTVB3SeuOpCIv73o6AY1h.V4OTFTW', 'IMG-664d9a70a7577-Saito29.jpg', '2024-05-22 15:10:00', '2024-06-02 15:45:15', NULL, NULL, NULL),
(3, 'editor', 'Mark kinnedy', 'Anda', 'Saito', 'saitohiragi29@gmail.com', '$2y$10$iklKjA3CTyJPfoFuq.dM4uAoXMu3O9T8YlnX0n/f.//T6GOBkrioK', 'IMG-6651abf648844-Saito.jpg', '2024-05-25 17:14:00', '2024-06-02 15:38:16', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categName` (`categName`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `subcategory` (`subcategory`),
  ADD KEY `postedBy` (`postedBy`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`),
  ADD UNIQUE KEY `account_activation_hash` (`account_activation_hash`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`category`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_3` FOREIGN KEY (`subcategory`) REFERENCES `subcategory` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_4` FOREIGN KEY (`postedBy`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
