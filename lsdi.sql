-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 17 Juin 2022 à 11:51
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `lsdi`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateurs`
--

CREATE TABLE IF NOT EXISTS `administrateurs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `telephone` int(255) NOT NULL,
  `pwd` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(255) NOT NULL,
  `etat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `administrateurs`
--

INSERT INTO `administrateurs` (`id`, `code`, `nom`, `prenom`, `adresse`, `telephone`, `pwd`, `images`, `etat`) VALUES
(1, '144', 'tyty', 'tutu', 'tyty@yahoo.fr', 658897152, '123', '1614282508494.jpg', 'on'),
(2, '789', 'popi', 'pipi', 'song@yahoo.fr', 658897151, '789a', '', 'on'),
(4, 'pati2023', 'toto', 'manfo', '', 658897151, '789', '1620672544403~2.jpg', 'on'),
(5, 'ifdfg', 'gfdg', 'dgdg', 'fdgd@gmai.com', 1111, 'zzz', '', 'on'),
(6, 'vb', 'vvcb', 'bbvcb', 'vb@gmail.com', 7, 'bcvbvcb', '', 'on');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `nom_client` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `telephone` int(20) NOT NULL,
  `fax` varchar(55) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `compagnie` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `localisation` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `etat` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `code`, `nom_client`, `prenom`, `telephone`, `fax`, `email`, `compagnie`, `localisation`, `etat`) VALUES
(1, '123', '', 'tyty', 678985212, '', 'toto@yahoo.fr', 'ICT Business center', 'ras', 'on'),
(6, '77ers', 'tata', 'pipo', 669548218, '', 'popo@yahoo.fr', 'ICT Business center', '', 'off'),
(7, 'ryan14', 'ryan', 'jordan', 66954823, '', 'pierre@yahoo.fr', 'quifeurou', 'mokolo', 'off'),
(8, 'p-j789', 'jomouelle', 'patrique', 66954822, 'prestation des services informatiques', 'junir@yahoo.com', 'ICT Business center', 'mokolo', 'on'),
(9, '7776', 'toto', 'ekan', 685789625, 'vente des pieces de rechange', 'patrique@gmail.com', 'MTN cameroun', 'kjk', 'on'),
(10, 'raul12', 'raul', 'paul', 685789625, '', 'junir@yahoo.com', '', '', 'off'),
(11, 'raul12', 'raul', 'paul', 685789625, '', 'junir@yahoo.com', 'saratel hotel', '', 'off'),
(12, 'raul12', 'raul', 'paul', 685789625, '', 'junir@yahoo.com', 'MTN cameroun', '', 'off'),
(13, 'pati202', 'pati', 'pipa', 66954823, '', 'pierre@yahoo.fr', '', '', 'off'),
(14, 'pati202', 'pati', 'pipa', 66954823, '', 'pierre@yahoo.fr', '', '', 'off'),
(15, 'pati202', 'pati', 'pipa', 66954823, '', 'pierre@yahoo.fr', '', '', 'off'),
(16, 'pati202', 'pati', 'pipa', 66954823, '', 'pierre@yahoo.fr', '', '', 'off'),
(17, 'pati202', 'pati', 'pipa', 66954823, '', 'pierre@yahoo.fr', '', '', 'off'),
(35, '144', 'jomouelle', 'lop', 66954822, '', 'jonas@yahoo.fr', '', '', 'off'),
(36, 'p-j789', 'toto', 'paul', 685789625, 'prestation des services informatiques', 'pierre@yahoo.fr', 'orange cameroun', 'RAS', 'on'),
(44, 'pati202', 'dav', 'lop', 658897151, '', 'junior@yahoo.com', 'orange cameroun', 'ras', 'on'),
(45, 'pati202', 'toto', 'ekan', 658897151, '', 'pierre@yahoo.fr', 'orange cameroun', 'ras', 'on'),
(46, '144', 'dav', 'ekan', 658897151, '', 'pierre@yahoo.fr', 'orange cameroun', 'ras', 'on'),
(50, 'obila125', 'obila', 'manfo', 658897151, '', 'obilamanfo@yahoo.fr', 'MTN cameroun', 'ras', 'on'),
(51, 'pati202', 'toto', 'ekan', 66954821, '', 'toto@yahoo.fr', 'MTN cameroun', 'ra', 'on'),
(59, 'ee', 'ee', 'ee', 77, 'gg', 'y@yahoo.fr', 'rr', 'rr', 'on'),
(60, 'fdfd', 'dfdfd', 'dfd', 3, 'fdfd', 'f', 'dfd', 'df', 'off'),
(61, 'toto78', 'tyty', 'tyty', 656677656, 'RAS', 'ty@yahoo.fr', 'ras', 'ras', 'on');

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE IF NOT EXISTS `demande` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `numero_demande` varchar(255) NOT NULL,
  `numero_planning` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `date_demande` text NOT NULL,
  `objet` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `reception` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lieu_intervention` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_aller` text NOT NULL,
  `date_retour` text NOT NULL,
  `prioriter` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `etat` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `demande`
--

INSERT INTO `demande` (`id`, `numero_demande`, `numero_planning`, `code`, `date_demande`, `objet`, `reception`, `lieu_intervention`, `date_aller`, `date_retour`, `prioriter`, `etat`) VALUES
(6, '14', '10', '10', '07-15-2021', 'ras', 'toto', 'cité verte', '09/29/2021', '11/04/2021', '', 'on'),
(12, '9', '19', '7890', '07-14-2021', 'ras', 'tyty', 'mokolo', '09/29/2021', '11/04/2021', 'minimale', 'on'),
(13, '8', '19', '7890', '07-14-2021', 'ras', 'popo', 'carosel', '09/29/2021', '11/04/2021', 'minimale', 'off'),
(14, '8', '19', '123', '07-29-2021', 'yup', 'topo', 'cité verte', '08/01/2021', '07/28/2021', 'minimale', 'off'),
(15, '12', '10', '7776', '08-18-2021', 'eas', 'Mr essimbi', 'carosel', '07/13/2021', '07/12/2021', 'minimale', 'on'),
(16, '45', '615', '6115', '08-27-2021', '88', 'hu,i', 'rde', '08/19/2021', '08/19/2021', 'minimale', 'on'),
(17, '10', '11', '123', '10-20-2021', 'ras', 'Mr essimbi', 'cité verte', '09/29/2021', '09/29/2021', 'Maximale', 'off');

-- --------------------------------------------------------

--
-- Structure de la table `effectuer`
--

CREATE TABLE IF NOT EXISTS `effectuer` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nom_technicien` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `etat` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

