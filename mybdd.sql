-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 22 Novembre 2023 à 13:52
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mybdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `creneaux`
--

CREATE TABLE `creneaux` (
  `id` int(11) NOT NULL,
  `jeu` int(200) NOT NULL,
  `membre` int(200) NOT NULL,
  `game_date` date NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `creneaux`
--

INSERT INTO `creneaux` (`id`, `jeu`, `membre`, `game_date`, `start`, `end`) VALUES
(1, 2, 1, '2023-11-29', '00:00:00', '00:00:00'),
(2, 3, 1, '2023-11-30', '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `historiques`
--

CREATE TABLE `historiques` (
  `id` int(11) NOT NULL,
  `creneau` int(100) NOT NULL,
  `jeu` int(100) NOT NULL,
  `membre` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `jeu`
--

CREATE TABLE `jeu` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `categorie` varchar(200) NOT NULL,
  `regle` varchar(200) NOT NULL,
  `images` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `jeu`
--

INSERT INTO `jeu` (`id`, `nom`, `categorie`, `regle`, `images`) VALUES
(1, 'UNO', 'Soci&eacute;t&eacute;', '[Taille originale] CV crÃ©atif simple modern .pdf', 'MicrosoftTeams-image (4).png'),
(2, 'UNO', 'Soci&eacute;t&eacute;', 'volvo.pdf', 'MicrosoftTeams-image (4).png');

-- --------------------------------------------------------

--
-- Structure de la table `souhaits`
--

CREATE TABLE `souhaits` (
  `id` int(11) NOT NULL,
  `creneau` int(100) NOT NULL,
  `jeu` int(100) NOT NULL,
  `membre` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `statut` varchar(200) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `mdp`, `statut`) VALUES
(1, 'ABALO', 'Yémanlin', 'yemanlin.abalo@gmail.com', 'DFGHJ', '0'),
(2, 'AGBAHOLOU', 'Emmanuel', 'manuagbaholou@gmail.com', 'Amer@2203', '1'),
(3, 'ADJAGBONI', 'Celsin', 'celsin.adjagboni@gmail.com', 'Azerty', '1'),
(33, '', '', '', '', '1'),
(34, '', '', '', '', '1'),
(35, 'rema', 'omo', 'remaoma@gmail.com', 'Iojfdfdf', '1');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `creneaux`
--
ALTER TABLE `creneaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jeu` (`jeu`),
  ADD KEY `membre` (`membre`);

--
-- Index pour la table `historiques`
--
ALTER TABLE `historiques`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creneau` (`creneau`),
  ADD KEY `jeu` (`jeu`),
  ADD KEY `membre` (`membre`);

--
-- Index pour la table `jeu`
--
ALTER TABLE `jeu`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `souhaits`
--
ALTER TABLE `souhaits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creneau` (`creneau`),
  ADD KEY `jeu` (`jeu`),
  ADD KEY `membre` (`membre`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `creneaux`
--
ALTER TABLE `creneaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `historiques`
--
ALTER TABLE `historiques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `jeu`
--
ALTER TABLE `jeu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `souhaits`
--
ALTER TABLE `souhaits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `creneaux`
--
ALTER TABLE `creneaux`
  ADD CONSTRAINT `creneaux_ibfk_1` FOREIGN KEY (`membre`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `historiques`
--
ALTER TABLE `historiques`
  ADD CONSTRAINT `historiques_ibfk_1` FOREIGN KEY (`membre`) REFERENCES `utilisateurs` (`id`),
  ADD CONSTRAINT `historiques_ibfk_3` FOREIGN KEY (`creneau`) REFERENCES `creneaux` (`id`);

--
-- Contraintes pour la table `souhaits`
--
ALTER TABLE `souhaits`
  ADD CONSTRAINT `souhaits_ibfk_1` FOREIGN KEY (`membre`) REFERENCES `utilisateurs` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
