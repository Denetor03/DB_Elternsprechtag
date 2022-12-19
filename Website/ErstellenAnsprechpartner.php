<?php
@include 'conn.php';
try {
  print_r($_POST);
  $stmt = $conn->prepare("INSERT INTO tbl_ansprechpartner
  VALUES (Null, :Vorname, :Nachname, :Betriebsname, :Email, :Mobilnummer)");
  $stmt->bindParam(':Vorname', $_POST["vorname"]);
  $stmt->bindParam(':Nachname', $_POST["nachname"]);
  $stmt->bindParam(':Betriebsname', $_POST["betriebsname"]);
  $stmt->bindParam(':Email', $_POST["email"]);
  $stmt->bindParam(':Mobilnummer', $_POST["mobilnummer"]);
  $stmt->execute();

  echo "Ansprechpartner wurde angelegt!";
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;