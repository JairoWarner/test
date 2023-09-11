<?php
session_start();

include ("../gar-connect.php");
include("../functions.php");


$user_data = check_login($con);
check_right($con, 'updel');
error_reporting(0);
?>
<!doctype html>
<html lang="en">
<head>
    <meta name="author" content="Anjo Eijeriks">
    <meta charset="UTF-8">
    <title>gar-update-auto2.php</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<?php require_once "../header.php"?>
<div class="autoStandaard">
<h1>Auto updaten</h1>
<p>
   Wijzig de gegevens (Indien de auto bestaat)
</p>
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
                      autoid
               FROM   auto
               WHERE  kenteken = :kenteken
               ");
$autos->execute(["kenteken" => $kenteken]);
// autogegevens in en nieuw formulier laten zien
echo "<form action='gar-update-auto3.php' method='post'>";
foreach ($autos as $auto) {
    // kenteken mag niet gewijzigd worden
    echo " Autoid:" . $auto["autoid"];
    echo " <input type='hidden' name='autoidvak' ";
    echo " value=' " . $auto["autoid"] . " '> <br /> ";

    echo " Kenteken:" . $auto["kenteken"];
    echo " <input type='hidden' name='kentekenvak' ";
    echo " value=' " . $auto["kenteken"] . " '> <br /> ";

    echo " Automerk: <input type='text' ";
    echo " name = 'automerkvak' ";
    echo " value = '" . $auto["automerk"] . "'";
    echo " > <br />";

    echo " Autotype: <input type='text' ";
    echo " name = 'autotypevak' ";
    echo " value = '" . $auto["autotype"] . "' ";
    echo " > <br />";

    echo " Autokmafstand: <input type='text' ";
    echo " name = 'autokmafstandvak' ";
    echo " value = " . $auto["autokmafstand"] . " ";
    echo " > <br />";

    echo " Klantid: <input type='text' ";
    echo " name = 'klantidvak' ";
    echo " value = " . $auto["klantid"] . " ";
    echo " > <br />";


}
if (!$auto["klantid"]){
    echo "<h2>Deze Auto bestaat niet voer aub een geldig Kenteken in!</h2>";
    echo "<div class='backMenu'><a href='gar-update-auto1.php'> Terug. </a></div>";
}else{
    echo "<br><button type='submit'>Update</button>";}

echo "</form>"; // er moet eigenlijk nog gecontroleerd worden op een bestaand klantid  ?></div></div></body>
</html>

