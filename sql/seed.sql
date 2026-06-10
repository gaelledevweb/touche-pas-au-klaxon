-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 10 juin 2026 à 11:58
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `touche_pas_au_klaxon`
--

-- --------------------------------------------------------

--
-- Structure de la table `agencies`
--

CREATE TABLE `agencies` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `agencies`
--

INSERT INTO `agencies` (`id`, `nom`) VALUES
(9, 'Bordeaux'),
(10, 'Lille'),
(2, 'Lyon'),
(3, 'Marseille'),
(8, 'Montpellier'),
(6, 'Nantes'),
(5, 'Nice'),
(1, 'Paris'),
(12, 'Reims'),
(11, 'Rennes'),
(7, 'Strasbourg'),
(4, 'Toulouse');

-- --------------------------------------------------------

--
-- Structure de la table `trips`
--

CREATE TABLE `trips` (
  `id` int(11) NOT NULL,
  `agence_depart_id` int(11) NOT NULL,
  `agence_arrivee_id` int(11) NOT NULL,
  `date_heure_depart` datetime NOT NULL,
  `date_heure_arrivee` datetime NOT NULL,
  `places_totales` int(11) NOT NULL,
  `places_disponibles` int(11) NOT NULL,
  `auteur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `trips`
--

INSERT INTO `trips` (`id`, `agence_depart_id`, `agence_arrivee_id`, `date_heure_depart`, `date_heure_arrivee`, `places_totales`, `places_disponibles`, `auteur_id`) VALUES
(1, 1, 2, '2026-07-10 08:00:00', '2026-07-10 10:15:00', 4, 3, 2),
(2, 2, 3, '2026-07-12 14:00:00', '2026-07-12 15:45:00', 3, 3, 3),
(3, 4, 1, '2026-07-15 07:30:00', '2026-07-15 12:00:00', 2, 1, 4),
(4, 6, 1, '2026-07-20 09:00:00', '2026-07-20 11:30:00', 4, 4, 5);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'employe'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `telephone`, `email`, `password`, `role`) VALUES
(1, 'Martin', 'Alexandre', '0612345678', 'alexandre.martin@email.fr', 'password123', 'admin'),
(2, 'Dubois', 'Sophie', '0698765432', 'sophie.dubois@email.fr', 'password123', 'employe'),
(3, 'Bernard', 'Julien', '0622446688', 'julien.bernard@email.fr', '$2y$10$e0MYzXy6v/H6gLpLpLpLpO3X2Y6B6Q7Z8W9v.XYZ1234567890aaa', 'employe'),
(4, 'Moreau', 'Camille', '0611223344', 'camille.moreau@email.fr', '$2y$10$e0MYzXy6v/H6gLpLpLpLpO3X2Y6B6Q7Z8W9v.XYZ1234567890aaa', 'employe'),
(5, 'Lefèvre', 'Lucie', '0777889900', 'lucie.lefevre@email.fr', '$2y$10$e0MYzXy6v/H6gLpLpLpLpO3X2Y6B6Q7Z8W9v.XYZ1234567890aaa', 'employe'),
(6, 'Leroy', 'Thomas', '0655443322', 'thomas.leroy@email.fr', '$2y$10$e0MYzXy6v/H6gLpLpLpLpO3X2Y6B6Q7Z8W9v.XYZ1234567890aaa', 'employe'),
(7, 'Roux', 'Chloé', '0633221199', 'chloe.roux@email.fr', '$2y$10$e0MYzXy6v/H6gLpLpLpLpO3X2Y6B6Q7Z8W9v.XYZ1234567890aaa', 'employe'),
(8, 'Petit', 'Maxime', '0766778899', 'maxime.petit@email.fr', '$2y$10$e0MYzXy6v/H6gLpLpLpLpO3X2Y6B6Q7Z8W9v.XYZ1234567890aaa', 'employe'),
(9, 'Garnier', 'Laura', '0688776655', 'laura.garnier@email.fr', '$2y$10$e0MYzXy6v/H6gLpLpLpLpO3X2Y6B6Q7Z8W9v.XYZ1234567890aaa', 'employe'),
(10, 'Dupuis', 'Antoine', '0744556677', 'antoine.dupuis@email.fr', '$2y$10$e0MYzXy6v/H6gLpLpLpLpO3X2Y6B6Q7Z8W9v.XYZ1234567890aaa', 'employe'),
(11, 'Lefebvre', 'Emma', '0699887766', 'emma.lefebvre@email.fr', '$2y$10$e0MYzXy6v/H6gLpLpLpLpO3X2Y6B6Q7Z8W9v.XYZ1234567890aaa', 'employe'),
(12, 'Fontaine', 'Louis', '0655667788', 'louis.fontaine@email.fr', '$2y$10$e0MYzXy6v/H6gLpLpLpLpO3X2Y6B6Q7Z8W9v.XYZ1234567890aaa', 'employe'),
(13, 'Chevalier', 'Clara', '0788990011', 'clara.chevalier@email.fr', '$2y$10$e0MYzXy6v/H6gLpLpLpLpO3X2Y6B6Q7Z8W9v.XYZ1234567890aaa', 'employe'),
(14, 'Robin', 'Nicolas', '0644332211', 'nicolas.robin@email.fr', '$2y$10$e0MYzXy6v/H6gLpLpLpLpO3X2Y6B6Q7Z8W9v.XYZ1234567890aaa', 'employe'),
(15, 'Gauthier', 'Marine', '0677889922', 'marine.gauthier@email.fr', '$2y$10$e0MYzXy6v/H6gLpLpLpLpO3X2Y6B6Q7Z8W9v.XYZ1234567890aaa', 'employe'),
(16, 'Fournier', 'Pierre', '0722334455', 'pierre.fournier@email.fr', '$2y$10$e0MYzXy6v/H6gLpLpLpLpO3X2Y6B6Q7Z8W9v.XYZ1234567890aaa', 'employe'),
(17, 'Girard', 'Sarah', '0688665544', 'sarah.girard@email.fr', '$2y$10$e0MYzXy6v/H6gLpLpLpLpO3X2Y6B6Q7Z8W9v.XYZ1234567890aaa', 'employe'),
(18, 'Lambert', 'Hugo', '0611223366', 'hugo.lambert@email.fr', '$2y$10$e0MYzXy6v/H6gLpLpLpLpO3X2Y6B6Q7Z8W9v.XYZ1234567890aaa', 'employe'),
(19, 'Masson', 'Julie', '0733445566', 'julie.masson@email.fr', '$2y$10$e0MYzXy6v/H6gLpLpLpLpO3X2Y6B6Q7Z8W9v.XYZ1234567890aaa', 'employe'),
(20, 'Henry', 'Arthur', '0666554433', 'arthur.henry@email.fr', '$2y$10$e0MYzXy6v/H6gLpLpLpLpO3X2Y6B6Q7Z8W9v.XYZ1234567890aaa', 'employe');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_trip_agence_depart` (`agence_depart_id`),
  ADD KEY `fk_trip_agence_arrivee` (`agence_arrivee_id`),
  ADD KEY `fk_trip_auteur` (`auteur_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `fk_trip_agence_arrivee` FOREIGN KEY (`agence_arrivee_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_trip_agence_depart` FOREIGN KEY (`agence_depart_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_trip_auteur` FOREIGN KEY (`auteur_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
