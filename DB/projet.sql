-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 24 jan. 2019 à 11:21
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `chapitres`
--

DROP TABLE IF EXISTS `chapitres`;
CREATE TABLE IF NOT EXISTS `chapitres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `add_date` datetime NOT NULL,
  `edit_date` datetime DEFAULT NULL,
  `sort` tinyint(3) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chapitres`
--

INSERT INTO `chapitres` (`id`, `title`, `content`, `add_date`, `edit_date`, `sort`) VALUES
(80, 'Un chapitre supplémentaire', '<p>Pellentesque ornare eros et imperdiet posuere. Morbi dignissim lacus turpis, a porta enim dapibus eget. Sed vel porttitor tellus, quis lobortis arcu. Proin id dictum mauris, ac fermentum orci. Suspendisse potenti. Phasellus pharetra vel tortor imperdiet bibendum. Cras eget enim felis. Sed fermentum at sapien quis vehicula. Quisque fringilla consectetur turpis convallis mollis. Vestibulum laoreet, mi pretium sollicitudin varius, libero ex elementum tortor, non finibus purus leo vel nunc. Nulla vestibulum libero ut tellus elementum, a vulputate velit tempus. Ut ultrices eros in mattis consectetur. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tellus metus, facilisis vehicula augue rhoncus, lobortis dapibus massa.</p>', '2019-01-17 15:48:02', NULL, 6),
(3, 'Une arrivée mouvementée', '<p>Quisque molestie felis lacus. Pellentesque eu interdum purus, vel fringilla tortor. Donec eget orci eu enim pharetra iaculis quis in massa. Morbi a vestibulum enim, vitae iaculis lacus. Etiam luctus nibh vitae libero feugiat placerat. Nulla mattis mi eu metus suscipit dignissim. Maecenas fermentum pretium felis sit amet ullamcorper. Aenean commodo mi sit amet ex accumsan pretium. Aliquam condimentum vehicula ante at tristique. Donec rutrum ultricies elit in vehicula. Nam mi risus, aliquet id ligula non, posuere pellentesque nisi.</p>', '2018-11-02 15:18:36', '2018-12-12 18:35:05', 3),
(2, 'Une surprenante découverte', '<p>In mi sem, auctor nec sapien eget, tincidunt consectetur massa. Duis tempor neque id elit lacinia, non consequat nulla suscipit. Ut iaculis risus augue, at feugiat mauris dignissim eget. Curabitur ultricies ut ante at eleifend. Aenean fermentum lorem a ligula tristique sodales. Phasellus at gravida risus. Pellentesque aliquet a erat nec consequat. Vestibulum tincidunt ut magna vel imperdiet. Pellentesque scelerisque nulla scelerisque nisi aliquet fringilla. Vivamus a mi sit amet tortor placerat porttitor et a sapien. Suspendisse potenti. Mauris pharetra mauris et arcu commodo consequat.</p>', '2018-11-02 18:37:52', '2018-12-03 15:50:18', 2),
(1, 'Un évènement inattendu ', '<p>Vivamus in dui elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer sit amet rutrum diam. In at ullamcorper dolor. Aenean sed porttitor neque. Mauris pretium vitae erat id semper. Integer eleifend consectetur mauris et sagittis. Phasellus consectetur mi ut pulvinar iaculis. Proin quis ornare ipsum. Integer mauris ipsum, vehicula facilisis ante eget, rutrum pulvinar lectus. Nam mattis feugiat magna, eget tempor dui elementum in. Duis at mi commodo turpis vestibulum sodales ac vitae nisl. Phasellus commodo hendrerit elit, vitae scelerisque urna tristique ac.</p>', '2018-12-03 15:48:57', '2019-01-17 15:47:15', 1),
(81, 'Une nouvelle page à écrire', '<p>Aliquam pretium metus vitae felis scelerisque, quis suscipit est feugiat. Suspendisse ullamcorper turpis eget orci consequat, a consectetur eros blandit. Curabitur mattis orci sed urna elementum auctor. Nulla vitae ullamcorper felis. Duis vulputate ex vel dui ullamcorper pretium. Aliquam consectetur mattis sem vel auctor. Etiam auctor magna id sapien gravida, nec ornare ligula faucibus. Morbi fermentum porttitor cursus. Mauris porttitor ex ac erat commodo congue.</p>', '2019-01-17 15:48:20', NULL, 7),
(79, 'Un retournement de situation', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non ante vitae leo ultricies tempus ut sit amet dolor. Etiam et lobortis dolor. Vivamus convallis urna at dignissim vehicula. Fusce sit amet metus in purus viverra porta. Nulla feugiat leo nec consectetur euismod. Curabitur venenatis elit vitae arcu pulvinar, id congue nisi rutrum. Mauris ex magna, porttitor sit amet neque eget, hendrerit luctus erat. Cras porta ligula diam, nec faucibus mauris pharetra non. Cras non ipsum sit amet nisl tempus luctus. Pellentesque gravida leo ut est aliquam, vel consequat purus porttitor. Suspendisse venenatis, lorem non fringilla vestibulum, leo orci facilisis massa, id lacinia velit velit at turpis. Proin in orci id est eleifend sagittis. Suspendisse rutrum nec purus id viverra. Etiam commodo feugiat sodales.</p>', '2019-01-17 15:47:51', NULL, 5),
(4, 'Des découvertes intriguantes', '<p>Donec mollis risus leo, quis consectetur urna bibendum quis. Nulla mattis pulvinar neque, id facilisis leo interdum et. Phasellus sed magna ligula. Cras faucibus mauris a tincidunt faucibus. Maecenas at aliquam est. Praesent finibus blandit dui vel consequat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer dictum nibh et iaculis commodo. Aliquam erat volutpat. Vivamus viverra ut justo tempus viverra. Integer et egestas magna, sit amet vehicula eros. Nulla lacus velit, tristique sit amet purus a, rhoncus hendrerit lectus. Maecenas mattis pulvinar tortor, sed molestie ipsum feugiat a. Sed rutrum ipsum vitae velit imperdiet, vitae tempus est laoreet. Praesent et iaculis mi. Test</p>', '2019-01-10 16:40:35', '2019-01-10 16:42:06', 4);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `chapitre_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `reports` int(11) NOT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`comment_id`, `chapitre_id`, `author`, `comment`, `reports`, `comment_date`) VALUES
(82, 80, 'Norbert', 'Ça commence à faire long tout de même !', 0, '2019-01-22 15:39:17'),
(81, 4, 'Regard', 'Un petit commentaire pour dire que cette section n\'est pas vite !', 0, '2019-01-17 15:55:37'),
(75, 1, 'Gerard', 'Sympa ce nouveau blog, a suivre avec attention !', 0, '2019-01-17 15:51:21'),
(80, 2, 'Laura', 'Je me demande où va aller la suite.', 0, '2019-01-17 15:55:08'),
(79, 2, 'Laurent', 'Meh, je préférais le premier !', 0, '2019-01-17 15:54:58'),
(78, 1, 'Pagination', 'Ceci est un commentaire pour permettre d\'essayer la pagination !', 1, '2019-01-17 15:52:11'),
(77, 1, 'Salamé', 'Super !', 0, '2019-01-17 15:51:55'),
(76, 1, 'Milrod', 'J\'attends d\'en voir plus savoir si je reste ou non.', 0, '2019-01-17 15:51:41'),
(74, 1, 'Léa', 'Bonjour !', 0, '2019-01-17 15:51:14');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'Jean-Forteroche@gmail.com', '$2y$10$z8mBBp2p9oFHlKGCcTcPyuqGazzkX4bJqLqpKrwkPWUKenK/yH6WS');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
