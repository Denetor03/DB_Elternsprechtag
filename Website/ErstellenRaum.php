<?php
@include 'conn.php';
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  print_r($_POST);
  $stmt = $conn->prepare("INSERT INTO tbl_raum
  VALUES (null, :raumnr, :pk_gebaude)");
  $stmt->bindParam(':pk_gebaude', $_POST["gebaude"]);
  $stmt->bindParam(':raumnr', $_POST["raumnr"]);
  $stmt->execute();
  //redirects back to admin.php after creating raum
  echo '<script>window.location.href = "Admin.php";</script>';
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;