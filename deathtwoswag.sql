-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2015 at 08:52 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `deathtwoswag`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) unsigned NOT NULL,
  `position` varchar(30) NOT NULL,
  `permission_level` int(11) NOT NULL,
  `user_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `position`, `permission_level`, `user_id`) VALUES
(1, 'CEO', 1, 1),
(2, 'CEO', 1, 2),
(3, 'Dummy', 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `demo`
--

CREATE TABLE IF NOT EXISTS `demo` (
`id` int(10) unsigned NOT NULL,
  `input1` varchar(30) DEFAULT NULL,
  `input2` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `demo`
--

INSERT INTO `demo` (`id`, `input1`, `input2`) VALUES
(1, 'check it out', ''),
(2, 'test 2', ''),
(3, 'test1-1', 'test2-2');

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE IF NOT EXISTS `picture` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(30) NOT NULL,
  `file_name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`id`, `name`, `file_name`) VALUES
(1, 'placeholder1', 'res/placeholder_4x3.jpg'),
(2, 'mini_menu_button', 'res/mini_menu_button.png'),
(3, 'windows_logo', 'res/windows_logo.png'),
(4, 'linux_logo', 'res/linux_logo.png'),
(5, 'profile_image', 'res/profile_image.png'),
(6, 'feature_waves', 'res/waves.png'),
(7, 'feature_pathfinding', 'res/pathfinding.png'),
(8, 'feature_custmap', 'res/map.png');

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE IF NOT EXISTS `poll` (
`id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `option_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poll`
--

INSERT INTO `poll` (`id`, `option_id`, `post_id`, `option_name`) VALUES
(6, 0, 6, 'More damage and limited ammo'),
(6, 1, 6, 'Less damage with unlimited arrows'),
(7, 0, 7, 'I want mines'),
(7, 1, 7, 'I want traps'),
(7, 2, 7, 'I want both');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
`id` int(11) unsigned NOT NULL,
  `author_id` int(11) unsigned NOT NULL,
  `category_id` int(11) unsigned DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `summary` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `author_id`, `category_id`, `updated_at`, `title`, `content`, `summary`) VALUES
(6, 15, NULL, '2015-04-15 05:56:26', 'Should we Limit Ranged Ammunition? ', 'As you all know, currently the only weapon in the game is the arrow. This arrow offers high damage and unlimited ammunition which as it stands: is overpowered. Sometime in the future we would also like to add a short range weapon like a sword that will have unlimited ammunition but for the arrow we are left with a decision: \r\n\r\nShould we lower the arrows damage and continue to have unlimited ammunition? or should we make the arrow more powerful and limit ammunition? \r\n\r\nWhat do you think?', 'Should we lower the arrows damage and continue to have unlimited ammunition? or should we make the arrow more powerful and limit ammunition? '),
(7, 15, NULL, '2015-04-15 06:12:55', 'Should We Implement Traps?', 'In addition to the arrow ans Sword. We have considered implementing a trap style weapon. This weapon would either be a mine which would destroy all the enemies withing a certain proximity or a trap that would slow down any zombies that come in contact with it. Should we have a mine? a trap? both, or none?', 'Do you think we Should implement a mine? a trap? both, or neither?');

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE IF NOT EXISTS `suggestion` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suggestion`
--

INSERT INTO `suggestion` (`id`, `title`, `description`) VALUES
(1, 'i hope this works', '                            Enter Suggestion Heretesting');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(10) unsigned NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `real_name` varchar(50) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `website` varchar(255) DEFAULT NULL,
  `bio` text
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `password`, `real_name`, `date_created`, `website`, `bio`) VALUES
(9, 'wesley123', 'c000cf2cdf1b1566573b4264d664caca', 'wesle gue', '2015-04-14 07:00:00', NULL, NULL),
(10, 'billybob123', '2adfffa19459383b5ab22610a002254d', 'billy bob', '2015-04-14 07:00:00', NULL, NULL),
(13, 'testuser', 'e99a18c428cb38d5f260853678922e03', 'Derp derp', '2015-04-14 07:00:00', NULL, NULL),
(15, 'username', '5f4dcc3b5aa765d61d8327deb882cf99', 'namename', '2015-04-14 23:40:48', NULL, NULL),
(16, 'jim44', '5f4dcc3b5aa765d61d8327deb882cf99', 'jimmy', '2015-04-15 06:27:53', NULL, NULL),
(17, 'tonyfree', '5f4dcc3b5aa765d61d8327deb882cf99', 'Tony', '2015-04-15 06:37:39', NULL, NULL),
(18, 'alexthefish', '5f4dcc3b5aa765d61d8327deb882cf99', 'Alex', '2015-04-15 06:38:41', NULL, NULL),
(19, 'mastersarah', '5f4dcc3b5aa765d61d8327deb882cf99', 'Sarah', '2015-04-15 06:39:48', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `name`, `file_name`) VALUES
(2, 'trailer', 'res/trailer.webm');

-- --------------------------------------------------------

--
-- Table structure for table `viewcounter`
--

CREATE TABLE IF NOT EXISTS `viewcounter` (
`id` int(11) unsigned NOT NULL,
  `pageName` varchar(255) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `viewcounter`
--

INSERT INTO `viewcounter` (`id`, `pageName`, `views`) VALUES
(3, 'DeathTest', 704);

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE IF NOT EXISTS `vote` (
  `post_id` int(11) unsigned NOT NULL,
  `option_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`post_id`, `option_id`, `user_id`) VALUES
(3, 3, 15),
(6, 0, 18),
(6, 1, 16),
(6, 1, 17),
(6, 1, 19),
(7, 0, 16),
(7, 0, 18),
(7, 2, 17),
(7, 2, 19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demo`
--
ALTER TABLE `demo`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
 ADD PRIMARY KEY (`id`,`option_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suggestion`
--
ALTER TABLE `suggestion`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `viewcounter`
--
ALTER TABLE `viewcounter`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
 ADD PRIMARY KEY (`post_id`,`option_id`,`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `demo`
--
ALTER TABLE `demo`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `suggestion`
--
ALTER TABLE `suggestion`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `viewcounter`
--
ALTER TABLE `viewcounter`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
