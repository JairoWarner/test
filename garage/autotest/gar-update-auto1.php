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
    <title>Auto Updaten</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<?php require_once "../header.php"?>
<div class="autoStandaard">
<h1>Welke auto wil je updaten</h1>
    <div class="createForm">
<form action="gar-update-auto2.php" method="post">
    <label class="kenteken" for="kenteken">Welk kenteken wilt u wijzigen?</label>
    <input type="text" id="kenteken"  name="kentekenvak"> <br />
    <input type="submit">
</form>
    </div>
</div>
</body>
</html>


