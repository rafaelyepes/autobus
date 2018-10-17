-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 16 Octobre 2018 à 17:26
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `gestiondoc`
--

-- --------------------------------------------------------

--
-- Structure de la table `email02`
--

CREATE TABLE IF NOT EXISTS `email02` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emnom02` text NOT NULL,
  `emnom03` text NOT NULL,
  `emnom04` text NOT NULL,
  `email` text NOT NULL,
  `registro` text NOT NULL,
  `document` text NOT NULL,
  `usuario` varchar(35) NOT NULL,
  `clave` varchar(15) NOT NULL,
  `opc01` varchar(3) NOT NULL,
  `opc02` varchar(3) NOT NULL,
  `opc03` varchar(3) NOT NULL,
  `opc04` varchar(3) NOT NULL,
  `opc05` varchar(3) NOT NULL,
  `opc06` varchar(3) NOT NULL,
  `opc07` varchar(3) NOT NULL,
  `opc08` varchar(3) NOT NULL,
  `opc09` varchar(3) NOT NULL,
  `opc10` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=118 ;

--
-- Contenu de la table `email02`
--

INSERT INTO `email02` (`id`, `emnom02`, `emnom03`, `emnom04`, `email`, `registro`, `document`, `usuario`, `clave`, `opc01`, `opc02`, `opc03`, `opc04`, `opc05`, `opc06`, `opc07`, `opc08`, `opc09`, `opc10`) VALUES
(1, 'Alejandro De Lazaro', 'Alejandro', 'De Lazaro', 'alejandro.delazaro@lacroixmeats.com', 'S', 'S', 'alejandro.delazaro', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'Arlon Lopez', 'Arlon', 'Lopez', 'arlon.lopez@lacroixmeats.com', 'S', 'S', 'arlon.lopez', '9636', '', 'OUI', '', '', '', '', '', '', '', ''),
(4, 'Benoit Girard', 'Benoit', 'Girard', 'benoit.girard@lacroixmeats.com', 'S', 'S', 'benoit.girard', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'Carl Savard', 'Carl', 'Savard', 'carl.savard@lacroixmeats.com', 'S', 'S', 'carl.savard', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'Caroline Dufresne', 'Caroline', 'Dufresne', 'caroline.dufresne@lacroixmeats.com', 'S', 'S', 'caroline.dufresne', '', '', '', '', '', '', '', '', '', '', ''),
(7, 'Celine Sergerie', 'Celine', 'Sergerie', 'celine.sergerie@lacroixmeats.com', 'S', 'S', 'celine.sergerie', '', '', '', '', '', '', '', '', '', '', ''),
(8, 'Christian Desjardins', 'Christian', 'Desjardins', 'christian.desjardins@lacroixmeats.com', 'S', 'S', 'christian.desjardins', '', '', '', '', '', '', '', '', '', '', ''),
(9, 'Claude Otis', 'Claude', 'Otis', 'claude.otis@lacroixmeats.com', 'S', 'N', 'claude.otis', '', '', '', '', '', '', '', '', '', '', ''),
(11, 'Cruz Medellin', 'Cruz', 'Medellin', 'cruz.medellin@lacroixmeats.com', 'N', 'N', 'cruz.medellin', '', '', '', '', '', '', '', '', '', '', ''),
(13, 'David Richard', 'David', 'Richard', 'david.richard@lacroixmeats.com', 'N', 'N', 'david.richard', '', '', '', '', '', '', '', '', '', '', ''),
(15, 'Edna Camacho', 'Edna', 'Camacho', 'edna.camacho@lacroixmeats.com', 'S', 'S', 'edna.camacho', '', '', '', '', '', '', '', '', '', '', ''),
(16, 'Emilie Plamondon', 'Emilie', 'Plamondon', 'emilie.plamondon@lacroixmeats.com', 'S', 'S', 'emilie.plamondon', '2159', 'OUI', 'OUI', 'OUI', '', '', 'OUI', 'NON', 'NON', 'NON', ''),
(17, 'Eric Murray', 'Eric', 'Murray', 'eric.murray@lacroixmeats.com', 'S', 'S', 'eric.murray', '', '', '', '', '', '', '', '', '', '', ''),
(21, 'Francine Moreau', 'Francine', 'Moreau', 'francine.moreau@lacroixmeats.com', 'S', 'S', 'francine.moreau', '2015', '', 'OUI', '', '', '', '', '', '', '', ''),
(22, 'Frederic Bibeau', 'Frederic', 'Bibeau', 'frederic.bibeau@lacroixmeats.com', 'S', 'S', 'frederic.bibeau', '', '', '', '', '', '', '', '', '', '', ''),
(23, 'Glenn Cardoso', 'Glenn', 'Cardoso', 'glenn.cardoso@lacroixmeats.com', 'S', 'S', 'glenn.cardoso', '', '', '', '', '', '', '', '', '', '', ''),
(26, 'Hygo Bisimwa', 'Hygo', 'Bisimwa', 'hygo.bisimwa@lacroixmeats.com', 'S', 'S', 'hygo.bisimwa', '', '', '', '', '', '', '', '', '', '', ''),
(27, 'Jacques Duchesne', 'Jacques', 'Duchesne', 'jacques.duchesne@lacroixmeats.com', 'S', 'S', 'jacques.duchesne', '', '', '', '', '', '', '', '', '', '', ''),
(33, 'Josue Estrada', 'Josue', 'Estrada', 'josue.estrada@lacroixmeats.com', 'S', 'S', 'josue.estrada', '', '', '', '', '', '', '', '', '', '', ''),
(34, 'Julie Blier', 'Julie', 'Blier', 'Julie.blier@lacroixmeats.com', 'S', 'N', 'julie.blier', '', '', '', '', '', '', '', '', '', '', ''),
(35, 'Julie Viger', 'Julie', 'Viger', 'Julie.Viger@lacroixmeats.com', 'S', 'S', 'Julie.Viger', '7433', 'OUI', 'OUI', 'OUI', '', '', 'OUI', 'NON', 'NON', 'NON', ''),
(37, 'Lorena Gasca', 'Lorena', 'Gasca', 'lorena.gasca@lacroixmeats.com', 'S', 'S', 'lorena.gasca', '', '', '', '', '', '', '', '', '', '', ''),
(40, 'Manuel De Almeida', 'Manuel', 'De Almeida', 'manuel.dealmeida@lacroixmeats.com', 'S', 'S', 'manuel.dealmeida', '', '', '', '', '', '', '', '', '', '', ''),
(41, 'Marc-Andre Tremblay', 'Marc-Andre', 'Tremblay', 'marcandre.tremblay@lacroixmeats.com', 'S', 'S', 'marcandre.tremblay', '9650102', 'OUI', 'OUI', 'OUI', 'OUI', 'OUI', 'OUI', '', '', '', ''),
(42, 'Maria Suarez', 'Maria', 'Suarez', 'maria.suarez@lacroixmeats.com', 'S', 'S', 'maria.suarez', '', '', '', '', '', '', '', '', '', '', ''),
(43, 'Marie-Andree St-Pierre', 'Marie-Andree', 'St-Pierre', 'marieandree.stpierre@lacroixmeats.com', 'N', 'S', 'marieandree.stpierre', '7576', '', '', 'OUI', '', '', 'OUI', 'NON', 'NON', 'NON', ''),
(45, 'Marie-Pier Larouche', 'Marie-Pier', 'Larouche', 'marie-pier.larouche@lacroixmeats.com', 'S', 'S', 'marie-pier.larouche', '2014', '', 'OUI', 'OUI', '', '', '', 'NON', 'NON', 'NON', ''),
(46, 'Maxime Lacroix', 'Maxime', 'Lacroix', 'max@lacroixmeats.com', 'S', 'S', 'maxime.lacroix', '', '', '', '', '', '', '', '', '', '', ''),
(47, 'Maynor Lopez', 'Maynor', 'Lopez', 'maynor.lopez@lacroixmeats.com', 'S', 'S', 'maynor.lopez', '3711', '', 'OUI', '', '', '', '', '', '', '', ''),
(49, 'Mélanie Royer', 'Mélanie', 'Royer', 'melanie.royer@lacroixmeats.com', 'N', 'S', 'melanie.royer', '9636', 'OUI', 'OUI', 'OUI', '', '', '', '', '', '', 'OUI'),
(50, 'Michael Beauregard', 'Michael', 'Beauregard', 'michael.beauregard@lacroixmeats.com', 'S', 'S', 'michael.beauregard', '', '', '', '', '', '', '', '', '', '', ''),
(52, 'Michael Lacroix', 'Michael', 'Lacroix', 'michael@lacroixmeats.com', 'S', 'S', 'michael.lacroix', '', '', '', '', '', '', '', '', '', '', ''),
(54, 'Usine Larouche', 'Usine', 'Larouche', 'marie-pier.larouche@lacroixmeats.com', 'S', 'S', 'Usine', '2014', '', 'OUI', 'OUI', '', '', '', '', '', '', ''),
(56, 'Nathaniel Pereira', 'Nathaniel', 'Pereira', 'nathaniel.pereira@lacroixmeats.com', 'S', 'S', 'nathaniel.pereira', '7314', '', 'OUI', '', '', '', '', '', '', '', ''),
(57, 'Paula Franco', 'Paula', 'Franco', 'paula.franco@lacroixmeats.com', 'S', 'S', 'paula.franco', '2587', 'OUI', 'OUI', 'OUI', 'OUI', 'OUI', 'OUI', '', '', '', ''),
(63, 'rafael Yepes', 'rafael', 'Yepes', 'rafael.yepes@lacroixmeats.com', 'S', 'S', 'rafael.yepes', '7458', 'OUI', 'OUI', 'OUI', 'OUI', 'OUI', 'OUI', 'OUI', 'OUI', 'OUI', ''),
(64, 'Rito Chavez', 'Rito', 'Chavez', 'rito.chavez@lacroixmeats.com', 'S', 'S', 'rito.chavez', '', '', '', '', '', '', '', '', '', '', ''),
(65, 'Mayra Martinez', 'Mayra', 'Martinez', 'mayra.martinez@lacroixmeats.com', 'N', 'N', 'mayra.martinez', '7814', 'OUI', '', '', '', '', '', '', '', '', ''),
(67, 'Solange Leduc', 'Solange', 'Leduc', 'solange.leduc@lacroixmeats.com', 'S', 'S', 'solange.leduc', '3345', '', 'OUI', '', '', '', '', '', '', '', ''),
(68, 'Tony Arruda', 'Tony', 'Arruda', 'tony.arruda@lacroixmeats.com', 'S', 'S', 'tony.arruda', '', '', '', '', '', '', '', '', '', '', ''),
(69, 'Veronique Henrichon', 'Veronique', 'Henrichon', 'veronique.henrichon@lacroixmeats.com', 'S', 'S', 'veronique.henrichon', '', '', '', '', '', '', '', '', '', '', ''),
(71, 'Virginia Indo', 'Virginia', 'Indo', 'virginia.indo@lacroixmeats.com', 'S', 'S', 'virginia.indo', '', '', '', '', '', '', '', '', '', '', ''),
(72, ' ', '', '', 'cqdocuments@lacroixmeats.com', 'N', 'S', 'cqdocuments', '', '', '', '', '', '', '', '', '', '', ''),
(73, 'Yvon Dandurand', 'Yvon', 'Dandurand', 'yvon.dandurand@lacroixmeats.com', 'S', 'S', 'yvon.dandurand', '', '', '', '', '', '', '', '', '', '', ''),
(74, 'Zlatan Brankovic', 'Zlatan', 'Brankovic', 'zlatan.brankovic@lacroixmeats.com', 'S', 'S', 'zlatan.brankovic', '8565', '', 'OUI', '', '', '', '', '', '', '', ''),
(75, ' ', '', '', 'sstdocuments@lacroixmeats.com', 'N', 'N', 'sstdocuments', '', '', '', '', '', '', '', '', '', '', ''),
(76, 'Pezhman mirshahi', 'Pezhman', 'mirshahi', 'Pezhman.mirshahi@lacroixmeats.com', 'S', 'S', 'Pezhman.mirshahi', '7812', '', 'OUI', '', '', '', '', '', '', '', 'OUI'),
(78, 'Kyle Cardoso', 'Kyle', 'Cardoso', 'Kyle.cardoso@lacroixmeats.com', 'S', 'S', 'Kyle.cardoso', '4514', '', 'OUI', 'OUI', '', '', 'OUI', '', '', '', ''),
(79, 'BARATTAGE ', 'BARATTAGE', '', 'barattage@lacroixmeats.com', 'N', 'S', 'BARATTAGE', '1234', 'OUI', '', '', '', '', '', 'NON', 'NON', 'NON', ''),
(80, 'Heyner delacruz', 'Heyner', 'delacruz', 'heyner.delacruzo@lacroixmeats.com', 'S', 'S', 'Heyner.delacruz', '6767', 'OUI', '', '', '', '', '', '', '', '', ''),
(83, 'Guerline Filibert', 'Guerline', 'Filibert', 'guerline.filibert@lacroixmeats.com', 'S', 'S', 'guerline.filibert', '3265', 'OUI', 'OUI', 'OUI', '', '', '', '', '', '', 'OUI'),
(84, 'Ligne-601 ', 'Ligne-601', '', '601@lacroixmeats.com', 'N', 'S', '601', '1234', '', 'OUI', '', '', '', '', '', '', '', ''),
(85, 'Ligne-602 ', 'Ligne-602', '', '602@lacroixmeats.com', 'N', 'S', '602', '1234', '', 'OUI', '', '', '', '', '', '', '', ''),
(86, 'Fondue Fondue', 'Fondue', 'Fondue', 'fondue@lacroixmeats.com', 'N', 'S', 'Fondue', '1234', '', 'OUI', '', '', '', '', '', '', '', ''),
(87, 'Salle 162 ', 'Salle 162', '', 'salle162@lacroixmeats.com', 'N', 'S', 'Salle162', '1234', '', 'OUI', '', '', '', '', '', '', '', ''),
(88, 'Salle 131 ', 'Salle 131', '', 'salle131@lacroixmeats.com', 'N', 'S', 'Salle131', '1234', '', 'OUI', '', '', '', '', '', '', '', ''),
(89, 'Salle 132 ', 'Salle 132', '', 'salle132@lacroixmeats.com', 'N', 'S', 'Salle132', '1234', '', 'OUI', '', '', '', '', '', '', '', ''),
(91, 'Ligne-603 ', 'Ligne-603', '', '603@lacroimeats.com', 'N', 'S', '603', '1234', '', 'OUI', '', '', '', '', '', '', '', ''),
(92, 'Ligne-604 ', 'Ligne-604', '', '604@lacroimeats.com', 'N', 'S', '604', '1234', '', 'OUI', '', '', '', '', '', '', '', ''),
(93, 'Ligne-605 ', 'Ligne-605', '', '605@lacroixmeats.com', 'N', 'S', '605', '1234', '', 'OUI', '', '', '', '', '', '', '', ''),
(94, 'Monique Bibeau', 'Monique', 'Bibeau', 'Monique.bibeau@lacroixmeats.com', 'N', 'S', 'Monique.bibeau', '5454', '', 'OUI', '', '', '', '', '', '', '', ''),
(95, 'frigo poulet', 'frigo', 'poulet', 'frigo.poulet@lacroixmeats.com', 'N', 's', 'frigo.poulet', '1723', '', 'OUI', '', '', '', '', '', '', '', ''),
(96, 'frigo boeuf', 'frigo', 'boeuf', 'frigo.boeuf@lacroixmeats.com', 'N', 'S', 'frigo.boeuf', '0309', '', 'OUI', '', '', '', '', '', '', '', ''),
(97, 'joel rodier', 'joel', 'rodier', 'joel.rodier@lacroixmeats.com', 'N', 'S', 'joel.rodier', '9874', '', 'OUI', 'OUI', '', '', '', '', '', '', 'OUI'),
(98, 'legumes legumes', 'legumes', 'legumes', 'legumes@lacroixmeats.com', 'N', 'S', 'legumes', '1234', '', 'OUI', '', '', '', '', '', '', '', ''),
(99, 'Yannick Nnomo', 'Yannick', 'Nnomo', 'yannick.nnomo@lacroixmeats.com', 'N', 'S', 'yannick.nnomo', '3258', '', 'OUI', '', '', '', '', '', '', '', 'OUI'),
(100, 'Abbas Ghafarian', 'Abbas', 'Ghafarian', 'abbas.ghafarian@lacroixmeats.com', 'N', 'S', 'Abbas.ghafarian', '7993', '', 'OUI', '', '', '', '', '', '', '', 'OUI'),
(101, 'Epices Epices', 'Epices', 'Epices', 'epices@lacroixmeats.com', 'N', 'S', 'Epices', '1234', '', '', '', '', '', '', '', '', '', ''),
(102, 'Shipping Shipping', 'Shipping', 'Shipping', 'shipping@lacroixmeats.com', 'N', 'S', 'Shipping', '4546', '', 'OUI', '', '', '', '', '', '', '', ''),
(103, 'Dany Pelletier', 'Dany', 'Pelletier', 'dany.pelletier@lacroixmeats.com', 'S', 'N', 'dany.pelletier', '', '', '', '', '', '', '', '', '', '', ''),
(104, 'Cecilia Bejarano', 'Cecilia', 'Bejarano', 'cecilia.bejarano@lacroixmeats.com', 'S', 'S', 'Cecilia.bejarano', '6557', 'OUI', 'OUI', '', '', '', '', '', '', '', 'OUI'),
(105, 'Poulet Vrac', 'Poulet', 'Vrac', 'poulet.vrac@lacroixmeats.com', 'N', 'S', 'poulet.vrac', '1234', '', 'OUI', '', '', '', '', '', '', '', ''),
(106, 'Ligne-606 ', 'Ligne-606', '', '606@lacroixmeats.com', 'N', 'S', '606', '1234', '', 'OUI', '', '', '', '', '', '', '', ''),
(107, 'Fromage ', 'Fromage', '', 'fromage@lacroixmeats.com', 'N', 'S', 'fromage', '1234', '', 'OUI', '', '', '', '', '', '', '', ''),
(108, 'Coupe Poulet', 'Coupe', 'Poulet', 'coupe.poulet@lacroixmeats.com', 'N', 'S', 'coupe.poulet', '1234', '', 'OUI', '', '', '', '', '', '', '', ''),
(109, 'acia acia', 'acia', 'acia', 'acia@lacroixmeats.com', '', 's', 'acia', '12345', '', 'OUI', '', '', '', '', '', '', '', ''),
(110, 'Erick Rivas', 'Erick', 'Rivas', 'erick.rivas@lacroixmeats.com', 'S', 'S', 'erick.rivas', '6325', '', 'OUI', '', '', '', '', '', '', '', ''),
(111, 'Ligne-607 ', 'Ligne-607', '', '607@lacroixmeats.com', 'N', 'S', '607', '1234', '', 'OUI', '', '', '', '', '', '', '', ''),
(112, 'Ligne-608 ', 'Ligne-608', '', '608@lacroixmeats.com', 'N', 'S', '608', '1234', '', 'OUI', '', '', '', '', '', '', '', ''),
(113, 'Ligne-609 ', 'Ligne-609', '', '609@lacroixmeats.com', 'N', 'S', '609', '1234', '', 'OUI', '', '', '', '', '', '', '', ''),
(114, 'Ligne-610 ', 'Ligne-610', '', '610@lacroixmeats.com', 'N', 'S', '610', '1234', '', 'OUI', '', '', '', '', '', '', '', ''),
(115, 'Ligne-611 ', 'Ligne-611', '', '611@lacroixmeats.com', 'N', 'S', '611', '1234', '', 'OUI', '', '', '', '', '', '', '', ''),
(116, 'Douaniers 167', 'Douaniers', '167', 'douaniers.167@lacroixmeats.com', 'N', 'S', 'douaniers.167', '1234', '', 'OUI', '', '', '', '', '', '', '', ''),
(117, 'Thermo', 'Thermo', '', 'thermo.lacroix@lacroixmeats.com', 'N', 'S', 'Thermo', '9876', '', 'OUI', '', '', '', '', '', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
