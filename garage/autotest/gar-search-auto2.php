<?php
session_start();

include("../gar-connect.php");
include("../functions.php");


$user_data = check_login($con);
check_right($con, 'se');
$kenteken = $_POST['kentekenvak'];
error_reporting(0)
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>gar-search-auto2.php</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<style>
    th{
        text-align: right;
    }
</style>
<body>
<?php require_once "../header.php";
echo "<div class='searchAuto2'>";?>

<h1>Uw zoekopdracht</h1>
<p>Dit zijn de gegevens van <?php echo $kenteken?></p>
<?php
//kenteken uit het formulier halen


//autogegevens uit de tabel halen

require_once "../gar-connect.php";

$autos = $conn->prepare("
                                    select kenteken,
                                           automerk,
                                           autotype,
                                           autokmafstand,
                                           klantid,
                                           foto
                                    from auto
                                    where kenteken = :kenteken");

$autos->execute(["kenteken" => $kenteken]);

//auto gegevens laten zien


foreach ($autos as $auto) {
$validation = $auto["automerk"];
    $fotoPath = $auto['foto'];
    echo "<div>";
    echo "<img class='carPicture' src='autofotos/$fotoPath'>";
    echo "</div>";
    echo "<div>";
    echo "<table>";
    echo "<tr>";
    echo "<th> Kenteken </th>";
    echo "<td>" . $auto["kenteken"] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th> Automerk </th>";
    echo "<td>" . $auto["automerk"] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th> Autotype </th>";
    echo "<td>" . $auto["autotype"] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th> Autokmafstand </th>";
    echo "<td>" . $auto["autokmafstand"] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th> Klantid </th>";
    echo "<td>" . $auto["klantid"] . "</td>";
    echo "</tr>";
    echo "</table><br>";
    echo "</div>";
}
if (!$validation){echo "<h1>Er is geen auto geregistreerd met dit kenteken probeer opnieuw</h1>";echo  "<div class='backMenu'>";
    echo "<a  href='../gar-menu.php'> Terug naar het menu </a>";
    echo "</div>";
}else{echo  "<div class='backMenu'>";
    echo "<a  href='../gar-menu.php'> Terug naar het menu </a>";
    echo "</div>";
}
echo "</div>";
?>

</body>
</html>