-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 10. Nov 2022 um 14:18
-- Server-Version: 10.4.22-MariaDB
-- PHP-Version: 8.1.2

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
-- Tabellenstruktur für Tabelle `tbl_ansprechpartner`
--

CREATE TABLE `tbl_ansprechpartner` (
  `PK_ansprechpartner` int(11) NOT NULL,
  `Vorname` varchar(255) DEFAULT NULL,
  `Nachname` varchar(255) DEFAULT NULL,
  `Betriebsname` varchar(255) DEFAULT NULL,
  `E-Mail` varchar(255) DEFAULT NULL,
  `Mobilnummer` varchar(255) DEFAULT NULL,
  `FK_schueler` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_gebaeude`
--

CREATE TABLE `tbl_gebaeude` (
  `PK_gebaeude` int(11) NOT NULL,
  `Gebaeudenummer` int(255) DEFAULT NULL,
  `Standortbezeichnung` varchar(255) DEFAULT NULL,
  `FK_raum` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `FK_termin` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `FK_lehrkraft` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_schueler`
--

CREATE TABLE `tbl_schueler` (
  `PK_schueler` int(11) NOT NULL,
  `Klassenkuerzel` varchar(255) DEFAULT NULL,
  `Geschlecht` varchar(255) DEFAULT NULL,
  `Vorname` varchar(255) DEFAULT NULL,
  `Nachname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `FK_veranstaltung` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_termin`
--

CREATE TABLE `tbl_termin` (
  `PK_termin` int(11) NOT NULL,
  `Sprechdauer` time DEFAULT NULL,
  `Terminbeginn` datetime DEFAULT NULL,
  `Terminende` datetime DEFAULT NULL,
  `FK_ansprechpartner` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_veranstaltung`
--

CREATE TABLE `tbl_veranstaltung` (
  `PK_veranstaltung` int(11) NOT NULL,
  `Bezeichnung` varchar(255) DEFAULT NULL,
  `Beginn` datetime DEFAULT NULL,
  `Ende` datetime DEFAULT NULL,
  `FK_termin` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tbl_ansprechpartner`
--
ALTER TABLE `tbl_ansprechpartner`
  ADD PRIMARY KEY (`PK_ansprechpartner`),
  ADD KEY `FK_schueler` (`FK_schueler`);

--
-- Indizes für die Tabelle `tbl_gebaeude`
--
ALTER TABLE `tbl_gebaeude`
  ADD PRIMARY KEY (`PK_gebaeude`),
  ADD KEY `FK_raum` (`FK_raum`);

--
-- Indizes für die Tabelle `tbl_lehrkraft`
--
ALTER TABLE `tbl_lehrkraft`
  ADD PRIMARY KEY (`PK_lehrkraft`),
  ADD KEY `FK_termin` (`FK_termin`);

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
  ADD KEY `FK_lehrkraft` (`FK_lehrkraft`);

--
-- Indizes für die Tabelle `tbl_schueler`
--
ALTER TABLE `tbl_schueler`
  ADD PRIMARY KEY (`PK_schueler`);

--
-- Indizes für die Tabelle `tbl_schulleitung`
--
ALTER TABLE `tbl_schulleitung`
  ADD PRIMARY KEY (`PK_schulleitung`),
  ADD KEY `FK_veranstaltung` (`FK_veranstaltung`);

--
-- Indizes für die Tabelle `tbl_termin`
--
ALTER TABLE `tbl_termin`
  ADD PRIMARY KEY (`PK_termin`),
  ADD KEY `FK_ansprechpartner` (`FK_ansprechpartner`);

--
-- Indizes für die Tabelle `tbl_veranstaltung`
--
ALTER TABLE `tbl_veranstaltung`
  ADD PRIMARY KEY (`PK_veranstaltung`),
  ADD KEY `FK_termin` (`FK_termin`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tbl_ansprechpartner`
--
ALTER TABLE `tbl_ansprechpartner`
  MODIFY `PK_ansprechpartner` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `tbl_gebaeude`
--
ALTER TABLE `tbl_gebaeude`
  MODIFY `PK_gebaeude` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `tbl_lehrkraft`
--
ALTER TABLE `tbl_lehrkraft`
  MODIFY `PK_lehrkraft` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `tbl_raum`
--
ALTER TABLE `tbl_raum`
  MODIFY `PK_raum` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `tbl_schueler`
--
ALTER TABLE `tbl_schueler`
  MODIFY `PK_schueler` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `tbl_schulleitung`
--
ALTER TABLE `tbl_schulleitung`
  MODIFY `PK_schulleitung` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `tbl_termin`
--
ALTER TABLE `tbl_termin`
  MODIFY `PK_termin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `tbl_veranstaltung`
--
ALTER TABLE `tbl_veranstaltung`
  MODIFY `PK_veranstaltung` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `tbl_ansprechpartner`
--
ALTER TABLE `tbl_ansprechpartner`
  ADD CONSTRAINT `tbl_ansprechpartner_ibfk_1` FOREIGN KEY (`FK_schueler`) REFERENCES `tbl_schueler` (`PK_schueler`);

--
-- Constraints der Tabelle `tbl_gebaeude`
--
ALTER TABLE `tbl_gebaeude`
  ADD CONSTRAINT `tbl_gebaeude_ibfk_1` FOREIGN KEY (`FK_raum`) REFERENCES `tbl_raum` (`PK_raum`);

--
-- Constraints der Tabelle `tbl_lehrkraft`
--
ALTER TABLE `tbl_lehrkraft`
  ADD CONSTRAINT `tbl_lehrkraft_ibfk_1` FOREIGN KEY (`FK_termin`) REFERENCES `tbl_termin` (`PK_termin`);

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
  ADD CONSTRAINT `tbl_raum_ibfk_1` FOREIGN KEY (`FK_lehrkraft`) REFERENCES `tbl_lehrkraft` (`PK_lehrkraft`);

--
-- Constraints der Tabelle `tbl_schulleitung`
--
ALTER TABLE `tbl_schulleitung`
  ADD CONSTRAINT `tbl_schulleitung_ibfk_1` FOREIGN KEY (`FK_veranstaltung`) REFERENCES `tbl_veranstaltung` (`PK_veranstaltung`);

--
-- Constraints der Tabelle `tbl_termin`
--
ALTER TABLE `tbl_termin`
  ADD CONSTRAINT `tbl_termin_ibfk_1` FOREIGN KEY (`FK_ansprechpartner`) REFERENCES `tbl_ansprechpartner` (`PK_ansprechpartner`);

--
-- Constraints der Tabelle `tbl_veranstaltung`
--
ALTER TABLE `tbl_veranstaltung`
  ADD CONSTRAINT `tbl_veranstaltung_ibfk_1` FOREIGN KEY (`FK_termin`) REFERENCES `tbl_termin` (`PK_termin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
