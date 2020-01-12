-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 01, 2020 at 05:09 PM
-- Server version: 5.7.28-0ubuntu0.16.04.2
-- PHP Version: 7.0.33-0ubuntu0.16.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pragya_realshepower`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `is_active`, `created`, `modified`) VALUES
(1, 'Poems', 'poems', '1', '2019-11-22 04:16:26', '2019-11-23 12:58:50'),
(2, 'Articles', 'articles', '1', '2019-11-22 04:21:44', '2019-11-22 04:21:44'),
(3, 'Videos', 'videos', '1', '2019-11-22 04:22:03', '2019-11-22 04:22:03'),
(4, 'Story', 'story', '1', '2019-11-22 04:22:11', '2019-11-22 04:22:11'),
(5, 'News', 'news', '1', '2019-11-22 04:22:21', '2019-11-22 04:22:21'),
(6, 'Travels', 'travels', '1', '2019-11-22 04:22:33', '2019-11-22 04:22:33'),
(7, 'Inspirational', 'inspirational', '1', '2019-11-22 04:22:43', '2019-11-22 04:22:43'),
(8, 'Artists', 'artists', '1', '2019-11-22 04:22:57', '2019-11-22 04:22:57'),
(9, 'poem', 'poem', '0', '2019-11-23 13:23:17', '2019-11-23 13:23:17');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `blog_id` bigint(20) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `deleted_by` bigint(20) NOT NULL,
  `is_readed` enum('0','1') NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `is_active` enum('0','1') NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `description`, `is_active`, `created`, `modified`) VALUES
(1, 'What does the platform "realshepower" stand for 2', 'To build and empowering, thriving, succeeding, community of women. Our aim is to provide a medium for women to express, share, display and sell their skills and talents.', '1', '2019-11-29 14:01:51', '2019-12-12 13:49:47'),
(2, 'What does the platform "realshepower" stand for 1 ?', 'To build and empowering, thriving, succeeding, community of women. Our aim is to provide a medium for women to express, share, display and sell their skills and talents -1. ', '1', '2019-12-12 00:13:48', '2019-12-12 00:13:48');

-- --------------------------------------------------------

--
-- Table structure for table `featured_forms`
--

CREATE TABLE `featured_forms` (
  `id` bigint(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `comments` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

CREATE TABLE `follows` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `blog_id` bigint(20) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  `is_readed` enum('0','1') NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `ordering` tinyint(11) NOT NULL,
  `page` varchar(50) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `comment_id` bigint(20) NOT NULL,
  `is_readed` enum('0','1') NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `sub_title` varchar(50) DEFAULT NULL,
  `price` varchar(20) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `title`, `description`, `sub_title`, `price`, `is_active`, `created`, `modified`) VALUES
(1, 'Bronze', '<ul>\r\n	<li>30 days dedicated feature of your product/service</li>\r\n	<li>Weekly Feature on Instagram Story</li>\r\n	<li>1 Post on Instagram, Facebook and Twitter</li>\r\n</ul>\r\n', 'Valid for one month', '100', '1', '2019-11-27 11:03:22', '2019-12-01 23:52:04');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) NOT NULL,
  `category` tinyint(11) NOT NULL,
  `landing_url` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `featured_image` varchar(100) DEFAULT NULL,
  `youtube_url` varchar(255) DEFAULT NULL,
  `image_or_video` enum('0','1') DEFAULT NULL COMMENT '0=>image, 1=>video',
  `excerpt` varchar(255) DEFAULT NULL,
  `description` text,
  `published_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author_image` varchar(100) DEFAULT NULL,
  `about_author` text,
  `tags` varchar(500) DEFAULT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category`, `landing_url`, `title`, `slug`, `featured_image`, `youtube_url`, `image_or_video`, `excerpt`, `description`, `published_date`, `author_image`, `about_author`, `tags`, `is_active`, `created`, `modified`) VALUES
