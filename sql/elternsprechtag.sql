-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 22. Dez 2022 um 23:30
-- Server-Version: 10.4.18-MariaDB
-- PHP-Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `elternsprechtag`
--

-- --------------------------------------------------------

--
-- Stellvertreter-Struktur des Views `ansprechpartner_informationen`
-- (Siehe unten für die tatsächliche Ansicht)
--
CREATE TABLE `ansprechpartner_informationen` (
`Vorname Ansprechpartner` varchar(255)
,`Nachname Ansprechpartner` varchar(255)
,`Ansprechpartner Mobilnummer` varchar(255)
,`Vorname Schueler` varchar(255)
,`Nachname Schueler` varchar(255)
);

-- --------------------------------------------------------

--
-- Stellvertreter-Struktur des Views `lehrkraft_informationen`
-- (Siehe unten für die tatsächliche Ansicht)
--
CREATE TABLE `lehrkraft_informationen` (
`Kuerzel` varchar(255)
,`Geschlecht` varchar(255)
,`Vorname` varchar(255)
,`Nachname` varchar(255)
,`E-Mail` varchar(6)
);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_ansprechpartner`
--

CREATE TABLE `tbl_ansprechpartner` (
  `PK_ansprechpartner` int(11) NOT NULL,
  `Vorname` varchar(255) DEFAULT NULL,
  `Nachname` varchar(255) DEFAULT NULL,
  `Betriebsname` varchar(255) DEFAULT NULL,
  `E-Mail` varchar(255) DEFAULT NULL,
  `Mobilnummer` varchar(255) DEFAULT NULL,
  `FK_benutzer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tbl_ansprechpartner`
--

INSERT INTO `tbl_ansprechpartner` (`PK_ansprechpartner`, `Vorname`, `Nachname`, `Betriebsname`, `E-Mail`, `Mobilnummer`, `FK_benutzer`) VALUES
(1, 'Peter', 'Schmitt', NULL, 'Peter.Schmitt202@gmail.com', '1238/129416', 1),
(2, 'Karla', 'Pastrani', 'Metzhein', 'Kar.la19247@web.de', '0124/129081', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_benutzer`
--

