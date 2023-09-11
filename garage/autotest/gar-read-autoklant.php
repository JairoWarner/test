<?php
session_start();

include ("../gar-connect.php");
include("../functions.php");


$user_data = check_login($con);
error_reporting(0);
check_right($con, 're')
?>
<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Auto Read</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<?php require_once "../header.php";?>
<div class="autoStandaard">
<h1>Alle auto's ingeschreven met de eigenaren</h1>
<p>
    Dit zijn alle gegevens over de bij ons ingeschreven autos met hun eigenaren.
</p>
    <div class="backMenu"><a href='../gar-menu.php'> terug naar het menu </a></div> <div>
<?php
require_once "../gar-connect.php";
$autos = $conn->prepare("     select    kenteken,
                                              automerk,
                                              autotype,
                                              autokmafstand,
                                              klantid
                                       from   auto      
");
$autos->execute();




echo "<table>";
echo "<tr>";
echo "<th>Kenteken</th>";
echo "<th>Automerk</th>";
echo "<th>Autotype</th>";
echo "<th>KMafstand</th>";
echo "<th>Klantid</th>";
echo "<th>Eigenaar</th>";

echo "</tr>";

foreach ($autos as $auto) {

    $klantid = $auto["klantid"];
    $klanten = $conn->prepare("
                                   select       klantid,
                                                klantnaam
                                    
                                   from         klant
                                   where        klantid = $klantid");
    $klanten->execute();

    foreach ($klanten as $klant){
        $klantNaam = $klant["klantnaam"];
    }


    echo "<tr>";
    echo "<td>" . $auto["kenteken"] . "</td>";
    echo "<td>" . $auto["automerk"] . "</td>";
    echo "<td>" . $auto["autotype"] . "</td>";
    echo "<td>" . $auto["autokmafstand"] . "</td>";
    echo "<td>" . $auto["klantid"] . "</td>";
    echo "<td>" . $klant["klantnaam"] . "</td>";
    echo "</tr>";

}
echo "<table>";
echo ""; ?></div>
   </div></body>
</html>