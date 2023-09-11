<?php
session_start();

include ("../gar-connect.php");
include("../functions.php");


$user_data = check_login($con);
error_reporting(0);
check_right($con, 'se')
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>gar-search-auto1.php</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<?php require_once "../header.php";?>
<div class="searchAuto2">
<h1>Zoekmachine: Op basis van Kenteken </h1>
<p>Vul het kenteken in van de auto die u zoekt</p>

    <div class="formSearch1">
<form  action="gar-search-auto2.php" method="post" >
    <label for="kenteken">Kenteken:</label>
    <input type="text" id="kenteken" name="kentekenvak">
    <input type="submit">
</form>
    </div>
</div>
</body>
</html>