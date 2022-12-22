<?php
@include 'conn.php';
try {
  $stmt1 = $conn->prepare("INSERT INTO tbl_benutzer VALUES (Null, 4, :passwort, :Email)");
  $stmt1->bindParam(':passwort', $_POST["passwort"]);
  $stmt1->bindParam(':Email', $_POST["email"]);
  $stmt1->execute();

  $benutzer_id = $conn->lastInsertId();

  $stmt2 = $conn->prepare("INSERT INTO tbl_schulleitung
  VALUES (Null, :Kuerzel, :Geschlecht, :Email, :Vorname, :Nachname, :benutzer_id)");
  $stmt2->bindParam(':Kuerzel', $_POST["kuerzel"]);
  $stmt2->bindParam(':Geschlecht', $_POST["geschlecht"]);
  $stmt2->bindParam(':Email', $_POST["email"]);
  $stmt2->bindParam(':Vorname', $_POST["vorname"]);
  $stmt2->bindParam(':Nachname', $_POST["nachname"]);
  $stmt2->bindParam(':benutzer_id', $benutzer_id);
  $stmt2->execute();

  echo '<script>window.location.href = "Admin.php";</script>';
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;