CREATE TABLE `tbl_benutzer` (
  `PK_benutzer` int(11) NOT NULL,
  `prioritaet` int(5) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `passwort` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tbl_benutzer`
--

INSERT INTO `tbl_benutzer` (`PK_benutzer`, `prioritaet`, `email`, `passwort`) VALUES
(1, 2, 'Peter.Schmitt202@gmail.com', '1234'),
(2, 2, 'Kar.la19247@web.de', '1234'),
(5, 5, 'admin@mail.com', '1234'),
(6, 4, 'franz.kar@gmail.com', '1234'),
(7, 3, 'rang@web.de', '1234'),
(8, 3, 'Pach.Ing@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_gebaeude`
--

CREATE TABLE `tbl_gebaeude` (
  `PK_gebaeude` int(11) NOT NULL,
  `Gebaeudenummer` int(255) DEFAULT NULL,
  `Standortbezeichnung` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tbl_gebaeude`
--

INSERT INTO `tbl_gebaeude` (`PK_gebaeude`, `Gebaeudenummer`, `Standortbezeichnung`) VALUES
(1, 24, 'Blumenstraße 16, 42651 Solingen'),
(2, 12, 'Franzstraße 11, 42657 Solingen');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_lehrkraft`
--

CREATE TABLE `tbl_lehrkraft` (
  `PK_lehrkraft` int(11) NOT NULL,
  `Kuerzel` varchar(255) DEFAULT NULL,
  `Geschlecht` varchar(255) DEFAULT NULL,
  `Vorname` varchar(255) DEFAULT NULL,
  `Nachname` varchar(255) DEFAULT NULL,
  `E-Mail` varchar(255) DEFAULT NULL,
  `FK_raum` int(255) DEFAULT NULL,
  `FK_benutzer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tbl_lehrkraft`
--

INSERT INTO `tbl_lehrkraft` (`PK_lehrkraft`, `Kuerzel`, `Geschlecht`, `Vorname`, `Nachname`, `E-Mail`, `FK_raum`, `FK_benutzer`) VALUES
(1, 'Pac', 'Weiblich', 'Ingrid', 'Pachal', 'Pach.Ing@gmail.com', 1, 8),
(2, 'Ran', 'Männlich', 'Jakob', 'Rangmann', 'rang@web.de', 2, 7);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_lehrkraft_termin`
--

CREATE TABLE `tbl_lehrkraft_termin` (
  `FK_lehrkraft` int(255) DEFAULT NULL,
  `FK_termin` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_raum`
--

CREATE TABLE `tbl_raum` (
  `PK_raum` int(11) NOT NULL,
  `Raumnummer` int(255) DEFAULT NULL,
  `FK_gebaeude` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tbl_raum`
--

INSERT INTO `tbl_raum` (`PK_raum`, `Raumnummer`, `FK_gebaeude`) VALUES
(1, 134, 1),
(2, 125, 2),
(6, 447, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_schueler`
--

CREATE TABLE `tbl_schueler` (
  `PK_schueler` int(11) NOT NULL,
  `Klassenkuerzel` varchar(255) DEFAULT NULL,
  `Geschlecht` varchar(255) DEFAULT NULL,
  `Vorname` varchar(255) DEFAULT NULL,
  `Nachname` varchar(255) DEFAULT NULL,
  `FK_ansprechpartner` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tbl_schueler`
--

INSERT INTO `tbl_schueler` (`PK_schueler`, `Klassenkuerzel`, `Geschlecht`, `Vorname`, `Nachname`, `FK_ansprechpartner`) VALUES
(1, 'HIT-U', 'Männlich', 'Oviler', 'Hänchen ', 1),
(2, 'HIT-U2', 'Männlich', 'Merlin', 'Schwacken', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_schulleitung`
--

CREATE TABLE `tbl_schulleitung` (
  `PK_schulleitung` int(11) NOT NULL,
  `Kuerzel` varchar(255) DEFAULT NULL,
  `Geschlecht` varchar(255) DEFAULT NULL,
  `E-Mail` varchar(255) DEFAULT NULL,
  `Vorname` varchar(255) DEFAULT NULL,
  `Nachname` varchar(255) DEFAULT NULL,
  `FK_benutzer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tbl_schulleitung`
--

INSERT INTO `tbl_schulleitung` (`PK_schulleitung`, `Kuerzel`, `Geschlecht`, `E-Mail`, `Vorname`, `Nachname`, `FK_benutzer`) VALUES
(1, 'Kar', 'Männlich', 'franz.kar@gmail.com', 'Fanz', 'Karling', 6);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_termin`
--

CREATE TABLE `tbl_termin` (
  `PK_termin` int(11) NOT NULL,
  `Terminbeginn` datetime DEFAULT NULL,
  `Terminende` datetime DEFAULT NULL,
  `FK_lehrkraft` int(255) DEFAULT NULL,
  `FK_veranstaltung` int(255) DEFAULT NULL,
  `FK_ansprechpartner` int(255) DEFAULT NULL,
  `Sprechdauer` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tbl_termin`
--

INSERT INTO `tbl_termin` (`PK_termin`, `Terminbeginn`, `Terminende`, `FK_lehrkraft`, `FK_veranstaltung`, `FK_ansprechpartner`, `Sprechdauer`) VALUES
(1, '2022-12-08 10:21:41', '2022-12-08 10:41:41', 1, 1, 1, '00:20:00'),
(2, '2022-12-08 10:41:41', '2022-12-08 11:01:41', 2, 1, 2, '00:20:00');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_veranstaltung`
--

CREATE TABLE `tbl_veranstaltung` (
  `PK_veranstaltung` int(11) NOT NULL,
  `Bezeichnung` varchar(255) DEFAULT NULL,
  `Beginn` datetime DEFAULT NULL,
  `Ende` datetime DEFAULT NULL,
  `FK_schulleitung` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tbl_veranstaltung`
--

INSERT INTO `tbl_veranstaltung` (`PK_veranstaltung`, `Bezeichnung`, `Beginn`, `Ende`, `FK_schulleitung`) VALUES
(1, 'Elternsprechtag', '2022-12-22 07:00:00', '2022-12-22 20:00:00', 1);

-- --------------------------------------------------------

--
-- Stellvertreter-Struktur des Views `termin_informationen`
-- (Siehe unten für die tatsächliche Ansicht)
--
CREATE TABLE `termin_informationen` (
`Veranstaltungs Bezeichnung` varchar(255)
,`Lehrkraft` varchar(255)
,`Raumnummer` int(255)
,`Terminbeginn` datetime
,`Terminende` datetime
,`Terminlänge` time
,`Vorname Ansprechpartner` varchar(255)
,`Nachname Ansprechpartner` varchar(255)
,`Ansprechpartner Mobilnummer` varchar(255)
,`Vorname Schueler` varchar(255)
,`Nachname Schueler` varchar(255)
);

-- --------------------------------------------------------

--
-- Struktur des Views `ansprechpartner_informationen`
--
DROP TABLE IF EXISTS `ansprechpartner_informationen`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ansprechpartner_informationen`  AS SELECT `tbl_ansprechpartner`.`Vorname` AS `Vorname Ansprechpartner`, `tbl_ansprechpartner`.`Nachname` AS `Nachname Ansprechpartner`, `tbl_ansprechpartner`.`Mobilnummer` AS `Ansprechpartner Mobilnummer`, `tbl_schueler`.`Vorname` AS `Vorname Schueler`, `tbl_schueler`.`Nachname` AS `Nachname Schueler` FROM (`tbl_ansprechpartner` join `tbl_schueler` on(`tbl_schueler`.`FK_ansprechpartner` = `tbl_ansprechpartner`.`PK_ansprechpartner`)) ;

-- --------------------------------------------------------

--
-- Struktur des Views `lehrkraft_informationen`
--
DROP TABLE IF EXISTS `lehrkraft_informationen`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lehrkraft_informationen`  AS SELECT `tbl_lehrkraft`.`Kuerzel` AS `Kuerzel`, `tbl_lehrkraft`.`Geschlecht` AS `Geschlecht`, `tbl_lehrkraft`.`Vorname` AS `Vorname`, `tbl_lehrkraft`.`Nachname` AS `Nachname`, 'E-Mail' AS `E-Mail` FROM `tbl_lehrkraft` ;

-- --------------------------------------------------------

--
-- Struktur des Views `termin_informationen`
--
DROP TABLE IF EXISTS `termin_informationen`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `termin_informationen`  AS SELECT `tbl_veranstaltung`.`Bezeichnung` AS `Veranstaltungs Bezeichnung`, `tbl_lehrkraft`.`Kuerzel` AS `Lehrkraft`, `tbl_raum`.`Raumnummer` AS `Raumnummer`, `tbl_termin`.`Terminbeginn` AS `Terminbeginn`, `tbl_termin`.`Terminende` AS `Terminende`, `tbl_termin`.`Sprechdauer` AS `Terminlänge`, `tbl_ansprechpartner`.`Vorname` AS `Vorname Ansprechpartner`, `tbl_ansprechpartner`.`Nachname` AS `Nachname Ansprechpartner`, `tbl_ansprechpartner`.`Mobilnummer` AS `Ansprechpartner Mobilnummer`, `tbl_schueler`.`Vorname` AS `Vorname Schueler`, `tbl_schueler`.`Nachname` AS `Nachname Schueler` FROM ((((((`tbl_termin` join `tbl_ansprechpartner` on(`tbl_termin`.`FK_ansprechpartner` = `tbl_ansprechpartner`.`PK_ansprechpartner`)) join `tbl_schueler` on(`tbl_schueler`.`FK_ansprechpartner` = `tbl_ansprechpartner`.`PK_ansprechpartner`)) join `tbl_lehrkraft_termin` on(`tbl_termin`.`PK_termin` = `tbl_lehrkraft_termin`.`FK_termin`)) join `tbl_lehrkraft` on(`tbl_lehrkraft_termin`.`FK_lehrkraft` = `tbl_lehrkraft`.`PK_lehrkraft`)) join `tbl_raum` on(`tbl_lehrkraft`.`FK_raum` = `tbl_raum`.`PK_raum`)) join `tbl_veranstaltung` on(`tbl_termin`.`FK_veranstaltung` = `tbl_veranstaltung`.`PK_veranstaltung`)) ;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tbl_ansprechpartner`
--
ALTER TABLE `tbl_ansprechpartner`
  ADD PRIMARY KEY (`PK_ansprechpartner`),
  ADD KEY `FK_benutzer` (`FK_benutzer`);

--
-- Indizes für die Tabelle `tbl_benutzer`
--
ALTER TABLE `tbl_benutzer`
  ADD PRIMARY KEY (`PK_benutzer`);

--
-- Indizes für die Tabelle `tbl_gebaeude`
--
ALTER TABLE `tbl_gebaeude`
  ADD PRIMARY KEY (`PK_gebaeude`);

--
-- Indizes für die Tabelle `tbl_lehrkraft`
--
ALTER TABLE `tbl_lehrkraft`
  ADD PRIMARY KEY (`PK_lehrkraft`),
  ADD KEY `FK_raum` (`FK_raum`),
  ADD KEY `FK_benutzer` (`FK_benutzer`);

--
-- Indizes für die Tabelle `tbl_lehrkraft_termin`
--
ALTER TABLE `tbl_lehrkraft_termin`
  ADD KEY `FK_lehrkraft` (`FK_lehrkraft`),
  ADD KEY `FK_termin` (`FK_termin`);

--
-- Indizes für die Tabelle `tbl_raum`
--
ALTER TABLE `tbl_raum`
  ADD PRIMARY KEY (`PK_raum`),
  ADD KEY `FK_gebaeude` (`FK_gebaeude`);

--
-- Indizes für die Tabelle `tbl_schueler`
--
ALTER TABLE `tbl_schueler`
  ADD PRIMARY KEY (`PK_schueler`),
  ADD KEY `FK_ansprechparnter` (`FK_ansprechpartner`);

--
-- Indizes für die Tabelle `tbl_schulleitung`
--
ALTER TABLE `tbl_schulleitung`
  ADD PRIMARY KEY (`PK_schulleitung`),
  ADD KEY `FK_benutzer` (`FK_benutzer`);

--
-- Indizes für die Tabelle `tbl_termin`
--
ALTER TABLE `tbl_termin`
  ADD PRIMARY KEY (`PK_termin`),
  ADD KEY `FK_ansprechpartner` (`FK_ansprechpartner`),
  ADD KEY `FK_lehrkraft` (`FK_lehrkraft`),
  ADD KEY `FK_veranstaltung` (`FK_veranstaltung`);

--
-- Indizes für die Tabelle `tbl_veranstaltung`
--
ALTER TABLE `tbl_veranstaltung`
  ADD PRIMARY KEY (`PK_veranstaltung`),
  ADD KEY `FK_schulleitung` (`FK_schulleitung`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tbl_ansprechpartner`
--
ALTER TABLE `tbl_ansprechpartner`
  MODIFY `PK_ansprechpartner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `tbl_benutzer`
--
ALTER TABLE `tbl_benutzer`
  MODIFY `PK_benutzer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `tbl_gebaeude`
--
ALTER TABLE `tbl_gebaeude`
  MODIFY `PK_gebaeude` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `tbl_lehrkraft`
--
ALTER TABLE `tbl_lehrkraft`
  MODIFY `PK_lehrkraft` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `tbl_raum`
--
ALTER TABLE `tbl_raum`
  MODIFY `PK_raum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `tbl_schueler`
--
ALTER TABLE `tbl_schueler`
  MODIFY `PK_schueler` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `tbl_schulleitung`
--
ALTER TABLE `tbl_schulleitung`
  MODIFY `PK_schulleitung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `tbl_termin`
--
ALTER TABLE `tbl_termin`
  MODIFY `PK_termin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `tbl_veranstaltung`
--
ALTER TABLE `tbl_veranstaltung`
  MODIFY `PK_veranstaltung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `tbl_lehrkraft`
--
ALTER TABLE `tbl_lehrkraft`
  ADD CONSTRAINT `tbl_lehrkraft_ibfk_1` FOREIGN KEY (`FK_raum`) REFERENCES `tbl_raum` (`PK_raum`);

--
-- Constraints der Tabelle `tbl_lehrkraft_termin`
--
ALTER TABLE `tbl_lehrkraft_termin`
  ADD CONSTRAINT `tbl_lehrkraft_termin_ibfk_1` FOREIGN KEY (`FK_lehrkraft`) REFERENCES `tbl_lehrkraft` (`PK_lehrkraft`),
  ADD CONSTRAINT `tbl_lehrkraft_termin_ibfk_2` FOREIGN KEY (`FK_termin`) REFERENCES `tbl_termin` (`PK_termin`);

--
-- Constraints der Tabelle `tbl_raum`
--
ALTER TABLE `tbl_raum`
  ADD CONSTRAINT `tbl_raum_ibfk_1` FOREIGN KEY (`FK_gebaeude`) REFERENCES `tbl_gebaeude` (`PK_gebaeude`);

--
-- Constraints der Tabelle `tbl_schueler`
--
ALTER TABLE `tbl_schueler`
  ADD CONSTRAINT `tbl_schueler_ibfk_1` FOREIGN KEY (`FK_ansprechpartner`) REFERENCES `tbl_ansprechpartner` (`PK_ansprechpartner`);

--
-- Constraints der Tabelle `tbl_termin`
--
ALTER TABLE `tbl_termin`
  ADD CONSTRAINT `tbl_termin_ibfk_1` FOREIGN KEY (`FK_ansprechpartner`) REFERENCES `tbl_ansprechpartner` (`PK_ansprechpartner`),
  ADD CONSTRAINT `tbl_termin_ibfk_2` FOREIGN KEY (`FK_veranstaltung`) REFERENCES `tbl_veranstaltung` (`PK_veranstaltung`),
  ADD CONSTRAINT `tbl_termin_ibfk_3` FOREIGN KEY (`FK_lehrkraft`) REFERENCES `tbl_lehrkraft` (`PK_lehrkraft`);

--
-- Constraints der Tabelle `tbl_veranstaltung`
--
ALTER TABLE `tbl_veranstaltung`
  ADD CONSTRAINT `tbl_veranstaltung_ibfk_1` FOREIGN KEY (`FK_schulleitung`) REFERENCES `tbl_schulleitung` (`PK_schulleitung`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
