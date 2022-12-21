UPDATE `tbl_termin` SET Sprechdauer = (SELECT TIMEDIFF(Terminende, Terminbeginn) AS Sprechdauer FROM tbl_termin WHERE PK_termin = 'PKnummer') WHERE PK_termin = 'PKnummer
