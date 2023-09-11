<?php
session_start();

include ("../gar-connect.php");
include("../functions.php");


$user_data = check_login($con);
check_right($con, 'se');
error_reporting(0)
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zoekmachine ID</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<?php require_once "../header.php"?>
<div class="klantStandaard">
<h1>Op KlantID zoeken</h1>

<?php
    //Klantid uit het formulier halen
    $klantid = $_POST['klantidvak'];

    //Klantgegevens uit de tabel halen

require_once "../gar-connect.php";

$klanten = $conn->prepare("
                                    select klantid,
                                           klantnaam,
                                           klantadres,
                                           klantpostcode,
                                           klantplaats
                                    from klant
                                    where klantid = :klantid");

$klanten->execute(["klantid" => $klantid]);


//klant gegevens laten zien
echo "<table>";
echo "<tr>";
echo "<th>Klantid</th>";
echo "<th>Naam</th>";
echo "<th>Adres</th>";
echo "<th>Postcode</th>";
echo "<th>Plaats</th>";
echo "</tr>";
foreach($klanten as $klant)
{
    echo "<tr>";
    echo "<td>" . $klant["klantid"] . "</td>";
    echo "<td>" . $klant["klantnaam"] . "</td>";
    echo "<td>" . $klant["klantadres"] . "</td>";
    echo "<td>" . $klant["klantpostcode"] . "</td>";
    echo "<td>" . $klant["klantplaats"] . "</td>";
    echo "</tr>";
}
echo "</table><br>";
if (!$klant["klantid"]){echo "<h1>Deze klant bestaat niet voer aub een geldig ID in</h1>";
    echo "<div class='backMenu'><a href='../gar-menu.php'> Terug naar het menu </a></div>";
}else{echo "<div class='backMenu'><a href='../gar-menu.php'> Terug naar het menu </a></div>";}





?>
</div>
</body>
</html>