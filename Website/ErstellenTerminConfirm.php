<?php
@include 'conn.php';
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //pk_termin, sprechdauer, terminbeginn, ende, fk lehrer, fk veranstaltung fk_ansprechpartner
  print_r($_POST);
  // prepare sql and bind parameters
  $stmt = $conn->prepare("INSERT INTO tbl_lehrkraft_termin
  VALUES (:fk_lehrkraft, :fk_termin )");
  $stmt->bindParam(':fk_lehrkraft', $_POST["fk_lehrer"]);
  $stmt->bindParam(':fk_termin', $_POST["fk_termin"]);
  $stmt->execute();
  //redirects back to admin.php after creating raum
  //echo '<script>window.location.href = "Ansprechpartner.php";</script>';

  //$stmt = $conn->prepare("UPDATE `tbl_termin` SET Sprechdauer = (SELECT TIMEDIFF(Terminende, Terminbeginn) AS Sprechdauer FROM tbl_termin WHERE PK_termin = 'PKnummer') WHERE PK_termin = 'PKnummer'");
  //$stmt->execute();
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;