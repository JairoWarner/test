<?php
session_start();

include ("../gar-connect.php");
include("../functions.php");


$user_data = check_login($con);
check_right($con, 'updel');
error_reporting(0);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete klant</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<?php require_once "../header.php"?>
<div class="klantStandaard">
<h1>Verwijder een klant</h1>
<p>Hier kan je klanten verwijderen</p>
    <div class="formCreate">
<form action="gar-delete-klant2.php" method="post">
    <label for="klantid">Welk klantid wilt u verwijderen</label>
    <input type="text" name="klantidvak" id="klantid"><br>
    <input type="submit">
</form>
    </div>
</div>
</body>
</html>