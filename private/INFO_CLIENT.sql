-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 19 juin 2023 à 23:49
-- Version du serveur : 10.3.36-MariaDB-0+deb10u2
-- Version de PHP : 7.3.31-1~deb10u2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bptfi2143330_1szoph`
--

-- --------------------------------------------------------

--
-- Structure de la table `INFO_CLIENT`
--

CREATE TABLE `INFO_CLIENT` (
  `id_infoclient` int(11) NOT NULL,
  `Num_de_cmpt` int(11) NOT NULL,
  `IBAN` varchar(30) NOT NULL,
  `code_guichet` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `swift` varchar(20) NOT NULL,
  `cle_rib` int(11) NOT NULL,
  `code_banque` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `INFO_CLIENT`
--

INSERT INTO `INFO_CLIENT` (`id_infoclient`, `Num_de_cmpt`, `IBAN`, `code_guichet`, `iduser`, `swift`, `cle_rib`, `code_banque`) VALUES
(1, 294568921, 'CH9300762024568921', 0, 99030097, 'TUTCHZUXXX\n', 21, 0),
(2, 294568921, 'CH9300762024568921', 0, 99030098, 'TUTCHZUXXX', 21, 0),
(3, 294568921, 'CH9300762024568921', 0, 99030099, 'TUTCHZUXXX', 21, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `INFO_CLIENT`
--
ALTER TABLE `INFO_CLIENT`
  ADD PRIMARY KEY (`id_infoclient`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `INFO_CLIENT`
--
ALTER TABLE `INFO_CLIENT`
  MODIFY `id_infoclient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
