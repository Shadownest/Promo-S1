-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 28 Novembre 2014 à 16:33
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
(1, 'jeux videos', 10),
(2, 'noel', 20),
(3, 'Archives', 200),
(4, 'catTest', 30);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id`, `text`, `author_id`, `creation_date`, `update_date`, `subject_id`) VALUES
(5, 'coucou test', 13, '2014-11-27 23:00:00', '2014-11-27 23:00:00', 18),
(7, 'SMS', 14, '2014-11-28 13:54:13', '0000-00-00 00:00:00', 25);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=26 ;

--
-- Contenu de la table `subject`
--

INSERT INTO `subject` (`id`, `title`, `author_id`, `creation_date`, `category_id`, `freeze`) VALUES
(18, 'xbox', 13, '2014-11-28 10:11:11', 2, 0),
(22, 'archivage', 13, '2014-11-28 13:30:21', 3, 0),
(24, 'pc', 14, '2014-11-28 13:42:59', 1, 0),
(25, 'sujetTest', 14, '2014-11-28 13:46:04', 3, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=17 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `level`, `avatar`, `description`, `creation_date`) VALUES
(13, 'bastien', '$2y$14$kXk7ZGAUbxtvInI9iFvuSeqpN6vQ/LSxfHALNOs2fd/LAFMCKdPzq', 'bastien@3wa.fr', 'user', 'http://www.mapauvrelucette.fr/wp-content/uploads/2013/05/Ma-pauvre-Lucette-Petit-chat-3.jpg', 'j''aime les chats', '2014-11-28 10:58:01'),
(14, 'Bender', '$2y$14$PuwXXEgLB8Ps78vAbRLtseKHvKfJgSSX4CNQqQGNpDNcJ7HYFA5C6', 'bindwin@live.fr', 'admin', 'http://3.bp.blogspot.com/-hhLARZL0t_Q/UosWPFc-xmI/AAAAAAAA-xs/69COlbX300c/s1600/Julie-Lundy-Insert-girder-bender-futurama-print.', 'I''m back bitch', '2014-11-28 11:00:32'),
(15, 'Lebon', '$2y$14$frz9bJvdg3g8zsVYpL2DbufBgCJYWzX9GLzOAWnt/N8kCet7Woyle', 'rien@branler.web', 'user', '', '', '2014-11-28 14:38:38'),
(16, 'Pascal', '$2y$14$jKykkfJ5WZoAb4S21nxkuesuGPCpXTBmuD3XdMRVT1igTmLVTCsV6', 'pascal.charreix@gmail.com', 'admin', 'http://www.artbeat.net/assets/img/artbeat_accueil.jpg', 'SuperAdmin en chef', '2014-11-28 15:27:20');

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
