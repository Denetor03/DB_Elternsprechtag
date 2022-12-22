<?php
@include 'conn.php';
try {
  print_r($_POST);

  $stmt = $conn->prepare("INSERT INTO tbl_gebaeude
  VALUES (Null, :Gebaudennummer, :Standortbezeichnung)");
  $stmt->bindParam(':Gebaudennummer', $_POST["gebaeudenr"]);
  $stmt->bindParam(':Standortbezeichnung', $_POST["bezeichnung"]);
  $stmt->execute();

  echo '<script>window.location.href = "Admin.php";</script>';
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;