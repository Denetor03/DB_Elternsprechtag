<?php
@include 'conn.php';
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  print_r($_POST);
  // prepare sql and bind parameters
  $stmt = $conn->prepare("INSERT INTO tbl_veranstaltung
  VALUES (Null, :bezeichnung, :Beginn, :ende, :fk_schulleitung)");
  $stmt->bindParam(':bezeichnung', $_POST["bezeichnung"]);
  $stmt->bindParam(':Beginn', $_POST["beginn"]);
  $stmt->bindParam(':ende', $_POST["ende"]);
  $stmt->bindParam(':fk_schulleitung', $_POST["fk_schulleitung"]);
  $stmt->execute();
  //redirects back to admin.php after creating raum
  echo '<script>window.location.href = "Admin.php";</script>';
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;