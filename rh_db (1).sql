-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 17 jan. 2023 à 14:01
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rh_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `employes`
--

CREATE TABLE `employes` (
  `id_employe` bigint(20) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `genre` varchar(255) NOT NULL,
  `lieu_naissance` varchar(255) NOT NULL,
  `diplome` varchar(255) NOT NULL,
  `id_etablissement` bigint(20) NOT NULL,
  `id_responsable` bigint(20) NOT NULL,
  `id_poste` bigint(20) NOT NULL,
  `salaire` bigint(20) NOT NULL,
  `date_embauche` date NOT NULL,
  `num_tel` varchar(255) NOT NULL,
  `adresse_mail` varchar(255) NOT NULL,
  `adresse_postale` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `permis` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

CREATE TABLE `etablissement` (
  `id_etablissement` bigint(20) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `code_postal` bigint(20) NOT NULL,
  `nb_employe` bigint(20) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `id_responsable` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `pole`
--

CREATE TABLE `pole` (
  `id_pole` bigint(20) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `postes`
--

CREATE TABLE `postes` (
  `id_poste` bigint(20) NOT NULL,
  `nom_poste` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `id_pole` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id_employe`),
  ADD KEY `employes_ibfk_1` (`id_poste`),
  ADD KEY `id_etablissement` (`id_etablissement`);

--
-- Index pour la table `etablissement`
--
ALTER TABLE `etablissement`
  ADD PRIMARY KEY (`id_etablissement`),
  ADD KEY `etablissement_ibfk_1` (`id_responsable`);

--
-- Index pour la table `pole`
--
ALTER TABLE `pole`
  ADD PRIMARY KEY (`id_pole`);

--
-- Index pour la table `postes`
--
ALTER TABLE `postes`
  ADD PRIMARY KEY (`id_poste`),
  ADD KEY `id_pole` (`id_pole`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `employes`
--
ALTER TABLE `employes`
  ADD CONSTRAINT `employes_ibfk_1` FOREIGN KEY (`id_poste`) REFERENCES `postes` (`id_poste`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employes_ibfk_2` FOREIGN KEY (`id_etablissement`) REFERENCES `etablissement` (`id_etablissement`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `etablissement`
--
ALTER TABLE `etablissement`
  ADD CONSTRAINT `etablissement_ibfk_1` FOREIGN KEY (`id_responsable`) REFERENCES `employes` (`id_employe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `postes`
--
ALTER TABLE `postes`
  ADD CONSTRAINT `postes_ibfk_1` FOREIGN KEY (`id_pole`) REFERENCES `pole` (`id_pole`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
