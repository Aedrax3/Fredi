-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 03 avr. 2023 à 16:06
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fredi`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherents`
--

DROP TABLE IF EXISTS `adherents`;
CREATE TABLE IF NOT EXISTS `adherents` (
  `numero_licence` int(15) NOT NULL,
  `Nom` varchar(20) COLLATE utf8_bin NOT NULL,
  `Prenom` varchar(20) COLLATE utf8_bin NOT NULL,
  `num_ligue` int(20) NOT NULL,
  PRIMARY KEY (`numero_licence`),
  KEY `num-ligue` (`num_ligue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `adherents`
--

INSERT INTO `adherents` (`numero_licence`, `Nom`, `Prenom`, `num_ligue`) VALUES
(1, 'Denoit', 'Damien', 972);

-- --------------------------------------------------------

--
-- Structure de la table `demandeurs`
--

DROP TABLE IF EXISTS `demandeurs`;
CREATE TABLE IF NOT EXISTS `demandeurs` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `adresse_mail` varchar(50) COLLATE utf8_bin NOT NULL,
  `mdp` varchar(16) COLLATE utf8_bin NOT NULL,
  `nom` varchar(50) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(50) COLLATE utf8_bin NOT NULL,
  `rue` varchar(50) COLLATE utf8_bin NOT NULL,
  `cp` int(50) NOT NULL,
  `ville` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `demandeurs`
--

INSERT INTO `demandeurs` (`id`, `adresse_mail`, `mdp`, `nom`, `prenom`, `rue`, `cp`, `ville`) VALUES
(1, 'test', 'ffff', 'test', 'test', 'test', 545454, 'test'),
(2, 'freditest@test.com', 'gggg', ' ', ' ', ' ', 0, ' ');

-- --------------------------------------------------------

--
-- Structure de la table `lien`
--

DROP TABLE IF EXISTS `lien`;
CREATE TABLE IF NOT EXISTS `lien` (
  `num_licence` int(15) NOT NULL,
  `id_demandeurs` int(50) NOT NULL,
  `id_note` int(50) NOT NULL,
  PRIMARY KEY (`id_demandeurs`,`id_note`,`num_licence`) USING BTREE,
  KEY `lien_ibfk_1` (`id_demandeurs`),
  KEY `lien_ibfk_3` (`id_note`) USING BTREE,
  KEY `lien_ibfk_2` (`num_licence`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `lien`
--

INSERT INTO `lien` (`num_licence`, `id_demandeurs`, `id_note`) VALUES
(1, 1, 122),
(1, 1, 123),
(1, 1, 129),
(1, 1, 130),
(1, 2, 135);

-- --------------------------------------------------------

--
-- Structure de la table `ligues`
--

DROP TABLE IF EXISTS `ligues`;
CREATE TABLE IF NOT EXISTS `ligues` (
  `numero` int(10) NOT NULL,
  `Nom` varchar(30) COLLATE utf8_bin NOT NULL,
  `sigle` varchar(50) COLLATE utf8_bin NOT NULL,
  `président` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`numero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `ligues`
--

INSERT INTO `ligues` (`numero`, `Nom`, `sigle`, `président`) VALUES
(972, 'INDUSTRIES', 'LePacteAvecLeMonde', 'Moi');

-- --------------------------------------------------------

--
-- Structure de la table `note_de_frais`
--

DROP TABLE IF EXISTS `note_de_frais`;
CREATE TABLE IF NOT EXISTS `note_de_frais` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `dates` date NOT NULL,
  `motif` varchar(255) NOT NULL,
  `trajet_départ` varchar(2000) NOT NULL,
  `trajet_arrivé` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `km_parcourus` int(50) NOT NULL,
  `cout_peage` double NOT NULL,
  `cout_repas` double NOT NULL,
  `cout_hebergement` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=136 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `note_de_frais`
--

INSERT INTO `note_de_frais` (`id`, `dates`, `motif`, `trajet_départ`, `trajet_arrivé`, `km_parcourus`, `cout_peage`, `cout_repas`, `cout_hebergement`) VALUES
(135, '2023-04-13', 'Compétition de Basket', 'Trinité', 'Fort-de-France', 330, 0, 250, 0),
(130, '2023-03-15', 'Compétition de Basket', 'Trinité', 'Fort-de-France', 5, 0, 30, 0),
(123, '2023-02-28', 'Compétition de Basket', 'Trinité', 'Fort-de-France', 4000, 2000, 300, 250),
(122, '2023-03-17', 'travail', 'Ajoupa', 'Basse-Pointe', 5000, 4000, 3000, 2000);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adherents`
--
ALTER TABLE `adherents`
  ADD CONSTRAINT `adherents_ibfk_1` FOREIGN KEY (`num_ligue`) REFERENCES `ligues` (`numero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
