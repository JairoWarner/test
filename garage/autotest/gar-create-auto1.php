<?php
session_start();

include("../gar-connect.php");
include("../functions.php");


$user_data = check_login($con);
error_reporting(0);
check_right($con, 'cre')

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>gar-create-auto1</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<?php require_once "../header.php"; ?>
<div class="autoStandaard">
    <h1>Garage create auto 1</h1>
    <p>
        Dit formulier wordt gebruikt om auto gegevens in te voeren
    </p>
    <div class="formCreate">
        <form action="gar-create-auto2.php" method="post" enctype="multipart/form-data">
            <label for="kenteken">Kenteken:</label>
            <input type="text" name="kentekenvak" id="kenteken" required><br>
            <label for="knaam">Automerk:</label>
            <input type="text" name="automerkvak" id="knaam" required><br>
            <label for="kadres">Autotype:</label>
            <input type="text" name="autotypevak" id="kadres" required><br>
            <label for="kpostcode">Autokmafstand:</label>
            <input type="number" name="autokmafstandvak" id="kpostcode" required><br>
            <label for="kplaats">Klantid:</label>
            <input type="text" name="klantidvak" id="kplaats" required><br>
            <label for="image">Foto:</label>
            <input type="file" name="image" id="image"><br>
            <button class="buttonType1" type="submit" name="submit">Verzenden</button>

        </form>
    </div>
</div>
</body>
</html>