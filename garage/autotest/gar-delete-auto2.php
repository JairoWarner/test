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
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>gar-delete-auto2</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<?php require_once "../header.php"?>
<div class="autoStandaard">
<h1>Garage delete auto 2</h1><div>
<?php
//kenteken uit het formulier halen
$kenteken = $_POST['kentekenvak'];

//autogegevens uit de tabel halen
require_once "../gar-connect.php";
$autos = $conn->prepare(
    "SELECT kenteken,
                      automerk,
                      autotype, 
                      autokmafstand,
                      klantid
               FROM   auto
               WHERE  kenteken = :kenteken
               ");
$autos->execute(["kenteken" => $kenteken]);
// autogegevens laten zien
echo "<table>";
foreach ($autos as $auto) {
    echo "<tr>";
    echo "<th>" . "Kenteken" . "</th>";
    echo "<th>" . "Merk" . "</th>";
    echo "<th>" . "Type" . "</th>";
    echo "<th>" . "KmAfstand" . "</th>";
    echo "<th>" . "Klantid" . "</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>" . $auto["kenteken"] . "</td>";
    echo "<td>" . $auto["automerk"] . "</td>";
    echo "<td>" . $auto["autotype"] . "</td>";
    echo "<td>" . $auto["autokmafstand"] . "</td>";
    echo "<td>" . $auto["klantid"] . "</td>";
    echo "</tr>";
}
echo "<br></table><br>";
if (!$auto["kenteken"]){
    echo "<h2>Deze auto bestaat niet of is al verwijderd</h2>";
    echo "<div class='backMenu'><a href='../gar-menu.php'>Terug naar het menu. </a></div>";
}else{
echo "<div class='formCreate'><form action = 'gar-delete-auto3.php' method='post'>";
echo "<input type='hidden' name='kentekenvak' value='$kenteken'>";
echo "<input type='hidden' name='verwijderidvak' value='1'>";
echo "<label style='font-weight: bold' for='deletebox'>Verwijder deze auto</label>";
echo "<input type='checkbox' name='verwijdervak' id='deletebox' value='1'>";
echo "<br>";
echo "<button type='submit'>Verwijder</button>";
echo "</form></div>";}
?>
    </div>
</div>
</body>
</html>