-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mer. 02 jan. 2019 à 01:20
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `codingchallenge`
--

-- --------------------------------------------------------

--
-- Structure de la table `shops`
--

CREATE TABLE `shops` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `prefered` tinyint(1) NOT NULL,
  `distance` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `shops`
--

INSERT INTO `shops` (`id`, `name`, `prefered`, `distance`) VALUES
(1, 'SHOP1', 0, 2),
(2, 'SHOP2', 0, 5),
(3, 'SHOP3', 0, 6),
(4, 'SHOP4', 0, 10),
(5, 'SHOP5', 0, 20),
(6, 'SHOP6', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(5, 'adam@live.fr', '1d7c2923c1684726dc23d2901c4d8157');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;