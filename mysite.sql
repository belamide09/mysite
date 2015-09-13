-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2015 at 06:01 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mysite`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
`id` int(11) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(999) NOT NULL,
  `first_name` varchar(300) NOT NULL,
  `last_name` varchar(300) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0: Inactive, 1: Active, 9: Deactivated'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `first_name`, `last_name`, `status`) VALUES
(1, 'admin123', '21232f297a57a5a743894a0e4a801fc3', '', '', 0),
(2, 'admin', '5cd84efe670c681fe1457a5c8e39abb4c05d523d', 'Bensoy', 'Itoy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `answering_time_started`
--

CREATE TABLE IF NOT EXISTS `answering_time_started` (
`id` int(11) NOT NULL,
  `uid` varchar(300) NOT NULL,
  `chapterno` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answering_time_started`
--

INSERT INTO `answering_time_started` (`id`, `uid`, `chapterno`, `time`) VALUES
(1, '1', 2, 1428443504),
(2, '884017801619465', 2, 1428539713);

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
`id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(999) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `answer`) VALUES
(1, 3, 'A container that can store a value.'),
(2, 4, 'A procedure/method that can be call.'),
(3, 3, 'A container that can store a value.'),
(4, 4, 'A procedure that can be executed.'),
(5, 4, 'A process that can be call.'),
(6, 5, ' kadjka jsk');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(11) NOT NULL,
  `category` varchar(300) NOT NULL,
  `status` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_ip` varchar(300) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_ip` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `status`, `admin_id`, `created`, `created_ip`, `modified`, `modified_ip`) VALUES
(1, 'PHP', 1, 2, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 'C#', 1, 2, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(3, 'JAVA', 1, 2, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE IF NOT EXISTS `chapters` (
`id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `category_id` int(11) NOT NULL,
  `no_of_questions` int(255) NOT NULL,
  `limit_questions` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_ip` varchar(300) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_ip` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `title`, `category_id`, `no_of_questions`, `limit_questions`, `status`, `admin_id`, `created`, `created_ip`, `modified`, `modified_ip`) VALUES
(2, 'Beginner syntax', 1, 25, 50, 1, 2, '2015-09-02 09:15:12', '192.168.0.187', '2015-09-08 07:00:00', '192.168.0.187');

-- --------------------------------------------------------

--
-- Table structure for table `choises`
--

