-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Sam 27 Mai 2017 à 12:32
-- Version du serveur :  5.6.35
-- Version de PHP :  7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `ACTEMEDIA`
--

-- --------------------------------------------------------

--
-- Structure de la table `collaborateurs`
--

CREATE TABLE `collaborateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `code` varchar(3) NOT NULL,
  `societe` varchar(3) NOT NULL,
  `TJ` int(11) NOT NULL DEFAULT '0',
  `actif` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `collaborateurs`
--

INSERT INTO `collaborateurs` (`id`, `nom`, `prenom`, `code`, `societe`, `TJ`, `actif`) VALUES
(1, 'Noury', 'Ghali', 'NRY', 'AMA', 500, 1),
(2, 'Moulin', 'David', 'MOU', 'CAP', 700, 1),
(3, 'Garrin', 'Pierre', 'GAR', 'AMA', 450, 1),
(4, 'Charissou', 'Romain', 'CHR', 'IBM', 500, 1),
(5, 'Gosset', 'Cedric', 'GOS', 'AMA', 300, 1);

-- --------------------------------------------------------

--
-- Structure de la table `imputation`
--

CREATE TABLE `imputation` (
  `id` int(11) NOT NULL,
  `code_projet` varchar(255) NOT NULL,
  `code_collab` varchar(255) NOT NULL,
  `jours` varchar(255) NOT NULL,
  `date_imput` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `imputation`
--

INSERT INTO `imputation` (`id`, `code_projet`, `code_collab`, `jours`, `date_imput`) VALUES
(1, 'FIF', 'NRY', '10', '2017-05-01'),
(2, 'FIF', 'MOU', '0', '2017-05-01'),
(3, 'FIF', 'GAR', '0', '2017-05-01'),
(4, 'FIF', 'CHR', '15', '2017-05-01'),
(5, 'FIF', 'GOS', '5', '2017-05-01'),
(6, 'GTA', 'NRY', '0', '2017-05-01'),
(7, 'GTA', 'MOU', '5', '2017-05-01'),
(8, 'GTA', 'GAR', '10', '2017-05-01'),
(9, 'GTA', 'CHR', '5', '2017-05-01'),
(10, 'GTA', 'GOS', '0', '2017-05-01'),
(11, 'FIF', 'NRY', '15', '2017-06-01'),
(12, 'GTA', 'NRY', '0', '2017-06-01'),
(13, 'FIF', 'GOS', '5', '2017-06-01'),
(14, 'GTA', 'GOS', '0', '2017-06-01'),
(15, 'FIF', 'CHR', '10', '2017-06-01'),
(16, 'GTA', 'CHR', '5', '2017-06-01'),
(17, 'GTA', 'MOU', '10', '2017-06-01'),
(18, 'FIF', 'MOU', '0', '2017-06-01'),
(19, 'GTA', 'GAR', '15', '2017-06-01'),
(20, 'FIF', 'GAR', '0', '2017-06-01');

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `code` varchar(3) NOT NULL,
  `client` varchar(255) NOT NULL,
  `date_debut` date NOT NULL,
  `jours_vendus` int(11) NOT NULL,
  `jours_produits` int(11) DEFAULT '0',
  `CA_vendu` float DEFAULT '0',
  `cout_projet` float DEFAULT '0',
  `RAF_reel` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `projet`
--

INSERT INTO `projet` (`id`, `nom`, `code`, `client`, `date_debut`, `jours_vendus`, `jours_produits`, `CA_vendu`, `cout_projet`, `RAF_reel`) VALUES
(1, 'FIFA', 'FIF', 'EASPORTS', '2017-05-25', 100, 0, 50000, 0, 0),
(2, 'Grand Theft Auto', 'GTA', 'ROCKSTAR', '2017-05-27', 150, 0, 80000, 0, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `collaborateurs`
--
ALTER TABLE `collaborateurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `imputation`
--
ALTER TABLE `imputation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `collaborateurs`
--
ALTER TABLE `collaborateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `imputation`
--
ALTER TABLE `imputation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;