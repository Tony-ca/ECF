-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 21 août 2023 à 02:51
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecf`
--

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

CREATE TABLE `classes` (
  `id_classes` int(11) NOT NULL,
  `nom_classes` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `classes`
--

INSERT INTO `classes` (`id_classes`, `nom_classes`) VALUES
(1, 'Barbare'),
(2, 'Archer'),
(3, 'Druide'),
(4, 'Sorcier'),
(5, 'Necromancien');

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE `competence` (
  `id_competence` int(11) NOT NULL,
  `nom_competence` varchar(256) DEFAULT NULL,
  `descriptif_competence` varchar(256) DEFAULT NULL,
  `type_competence` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `competence`
--

INSERT INTO `competence` (`id_competence`, `nom_competence`, `descriptif_competence`, `type_competence`) VALUES
(1, 'Ecorchement', 'Vous écorchez l\'adversaire ce qui lui inflige 624-762[5%] points de dégâts à l\'impact et 5547[40%] points de dégâts de saignement en 5 s.', 'Basique'),
(2, 'Marteau des Anciens', 'Vous abattez votre marteau avec la fureur des anciens et infligez 25473-31134 [90%] points de dégâts dans une zone précise.', 'Principal'),
(3, 'Cri de ralliement', 'Vous poussez un cri de ralliement ce qui augmente votre vitesse de déplacement de 30% et votre génération de ressources de 56% pendant 7.4s et celles des forces alliées à proximité pendant 3.7s.', 'Defensif'),
(4, 'Perforation', 'Vous lancez des lames à courte distance ce qui inflige 1540-1883[21%] points de dégâts. Toutes les 3 utilisations ralentit les adversaires de 20% pendant 2.28s. les coups critiques ralentissent à coup sûr les adversaires.', 'Basique'),
(5, 'Lames sournoises', 'Vous empalez une cible avec vos lames et infligez 5 800 - 7089 [81 %] points de dégâts. Tant que la cible est empalée vous lui infligez 8 %[x] de dégâts supplémentaires.', 'Principale'),
(6, 'Célérité', 'Vous foncez sur les adversaires et les lacérez en infligeant 2351-2874 [37 %] points de dégâts.', 'Defensif'),
(7, 'Coup de tonnerre', 'De l\'électricité se concentre autour de votre arme et inflige 1757-2148 [20 %] points de dégâts à votre cible puis se propage à un maximum de 3 adversaires à proximité en infligeant 20 % de dégâts en moins à chaque propagation.', 'Basique'),
(8, 'Déchiquetage', 'Vous vous transformez en lycanthrope et foncez sur la cible en effectuant un combo de trois attaques:<br>\n• 1re attaque : Vous infligez 4350-5317[45 %] points de dégâts.<br>\n• 2e attaque : Vous infligez 6090-7444[63%] points de dégâts.', 'Principale'),
(9, 'Hurlement sanglant', 'Vous vous transformez en lycanthrope et hurlez furieusement ce qui vous rend 20% de votre maximum de points de vie (2752).', 'Defensif'),
(10, 'Éclair de feu', 'Vous lancez un éclair enflammé qui inflige 750-916 [11 %] points de dégâts à l\'impact et brûle les adversaires sur la durée en infligeant 3667 [48 %] points de dégâts en 8s.', 'Defensif'),
(11, 'Éclats de glace', 'Vous lancez 5 éclats qui infligent 1845-2255 [25%] points de dégâts chacun. Les éclats infligent 25[x] de dégâts supplémentaires aux cibles gelées.', 'Principale'),
(12, 'Bouclier de feu', 'Vous vous entourez de flammes pendant 2s ce qui brûle les adversaires à proximité en leur infligeant 3031[40%] points de dégâts par seconde.', 'Defensif'),
(13, 'Éclats d\'os', 'Vous lancez 3 éclats d\'os infligeant 337-412[8%] points de dégâts chacun. Chaque cible supplémentaire touchée par la même utilisation d\'Éclat d\'os vous fait gagner 1 point d\'essence.', 'Basique'),
(14, 'Lance d\'os', 'Vous faites jaillir du sol une lance d\'os qui inflige 5015-6130 [119%] points de dégâts et transperce les adversaires.', 'Principal'),
(15, 'Explosion macabre', 'Vous faites exploser un cadavre ce qui inflige 3118-3810 [80 %] points de dégâts aux adversaires à proximité.', 'Defensif');

-- --------------------------------------------------------

--
-- Structure de la table `competence_utiliser`
--

CREATE TABLE `competence_utiliser` (
  `id_competence` int(11) NOT NULL,
  `id_classes` int(11) NOT NULL,
  `ordre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `competence_utiliser`
--

INSERT INTO `competence_utiliser` (`id_competence`, `id_classes`, `ordre`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 1),
(5, 2, 2),
(6, 2, 3),
(7, 3, 1),
(8, 3, 2),
(9, 3, 3),
(10, 4, 1),
(11, 4, 2),
(12, 4, 3),
(13, 5, 1),
(14, 5, 2),
(15, 5, 3);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `pseudo` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `mail` varchar(256) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `pseudo`, `password`, `mail`, `role`) VALUES
(5, 'Snoop Dog', 'abc', 'mrmontana59@hotmail.fr', 1),
(12, 's', 's', 'mrmontana59@hotmail.f', 0),
(13, 'gggg', 'gggg', 'gff', 0),
(14, 'abc', 'abc', 'abc', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id_classes`);

--
-- Index pour la table `competence`
--
ALTER TABLE `competence`
  ADD PRIMARY KEY (`id_competence`);

--
-- Index pour la table `competence_utiliser`
--
ALTER TABLE `competence_utiliser`
  ADD PRIMARY KEY (`id_competence`,`id_classes`),
  ADD KEY `FK_competence_utiliser_id_classes` (`id_classes`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `classes`
--
ALTER TABLE `classes`
  MODIFY `id_classes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `competence`
--
ALTER TABLE `competence`
  MODIFY `id_competence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `competence_utiliser`
--
ALTER TABLE `competence_utiliser`
  MODIFY `id_competence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `competence_utiliser`
--
ALTER TABLE `competence_utiliser`
  ADD CONSTRAINT `FK_competence_utiliser_id_classes` FOREIGN KEY (`id_classes`) REFERENCES `classes` (`id_classes`),
  ADD CONSTRAINT `FK_competence_utiliser_id_competence` FOREIGN KEY (`id_competence`) REFERENCES `competence` (`id_competence`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
