-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2016 at 10:23 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `author` varchar(30) NOT NULL,
  `genre_id` int(10) unsigned NOT NULL,
  `cover` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`),
  KEY `genre_id` (`genre_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `genre_id`, `cover`) VALUES
(1, 'A Game of Thrones', 'George R.R. Martin', 1, 'a-game-of-thrones.jpeg'),
(2, 'An Abundance of Katherines', 'John Green', 5, 'an-abundance-of-katherines.jpg'),
(3, 'A Walk to Remember', 'Nicholas Sparks', 4, 'a-walk-to-remember.jpg'),
(4, 'Before I Fall', 'Lauren Oliver', 5, 'before-i-fall.jpg'),
(5, 'Cat''s Cradle', 'Kurt Vonnegut', 6, 'cat''s-cradle.gif'),
(6, 'City of Bones', 'Cassandra Clare', 1, 'city-of-bones.jpg'),
(7, 'Clockwork Angel', 'Cassandra Clare', 1, 'clockwork-angel.jpg'),
(8, 'Daughter of Smoke & Bone', 'Laini Taylor', 1, 'daughter-of-smoke-and-bone.jpg'),
(9, 'Dear John', 'Nicholas Sparks', 4, 'dear-john.jpg'),
(10, 'Divergent', 'Veronica Roth', 10, 'divergent.jpg'),
(11, 'Eleanor & Park', 'Rainbow Rowell', 5, 'eleanor-and-park.jpg'),
(12, 'It', 'Steven King', 3, 'it.jpg'),
(13, 'Looking for Alaska', 'John Green', 5, 'looking-for-alaska.jpg'),
(14, 'Murder on the Orient Express', 'Agatha Christie', 9, 'murder-on-the-orient-express.jpg'),
(15, 'Paper Towns', 'John Green', 5, 'paper-towns.jpg'),
(16, 'Pride and Prejudice', 'Jane Austen', 7, 'pride-and-prejudice.jpg'),
(17, 'The Fault in Our Stars', 'John Green', 5, 'the-fault-in-our-stars.jpg'),
(18, 'The Host', 'Stephenie Meyer', 2, 'the-host.jpg'),
(19, 'The Hound of the Baskervilles', 'Arthur Conan Doyle', 9, 'the-hound-of-the-baskervilles.jpg'),
(20, 'The Hunger Games', 'Suzanne Collins', 10, 'the-hunger-games.jpg'),
(21, 'The Perks of Being a Wallflower', 'Stephen Chbosky', 5, 'the-perks-of-being-a-wallflower.jpg'),
(22, 'The Selection', 'Kiera Kass', 10, 'the-selection.jpg'),
(23, 'Thirteen Reasons Why', 'Jay Asher', 5, 'thirteen-reasons-why.jpg'),
(24, 'To Kill a Mockingbird', 'Harper Lee', 7, 'to-kill-a-mockingbird.jpg'),
(25, 'Twilight', 'Stephenie Meyer', 4, 'twilight.jpg'),
(26, 'Самодива', 'Краси Зуркова', 8, 'самодива.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(7, 'Classics'),
(8, 'Contemporary'),
(9, 'Crime'),
(10, 'Dystopian'),
(1, 'Fantasy'),
(6, 'Fiction'),
(3, 'Horror'),
(4, 'Romance'),
(2, 'Science Fiction'),
(5, 'Young Adult');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `type`) VALUES
(1, 'admin', 'admin', 'admin', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
