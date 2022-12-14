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

        <div class="px-5 text-center" id="loginAsContainer">
            <div id="loginAs">
                <h1 class=" m-0 my-5 px-5">Login</h1>
                <div id="loginAsLinks" class="p-5">
                    <form action="LoginConfirm.php" method="post">
                        <input type="text" name="email" required>
                        <br>
                        <input type="password" name="passwort" required>
                        <br>
                        <div class="d-flex justify-content-between px-4">
                            <button type="button"  onclick="window.location='signup.php'">Signup</button>
                            <button >Login</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>