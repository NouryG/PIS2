

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
  `societe` varchar(3) NOT NULL,
  `TJ` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `code` varchar(3) NOT NULL,
  `id_client` varchar(255) NOT NULL,
  `date_debut` date NOT NULL,
  `jours_vendus` int(11) NOT NULL,
  `jours_produits` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Contenu de la table `projet`
--

INSERT INTO `projet` (`id`, `nom`, `code`, `client`, `date_debut`, `jours_vendus`, `jours_produits`) VALUES
(1, 'Projet 1', 'TQ1', 'Client A', '2017-03-18', 88, 0),
(2, 'Projet 2', 'REV', 'Client A', '2017-03-18', 0, 0),
(3, 'Projet 3', 'REC', 'Client B', '2017-03-18', 0, 0);

-- Structure de la table `imputation`
--

CREATE TABLE `imputation` (
  `id` int(11) NOT NULL,
  `code_projet` varchar(255) NOT NULL,
  `code_collab` varchar(255) NOT NULL,
  `jours` varchar(255) NOT NULL,
  `valeur` date NOT NULL DEFAULT,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,

) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Index pour les tables exportées
--

--
-- Index pour la table `collaborateurs`
--
ALTER TABLE `collaborateurs`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
