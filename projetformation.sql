-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 07 Septembre 2017 à 16:58
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetformation`
--

-- --------------------------------------------------------

--
-- Structure de la table `autisms`
--

CREATE TABLE `autisms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL,
  `definition` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `departements`
--

CREATE TABLE `departements` (
  `id` int(10) UNSIGNED NOT NULL,
  `number` varchar(3) NOT NULL,
  `name` varchar(64) NOT NULL,
  `region` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Contenu de la table `departements`
--

INSERT INTO `departements` (`id`, `number`, `name`, `region`) VALUES
(1, '59', 'Nord', 'Hauts-de-France'),
(2, '62', 'Pas-de-Calais', 'Hauts-de-France'),
(3, '02', 'Aisne', 'Hauts-de-France');

-- --------------------------------------------------------

--
-- Structure de la table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tel` varchar(9) NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `site` varchar(255) DEFAULT NULL,
  `id_departement` int(10) UNSIGNED NOT NULL,
  `average` decimal(3,2) NOT NULL DEFAULT '0.00',
  `id_doctor_category` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `doctors`
--

INSERT INTO `doctors` (`id`, `firstname`, `lastname`, `address`, `tel`, `email`, `site`, `id_departement`, `average`, `id_doctor_category`) VALUES
(6, 'Toto', 'Pingouin', '15 rue de la Clémentine 62487 Arras', '645789513', 'toto.pingouin@gmail.com', NULL, 2, '2.58', 1),
(7, 'Denis', 'Forage', '154 rue de la République 59456 Lille', '684751352', 'denis@forage.outlook.fr', NULL, 1, '4.56', 3),
(8, 'Jason', 'Colynaire', '25 rue de Père Noël 59153 Lille', '748561237', 'jason.colynaire@gmail.com', NULL, 1, '3.24', 2);

-- --------------------------------------------------------

--
-- Structure de la table `doctors_autisms`
--

CREATE TABLE `doctors_autisms` (
  `id_autism` int(10) UNSIGNED NOT NULL,
  `id_doctor` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `doctor_categories`
--

CREATE TABLE `doctor_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `doctor_categories`
--

INSERT INTO `doctor_categories` (`id`, `name`, `description`) VALUES
(1, 'psychologue', 'Je veux bien avoir sa vie, si il arrive à supporter les problèmes des autres.'),
(2, 'generaliste', 'Ou autrement dit, un flemmard.'),
(3, 'dentiste', 'Le rapport avec l\'autisme ? No idea, sorry.');

-- --------------------------------------------------------

--
-- Structure de la table `doctor_notes`
--

CREATE TABLE `doctor_notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `average` decimal(3,2) NOT NULL,
  `sub_notes` text NOT NULL,
  `id_doctor` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED DEFAULT NULL,
  `post_date` datetime NOT NULL,
  `title_comment` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `nb_likes` int(10) UNSIGNED NOT NULL,
  `nb_dislikes` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `institutions`
--

CREATE TABLE `institutions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tel` varchar(9) NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `site` varchar(255) DEFAULT NULL,
  `id_departement` int(10) UNSIGNED NOT NULL,
  `photos` text,
  `average` decimal(3,2) NOT NULL DEFAULT '0.00',
  `type_institution` enum('École','Établissement spécialisé') NOT NULL,
  `id_institution_category` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `institution_categories`
--

CREATE TABLE `institution_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `institution_notes`
--

CREATE TABLE `institution_notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `average` decimal(3,2) NOT NULL,
  `sub_notes` text NOT NULL,
  `id_institution` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED DEFAULT NULL,
  `post_date` datetime NOT NULL,
  `title_comment` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `nb_likes` int(10) UNSIGNED NOT NULL,
  `nb_dislikes` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` text NOT NULL,
  `birthday` date NOT NULL,
  `id_departement` int(10) UNSIGNED DEFAULT NULL,
  `roles` enum('user','moderator','administrator') NOT NULL,
  `situations` varchar(255) DEFAULT NULL,
  `id_autism` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `autisms`
--
ALTER TABLE `autisms`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `departements`
--
ALTER TABLE `departements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_departement` (`id_departement`),
  ADD KEY `id_doctor_category` (`id_doctor_category`);

--
-- Index pour la table `doctors_autisms`
--
ALTER TABLE `doctors_autisms`
  ADD PRIMARY KEY (`id_autism`,`id_doctor`),
  ADD KEY `id_doctor` (`id_doctor`);

--
-- Index pour la table `doctor_categories`
--
ALTER TABLE `doctor_categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctor_notes`
--
ALTER TABLE `doctor_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_doctor` (`id_doctor`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `institutions`
--
ALTER TABLE `institutions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_departement` (`id_departement`),
  ADD KEY `id_institution_category` (`id_institution_category`);

--
-- Index pour la table `institution_categories`
--
ALTER TABLE `institution_categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `institution_notes`
--
ALTER TABLE `institution_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_institution` (`id_institution`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_departement` (`id_departement`),
  ADD KEY `id_autism` (`id_autism`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `autisms`
--
ALTER TABLE `autisms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `departements`
--
ALTER TABLE `departements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `doctor_categories`
--
ALTER TABLE `doctor_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `doctor_notes`
--
ALTER TABLE `doctor_notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `institutions`
--
ALTER TABLE `institutions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `institution_categories`
--
ALTER TABLE `institution_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `institution_notes`
--
ALTER TABLE `institution_notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`id_departement`) REFERENCES `departements` (`id`),
  ADD CONSTRAINT `doctors_ibfk_2` FOREIGN KEY (`id_doctor_category`) REFERENCES `doctor_categories` (`id`);

--
-- Contraintes pour la table `doctors_autisms`
--
ALTER TABLE `doctors_autisms`
  ADD CONSTRAINT `doctors_autisms_ibfk_1` FOREIGN KEY (`id_autism`) REFERENCES `autisms` (`id`),
  ADD CONSTRAINT `doctors_autisms_ibfk_2` FOREIGN KEY (`id_doctor`) REFERENCES `doctors` (`id`);

--
-- Contraintes pour la table `doctor_notes`
--
ALTER TABLE `doctor_notes`
  ADD CONSTRAINT `doctor_notes_ibfk_1` FOREIGN KEY (`id_doctor`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `doctor_notes_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `institutions`
--
ALTER TABLE `institutions`
  ADD CONSTRAINT `institutions_ibfk_1` FOREIGN KEY (`id_departement`) REFERENCES `departements` (`id`),
  ADD CONSTRAINT `institutions_ibfk_2` FOREIGN KEY (`id_institution_category`) REFERENCES `institution_categories` (`id`);

--
-- Contraintes pour la table `institution_notes`
--
ALTER TABLE `institution_notes`
  ADD CONSTRAINT `institution_notes_ibfk_1` FOREIGN KEY (`id_institution`) REFERENCES `institutions` (`id`),
  ADD CONSTRAINT `institution_notes_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_departement`) REFERENCES `departements` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_autism`) REFERENCES `autisms` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;