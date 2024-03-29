-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 18. Jan 2023 um 00:38
-- Server-Version: 5.7.40-0ubuntu0.18.04.1
-- PHP-Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `lithothek`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `attachments`
--

CREATE TABLE `attachments` (
  `id_file` int(11) NOT NULL,
  `mimetyp` varchar(255) DEFAULT NULL,
  `file` blob,
  `link` mediumtext
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `locations`
--

CREATE TABLE `locations` (
  `id_location` int(11) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `logins`
--

CREATE TABLE `logins` (
  `uid` int(11) UNSIGNED NOT NULL,
  `md5` varchar(64) NOT NULL,
  `pwd` varchar(64) NOT NULL,
  `aktiv` tinyint(4) DEFAULT NULL,
  `id_ma` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `logins`
--

INSERT INTO `logins` (`uid`, `md5`, `pwd`, `aktiv`, `id_ma`) VALUES
(55, 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo', 1, 46);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `minerals`
--

CREATE TABLE `minerals` (
  `id_mineral` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `formula` varchar(255) DEFAULT NULL,
  `id_class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `shorttext` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `id_file` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `news_attachments`
--

CREATE TABLE `news_attachments` (
  `id_file` int(11) NOT NULL,
  `mimetyp` varchar(255) DEFAULT NULL,
  `file` blob,
  `link` mediumtext
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `specimen`
--

CREATE TABLE `specimen` (
  `id_specim` int(11) NOT NULL,
  `type` tinyint(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `id_mineral` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `id_location` int(11) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `stat1` tinyint(4) DEFAULT NULL,
  `stat2` tinyint(4) DEFAULT NULL,
  `description` mediumtext,
  `id_file` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `systematics`
--

CREATE TABLE `systematics` (
  `id_class` int(11) NOT NULL,
  `class` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id_ma` int(11) NOT NULL,
  `id_title` tinyint(4) NOT NULL,
  `name` varchar(160) NOT NULL,
  `id_details` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id_ma`, `id_title`, `name`, `id_details`) VALUES
(46, 2, 'Demo', 46);

-- --------------------------------------------------------

--
-- Stellvertreter-Struktur des Views `v_collection`
-- (Siehe unten für die tatsächliche Ansicht)
--
CREATE TABLE `v_collection` (
`id` int(11)
,`type` tinyint(11)
,`title` varchar(255)
,`date` date
,`number` varchar(255)
,`description` mediumtext
,`id_mineral` int(11)
,`mineral` varchar(255)
,`formula` varchar(255)
,`id_location` int(11)
,`location` varchar(255)
,`full_location` varchar(512)
,`country` varchar(255)
,`id_file` int(11)
,`link` mediumtext
);

-- --------------------------------------------------------

--
-- Stellvertreter-Struktur des Views `v_locations`
-- (Siehe unten für die tatsächliche Ansicht)
--
CREATE TABLE `v_locations` (
`id` int(11)
,`location` varchar(255)
,`country` varchar(255)
,`full_location` varchar(512)
);

-- --------------------------------------------------------

--
-- Stellvertreter-Struktur des Views `v_minerals`
-- (Siehe unten für die tatsächliche Ansicht)
--
CREATE TABLE `v_minerals` (
`id` int(11)
,`name` varchar(255)
,`formula` varchar(255)
);

-- --------------------------------------------------------

--
-- Stellvertreter-Struktur des Views `v_news`
-- (Siehe unten für die tatsächliche Ansicht)
--
CREATE TABLE `v_news` (
`id_news` int(11)
,`title` varchar(45)
,`shorttext` varchar(255)
,`description` mediumtext
,`start` date
,`end` date
,`status` tinyint(4)
,`id_file` int(11)
,`file_link` mediumtext
);

-- --------------------------------------------------------

--
-- Stellvertreter-Struktur des Views `v_systematics`
-- (Siehe unten für die tatsächliche Ansicht)
--
CREATE TABLE `v_systematics` (
`id` int(11)
,`class` varchar(255)
,`department` varchar(255)
,`name` varchar(255)
,`formula` varchar(255)
);

-- --------------------------------------------------------

--
-- Stellvertreter-Struktur des Views `v_users`
-- (Siehe unten für die tatsächliche Ansicht)
--
CREATE TABLE `v_users` (
`uid` int(11) unsigned
,`name` varchar(160)
,`fullname` varchar(160)
,`username` varchar(160)
,`password` varchar(64)
,`pwtext` varchar(64)
,`aktiv` tinyint(4)
);

-- --------------------------------------------------------

--
-- Struktur des Views `v_collection`
--
DROP TABLE IF EXISTS `v_collection`;

CREATE ALGORITHM=TEMPTABLE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_collection`  AS SELECT `s`.`id_specim` AS `id`, `s`.`type` AS `type`, `s`.`title` AS `title`, `s`.`date` AS `date`, `s`.`number` AS `number`, `s`.`description` AS `description`, `m`.`id_mineral` AS `id_mineral`, `m`.`name` AS `mineral`, `m`.`formula` AS `formula`, `l`.`id_location` AS `id_location`, `l`.`location` AS `location`, concat(`l`.`location`,', ',`l`.`country`) AS `full_location`, `l`.`country` AS `country`, `a`.`id_file` AS `id_file`, `a`.`link` AS `link` FROM (((`specimen` `s` join `minerals` `m` on((`s`.`id_mineral` = `m`.`id_mineral`))) join `locations` `l` on((`s`.`id_location` = `l`.`id_location`))) left join `attachments` `a` on((`s`.`id_file` = `a`.`id_file`))) WHERE 1 ORDER BY `s`.`title` ASC  ;

-- --------------------------------------------------------

--
-- Struktur des Views `v_locations`
--
DROP TABLE IF EXISTS `v_locations`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_locations`  AS SELECT `locations`.`id_location` AS `id`, `locations`.`location` AS `location`, `locations`.`country` AS `country`, concat(`locations`.`location`,', ',`locations`.`country`) AS `full_location` FROM `locations` ORDER BY `locations`.`location` ASC  ;

-- --------------------------------------------------------

--
-- Struktur des Views `v_minerals`
--
DROP TABLE IF EXISTS `v_minerals`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_minerals`  AS SELECT `minerals`.`id_mineral` AS `id`, `minerals`.`name` AS `name`, `minerals`.`formula` AS `formula` FROM `minerals` ORDER BY `minerals`.`name` ASC  ;

-- --------------------------------------------------------

--
-- Struktur des Views `v_news`
--
DROP TABLE IF EXISTS `v_news`;

CREATE ALGORITHM=MERGE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_news`  AS SELECT `n`.`id_news` AS `id_news`, `n`.`title` AS `title`, `n`.`shorttext` AS `shorttext`, `n`.`description` AS `description`, `n`.`start` AS `start`, `n`.`end` AS `end`, `n`.`status` AS `status`, `n`.`id_file` AS `id_file`, `a`.`link` AS `file_link` FROM (`news` `n` left join `news_attachments` `a` on((`n`.`id_file` = `a`.`id_file`)))  ;

-- --------------------------------------------------------

--
-- Struktur des Views `v_systematics`
--
DROP TABLE IF EXISTS `v_systematics`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_systematics`  AS SELECT `systematics`.`id_class` AS `id`, `systematics`.`class` AS `class`, `systematics`.`department` AS `department`, `m`.`name` AS `name`, `m`.`formula` AS `formula` FROM (`systematics` left join `minerals` `m` on((`systematics`.`id_class` = `m`.`id_class`))) ORDER BY `m`.`name` ASC  ;

-- --------------------------------------------------------

--
-- Struktur des Views `v_users`
--
DROP TABLE IF EXISTS `v_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_users`  AS SELECT `l`.`uid` AS `uid`, `u`.`name` AS `name`, convert(`u`.`name` using utf8) AS `fullname`, lower(convert(`u`.`name` using utf8)) AS `username`, `l`.`md5` AS `password`, `l`.`pwd` AS `pwtext`, `l`.`aktiv` AS `aktiv` FROM (`logins` `l` join `users` `u` on((`l`.`id_ma` = `u`.`id_ma`))) WITH LOCAL CHECK OPTION  ;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id_file`);

--
-- Indizes für die Tabelle `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id_location`);

--
-- Indizes für die Tabelle `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`uid`);

--
-- Indizes für die Tabelle `minerals`
--
ALTER TABLE `minerals`
  ADD PRIMARY KEY (`id_mineral`);

--
-- Indizes für die Tabelle `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Indizes für die Tabelle `news_attachments`
--
ALTER TABLE `news_attachments`
  ADD PRIMARY KEY (`id_file`);

--
-- Indizes für die Tabelle `specimen`
--
ALTER TABLE `specimen`
  ADD PRIMARY KEY (`id_specim`);

--
-- Indizes für die Tabelle `systematics`
--
ALTER TABLE `systematics`
  ADD PRIMARY KEY (`id_class`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_ma`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `locations`
--
ALTER TABLE `locations`
  MODIFY `id_location` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `logins`
--
ALTER TABLE `logins`
  MODIFY `uid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT für Tabelle `minerals`
--
ALTER TABLE `minerals`
  MODIFY `id_mineral` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `news_attachments`
--
ALTER TABLE `news_attachments`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `specimen`
--
ALTER TABLE `specimen`
  MODIFY `id_specim` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `systematics`
--
ALTER TABLE `systematics`
  MODIFY `id_class` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
