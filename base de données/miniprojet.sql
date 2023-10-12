-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 11 oct. 2023 à 17:33
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `miniprojet`
--

-- --------------------------------------------------------

--
-- Structure de la table `agri_anciennete`
--

CREATE TABLE `agri_anciennete` (
  `id` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `indice` varchar(255) NOT NULL,
  `salaire_horaire` varchar(255) NOT NULL,
  `salaire_mensuel` varchar(255) NOT NULL,
  `salaire_mensuel_arrondi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `agri_anciennete`
--

INSERT INTO `agri_anciennete` (`id`, `id_categorie`, `indice`, `salaire_horaire`, `salaire_mensuel`, `salaire_mensuel_arrondi`) VALUES
(1, 1, '1595', '1114.75', '222950', ''),
(2, 2, '1602', '1119.64', '223928', ''),
(3, 3, '1618', '1130.82', '226164', ''),
(4, 4, '1642', '1147.59', '229518', ''),
(5, 5, '1705', '1191.62', '238324', ''),
(6, 6, '1802', '1259.42', '251884', ''),
(7, 7, '1964', '1372.64', '274528', ''),
(8, 8, '2221', '1552.26', '310452', ''),
(9, 9, '2580', '1803.16', '360632', ''),
(10, 10, '2851', '1992.56', '398512', '');

-- --------------------------------------------------------

--
-- Structure de la table `agri_embauche`
--

CREATE TABLE `agri_embauche` (
  `id` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `indice` varchar(255) NOT NULL,
  `salaire_horaire` varchar(255) NOT NULL,
  `salaire_mensuel` varchar(255) NOT NULL,
  `salaire_mensuel_arrondi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `agri_embauche`
--

INSERT INTO `agri_embauche` (`id`, `id_categorie`, `indice`, `salaire_horaire`, `salaire_mensuel`, `salaire_mensuel_arrondi`) VALUES
(1, 1, '1575', '1100.77', '220154', ''),
(2, 2, '1596', '1115.44', '223088', ''),
(3, 3, '1603', '1120.34', '224068', ''),
(4, 4, '1619', '1131.52', '226304', ''),
(5, 5, '1643', '1148.29', '229658', ''),
(6, 6, '1706', '1192.32', '238464', ''),
(7, 7, '1803', '1260.12', '252024', ''),
(8, 8, '1969', '1376.13', '275226', ''),
(10, 9, '2247', '1570.43', '314086', ''),
(11, 10, '2600', '1817.14', '363428', '');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) VALUES
(1, 'M1-1A'),
(2, 'M2-1B'),
(3, 'OS1-2A'),
(4, 'OS2-2B'),
(5, 'OS3-3A'),
(6, 'OP1A-3B'),
(7, 'OP1B-4A'),
(8, 'OP2A-4B'),
(9, 'OP2B-5A'),
(10, 'OP3-5B');

-- --------------------------------------------------------

--
-- Structure de la table `conge`
--

