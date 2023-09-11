<?php
session_start();

include ("../gar-connect.php");
include("../functions.php");


$user_data = check_login($con);
error_reporting(0);
check_right($con, 'updel')
?>
<!doctype html>
<html lang="en">
<head>
    <meta name="author" content="">
    <meta charset="UTF-8">
    <title>Klant wijzigen</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<?php require_once "../header.php"?>
<div class="klantStandaard">
<h1>Wijziging Formulier</h1>
<p>
    Dit formulier wordt gebruikt om klantgegevens te wijzigen.
</p>
    <div class="formCreate">
<form action="gar-update-klant2.php" method="post">
    <label for="klantid">Welk klantid wilt u wijzigen?</label>
    <input type="text" id="klantid"  name="klantidvak"> <br />
    <input type="submit">
</form>
    </div>
</div>
</body>
</html>


