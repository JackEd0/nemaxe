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
	(2, 2, '1998', 1, 3, 1, '02:00:00', 'publish', 1, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(3, 3, '1991', 1, 1, 1, '01:00:00', 'publish', 1, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(4, 1, '1993', 3, 3, 1, '03:00:00', 'publish', 1, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(5, 2, '1998', 1, 1, 2, '03:00:00', 'publish', 1, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(6, 3, '1995', 2, 1, 3, '03:00:00', 'publish', 1, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(7, 1, '1993', 2, 1, 2, '01:00:00', 'publish', 1, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(8, 2, '1996', 1, 2, 3, '01:00:00', 'publish', 1, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(9, 3, '1996', 1, 1, 1, '01:00:00', 'publish', 1, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(10, 1, '1993', 3, 2, 3, '01:00:00', 'publish', 1, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(11, 2, '1995', 2, 2, 3, '02:00:00', 'publish', 1, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(12, 3, '1990', 2, 2, 2, '02:00:00', 'publish', 1, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(13, 1, '1997', 3, 3, 1, '01:00:00', 'publish', 1, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(14, 2, '1999', 3, 3, 1, '01:00:00', 'publish', 1, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(15, 3, '1993', 1, 3, 2, '01:00:00', 'publish', 1, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(16, 1, '1996', 1, 2, 2, '02:00:00', 'publish', 1, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(17, 2, '1992', 1, 1, 3, '02:00:00', 'publish', 1, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(18, 3, '1993', 3, 1, 1, '03:00:00', 'publish', 1, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(19, 1, '1999', 3, 1, 1, '01:00:00', 'publish', 1, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(20, 2, '1998', 1, 2, 2, '03:00:00', 'publish', 1, '2017-06-17 21:01:02', '2017-06-17 21:01:02');
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
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table gujdnwazdp.card_exercises_xref : ~40 rows (environ)
/*!40000 ALTER TABLE `card_exercises_xref` DISABLE KEYS */;
INSERT INTO `card_exercises_xref` (`id`, `card_id`, `exercise_id`, `question_id`, `question_order`) VALUES
	(7, 2, 1, 1, 1),
	(8, 2, 1, 2, 2),
	(9, 2, 1, 3, 3),
	(10, 2, 2, 1, 1),
	(11, 2, 2, 2, 2),
	(12, 2, 2, 3, 3),
	(13, 3, 1, 1, 1),
	(14, 3, 1, 2, 2),
	(15, 3, 1, 3, 3),
	(16, 3, 2, 1, 1),
	(17, 3, 2, 2, 2),
	(18, 3, 2, 3, 3),
	(19, 4, 1, 1, 1),
	(20, 4, 1, 2, 2),
	(21, 4, 1, 3, 3),
	(22, 4, 2, 1, 1),
	(23, 4, 2, 2, 2),
	(24, 4, 2, 3, 3),
	(25, 5, 1, 1, 1),
	(26, 5, 1, 2, 2),
	(27, 5, 1, 3, 3),
	(28, 5, 2, 1, 1),
	(29, 5, 2, 2, 2),
	(30, 5, 2, 3, 3),
	(31, 6, 1, 1, 1),
	(32, 6, 1, 2, 2),
	(33, 6, 1, 3, 3),
	(34, 6, 2, 1, 1),
	(35, 6, 2, 2, 2),
	(36, 6, 2, 3, 3),
	(37, 7, 1, 1, 1),
	(38, 7, 1, 2, 2),
	(39, 7, 1, 3, 3),
	(40, 7, 2, 1, 1),
	(41, 7, 2, 2, 2),
	(42, 7, 2, 3, 3),
	(43, 8, 1, 1, 1),
	(44, 8, 1, 2, 2),
	(45, 8, 1, 3, 3),
	(46, 8, 2, 1, 1),
	(47, 8, 2, 2, 2),
	(48, 8, 2, 3, 3),
	(49, 9, 1, 1, 1),
	(50, 9, 1, 2, 2),
	(51, 9, 1, 3, 3),
	(52, 9, 2, 1, 1),
	(53, 9, 2, 2, 2),
	(54, 9, 2, 3, 3),
	(55, 10, 1, 1, 1),
	(56, 10, 1, 2, 2),
	(57, 10, 1, 3, 3),
	(58, 10, 2, 1, 1),
	(59, 10, 2, 2, 2),
	(60, 10, 2, 3, 3),
	(61, 11, 1, 1, 1),
	(62, 11, 1, 2, 2),
	(63, 11, 1, 3, 3),
	(64, 11, 2, 1, 1),
	(65, 11, 2, 2, 2),
	(66, 11, 2, 3, 3),
	(67, 12, 1, 1, 1),
	(68, 12, 1, 2, 2),
	(69, 12, 1, 3, 3),
	(70, 12, 2, 1, 1),
	(71, 12, 2, 2, 2),
	(72, 12, 2, 3, 3),
	(73, 13, 1, 1, 1),
	(74, 13, 1, 2, 2),
	(75, 13, 1, 3, 3),
	(76, 13, 2, 1, 1),
	(77, 13, 2, 2, 2),
	(78, 13, 2, 3, 3),
	(79, 14, 1, 1, 1),
	(80, 14, 1, 2, 2),
	(81, 14, 1, 3, 3),
	(82, 14, 2, 1, 1),
	(83, 14, 2, 2, 2),
	(84, 14, 2, 3, 3),
	(85, 15, 1, 1, 1),
	(86, 15, 1, 2, 2),
	(87, 15, 1, 3, 3),
	(88, 15, 2, 1, 1),
	(89, 15, 2, 2, 2),
	(90, 15, 2, 3, 3),
	(91, 16, 1, 1, 1),
	(92, 16, 1, 2, 2),
	(93, 16, 1, 3, 3),
	(94, 16, 2, 1, 1),
	(95, 16, 2, 2, 2),
	(96, 16, 2, 3, 3),
	(97, 17, 1, 1, 1),
	(98, 17, 1, 2, 2),
	(99, 17, 1, 3, 3),
	(100, 17, 2, 1, 1),
	(101, 17, 2, 2, 2),
	(102, 17, 2, 3, 3),
	(103, 18, 1, 1, 1),
	(104, 18, 1, 2, 2),
	(105, 18, 1, 3, 3),
	(106, 18, 2, 1, 1),
	(107, 18, 2, 2, 2),
	(108, 18, 2, 3, 3),
	(109, 19, 1, 1, 1),
	(110, 19, 1, 2, 2),
	(111, 19, 1, 3, 3),
	(112, 19, 2, 1, 1),
	(113, 19, 2, 2, 2),
	(114, 19, 2, 3, 3),
	(115, 20, 1, 1, 1),
	(116, 20, 1, 2, 2),
	(117, 20, 1, 3, 3),
	(118, 20, 2, 1, 1),
	(119, 20, 2, 2, 2),
	(120, 20, 2, 3, 3);
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
	(1, 'Moyencommentaire', 4, 3, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(2, 'Moyencommentaire', 19, 13, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(3, 'Groscommentaire', 1, 13, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(4, 'Moyencommentaire', 7, 19, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(5, 'Moyencommentaire', 3, 20, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(6, 'Petitcommentaire', 8, 3, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(7, 'Groscommentaire', 14, 17, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(8, 'Moyencommentaire', 13, 14, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(9, 'Groscommentaire', 2, 13, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(10, 'Petitcommentaire', 19, 19, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(11, 'Groscommentaire', 7, 3, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(12, 'Petitcommentaire', 19, 19, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(13, 'Petitcommentaire', 18, 16, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(14, 'Moyencommentaire', 7, 15, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(15, 'Groscommentaire', 18, 12, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(16, 'Groscommentaire', 6, 20, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(17, 'Groscommentaire', 19, 3, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(18, 'Petitcommentaire', 5, 6, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(19, 'Groscommentaire', 5, 16, '2017-06-17 21:01:02', '2017-06-17 21:01:02'),
	(20, 'Moyencommentaire', 5, 1, '2017-06-17 21:01:02', '2017-06-17 21:01:02');
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
	(2, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 3, 1),
	(3, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 3, 2),
	(4, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 1, 2),
	(5, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 2, 1),
	(6, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 1, 1),
	(7, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 2, 1),
	(8, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 2, 1),
	(9, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 2, 2),
	(10, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 3, 2),
	(11, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 4, 1),
	(12, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 2, 2),
	(13, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 3, 1),
	(14, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 2, 2),
	(15, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 3, 2),
	(16, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 1, 2),
	(17, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 3, 2),
	(18, 'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.<br />Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.', 4, 2),
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
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table gujdnwazdp.migrations : ~16 rows (environ)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(97, '2014_10_12_000000_create_users_table', 1),
	(98, '2014_10_12_100000_create_password_resets_table', 1),
	(99, '2017_01_26_160607_create_comments_table', 1),
	(100, '2017_01_26_160637_create_cards_table', 1),
	(101, '2017_01_26_160654_create_card_types_table', 1),
	(102, '2017_01_26_160709_create_user_types_table', 1),
	(103, '2017_01_31_175926_create_tags_table', 1),
	(104, '2017_01_31_180011_create_card_tags_xref_table', 1),
	(105, '2017_02_23_001738_create_subjects_table', 1),
	(106, '2017_02_23_001826_create_chapters_table', 1),
	(107, '2017_02_23_002221_create_exercises_table', 1),
	(108, '2017_02_23_002700_create_fields_table', 1),
	(109, '2017_02_23_003444_create_grades_table', 1),
	(110, '2017_04_22_231708_create_questions_table', 1),
	(111, '2017_05_18_211923_create_card_exercises_xref_table', 1),
	(112, '2017_05_18_213616_create_card_chapters_xref_table', 1);
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
	(1, 'Lorem ipsum dolor sit amet'),
	(2, 'Lorem ipsum dolor sit amet consectetur adipiscing elit'),
	(3, 'Lorem ipsum dolor sit amet'),
	(4, 'Lorem ipsum dolor sit amet'),
	(5, 'adipiscing elit'),
	(6, 'adipiscing elit'),
	(7, 'Lorem ipsum dolor sit amet consectetur adipiscing elit'),
	(8, 'Lorem ipsum dolor sit amet'),
	(9, 'adipiscing elit'),
	(10, 'Lorem ipsum dolor sit amet consectetur'),
	(11, 'Lorem ipsum dolor sit amet consectetur adipiscing elit'),
	(12, 'Lorem ipsum dolor sit amet consectetur'),
	(13, 'adipiscing elit'),
	(14, 'Lorem ipsum dolor sit amet'),
	(15, 'Lorem ipsum dolor sit amet consectetur adipiscing elit'),
	(16, 'Lorem ipsum dolor sit amet consectetur adipiscing elit'),
	(17, 'Lorem ipsum dolor sit amet consectetur'),
	(18, 'Lorem ipsum dolor sit amet consectetur'),
	(19, 'Lorem ipsum dolor sit amet consectetur adipiscing elit'),
	(20, 'adipiscing elit');
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
	(1, 'admin', NULL, NULL, 'admin@gmail.com', '$2y$10$8t3NXh5byLlvsvb4DeoG5usVhw6Ryr17FAalw.dQJM3cqGSqNdi9a', 1, 1, 'VV88rWk2qBcilU4UF5jrsIWfaAvnAZO6jupJJ9N2bMesz3jGCzYORJDYyjzW', '2017-06-17 21:01:04', '2017-06-17 21:10:58'),
	(2, 'Charles0', NULL, NULL, 'JulietteSauve0@universite.pro', '$2y$10$PnTx6PJZB7mZ0E3G1LyBxO1pLVEBkObg9SaKB/tsUlJQEBCLfn/bm', 1, 3, NULL, '2017-06-17 21:01:05', '2017-06-17 21:01:05'),
	(3, 'Michael1', NULL, NULL, 'AlexiaLagace1@hotmail.com', '$2y$10$ipCd3lTJV56PF5n0.mVZ0O.vTBXVBRt7VYNmv3JTwkDT/bMjrxOOy', 1, 3, NULL, '2017-06-17 21:01:05', '2017-06-17 21:01:05'),
	(4, 'Rene2', NULL, NULL, 'CatherineGouin2@hotmail.tel', '$2y$10$/Py4RsutDBic/pv1VwulqejAUznJE.0/Rzj8.L40RkggI3q6rrntu', 1, 3, NULL, '2017-06-17 21:01:05', '2017-06-17 21:01:05'),
	(5, 'Justine3', NULL, NULL, 'EdouardCaron3@yahoo.asia', '$2y$10$79q4iaFNJUWZCRP9WkCLiOF8uUXDh723gjcMYf5sgqbKsRDvnfzf2', 1, 3, NULL, '2017-06-17 21:01:05', '2017-06-17 21:01:05'),
	(6, 'Roger4', NULL, NULL, 'MalikPellerin4@universite.ca', '$2y$10$IcVrJRxU.OVyIja/0vN8U.o.4Ggn2eTBH68JFWNutkpAWIl6BS4L2', 1, 3, NULL, '2017-06-17 21:01:05', '2017-06-17 21:01:05'),
	(7, 'Sarah5', NULL, NULL, 'BobLafrance5@yahoo.info', '$2y$10$iOHFlkMfcDisAnhkCaW1fuF4LRna9iUU16rMhMMrLZLnGN6iOrhVS', 1, 3, NULL, '2017-06-17 21:01:05', '2017-06-17 21:01:05'),
	(8, 'Victor6', NULL, NULL, 'BorrisGagne6@yahoo.pro', '$2y$10$wHMcUNwtS74GBMmxTI89VuWGVIiqLt7mbfOalzUJTC89PLk6ZtBgC', 1, 3, NULL, '2017-06-17 21:01:05', '2017-06-17 21:01:05'),
	(9, 'Chloe7', NULL, NULL, 'AliceChan7@outlook.tel', '$2y$10$pabndC/Tw/A.grGAIpZMD.qQn.lbU3k2rj9KJAWNnXI4uM7RVr.1S', 1, 3, NULL, '2017-06-17 21:01:05', '2017-06-17 21:01:05'),
	(10, 'Amelia8', NULL, NULL, 'VictorCote8@yahoo.cat', '$2y$10$w6Hg9F2zKEBBGRBiiqM5KuRHEcfHeiNcqb.joidz4htvc81NvBm2a', 1, 3, NULL, '2017-06-17 21:01:05', '2017-06-17 21:01:05'),
	(11, 'Camille9', NULL, NULL, 'LeaRivest9@universite.cat', '$2y$10$EIcUtw4LWwu6KNjihy3pde7OeocYdfDutwj2zG3KxDLZ8FZ8dnQ/q', 1, 3, NULL, '2017-06-17 21:01:05', '2017-06-17 21:01:05'),
	(12, 'Victor10', NULL, NULL, 'CharlesBouchard10@yahoo.info', '$2y$10$cGUfcv3BgZt5bCBIyNynGO5X2rMAhqqp.lj4zy9BntAnl79M1O.uq', 1, 3, NULL, '2017-06-17 21:01:05', '2017-06-17 21:01:05'),
	(13, 'Alice11', NULL, NULL, 'VictorMorin11@outlook.edu', '$2y$10$vtrAoCiqyQTJEEANxsbWfOHf2KkIv1gV1bxfdbrVnhUp6C5a14KaO', 1, 3, NULL, '2017-06-17 21:01:05', '2017-06-17 21:01:05'),
	(14, 'Alexia12', NULL, NULL, 'MichaelBarbeau12@outlook.jobs', '$2y$10$WG6H8bwTRWdB/RD23ZJG2.kKItohqWeZVRRpnW//qo0JDcDsnbJDa', 1, 3, NULL, '2017-06-17 21:01:05', '2017-06-17 21:01:05'),
	(15, 'Felix13', NULL, NULL, 'AdamGagne13@gmail.coop', '$2y$10$KpYbYyjvcYr2TKwSft/Gfefpn3muGQtsP04ReBoTX27i31sK3Br22', 1, 3, NULL, '2017-06-17 21:01:05', '2017-06-17 21:01:05'),
	(16, 'Amelia14', NULL, NULL, 'AntonySauve14@outlook.edu', '$2y$10$DUJIJZ8I/OPJDvNwzd9E5uGpvazM8XSUrPD8ZskPs7ldAYtUzGrZq', 1, 3, NULL, '2017-06-17 21:01:06', '2017-06-17 21:01:06'),
	(17, 'Chloe15', NULL, NULL, 'JohnMorin15@yahoo.info', '$2y$10$a.6q6tWi3Rg65L7ITXF1TuK.u6bELZXuMSRyP8WukeVh6jsIPxrty', 1, 3, NULL, '2017-06-17 21:01:06', '2017-06-17 21:01:06'),
	(18, 'Victor16', NULL, NULL, 'AliceBouchard16@gmail.coop', '$2y$10$EbZ8Js.DJSn46cEb7BwOg.FIdd2TXjj0xVr/OLOa/2AyzuNExLyda', 1, 3, NULL, '2017-06-17 21:01:06', '2017-06-17 21:01:06'),
	(19, 'Julien17', NULL, NULL, 'EdouardNolet17@outlook.org', '$2y$10$DR2PqZAXNQmBkcWWIFmTxO6qKYdz/x9WF8Ot1lV3vtyR11GsbuIgC', 1, 3, NULL, '2017-06-17 21:01:06', '2017-06-17 21:01:06'),
	(20, 'Michael18', NULL, NULL, 'IsaacCaron18@universite.gov', '$2y$10$qyWB2TW1T1vL1GMt3gBC0ORdB66Oxn0cSNv9jgBXeMQucxlPr5jLC', 1, 3, NULL, '2017-06-17 21:01:06', '2017-06-17 21:01:06'),
	(21, 'Clara19', NULL, NULL, 'AlexGagne19@universite.org', '$2y$10$lSMqeg4vVwlqcKbzrdgQ1O9cN2Tyvq.CT57h7qeWO52/C3z0XRs5m', 1, 3, NULL, '2017-06-17 21:01:06', '2017-06-17 21:01:06');
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

