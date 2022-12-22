<?php
@include 'conn.php';
try {
  print_r($_POST);

  if (isset($_POST['submit'])) {
    // Get the value of the button that was clicked
    $accepted = $_POST['submit'];

    // Check if the button with value "1" (for accept) was clicked
    if ($accepted == "1") {
        $stmt = $conn->prepare("INSERT INTO tbl_lehrkraft_termin
        VALUES (:lehrer, :termin)");
        $stmt->bindParam(':lehrer', $_POST["PK_lehrkraft"]);
        $stmt->bindParam(':termin', $_POST["PK_termin"]);
        $stmt->execute();
        echo '<script>window.location.href = "LehrerTerminView.php";</script>';

    }
    // Check if the button with value "0" (for decline) was clicked
    elseif ($accepted == "0") {
        $stmt = $conn->prepare("DELETE FROM tbl_termin WHERE PK_termin = :termin");
        $stmt->bindParam(':termin', $_POST["PK_termin"]);
        $stmt->execute();
        echo "The request has been declined.";
        echo '<script>window.location.href = "LehrerTerminView.php";</script>';
    }
}

} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;