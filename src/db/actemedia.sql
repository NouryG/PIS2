-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Ven 21 Avril 2017 à 19:22
-- Version du serveur :  5.6.35
-- Version de PHP :  7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `ACTEMEDIA`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'Jobs', 'Steve', 'SJO', 'APL', 1500, 1),
(2, 'Zidane', 'Zinedine', 'ZZZ', 'RMA', 1500, 0);

-- --------------------------------------------------------

--
-- Structure de la table `imputation`
--

CREATE TABLE `imputation` (
  `id` int(11) NOT NULL,
  `code_projet` varchar(255) NOT NULL,
  `code_collab` varchar(255) NOT NULL,
  `jours` varchar(255) NOT NULL,
  `valeur` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `imputation`
--

INSERT INTO `imputation` (`id`, `code_projet`, `code_collab`, `jours`, `valeur`) VALUES
(1, 'MAC', 'SJO', '15', '0000-00-00'),
(2, 'FAL', 'ZZZ', '2', '0000-00-00');

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
(1, 'Fallout', 'FAL', 'Bethesda', '2017-03-29', 25, 0, 0, 0, 0),
(2, 'Macbook', 'MAC', 'Apple', '2017-03-30', 25, 0, 0, 0, 12);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `collaborateurs`
--
ALTER TABLE `collaborateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `imputation`
--
ALTER TABLE `imputation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;