CREATE VIEW view_termin_lehrkraft_ansprechpartner AS
SELECT Sprechdauer, Terminbeginn, Terminende, tbl_lehrkraft.Vorname AS 'Lehkraft-Vorname', tbl_lehrkraft.Nachname, tbl_ansprechpartner.Vorname, tbl_ansprechpartner.Nachname
FROM tbL_termin
JOIN tbl_lehrkraft ON PK_lehrkraft = FK_lehrkraft
JOIN tbl_ansprechpartner ON PK_ansprechpartner = FK_ansprechpartner
