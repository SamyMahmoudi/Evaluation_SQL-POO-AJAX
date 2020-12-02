-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 02 déc. 2020 à 17:35
-- Version du serveur :  5.7.24
-- Version de PHP : 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sondapote`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_friends`
--

CREATE TABLE `t_friends` (
  `friendship_id` int(11) NOT NULL,
  `friend_id_one` int(11) NOT NULL,
  `friend_id_two` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_friends`
--

INSERT INTO `t_friends` (`friendship_id`, `friend_id_one`, `friend_id_two`) VALUES
(1, 3, 4),
(3, 3, 2),
(4, 3, 1),
(5, 2, 1),
(6, 2, 4),
(7, 4, 1),
(8, 1, 10),
(9, 1, 15),
(10, 1, 19),
(11, 1, 5),
(12, 1, 12),
(13, 1, 13),
(14, 1, 16),
(15, 1, 17),
(16, 12, 5),
(17, 12, 13),
(18, 12, 16),
(19, 12, 17),
(20, 12, 19),
(21, 12, 2),
(22, 12, 7),
(23, 12, 8),
(24, 12, 10),
(25, 12, 15),
(26, 12, 11),
(27, 10, 5),
(28, 10, 13),
(29, 10, 16),
(30, 10, 17),
(31, 10, 19),
(32, 10, 2),
(33, 10, 7),
(34, 10, 8),
(35, 10, 11),
(36, 10, 15),
(37, 19, 5),
(38, 19, 13),
(39, 19, 16),
(40, 19, 17),
(41, 19, 2),
(42, 19, 7),
(43, 19, 8),
(44, 19, 11),
(45, 19, 15),
(46, 13, 5),
(47, 13, 16),
(48, 13, 17),
(49, 9, 5),
(50, 9, 12),
(51, 9, 13),
(52, 9, 16),
(53, 9, 17),
(54, 9, 19),
(55, 9, 1),
(56, 9, 2),
(57, 9, 4),
(58, 9, 3),
(59, 3, 10),
(60, 3, 19),
(61, 3, 16),
(63, 4, 10);

-- --------------------------------------------------------

--
-- Structure de la table `t_reponses`
--

CREATE TABLE `t_reponses` (
  `sondage_id` int(11) NOT NULL,
  `reponse_titre` varchar(255) NOT NULL,
  `reponse_score` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_reponses`
--

INSERT INTO `t_reponses` (`sondage_id`, `reponse_titre`, `reponse_score`) VALUES
(1, 'Front-end', 2),
(1, 'Back-end', 0),
(1, 'Aucun des deux', 0),
(2, 'japonais', 1),
(2, 'chinois', 1),
(3, 'bien', 0),
(3, 'trÃ¨s bien', 5),
(4, 'chocolat', 2),
(4, 'asticot', 1),
(5, 'Arizona', 1),
(5, 'Californie', 3),
(6, 'Appartements', 1),
(6, 'Maison', 1),
(7, '20', 0),
(7, '21', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_sondages`
--

CREATE TABLE `t_sondages` (
  `sondage_id` int(11) NOT NULL,
  `sondage_titre` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sondage_temps` datetime NOT NULL,
  `sondage_statut` varchar(255) DEFAULT 'en cours',
  `sondage_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_sondages`
--

INSERT INTO `t_sondages` (`sondage_id`, `sondage_titre`, `user_id`, `sondage_temps`, `sondage_statut`, `sondage_code`) VALUES
(1, 'Front-end ou Back-end ?', 3, '2020-12-02 16:40:02', 'Finish', '$2y$10$0qEWh2z/dl74z3RoOT/8JOdJKTW1M7xpQR7ztb3LFaaPbnK6YCNsm'),
(2, 'manger japonais ou chinois', 2, '2020-12-02 16:31:29', 'Finish', '$2y$10$7CD2WDGvnxBoyFOOtgWPXOhkh/RcGxuq34hOlkXVYRL0/Dln0st4u'),
(3, 'Comment allez-vous ?', 1, '2020-12-02 18:11:09', 'Finish', '$2y$10$R1gNeavJuFDeoiFiskpFbOE8rnSKtCZ3ZatbGS7wAuXkmXkRa96LC'),
(4, 'chocolat ou asticot ?', 19, '2020-12-02 18:00:38', 'Finish', '$2y$10$JOBqO8X0E363DASWK9C0iuM6CCo6dUq.egDNwOua2Gzh3F7FKWb/W'),
(5, 'Arizona ou Californie ?', 16, '2020-12-02 18:48:06', 'en cours', '$2y$10$v7zo4GEPiYuY1PRgkRO/ouxSQaab2lxdEsF4pungY9iOGdBjTR1sa'),
(6, 'Appartements ou Maison ?', 13, '2020-12-02 18:53:07', 'en cours', '$2y$10$Cvd7lFe/DPFqPPEw4BwOteqOSxuFGukTQcwJ7uVAcvf7ceoS1RPFe'),
(7, 'Ce projet mÃ©rite ?', 4, '2020-12-02 19:56:13', 'en cours', '$2y$10$ChKEZWKsLai/PyHcnrtgbuR2YoO/DryYJ3MBNUthh1VinhFb4PKNS');

-- --------------------------------------------------------

--
-- Structure de la table `t_tchat`
--

CREATE TABLE `t_tchat` (
  `tchat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tchat_message` text NOT NULL,
  `sondage_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_tchat`
--

INSERT INTO `t_tchat` (`tchat_id`, `user_id`, `tchat_message`, `sondage_code`) VALUES
(1, 3, 'je prefere le front', '$2y$10$0qEWh2z/dl74z3RoOT/8JOdJKTW1M7xpQR7ztb3LFaaPbnK6YCNsm'),
(2, 2, 'je suis d\'accord mais j\'aime bien aussi le back', '$2y$10$0qEWh2z/dl74z3RoOT/8JOdJKTW1M7xpQR7ztb3LFaaPbnK6YCNsm'),
(3, 2, 'le japonais c\'est trop bon', '$2y$10$7CD2WDGvnxBoyFOOtgWPXOhkh/RcGxuq34hOlkXVYRL0/Dln0st4u'),
(4, 3, 'vive le chinois', '$2y$10$7CD2WDGvnxBoyFOOtgWPXOhkh/RcGxuq34hOlkXVYRL0/Dln0st4u'),
(5, 19, 'asticot pour la vie', '$2y$10$JOBqO8X0E363DASWK9C0iuM6CCo6dUq.egDNwOua2Gzh3F7FKWb/W'),
(6, 13, 'j\'aime trop le chocolat', '$2y$10$JOBqO8X0E363DASWK9C0iuM6CCo6dUq.egDNwOua2Gzh3F7FKWb/W'),
(7, 16, 'comment j\'aime trop la Californie', '$2y$10$v7zo4GEPiYuY1PRgkRO/ouxSQaab2lxdEsF4pungY9iOGdBjTR1sa'),
(8, 9, 'vive l\'Arizona', '$2y$10$v7zo4GEPiYuY1PRgkRO/ouxSQaab2lxdEsF4pungY9iOGdBjTR1sa'),
(9, 9, 'j\'aime pas les asticots', '$2y$10$JOBqO8X0E363DASWK9C0iuM6CCo6dUq.egDNwOua2Gzh3F7FKWb/W'),
(10, 13, 'vive les appartements', '$2y$10$Cvd7lFe/DPFqPPEw4BwOteqOSxuFGukTQcwJ7uVAcvf7ceoS1RPFe'),
(11, 12, 'je prefere les maisons avec de grand jardin', '$2y$10$Cvd7lFe/DPFqPPEw4BwOteqOSxuFGukTQcwJ7uVAcvf7ceoS1RPFe'),
(12, 12, 'je suis d\'accord avec nathan', '$2y$10$7CD2WDGvnxBoyFOOtgWPXOhkh/RcGxuq34hOlkXVYRL0/Dln0st4u'),
(13, 3, 'Californie Ã§a pÃ¨te', '$2y$10$v7zo4GEPiYuY1PRgkRO/ouxSQaab2lxdEsF4pungY9iOGdBjTR1sa'),
(14, 4, 'Ca mÃ©rite amplement 21', '$2y$10$ChKEZWKsLai/PyHcnrtgbuR2YoO/DryYJ3MBNUthh1VinhFb4PKNS'),
(15, 4, 'J\'adore le surf', '$2y$10$v7zo4GEPiYuY1PRgkRO/ouxSQaab2lxdEsF4pungY9iOGdBjTR1sa');

-- --------------------------------------------------------

--
-- Structure de la table `t_users`
--

CREATE TABLE `t_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_mail` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_isConnected` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_users`
--

INSERT INTO `t_users` (`user_id`, `user_name`, `user_mail`, `user_password`, `user_isConnected`) VALUES
(1, 'louis-Axel', 'louisaxel@iim.fr', '$2y$10$Yfb0FE.gkwcBorP5RcJ3VuhQUQzStiSyNdqMPVYhdv8gpU9PJknE6', 1),
(2, 'Samy', 'Samy@iim.fr', '$2y$10$SOYzUvR82C.VAeqvl6K7depqHfhkXQb4ViEzeWg0PrIbOy5aN5UOu', 1),
(3, 'Nathan', 'Nathan@iim.fr', '$2y$10$ym0mnVdyjqWAiDpfOSCQSeiw3S.Pbtv3cVdYo/3W7.aWKFSFi5NaS', 1),
(4, 'alexandre', 'alexandre@iim.fr', '$2y$10$I/p8ks69CSZ4DxkxgTIO5utwHeNtxaul8i0GRpet/FeBo1xwatVZ2', 1),
(5, 'biche', 'biche@iim.fr', '$2y$10$huVY.VwVxlLn.Z4nRg5SU.rrT50nSEKCI8JUafTYsjgz0MVAvpurW', 0),
(6, 'lion', 'lion@iim.fr', '$2y$10$CafrCWlpbXqEyyUD1Y1szu/EBoaBQTNa2x73ke.ooR.l1.HDaH3Tq', 0),
(7, 'singe', 'singe@iim.fr', '$2y$10$681HE/ecsKbtXmPW7FJYZO8qCzyqvEo6lHUaLkL6OiOZJZvnOZ.hq', 0),
(8, 'poisson', 'poisson@iim.fr', '$2y$10$vx/J21ftrOZw8TAT2rhK1.oVAH0YBZSs8iWz/yUomOrRZUVaZtFKq', 0),
(9, 'tigre', 'tigre@iim.fr', '$2y$10$KLs8NZ3OIdCUMIPjGQJ1jOFwmRvb8aWvgoghYZJBeVnrusZBvw/p6', 0),
(10, 'fourmis', 'fourmis@iim.fr', '$2y$10$AJBiggEcdOtk5HW6uGZWyOkprGu6iPwhLeHdapfHCTC24zw5Pxrii', 0),
(11, 'souris', 'souris@iim.fr', '$2y$10$9iRP6uEpJX54sDqFpBl/geco/bnh3lBvAaNi2G1vUba4KA2x4qhIS', 0),
(12, 'chien', 'chien@iim.fr', '$2y$10$7Vp7.TvylDHgfQUZOX8SZOxBho76eEcJk2YjeCVqwn06nb6qi9/lm', 0),
(13, 'chat', 'chat@iim.fr', '$2y$10$GaJLOVU6AzD1YQDl0SJ7keykD7WYkeb5gVW8krTFiLygJGSaMhS2K', 0),
(14, 'lapin', 'lapin@iim.fr', '$2y$10$vXlECXHvPwgICjOczxumMOkqw75d1GOyNVw2Ldg8CetuRvhd9i3qK', 0),
(15, 'hamster', 'hamster@iim.fr', '$2y$10$chgaN966oC3SOWjGokadtum79T7U9pKM5s24sI5erhqo0QommEHa2', 0),
(16, 'crocodile', 'crocodile@iim.fr', '$2y$10$.PlNJEKRafrsjFiMPCu6kul7GJ6iKynx.cAExIi1W1rk9bI1tMz8.', 0),
(17, 'chevre', 'chevre@iim.fr', '$2y$10$SMsmmi9hmfTQcpa9Hn7QZuzwwhlOF/rwaHkgfWFzSAVdODBwhDkOu', 0),
(18, 'rat', 'rat@iim.fr', '$2y$10$diUrq2V20BbLn921BeDM4eUawtzvznEJBEvqIbur.CNJvLWSthOyu', 0),
(19, 'mouche', 'mouche@iim.fr', '$2y$10$A2wgpaGXq1YNiijD59aJXebrt1GO1sQTopW4DWYsZHXW9oZkSQGVO', 0);

-- --------------------------------------------------------

--
-- Structure de la table `t_usersreponses`
--

CREATE TABLE `t_usersreponses` (
  `userRep_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sondage_code` text NOT NULL,
  `reponse_titre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_usersreponses`
--

INSERT INTO `t_usersreponses` (`userRep_id`, `user_id`, `sondage_code`, `reponse_titre`) VALUES
(1, 3, '$2y$10$0qEWh2z/dl74z3RoOT/8JOdJKTW1M7xpQR7ztb3LFaaPbnK6YCNsm', 'Front-end'),
(2, 2, '$2y$10$0qEWh2z/dl74z3RoOT/8JOdJKTW1M7xpQR7ztb3LFaaPbnK6YCNsm', 'Front-end'),
(3, 2, '$2y$10$7CD2WDGvnxBoyFOOtgWPXOhkh/RcGxuq34hOlkXVYRL0/Dln0st4u', 'japonais'),
(4, 3, '$2y$10$7CD2WDGvnxBoyFOOtgWPXOhkh/RcGxuq34hOlkXVYRL0/Dln0st4u', 'chinois'),
(5, 1, '$2y$10$R1gNeavJuFDeoiFiskpFbOE8rnSKtCZ3ZatbGS7wAuXkmXkRa96LC', 'trÃ¨s bien'),
(6, 19, '$2y$10$JOBqO8X0E363DASWK9C0iuM6CCo6dUq.egDNwOua2Gzh3F7FKWb/W', 'asticot'),
(7, 13, '$2y$10$JOBqO8X0E363DASWK9C0iuM6CCo6dUq.egDNwOua2Gzh3F7FKWb/W', 'chocolat'),
(8, 16, '$2y$10$v7zo4GEPiYuY1PRgkRO/ouxSQaab2lxdEsF4pungY9iOGdBjTR1sa', 'Californie'),
(9, 9, '$2y$10$v7zo4GEPiYuY1PRgkRO/ouxSQaab2lxdEsF4pungY9iOGdBjTR1sa', 'Arizona'),
(10, 9, '$2y$10$JOBqO8X0E363DASWK9C0iuM6CCo6dUq.egDNwOua2Gzh3F7FKWb/W', 'chocolat'),
(11, 13, '$2y$10$Cvd7lFe/DPFqPPEw4BwOteqOSxuFGukTQcwJ7uVAcvf7ceoS1RPFe', 'Appartements'),
(12, 12, '$2y$10$Cvd7lFe/DPFqPPEw4BwOteqOSxuFGukTQcwJ7uVAcvf7ceoS1RPFe', 'Maison'),
(13, 3, '$2y$10$R1gNeavJuFDeoiFiskpFbOE8rnSKtCZ3ZatbGS7wAuXkmXkRa96LC', 'trÃ¨s bien'),
(14, 12, '$2y$10$R1gNeavJuFDeoiFiskpFbOE8rnSKtCZ3ZatbGS7wAuXkmXkRa96LC', 'trÃ¨s bien'),
(15, 13, '$2y$10$R1gNeavJuFDeoiFiskpFbOE8rnSKtCZ3ZatbGS7wAuXkmXkRa96LC', 'trÃ¨s bien'),
(16, 10, '$2y$10$R1gNeavJuFDeoiFiskpFbOE8rnSKtCZ3ZatbGS7wAuXkmXkRa96LC', 'trÃ¨s bien'),
(17, 3, '$2y$10$v7zo4GEPiYuY1PRgkRO/ouxSQaab2lxdEsF4pungY9iOGdBjTR1sa', 'Californie'),
(18, 4, '$2y$10$ChKEZWKsLai/PyHcnrtgbuR2YoO/DryYJ3MBNUthh1VinhFb4PKNS', '21'),
(19, 4, '$2y$10$v7zo4GEPiYuY1PRgkRO/ouxSQaab2lxdEsF4pungY9iOGdBjTR1sa', 'Californie');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_friends`
--
ALTER TABLE `t_friends`
  ADD PRIMARY KEY (`friendship_id`);

--
-- Index pour la table `t_sondages`
--
ALTER TABLE `t_sondages`
  ADD PRIMARY KEY (`sondage_id`);

--
-- Index pour la table `t_tchat`
--
ALTER TABLE `t_tchat`
  ADD PRIMARY KEY (`tchat_id`);

--
-- Index pour la table `t_users`
--
ALTER TABLE `t_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Index pour la table `t_usersreponses`
--
ALTER TABLE `t_usersreponses`
  ADD PRIMARY KEY (`userRep_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_friends`
--
ALTER TABLE `t_friends`
  MODIFY `friendship_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT pour la table `t_sondages`
--
ALTER TABLE `t_sondages`
  MODIFY `sondage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `t_tchat`
--
ALTER TABLE `t_tchat`
  MODIFY `tchat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `t_users`
--
ALTER TABLE `t_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `t_usersreponses`
--
ALTER TABLE `t_usersreponses`
  MODIFY `userRep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
