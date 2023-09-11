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
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verwijder Auto</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<?php require_once "../header.php"?>
<div class="autoStandaard">
<h1>Delete een auto</h1>
<p>Vul hier de kenteken in van de auto die je wilt verwijderen</p>
    <div class="formCreate">
<form action="gar-delete-auto2.php" method="post">
    <label for="kenteken">Welk kenteken wilt u verwijderen</label>
    <input type="text" name="kentekenvak" id="kenteken"><br>
    <input type="submit">
</form>
    </div>
</div>
</body>
</html>