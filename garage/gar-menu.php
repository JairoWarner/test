<?php
session_start();

include("gar-connect.php");
include("functions.php");


$user_data = check_login($con);
error_reporting(0);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gar-menu.php</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<?php require_once "header.php" ?>
<div class="menu">
    <h1>Garage menu</h1>
    <div class="container">
    <div>
    <h2>Klant</h2>
    <ul>
        <li><a href="klant/gar-create-klant1.php">Create</a></li>
        <li><a href="klant/gar-read-klant.php">Read</a></li>
        <li><a href="klant/gar-search-klant1.php">Zoeken op klantid</a></li>
        <li><a href="klant/gar-update-klant1.php">Update</a></li>
        <li><a href="klant/gar-delete-klant1.php">Delete</a></li>
        <li>  <a href="autotest/gar-search-typeklant.php">Klanten met zelfde auto type</a></li>
    </ul>
    </div>
    <div>
    <h2>Auto</h2>
    <ul>
        <li><a href="autotest/gar-create-auto1.php">Create</a></li>
        <li><a href="autotest/gar-read-auto.php">Read</a></li>
        <li><a href="autotest/gar-read-autoklant.php">Read met klanten</a></li>
        <li><a href="autotest/gar-search-auto1.php">Zoeken op Kenteken</a></li>
        <li><a href="autotest/gar-update-auto1.php">Update</a></li>
        <li><a href="autotest/gar-update-autoimage1.php">Update Image</a></li>
        <li><a href="autotest/gar-delete-auto1.php">Delete</a></li>
    </ul>
    </div>
    </div>
</div>
</body>
</html>