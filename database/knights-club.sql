-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2021 at 02:51 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knightclub`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `send_message` (IN `message_subject_value` VARCHAR(512), IN `message_content_value` VARCHAR(65000), IN `sender_id_value` INT, IN `receiver_id_value` INT)  BEGIN
	DECLARE var_message_id INT;
    SELECT MAX(id) +1 INTO var_message_id FROM messages;
	INSERT INTO messages (id,message_subject, message_content, message_date) VALUES(var_message_id,message_subject_value, message_content_value, CURRENT_TIMESTAMP);
    INSERT INTO message_senders (sender_id,message_id) VALUES (sender_id_value,var_message_id);
    INSERT INTO message_receivers (receiver_id,message_id) VALUES (receiver_id_value,var_message_id);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `subject`, `content`, `date`) VALUES
(1, 1, 'Nice website', 'Very nice website, like the design!', '2021-07-09 09:32:26');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user_id`, `friend_id`) VALUES
(1, 1, 2),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picextension` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `main_image` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `user_id`, `image_name`, `picextension`, `main_image`) VALUES
(1, 1, 'ben-sweet-2LowviVHZ-E-unsplash', 'jpg', 0),
(2, 2, 'eddy-lackmann-lLdGG3ESoiI-unsplash', 'jpg', 1),
(3, 2, 'mateo-avila-chinchilla-x_8oJhYU31k-unsplash', 'jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

CREATE TABLE `hobbies` (
  `id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hobbies`
--

INSERT INTO `hobbies` (`id`, `description`) VALUES
(1, 'Tennis');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message_subject` varchar(200) NOT NULL,
  `message_content` varchar(500) NOT NULL,
  `message_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message_subject`, `message_content`, `message_date`) VALUES
(1, 'subject 1', 'content 1', '2021-07-26'),
(3, 'subject 2', 'content 2', '2021-07-26'),
(4, 'subject 3', 'content 3', '2021-07-26'),
(5, 'subject 4', 'content 4', '2021-07-26'),
(6, 'subject 5', 'content 5', '2021-07-26'),
(7, 'subject 6', 'content 6', '2021-07-26'),
(8, 'store_procedure_subject', 'stored procedure is created successfully', '2021-07-27'),
(9, 'subject 100', 'content 100', '2021-07-27');

-- --------------------------------------------------------

--
-- Table structure for table `message_receivers`
--

