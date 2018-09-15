-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mar. 07 août 2018 à 15:48
-- Version du serveur :  5.7.22
-- Version de PHP :  7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `espace_menbre`
--
CREATE DATABASE IF NOT EXISTS `espace_menbre` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `espace_menbre`;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id_commentaire` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `id_picture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id_commentaire`, `pseudo`, `commentaire`, `id_picture`) VALUES
(1, 'pascal', 'wesh popol\r\n', 77),
(2, 'pascal', 'wesh popol\r\n', 77),
(3, 'hhhh', 'yyy', 75),
(4, 'hhhh', 'yyy', 75),
(5, 'hhhh', 'yyy', 75),
(6, 'hhhh', 'yyy', 75),
(7, 'hhhh', 'yyy', 75),
(8, 'hhhh', 'yyy', 75),
(9, 'hhhh', 'yyy', 75),
(10, 'hhhh', 'yyy', 75),
(11, 'eee', 'eee', 78),
(12, 'eee', 'eee', 78),
(13, 'eee', 'eee', 78),
(14, 'dddd', 'ddd', 79),
(15, 'dddd', 'ddd', 79),
(16, 'ffffff', 'ffffff', 79),
(17, 'ffffff', 'ffffff', 79),
(18, 'ffffff', 'ffffff', 79),
(19, 'ffffff', 'ffffff', 79),
(20, 'ffffff', 'ffffff', 79),
(21, 'fffff', 'fffffff', 77),
(22, 'fffff', 'fffffff', 77),
(23, 'vvvv', 'vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv', 79),
(24, 'vvvv', 'vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv', 79),
(25, 'vvvv', 'vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv', 79),
(26, 'lllll', 'lhilyuftjydktyfulyfjhvu\r\n', 112),
(27, 'eee', 'eee', 122),
(28, 'ddd', 'dd', 156),
(29, 'ddd', 'dd', 156),
(30, 'eee', 'lkmkm', 143),
(31, 'd', 'd', 48),
(32, 'd', 'd', 48),
(33, 's', 's', 48),
(34, 'zz', 'zz', 155),
(35, 'zz', 'zz', 155);

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `id_likes` int(11) NOT NULL,
  `id_picture` int(11) NOT NULL,
  `id_menber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id_likes`, `id_picture`, `id_menber`) VALUES
(110, 124, 2),
(111, 80, 2),
(117, 125, 2),
(119, 78, 4),
(120, 127, 2),
(122, 156, 2),
(123, 143, 4);

-- --------------------------------------------------------

--
-- Structure de la table `menbre`
--

CREATE TABLE `menbre` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `confirmkey` varchar(60) NOT NULL,
  `confirm` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `menbre`
--

INSERT INTO `menbre` (`id`, `pseudo`, `mail`, `motdepasse`, `confirmkey`, `confirm`) VALUES
(1, 'pppp', 'pppp@p.p', '4b3aa8bd3049d423cc311f930fa6f31191c3da6a01f699ce8dd808705258415a52ada559cfc1fb97fc17e54681183a793c9ba84c1e2d127c2829b5a0433d29fb', 'R1md3wQJYnRpIVPp5zjECY1TlCZpA7jqco6yGH1biEOPEgJOfGvY6xtage5B', 1),
(2, 'p', 'po@p.fr', '4b3aa8bd3049d423cc311f930fa6f31191c3da6a01f699ce8dd808705258415a52ada559cfc1fb97fc17e54681183a793c9ba84c1e2d127c2829b5a0433d29fb', 'gASpcFksMqkSkjGvFcRtrG5ScKvnppHHvwKnvPSontxfWPrDHDfHd4vwtUI9', 1),
(3, 'p', 'p@p.fr', '4b3aa8bd3049d423cc311f930fa6f31191c3da6a01f699ce8dd808705258415a52ada559cfc1fb97fc17e54681183a793c9ba84c1e2d127c2829b5a0433d29fb', 'v3MNnPszBLIYuUOFcXmkYHg4HIvjIwiz2v3HVbgi5CYwxiOm4tAWbtavteKg', 0),
(4, 'rrr', 'h@h.h', '6393ce668ad727f307b20949e9176d47ae29bd5f2b382897406c2ec7675d3d33db5e66dbdc533b44d97016756690e055168e28190974a22914cd66af176ccfbc', '6tLSupMQ5JwKKwq25narIJdsayIcZPKWatmvXid62JrdhspjEK62LGofG28U', 1),
(5, 'pp', 'popol@hotmail.fr', 'bab64d17c753a54ca859aa7e4e92108faed10469c280efc1fcaa333095dc26da78235b3b6a747f07255434f4ed674362a54b106a2a6118e9e8c5bc3eecec88f6', 'JKBuqvTHcX0ta8p1c8LW4WgNzoLRGsZlS8v9lo8AMubYUbcSSBT4QQixx2d5', 0);

-- --------------------------------------------------------

--
-- Structure de la table `pictures`
--

CREATE TABLE `pictures` (
  `pictures_id` int(11) NOT NULL,
  `usersid` int(11) NOT NULL,
  `picturesnames` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pictures`
--

INSERT INTO `pictures` (`pictures_id`, `usersid`, `picturesnames`) VALUES
(45, 4, 'image/popop1532625567.jpeg'),
(48, 4, 'image/popop1532625572.jpeg'),
(76, 2, 'image/popop1532748583.jpeg'),
(77, 2, 'image/popop1532808086.jpeg'),
(78, 2, 'image/popop1532808733.jpeg'),
(79, 2, 'image/popop1532808734.jpeg'),
(80, 2, 'image/popop1532821192.jpeg'),
(114, 2, 'image/popop1532823453.jpeg'),
(143, 4, 'image/popop1533177625.jpeg'),
(147, 4, 'image/popop1533178796.jpeg'),
(148, 2, 'image/popop1533262006.jpeg'),
(150, 2, 'image/popop1533262022.jpeg'),
(151, 2, 'image/popop1533262368.jpeg'),
(152, 2, 'image/popop1533262398.jpeg'),
(153, 2, 'image/popop1533262432.jpeg'),
(154, 2, 'image/popop1533262439.jpeg'),
(155, 2, 'image/popop1533264290.jpeg'),
(156, 2, 'image/popop1533264320.jpeg'),
(157, 2, 'image/popop1533264541.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `recuperation`
--

CREATE TABLE `recuperation` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `recuperation`
--

INSERT INTO `recuperation` (`id`, `mail`, `code`) VALUES
(1, 'h@h.h', 85487985);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id_commentaire`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id_likes`);

--
-- Index pour la table `menbre`
--
ALTER TABLE `menbre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`pictures_id`);

--
-- Index pour la table `recuperation`
--
ALTER TABLE `recuperation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `id_likes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT pour la table `menbre`
--
ALTER TABLE `menbre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `pictures_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT pour la table `recuperation`
--
ALTER TABLE `recuperation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
