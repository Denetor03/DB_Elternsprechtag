<?php
@include 'conn.php';
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  print_r($_POST);
  // prepare sql and bind parameters
  $stmt = $conn->prepare("INSERT INTO tbl_schulleitung
  VALUES (Null, :Kuerzel, :Geschlecht, :Email, :Vorname, :Nachname)");
  $stmt->bindParam(':Kuerzel', $_POST["kuerzel"]);
  $stmt->bindParam(':Geschlecht', $_POST["gechlecht"]);
  $stmt->bindParam(':Email', $_POST["email"]);
  $stmt->bindParam(':Vorname', $_POST["vorname"]);
  $stmt->bindParam(':Nachname', $_POST["nachname"]);
  $stmt->execute();
  //redirects back to admin.php after creating raum
  echo '<script>window.location.href = "Admin.php";</script>';
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;