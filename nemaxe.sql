-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           10.2.3-MariaDB-log - mariadb.org binary distribution
-- SE du serveur:                Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Export de la structure de la base pour gujdnwazdp
CREATE DATABASE IF NOT EXISTS `gujdnwazdp` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `gujdnwazdp`;

-- Export de la structure de la table gujdnwazdp. cards
CREATE TABLE IF NOT EXISTS `cards` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `card_type_id` int(10) unsigned NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(10) unsigned NOT NULL,
  `field_id` int(10) unsigned NOT NULL,
  `grade_id` int(10) unsigned NOT NULL,
  `duration` time NOT NULL DEFAULT '01:00:00',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `user_id` int(10) unsigned NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table gujdnwazdp.cards : ~20 rows (environ)
/*!40000 ALTER TABLE `cards` DISABLE KEYS */;
INSERT INTO `cards` (`id`, `card_type_id`, `year`, `subject_id`, `field_id`, `grade_id`, `duration`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 1, '1990', 1, 3, 2, '02:00:00', 'publish', 1, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(2, 2, '1996', 3, 3, 1, '02:00:00', 'publish', 1, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(3, 3, '1993', 1, 1, 1, '01:00:00', 'publish', 1, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(4, 1, '1998', 3, 3, 3, '02:00:00', 'publish', 1, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(5, 2, '1999', 1, 1, 2, '02:00:00', 'publish', 1, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(6, 3, '1993', 1, 1, 1, '02:00:00', 'publish', 1, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(7, 1, '1999', 3, 3, 1, '02:00:00', 'publish', 1, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(8, 2, '1994', 3, 3, 2, '01:00:00', 'publish', 1, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(9, 3, '1997', 2, 1, 3, '02:00:00', 'publish', 1, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(10, 1, '1994', 2, 3, 2, '01:00:00', 'publish', 1, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(11, 2, '1996', 2, 2, 2, '03:00:00', 'publish', 1, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(12, 3, '1991', 1, 3, 2, '01:00:00', 'publish', 1, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(13, 1, '1993', 1, 3, 3, '02:00:00', 'publish', 1, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(14, 2, '1999', 3, 3, 3, '01:00:00', 'publish', 1, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(15, 3, '1993', 2, 2, 2, '01:00:00', 'publish', 1, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(16, 1, '1998', 2, 2, 2, '02:00:00', 'publish', 1, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(17, 2, '1995', 1, 3, 3, '03:00:00', 'publish', 1, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(18, 3, '1996', 2, 3, 2, '02:00:00', 'publish', 1, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(19, 1, '1992', 3, 3, 2, '01:00:00', 'publish', 1, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(20, 2, '1997', 1, 2, 2, '02:00:00', 'publish', 1, '2017-05-18 22:14:31', '2017-05-18 22:14:31');
/*!40000 ALTER TABLE `cards` ENABLE KEYS */;

-- Export de la structure de la table gujdnwazdp. card_chapters_xref
CREATE TABLE IF NOT EXISTS `card_chapters_xref` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `card_id` int(10) unsigned NOT NULL,
  `chapter_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table gujdnwazdp.card_chapters_xref : ~40 rows (environ)
/*!40000 ALTER TABLE `card_chapters_xref` DISABLE KEYS */;
INSERT INTO `card_chapters_xref` (`id`, `card_id`, `chapter_id`) VALUES
	(1, 1, 1),
	(2, 1, 1),
	(3, 2, 2),
	(4, 2, 2),
	(5, 3, 3),
	(6, 3, 3),
	(7, 4, 1),
	(8, 4, 1),
	(9, 5, 2),
	(10, 5, 2),
	(11, 6, 3),
	(12, 6, 3),
	(13, 7, 1),
	(14, 7, 1),
	(15, 8, 2),
	(16, 8, 2),
	(17, 9, 3),
	(18, 9, 3),
	(19, 10, 1),
	(20, 10, 1),
	(21, 11, 2),
	(22, 11, 2),
	(23, 12, 3),
	(24, 12, 3),
	(25, 13, 1),
	(26, 13, 1),
	(27, 14, 2),
	(28, 14, 2),
	(29, 15, 3),
	(30, 15, 3),
	(31, 16, 1),
	(32, 16, 1),
	(33, 17, 2),
	(34, 17, 2),
	(35, 18, 3),
	(36, 18, 3),
	(37, 19, 1),
	(38, 19, 1),
	(39, 20, 2),
	(40, 20, 2);
/*!40000 ALTER TABLE `card_chapters_xref` ENABLE KEYS */;

-- Export de la structure de la table gujdnwazdp. card_exercises_xref
CREATE TABLE IF NOT EXISTS `card_exercises_xref` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `card_id` int(10) unsigned NOT NULL,
  `exercise_id` int(10) unsigned NOT NULL,
  `question_id` int(10) unsigned NOT NULL,
  `question_order` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table gujdnwazdp.card_exercises_xref : ~40 rows (environ)
/*!40000 ALTER TABLE `card_exercises_xref` DISABLE KEYS */;
INSERT INTO `card_exercises_xref` (`id`, `card_id`, `exercise_id`, `question_id`, `question_order`) VALUES
	(1, 1, 5, 4, 1),
	(2, 1, 4, 8, 2),
	(3, 2, 5, 11, 1),
	(4, 2, 4, 4, 2),
	(5, 3, 3, 8, 1),
	(6, 3, 1, 1, 2),
	(7, 4, 2, 4, 1),
	(8, 4, 5, 16, 2),
	(9, 5, 5, 17, 1),
	(10, 5, 1, 11, 2),
	(11, 6, 4, 15, 1),
	(12, 6, 3, 10, 2),
	(13, 7, 2, 17, 1),
	(14, 7, 2, 15, 2),
	(15, 8, 5, 16, 1),
	(16, 8, 2, 9, 2),
	(17, 9, 5, 19, 1),
	(18, 9, 4, 18, 2),
	(19, 10, 2, 12, 1),
	(20, 10, 4, 10, 2),
	(21, 11, 3, 7, 1),
	(22, 11, 5, 13, 2),
	(23, 12, 2, 3, 1),
	(24, 12, 3, 9, 2),
	(25, 13, 1, 18, 1),
	(26, 13, 4, 11, 2),
	(27, 14, 4, 4, 1),
	(28, 14, 3, 19, 2),
	(29, 15, 5, 12, 1),
	(30, 15, 4, 4, 2),
	(31, 16, 5, 4, 1),
	(32, 16, 3, 3, 2),
	(33, 17, 2, 19, 1),
	(34, 17, 5, 10, 2),
	(35, 18, 4, 12, 1),
	(36, 18, 5, 17, 2),
	(37, 19, 1, 16, 1),
	(38, 19, 4, 17, 2),
	(39, 20, 2, 3, 1),
	(40, 20, 1, 4, 2);
/*!40000 ALTER TABLE `card_exercises_xref` ENABLE KEYS */;

-- Export de la structure de la table gujdnwazdp. card_tags_xref
CREATE TABLE IF NOT EXISTS `card_tags_xref` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `card_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table gujdnwazdp.card_tags_xref : ~20 rows (environ)
/*!40000 ALTER TABLE `card_tags_xref` DISABLE KEYS */;
INSERT INTO `card_tags_xref` (`id`, `card_id`, `tag_id`) VALUES
	(1, 1, 1),
	(2, 2, 2),
	(3, 3, 3),
	(4, 4, 4),
	(5, 5, 5),
	(6, 6, 6),
	(7, 7, 1),
	(8, 8, 2),
	(9, 9, 3),
	(10, 10, 4),
	(11, 11, 5),
	(12, 12, 6),
	(13, 13, 1),
	(14, 14, 2),
	(15, 15, 3),
	(16, 16, 4),
	(17, 17, 5),
	(18, 18, 6),
	(19, 19, 1),
	(20, 20, 2);
/*!40000 ALTER TABLE `card_tags_xref` ENABLE KEYS */;

-- Export de la structure de la table gujdnwazdp. card_types
CREATE TABLE IF NOT EXISTS `card_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table gujdnwazdp.card_types : ~3 rows (environ)
/*!40000 ALTER TABLE `card_types` DISABLE KEYS */;
INSERT INTO `card_types` (`id`, `name`) VALUES
	(1, 'Baccalauréat'),
	(2, 'Proba'),
	(3, 'BEPCD');
/*!40000 ALTER TABLE `card_types` ENABLE KEYS */;

-- Export de la structure de la table gujdnwazdp. chapters
CREATE TABLE IF NOT EXISTS `chapters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table gujdnwazdp.chapters : ~12 rows (environ)
/*!40000 ALTER TABLE `chapters` DISABLE KEYS */;
INSERT INTO `chapters` (`id`, `name`, `subject_id`) VALUES
	(1, 'Physique 1', 1),
	(2, 'Physique 2', 1),
	(3, 'Physique 4', 1),
	(4, 'Chimie 1', 2),
	(5, 'Chimie 2', 2),
	(6, 'Chimie 3', 2),
	(7, 'Mathématiques 1', 3),
	(8, 'Mathématiques 2', 3),
	(9, 'Mathématiques 3', 3),
	(10, 'Histoire 1', 4),
	(11, 'Histoire 2', 4),
	(12, 'Histoire 3', 4);
/*!40000 ALTER TABLE `chapters` ENABLE KEYS */;

-- Export de la structure de la table gujdnwazdp. comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `card_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table gujdnwazdp.comments : ~20 rows (environ)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `content`, `user_id`, `card_id`, `created_at`, `updated_at`) VALUES
	(1, 'Petitcommentaire', 19, 4, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(2, 'Petitcommentaire', 20, 15, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(3, 'Groscommentaire', 10, 20, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(4, 'Groscommentaire', 16, 14, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(5, 'Petitcommentaire', 11, 10, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(6, 'Petitcommentaire', 19, 12, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(7, 'Groscommentaire', 7, 13, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(8, 'Groscommentaire', 15, 4, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(9, 'Moyencommentaire', 16, 3, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(10, 'Groscommentaire', 3, 6, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(11, 'Moyencommentaire', 11, 15, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(12, 'Petitcommentaire', 12, 16, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(13, 'Petitcommentaire', 8, 8, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(14, 'Petitcommentaire', 1, 14, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(15, 'Moyencommentaire', 17, 20, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(16, 'Petitcommentaire', 16, 1, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(17, 'Moyencommentaire', 11, 15, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(18, 'Moyencommentaire', 3, 1, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(19, 'Groscommentaire', 3, 11, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(20, 'Petitcommentaire', 3, 13, '2017-05-18 22:14:31', '2017-05-18 22:14:31');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Export de la structure de la table gujdnwazdp. exercises
CREATE TABLE IF NOT EXISTS `exercises` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(10) unsigned NOT NULL,
  `grade_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table gujdnwazdp.exercises : ~20 rows (environ)
/*!40000 ALTER TABLE `exercises` DISABLE KEYS */;
INSERT INTO `exercises` (`id`, `content`, `subject_id`, `grade_id`) VALUES
	(1, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 4, 2),
	(2, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 2, 1),
	(3, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 2, 1),
	(4, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 2, 2),
	(5, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 3, 2),
	(6, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 4, 2),
	(7, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 3, 1),
	(8, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 1, 2),
	(9, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 1, 2),
	(10, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 4, 1),
	(11, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 2, 1),
	(12, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 2, 2),
	(13, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 1, 1),
	(14, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 2, 1),
	(15, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 4, 2),
	(16, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 1, 2),
	(17, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 1, 1),
	(18, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 3, 1),
	(19, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 3, 1),
	(20, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 4, 1);
/*!40000 ALTER TABLE `exercises` ENABLE KEYS */;

-- Export de la structure de la table gujdnwazdp. fields
CREATE TABLE IF NOT EXISTS `fields` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table gujdnwazdp.fields : ~6 rows (environ)
/*!40000 ALTER TABLE `fields` DISABLE KEYS */;
INSERT INTO `fields` (`id`, `name`, `description`) VALUES
	(1, 'A4', 'Literaire'),
	(2, 'C', 'Scientifique'),
	(3, 'D', 'Generale'),
	(4, 'E', 'Electrique'),
	(5, 'F', 'Technique'),
	(6, 'G', 'Gestion');
/*!40000 ALTER TABLE `fields` ENABLE KEYS */;

-- Export de la structure de la table gujdnwazdp. grades
CREATE TABLE IF NOT EXISTS `grades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table gujdnwazdp.grades : ~4 rows (environ)
/*!40000 ALTER TABLE `grades` DISABLE KEYS */;
INSERT INTO `grades` (`id`, `name`, `short_name`) VALUES
	(1, 'Terminal', 'T'),
	(2, 'Premiere', 'P'),
	(3, 'Seconde', 'S'),
	(4, 'Troisieme', 'T');
/*!40000 ALTER TABLE `grades` ENABLE KEYS */;

-- Export de la structure de la table gujdnwazdp. migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table gujdnwazdp.migrations : ~16 rows (environ)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(81, '2014_10_12_000000_create_users_table', 1),
	(82, '2014_10_12_100000_create_password_resets_table', 1),
	(83, '2017_01_26_160607_create_comments_table', 1),
	(84, '2017_01_26_160637_create_cards_table', 1),
	(85, '2017_01_26_160654_create_card_types_table', 1),
	(86, '2017_01_26_160709_create_user_types_table', 1),
	(87, '2017_01_31_175926_create_tags_table', 1),
	(88, '2017_01_31_180011_create_card_tags_xref_table', 1),
	(89, '2017_02_23_001738_create_subjects_table', 1),
	(90, '2017_02_23_001826_create_chapters_table', 1),
	(91, '2017_02_23_002221_create_exercises_table', 1),
	(92, '2017_02_23_002700_create_fields_table', 1),
	(93, '2017_02_23_003444_create_grades_table', 1),
	(94, '2017_04_22_231708_create_questions_table', 1),
	(95, '2017_05_18_211923_create_card_exercises_xref_table', 1),
	(96, '2017_05_18_213616_create_card_chapters_xref_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Export de la structure de la table gujdnwazdp. password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table gujdnwazdp.password_resets : ~0 rows (environ)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Export de la structure de la table gujdnwazdp. questions
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table gujdnwazdp.questions : ~20 rows (environ)
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` (`id`, `description`) VALUES
	(1, 'Lorem ipsum dolor sit amet consectetur'),
	(2, 'adipiscing elit'),
	(3, 'Lorem ipsum dolor sit amet consectetur adipiscing elit'),
	(4, 'Lorem ipsum dolor sit amet consectetur adipiscing elit'),
	(5, 'Lorem ipsum dolor sit amet consectetur adipiscing elit'),
	(6, 'Lorem ipsum dolor sit amet consectetur adipiscing elit'),
	(7, 'Lorem ipsum dolor sit amet'),
	(8, 'Lorem ipsum dolor sit amet consectetur adipiscing elit'),
	(9, 'Lorem ipsum dolor sit amet consectetur adipiscing elit'),
	(10, 'Lorem ipsum dolor sit amet consectetur adipiscing elit'),
	(11, 'Lorem ipsum dolor sit amet consectetur'),
	(12, 'Lorem ipsum dolor sit amet consectetur adipiscing elit'),
	(13, 'Lorem ipsum dolor sit amet'),
	(14, 'Lorem ipsum dolor sit amet consectetur adipiscing elit'),
	(15, 'Lorem ipsum dolor sit amet'),
	(16, 'Lorem ipsum dolor sit amet'),
	(17, 'Lorem ipsum dolor sit amet consectetur adipiscing elit'),
	(18, 'Lorem ipsum dolor sit amet consectetur adipiscing elit'),
	(19, 'Lorem ipsum dolor sit amet consectetur adipiscing elit'),
	(20, 'Lorem ipsum dolor sit amet consectetur');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;

-- Export de la structure de la table gujdnwazdp. subjects
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table gujdnwazdp.subjects : ~4 rows (environ)
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` (`id`, `name`) VALUES
	(1, 'Physique'),
	(2, 'Chimie'),
	(3, 'Mathématiques'),
	(4, 'Histoire');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;

-- Export de la structure de la table gujdnwazdp. tags
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table gujdnwazdp.tags : ~7 rows (environ)
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` (`id`, `name`) VALUES
	(1, 'Physics'),
	(2, 'Chemistry'),
	(3, 'Maths'),
	(4, 'History'),
	(5, 'Baccalauréat'),
	(6, 'Proba'),
	(7, 'BEPCD');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;

-- Export de la structure de la table gujdnwazdp. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `user_type_id` int(10) unsigned NOT NULL DEFAULT 3,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table gujdnwazdp.users : ~21 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email`, `password`, `active`, `user_type_id`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', NULL, NULL, 'admin@gmail.com', '$2y$10$3eXA5Fvzhwkh3BLIPLRB.u5V64pksryomkL.OblCpWm14aTO6jNQi', 1, 1, NULL, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(2, 'Bob0', NULL, NULL, 'AlexiaFortin0@outlook.tel', '$2y$10$xaAy0lB5DWc5UdjOOWmui.DytII//wEsGZuAMAsYCa2f2WWj9YtG2', 1, 3, NULL, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(3, 'Aurelie1', NULL, NULL, 'PaulLafrance1@yahoo.fr', '$2y$10$XfIcvUTrpUQlBGFrlyv26uY5cD4/.RjgbApLgDJQ5WC3km5bmGsiy', 1, 3, NULL, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(4, 'Alexia2', NULL, NULL, 'IsaacGagne2@hotmail.jobs', '$2y$10$QHRtEYrZBJcs73hawN/CS.8b0GLkUGqEwzClUO3ffcAjEhFoTMZby', 1, 3, NULL, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(5, 'Camille3', NULL, NULL, 'MichaelMorin3@universite.ca', '$2y$10$/m20pQgWWq6QWykpU8QnPuD7.dQKXt5yL5PqjHPW4Twm8TUf1tZiq', 1, 3, NULL, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(6, 'Victor4', NULL, NULL, 'AurelieMiler4@gmail.cat', '$2y$10$1uojVoKoTfw3Kp/ArqwR9.A5LYTSm918IVOg6tPoihWGcjEfQMsru', 1, 3, NULL, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(7, 'Olivier5', NULL, NULL, 'RogerTrump5@yahoo.net', '$2y$10$4MiL7bdSFF4.KVUTd/wrR.8kRRPzqbQwNsIKpTzWwavEpMoGBpawa', 1, 3, NULL, '2017-05-18 22:14:31', '2017-05-18 22:14:31'),
	(8, 'Bob6', NULL, NULL, 'JoëlGagnon6@outlook.info', '$2y$10$Rac5XQV7FDmIhNb51N4rHu9s1SADTGPjie1S2rqeJKzV.Wvm2aArO', 1, 3, NULL, '2017-05-18 22:14:32', '2017-05-18 22:14:32'),
	(9, 'Rollan7', NULL, NULL, 'EdouardRivest7@outlook.asia', '$2y$10$9vvPd3lJvCqYCGYjCQZ0leahywFTIiWTLXqqXml1fZiUvbD.HsWk6', 1, 3, NULL, '2017-05-18 22:14:32', '2017-05-18 22:14:32'),
	(10, 'Felix8', NULL, NULL, 'AntonyLagace8@hotmail.asia', '$2y$10$43lOxmOMiR9zhXhMmjBRiuG8j2T1CGiC3pZlwi6Z/d.FqzyYCG2Hq', 1, 3, NULL, '2017-05-18 22:14:32', '2017-05-18 22:14:32'),
	(11, 'Aurelie9', NULL, NULL, 'JulietteTrump9@outlook.org', '$2y$10$jp54jQ4PLS1ZBkFIb4gTm.K9qA2nnOTHnkYuMMYjZxOTH2NiZNVwi', 1, 3, NULL, '2017-05-18 22:14:32', '2017-05-18 22:14:32'),
	(12, 'Bob10', NULL, NULL, 'MalicChan10@gmail.co', '$2y$10$4sT1/qYxO0J8yWpHZbc6y.ZJ905mn2xXNRUKH855owKFYf5Ne8sVm', 1, 3, NULL, '2017-05-18 22:14:32', '2017-05-18 22:14:32'),
	(13, 'Camille11', NULL, NULL, 'PaulLepine11@outlook.coop', '$2y$10$ApDLJP1/SmJbkP7t6ct2/.lmE7aor6GAxWo3eQV9xcLfpr2zhM26W', 1, 3, NULL, '2017-05-18 22:14:32', '2017-05-18 22:14:32'),
	(14, 'Bob12', NULL, NULL, 'ChloeGagne12@yahoo.org', '$2y$10$yrdSaYb5YGSmLWyOIUhaxeZVtA2aiCSW34.BMvuIB81NZq13/0Oju', 1, 3, NULL, '2017-05-18 22:14:32', '2017-05-18 22:14:32'),
	(15, 'Juliette13', NULL, NULL, 'SarahCaron13@hotmail.coop', '$2y$10$Ntus6mJKtHNIicEw.vdvWOPDz.cM/pf7P8XZi0JQWXHzpxd8aKQWC', 1, 3, NULL, '2017-05-18 22:14:32', '2017-05-18 22:14:32'),
	(16, 'Sarah14', NULL, NULL, 'IsaacLafrance14@gmail.cat', '$2y$10$WgWwGq3jieSRwmSZ/SyMTOoZF497wSSVBkXAEMSkYSw1SEtOsVUM.', 1, 3, NULL, '2017-05-18 22:14:32', '2017-05-18 22:14:32'),
	(17, 'Victor15', NULL, NULL, 'LeaMorin15@gmail.gov', '$2y$10$9kamle9Pjx5v2vCmzHTaBuJUrDeR79wG5fyCR35tvVJhQXyAYM3Aa', 1, 3, NULL, '2017-05-18 22:14:32', '2017-05-18 22:14:32'),
	(18, 'Catherine16', NULL, NULL, 'MichaelBarbeau16@gmail.fr', '$2y$10$hjc.MedP1mHGHCLaeDCq1OI2D5mR1vEZQXppFG7FTQk/wNF9Brqa2', 1, 3, NULL, '2017-05-18 22:14:32', '2017-05-18 22:14:32'),
	(19, 'Felix17', NULL, NULL, 'RogerCote17@gmail.coop', '$2y$10$3z2SF.ByhDufs5hegr.M7ujtHYpND3uOoyYHzW.pVc0YYzYLQWK2C', 1, 3, NULL, '2017-05-18 22:14:32', '2017-05-18 22:14:32'),
	(20, 'Alexia18', NULL, NULL, 'ClaraChan18@gmail.asia', '$2y$10$4ymaMqsYxvBHSa5uq4z5sebIWsUyszeNuetqSuHxydEs/tEecimqq', 1, 3, NULL, '2017-05-18 22:14:32', '2017-05-18 22:14:32'),
	(21, 'Alexia19', NULL, NULL, 'JustineGagne19@yahoo.cat', '$2y$10$2xS.MMdxYg0zxmGiSVmvNeHpWEqso0IAN3jiYaPVd9M0gLjxOSGP2', 1, 3, NULL, '2017-05-18 22:14:32', '2017-05-18 22:14:32');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Export de la structure de la table gujdnwazdp. user_types
CREATE TABLE IF NOT EXISTS `user_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table gujdnwazdp.user_types : ~3 rows (environ)
/*!40000 ALTER TABLE `user_types` DISABLE KEYS */;
INSERT INTO `user_types` (`id`, `name`) VALUES
	(1, 'Administrateur'),
	(2, 'Editeur'),
	(3, 'Abonne');
/*!40000 ALTER TABLE `user_types` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
