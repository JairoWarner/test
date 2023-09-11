<?php
session_start();

 include ("gar-connect.php");
 include("functions.php");


$user_data = check_login($con);
$autoNummer = lastCar($con);
error_reporting(0);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Startpagina</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<?php require_once "header.php"?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Startpagina</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<?php require_once "header.php" ?>
<div class="content_main">
    <div class="content">
        <div class="links">
            <h2>Garage Bedrijf Ertan</h2>
            <div class="backMenu2">
                <a href="myprofile.php">Mijn Profiel</a>
            </div>
        </div>
        <div class="rechts">
            <img src="pictures/imganteprima.jpg" alt="Garagebedrijf Ertan">
        </div>
    </div>
</div>
</body>
</html>

</body>
</html>