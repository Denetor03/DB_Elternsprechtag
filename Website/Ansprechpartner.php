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
    <title>Document</title>
    <style>

    </style>
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
    <div class="py-5 mt-5 d-flex justify-content-center" id="ansprechpartner">
        <div class="w-50">
            <h1>Wen vertreten sie?</h1><hr>
            <form action="ErstellenSchueler.php" method="post">
                <div class="d-flex justify-content-between">
                    <label for="vorname">Vorname</label>
                    <input type="text" name="vorname">
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <label for="nachname">Nachname</label>
                    <input type="text" name="nachname">
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <label for="geschlecht">Geschlecht</label>
                    <input type="text" name="geschlecht">
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <label for="klasse">Klasse</label>
                    <input type="text" name="klasse">
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <label for="fk_ansprechpartner">Ansrpechpartner</label>
                    <select  name="fk_ansprechpartner" required>
                    <?php
                    $stmt = $conn->prepare("select * from tbl_ansprechpartner");
                    $stmt -> execute();
                    while($vertreter = $stmt->fetch()){?>
                        <option value='<?php echo
                        $vertreter["PK_ansprechpartner"]; ?>'><?php echo
                        $vertreter["Vorname"]." ".$vertreter["Nachname"]; ?></option><?php
                    } ?>

                    </select>
                </div>
                <br>
                <div class="d-flex justify-content-between">
                    <button type="button" onclick="window.location='SignIn.html'" value="Zur??ck">Zur??ck</button>
                    <button type="submit">Erstellen</button>
                </div>
            </form>
            <h1>Termin buchen</h1><hr>
            <form action="ErstellenTerminSub.php" method="post">
                <div class="d-flex justify-content-between">
                    <label for="fk_lehrer">Lehrer</label>
                    <select  name="fk_lehrer" required>
                    <?php
                    $stmt = $conn->prepare("select * from tbl_lehrkraft");
                    $stmt -> execute();
                    while($vertreter = $stmt->fetch()){?>
                        <option value='<?php echo
                        $vertreter["PK_lehrkraft"]; ?>'><?php echo
                        $vertreter["Vorname"]." ".$vertreter["Nachname"]; ?></option><?php
                    } ?>
                    </select>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <label for="fk_veranstaltung">Veranstaltung</label>
                    <select  name="fk_veranstaltung" required>
                    <?php
                    $stmt = $conn->prepare("select * from tbl_veranstaltung");
                    $stmt -> execute();
                    while($vertreter = $stmt->fetch()){?>
                        <option value='<?php echo
                        $vertreter["PK_veranstaltung"]; ?>'><?php echo
                        $vertreter["Bezeichnung"]; ?></option><?php
                    } ?>
                    </select>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <label for="fk_ansprechpartner">Ansprechpartner</label>
                    <select  name="fk_ansprechpartner" required>
                    <?php
                    $stmt = $conn->prepare("select * from tbl_ansprechpartner");
                    $stmt -> execute();
                    while($vertreter = $stmt->fetch()){?>
                        <option value='<?php echo
                        $vertreter["PK_ansprechpartner"]; ?>'><?php echo
                        $vertreter["Vorname"]." ".$vertreter["Nachname"]; ?></option><?php
                    } ?>
                    </select>
                </div>
                <br>
                <div class="d-flex justify-content-between">
                    <button type="button" onclick="window.location='Login.php'" value="Zur??ck">Zur??ck</button>
                    <button type="submit">Erstellen</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>