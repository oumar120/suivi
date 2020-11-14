-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 14 nov. 2020 à 09:47
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `suivi`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

DROP TABLE IF EXISTS `activite`;
CREATE TABLE IF NOT EXISTS `activite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `date_debut` date DEFAULT NULL,
  `duree` int(11) NOT NULL,
  `service` text NOT NULL,
  `percent` decimal(11,0) NOT NULL,
  `nombre_tache` int(11) NOT NULL,
  `id_activite` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`id`, `nom`, `date_debut`, `duree`, `service`, `percent`, `nombre_tache`, `id_activite`) VALUES
(6, 'application de suivi', '2020-10-28', 0, 'DPPP', '50', 3, '47986c03a3df2f31e47e7e59c281548ff903aa72'),
(7, 'maintenance serveur', '2020-10-26', 0, 'DPPP', '0', 1, 'fab69ea7a2b68f12163c6dca9ca5de3b973140b6'),
(10, 'session de formation', '2020-10-29', 0, 'Informatique', '23', 1, '787a9c64e6c182619f2b8b63aac1add12a498920'),
(13, 'revision des ordinateurs', '2020-11-03', 0, 'DPS', '100', 1, '723c5881428e77b5ac864475b084a6e25b7409e7'),
(14, 'mise Ã  jour de la plateforme', '2020-11-02', 0, 'DPS', '100', 1, 'd9dcf8a435405a038744701c46d01e2fe152c528'),
(17, 'plateforme web', '2020-11-09', 3, 'DG', '0', 2, 'c75120b5c2c2f81d7b6da32722fe4365b490cdf9');

-- --------------------------------------------------------

--
-- Structure de la table `agenda`
--

DROP TABLE IF EXISTS `agenda`;
CREATE TABLE IF NOT EXISTS `agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dater` datetime NOT NULL,
  `nature` varchar(30) CHARACTER SET latin1 NOT NULL,
  `type_contact` text CHARACTER SET latin1 NOT NULL,
  `identite` text CHARACTER SET latin1 NOT NULL,
  `contact` varchar(50) CHARACTER SET latin1 NOT NULL,
  `etat` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT 'prevu',
  `recu` varchar(30) CHARACTER SET latin1 NOT NULL DEFAULT 'a renseigner',
  `commentaire` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `agenda`
--

INSERT INTO `agenda` (`id`, `dater`, `nature`, `type_contact`, `identite`, `contact`, `etat`, `recu`, `commentaire`) VALUES
(1, '2020-11-07 12:45:00', 'rencontre', 'personne morale', 'microcred', 'balde-786344527', 'annule', '', 'le  DG est absent'),
(2, '2020-10-23 13:17:00', 'audience', 'personne morale', 'Baobab', '776344527/balde', 'tenu', 'DG', ''),
(3, '2020-10-29 15:57:00', 'audience', 'personne morale', 'Baobab', '776344527/balde', 'tenu', 'assistante', 'demande de financement'),
(4, '2020-10-29 15:58:00', 'audience', 'particulier', 'oumar', '786344527', 'tenu', 'assistante', 'demande de financement'),
(5, '2020-10-23 14:23:00', 'audience', 'particulier', 'oumar', '786344527', 'tenu', 'assistante', 'demande de financement'),
(6, '2020-10-23 15:32:00', 'audience', 'personne morale', 'microcred', 'balde-786344527', 'tenu', 'DG', 'signature de partenariat'),
(7, '2020-11-05 16:12:00', 'rencontre', 'particulier', 'Mr Balde', 'oumar-786953214-bal@gmail.com', 'tenu', 'a renseigner', 'a renseigner'),
(8, '2020-11-05 16:23:00', 'rencontre', 'particulier', 'Mr Sall', 'oumar-786953214-bal@gmail.com', 'tenu', 'a renseigner', 'la reunion s est bien passÃ©e'),
(9, '2020-11-06 12:12:00', 'rencontre', 'particulier', 'Marcel Thiaw', 'balde-786344527', 'tenu', 'DG', 'oh la la'),
(10, '2020-11-05 12:16:00', 'rencontre', 'personne morale', 'Dnde', '786344527', 'tenu', 'a renseigner', ''),
(11, '2020-11-07 14:50:00', 'rencontre', 'particulier', 'Moussa', 'balde-786344527', 'tenu', 'a renseigner', ''),
(12, '2020-11-07 16:25:00', 'audience', 'personne morale', 'ecobank', '786344527', 'tenu', 'a renseigner', ''),
(13, '2020-11-08 15:41:00', 'rencontre', 'particulier', 'oumar', '786344527', 'annule', '', ''),
(14, '2020-11-09 13:22:00', 'rencontre', 'personne morale', 'SGBS', '336958745', 'annule', 'DG', ''),
(15, '2020-11-16 13:30:00', 'audience', 'personne morale', 'SGBS', '336958745', 'reporte', 'DG', ''),
(16, '2020-11-13 10:56:00', 'audience', 'personne morale', 'ecobank', '339923655', 'tenu', 'a renseigner', '');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fournisseur` text CHARACTER SET latin1 NOT NULL,
  `montant` int(11) NOT NULL,
  `date_reception` date NOT NULL,
  `echeance` int(11) NOT NULL,
  `date_reglement` varchar(30) CHARACTER SET latin1 NOT NULL DEFAULT 'non reglée',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`id`, `fournisseur`, `montant`, `date_reception`, `echeance`, `date_reglement`) VALUES
