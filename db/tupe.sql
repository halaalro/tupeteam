-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2024 at 05:22 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tupe`
--

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1704891838),
('m130524_201442_init', 1704891843),
('m190124_110200_add_verification_token_column_to_user_table', 1704891843),
('m240110_125545_create_videoss_table', 1704892175),
('m240117_145726_create_video_likee_table', 1705503541),
('m240120_161627_create_fulltext_index_on_video', 1705767730);

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `id` int(11) NOT NULL,
  `channel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`id`, `channel_id`, `user_id`, `created_at`) VALUES
(52, 1, 1, '2024-01-23 15:07:46'),
(53, 3, 1, '2024-01-23 15:20:34');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'test', '_A5uC7hCu-C0eNKgKDWftzwC00swj7Jq', '$2y$13$2AmHrh0c5jwC7gWroFT8leXssduW0yI.xU7OuZ6vroNOcTqBlul6u', NULL, 'mogahed@gmail.com', 10, 1704893945, 1704893945, 'E9wwccDbl_Ps0GMlqhi9ilFAE0DpbKml_1704893945'),
(2, 'test2', 'NNWJrmWewadM8ohxqX0ldkNO3Aw9jS27', '$2y$13$sdSXImtt2nT/MG1mrEdYP.OB3ngucgqvNte5CO5eB5hIb6qg1iPb.', NULL, 'mogahed1.mh@gmail.com', 10, 1705308592, 1705308592, '6fV6KTcofuLWBsxX8iylC3yh_Ch0J9Yq_1705308592'),
(3, 'test3', 'sHr7IkvM8nAqGTj1jB6RFeXJnxenG270', '$2y$13$WzaGzKjeTVru6c/GFqw9Q.bC.L2.sY1P3Jqj02tqamJLc1bs/A/Oa', NULL, 'mogah4ed8@gmail.com', 10, 1705839332, 1705839332, 'cljNi1qm2d15NefrFLMhS_5RxEcQ264v_1705839332'),
(4, 'test4', 'LBFNpL0dT23ksIIZ9ASWjwX1EFSMY8aa', '$2y$13$4nA4KlpF9njYm8JZ1S8hsOv3FuEvgKBLZWu18kWGX35daH21dt0JK', NULL, 'mogah34ed@gmail.com', 10, 1705843875, 1705843875, 'fEQaHo-KK_EPj5cxv4bpUZXrNIsIh6Ua_1705843875');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `title` varchar(512) NOT NULL,
  `describtion` text NOT NULL,
  `tags` varchar(512) NOT NULL,
  `status` int(1) NOT NULL,
  `has_thumbnail` tinyint(1) NOT NULL,
  `video_name` varchar(512) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `creted_by` varchar(344) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `title`, `describtion`, `tags`, `status`, `has_thumbnail`, `video_name`, `created_at`, `updated_at`, `creted_by`) VALUES
(16, ' begin laravel learning', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'laravel ,instlition,introdection', 1, 1, '#8_Routing_GET,POST,PUT,PATCH,DELETE_and_ANY_methods(240p).mp4', '2024-01-23 13:42:51', '2024-01-23 16:52:11', '3'),
(17, 'learning php ', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'php,jhgv,kjhkj', 1, 1, 'تعلم_php_خطوة_بخطوة_للاحتراف_الدرس_4_الطباعة_وعرض_البيانات_print_,_echo(360p).mp4', '2024-01-23 13:55:58', '2024-01-23 16:57:18', '1'),
(18, 'php learning pro', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'php ,learn', 1, 1, 'تعلم_php_خطوة_بخطوة_للاحتراف_الدرس_4_الطباعة_وعرض_البيانات_print_,_echo(360p).mp4', '2024-01-23 13:58:21', '2024-01-23 16:59:46', '1'),
(19, 'learn php introd', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'php ,learn,corce', 1, 1, 'تعلم_php_خطوة_بخطوة_للاحتراف_الدرس_4_الطباعة_وعرض_البيانات_print_,_echo(360p).mp4', '2024-01-23 14:02:30', '2024-01-23 17:03:46', '1'),
(20, 'php with db', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '', 1, 1, 'تعلم_php_خطوة_بخطوة_للاحتراف_الدرس_4_الطباعة_وعرض_البيانات_print_,_echo(360p).mp4', '2024-01-23 14:04:52', '2024-01-23 17:06:09', '1'),
(21, 'yii2 introdection', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'yii,yiidb', 1, 1, 'yii2_application_structure___entry_script_-_yii2_tutorials___Part_1(360p).mp4', '2024-01-23 14:10:12', '2024-01-23 17:11:06', '2'),
(22, 'yii with db', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'yii', 1, 1, 'yii2_application_structure___entry_script_-_yii2_tutorials___Part_1(360p).mp4', '2024-01-23 14:11:54', '2024-01-23 17:12:53', '2'),
(23, 'yii2 pro', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'jmkb,yii', 1, 1, 'yii2_application_structure___entry_script_-_yii2_tutorials___Part_1(360p).mp4', '2024-01-23 14:13:14', '2024-01-23 17:14:04', '2'),
(24, 'laravel with database', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'laravel,db', 1, 1, '#8_Routing_GET,POST,PUT,PATCH,DELETE_and_ANY_methods(240p).mp4', '2024-01-23 14:19:36', '2024-01-23 17:20:55', '3'),
(25, 'laravel learn', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'laravel,progrem', 1, 1, '#8_Routing_GET,POST,PUT,PATCH,DELETE_and_ANY_methods(240p).mp4', '2024-01-23 14:22:02', '2024-01-23 17:23:18', '3'),
(26, 'laravel2', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'kjb,jkbn', 1, 1, '#8_Routing_GET,POST,PUT,PATCH,DELETE_and_ANY_methods(240p).mp4', '2024-01-23 14:23:43', '2024-01-23 17:24:27', '3'),
(27, '#8_Routing_GET,POST,PUT,PATCH,DELETE_and_ANY_methods(240p).mp4', '', '', 0, 0, '#8_Routing_GET,POST,PUT,PATCH,DELETE_and_ANY_methods(240p).mp4', '2024-01-23 16:03:32', '2024-01-23 19:03:32', '3');

