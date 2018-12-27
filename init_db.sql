-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 27 déc. 2018 à 00:32
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tp_blog_mvc`
--
CREATE DATABASE IF NOT EXISTS `tp_blog_mvc` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tp_blog_mvc`;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`) VALUES
(1, 1, 'Alex', 'C\'est génial tout ça ! On attend la suite ', '2018-11-26 16:37:00'),
(2, 1, 'Ollie56', 'Bon courage pour ton blog ! Je mets en fav\' ', '2018-11-26 12:20:00'),
(3, 2, 'Kal29', 'Tonnerre de Brest ( littéralement ^^ )', '2018-11-28 08:26:00'),
(4, 2, 'Alex', 'Courage ! Il fait beau ici ... mais froid donc je suis très bien au chaud comme toi =)', '2018-11-28 09:41:00'),
(21, 1, 'Jean', 'Joli forum', '2018-12-24 19:49:52');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`) VALUES
(1, 'Bienvenue !', 'Bonjour et bienvenue sur mon blog !\r\nJe m’entraîne encore , soyez indulgents :) ', '2018-11-26 06:24:00'),
(2, 'Il pleut toujours', 'La météo n\'est pas clémente cette semaine, mais ça me permet de fignoler mon blog sans être frustré de ne pas profiter d\'un peu de soleil non ? :) ', '2018-11-28 11:42:00'),
(3, 'Voici un autre billet', 'Test', '2018-12-04 19:48:57'),
(7, 'Test suppression', 'Test', '2018-12-11 00:28:37'),
(6, 'Test modifié', 'Ce billet a été modifié', '2018-12-11 00:25:33'),
(8, 'Test suppression', 'Test', '2018-12-11 00:28:39'),
(9, 'Modification', 'Test modification', '2018-12-11 16:04:51');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
