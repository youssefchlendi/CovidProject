-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 02 jan. 2022 à 22:04
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetphp`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `userName` text NOT NULL,
  `mail` text NOT NULL,
  `password` text NOT NULL,
  `mobilePhone` int(8) NOT NULL,
  `dateRegistration` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `userName`, `mail`, `password`, `mobilePhone`, `dateRegistration`) VALUES
(1, 'admin', 'sabrinePOOUp@gmail.com', 'sabrine', 1234567891, '2022-01-02 18:54:53');

-- --------------------------------------------------------

--
-- Structure de la table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `FullName` text NOT NULL,
  `mobile` int(8) NOT NULL,
  `dateannif` date NOT NULL,
  `cin` int(8) NOT NULL,
  `adresse` text NOT NULL,
  `state` text NOT NULL,
  `registrationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `patients`
--

INSERT INTO `patients` (`id`, `FullName`, `mobile`, `dateannif`, `cin`, `adresse`, `state`, `registrationDate`) VALUES
(55, 'Sabrine', 52906960, '2001-04-30', 11438077, 'Ras JEbel', 'Bizerte', '2022-01-01 23:00:00'),
(56, 'Slim', 98605200, '2001-07-27', 1111, 'Ras JEbel', 'Bizerte', '2022-01-01 23:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `techniciens`
--

CREATE TABLE `techniciens` (
  `id` int(11) NOT NULL,
  `techID` varchar(100) DEFAULT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `MobilePhone` bigint(12) DEFAULT NULL,
  `dateRegistration` timestamp NULL DEFAULT NULL,
  `idAdmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `techniciens`
--

INSERT INTO `techniciens` (`id`, `techID`, `FullName`, `MobilePhone`, `dateRegistration`, `idAdmin`) VALUES
(21, '11', 'Salah', 1111111140, '2022-01-01 23:00:00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tests`
--

CREATE TABLE `tests` (
  `id` int(11) NOT NULL,
  `patient_cin` int(11) NOT NULL,
  `TestTimeSlot` date NOT NULL,
  `RegistrationDate` date DEFAULT current_timestamp(),
  `typeTest` int(11) NOT NULL,
  `assigned` tinyint(1) NOT NULL,
  `tech_id` int(11) DEFAULT NULL,
  `resultat` text DEFAULT NULL,
  `assignedTime` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tests`
--

INSERT INTO `tests` (`id`, `patient_cin`, `TestTimeSlot`, `RegistrationDate`, `typeTest`, `assigned`, `tech_id`, `resultat`, `assignedTime`) VALUES
(28, 11438077, '2022-01-02', '2022-01-02', 1, 1, 11, NULL, '2022-01-02'),
(29, 1111, '2021-01-30', '2022-01-02', 1, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `typetest`
--

CREATE TABLE `typetest` (
  `id` int(11) NOT NULL,
  `nomTest` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `typetest`
--

INSERT INTO `typetest` (`id`, `nomTest`) VALUES
(1, 'PCR'),
(2, 'Antigen'),
(3, 'Test rapide'),
(4, 'Sérologique');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `techniciens`
--
ALTER TABLE `techniciens`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `typetest`
--
ALTER TABLE `typetest`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `techniciens`
--
ALTER TABLE `techniciens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `typetest`
--
ALTER TABLE `typetest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