CREATE TABLE `conge` (
  `id_conge` int(11) NOT NULL,
  `id_personnel` int(11) NOT NULL,
  `date_depart` date NOT NULL,
  `date_arriver` date NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `historique_poste`
--

CREATE TABLE `historique_poste` (
  `id_historique` int(11) NOT NULL,
  `id_personnel` int(11) NOT NULL,
  `nom_poste` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `historique_service`
--

CREATE TABLE `historique_service` (
  `id_historique` int(11) NOT NULL,
  `id_personnel` int(11) NOT NULL,
  `nom_service` varchar(255) NOT NULL,
  `date_service` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `indice`
--

CREATE TABLE `indice` (
  `id_indice` int(11) NOT NULL,
  `Nagricole` varchar(255) NOT NULL,
  `agricole` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `indice`
--

INSERT INTO `indice` (`id_indice`, `Nagricole`, `agricole`) VALUES
(1, '0.7950', '0.6989');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `mail`, `motdepasse`) VALUES
(1, 'Stephan', 'stephan@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(2, 'Dona', 'donatien.jean41@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(3, 'Pauline', 'pauline@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(4, 'Mirana', 'mirana@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

-- --------------------------------------------------------

--
-- Structure de la table `non_agri_anciennete`
--

CREATE TABLE `non_agri_anciennete` (
  `id` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `indice` varchar(255) NOT NULL,
  `salaire_horaire` varchar(255) NOT NULL,
  `salaire_mensuel` varchar(255) NOT NULL,
  `salaire_mensuel_arrondi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `non_agri_anciennete`
--

INSERT INTO `non_agri_anciennete` (`id`, `id_categorie`, `indice`, `salaire_horaire`, `salaire_mensuel`, `salaire_mensuel_arrondi`) VALUES
(1, 1, '1595', '1268.03', '219788', ''),
(2, 2, '1602', '1273.59', '220751', ''),
(3, 3, '1618', '1286.31', '222956', ''),
(4, 4, '1642', '1305.39', '226263', ''),
(5, 5, '1705', '1355.48', '234945', ''),
(6, 6, '1802', '1432.59', '248311', ''),
(7, 7, '1964', '1561.38', '270634', ''),
(8, 8, '2221', '1765.70', '306049', ''),
(9, 9, '2580', '2051.10', '355517', ''),
(10, 10, '2851', '2266.55', '392861', '');

-- --------------------------------------------------------

--
-- Structure de la table `non_agri_embauche`
--

CREATE TABLE `non_agri_embauche` (
  `id` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `indice` varchar(255) NOT NULL,
  `salaire_horaire` varchar(255) NOT NULL,
  `salaire_mensuel` varchar(255) NOT NULL,
  `salaire_mensuel_arrondi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `non_agri_embauche`
--

INSERT INTO `non_agri_embauche` (`id`, `id_categorie`, `indice`, `salaire_horaire`, `salaire_mensuel`, `salaire_mensuel_arrondi`) VALUES
(1, 1, '1575', '1252.13', '217032', ''),
(2, 2, '1596', '1268.82', '219925', ''),
(3, 3, '1603', '1274.39', '220890', ''),
(4, 4, '1619', '1287.11', '223095', ''),
(5, 5, '1643', '1306.19', '226402', ''),
(6, 6, '1706', '1356.27', '235082', ''),
(7, 7, '1803', '1433.39', '248449', ''),
(8, 8, '1969', '1565.36', '271324', ''),
(9, 9, '2247', '1786.37', '309632', ''),
(10, 10, '2600', '2067.00', '358273', '');

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

CREATE TABLE `personnel` (
  `id` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `dateNaissance` date NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `nationalite` varchar(255) NOT NULL,
  `cin` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) NOT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `mail` varchar(255) NOT NULL,
  `situation` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `diplome` varchar(255) NOT NULL,
  `grille` varchar(255) NOT NULL,
  `photo` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `profil` varchar(255) NOT NULL,
  `pay` varchar(255) NOT NULL,
  `jours_conge` int(11) NOT NULL,
  `date_reference` date NOT NULL DEFAULT current_timestamp(),
  `date_retrait` date NOT NULL DEFAULT current_timestamp(),
  `hors_service` varchar(255) NOT NULL,
  `type_contrat` varchar(255) NOT NULL,
  `fichier_contrat` varchar(255) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`id`, `id_categorie`, `nom`, `prenom`, `dateNaissance`, `sexe`, `nationalite`, `cin`, `adresse`, `telephone`, `mail`, `situation`, `nombre`, `diplome`, `grille`, `photo`, `date`, `profil`, `pay`, `jours_conge`, `date_reference`, `date_retrait`, `hors_service`, `type_contrat`, `fichier_contrat`, `date_debut`, `date_fin`) VALUES
(1, 1, 'RAZANADRASON', 'Donatien', '2023-10-06', 'Masculin', 'Malagasy', '401070740410', 'Lot 125', '0326470573', 'donatien.jean41@gmail.com', 'celibataire', '1', 'Master1', 'non_agricole', 'testimonials-4.jpg', '2023-10-11', 'anciennete', '0', 0, '2023-10-11', '2023-10-11', '1', 'CDD', 'Screenshot 2023-10-11 083058.png', '2023-10-11', '2023-10-19'),
(2, 3, 'MIRANA', 'Mirana', '2023-10-20', 'Feminin ', 'Malagasy', '401070740410', 'Lot 125', '0326470573', 'donatien.jean41@gmail.com', 'celibataire', '1', 'Master1', 'agricole', 'testimonials-2.jpg', '2023-10-11', 'embauche', '0', 0, '2023-10-11', '2023-10-11', '1', 'CDI', 'Screenshot 2023-10-11 083058.png', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `personnel_central`
--

CREATE TABLE `personnel_central` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `dateNaissance` date NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `nationalite` varchar(255) NOT NULL,
  `cin` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `situation` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `classe` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `echelon` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `hors_service` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `personnel_central`
--

INSERT INTO `personnel_central` (`id`, `nom`, `prenom`, `dateNaissance`, `sexe`, `nationalite`, `cin`, `adresse`, `telephone`, `mail`, `situation`, `nombre`, `categorie`, `classe`, `photo`, `echelon`, `date`, `hors_service`) VALUES
(1, 'RAZANADRASON', 'Jean', '2023-09-15', 'Masculin', 'Malagasy', '401070740410', 'Lot 125', '1111111111', 'dona@gmail.com', 'marié', '1', 'CAT_3', 'Adjoint', 'testimonials-4.jpg', 'De_service', '2023-09-13', '0'),
(2, 'MIRANA', 'Mirana', '2023-09-16', 'Feminin ', 'Malagasy', '401070740410', 'Lot 125', '0326470573', 'donatien.jean41@gmail.com', 'celibataire', '2', 'CAT_1', 'Employe', 'testimonials-3.jpg', 'De_service', '2023-09-17', '0');

-- --------------------------------------------------------

--
-- Structure de la table `poste`
--

CREATE TABLE `poste` (
  `id_poste` int(11) NOT NULL,
  `nom_poste` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `poste`
--

INSERT INTO `poste` (`id_poste`, `nom_poste`) VALUES
(1, 'Logistique'),
(2, 'Sercretaire');

-- --------------------------------------------------------

--
-- Structure de la table `poste_insertion`
--

CREATE TABLE `poste_insertion` (
  `id_poste_insertion` int(11) NOT NULL,
  `id_personnel` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `nom_poste` varchar(255) NOT NULL,
  `nom_service` varchar(255) NOT NULL,
  `date_poste` date NOT NULL DEFAULT current_timestamp(),
  `date_service` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `poste_insertion`
--

INSERT INTO `poste_insertion` (`id_poste_insertion`, `id_personnel`, `id_categorie`, `nom_poste`, `nom_service`, `date_poste`, `date_service`) VALUES
(1, 1, 1, 'Logistique', 'Informatique', '2023-10-11', '2023-10-11'),
(2, 2, 3, 'Sercretaire', 'contable', '2023-10-11', '2023-10-11');

-- --------------------------------------------------------

--
-- Structure de la table `presence`
--

CREATE TABLE `presence` (
  `id_presence` int(11) NOT NULL,
  `id_personnel` int(11) NOT NULL,
  `heure_presence` varchar(255) NOT NULL,
  `date_presence` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `salaire`
--

CREATE TABLE `salaire` (
  `id_salaire` int(11) NOT NULL,
  `id_personnel` int(11) NOT NULL,
  `montant` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `salaire`
--

INSERT INTO `salaire` (`id_salaire`, `id_personnel`, `montant`, `date`) VALUES
(1, 2, '224 068', '2023-10-11'),
(2, 1, '219 788', '2023-10-11'),
(3, 1, '219 788', '2023-10-11');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id_service` int(11) NOT NULL,
  `nom_service` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id_service`, `nom_service`) VALUES
(1, 'Informatique'),
(2, 'contable');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agri_anciennete`
--
ALTER TABLE `agri_anciennete`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `agri_embauche`
--
ALTER TABLE `agri_embauche`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `conge`
--
ALTER TABLE `conge`
  ADD PRIMARY KEY (`id_conge`),
  ADD KEY `id_personnel` (`id_personnel`);

--
-- Index pour la table `historique_poste`
--
ALTER TABLE `historique_poste`
  ADD PRIMARY KEY (`id_historique`),
  ADD KEY `id_personnel` (`id_personnel`);

--
-- Index pour la table `historique_service`
--
ALTER TABLE `historique_service`
  ADD PRIMARY KEY (`id_historique`),
  ADD KEY `id_personnel` (`id_personnel`);

--
-- Index pour la table `indice`
--
ALTER TABLE `indice`
  ADD PRIMARY KEY (`id_indice`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `non_agri_anciennete`
--
ALTER TABLE `non_agri_anciennete`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `non_agri_embauche`
--
ALTER TABLE `non_agri_embauche`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `personnel_central`
--
ALTER TABLE `personnel_central`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `poste`
--
ALTER TABLE `poste`
  ADD PRIMARY KEY (`id_poste`);

--
-- Index pour la table `poste_insertion`
--
ALTER TABLE `poste_insertion`
  ADD PRIMARY KEY (`id_poste_insertion`),
  ADD KEY `id_personnel` (`id_personnel`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `presence`
--
ALTER TABLE `presence`
  ADD PRIMARY KEY (`id_presence`),
  ADD KEY `id_personnel` (`id_personnel`);

--
-- Index pour la table `salaire`
--
ALTER TABLE `salaire`
  ADD PRIMARY KEY (`id_salaire`),
  ADD KEY `id_personnel` (`id_personnel`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `agri_anciennete`
--
ALTER TABLE `agri_anciennete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `agri_embauche`
--
ALTER TABLE `agri_embauche`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `conge`
--
ALTER TABLE `conge`
  MODIFY `id_conge` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `historique_poste`
--
ALTER TABLE `historique_poste`
  MODIFY `id_historique` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `historique_service`
--
ALTER TABLE `historique_service`
  MODIFY `id_historique` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `indice`
--
ALTER TABLE `indice`
  MODIFY `id_indice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `non_agri_anciennete`
--
ALTER TABLE `non_agri_anciennete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `non_agri_embauche`
--
ALTER TABLE `non_agri_embauche`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `personnel_central`
--
ALTER TABLE `personnel_central`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `poste`
--
ALTER TABLE `poste`
  MODIFY `id_poste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `poste_insertion`
--
ALTER TABLE `poste_insertion`
  MODIFY `id_poste_insertion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `presence`
--
ALTER TABLE `presence`
  MODIFY `id_presence` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `salaire`
--
ALTER TABLE `salaire`
  MODIFY `id_salaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
