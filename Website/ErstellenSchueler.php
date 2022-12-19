<?php
@include 'conn.php';
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  print_r($_POST);
  // prepare sql and bind parameters
  $stmt = $conn->prepare("INSERT INTO tbl_schueler
  VALUES (Null, :Klasse, :Geschlecht, :Vorname, :Nachname, :fk_ansprechpartner)");
  $stmt->bindParam(':Klasse', $_POST["klasse"]);
  $stmt->bindParam(':Geschlecht', $_POST["geschlecht"]);
  $stmt->bindParam(':Vorname', $_POST["vorname"]);
  $stmt->bindParam(':Nachname', $_POST["nachname"]);
  $stmt->bindParam(':fk_ansprechpartner', $_POST["fk_ansprechpartner"]);
  $stmt->execute();
  //redirects back to admin.php after creating raum
  echo '<script>window.location.href = "Ansprechpartner.php";</script>';
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;