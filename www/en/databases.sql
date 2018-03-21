-- phpMyAdmin SQL Dump
-- version 3.3.8
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2012 at 03:21 PM
-- Server version: 5.1.52
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vanandvan`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`) VALUES
(1, 'Maison', 'maison');

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE IF NOT EXISTS `configs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `configs`
--


-- --------------------------------------------------------

--
-- Table structure for table `medias`
--

CREATE TABLE IF NOT EXISTS `medias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_medias_posts` (`post_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `medias`
--

INSERT INTO `medias` (`id`, `name`, `file`, `post_id`, `type`) VALUES
(7, '', '2011-09/1password-votre-coffre-fort-virtuel-1070.jpg', 19, 'img'),
(6, '', '2011-09/grafikart-32.png', 20, 'img'),
(14, 'ovh', '2011-10/user&psw_ovh.jpg', 22, 'img'),
(11, 'arbre', '2011-10/MC910221716[1].jpg', 17, 'img'),
(13, 'bouton', '2011-10/bouton_ensavoirplus.png', 17, 'img'),
(15, 'max', '2011-10/Maxim-logo-240-wt.png', 22, 'img'),
(16, 'login', '2011-10/login.png', 19, 'img'),
(17, 'facade', '24/facade.jpg', 24, 'img'),
(30, 'century', '1/Logocentury.gif', 1, 'img'),
(19, 'cuisine', '24/cuisine.jpg', 24, 'img'),
(20, 'jardin', '24/jardin.jpg', 24, 'img'),
(21, 's_a_manger', '24/s_a_manger.jpg', 24, 'img'),
(22, 's_d_bain', '24/s_d_bain.jpg', 24, 'img'),
(29, 'multimmo', '1/logo.gif', 1, 'img'),
(25, 'living', '24/salon.jpg', 24, 'img'),
(26, 'hotel', '24/hotel_maitre_3_million.jpg', 24, 'img'),
(27, 'villa', '24/villa_4_million.jpg', 24, 'img');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `file` varchar(255) NOT NULL,
  `dossier` varchar(255) NOT NULL,
  `content` text,
  `created` date DEFAULT NULL,
  `online` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_posts_users1` (`user_id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `name`, `file`, `dossier`, `content`, `created`, `online`, `type`, `slug`, `user_id`, `category_id`) VALUES
(1, 'Nos partenaires', '', '', '<div>Voici une liste de nos diff&eacute;rents partenaires :<br /><br /><ol>\r\n<li>ODD : Olivier Delvaux Developement<br />agence de cr&eacute;ation de site web.<br />site web : <a href=\\"http://www.oddagency.be\\">www.oddagency.be</a><br /><br /></li>\r\n<li><img style=\\"float: left; margin: 0px 15px 15px 0px; border: 1px solid black;\\" title=\\"multimmo\\" src=\\"/CMS_Sources_Web_v1.6_current/img/1/logo.gif\\" alt=\\"multimmo\\" width=\\"64\\" height=\\"68\\" />Mult-immo : <br />l\\''immobiliers partout en Belgique.<br />website : <a href=\\"http://www.multimmo.be\\">www.multimmo.be</a><br /><br /><br /><br /><br /></li>\r\n<li><img style=\\"float: left; margin: 0px 15px 15px 0px; border: 1px solid black;\\" title=\\"a\\" src=\\"/CMS_Sources_Web_v1.6_current/img/1/Logocentury.gif\\" alt=\\"a\\" width=\\"126\\" height=\\"68\\" />Century 21 <br />Agence immobili&egrave;re pr&eacute;sente partout en Belgique.<br />website : <a href=\\"http://www.century21.be\\">www.century21.be</a><br /><br /><br /><br /><br /><br /></li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n</div>', '2011-09-15', 1, 'page', 'partenaires', 0, 0),
(24, 'Huizingen appartement', '24/cover/Image1.jpg', '24/dossier/huizingen_appart_350_plan.pdf', '<p>Ifttt.com est un site qui propose d&rsquo;automatiser la publication de contenu entre r&eacute;seaux sociaux &agrave; l&rsquo;aide d&rsquo;un op&eacute;rateur bien connu des d&eacute;veloppeur : Si&hellip; Alors&hellip;. Le principe est extr&ecirc;mement simple et efficace, on d&eacute;signe dans un premier temps un &laquo; d&eacute;clencheur &raquo; (une op&eacute;ration sp&eacute;cifique sur un premier site, comme par exemple un nouveau tweet) et dans un second temps &laquo; l&rsquo;action &raquo; que cela va d&eacute;clencher sur un autre site (la publication du tweet en question sur facebook). Le site est actuellement en B&eacute;ta mais laisse entrapercevoir des centaines de possibilit&eacute;s et pour ne rien g&acirc;cher l&rsquo;interface est tr&egrave;s intuitive.</p>', '2012-01-16', 1, 'post', 'nivelles-maison', NULL, 1),
(9, 'Dublin Underground Sofa', '9/cover/Dublin.jpg', '9/dossier/Lassman_banner_com_invisible.pdf', '<p>Ifttt.com est un site qui propose d’automatiser la publication de contenu entre réseaux sociaux à l’aide d’un opérateur bien connu des développeur : <strong>Si… Alors…</strong>. Le principe est extrêmement simple et efficace, on désigne dans un premier temps un « <strong>déclencheur</strong> » (une opération spécifique sur un premier site, comme par exemple un nouveau tweet) et dans un second temps « <strong>l’action</strong> » que cela va déclencher sur un autre site (la publication du tweet en question sur facebook). Le site est actuellement en Béta mais laisse entrapercevoir des centaines de possibilités et pour ne rien gâcher l’interface est très intuitive.</p>', '2011-09-20', 1, 'post', 'dublin-underground-sofa', 1, 1),
(23, 'Bolonha Forest Sofa', '23/cover/Bolonha.JPG', '23/dossier/villa_3million_plan.pdf', 'Ifttt.com est un site qui propose d’automatiser la publication de contenu entre réseaux sociaux à l’aide d’un opérateur bien connu des développeur : Si… Alors…. Le principe est extrêmement simple et efficace, on désigne dans un premier temps un « déclencheur » (une opération spécifique sur un premier site, comme par exemple un nouveau tweet) et dans un second temps « l’action » que cela va déclencher sur un autre site (la publication du tweet en question sur facebook). Le site est actuellement en Béta mais laisse entrapercevoir des centaines de possibilités et pour ne rien gâcher l’interface est très intuitive.', '2011-10-21', 1, 'post', 'bolonha-forest-sofa', NULL, 1),
(32, 'Nouvelle Collection  Luis Silva', '32/cover/Ancora.JPG', '', 'Ifttt.com est un site qui propose d’automatiser la publication de contenu entre réseaux sociaux à l’aide d’un opérateur bien connu des développeur : Si… Alors…. Le principe est extrêmement simple et efficace, on désigne dans un premier temps un « déclencheur » (une opération spécifique sur un premier site, comme par exemple un nouveau tweet) et dans un second temps « l’action » que cela va déclencher sur un autre site (la publication du tweet en question sur facebook). Le site est actuellement en Béta mais laisse entrapercevoir des centaines de possibilités et pour ne rien gâcher l’interface est très intuitive.', '2012-02-22', 1, 'post', 'collection-luis-silva', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `role`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin');
