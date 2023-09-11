<?php
session_start();

include ("../gar-connect.php");
include("../functions.php");


$user_data = check_login($con);
check_right($con, 'updel');
error_reporting(0)
?>
<!doctype html>
<html lang="en">
<head>
    <meta name="author" content="Anjo Eijeriks">
    <meta charset="UTF-8">
    <title>gar-update-klant2.php</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<?php require_once "../header.php"?>
<div class="klantStandaard">
<h1>Klant Updaten</h1>
<div class="formCreate">
<?php
// klantid uit het formulier halen
$klantid = $_POST["klantidvak"];
// klantgegevens uit de tabel halen
require_once "../gar-connect.php";
$klanten = $conn->prepare("     select  klantid,
                                              klantnaam,
                                              klantadres,
                                              klantpostcode,
                                              klantplaats
                                      from    klant
                                      where   klantid = :klantid
                                    ");
$klanten->execute(["klantid" => $klantid]);
// klantgegevens in en nieuw formulier laten zien
echo "<form action='gar-update-klant3.php' method='post'>";
foreach ($klanten as $klant) {
    // klantid mag niet gewijzigd worden
    echo " Klantid:" . $klant["klantid"];
    echo " <input type='hidden' name='klantidvak' ";
    echo " value=' " . $klant["klantid"] . " '> <br /> ";


    echo " Klantnaam: <input type='text' ";
    echo " name = 'klantnaamvak' ";
    echo " value = '" . $klant["klantnaam"] . "'";
    echo " > <br />";

    echo " Klantadres: <input type='text' ";
    echo " name = 'klantadresvak' ";
    echo " value = '" . $klant["klantadres"] . "' ";
    echo " > <br />";

    echo " Klantpostcode: <input type ='text' ";
    echo " name = 'klantpostcodevak'";
    echo " value = '". $klant["klantpostcode"] . "' ";
    echo " > <br />";

    echo " Klantplaats: <input type='text' ";
    echo " name = 'klantplaatsvak' ";
    echo " value = " . $klant["klantplaats"] . " ";
    echo " > <br />";
}
if (!$klant["klantid"]){
    echo "<h2>Dit klant ID bestaat niet voer aub een geldig ID in!</h2>";
    echo "<div class='backMenu'><a href='../gar-menu.php'> terug naar het menu </a></div>";
}else{
echo "<input type='submit'>";}
echo "</form>"; // er moet eigenlijk nog gecontroleerd worden op een bestaand klantlid  ?></div></div></body>
</html>