-- --------------------------------------------------------

--
-- Table structure for table `video_lik`
--

CREATE TABLE `video_lik` (
  `id` int(11) NOT NULL,
  `user_id` int(16) NOT NULL,
  `video_id` varchar(16) NOT NULL,
  `type` int(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video_lik`
--

INSERT INTO `video_lik` (`id`, `user_id`, `video_id`, `type`, `created_at`) VALUES
(731, 1, '17', 1, '2024-01-23 15:08:02'),
(732, 1, '19', 1, '2024-01-23 15:08:06'),
(733, 1, '20', 1, '2024-01-23 15:08:10'),
(734, 1, '16', 1, '2024-01-23 15:08:30'),
(735, 1, '25', 1, '2024-01-23 15:08:35'),
(736, 1, '24', 1, '2024-01-23 15:08:39'),
(737, 1, '26', 1, '2024-01-23 15:09:57'),
(738, 1, '22', 1, '2024-01-23 15:31:19'),
(739, 1, '21', 1, '2024-01-23 15:31:23'),
(740, 1, '23', 1, '2024-01-23 15:31:26');

-- --------------------------------------------------------

--
-- Table structure for table `video_view`
--

CREATE TABLE `video_view` (
  `id` int(16) NOT NULL,
  `video_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video_view`
--

INSERT INTO `video_view` (`id`, `video_id`, `user_id`, `created_at`) VALUES
(522, 23, 1, '2024-01-23 14:56:29'),
(523, 25, 1, '2024-01-23 15:06:49'),
(524, 25, 1, '2024-01-23 15:07:23'),
(525, 19, 1, '2024-01-23 15:07:35'),
(526, 17, 1, '2024-01-23 15:07:59'),
(527, 19, 1, '2024-01-23 15:08:04'),
(528, 20, 1, '2024-01-23 15:08:08'),
(529, 18, 1, '2024-01-23 15:08:24'),
(530, 16, 1, '2024-01-23 15:08:26'),
(531, 25, 1, '2024-01-23 15:08:33'),
(532, 24, 1, '2024-01-23 15:08:37'),
(533, 25, 1, '2024-01-23 15:08:42'),
(534, 26, 1, '2024-01-23 15:09:55'),
(535, 24, 1, '2024-01-23 15:10:02'),
(536, 16, 1, '2024-01-23 15:20:11'),
(537, 23, 1, '2024-01-23 15:30:37'),
(538, 21, 1, '2024-01-23 15:30:47'),
(539, 22, 1, '2024-01-23 15:31:10'),
(540, 21, 1, '2024-01-23 15:31:21'),
(541, 23, 1, '2024-01-23 15:31:24'),
(542, 21, 1, '2024-01-23 15:33:40'),
(543, 22, 1, '2024-01-23 15:34:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `video` ADD FULLTEXT KEY `title` (`title`,`describtion`,`tags`);

--
-- Indexes for table `video_lik`
--
ALTER TABLE `video_lik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-video_lik-user_id` (`user_id`),
  ADD KEY `idx-video_lik-video_id` (`video_id`);

--
-- Indexes for table `video_view`
--
ALTER TABLE `video_view`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `video_lik`
--
ALTER TABLE `video_lik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=741;

--
-- AUTO_INCREMENT for table `video_view`
--
ALTER TABLE `video_view`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=544;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `video_lik`
--
ALTER TABLE `video_lik`
  ADD CONSTRAINT `fk-video_lik-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
