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
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete klant</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<?php require_once "../header.php"?>
<div class="klantStandaard">
<h1>Weet u het zeker?</h1>
<?php
//klantid uit het formulier halen
$klantid = $_POST['klantidvak'];

//klantgegevens uit de tabel halen
require_once "../gar-connect.php";
$klanten = $conn->prepare(
        "SELECT klantid,
                      klantnaam,
                      klantadres, 
                      klantpostcode,
                      klantplaats
               FROM   klant
               WHERE  klantid = :klantid
               ");
$klanten ->execute(["klantid" => $klantid]);
// klantgegevens laten zien

echo "<table>";
foreach($klanten as $klant)
{

    $autocontrole = $conn->prepare("
                                        select * from auto where klantid = $klantid");
    $autocontrole->execute();
    foreach ($autocontrole as $ac){
        $kenteken = $ac["kenteken"];
    }

    if ($ac["autoid"]){
        $validation = "Yes";
    }else{
        $validation = "No";
    }
    echo "<tr>";
    echo "<th>Klantid</th>";
    echo "<th>Naam</th>";
    echo "<th>Adres</th>";
    echo "<th>Postcode</th>";
    echo "<th>Plaats</th>";
    echo "<th>Auto gekoppeld</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>" . $klant["klantid"] . "</td>";
    echo "<td>" . $klant["klantnaam"] . "</td>";
    echo "<td>" . $klant["klantadres"] . "</td>";
    echo "<td>" . $klant["klantpostcode"] . "</td>";
    echo "<td>" . $klant["klantplaats"] . "</td>";
    echo "<td>" . $validation . "</td> <br>";
    echo "</tr>";
}


if ($klant["klantid"]){
    if (!$ac["autoid"]){
echo "</table>";
echo "<form action = 'gar-delete-klant3.php' method='post'>";
    echo " <input type='hidden' name='klantidvak' value='$klantid'>";
    echo "<input type='hidden' name='verwijdervak' value='0'>";
    echo "<input type='checkbox' name='verwijdervak' value='1'>";
    echo "Verwijder deze klant. <br>";
    echo "<input type='submit'>";
    echo "</form>";}
else{
    echo "<h1>Deze klant heeft nog een auto gekoppeld en kan niet verwijderd worden</h1>";
    echo "<div class='backMenu'><a href='../gar-menu.php'>Terug naar het menu. </a></div>";

}
}
else{
    echo "<p>Deze klant bestaat niet </p>";
    echo "<div class='backMenu'><a href='../gar-menu.php'>Terug naar het menu. </a></div>";
}


?></div>
</body>
</html>