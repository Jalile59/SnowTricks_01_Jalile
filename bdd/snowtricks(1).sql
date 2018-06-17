-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 17 juin 2018 à 11:48
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `snowtricks`
--

-- --------------------------------------------------------

--
-- Structure de la table `advert`
--

DROP TABLE IF EXISTS `advert`;
CREATE TABLE IF NOT EXISTS `advert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id_id` int(11) DEFAULT NULL,
  `figure_id_id` int(11) DEFAULT NULL,
  `commentContent` longtext COLLATE utf8_unicode_ci,
  `comment_createDate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5F9E962A9D86650F` (`user_id_id`),
  KEY `IDX_5F9E962A6D69186E` (`figure_id_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `user_id_id`, `figure_id_id`, `commentContent`, `comment_createDate`) VALUES
(2, 1, 85, 'un commentaire', '2018-05-21 13:24:35'),
(3, 1, 85, 'un deuxième commentaire', '2018-05-21 14:28:35'),
(4, 1, 85, 'un troisième commentaire', '2018-05-21 14:29:39'),
(5, 1, 85, 'un troisième commentaire', '2018-05-21 14:30:27'),
(6, 1, 85, 'un 4eme commentaire', '2018-05-21 14:31:09'),
(7, 1, 85, 'un 5eme commentaire', '2018-05-21 14:32:24'),
(8, 1, 85, 'un 6eme', '2018-05-21 14:32:53'),
(9, 1, 85, 'un 6eme', '2018-05-21 14:38:40'),
(10, 1, 85, 'un 7eme', '2018-05-21 14:39:19'),
(11, 1, 85, 'un 7eme', '2018-05-21 14:39:35'),
(12, 1, 85, 'un commentaire', '2018-05-23 16:28:14'),
(15, 1, 85, 'test', '2018-06-08 15:47:49'),
(16, 1, 85, 'test', '2018-06-08 15:48:24'),
(17, 1, 85, 'test', '2018-06-08 15:49:03'),
(18, 1, 87, 'un comments', '2018-06-09 11:03:19'),
(19, 1, 87, 'un comments', '2018-06-09 11:03:43'),
(20, 1, 87, 'un comments', '2018-06-09 11:04:07'),
(21, 1, 87, 'un comments', '2018-06-09 11:04:56'),
(22, 1, 87, 'un comments', '2018-06-09 11:06:11'),
(23, 1, 87, 'un comments', '2018-06-09 11:07:15'),
(24, 1, 87, 'un comments', '2018-06-09 11:08:18'),
(25, 1, 87, 'un comments', '2018-06-09 11:08:37'),
(26, 1, 87, 'un comments', '2018-06-09 11:09:28'),
(27, 1, 87, 'un comments', '2018-06-09 11:09:59'),
(28, 1, 87, 'un comments', '2018-06-09 11:14:22'),
(29, 1, 87, 'un comments', '2018-06-09 11:20:26'),
(30, 1, 87, 'un comments', '2018-06-09 11:21:32'),
(31, 1, 87, 'un comments', '2018-06-09 11:21:57'),
(32, 1, 87, 'un comments', '2018-06-09 11:22:38'),
(33, 1, 85, 'id 85', '2018-06-09 11:23:19'),
(34, 1, 87, 'un 2', '2018-06-09 14:41:26');

-- --------------------------------------------------------

--
-- Structure de la table `figures`
--

DROP TABLE IF EXISTS `figures`;
CREATE TABLE IF NOT EXISTS `figures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `figure_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `figure_description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `figure_createdate` datetime NOT NULL,
  `figure_updatedate` datetime DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `categorie` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_ABF1009AC44C175F` (`figure_name`),
  KEY `IDX_ABF1009A67B3B43D` (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `figures`
--

INSERT INTO `figures` (`id`, `figure_name`, `figure_description`, `figure_createdate`, `figure_updatedate`, `users_id`, `categorie`) VALUES
(85, 'GOOFY', 'Si vous comptez vous initier au snowboard cet hiver, pour bien réussir vos débuts, la première chose à savoir c\'est si vous mettrez le pied droit ou alors le pied gauche en avant sur la planche, et quel pied vous mettrez derrière pour vous donner de l\'impulsion.', '2018-05-04 13:36:35', NULL, 1, ''),
(87, 'Ariel', 'Air ou Aerial Saut avec de l’amplitude,  dans une courbe (par exemple en halfpipe) on combine le saut avec une légère rotation pour réceptionner face à la descente.', '2018-05-05 10:24:34', NULL, 2, ''),
(89, 'backside', 'Effectuer une rotation frontside c\'est s\'engager avec le ventre et la poitrine face à la réception lors du premier quart de tour. Sur la piste, l\'appui va se faire grâce au pied arrière. La planche va commencer', '2018-05-05 10:27:49', NULL, 2, ''),
(90, 'CAB', 'Figure qui consiste à réaliser un 360 front en fakie. Le nom vient du skateur Steve Caballero, premier à réaliser cette figure. En skateboard la figure consistait à rouler avec ses appuis normaux( regular, car il était, le pied droit sur le tail ) en arrière puis de faire un tour avec sa planche sous les pieds…\r\nLe cab est donc un fakie 360° (le half cab souvent utilisé en snoboard est un fakie 180).', '2018-05-05 10:29:48', NULL, 2, ''),
(92, 'Grab', 'c’est attraper et tenir sa planche avec la main lors d’un saut. Selon l’endroit où l’on grab sa board, le grab porte un nom différent : indy, mute, japan, etc.', '2018-05-05 10:32:53', NULL, 2, ''),
(93, 'Butteur Stricks', 'n saute normalement mais au lieu de raterir devant(en ligne droite),on ira soit vers la droite,soit vers la gauche,on saute vers le coté.Ce qui n\'empeche pas de sauter le hip en entier si la vitesse qu\'on a prise le permet', '2018-05-05 10:37:14', NULL, 2, ''),
(95, 'test 2', 'une description', '2018-05-05 15:18:31', NULL, 2, ''),
(111, 'dazt', 'fzeczzec', '2018-06-08 15:01:11', NULL, 1, 'ski'),
(113, 'dezed', 'dzed', '2018-06-13 17:35:26', NULL, 1, 'ski'),
(116, 'dezdzed', 'dzedz', '2018-06-13 18:01:12', NULL, 1, 'ski'),
(124, 'ferfferferferferf', 'ferf', '2018-06-13 21:10:41', NULL, 1, 'ski');

-- --------------------------------------------------------

--
-- Structure de la table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
CREATE TABLE IF NOT EXISTS `pictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `figure_id` int(11) DEFAULT NULL,
  `picture_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture_createdate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8F7C2FC05C011B5` (`figure_id`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `pictures`
--

INSERT INTO `pictures` (`id`, `figure_id`, `picture_link`, `picture_createdate`) VALUES
(67, 85, 'da071b69ab8baf1c6c32579a9b34f6a5.jpg', '2018-05-04 13:36:35'),
(68, 87, 'cbfb911307940f5bece435e2cc07a77c.jpg', '2018-05-05 10:24:34'),
(70, 89, 'c96660f606fbe79e3e3d09e106107a13.jpg', '2018-05-05 10:27:49'),
(71, 90, '26b4fd3ceef3e626dce6b027d98092f9.jpg', '2018-05-05 10:29:48'),
(73, 92, '5d3db6f5854418004b11187d69529158.jpg', '2018-05-05 10:32:53'),
(74, 93, '27153bb9d8094e3bb8e63e158d0966d0.jpg', '2018-05-05 10:37:14'),
(76, 95, '33146ba4f6596a36cd01333a7a1cdf8c.jpg', '2018-05-05 15:18:31'),
(77, 95, '1c2313678aacc7f6fdb763ae8de4c0f5.jpg', '2018-05-05 15:18:31'),
(111, 111, '806144c61f4ea47193bd42d96eb15a0f.jpg', '2018-06-08 15:01:11'),
(113, 113, '16d808ba7e03ad74cddbec3890d425bf.jpg', '2018-06-13 17:35:26'),
(116, 116, '05ea549e03a4cb6ec6be0160e3b0f980.jpg', '2018-06-13 18:01:12'),
(124, 124, 'c7a1b29d17a9ea4c50485f90836467e1.jpg', '2018-06-13 21:10:41');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `userCreateDate` datetime NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userphoto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `salt`, `roles`, `userCreateDate`, `mail`, `userphoto`) VALUES
(1, 'jalile', '123456789', '', 'a:1:{i:0;s:9:\"ROLE_USER\";}', '2018-05-19 11:13:31', 'jal.djellouli@gmail.com', 'a2b805dab20459e2a422b7017eb91632.PNG'),
(2, 'jalile2', '123456789', '', 'a:1:{i:0;s:9:\"ROLE_USER\";}', '2018-05-19 12:22:28', 'jal.djellouli@gmail.com', 'a2b805dab20459e2a422b7017eb91632.PNG'),
(3, 'jalile3', '123456789', '', 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}', '2018-05-19 12:40:22', 'jj@holy.fr', 'a2b805dab20459e2a422b7017eb91632.PNG'),
(7, 'testt', '123456', '', 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}', '2018-06-08 15:38:51', 'j@g', '4e85225501f7f0bd357d29c8833b85e0.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `figurevideo_id` int(11) DEFAULT NULL,
  `videolink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `videocreatedate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_29AA643257D658B1` (`figurevideo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `videos`
--

INSERT INTO `videos` (`id`, `figurevideo_id`, `videolink`, `videocreatedate`) VALUES
(1, NULL, 'freferf', '2018-05-10 11:48:33'),
(20, 111, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/HRF8NpoFteg\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', '2018-06-08 15:01:11'),
(22, 113, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/pMv0wZNcc_k\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', '2018-06-13 17:35:26'),
(25, 116, 'dzed', '2018-06-13 18:01:12'),
(33, 124, 'ferf', '2018-06-13 21:10:41');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_5F9E962A6D69186E` FOREIGN KEY (`figure_id_id`) REFERENCES `figures` (`id`),
  ADD CONSTRAINT `FK_5F9E962A9D86650F` FOREIGN KEY (`user_id_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `figures`
--
ALTER TABLE `figures`
  ADD CONSTRAINT `FK_ABF1009A67B3B43D` FOREIGN KEY (`users_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `FK_8F7C2FC05C011B5` FOREIGN KEY (`figure_id`) REFERENCES `figures` (`id`);

--
-- Contraintes pour la table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `FK_29AA643257D658B1` FOREIGN KEY (`figurevideo_id`) REFERENCES `figures` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
