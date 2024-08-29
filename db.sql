-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 29, 2024 at 03:36 AM
-- Server version: 11.3.2-MariaDB
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(500) NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `nom`, `description`, `image`, `updated_at`) VALUES
(16, 'Tapis', '<div>desc</div>', 'T5.jpg', '2023-11-06 10:41:42'),
(17, 'Poufs', '<div>desc</div>', 'POUF JAMAICA 0.70M  7.JPG', '2023-11-06 10:42:32'),
(18, 'Tapis personnalisé', '<div><strong>Tous </strong>Nos <strong>Tapis</strong> et <strong>Poufs</strong> peuvent être <strong>faits sur mesure et personnalisés selon vos dimensions, formes, couleurs et dessins.</strong></div><div><strong>Vous pouvez nous contacter</strong> pour nous décrire vos besoins et <strong>on se fera le plaisir de vous réaliser le chef d’œuvre dont vous rêvez</strong></div>', 'T0.jpg', '2023-11-06 10:43:19');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produit_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `email` varchar(255) NOT NULL,
  `livraison` tinyint(1) DEFAULT NULL,
  `promo_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6EEAA67DF347EFB` (`produit_id`),
  KEY `IDX_6EEAA67DD0C07AFF` (`promo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` longblob NOT NULL,
  `new_member` tinyint(1) NOT NULL,
  `message` varchar(800) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `telephone`, `new_member`, `message`) VALUES
(1, 'mohj', 'ced@ds.yngh', 0x343335343533353334, 1, 'hi'),
(2, '\"><script>alert(1);</script>', 'rfe@ilhukgv.dln', 0x3839363631333738323332, 1, '<script>alert(1);</script>');

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230828202622', '2023-08-28 20:26:41', 383),
('DoctrineMigrations\\Version20230915202546', '2023-09-25 22:28:40', 212),
('DoctrineMigrations\\Version20231014144656', '2023-10-14 14:47:01', 144),
('DoctrineMigrations\\Version20240828184544', '2024-08-28 18:46:09', 156);

-- --------------------------------------------------------

