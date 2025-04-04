-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 04, 2025 at 11:05 AM
-- Server version: 10.11.10-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u145170788_cente_sportif`
--

-- --------------------------------------------------------

--
-- Table structure for table `centres`
--

CREATE TABLE `centres` (
  `Id_centre` int(11) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Horaire` varchar(250) DEFAULT NULL,
  `Adresse` varchar(255) DEFAULT NULL,
  `Lat` decimal(10,8) DEFAULT NULL,
  `Lon` decimal(11,8) DEFAULT NULL,
  `Telephone` varchar(20) DEFAULT NULL,
  `Mail` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `centres`
--

INSERT INTO `centres` (`Id_centre`, `Nom`, `Horaire`, `Adresse`, `Lat`, `Lon`, `Telephone`, `Mail`) VALUES
(1, 'Complexe Sportif St-Symphorien', 'Lundi - Vendredi : 7h - 22h samedi 09h – 23h  Dimanche, 06h–23h', '4B Bd Saint-Symphorien, 57050 Longeville-lès-Metz', 49.11295000, 6.16170000, '03 87 55 56 00', 'info@complexe-sym.fr'),
(2, 'Parc des Sports de Vandoeuvre', 'lundi: 10h–23h Mardi-Jeudi: 07h30–23h00 vendredi: 07h30–08h  samedi: Ouvert 24h/24  dimanche: Fermé', '3 Rue de Gembloux, 54500 Vandœuvre-lès-Nancy', 48.66247000, 6.17770000, '03 83 51 31 43', 'contact@vandoeuvre-sport.fr'),
(3, 'Stade Marcel Picot', 'Mardi - Dimanche : 9h - 18h', '90 Boulevard Jean Jaurès, 54510 Tomblaine', 48.69302800, 6.20732100, '03 83 18 88 44', 'info@stademarcelpicot.fr'),
(4, 'Piscine Olympique d\'Amnéville', 'lundi: Fermé   mardi-jeudi-vendredi: 10h–19h15 mercredi: 12:00–13:45 15:00–19:15samedi: 10h00–18:00 dimanche: 09h00–18h00', 'Rue de la Piscine, 57360 Amnéville', 49.24411000, 6.13474000, '03 87 71 11 26', 'contact@piscine-amneville.fr'),
(5, 'Palais des Sports Jean Weille', 'Lundi - Dimanche : 8h - 22h30', '14 Rue Capitaine Guynemer, 54000 Nancy', 48.69951000, 6.12996000, '03 83 95 46 90', 'info@palais-jean-weille.fr'),
(6, 'Spartiate Gym', ' du lundi au vendredi de 6h-23h  samedi et dimanche de 8h-20h', '1 Rue Jean Jaurès - 54320 Maxéville', 48.71060000, 6.16960000, ' 07 44 94 79 42', 'spartiategym.max@gmail.com'),
(7, 'Le Diamant Fitness Club', 'Lundi au Dimanche 6h-23h', '10 Rue des Fusillés du 18 Novembre 1944', 48.28570000, 6.95230000, '03 29 41 74 78', 'contact@diamant-fitness-club.fr');

-- --------------------------------------------------------

--
-- Table structure for table `inscription_sport`
--

