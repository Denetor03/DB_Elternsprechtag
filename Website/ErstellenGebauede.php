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
  $stmt = $conn->prepare("INSERT INTO tbl_gebaeude
  VALUES (Null, :Gebaudennummer, :Standortbezeichnung)");
  $stmt->bindParam(':Gebaudennummer', $_POST["gebaeudenr"]);
  $stmt->bindParam(':Standortbezeichnung', $_POST["bezeichnung"]);
  $stmt->execute();

  echo "New records created successfully";
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;