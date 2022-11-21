<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Elternsprechtag";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // prepare sql and bind parameters
  $stmt = $conn->prepare("INSERT INTO tbl_veranstaltung )
  VALUES (:PK_schulleitung, :Kuerzel, :Geschlecht, :`E-mail`, :Vorname, :Nachname)");
  $stmt->bindParam(':Kuerzel', $_POST["kuerzel"]);
  $stmt->bindParam(':Geschlecht`', $_POST["Geschlecht"]);
  $stmt->bindParam(':`E-mail`', $_POST["Email"]);
  $stmt->bindParam(':Vorname', $_POST["Vorname"]);
  $stmt->bindParam(':Nachname`', $_POST["Nachname"]);
  $stmt->execute();

  echo "New records created successfully";
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?> 