CREATE TABLE IF NOT EXISTS `choises` (
`id` int(11) NOT NULL,
  `chapterno` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `choise` varchar(999) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `choises`
--

INSERT INTO `choises` (`id`, `chapterno`, `question_id`, `choise`) VALUES
(1, 2, 3, 'A type of variable.'),
(2, 2, 3, 'A method/procedure that can be executed.'),
(3, 2, 3, 'A container that can store a value.'),
(4, 2, 4, 'A type of variable.'),
(5, 2, 4, 'A variable that can store a value.'),
(6, 2, 5, 'A procedure that can be executed.'),
(7, 2, 4, 'A process that can be call.'),
(8, 2, 5, ' ajks \\n djsak j'),
(9, 2, 5, 'This is  this should new line heheheheh'),
(10, 2, 5, ' kadjka jsk');

-- --------------------------------------------------------

--
-- Table structure for table `conference_rooms`
--

CREATE TABLE IF NOT EXISTS `conference_rooms` (
  `roomno` int(11) NOT NULL,
  `roomname` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `datetime` varchar(300) NOT NULL,
  `host` varchar(300) NOT NULL,
  `account` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conference_rooms`
--

INSERT INTO `conference_rooms` (`roomno`, `roomname`, `password`, `datetime`, `host`, `account`) VALUES
(1, 'PHP DEVS', '1234', '12332434', '884017801619465', 'facebook');

-- --------------------------------------------------------

--
-- Table structure for table `conference_room_members`
--

CREATE TABLE IF NOT EXISTS `conference_room_members` (
`id` int(11) NOT NULL,
  `roomno` int(11) NOT NULL,
  `uid` varchar(300) NOT NULL,
  `account` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conference_room_members`
--

INSERT INTO `conference_room_members` (`id`, `roomno`, `uid`, `account`) VALUES
(1, 1, '884017801619465', 'facebook');

-- --------------------------------------------------------

--
-- Table structure for table `fb-users`
--

CREATE TABLE IF NOT EXISTS `fb-users` (
`id` int(11) NOT NULL,
  `uid` varchar(300) NOT NULL,
  `name` varchar(300) NOT NULL,
  `profilepic` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fb-users`
--

INSERT INTO `fb-users` (`id`, `uid`, `name`, `profilepic`) VALUES
(1, '884017801619465', 'John Mart Belamide', 'http://graph.facebook.com/884017801619465/picture?width=500&height=500');

-- --------------------------------------------------------

--
-- Table structure for table `google-users`
--

CREATE TABLE IF NOT EXISTS `google-users` (
`id` int(11) NOT NULL,
  `uid` varchar(300) NOT NULL,
  `name` varchar(300) NOT NULL,
  `profilepic` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `google-users`
--

INSERT INTO `google-users` (`id`, `uid`, `name`, `profilepic`, `email`) VALUES
(1, '105640260546884505367', 'John Mart Belamide', 'https://lh4.googleusercontent.com/-o7rUXtyNBVg/AAAAAAAAAAI/AAAAAAAAACg/ss_x7Nx3p8o/photo.jpg?sz=100', 'belamide09@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `online_visitors`
--

CREATE TABLE IF NOT EXISTS `online_visitors` (
`id` int(11) NOT NULL,
  `ip_add` varchar(300) NOT NULL,
  `countrycode` varchar(300) NOT NULL,
  `country` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_visitors`
--

INSERT INTO `online_visitors` (`id`, `ip_add`, `countrycode`, `country`) VALUES
(1, '192.168.0.1', 'PH', 'Philippines'),
(3, '112919.2342.3423', 'CH', 'China'),
(5, '192.232.3245.3', 'PH', 'Philippines');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`id` int(11) NOT NULL,
  `user_id` varchar(300) NOT NULL,
  `title` varchar(300) NOT NULL,
  `category_id` int(11) NOT NULL,
  `content` varchar(99) NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_ip` varchar(300) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_ip` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `category_id`, `content`, `status`, `created`, `created_ip`, `modified`, `modified_ip`) VALUES
(1, '1', 'Somebody Help me!', 3, 'I can''t access my database I forgot my password what should I do?', 1, '2015-09-06 23:24:12', '::1', '2015-09-06 23:24:12', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `posts_comments`
--

CREATE TABLE IF NOT EXISTS `posts_comments` (
`id` int(255) NOT NULL,
  `post_id` int(255) NOT NULL,
  `content` varchar(999) NOT NULL,
  `user_id` int(255) NOT NULL,
  `created` datetime NOT NULL,
  `created_ip` varchar(300) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_ip` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts_comments`
--

INSERT INTO `posts_comments` (`id`, `post_id`, `content`, `user_id`, `created`, `created_ip`, `modified`, `modified_ip`) VALUES
(1, 1, 'search google for solution', 1, '2015-09-06 23:31:26', '::1', '2015-09-06 23:31:26', '::1'),
(2, 1, 'search google for solution', 1, '2015-09-06 23:31:52', '::1', '2015-09-06 23:31:52', '::1'),
(3, 1, 'search google for solution', 1, '2015-09-06 23:32:21', '::1', '2015-09-06 23:32:21', '::1'),
(4, 1, 'search google for solution', 1, '2015-09-06 23:32:45', '::1', '2015-09-06 23:32:45', '::1'),
(5, 1, 'search google for solution', 1, '2015-09-06 23:32:54', '::1', '2015-09-06 23:32:54', '::1'),
(6, 1, 'search google for solution', 1, '2015-09-06 23:33:13', '::1', '2015-09-06 23:33:13', '::1'),
(7, 1, 'search google for solution', 1, '2015-09-06 23:33:30', '::1', '2015-09-06 23:33:30', '::1'),
(8, 1, 'search google for solution', 1, '2015-09-06 23:33:44', '::1', '2015-09-06 23:33:44', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `posts_comments_files`
--

CREATE TABLE IF NOT EXISTS `posts_comments_files` (
`id` int(255) NOT NULL,
  `posts_comment_id` int(11) NOT NULL,
  `file_name` varchar(999) NOT NULL,
  `name` varchar(999) NOT NULL,
  `type` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts_comments_files`
--

INSERT INTO `posts_comments_files` (`id`, `posts_comment_id`, `file_name`, `name`, `type`) VALUES
(1, 8, '201509062333448.png', '1441552793_free-09.png', 'image');

-- --------------------------------------------------------

--
-- Table structure for table `posts_comments_likes`
--

CREATE TABLE IF NOT EXISTS `posts_comments_likes` (
`id` int(11) NOT NULL,
  `posts_comments_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts_comments_likes`
--

INSERT INTO `posts_comments_likes` (`id`, `posts_comments_id`, `user_id`) VALUES
(1, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts_files`
--

CREATE TABLE IF NOT EXISTS `posts_files` (
`id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `file_name` varchar(999) NOT NULL,
  `name` varchar(999) NOT NULL,
  `type` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `uid` int(11) NOT NULL,
  `firstname` varchar(300) NOT NULL,
  `middlename` varchar(300) NOT NULL,
  `lastname` varchar(300) NOT NULL,
  `gender` varchar(300) NOT NULL,
  `state` varchar(300) NOT NULL,
  `birthdate` varchar(300) NOT NULL,
  `profilepic` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`uid`, `firstname`, `middlename`, `lastname`, `gender`, `state`, `birthdate`, `profilepic`) VALUES
(1, 'Glenson', 'Atillo', 'Rosos', 'Male', 'Philippines', 'June 23, 1992', '');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
`id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `question` varchar(999) NOT NULL,
  `no_of_choises` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_ip` varchar(300) NOT NULL,
  `modifed` datetime NOT NULL,
  `modified_ip` varchar(300) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `chapter_id`, `question`, `no_of_choises`, `admin_id`, `created`, `created_ip`, `modifed`, `modified_ip`, `status`) VALUES
(4, 2, 'What is method and it''s use?', 4, 2, '2015-08-04 09:20:00', '192.168.0.187', '2015-09-03 00:21:00', '192.168.0.187', 1),
(5, 2, 'Which of the following is the correct syntax for creating a method?', 3, 2, '2015-08-12 03:10:00', '192.168.0.187', '2015-09-08 05:20:34', '192.168.0.187', 1);

-- --------------------------------------------------------

--
-- Table structure for table `scoreboards`
--

CREATE TABLE IF NOT EXISTS `scoreboards` (
  `score` int(11) NOT NULL,
`id` int(11) NOT NULL,
  `usersid` varchar(300) NOT NULL,
  `chapterno` int(255) NOT NULL,
  `category` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `time_exam_finish`
--

CREATE TABLE IF NOT EXISTS `time_exam_finish` (
`id` int(11) NOT NULL,
  `uid` varchar(300) NOT NULL,
  `chapterno` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(999) NOT NULL,
  `status` int(11) NOT NULL,
  `first_name` varchar(300) NOT NULL,
  `last_name` varchar(300) NOT NULL,
  `nickname` varchar(300) NOT NULL,
  `gender` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  `image` varchar(300) NOT NULL,
  `created` datetime NOT NULL,
  `created_ip` varchar(300) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_ip` varchar(300) NOT NULL,
  `last_login_time` datetime NOT NULL,
  `last_login_ip` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `status`, `first_name`, `last_name`, `nickname`, `gender`, `birthdate`, `image`, `created`, `created_ip`, `modified`, `modified_ip`, `last_login_time`, `last_login_ip`) VALUES
(1, 'belamide09@gmail.com', '251a98f7a397a7ece81888d5688a9ef81f87c3bb', 1, 'John Mart', 'Belamide', 'Gwapo', 1, '1992-09-07', 'img_1.jpg', '2015-09-01 04:00:00', '192.168.0.187', '2015-09-01 05:00:00', '192.168.0.187', '2015-09-10 00:00:00', '192.168.0.187'),
(2, 'user2@gmail.com', '251a98f7a397a7ece81888d5688a9ef81f87c3bb', 1, 'User2', 'User2', '', 1, '0000-00-00', 'img_1.jpg', '2015-09-01 04:00:00', '192.168.0.187', '2015-09-01 05:00:00', '192.168.0.187', '2015-09-10 00:00:00', '192.168.0.187'),
(4, 'user2@gmail.com', '251a98f7a397a7ece81888d5688a9ef81f87c3bb', 1, 'User3', 'User3', '', 1, '0000-00-00', 'img_1.jpg', '2015-09-01 04:00:00', '192.168.0.187', '2015-09-01 05:00:00', '192.168.0.187', '2015-09-10 00:00:00', '192.168.0.187'),
(5, 'user2@gmail.com', '251a98f7a397a7ece81888d5688a9ef81f87c3bb', 1, 'User4', 'User4', '', 1, '0000-00-00', 'img_1.jpg', '2015-09-01 04:00:00', '192.168.0.187', '2015-09-01 05:00:00', '192.168.0.187', '2015-09-10 00:00:00', '192.168.0.187'),
(6, 'user2@gmail.com', '251a98f7a397a7ece81888d5688a9ef81f87c3bb', 1, 'User5', 'User5', '', 1, '0000-00-00', 'img_1.jpg', '2015-09-01 04:00:00', '192.168.0.187', '2015-09-01 05:00:00', '192.168.0.187', '2015-09-10 00:00:00', '192.168.0.187'),
(7, 'user2@gmail.com', '251a98f7a397a7ece81888d5688a9ef81f87c3bb', 1, 'User6', 'User6', '', 1, '0000-00-00', 'img_1.jpg', '2015-09-01 04:00:00', '192.168.0.187', '2015-09-01 05:00:00', '192.168.0.187', '2015-09-10 00:00:00', '192.168.0.187'),
(8, 'user2@gmail.com', '251a98f7a397a7ece81888d5688a9ef81f87c3bb', 1, 'User7', 'User7', '', 1, '0000-00-00', 'img_1.jpg', '2015-09-01 04:00:00', '192.168.0.187', '2015-09-01 05:00:00', '192.168.0.187', '2015-09-10 00:00:00', '192.168.0.187'),
(9, 'user2@gmail.com', '251a98f7a397a7ece81888d5688a9ef81f87c3bb', 1, 'User8', 'User8', '', 1, '0000-00-00', 'img_1.jpg', '2015-09-01 04:00:00', '192.168.0.187', '2015-09-01 05:00:00', '192.168.0.187', '2015-09-10 00:00:00', '192.168.0.187'),
(10, 'user2@gmail.com', '251a98f7a397a7ece81888d5688a9ef81f87c3bb', 1, 'User9', 'User9', '', 1, '0000-00-00', 'img_1.jpg', '2015-09-01 04:00:00', '192.168.0.187', '2015-09-01 05:00:00', '192.168.0.187', '2015-09-10 00:00:00', '192.168.0.187'),
(11, 'user2@gmail.com', '251a98f7a397a7ece81888d5688a9ef81f87c3bb', 1, 'User10', 'User10', '', 1, '0000-00-00', 'img_1.jpg', '2015-09-01 04:00:00', '192.168.0.187', '2015-09-01 05:00:00', '192.168.0.187', '2015-09-10 00:00:00', '192.168.0.187'),
(12, 'belamide09@gmail.com', '251a98f7a397a7ece81888d5688a9ef81f87c3bb', 1, 'John Mart', 'Belamide', 'Gwapo', 1, '0000-00-00', 'img_1.jpg', '2015-09-01 04:00:00', '192.168.0.187', '2015-09-01 05:00:00', '192.168.0.187', '2015-09-10 00:00:00', '192.168.0.187');

-- --------------------------------------------------------

--
-- Table structure for table `users_login_history`
--

CREATE TABLE IF NOT EXISTS `users_login_history` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_ip` varchar(300) NOT NULL,
  `modified` datetime NOT NULL,
  `modied_ip` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_question_answers`
--

CREATE TABLE IF NOT EXISTS `users_question_answers` (
`id` int(11) NOT NULL,
  `user_id` varchar(300) NOT NULL,
  `question_id` int(11) NOT NULL,
  `choise_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_question_answers`
--

INSERT INTO `users_question_answers` (`id`, `user_id`, `question_id`, `choise_id`) VALUES
(3, '1', 4, 0),
(19, '1', 1, 9),
(20, '1', 1, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `answering_time_started`
--
ALTER TABLE `answering_time_started`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `category` (`category`), ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
 ADD PRIMARY KEY (`id`), ADD KEY `category_id` (`category_id`), ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `choises`
--
ALTER TABLE `choises`
 ADD PRIMARY KEY (`id`), ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `conference_rooms`
--
ALTER TABLE `conference_rooms`
 ADD PRIMARY KEY (`roomno`);

--
-- Indexes for table `conference_room_members`
--
ALTER TABLE `conference_room_members`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fb-users`
--
ALTER TABLE `fb-users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `google-users`
--
ALTER TABLE `google-users`
 ADD PRIMARY KEY (`id`,`uid`);

--
-- Indexes for table `online_visitors`
--
ALTER TABLE `online_visitors`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts_comments`
--
ALTER TABLE `posts_comments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts_comments_files`
--
ALTER TABLE `posts_comments_files`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts_comments_likes`
--
ALTER TABLE `posts_comments_likes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts_files`
--
ALTER TABLE `posts_files`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
 ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
 ADD PRIMARY KEY (`id`), ADD KEY `chapter_id` (`chapter_id`), ADD KEY `id` (`id`), ADD KEY `chapter_id_2` (`chapter_id`), ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `scoreboards`
--
ALTER TABLE `scoreboards`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_exam_finish`
--
ALTER TABLE `time_exam_finish`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_login_history`
--
ALTER TABLE `users_login_history`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users_question_answers`
--
ALTER TABLE `users_question_answers`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `answering_time_started`
--
ALTER TABLE `answering_time_started`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `choises`
--
ALTER TABLE `choises`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `conference_room_members`
--
ALTER TABLE `conference_room_members`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fb-users`
--
ALTER TABLE `fb-users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `google-users`
--
ALTER TABLE `google-users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `online_visitors`
--
ALTER TABLE `online_visitors`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `posts_comments`
--
ALTER TABLE `posts_comments`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `posts_comments_files`
--
ALTER TABLE `posts_comments_files`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `posts_comments_likes`
--
ALTER TABLE `posts_comments_likes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `posts_files`
--
ALTER TABLE `posts_files`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `scoreboards`
--
ALTER TABLE `scoreboards`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `time_exam_finish`
--
ALTER TABLE `time_exam_finish`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users_login_history`
--
ALTER TABLE `users_login_history`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_question_answers`
--
ALTER TABLE `users_question_answers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
