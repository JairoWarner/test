<?php
session_start();

include ("../gar-connect.php");
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
    <title>Klant create</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<?php require_once "../header.php"?>
<div class="klantStandaard">
<h1>Maak een klant aan</h1>
<p class="p">
    Dit formulier wordt gebruikt om klantgegevens in te voeren
</p>
    <div class="formCreate">
<form action="gar-create-klant2.php"method="post">
    <label for="knaam">Klantnaam:</label>
    <input type="text"name="klantnaamvak" id="knaam" required><br>
    <label for="kadres">Klantadres:</label>
    <input type="text" name="klantadresvak" id="kadres" required><br>
    <label for="kpostcode">Klantpostcode:</label>
    <input type="text" name="klantpostcodevak" id="kpostcode" required><br>
    <label for="kplaats">Klantplaats:</label>
    <input type="text" name="klantplaatsvak" id="kplaats" required><br>
    <input type="submit">
</form>
    </div>
</div>
</body>
</html>