<?php
@include 'conn.php';
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $err) {
    die($err->getMessage());
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css" integrity="sha384-z4tVnCr80ZcL0iufVdGQSUzNvJsKjEtqYZjiQrrYKlpGow+btDHDfQWkFjoaz/Zr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css" /> 
    <title>Schulleitung</title>
</head>
<body>
    <div class="container px-0 mx-0">
        <div class="d-flex justify-content-between px-5" id="header">
            <h1>
                Schule-xy
            </h1>
            <button onclick='window.location="Login.php"'; class="rounded-pill my-1 px-5" id="login-button">
                Login
            </button>
        </div>
    </div>
    <div class="py-5 mt-5 ">
        <div class="w-100 px-5"><h1> Ausstehende anfragen </h1></div>
        <table id="termine">
        <tr>

            <th>Dauer</th>
            <th>Anfang</th>
            <th>Ende</th>
            <th>Vertreter</th>
            <th></th>
        </tr>
            <?php
            $stmt = $conn->prepare('
                SELECT PK_termin, PK_lehrkraft, Sprechdauer, Terminbeginn, Terminende, tbl_lehrkraft.Vorname AS "Lehkraft-Vorname", tbl_lehrkraft.Nachname, tbl_ansprechpartner.Vorname, tbl_ansprechpartner.Nachname
                FROM tbL_termin
                JOIN tbl_lehrkraft ON PK_lehrkraft = FK_lehrkraft
                JOIN tbl_ansprechpartner ON PK_ansprechpartner = FK_ansprechpartner
                WHERE PK_termin NOT IN (SELECT FK_termin FROM tbl_lehrkraft_termin)

            ');
            $stmt -> execute();

            while($row = $stmt->fetch()){?>
                <tr>
  
                    <?= "<td>".$row["Sprechdauer"].$row["PK_termin"]."</td>";?>
                    <?= "<td>".$row["Terminbeginn"]."</td>";?>
                    <?= "<td>".$row["Terminende"]."</td>";?>
                    <?= "<td>".$row["Vorname"]." ".$row["Nachname"]."</td>";?>
                    <?= '<td>
                        <form action="TerminAkzeptieren.php" method="post">
                            <input type="hidden" name="PK_termin" value="'.$row["PK_termin"].'">
                            <input type="hidden" name="PK_lehrkraft" value="'.$row["PK_lehrkraft"].'">
                            <button type="submit" name="submit" value="1">Annehmen</button>
                            <button type="submit" name="submit" value="0">Ablehnen</button>
                        <form>
                    </td>';?>
                </tr>
                <?php
            }
?>
        </table>


        <hr>
        <div class="w-100 px-5"><h1> Termine </h1></div>
        <table id="termine">
        <tr>

            <th>Dauer</th>
            <th>Anfang</th>
            <th>Ende</th>
            <th>Vertreter</th>
        </tr>
            <?php
            $stmt = $conn->prepare('
            SELECT PK_termin, PK_lehrkraft, Sprechdauer, Terminbeginn, Terminende, tbl_lehrkraft.Vorname AS "Lehkraft-Vorname", tbl_lehrkraft.Nachname, tbl_ansprechpartner.Vorname, tbl_ansprechpartner.Nachname
            FROM tbL_termin
            JOIN tbl_lehrkraft ON PK_lehrkraft = FK_lehrkraft
            JOIN tbl_ansprechpartner ON PK_ansprechpartner = FK_ansprechpartner
            WHERE PK_termin IN (SELECT FK_termin FROM tbl_lehrkraft_termin)
            ');
            $stmt -> execute();

            while($row = $stmt->fetch()){?>
                <tr>
  
                <?= "<td>".$row["Sprechdauer"].$row["PK_termin"]."</td>";?>
                    <?= "<td>".$row["Terminbeginn"]."</td>";?>
                    <?= "<td>".$row["Terminende"]."</td>";?>
                    <?= "<td>".$row["Vorname"]." ".$row["Nachname"]."</td>";?>
                </tr>
                <?php
            }
            $stmt = $conn->prepare('
            SELECT Sprechdauer, Terminbeginn, Terminende, FK_ansprechpartner, tbl_lehrkraft.Vorname AS "Lehkraft-Vorname", tbl_lehrkraft.Nachname
            FROM tbL_termin
            JOIN tbl_lehrkraft ON PK_lehrkraft = FK_lehrkraft
            Where FK_ansprechpartner is Null
            ');
            $stmt -> execute();

            while($row = $stmt->fetch()){?>
                <tr>
                    <?= "<td>".$row["Sprechdauer"]."</td>";?>
                    <?= "<td>".$row["Terminbeginn"]."</td>";?>
                    <?= "<td>".$row["Terminende"]."</td>";?>
                    <?= "<td>Pause</td>";?>
                </tr>
                <?php
            } ?>
        </table>
    </div>
</body>
</html>
