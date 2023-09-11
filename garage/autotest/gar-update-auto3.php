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
    <title>gar-update-auto3.php</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<?php require_once "../header.php"?>
<div class="autoStandaard">
<h1>garage update auto 3</h1>
<p>
    autogegevens wijzigen in de tabel
    auto van de database garage.
</p>
<?php
// autogegevens uit het formulier halen
$kenteken        = $_POST["kentekenvak"];
$automerk        = $_POST["automerkvak"];
$autotype        = $_POST["autotypevak"];
$autokmafstand   = $_POST["autokmafstandvak"];
$klantid         = $_POST["klantidvak"];
$autoid          = $_POST["autoidvak"];





echo "<h2>". $kenteken. "</h2>". "<br>";
// updaten autogegevens
require_once "../gar-connect.php";
$sql = $conn->prepare
("                           update auto
                                    set    automerk =:automerk,
                                           autotype = :autotype,
                                           autokmafstand = :autokmafstand,
                                           klantid = :klantid
                                         
                           
                                    where  autoid = :autoid");
$sql->execute
([
    "klantid"         => $klantid,
    "automerk"        => $automerk,
    "autotype"        => $autotype,
    "autokmafstand"   => $autokmafstand,
    "autoid"          => $autoid,

]);
echo "<h2>De auto is gewijzigd.</h2> <br />";
echo "<div class='backMenu'><a href='../gar-menu.php'> terug naar het menu </a></div>";
?>  </div>  </body>
</html>