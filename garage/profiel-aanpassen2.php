<?php
session_start();

include ("gar-connect.php");
include("functions.php");


$user_data = check_login($con);
error_reporting(0);
?>
<!doctype html>
<html lang="en">
<head>
    <meta name="author" content="Anjo Eijeriks">
    <meta charset="UTF-8">
    <title>Profile Update</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<?php   require_once "header.php"?>
<div class="klantStandaard">
<h1>Update uw profiel</h1>
<p>
    Je gegevens zijn gewijzigd
</p>
<?php
// gebruiker gegevens uit het formulier halen
$username        = $_POST["username"];
$password     = $_POST["password"];
$uid = $_POST["uid"];

// updaten gebruiker
$sql = $conn->prepare
("            update users set 
                            username       = :username,
                                password     = :password
                            
                                where   user_id = :uid
        ");
$sql->execute
([
    "username"       => $username,
    "password"     => $password,
    "uid"    => $uid,

]);
echo "<div class='backMenu'><a href='myprofile.php'> Terug naar je profiel </a></div>";
?>   </div> </body>
</html>