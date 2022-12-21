CREATE VIEW termin_informationen AS
SELECT  tbl_veranstaltung.Bezeichnung AS 'Veranstaltungs Bezeichnung',
 Kuerzel AS 'Lehrkraft',
 Raumnummer, Terminbeginn, Terminende, Sprechdauer AS 'Terminlänge',
 tbl_ansprechpartner.Vorname AS 'Vorname Ansprechpartner',
 tbl_ansprechpartner.Nachname AS 'Nachname Ansprechpartner',
 tbl_ansprechpartner.Mobilnummer AS 'Ansprechpartner Mobilnummer',
 tbl_schueler.Vorname AS 'Vorname Schueler',
 tbl_schueler.Nachname AS 'Nachname Schueler'
 
FROM tbl_termin
JOIN tbl_ansprechpartner ON tbl_termin.FK_ansprechpartner = tbl_ansprechpartner.PK_ansprechpartner
JOIN tbl_schueler ON tbl_schueler.FK_ansprechpartner = tbl_ansprechpartner.PK_ansprechpartner
JOIN tbl_lehrkraft_termin ON tbl_termin.PK_termin = tbl_lehrkraft_termin.FK_termin
JOIN tbl_lehrkraft ON tbl_lehrkraft_termin.FK_lehrkraft = tbl_lehrkraft.PK_lehrkraft
JOIN tbl_raum ON tbl_lehrkraft.FK_raum = tbl_raum.PK_raum
JOIN tbl_veranstaltung ON tbl_termin.FK_veranstaltung = tbl_veranstaltung.PK_veranstaltung;
