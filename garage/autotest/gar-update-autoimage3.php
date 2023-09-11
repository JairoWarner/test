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
    <title>gar-update-auto3.php</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<?php require_once "../header.php"?>
<div class="autoStandaard">
    <h1>Wijzig status</h1>
<p>
</p>
<?php
// autogegevens uit het formulier halen
$autoid          = $_POST["autoidvak"];


if (isset($_POST['submit'])) {
    $image = $_FILES['image'];
    $imageName = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    $imageSize = $_FILES['image']['size'];
    $imageError = $_FILES['image']['error'];
    $imageType = $_FILES['image']['type'];


    $imageExt = explode('.', $imageName);
    $imageNewExt = strtolower(end($imageExt));

    $allowedExt = array('jpg', 'jpeg', 'png');

    if (in_array($imageNewExt, $allowedExt)) {
        if ($imageError === 0) {
            if ($imageSize < 50000000) {
                $imageNewName = $autoid. "autopicture"."."."$imageNewExt";
                $imageDestination = 'autofotos/'.$imageNewName;

                move_uploaded_file($imageTmpName, $imageDestination);

            }else{
                echo "File to big!";

            }


        } else {
            echo "Er was een error!";
        }
    } else {
        echo "Dit bestand is niet supported!";
    }
}


// updaten autogegevens
require_once "../gar-connect.php";


if (!$imageNewName){
echo "<h2>De auto kon niet gewijzigd worden</h2> <br />";}
else{
    $sql = $conn->prepare
    ("                           update auto
                                    set    foto = :foto
                                         
                           
                                    where  autoid = :autoid");
    $sql->execute
    ([
        "foto"         => $imageNewName,
        "autoid"       => $autoid

    ]);

    echo "<h2>De auto is gewijzigd.</h2> <br />";}
echo "<div class='backMenu'><a href='../gar-menu.php'> terug naar het menu </a></div>";
?>    </div></body>
</html>