(3, 'oumar balde', 100000, '2020-11-13', 4, 'non reglÃ©e');

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

DROP TABLE IF EXISTS `tache`;
CREATE TABLE IF NOT EXISTS `tache` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_debut` date NOT NULL,
  `nom` text NOT NULL,
  `date_fin` varchar(255) NOT NULL,
  `echeance` int(11) NOT NULL,
  `etat` varchar(20) NOT NULL DEFAULT 'en cours',
  `responsable` text NOT NULL,
  `commentaire` varchar(255) NOT NULL,
  `percent` int(11) NOT NULL,
  `id_activite` varchar(255) NOT NULL,
  `service` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_activite` (`id_activite`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tache`
--

INSERT INTO `tache` (`id`, `date_debut`, `nom`, `date_fin`, `echeance`, `etat`, `responsable`, `commentaire`, `percent`, `id_activite`, `service`) VALUES
(14, '2020-10-28', '', '2020-11-01', 6, 'en retard', 'balde', 'vÃ©rification des composants', 100, 'fab69ea7a2b68f12163c6dca9ca5de3b973140b6', 'DPPP'),
(13, '2020-10-28', '', '2020-11-02', 20, 'en retard', 'balde', 'j\'etais souffrant ', 25, '47986c03a3df2f31e47e7e59c281548ff903aa72', 'DPPP'),
(12, '2020-10-26', '', '2020-11-05', 5, 'en retard', 'balde', 'encore un autre test', 25, '47986c03a3df2f31e47e7e59c281548ff903aa72', 'DPPP'),
(11, '2020-10-27', '', '2020-10-29', 10, 'en retard', 'balde', 'ceci est un test', 50, '47986c03a3df2f31e47e7e59c281548ff903aa72', 'DPPP'),
(17, '2020-10-28', '', '2020-11-06', 10, 'en retard', 'oumar', 'bon j\'ai terminÃ©', 23, '787a9c64e6c182619f2b8b63aac1add12a498920', 'Informatique'),
(18, '2020-11-02', '', '2020-11-03', 1, 'termine', 'oumar', 'j ai pu terminÃ© Ã  temps car j ai travaillÃ© le weekend', 100, '723c5881428e77b5ac864475b084a6e25b7409e7', 'DPS'),
(21, '2020-11-02', '', '2020-11-03', 1, 'termine', 'balde', 'RAS', 100, 'd9dcf8a435405a038744701c46d01e2fe152c528', 'DPS'),
(29, '2020-11-10', 'mise en ligne', '2020-11-12', 2, 'en retard', 'oumar', ' ', 67, 'c75120b5c2c2f81d7b6da32722fe4365b490cdf9', 'DG'),
(28, '2020-11-09', 'codage', '2020-11-10', 1, 'en retard', 'balde', ' ', 33, 'c75120b5c2c2f81d7b6da32722fe4365b490cdf9', 'DG');

-- --------------------------------------------------------

--
-- Structure de la table `tresorerie`
--

DROP TABLE IF EXISTS `tresorerie`;
CREATE TABLE IF NOT EXISTS `tresorerie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `compte` text NOT NULL,
  `solde` int(11) NOT NULL,
  `dater` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tresorerie`
--

INSERT INTO `tresorerie` (`id`, `compte`, `solde`, `dater`) VALUES
(1, 'Tresor', 50000, '2020-11-06'),
(2, 'Bnde', 500000, '2020-11-07'),
(4, 'Caisse', 50000000, '2020-11-09');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) CHARACTER SET latin1 NOT NULL,
  `password` varchar(30) CHARACTER SET latin1 NOT NULL,
  `service` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `service`) VALUES
(2, 'DPPP', 'passer', 'DPPP'),
(3, 'DPS', 'passer', 'DPS'),
(4, 'BAF', 'passer', 'BAF'),
(5, 'informatique', 'passer', 'Informatique'),
(6, 'DG', 'passer', 'DG');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
