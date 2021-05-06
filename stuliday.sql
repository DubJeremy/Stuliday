-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 06 mai 2021 à 09:57
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `stuliday`
--
CREATE DATABASE IF NOT EXISTS `stuliday` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `stuliday`;

-- --------------------------------------------------------

--
-- Structure de la table `biens`
--

DROP TABLE IF EXISTS `biens`;
CREATE TABLE IF NOT EXISTS `biens` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `adresse` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `description` text NOT NULL,
  `author` int(10) NOT NULL,
  `category` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `author` (`author`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `biens`
--

INSERT INTO `biens` (`id`, `adresse`, `price`, `description`, `author`, `category`, `title`) VALUES
(1, '221b Baker Street London', 75, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia eligendi neque dignissimos unde autem cupiditate rem, sequi eveniet doloribus illum debitis natus alias corrupti saepe, qui dolorum consectetur quos except.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia eligendi neque dignissimos unde autem cupiditate rem, sequi eveniet doloribus illum debitis natus alias corrupti saepe, qui dolorum consectetur quos except', 4, 2, '120mÂ² + terrasse + spa de fou'),
(3, '45Â° nebuleuse verte F645 Namek', 2415, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis fuga molestias culpa. Aliquid quisquam omnis eum quos! Atque eveniet sint ullam harum corrupti error eum nisi corporis reprehenderit? Sunt, ex.', 4, 3, 'GÃ®te posÃ© sur Namek'),
(4, 'Rue du feu de la vÃ©ritÃ©e Konoha', 789, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis fuga molestias culpa. Aliquid quisquam omnis eum quos! Atque eveniet sint ullam harum corrupti error eum nisi corporis reprehenderit? Sunt, ex.', 4, 1, 'Apt cosy avec vue sur la montagne des Hokage'),
(6, '124 rue des Conques, Bikini Bottom', 99, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis quaerat incidunt veritatis eaque, quia unde! Eveniet tempora dolorem atque quaerat suscipit quidem nam, reiciendis laudantium libero deleniti illum harum id.', 5, 3, 'ananas de fou a 2 pas du Crabe Croustillant'),
(8, 'Station spatial internationale', 78000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, laudantium recusandae deleniti provident reiciendis similique non ratione quod ipsam quisquam pariatur deserunt voluptates exercitationem saepe? Aliquid dicta consectetur neque laborum.', 5, 4, 'Capsule vu sur l\'espace'),
(14, '76 rue des Braco, Gotham', 5, 'AHAHAHAAHHAAHHAHAAHHAHAHAHAHAHAAHHAHAHAHAHAHAHAHAHAHHA', 5, 1, 'Petit appart Ã  deux pas du comico'),
(15, '55 Rue du Faubourg Saint-HonorÃ©, 75008 Paris', 44567, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore dignissimos quisquam reiciendis voluptatum delectus eum laudantium necessitatibus asperiores quasi quod provident dolore fuga magni, commodi possimus aliquid ipsam et sed?', 7, 4, 'Chambre en face de celle de Manu ');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name_category` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name_category`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name_category`) VALUES
(1, 'Appartement'),
(4, 'Chambre'),
(3, 'Logement insolite'),
(2, 'Maison');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name_role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `name_role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name_role_id` int(10) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `role` (`name_role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `name_role_id`) VALUES
(4, 'jose', 'be@gmail.com', '$2y$10$zoAqAPP4AXnUuxRiiThenuyyCn2J2xibA5V9JBOMskhHHYR84DuaO', 2),
(5, 'Naruto', 'naruto@gmail.com', '$2y$10$x/oUExzLrn5w.ZyNRHUc/u0HlzedfaVxs4ummLa9QGEoSrL26PAjy', 1),
(6, 'Batman', 'dd@gmail.com', '$2y$10$A/ehFpm6Vh7smLbScA6yped0MgkQMqFPzebrxURlt1dzqY0ue3lii', 2),
(7, 'Joker', 'bat@gmail.com', '$2y$10$uIUJ2K23ieZdKmaEIBDnH.F7QroIdC31QYT/D1E.gorLdnpgTdMv2', 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `biens`
--
ALTER TABLE `biens`
  ADD CONSTRAINT `author` FOREIGN KEY (`author`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `role` FOREIGN KEY (`name_role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