CREATE TABLE `inscription_sport` (
  `Id_inscription` int(11) NOT NULL,
  `Id_centre` int(11) DEFAULT NULL,
  `Date_demande` date DEFAULT NULL,
  `Annee` int(11) DEFAULT NULL,
  `Id_utilisateur` int(11) DEFAULT NULL,
  `Id_sport` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `inscription_sport`
--

INSERT INTO `inscription_sport` (`Id_inscription`, `Id_centre`, `Date_demande`, `Annee`, `Id_utilisateur`, `Id_sport`) VALUES
(7, 7, '2025-01-20', 2026, 42, 8),
(9, 3, '2025-02-28', 2026, 53, 5);

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

CREATE TABLE `sport` (
  `Id_sport` int(11) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Id_centre` int(11) NOT NULL,
  `Horaire_sport` varchar(100) NOT NULL,
  `Information` text DEFAULT NULL,
  `prix` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `sport`
--

INSERT INTO `sport` (`Id_sport`, `Nom`, `Id_centre`, `Horaire_sport`, `Information`, `prix`) VALUES
(1, 'Football', 1, 'Lundi, Mercredi, Vendredi : 18h - 20h', 'Séances pour adultes et adolescents au Complexe Sportif St-Symphorien', '45 euros année'),
(2, 'Basketball', 2, 'Mardi, Jeudi : 17h - 19h', 'Entraînements pour débutants et confirmés au Centre Sportif de Vandoeuvre', '35 euros année'),
(3, 'Natation', 4, 'Tous les jours : 10h - 12h', 'Cours de natation à la Piscine Olympique d\'Amnéville pour tous les niveaux', '80 euros année'),
(4, 'Tennis', 5, 'Samedi, Dimanche : 9h - 12h', 'Cours individuels et collectifs au Palais des Sports Jean Weille', '40 euros année'),
(5, 'Athlétisme', 3, 'Lundi - Vendredi : 18h - 20h', 'Entraînements compétitifs au Stade Marcel Picot', '65 euros année'),
(6, 'Musculation & Cardio', 6, 'Lundi au Vendredi : 06:00 - 22:00  ', 'heurs libre de 2h par personne 4j/7j\r\n', '85 euros année'),
(7, 'Pilates', 7, 'Samedi : 11h00 - 12h00', 'Améliore la flexibilité, la posture et le bien-être général en travaillant sur le renforcement du tronc et la relaxation.', '45 euros année'),
(8, 'Cross Training', 7, 'Lundi au Vendredi : 17h00 - 18h00 Samedi : 09h00 - 10h00', 'Combine divers exercices fonctionnels pour un entraînement complet et équilibré, adapté à tous les niveaux.', '90 euros année'),
(9, 'Boxing', 7, 'Lundi au Vendredi : 18h00 - 19h00 Samedi : 10h00 - 11h00', 'Parfait pour développer la force, la coordination et les compétences en autodefense dans un cadre dynamique et stimulant.', '75 euros année');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `Id_utilisateur` int(11) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mot_de_passe` varchar(50) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`Id_utilisateur`, `prenom`, `nom`, `email`, `mot_de_passe`, `token`, `is_active`) VALUES
(23, 'toto', 'AL Azar', 'info@fouadalazar.fr', '8d5e957f297893487bd98fa830fa6413', NULL, 0),
(25, 'ha', 'ha', 'info@fouadalazar.fr', 'f1c1592588411002af340cbaedd6fc33', NULL, 0),
(26, 'ha1', 'ha1', 'ha1@yopmail.com', 'f1c1592588411002af340cbaedd6fc33', NULL, 0),
(27, 'fa1', 'fa1', 'fa1@yopmail.com', '0a113ef6b61820daa5611c870ed8d5ee', NULL, 0),
(28, 'ha2', 'ha2', 'ha2yopmail@yopmail.com', 'f1c1592588411002af340cbaedd6fc33', NULL, 0),
(30, 'marhaba', '123', 'marhaba123@yopmail.com', '698d51a19d8a121ce581499d7b701668', NULL, 0),
(31, 'karam', 'karam', 'karam@yopmail.com', '698d51a19d8a121ce581499d7b701668', NULL, 0),
(32, 'fouad', ' ALazar', 'info@fouadalazar.fr', '202cb962ac59075b964b07152d234b70', NULL, 0),
(33, 'ha2', 'ha2', 'ha2yopmail@yopmail.com', '698d51a19d8a121ce581499d7b701668', NULL, 1),
(34, 'Marhaba', '123', 'marhaba123@yopmail.com', 'e249ffe8e7a3532997a311336a3f1018', '2279be9561e7f809fe41babfc0877306e27ca0e553cd3fa68869b64a9c4abf65bb855fff56d03a14e1c1f21aae6c32074c9a', 0),
(35, 'Tina', 'Tino', 'tina@yopmail.com', '96e79218965eb72c92a549dd5a330112', NULL, 1),
(36, 'tina', 'tina', 'toni@yopmail.com', '698d51a19d8a121ce581499d7b701668', '715a3ec38f86e97f8feea5df111d20d1fc25fb14b0019525fd1f7bf1d8708605345b1f15a95d3caca5545f9a0d5abec11622', 0),
(37, 'bob', 'bob', 'bob@yopmail.com', '698d51a19d8a121ce581499d7b701668', NULL, 1),
(40, 'jade', 'jade', 'jade@yopmail.com', '202cb962ac59075b964b07152d234b70', NULL, 1),
(41, 'fouad', 'azar', 'foaudazar@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, 1),
(42, 'mar', 'mar', 'mar@yopmail.com', '6fedade0d7e240b38047f9d302e740cb', NULL, 1),
(43, 'micho', 'mocho', 'micho@yopmail.com', '202cb962ac59075b964b07152d234b70', NULL, 1),
(44, 'kalim', 'kalim', 'kalim@yopmail.com', '8d5e957f297893487bd98fa830fa6413', NULL, 1),
(45, 'fre', 'ffe', 'f@gmail.com', '6fedade0d7e240b38047f9d302e740cb', 'bda7219110c191f4c49013ae7d994fd01deafdc10394c02be5091feba62344a7a4ae5f80022acbb1e8b5203cadb2132c0c80', 0),
(46, 'erh', 'sd', 'gsfdagya@gmail.com', '202cb962ac59075b964b07152d234b70', '564e7956f75ed5205495abf5b9de1b43971a399e44dc6c4560122aef36299caf1d9f3ddf24e96f4a4706d262ea0580b9c708', 0),
(47, 'karam', 'karam', 'karam123@yopmail.com', '6fedade0d7e240b38047f9d302e740cb', NULL, 1),
(48, 'Fouad14', 'f', 'f@yopmail.com', '6fedade0d7e240b38047f9d302e740cb', NULL, 1),
(49, 'Marwan', 'Al Azar', 'marwanalazar@hotmail.com', '7a1d3735c59edcca9532ee0cf4c3aadc', NULL, 1),
(50, 'Mar', 'Mar', 'mar1@yopmail.cim', '6fedade0d7e240b38047f9d302e740cb', '7b56f478ba0667bab0bf3a7ab7febd07232780168ee1efbcf1029f1cc9f0a8c46fe27e8006fa92313cb6b2bf00d6843ff5dd', 0),
(51, 'Mar', 'Mar', 'mar1@yopmail.com', '6fedade0d7e240b38047f9d302e740cb', 'e9161c1535cb4241feb1fe9e3a3d92ef743e8101ca39eccb0b9a9495728fb6557b5649b6bdc5539882303f70338f8cffc065', 0),
(52, 'Mar', 'Mar', 'fouadalazar@hotmail.com', '6fedade0d7e240b38047f9d302e740cb', NULL, 1),
(53, 'michel', 'michel', 'michel@yopmail.com', '6fedade0d7e240b38047f9d302e740cb', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `centres`
--
ALTER TABLE `centres`
  ADD PRIMARY KEY (`Id_centre`);

--
-- Indexes for table `inscription_sport`
--
ALTER TABLE `inscription_sport`
  ADD PRIMARY KEY (`Id_inscription`) USING BTREE,
  ADD KEY `Id_centre` (`Id_centre`),
  ADD KEY `Id_utilisateur` (`Id_utilisateur`),
  ADD KEY `Id_sport` (`Id_sport`);

--
-- Indexes for table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`Id_sport`),
  ADD KEY `Id_centre` (`Id_centre`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`Id_utilisateur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `centres`
--
ALTER TABLE `centres`
  MODIFY `Id_centre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `inscription_sport`
--
ALTER TABLE `inscription_sport`
  MODIFY `Id_inscription` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sport`
--
ALTER TABLE `sport`
  MODIFY `Id_sport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `Id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inscription_sport`
--
ALTER TABLE `inscription_sport`
  ADD CONSTRAINT `inscription_sport_ibfk_1` FOREIGN KEY (`Id_centre`) REFERENCES `centres` (`Id_centre`),
  ADD CONSTRAINT `inscription_sport_ibfk_2` FOREIGN KEY (`Id_utilisateur`) REFERENCES `utilisateur` (`Id_utilisateur`);

--
-- Constraints for table `sport`
--
ALTER TABLE `sport`
  ADD CONSTRAINT `sport_ibfk_1` FOREIGN KEY (`Id_centre`) REFERENCES `centres` (`Id_centre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
