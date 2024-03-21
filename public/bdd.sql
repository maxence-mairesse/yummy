-- Adminer 4.8.1 MySQL 5.7.39 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE `categorie` (
                             `id` int(11) NOT NULL AUTO_INCREMENT,
                             `name` varchar(255) NOT NULL,
                             PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `categorie` (`id`, `name`) VALUES
                                           (1,	'Dessert'),
                                           (2,	'Petit déjeuner'),
                                           (3,	'Entrée'),
                                           (4,	'Plats'),
                                           (5,	'Boisson'),
                                           (6,	'Apéritif');

DROP TABLE IF EXISTS `commentary`;
CREATE TABLE `commentary` (
                              `id` int(11) NOT NULL AUTO_INCREMENT,
                              `user_id` int(11) NOT NULL,
                              `recette_id` int(11) NOT NULL,
                              `commentaire` longtext NOT NULL,
                              PRIMARY KEY (`id`),
                              KEY `user_id` (`user_id`),
                              KEY `recette_id` (`recette_id`),
                              CONSTRAINT `commentary_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
                              CONSTRAINT `commentary_ibfk_2` FOREIGN KEY (`recette_id`) REFERENCES `recette` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `cuisson`;
CREATE TABLE `cuisson` (
                           `id` int(11) NOT NULL AUTO_INCREMENT,
                           `time_cuisson` time NOT NULL,
                           PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `cuisson` (`id`, `time_cuisson`) VALUES
                                                 (1,	'00:05:00'),
                                                 (2,	'00:10:00'),
                                                 (3,	'00:20:00'),
                                                 (4,	'00:30:00'),
                                                 (5,	'00:40:00'),
                                                 (6,	'00:50:00'),
                                                 (7,	'01:00:00'),
                                                 (8,	'01:10:00'),
                                                 (9,	'01:20:00'),
                                                 (10,	'01:30:00'),
                                                 (11,	'01:40:00'),
                                                 (12,	'01:50:00');

DROP TABLE IF EXISTS `duree`;
CREATE TABLE `duree` (
                         `id` int(11) NOT NULL AUTO_INCREMENT,
                         `time` time NOT NULL,
                         PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `duree` (`id`, `time`) VALUES
                                       (1,	'00:05:00'),
                                       (2,	'00:10:00'),
                                       (3,	'00:20:00'),
                                       (4,	'00:30:00'),
                                       (5,	'00:40:00'),
                                       (6,	'00:50:00'),
                                       (7,	'01:00:00'),
                                       (8,	'01:10:00'),
                                       (9,	'01:20:00'),
                                       (10,	'01:30:00'),
                                       (11,	'01:40:00'),
                                       (12,	'01:50:00');

DROP TABLE IF EXISTS `etape`;
CREATE TABLE `etape` (
                         `id` int(11) NOT NULL AUTO_INCREMENT,
                         `etape1` longtext,
                         `etape2` longtext,
                         `etape3` longtext,
                         `etape4` longtext,
                         `etape5` longtext,
                         `etape6` longtext,
                         `etape7` longtext,
                         `etape8` longtext,
                         PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `etape` (`id`, `etape1`, `etape2`, `etape3`, `etape4`, `etape5`, `etape6`, `etape7`, `etape8`) VALUES
                                                                                                               (1,	'Dans un saladier, mélangez la farine, le sel et le sucre en poudre. Creusez ensuite un puits pour y casser les œufs. Mélangez en effectuant des cercles du centre vers l’extérieur. Versez ensuite le lait petit à petit, puis ajoutez le sucre vanillé. Laissez reposer 30 min.\r\n\r\n',	'Avec un coton, badigeonnez d’huile le fond de votre crêpière et faites-la chauffer à feu vif. Une fois bien chaude, versez-y une louche de pâte et laissez cuire 3 min de chaque côté. Procédez ainsi jusqu’à épuisement de la pâte.\r\n\r\n',	'Empilez les crêpes sur une assiette, en les recouvrant éventuellement d’un torchon propre pour les conserver au chaud !\r\n\r\n',	NULL,	NULL,	NULL,	NULL,	NULL),
                                                                                                               (2,	'Découper le poulet en morceaux, nettoyer les moules, émincer le chorizo et les poivrons, peler et concasser les tomates, hacher les oignons et l\'ail.\r\n\r\n',	'Mettre l\'huile dans le plat et faire dorer les morceaux de poulet. Ajouter les calamars, les oignons tout en remuant puis mettre les tomates, les poivrons, l\'ail, le safran, le sel et le poivre. Laisser cuire 5 minutes en remuant avant d\'incorporer le riz, le chorizo et le bouillon.\r\n\r\n',	'Y plonger les crevettes et les moules, porter à ébullition puis laisser cuire environ 30-35 minutes.\r\n\r\n',	NULL,	NULL,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE `ingredient` (
                              `id` int(11) NOT NULL AUTO_INCREMENT,
                              `name` varchar(255) NOT NULL,
                              `picture` varchar(255) DEFAULT NULL,
                              PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ingredient` (`id`, `name`, `picture`) VALUES
                                                       (1,	'oeuf',	'https://images.unsplash.com/photo-1582722872445-44dc5f7e3c8f?q=80&w=2970&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
                                                       (2,	'farine',	'https://images.unsplash.com/photo-1638405803129-07b101e6a205?q=80&w=2970&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
                                                       (3,	'endive',	'https://images.unsplash.com/photo-1615368689980-4090f7008f11?q=80&w=2970&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
                                                       (4,	'lait',	'https://images.unsplash.com/photo-1550583724-b2692b85b150?q=80&w=3087&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
                                                       (5,	'sucre',	'https://images.unsplash.com/photo-1610219171722-87b3f4170557?q=80&w=2275&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
                                                       (6,	'fromage',	'https://images.unsplash.com/photo-1486297678162-eb2a19b0a32d?q=80&w=2973&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
                                                       (7,	'viande boeuf',	'https://www.academiedugout.fr/images/9857/1200-auto/boeuf_000.jpg?poix=50&poiy=50'),
                                                       (8,	'escalope de poulet',	'https://images.unsplash.com/photo-1604503468506-a8da13d82791?q=80&w=3087&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
                                                       (9,	'tomate',	'https://images.unsplash.com/photo-1607305387299-a3d9611cd469?q=80&w=2970&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
                                                       (10,	'oignon',	'https://www.academiedugout.fr/images/15721/1200-auto/fotolia_55631648_subscription_xl-copy.jpg?poix=50&poiy=50'),
                                                       (11,	'chocolat',	'https://images.unsplash.com/photo-1610450949065-1f2841536c88?q=80&w=3087&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');

DROP TABLE IF EXISTS `rate`;
CREATE TABLE `rate` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        `rate` smallint(6) NOT NULL,
                        `user_id` int(11) NOT NULL,
                        `recette_id` int(11) NOT NULL,
                        PRIMARY KEY (`id`),
                        KEY `user_id` (`user_id`),
                        KEY `recette_id` (`recette_id`),
                        CONSTRAINT `rate_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
                        CONSTRAINT `rate_ibfk_2` FOREIGN KEY (`recette_id`) REFERENCES `recette` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `recette`;
CREATE TABLE `recette` (
                           `id` int(11) NOT NULL AUTO_INCREMENT,
                           `name` varchar(255) NOT NULL,
                           `description` longtext NOT NULL,
                           `picture` varchar(255) DEFAULT NULL,
                           `ordre_saison` int(11) DEFAULT NULL,
                           `preparation` varchar(255) DEFAULT NULL,
                           `cuisson` varchar(255) DEFAULT NULL,
                           `ingredient` int(11) DEFAULT NULL,
                           `duree_id` int(11) NOT NULL,
                           `cuisson_id` int(11) NOT NULL,
                           `etape_id` int(11) DEFAULT NULL,
                           `categorie_id` int(11) DEFAULT NULL,
                           `rateMoyen` int(11) DEFAULT NULL,
                           PRIMARY KEY (`id`),
                           KEY `ingredient` (`ingredient`),
                           KEY `duree_id` (`duree_id`),
                           KEY `cuisson_id` (`cuisson_id`),
                           KEY `etape_id` (`etape_id`),
                           KEY `categorie_id` (`categorie_id`),
                           KEY `rate_id` (`rateMoyen`),
                           CONSTRAINT `recette_ibfk_1` FOREIGN KEY (`ingredient`) REFERENCES `ingredient` (`id`),
                           CONSTRAINT `recette_ibfk_2` FOREIGN KEY (`duree_id`) REFERENCES `duree` (`id`),
                           CONSTRAINT `recette_ibfk_4` FOREIGN KEY (`cuisson_id`) REFERENCES `cuisson` (`id`),
                           CONSTRAINT `recette_ibfk_5` FOREIGN KEY (`etape_id`) REFERENCES `etape` (`id`),
                           CONSTRAINT `recette_ibfk_6` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `recette` (`id`, `name`, `description`, `picture`, `ordre_saison`, `preparation`, `cuisson`, `ingredient`, `duree_id`, `cuisson_id`, `etape_id`, `categorie_id`, `rateMoyen`) VALUES
                                                                                                                                                                                              (1,	'Mousse au chocolat',	'Mousse au chocolat fais maison ',	'https://img.cuisineaz.com/660x660/2022/07/29/i184912-shutterstock-1033452436-min.jpeg',	NULL,	'10 min',	'05 min',	NULL,	2,	5,	1,	1,	NULL),
                                                                                                                                                                                              (2,	'Crêpes',	'On prend autant de plaisir à les faire sauter qu’à les manger. Avec ou sans bolée de cidre, la crêpe se plie toujours en 4 pour nous régaler ! Si elle se savoure de façon incontournable à la chandeleur, elle s’invite aussi lors de toutes les occasions festives. Du goûter à l’anniversaire en passant par la fameuse « crêpes party », personne ne lui résiste. Pour une recette de pâte à crêpes facile garantie zéro grumeau, c’est par ici !',	'https://img.cuisineaz.com/660x660/2015/01/29/i113699-photo-de-crepe-facile.jpeg',	NULL,	'30 min',	'2 min',	NULL,	3,	1,	1,	1,	NULL),
                                                                                                                                                                                              (3,	'Paella',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip',	'https://assets.afcdn.com/recipe/20190827/96838_w600.jpg',	NULL,	NULL,	NULL,	NULL,	5,	5,	2,	4,	NULL);

DROP TABLE IF EXISTS `recette_ingredient`;
CREATE TABLE `recette_ingredient` (
                                      `id` int(11) NOT NULL AUTO_INCREMENT,
                                      `recette_id` int(11) NOT NULL,
                                      `ingredient_id` int(11) NOT NULL,
                                      PRIMARY KEY (`id`),
                                      KEY `recette_id` (`recette_id`),
                                      KEY `ingredient_id` (`ingredient_id`),
                                      CONSTRAINT `recette_ingredient_ibfk_1` FOREIGN KEY (`recette_id`) REFERENCES `recette` (`id`),
                                      CONSTRAINT `recette_ingredient_ibfk_2` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredient` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `recette_ingredient` (`id`, `recette_id`, `ingredient_id`) VALUES
                                                                           (1,	1,	1),
                                                                           (2,	1,	2),
                                                                           (3,	1,	11),
                                                                           (4,	1,	4);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        `pseudo` varchar(255) NOT NULL,
                        `firstName` varchar(255) NOT NULL,
                        `lastName` varchar(255) NOT NULL,
                        `password` varchar(255) NOT NULL,
                        `email` varchar(255) NOT NULL,
                        `roles` enum('admin','catalog-manager','user') NOT NULL,
                        PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`id`, `pseudo`, `firstName`, `lastName`, `password`, `email`, `roles`) VALUES
                                                                                               (1,	'admin',	'Maxence',	'Mairesse',	'$2y$10$j9xXurcDWeHlxHEZ6UO1Ke0m/DH2bTvKfz9iTTj./9KBdcHdO0hH6',	'test2@test.fr',	'admin'),
                                                                                               (3,	'Moscato',	'Maxence',	'Mairesse',	'$2y$10$biDW3KgcTixA51ZNC266GeBsJSORAzNzt/74AqR08RdJfpHNsE2Py',	'mairessemax@live.fr',	'user');

-- 2024-03-20 20:34:35