-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 20 mars 2020 à 17:37
-- Version du serveur :  10.4.6-MariaDB
-- Version de PHP :  7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `m2l`
--
CREATE DATABASE IF NOT EXISTS `m2l` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `m2l`;

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `id_faq` bigint(11) NOT NULL AUTO_INCREMENT,
  `question` text DEFAULT NULL,
  `reponse` text DEFAULT NULL,
  `dat_question` datetime DEFAULT NULL,
  `dat_reponse` datetime DEFAULT NULL,
  `id_user` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id_faq`),
  KEY `FK_faq_id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`id_faq`, `question`, `reponse`, `dat_question`, `dat_reponse`, `id_user`) VALUES
(1, 'A combien de joueurs se joue le football?', 'Il y a 11 joueurs par équipe.', '2020-01-22 00:00:00', '2020-01-29 12:30:00', 8),
(2, 'Comment on fait une passe?', 'Avec son pied.', '2020-01-30 08:00:00', '2020-02-03 02:30:00', 8);

-- --------------------------------------------------------

--
-- Structure de la table `ligue`
--

DROP TABLE IF EXISTS `ligue`;
CREATE TABLE IF NOT EXISTS `ligue` (
  `id_ligue` bigint(11) NOT NULL AUTO_INCREMENT,
  `lib_ligue` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_ligue`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ligue`
--

INSERT INTO `ligue` (`id_ligue`, `lib_ligue`) VALUES
(1, 'Ligue de football'),
(2, 'Ligue de basket'),
(3, 'Ligue de volley'),
(4, 'Ligue de handball'),
(5, 'Toutes les ligues');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` bigint(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `id_usertype` bigint(11) DEFAULT NULL,
  `id_ligue` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `pseudo` (`pseudo`),
  UNIQUE KEY `mail` (`mail`),
  KEY `FK_user_id_usertype` (`id_usertype`),
  KEY `FK_user_id_ligue` (`id_ligue`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `pseudo`, `mdp`, `mail`, `id_usertype`, `id_ligue`) VALUES
(8, 'mathias', 'd3abba7b2b42c590b28cd01c9265cf4460bcffe8', 'mathiasbourdim45@gmail.com', NULL, 4),
(12, 'Math', '$2y$10$3QveqhW/dXtRi8KZp1TLge/lq6sKnMm.h5blj7j8jsmZhsDKNc.mO', 'mathiasbourdim@gmail.com', NULL, 4),
(13, 'Mathb', '$2y$10$AlAdZ/96iefSu7QDWiaxBeToMMN4yJhoKAwrR02eHmbS1rjHpZH/2', 'mathiasbourdim1@gmail.com', 1, 4),
(14, 'mathi', '$2y$10$jUfOMxNEANbmgM7fFfRN5eKudjXskQ1tpQvYQ8pWBCwaajoPZuDJe', 'mathiasbourdim3@gmail.com', 1, 4),
(15, 'mathiass', '2b01d9d592da55cca64dd7804bc295e6e03b5df4', 'mathiasbourdim32@gmail.com', NULL, 4),
(16, 'mathiasse', 'd3abba7b2b42c590b28cd01c9265cf4460bcffe8', 'mathiasbourdim0@gmail.com', NULL, 4);

-- --------------------------------------------------------

--
-- Structure de la table `usertype`
--

DROP TABLE IF EXISTS `usertype`;
CREATE TABLE IF NOT EXISTS `usertype` (
  `id_usertype` bigint(11) NOT NULL AUTO_INCREMENT,
  `lib_usertype` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_usertype`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `usertype`
--

INSERT INTO `usertype` (`id_usertype`, `lib_usertype`, `description`) VALUES
(1, 'utilisateur', 'utilisateur de base'),
(2, 'admin', 'administrateur de ligue'),
(3, 'super-admin', 'administrateur de toutes les ligues');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