CREATE TABLE `message_receivers` (
  `id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `is_read` tinyint(1) NOT NULL,
  `in_trash` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_receivers`
--

INSERT INTO `message_receivers` (`id`, `receiver_id`, `message_id`, `is_read`, `in_trash`) VALUES
(1, 2, 1, 1, 0),
(2, 2, 3, 0, 0),
(3, 2, 4, 0, 0),
(4, 2, 5, 0, 0),
(5, 2, 6, 1, 1),
(6, 1, 7, 0, 0),
(7, 2, 8, 1, 0),
(8, 2, 9, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `message_senders`
--

CREATE TABLE `message_senders` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL COMMENT 'point to id of messages table',
  `in_trash` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_senders`
--

INSERT INTO `message_senders` (`id`, `sender_id`, `message_id`, `in_trash`) VALUES
(1, 1, 1, 0),
(2, 1, 3, 0),
(3, 1, 4, 0),
(4, 1, 5, 0),
(5, 1, 6, 0),
(6, 2, 7, 1),
(7, 1, 8, 0),
(8, 1, 9, 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `message_sender_receiver_view`
-- (See below for the actual view)
--
CREATE TABLE `message_sender_receiver_view` (
`sender_id` int(11)
,`senderName` varchar(255)
,`receiver_id` int(11)
,`receiverName` varchar(255)
,`id` int(11)
,`message_subject` varchar(200)
,`message_content` varchar(500)
,`message_date` date
,`is_read_receiver` tinyint(1)
,`in_sender_trash` tinyint(1)
,`in_receiver_trash` tinyint(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `consent` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `firstname`, `lastname`, `email`, `consent`) VALUES
(1, 'Estevan', 'Cordero', 'estevan@hotmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_method` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `amount`, `payment_method`) VALUES
(1, 1, 10, 'paypal');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link_to_facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_to_twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` int(11) NOT NULL,
  `date_of_signup` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `education` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `workplace` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subscription_type` int(11) DEFAULT NULL,
  `hobbies_interest_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `link_to_facebook`, `link_to_twitter`, `phone_number`, `age`, `date_of_signup`, `education`, `workplace`, `user_status`, `subscription_type`, `hobbies_interest_id`) VALUES
(1, 'AhmedH', '12345', 'ahmed@mail.ca', NULL, NULL, NULL, 26, '2021-07-09', NULL, NULL, NULL, NULL, NULL),
(2, 'EstevanC', 'testpassword', 'estevan@mail.ca', NULL, NULL, NULL, 40, '2021-07-09', NULL, NULL, 'hidden', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usersxhobbies`
--

CREATE TABLE `usersxhobbies` (
  `id` int(11) NOT NULL,
  `hobbies_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usersxhobbies`
--

INSERT INTO `usersxhobbies` (`id`, `hobbies_id`, `user_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userwall`
--

CREATE TABLE `userwall` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userwall`
--

INSERT INTO `userwall` (`id`, `subject`, `content`, `date`, `user_id`) VALUES
(1, 'New Post', 'Trying out this new website!', '2021-07-09 12:26:16', 1);

-- --------------------------------------------------------

--
-- Structure for view `message_sender_receiver_view`
--
DROP TABLE IF EXISTS `message_sender_receiver_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `message_sender_receiver_view`  AS SELECT `u1`.`id` AS `sender_id`, `u1`.`username` AS `senderName`, `u2`.`id` AS `receiver_id`, `u2`.`username` AS `receiverName`, `m`.`id` AS `id`, `m`.`message_subject` AS `message_subject`, `m`.`message_content` AS `message_content`, `m`.`message_date` AS `message_date`, `mr`.`is_read` AS `is_read_receiver`, `ms`.`in_trash` AS `in_sender_trash`, `mr`.`in_trash` AS `in_receiver_trash` FROM ((((`messages` `m` join `message_senders` `ms` on(`m`.`id` = `ms`.`message_id`)) join `user` `u1` on(`ms`.`sender_id` = `u1`.`id`)) join `message_receivers` `mr` on(`m`.`id` = `mr`.`message_id`)) join `user` `u2` on(`mr`.`receiver_id` = `u2`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `friend_id` (`friend_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_receivers`
--
ALTER TABLE `message_receivers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_receiver_message_id` (`message_id`),
  ADD KEY `fk_receiver_user_id` (`receiver_id`);

--
-- Indexes for table `message_senders`
--
ALTER TABLE `message_senders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sender_message_id` (`message_id`) USING BTREE,
  ADD KEY `fk_sender_user_id` (`sender_id`) USING BTREE;

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersxhobbies`
--
ALTER TABLE `usersxhobbies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hobbies_interest_id` (`hobbies_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `userwall`
--
ALTER TABLE `userwall`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userwall_ibfk_1` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hobbies`
--
ALTER TABLE `hobbies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `message_receivers`
--
ALTER TABLE `message_receivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `message_senders`
--
ALTER TABLE `message_senders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usersxhobbies`
--
ALTER TABLE `usersxhobbies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userwall`
--
ALTER TABLE `userwall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `friends_ibfk_2` FOREIGN KEY (`friend_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message_receivers`
--
ALTER TABLE `message_receivers`
  ADD CONSTRAINT `fk_receiver_message_id` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_receiver_user_id` FOREIGN KEY (`receiver_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message_senders`
--
ALTER TABLE `message_senders`
  ADD CONSTRAINT `fk_message_id` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`sender_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
