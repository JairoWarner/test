<?php

session_start();

include("gar-connect.php");
include("functions.php");


$user_data = check_login($con);
error_reporting(0);
?>
<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <title>Over ons</title>

</head>
<body>
<?php require_once "header.php" ?>
<div class="Over_main">
    <div class="Over_ons">
        <div class="links_over">
            <h1>Over ons</h1>
            <p>Welkom bij onze website! Wij zijn Jairo,Diyar en Joran. Wij hebben deze website gemaakt voor een
                schoolproject.We hebben hier ongeveer 5 weken aan gewerkt en we hebben er heel veel van geleerd. We
                weten nu zelf hoe je een database moet opzetten en moet verbinden</p>
        </div>
        <div class="rechts_over">
            <img src="pictures/depositphotos_210579182-stock-photo-about-us-icon.jpg" alt="">
        </div>
    </div>
</div>
</body>
