<?php
@include 'conn.php';
try {
  print_r($_POST);

  $conn->beginTransaction();

  // Prepare the INSERT statements
  $stmt1 = $conn->prepare("INSERT INTO tbl_benutzer VALUES (Null, 2, :passwort, :Email)");
  $stmt2 = $conn->prepare("INSERT INTO tbl_ansprechpartner VALUES (Null, :Vorname, :Nachname, :Betriebsname, :Email, :Mobilnummer, :benutzer_id)");

  // Bind the values to the placeholders
  $stmt1->bindParam(':passwort', $_POST["passwort"]);
  $stmt1->bindParam(':Email', $_POST["email"]);

  $stmt2->bindParam(':Vorname', $_POST["vorname"]);
  $stmt2->bindParam(':Nachname', $_POST["nachname"]);
  $stmt2->bindParam(':Betriebsname', $_POST["betriebsname"]);
  $stmt2->bindParam(':Email', $_POST["email"]);
  $stmt2->bindParam(':Mobilnummer', $_POST["mobilnummer"]);
  $stmt2->bindParam(':benutzer_id', $benutzer_id);

  // Execute the prepared statements
  $stmt1->execute();

  // Get the auto-incrementing ID of the inserted row in tbl_benutzer
  $benutzer_id = $conn->lastInsertId();

  $stmt2->execute();

  // If the insertions are successful, commit the transaction
  $conn->commit();

} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
