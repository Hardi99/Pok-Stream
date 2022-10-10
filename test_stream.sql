-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 03 avr. 2021 à 22:28
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `test stream`
--

-- --------------------------------------------------------

--
-- Structure de la table `episodes`
--

CREATE TABLE `episodes` (
  `id` int(25) NOT NULL,
  `name` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `episodes`
--

INSERT INTO `episodes` (`id`, `name`, `video`) VALUES
(1, 'Episode 129', 'Episode 129.mp4'),
(2, 'Episode 130', 'Episode 130.mp4'),
(3, 'Episode 131', 'Episode 131.mp4'),
(4, 'Episode 132', 'Episode 132.mp4'),
(5, 'Episode 133', 'Episode 133.mp4'),
(6, 'Episode 134', 'Episode 134.mp4'),
(7, 'Episode 135', 'Episode 135.mp4'),
(8, 'Episode 136', 'Episode 136.mp4'),
(9, 'Episode 137', 'Episode 137.mp4'),
(10, 'Episode 138', 'Episode 138.mp4'),
(11, 'Episode 139', 'Episode 139.mp4'),
(12, 'Episode 140', 'Episode 140.mp4'),
(13, 'Episode 141', 'Episode 141.mp4'),
(14, 'Episode 142', 'Episode 142.mp4'),
(15, 'Episode 143', 'Episode 143.mp4'),
(16, 'Episode 144', 'Episode 144.mp4'),
(17, 'Episode 145', 'Episode 145.mp4'),
(18, 'Episode 146', 'Episode 146.mp4');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
