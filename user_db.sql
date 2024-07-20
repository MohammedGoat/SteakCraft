-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 20 avr. 2024 à 01:15
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
-- Base de données : `user_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`id`, `name`, `origin`, `price`, `image`, `quantity`, `user_id`) VALUES
(41, 'Filet Mignon', 'France', '70', 'mign.png', 8, 13),
(42, 'Pizza', 'Italy', '60', 'pizza.png', 4, 13),
(43, 'Sandwich', 'USA', '40', 'san.png', 4, 13),
(44, 'Seffa', 'Morocco', '40', 'seffa.png', 1, 13),
(50, 'Filet Mignon', 'France', '70', 'mign.png', 1, 11),
(51, 'Pizza', 'Italy', '60', 'pizza.png', 1, 11);

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

CREATE TABLE `order` (
  `id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(50) NOT NULL,
  `flat` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `pin_code` int(10) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `order`
--

INSERT INTO `order` (`id`, `name`, `number`, `email`, `method`, `flat`, `street`, `city`, `state`, `country`, `pin_code`, `total_products`, `total_price`) VALUES
(6, 'Mohamed', '1122', 'oussama@gmail.com', 'cash on delivery', 'ain choq', 'maarif', 'Casablanca', 'Grand Casablanca', 'Maroc', 121212, 'Filet Mignon (8), Pizza (4), Sandwich (4), Seffa (1)', '1000'),
(7, 'Mohamed', '1122', 'oussama@gmail.com', 'cash on delivery', 'ain choq', 'maarif', 'Casablanca', 'Grand Casablanca', 'Maroc', 121212, 'Filet Mignon (8), Pizza (4), Sandwich (4), Seffa (1)', '1000'),
(8, 'Test', '12453698741', 'oussama@gmail.com', 'cash on delivery', 'ain choq', 'maarif', 'Casablanca', 'Grand Casablanca', 'Maroc', 121212, 'Pizza (3), Sandwich (1), Seffa (1), Filet Mignon (1), Tajine (1)', '450'),
(9, 'Mohamed', '12345678', 'oussama@gmail.com', 'cash on delivery', 'ain choq', 'maarif', 'Casablanca', 'Grand Casablanca', 'Maroc', 121212, 'Pizza (3), Sandwich (2), Seffa (1), Filet Mignon (1), Tajine (1)', '490'),
(10, 'youness', '444444444444', 'oussama@gmail.com', 'cash on delivery', 'ain choq', 'maarif', 'Casablanca', 'Grand Casablanca', 'Maroc', 121212, 'Sandwich (1), Seffa (2), Filet Mignon (1), Tajine (3)', '550'),
(11, 'Mohamed', '12345678', 'oussama@gmail.com', 'cash on delivery', 'ain choq', 'maarif', 'Casablanca', 'Grand Casablanca', 'Maroc', 121212, 'Sandwich (4), Seffa (2), Filet Mignon (1), Tajine (3)', '790');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `origin`, `price`, `image`) VALUES
(52, 'Sandwich', 'USA', 70, 'san.png'),
(53, 'Pizza', 'Italy', 60, 'pizza.png'),
(54, 'Filet Mignon', 'France', 70, 'mign.png'),
(55, 'Ribeye', 'USA', 80, 'Ribeye.png'),
(56, 'Tajine', 'Morocco', 120, 'tajine.png'),
(60, 'Seffa', 'Morocco', 40, 'seffa.png'),
(65, 'Burger', 'USA', 100, 'burger.png'),
(67, 'mar9a', 'Morocco', 44, 'tajine.png');

-- --------------------------------------------------------

--
-- Structure de la table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(11, 'mohammed', 'slimo@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'admin'),
(12, 'youness', 'hello@gmail.com', 'd54d1702ad0f8326224b817c796763c9', 'user'),
(13, 'hello', 'hello7@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'user'),
(14, 'ouss', 'oussama@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'admin'),
(15, 'houda', 'mrhmd777@gmail.com', 'ed2b1f468c5f915f3f1cf75d7068baae', 'admin'),
(16, 'da3do3', 'hello8@gmail.com', 'd54d1702ad0f8326224b817c796763c9', 'admin'),
(17, 'YOUNESS', 'youness@gmail.com', 'd54d1702ad0f8326224b817c796763c9', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT pour la table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT pour la table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
