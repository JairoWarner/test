<?php
session_start();

include ("../gar-connect.php");
include("../functions.php");


$user_data = check_login($con);
check_right($con, 'cre');
 error_reporting(0);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aanmaak Status</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<?php require_once "../header.php"?>
<div class="klantStandaard">
<h1>Status</h1>
<?php
//Klantgegevens uit het formulier halen
$klantid = null; //Autoincrement
$klantnaam= $_POST['klantnaamvak'];
$klantadres = $_POST['klantadresvak'];
$klantpostcode = $_POST['klantpostcodevak'];
$klantplaats = $_POST['klantplaatsvak'];



//klantgegevens invoeren in de tabel
//verbind de parameter met een specefieke variable
require_once '../gar-connect.php';
try {
$sql = $conn->prepare("INSERT INTO klant (klantid,klantnaam,klantadres,klantpostcode,klantplaats) VALUES (:klantid,:klantnaam,:klantadres,:klantpostcode,:klantplaats)");
$sql->bindParam(":klantid", $klantid );
$sql->bindParam(":klantnaam", $klantnaam);
$sql->bindParam(":klantadres",$klantadres );
$sql->bindParam(":klantpostcode", $klantpostcode);
$sql->bindParam(":klantplaats", $klantplaats);
$sql->execute();
echo "<br>De klant is toegevoegd <br>";

}catch (PDOException $e){
    echo "Er is wat mis gegaan probeer het opnieuw, en vul alle gegevens in. ";
}


echo "<div class='backMenu'><a href='../gar-menu.php'>Terug naar het menu </a></div>"





?>
</div>
</body>
</html>
