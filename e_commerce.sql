-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 23 mai 2022 à 23:50
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `e_commerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `mp` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `nom`, `email`, `mp`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL,
  `createur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `description`, `date_creation`, `date_modification`, `createur`) VALUES
(8, 'test1', 'test', '2022-05-15', '2022-05-16', 1);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mp` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `etat` int(11) NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL,
  `telephone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `email`, `mp`, `nom`, `prenom`, `etat`, `date_creation`, `date_modification`, `telephone`) VALUES
(1, 'ifoulsf@gmail.com', '0709080808', 'ritaj', 'hasna', 1, '0000-00-00', '0000-00-00', '1234'),
(2, 'reda@reda.com', 'reda', 'reda', 'reda', 1, '0000-00-00', '0000-00-00', '0676767575'),
(3, 'reda@reda.com', 'reda', 'reda', 'reda', 1, '0000-00-00', '0000-00-00', '0676767575'),
(4, 'reda@reda.com', 'hind', 'hnd', 'hind', 1, '0000-00-00', '0000-00-00', '0787878787'),
(5, 'reda@reda1.com', '123', 'hiba', 'youssoufi', 1, '0000-00-00', '0000-00-00', '0709080808'),
(6, 'ifoulsf@gmail.com', 'dd', 'ddd', 'dd', 1, '0000-00-00', '0000-00-00', 'ddd'),
(7, 'reda@reda.com', 'hh', 'alami', 'youssoufi', 1, '0000-00-00', '0000-00-00', '0709080808'),
(8, 'ifoulsf@gmail.com', 'gg', 'hu', 'hh', 1, '0000-00-00', '0000-00-00', '0709080808'),
(9, 'reda@reda.com', 'dd', 'haha', 'ahha', 1, '0000-00-00', '0000-00-00', '0709080808'),
(10, 'ifoulsf@gmail.com', 'hh', 'ritaj', 'asmaa', 1, '0000-00-00', '0000-00-00', '0709080808'),
(11, 'ifoulsf@gmail.com', 'h', 'ritaj', 'asmaa', 1, '0000-00-00', '0000-00-00', '0709080808'),
(12, 'ifoulsf@gmail.com', '202cb962ac59075b964b07152d234b70', 'ritaj', 'boutarga', 1, '0000-00-00', '0000-00-00', '0709080808'),
(13, 'hibaa@hiba.com', '0709080808', 'hiba', 'asmaa', 0, '0000-00-00', '0000-00-00', '0709080808'),
(14, 'reda@reda.com', 'ha', 'ritaj', 'ritaj', 0, '0000-00-00', '0000-00-00', '0709080808'),
(15, 'hanaa@gmail.com', '123', 'hanaa', 'hanouna', 1, '0000-00-00', '0000-00-00', '0787878787');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `total` float NOT NULL,
  `panier` int(11) NOT NULL,
  `produit` int(11) NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `quantite`, `total`, `panier`, `produit`, `date_creation`, `date_modification`) VALUES
(21, 3, 36, 13, 22, '2022-05-20', '2022-05-20'),
(23, 6, 72, 15, 22, '2022-05-20', '2022-05-20'),
(24, 2, 240, 16, 23, '2022-05-23', '2022-05-23');

-- --------------------------------------------------------

--
-- Structure de la table `paniers`
--

CREATE TABLE `paniers` (
  `id` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `etat` varchar(50) NOT NULL DEFAULT 'En cours',
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `paniers`
--

INSERT INTO `paniers` (`id`, `client`, `total`, `etat`, `date_creation`, `date_modification`) VALUES
(11, 2, 42, 'En cours', '2022-05-19', '0000-00-00'),
(16, 2, 240, 'En cours', '2022-05-23', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `categorie` int(11) NOT NULL,
  `createur` int(11) NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `description`, `prix`, `image`, `categorie`, `createur`, `date_creation`, `date_modification`) VALUES
(22, 'fn', 'fn', 12, 'Capture.PNG', 8, 1, '2022-05-18', '0000-00-00'),
(23, 'ha', 'haha', 120, 'Capture.PNG', 8, 1, '2022-05-23', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `produit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `createur` int(11) NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `stocks`
--

INSERT INTO `stocks` (`id`, `produit`, `quantite`, `createur`, `date_creation`, `date_modification`) VALUES
(2, 22, 5, 1, '2022-05-18', '0000-00-00'),
(3, 23, 12, 1, '2022-05-23', '0000-00-00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`),
  ADD KEY `createur` (`createur`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produit` (`produit`);

--
-- Index pour la table `paniers`
--
ALTER TABLE `paniers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client` (`client`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorie` (`categorie`),
  ADD KEY `createur` (`createur`);

--
-- Index pour la table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produit` (`produit`),
  ADD KEY `createur` (`createur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `paniers`
--
ALTER TABLE `paniers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`createur`) REFERENCES `administrateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`produit`) REFERENCES `produits` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `paniers`
--
ALTER TABLE `paniers`
  ADD CONSTRAINT `paniers_ibfk_1` FOREIGN KEY (`client`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`categorie`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produits_ibfk_2` FOREIGN KEY (`createur`) REFERENCES `administrateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_ibfk_1` FOREIGN KEY (`produit`) REFERENCES `produits` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stocks_ibfk_2` FOREIGN KEY (`createur`) REFERENCES `administrateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
