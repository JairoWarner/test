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
    <meta name="author" content="Anjo Eijeriks">
    <meta charset="UTF-8">
    <title>gar-update-klant3.php</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<?php require_once "../header.php"?>
<div class="klantStandaard">
<h1>Klant Updaten</h1>

<?php
// klantgegevens uit het formulier halen
$klantid        = $_POST["klantidvak"];
$klantnaam      = $_POST["klantnaamvak"];
$klantadres     = $_POST["klantadresvak"];
$klantpostcode  = $_POST["klantpostcodevak"];
$klantplaats    = $_POST["klantplaatsvak"];
// updaten klantgegevens
require_once "../gar-connect.php";
$sql = $conn->prepare
("            update klant set 
                            klantnaam       = :klantnaam,
                                klantadres      = :klantadres,
                                klantpostcode   = :klantpostcode,
                                klantplaats     = :klantplaats
                                where   klantid = :klantid
        ");
$sql->execute
    ([
    "klantid"       => $klantid,
    "klantnaam"     => $klantnaam,
    "klantadres"    => $klantadres,
    "klantpostcode" => $klantpostcode,
    "klantplaats"   => $klantplaats
]);
echo "De klant is gewijzigd. <br />";
        echo "<div class='backMenu'><a href='../gar-menu.php'> terug naar het menu </a></div>";
        ?> </div>   </body>
</html>