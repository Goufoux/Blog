-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 20 août 2018 à 06:27
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
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `billet`
--

DROP TABLE IF EXISTS `billet`;
CREATE TABLE IF NOT EXISTS `billet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(30) NOT NULL,
  `contenu` text NOT NULL,
  `datePub` int(11) NOT NULL,
  `dateMod` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `billet`
--

INSERT INTO `billet` (`id`, `titre`, `contenu`, `datePub`, `dateMod`) VALUES
(15, 'C\'est moi !', '<p style=\"text-align: center;\">Test du blog pour la responsivit&eacute;Test du blog pour la responsivit&eacute;Test du blog pour la responsivit&eacute;Test du blog pour la responsivit&eacute;Test du blog pour la responsivit&eacute;Test du blog pour la responsivit&eacute;Test du blog pour la responsivit&eacute;</p>\r\n<p style=\"text-align: center;\">Test du blog pour la responsivit&eacute;Test du blog pour la responsivit&eacute;</p>\r\n<p style=\"text-align: center;\">Test du blog pour la responsivit&eacute;Test du blog pour la responsivit&eacute;Test du blog pour la responsivit&eacute;Test du blog pour la responsivit&eacute;Test du blog pour la responsivit&eacute;Test du blog pour la responsivit&eacute;Test du blog pour la responsivit&eacute;Test du blog pour la responsivit&eacute;Test du blog pour la responsivit&eacute;Test du blog pour la responsivit&eacute;Test du blog pour la responsivit&eacute;Test du blog pour la responsivit&eacute;Test du blog pour la responsivit&eacute;Test du blog pour la responsivit&eacute;Test du blog pour la responsivit&eacute;Test du blog pour la responsivit&eacute;Test du blog pour la responsivit&eacute;</p>', 1534342617, 1534423044),
(16, 'Introduction', '<p>Bonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introduction</p>\r\n<p>Bonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introduction</p>\r\n<p>Bonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introductionBonjour &agrave; tous, voici l\'introduction</p>', 1534423286, 0),
(17, 'Partie 1', '<p>ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd</p>\r\n<p>&nbsp;</p>\r\n<p>ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd</p>\r\n<p>&nbsp;</p>\r\n<p>dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd</p>\r\n<p>&nbsp;</p>\r\n<p>dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd</p>\r\n<p>&nbsp;</p>\r\n<p>dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd</p>\r\n<p>&nbsp;</p>\r\n<p>ddddddddddddddddddddddddddddddddddddddd</p>\r\n<p>&nbsp;</p>\r\n<p>ddddddddddddddddddddddddddddddddddddd</p>\r\n<p>&nbsp;</p>\r\n<p>dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd</p>', 1534423313, 1534423616);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `contenu` text NOT NULL,
  `idBillet` int(11) NOT NULL,
  `datePub` int(11) NOT NULL,
  `signaler` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(25) NOT NULL,
  `pass` text NOT NULL,
  `accessLevel` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `pseudo`, `pass`, `accessLevel`) VALUES
(1, 'Quentin', '$2y$10$cacVNftBaDNhH1oZ6ucfWuPXaEJRP6Z.QXLhfrGNj8WDgd0GTplM.', 5),
(6, 'Goufoux', '$2y$10$gjBqzlTydyqAox51hORkIuD9t8JihBEEGF0NKrf5c1kJNv7QW9hDW', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
