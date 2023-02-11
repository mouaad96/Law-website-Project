-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 11 fév. 2023 à 12:00
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lawyerdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `agenceinfo`
--

CREATE TABLE `agenceinfo` (
  `idAg` int(11) NOT NULL,
  `nomAg` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nomAd` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `agenceinfo`
--

INSERT INTO `agenceinfo` (`idAg`, `nomAg`, `mail`, `password`, `nomAd`, `gender`) VALUES
(1, 'LawyerUp', 'ad@ad.ad', 'ad', 'Aboud DHD', 'male');

-- --------------------------------------------------------

--
-- Structure de la table `avocat`
--

CREATE TABLE `avocat` (
  `idA` int(11) NOT NULL,
  `nomA` varchar(50) NOT NULL,
  `prenomA` varchar(50) NOT NULL,
  `specialite` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `linkedin` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `avocat`
--

INSERT INTO `avocat` (`idA`, `nomA`, `prenomA`, `specialite`, `photo`, `linkedin`, `mail`, `password`, `facebook`, `gender`) VALUES
(1, 'Doe', 'John', 'Criminal Defense', './images/1.jpg', 'john_doe_linkedin', 'john_doe@email.com', 'password123', 'john_doe_facebook', 'Male'),
(2, 'Aya', 'Aafifi', 'Avocat Externe', './images/3.jpg', 'https://linkedin.com/aypi', 'AAfifi.02@gmail.com', 'aa', '', 'female'),
(3, 'RIDA', 'Akhassas', 'Avocat multiExterne', './images/4.jpg', 'https://linkedin.com/', 'rakhsa.02@gmail.com', 'ar', '', ''),
(4, 'Smith', 'Jane', 'Family Law', './images/2.jpg', 'jane_smith_linkedin', 'jane_smith@email.com', 'password456', 'jane_smith_facebook', 'Female');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `idP` int(11) NOT NULL,
  `nomP` varchar(50) NOT NULL,
  `prenomP` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `CNI` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `signupDate` date NOT NULL,
  `tel` varchar(15) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idP`, `nomP`, `prenomP`, `gender`, `adresse`, `CNI`, `email`, `password`, `signupDate`, `tel`, `photo`) VALUES
(1, 'Johnson', 'Michael', '', '1234 Main St, Anytown USA', '123456789', 'michael_johnson@email.com', 'password789', '2022-01-01', '555-555-1212', './images/1.jpg'),
(2, 'Dahmani', 'Abderrahim ', 'male', '18 Rue 70', 'BA16772', 'ad@ad.ad', 'ad', '0000-00-00', '0630691655', './images/profile.avif'),
(3, 'Williams', 'Emily', '', '5678 Main St, Anytown USA', '987654321', 'emily_williams@email.com', 'password246', '2022-02-01', '555-555-1213', './images/3.jpg'),
(4, 'Johnson', 'Ashley', '', '12 Main St, New York, NY 10001', '123456A', 'ashley@gmail.com', 'Ashley1234', '2020-05-01', '1234567890', './images/2.jpg'),
(5, 'Brown', 'David', '', '34 Park Ave, San Francisco, CA 94102', '234567B', 'david@gmail.com', 'David1234', '2020-07-01', '1234567890', './images/1.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `consultation`
--

CREATE TABLE `consultation` (
  `idC` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `consultation`
--

INSERT INTO `consultation` (`idC`, `type`, `prix`) VALUES
(1, 'Criminal Case', 150),
(2, 'Criminal issue', 180),
(3, 'Criminal Defense', 200),
(4, 'Family Law', 150),
(6, 'Criminal Law', 250);

-- --------------------------------------------------------

--
-- Structure de la table `consultationavocat`
--

CREATE TABLE `consultationavocat` (
  `idConA` int(11) NOT NULL,
  `idAv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `consultationclient`
--

CREATE TABLE `consultationclient` (
  `idCon` int(11) NOT NULL,
  `idCli` int(11) NOT NULL,
  `isDone` tinyint(1) NOT NULL,
  `detail` text NOT NULL,
  `time` varchar(50) NOT NULL,
  `consultationDate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `consultationclient`
--

INSERT INTO `consultationclient` (`idCon`, `idCli`, `isDone`, `detail`, `time`, `consultationDate`) VALUES
(2, 1, 0, 'Case for Criminal Defense', '02:00 PM - 04:00 PM', '2022-03-01'),
(4, 3, 0, 'Case for Family Law', '10:00 AM - 12:00 AM', '2022-03-02'),
(6, 5, 1, 'Adviced on criminal case.', '11:00 AM', '2022-12-02'),
(4, 2, 0, 'intentional feeding', '10:00 AM - 12:00 AM', '2023-02-07'),
(3, 2, 0, 'naus', '04:00 PM - 06:00 PM', '2023-02-14'),
(2, 2, 0, 'nia', '10:00 AM - 12:00 AM', '2023-02-06');

-- --------------------------------------------------------

--
-- Structure de la table `expertise`
--

CREATE TABLE `expertise` (
  `idE` int(11) NOT NULL,
  `nomE` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `prix` float NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `expertise`
--

INSERT INTO `expertise` (`idE`, `nomE`, `description`, `prix`, `photo`) VALUES
(1, 'Economique cris', 'Override the digital divide with additional clickthroughs from DevOps along the information\n                        highway will close.', 120, './images/maintt.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agenceinfo`
--
ALTER TABLE `agenceinfo`
  ADD PRIMARY KEY (`idAg`);

--
-- Index pour la table `avocat`
--
ALTER TABLE `avocat`
  ADD PRIMARY KEY (`idA`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idP`);

--
-- Index pour la table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`idC`);

--
-- Index pour la table `consultationavocat`
--
ALTER TABLE `consultationavocat`
  ADD KEY `idAvocatCon` (`idAv`),
  ADD KEY `idConsultationAv` (`idConA`);

--
-- Index pour la table `consultationclient`
--
ALTER TABLE `consultationclient`
  ADD KEY `idconsultation` (`idCon`),
  ADD KEY `idclient` (`idCli`);

--
-- Index pour la table `expertise`
--
ALTER TABLE `expertise`
  ADD PRIMARY KEY (`idE`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `agenceinfo`
--
ALTER TABLE `agenceinfo`
  MODIFY `idAg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `avocat`
--
ALTER TABLE `avocat`
  MODIFY `idA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `idP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `idC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `expertise`
--
ALTER TABLE `expertise`
  MODIFY `idE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `consultationavocat`
--
ALTER TABLE `consultationavocat`
  ADD CONSTRAINT `idAvocatCon` FOREIGN KEY (`idAv`) REFERENCES `avocat` (`idA`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idConsultationAv` FOREIGN KEY (`idConA`) REFERENCES `consultation` (`idC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `consultationclient`
--
ALTER TABLE `consultationclient`
  ADD CONSTRAINT `idclient` FOREIGN KEY (`idCli`) REFERENCES `client` (`idP`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idconsultation` FOREIGN KEY (`idCon`) REFERENCES `consultation` (`idC`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
