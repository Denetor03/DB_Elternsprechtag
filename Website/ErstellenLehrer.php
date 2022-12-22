<?php
@include 'conn.php';
try {
  $stmt1 = $conn->prepare("INSERT INTO tbl_benutzer VALUES (Null, 3, :passwort, :Email)");
  // Bind the values to the placeholders
  $stmt1->bindParam(':passwort', $_POST["passwort"]);
  $stmt1->bindParam(':Email', $_POST["email"]);
  // Execute the prepared statement
  $stmt1->execute();

  // Get the auto-incrementing ID of the inserted row in tbl_benutzer
  $benutzer_id = $conn->lastInsertId();

  // Prepare the INSERT statement for the tbl_lehrkraft table
  $stmt2 = $conn->prepare("INSERT INTO tbl_lehrkraft
  VALUES (Null, :Kuerzel, :Geschlecht, :Vorname, :Nachname, :Email, :FK_raum, :benutzer_id)");
  // Bind the values to the placeholders
  $stmt2->bindParam(':Kuerzel', $_POST["kuerzel"]);
  $stmt2->bindParam(':Geschlecht', $_POST["geschlecht"]);
  $stmt2->bindParam(':Vorname', $_POST["vorname"]);
  $stmt2->bindParam(':Nachname', $_POST["nachname"]);
  $stmt2->bindParam(':Email', $_POST["email"]);
  $stmt2->bindParam(':FK_raum', $_POST["FK_raum"]);
  $stmt2->bindParam(':benutzer_id', $benutzer_id);
  // Execute the prepared statement
  $stmt2->execute();
  //redirects back to admin.php after creating raum
  echo '<script>window.location.href = "Schulleitung.php";</script>';
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>