<?php
session_start();

include("../gar-connect.php");
include("../functions.php");


$user_data = check_login($con);
check_right($con, 'se');
$autotypes = $_POST['typevak'];
error_reporting(0);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zoek eigenaren(Type)</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<style>
    th{
        text-align: right;
    }
</style>
<body>
<?php require_once "../header.php"; ?>
<div class="autoStandaard">
<h1>Uw zoekopdracht</h1>
<p>Dit zijn de gegevens van <?php echo $autotypes?></p>
<?php
//kenteken uit het formulier halen


//autogegevens uit de tabel halen

require_once "../gar-connect.php";

$autos = $conn->prepare("
                                    select kenteken,
                                           automerk,
                                           autotype,
                                           autokmafstand,
                                           klantid
                                        
                                    from auto
                                    where autotype = :autotype");
$autos->execute(["autotype" => $autotypes]);




//auto gegevens laten zien


foreach ($autos as $auto) {
    $klantQuery = $auto["klantid"];

    $klanten = $conn->prepare("select    klantid,
                                           klantnaam,
                                           klantadres
                                    from klant
                                    where klantid = $klantQuery");
    $klanten->execute();
    foreach ($klanten as $klant){
        $klantnaam = $klant["klantnaam"];
        $klantadres = $klant["klantadres"];
    }
    echo "<div>";
    echo "<table>";
    echo "<tr>";
    echo "<th> Kenteken </th>";
    echo "<th> Automerk </th>";
    echo "<th> Autotype </th>";
    echo "<th> Autokmafstand </th>";
    echo "<th> Klantid </th>";
    echo "<th> Klantnaam </th>";
    echo "<th> Klantadres </th>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>" . $auto["kenteken"] . "</td>";
    echo "<td>" . $auto["automerk"] . "</td>";
    echo "<td>" . $auto["autotype"] . "</td>";
    echo "<td>" . $auto["autokmafstand"] . "</td>";
    echo "<td>" . $auto["klantid"] . "</td>";
    echo "<td>" . $klantnaam . "</td>";
    echo "<td>" . $klantadres . "</td>";
    echo "</tr>";
    echo "</table><br>";
    echo "</div>";

}
if (!$auto["autotype"]){
    echo "<h1>Er zijn geen klanten met dit type auto probeer opnieuw</h1>";
    echo  "<div class='backMenu'>";
    echo "<a  href='../gar-menu.php'> Terug naar het menu </a>";
    echo "</div>";
}else{echo  "<div class='backMenu'>";
    echo "<a  href='../gar-menu.php'> Terug naar het menu </a>";
    echo "</div>";}

?>
</div>
</body>
</html>