(1, 1, 'https://www.realshepower.com/post/you-write-the-story-of-your-own-life-and-you-are-its-star-player', 'You write the story of your own life and you are its star player', 'you-write-the-story-of-your-own-life-and-you-are-its-star-player', 'post_cfyxdbkjqtmalreosgwnvzpihu-51793_featured_image.jpeg', '', NULL, 'I, Rabiah Bhatia, single parent of two young kids have been staying with my parents since 2006.', '<p>Hello</p>\r\n\r\n<p><iframe frameborder="0" height="315" src="https://www.youtube.com/embed/UH5QbPh7UYc" width="560"></iframe></p>\r\n', '2019-12-11 03:21:21', 'post_blhuaieqcfgvxjmpydtsknzrwo-42821author_image.jpeg', '<p>Bye Bye</p>\r\n', '["super women","women","abc"]', '1', '2019-11-22 22:28:52', '2019-12-13 20:09:04'),
(2, 2, 'https://www.realshepower.com/post/you-write-the-story-of-your-own-life-and-you-are-its-star-player', 'what will you choose love or power', 'what-will-you-choose-love-or-power', 'post_tcfmzqsxnodpielvawryukgbjh-73981_featured_image.jpg', '', NULL, 'I, Rabiah Bhatia, single parent of two young kids have been staying with my parents since 2006.', '<p>I, <span style="font-family:Verdana,Geneva,sans-serif"><strong>Rabiah Bhatia</strong></span>, single parent of two young kids have been staying with my parents since 2006. I have started believing in the untapped potential of every individual. I got married at the age of 19 and wanted to have a beautiful married life. Saw beautiful dreams for my married life, like other girls which remained as dreams only. I faced a lot of challenges after marriage, and there were times when I resented my life. Never thought that marrying at such a young age would not give me anything but only pain and suffering. I had seen times when there wasn&#39;t a single penny in my pocket, and I had to beg my husband and parents for the same. However, that begging turned into a curse for me.</p>\r\n\r\n<p>How can I forget the day when I tried to finish this life without even thinking about my 1.5-year-old kid, as I found myself stuck in a negative environment. The thought of killing myself to end the recurring pain was all I had.</p>\r\n\r\n<p>But I am thankful to my Ex Husband who saved me. Now if I think about that incident of my life, I feel I</p>\r\n\r\n<p>was blessed to be saved for my two beautiful angels.</p>\r\n', '2019-12-03 19:09:00', 'post_gdjomtuvcplrqexksyiazwhnbf-69635author_image.jpg', '', '["women"]', '1', '2019-11-22 22:43:07', '2019-12-31 13:42:30'),
(3, 8, 'https://www.realshepower.com/post/you-write-the-story-of-your-own-life-and-you-are-its-star-player', 'You write the story of your own life and you are its star player', 'you-write-the-story-of-your-own-life-and-you-are-its-star-player', 'post_qaiwrlkgmfznvuyotcjxhpesbd-78589_featured_image.jpg', '', NULL, 'I, Rabiah Bhatia, single parent of two young kids have been staying with my parents since 2006.', '<p>I, <strong>Rabiah Bhatia</strong>, single parent of two young kids have been staying with my parents since 2006.</p>\r\n\r\n<p><img alt="" src="/img/posts/1574827524_g1.jpg" style="height:400px; width:600px" /></p>\r\n\r\n<p>I have started believing in the untapped potential of every individual. I got married at the age of 19 and wanted to have a beautiful married life. Saw beautiful dreams for my married life, like other girls which remained as dreams only. I faced a lot of challenges after marriage, and there were times when I resented my life. Never thought that marrying at such a young age would not give me anything but only pain and suffering. I had seen times when there wasn&#39;t a single penny in my pocket, and I had to beg my husband and parents for the same. However, that begging turned into a curse for me.</p>\r\n\r\n<p>How can I forget the day when I tried to finish this life without even thinking about my 1.5-year-old kid, as I found myself stuck in a negative environment. The thought of killing myself to end the recurring pain was all I had.</p>\r\n\r\n<p>But I am thankful to my Ex Husband who saved me. Now if I think about that incident of my life, I feel I</p>\r\n\r\n<p>was blessed to be saved for my two beautiful angels.</p>\r\n', '2019-12-04 19:09:00', 'post_tsrkoyequjfnxhgwzlcdvmbaip-43827author_image.jpeg', '<p><strong>About Author :</strong> First Post</p>\r\n', NULL, '1', '2019-11-22 22:44:16', '2019-12-31 13:43:11'),
(4, 3, '', 'what will you choose love or power', 'what-will-you-choose-love-or-power', 'post_plmxswztonkcvgfubjiqdhaeyr-78653_featured_image.jpeg', '', NULL, 'I, Rabiah Bhatia, single parent of two young kids have been staying with my parents since 2006.', '<p>Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing Video Testing</p>\r\n', '2019-12-10 19:09:00', 'post_andfvmlocxsjqyukbtzpwgrehi-40322author_image.jpg', '', NULL, '1', '2019-11-23 03:51:07', '2019-12-12 00:39:43'),
(5, 7, '', 'You write the story of your own life and you are its star player', 'you-write-the-story-of-your-own-life-and-you-are-its-star-player', 'post_cxslqyzuwitmdfakjnvebrphgo-26451_featured_image.jpeg', '', '0', 'I, Rabiah Bhatia, single parent of two young kids have been staying with my parents since 2006.', '<p>testing</p>\r\n', '2019-12-01 19:09:00', 'post_qdhkzwjfxregivaosnpubltmcy-62534author_image.jpeg', '<p>about Author,</p>\r\n', '["wom","super women","women"]', '1', '2019-11-29 11:34:36', '2019-12-12 00:39:59'),
(6, 2, '', 'what will you choose love or power', 'what-will-you-choose-love-or-power', 'post_caleuprvtbikwsxhnqmyojgzfd-42283_featured_image.jpeg', '', '0', 'I, Rabiah Bhatia, single parent of two young kids have been staying with my parents since 2006.', '<p><cite><strong>Svalbard, Norway</strong></cite></p>\r\n\r\n<blockquote>\r\n<p><a href="https://www.realshepower.com/post/best-places-to-experience-the-wonders-of-northern-lights">ghgjhkjkjkjjhk</a></p>\r\n</blockquote>\r\n\r\n<p><img alt="" src="/img/posts/1575210648_blog.jpeg" style="height:248px; width:497px" /></p>\r\n\r\n<p>2. gjhkjlkl</p>\r\n\r\n<p><img alt="" src="/img/posts/1575210732_pragya.jpeg" style="height:217px; width:216px" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>3.</p>\r\n', '2019-11-12 19:10:00', 'post_ylqukmnbaohxfdgijtwcspvrez-48247author_image.jpeg', '<p><s>gchvj</s></p>\r\n\r\n<p>&nbsp;</p>\r\n', '["hello","world"]', '1', '2019-12-01 20:08:51', '2019-12-12 00:40:15'),
(7, 1, '', 'You write the story of your own life and you are its star player', 'you-write-the-story-of-your-own-life-and-you-are-its-star-player', 'post_xcpvontmyrduilgjhbsqeawzfk-81816_featured_image.jpeg', '', '0', 'I, Rabiah Bhatia, single parent of two young kids have been staying with my parents since 2006.', '<p>description</p>\r\n', '2019-12-04 19:16:00', 'post_wrbuvldnqykmpoeishfgjzcaxt-90740author_image.jpg', '', '["super women"]', '1', '2019-12-02 11:56:21', '2019-12-12 00:47:01'),
(8, 8, 'https://www.realshepower.com/post/you-write-the-story-of-your-own-life-and-you-are-its-star-player', 'You write the story of your own life and you are its star player', 'you-write-the-story-of-your-own-life-and-you-are-its-star-player', 'post_jhapcgmdeulxwfqsnirtvykboz-99665_featured_image.jpg', '', '1', 'I, Rabiah Bhatia, single parent of two young kids have been staying with my parents since 2006.', '<p><span style="font-family:Arial,Helvetica,sans-serif">You write the story of your own life and you are its star player You write the story of your own life and you are its star player You write the story of your own life and you are its star player You write the story of your own life and you are its star player You write the story of your own life and you are its star player.</span></p>\r\n', '2019-12-02 19:10:00', 'post_aumyhsdrgkzixecqltpobvjwfn-48196author_image.jpg', '<p><span style="font-family:Arial,Helvetica,sans-serif">You write the story of your own life and you are its star player, You write the story of your own life and you are its star player.</span></p>\r\n', '["super women"]', '1', '2019-12-12 00:34:39', '2019-12-31 13:43:43');

