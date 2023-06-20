-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 15 mai 2023 à 05:11
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
-- Base de données : `tut1b2046160_1hzb1p`
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

-- --------------------------------------------------------

--
-- Structure de la table `Operations`
--

CREATE TABLE `Operations` (
  `iduser` int(11) NOT NULL,
  `dateopera` date NOT NULL,
  `description` varchar(30) NOT NULL,
  `montant` decimal(62,2) NOT NULL,
  `statut` varchar(10) NOT NULL,
  `idoperation` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Operations`
--

INSERT INTO `Operations` (`iduser`, `dateopera`, `description`, `montant`, `statut`, `idoperation`) VALUES
(99030097, '2023-03-01', 'Virement TUT1BANK', 10846000.00, 'Accepté', 1),
(99030097, '2023-03-02', 'Virement Valérie SCHWARTZ', -10846000.00, 'Bloqué', 2),
(99030097, '2023-03-03', 'Virement Valérie SCHWARTZ', -10846000.00, 'Bloqué', 3),
(99030097, '2023-03-03', 'Virement Valérie SCHWARTZ', -10846000.00, 'Bloqué', 4),
(99030098, '2017-10-28', 'Virement TUT1BANK', 2846000.00, 'Accepté', 5),
(99030098, '2023-03-07', 'Virement Selim DEMIROZ', -2846000.00, 'Rejeté', 6),
(99030099, '2023-05-01', 'Dépôt initial', 280.00, 'Actif !', 8);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL,
  `Soldey` decimal(65,2) NOT NULL,
  `num_compte_epagne` int(11) NOT NULL,
  `montant_cmpt_epargne` float(65,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `username`, `password`, `Soldey`, `num_compte_epagne`, `montant_cmpt_epargne`) VALUES
(99030097, 'Mlle Valérie SCHWARTZ', '011985', 10846000.00, 90023403, 0.00),
(99030098, 'M. Selim DEMIROZ - Mme Ferial BENCHIKH', '011986', 2846000.00, 90023403, 0.00),
(99030099, 'Mme Francette RENAUD', '011987', 280.00, 90023403, 0.00);

-- --------------------------------------------------------

--
-- Structure de la table `VIRM`
--

CREATE TABLE `VIRM` (
  `vir_id` int(11) NOT NULL,
  `nom_benef` varchar(30) NOT NULL,
  `ibanbenef` varchar(40) NOT NULL,
  `pays` varchar(30) NOT NULL,
  `codebic` varchar(30) NOT NULL,
  `montant` decimal(65,2) NOT NULL,
  `motif` varchar(50) NOT NULL,
  `refvir` varchar(40) NOT NULL,
  `statutvir` varchar(225) NOT NULL,
  `date_vir` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `VIRM`
--

INSERT INTO `VIRM` (`vir_id`, `nom_benef`, `ibanbenef`, `pays`, `codebic`, `montant`, `motif`, `refvir`, `statutvir`, `date_vir`) VALUES
(747474758, 'HONORAIRES', 'FR41 2004 1000 0141 2759 7Z02 096', 'France', 'CRLYFRPP', 14600.00, 'Honoraires ', '22511799786556', 'Bloqu&eacute; !', '2022-08-21 14:00:21');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `INFO_CLIENT`
--
ALTER TABLE `INFO_CLIENT`
  ADD PRIMARY KEY (`id_infoclient`);

--
-- Index pour la table `Operations`
--
ALTER TABLE `Operations`
  ADD PRIMARY KEY (`idoperation`);

--
-- Index pour la table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Index pour la table `VIRM`
--
ALTER TABLE `VIRM`
  ADD PRIMARY KEY (`vir_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `INFO_CLIENT`
--
ALTER TABLE `INFO_CLIENT`
  MODIFY `id_infoclient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `Operations`
--
ALTER TABLE `Operations`
  MODIFY `idoperation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `VIRM`
--
ALTER TABLE `VIRM`
  MODIFY `vir_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=747474761;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
