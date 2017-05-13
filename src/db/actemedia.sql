-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Jeu 11 Mai 2017 à 21:03
-- Version du serveur :  5.6.35
-- Version de PHP :  7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `ACTEMEDIA`
--

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
(1, 'FAL', 'NRY', '22', '2017-07-01'),
(2, 'FIF', 'NRY', '2', '2017-05-01'),
(5, 'MAC', 'KHL', '2', '2017-02-01'),
(6, 'FIF', 'GOS', '3', '2017-05-01');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `imputation`
--
ALTER TABLE `imputation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `imputation`
--
ALTER TABLE `imputation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;