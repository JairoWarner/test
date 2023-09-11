<?php
session_start();

include ("../gar-connect.php");
include("../functions.php");


$user_data = check_login($con);
check_right($con, 're');
error_reporting(0)
?>
<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Klant tabel</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>

<?php require_once "../header.php"?>
<div class="klantStandaard">
<h1>Garage read klant</h1>
<p>
    Dit zijn alle gegevens uit de tabel klanten van de database garage
</p>
<?php
require_once "../gar-connect.php";
$klanten = $conn->prepare("select * from klant");
$klanten->execute();

//gegevens laten zien
//er komt elke keer een stukje bij
echo "<table>";
echo "<tr>";
echo "<th>Klantid</th>";
echo "<th>Naam</th>";
echo "<th>Adres</th>";
echo "<th>Postcode</th>";
echo "<th>Plaats</th>";
echo "</tr>";
foreach ($klanten as $klant) {
    echo "<tr>";
    echo "<td>" . $klant["klantid"] . "</td>";
    echo "<td>" . $klant["klantnaam"] . "</td>";
    echo "<td>" . $klant["klantadres"] . "</td>";
    echo "<td>" . $klant["klantpostcode"] . "</td>";
    echo "<td>" . $klant["klantplaats"] . "</td>";
    echo "</tr>";
}
echo "<table>";
echo "<div class='backMenu'><a href='../gar-menu.php'>Terug naar het menu </a></div>"; ?>
</div></body>
</html>