-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2015 at 07:12 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poll`
--

INSERT INTO `poll` (`id`, `option_id`, `post_id`, `option_name`) VALUES
(1, 1, 3, 'Burn the witch'),
(1, 2, 3, 'Hug the witch'),
(1, 3, 3, 'Eat the witch'),
(4, 0, 4, 'Numero1'),
(4, 1, 4, 'The other one'),
(4, 2, 4, 'One more!');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `author_id`, `category_id`, `updated_at`, `title`, `content`, `summary`) VALUES
(1, 15, NULL, '2015-04-15 01:51:36', 'Here is an example title.', '<p>The project has begun! Or, well... it began a little while ago. January 20th to be exact. But the development log starts here! We''ve been in development for a couple weeks now, so let me give you a quick summary.</p>\r\n				\r\n				<h2>Where We''re At</h2>\r\n				\r\n				<p>We have a player. And a camera. And some tiles. We also have some basic enemies that pathfind around the map (thank you A-Star). When the player is in sight, the enemy will charge at you like a bull! Only it''s quite a bit less dramatic than that.</p>\r\n		\r\n				<p>We also have arrows! Or balls. I don''t know, they''re kind of round for testing purposes right now, but they will be arrows eventually! For now, though, they''ll be sticky, do-nothing balls.</p>\r\n				\r\n				<h2>Where We''re Going</h2>\r\n				\r\n				<p>What I want to get implemented right away is health. I want to turn this game into a GAME. Not just a tilemap with some simple physics, simple pathfinding, and simple enemies... it''s all too basic. Oh right, I should probably explain the game.</p>\r\n				\r\n				<p>The game is going to be an endless wave-based shooter. You''ll begin on round one, where a few easy enemies will spawn around the map. Eventually, the waves will get harder and harder, at which point you will most likely die. That''s the plan, anyways. </p>\r\n				\r\n				<p>We are still trying to figure out a lot about where this game is going, and we''re going to try and get the community involved with the game decisions if we can. For now, here is what we''re thinking about:</p>\r\n				\r\n				<ul>\r\n					<li>Originally we planned for a top-down view, but now we are considering going isometric. </li>\r\n					<li>The theme is probably going to medevial/fantasy (so expect swords and arrows, etc).</li>\r\n					<li>We''re considering classes, or some sort of leveling system, but that''s further down the road.</li>\r\n					<li>I''m not sure what the plan is for in-game power-ups yet.</li>\r\n					<li>Multiplayer is a maybe, we''ll see where the game takes us.</li>\r\n					<li>We''re discussing implementing destroyable tiles, so you can setup some sort of base to funnel the enemies, but only if we can work out the technical and gameplay aspects.</li>\r\n				</ul>\r\n				\r\n				<p>As you can see, a lot of the game ideas are still up in the air. We''re uncertain about a lot, but we did this on purpose to allow ourselves some breathing room. I also want to point out that we are developing the website alongside the game, so please bear with us! </p>\r\n				\r\n				<h2>What''s The Purpose Of This</h2>\r\n				\r\n				<p>These posts are meant to act as a development log for us, and for you, but it may also act like a blog at times. I don''t know. Is there a difference between a development log and a blog? Shall we call it a dlog? I would assume that a blog has longer posts compared to development logs. Ahh well, it will probably contain long and short posts, so expect both!</p>\r\n				\r\n				<p>Anywho, enough rambling! Thank you for reading, more development logs are on their way.</p>', 'We''re thinking of doing this thing to the game. It will introduce a couple unwanted bugs, but the gameplay benefits are huge!'),
(2, 15, NULL, '2015-04-15 01:49:51', 'Testing the page!', '<p>The content is written in HTML :O</p>\r\n\r\n<h2>OH SO FANCY!</h2>\r\n\r\n<p>Seriously though, this is dope.</p>', 'This is a simple summary to show that all fields are working.'),
(3, 15, NULL, '2015-04-15 01:54:58', 'Example Number 2', '<h2>OMG SO MUCH HEADING. MUCH WOW.</h2>\r\n\r\n<small>I have no friends...</small>', 'Yet again, another test.'),
(4, 15, NULL, '2015-04-15 05:11:33', 'fdsa', 'fdsafdsfdsfsdf', 'fdasfasdf');

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `password`, `real_name`, `date_created`, `website`, `bio`) VALUES
(9, 'wesley123', 'c000cf2cdf1b1566573b4264d664caca', 'wesle gue', '2015-04-14 07:00:00', NULL, NULL),
(10, 'billybob123', '2adfffa19459383b5ab22610a002254d', 'billy bob', '2015-04-14 07:00:00', NULL, NULL),
(13, 'testuser', 'e99a18c428cb38d5f260853678922e03', 'Derp derp', '2015-04-14 07:00:00', NULL, NULL),
(15, 'username', '5f4dcc3b5aa765d61d8327deb882cf99', 'namename', '2015-04-14 23:40:48', NULL, NULL);

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
(3, 'DeathTest', 588);

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
(3, 3, 15);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `suggestion`
--
ALTER TABLE `suggestion`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
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