-- --------------------------------------------------------

--
-- Table structure for table `publications_forms`
--

CREATE TABLE `publications_forms` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `issue` varchar(50) NOT NULL,
  `comments` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `is_deleted`, `created`, `modified`) VALUES
(1, 'pratapsinghg2@gmail.com', '0', '2019-12-31 00:00:00', '2019-12-31 00:00:00'),
(2, 'pragya.singh@gmail.com', '0', '2019-12-31 00:00:00', '2019-12-31 00:00:00'),
(3, 'pranjal@gmail.com', '0', '2019-12-31 11:50:38', '2019-12-31 11:50:38'),
(4, 'abc@gmail.com', '0', '2019-12-31 14:26:01', '2019-12-31 14:26:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `alternate_email1` varchar(50) DEFAULT NULL,
  `alternate_email2` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `profile_image` varchar(100) DEFAULT NULL,
  `about_self` text,
  `address` text,
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `gender`, `alternate_email1`, `alternate_email2`, `mobile`, `username`, `password`, `role`, `profile_image`, `about_self`, `address`, `is_active`, `created`, `modified`) VALUES
(1, 'pragya', 'singh', 'pragraesingh@gmail.com', 'female', NULL, NULL, '9971952475', 'pragya.singh', '$2a$10$tZdIkHVciRT4AejynaxLKeOtBMaZp2VG8bBIA9MRu/WbSRVDO1GHm', 'admin', 'user_1_profile_image.jpeg', NULL, NULL, '1', '2019-11-21 22:07:20', '2019-11-23 13:06:55'),
(3, 'Pratap', 'Singh', 'pratapsinghg2@gmail.com', 'male', NULL, NULL, '8383046043', 'pratap.singh', '$2a$10$vrCw1WjtA9xZa8vdnnzv/eRiogd.kyd3QOzuYxD4dEd7D.f3nzvom', 'admin', 'user_3_profile_image.jpg', NULL, NULL, '1', '2019-11-23 13:15:06', '2019-12-01 23:54:53'),
(26, 'Test', NULL, 'test@gmail.com', 'female', NULL, NULL, '9999999990', 'test@gmail.com', '$2a$10$qxw1SHct0CZEcBMDLQGwWuG7WkaSymDIjlZUqFwmiTVF6OAUDIJSK', 'user', NULL, NULL, NULL, '1', '2020-01-01 17:04:14', '2020-01-01 17:04:14');

-- --------------------------------------------------------

--
-- Table structure for table `users_plans`
--

CREATE TABLE `users_plans` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `sub_title` varchar(50) NOT NULL,
  `price` varchar(10) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featured_forms`
--
ALTER TABLE `featured_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publications_forms`
--
ALTER TABLE `publications_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_plans`
--
ALTER TABLE `users_plans`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `featured_forms`
--
ALTER TABLE `featured_forms`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `follows`
--
ALTER TABLE `follows`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `publications_forms`
--
ALTER TABLE `publications_forms`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `users_plans`
--
ALTER TABLE `users_plans`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
