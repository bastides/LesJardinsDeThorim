-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 04 Mars 2016 à 20:10
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `lesjardinsdethorim`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `object` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_472B783A7E9E4C8C` (`photo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `gallery`
--

INSERT INTO `gallery` (`id`, `photo_id`, `title`) VALUES
(1, 170, 'Photo N°1'),
(2, 171, 'Photo N°2'),
(3, 172, 'Photo N°3'),
(4, 173, 'Photo N°4');

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=174 ;

--
-- Contenu de la table `photo`
--

INSERT INTO `photo` (`id`, `url`, `alt`) VALUES
(163, 'jpeg', 'produit1.jpg'),
(164, 'jpeg', 'produit2.jpg'),
(165, 'jpeg', 'produit3.jpg'),
(166, 'jpeg', 'profil1.jpg'),
(167, 'jpeg', 'profil2.jpg'),
(168, 'jpeg', 'profil3.jpg'),
(169, 'jpeg', 'profil4.jpg'),
(170, 'jpeg', 'galerie1.jpg'),
(171, 'jpeg', 'galerie2.jpg'),
(172, 'jpeg', 'galerie3.jpg'),
(173, 'jpeg', 'galerie4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `photo_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_D34A04AD7E9E4C8C` (`photo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `photo_id`) VALUES
(1, 'Entretien', 'Cette formule comprend : les soins, la taille, l''élagage, l''arrosage et les traitements phytosanitaires (contrat d''entretien possible).', 163),
(2, 'Entretien Plus', 'Cette formule comprend : les soins, la taille, l''élagage, l''arrosage les traitements phytosanitaires, l''engazonnement, ainsi que la pose de plantes de saison.', 164),
(3, 'Aménagement', 'Cette formule comprend : la création complète de votre espace vert, l''évolution au fil des saisons, une mise en valeur à l''aide d''éclairages, un arrosage automatique, ainsi qu''un entretien régulier.', 165);

-- --------------------------------------------------------

--
-- Structure de la table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8157AA0F7E9E4C8C` (`photo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `profile`
--

INSERT INTO `profile` (`id`, `name`, `description`, `facebook`, `twitter`, `linkedin`, `photo_id`) VALUES
(1, 'L''école de la motte', 'Ecole primaire du village de la Motte dispose d''une vaste cour de récréation gazonnée d''un aménagement ludique et hormonieux mélant zone de jeu et zone de repos pour le bien être des enfants et des professeurs.', 'https://www.facebook.com/', 'https://twitter.com/', 'https://fr.linkedin.com/', 166),
(2, 'La mairie de Vichy', 'La mairie de Vichy soucieuse des normes de sécurité fait appel à nous lors de ses travaux d''élagage notre matèriel adapter nous permet de travailler en toute sécurité et aussi de garantir la sécurité des riverains.', 'https://www.facebook.com/', 'https://twitter.com/', 'https://fr.linkedin.com/', 167),
(3, 'Le stade de Clermont', 'Le stade de Clermont fait régulierement appel à nous pour entretenir la pelouse, la mettre en valeur et rafraichir les marquages au sol. Tonte minutieuse et éclairage sont nécessaire avant les grandes occasions.', 'https://www.facebook.com/', 'https://twitter.com/', 'https://fr.linkedin.com/', 168),
(4, 'L''ambassade de Tunisie', 'L''ambassade de Tunisie nécessite une attention toute particulière. Arborant une végétation issues d''un climat chaud, notre savoir faire nous permet de les faire pousser sous un climat tempéré.', 'https://www.facebook.com/', 'https://twitter.com/', 'https://fr.linkedin.com/', 169);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `salt`, `roles`) VALUES
(10, 'Alexandre', 'Alexandre', '', 'a:1:{i:0;s:10:"ROLE_ADMIN";}'),
(11, 'Marine', 'Marine', '', 'a:1:{i:0;s:10:"ROLE_ADMIN";}'),
(12, 'Anna', 'Anna', '', 'a:1:{i:0;s:10:"ROLE_ADMIN";}');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `FK_472B783A7E9E4C8C` FOREIGN KEY (`photo_id`) REFERENCES `photo` (`id`);

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04AD7E9E4C8C` FOREIGN KEY (`photo_id`) REFERENCES `photo` (`id`);

--
-- Contraintes pour la table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `FK_8157AA0F7E9E4C8C` FOREIGN KEY (`photo_id`) REFERENCES `photo` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
