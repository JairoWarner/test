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
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Auto Verwijderen</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<?php require_once "../header.php"?>
<div class="autoStandaard">
<h1>Verwijder status</h1>

<?php
//Gegevens uit het formulier halen ----------------------------------------------------
$kenteken = $_POST['kentekenvak'];
$verwijderen = $_POST['verwijdervak'];

// autogegevens verwijderen ---------------------------------------------------------
if($verwijderen == true){
    require_once "../gar-connect.php";
    $sql = $conn->prepare("delete from auto where kenteken = :kenteken");
    $sql->execute (["kenteken"=> $kenteken]);
    echo "<h2>De gegevens zijn verwijderd.</h2> <br>";
}else{
    echo "<h2>De gegevens zijn niet verwijderd </h2><br>";
}

echo "<div class='backMenu'><a href='../gar-menu.php'>Terug naar het menu. </a></div>"
?>
</div>
</body>
</html>