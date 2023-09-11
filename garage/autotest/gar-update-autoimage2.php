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
    <title>Update auto image</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<?php require_once "../header.php"?>
<div class="autoStandaard">
    <h1>Wijzig Autofoto</h1>
<div class="formCreate">
<?php
// kenteken uit het formulier halen
$kenteken = $_POST["kentekenvak"];
// autogegevens uit de tabel halen
require_once "../gar-connect.php";
$autos = $conn->prepare(
    "SELECT kenteken,
                      automerk,
                      autotype, 
                      autokmafstand,
                      klantid,
                      autoid,
                      foto
               FROM   auto
               WHERE  kenteken = :kenteken
               ");
$autos->execute(["kenteken" => $kenteken]);
// autogegevens in en nieuw formulier laten zien
foreach ($autos as $auto){
    $foto = $auto['foto'];
    $autoid = $auto['autoid'];
}
if (!$auto["klantid"]){
    echo "<h2>Deze Auto bestaat niet voer aub een geldig Kenteken in!</h2>";
    echo "<div class='backMenu'><a href='gar-update-auto1.php'> Terug. </a></div>";
}else{
$autoPath = $auto['foto'];
echo "<img style='width: 400px; height: 400px' src='autofotos/$autoPath'>";
echo "<form action='gar-update-autoimage3.php' method='post' enctype='multipart/form-data' >";
echo "<label for='image'>Foto:</label>
    <input type='file' name='image' id='image' required value='autofotos/$autoPath'><br>";
echo "
    <input type='hidden' name='autoidvak' id='autoid'  value='$autoid' '><br>";}
echo "<input type='submit' name='submit' >";



echo "</form>"; // er moet eigenlijk nog gecontroleerd worden op een bestaand klantid  ?></div></div></body>
</html>