--
-- Table structure for table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(500) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallerie`
--

DROP TABLE IF EXISTS `gallerie`;
CREATE TABLE IF NOT EXISTS `gallerie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `titre` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(500) NOT NULL,
  `updated_at` datetime NOT NULL,
  `reference` varchar(255) NOT NULL,
  `qualite` varchar(255) NOT NULL,
  `matiere` varchar(255) NOT NULL,
  `traitement` varchar(255) NOT NULL,
  `fabrication` longtext NOT NULL,
  `methode_fabrication` varchar(255) NOT NULL,
  `entretien` longtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_63539AC112469DE2` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `sous_categories_id` int(11) DEFAULT NULL,
  `types_id` int(11) DEFAULT NULL,
  `longueur` int(11) NOT NULL,
  `largeur` int(11) NOT NULL,
  `couleur` varchar(255) NOT NULL,
  `prix` varchar(255) NOT NULL,
  `disponabilite` tinyint(1) NOT NULL,
  `etat` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `poids` double NOT NULL,
  `model` varchar(255) NOT NULL,
  `qualite` varchar(255) NOT NULL,
  `matiere` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_29A5EC2712469DE2` (`category_id`),
  KEY `IDX_29A5EC279F751138` (`sous_categories_id`),
  KEY `IDX_29A5EC278EB23357` (`types_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

DROP TABLE IF EXISTS `promo`;
CREATE TABLE IF NOT EXISTS `promo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `ref` varchar(255) NOT NULL,
  `longueur` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `updated_at` datetime NOT NULL,
  `largeur` int(11) NOT NULL,
  `pourcentage_promo` int(11) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `prix` double NOT NULL DEFAULT 0,
  `prix_base` double NOT NULL,
  `poids` double NOT NULL,
  `dessin` longtext NOT NULL,
  `model` longtext NOT NULL,
  `qualite` longtext NOT NULL,
  `matiere` longtext NOT NULL,
  `traitement` longtext NOT NULL,
  `fabrication` longtext NOT NULL,
  `methode_fabrication` longtext NOT NULL,
  `entretien` longtext NOT NULL,
  `supercifie` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produit_id` int(11) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `pourcentage_promo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C11D7DD1F347EFB` (`produit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sous_category`
--

DROP TABLE IF EXISTS `sous_category`;
CREATE TABLE IF NOT EXISTS `sous_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie_id` int(11) DEFAULT NULL,
  `titre` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(500) NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E022D94BCF5E72D` (`categorie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sous_category`
--

INSERT INTO `sous_category` (`id`, `categorie_id`, `titre`, `description`, `image`, `updated_at`) VALUES
(5, 16, 'Tendance', '<div>desc</div>', 'TAZNAKHT4.2.jpg', '2023-11-06 10:45:54'),
(6, 16, 'Espaces', '<div>desc</div>', 'ATD 102.1.jpeg', '2023-11-06 10:46:53'),
(7, 16, 'Genre', '<div>desc</div>', 'TF 363-3.50mx2.50m.jpg', '2023-11-06 10:48:33'),
(8, 16, 'Tapis Unis', '<div>desc</div>', '2.jpg', '2023-11-06 10:49:22'),
(9, 17, 'Modernes', '<div><strong>Faits Main</strong> en <strong>laine Vierge</strong> de Premier Choix, <strong>Grand Teint</strong> et <strong>traitée</strong> Antimite.&nbsp;</div>', 'POUF JAMAICA 0.70M  6.JPG', '2023-11-06 10:50:58'),
(10, 17, 'Unis', '<div><strong>Unis</strong> ou <strong>Multicolores</strong>, de <strong>Différentes Tailles</strong> nos <strong>« Poufs »</strong> complètent <strong>magistralement</strong> vos espaces.</div>', 'POUF MONZA JAMAICA 70 -1.jpg', '2023-11-06 10:51:51');

-- --------------------------------------------------------

--
-- Table structure for table `tapis_personaliser`
--

DROP TABLE IF EXISTS `tapis_personaliser`;
CREATE TABLE IF NOT EXISTS `tapis_personaliser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `description` varchar(800) NOT NULL,
  `image2` varchar(500) NOT NULL,
  `image1` varchar(500) NOT NULL,
  `image3` varchar(500) NOT NULL,
  `updated_at` datetime NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `age` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`, `age`) VALUES
(1, 'mohammed', 20),
(2, 'mohammed', 20);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sous_categorie_id` int(11) DEFAULT NULL,
  `titre` varchar(255) NOT NULL,
  `descriptions` longtext NOT NULL,
  `image` varchar(500) NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8CDE5729365BF48` (`sous_categorie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `sous_categorie_id`, `titre`, `descriptions`, `image`, `updated_at`) VALUES
(2, 7, 'Tufté Main', '<div>Le <strong>Tapis tufté main</strong> est fait généralement avec des <strong>matières premières nobles</strong> en <strong>laine de grande qualité 100% Nouvelle Zélande</strong>, en <strong>Soie</strong> ou <strong>les deux mélangés</strong>. Le grand avantage de ce genre de <strong>tapis</strong> est qu’on peut y mettre <strong>tout genre de graphisme</strong>, ainsi on peut avoir <strong>tous les styles et les tendances</strong> réalisés sur un <strong>Tapis Tufté</strong>, il peut être <strong>plat ou en relief</strong> ce qui donne beaucoup de charme et de beauté au <strong>Tapis</strong>.</div><div>·&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Style Moderne</div><div>·&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Style Classique</div><div>·&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Style Artistique</div>', 'HT 497.4.jpg', '2023-11-06 10:58:53'),
(3, 7, 'Noué main', '<div>Le <strong>Tapis noué main</strong> est la base du Tapis de tous les temps, il garde toujours sa grandeur et son authenticité. Le <strong>Tapis noué main</strong> a su se développer dans le temps en intégrant <strong>différents styles, tendances, graphismes, couleurs</strong> <strong>et formes</strong> et en n’utilisant que des <strong>matières premières nobles</strong> à savoir une <strong>laine traitée de toison de premier choix</strong>.</div><div>·&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Tapis de Fès</div><div>·&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Tapis Rabat<br><br></div>', '2.jpg', '2023-11-06 10:59:50'),
(4, 7, 'Tissé Main', '<div>Le <strong>Tapis Tissé Main Moderne</strong> se fait selon les <strong>méthodes ancestrales,</strong> mais en intégrant une <strong>nouvelle façon de travail de la laine, de nouvelles couleurs et de nouvelles textures toutes aussi modernes les unes que les autres</strong>. Le <strong>Tapis Tissé Main Moderne</strong> est considéré comme le <strong><em>Must du Tapis Design Mondial.<br></em></strong>Le <strong>Tapis tissé Main Traditionnel</strong> se fait selon les <strong>méthodes ancestrales</strong>. Nous avons différents types de <strong>Tapis Tissés Main Traditionnels</strong> selon les régions du <strong>Maroc</strong> et qui sont tous beaux et aussi <strong>variés en graphismes, styles et couleurs</strong> représentants une <strong>vraie Richesse du Patrimoine Marocain</strong>.<br><br></div>', 'Amira  B 8.JPG', '2023-11-06 11:01:49'),
(5, 8, 'Viscose', '<div>Effet <strong>Soyeux, Doux au toucher, Fait Main, de Très Grande Qualité, élégant et parfait pour tous les espaces<br></strong><br></div>', 'Blade 2.jpg', '2023-11-06 11:03:18'),
(6, 8, 'Polyamide', '<div>Effet <strong>Soyeux, Doux au toucher, Fait Machine, de Grande Qualité, élégant et parfait pour tous les espaces</strong></div>', 'IMG20230126111451.jpg', '2023-11-06 11:07:07'),
(7, 5, 'Design', '<div>Inscrit dans la mouvance <strong>« Tendances »</strong> le tapis de style <strong>« Design »</strong> habille le salon de façon <strong>« In ».</strong>Composé de couleurs modernes et fait à partir de matières nobles, le tapis de style <strong>« Design »</strong> est associé au raffinement et à l’élégance.<br><br></div>', 'b002 batcmult 240x170-2.jpg', '2023-11-06 11:08:51'),
(8, 5, 'Classique', '<div>Indémodable et riche en couleurs et dessins, le tapis de style <strong>« Classique »</strong> représente une valeur sûre et appréciée de la décoration d’intérieur qui ne perd jamais de son<strong> Authenticité</strong>.</div>', '240X170 noir.jpg', '2023-11-06 11:09:39');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES
(1, 'fahlaoui@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$8D8/GWvUZ55KWR4TqnsvXubhNCRhjR2caStU7iR0jYdQWCZWn5zRC');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_6EEAA67DD0C07AFF` FOREIGN KEY (`promo_id`) REFERENCES `promo` (`id`),
  ADD CONSTRAINT `FK_6EEAA67DF347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`);

--
-- Constraints for table `gallerie`
--
ALTER TABLE `gallerie`
  ADD CONSTRAINT `FK_63539AC112469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `FK_29A5EC2712469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_29A5EC278EB23357` FOREIGN KEY (`types_id`) REFERENCES `type` (`id`),
  ADD CONSTRAINT `FK_29A5EC279F751138` FOREIGN KEY (`sous_categories_id`) REFERENCES `sous_category` (`id`);

--
-- Constraints for table `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `FK_C11D7DD1F347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`);

--
-- Constraints for table `sous_category`
--
ALTER TABLE `sous_category`
  ADD CONSTRAINT `FK_E022D94BCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `type`
--
ALTER TABLE `type`
  ADD CONSTRAINT `FK_8CDE5729365BF48` FOREIGN KEY (`sous_categorie_id`) REFERENCES `sous_category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
