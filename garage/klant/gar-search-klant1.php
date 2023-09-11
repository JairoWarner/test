<?php
session_start();

include ("../gar-connect.php");
include("../functions.php");


$user_data = check_login($con);
check_right($con, 'se');
error_reporting(0)
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zoekmachine ID</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<?php require_once "../header.php"?>
<div class="klantStandaard">
<h1>Garage zoek op klantid 1 </h1>
<p>Dit formulier zoekt een klant op uit de tabel klanten van database garage.</p>
    <div class="formCreate">
<form action="gar-search-klant2.php" method="post" >
    <label for="klantid">Welk klantid zoekt u?</label>
    <input type="text" id="klantid" name="klantidvak"> <br>
    <input type="submit">
</form>
    </div>
</div>
</body>
</html>