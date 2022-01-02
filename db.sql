-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 02 jan. 2022 à 14:54
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
(1, 'admin', 'sabrinePOOUp@gmail.com', 'sabrine', 1234567891, '2022-01-02 13:40:01');

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
(1, 'Neila', 54152026, '2011-11-08', 123456789, 'Rue Mohamed Ali Hammi', 'Ras Jebel', '2021-11-21 09:18:06'),
(2, 'sabrine', 52906960, '2011-11-30', 11438077, 'Rue Mohamed Ali Hammi', 'Ras Jebel', '2021-11-21 09:19:18'),
(35, 'Nissrine', 11112233, '1991-07-03', 1472583, 'Bizerte centre', 'Bizerte', '2021-11-21 12:47:52'),
(36, 'francois', 3451045, '2021-12-17', 6564156, 'sfsdfsd', 'ssdfsdf', '0000-00-00 00:00:00'),
(37, 'francois', 3451045, '2021-12-17', 6564156, 'sfsdfsd', 'ssdfsdf', '2021-12-14 23:00:00'),
(38, 'alii', 4210247, '2021-12-25', 1020200, 'drgdg', 'dgdfgd', '2021-12-14 23:00:00'),
(39, 'alii', 4210247, '2021-12-25', 1020200, 'drgdg', 'dgdfgd', '2021-12-14 23:00:00'),
(40, 'alii', 4210247, '2021-12-25', 1020200, 'drgdg', 'dgdfgd', '2021-12-14 23:00:00'),
(41, 'mohamed', 3451045, '2009-01-20', 6564156, 'ss', 'ty', '2021-12-31 23:00:00'),
(46, 'Minyar', 111111, '2001-10-27', 114320, 'Bizerte', 'Bizerte', '2021-12-31 23:00:00'),
(47, 'Minyar', 111111, '2000-10-27', 2121212, 'ldmfldk', 'kljfldfk', '2021-12-31 23:00:00'),
(50, 'new', 11212, '2001-04-30', 1111, 'dmld', 'dsdd', '2022-01-01 23:00:00'),
(52, 'newww', 45245234, '2022-01-22', 42343, 'fjufjuc', 'cjutyujtyc', '2022-01-01 23:00:00');

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
(21, 1111000000, '2022-01-04', '2022-01-02', 2, 0, NULL, NULL, NULL),
(22, 1142255, '2022-01-03', '2022-01-02', 3, 0, NULL, NULL, NULL),
(24, 45615, '2022-01-20', '2022-01-02', 1, 0, NULL, NULL, NULL),
(25, 42343, '2022-01-13', '2022-01-02', 2, 1, 11, NULL, '2022-01-02');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `techniciens`
--
ALTER TABLE `techniciens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `typetest`
--
ALTER TABLE `typetest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
