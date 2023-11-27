-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 28 Novembre 2023 à 00:19
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
  `game_date` date NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `creneaux`
--

INSERT INTO `creneaux` (`id`, `jeu`, `game_date`, `start`, `end`) VALUES
(1, 4, '2023-11-29', '14:00:00', '15:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `id` int(200) NOT NULL,
  `images` varchar(250) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `categorie` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `images` varchar(50) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `categorie` varchar(200) NOT NULL,
  `regle` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `jeu`
--

INSERT INTO `jeu` (`id`, `images`, `nom`, `categorie`, `regle`) VALUES
(4, 'MicrosoftTeams-image (4).png', 'Scrabble', 'SociÃ©tÃ©', 'volvo.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `souhaits`
--

CREATE TABLE `souhaits` (
  `id` int(11) NOT NULL,
  `images` varchar(250) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `catégorie` varchar(250) NOT NULL,
  `id_creneau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(200) NOT NULL,
  `statut` varchar(200) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `mdp`, `statut`) VALUES
(4, 'Calais', 'Marie Lynne', 'calais@gmail.com', '$2y$10$2zZZ8iugHaDOU4moP0cMBefPZay/c9P8B4AEqW1HfZJv56rsKLuS.', '0'),
(5, 'Alais', 'Sani', 'balais@gmail.com', '$2y$10$xKPLIDHsOTAJOr3Z9peRFOmqBTRGcVDDm5GhuvwHA1IPjNt6vfE0K', '0'),
(6, 'AGBAHOLOU', 'Emmanuel', 'manuagbaholou@gmail.com', '$2y$10$qdsmEZvnoOQ9KGbo9l8pEO6JKRECp7AV6LjUAXza3O8CO4RsHQX96', '1'),
(7, 'AGBAHOLOU', 'Murielle', 'marilynne@gmail.com', '$2y$10$YpS730K.RXLQjT/GYqZsl.W6A0kvZu1lxbuCyhuFDkh9OvqCzUuTS', '0'),
(8, 'ADJAGBONI', 'Celsin', 'celsin.adjagboni@gmail.com', '$2y$10$5Z5Q7eiC6NjMaoWk/3J7zu5lH046UC1J7WjxTflKhq/y4oZyp875G', '1');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `creneaux`
--
ALTER TABLE `creneaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jeu` (`jeu`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `id_creneau` (`id_creneau`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `historiques`
--
ALTER TABLE `historiques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `jeu`
--
ALTER TABLE `jeu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `souhaits`
--
ALTER TABLE `souhaits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `creneaux`
--
ALTER TABLE `creneaux`
  ADD CONSTRAINT `creneaux_ibfk_1` FOREIGN KEY (`jeu`) REFERENCES `jeu` (`id`);

--
-- Contraintes pour la table `historiques`
--
ALTER TABLE `historiques`
  ADD CONSTRAINT `historiques_ibfk_1` FOREIGN KEY (`membre`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `souhaits`
--
ALTER TABLE `souhaits`
  ADD CONSTRAINT `souhaits_ibfk_1` FOREIGN KEY (`id_creneau`) REFERENCES `creneaux` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
