<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Elternsprechtag";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  print_r($_POST);
  // prepare sql and bind parameters
  $stmt = $conn->prepare("INSERT INTO tbl_ansprechpartner
  VALUES (Null, :Vorname, :Nachname, :Betriebsname, :Email, :Mobilnummer)");
  $stmt->bindParam(':Vorname', $_POST["vorname"]);
  $stmt->bindParam(':Nachname', $_POST["nachname"]);
  $stmt->bindParam(':Betriebsname', $_POST["betriebsname"]);
  $stmt->bindParam(':Email', $_POST["email"]);
  $stmt->bindParam(':Mobilnummer', $_POST["mobilnummer"]);
  $stmt->execute();

  echo "New records created successfully";
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;