--
-- Contenu de la table `effectuer`
--

INSERT INTO `effectuer` (`id`, `nom_technicien`, `nom`, `etat`) VALUES
(1, 'toto', 'maintenance des appareils', 'on'),
(62, 'toto', 'mise a jours des ordinateurs', 'on'),
(63, 'obila', 'electrique', 'on'),
(64, 'dav', 'electrique', 'on'),
(65, 'obila', 'electrique', 'on'),
(84, 'patrique', 'mise a jours des ordinateurs', 'on'),
(85, 'merline', 'maintenance des systemes', 'on'),
(86, 'moi1', 'vidange des wc', 'on');

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

CREATE TABLE IF NOT EXISTS `historique` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `localisation` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dates` varchar(255) NOT NULL,
  `statut` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fin` varchar(255) NOT NULL,
  `descriptions` varchar(255) NOT NULL,
  `nom1` varchar(255) NOT NULL,
  `nom_technicien` varchar(255) NOT NULL,
  `type_traitement` varchar(255) NOT NULL,
  `descriptions_tache` varchar(255) NOT NULL,
  `dates_operation` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `historique`
--

INSERT INTO `historique` (`id`, `nom`, `localisation`, `dates`, `statut`, `fin`, `descriptions`, `nom1`, `nom_technicien`, `type_traitement`, `descriptions_tache`, `dates_operation`) VALUES
(1, 'vidange des wc', 'olembe', '01-03-2022', 'ANNULER', '06-03-2022', 'ras', 'salifou', 'patrique', 'ENREGISTREMENT', 'Mr/Mme toto a effectuer de Mr/Mme salifou', '06-03-2022');

-- --------------------------------------------------------

--
-- Structure de la table `historique2`
--

CREATE TABLE IF NOT EXISTS `historique2` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `type_traitement` varchar(255) NOT NULL,
  `descriptions` varchar(255) NOT NULL,
  `dates` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=175 ;

--
-- Contenu de la table `historique2`
--

