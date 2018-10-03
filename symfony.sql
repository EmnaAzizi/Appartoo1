-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 03 Octobre 2018 à 19:50
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `symfony`
--

-- --------------------------------------------------------

--
-- Structure de la table `fos_user`
--

CREATE TABLE IF NOT EXISTS `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `race` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `famille` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nourriture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Contenu de la table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `race`, `age`, `famille`, `nourriture`) VALUES
(2, 'MarsiD', 'marsid', 'emna@gmail.com', 'emna@gmail.com', 1, NULL, '$2y$13$ECksmvP8wOwV.bfNzpSEgej9X.y43fnVrrxBC5P/UTN6qMmZKmqpe', '2018-10-03 17:42:36', NULL, NULL, 'a:0:{}', 'Bleu', '2', 'Noir', 'Fruit'),
(3, 'MarisA', 'MarisA', 'azkkz@jkkd.com', 'azkkz@jkkd.com', 1, NULL, '$2y$13$Fu8ucAoZqNHhpl6Ep0hMHOZW7IY5aU/4ClV.eP7HM6XqxFuG2CzIy', '2018-10-02 20:01:54', NULL, NULL, 'a:0:{}', 'Noir', '3', 'Blanc', 'Fruit'),
(5, 'MarisB', 'MarisB', 'ldldl@gdjdj.com', 'ldldl@gdjdj.com', 1, NULL, '$2y$13$m2y2ivs3/S7wXgswuNcZt.4lIIcd3WtbAqc8NTqx0hvKVs0oGAFCC', NULL, NULL, NULL, 'a:0:{}', 'Blanc', '5', 'Blache', 'legumes'),
(7, 'MarsiC', 'MarsiC', 'ddd@jdjd12', 'ddd@jdjd12', 1, NULL, '$2y$13$h0QfSPb/ycqU2v7tXI/17uqz.B4Um1F5gWrsc6rueCAX16gRk9z9u', NULL, NULL, NULL, 'a:0:{}', 'Blanc', '10', 'Rouge', 'Fruit');

-- --------------------------------------------------------

--
-- Structure de la table `marisupilami_relations`
--

CREATE TABLE IF NOT EXISTS `marisupilami_relations` (
  `user_id` int(11) NOT NULL,
  `amis_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`amis_id`),
  KEY `IDX_D610A6D2A76ED395` (`user_id`),
  KEY `IDX_D610A6D2706F82C7` (`amis_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `marisupilami_relations`
--

INSERT INTO `marisupilami_relations` (`user_id`, `amis_id`) VALUES
(2, 5);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `marisupilami_relations`
--
ALTER TABLE `marisupilami_relations`
  ADD CONSTRAINT `FK_D610A6D2706F82C7` FOREIGN KEY (`amis_id`) REFERENCES `fos_user` (`id`),
  ADD CONSTRAINT `FK_D610A6D2A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
