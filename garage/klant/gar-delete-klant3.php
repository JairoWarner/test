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
<h1>Verwijder status</h1>


<?php
//Gegevens uit het formulier halen ----------------------------------------------------
$klantid = $_POST['klantidvak'];
$verwijderen = $_POST['verwijdervak'];

// klantgegevens verwijderen ---------------------------------------------------------
if($verwijderen == true){
    try {


    require_once "../gar-connect.php";
    $sql = $conn->prepare("delete from klant where klantid = :klantid");
    $sql->execute (["klantid"=> $klantid]);
    echo "De gegevens zijn verwijderd. <br>";}catch (PDOException $error){
        echo "De gegevens konden niet verwijderd worden";
    }
}else{
    echo "De gegevens zijn niet verwijderd <br>";
}

echo "<div class='backMenu'><a href='../gar-menu.php'>Terug naar het menu. </a></div>"
?>
</div>
</body>
</html>