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
    <title>Update auto image</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<?php require_once "../header.php"?>
<div class="autoStandaard">
<h1>Update Autofoto</h1>
<p>
    Hier kan je de foto van de auto wijzigen
</p><div class="formCreate">
<form action="gar-update-autoimage2.php" method="post">
    <label for="kenteken">Welk kenteken wilt u wijzigen?</label>
    <input type="text" id="kenteken"  name="kentekenvak"> <br />
    <input type="submit">
</form></div></div>
</body>
</html>


