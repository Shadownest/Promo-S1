-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 02 Décembre 2014 à 09:24
-- Version du serveur: 5.5.37-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_bin NOT NULL,
  `position` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `title`, `position`) VALUES
(1, 'Actualit&eacute;s', 10),
(2, 'Jeux Vid&eacute;o', 20),
(3, 'Mat&eacute;riel', 30),
(4, 'Archives', 200);

-- --------------------------------------------------------

--
-- Structure de la table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author` int(11) unsigned NOT NULL,
  `content` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `author` (`author`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=10 ;

--
-- Contenu de la table `history`
--

INSERT INTO `history` (`id`, `date`, `author`, `content`) VALUES
(7, '2014-12-01 09:37:14', 20, 'Welcome <a href="index.php?page=user&id=20">test123456</a> !'),
(8, '2014-12-01 09:37:14', 20, 'Welcome <a href="index.php?page=user&id=20">test123456</a> !'),
(9, '2014-12-01 13:54:58', 22, 'Welcome <a href="index.php?page=user&id=22">mathieu</a> !');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `text` varchar(4096) COLLATE utf8_bin NOT NULL,
  `author_id` int(11) unsigned NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `subject_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subject_id` (`subject_id`),
  KEY `author_id` (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=29 ;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id`, `text`, `author_id`, `creation_date`, `update_date`, `subject_id`) VALUES
(5, 'coucou test', 13, '2014-11-27 23:00:00', '2014-11-27 23:00:00', 18),
(8, 'test1', 14, '2014-12-01 08:29:06', '0000-00-00 00:00:00', 18),
(9, 'test2', 14, '2014-12-01 08:29:06', '0000-00-00 00:00:00', 18),
(12, 'Test hugo', 14, '2014-12-01 09:08:18', '0000-00-00 00:00:00', 26),
(13, 'COUCOU LES AMIS CE SONT LES SMS', 16, '2014-12-01 13:41:46', '0000-00-00 00:00:00', 22),
(14, 'COUCOU LES AMIS CE SONT LES SMS', 13, '2014-12-01 13:41:46', '0000-00-00 00:00:00', 22),
(15, 'COUCOU LES AMIS CE SONT LES SMS', 17, '2014-12-01 13:41:46', '0000-00-00 00:00:00', 24),
(16, 'COUCOU LES AMIS CE SONT LES SMS', 17, '2014-12-01 13:41:46', '0000-00-00 00:00:00', 24),
(17, 'COUCOU LES AMIS CE SONT LES SMS', 16, '2014-12-01 13:41:46', '0000-00-00 00:00:00', 27),
(18, 'COUCOU LES AMIS CE SONT LES SMS', 13, '2014-12-01 13:41:46', '0000-00-00 00:00:00', 27),
(19, 'COUCOU LES AMIS CE SONT LES SMS', 18, '2014-12-01 13:41:46', '0000-00-00 00:00:00', 28),
(20, 'COUCOU LES AMIS CE SONT LES SMS', 15, '2014-12-01 13:41:46', '0000-00-00 00:00:00', 29),
(21, 'COUCOU LES AMIS CE SONT LES SMS', 13, '2014-12-01 13:41:46', '0000-00-00 00:00:00', 29),
(22, 'COUCOU LES AMIS CE SONT LES SMS', 16, '2014-12-01 13:41:46', '0000-00-00 00:00:00', 30),
(23, 'COUCOU LES AMIS CE SONT LES SMS', 13, '2014-12-01 13:41:46', '0000-00-00 00:00:00', 30),
(24, 'COUCOU LES AMIS CE SONT LES SMS', 15, '2014-12-01 13:41:46', '0000-00-00 00:00:00', 31),
(25, 'COUCOU LES AMIS CE SONT LES SMS', 15, '2014-12-01 13:41:46', '0000-00-00 00:00:00', 31),
(26, 'COUCOU LES AMIS CE SONT LES SMS', 18, '2014-12-01 13:41:46', '0000-00-00 00:00:00', 31),
(27, 'COUCOU LES AMIS CE SONT LES SMS', 15, '2014-12-01 13:41:46', '0000-00-00 00:00:00', 28),
(28, 'j''aime les chats', 13, '2014-12-01 14:59:27', '0000-00-00 00:00:00', 26);

-- --------------------------------------------------------

--
-- Structure de la table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_bin NOT NULL,
  `author_id` int(11) unsigned NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int(11) unsigned NOT NULL,
  `freeze` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=33 ;

--
-- Contenu de la table `subject`
--

