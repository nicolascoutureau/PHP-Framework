-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mar 21 Avril 2015 à 18:10
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `siteperso`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
`id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `created_at` datetime NOT NULL,
  `categorie_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `contenu`, `created_at`, `categorie_id`) VALUES
(11, 'geragrea', 'Phasellus tempus. Nulla neque dolor, sagittis eget, iaculis quis, molestie non, velit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut tincidunt tincidunt erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\r\n\r\nNam commodo suscipit quam. Vestibulum suscipit nulla quis orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Donec elit libero, sodales nec, volutpat a, suscipit non, turpis. Maecenas ullamcorper, dui et placerat feugiat, eros pede varius nisi, condimentum viverra felis nunc et lorem.\r\n\r\nVestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Aenean commodo ligula eget dolor. Proin faucibus arcu quis ante. Donec vitae orci sed dolor rutrum auctor. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus.\r\n\r\nAenean tellus metus, bibendum sed, posuere ac, mattis non, nunc. Fusce fermentum odio nec arcu. Pellentesque dapibus hendrerit tortor. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Duis lobortis massa imperdiet quam.\r\n\r\nSed hendrerit. Mauris sollicitudin fermentum libero. Aenean tellus metus, bibendum sed, posuere ac, mattis non, nunc. Praesent congue erat at massa. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.', '0000-00-00 00:00:00', 1),
(12, 'Maecenas egestas arcu quis', 'Curabitur at lacus ac velit ornare lobortis. Vestibulum turpis sem, aliquet eget, lobortis pellentesque, rutrum eu, nisl. Curabitur turpis. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. Pellentesque ut neque.\r\n\r\nDuis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Vestibulum volutpat pretium libero. Integer tincidunt. Fusce ac felis sit amet ligula pharetra condimentum. Aenean imperdiet.\r\n\r\nMorbi vestibulum volutpat enim. Sed hendrerit. Vivamus euismod mauris. Phasellus volutpat, metus eget egestas mollis, lacus lacus blandit dui, id egestas quam mauris ut lacus. Nullam accumsan lorem in dui.\r\n\r\nPhasellus accumsan cursus velit. Ut non enim eleifend felis pretium feugiat. In consectetuer turpis ut velit. Curabitur vestibulum aliquam leo. Quisque rutrum.\r\n\r\nCras id dui. Quisque malesuada placerat nisl. In auctor lobortis lacus. Sed in libero ut nibh placerat accumsan. Suspendisse non nisl sit amet velit hendrerit rutrum.', '0000-00-00 00:00:00', 2),
(13, 'Fusce egestas elit eget', 'Aenean posuere, tortor sed cursus feugiat, nunc augue blandit nunc, eu sollicitudin urna dolor sagittis lacus. Vivamus quis mi. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Cras id dui. Suspendisse faucibus, nunc et pellentesque egestas, lacus ante convallis tellus, vitae iaculis lacus elit id tortor.\r\n\r\nPraesent turpis. Fusce fermentum. Cras id dui. Ut varius tincidunt libero. Mauris turpis nunc, blandit et, volutpat molestie, porta ut, ligula.\r\n\r\nEtiam sit amet orci eget eros faucibus tincidunt. Maecenas egestas arcu quis ligula mattis placerat. Phasellus consectetuer vestibulum elit. In auctor lobortis lacus. Donec mollis hendrerit risus.\r\n\r\nPraesent nonummy mi in odio. Quisque libero metus, condimentum nec, tempor a, commodo mollis, magna. Nam at tortor in tellus interdum sagittis. Praesent ac sem eget est egestas volutpat. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem.\r\n\r\nMauris turpis nunc, blandit et, volutpat molestie, porta ut, ligula. Sed fringilla mauris sit amet nibh. In auctor lobortis lacus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nullam vel sem.', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
`id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'DÃ©veloppement'),
(2, 'Autre');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'nicolas', '39dfa55283318d31afe5a3ff4a0e3253e2045e43');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
 ADD PRIMARY KEY (`id`), ADD KEY `categorie_id` (`categorie_id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
ADD CONSTRAINT `article_categorie` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
