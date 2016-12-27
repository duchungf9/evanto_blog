-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 27, 2016 at 01:37 PM
-- Server version: 5.6.29
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE IF NOT EXISTS `blog_categories` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `description`) VALUES
(1, 'Test category - 1', 'test-category-1', 'Test category - 1 Meta Desc'),
(2, 'Test category - 2', 'test-category-2', 'Test category - 2 Meta Desc'),
(3, 'Test category - 3', 'Test category - 3', 'Test category - 3'),
(4, 'Test category - 4', 'test-category-4', 'Test category - 4 Meta Desc');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE IF NOT EXISTS `blog_comments` (
  `id` int(10) unsigned NOT NULL,
  `post_id` tinyint(3) unsigned NOT NULL,
  `status` enum('pending','publish','spam') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `ip` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `user_agent` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE IF NOT EXISTS `blog_posts` (
  `id` int(10) unsigned NOT NULL,
  `category_id` tinyint(3) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('draft','publish') COLLATE utf8_unicode_ci NOT NULL,
  `comments` tinyint(1) NOT NULL,
  `featured` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `category_id`, `title`, `slug`, `description`, `summary`, `content`, `status`, `comments`, `featured`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'İleti test - 1', 'ileti-test-1', 'İleti test - 1', 'İleti test - summary - 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur varius eros ut ornare tempus. Cras a ligula lectus. Pellentesque eget tempor arcu. Proin nisl mi, auctor sit amet ornare vitae, egestas sit amet ante. Phasellus sit amet lobortis risus. Nam consectetur nisi consectetur aliquet condimentum. Morbi eu lacus in neque bibendum ultricies vel in risus.', 'publish', 1, NULL, '2016-12-26 21:23:09', '2016-12-26 21:23:09', NULL),
(2, 1, 'İleti test - 2', 'ileti-test-2', 'İleti test - 2', 'İleti test - summary - 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur varius eros ut ornare tempus. Cras a ligula lectus. Pellentesque eget tempor arcu. Proin nisl mi, auctor sit amet ornare vitae, egestas sit amet ante. Phasellus sit amet lobortis risus. Nam consectetur nisi consectetur aliquet condimentum. Morbi eu lacus in neque bibendum ultricies vel in risus.', 'publish', 1, NULL, '2016-12-26 21:23:09', '2016-12-26 21:23:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_post_tag`
--

CREATE TABLE IF NOT EXISTS `blog_post_tag` (
  `id` int(10) unsigned NOT NULL,
  `tag_id` tinyint(3) unsigned NOT NULL,
  `post_id` tinyint(3) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_tags`
--

CREATE TABLE IF NOT EXISTS `blog_tags` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `lft`, `rgt`, `depth`, `created_at`, `updated_at`, `name`, `slug`, `description`) VALUES
(1, NULL, 1, 2, 0, '2016-12-27 02:31:35', '2016-12-27 02:31:35', 'Tips - Tricks', 'tips-and-tricks', 'Tip and Trịck category'),
(2, NULL, 3, 4, 0, '2016-12-27 02:38:23', '2016-12-27 02:38:23', 'Evanto main', 'main-evante', 'evantete'),
(3, NULL, 5, 6, 0, '2016-12-27 03:02:26', '2016-12-27 03:34:48', 'Evanto main-okkkk', 'tips and tricks-okkk', '123');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_12_27_033327_create_blog_categories_table', 2),
(4, '2016_12_27_033327_create_blog_comments_table', 2),
(5, '2016_12_27_033327_create_blog_post_tag_table', 2),
(6, '2016_12_27_033327_create_blog_posts_table', 2),
(7, '2016_12_27_033327_create_blog_tags_table', 2),
(8, '2016_12_27_080236_create_categories_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'hungdz', 'duchungf9@gmail.com', '$2y$10$WawDfhF37wm8w0lFVY8ngOWXLIUNTysTb6mGjCSg1IL69mBxqR6o.', 'cyZbvTwtO98u9ka4Z8fC1cshdN12czPlehw98GuAGVPeMslZXTWGuCalna3a', '2016-12-26 03:32:13', '2016-12-26 18:18:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_categories_slug_unique` (`slug`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_comments_post_id_index` (`post_id`),
  ADD KEY `blog_comments_ip_index` (`ip`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_posts_slug_unique` (`slug`),
  ADD KEY `blog_posts_category_id_index` (`category_id`),
  ADD KEY `blog_posts_status_index` (`status`),
  ADD KEY `blog_posts_comments_index` (`comments`),
  ADD KEY `blog_posts_featured_index` (`featured`);

--
-- Indexes for table `blog_post_tag`
--
ALTER TABLE `blog_post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_post_tag_tag_id_index` (`tag_id`),
  ADD KEY `blog_post_tag_post_id_index` (`post_id`);

--
-- Indexes for table `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_tags_slug_unique` (`slug`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_index` (`parent_id`),
  ADD KEY `categories_lft_index` (`lft`),
  ADD KEY `categories_rgt_index` (`rgt`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `blog_post_tag`
--
ALTER TABLE `blog_post_tag`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