INSERT INTO `subject` (`id`, `title`, `author_id`, `creation_date`, `category_id`, `freeze`) VALUES
(18, 'nono', 13, '2014-11-28 10:11:11', 1, 0),
(22, 'archivage', 13, '2014-11-28 13:30:21', 4, 0),
(24, 'pc', 14, '2014-11-28 13:42:59', 2, 0),
(26, 'mac', 14, '2014-12-01 08:27:10', 2, 0),
(27, 'nana', 14, '2014-12-01 08:27:10', 1, 0),
(28, 'xbox', 13, '2014-12-01 08:28:07', 2, 0),
(29, 'lol', 13, '2014-12-01 08:28:07', 2, 0),
(30, 'nini', 14, '2014-12-01 08:28:34', 1, 0),
(31, 'nunu', 14, '2014-12-01 08:28:34', 1, 0),
(32, 'TEST SUBJECT ', 13, '2014-12-01 14:59:15', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `tchat`
--

CREATE TABLE IF NOT EXISTS `tchat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(32) COLLATE utf8_bin NOT NULL,
  `content` varchar(512) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=38 ;

--
-- Contenu de la table `tchat`
--

INSERT INTO `tchat` (`id`, `date`, `author`, `content`) VALUES
(28, '2014-12-01 14:51:23', '22', 'jojojo'),
(29, '2014-12-01 14:51:34', '14', 'test'),
(30, '2014-12-01 14:52:14', '14', 'hh'),
(31, '2014-12-01 14:52:16', '22', 'lolololololololololololo'),
(32, '2014-12-01 14:52:26', '13', ''),
(33, '2014-12-01 14:53:11', '13', 'Hugo, NOOOOBBB !!!!'),
(34, '2014-12-01 14:54:21', '14', 'gege'),
(35, '2014-12-01 14:55:08', '14', 'Rrrrrr'),
(37, '2014-12-01 15:28:05', '16', 'test123');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(35) COLLATE utf8_bin NOT NULL,
  `password` varchar(128) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `level` enum('user','moderator','admin') COLLATE utf8_bin NOT NULL,
  `avatar` varchar(128) COLLATE utf8_bin NOT NULL,
  `description` varchar(255) COLLATE utf8_bin NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=23 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `level`, `avatar`, `description`, `creation_date`) VALUES
(13, 'bastien', '$2y$14$kXk7ZGAUbxtvInI9iFvuSeqpN6vQ/LSxfHALNOs2fd/LAFMCKdPzq', 'bastien@3wa.fr', 'admin', 'http://www.mapauvrelucette.fr/wp-content/uploads/2013/05/Ma-pauvre-Lucette-Petit-chat-3.jpg', 'j''aime les chats', '2014-11-28 10:58:01'),
(14, 'Bender', '$2y$14$PuwXXEgLB8Ps78vAbRLtseKHvKfJgSSX4CNQqQGNpDNcJ7HYFA5C6', 'bindwin@live.fr', 'admin', 'http://3.bp.blogspot.com/-hhLARZL0t_Q/UosWPFc-xmI/AAAAAAAA-xs/69COlbX300c/s1600/Julie-Lundy-Insert-girder-bender-futurama-print.', 'I''m back bitch', '2014-11-28 11:00:32'),
(15, 'Lecon', '$2y$14$frz9bJvdg3g8zsVYpL2DbufBgCJYWzX9GLzOAWnt/N8kCet7Woyle', 'rien@branler.web', 'admin', 'http://lesaliboffis.blogs.nouvelobs.com/media/00/02/424347565.jpg', 'rien Ã  dÃ©clarer et c''est dÃ©jÃ  beaucoup', '2014-11-28 14:38:38'),
(16, 'Pascal', '$2y$14$jKykkfJ5WZoAb4S21nxkuesuGPCpXTBmuD3XdMRVT1igTmLVTCsV6', 'pascal.charreix@gmail.com', 'admin', 'http://www.artbeat.net/assets/img/artbeat_accueil.jpg', 'SuperAdmin en chef', '2014-11-28 15:27:20'),
(17, 'test1234', '$2y$14$1WmeL44LF3OL6bxUfr8Teeihdmk38monl/f0a0sD2VyjhGOQBBCfS', 'toto@toto.com', 'user', '', '', '2014-12-01 09:32:38'),
(18, 'test1234', '$2y$14$iPvA/yeVv0U/XA4A3Exh/.h0HoZV2CIdL9FB6OWFYjwHOTV6OgeCe', 'toto@t3oto.com', 'user', '', '', '2014-12-01 09:34:10'),
(19, 'test12345', '$2y$14$GpnZeCRIdop.BOwubHpW6eTgW18nU4nz7GfEH9fEGKONVDJKd9WIG', 'toto@t34oto.com', 'user', '', '', '2014-12-01 09:35:48'),
(20, 'test123456', '$2y$14$V3kBmJgCk.evuA1MBTRhK.5rDUZknDUeHh9LgbENZKURENg53a9x.', 'toto@t345oto.com', 'user', '', '', '2014-12-01 09:37:14'),
(21, 'test123', '$2y$14$1WmeL44LF3OL6bxUfr8Teeihdmk38monl/f0a0sD2VyjhGOQBBCfS', 'toto@toto.com', 'moderator', '', '', '2014-12-01 09:32:38'),
(22, 'mathieu', '$2y$14$PMxbKIiPHY.lNU5xOgVfj.gmRGsjfDyLuoYXMBxEy5ILCJpKPpsk6', 'mathieu.nono@gmail.com', 'admin', '', '', '2014-12-01 13:54:58');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`author`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
