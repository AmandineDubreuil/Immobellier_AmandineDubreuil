-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 29 mars 2023 à 13:28
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `immobellier`
--
CREATE DATABASE IF NOT EXISTS `immobellier` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `immobellier`;

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `id_annonce` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `price` int(8) NOT NULL,
  `surface` int(5) NOT NULL,
  `room` int(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`id_annonce`, `title`, `description`, `image`, `type`, `price`, `surface`, `room`, `user_id`, `created_at`, `modified_at`) VALUES
(3, 'maison 5 pièces 230 m²', 'Maison de campagne - environnement calme - vue dominante. Découvrez cette maison de campagne pleine de charme et d’authenticité !\r\nEXTÉRIEUR :\r\nParc clos de 7000m2\r\nVue dominante\r\nParking\r\nChênes truffiers\r\nSans vis à vie\r\nINTÉRIEUR :\r\nSurface habitable 230 m2 environ\r\nGrandes pièces à vivre avec cheminée centrale\r\nCuisine ouverte et équipée\r\nSalle de bain et wc séparés\r\n5 chambres (2 au RDC + 3 à l’étage)\r\nDressing\r\nCellier\r\nMezzanines\r\nDÉPENDANCES :\r\nGrange en pierres\r\nDépendance à rénover\r\nÀ noter :\r\nMaison raccordée à l’eau de puit\r\nAssainissement individuel\r\nTerrain piscinable\r\nAucune nuisance sonore\r\nTaxe foncière 755€\r\nVISITE VIRTUELLE DISPONIBLE SUR DEMANDECe bien vous est présenté par Michel Berron et Marine Donis, vos conseillers indépendants Dr House Immo, joignables par téléphone au , ou par email .', './uploads/demeure.jpg', 'Vente', 260000, 230, 0, 1, '2023-03-29 13:23:17', '2023-03-29 13:26:51');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(150) NOT NULL,
  `town` varchar(100) NOT NULL,
  `postal_code` int(5) NOT NULL,
  `phone` int(10) NOT NULL,
  `role` varchar(30) NOT NULL DEFAULT 'user',
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `first_name`, `last_name`, `email`, `password`, `address`, `town`, `postal_code`, `phone`, `role`, `created_at`, `modified_at`) VALUES
(1, 'Amandine', 'Dubreuil', 'amandine.dubreuil@hotmail.com', '$2y$10$N0My2iGreHYM5romWbKiQONO2RmSGbNzygjHnscHjhkRKmuoMTF0G', '12 rue beaulieu', 'rouen', 76000, 607080910, 'admin', '2023-03-29 10:08:15', '2023-03-29 10:08:15'),
(2, 'Martine', 'Martin', 'martin.martine@hotmail.com', '$2y$10$JjcLJIPe9RDg0aW4EbOo0eX6X3Ug7pJIW6Uw8T8LdF3xM7VeMSk8K', '12 rue beaulieu', 'rouen', 76000, 607080910, 'user', '2023-03-29 10:11:07', '2023-03-29 10:11:07');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id_annonce`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id_annonce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD CONSTRAINT `annonces_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
