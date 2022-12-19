<?php
@include 'conn.php';
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //pk_termin, sprechdauer, terminbeginn, ende, fk lehrer, fk veranstaltung fk_ansprechpartner
  print_r($_POST);
  $to_time = strtotime($_POST["terminbeginn"]);
  $from_time = strtotime($_POST["terminende"]);
  $sprechdauer =  round(abs($to_time - $from_time) / 60,2);
  // prepare sql and bind parameters
  $stmt = $conn->prepare("INSERT INTO tbl_termin
  VALUES (Null, :sprechdauer, :terminbeginn, :terminende, :fk_lehrer, :fk_veranstaltung, :fk_ansprechpartner )");
  $stmt->bindParam(':sprechdauer', $sprechdauer);
  $stmt->bindParam(':terminbeginn', $_POST["terminbeginn"]);
  $stmt->bindParam(':terminende', $_POST["terminende"]);
  $stmt->bindParam(':fk_lehrer', $_POST["fk_lehrer"]);
  $stmt->bindParam(':fk_veranstaltung', $_POST["fk_veranstaltung"]);
  $stmt->bindParam(':fk_ansprechpartner', $_POST["fk_ansprechpartner"]);
  $stmt->execute();
  //redirects back to admin.php after creating raum
  echo '<script>window.location.href = "Ansprechpartner.php";</script>';
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;