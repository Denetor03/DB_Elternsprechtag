<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Elternsprechtag";

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
            <button onclick='window.location="signIn.html"'; class="rounded-pill my-1 px-5" id="login-button">
                Login
            </button>
        </div>
    </div>
    <div class="py-5 mt-5 d-flex justify-content-center" id="ansprechpartner">
        <div class="w-50">
            <!-- Schulleitung-->
            <form action="ErstellenSchulleitung.php" method="post">
                <h1>Erstellen Schulleitungs account</h1><hr>
                <!--  VALUES (:PK_schulleitung, :Kuerzel, :Geschlecht, :`E-mail`, :Vorname, :Nachname)");-->
                <div class="d-flex justify-content-between">
                    <label for="kuerzel">Kürzel</label>
                    <input type="text" name="kuerzel" id="kuerzel">
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <label for="geschlecht">Geschlecht</label>
                    <input type="text" name="geschlecht" id="geschlecht">
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email">
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <label for="vorname">Vorname</label>
                    <input type="text" name="vorname" id="vorname">
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <label for="nachname">Nachname</label>
                    <input type="text" name="nachname" id="nachname">
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <button onclick="window.location='SignIn.html'" value="Zurück">Zurück</button>
                    <button type="submit">Erstellen</button>
                </div>
            </form>
            <br>
            <form action="ErstellenGebauede.php" method="post"></action>
                <h1>Erstellen Gebäude</h1><hr>
                <!--gebäude-->
                <div class="d-flex justify-content-between">
                    <label for="gebaeudenr">Gebäude nummer</label>
                    <input type="text" name="gebaeudenr">
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <label for="bezeichnung">Standort bezeichnung</label>
                    <input type="text" name="bezeichnung">
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <button onclick="window.location='SignIn.html'" value="Zurück">Zurück</button>
                    <button type="submit">Erstellen</button>
                </div>
            </form>
            <br>
            <form action="ErstellenSchulleitung.php" method="post">
                <h1>Raum erstellung</h1><hr>
                <!--gebäude-->
                <div class="d-flex justify-content-between">
                    <label for="gebaeudenr">Gebäude</label>
                    <select  name="gebaude">
                    <?php 
                    $stmt = $pdo->prepare("select * from tbl_gebaeude");
                    while($row = $stmt->fetch()){?>
                        <option value="<?php echo
                        $row["PK_raum"]; ?>"><?php echo
                        $row["Standortbezeichnung"]; ?></option><?php
                    } ?>

                    </select>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <label for="raumnr">Raumnummer</label>
                    <input type="text" name="raumnr">
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <button onclick="window.location='SignIn.html'" value="Zurück">Zurück</button>
                    <button type="submit">Erstellen</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