INSERT INTO `historique2` (`id`, `type_traitement`, `descriptions`, `dates`) VALUES
(1, 'connexion', 'Mr toto a effectuer un connexion le', '12/02/2021 a 17h30m'),
(32, 'enregistrement', 'Mr toto a effectuer une connexion le', 'le03/12/2021 a 18:24'),
(41, 'MODIFICATION', 'Mr/Mme toto a modifier Mr/Mme jomouelle le', 'le 03/12/2021 a 19:21'),
(46, 'SUPPRESSION', 'Mr/Mme toto a effectuer une suppression  le', 'le 03/12/2021 a 19:36'),
(47, 'SUPPRESSION', 'Mr/Mme toto a effectuer une suppression ', 'le 15/12/2021 a 10:29'),
(48, 'SUPPRESSION', 'Mr/Mme toto a effectuer une suppression ', 'le 15/12/2021 a 10:29'),
(49, 'SUPPRESSION', 'Mr/Mme toto a effectuer une suppression ', 'le 15/12/2021 a 10:29'),
(50, 'SUPPRESSION', 'Mr/Mme toto a effectuer une suppression ', 'le 15/12/2021 a 10:29'),
(51, 'SUPPRESSION', 'Mr/Mme toto a effectuer une suppression ', 'le 15/12/2021 a 10:30'),
(52, 'MODIFICATION', 'Mr/Mme toto a modifier Mr/Mme tata ', 'le 15/12/2021 a 10:30'),
(53, 'SUPPRESSION', 'Mr/Mme  a effectuer une suppression ', 'le 22/12/2021 a 01:51'),
(54, 'SUPPRESSION', 'Mr/Mme  a effectuer une suppression ', 'le 22/12/2021 a 01:51'),
(55, 'SUPPRESSION', 'Mr/Mme  a effectuer une suppression ', 'le 22/12/2021 a 01:51'),
(56, 'SUPPRESSION', 'Mr/Mme  a effectuer une suppression ', 'le 22/12/2021 a 01:52'),
(57, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 28/12/2021 a 16:01'),
(58, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 28/12/2021 a 16:33'),
(59, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 28/12/2021 a 16:34'),
(60, 'SUPPRESSION', 'Mr/Mme  a effectuer une suppression ', 'le 28/12/2021 a 19:17'),
(61, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 28/12/2021 a 20:13'),
(62, 'SUPPRESSION', 'Mr/Mme  a effectuer une suppression ', 'le 29/12/2021 a 17:13'),
(63, 'SUPPRESSION', 'Mr/Mme  a effectuer une suppression ', 'le 29/12/2021 a 17:14'),
(64, 'SUPPRESSION', 'Mr/Mme  a effectuer une suppression ', 'le 29/12/2021 a 17:15'),
(65, 'SUPPRESSION', 'Mr/Mme  a effectuer une suppression ', 'le 30/12/2021 a 14:06'),
(66, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 18/01/2022 a 00:04'),
(67, 'SUPPRESSION', 'Mr/Mme  a effectuer une suppression ', 'le 18/01/2022 a 00:05'),
(68, 'SUPPRESSION', 'Mr/Mme  a effectuer une suppression ', 'le 18/01/2022 a 00:29'),
(69, 'SUPPRESSION', 'Mr/Mme  a effectuer une suppression ', 'le 18/01/2022 a 00:30'),
(70, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 19/01/2022 a 04:22'),
(71, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 19/01/2022 a 04:22'),
(72, 'SUPPRESSION', 'Mr/Mme toto a effectuer une suppression ', 'le 10/02/2022 a 12:46'),
(73, 'SUPPRESSION', 'Mr/Mme toto a effectuer une suppression ', 'le 10/02/2022 a 12:46'),
(74, 'SUPPRESSION', 'Mr/Mme toto a effectuer une suppression ', 'le 10/02/2022 a 12:47'),
(75, 'SUPPRESSION', 'Mr/Mme toto a effectuer une suppression ', 'le 10/02/2022 a 12:48'),
(76, 'SUPPRESSION', 'Mr/Mme toto a effectuer une suppression ', 'le 10/02/2022 a 12:48'),
(77, 'SUPPRESSION', 'Mr/Mme toto a effectuer une suppression ', 'le 10/02/2022 a 12:48'),
(78, 'SUPPRESSION', 'Mr/Mme toto a effectuer une suppression ', 'le 10/02/2022 a 12:48'),
(79, 'SUPPRESSION', 'Mr/Mme toto a effectuer une suppression ', 'le 10/02/2022 a 12:57'),
(80, 'SUPPRESSION', 'Mr/Mme toto a effectuer une suppression ', 'le 10/02/2022 a 12:57'),
(81, 'SUPPRESSION', 'Mr/Mme toto a effectuer une suppression ', 'le 10/02/2022 a 12:57'),
(82, 'MODIFICATION', 'Mr/Mme toto a modifier Mr/Mme tata ', 'le 10/02/2022 a 12:57'),
(83, 'SUPPRESSION', 'Mr/Mme toto a effectuer une suppression ', 'le 10/02/2022 a 13:02'),
(84, 'SUPPRESSION', 'Mr/Mme toto a effectuer une suppression ', 'le 10/02/2022 a 13:07'),
(85, 'SUPPRESSION', 'Mr/Mme toto a effectuer une suppression ', 'le 10/02/2022 a 13:07'),
(86, 'SUPPRESSION', 'Mr/Mme toto a effectuer une suppression ', 'le 10/02/2022 a 13:08'),
(87, 'SUPPRESSION', 'Mr/Mme toto a effectuer une suppression ', 'le 10/02/2022 a 13:09'),
(88, 'SUPPRESSION', 'Mr/Mme toto a effectuer une suppression ', 'le 10/02/2022 a 13:09'),
(89, 'SUPPRESSION', 'Mr/Mme toto a effectuer une suppression ', 'le 10/02/2022 a 13:13'),
(90, 'SUPPRESSION', 'Mr/Mme toto a effectuer une suppression ', 'le 10/02/2022 a 13:13'),
(91, 'SUPPRESSION', 'Mr/Mme  a effectuer une suppression ', 'le 15/02/2022 a 00:28'),
(92, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme tupo ', 'le 15/02/2022 a 00:29'),
(93, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme obila ', 'le 16/02/2022 a 21:52'),
(94, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme obila ', 'le 16/02/2022 a 21:53'),
(95, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme obila ', 'le 16/02/2022 a 21:55'),
(96, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme obila ', 'le 17/02/2022 a 01:09'),
(97, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme obila ', 'le 17/02/2022 a 01:10'),
(98, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 25/02/2022 a 15:51'),
(99, 'SUPPRESSION', 'Mr/Mme  a effectuer une suppression ', 'le 25/02/2022 a 15:51'),
(100, 'RESTAURATION', 'Mr/Mme toto a effectuer une restauration ', 'le 06/03/2022 a 14:47'),
(101, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme tupo ', 'le 21/03/2022 a 16:54'),
(102, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme tupo ', 'le 21/03/2022 a 16:54'),
(103, 'MODIFICATION', 'Mr/Mme toto a modifier Mr/Mme ryan ', 'le 26/03/2022 a 23:20'),
(104, 'MODIFICATION', 'Mr/Mme toto a modifier Mr/Mme ryan ', 'le 26/03/2022 a 23:23'),
(105, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme toto ', 'le 26/03/2022 a 23:45'),
(106, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme toto ', 'le 26/03/2022 a 23:48'),
(107, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme moi ', 'le 26/03/2022 a 23:53'),
(108, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme moi ', 'le 26/03/2022 a 23:54'),
(109, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme moi ', 'le 26/03/2022 a 23:56'),
(110, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme moi ', 'le 26/03/2022 a 23:57'),
(111, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme moi ', 'le 27/03/2022 a 00:03'),
(112, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme Manfo ', 'le 27/03/2022 a 00:03'),
(113, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme moi1 ', 'le 27/03/2022 a 00:06'),
(114, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme Manfo ', 'le 27/03/2022 a 00:06'),
(115, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme Manfo ', 'le 27/03/2022 a 00:07'),
(116, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme Manfo ', 'le 27/03/2022 a 00:09'),
(117, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme moi1 ', 'le 27/03/2022 a 00:12'),
(118, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme moi1 ', 'le 27/03/2022 a 00:13'),
(119, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme moi1 ', 'le 27/03/2022 a 00:15'),
(120, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme Manfo ', 'le 27/03/2022 a 00:15'),
(121, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme patrique ', 'le 27/03/2022 a 00:16'),
(122, 'SUPPRESSION', 'Mr/Mme toto a effectuer une suppression ', 'le 27/03/2022 a 00:25'),
(123, 'RESTAURATION', 'Mr/Mme toto a effectuer une restauration ', 'le 04/04/2022 a 19:49'),
(124, 'MODIFICATION', 'Mr/Mme toto a modifier Mr/Mme ryan ', 'le 04/04/2022 a 19:51'),
(125, 'MODIFICATION', 'Mr/Mme toto a modifier Mr/Mme ryan ', 'le 04/04/2022 a 19:52'),
(126, 'MODIFICATION', 'Mr/Mme toto a modifier Mr/Mme ryan ', 'le 04/04/2022 a 19:52'),
(127, 'SUPPRESSION', 'Mr/Mme toto a effectuer une suppression ', 'le 05/04/2022 a 10:55'),
(128, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 15/06/2022 a 20:30'),
(129, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 15/06/2022 a 20:39'),
(130, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 15/06/2022 a 20:42'),
(131, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 15/06/2022 a 20:45'),
(132, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 15/06/2022 a 20:46'),
(133, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 15/06/2022 a 20:47'),
(134, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 15/06/2022 a 20:51'),
(135, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 15/06/2022 a 20:56'),
(136, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 15/06/2022 a 20:56'),
(137, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 15/06/2022 a 20:57'),
(138, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 15/06/2022 a 20:57'),
(139, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 15/06/2022 a 20:57'),
(140, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 15/06/2022 a 21:00'),
(141, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 15/06/2022 a 21:00'),
(142, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 15/06/2022 a 21:01'),
(143, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 15/06/2022 a 21:01'),
(144, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 15/06/2022 a 21:02'),
(145, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 15/06/2022 a 21:03'),
(146, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 15/06/2022 a 21:04'),
(147, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 15/06/2022 a 21:04'),
(148, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 15/06/2022 a 21:05'),
(149, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 15/06/2022 a 21:06'),
(150, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 15/06/2022 a 21:06'),
(151, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 15/06/2022 a 21:08'),
(152, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 15/06/2022 a 21:08'),
(153, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 15/06/2022 a 21:09'),
(154, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 15/06/2022 a 21:09'),
(155, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 15/06/2022 a 21:12'),
(156, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 15/06/2022 a 21:13'),
(157, 'MODIFICATION', 'Mr/Mme  a effectuer une modification', 'le 15/06/2022 a 21:15'),
(158, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme jomouelle ', 'le 15/06/2022 a 21:54'),
(159, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme toto ', 'le 15/06/2022 a 21:55'),
(160, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme toto ', 'le 15/06/2022 a 21:57'),
(161, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme toto ', 'le 15/06/2022 a 21:59'),
(162, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme toto ', 'le 15/06/2022 a 21:59'),
(163, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme toto ', 'le 15/06/2022 a 22:00'),
(164, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme obila ', 'le 15/06/2022 a 22:01'),
(165, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme obila ', 'le 15/06/2022 a 22:05'),
(166, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme obila ', 'le 15/06/2022 a 22:05'),
(167, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme obila ', 'le 15/06/2022 a 22:05'),
(168, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme jomouelle ', 'le 15/06/2022 a 22:12'),
(169, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme toto ', 'le 15/06/2022 a 22:13'),
(170, 'ENREGISTREMENT', '', 'le 15/06/2022 a 22:53'),
(171, 'SUPPRESSION', 'Mr/Mme  a effectuer une suppression ', 'le 16/06/2022 a 11:26'),
(172, 'RESTAURATION', 'Mr/Mme  a effectuer une restauration ', 'le 16/06/2022 a 11:27'),
(173, 'MODIFICATION', 'Mr/Mme  a modifier Mr/Mme toto ', 'le 16/06/2022 a 13:28'),
(174, 'SUPPRESSION', 'Mr/Mme  a effectuer une suppression ', 'le 16/06/2022 a 13:28');

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
--

CREATE TABLE IF NOT EXISTS `intervention` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `localisation` text,
  `dates` text,
  `statut` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `fin` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `descriptions` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `nom_client` varchar(255) NOT NULL,
  `nom_technicien` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `etat` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `intervention`
--

INSERT INTO `intervention` (`id`, `code`, `nom`, `localisation`, `dates`, `statut`, `fin`, `descriptions`, `nom_client`, `nom_technicien`, `etat`) VALUES
(1, 'aze', '', 'ras', '2021-06-07', 'EN COURS', '2jours', 'ras', '', 'aze12', 'on'),
(5, 'ze', 'electrique', 'omnisport', '2021-11-09', 'ANNULER', '2021-12-10', 'ras', 'tata', 'dav', 'on'),
(6, 'gfg', 'mise a jours des ordinateurs', 'ecole de police', '2021-09-06', 'ACHEVER', '2021-09-16', 'ras', 'ryan', 'tupo', 'on'),
(7, 'hjjkh', 'maintenance des appareils', 'carosel', '2022-01-05', 'EN COURS', '2022-01-12', 'ras', 'toto', 'patrique', 'on'),
(8, 'opopo', 'maintenance des systemes', 'warda', '2022-01-05', 'EN COURS', '2022-01-30', 'RAS', 'jomouelle', 'merline', 'on'),
(9, 'hj', 'vidange des wc', 'olembe', '2022-03-01', 'ANNULER', '2022-03-06', 'ras', 'salifou', 'patrique', 'on'),
(10, 'ghgh', 'ras', '', '2022-02-09', 'ANNULER', '2022-02-14', 'ras', 'pati', 'dav', 'on'),
(13, 'tas', 'tas', 'ras', '2022-03-03', 'EN COURS', '2022-03-10', 'ras', 'toto', 'obila', 'on');

-- --------------------------------------------------------

--
-- Structure de la table `planning`
--

CREATE TABLE IF NOT EXISTS `planning` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `numero_planning` varchar(60) NOT NULL,
  `objectif` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `ressource` varchar(255) NOT NULL,
  `dates` date NOT NULL,
  `durees` varchar(10) NOT NULL,
  `etat` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `planning`
--

INSERT INTO `planning` (`id`, `numero_planning`, `objectif`, `description`, `ressource`, `dates`, `durees`, `etat`) VALUES
(1, '10', 'ras', 'ras', 'ras', '2021-08-18', '2 jours', 'on'),
(3, '10', 'ras', 'ras', 'ras', '2021-08-18', '5 jours', 'on'),
(4, '10', 'reparation d''un murs du ministere de la sante public', 'ras', 'ras', '2021-08-18', '3 mois', 'on'),
(5, '10', 'reparation d''un murs du ministere de la sante public', 'ras', 'ras', '0000-00-00', '3 mois', 'on');

-- --------------------------------------------------------

--
-- Structure de la table `techniciens`
--

CREATE TABLE IF NOT EXISTS `techniciens` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `specialiter` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dates_naissance` text NOT NULL,
  `dates_entrer` text NOT NULL,
  `adresse` text NOT NULL,
  `etat_service` varchar(30) NOT NULL,
  `etat` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `techniciens`
--

INSERT INTO `techniciens` (`id`, `matricule`, `nom`, `prenom`, `specialiter`, `dates_naissance`, `dates_entrer`, `adresse`, `etat_service`, `etat`) VALUES
(1, 'popo14', '', 'ekan', 'ras', '0000-00-00', '0000-00-00', '', '', 'on'),
(2, 'patricia147', 'dav', 'dav', 'ras', '0000-00-00', '0000-00-00', '', '', 'off'),
(4, 'tupo78', 'tupo', 'popo', 'technicien', '0000-00-00', '0000-00-00', 'toto@yahoo.fr', 'Licencier', 'on'),
(6, 'popo2', 'toto', '2022-04-01', 'rzs', '0000-00-00', '0000-00-00', 'toto@yahoo.fr', 'EN COURS', 'on'),
(7, 'patrique78', 'patrique', 'paul', 'ras', '2003-02-27', '2022-03-11', 'toto@yahoo.fr', 'EN COURS', 'on'),
(8, 'merline17', 'merline', 'cecile', 'ras', '0000-00-00', '0000-00-00', '', '', 'off'),
(9, 'patricia123', 'obila', 'manfo', 'ras', '0000-00-00', '0000-00-00', 'toto@yahoo.fr', 'Licencier', 'on'),
(10, 'M1QU35', 'Manfo', 'laurene', 'mecano', '1997-10-24', '2022-03-30', 'manfo@gmail.com', 'EN COURS', 'on'),
(11, 'moi77', 'moi1', 'laurene1', 'mecano', '1998-02-03', '2020-03-04', 'moi@gmai.com', 'EN COURS', 'on');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `numero_utilisateur` varchar(255) NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `roles` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `etat` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `numero_utilisateur`, `nom`, `prenom`, `adresse`, `roles`, `pwd`, `images`, `etat`) VALUES
(1, '123', 'toto', 'titi', 'toto@gmail.com', 'utilisateur', '1237', '1614695405542.jpg', 'on'),
(2, 'tyto789', 'tyty', 'youpi', 'yup@yahoo.fr', 'ras', 'toto123', '', 'on'),
(18, 'patrique789', 'solomon', 'patrique', 'patrique@yahoo.fr', 'utilisateurs', '987', '', 'on'),
(19, '789', 'sandrine', 'natacha', 'natacha@yahoo.fr', 'utilisateurs principale', 'natou123', '', 'on'),
(20, 'jordy77', 'jordy', 'jordy', 'jordy@gmail.com', 'ras', 'jordy', '', 'on');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
