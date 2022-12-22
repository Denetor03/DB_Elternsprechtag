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
    <link rel="stylesheet" type="text/css" href="style.css" /> 
    <title>Document</title>
</head>
<body>
    <div class="container px-0 mx-0">
        <div class="d-flex justify-content-between px-5" id="header">
            <h1>
                Schule-xy
            </h1>
            <button onclick="window.location='index.html'" class="rounded-pill my-1 px-5" id="login-button">
                back
            </button>
        </div>
        <?php
            $stmt = $conn->prepare('select priorität, passwort FROM tbl_benutzer Where email="'.$_POST["email"].'"');
            $stmt->execute();
            $user = $stmt->fetch();
        ?>
        <div class="px-5" id="loginAsContainer">
            <div id="loginAs" class="w-75">
                <h1 class=" m-0 my-5 px-5">Login as</h1>
                <div id="loginAsLinks" class="py-5">
                <?php
                    if(!empty($user) ){
                        if($user["passwort"] == $_POST["passwort"]){
                            echo'
                                <ul class="ml-5 my-2">';
                                if($user["priorität"]>= 5){
                                    echo '<li class="my-4"><a href="Admin.php">Admin</a></li>';
                                }
                                if($user["priorität"]>= 4){
                                    echo ' <li class="my-4"><a href="SchulLeitung.php">Schulleitung</a></li>';
                                }
                                if($user["priorität"]>= 3){
                                    echo '
                                    <li class="my-4"><a href="Lehrer.php">Lehrer Termien Bestätigung</a></li>
                                    <li class="my-4"><a href="LehrerPause.html">Lehrer Eigen Termien vergabe</a></li>
                                    <li class="my-4"><a href="LehrerTerminView.php">Lehrer Termin Übersicht</a></li>';
                                }
                                if($user["priorität"]>= 2){
                                    echo ' <li class="my-4"><a href="Ansprechpartner.php">Vertreter</a></li>';
                                }
                                if($user["priorität"]<= 1){
                                    echo ' <li class="my-4"><h1 class="text-white">Keine Berrechtigung!</h1></li>';
                                }
                            echo "</ul>";
                        }
                    }
                    else{
                        echo '<div class="p-5"><h1>Benutzer nicht gefunden</h1></div>';
                    }
                    ?>
            </div>
        </div>
    </div>
</body>
</html>


